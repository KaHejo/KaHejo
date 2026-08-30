<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') — KaHejo</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        emeraldBrand: '#10b981',
                        emeraldDark: '#059669',
                        mintGlow: '#34d399',
                        obsidianBg: '#050d0a',
                        dark: {
                            'bg-primary': '#050d0a',
                            'bg-secondary': '#0b1c15',
                            'text-primary': '#ffffff',
                            'text-secondary': '#94a3b8',
                            'border': 'rgba(52, 211, 153, 0.18)'
                        }
                    },
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400&display=swap" rel="stylesheet">

    <style>
        :root {
            /* Deep Obsidian Emerald Palette */
            --bg-page-start: #050d0a;
            --bg-page-mid: #081611;
            --bg-page-end: #060f0c;
            --bg-page: linear-gradient(180deg, var(--bg-page-start) 0%, var(--bg-page-mid) 50%, var(--bg-page-end) 100%);
            --primary-emerald: #10b981;
            --primary-mint: #34d399;
        }

        * {
            box-sizing: border-box;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        body {
            background: var(--bg-page);
            background-color: #050d0a;
            color: #f8fafc;
            min-height: 100vh;
            overflow-x: hidden;
            position: relative;
        }

        /* Ambient Dynamic Glows */
        .ambient-glow-1 {
            position: fixed;
            top: -15%;
            left: 10%;
            width: 700px;
            height: 700px;
            background: radial-gradient(circle, rgba(16, 185, 129, 0.16) 0%, rgba(5, 13, 10, 0) 70%);
            border-radius: 50%;
            pointer-events: none;
            z-index: 0;
            filter: blur(90px);
            animation: pulseGlow 12s ease-in-out infinite alternate;
        }

        .ambient-glow-2 {
            position: fixed;
            bottom: -10%;
            right: 5%;
            width: 750px;
            height: 750px;
            background: radial-gradient(circle, rgba(5, 150, 105, 0.12) 0%, rgba(5, 13, 10, 0) 70%);
            border-radius: 50%;
            pointer-events: none;
            z-index: 0;
            filter: blur(100px);
            animation: pulseGlow 16s ease-in-out infinite alternate-reverse;
        }

        .ambient-grid {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                linear-gradient(rgba(255, 255, 255, 0.025) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 255, 255, 0.025) 1px, transparent 1px);
            background-size: 56px 56px;
            pointer-events: none;
            z-index: 0;
        }

        @keyframes pulseGlow {
            0% { transform: scale(1) translate(0, 0); opacity: 0.65; }
            100% { transform: scale(1.16) translate(30px, 30px); opacity: 0.95; }
        }

        /* Glass Cards */
        .glass-card {
            background: linear-gradient(145deg, rgba(11, 28, 21, 0.82) 0%, rgba(6, 17, 12, 0.9) 100%);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(52, 211, 153, 0.18);
            border-radius: 18px;
            box-shadow: 0 14px 32px -6px rgba(0, 0, 0, 0.55), 0 0 20px rgba(16, 185, 129, 0.06);
            transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.3s ease, border-color 0.3s ease;
        }

        .glass-card:hover {
            transform: translateY(-3px);
            border-color: rgba(52, 211, 153, 0.45);
            box-shadow: 0 20px 40px -8px rgba(0, 0, 0, 0.7), 0 0 28px rgba(52, 211, 153, 0.18);
        }

        /* Nav Link Styling */
        .nav-link {
            position: relative;
            padding: 0.45rem 0.85rem;
            border-radius: 12px;
            font-size: 0.84rem;
            font-weight: 600;
            color: #94a3b8;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 7px;
            text-decoration: none;
        }

        .nav-link:hover {
            color: #ffffff;
            background: rgba(255, 255, 255, 0.06);
        }

        .nav-link.active {
            color: #34d399;
            background: rgba(16, 185, 129, 0.14);
            border: 1px solid rgba(52, 211, 153, 0.3);
            box-shadow: 0 0 12px rgba(16, 185, 129, 0.15);
        }

        /* Logout button */
        .logout-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 0.45rem 1.15rem;
            border-radius: 9999px;
            font-size: 0.82rem;
            font-weight: 700;
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: #ffffff;
            border: 1px solid rgba(52, 211, 153, 0.35);
            box-shadow: 0 4px 14px rgba(16, 185, 129, 0.3);
            transition: all 0.25s ease;
            cursor: pointer;
        }

        .logout-btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(16, 185, 129, 0.5);
            background: linear-gradient(135deg, #34d399 0%, #059669 100%);
        }
    </style>
    @yield('styles')
