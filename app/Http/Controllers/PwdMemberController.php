<?php

namespace App\Http\Controllers;

use App\Models\DisabilityStatistic;
use App\Models\PwdMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PwdMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Log::info('Displaying list of PWD members', [
            'admin_id' => auth()->id(),
        ]);
        $members = PwdMember::with('barangay')->paginate(10);
        return view('pwd-members.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Log::info('Displaying create PWD member form', [
            'admin_id' => auth()->id(),
        ]);
        $barangays = DisabilityStatistic::all();
        return view('pwd-members.create', compact('barangays'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Log::info('Attempting to create new PWD member', [
            'admin_id' => auth()->id(),
            'ip' => $request->ip()
        ]);

        try {
            $validated = $request->validate([
                'id' => 'required|exists:barangays,id',
                'full_name' => 'required|string|max:255',
                'age' => 'required|integer|min:1|max:120',
                'disability_type' => 'required|string|max:255'
            ]);

            $member = PwdMember::create($validated);

            Log::info('PWD member created successfully', [
                'admin_id' => auth()->id(),
                'id' => $member->id
            ]);
            return redirect()->route('pwd-members.index')->with('success', 'PWD member added successfully!');

        } catch (\Exception $e) {
            Log::error('Failed to create PWD member', [
                'admin_id' => auth()->id(),
                'error' => $e->getMessage(),
                'input' => $request->except('_token')
            ]);
            return back()->with('error', 'Failed to create PWD member.')->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(PwdMember $pwdMember)
    {
        Log::info('Displaying PWD member details', [
            'admin_id' => auth()->id(),
            'id' => $pwdMember->id
        ]);
        return view('pwd-members.show', compact('pwdMember'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PwdMember $pwdMember)
    {
        Log::info('Displaying edit form for PWD member', [
            'admin_id' => auth()->id(),
            'id' => $pwdMember->id
        ]);
        $barangays = DisabilityStatistic::all();
        return view('pwd-members.edit', compact('pwdMember', 'barangays'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PwdMember $pwdMember)
    {
        Log::info('Attempting to update PWD member', [
            'admin_id' => auth()->id(),
            'id' => $pwdMember->id
        ]);

        try {
            $validated = $request->validate([
                'id' => 'required|exists:barangays,id',
                'full_name' => 'required|string|max:255',
                'age' => 'required|integer|min:1|max:120',
                'disability_type' => 'required|string|max:255'
            ]);

            $pwdMember->update($validated);

            Log::info('PWD member updated successfully', [
                'admin_id' => auth()->id(),
                'id' => $pwdMember->id
            ]);
            return redirect()->route('pwd-members.index')->with('success', 'PWD member updated successfully!');

        } catch (\Exception $e) {
            Log::error('Failed to update PWD member', [
                'admin_id' => auth()->id(),
                'id' => $pwdMember->id,
                'error' => $e->getMessage()
            ]);
            return back()->with('error', 'Failed to update PWD member.')->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PwdMember $pwdMember)
    {
        Log::info('Attempting to delete PWD member', [
            'admin_id' => auth()->id(),
            'id' => $pwdMember->id
        ]);

        try {
            $pwdMember->delete();
            Log::info('PWD member deleted successfully', [
                'admin_id' => auth()->id(),
                'id' => $pwdMember->id
            ]);
            return redirect()->route('pwd-members.index')->with('success', 'PWD member deleted successfully!');
        } catch (\Exception $e) {
            Log::error('Failed to delete PWD member', [
                'admin_id' => auth()->id(),
                'id' => $pwdMember->id,
                'error' => $e->getMessage()
            ]);
            return back()->with('error', 'Failed to delete PWD member.');
        }
    }
}