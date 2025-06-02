<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KaHejo - Carbon Calculator</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
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
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-in-out',
                        'slide-up': 'slideUp 0.5s ease-out',
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
        .nav-link.active {
            color: #10B981;
            background-color: #F3F4F6;
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
        .input-group {
            position: relative;
            transition: all 0.3s ease;
        }
        .input-group:focus-within {
            transform: translateY(-2px);
        }
        .input-group input {
            transition: all 0.3s ease;
        }
        .input-group input:focus {
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
        }
        .tooltip {
            position: relative;
            display: inline-block;
        }
        .tooltip .tooltip-text {
            visibility: hidden;
            width: 200px;
            background-color: #064e3b;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 8px;
            position: absolute;
            z-index: 1;
            bottom: 125%;
            left: 50%;
            transform: translateX(-50%);
            opacity: 0;
            transition: opacity 0.3s;
        }
        .tooltip:hover .tooltip-text {
            visibility: visible;
            opacity: 1;
        }
        .form-card {
            transition: all 0.3s ease;
        }
        .form-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        .animate-fade-in {
            animation: fadeIn 0.5s ease-in-out;
        }
        .animate-slide-up {
            animation: slideUp 0.5s ease-out;
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navbar -->
    <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <!-- Logo and Navigation -->
                <div class="flex items-center">
                    <div class="flex-shrink-0 flex items-center">
                        <span class="logo-text text-2xl font-extrabold">KaHejo</span>
                    </div>
                    <div class="hidden md:flex md:ml-10">
                        <a href="{{ route('dashboard') }}" class="nav-link flex items-center text-sm font-medium text-gray-500 {{ request()->routeIs('main') ? 'active' : '' }}">
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
                    </div>
                </div>
                <!-- Right side of navbar -->
                <div class="flex items-center space-x-6">
                    <!-- User Profile -->
                    <div class="user-profile flex items-center bg-gray-50 rounded-full px-3 py-1">
                        <img class="h-8 w-8 rounded-full ring-2 ring-green-500" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="User">
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-900">{{ Auth::user()->name ?? 'Kasino' }}</p>
                            <p class="text-xs text-gray-500">User</p>
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
        <!-- Carbon Calculator Form -->
<<<<<<< HEAD
        <div class="form-card bg-white shadow rounded-lg border border-kahejo-light/20 animate-fade-in">
=======
        <div class="bg-white shadow rounded-lg border border-kahejo-light/20">
>>>>>>> 9a276c2e5d818701b9e50c9d6c4c5225e09ed9d5
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-kahejo-darkest">Carbon Footprint Calculator</h3>
                <p class="mt-1 text-sm text-kahejo-medium">Calculate your carbon footprint based on your daily activities.</p>
            </div>
            <div class="border-t border-kahejo-light/20">
                <form action="{{ url('/carbon/calculate') }}" method="POST" class="p-6 space-y-6">
                    @csrf
<<<<<<< HEAD
                    <!-- Electricity Usage -->
                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                        <div class="input-group animate-slide-up" style="animation-delay: 0.1s">
                            <label for="electricity" class="block text-sm font-medium text-kahejo-darkest">
                                Monthly Electricity Usage (kWh)
                                <span class="tooltip">
                                    <i class="fas fa-info-circle text-kahejo-medium ml-1"></i>
                                    <span class="tooltip-text">Enter your monthly electricity consumption in kilowatt-hours</span>
                                </span>
                            </label>
=======
                    <!-- Month Selection -->
                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                        <div>
                            <label for="month" class="block text-sm font-medium text-kahejo-darkest">Month</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-calendar text-kahejo-dark"></i>
                                </div>
                                <input type="month" name="month" id="month" class="focus:ring-kahejo-medium focus:border-kahejo-medium block w-full pl-10 sm:text-sm border-kahejo-light/20 rounded-md" required>
                            </div>
                        </div>
                    </div>

                    <!-- Electricity Usage -->
                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                        <div>
                            <label for="electricity" class="block text-sm font-medium text-kahejo-darkest">Monthly Electricity Usage (kWh)</label>
>>>>>>> 9a276c2e5d818701b9e50c9d6c4c5225e09ed9d5
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-bolt text-kahejo-dark"></i>
                                </div>
<<<<<<< HEAD
                                <input type="number" name="electricity" id="electricity" 
                                    class="focus:ring-kahejo-medium focus:border-kahejo-medium block w-full pl-10 sm:text-sm border-kahejo-light/20 rounded-md" 
                                    placeholder="0"
                                    min="0"
                                    step="0.1">
=======
                                <input type="number" name="electricity" id="electricity" class="focus:ring-kahejo-medium focus:border-kahejo-medium block w-full pl-10 sm:text-sm border-kahejo-light/20 rounded-md" placeholder="0">
                            </div>
                        </div>

                        <!-- Transportation -->
                        <div>
                            <label for="transportation" class="block text-sm font-medium text-kahejo-darkest">Daily Transportation (km)</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-car text-kahejo-dark"></i>
                                </div>
                                <input type="number" name="transportation" id="transportation" class="focus:ring-kahejo-medium focus:border-kahejo-medium block w-full pl-10 sm:text-sm border-kahejo-light/20 rounded-md" placeholder="0">
                            </div>
                        </div>

                        <!-- Waste -->
                        <div>
                            <label for="waste" class="block text-sm font-medium text-kahejo-darkest">Monthly Waste (kg)</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-trash text-kahejo-dark"></i>
                                </div>
                                <input type="number" name="waste" id="waste" class="focus:ring-kahejo-medium focus:border-kahejo-medium block w-full pl-10 sm:text-sm border-kahejo-light/20 rounded-md" placeholder="0">
                            </div>
                        </div>

                        <!-- Water Usage -->
                        <div>
                            <label for="water" class="block text-sm font-medium text-kahejo-darkest">Monthly Water Usage (m³)</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-water text-kahejo-dark"></i>
                                </div>
                                <input type="number" name="water" id="water" class="focus:ring-kahejo-medium focus:border-kahejo-medium block w-full pl-10 sm:text-sm border-kahejo-light/20 rounded-md" placeholder="0">
>>>>>>> 9a276c2e5d818701b9e50c9d6c4c5225e09ed9d5
                            </div>
                        </div>

<<<<<<< HEAD
                        <!-- Transportation -->
                        <div class="input-group animate-slide-up" style="animation-delay: 0.2s">
                            <label for="transportation" class="block text-sm font-medium text-kahejo-darkest">
                                Daily Transportation (km)
                                <span class="tooltip">
                                    <i class="fas fa-info-circle text-kahejo-medium ml-1"></i>
                                    <span class="tooltip-text">Enter your daily travel distance in kilometers</span>
                                </span>
                            </label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-car text-kahejo-dark"></i>
                                </div>
                                <input type="number" name="transportation" id="transportation" 
                                    class="focus:ring-kahejo-medium focus:border-kahejo-medium block w-full pl-10 sm:text-sm border-kahejo-light/20 rounded-md" 
                                    placeholder="0"
                                    min="0"
                                    step="0.1">
                            </div>
                        </div>

                        <!-- Waste -->
                        <div class="input-group animate-slide-up" style="animation-delay: 0.3s">
                            <label for="waste" class="block text-sm font-medium text-kahejo-darkest">
                                Monthly Waste (kg)
                                <span class="tooltip">
                                    <i class="fas fa-info-circle text-kahejo-medium ml-1"></i>
                                    <span class="tooltip-text">Enter your monthly waste production in kilograms</span>
                                </span>
                            </label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-trash text-kahejo-dark"></i>
                                </div>
                                <input type="number" name="waste" id="waste" 
                                    class="focus:ring-kahejo-medium focus:border-kahejo-medium block w-full pl-10 sm:text-sm border-kahejo-light/20 rounded-md" 
                                    placeholder="0"
                                    min="0"
                                    step="0.1">
                            </div>
                        </div>

                        <!-- Water Usage -->
                        <div class="input-group animate-slide-up" style="animation-delay: 0.4s">
                            <label for="water" class="block text-sm font-medium text-kahejo-darkest">
                                Monthly Water Usage (m³)
                                <span class="tooltip">
                                    <i class="fas fa-info-circle text-kahejo-medium ml-1"></i>
                                    <span class="tooltip-text">Enter your monthly water consumption in cubic meters</span>
                                </span>
                            </label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-water text-kahejo-dark"></i>
                                </div>
                                <input type="number" name="water" id="water" 
                                    class="focus:ring-kahejo-medium focus:border-kahejo-medium block w-full pl-10 sm:text-sm border-kahejo-light/20 rounded-md" 
                                    placeholder="0"
                                    min="0"
                                    step="0.1">
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end space-x-4 animate-slide-up" style="animation-delay: 0.5s">
                        <button type="submit" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-kahejo-dark hover:bg-kahejo-darkest focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-kahejo-medium transition-all duration-300 transform hover:scale-105">
                            <i class="fas fa-calculator mr-2"></i>
                            Calculate Footprint
                        </button>
                        <a href="{{ route('carbon.history') }}" class="inline-flex items-center px-6 py-3 border border-kahejo-dark text-base font-medium rounded-md text-kahejo-dark bg-white hover:bg-kahejo-lightest focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-kahejo-medium transition-all duration-300 transform hover:scale-105">
                            <i class="fas fa-history mr-2"></i>
                            View History
                        </a>
=======
                <!-- Action Buttons -->
                <div class="mt-8 flex justify-end space-x-4" data-aos="fade-up" data-aos-delay="500">
                    <button type="submit" id="calculateButton" class="inline-flex items-center px-8 py-3 border border-transparent shadow-sm text-sm font-medium rounded-lg text-white bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-600 transform hover:-translate-y-1">
                        <i class="fas fa-calculator mr-2"></i>
                        Calculate Footprint
                    </button>
                    <a href="{{ route('carbon.history') }}" class="inline-flex items-center px-6 py-3 border-2 border-green-500 text-green-600 dark:text-green-400 rounded-lg text-sm font-medium hover:bg-green-50 dark:hover:bg-green-900/30 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transform hover:-translate-y-1">
                        <i class="fas fa-history mr-2"></i>
                        View History
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- Results Section (if available) -->
    @if(isset($results))
    <div class="mt-8 bg-white/90 dark:bg-dark-bg-secondary backdrop-blur-md shadow-xl rounded-xl border-l-4 border-green-500 dark:border-dark-border transform transition-all duration-300 hover:shadow-2xl" data-aos="fade-up" data-aos-duration="1000">
        <!-- Header Section -->
        <div class="px-6 py-6 sm:px-8 border-b border-gray-100 dark:border-dark-border">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <div class="p-3 bg-green-100 dark:bg-green-900/30 rounded-lg">
                        <i class="fas fa-chart-pie text-2xl text-green-600 dark:text-green-400"></i>
>>>>>>> 9a276c2e5d818701b9e50c9d6c4c5225e09ed9d5
                    </div>
                </form>
            </div>
        </div>

        <!-- Results Section (if available) -->
        @if(isset($results))
        <div class="mt-8 bg-white shadow rounded-lg border border-kahejo-light/20 animate-fade-in">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-kahejo-darkest">Your Carbon Footprint Results</h3>
                <p class="mt-1 text-sm text-kahejo-medium">Based on your provided information.</p>
            </div>
            <div class="border-t border-kahejo-light/20 px-4 py-5 sm:p-6">
                <!-- Total Impact Card -->
                <div class="mb-8">
                    <div class="bg-kahejo-lightest/10 rounded-lg p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <h4 class="text-lg font-medium text-kahejo-darkest">Total Carbon Footprint</h4>
                                <p class="text-3xl font-bold text-kahejo-dark mt-2">{{ number_format($results['total'], 2) }} kg CO₂</p>
                            </div>
                            <div class="text-right">
                                <p class="text-sm text-kahejo-medium">Monthly Impact</p>
                                <p class="text-sm text-kahejo-medium">Last updated: {{ now()->format('d M Y') }}</p>
                            </div>
                        </div>
                        <!-- Progress Bar -->
                        <div class="mt-4">
                            <div class="relative pt-1">
                                <div class="flex mb-2 items-center justify-between">
                                    <div>
                                        <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-kahejo-dark bg-kahejo-lightest/20">
                                            Progress
                                        </span>
                                    </div>
                                    <div class="text-right">
                                        <span class="text-xs font-semibold inline-block text-kahejo-dark">
                                            {{ number_format(($results['total'] / 1000) * 100, 1) }}%
                                        </span>
                                    </div>
                                </div>
                                <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-kahejo-lightest/20">
                                    <div style="width:{{ min(($results['total'] / 1000) * 100, 100) }}%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-kahejo-dark"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Detailed Impact Cards -->
                <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
                    <div class="bg-kahejo-lightest/5 overflow-hidden shadow rounded-lg border border-kahejo-light/20">
                        <div class="p-5">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-bolt text-kahejo-dark text-2xl"></i>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <dl>
                                        <dt class="text-sm font-medium text-kahejo-medium truncate">Electricity Impact</dt>
                                        <dd class="flex items-baseline">
                                            <div class="text-2xl font-semibold text-kahejo-darkest">{{ number_format($results['electricity'], 2) }} kg CO₂</div>
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-kahejo-lightest/5 overflow-hidden shadow rounded-lg border border-kahejo-light/20">
                        <div class="p-5">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-car text-kahejo-dark text-2xl"></i>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <dl>
                                        <dt class="text-sm font-medium text-kahejo-medium truncate">Transportation Impact</dt>
                                        <dd class="flex items-baseline">
                                            <div class="text-2xl font-semibold text-kahejo-darkest">{{ number_format($results['transportation'], 2) }} kg CO₂</div>
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-kahejo-lightest/5 overflow-hidden shadow rounded-lg border border-kahejo-light/20">
                        <div class="p-5">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-trash text-kahejo-dark text-2xl"></i>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <dl>
                                        <dt class="text-sm font-medium text-kahejo-medium truncate">Waste Impact</dt>
                                        <dd class="flex items-baseline">
                                            <div class="text-2xl font-semibold text-kahejo-darkest">{{ number_format($results['waste'], 2) }} kg CO₂</div>
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-kahejo-lightest/5 overflow-hidden shadow rounded-lg border border-kahejo-light/20">
                        <div class="p-5">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-water text-kahejo-dark text-2xl"></i>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <dl>
                                        <dt class="text-sm font-medium text-kahejo-medium truncate">Water Impact</dt>
                                        <dd class="flex items-baseline">
                                            <div class="text-2xl font-semibold text-kahejo-darkest">{{ number_format($results['water'], 2) }} kg CO₂</div>
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recommendations Section -->
                <div class="mt-8">
                    <h4 class="text-lg font-medium text-kahejo-darkest mb-4">Recommendations to Reduce Your Carbon Footprint</h4>
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                        <div class="bg-kahejo-lightest/5 overflow-hidden shadow rounded-lg border border-kahejo-light/20">
                            <div class="p-5">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <i class="fas fa-lightbulb text-kahejo-dark text-2xl"></i>
                                    </div>
                                    <div class="ml-5">
                                        <h5 class="text-sm font-medium text-kahejo-darkest">Energy Efficiency</h5>
                                        <p class="mt-1 text-sm text-kahejo-medium">Switch to LED bulbs and unplug devices when not in use.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="bg-kahejo-lightest/5 overflow-hidden shadow rounded-lg border border-kahejo-light/20">
                            <div class="p-5">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <i class="fas fa-bicycle text-kahejo-dark text-2xl"></i>
                                    </div>
                                    <div class="ml-5">
                                        <h5 class="text-sm font-medium text-kahejo-darkest">Sustainable Transport</h5>
                                        <p class="mt-1 text-sm text-kahejo-medium">Consider walking, cycling, or using public transport.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="bg-kahejo-lightest/5 overflow-hidden shadow rounded-lg border border-kahejo-light/20">
                            <div class="p-5">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <i class="fas fa-recycle text-kahejo-dark text-2xl"></i>
                                    </div>
                                    <div class="ml-5">
                                        <h5 class="text-sm font-medium text-kahejo-darkest">Waste Reduction</h5>
                                        <p class="mt-1 text-sm text-kahejo-medium">Practice recycling and composting to reduce waste.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Comparison Section -->
                <div class="mt-8">
                    <h4 class="text-lg font-medium text-kahejo-darkest mb-4">How You Compare</h4>
                    <div class="bg-kahejo-lightest/5 rounded-lg p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-kahejo-medium">Your Monthly Impact</p>
                                <p class="text-2xl font-bold text-kahejo-darkest">{{ number_format($results['total'], 2) }} kg CO₂</p>
                            </div>
                            <div class="text-right">
                                <p class="text-sm text-kahejo-medium">Average Monthly Impact</p>
                                <p class="text-2xl font-bold text-kahejo-darkest">1,000 kg CO₂</p>
                            </div>
                        </div>
                        <div class="mt-4">
                            <div class="relative pt-1">
                                <div class="flex mb-2 items-center justify-between">
                                    <div>
                                        <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-kahejo-dark bg-kahejo-lightest/20">
                                            Comparison
                                        </span>
                                    </div>
                                </div>
                                <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-kahejo-lightest/20">
                                    <div style="width:{{ min(($results['total'] / 1000) * 100, 100) }}%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-kahejo-dark"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>

    <!-- Add JavaScript for form validation and animations -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add input validation
            const inputs = document.querySelectorAll('input[type="number"]');
            inputs.forEach(input => {
                input.addEventListener('input', function() {
                    if (this.value < 0) {
                        this.value = 0;
                    }
                });
            });

            // Add form submission animation
            const form = document.querySelector('form');
            form.addEventListener('submit', function(e) {
                const submitButton = this.querySelector('button[type="submit"]');
                submitButton.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Calculating...';
                submitButton.disabled = true;
            });
        });
    </script>
</body>
</html>
