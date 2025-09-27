<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Log;

class ForgotPasswordController extends Controller
{
    public function showLinkRequestForm()
    {
        Log::info('Forgot password form viewed', [
            'ip' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);
        return view('forgot-password');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink($request->only('email'));

        Log::info('Password reset link requested', [
            'email' => $request->email,
            'status' => $status,
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }
}