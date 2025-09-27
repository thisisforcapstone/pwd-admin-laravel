<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Attendance;
use Illuminate\Support\Facades\Log;

class ReportController extends Controller
{
    public function index()
    {
        $presidents = User::where('role', 'president')->orderBy('barangay_name')->get();
        $summary = [];

        foreach ($presidents as $president) {
            $total = Attendance::where('member_id', $president->id)->count();
            $present = Attendance::where('member_id', $president->id)->where('status', 'present')->count();
            $late = Attendance::where('member_id', $president->id)->where('status', 'late')->count();
            $absent = Attendance::where('member_id', $president->id)->where('status', 'absent')->count();

            $present_percent = $total > 0 ? round(($present / $total) * 100) : 0;
            $late_percent = $total > 0 ? round(($late / $total) * 100) : 0;
            $absent_percent = $total > 0 ? round(($absent / $total) * 100) : 0;

            $summary[] = [
                'president_name' => trim($president->first_name . ' ' . $president->last_name),
                'barangay_name' => $president->barangay_name,
                'total' => $total,
                'present' => $present,
                'late' => $late,
                'absent' => $absent,
                'present_percent' => $present_percent,
                'late_percent' => $late_percent,
                'absent_percent' => $absent_percent,
            ];
        }

        // --- LOGGING CODE ---
        Log::info('Attendance report viewed', [
            'admin_id' => auth()->id(),
            'presidents_count' => count($presidents),
        ]);
        // --- END LOGGING CODE ---

        return view('reports', compact('summary'));
    }
}