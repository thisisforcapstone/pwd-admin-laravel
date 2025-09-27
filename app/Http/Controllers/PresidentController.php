<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\President;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class PresidentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:presidents',
            'password' => 'required|string|min:6',
            'role' => 'required|in:member,president',
        ]);

        $president = President::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        // --- LOGGING CODE ---
        Log::info('President account created', [
            'admin_id' => auth()->id(),
            'president_id' => $president->id,
            'name' => $president->name,
            'email' => $president->email,
            'role' => $president->role,
        ]);
        // --- END LOGGING CODE ---

        return redirect('/dashboard')->with('success', 'Account created successfully!');
    }
}
