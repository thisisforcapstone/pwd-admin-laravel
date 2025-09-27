<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Models\DisabilityStatistic;

class ClassificationController extends Controller
{
    // Display the classifications page with presidents and their members' disability stats + overall stats
    public function index()
    {
        $disabilityTypes = [
            'Deaf or Hard of Hearing',
            'Intellectual Disability',
            'Learning Disability',
            'Mental Disability',
            'Physical Disability (Orthopedic)',
            'Psychosocial Disability',
            'Speech and Language Impairment',
            'Visual Disability',
            'Cancer (RA11215)',
            'Rare Disease (RA10747)',
        ];

        // Kunin lahat ng presidente
        $presidents = User::where('role', 'president')->get();

        // Para sa bawat presidente, kuhanin mga miyembro nila at disability stats
        $data = $presidents->map(function($president) use ($disabilityTypes) {
            $members = User::where('role', 'member')
                ->where('barangay_name', $president->barangay_name)
                ->get();

            $disabilityCounts = array_fill_keys($disabilityTypes, 0);
            foreach ($members as $member) {
                $type = $member->disability_type;
                if (isset($disabilityCounts[$type])) {
                    $disabilityCounts[$type]++;
                }
            }

            $totalMembers = $members->count();

            $disabilityPercentages = [];
            foreach ($disabilityCounts as $type => $count) {
                $disabilityPercentages[$type] = $totalMembers > 0 ? round(($count / $totalMembers) * 100, 2) : 0;
            }

            return [
                'president_id' => $president->id,
                'president_fullname' => trim("{$president->first_name} {$president->middle_name} {$president->last_name}"),
                'barangay_name' => $president->barangay_name,
                'members' => $members,
                'disability_counts' => $disabilityCounts,
                'disability_percentages' => $disabilityPercentages,
                'total_members' => $totalMembers,
            ];
        });

        // --- Compute overall disability stats for ALL members ---
        $allMembers = User::where('role', 'member')->get();
        $overallCounts = array_fill_keys($disabilityTypes, 0);

        foreach ($allMembers as $member) {
            $type = $member->disability_type;
            if (isset($overallCounts[$type])) {
                $overallCounts[$type]++;
            }
        }

        $totalAllMembers = $allMembers->count();

        $overallPercentages = [];
        foreach ($overallCounts as $type => $count) {
            $overallPercentages[$type] = $totalAllMembers > 0 ? round(($count / $totalAllMembers) * 100, 2) : 0;
        }

        Log::info('Classifications page viewed', [
            'admin_id' => auth()->id(),
        ]);

        return view('classifications', compact('data', 'overallCounts', 'overallPercentages', 'totalAllMembers'));
    }

    // Store method for disability statistics
    public function store(Request $request)
    {
        try {
            $input = $this->normalizeInput($request->all());

            $validator = Validator::make($input, [
                'barangay_name' => 'required|string|max:255',
                'president' => 'required|string|max:255',
                'visual' => 'required|integer|min:0',
                'hearing' => 'required|integer|min:0',
                'mobility' => 'required|integer|min:0',
            ]);

            if ($validator->fails()) {
                Log::warning('Disability statistics validation failed', [
                    'admin_id' => auth()->id(),
                    'errors' => $validator->errors()->all(),
                    'input' => $input,
                ]);
                return response()->json([
                    'success' => false,
                    'message' => 'Validation errors',
                    'errors' => $validator->errors()
                ], 422);
            }

            $record = DisabilityStatistic::create([
                'barangay_name' => $input['barangay_name'],
                'president' => $input['president'],
                'visual' => $input['visual'],
                'hearing' => $input['hearing'],
                'mobility' => $input['mobility']
            ]);

            Log::info('Disability statistics record created', [
                'admin_id' => auth()->id(),
                'barangay_name' => $input['barangay_name'],
                'president' => $input['president'],
                'visual' => $input['visual'],
                'hearing' => $input['hearing'],
                'mobility' => $input['mobility'],
                'record_id' => $record->id,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Record created successfully',
                'data' => $record
            ]);

        } catch (\Exception $e) {
            Log::error('Error creating disability statistics record', [
                'admin_id' => auth()->id(),
                'error' => $e->getMessage(),
            ]);
            return response()->json([
                'success' => false,
                'message' => 'Server error: ' . $e->getMessage(),
                'error_details' => config('app.debug') ? $e->getTrace() : null
            ], 500);
        }
    }

    protected function normalizeInput(array $input): array
    {
        $normalized = [];
        $keyMapping = [
            'barangay_name' => ['barangay_name', 'barangayname', 'barangay'],
            'president' => ['president', 'president', 'president'],
            'visual' => ['visual', 'visual', 'visually_impaired'],
            'hearing' => ['hearing', 'hearing', 'hearing_impaired'],
            'mobility' => ['mobility', 'mobility', 'mobility_impaired']
        ];

        foreach ($keyMapping as $standardKey => $possibleKeys) {
            foreach ($possibleKeys as $key) {
                if (isset($input[$key])) {
                    $normalized[$standardKey] = $input[$key];
                    break;
                }
            }
        }

        return $normalized;
    }
}
