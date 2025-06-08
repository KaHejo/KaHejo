@extends('layouts.app')

@section('title', 'Carbon Footprint History')

@section('content')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <!-- Header with Back Button -->
    <div class="mb-8">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 dark:text-dark-text-primary">Carbon Footprint History</h1>
                <p class="mt-2 text-sm text-gray-600 dark:text-dark-text-secondary">View your past carbon footprint calculations</p>
            </div>
            <a href="{{ route('carbon') }}" class="inline-flex items-center px-4 py-2 border border-green-500 text-green-500 rounded-md text-sm font-medium hover:bg-green-50 dark:hover:bg-green-900/30 transition-colors duration-200">
                <i class="fas fa-arrow-left mr-2"></i>
                Back to Calculator
            </a>
        </div>
    </div>

    <!-- Summary Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- Total Calculations Card -->
        <div class="bg-white dark:bg-dark-bg-secondary rounded-lg shadow-md p-6 border border-gray-100 dark:border-dark-border">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-green-100 dark:bg-green-900/30 text-green-600 dark:text-green-400">
                    <i class="fas fa-calculator text-2xl"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-dark-text-primary">Total Calculations</h3>
                    <p class="text-2xl font-bold text-green-600 dark:text-green-400">{{ $carbonFootprints->total() }}</p>
                </div>
            </div>
        </div>

        <!-- Average Footprint Card -->
        <div class="bg-white dark:bg-dark-bg-secondary rounded-lg shadow-md p-6 border border-gray-100 dark:border-dark-border">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-blue-100 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400">
                    <i class="fas fa-chart-line text-2xl"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-dark-text-primary">Average Footprint</h3>
                    <p class="text-2xl font-bold text-blue-600 dark:text-blue-400">
                        {{ number_format($carbonFootprints->avg('total'), 2) }} kg CO₂
                    </p>
                </div>
            </div>
        </div>

        <!-- Latest Calculation Card -->
        <div class="bg-white dark:bg-dark-bg-secondary rounded-lg shadow-md p-6 border border-gray-100 dark:border-dark-border">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-purple-100 dark:bg-purple-900/30 text-purple-600 dark:text-purple-400">
                    <i class="fas fa-clock text-2xl"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-dark-text-primary">Latest Calculation</h3>
                    <p class="text-2xl font-bold text-purple-600 dark:text-purple-400">
                        {{ $carbonFootprints->isNotEmpty() ? number_format($carbonFootprints->first()->total, 2) : '0.00' }} kg CO₂
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- History Table -->
    <div class="bg-white dark:bg-dark-bg-secondary shadow rounded-lg border border-gray-100 dark:border-dark-border overflow-hidden">
        <div class="px-4 py-5 sm:px-6 border-b border-gray-100 dark:border-dark-border">
            <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-dark-text-primary">Calculation History</h3>
            <p class="mt-1 text-sm text-gray-500 dark:text-dark-text-secondary">Your past carbon footprint calculations and their results.</p>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-dark-border">
                <thead class="bg-gray-50 dark:bg-dark-bg-primary">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-dark-text-secondary uppercase tracking-wider">Date</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-dark-text-secondary uppercase tracking-wider">Electricity</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-dark-text-secondary uppercase tracking-wider">Transportation</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-dark-text-secondary uppercase tracking-wider">Waste</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-dark-text-secondary uppercase tracking-wider">Water</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-dark-text-secondary uppercase tracking-wider">Total</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-dark-text-secondary uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-dark-bg-secondary divide-y divide-gray-200 dark:divide-dark-border">
                    @forelse($carbonFootprints as $carbon)
                    <tr class="hover:bg-gray-50 dark:hover:bg-dark-bg-primary transition-colors duration-200">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-dark-text-secondary">
                            <div class="flex items-center">
                                <i class="far fa-calendar-alt mr-2 text-gray-400"></i>
                                {{ $carbon->created_at->format('d M Y H:i') }}
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-dark-text-secondary">
                            <div class="flex items-center">
                                <i class="fas fa-bolt mr-2 text-yellow-500"></i>
                                {{ number_format($carbon->electricity, 2) }} kg CO₂
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-dark-text-secondary">
                            <div class="flex items-center">
                                <i class="fas fa-car mr-2 text-blue-500"></i>
                                {{ number_format($carbon->transportation, 2) }} kg CO₂
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-dark-text-secondary">
                            <div class="flex items-center">
                                <i class="fas fa-trash mr-2 text-red-500"></i>
                                {{ number_format($carbon->waste, 2) }} kg CO₂
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-dark-text-secondary">
                            <div class="flex items-center">
                                <i class="fas fa-tint mr-2 text-blue-400"></i>
                                {{ number_format($carbon->water, 2) }} kg CO₂
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-green-600 dark:text-green-400">
                            <div class="flex items-center">
                                <i class="fas fa-leaf mr-2"></i>
                                {{ number_format($carbon->total, 2) }} kg CO₂
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <a href="{{ route('carbon.view', $carbon->id) }}" class="inline-flex items-center px-3 py-1 border border-green-500 text-green-500 rounded-md hover:bg-green-50 dark:hover:bg-green-900/30 transition-colors duration-200">
                                <i class="fas fa-eye mr-1"></i>
                                View Details
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-6 py-8 text-center">
                            <div class="flex flex-col items-center justify-center text-gray-500 dark:text-dark-text-secondary">
                                <i class="fas fa-inbox text-4xl mb-3"></i>
                                <p class="text-lg font-medium">No carbon footprint calculations found</p>
                                <p class="text-sm mt-1">Start calculating your carbon footprint to see your history here</p>
                                <a href="{{ route('carbon') }}" class="mt-4 inline-flex items-center px-4 py-2 border border-green-500 text-green-500 rounded-md text-sm font-medium hover:bg-green-50 dark:hover:bg-green-900/30 transition-colors duration-200">
                                    <i class="fas fa-calculator mr-2"></i>
                                    Calculate Now
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <!-- Pagination -->
        <div class="px-4 py-3 bg-gray-50 dark:bg-dark-bg-primary border-t border-gray-200 dark:border-dark-border sm:px-6">
            {{ $carbonFootprints->links() }}
        </div>
    </div>
</div>
@endsection 