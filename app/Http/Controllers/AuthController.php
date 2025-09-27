<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Admin;
use App\Models\President;

class AuthController extends Controller
{

    public function logupchoose()
    {
        Log::info('Logup choose page viewed', [
            'ip' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);
        return view('logupchoose');
    }
    public function showLoginForm()
    {
        Log::info('Login form viewed', [
            'ip' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);
        return view('login'); // your Blade view
    }

    public function showRegisterForm()
    {
        Log::info('Register form viewed', [
            'ip' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);
        return view('register'); // your Blade view
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:admin,president',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ];

        if ($request->role === 'admin') {
            $admin = Admin::create($data);
            Log::info('Admin account registered', [
                'admin_id' => $admin->id,
                'email' => $admin->email,
                'ip' => $request->ip(),
            ]);
        } else {
            $president = President::create($data);
            Log::info('President account registered', [
                'president_id' => $president->id,
                'email' => $president->email,
                'ip' => $request->ip(),
            ]);
        }

        return redirect('/login')->with('success', 'Account created successfully!');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Try admin
        $admin = Admin::where('email', $request->email)->first();
        if ($admin && Hash::check($request->password, $admin->password)) {
            Auth::login($admin);
            Log::info('Admin logged in', [
                'admin_id' => $admin->id,
                'email' => $admin->email,
                'ip' => $request->ip(),
            ]);
            return redirect()->route('dashboard'); // Ito ang magpapakita ng dashboard.blade.php
        }

        // Try president
        $president = President::where('email', $request->email)->first();
        if ($president && Hash::check($request->password, $president->password)) {
            Auth::login($president);
            Log::info('President logged in', [
                'president_id' => $president->id,
                'email' => $president->email,
                'ip' => $request->ip(),
            ]);
            return redirect()->route('dashboard'); // Palitan kung may ibang route
        }

        Log::warning('Failed login attempt', [
            'email' => $request->email,
            'ip' => $request->ip(),
        ]);

        // Invalid credentials
        return back()->withErrors(['email' => 'Invalid email or password.']);
    }


    public function logout(Request $request)
    {
        $user = Auth::user();
        Log::info('User logged out', [
            'user_id' => $user ? $user->id : null,
            'role' => $user ? $user->role : null,
            'ip' => $request->ip(),
        ]);
        Auth::logout();
        return redirect('/login');
    }

    public function addAccountForm()
    {
        Log::info('Add account form viewed', [
            'ip' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);
        // Return the view for adding an account
        return view('addacc');  // Replace 'your-view-name' with the actual view file name
    }
}
