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
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2E7D32;
            --primary-light: #4CAF50;
            --primary-dark: #1B5E20;
            --secondary-color: #0288D1;
            --accent-color: #FFA000;
            --background-color: #F5F7FA;
            --text-primary: #2C3E50;
            --text-secondary: #546E7A;
        }
        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--background-color);
            color: var(--text-primary);
        }
        .btn-logout {
            transition: all 0.3s ease;
            border-color: var(--primary-color);
            color: var(--primary-color);
        }
        .btn-logout:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            background-color: var(--primary-color);
            color: white;
        }
        .card-hover {
            transition: all 0.3s ease;
            border-color: #E0E0E0;
        }
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
        .gradient-bg {
            background: linear-gradient(135deg, var(--primary-light) 0%, var(--primary-dark) 100%);
        }
        .nav-link {
            position: relative;
            color: var(--text-secondary);
        }
        .nav-link:hover {
            color: var(--primary-color);
        }
        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 0;
            background-color: var(--primary-color);
            transition: width 0.3s ease;
        }
        .nav-link:hover::after {
            width: 100%;
        }
        .activity-item {
            transition: all 0.3s ease;
        }
        .activity-item:hover {
            background-color: #F8FAFC;
            transform: translateX(5px);
        }
        .stats-card-1 {
            border-left: 4px solid var(--primary-color);
        }
        .stats-card-2 {
            border-left: 4px solid var(--secondary-color);
        }
        .stats-card-3 {
            border-left: 4px solid var(--accent-color);
        }
        .stats-card-4 {
            border-left: 4px solid #9C27B0;
        }
        .icon-bg-1 {
            background-color: rgba(46, 125, 50, 0.1);
            color: var(--primary-color);
        }
        .icon-bg-2 {
            background-color: rgba(2, 136, 209, 0.1);
            color: var(--secondary-color);
        }
        .icon-bg-3 {
            background-color: rgba(255, 160, 0, 0.1);
            color: var(--accent-color);
        }
        .icon-bg-4 {
            background-color: rgba(156, 39, 176, 0.1);
            color: #9C27B0;
        }
    </style>
</head>
<<<<<<< HEAD
<body>
    <!-- Navbar -->
    <nav class="bg-white shadow-lg sticky top-0 z-50">
=======
<body class="bg-kahejo-lightest/10">
    <!-- Navbar -->
    <nav class="bg-kahejo-darkest shadow-lg">
>>>>>>> origin/asa_branch
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <!-- Logo -->
                    <div class="flex-shrink-0 flex items-center">
<<<<<<< HEAD
                        <span class="text-2xl font-bold text-transparent bg-clip-text gradient-bg">KaHejo</span>
                    </div>
                    <!-- Navigation Links -->
                    <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                        <a href="{{ route('main') }}" class="nav-link border-green-500 text-gray-900 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            <i class="fas fa-home mr-2"></i>Dashboard
                        </a>
                        <a href="{{ route('profile') }}" class="nav-link border-transparent text-gray-500 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            <i class="fas fa-user mr-2"></i>Profile
                        </a>
                        <a href="{{ route('settings') }}" class="nav-link border-transparent text-gray-500 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            <i class="fas fa-cog mr-2"></i>Settings
                        </a>
                        <a href="{{ route('carbon') }}" class="nav-link border-transparent text-gray-500 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            <i class="fas fa-calculator mr-2"></i>Carbon Calculator
                        </a>
                        <a href="{{ route('company') }}" class="nav-link border-transparent text-gray-500 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            <i class="fas fa-chart-line mr-2"></i>Energy Consumption
=======
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
>>>>>>> origin/asa_branch
                        </a>
                    </div>
                </div>
                <!-- Right side of navbar -->
                <div class="hidden sm:ml-6 sm:flex sm:items-center space-x-4">
                    <!-- Profile dropdown -->
                    <div class="ml-3 relative">
                        <div>
                            <button type="button" class="bg-kahejo-light rounded-full flex text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-kahejo-medium" id="user-menu-button">
                                <span class="sr-only">Open user menu</span>
                                <img class="h-8 w-8 rounded-full ring-2 ring-green-500" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="User">
                            </button>
                        </div>
                    </div>
                    <!-- Logout Button -->
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="btn-logout inline-flex items-center px-4 py-2 border rounded-full text-sm font-medium focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors duration-200">
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
            <h1 class="text-3xl font-bold text-gray-900">Welcome back, {{ Auth::user()->name }}!</h1>
            <p class="mt-2 text-gray-600">Here's what's happening with your carbon footprint today.</p>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
            <!-- Card 1 -->
<<<<<<< HEAD
            <div class="card-hover bg-white overflow-hidden shadow rounded-lg border border-gray-100 stats-card-1">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="p-3 rounded-full icon-bg-1">
                                <i class="fas fa-users text-2xl"></i>
                            </div>
=======
            <div class="bg-white overflow-hidden shadow rounded-lg border border-kahejo-light/20">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-users text-kahejo-dark text-2xl"></i>
>>>>>>> origin/asa_branch
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-kahejo-medium truncate">Total Users</dt>
                                <dd class="flex items-baseline">
