<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Report;

class ReportApiController extends Controller
{
    public function index()
    {
        return response()->json(Report::all());
    }

    public function store(Request $request)
    {
        $report = Report::create([
            'title' => $request->title,
            'content' => $request->content
        ]);

        return response()->json([
            'status' => 'success',
            'report' => $report
        ]);
    }
}
