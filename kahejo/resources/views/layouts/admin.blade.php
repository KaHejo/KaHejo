<!DOCTYPE html>
<html lang="id" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Console') — KaHejo</title>
    
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

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        :root {
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
            color: #f1f5f9;
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* Ambient Glow & Grid */
        .ambient-glow-1 {
            position: fixed;
            top: -120px;
            left: 15%;
            width: 550px;
            height: 550px;
            background: radial-gradient(circle, rgba(16, 185, 129, 0.12) 0%, rgba(5, 150, 105, 0.04) 50%, transparent 70%);
            border-radius: 50%;
            pointer-events: none;
            z-index: 0;
            filter: blur(45px);
        }

        .ambient-glow-2 {
            position: fixed;
            bottom: 5%;
            right: 5%;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(52, 211, 153, 0.09) 0%, rgba(16, 185, 129, 0.03) 50%, transparent 70%);
            border-radius: 50%;
            pointer-events: none;
            z-index: 0;
            filter: blur(40px);
        }

        .ambient-grid {
            position: fixed;
            inset: 0;
            background-image: 
                linear-gradient(to right, rgba(52, 211, 153, 0.03) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(52, 211, 153, 0.03) 1px, transparent 1px);
            background-size: 44px 44px;
            pointer-events: none;
            z-index: 0;
        }

        /* Glass Surface Classes */
        .glass-card {
            background: rgba(8, 24, 18, 0.72);
            border: 1px solid rgba(52, 211, 153, 0.16);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-radius: 1.25rem;
            box-shadow: 0 10px 30px -8px rgba(0, 0, 0, 0.55), 0 0 16px -4px rgba(16, 185, 129, 0.08);
            transition: border-color 0.25s ease, box-shadow 0.25s ease, transform 0.25s ease;
        }

        .glass-card:hover {
            border-color: rgba(52, 211, 153, 0.32);
            box-shadow: 0 16px 36px -10px rgba(0, 0, 0, 0.65), 0 0 24px -6px rgba(16, 185, 129, 0.14);
        }

        .glass-panel {
            background: rgba(7, 20, 15, 0.85);
            border: 1px solid rgba(52, 211, 153, 0.2);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
        }

        /* Sidebar Styling */
        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.7rem 0.95rem;
            color: #94a3b8;
            font-size: 0.84rem;
            font-weight: 500;
            border-radius: 0.85rem;
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
            text-decoration: none;
            white-space: nowrap;
        }

        .sidebar-link:hover {
            color: #ffffff;
            background: rgba(255, 255, 255, 0.06);
            transform: translateX(3px);
        }

        .sidebar-link.active {
            color: #ffffff;
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.24) 0%, rgba(5, 150, 105, 0.14) 100%);
            border: 1px solid rgba(52, 211, 153, 0.38);
            box-shadow: 0 4px 18px -2px rgba(16, 185, 129, 0.25);
        }

        .sidebar-link.active i {
            color: #34d399;
        }

        /* Form Inputs */
        .admin-input {
            width: 100%;
            background: rgba(5, 17, 12, 0.8);
            border: 1px solid rgba(52, 211, 153, 0.22);
            border-radius: 0.85rem;
            padding: 0.7rem 1rem;
            color: #f1f5f9;
            font-size: 0.875rem;
            outline: none;
            transition: all 0.2s ease;
        }

        .admin-input:focus {
            border-color: #10b981;
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.18);
            background: rgba(6, 22, 16, 0.95);
        }

        /* Scrollbar */
        ::-webkit-scrollbar {
            width: 7px;
            height: 7px;
        }
        ::-webkit-scrollbar-track {
            background: #050d0a;
        }
        ::-webkit-scrollbar-thumb {
            background: rgba(52, 211, 153, 0.25);
            border-radius: 9999px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: rgba(52, 211, 153, 0.45);
        }
    </style>
