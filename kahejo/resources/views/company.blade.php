@extends('layouts.app')

@section('title', 'Energy Consumption')

@section('content')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-dark-text-primary">Energy Consumption</h1>
        <p class="mt-2 text-gray-600 dark:text-dark-text-secondary">Track and manage your company's energy usage.</p>
    </div>

    <!-- Energy Consumption Form -->
    <div class="bg-white dark:bg-dark-bg-secondary shadow rounded-lg mb-8">
        <div class="px-4 py-5 sm:p-6">
            <h3 class="text-lg font-medium text-gray-900 dark:text-dark-text-primary mb-4">Add New Consumption Record</h3>
            <form action="{{ route('company.energy.store') }}" method="POST" class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                    <!-- Date -->
                    <div>
                        <label for="date" class="block text-sm font-medium text-gray-700 dark:text-dark-text-secondary">Date</label>
                        <input type="date" name="date" id="date" required class="mt-1 block w-full rounded-md border-gray-300 dark:border-dark-border dark:bg-dark-bg-primary shadow-sm focus:border-green-500 focus:ring-green-500 dark:text-dark-text-primary">
                    </div>

                    <!-- Source Type -->
                    <div>
                        <label for="source_type" class="block text-sm font-medium text-gray-700 dark:text-dark-text-secondary">Source Type</label>
                        <select name="source_type" id="source_type" required class="mt-1 block w-full rounded-md border-gray-300 dark:border-dark-border dark:bg-dark-bg-primary shadow-sm focus:border-green-500 focus:ring-green-500 dark:text-dark-text-primary">
                            <option value="electricity">Electricity</option>
                            <option value="gas">Natural Gas</option>
                            <option value="water">Water</option>
                        </select>
                    </div>

                    <!-- Amount -->
                    <div>
                        <label for="amount" class="block text-sm font-medium text-gray-700 dark:text-dark-text-secondary">Amount</label>
                        <input type="number" name="amount" id="amount" step="0.01" required class="mt-1 block w-full rounded-md border-gray-300 dark:border-dark-border dark:bg-dark-bg-primary shadow-sm focus:border-green-500 focus:ring-green-500 dark:text-dark-text-primary">
                    </div>

                    <!-- Unit -->
                    <div>
                        <label for="unit" class="block text-sm font-medium text-gray-700 dark:text-dark-text-secondary">Unit</label>
                        <select name="unit" id="unit" required class="mt-1 block w-full rounded-md border-gray-300 dark:border-dark-border dark:bg-dark-bg-primary shadow-sm focus:border-green-500 focus:ring-green-500 dark:text-dark-text-primary">
                            <option value="kwh">kWh</option>
                            <option value="m3">m³</option>
                            <option value="liters">Liters</option>
                        </select>
                    </div>
                </div>

                <!-- Notes -->
                <div>
                    <label for="notes" class="block text-sm font-medium text-gray-700 dark:text-dark-text-secondary">Notes</label>
                    <textarea name="notes" id="notes" rows="3" class="mt-1 block w-full rounded-md border-gray-300 dark:border-dark-border dark:bg-dark-bg-primary shadow-sm focus:border-green-500 focus:ring-green-500 dark:text-dark-text-primary"></textarea>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end">
                    <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        Add Consumption Record
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Consumption History -->
    <div class="bg-white dark:bg-dark-bg-secondary shadow rounded-lg">
        <div class="px-4 py-5 sm:p-6">
            <h3 class="text-lg font-medium text-gray-900 dark:text-dark-text-primary mb-4">Consumption History</h3>
            
            <!-- Filters -->
            <div class="mb-6 grid grid-cols-1 gap-4 sm:grid-cols-3">
                <div>
                    <label for="filter_source" class="block text-sm font-medium text-gray-700 dark:text-dark-text-secondary">Source Type</label>
                    <select id="filter_source" class="mt-1 block w-full rounded-md border-gray-300 dark:border-dark-border dark:bg-dark-bg-primary shadow-sm focus:border-green-500 focus:ring-green-500 dark:text-dark-text-primary">
                        <option value="">All Sources</option>
                        <option value="electricity">Electricity</option>
                        <option value="gas">Natural Gas</option>
                        <option value="water">Water</option>
                    </select>
                </div>
                <div>
                    <label for="filter_date_from" class="block text-sm font-medium text-gray-700 dark:text-dark-text-secondary">From Date</label>
                    <input type="date" id="filter_date_from" class="mt-1 block w-full rounded-md border-gray-300 dark:border-dark-border dark:bg-dark-bg-primary shadow-sm focus:border-green-500 focus:ring-green-500 dark:text-dark-text-primary">
                </div>
                <div>
                    <label for="filter_date_to" class="block text-sm font-medium text-gray-700 dark:text-dark-text-secondary">To Date</label>
                    <input type="date" id="filter_date_to" class="mt-1 block w-full rounded-md border-gray-300 dark:border-dark-border dark:bg-dark-bg-primary shadow-sm focus:border-green-500 focus:ring-green-500 dark:text-dark-text-primary">
                </div>
            </div>

            <!-- Consumption Table -->
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-dark-border">
                    <thead class="bg-gray-50 dark:bg-dark-bg-primary">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-dark-text-secondary uppercase tracking-wider">Date</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-dark-text-secondary uppercase tracking-wider">Source Type</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-dark-text-secondary uppercase tracking-wider">Amount</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-dark-text-secondary uppercase tracking-wider">Unit</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-dark-text-secondary uppercase tracking-wider">Notes</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-dark-text-secondary uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-dark-bg-secondary divide-y divide-gray-200 dark:divide-dark-border">
                        @forelse($consumptions as $consumption)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-dark-text-primary">{{ $consumption->date }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-dark-text-primary">{{ ucfirst($consumption->source_type) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-dark-text-primary">{{ number_format($consumption->amount, 2) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-dark-text-primary">{{ $consumption->unit }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900 dark:text-dark-text-primary">{{ $consumption->notes }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-dark-text-primary">
                                <div class="flex space-x-2">
                                    <button class="text-blue-600 dark:text-blue-400 hover:text-blue-900 dark:hover:text-blue-300">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="text-red-600 dark:text-red-400 hover:text-red-900 dark:hover:text-red-300">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-6 py-4 text-center text-sm text-gray-500 dark:text-dark-text-secondary">
                                No consumption records found.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($consumptions->hasPages())
            <div class="mt-4">
                {{ $consumptions->links() }}
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Filter functionality
    const filterSource = document.getElementById('filter_source');
    const filterDateFrom = document.getElementById('filter_date_from');
    const filterDateTo = document.getElementById('filter_date_to');

    function applyFilters() {
        const source = filterSource.value;
        const dateFrom = filterDateFrom.value;
        const dateTo = filterDateTo.value;

        // Add your filter logic here
        // You can either submit a form or make an AJAX request
        window.location.href = `{{ route('company.energy.history') }}?source=${source}&from=${dateFrom}&to=${dateTo}`;
    }

    filterSource.addEventListener('change', applyFilters);
    filterDateFrom.addEventListener('change', applyFilters);
    filterDateTo.addEventListener('change', applyFilters);
</script>
@endsection 