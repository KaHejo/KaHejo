<!DOCTYPE html>
<html lang="en" class="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Energy Consumption History') - KaHejo</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        'kahejo': {
                            'darkest': '#064e3b',  // Darkest green
                            'dark': '#059669',     // Dark green
                            'medium': '#10b981',   // Medium green
                            'light': '#34d399',    // Light green
                            'lightest': '#6ee7b7', // Lightest green
                        },
                        dark: {
                            'bg-primary': '#000000',
                            'bg-secondary': '#0a0a0a',
                            'text-primary': '#ffffff',
                            'text-secondary': '#a0aec0',
                            'border': '#404040'
                        }
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-in-out',
                        'slide-up': 'slideUp 0.5s ease-out',
                        'bounce-in': 'bounceIn 0.5s ease-out',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' },
                        },
                        slideUp: {
                            '0%': { transform: 'translateY(20px)', opacity: '0' },
                            '100%': { transform: 'translateY(0)', opacity: '1' },
                        },
                        bounceIn: {
                            '0%': { transform: 'scale(0.3)', opacity: '0' },
                            '50%': { transform: 'scale(1.05)', opacity: '0.8' },
                            '100%': { transform: 'scale(1)', opacity: '1' },
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
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
            background-color: rgba(16, 185, 129, 0.1);
            transform: translateY(-2px);
        }
        .dark .nav-link:hover {
            background-color: rgba(16, 185, 129, 0.2);
        }
        .nav-link.active {
            color: #10B981;
            background-color: rgba(16, 185, 129, 0.1);
        }
        .dark .nav-link.active {
            background-color: rgba(16, 185, 129, 0.2);
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
            animation: slideIn 0.3s ease-out;
        }
        @keyframes slideIn {
            from { transform: scaleX(0); }
            to { transform: scaleX(1); }
        }
        .nav-icon {
            transition: transform 0.3s ease;
        }
        .nav-link:hover .nav-icon {
            transform: translateY(-2px) scale(1.1);
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
        .stat-card {
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            transform: translateX(-100%);
            transition: 0.5s;
        }
        .stat-card:hover::before {
            transform: translateX(100%);
        }
        .chart-container {
            transition: all 0.3s ease;
        }
        .chart-container:hover {
            transform: scale(1.02);
        }
        .table-container {
            transition: all 0.3s ease;
        }
        .table-container:hover {
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        .table-row {
            transition: all 0.2s ease;
        }
        .table-row:hover {
            transform: scale(1.01);
            background-color: #F9FAFB;
        }
        .badge {
            transition: all 0.2s ease;
        }
        .badge:hover {
            transform: scale(1.05);
        }
        .animate-fade-in {
            animation: fadeIn 0.5s ease-in-out;
        }
        .animate-slide-up {
            animation: slideUp 0.5s ease-out;
        }
        .animate-bounce-in {
            animation: bounceIn 0.5s ease-out;
        }
        .pagination-link {
            transition: all 0.2s ease;
        }
        .pagination-link:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
    @stack('styles')
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
                        <a href="{{ route('main') }}" class="nav-link flex items-center text-sm font-medium text-gray-500 {{ request()->routeIs('main') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-home text-lg mr-2"></i>
                            Dashboard
                        </a>
                        <a href="{{ route('profile') }}" class="nav-link flex items-center text-sm font-medium text-gray-500 {{ request()->routeIs('profile') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-user text-lg mr-2"></i>
                            Profile
                        </a>
                        <a href="{{ route('carbon') }}" class="nav-link flex items-center text-sm font-medium text-gray-500 {{ request()->routeIs('carbon') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-calculator text-lg mr-2"></i>
                            Carbon Calculator
                        </a>
                        <a href="{{ route('company') }}" class="nav-link flex items-center text-sm font-medium text-gray-500 {{ request()->routeIs('company') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-chart-line text-lg mr-2"></i>
                            Energy Consumption
                        </a>
                        <a href="{{ route('achievements') }}" class="nav-link flex items-center text-sm font-medium text-gray-500 {{ request()->routeIs('achievements.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-trophy text-lg mr-2"></i>
                            Achievements
                        </a>
                        <a href="{{ route('education') }}" class="nav-link flex items-center text-sm font-medium text-gray-500 {{ request()->routeIs('education') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-trophy text-lg mr-2"></i>
                            Education
                        </a>
                        <a href="{{ route('faqs.index') }}" class="nav-link flex items-center text-sm font-medium text-gray-500 {{ request()->routeIs('faqs.index') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-question-circle text-lg mr-2"></i>
                            FAQ
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

                    <!-- User Profile Dropdown -->
                    <div class="relative">
                        <button id="userMenuButton" class="user-profile flex items-center bg-gray-50 dark:bg-dark-bg-primary rounded-full px-3 py-1 cursor-pointer">
                            <img class="h-8 w-8 rounded-full ring-2 ring-green-500" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="User">
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-900 dark:text-dark-text-primary">{{ Auth::user()->name }}</p>
                                <p class="text-xs text-gray-500 dark:text-dark-text-secondary">User</p>
                            </div>
                        </button>

                        <!-- Dropdown menu -->
                        <div id="userDropdown" class="hidden absolute right-0 mt-2 w-48 bg-white dark:bg-dark-bg-secondary rounded-md shadow-lg py-1 ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                            <form action="{{ route('logout') }}" method="POST" class="w-full text-left">
                                @csrf
                                <button type="submit" class="block w-full px-4 py-2 text-sm text-gray-700 dark:text-dark-text-primary hover:bg-gray-100 dark:hover:bg-dark-bg-primary" role="menuitem" tabindex="-1" id="menu-item-0">
                                    <i class="fas fa-sign-out-alt mr-2"></i>
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Flash Messages -->
    @if(session('success'))
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
        <div class="bg-green-100 dark:bg-green-900/30 border border-green-400 text-green-700 dark:text-green-400 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    </div>
    @endif

    @if(session('error'))
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
        <div class="bg-red-100 dark:bg-red-900/30 border border-red-400 text-red-700 dark:text-red-400 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    </div>
    @endif

    <!-- Main Content -->
    <div class="min-h-screen py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header with Back Button -->
            <div class="mb-8 animate-fade-in">
                <div class="flex justify-between items-center">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900 dark:text-dark-text-primary">Energy Consumption History</h1>
                        <p class="mt-2 text-sm text-gray-600 dark:text-dark-text-secondary">View your company's energy consumption records</p>
                    </div>
                    <a href="{{ route('company') }}" class="inline-flex items-center px-4 py-2 border border-kahejo-dark text-kahejo-dark rounded-md text-sm font-medium hover:bg-kahejo-lightest focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-kahejo-medium transition-all duration-300 transform hover:scale-105">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Back to Form
                    </a>
                </div>
            </div>

            <!-- Summary Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="stat-card bg-white dark:bg-dark-bg-secondary overflow-hidden shadow rounded-lg animate-slide-up" style="animation-delay: 0.1s">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="p-3 rounded-full bg-kahejo-lightest/20">
                                    <i class="fas fa-chart-line text-3xl text-kahejo-dark"></i>
                                </div>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 dark:text-dark-text-secondary truncate">
                                        Total Records
                                    </dt>
                                    <dd class="flex items-baseline">
                                        <div class="text-2xl font-semibold text-gray-900 dark:text-dark-text-primary">
                                            {{ $consumptions->total() }}
                                        </div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="stat-card bg-white dark:bg-dark-bg-secondary overflow-hidden shadow rounded-lg animate-slide-up" style="animation-delay: 0.2s">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="p-3 rounded-full bg-kahejo-lightest/20">
                                    <i class="fas fa-calendar-alt text-3xl text-kahejo-dark"></i>
                                </div>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 dark:text-dark-text-secondary truncate">
                                        Latest Record
                                    </dt>
                                    <dd class="flex items-baseline">
                                        <div class="text-2xl font-semibold text-gray-900 dark:text-dark-text-primary">
                                            {{ $consumptions->first() ? \Carbon\Carbon::parse($consumptions->first()->consumption_date)->format('d M Y') : 'N/A' }}
                                        </div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="stat-card bg-white dark:bg-dark-bg-secondary overflow-hidden shadow rounded-lg animate-slide-up" style="animation-delay: 0.3s">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="p-3 rounded-full bg-kahejo-lightest/20">
                                    <i class="fas fa-building text-3xl text-kahejo-dark"></i>
                                </div>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 dark:text-dark-text-secondary truncate">
                                        Active Departments
                                    </dt>
                                    <dd class="flex items-baseline">
                                        <div class="text-2xl font-semibold text-gray-900 dark:text-dark-text-primary">
                                            {{ $consumptions->pluck('department')->unique()->count() }}
                                        </div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Energy Consumption Chart -->
            <div class="bg-white dark:bg-dark-bg-secondary shadow rounded-lg overflow-hidden mb-8 chart-container animate-fade-in">
                <div class="px-4 py-5 sm:px-6 border-b border-gray-100 dark:border-dark-border">
                    <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-dark-text-primary">Energy Consumption Trend</h3>
                </div>
                <div class="p-6">
                    <canvas id="consumptionChart" height="300"></canvas>
                </div>
            </div>

            <!-- History Table -->
            <div class="bg-white dark:bg-dark-bg-secondary shadow rounded-lg overflow-hidden table-container animate-fade-in">
                <div class="px-4 py-5 sm:px-6 border-b border-gray-100 dark:border-dark-border">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-dark-text-primary">Consumption Records</h3>
                        <div class="flex items-center space-x-2">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-kahejo-lightest/20 text-kahejo-dark badge">
                                <i class="fas fa-info-circle mr-2"></i>
                                Total Records: {{ $consumptions->total() }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-dark-border">
                        <thead class="bg-gray-50 dark:bg-dark-bg-primary">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-dark-text-secondary uppercase tracking-wider">
                                    <div class="flex items-center space-x-1">
                                        <i class="fas fa-calendar text-gray-400 dark:text-dark-text-secondary"></i>
                                        <span>Date</span>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-dark-text-secondary uppercase tracking-wider">
                                    <div class="flex items-center space-x-1">
                                        <i class="fas fa-plug text-gray-400 dark:text-dark-text-secondary"></i>
                                        <span>Source Type</span>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-dark-text-secondary uppercase tracking-wider">
                                    <div class="flex items-center space-x-1">
                                        <i class="fas fa-bolt text-gray-400 dark:text-dark-text-secondary"></i>
                                        <span>Amount</span>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-dark-text-secondary uppercase tracking-wider">
                                    <div class="flex items-center space-x-1">
                                        <i class="fas fa-ruler text-gray-400 dark:text-dark-text-secondary"></i>
                                        <span>Unit</span>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-dark-text-secondary uppercase tracking-wider">
                                    <div class="flex items-center space-x-1">
                                        <i class="fas fa-tasks text-gray-400 dark:text-dark-text-secondary"></i>
                                        <span>Activity</span>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-dark-text-secondary uppercase tracking-wider">
                                    <div class="flex items-center space-x-1">
                                        <i class="fas fa-map-marker-alt text-gray-400 dark:text-dark-text-secondary"></i>
                                        <span>Location</span>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-dark-text-secondary uppercase tracking-wider">
                                    <div class="flex items-center space-x-1">
                                        <i class="fas fa-building text-gray-400 dark:text-dark-text-secondary"></i>
                                        <span>Department</span>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-dark-text-secondary uppercase tracking-wider">
                                    <div class="flex items-center space-x-1">
                                        <i class="fas fa-eye text-gray-400 dark:text-dark-text-secondary"></i>
                                        <span>Action</span>
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:bg-dark-bg-secondary dark:divide-dark-border">
                            @forelse($consumptions as $consumption)
                            <tr class="table-row">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-dark-text-primary">
                                    <div class="flex items-center">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 mr-2 badge">
                                            <i class="fas fa-calendar-day mr-1"></i>
                                            {{ \Carbon\Carbon::parse($consumption->consumption_date)->format('d M Y') }}
                                        </span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-dark-text-primary">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 badge">
                                        <i class="fas fa-plug mr-1"></i>
                                        {{ $consumption->source_type }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-dark-text-primary">
                                    <div class="flex items-center">
                                        <span class="font-medium">{{ $consumption->consumption_amount }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-dark-text-primary">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800 badge">
                                        {{ $consumption->unit_measurement }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-dark-text-primary">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 badge">
                                        <i class="fas fa-tasks mr-1"></i>
                                        {{ $consumption->activity_type }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-dark-text-primary">
                                    <div class="flex items-center">
                                        <i class="fas fa-map-marker-alt text-red-500 mr-1"></i>
                                        {{ $consumption->location_name }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-dark-text-primary">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800 badge">
                                        <i class="fas fa-building mr-1"></i>
                                        {{ $consumption->department }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    <a href="{{ route('company.view', ['id' => $consumption->id]) }}" 
                                       class="inline-flex items-center px-3 py-1.5 border border-transparent text-xs font-medium rounded-md text-white bg-kahejo-dark hover:bg-kahejo-darkest focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-kahejo-medium transition-all duration-300 transform hover:scale-105">
                                        <i class="fas fa-eye mr-1.5"></i>
                                        View Details
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="px-6 py-4 text-center text-sm text-gray-500 dark:text-dark-text-secondary">
                                    <div class="flex flex-col items-center justify-center py-8 animate-bounce-in">
                                        <i class="fas fa-inbox text-4xl text-gray-400 dark:text-dark-text-secondary mb-2"></i>
                                        <p class="text-gray-500 dark:text-dark-text-secondary">No energy consumption records found.</p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Pagination -->
            @if($consumptions->hasPages())
            <div class="mt-4">
                {{ $consumptions->links() }}
            </div>
            @endif
        </div>
    </div>
    @stack('scripts')
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

        document.addEventListener('DOMContentLoaded', function () {
            const userMenuButton = document.getElementById('userMenuButton');
            const userDropdown = document.getElementById('userDropdown');

            if (userMenuButton && userDropdown) {
                userMenuButton.addEventListener('click', function () {
                    userDropdown.classList.toggle('hidden');
                });

                // Close the dropdown if the user clicks outside of it
                document.addEventListener('click', function (event) {
                    if (!userMenuButton.contains(event.target) && !userDropdown.contains(event.target)) {
                        userDropdown.classList.add('hidden');
                    }
                });
            }
        });

        // Prepare data for the chart
        const consumptionData = @json($consumptions->map(function($item) {
            return [
                'date' => \Carbon\Carbon::parse($item->consumption_date)->format('M Y'),
                'amount' => $item->consumption_amount,
                'source' => $item->source_type
            ];
        }));

        // Group data by source type
        const groupedData = {};
        consumptionData.forEach(item => {
            if (!groupedData[item.source]) {
                groupedData[item.source] = [];
            }
            groupedData[item.source].push(item);
        });

        // Get unique dates
        const dates = [...new Set(consumptionData.map(item => item.date))].sort();

        // Create datasets for each source type
        const datasets = Object.entries(groupedData).map(([source, data]) => {
            const amounts = dates.map(date => {
                const item = data.find(d => d.date === date);
                return item ? item.amount : 0;
            });

            return {
                label: source.charAt(0).toUpperCase() + source.slice(1),
                data: amounts,
                borderColor: getRandomColor(),
                tension: 0.4,
                fill: false
            };
        });

        // Create the chart
        const ctx = document.getElementById('consumptionChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: dates,
                datasets: datasets
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        mode: 'index',
                        intersect: false,
                        backgroundColor: 'rgba(255, 255, 255, 0.9)',
                        titleColor: '#064e3b',
                        bodyColor: '#064e3b',
                        borderColor: '#10b981',
                        borderWidth: 1,
                        padding: 10,
                        boxPadding: 5,
                        usePointStyle: true,
                        callbacks: {
                            label: function(context) {
                                let label = context.dataset.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                if (context.parsed.y !== null) {
                                    label += new Intl.NumberFormat('en-US', { style: 'decimal' }).format(context.parsed.y);
                                }
                                return label;
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Consumption Amount',
                            font: {
                                family: 'Poppins',
                                size: 12,
                                weight: '500'
                            }
                        },
                        grid: {
                            color: 'rgba(0, 0, 0, 0.05)'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Date',
                            font: {
                                family: 'Poppins',
                                size: 12,
                                weight: '500'
                            }
                        },
                        grid: {
                            color: 'rgba(0, 0, 0, 0.05)'
                        }
                    }
                },
                interaction: {
                    mode: 'nearest',
                    axis: 'x',
                    intersect: false
                },
                animation: {
                    duration: 1000,
                    easing: 'easeInOutQuart'
                }
            }
        });

        // Helper function to generate random colors
        function getRandomColor() {
            const colors = [
                '#10B981', // Green
                '#3B82F6', // Blue
                '#F59E0B', // Yellow
                '#EF4444', // Red
                '#8B5CF6', // Purple
                '#EC4899', // Pink
                '#14B8A6', // Teal
                '#F97316'  // Orange
            ];
            return colors[Math.floor(Math.random() * colors.length)];
        }

        // Add hover effects to table rows
        document.querySelectorAll('.table-row').forEach(row => {
            row.addEventListener('mouseenter', function() {
                this.style.transform = 'scale(1.01)';
                this.style.backgroundColor = '#F9FAFB';
            });
            row.addEventListener('mouseleave', function() {
                this.style.transform = 'scale(1)';
                this.style.backgroundColor = '';
            });
        });

        // Add animation to pagination links
        document.querySelectorAll('.pagination-link').forEach(link => {
            link.classList.add('transition-all', 'duration-200', 'hover:transform', 'hover:scale-105');
        });
    </script>
</body>
</html> 