<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    // 🔐 Login method for president
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $request->email)->where('role', 'president')->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            Log::warning('Failed login attempt for president', [
                'email' => $request->email,
                'ip' => $request->ip(),
            ]);
            return response()->json([
                'success' => false,
                'message' => 'Invalid email or password',
            ], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        Log::info('President logged in', [
            'user_id' => $user->id,
            'email' => $user->email,
            'ip' => $request->ip(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Login successful',
            'data' => [
                'id' => $user->id,
                'name' => trim($user->first_name . ' ' . ($user->middle_name ? $user->middle_name . ' ' : '') . $user->last_name) ?: 'President',
                'email' => $user->email,
                'barangay_name' => $user->barangay_name,
                'role' => $user->role,
                'token' => $token
            ]
        ]);
    }

    // ✅ Store method for registering president account from blade form
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'barangay_name' => 'required|string|max:255',
            'password' => 'required|string|min:6',
        ]);

        $user = new User;
        $user->first_name = $validated['first_name'];
        $user->middle_name = $validated['middle_name'];
        $user->last_name = $validated['last_name'];
        $user->email = $validated['email'];
        $user->barangay_name = $validated['barangay_name'];
        $user->role = 'president'; // fixed role
        $user->password = bcrypt($validated['password']); // hash password

        $user->save();

        Log::info('President account registered', [
            'user_id' => $user->id,
            'email' => $user->email,
            'barangay_name' => $user->barangay_name,
            'ip' => $request->ip(),
        ]);

        return redirect()->back()->with('success', 'President account created successfully!');
    }
}
