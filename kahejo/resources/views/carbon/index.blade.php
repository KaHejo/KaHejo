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
                            <p class="text-xs text-gray-500">Administrator</p>
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
        <div class="bg-white shadow rounded-lg border border-kahejo-light/20">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-kahejo-darkest">Carbon Footprint Calculator</h3>
                <p class="mt-1 text-sm text-kahejo-medium">Calculate your carbon footprint based on your daily activities.</p>
            </div>
            <div class="border-t border-kahejo-light/20">
                <form action="{{ url('/carbon/calculate') }}" method="POST" class="p-6 space-y-6">
                    @csrf
                    <!-- Electricity Usage -->
                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                        <div>
                            <label for="electricity" class="block text-sm font-medium text-kahejo-darkest">Monthly Electricity Usage (kWh)</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-bolt text-kahejo-dark"></i>
                                </div>
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
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-kahejo-dark hover:bg-kahejo-darkest focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-kahejo-medium">
                            <i class="fas fa-calculator mr-2"></i>
                            Calculate Footprint
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Results Section (if available) -->
        @if(isset($results))
        <div class="mt-8 bg-white shadow rounded-lg border border-kahejo-light/20">
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
</body>
</html>
