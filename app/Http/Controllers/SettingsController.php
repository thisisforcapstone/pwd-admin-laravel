<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class SettingsController extends Controller
{
    public function edit()
    {
        /** @var User $user */
        $user = Auth::user();

        Log::info('Settings page viewed', [
            'admin_id' => $user->id,
        ]);

        return view('settings', compact('user'));
    }

    public function update(Request $request)
    {
        /** @var User $user */
        $user = Auth::user();

        $request->validate([
            'fullName' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',

            // Optional password update
            'currentPassword' => 'nullable|required_with:newPassword',
            'newPassword' => ['nullable', 'confirmed', Password::defaults()],
        ]);

        // Update basic info
        $user->name = $request->fullName;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;

        // Change password if needed
        if ($request->filled('currentPassword') && $request->filled('newPassword')) {
            if (!Hash::check($request->currentPassword, $user->password)) {
                Log::warning('Settings update failed: incorrect current password', [
                    'admin_id' => $user->id,
                ]);
                return back()->withErrors(['currentPassword' => 'Current password is incorrect.']);
            }

            $user->password = Hash::make($request->newPassword);
            Log::info('User password updated via settings', [
                'admin_id' => $user->id,
            ]);
        }

        $user->save();

        Log::info('User settings updated', [
            'admin_id' => $user->id,
            'username' => $user->username,
            'email' => $user->email,
            'phone' => $user->phone,
        ]);

        return back()->with('success', 'Your settings have been updated!');
    }
}
