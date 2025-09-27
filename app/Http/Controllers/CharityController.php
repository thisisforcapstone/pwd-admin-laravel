<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CharityRequest;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class CharityController extends Controller
{
    public function index()
    {
        // Pending/endorsed requests (not yet approved/rejected)
        $pendingRequests = CharityRequest::whereIn('status', ['pending', 'endorsed'])
            ->with(['member', 'president'])
            ->get();

        // Barangay list for summary (barangays with pending/endorsed requests)
        $barangayList = [];
        foreach ($pendingRequests as $req) {
            if ($req->president && $req->president->barangay_name) {
                $barangayList[] = $req->president->barangay_name;
            }
        }
        $barangayList = collect($barangayList)->unique()->filter()->values()->toArray();

        // Count of requests per barangay (pending/endorsed only)
        $barangayCounts = [];
        foreach ($barangayList as $barangay) {
            $barangayCounts[$barangay] = $pendingRequests->filter(function($req) use ($barangay) {
                return $req->president && $req->president->barangay_name === $barangay;
            })->count();
        }

        // All requests (for processed/summary)
        $requests = CharityRequest::with(['member', 'president'])
            ->orderBy('created_at', 'desc')
            ->get();

        // Get all requests for monthly summary (not just pending/endorsed)
        $allRequests = CharityRequest::with(['member', 'president'])->get();

        // Monthly summary per barangay (pending/endorsed only)
        $monthlyBarangayRequests = [];
        foreach ($barangayList as $barangay) {
            $monthlyBarangayRequests[$barangay] = [];
            for ($m = 1; $m <= 12; $m++) {
                $monthlyBarangayRequests[$barangay][$m] = $pendingRequests
                    ->filter(function($req) use ($barangay, $m) {
                        return $req->president
                            && $req->president->barangay_name === $barangay
                            && $req->created_at
                            && intval(date('m', strtotime($req->created_at))) === $m;
                    })->count();
            }
        }

        // All barangays of presidents for filter dropdown (even if walang request)
        $allBarangays = User::where('role', 'president')
            ->pluck('barangay_name')
            ->unique()
            ->filter()
            ->values()
            ->toArray();

        // Monthly summary per barangay (for all requests)
        $monthlyBarangayRequests = [];
        foreach ($allBarangays as $barangay) {
            $monthlyBarangayRequests[$barangay] = [];
            for ($m = 1; $m <= 12; $m++) {
                $monthlyBarangayRequests[$barangay][$m] = $allRequests
                    ->filter(function($req) use ($barangay, $m) {
                        return $req->president
                            && $req->president->barangay_name === $barangay
                            && $req->created_at
                            && intval(date('m', strtotime($req->created_at))) === $m;
                    })->count();
            }
        }

        Log::info('Charity requests viewed', [
            'admin_id' => auth()->id(),
        ]);

        return view('charity', compact(
            'barangayCounts',
            'barangayList',
            'requests',
            'monthlyBarangayRequests',
            'allBarangays'
        ));
    }

    public function approve(Request $request, $id)
    {
        $charityRequest = CharityRequest::findOrFail($id);
        $charityRequest->endorsed_by_admin = true;
        $charityRequest->status = 'approved';
        $charityRequest->remarks = $request->input('requirements');
        $charityRequest->save();

        // --- LOGGING CODE ---
        Log::info('Charity request approved', [
            'admin_id' => auth()->id(),
            'request_id' => $charityRequest->id,
            'member_id' => $charityRequest->member_id,
            'president_id' => $charityRequest->president_id,
            'status' => $charityRequest->status,
        ]);
        // --- END LOGGING CODE ---

        return redirect()->back()->with('success', 'Request approved successfully.');
    }

    public function reject(Request $request, $id)
    {
        $charityRequest = CharityRequest::findOrFail($id);
        $charityRequest->rejected_by_admin = true;
        $charityRequest->status = 'rejected';
        $charityRequest->remarks = $request->input('remarks');
        $charityRequest->save();

        // --- LOGGING CODE ---
        Log::warning('Charity request rejected', [
            'admin_id' => auth()->id(),
            'request_id' => $charityRequest->id,
            'member_id' => $charityRequest->member_id,
            'president_id' => $charityRequest->president_id,
            'status' => $charityRequest->status,
        ]);
        // --- END LOGGING CODE ---

        return redirect()->back()->with('success', 'Request rejected successfully.');
    }
}
