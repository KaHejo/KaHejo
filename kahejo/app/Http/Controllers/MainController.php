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
            })
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