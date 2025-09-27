<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PoliciesController extends Controller
{
    public function index()
    {
        Log::info('Policies page viewed', [
            'admin_id' => auth()->id(),
        ]);
        return view('policies'); // your Blade view
    }
}
