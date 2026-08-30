<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CarbonFootprint;
use App\Models\CompanyEnergyConsumption;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Get consolidated dashboard summary metrics.
     */
    public function overview(Request $request)
    {
        $userId = $request->user()->id;

        // Carbon Footprints
        $carbonRecords = CarbonFootprint::where('user_id', $userId)
            ->orderBy('month', 'asc')
            ->get();

        $totalCarbon = $carbonRecords->sum('total');
        $avgMonthlyCarbon = $carbonRecords->count() > 0 ? $carbonRecords->avg('total') : 0;
        $lastMonthRecord = $carbonRecords->last();
        $lowestRecord = $carbonRecords->sortBy('total')->first();
        $highestRecord = $carbonRecords->sortByDesc('total')->first();

        // Company Energy Consumptions
        $energyRecords = CompanyEnergyConsumption::where('user_id', $userId)
            ->orderBy('consumption_date', 'asc')
            ->get();

        $totalKwhEq = $energyRecords->sum(function ($r) {
            return match (strtolower($r->source_type)) {
                'electricity' => (float)$r->consumption_amount,
                'gasoline'    => (float)$r->consumption_amount * 9.5,
                'diesel'      => (float)$r->consumption_amount * 10.7,
                'gas'         => (float)$r->consumption_amount * 10.6,
                'lpg'         => (float)$r->consumption_amount * 12.8,
                default       => (float)$r->consumption_amount,
            };
        });

        $monthCount = max(1, $energyRecords->groupBy(function ($r) {
            return Carbon::parse($r->consumption_date)->format('Y-m');
        })->count());

        $avgDailyEnergy = $totalKwhEq > 0 ? ($totalKwhEq / ($monthCount * 30)) : 0;

        return response()->json([
            'success' => true,
            'message' => 'Ringkasan metrik dashboard berhasil dimuat.',
            'data' => [
                'carbon' => [
                    'total_emissions_kg' => round($totalCarbon, 2),
                    'total_emissions_ton' => round($totalCarbon / 1000, 3),
                    'average_monthly_kg' => round($avgMonthlyCarbon, 2),
                    'last_month_kg' => $lastMonthRecord ? round($lastMonthRecord->total, 2) : 0,
                    'lowest_month' => $lowestRecord ? [
                        'value_kg' => round($lowestRecord->total, 2),
                        'period' => Carbon::parse($lowestRecord->month)->format('M Y'),
                    ] : null,
                    'highest_month' => $highestRecord ? [
                        'value_kg' => round($highestRecord->total, 2),
                        'period' => Carbon::parse($highestRecord->month)->format('M Y'),
                    ] : null,
                    'records_count' => $carbonRecords->count(),
                ],
                'energy' => [
                    'total_consumption_kwh_eq' => round($totalKwhEq, 2),
                    'average_daily_kwh' => round($avgDailyEnergy, 2),
                    'records_count' => $energyRecords->count(),
                ],
            ],
        ]);
    }

    /**
     * Get multi-line carbon trend timeseries data.
     */
    public function carbonTrend(Request $request)
    {
        $userId = $request->user()->id;

        $records = CarbonFootprint::where('user_id', $userId)
            ->orderBy('month', 'asc')
            ->take(12)
            ->get()
            ->map(function ($record) {
                return [
                    'id' => $record->id,
                    'period' => Carbon::parse($record->month)->format('M Y'),
                    'total_kg' => round($record->total, 2),
                    'electricity_kg' => round($record->electricity, 2),
                    'transportation_kg' => round($record->transportation, 2),
                    'waste_kg' => round($record->waste, 2),
                    'water_kg' => round($record->water, 2),
                ];
            });

        return response()->json([
            'success' => true,
            'message' => 'Data tren emisi karbon berhasil dimuat.',
            'data' => $records,
        ]);
    }

    /**
     * Get grouped monthly energy analysis data.
     */
    public function energyAnalysis(Request $request)
    {
        $userId = $request->user()->id;

        $energyRecords = CompanyEnergyConsumption::where('user_id', $userId)
            ->orderBy('consumption_date', 'asc')
            ->get();

        $energyByMonth = $energyRecords->groupBy(function ($record) {
            return Carbon::parse($record->consumption_date)->format('M Y');
        });

        $timeseries = $energyByMonth->map(function ($records, $month) {
            $electricity = $records->where('source_type', 'electricity')->sum('consumption_amount');
            $fuel = $records->whereIn('source_type', ['gasoline', 'diesel'])->sum('consumption_amount');
            $gas = $records->whereIn('source_type', ['gas', 'lpg'])->sum('consumption_amount');

            $totalKwhEq = $records->sum(function ($r) {
                return match (strtolower($r->source_type)) {
                    'electricity' => (float)$r->consumption_amount,
                    'gasoline'    => (float)$r->consumption_amount * 9.5,
                    'diesel'      => (float)$r->consumption_amount * 10.7,
                    'gas'         => (float)$r->consumption_amount * 10.6,
                    'lpg'         => (float)$r->consumption_amount * 12.8,
                    default       => (float)$r->consumption_amount,
                };
            });

            return [
                'period' => $month,
                'electricity_kwh' => round($electricity, 2),
                'fuel_liters' => round($fuel, 2),
                'gas_m3_kg' => round($gas, 2),
                'total_kwh_eq' => round($totalKwhEq, 2),
                'entries_count' => $records->count(),
            ];
        })->values();

        return response()->json([
            'success' => true,
            'message' => 'Data analisis konsumsi energi berhasil dimuat.',
            'data' => $timeseries,
        ]);
    }
}