</head>
<body class="transition-colors duration-200">

    <!-- Ambient Dynamic Background -->
    <div class="ambient-glow-1"></div>
    <div class="ambient-glow-2"></div>
    <div class="ambient-grid"></div>

    <!-- Modern Glass Navbar -->
    <nav class="sticky top-0 z-50 bg-[#050d0a]/85 backdrop-blur-2xl border-b border-emeraldBrand/20 transition-colors duration-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                
                <!-- Brand Logo (Standalone Icon — No Card Box) & Navigation -->
                <div class="flex items-center gap-6">
                    <a href="{{ route('main') }}" class="flex items-center gap-2.5 group text-decoration-none">
                        <img src="{{ asset('images/logo.svg') }}" alt="KaHejo Logo" class="w-8 h-8 object-contain drop-shadow-[0_0_10px_rgba(52,211,153,0.5)] transition-transform duration-300 group-hover:scale-110 group-hover:rotate-6">
                        <span class="text-xl font-extrabold text-white tracking-tight">KaHejo</span>
                    </a>

                    <!-- Navigation Links -->
                    <div class="hidden lg:flex items-center space-x-1">
                        <a href="{{ route('main') }}" class="nav-link {{ request()->routeIs('main') ? 'active' : '' }}">
                            <i class="fa-solid fa-house text-xs"></i>
                            <span>Dashboard</span>
                        </a>
                        <a href="{{ route('profile') }}" class="nav-link {{ request()->routeIs('profile') ? 'active' : '' }}">
                            <i class="fa-solid fa-user text-xs"></i>
                            <span>Profile</span>
                        </a>
                        <a href="{{ route('carbon') }}" class="nav-link {{ request()->routeIs('carbon') ? 'active' : '' }}">
                            <i class="fa-solid fa-calculator text-xs"></i>
                            <span>Kalkulator</span>
                        </a>
                        <a href="{{ route('company') }}" class="nav-link {{ request()->routeIs('company') ? 'active' : '' }}">
                            <i class="fa-solid fa-chart-line text-xs"></i>
                            <span>Konsumsi Energi</span>
                        </a>
                        <a href="{{ route('achievements') }}" class="nav-link {{ request()->routeIs('achievements.*') ? 'active' : '' }}">
                            <i class="fa-solid fa-medal text-xs"></i>
                            <span>Prestasi</span>
                        </a>
                        <a href="{{ route('education') }}" class="nav-link {{ request()->routeIs('education') ? 'active' : '' }}">
                            <i class="fa-solid fa-book-open text-xs"></i>
                            <span>Edukasi</span>
                        </a>
                        <a href="{{ route('faqs.index') }}" class="nav-link {{ request()->routeIs('faqs.index') ? 'active' : '' }}">
                            <i class="fa-solid fa-circle-question text-xs"></i>
                            <span>FAQ</span>
                        </a>
                    </div>
                </div>

                <!-- Right Side Actions -->
                <div class="flex items-center space-x-4">
                    <!-- Dark/Light Mode Toggle -->
                    <button id="darkModeToggle" class="p-2 rounded-xl bg-white/[0.05] hover:bg-white/[0.1] text-slate-300 hover:text-white border border-white/10 transition-colors" title="Ubah Tema">
                        <i class="fa-solid fa-sun text-amber-400 dark:hidden text-xs"></i>
                        <i class="fa-solid fa-moon text-mintGlow hidden dark:block text-xs"></i>
                    </button>

                    <!-- User Profile Pill -->
                    <div class="hidden sm:flex items-center bg-white/[0.05] border border-white/10 hover:border-emeraldBrand/30 rounded-full px-3 py-1 gap-2.5 transition-colors">
                        <div class="w-7 h-7 rounded-full bg-emerald-700/80 border border-mintGlow/60 flex items-center justify-center text-xs font-bold text-white shadow-sm">
                            {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                        </div>
                        <div>
                            <p class="text-xs font-bold text-white leading-none">{{ Auth::user()->name }}</p>
                            <p class="text-[10px] text-mintGlow font-medium leading-none mt-0.5">Pengguna Aktif</p>
                        </div>
                    </div>

                    <!-- Logout Button -->
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="logout-btn">
                            <i class="fa-solid fa-right-from-bracket text-xs"></i>
                            <span>Keluar</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Flash Messages -->
    @if(session('success'))
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4 relative z-20">
        <div class="bg-emerald-500/15 border border-emerald-500/30 text-emerald-200 px-4 py-3 rounded-2xl flex items-center gap-3 backdrop-blur-md" role="alert">
            <i class="fa-solid fa-circle-check text-emerald-400"></i>
            <span class="text-sm font-medium">{{ session('success') }}</span>
        </div>
    </div>
    @endif

    @if(session('error'))
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4 relative z-20">
        <div class="bg-rose-500/15 border border-rose-500/30 text-rose-200 px-4 py-3 rounded-2xl flex items-center gap-3 backdrop-blur-md" role="alert">
            <i class="fa-solid fa-circle-exclamation text-rose-400"></i>
            <span class="text-sm font-medium">{{ session('error') }}</span>
        </div>
    </div>
    @endif

    <!-- Main Content Wrapper -->
    <div class="relative z-10">
        @yield('content')
    </div>

    <!-- Scripts -->
    <script>
        // Dark mode toggle functionality
        const darkModeToggle = document.getElementById('darkModeToggle');
        const html = document.documentElement;
        
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            html.classList.add('dark');
        } else {
            html.classList.remove('dark');
        }

        if (darkModeToggle) {
            darkModeToggle.addEventListener('click', () => {
                html.classList.toggle('dark');
                localStorage.theme = html.classList.contains('dark') ? 'dark' : 'light';
            });
        }
    </script>

    @yield('scripts')
</body>
</html>
