<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CarbonFootprint;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use App\Models\CompanyEnergyConsumption;

class MainController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();

        // Get user's carbon footprint history
        $carbonHistory = CarbonFootprint::where('user_id', $user->id)
            ->orderBy('month', 'asc')
            ->take(12) // Last 12 months
            ->get()
            ->map(function ($record) {
                return [
                    'date' => Carbon::parse($record->month)->format('M Y'),
                    'total' => $record->total,
                    'electricity' => $record->electricity,
                    'transportation' => $record->transportation,
                    'waste' => $record->waste,
                    'water' => $record->water
                ];
            });

        // Get energy consumption data grouped by month
        $energyRecords = CompanyEnergyConsumption::where('user_id', $user->id)
            ->orderBy('consumption_date', 'asc')
            ->get();

        $energyByMonth = $energyRecords->groupBy(function ($record) {
            return Carbon::parse($record->consumption_date)->format('M Y');
        });

        $energyConsumption = $energyByMonth->map(function ($records, $month) {
            $electricity = $records->where('source_type', 'electricity')->sum('consumption_amount');
            $fuel = $records->whereIn('source_type', ['gasoline', 'diesel'])->sum('consumption_amount');
            $gas = $records->whereIn('source_type', ['gas', 'lpg'])->sum('consumption_amount');

            // Total energi terkonversi ke kWh equivalent untuk metrik akumulasi
            $totalKwhEq = $records->sum(function ($r) {
                return match (strtolower($r->source_type)) {
                    'electricity' => (float)$r->consumption_amount,
                    'gasoline'    => (float)$r->consumption_amount * 9.5, // 1 Liter bensin ≈ 9.5 kWh
                    'diesel'      => (float)$r->consumption_amount * 10.7, // 1 Liter solar ≈ 10.7 kWh
                    'gas'         => (float)$r->consumption_amount * 10.6, // 1 m3 gas ≈ 10.6 kWh
                    'lpg'         => (float)$r->consumption_amount * 12.8, // 1 kg lpg ≈ 12.8 kWh
                    default       => (float)$r->consumption_amount,
                };
            });

            return [
                'date' => $month,
                'electricity' => round($electricity, 2),
                'fuel' => round($fuel, 2),
                'gas' => round($gas, 2),
                'total_kwh_eq' => round($totalKwhEq, 2),
            ];
        })->values();

        // Calculate energy stats
        $totalUsageKwh = $energyConsumption->sum('total_kwh_eq');
        $monthCount = max(1, $energyConsumption->count());
        $energyStats = [
            'totalUsage' => $totalUsageKwh,
            'averageDaily' => $totalUsageKwh > 0 ? ($totalUsageKwh / ($monthCount * 30)) : 0,
        ];

        // Get lowest and highest carbon footprint
        $lowestFootprint = CarbonFootprint::where('user_id', $user->id)
            ->orderBy('total', 'asc')
            ->first();

        $highestFootprint = CarbonFootprint::where('user_id', $user->id)
            ->orderBy('total', 'desc')
            ->first();

        // Calculate user-specific stats
        $stats = [
            'totalCarbonFootprint' => $carbonHistory->sum('total'),
            'averageMonthlyFootprint' => $carbonHistory->avg('total'),
            'lastMonthFootprint' => $carbonHistory->first()['total'] ?? 0,
            'lowestFootprint' => $lowestFootprint ? [
                'value' => $lowestFootprint->total,
                'date' => Carbon::parse($lowestFootprint->month)->format('M Y')
            ] : null,
            'highestFootprint' => $highestFootprint ? [
                'value' => $highestFootprint->total,
                'date' => Carbon::parse($highestFootprint->month)->format('M Y')
            ] : null,
            'improvement' => $this->calculateImprovement($carbonHistory)
        ];

        // Get user's recent activities
        $activities = $this->getUserActivities($user->id);

        return view('main', [
            'user' => $user,
            'stats' => $stats,
            'activities' => $activities,
            'carbonHistory' => $carbonHistory,
            'energyConsumption' => $energyConsumption,
            'energyStats' => $energyStats
        ]);
    }

    private function getUserActivities($userId)
    {
        // Get user's recent carbon footprint calculations
        $recentCalculations = CarbonFootprint::where('user_id', $userId)
            ->orderBy('month', 'desc')
            ->take(3)
            ->get()
            ->map(function ($record) {
                return [
                    'icon' => 'calculator',
                    'color' => 'green',
                    'title' => 'Carbon footprint for ' . Carbon::parse($record->month)->format('F Y'),
                    'time' => Carbon::parse($record->month)->diffForHumans(),
                    'value' => $record->total
                ];
            });

        return $recentCalculations;
    }

    public function profile()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            'phone' => 'nullable|string|max:20',
            'birth_date' => 'nullable|date',
            'gender' => 'nullable|in:male,female,other',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'company' => 'nullable|string|max:255',
            'profile_photo_path' => 'nullable|string|max:255',
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->birth_date = $request->birth_date;
        $user->gender = $request->gender;
        $user->company = $request->company;

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('profile-photos', 'public');
            $user->profile_photo_path = $path;
        }

        $user->save();

        return redirect()->route('profile')->with('success', 'Profile updated successfully!');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|current_password',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('profile')->with('success', 'Password updated successfully!');
    }

    public function settings()
    {
        $user = Auth::user();
        return view('settings', compact('user'));
    }

    private function calculateImprovement($carbonHistory)
    {
        if ($carbonHistory->count() < 2) {
            return 0;
        }

        $currentMonth = $carbonHistory->first()['total'];
        $previousMonth = $carbonHistory->get(1)['total'];

        if ($previousMonth == 0) {
            return 0;
        }

        return (($previousMonth - $currentMonth) / $previousMonth) * 100;
    }
} 