</head>
<body class="relative">

    <!-- Ambient Lighting & Hologram Grid -->
    <div class="ambient-glow-1"></div>
    <div class="ambient-glow-2"></div>
    <div class="ambient-grid"></div>

    <div class="relative z-10 flex min-h-screen">

        <!-- Sidebar Desktop -->
        <aside class="hidden lg:flex flex-col w-64 glass-panel border-r border-emeraldBrand/20 shrink-0 sticky top-0 h-screen overflow-y-auto">
            <!-- Brand Header -->
            <div class="p-6 pb-4 border-b border-emeraldBrand/15">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 group text-decoration-none">
                    <img src="{{ asset('images/logo.svg') }}" alt="KaHejo Logo" class="w-9 h-9 object-contain drop-shadow-[0_0_10px_rgba(52,211,153,0.5)] transition-transform duration-300 group-hover:scale-105">
                    <div>
                        <div class="text-xl font-black text-white tracking-tight flex items-center gap-1.5">
                            KaHejo
                            <span class="text-[10px] uppercase font-bold tracking-widest px-1.5 py-0.5 rounded bg-emeraldBrand/20 text-mintGlow border border-emeraldBrand/30">Admin</span>
                        </div>
                        <div class="text-[11px] text-slate-400 font-medium">Climate Tech Console</div>
                    </div>
                </a>
            </div>

            <!-- Navigation Links -->
            <nav class="flex-1 px-4 py-5 space-y-6">
                <!-- Group 1: Overview -->
                <div>
                    <div class="px-3 mb-2 text-[10px] font-bold tracking-wider text-slate-400 uppercase">Dashboard Utama</div>
                    <div class="space-y-1">
                        <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->is('admin') || request()->is('admin/dashboard') ? 'active' : '' }}">
                            <i class="fa-solid fa-gauge-high text-sm w-5 text-center shrink-0"></i>
                            <span>Ringkasan Konsol</span>
                        </a>
                    </div>
                </div>

                <!-- Group 2: User & Community -->
                <div>
                    <div class="px-3 mb-2 text-[10px] font-bold tracking-wider text-slate-400 uppercase">Pengguna & Gamifikasi</div>
                    <div class="space-y-1">
                        <a href="{{ route('admin.users.index') }}" class="sidebar-link {{ request()->is('admin/users*') ? 'active' : '' }}">
                            <i class="fa-solid fa-users text-sm w-5 text-center shrink-0"></i>
                            <span>Manajemen Pengguna</span>
                        </a>
                        <a href="{{ route('admin.achievements.index') }}" class="sidebar-link {{ request()->is('admin/achievements*') ? 'active' : '' }}">
                            <i class="fa-solid fa-medal text-sm w-5 text-center shrink-0"></i>
                            <span>Katalog Prestasi</span>
                        </a>
                        <a href="{{ route('admin.user-achievements.index') }}" class="sidebar-link {{ request()->is('admin/user-achievements*') ? 'active' : '' }}">
                            <i class="fa-solid fa-award text-sm w-5 text-center shrink-0"></i>
                            <span>Pencapaian Pengguna</span>
                        </a>
                        <a href="{{ route('admin.rewards.index') }}" class="sidebar-link {{ request()->is('admin/rewards*') ? 'active' : '' }}">
                            <i class="fa-solid fa-gift text-sm w-5 text-center shrink-0"></i>
                            <span>Katalog Rewards</span>
                        </a>
                        <a href="{{ route('admin.history-claims.index') }}" class="sidebar-link {{ request()->is('admin/history-claims*') ? 'active' : '' }}">
                            <i class="fa-solid fa-receipt text-sm w-5 text-center shrink-0"></i>
                            <span>Riwayat Klaim Hadiah</span>
                        </a>
                    </div>
                </div>

                <!-- Group 3: Climate Engine & FAQ -->
                <div>
                    <div class="px-3 mb-2 text-[10px] font-bold tracking-wider text-slate-400 uppercase">Konfigurasi Emisi & Info</div>
                    <div class="space-y-1">
                        <a href="{{ route('admin.emission-factors.index') }}" class="sidebar-link {{ request()->is('admin/emission-factors*') ? 'active' : '' }}">
                            <i class="fa-solid fa-smog text-sm w-5 text-center shrink-0"></i>
                            <span>Faktor Emisi (ESDM)</span>
                        </a>
                        <a href="{{ route('admin.faqs.index') }}" class="sidebar-link {{ request()->is('admin/faqs*') ? 'active' : '' }}">
                            <i class="fa-solid fa-circle-question text-sm w-5 text-center shrink-0"></i>
                            <span>Pusat Tanya Jawab (FAQ)</span>
                        </a>
                    </div>
                </div>

                <!-- Group 4: Quick Preview -->
                <div>
                    <div class="px-3 mb-2 text-[10px] font-bold tracking-wider text-slate-400 uppercase">Akses Eksternal</div>
                    <div class="space-y-1">
                        <a href="{{ url('/main') }}" target="_blank" class="sidebar-link hover:text-emeraldBrand">
                            <i class="fa-solid fa-arrow-up-right-from-square text-sm w-5 text-center shrink-0"></i>
                            <span>Lihat Dashboard User</span>
                        </a>
                    </div>
                </div>
            </nav>

            <!-- Admin Profile & Logout Box -->
            <div class="p-4 border-t border-emeraldBrand/15 bg-black/20">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3 overflow-hidden">
                        <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-emeraldBrand to-teal-700 flex items-center justify-center text-white font-bold text-xs shrink-0 shadow-md shadow-emeraldBrand/20">
                            {{ strtoupper(substr(auth()->guard('admin')->user()->name ?? 'A', 0, 2)) }}
                        </div>
                        <div class="truncate">
                            <div class="text-xs font-bold text-white truncate">{{ auth()->guard('admin')->user()->name ?? 'Administrator' }}</div>
                            <div class="text-[10px] text-mintGlow flex items-center gap-1 font-medium">
                                <span class="w-1.5 h-1.5 rounded-full bg-emeraldBrand animate-pulse"></span>
                                Super Admin
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('admin.logout') }}" method="POST" class="inline m-0">
                        @csrf
                        <button type="submit" title="Keluar dari Konsol Admin" class="w-8 h-8 rounded-lg bg-white/5 hover:bg-rose-500/20 text-slate-400 hover:text-rose-400 transition-colors flex items-center justify-center cursor-pointer border border-white/10">
                            <i class="fa-solid fa-right-from-bracket text-xs"></i>
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        <!-- Main Wrapper -->
        <div class="flex-1 flex flex-col min-w-0">

            <!-- Top Header Glass Bar -->
            <header class="glass-panel sticky top-0 z-30 px-6 py-3.5 border-b border-emeraldBrand/15 flex items-center justify-between">
                <!-- Mobile Menu Button & Breadcrumb -->
                <div class="flex items-center gap-3">
                    <button id="mobileMenuBtn" class="lg:hidden w-9 h-9 rounded-xl bg-white/5 border border-white/10 text-white flex items-center justify-center hover:bg-white/10 transition-colors">
                        <i class="fa-solid fa-bars text-sm"></i>
                    </button>
                    <div class="hidden sm:flex items-center gap-2 text-xs text-slate-400">
                        <i class="fa-solid fa-shield-halved text-emeraldBrand text-xs"></i>
                        <span>Admin Console</span>
                        <span>/</span>
                        <span class="text-white font-semibold">@yield('page-title', 'Overview')</span>
                    </div>
                </div>

                <!-- Topbar Actions -->
                <div class="flex items-center gap-3.5">
                    <div class="hidden md:flex items-center gap-2 px-3 py-1.5 rounded-full bg-emeraldBrand/10 border border-emeraldBrand/20 text-mintGlow text-xs font-semibold">
                        <i class="fa-regular fa-calendar text-[11px]"></i>
                        <span>{{ \Carbon\Carbon::now()->isoFormat('D MMMM Y') }}</span>
                    </div>

                    <div class="h-5 w-px bg-white/10 hidden sm:block"></div>

                    <!-- User Identity Pill -->
                    <div class="flex items-center gap-2.5 px-3 py-1 rounded-xl bg-white/[0.04] border border-white/[0.08]">
                        <div class="w-6 h-6 rounded-lg bg-emeraldBrand/20 text-mintGlow text-xs flex items-center justify-center font-bold">
                            <i class="fa-solid fa-crown text-[10px]"></i>
                        </div>
                        <span class="text-xs font-bold text-slate-200 hidden sm:inline">{{ auth()->guard('admin')->user()->name ?? 'Administrator' }}</span>
                    </div>
                </div>
            </header>

            <!-- Alerts / Notifications -->
            @if(session('success'))
                <div class="px-6 pt-5 animate-slideDown">
                    <div class="p-4 rounded-2xl bg-emerald-950/80 border border-emeraldBrand/40 text-emerald-200 text-xs sm:text-sm flex items-center justify-between backdrop-blur-md shadow-lg shadow-emeraldBrand/10">
                        <div class="flex items-center gap-3">
                            <i class="fa-solid fa-circle-check text-emeraldBrand text-base"></i>
                            <span class="font-medium">{{ session('success') }}</span>
                        </div>
                        <button class="text-slate-400 hover:text-white" onclick="this.parentElement.parentElement.remove()">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>
                </div>
            @endif

            @if(session('status'))
                <div class="px-6 pt-5 animate-slideDown">
                    <div class="p-4 rounded-2xl bg-emerald-950/80 border border-emeraldBrand/40 text-emerald-200 text-xs sm:text-sm flex items-center justify-between backdrop-blur-md shadow-lg shadow-emeraldBrand/10">
                        <div class="flex items-center gap-3">
                            <i class="fa-solid fa-circle-check text-emeraldBrand text-base"></i>
                            <span class="font-medium">{{ session('status') }}</span>
                        </div>
                        <button class="text-slate-400 hover:text-white" onclick="this.parentElement.parentElement.remove()">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>
                </div>
            @endif

            @if($errors->any())
                <div class="px-6 pt-5 animate-slideDown">
                    <div class="p-4 rounded-2xl bg-rose-950/80 border border-rose-500/40 text-rose-200 text-xs sm:text-sm flex items-center justify-between backdrop-blur-md shadow-lg shadow-rose-500/10">
                        <div class="flex items-center gap-3">
                            <i class="fa-solid fa-circle-exclamation text-rose-400 text-base"></i>
                            <span class="font-medium">{{ $errors->first() }}</span>
                        </div>
                        <button class="text-slate-400 hover:text-white" onclick="this.parentElement.parentElement.remove()">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>
                </div>
            @endif

            <!-- Main Dynamic Content -->
            <main class="flex-1 p-6 lg:p-8">
                @yield('main-content')
            </main>

            <!-- Footer -->
            <footer class="py-5 px-6 border-t border-emeraldBrand/15 text-center text-xs text-slate-400 glass-panel">
                <div class="flex flex-col sm:flex-row items-center justify-between gap-3 max-w-7xl mx-auto">
                    <div>
                        &copy; {{ date('Y') }} <strong class="text-slate-300">KaHejo Platform</strong> — Konsol Administrator Net-Zero Terpadu.
                    </div>
                    <div class="flex items-center gap-2 text-slate-400">
                        <span class="w-2 h-2 rounded-full bg-emeraldBrand"></span>
                        <span>Server Environment: Active</span>
                    </div>
                </div>
            </footer>
        </div>

    </div>

    <!-- Mobile Slideover Backdrop -->
    <div id="mobileDrawerBackdrop" class="fixed inset-0 bg-black/70 backdrop-blur-sm z-40 hidden lg:hidden transition-opacity duration-300"></div>

    <!-- Mobile Drawer -->
    <div id="mobileDrawer" class="fixed inset-y-0 left-0 w-72 glass-panel z-50 transform -translate-x-full lg:hidden transition-transform duration-300 flex flex-col p-6 overflow-y-auto">
        <div class="flex items-center justify-between mb-6 pb-4 border-b border-white/10">
            <div class="flex items-center gap-3">
                <img src="{{ asset('images/logo.svg') }}" alt="KaHejo Logo" class="w-8 h-8 object-contain">
                <span class="font-bold text-white text-lg">KaHejo Admin</span>
            </div>
            <button id="closeDrawerBtn" class="text-slate-400 hover:text-white">
                <i class="fa-solid fa-xmark text-lg"></i>
            </button>
        </div>

        <nav class="space-y-1.5 flex-1">
            <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->is('admin') || request()->is('admin/dashboard') ? 'active' : '' }}">
                <i class="fa-solid fa-gauge-high text-sm w-5 text-center shrink-0"></i>
                <span>Ringkasan Konsol</span>
            </a>
            <a href="{{ route('admin.users.index') }}" class="sidebar-link {{ request()->is('admin/users*') ? 'active' : '' }}">
                <i class="fa-solid fa-users text-sm w-5 text-center shrink-0"></i>
                <span>Manajemen Pengguna</span>
            </a>
            <a href="{{ route('admin.achievements.index') }}" class="sidebar-link {{ request()->is('admin/achievements*') ? 'active' : '' }}">
                <i class="fa-solid fa-medal text-sm w-5 text-center shrink-0"></i>
                <span>Katalog Prestasi</span>
            </a>
            <a href="{{ route('admin.user-achievements.index') }}" class="sidebar-link {{ request()->is('admin/user-achievements*') ? 'active' : '' }}">
                <i class="fa-solid fa-award text-sm w-5 text-center shrink-0"></i>
                <span>Pencapaian Pengguna</span>
            </a>
            <a href="{{ route('admin.rewards.index') }}" class="sidebar-link {{ request()->is('admin/rewards*') ? 'active' : '' }}">
                <i class="fa-solid fa-gift text-sm w-5 text-center shrink-0"></i>
                <span>Katalog Rewards</span>
            </a>
            <a href="{{ route('admin.history-claims.index') }}" class="sidebar-link {{ request()->is('admin/history-claims*') ? 'active' : '' }}">
                <i class="fa-solid fa-receipt text-sm w-5 text-center shrink-0"></i>
                <span>Riwayat Klaim Hadiah</span>
            </a>
            <a href="{{ route('admin.emission-factors.index') }}" class="sidebar-link {{ request()->is('admin/emission-factors*') ? 'active' : '' }}">
                <i class="fa-solid fa-smog text-sm w-5 text-center shrink-0"></i>
                <span>Faktor Emisi</span>
            </a>
            <a href="{{ route('admin.faqs.index') }}" class="sidebar-link {{ request()->is('admin/faqs*') ? 'active' : '' }}">
                <i class="fa-solid fa-circle-question text-sm w-5 text-center shrink-0"></i>
                <span>Manajemen FAQ</span>
            </a>
            <a href="{{ url('/main') }}" target="_blank" class="sidebar-link">
                <i class="fa-solid fa-arrow-up-right-from-square text-sm w-5 text-center shrink-0"></i>
                <span>Lihat Dashboard User</span>
            </a>
        </nav>

        <div class="pt-4 border-t border-white/10 mt-6">
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full py-2.5 px-4 rounded-xl bg-rose-600/20 hover:bg-rose-600/30 text-rose-300 font-semibold text-xs flex items-center justify-center gap-2 border border-rose-500/30 transition-colors cursor-pointer">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span>Keluar Konsol Admin</span>
                </button>
            </form>
        </div>
    </div>

    <!-- Mobile Drawer Script -->
    <script>
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const closeDrawerBtn = document.getElementById('closeDrawerBtn');
        const mobileDrawer = document.getElementById('mobileDrawer');
        const mobileDrawerBackdrop = document.getElementById('mobileDrawerBackdrop');

        function openDrawer() {
            mobileDrawer.classList.remove('-translate-x-full');
            mobileDrawerBackdrop.classList.remove('hidden');
        }

        function closeDrawer() {
            mobileDrawer.classList.add('-translate-x-full');
            mobileDrawerBackdrop.classList.add('hidden');
        }

        if (mobileMenuBtn) mobileMenuBtn.addEventListener('click', openDrawer);
        if (closeDrawerBtn) closeDrawerBtn.addEventListener('click', closeDrawer);
        if (mobileDrawerBackdrop) mobileDrawerBackdrop.addEventListener('click', closeDrawer);
    </script>
</body>
</html>
