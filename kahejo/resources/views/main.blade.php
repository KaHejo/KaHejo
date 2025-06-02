@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <!-- Welcome Section -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-dark-text-primary">Welcome back, {{ Auth::user()->name }}!</h1>
        <p class="mt-2 text-gray-600 dark:text-dark-text-secondary">Here's what's happening with your carbon footprint today.</p>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
        <!-- Card 1 -->
        <div class="card-hover bg-white dark:bg-dark-bg-secondary overflow-hidden shadow rounded-lg border border-gray-100 dark:border-dark-border">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="p-3 rounded-full bg-green-50 dark:bg-green-900/30">
                            <i class="fas fa-leaf text-green-600 dark:text-green-400 text-2xl"></i>
                        </div>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 dark:text-dark-text-secondary truncate">Total Carbon Footprint</dt>
                            <dd class="flex items-baseline">
                                <div class="text-2xl font-semibold text-gray-900 dark:text-dark-text-primary">{{ number_format($stats['totalCarbonFootprint'], 2) }} kg</div>
                            </dd>
                            <dd class="text-sm text-gray-500 dark:text-dark-text-secondary mt-1">Last 12 months</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="card-hover bg-white dark:bg-dark-bg-secondary overflow-hidden shadow rounded-lg border border-gray-100 dark:border-dark-border">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="p-3 rounded-full bg-green-50 dark:bg-green-900/30">
                            <i class="fas fa-chart-line text-green-600 dark:text-green-400 text-2xl"></i>
                        </div>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 dark:text-dark-text-secondary truncate">Monthly Average</dt>
                            <dd class="flex items-baseline">
                                <div class="text-2xl font-semibold text-gray-900 dark:text-dark-text-primary">{{ number_format($stats['averageMonthlyFootprint'], 2) }} kg</div>
                            </dd>
                            <dd class="text-sm text-gray-500 dark:text-dark-text-secondary mt-1">Based on monthly records</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="card-hover bg-white dark:bg-dark-bg-secondary overflow-hidden shadow rounded-lg border border-gray-100 dark:border-dark-border">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="p-3 rounded-full bg-green-50 dark:bg-green-900/30">
                            <i class="fas fa-calendar-alt text-green-600 dark:text-green-400 text-2xl"></i>
                        </div>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 dark:text-dark-text-secondary truncate">Last Month</dt>
                            <dd class="flex items-baseline">
                                <div class="text-2xl font-semibold text-gray-900 dark:text-dark-text-primary">{{ number_format($stats['lastMonthFootprint'], 2) }} kg</div>
                            </dd>
                            <dd class="text-sm text-gray-500 dark:text-dark-text-secondary mt-1">{{ $carbonHistory->first()['date'] ?? 'No data' }}</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 4 -->
        <div class="card-hover bg-white dark:bg-dark-bg-secondary overflow-hidden shadow rounded-lg border border-gray-100 dark:border-dark-border">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="p-3 rounded-full bg-green-50 dark:bg-green-900/30">
                            <i class="fas fa-arrow-trend-up text-green-600 dark:text-green-400 text-2xl"></i>
                        </div>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 dark:text-dark-text-secondary truncate">Improvement</dt>
                            <dd class="flex items-baseline">
                                <div class="text-2xl font-semibold text-gray-900 dark:text-dark-text-primary">{{ number_format($stats['improvement'] ?? 0, 2) }}%</div>
                            </dd>
                            <dd class="text-sm text-gray-500 dark:text-dark-text-secondary mt-1">Compared to last month</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Lowest Carbon Footprint Card -->
    <div class="mt-8">
        <div class="card-hover bg-white dark:bg-dark-bg-secondary overflow-hidden shadow rounded-lg border border-gray-100 dark:border-dark-border">
            <div class="px-4 py-5 sm:px-6 border-b border-gray-100 dark:border-dark-border">
                <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-dark-text-primary">Lowest Carbon Footprint Achievement</h3>
                <p class="mt-1 text-sm text-gray-500 dark:text-dark-text-secondary">Your best performance in reducing carbon emissions</p>
            </div>
            <div class="p-5">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Main Achievement -->
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="p-4 rounded-full bg-green-50 dark:bg-green-900/30">
                                <i class="fas fa-trophy text-green-600 dark:text-green-400 text-3xl"></i>
                            </div>
                        </div>
                        <div class="ml-5">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 dark:text-dark-text-secondary">Lowest Carbon Footprint</dt>
                                <dd class="flex items-baseline">
                                    <div class="text-3xl font-bold text-gray-900 dark:text-dark-text-primary">{{ number_format($stats['lowestFootprint']['value'] ?? 0, 2) }} kg</div>
                                </dd>
                                <dd class="text-sm text-gray-500 dark:text-dark-text-secondary mt-1">Achieved on {{ $stats['lowestFootprint']['date'] ?? 'No data' }}</dd>
                            </dl>
                        </div>
                    </div>

                    <!-- Additional Details -->
                    <div class="space-y-4">
                        <div class="bg-gray-50 dark:bg-dark-bg-primary p-4 rounded-lg">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm text-gray-500 dark:text-dark-text-secondary">Improvement from Average</p>
                                    <p class="text-xl font-semibold text-green-600 dark:text-green-400">
                                        {{ number_format((($stats['averageMonthlyFootprint'] - ($stats['lowestFootprint']['value'] ?? 0)) / $stats['averageMonthlyFootprint']) * 100, 1) }}%
                                    </p>
                                </div>
                                <div class="p-2 rounded-full bg-green-50 dark:bg-green-900/30">
                                    <i class="fas fa-arrow-trend-down text-green-600 dark:text-green-400 text-xl"></i>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 dark:bg-dark-bg-primary p-4 rounded-lg">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm text-gray-500 dark:text-dark-text-secondary">Carbon Saved</p>
                                    <p class="text-xl font-semibold text-gray-900 dark:text-dark-text-primary">
                                        {{ number_format($stats['averageMonthlyFootprint'] - ($stats['lowestFootprint']['value'] ?? 0), 2) }} kg
                                    </p>
                                </div>
                                <div class="p-2 rounded-full bg-blue-50 dark:bg-blue-900/30">
                                    <i class="fas fa-leaf text-blue-600 dark:text-blue-400 text-xl"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activities -->
    <div class="mt-8">
        <h2 class="text-lg font-semibold text-gray-900 dark:text-dark-text-primary mb-4">Recent Activities</h2>
        <div class="bg-white dark:bg-dark-bg-secondary shadow rounded-lg divide-y divide-gray-200 dark:divide-dark-border">
            @forelse($activities as $activity)
                <div class="p-4 flex items-center">
                    <div class="flex-shrink-0">
                        <div class="p-2 rounded-full bg-{{ $activity['color'] }}-50 dark:bg-{{ $activity['color'] }}-900/30">
                            <i class="fas fa-{{ $activity['icon'] }} text-{{ $activity['color'] }}-600 dark:text-{{ $activity['color'] }}-400"></i>
                        </div>
                    </div>
                    <div class="ml-4 flex-1">
                        <p class="text-sm font-medium text-gray-900 dark:text-dark-text-primary">{{ $activity['title'] }}</p>
                        <p class="text-sm text-gray-500 dark:text-dark-text-secondary">{{ $activity['time'] }}</p>
                        @if(isset($activity['value']))
                            <p class="text-sm text-gray-600 dark:text-dark-text-secondary">Carbon footprint: {{ number_format($activity['value'], 2) }} kg</p>
                        @endif
                    </div>
                </div>
            @empty
                <div class="p-4 text-center text-gray-500 dark:text-dark-text-secondary">
                    No recent activities found.
                </div>
            @endforelse
        </div>
    </div>

    <!-- Carbon Footprint History -->
    <div class="mt-8">
        <div class="bg-white dark:bg-dark-bg-secondary shadow rounded-lg border border-gray-100 dark:border-dark-border">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-dark-text-primary">Carbon Footprint History</h3>
                <p class="mt-1 text-sm text-gray-500 dark:text-dark-text-secondary">Your carbon footprint trends over the last 12 months.</p>
            </div>
            <div class="border-t border-gray-100 dark:border-dark-border px-4 py-5 sm:p-6">
                <div class="h-96">
                    <canvas id="carbonChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Energy Consumption Visualization -->
    <div class="mt-8">
        <div class="bg-white dark:bg-dark-bg-secondary shadow rounded-lg border border-gray-100 dark:border-dark-border">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-dark-text-primary">Energy Consumption Analysis</h3>
                <p class="mt-1 text-sm text-gray-500 dark:text-dark-text-secondary">Track your energy usage patterns and identify optimization opportunities.</p>
            </div>
            <div class="border-t border-gray-100 dark:border-dark-border px-4 py-5 sm:p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Main Chart -->
                    <div class="h-96">
                        <canvas id="energyChart"></canvas>
                    </div>
                    <!-- Stats Cards -->
                    <div class="space-y-4">
                        <div class="bg-gray-50 dark:bg-dark-bg-primary p-4 rounded-lg">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm text-gray-500 dark:text-dark-text-secondary">Total Energy Usage</p>
                                    <p class="text-2xl font-semibold text-gray-900 dark:text-dark-text-primary">{{ number_format($energyStats['totalUsage'] ?? 0, 2) }} kWh</p>
                                </div>
                                <div class="p-3 rounded-full bg-blue-50 dark:bg-blue-900/30">
                                    <i class="fas fa-bolt text-blue-600 dark:text-blue-400 text-xl"></i>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 dark:bg-dark-bg-primary p-4 rounded-lg">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm text-gray-500 dark:text-dark-text-secondary">Average Daily Usage</p>
                                    <p class="text-2xl font-semibold text-gray-900 dark:text-dark-text-primary">{{ number_format($energyStats['averageDaily'] ?? 0, 2) }} kWh</p>
                                </div>
                                <div class="p-3 rounded-full bg-green-50 dark:bg-green-900/30">
                                    <i class="fas fa-chart-line text-green-600 dark:text-green-400 text-xl"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Prepare data for the chart
    const carbonData = @json($carbonHistory);
    const dates = carbonData.map(item => item.date);
    const totals = carbonData.map(item => item.total);
    const electricity = carbonData.map(item => item.electricity);
    const transportation = carbonData.map(item => item.transportation);
    const waste = carbonData.map(item => item.waste);
    const water = carbonData.map(item => item.water);

    // Chart configuration
    const chartConfig = {
        type: 'line',
        data: {
            labels: dates,
            datasets: [
                {
                    label: 'Total',
                    data: totals,
                    borderColor: 'rgb(34, 197, 94)',
                    backgroundColor: 'rgba(34, 197, 94, 0.1)',
                    tension: 0.4,
                    fill: true
                },
                {
                    label: 'Electricity',
                    data: electricity,
                    borderColor: 'rgb(234, 179, 8)',
                    backgroundColor: 'rgba(234, 179, 8, 0.1)',
                    tension: 0.4,
                    fill: true
                },
                {
                    label: 'Transportation',
                    data: transportation,
                    borderColor: 'rgb(59, 130, 246)',
                    backgroundColor: 'rgba(59, 130, 246, 0.1)',
                    tension: 0.4,
                    fill: true
                },
                {
                    label: 'Waste',
                    data: waste,
                    borderColor: 'rgb(239, 68, 68)',
                    backgroundColor: 'rgba(239, 68, 68, 0.1)',
                    tension: 0.4,
                    fill: true
                },
                {
                    label: 'Water',
                    data: water,
                    borderColor: 'rgb(168, 85, 247)',
                    backgroundColor: 'rgba(168, 85, 247, 0.1)',
                    tension: 0.4,
                    fill: true
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'top',
                    labels: {
                        color: document.documentElement.classList.contains('dark') ? '#ffffff' : '#374151'
                    }
                },
                title: {
                    display: true,
                    text: 'Monthly Carbon Footprint (kg CO₂)',
                    color: document.documentElement.classList.contains('dark') ? '#ffffff' : '#374151'
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'kg CO₂',
                        color: document.documentElement.classList.contains('dark') ? '#ffffff' : '#374151'
                    },
                    ticks: {
                        color: document.documentElement.classList.contains('dark') ? '#a0aec0' : '#6B7280'
                    },
                    grid: {
                        color: document.documentElement.classList.contains('dark') ? 'rgba(255, 255, 255, 0.1)' : 'rgba(0, 0, 0, 0.1)'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Month',
                        color: document.documentElement.classList.contains('dark') ? '#ffffff' : '#374151'
                    },
                    ticks: {
                        color: document.documentElement.classList.contains('dark') ? '#a0aec0' : '#6B7280',
                        maxRotation: 45,
                        minRotation: 45
                    },
                    grid: {
                        color: document.documentElement.classList.contains('dark') ? 'rgba(255, 255, 255, 0.1)' : 'rgba(0, 0, 0, 0.1)'
                    }
                }
            }
        }
    };

    // Create the carbon chart
    const carbonChart = new Chart(
        document.getElementById('carbonChart'),
        chartConfig
    );

    // Prepare energy data
    const energyData = @json($energyConsumption);
    const energyDates = energyData.map(item => item.date);
    const electricityData = energyData.map(item => item.electricity);
    const gasData = energyData.map(item => item.gas);
    const waterData = energyData.map(item => item.water);

    // Energy chart configuration
    const energyChartConfig = {
        type: 'bar',
        data: {
            labels: energyDates,
            datasets: [
                {
                    label: 'Electricity',
                    data: electricityData,
                    backgroundColor: 'rgba(234, 179, 8, 0.7)',
                    borderColor: 'rgb(234, 179, 8)',
                    borderWidth: 1
                },
                {
                    label: 'Gas',
                    data: gasData,
                    backgroundColor: 'rgba(239, 68, 68, 0.7)',
                    borderColor: 'rgb(239, 68, 68)',
                    borderWidth: 1
                },
                {
                    label: 'Water',
                    data: waterData,
                    backgroundColor: 'rgba(59, 130, 246, 0.7)',
                    borderColor: 'rgb(59, 130, 246)',
                    borderWidth: 1
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'top',
                    labels: {
                        color: document.documentElement.classList.contains('dark') ? '#ffffff' : '#374151'
                    }
                },
                title: {
                    display: true,
                    text: 'Monthly Energy Consumption (kWh)',
                    color: document.documentElement.classList.contains('dark') ? '#ffffff' : '#374151'
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'kWh',
                        color: document.documentElement.classList.contains('dark') ? '#ffffff' : '#374151'
                    },
                    ticks: {
                        color: document.documentElement.classList.contains('dark') ? '#a0aec0' : '#6B7280'
                    },
                    grid: {
                        color: document.documentElement.classList.contains('dark') ? 'rgba(255, 255, 255, 0.1)' : 'rgba(0, 0, 0, 0.1)'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Month',
                        color: document.documentElement.classList.contains('dark') ? '#ffffff' : '#374151'
                    },
                    ticks: {
                        color: document.documentElement.classList.contains('dark') ? '#a0aec0' : '#6B7280',
                        maxRotation: 45,
                        minRotation: 45
                    },
                    grid: {
                        color: document.documentElement.classList.contains('dark') ? 'rgba(255, 255, 255, 0.1)' : 'rgba(0, 0, 0, 0.1)'
                    }
                }
            }
        }
    };

    // Create the energy chart
    const energyChart = new Chart(
        document.getElementById('energyChart'),
        energyChartConfig
    );

    // Update chart colors when dark mode changes
    const observer = new MutationObserver((mutations) => {
        mutations.forEach((mutation) => {
            if (mutation.attributeName === 'class') {
                const isDark = document.documentElement.classList.contains('dark');
                const textColor = isDark ? '#ffffff' : '#374151';
                const gridColor = isDark ? 'rgba(255, 255, 255, 0.1)' : 'rgba(0, 0, 0, 0.1)';

                // Update carbon chart
                carbonChart.options.plugins.legend.labels.color = textColor;
                carbonChart.options.plugins.title.color = textColor;
                carbonChart.options.scales.y.title.color = textColor;
                carbonChart.options.scales.y.ticks.color = isDark ? '#a0aec0' : '#6B7280';
                carbonChart.options.scales.x.title.color = textColor;
                carbonChart.options.scales.x.ticks.color = isDark ? '#a0aec0' : '#6B7280';
                carbonChart.options.scales.y.grid.color = gridColor;
                carbonChart.options.scales.x.grid.color = gridColor;
                carbonChart.update();

                // Update energy chart
                energyChart.options.plugins.legend.labels.color = textColor;
                energyChart.options.plugins.title.color = textColor;
                energyChart.options.scales.y.title.color = textColor;
                energyChart.options.scales.y.ticks.color = isDark ? '#a0aec0' : '#6B7280';
                energyChart.options.scales.x.title.color = textColor;
                energyChart.options.scales.x.ticks.color = isDark ? '#a0aec0' : '#6B7280';
                energyChart.options.scales.y.grid.color = gridColor;
                energyChart.options.scales.x.grid.color = gridColor;
                energyChart.update();
            }
        });
    });

    observer.observe(document.documentElement, {
        attributes: true,
        attributeFilter: ['class']
    });
</script>
@endsection
