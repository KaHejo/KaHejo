<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KaHejo - Dashboard</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .sidebar-link {
            transition: all 0.3s ease;
            border-radius: 0.5rem;
        }
        .sidebar-link:hover {
            background-color: rgba(16, 185, 129, 0.1);
        }
        .sidebar-link.active {
            background-color: rgba(16, 185, 129, 0.2);
        }
        .card-hover {
            transition: all 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }
        .btn-logout {
            transition: all 0.3s ease;
        }
        .btn-logout:hover {
            transform: translateY(-1px);
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-gray-100 shadow-lg">
            <div class="flex flex-col h-full">
                <!-- Logo -->
                <div class="flex items-center justify-center h-16 border-b border-gray-200 bg-white">
                    <span class="text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-green-500 to-emerald-600">KaHejo</span>
                </div>

                <!-- User Profile -->
                <div class="p-4 border-b border-gray-200 bg-white">
                    <div class="flex items-center space-x-4">
                        <img class="h-10 w-10 rounded-full ring-2 ring-green-500" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="User">
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-900">{{ Auth::user()->name }}</p>
                            <p class="text-xs text-gray-500">Administrator</p>
                        </div>
                    </div>
                </div>

                <!-- Navigation Links -->
                <nav class="flex-1 px-4 py-4 space-y-1">
                    <a href="{{ route('main') }}" class="sidebar-link active flex items-center px-4 py-3 text-gray-900 hover:text-gray-900">
                        <i class="fas fa-home w-6 text-green-600"></i>
                        <span class="ml-3">Dashboard</span>
                    </a>
                    <a href="{{ route('profile') }}" class="sidebar-link flex items-center px-4 py-3 text-gray-500 hover:text-gray-900">
                        <i class="fas fa-user w-6 text-green-600"></i>
                        <span class="ml-3">Profile</span>
                    </a>
                    <a href="{{ route('settings') }}" class="sidebar-link flex items-center px-4 py-3 text-gray-500 hover:text-gray-900">
                        <i class="fas fa-cog w-6 text-green-600"></i>
                        <span class="ml-3">Settings</span>
                    </a>
                    <a href="{{ route('carbon') }}" class="sidebar-link flex items-center px-4 py-3 text-gray-500 hover:text-gray-900">
                        <i class="fas fa-calculator w-6 text-green-600"></i>
                        <span class="ml-3">Carbon Calculator</span>
                    </a>
                    <a href="{{ route('company') }}" class="sidebar-link flex items-center px-4 py-3 text-gray-500 hover:text-gray-900">
                        <i class="fas fa-chart-line w-6 text-green-600"></i>
                        <span class="ml-3">Energy Consumption</span>
                    </a>
                </nav>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 overflow-auto">
            <!-- Top Bar -->
            <div class="bg-white shadow-sm">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex items-center">
                            <h1 class="text-2xl font-bold text-gray-900">Dashboard</h1>
                        </div>
                        <div class="flex items-center space-x-4">
                            <!-- Notifications -->
                            <button class="p-2 rounded-full text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                <span class="sr-only">View notifications</span>
                                <i class="fas fa-bell text-xl"></i>
                            </button>
                            <!-- Logout Button -->
                            <form action="{{ route('logout') }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="btn-logout inline-flex items-center px-4 py-2 border border-green-500 text-green-500 rounded-full text-sm font-medium hover:bg-green-500 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors duration-200">
                                    <i class="fas fa-sign-out-alt mr-2"></i>
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
                <!-- Welcome Section -->
                <div class="mb-8">
                    <h1 class="text-3xl font-bold text-gray-900">Welcome back, {{ Auth::user()->name }}!</h1>
                    <p class="mt-2 text-gray-600">Here's what's happening with your carbon footprint today.</p>
                </div>

                <!-- Stats Cards -->
                <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
                    <!-- Card 1 -->
                    <div class="card-hover bg-white overflow-hidden shadow rounded-lg border border-gray-100">
                        <div class="p-5">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <div class="p-3 rounded-full bg-green-50">
                                        <i class="fas fa-users text-green-600 text-2xl"></i>
                                    </div>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <dl>
                                        <dt class="text-sm font-medium text-gray-500 truncate">Total Users</dt>
                                        <dd class="flex items-baseline">
                                            <div class="text-2xl font-semibold text-gray-900">{{ number_format($stats['totalUsers']) }}</div>
                                            <div class="ml-2 flex items-baseline text-sm font-semibold text-green-600">
                                                <i class="fas fa-arrow-up"></i>
                                                <span class="sr-only">Increased by</span>
                                                12%
                                            </div>
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="card-hover bg-white overflow-hidden shadow rounded-lg border border-gray-100">
                        <div class="p-5">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <div class="p-3 rounded-full bg-green-50">
                                        <i class="fas fa-chart-line text-green-600 text-2xl"></i>
                                    </div>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <dl>
                                        <dt class="text-sm font-medium text-gray-500 truncate">Growth</dt>
                                        <dd class="flex items-baseline">
                                            <div class="text-2xl font-semibold text-gray-900">{{ $stats['growth'] }}%</div>
                                            <div class="ml-2 flex items-baseline text-sm font-semibold text-green-600">
                                                <i class="fas fa-arrow-up"></i>
                                                <span class="sr-only">Increased by</span>
                                                8%
                                            </div>
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="card-hover bg-white overflow-hidden shadow rounded-lg border border-gray-100">
                        <div class="p-5">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <div class="p-3 rounded-full bg-green-50">
                                        <i class="fas fa-tasks text-green-600 text-2xl"></i>
                                    </div>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <dl>
                                        <dt class="text-sm font-medium text-gray-500 truncate">Active Tasks</dt>
                                        <dd class="flex items-baseline">
                                            <div class="text-2xl font-semibold text-gray-900">{{ $stats['activeTasks'] }}</div>
                                            <div class="ml-2 flex items-baseline text-sm font-semibold text-green-600">
                                                <i class="fas fa-arrow-up"></i>
                                                <span class="sr-only">Increased by</span>
                                                5%
                                            </div>
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card 4 -->
                    <div class="card-hover bg-white overflow-hidden shadow rounded-lg border border-gray-100">
                        <div class="p-5">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <div class="p-3 rounded-full bg-green-50">
                                        <i class="fas fa-calendar-check text-green-600 text-2xl"></i>
                                    </div>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <dl>
                                        <dt class="text-sm font-medium text-gray-500 truncate">Completed</dt>
                                        <dd class="flex items-baseline">
                                            <div class="text-2xl font-semibold text-gray-900">{{ $stats['completed'] }}</div>
                                            <div class="ml-2 flex items-baseline text-sm font-semibold text-green-600">
                                                <i class="fas fa-arrow-up"></i>
                                                <span class="sr-only">Increased by</span>
                                                15%
                                            </div>
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="mt-8">
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
                                <li class="px-4 py-4 sm:px-6 hover:bg-gray-50 transition-colors duration-150">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0">
                                                <div class="p-2 rounded-full bg-green-50">
                                                    <i class="fas fa-{{ $activity['icon'] }} text-green-600"></i>
                                                </div>
                                            </div>
                                            <div class="ml-3">
                                                <p class="text-sm font-medium text-gray-900">{{ $activity['title'] }}</p>
                                                <p class="text-sm text-gray-500">{{ $activity['time'] }}</p>
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
            </div>
        </div>
    </div>
</body>
</html>