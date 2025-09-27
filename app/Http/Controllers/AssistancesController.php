<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assistances;
use Illuminate\Support\Facades\Log;

class AssistancesController extends Controller
{
    // List all assistances
    public function index()
    {
        $benefits = Assistances::where('type', 'benefit')->get();
        $privileges = Assistances::where('type', 'privilege')->get();
        $discounts = Assistances::where('type', 'discount')->get();

        // Auto-update status for benefits: inactive if end date has passed
        foreach ($benefits as $benefit) {
            if ($benefit->date_expiry && $benefit->status === 'active' && now()->gt($benefit->date_expiry)) {
                $benefit->status = 'inactive';
                $benefit->save();
            }
        }

        return view('benefits', compact('benefits', 'privileges', 'discounts'));
    }

    // Store new assistance
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|in:benefit,privilege,discount',

            // Benefits
            'benefit_name' => 'required_if:type,benefit|string|max:255',
            'program' => 'required_if:type,benefit|string|max:255',
            'date_granted' => 'required_if:type,benefit|date',
            'date_expiry' => 'required_if:type,benefit|date',

            // Privileges
            'privilege_name' => 'required_if:type,privilege|string|max:255',
            'privilege_description' => 'required_if:type,privilege|string',
            'validity_period' => 'required_if:type,privilege|string|max:255',

