@extends('layouts.app')

@section('title', 'Carbon Calculator')

@section('content')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-dark-text-primary">Carbon Footprint Calculator</h1>
        <p class="mt-2 text-gray-600 dark:text-dark-text-secondary">Calculate your carbon footprint and track your environmental impact.</p>
    </div>

    <!-- Calculator Form -->
    <div class="bg-white dark:bg-dark-bg-secondary shadow rounded-lg">
        <div class="px-4 py-5 sm:p-6">
            <form action="{{ route('carbon.calculate') }}" method="POST" class="space-y-8">
                @csrf

                <!-- Electricity Section -->
                <div class="space-y-4">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-dark-text-primary">Electricity Usage</h3>
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <div>
                            <label for="electricity_usage" class="block text-sm font-medium text-gray-700 dark:text-dark-text-secondary">Monthly Electricity Usage (kWh)</label>
                            <input type="number" name="electricity_usage" id="electricity_usage" step="0.01" class="mt-1 block w-full rounded-md border-gray-300 dark:border-dark-border dark:bg-dark-bg-primary shadow-sm focus:border-green-500 focus:ring-green-500 dark:text-dark-text-primary">
                        </div>
                        <div>
                            <label for="electricity_source" class="block text-sm font-medium text-gray-700 dark:text-dark-text-secondary">Energy Source</label>
                            <select name="electricity_source" id="electricity_source" class="mt-1 block w-full rounded-md border-gray-300 dark:border-dark-border dark:bg-dark-bg-primary shadow-sm focus:border-green-500 focus:ring-green-500 dark:text-dark-text-primary">
                                <option value="grid">Grid Electricity</option>
                                <option value="solar">Solar Power</option>
                                <option value="wind">Wind Power</option>
                                <option value="hydro">Hydro Power</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Transportation Section -->
                <div class="space-y-4">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-dark-text-primary">Transportation</h3>
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <div>
                            <label for="car_distance" class="block text-sm font-medium text-gray-700 dark:text-dark-text-secondary">Monthly Car Distance (km)</label>
                            <input type="number" name="car_distance" id="car_distance" step="0.01" class="mt-1 block w-full rounded-md border-gray-300 dark:border-dark-border dark:bg-dark-bg-primary shadow-sm focus:border-green-500 focus:ring-green-500 dark:text-dark-text-primary">
                        </div>
                        <div>
                            <label for="car_type" class="block text-sm font-medium text-gray-700 dark:text-dark-text-secondary">Car Type</label>
                            <select name="car_type" id="car_type" class="mt-1 block w-full rounded-md border-gray-300 dark:border-dark-border dark:bg-dark-bg-primary shadow-sm focus:border-green-500 focus:ring-green-500 dark:text-dark-text-primary">
                                <option value="petrol">Petrol</option>
                                <option value="diesel">Diesel</option>
                                <option value="hybrid">Hybrid</option>
                                <option value="electric">Electric</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Waste Section -->
                <div class="space-y-4">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-dark-text-primary">Waste Management</h3>
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <div>
                            <label for="waste_amount" class="block text-sm font-medium text-gray-700 dark:text-dark-text-secondary">Monthly Waste Amount (kg)</label>
                            <input type="number" name="waste_amount" id="waste_amount" step="0.01" class="mt-1 block w-full rounded-md border-gray-300 dark:border-dark-border dark:bg-dark-bg-primary shadow-sm focus:border-green-500 focus:ring-green-500 dark:text-dark-text-primary">
                        </div>
                        <div>
                            <label for="recycling_percentage" class="block text-sm font-medium text-gray-700 dark:text-dark-text-secondary">Recycling Percentage</label>
                            <input type="number" name="recycling_percentage" id="recycling_percentage" min="0" max="100" step="1" class="mt-1 block w-full rounded-md border-gray-300 dark:border-dark-border dark:bg-dark-bg-primary shadow-sm focus:border-green-500 focus:ring-green-500 dark:text-dark-text-primary">
                        </div>
                    </div>
                </div>

                <!-- Water Section -->
                <div class="space-y-4">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-dark-text-primary">Water Usage</h3>
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <div>
                            <label for="water_usage" class="block text-sm font-medium text-gray-700 dark:text-dark-text-secondary">Monthly Water Usage (m³)</label>
                            <input type="number" name="water_usage" id="water_usage" step="0.01" class="mt-1 block w-full rounded-md border-gray-300 dark:border-dark-border dark:bg-dark-bg-primary shadow-sm focus:border-green-500 focus:ring-green-500 dark:text-dark-text-primary">
                        </div>
                        <div>
                            <label for="water_source" class="block text-sm font-medium text-gray-700 dark:text-dark-text-secondary">Water Source</label>
                            <select name="water_source" id="water_source" class="mt-1 block w-full rounded-md border-gray-300 dark:border-dark-border dark:bg-dark-bg-primary shadow-sm focus:border-green-500 focus:ring-green-500 dark:text-dark-text-primary">
                                <option value="municipal">Municipal Water</option>
                                <option value="well">Well Water</option>
                                <option value="rainwater">Rainwater Harvesting</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end">
                    <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        Calculate Carbon Footprint
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Results Section (if available) -->
    @if(isset($carbonFootprint))
    <div class="mt-8 bg-white dark:bg-dark-bg-secondary shadow rounded-lg">
        <div class="px-4 py-5 sm:p-6">
            <h3 class="text-lg font-medium text-gray-900 dark:text-dark-text-primary mb-4">Your Carbon Footprint Results</h3>
            
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
                <!-- Total Carbon Footprint -->
                <div class="bg-gray-50 dark:bg-dark-bg-primary p-4 rounded-lg">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500 dark:text-dark-text-secondary">Total Carbon Footprint</p>
                            <p class="text-2xl font-semibold text-gray-900 dark:text-dark-text-primary">{{ number_format($carbonFootprint['total'], 2) }} kg CO₂</p>
                        </div>
                        <div class="p-3 rounded-full bg-green-50 dark:bg-green-900/30">
                            <i class="fas fa-leaf text-green-600 dark:text-green-400 text-xl"></i>
                        </div>
                    </div>
                </div>

                <!-- Electricity Impact -->
                <div class="bg-gray-50 dark:bg-dark-bg-primary p-4 rounded-lg">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500 dark:text-dark-text-secondary">Electricity Impact</p>
                            <p class="text-2xl font-semibold text-gray-900 dark:text-dark-text-primary">{{ number_format($carbonFootprint['electricity'], 2) }} kg CO₂</p>
                        </div>
                        <div class="p-3 rounded-full bg-blue-50 dark:bg-blue-900/30">
                            <i class="fas fa-bolt text-blue-600 dark:text-blue-400 text-xl"></i>
                        </div>
                    </div>
                </div>

                <!-- Transportation Impact -->
                <div class="bg-gray-50 dark:bg-dark-bg-primary p-4 rounded-lg">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500 dark:text-dark-text-secondary">Transportation Impact</p>
                            <p class="text-2xl font-semibold text-gray-900 dark:text-dark-text-primary">{{ number_format($carbonFootprint['transportation'], 2) }} kg CO₂</p>
                        </div>
                        <div class="p-3 rounded-full bg-yellow-50 dark:bg-yellow-900/30">
                            <i class="fas fa-car text-yellow-600 dark:text-yellow-400 text-xl"></i>
                        </div>
                    </div>
                </div>

                <!-- Waste Impact -->
                <div class="bg-gray-50 dark:bg-dark-bg-primary p-4 rounded-lg">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500 dark:text-dark-text-secondary">Waste Impact</p>
                            <p class="text-2xl font-semibold text-gray-900 dark:text-dark-text-primary">{{ number_format($carbonFootprint['waste'], 2) }} kg CO₂</p>
                        </div>
                        <div class="p-3 rounded-full bg-red-50 dark:bg-red-900/30">
                            <i class="fas fa-trash text-red-600 dark:text-red-400 text-xl"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recommendations -->
            <div class="mt-6">
                <h4 class="text-lg font-medium text-gray-900 dark:text-dark-text-primary mb-4">Recommendations</h4>
                <div class="space-y-4">
                    @foreach($recommendations as $recommendation)
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <i class="fas fa-lightbulb text-yellow-500 mt-1"></i>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-gray-700 dark:text-dark-text-secondary">{{ $recommendation }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection 