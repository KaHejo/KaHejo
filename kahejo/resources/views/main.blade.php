<!DOCTYPE html>
<html lang="en" class="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KaHejo - Dashboard</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        dark: {
                            'bg-primary': '#1a1a1a',
                            'bg-secondary': '#2d2d2d',
                            'text-primary': '#ffffff',
                            'text-secondary': '#a0aec0',
                            'border': '#404040'
                        }
                    }
                }
            }
        }
    </script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .nav-link {
            position: relative;
            transition: color 0.2s ease;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            margin: 0 0.25rem;
        }
        .nav-link:hover {
            color: #10B981;
            background-color: #F3F4F6;
        }
        .dark .nav-link:hover {
            background-color: #2d2d2d;
        }
        .nav-link.active {
            color: #10B981;
            background-color: #F3F4F6;
        }
        .dark .nav-link.active {
            background-color: #2d2d2d;
        }
        .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 100%;
            height: 2px;
            background: linear-gradient(to right, #10B981, #059669);
            border-radius: 2px;
        }
        .nav-icon {
            transition: transform 0.2s ease;
        }
        .nav-link:hover .nav-icon {
            transform: translateY(-1px);
        }
        .logo-text {
            background: linear-gradient(to right, #10B981, #059669);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            font-weight: 700;
        }
        .user-profile {
            transition: transform 0.2s ease;
        }
        .user-profile:hover {
            transform: translateY(-1px);
        }
        .logout-btn {
            transition: all 0.2s ease;
            background: linear-gradient(to right, #10B981, #059669);
            color: white;
            padding: 0.5rem 1.25rem;
            border-radius: 9999px;
            font-weight: 500;
            border: none;
        }
        .logout-btn:hover {
            opacity: 0.9;
            transform: translateY(-1px);
        }
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
</head>
<body class="bg-gray-50 dark:bg-dark-bg-primary transition-colors duration-200">
    <!-- Navbar -->
    <nav class="bg-white dark:bg-dark-bg-secondary shadow-md transition-colors duration-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <!-- Logo and Navigation -->
                <div class="flex items-center">
                    <div class="flex-shrink-0 flex items-center">
                        <span class="logo-text text-2xl">KaHejo</span>
                    </div>
                    <div class="hidden md:flex md:ml-10">
                        <a href="{{ route('dashboard') }}" class="nav-link active flex items-center text-sm font-medium dark:text-dark-text-primary">
                            <i class="nav-icon fas fa-home text-lg mr-2"></i>
                            Dashboard
                        </a>
                        <a href="{{ route('profile') }}" class="nav-link flex items-center text-sm font-medium text-gray-500 dark:text-dark-text-secondary">
                            <i class="nav-icon fas fa-user text-lg mr-2"></i>
                            Profile
                        </a>
                        <a href="{{ route('carbon') }}" class="nav-link flex items-center text-sm font-medium text-gray-500 dark:text-dark-text-secondary">
                            <i class="nav-icon fas fa-calculator text-lg mr-2"></i>
                            Carbon Calculator
                        </a>
                        <a href="{{ route('company') }}" class="nav-link flex items-center text-sm font-medium text-gray-500 dark:text-dark-text-secondary">
                            <i class="nav-icon fas fa-chart-line text-lg mr-2"></i>
                            Energy Consumption
                        </a>
                    </div>
                </div>

                <!-- Right side of navbar -->
                <div class="flex items-center space-x-6">
                    <!-- Dark Mode Toggle -->
                    <button id="darkModeToggle" class="p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-dark-bg-primary transition-colors duration-200">
                        <i class="fas fa-sun text-yellow-500 dark:hidden"></i>
                        <i class="fas fa-moon text-blue-300 hidden dark:block"></i>
                    </button>

                    <!-- User Profile -->
                    <div class="user-profile flex items-center bg-gray-50 dark:bg-dark-bg-primary rounded-full px-3 py-1">
                        <img class="h-8 w-8 rounded-full ring-2 ring-green-500" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="User">
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-900 dark:text-dark-text-primary">{{ Auth::user()->name }}</p>
                            <p class="text-xs text-gray-500 dark:text-dark-text-secondary">User</p>
                        </div>
                    </div>

                    <!-- Logout Button -->
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="logout-btn inline-flex items-center">
                            <i class="fas fa-sign-out-alt mr-2"></i>
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
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
                                <i class="fas fa-arrow-trend-down text-green-600 dark:text-green-400 text-2xl"></i>
                            </div>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 dark:text-dark-text-secondary truncate">Improvement</dt>
                                <dd class="flex items-baseline">
                                    <div class="text-2xl font-semibold text-gray-900 dark:text-dark-text-primary">{{ $stats['improvement'] }}%</div>
                                    <div class="ml-2 flex items-baseline text-sm font-semibold {{ $stats['improvement'] >= 0 ? 'text-green-600 dark:text-green-400' : 'text-red-600 dark:text-red-400' }}">
                                        <i class="fas {{ $stats['improvement'] >= 0 ? 'fa-arrow-down' : 'fa-arrow-up' }}"></i>
                                        <span class="sr-only">{{ $stats['improvement'] >= 0 ? 'Decreased by' : 'Increased by' }}</span>
                                        {{ abs($stats['improvement']) }}%
                                    </div>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Lowest Carbon Footprint Card -->
            @if($stats['lowestFootprint'])
            <div class="col-span-full bg-white dark:bg-dark-bg-secondary overflow-hidden shadow rounded-lg border border-gray-100 dark:border-dark-border card-hover">
                <div class="p-6">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="p-3 rounded-full bg-green-50 dark:bg-green-900/30">
                                    <i class="fas fa-trophy text-green-600 dark:text-green-400 text-2xl"></i>
                                </div>
                            </div>
                            <div class="ml-5">
                                <h3 class="text-lg font-medium text-gray-900 dark:text-dark-text-primary">Lowest Carbon Footprint Achievement</h3>
                                <p class="text-sm text-gray-500 dark:text-dark-text-secondary">Your best performance in reducing carbon emissions</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <div class="text-3xl font-bold text-green-600 dark:text-green-400">{{ number_format($stats['lowestFootprint']['value'], 2) }} kg CO₂</div>
                            <div class="text-sm text-gray-500 dark:text-dark-text-secondary">Achieved in {{ $stats['lowestFootprint']['date'] }}</div>
                        </div>
                    </div>
                    <div class="mt-6 grid grid-cols-4 gap-6">
                        <div class="bg-gray-50 dark:bg-dark-bg-primary p-4 rounded-lg">
                            <div class="text-sm text-gray-500 dark:text-dark-text-secondary">Electricity</div>
                            <div class="mt-1 text-lg font-semibold text-gray-900 dark:text-dark-text-primary">{{ number_format($stats['lowestFootprint']['electricity'], 2) }} kg</div>
                        </div>
                        <div class="bg-gray-50 dark:bg-dark-bg-primary p-4 rounded-lg">
                            <div class="text-sm text-gray-500 dark:text-dark-text-secondary">Transportation</div>
                            <div class="mt-1 text-lg font-semibold text-gray-900 dark:text-dark-text-primary">{{ number_format($stats['lowestFootprint']['transportation'], 2) }} kg</div>
                        </div>
                        <div class="bg-gray-50 dark:bg-dark-bg-primary p-4 rounded-lg">
                            <div class="text-sm text-gray-500 dark:text-dark-text-secondary">Waste</div>
                            <div class="mt-1 text-lg font-semibold text-gray-900 dark:text-dark-text-primary">{{ number_format($stats['lowestFootprint']['waste'], 2) }} kg</div>
                        </div>
                        <div class="bg-gray-50 dark:bg-dark-bg-primary p-4 rounded-lg">
                            <div class="text-sm text-gray-500 dark:text-dark-text-secondary">Water</div>
                            <div class="mt-1 text-lg font-semibold text-gray-900 dark:text-dark-text-primary">{{ number_format($stats['lowestFootprint']['water'], 2) }} kg</div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
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
        // Dark mode toggle functionality
        const darkModeToggle = document.getElementById('darkModeToggle');
        const html = document.documentElement;
        
        // Check for saved theme preference
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            html.classList.add('dark');
        } else {
            html.classList.remove('dark');
        }

        // Toggle dark mode
        darkModeToggle.addEventListener('click', () => {
            html.classList.toggle('dark');
            localStorage.theme = html.classList.contains('dark') ? 'dark' : 'light';
        });

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
                            color: html.classList.contains('dark') ? '#ffffff' : '#374151'
                        }
                    },
                    title: {
                        display: true,
                        text: 'Monthly Carbon Footprint (kg CO₂)',
                        color: html.classList.contains('dark') ? '#ffffff' : '#374151'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'kg CO₂',
                            color: html.classList.contains('dark') ? '#ffffff' : '#374151'
                        },
                        ticks: {
                            color: html.classList.contains('dark') ? '#a0aec0' : '#6B7280'
                        },
                        grid: {
                            color: html.classList.contains('dark') ? 'rgba(255, 255, 255, 0.1)' : 'rgba(0, 0, 0, 0.1)'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Month',
                            color: html.classList.contains('dark') ? '#ffffff' : '#374151'
                        },
                        ticks: {
                            color: html.classList.contains('dark') ? '#a0aec0' : '#6B7280'
                        },
                        grid: {
                            color: html.classList.contains('dark') ? 'rgba(255, 255, 255, 0.1)' : 'rgba(0, 0, 0, 0.1)'
                        }
                    }
                }
            }
        };

        // Create the chart
        const ctx = document.getElementById('carbonChart').getContext('2d');
        const chart = new Chart(ctx, chartConfig);

        // Update chart colors when dark mode changes
        darkModeToggle.addEventListener('click', () => {
            const isDark = html.classList.contains('dark');
            
            // Update chart colors
            chart.options.plugins.legend.labels.color = isDark ? '#ffffff' : '#374151';
            chart.options.plugins.title.color = isDark ? '#ffffff' : '#374151';
            chart.options.scales.y.title.color = isDark ? '#ffffff' : '#374151';
            chart.options.scales.y.ticks.color = isDark ? '#a0aec0' : '#6B7280';
            chart.options.scales.x.title.color = isDark ? '#ffffff' : '#374151';
            chart.options.scales.x.ticks.color = isDark ? '#a0aec0' : '#6B7280';
            chart.options.scales.y.grid.color = isDark ? 'rgba(255, 255, 255, 0.1)' : 'rgba(0, 0, 0, 0.1)';
            chart.options.scales.x.grid.color = isDark ? 'rgba(255, 255, 255, 0.1)' : 'rgba(0, 0, 0, 0.1)';
            
            chart.update();
        });
    </script>
</body>
</html>
