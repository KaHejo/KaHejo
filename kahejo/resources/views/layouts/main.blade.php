<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">
    <div class="flex flex-1">
        <!-- Sidebar -->
        <aside class="w-64 bg-red-900 text-white flex flex-col min-h-screen">
            <div class="p-6 text-2xl font-bold tracking-wide border-b border-red-800">kaHejo</div>
            <nav class="flex-1 px-4 py-6">
                <ul class="space-y-2">
                    <li><a href="#" class="block px-4 py-2 rounded {{ request()->is('admin/dashboard') ? 'bg-red-800' : 'hover:bg-red-800' }}">Dashboard</a></li>
                    <li><a href="#" class="block px-4 py-2 rounded hover:bg-red-800">History Carbon</a></li>
                    <li><a href="#" class="block px-4 py-2 rounded hover:bg-red-800">Point Rules</a></li>
                </ul>
                <div class="mt-8 text-xs text-gray-300 uppercase tracking-wider">Akun</div>
                <ul class="space-y-2 mt-2">
                    <li><a href="#" class="block px-4 py-2 rounded hover:bg-red-800">Profil</a></li>
                    <li><a href="#" class="block px-4 py-2 rounded hover:bg-red-800">Pengaturan</a></li>
                    <li><a href="#" class="block px-4 py-2 rounded hover:bg-red-800">Keluar</a></li>
                    <li><a href="#" class="block px-4 py-2 rounded hover:bg-red-800">General</a></li>
                </ul>
            </nav>
        </aside>
        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Navbar -->
            <header class="bg-white shadow flex items-center justify-between px-6 py-4">
                <div class="font-bold text-xl text-red-900">Dashbord Admin</div>
                <div class="flex items-center space-x-4">
                    <input type="text" placeholder="Search..." class="border rounded px-3 py-1 focus:outline-none focus:ring-2 focus:ring-red-300">
                    <button class="relative">
                        <svg class="w-6 h-6 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V4a2 2 0 10-4 0v1.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                    </button>
                    <div class="relative">
                        <button class="flex items-center space-x-2 focus:outline-none">
                            <span>John</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <!-- Dropdown (optional) -->
                    </div>
                </div>
            </header>
            <!-- Page Content -->
            <main class="flex-1 p-6">
                @yield('content')
            </main>
            <!-- Footer -->
            <footer class="bg-white text-gray-500 text-center py-3 border-t">&copy; {{ date('Y') }} kaHejo. All rights reserved.</footer>
        </div>
    </div>
</body>
</html> 