<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;
use App\Models\Attendance;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AttendanceController extends Controller
{
    public function index()
    {
        // Get all announcements with attendances (no status filter)
        $announcements = Announcement::with('attendances')->latest()->get();

        // Get all presidents (barangays)
        $barangays = User::where('role', 'president')
            ->orderBy('barangay_name')
            ->get(['id', 'barangay_name', 'first_name', 'middle_name', 'last_name', 'email']);

        $totalBarangays = $barangays->count();

        Log::info('Attendance index viewed', [
            'admin_id' => auth()->id(),
        ]);

        return view('attendance', compact('announcements', 'barangays', 'totalBarangays'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'announcement_id' => 'required|exists:announcements,id',
            'barangays' => 'required|array',
            'barangays.*.user_id' => 'required|exists:users,id',
            'barangays.*.status' => 'required|in:present,late,absent',
        ]);

        $admin = auth()->user();

        foreach ($request->barangays as $barangay) {
            Attendance::updateOrCreate(
                [
                    'announcement_id' => $request->announcement_id,
                    'member_id' => $barangay['user_id'],
                ],
                [
                    'admin_id'      => $admin->id,
                    'barangay_name' => $barangay['barangay_name'],
                    'status'        => $barangay['status'],
                    'email'         => $barangay['email'],
                    'first_name'    => $barangay['first_name'],
                    'middle_name'   => $barangay['middle_name'],
                    'last_name'     => $barangay['last_name'],
                ]
            );
        }

        Log::info('Attendance saved', [
            'admin_id' => $admin->id,
            'announcement_id' => $request->announcement_id,
            'barangays_count' => count($request->barangays),
        ]);

        return redirect()->route('attendance.index')->with('success', 'Attendance saved!');
    }

    public function show(Announcement $announcement)
    {
        $attendances = $announcement->attendances()->get();

        Log::info('Attendance history viewed', [
            'admin_id' => auth()->id(),
            'announcement_id' => $announcement->id,
        ]);

        return view('history', compact('announcement', 'attendances'));
    }

    public function history($announcementId)
    {
        $announcement = Announcement::findOrFail($announcementId);
        $attendances = $announcement->attendances()->get();

        Log::info('Attendance history viewed', [
            'admin_id' => auth()->id(),
            'announcement_id' => $announcementId,
        ]);

        return view('history', compact('announcement', 'attendances'));
    }
}