            // Discounts
            'discount_name' => 'required_if:type,discount|string|max:255',
            'establishment' => 'required_if:type,discount|string|max:255',
            'discount_rate' => 'required_if:type,discount|string|max:255',
        ]);

        $assist = new Assistances();
        $assist->type = $request->type;

        if ($request->type === 'benefit') {
            $assist->benefit_name = $request->benefit_name;
            $assist->program = $request->program;
            $assist->date_granted = $request->date_granted;
            $assist->date_expiry = $request->date_expiry;
            // Null other fields
            $assist->privilege_name = null;
            $assist->privilege_description = null;
            $assist->validity_period = null;
            $assist->discount_name = null;
            $assist->discount_rate = null;
            $assist->establishment = null;
            // Set status to active by default
            $assist->status = 'active';
        } elseif ($request->type === 'privilege') {
            $assist->privilege_name = $request->privilege_name;
            $assist->privilege_description = $request->privilege_description;
            $assist->validity_period = $request->validity_period;
            // Null other fields
            $assist->benefit_name = null;
            $assist->program = null;
            $assist->date_granted = null;
            $assist->date_expiry = null;
            $assist->discount_name = null;
            $assist->discount_rate = null;
            $assist->establishment = null;
            $assist->status = 'active';
        } elseif ($request->type === 'discount') {
            $assist->discount_name = $request->discount_name;
            $assist->establishment = $request->establishment;
            $assist->discount_rate = $request->discount_rate;
            // Null other fields
            $assist->benefit_name = null;
            $assist->program = null;
            $assist->date_granted = null;
            $assist->date_expiry = null;
            $assist->privilege_name = null;
            $assist->privilege_description = null;
            $assist->validity_period = null;
            $assist->status = 'active';
        }

        $assist->save();

        // --- LOGGING CODE ---
        Log::info('Assistance created', [
            'admin_id' => auth()->id(),
            'type' => $request->type,
            'benefit_name' => $assist->benefit_name,
            'privilege_name' => $assist->privilege_name,
            'discount_name' => $assist->discount_name,
            'status' => $assist->status,
            'id' => $assist->id,
        ]);
        // --- END LOGGING CODE ---

        return redirect()->route('assistances.index')->with('success', ucfirst($request->type) . ' added successfully!');
    }

    // Show single assistance (redirect to index since view is handled by modal)
    public function show($id)
    {
        return redirect()->route('assistances.index');
    }

    // Edit assistance (redirect to index since edit is handled by modal)
    public function edit($id)
    {
        return redirect()->route('assistances.index');
    }

    // Update assistance
    public function update(Request $request, $id)
    {
        $assistance = Assistances::findOrFail($id);

        $request->validate([
            'type' => 'required|in:benefit,privilege,discount',

            // Benefits
            'benefit_name' => 'required_if:type,benefit|string|max:255',
            'program' => 'required_if:type,benefit|string|max:255',
            'date_granted' => 'required_if:type,benefit|date',
            'date_expiry' => 'required_if:type,benefit|date',

            // Privileges
            'privilege_name' => 'required_if:type,privilege|string|max:255',
            'privilege_description' => 'required_if:type,privilege|string',
            'validity_period' => 'required_if:type,privilege|string|max:255',

            // Discounts
            'discount_name' => 'required_if:type,discount|string|max:255',
            'establishment' => 'required_if:type,discount|string|max:255',
            'discount_rate' => 'required_if:type,discount|string|max:255',
        ]);

        $assistance->type = $request->type;

        if ($request->type === 'benefit') {
            $assistance->benefit_name = $request->benefit_name;
            $assistance->program = $request->program;
            $assistance->date_granted = $request->date_granted;
            $assistance->date_expiry = $request->date_expiry;
            $assistance->privilege_name = null;
            $assistance->privilege_description = null;
            $assistance->validity_period = null;
            $assistance->discount_name = null;
            $assistance->discount_rate = null;
            $assistance->establishment = null;
            // Auto-update status if expired
            if ($assistance->date_expiry && now()->gt($assistance->date_expiry)) {
                $assistance->status = 'inactive';
            } else {
                $assistance->status = 'active';
            }
        } elseif ($request->type === 'privilege') {
            $assistance->privilege_name = $request->privilege_name;
            $assistance->privilege_description = $request->privilege_description;
            $assistance->validity_period = $request->validity_period;
            $assistance->benefit_name = null;
            $assistance->program = null;
            $assistance->date_granted = null;
            $assistance->date_expiry = null;
            $assistance->discount_name = null;
            $assistance->discount_rate = null;
            $assistance->establishment = null;
            // FIX: Use status from request
            $assistance->status = $request->status;
        } elseif ($request->type === 'discount') {
            $assistance->discount_name = $request->discount_name;
            $assistance->establishment = $request->establishment;
            $assistance->discount_rate = $request->discount_rate;
            $assistance->benefit_name = null;
            $assistance->program = null;
            $assistance->date_granted = null;
            $assistance->date_expiry = null;
            $assistance->privilege_name = null;
            $assistance->privilege_description = null;
            $assistance->validity_period = null;
            // FIX: Use status from request
            $assistance->status = $request->status;
        }

        $assistance->save();

        // --- LOGGING CODE ---
        Log::info('Assistance updated', [
            'admin_id' => auth()->id(),
            'type' => $request->type,
            'benefit_name' => $assistance->benefit_name,
            'privilege_name' => $assistance->privilege_name,
            'discount_name' => $assistance->discount_name,
            'status' => $assistance->status,
            'id' => $assistance->id,
        ]);
        // --- END LOGGING CODE ---

        return redirect()->route('assistances.index')->with('success', ucfirst($request->type) . ' updated successfully!');
    }

    // Delete assistance
    public function destroy($id)
    {
        $assistance = Assistances::findOrFail($id);
        $type = $assistance->type;
        $name = $assistance->benefit_name ?? $assistance->privilege_name ?? $assistance->discount_name;
        $assistance->delete();

        // --- LOGGING CODE ---
        Log::warning('Assistance deleted', [
            'admin_id' => auth()->id(),
            'type' => $type,
            'name' => $name,
            'id' => $id,
        ]);
        // --- END LOGGING CODE ---

        return redirect()->route('assistances.index')->with('success', 'Assistance deleted successfully!');
    }

    // Toggle status active/inactive
    public function toggleStatus($id)
    {
        $assistance = Assistances::findOrFail($id);
        $oldStatus = $assistance->status;
        $assistance->status = $assistance->status === 'active' ? 'inactive' : 'active';
        $assistance->save();

        // --- LOGGING CODE ---
        Log::info('Assistance status toggled', [
            'admin_id' => auth()->id(),
            'type' => $assistance->type,
            'name' => $assistance->benefit_name ?? $assistance->privilege_name ?? $assistance->discount_name,
            'old_status' => $oldStatus,
            'new_status' => $assistance->status,
            'id' => $assistance->id,
        ]);
        // --- END LOGGING CODE ---

        return redirect()->route('assistances.index')->with('success', 'Status updated successfully!');
    }
}