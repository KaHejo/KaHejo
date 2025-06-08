@extends('layouts.app')

@section('title', 'Carbon Footprint History')

@section('content')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <!-- Header with Back Button -->
    <div class="mb-8">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Carbon Footprint History</h1>
                <p class="mt-2 text-sm text-gray-600">View your past carbon footprint calculations</p>
            </div>
            <a href="{{ route('carbon') }}" class="inline-flex items-center px-4 py-2 border border-green-500 text-green-500 rounded-md text-sm font-medium hover:bg-green-50 transition-colors duration-200">
                <i class="fas fa-arrow-left mr-2"></i>
                Back to Calculator
            </a>
        </div>
    </div>

    <!-- History Table -->
    <div class="bg-white shadow rounded-lg border border-kahejo-light/20">
        <div class="px-4 py-5 sm:px-6">
            <h3 class="text-lg leading-6 font-medium text-kahejo-darkest">Calculation History</h3>
            <p class="mt-1 text-sm text-kahejo-medium">Your past carbon footprint calculations and their results.</p>
        </div>
        <div class="border-t border-kahejo-light/20">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Electricity</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Transportation</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Waste</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Water</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($carbonFootprints as $carbon)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $carbon->created_at->format('d M Y H:i') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ number_format($carbon->electricity, 2) }} kg CO₂
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ number_format($carbon->transportation, 2) }} kg CO₂
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ number_format($carbon->waste, 2) }} kg CO₂
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ number_format($carbon->water, 2) }} kg CO₂
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-kahejo-dark">
                                {{ number_format($carbon->total, 2) }} kg CO₂
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="{{ route('carbon.view', $carbon->id) }}" class="text-kahejo-dark hover:text-kahejo-darkest">
                                    <i class="fas fa-eye mr-1"></i>
                                    View Details
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                                No carbon footprint calculations found.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <!-- Pagination -->
            <div class="px-4 py-3 bg-gray-50 border-t border-gray-200 sm:px-6">
                {{ $carbonFootprints->links() }}
            </div>
        </div>
    </div>
</div>
@endsection 