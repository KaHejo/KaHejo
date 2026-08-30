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

        /* Sidebar Navigation Item */
        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0.7rem 0.9rem;
            border-radius: 14px;
            font-size: 0.86rem;
            font-weight: 600;
            color: #94a3b8;
            transition: all 0.2s ease;
            text-decoration: none;
        }

        .sidebar-link:hover {
            color: #ffffff;
            background: rgba(255, 255, 255, 0.06);
            transform: translateX(3px);
        }

        .sidebar-link.active {
            color: #34d399;
            background: rgba(16, 185, 129, 0.14);
            border: 1px solid rgba(52, 211, 153, 0.3);
            box-shadow: 0 0 16px rgba(16, 185, 129, 0.15);
        }

        .sidebar-icon {
            width: 32px;
            height: 32px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.9rem;
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.08);
            transition: all 0.2s ease;
        }

        .sidebar-link:hover .sidebar-icon {
            background: rgba(16, 185, 129, 0.15);
            border-color: rgba(52, 211, 153, 0.35);
            color: #34d399;
        }

        .sidebar-link.active .sidebar-icon {
            background: rgba(16, 185, 129, 0.25);
            border-color: rgba(52, 211, 153, 0.5);
            color: #34d399;
        }

        /* Logout button */
        .logout-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            width: 100%;
            padding: 0.65rem 1rem;
            border-radius: 12px;
            font-size: 0.82rem;
            font-weight: 700;
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: #ffffff;
            border: 1px solid rgba(52, 211, 153, 0.35);
            box-shadow: 0 4px 14px rgba(16, 185, 129, 0.25);
            transition: all 0.25s ease;
            cursor: pointer;
        }

        .logout-btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(16, 185, 129, 0.45);
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

    <!-- Mobile Sidebar Backdrop Overlay -->
    <div id="sidebarBackdrop" class="fixed inset-0 z-40 bg-black/70 backdrop-blur-sm hidden transition-opacity duration-300"></div>

    <!-- ============================================== -->
    <!-- SLICK OBSIDIAN EMERALD SIDEBAR -->
    <!-- ============================================== -->
    <aside id="appSidebar" class="fixed inset-y-0 left-0 z-50 w-64 bg-[#05110c]/95 backdrop-blur-2xl border-r border-emeraldBrand/20 flex flex-col justify-between transition-transform duration-300 ease-in-out -translate-x-full lg:translate-x-0 shadow-2xl lg:shadow-none">
        
        <!-- Sidebar Top: Brand & Navigation -->
        <div class="flex flex-col h-full overflow-y-auto px-4 py-5">
            
            <!-- Brand Logo Header -->
            <div class="flex items-center justify-between pb-5 mb-4 border-b border-white/[0.08]">
                <a href="{{ route('main') }}" class="flex items-center gap-2.5 group text-decoration-none">
                    <img src="{{ asset('images/logo.svg') }}" alt="KaHejo Logo" class="w-8 h-8 object-contain drop-shadow-[0_0_10px_rgba(52,211,153,0.5)] transition-transform duration-300 group-hover:scale-110 group-hover:rotate-6">
                    <div>
                        <span class="text-xl font-extrabold text-white tracking-tight leading-none block">KaHejo</span>
                        <span class="text-[10px] text-mintGlow font-semibold uppercase tracking-wider block mt-0.5">Climate-Tech</span>
                    </div>
                </a>

                <!-- Close Button (Mobile Only) -->
                <button id="sidebarClose" class="lg:hidden p-1.5 rounded-lg bg-white/[0.05] hover:bg-white/[0.1] text-slate-400 hover:text-white transition-colors" aria-label="Tutup Menu">
                    <i class="fa-solid fa-xmark text-sm"></i>
                </button>
            </div>

            <!-- User Account Dropdown Component -->
            <div class="relative mb-4" id="userAccountDropdownContainer">
                <button type="button" 
                        id="userDropdownBtn" 
                        class="w-full p-2.5 rounded-2xl bg-white/[0.04] hover:bg-white/[0.08] border border-white/[0.08] hover:border-emeraldBrand/35 transition-all duration-200 flex items-center justify-between group cursor-pointer focus:outline-none select-none"
                        aria-expanded="false" 
                        aria-haspopup="true">
                    <div class="flex items-center gap-3 overflow-hidden text-left">
                        @if(Auth::user()->profile_photo_path)
                            <img src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}" alt="{{ Auth::user()->name }}" class="w-9 h-9 rounded-full object-cover border border-mintGlow/60 shadow-sm shrink-0 group-hover:scale-105 transition-transform">
                        @else
                            <div class="w-9 h-9 rounded-full bg-emerald-700/80 border border-mintGlow/60 flex items-center justify-center text-xs font-bold text-white shadow-sm shrink-0 group-hover:scale-105 transition-transform">
                                {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                            </div>
                        @endif
                        <div class="overflow-hidden">
                            <p class="text-xs font-bold text-white truncate leading-tight group-hover:text-mintGlow transition-colors">{{ Auth::user()->name }}</p>
                            <p class="text-[11px] text-mintGlow font-medium truncate mt-0.5 flex items-center gap-1">
                                <span class="w-1.5 h-1.5 rounded-full bg-emeraldBrand animate-pulse"></span>
                                <span>Pengguna Aktif</span>
                            </p>
                        </div>
                    </div>
                    <div class="w-6 h-6 rounded-lg bg-white/[0.03] flex items-center justify-center text-slate-400 group-hover:text-mintGlow group-hover:bg-emeraldBrand/10 transition-all shrink-0">
                        <i class="fa-solid fa-chevron-down text-xs transition-transform duration-300" id="userDropdownChevron"></i>
                    </div>
                </button>

                <!-- Dropdown Menu Body -->
                <div id="userDropdownMenu" class="hidden mt-2 p-1.5 rounded-2xl bg-[#091812]/95 backdrop-blur-2xl border border-emeraldBrand/25 shadow-2xl shadow-black/70 space-y-1">
                    <!-- Option 1: Profile -->
                    <a href="{{ route('profile') }}" class="flex items-center gap-2.5 px-3 py-2.5 rounded-xl text-xs font-semibold {{ request()->routeIs('profile') ? 'text-mintGlow bg-emeraldBrand/15 border border-emeraldBrand/25' : 'text-slate-300 hover:text-white hover:bg-white/[0.06]' }} transition-all group/item">
                        <div class="w-7 h-7 rounded-lg bg-emeraldBrand/15 border border-emeraldBrand/25 flex items-center justify-center text-mintGlow text-xs transition-colors">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <div class="flex-1">
                            <span class="block text-white font-bold leading-tight">Profile Saya</span>
                            <span class="block text-[10px] text-slate-400">Info akun & foto</span>
                        </div>
                        <i class="fa-solid fa-chevron-right text-[10px] text-slate-500 group-hover/item:text-mintGlow transition-colors"></i>
                    </a>

                    <!-- Option 2: Settings -->
                    <a href="{{ route('settings') }}" class="flex items-center gap-2.5 px-3 py-2.5 rounded-xl text-xs font-semibold {{ request()->routeIs('settings') ? 'text-mintGlow bg-emeraldBrand/15 border border-emeraldBrand/25' : 'text-slate-300 hover:text-white hover:bg-white/[0.06]' }} transition-all group/item">
                        <div class="w-7 h-7 rounded-lg bg-emeraldBrand/15 border border-emeraldBrand/25 flex items-center justify-center text-mintGlow text-xs transition-colors">
                            <i class="fa-solid fa-gear"></i>
                        </div>
                        <div class="flex-1">
                            <span class="block text-white font-bold leading-tight">Pengaturan</span>
                            <span class="block text-[10px] text-slate-400">Sistem & preferensi</span>
                        </div>
                        <i class="fa-solid fa-chevron-right text-[10px] text-slate-500 group-hover/item:text-mintGlow transition-colors"></i>
                    </a>
                </div>
            </div>

            <!-- Navigation Links List (Tanpa 'Profile Saya' Karena Sudah Ada di Dropdown) -->
            <div class="space-y-1.5 flex-1">
                <div class="text-[11px] font-bold text-slate-500 uppercase tracking-wider px-3 mb-2">Menu Utama</div>

                <a href="{{ route('main') }}" class="sidebar-link {{ request()->routeIs('main') ? 'active' : '' }}">
                    <div class="sidebar-icon">
                        <i class="fa-solid fa-gauge-high"></i>
                    </div>
                    <span>Dashboard</span>
                </a>

                <a href="{{ route('carbon') }}" class="sidebar-link {{ request()->routeIs('carbon') ? 'active' : '' }}">
                    <div class="sidebar-icon">
                        <i class="fa-solid fa-calculator"></i>
                    </div>
                    <span>Kalkulator Karbon</span>
                </a>

                <a href="{{ route('company') }}" class="sidebar-link {{ request()->routeIs('company') ? 'active' : '' }}">
                    <div class="sidebar-icon">
                        <i class="fa-solid fa-chart-line"></i>
                    </div>
                    <span>Konsumsi Energi</span>
                </a>

                <a href="{{ route('achievements') }}" class="sidebar-link {{ (request()->routeIs('achievements*') || request()->routeIs('rewards*')) ? 'active' : '' }}">
                    <div class="sidebar-icon">
                        <i class="fa-solid fa-medal"></i>
                    </div>
                    <span>Prestasi & Rewards</span>
                </a>

                <a href="{{ route('education') }}" class="sidebar-link {{ request()->routeIs('education') ? 'active' : '' }}">
                    <div class="sidebar-icon">
                        <i class="fa-solid fa-book-open"></i>
                    </div>
                    <span>Edukasi Iklim</span>
                </a>

                <a href="{{ route('faqs.index') }}" class="sidebar-link {{ request()->routeIs('faqs.index') ? 'active' : '' }}">
                    <div class="sidebar-icon">
                        <i class="fa-solid fa-circle-question"></i>
                    </div>
                    <span>Tanya Jawab (FAQ)</span>
                </a>

                <div class="pt-3 pb-1">
                    <div class="text-[11px] font-bold text-slate-500 uppercase tracking-wider px-3 mb-2">Pintasan</div>
                    <a href="/" class="sidebar-link">
                        <div class="sidebar-icon">
                            <i class="fa-solid fa-arrow-left"></i>
                        </div>
                        <span>Halaman Depan</span>
                    </a>
                </div>
            </div>

            <!-- Sidebar Bottom: Logout -->
            <div class="pt-4 mt-4 border-t border-white/[0.08]">
                <form action="{{ route('logout') }}" method="POST" class="w-full">
                    @csrf
                    <button type="submit" class="logout-btn">
                        <i class="fa-solid fa-right-from-bracket text-xs"></i>
                        <span>Keluar Akun</span>
                    </button>
                </form>
            </div>

        </div>
    </aside>

    <!-- ============================================== -->
    <!-- MAIN CONTENT CONTAINER (Adjusted with Sidebar) -->
    <!-- ============================================== -->
    <div id="mainContent" class="transition-all duration-300 min-h-screen lg:ml-64 flex flex-col relative z-10">
        
        <!-- Topbar with Hamburger (Tiga Garis) Icon -->
        <header id="appTopBar" class="sticky top-0 z-30 h-16 bg-[#050d0a]/85 backdrop-blur-2xl border-b border-emeraldBrand/20 flex items-center justify-between px-4 sm:px-6 lg:px-8 transition-all duration-200">
            
            <!-- Left: Three-line Hamburger Button & Breadcrumb -->
            <div class="flex items-center gap-3 sm:gap-4">
                <!-- Three-line (Tiga Garis) Hamburger Button -->
                <button id="sidebarToggle" class="w-10 h-10 rounded-xl bg-white/[0.06] hover:bg-white/[0.12] text-mintGlow hover:text-white border border-white/10 flex items-center justify-center transition-all duration-200 cursor-pointer shadow-sm active:scale-95" aria-label="Toggle Sidebar" title="Buka/Tutup Sidebar">
                    <i class="fa-solid fa-bars text-base"></i>
                </button>

                <!-- Current Page Title Breadcrumb -->
                <div>
                    <h2 class="text-base sm:text-lg font-extrabold text-white tracking-tight leading-none">
                        @yield('title', 'Dashboard')
                    </h2>
                    <span class="text-[11px] text-slate-400 hidden sm:inline-block mt-0.5">KaHejo Net-Zero Intelligence</span>
                </div>
            </div>

            <!-- Right: Status Pill & Theme Toggle -->
            <div class="flex items-center gap-3">
                <!-- Quick Home Link -->
                <a href="/" class="hidden sm:inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-white/[0.04] hover:bg-white/[0.08] text-slate-300 hover:text-white border border-white/10 text-xs font-semibold transition-colors">
                    <i class="fa-solid fa-house text-xs text-mintGlow"></i>
                    <span>Beranda</span>
                </a>

                <!-- Dark/Light Mode Toggle -->
                <button id="darkModeToggle" class="p-2 rounded-xl bg-white/[0.05] hover:bg-white/[0.1] text-slate-300 hover:text-white border border-white/10 transition-colors" title="Ubah Tema">
                    <i class="fa-solid fa-sun text-amber-400 dark:hidden text-xs"></i>
                    <i class="fa-solid fa-moon text-mintGlow hidden dark:block text-xs"></i>
                </button>

                <!-- Compact Avatar Indicator -->
                <div class="flex items-center gap-2 pl-2 border-l border-white/10">
                    @if(Auth::user()->profile_photo_path)
                        <img src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}" alt="{{ Auth::user()->name }}" class="w-8 h-8 rounded-full object-cover border border-mintGlow/60 shadow-sm">
                    @else
                        <div class="w-8 h-8 rounded-full bg-emerald-700/80 border border-mintGlow/60 flex items-center justify-center text-xs font-bold text-white shadow-sm">
                            {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                        </div>
                    @endif
                </div>
            </div>
        </header>

        <!-- Flash Notifications -->
        @if(session('success'))
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4 w-full">
            <div class="bg-emerald-500/15 border border-emerald-500/30 text-emerald-200 px-4 py-3 rounded-2xl flex items-center gap-3 backdrop-blur-md" role="alert">
                <i class="fa-solid fa-circle-check text-emerald-400"></i>
                <span class="text-sm font-medium">{{ session('success') }}</span>
            </div>
        </div>
        @endif

        @if(session('error'))
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4 w-full">
            <div class="bg-rose-500/15 border border-rose-500/30 text-rose-200 px-4 py-3 rounded-2xl flex items-center gap-3 backdrop-blur-md" role="alert">
                <i class="fa-solid fa-circle-exclamation text-rose-400"></i>
                <span class="text-sm font-medium">{{ session('error') }}</span>
            </div>
        </div>
        @endif

        <!-- Page Yield Content -->
        <main class="flex-1">
            @yield('content')
        </main>

    </div>

    <!-- Scripts: Sidebar Toggle & Dark Mode -->
    <script>
        // Sidebar Toggle Logic
        const sidebar = document.getElementById('appSidebar');
        const sidebarToggle = document.getElementById('sidebarToggle');
        const sidebarClose = document.getElementById('sidebarClose');
        const sidebarBackdrop = document.getElementById('sidebarBackdrop');
        const mainContent = document.getElementById('mainContent');

        function toggleSidebar() {
            const isMobile = window.innerWidth < 1024;
            if (isMobile) {
                // Mobile Slide-in Drawer
                const isOpen = !sidebar.classList.contains('-translate-x-full');
                if (isOpen) {
                    sidebar.classList.add('-translate-x-full');
                    sidebarBackdrop.classList.add('hidden');
                } else {
                    sidebar.classList.remove('-translate-x-full');
                    sidebarBackdrop.classList.remove('hidden');
                }
            } else {
                // Desktop Collapse / Expand
                const isCollapsed = sidebar.classList.contains('lg:-translate-x-full');
                if (isCollapsed) {
                    sidebar.classList.remove('lg:-translate-x-full');
                    mainContent.classList.add('lg:ml-64');
                    localStorage.setItem('kahejo_sidebar_collapsed', 'false');
                } else {
                    sidebar.classList.add('lg:-translate-x-full');
                    mainContent.classList.remove('lg:ml-64');
                    localStorage.setItem('kahejo_sidebar_collapsed', 'true');
                }
            }
        }

        if (sidebarToggle) sidebarToggle.addEventListener('click', toggleSidebar);
        if (sidebarClose) sidebarClose.addEventListener('click', toggleSidebar);
        if (sidebarBackdrop) sidebarBackdrop.addEventListener('click', toggleSidebar);

        // Restore saved desktop state on load
        if (window.innerWidth >= 1024 && localStorage.getItem('kahejo_sidebar_collapsed') === 'true') {
            sidebar.classList.add('lg:-translate-x-full');
            mainContent.classList.remove('lg:ml-64');
        }

        // User Account Dropdown Toggle Logic
        const userDropdownBtn = document.getElementById('userDropdownBtn');
        const userDropdownMenu = document.getElementById('userDropdownMenu');
        const userDropdownChevron = document.getElementById('userDropdownChevron');

        if (userDropdownBtn && userDropdownMenu) {
            userDropdownBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                const isHidden = userDropdownMenu.classList.contains('hidden');
                if (isHidden) {
                    userDropdownMenu.classList.remove('hidden');
                    userDropdownBtn.setAttribute('aria-expanded', 'true');
                    if (userDropdownChevron) userDropdownChevron.style.transform = 'rotate(180deg)';
                } else {
                    userDropdownMenu.classList.add('hidden');
                    userDropdownBtn.setAttribute('aria-expanded', 'false');
                    if (userDropdownChevron) userDropdownChevron.style.transform = 'rotate(0deg)';
                }
            });

            // Close dropdown when clicking anywhere outside
            document.addEventListener('click', (e) => {
                if (!userDropdownBtn.contains(e.target) && !userDropdownMenu.contains(e.target)) {
                    userDropdownMenu.classList.add('hidden');
                    userDropdownBtn.setAttribute('aria-expanded', 'false');
                    if (userDropdownChevron) userDropdownChevron.style.transform = 'rotate(0deg)';
                }
            });
        }

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