<<<<<<< HEAD
                                    <div class="text-2xl font-semibold text-gray-900">{{ number_format($stats['totalUsers']) }}</div>
                                    <div class="ml-2 flex items-baseline text-sm font-semibold text-green-600">
                                        <i class="fas fa-arrow-up"></i>
                                        <span class="sr-only">Increased by</span>
                                        12%
                                    </div>
=======
                                    <div class="text-2xl font-semibold text-kahejo-darkest">{{ number_format($stats['totalUsers']) }}</div>
>>>>>>> origin/asa_branch
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
<<<<<<< HEAD
            <div class="card-hover bg-white overflow-hidden shadow rounded-lg border border-gray-100 stats-card-2">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="p-3 rounded-full icon-bg-2">
                                <i class="fas fa-chart-line text-2xl"></i>
                            </div>
=======
            <div class="bg-white overflow-hidden shadow rounded-lg border border-kahejo-light/20">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-chart-line text-kahejo-dark text-2xl"></i>
>>>>>>> origin/asa_branch
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-kahejo-medium truncate">Growth</dt>
                                <dd class="flex items-baseline">
<<<<<<< HEAD
                                    <div class="text-2xl font-semibold text-gray-900">{{ $stats['growth'] }}%</div>
                                    <div class="ml-2 flex items-baseline text-sm font-semibold text-blue-600">
                                        <i class="fas fa-arrow-up"></i>
                                        <span class="sr-only">Increased by</span>
                                        8%
                                    </div>
=======
                                    <div class="text-2xl font-semibold text-kahejo-darkest">{{ $stats['growth'] }}%</div>
>>>>>>> origin/asa_branch
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
<<<<<<< HEAD
            <div class="card-hover bg-white overflow-hidden shadow rounded-lg border border-gray-100 stats-card-3">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="p-3 rounded-full icon-bg-3">
                                <i class="fas fa-tasks text-2xl"></i>
                            </div>
=======
            <div class="bg-white overflow-hidden shadow rounded-lg border border-kahejo-light/20">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-tasks text-kahejo-dark text-2xl"></i>
>>>>>>> origin/asa_branch
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-kahejo-medium truncate">Active Tasks</dt>
                                <dd class="flex items-baseline">
<<<<<<< HEAD
                                    <div class="text-2xl font-semibold text-gray-900">{{ $stats['activeTasks'] }}</div>
                                    <div class="ml-2 flex items-baseline text-sm font-semibold text-yellow-600">
                                        <i class="fas fa-arrow-up"></i>
                                        <span class="sr-only">Increased by</span>
                                        5%
                                    </div>
=======
                                    <div class="text-2xl font-semibold text-kahejo-darkest">{{ $stats['activeTasks'] }}</div>
>>>>>>> origin/asa_branch
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 4 -->
<<<<<<< HEAD
            <div class="card-hover bg-white overflow-hidden shadow rounded-lg border border-gray-100 stats-card-4">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="p-3 rounded-full icon-bg-4">
                                <i class="fas fa-calendar-check text-2xl"></i>
                            </div>
=======
            <div class="bg-white overflow-hidden shadow rounded-lg border border-kahejo-light/20">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-calendar-check text-kahejo-dark text-2xl"></i>
>>>>>>> origin/asa_branch
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-kahejo-medium truncate">Completed</dt>
                                <dd class="flex items-baseline">
<<<<<<< HEAD
                                    <div class="text-2xl font-semibold text-gray-900">{{ $stats['completed'] }}</div>
                                    <div class="ml-2 flex items-baseline text-sm font-semibold text-purple-600">
                                        <i class="fas fa-arrow-up"></i>
                                        <span class="sr-only">Increased by</span>
                                        15%
                                    </div>
=======
                                    <div class="text-2xl font-semibold text-kahejo-darkest">{{ $stats['completed'] }}</div>
>>>>>>> origin/asa_branch
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="mt-8">
<<<<<<< HEAD
            <div class="bg-white shadow rounded-lg border border-gray-100">
                <div class="px-4 py-5 sm:px-6 flex justify-between items-center">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Recent Activity</h3>
                    <button class="text-sm text-green-600 hover:text-green-700 font-medium">
                        View All
                    </button>
                </div>
                <div class="border-t border-gray-200">
                    <ul class="divide-y divide-gray-200">
                        @foreach($activities as $activity)
                        <li class="activity-item px-4 py-4 sm:px-6">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <div class="p-2 rounded-full icon-bg-1">
                                            <i class="fas fa-{{ $activity['icon'] }}"></i>
                                        </div>
=======
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
>>>>>>> origin/asa_branch
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
                                <div class="text-sm text-gray-500">
                                    <i class="fas fa-chevron-right"></i>
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

<<<<<<< HEAD
    <!-- Footer -->
    <footer class="bg-white mt-8">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <p class="text-center text-gray-500 text-sm">
                &copy; {{ date('Y') }} KaHejo. All rights reserved.
            </p>
        </div>
    </footer>
=======
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
>>>>>>> origin/asa_branch
</body>
</html>