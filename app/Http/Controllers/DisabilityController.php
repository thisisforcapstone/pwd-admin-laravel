<?php
// app/Http/Controllers/DisabilityStatisticsController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DisabilityStatistic;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class DisabilityController extends Controller
{

    public function index()
{
    $data = DisabilityStatistic::all()->map(function($item) {
        return [
            'barangay_name' => $item->barangay_name,
            'stats' => [
                'Visual' => $item->visual,
                'Hearing' => $item->hearing,
                'Mobility' => $item->mobility,
            ],
        ];
    });

    Log::info('Disability statistics index viewed', [
        'admin_id' => auth()->id(),
    ]);

    return response()->json($data);
}

    public function classifications()
{
    // Fetch statistics for the whole municipality (sum each disability type across all barangays)
    $municipalityStats = DisabilityStatistic::selectRaw('SUM(visual) as total_visual, SUM(hearing) as total_hearing, SUM(mobility) as total_mobility')
                                            ->first(); // Get the total for each disability type
    
    // Fetch stats for each barangay (visual, hearing, mobility per barangay)
    $barangayStats = DisabilityStatistic::select('barangay_name', 'visual', 'hearing', 'mobility')
                                       ->get(); // Get stats for each barangay
    
    Log::info('Disability classifications viewed', [
        'admin_id' => auth()->id(),
    ]);

    // Return the data to the view
    return view('classifications', compact('municipalityStats', 'barangayStats'));
}

    

public function dashboard()
{
    // Fetch statistics for the whole municipality
    $municipalityStats = DisabilityStatistic::selectRaw('SUM(visual) as total_visual, SUM(hearing) as total_hearing, SUM(mobility) as total_mobility')
                            ->first(); // Aggregate the totals
    
    // Fetch statistics for each barangay (individual counts for visual, hearing, mobility)
    $barangayStats = DisabilityStatistic::select('barangay_name', 'visual', 'hearing', 'mobility')
                            ->get(); // Get the stats for each barangay
    
    Log::info('Disability dashboard viewed', [
        'admin_id' => auth()->id(),
    ]);

    // Pass data to view
    return view('dashboard', compact('municipalityStats', 'barangayStats'));
}


public function store(Request $request)
{
    try {
        // Log the incoming request data for debugging purposes
        Log::info('Incoming request data for store:', $request->all());

        // Normalize input keys: make them lowercase first
        $data = $request->all();
        $normalizedData = [
            'barangay_name' => $data['barangay_name'] ?? null,
            'visual' => $data['Visual'] ?? 0,
            'hearing' => $data['Hearing'] ?? 0,
            'mobility' => $data['Mobility'] ?? 0,
        ];

        // Validate the normalized data
        $validated = validator($normalizedData, [
            'barangay_name' => 'required|string',
            'visual' => 'required|integer|min:0',
            'hearing' => 'required|integer|min:0',
            'mobility' => 'required|integer|min:0',
        ])->validate();

        // Log the validated data to ensure it's correct
        Log::info('Validated data:', $validated);

        // Now let's log the SQL query before performing the update or create
        DB::enableQueryLog(); // Enable query logging
        $record = DisabilityStatistic::updateOrCreate(
            ['barangay_name' => $validated['barangay_name']],
            [
                'visual' => $validated['visual'],
                'hearing' => $validated['hearing'],
                'mobility' => $validated['mobility'],
            ]
        );

        // Log the executed query
        Log::info('Executed SQL query:', DB::getQueryLog());
        Log::info('Disability record created/updated', [
            'admin_id' => auth()->id(),
            'barangay_name' => $record->barangay_name,
            'visual' => $record->visual,
            'hearing' => $record->hearing,
            'mobility' => $record->mobility,
            'id' => $record->id,
        ]);

        return response()->json(['message' => 'Data saved successfully!'], 200);
    } catch (\Exception $e) {
        // Log the error if something goes wrong
        Log::error('Error in store method:', [
            'error' => $e->getMessage(),
            'stack' => $e->getTraceAsString(),
            'request_data' => $request->all()
        ]);

        return response()->json(['message' => 'An error occurred while saving data.'], 500);
    }
}

    public function deleteBarangay($barangayName)
    {
        DisabilityStatistic::where('barangay_name', $barangayName)->delete();

        Log::warning('Barangay disability data deleted', [
            'admin_id' => auth()->id(),
            'barangay_name' => $barangayName,
        ]);

        return response()->json(['message' => 'Barangay data deleted']);
    }
}
?>