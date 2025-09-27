<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\President;

class AccountController extends Controller
{
    public function showAddAccountForm()
    {
        return view('addacc'); // This should point to your blade file
    }

    public function saveAccount(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins|unique:presidents',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:admin,president',
        ]);

        $accountData = [
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ];

        if ($validatedData['role'] === 'admin') {
            Admin::create($accountData);
        } else {
            Account::create($accountData);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Account created successfully!',
            'data' => $accountData
        ]);
    }
}