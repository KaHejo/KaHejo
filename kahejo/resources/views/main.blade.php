<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KaHejo - Dashboard</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'kahejo': {
                            'darkest': '#3E362E',
                            'dark': '#865D36',
                            'medium': '#93785B',
                            'light': '#AC8968',
                            'lightest': '#A69080',
                        },
                    },
                },
            },
        }
    </script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-kahejo-lightest/10">
    <!-- Navbar -->
    <nav class="bg-kahejo-darkest shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <!-- Logo -->
                    <div class="flex-shrink-0 flex items-center">
                        <span class="text-2xl font-bold text-kahejo-light">KaHejo</span>
                    </div>
                    <!-- Navigation Links -->
                    <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                        <a href="{{ route('main') }}" class="border-kahejo-light text-kahejo-lightest inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Dashboard
                        </a>
                        <a href="{{ route('profile') }}" class="border-transparent text-kahejo-light hover:border-kahejo-medium hover:text-kahejo-lightest inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Profile
                        </a>
                        <a href="{{ route('settings') }}" class="border-transparent text-kahejo-light hover:border-kahejo-medium hover:text-kahejo-lightest inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Settings
                        </a>
                        <a href="{{ route('carbon') }}" class="border-transparent text-kahejo-light hover:border-kahejo-medium hover:text-kahejo-lightest inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Carbon Calculator
                        </a>
                    </div>
                </div>
                <!-- Right side of navbar -->
                <div class="hidden sm:ml-6 sm:flex sm:items-center">
                    <!-- Profile dropdown -->
                    <div class="ml-3 relative">
                        <div>
                            <button type="button" class="bg-kahejo-light rounded-full flex text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-kahejo-medium" id="user-menu-button">
                                <span class="sr-only">Open user menu</span>
                                <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="User">
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <!-- Stats Cards -->
        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
            <!-- Card 1 -->
            <div class="bg-white overflow-hidden shadow rounded-lg border border-kahejo-light/20">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-users text-kahejo-dark text-2xl"></i>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-kahejo-medium truncate">Total Users</dt>
                                <dd class="flex items-baseline">
                                    <div class="text-2xl font-semibold text-kahejo-darkest">{{ number_format($stats['totalUsers']) }}</div>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="bg-white overflow-hidden shadow rounded-lg border border-kahejo-light/20">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-chart-line text-kahejo-dark text-2xl"></i>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-kahejo-medium truncate">Growth</dt>
                                <dd class="flex items-baseline">
                                    <div class="text-2xl font-semibold text-kahejo-darkest">{{ $stats['growth'] }}%</div>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="bg-white overflow-hidden shadow rounded-lg border border-kahejo-light/20">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-tasks text-kahejo-dark text-2xl"></i>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-kahejo-medium truncate">Active Tasks</dt>
                                <dd class="flex items-baseline">
                                    <div class="text-2xl font-semibold text-kahejo-darkest">{{ $stats['activeTasks'] }}</div>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="bg-white overflow-hidden shadow rounded-lg border border-kahejo-light/20">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-calendar-check text-kahejo-dark text-2xl"></i>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-kahejo-medium truncate">Completed</dt>
                                <dd class="flex items-baseline">
                                    <div class="text-2xl font-semibold text-kahejo-darkest">{{ $stats['completed'] }}</div>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="mt-8">
            <div class="bg-white shadow rounded-lg border border-kahejo-light/20">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-kahejo-darkest">Recent Carbon Calculations</h3>
                </div>
                <div class="border-t border-kahejo-light/20">
                    <ul class="divide-y divide-kahejo-light/20">
                        @foreach($carbonHistory->take(3) as $calculation)
                        <li class="px-4 py-4 sm:px-6 hover:bg-kahejo-lightest/5">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <i class="fas fa-calculator text-kahejo-dark"></i>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-kahejo-darkest">Carbon Calculation for {{ $calculation['date'] }}</p>
                                        <div class="text-sm text-kahejo-medium">
                                            <span class="inline-block mr-4">Total: {{ number_format($calculation['total'], 2) }} kg CO₂</span>
                                            <span class="inline-block mr-4">Electricity: {{ number_format($calculation['electricity'], 2) }} kg CO₂</span>
                                            <span class="inline-block mr-4">Transportation: {{ number_format($calculation['transportation'], 2) }} kg CO₂</span>
                                            <span class="inline-block mr-4">Waste: {{ number_format($calculation['waste'], 2) }} kg CO₂</span>
                                            <span class="inline-block">Water: {{ number_format($calculation['water'], 2) }} kg CO₂</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <!-- Carbon Footprint History -->
        <div class="mt-8">
            <div class="bg-white shadow rounded-lg border border-kahejo-light/20">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-kahejo-darkest">Carbon Footprint History</h3>
                    <p class="mt-1 text-sm text-kahejo-medium">Your carbon footprint trends over the last 12 months.</p>
                </div>
                <div class="border-t border-kahejo-light/20 px-4 py-5 sm:p-6">
                    <!-- Chart Container -->
                    <div class="h-96">
                        <canvas id="carbonChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

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

        // Create the chart
        const ctx = document.getElementById('carbonChart').getContext('2d');
        new Chart(ctx, {
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
                    },
                    title: {
                        display: true,
                        text: 'Monthly Carbon Footprint (kg CO₂)',
                        color: '#374151'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'kg CO₂',
                            color: '#374151'
                        },
                        ticks: {
                            color: '#6B7280'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Month',
                            color: '#374151'
                        },
                        ticks: {
                            color: '#6B7280'
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>
