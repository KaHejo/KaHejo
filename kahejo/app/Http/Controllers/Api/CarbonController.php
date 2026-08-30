<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CarbonFootprint;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CarbonController extends Controller
{
    /**
     * Calculate and store personal carbon footprint.
     */
    public function calculate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'month' => 'required|date',
            'electricity' => 'required|numeric|min:0',
            'transportation' => 'required|numeric|min:0',
            'waste' => 'required|numeric|min:0',
            'water' => 'required|numeric|min:0',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Parameter perhitungan tidak valid.',
                'errors' => $validator->errors(),
            ], 422);
        }

        $factors = DB::table('emission_factors')
            ->whereIn('category', ['Listrik', 'Bensin', 'Limbah', 'Air'])
            ->pluck('value', 'category');

        $elecEmission = $request->electricity * ($factors['Listrik'] ?? 0.5);
        $transEmission = $request->transportation * ($factors['Bensin'] ?? 0.2);
        $wasteEmission = $request->waste * ($factors['Limbah'] ?? 2.5);
        $waterEmission = $request->water * ($factors['Air'] ?? 0.3);
        $totalEmission = $elecEmission + $transEmission + $wasteEmission + $waterEmission;

        $record = CarbonFootprint::create([
            'user_id' => $request->user()->id,
            'month' => $request->month,
            'electricity' => $elecEmission,
            'transportation' => $transEmission,
            'waste' => $wasteEmission,
            'water' => $waterEmission,
            'total' => $totalEmission,
        ]);

        $trees = max(1, round($totalEmission / 21.77));

        return response()->json([
            'success' => true,
            'message' => 'Kalkulasi jejak karbon berhasil dihitung dan disimpan.',
            'data' => [
                'record_id' => $record->id,
                'period' => Carbon::parse($record->month)->format('F Y'),
                'total_kg_co2e' => round($totalEmission, 2),
                'total_ton_co2e' => round($totalEmission / 1000, 3),
                'breakdown' => [
                    'electricity_kg' => round($elecEmission, 2),
                    'transportation_kg' => round($transEmission, 2),
                    'waste_kg' => round($wasteEmission, 2),
                    'water_kg' => round($waterEmission, 2),
                ],
                'offset_requirement' => [
                    'trees_needed' => $trees,
                    'absorption_duration' => '1 tahun',
                ],
                'created_at' => $record->created_at,
            ],
        ], 201);
    }

    /**
     * Get paginated carbon calculation history.
     */
    public function history(Request $request)
    {
        $perPage = (int)$request->input('per_page', 10);
        $records = CarbonFootprint::where('user_id', $request->user()->id)
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);

        return response()->json([
            'success' => true,
            'message' => 'Riwayat kalkulasi karbon berhasil dimuat.',
            'data' => $records,
        ]);
    }

    /**
     * Get specific carbon calculation details.
     */
    public function show(Request $request, $id)
    {
        $record = CarbonFootprint::where('user_id', $request->user()->id)
            ->findOrFail($id);

        $trees = max(1, round($record->total / 21.77));

        return response()->json([
            'success' => true,
            'message' => 'Detail kalkulasi karbon berhasil dimuat.',
            'data' => [
                'id' => $record->id,
                'document_number' => sprintf('KHJ-CRB-%06d', $record->id),
                'period' => Carbon::parse($record->month)->format('F Y'),
                'total_kg_co2e' => round($record->total, 2),
                'total_ton_co2e' => round($record->total / 1000, 3),
                'breakdown' => [
                    'electricity_kg' => round($record->electricity, 2),
                    'transportation_kg' => round($record->transportation, 2),
                    'waste_kg' => round($record->waste, 2),
                    'water_kg' => round($record->water, 2),
                ],
                'trees_offset' => $trees,
                'created_at' => $record->created_at,
            ],
        ]);
    }
}
