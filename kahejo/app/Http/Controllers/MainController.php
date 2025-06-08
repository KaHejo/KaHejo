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
            ->orderBy('created_at', 'desc')
            ->take(12) // Last 12 months
            ->get()
            ->map(function ($record) {
                return [
                    'date' => Carbon::parse($record->created_at)->format('M Y'),
                    'total' => $record->total,
                    'electricity' => $record->electricity,
                    'transportation' => $record->transportation,
                    'waste' => $record->waste,
                    'water' => $record->water
                ];
            });

        // Get energy consumption data
        $energyConsumption = CompanyEnergyConsumption::where('user_id', $user->id)
            ->orderBy('consumption_date', 'desc')
            ->take(12) // Last 12 months
            ->get()
            ->map(function ($record) {
                return [
                    'date' => Carbon::parse($record->consumption_date)->format('M Y'),
                    'electricity' => $record->source_type === 'electricity' ? $record->consumption_amount : 0,
                    'gas' => $record->source_type === 'gas' ? $record->consumption_amount : 0,
                    'water' => $record->source_type === 'water' ? $record->consumption_amount : 0
                ];
            });

        // Calculate energy stats
        $energyStats = [
            'totalUsage' => $energyConsumption->sum(function ($record) {
                return $record['electricity'] + $record['gas'] + $record['water'];
            }),
            'averageDaily' => $energyConsumption->avg(function ($record) {
                return $record['electricity'] + $record['gas'] + $record['water'];
            }),
            'peakTime' => $energyConsumption->max(function ($record) {
                return $record['electricity'] + $record['gas'] + $record['water'];
            }),
            'efficiencyScore' => $this->calculateEnergyEfficiencyScore($energyConsumption)
        ];

        // Get lowest carbon footprint
        $lowestFootprint = CarbonFootprint::where('user_id', $user->id)
            ->orderBy('total', 'asc')
            ->first();

        // Get highest carbon footprint
        $highestFootprint = CarbonFootprint::where('user_id', $user->id)
            ->orderBy('total', 'desc')
            ->first();

        // Calculate user-specific stats
        $stats = [
            'totalCarbonFootprint' => $carbonHistory->sum('total'),
            'averageMonthlyFootprint' => $carbonHistory->avg('total'),
            'lastMonthFootprint' => $carbonHistory->first()['total'] ?? 0,
            'improvement' => $this->calculateImprovement($carbonHistory),
            'lowestFootprint' => $lowestFootprint ? [
                'value' => $lowestFootprint->total,
                'date' => Carbon::parse($lowestFootprint->created_at)->format('M Y'),
                'electricity' => $lowestFootprint->electricity,
                'transportation' => $lowestFootprint->transportation,
                'waste' => $lowestFootprint->waste,
                'water' => $lowestFootprint->water
            ] : null,
            'highestFootprint' => $highestFootprint ? [
                'value' => $highestFootprint->total,
                'date' => Carbon::parse($highestFootprint->created_at)->format('M Y'),
                'electricity' => $highestFootprint->electricity,
                'transportation' => $highestFootprint->transportation,
                'waste' => $highestFootprint->waste,
                'water' => $highestFootprint->water
            ] : null
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

    private function calculateEnergyEfficiencyScore($energyConsumption)
    {
        if ($energyConsumption->isEmpty()) {
            return 0;
        }

        // Calculate average consumption
        $avgConsumption = $energyConsumption->avg(function ($record) {
            return $record['electricity'] + $record['gas'] + $record['water'];
        });

        // If average consumption is 0 or very close to 0, return 0 to avoid division by zero
        if ($avgConsumption <= 0.0001) {
            return 0;
        }

        // Calculate standard deviation
        $variance = $energyConsumption->map(function ($record) use ($avgConsumption) {
            $total = $record['electricity'] + $record['gas'] + $record['water'];
            return pow($total - $avgConsumption, 2);
        })->avg();

        $stdDev = sqrt($variance);

        // If standard deviation is 0 or very close to 0, return 100 (perfect efficiency)
        if ($stdDev <= 0.0001) {
            return 100;
        }

        // Calculate efficiency score (100 - (stdDev/avgConsumption * 100))
        $score = 100 - (($stdDev / $avgConsumption) * 100);

        // Ensure score is between 0 and 100
        return max(0, min(100, round($score)));
    }

    private function calculateImprovement($carbonHistory)
    {
        if ($carbonHistory->count() < 2) {
            return 0;
        }

        $currentMonth = $carbonHistory->first()['total'];
        $previousMonth = $carbonHistory->get(1)['total'];

        // If previous month's value is 0 or very close to 0, return 0 to avoid division by zero
        if ($previousMonth <= 0.0001) {
            return 0;
        }

        return round((($previousMonth - $currentMonth) / $previousMonth) * 100, 1);
    }

    private function getUserActivities($userId)
    {
        // Get user's recent carbon footprint calculations
        $recentCalculations = CarbonFootprint::where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get()
            ->map(function ($record) {
                return [
                    'icon' => 'calculator',
                    'color' => 'green',
                    'title' => 'New carbon footprint calculation',
                    'time' => Carbon::parse($record->created_at)->diffForHumans(),
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
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->birth_date = $request->birth_date;
        $user->gender = $request->gender;

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
        $user = null; // Will be Auth::user() when auth is implemented
        return view('settings', compact('user'));
    }
} 