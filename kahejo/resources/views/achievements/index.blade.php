<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KaHejo - Achievements</title>
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
        .logo-text {
            background: linear-gradient(to right, #10B981, #059669);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            font-weight: 700;
        }
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
                        <a href="{{ route('achievements') }}" class="nav-link flex items-center text-sm font-medium text-gray-500 {{ request()->routeIs('achievements') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-trophy text-lg mr-2"></i>
                            Achievements
                        </a>
                        <a href="{{ route('education') }}" class="nav-link flex items-center text-sm font-medium text-gray-500 {{ request()->routeIs('achievements.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-trophy text-lg mr-2"></i>
                            Education
                        </a>
                    </div>
                </div>
                <!-- Right side of navbar -->
                <div class="flex items-center space-x-6">
                    <!-- User Profile -->
                    <div class="user-profile flex items-center bg-gray-50 rounded-full px-3 py-1">
                        <img class="h-8 w-8 rounded-full ring-2 ring-green-500" src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name ?? 'User') }}&background=10B981&color=fff" alt="User">
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-900">{{ Auth::user()->name ?? 'User' }}</p>
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
    <div class="max-w-7xl mx-auto py-8 sm:px-6 lg:px-8">
        <div class="bg-white shadow rounded-lg border border-kahejo-light/20 p-6">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold text-kahejo-darkest">Achievements</h1>
            </div>
            <p class="text-gray-600 mb-4">Here you can view all your achievements and their details.</p>
            

            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    {{ session('error') }}
                </div>
            @endif

            @php
                $user = Auth::user();
                $totalPoints = $user->points;
            @endphp

            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6 gap-4">
                <div class="flex items-center space-x-3">
                    <span class="inline-flex items-center px-3 py-2 rounded-lg bg-green-100 text-green-700 font-semibold text-lg">
                        <i class="fas fa-coins mr-2"></i>
                        Total Points: {{ $totalPoints }}
                    </span>
                </div>
                <a href="{{ route('rewards') }}"
                   class="inline-flex items-center px-4 py-2 rounded-lg bg-kahejo-dark hover:bg-kahejo-darkest text-white font-semibold shadow transition">
                    <i class="fas fa-gift mr-2"></i>
                    Go to Rewards
                </a>
            </div>

            @php
                $userAchievements = Auth::user()->achievements->pluck('id')->toArray();
            @endphp

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($achievements as $achievement)
                    @php
                        $achieved = in_array($achievement->id, $userAchievements);
                    @endphp
                    <div class="relative bg-kahejo-lightest/10 border border-kahejo-light/30 rounded-lg shadow p-5 flex flex-col items-center text-center transition-all duration-200
                        {{ $achieved ? 'opacity-100' : 'opacity-60 grayscale' }}">
                        <div class="w-16 h-16 mb-3 flex items-center justify-center rounded-full border-2 {{ $achieved ? 'border-green-400 bg-white' : 'border-gray-300 bg-gray-100' }}">
                            @if($achievement->icon)
                                <img src="{{ asset($achievement->icon) }}" alt="{{ $achievement->name }}" class="w-12 h-12 object-contain mx-auto {{ $achieved ? '' : 'grayscale' }}">
                            @else
                                <i class="fas fa-award text-3xl {{ $achieved ? 'text-kahejo-dark' : 'text-gray-400' }}"></i>
                            @endif
                        </div>
                        <div class="font-semibold text-kahejo-darkest text-lg mb-1">{{ $achievement->name }}</div>
                        <div class="text-kahejo-medium text-sm mb-2">{{ $achievement->description }}</div>
                        <div class="flex justify-center items-center space-x-2 mb-2">
                            <span class="px-2 py-1 text-xs rounded-full {{ $achieved ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-400' }}">
                                {{ ucfirst($achievement->category ?? '-') }}
                            </span>
                            <span class="px-2 py-1 text-xs rounded-full {{ $achieved ? 'bg-kahejo-dark text-white' : 'bg-gray-200 text-gray-400' }}">
                                {{ $achievement->points_awarded ?? 0 }} pts
                            </span>
                        </div>
                        @if($achieved)
                            <span class="inline-flex items-center px-2 py-1 text-xs font-semibold rounded bg-green-50 text-green-700">
                                <i class="fas fa-check-circle mr-1"></i> Achieved
                            </span>
                        @else
                            <span class="inline-flex items-center px-2 py-1 text-xs font-semibold rounded bg-gray-100 text-gray-400">
                                <i class="fas fa-lock mr-1"></i> Locked
                            </span>
                        @endif
                    </div>
                @endforeach
            </div>

            <div class="mt-8">
                {{ $achievements->links() }}
            </div>
        </div>
    </div>
</body>
</html>