<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function index()
    {
        // Announcements Summary
        $announcementsData = [
            'total' => Announcement::count(),
            'active' => Announcement::where('status', 'active')->count(),
            'expired' => Announcement::where('status', 'expired')->count(),
            'upcoming' => Announcement::where('start_date', '>', now())->count()
        ];

        // --- LOGGING CODE ---
        Log::info('Dashboard index viewed', [
            'admin_id' => auth()->id(),
        ]);
        // --- END LOGGING CODE ---

        return view('dashboard.index', compact('announcementsData'));
    }

    public function showDashboard()
    {
        // Sample data for the charts (you can replace these with actual data from your database)
        $municipalityData = [120, 90, 60, 30];   // Data for the municipality chart
        $barangay1Data = [40, 25, 15, 10];       // Data for Barangay 1 chart
        $barangay2Data = [30, 20, 25, 5];        // Data for Barangay 2 chart
        $barangay3Data = [50, 25, 20, 15];       // Data for Barangay 3 chart

        // --- LOGGING CODE ---
        Log::info('Dashboard charts viewed', [
            'admin_id' => auth()->id(),
        ]);
        // --- END LOGGING CODE ---

        // Pass the data to the view
        return view('dashboard', compact('municipalityData', 'barangay1Data', 'barangay2Data', 'barangay3Data'));
    }
}
