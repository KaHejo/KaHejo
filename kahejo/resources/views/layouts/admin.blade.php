<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 min-h-screen flex flex-col">
    <div class="flex flex-1">
        <!-- Sidebar -->
        <aside class="w-64 bg-green-700 text-white flex flex-col min-h-screen">
            <div class="p-6 text-2xl font-bold tracking-wide border-b border-green-600">kaHejo</div>
            <nav class="flex-1 px-4 py-6">
                <ul class="space-y-2">
                    <li><a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 rounded {{ request()->is('admin/dashboard') ? 'bg-green-600' : 'hover:bg-green-600' }}">Dashboard</a></li>
                    <li><a href="{{ route('admin.users.index') }}" class="block px-4 py-2 rounded hover:bg-green-600">Users</a></li>
                    <li><a href="{{ route('admin.achievements.index') }}" class="block px-4 py-2 rounded hover:bg-green-600">Achievements</a></li>
                    <li><a href="{{ route('admin.user-achievements.index') }}" class="block px-4 py-2 rounded hover:bg-green-600">User Achievements</a></li>
                    <li><a href="{{ route('admin.rewards.index') }}" class="block px-4 py-2 rounded hover:bg-green-600">Rewards</a></li>
                    <li><a href="{{ route('admin.history-claims.index') }}" class="block px-4 py-2 rounded hover:bg-green-600">History Claim</a></li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Navbar -->
            <header class="bg-white shadow flex items-center justify-between px-6 py-4">
                <div class="font-bold text-xl text-green-700">Admin Dashboard</div>
                <div class="flex items-center space-x-4">
                    <input type="text" placeholder="Search..." class="border rounded px-3 py-1 focus:outline-none focus:ring-2 focus:ring-green-300">
                    <button class="relative">
                        <svg class="w-6 h-6 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V4a2 2 0 10-4 0v1.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                        </svg>
                    </button>
                    <div class="relative">
                        <button class="flex items-center space-x-2 focus:outline-none">
                            <span>John</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 p-6">
                @yield('main-content')
            </main>

            <!-- Footer -->
            <footer class="bg-white text-gray-500 text-center py-3 border-t">&copy; {{ date('Y') }} kaHejo. All rights reserved.</footer>
            <!-- Add Bootstrap JS and dependencies -->
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
        </div>
    </div>
</body>

</html>
