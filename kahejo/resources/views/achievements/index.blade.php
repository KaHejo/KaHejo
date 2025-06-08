@extends('layouts.app')

@section('title', 'KaHejo - Achievements')

@push('styles')
<style>
    /* Styles from achievements/index.blade.php */
    .card-hover {
        transition: all 0.3s ease;
    }
    .card-hover:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
    }
    .dark .card-hover:hover {
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.3);
    }
</style>
@endpush

@section('content')
<div class="max-w-7xl mx-auto py-8 sm:px-6 lg:px-8">
    <div class="bg-white dark:bg-dark-bg-secondary shadow rounded-lg border border-kahejo-light/20 p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-kahejo-darkest dark:text-dark-text-primary">Achievements</h1>
        </div>
        <p class="text-gray-600 dark:text-dark-text-secondary mb-4">Here you can view all your achievements and their details.</p>

        @php
            $user = Auth::user();
            $totalPoints = $user->points;
        @endphp

        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6 gap-4">
            <div class="flex items-center space-x-3">
                <span class="inline-flex items-center px-3 py-2 rounded-lg bg-green-100 text-green-700 font-semibold text-lg dark:bg-green-900/30 dark:text-green-400">
                    <i class="fas fa-coins mr-2"></i>
                    Total Points: {{ $totalPoints }}
                </span>
            </div>
            <a href="{{ route('rewards') }}"
               class="inline-flex items-center px-4 py-2 rounded-lg bg-kahejo-dark hover:bg-kahejo-darkest text-white font-semibold shadow transition">
                <i class="fas fa-gift mr-2"></i>
                Go to Rewards
            </a>
        </div>

        @php
            $userAchievements = Auth::user()->achievements->pluck('id')->toArray();
        @endphp

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($achievements as $achievement)
                @php
                    $achieved = in_array($achievement->id, $userAchievements);
                @endphp
                <div class="relative bg-kahejo-lightest/10 border border-kahejo-light/30 rounded-lg shadow p-5 flex flex-col items-center text-center transition-all duration-200
                    {{ $achieved ? 'opacity-100' : 'opacity-60 grayscale' }} dark:bg-dark-bg-secondary dark:border-dark-border">
                    <div class="w-16 h-16 mb-3 flex items-center justify-center rounded-full border-2 {{ $achieved ? 'border-green-400 bg-white dark:bg-dark-bg-primary' : 'border-gray-300 bg-gray-100 dark:bg-dark-bg-primary dark:border-dark-border' }}">
                        @if($achievement->icon)
                            <img src="{{ asset($achievement->icon) }}" alt="{{ $achievement->name }}" class="w-12 h-12 object-contain mx-auto {{ $achieved ? '' : 'grayscale' }}">
                        @else
                            <i class="fas fa-award text-3xl {{ $achieved ? 'text-kahejo-dark' : 'text-gray-400 dark:text-dark-text-secondary' }}"></i>
                        @endif
                    </div>
                    <div class="font-semibold text-kahejo-darkest text-lg mb-1 dark:text-dark-text-primary">{{ $achievement->name }}</div>
                    <div class="text-kahejo-medium text-sm mb-2 dark:text-dark-text-secondary">{{ $achievement->description }}</div>
                    <div class="flex justify-center items-center space-x-2 mb-2">
                        <span class="px-2 py-1 text-xs rounded-full {{ $achieved ? 'bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400' : 'bg-gray-100 text-gray-400 dark:bg-dark-bg-primary dark:text-dark-text-secondary' }}">
                            {{ ucfirst($achievement->category ?? '-') }}
                        </span>
                        <span class="px-2 py-1 text-xs rounded-full {{ $achieved ? 'bg-kahejo-dark text-white' : 'bg-gray-200 text-gray-400 dark:bg-dark-bg-primary dark:text-dark-text-secondary' }}">
                            {{ $achievement->points_awarded ?? 0 }} pts
                        </span>
                    </div>
                    @if($achieved)
                        <span class="inline-flex items-center px-2 py-1 text-xs font-semibold rounded bg-green-50 text-green-700 dark:bg-green-900/30 dark:text-green-400">
                            <i class="fas fa-check-circle mr-1"></i> Achieved
                        </span>
                    @else
                        <span class="inline-flex items-center px-2 py-1 text-xs font-semibold rounded bg-gray-100 text-gray-400 dark:bg-dark-bg-primary dark:text-dark-text-secondary">
                            <i class="fas fa-lock mr-1"></i> Locked
                        </span>
                    @endif
                </div>
            @endforeach
        </div>

        <div class="mt-8">
            {{ $achievements->links() }}
        </div>
    </div>
</div>
@endsection