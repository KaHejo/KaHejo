<!DOCTYPE html>
<html lang="id" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="view-transition" content="same-origin">
    <title>@yield('title', 'Admin Console') — KaHejo</title>
    
    <!-- KaHejo Favicon / Web Tab Icon -->
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/logo.svg') }}">
    <link rel="alternate icon" type="image/jpeg" href="{{ asset('images/logo.jpg') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/logo.jpg') }}">
    
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

    <!-- Head Theme Initializer -->
    <script>
        (function() {
            const savedTheme = localStorage.getItem('theme');
            if (savedTheme === 'light') {
                document.documentElement.classList.remove('dark');
            } else if (savedTheme === 'dark') {
                document.documentElement.classList.add('dark');
            } else if (window.matchMedia('(prefers-color-scheme: light)').matches) {
                document.documentElement.classList.remove('dark');
            } else {
                document.documentElement.classList.add('dark');
            }
        })();
    </script>

    <style>
        /* Smooth Global Theme Transition */
        html.theme-transitioning,
        html.theme-transitioning *,
        html.theme-transitioning *::before,
        html.theme-transitioning *::after {
            transition: background-color 0.45s cubic-bezier(0.16, 1, 0.3, 1),
                        border-color 0.45s cubic-bezier(0.16, 1, 0.3, 1),
                        color 0.35s cubic-bezier(0.16, 1, 0.3, 1),
                        box-shadow 0.45s cubic-bezier(0.16, 1, 0.3, 1) !important;
        }

        /* Theme Toggle Button Spin Spring Animation */
        .theme-toggle-spin {
            animation: themeSpin 0.55s cubic-bezier(0.34, 1.56, 0.64, 1) both;
        }
        @keyframes themeSpin {
            0% { transform: rotate(0deg) scale(0.9); }
            50% { transform: rotate(180deg) scale(1.25); }
            100% { transform: rotate(360deg) scale(1); }
        }

        /* Native View Transitions & Smooth Page Cross-Fade */
        @view-transition {
            navigation: auto;
        }

        ::view-transition-old(root),
        ::view-transition-new(root) {
            animation: none;
            mix-blend-mode: normal;
        }

        ::view-transition-old(root) {
            z-index: 1;
        }
        ::view-transition-new(root) {
            z-index: 9999;
        }
        .dark::view-transition-old(root) {
            z-index: 9999;
        }
        .dark::view-transition-new(root) {
            z-index: 1;
        }

        @keyframes pageFadeOut {
            0% { opacity: 1; transform: translateY(0) scale(1); filter: blur(0px); }
            100% { opacity: 0; transform: translateY(-10px) scale(0.99); filter: blur(4px); }
        }

        @keyframes pageFadeIn {
            0% { opacity: 0; transform: translateY(18px) scale(0.985); filter: blur(4px); }
            100% { opacity: 1; transform: translateY(0) scale(1); filter: blur(0px); }
        }

        main {
            animation: pageFadeIn 0.45s cubic-bezier(0.16, 1, 0.3, 1) both;
        }

        .page-content-animated {
            animation: pageFadeIn 0.45s cubic-bezier(0.16, 1, 0.3, 1) both;
        }

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

        /* ========================================================
           LIGHT MODE THEME SYSTEM (Emerald & Ivory Glassmorphism)
           ======================================================== */
        html:not(.dark) body {
            background: linear-gradient(180deg, #edfbf4 0%, #f4fbf7 40%, #f8fafc 100%) !important;
            background-color: #f4fbf7 !important;
            color: #0f172a !important;
        }

        html:not(.dark) .ambient-glow-1 {
            background: radial-gradient(circle, rgba(16, 185, 129, 0.14) 0%, rgba(240, 253, 244, 0) 70%) !important;
        }

        html:not(.dark) .ambient-glow-2 {
            background: radial-gradient(circle, rgba(52, 211, 153, 0.12) 0%, rgba(240, 253, 244, 0) 70%) !important;
        }

        html:not(.dark) .ambient-grid {
            background-image: 
                linear-gradient(to right, rgba(16, 185, 129, 0.05) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(16, 185, 129, 0.05) 1px, transparent 1px) !important;
        }

        html:not(.dark) .glass-card, 
        html:not(.dark) .glass-panel {
            background: rgba(255, 255, 255, 0.88) !important;
            border-color: rgba(16, 185, 129, 0.22) !important;
            box-shadow: 0 10px 30px -8px rgba(16, 185, 129, 0.09), 0 4px 16px -2px rgba(0, 0, 0, 0.04) !important;
        }

        html:not(.dark) .glass-card:hover {
            border-color: rgba(16, 185, 129, 0.5) !important;
            box-shadow: 0 20px 40px -8px rgba(16, 185, 129, 0.2), 0 0 24px rgba(52, 211, 153, 0.22) !important;
        }

        html:not(.dark) aside {
            background: rgba(255, 255, 255, 0.95) !important;
            border-color: rgba(16, 185, 129, 0.18) !important;
            box-shadow: 4px 0 24px rgba(0, 0, 0, 0.04) !important;
        }

        html:not(.dark) header.glass-panel {
            background: rgba(255, 255, 255, 0.92) !important;
            border-color: rgba(16, 185, 129, 0.18) !important;
        }

        html:not(.dark) footer.glass-panel {
            background: rgba(255, 255, 255, 0.9) !important;
            border-color: rgba(16, 185, 129, 0.18) !important;
        }

        html:not(.dark) h1, 
        html:not(.dark) h2, 
        html:not(.dark) h3, 
        html:not(.dark) h4,
        html:not(.dark) .text-white {
            color: #0f172a !important;
        }

        html:not(.dark) .text-slate-300,
        html:not(.dark) .text-slate-400 {
            color: #475569 !important;
        }

        html:not(.dark) .text-slate-200 {
            color: #1e293b !important;
        }

        html:not(.dark) .sidebar-link {
            color: #475569 !important;
        }

        html:not(.dark) .sidebar-link:hover {
            color: #065f46 !important;
            background: rgba(16, 185, 129, 0.08) !important;
        }

        html:not(.dark) .sidebar-link.active {
            color: #047857 !important;
            background: rgba(16, 185, 129, 0.14) !important;
            border-color: rgba(16, 185, 129, 0.35) !important;
        }

        html:not(.dark) .admin-input,
        html:not(.dark) input:not([type="checkbox"]):not([type="radio"]),
        html:not(.dark) select,
        html:not(.dark) textarea {
            background: #ffffff !important;
            color: #0f172a !important;
            border-color: rgba(16, 185, 129, 0.32) !important;
        }

        html:not(.dark) select option {
            background-color: #ffffff !important;
            color: #0f172a !important;
        }

        html:not(.dark) .bg-white\/\[0\.04\],
        html:not(.dark) .bg-white\/\[0\.05\],
        html:not(.dark) .bg-white\/\[0\.02\],
        html:not(.dark) .bg-white\/\[0\.03\],
        html:not(.dark) .bg-white\/5,
        html:not(.dark) .bg-white\/10,
        html:not(.dark) .bg-white\/15 {
            background-color: rgba(241, 245, 249, 0.88) !important;
            border-color: rgba(203, 213, 225, 0.8) !important;
        }

        html:not(.dark) .border-white\/10,
        html:not(.dark) .border-white\/\[0\.08\],
        html:not(.dark) .border-white\/\[0\.07\],
        html:not(.dark) .border-white\/15,
        html:not(.dark) .border-white\/5,
        html:not(.dark) .divide-white\/\[0\.07\] > :not([hidden]) ~ :not([hidden]),
        html:not(.dark) .divide-white\/10 > :not([hidden]) ~ :not([hidden]) {
            border-color: rgba(226, 232, 240, 0.9) !important;
        }

        html:not(.dark) table thead {
            background: rgba(241, 245, 249, 0.95) !important;
        }

        html:not(.dark) table thead th {
            color: #334155 !important;
        }

        html:not(.dark) table tbody tr {
            border-color: rgba(226, 232, 240, 0.85) !important;
        }

        html:not(.dark) table tbody tr:hover {
            background: rgba(16, 185, 129, 0.06) !important;
        }

        html:not(.dark) .metric-glow {
            color: #047857 !important;
            text-shadow: 0 0 16px rgba(16, 185, 129, 0.25) !important;
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

        @keyframes framerAppear {
            0% {
                opacity: 0;
                transform: translateY(28px) scale(0.96);
                filter: blur(8px);
            }
            50% {
                opacity: 0.6;
                filter: blur(2px);
            }
            100% {
                opacity: 1;
                transform: translateY(0) scale(1);
                filter: blur(0px);
            }
        }

        /* 1. Form & Input Specific Smooth Cascade */
        @keyframes animFormAppear {
            0% { opacity: 0; transform: translateY(36px) scale(0.97); filter: blur(10px); }
            100% { opacity: 1; transform: translateY(0) scale(1); filter: blur(0px); }
        }

        /* 2. Catalog & Rewards 3D Cascade Bloom */
        @keyframes animCatalogBloom {
            0% { opacity: 0; transform: translateY(30px) scale(0.92); filter: blur(6px); }
            100% { opacity: 1; transform: translateY(0) scale(1); filter: blur(0px); }
        }

        /* 3. Table & Logs Lateral Sweep */
        @keyframes animTableSweep {
            0% { opacity: 0; transform: translateX(-24px) scale(0.98); filter: blur(6px); }
            100% { opacity: 1; transform: translateX(0) scale(1); filter: blur(0px); }
        }

        /* 4. Knowledge & FAQ Accordion Elastic Unfold */
        @keyframes animAccordionUnfold {
            0% { opacity: 0; transform: translateY(24px) scale(0.96); filter: blur(6px); }
            100% { opacity: 1; transform: translateY(0) scale(1); filter: blur(0px); }
        }

        .anim-form { animation: animFormAppear 0.65s cubic-bezier(0.16, 1, 0.3, 1) both; }
        .anim-catalog { animation: animCatalogBloom 0.6s cubic-bezier(0.16, 1, 0.3, 1) both; }
        .anim-table { animation: animTableSweep 0.55s cubic-bezier(0.16, 1, 0.3, 1) both; }
        .anim-faq { animation: animAccordionUnfold 0.55s cubic-bezier(0.16, 1, 0.3, 1) both; }

        /* Glass Surface Classes with Shimmer Light Reflection & Staggered Appear */
        .glass-card, .framer-appear {
            position: relative;
            background: linear-gradient(145deg, rgba(10, 30, 22, 0.78) 0%, rgba(6, 18, 13, 0.88) 100%);
            border: 1px solid rgba(52, 211, 153, 0.18);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border-radius: 1.25rem;
            box-shadow: 0 12px 36px -8px rgba(0, 0, 0, 0.6), 0 0 20px -4px rgba(16, 185, 129, 0.08);
            transition: border-color 0.35s ease, box-shadow 0.4s cubic-bezier(0.16, 1, 0.3, 1), transform 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            overflow: hidden;
            animation: framerAppear 0.65s cubic-bezier(0.16, 1, 0.3, 1) both;
        }

        .glass-card:nth-of-type(1) { animation-delay: 0.05s; }
        .glass-card:nth-of-type(2) { animation-delay: 0.12s; }
        .glass-card:nth-of-type(3) { animation-delay: 0.19s; }
        .glass-card:nth-of-type(4) { animation-delay: 0.26s; }
        .glass-card:nth-of-type(5) { animation-delay: 0.33s; }
        .glass-card:nth-of-type(6) { animation-delay: 0.40s; }

        /* Ambient Dynamic Light Reflection Sweep on Hover */
        .glass-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -120%;
            width: 70%;
            height: 100%;
            background: linear-gradient(
                90deg,
                transparent,
                rgba(255, 255, 255, 0.03) 25%,
                rgba(52, 211, 153, 0.12) 50%,
                rgba(255, 255, 255, 0.03) 75%,
                transparent
            );
            transform: skewX(-20deg);
            transition: none;
            pointer-events: none;
            z-index: 1;
        }

        .glass-card:hover::before {
            left: 200%;
            transition: left 0.95s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .glass-card:hover {
            transform: translateY(-4px) scale(1.006);
            border-color: rgba(52, 211, 153, 0.48);
            box-shadow: 0 24px 50px -10px rgba(0, 0, 0, 0.75), 0 0 32px 2px rgba(52, 211, 153, 0.22);
        }

        /* Staggered Card Entrance Animations */
        @keyframes luxuryEntrance {
            0% {
                opacity: 0;
                transform: translateY(22px) scale(0.975);
            }
            100% {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .animate-card-entrance {
            animation: luxuryEntrance 0.65s cubic-bezier(0.16, 1, 0.3, 1) both;
        }

        .delay-1 { animation-delay: 60ms; }
        .delay-2 { animation-delay: 120ms; }
        .delay-3 { animation-delay: 180ms; }
        .delay-4 { animation-delay: 240ms; }
        .delay-5 { animation-delay: 300ms; }
        .delay-6 { animation-delay: 360ms; }

        /* Floating Icon Micro-Animation */
        @keyframes floatEffect {
            0%, 100% {
                transform: translateY(0) scale(1);
            }
            50% {
                transform: translateY(-4px) scale(1.04);
            }
        }

        .animate-float {
            animation: floatEffect 3.8s ease-in-out infinite;
        }

        /* Glowing Pulse Animation */
        @keyframes luxuryPulse {
            0%, 100% {
                box-shadow: 0 0 16px rgba(52, 211, 153, 0.2);
            }
            50% {
                box-shadow: 0 0 30px rgba(52, 211, 153, 0.45), 0 0 12px rgba(16, 185, 129, 0.3);
            }
        }

        .animate-pulse-glow {
            animation: luxuryPulse 3.2s ease-in-out infinite;
        }

        /* Shimmer Button Sweep Effect */
        .btn-shimmer {
            position: relative;
            overflow: hidden;
        }

        .btn-shimmer::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(
                60deg,
                transparent,
                rgba(255, 255, 255, 0.2),
                transparent
            );
            transform: rotate(30deg);
            animation: btnShimmerSweep 4.5s infinite;
            pointer-events: none;
        }

        @keyframes btnShimmerSweep {
            0% { transform: translate(-100%, -100%) rotate(30deg); }
            35%, 100% { transform: translate(100%, 100%) rotate(30deg); }
        }

        /* Glowing Metric Numbers */
        .metric-glow {
            text-shadow: 0 0 16px rgba(52, 211, 153, 0.4);
            transition: text-shadow 0.35s ease, transform 0.35s ease;
        }

        .glass-card:hover .metric-glow {
            text-shadow: 0 0 24px rgba(52, 211, 153, 0.7);
            transform: scale(1.03);
        }

        .glass-panel {
            background: rgba(7, 20, 15, 0.88);
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
            transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
            text-decoration: none;
            white-space: nowrap;
        }

        .sidebar-link:hover {
            color: #ffffff;
            background: rgba(255, 255, 255, 0.06);
            transform: translateX(4px);
        }

        .sidebar-link:active {
            transform: scale(0.98);
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

        /* Mobile Drawer & Backdrop Smooth Transitions */
        #mobileDrawer {
            transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.4s ease;
        }

        #mobileDrawerBackdrop {
            transition: opacity 0.35s cubic-bezier(0.16, 1, 0.3, 1), backdrop-filter 0.35s ease;
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

                    <!-- Dark/Light Mode Toggle -->
                    <button id="adminDarkModeToggle" onclick="toggleKahejoAdminTheme(event)" class="p-2 rounded-xl bg-white/[0.05] hover:bg-white/[0.1] text-slate-300 hover:text-white border border-white/10 transition-colors cursor-pointer" title="Ubah Tema">
                        <i class="fa-solid fa-sun text-amber-400 dark:hidden text-xs"></i>
                        <i class="fa-solid fa-moon text-mintGlow hidden dark:block text-xs"></i>
                    </button>

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

        // Global Admin Ultra-Smooth Dark / Light Theme Toggle Function
        function toggleKahejoAdminTheme(event) {
            const html = document.documentElement;
            const isDark = html.classList.contains('dark');
            
            const applyTheme = () => {
                if (isDark) {
                    html.classList.remove('dark');
                    localStorage.setItem('theme', 'light');
                } else {
                    html.classList.add('dark');
                    localStorage.setItem('theme', 'dark');
                }
            };

            // Trigger Icon Spin Spring Animation
            const toggleBtn = document.getElementById('adminDarkModeToggle');
            if (toggleBtn) {
                toggleBtn.classList.add('theme-toggle-spin');
                setTimeout(() => toggleBtn.classList.remove('theme-toggle-spin'), 600);
            }

            // If View Transitions API with circular ripple is supported
            if (document.startViewTransition && event) {
                const x = event.clientX;
                const y = event.clientY;
                const endRadius = Math.hypot(
                    Math.max(x, window.innerWidth - x),
                    Math.max(y, window.innerHeight - y)
                );

                const transition = document.startViewTransition(() => {
                    applyTheme();
                });

                transition.ready.then(() => {
                    const clipPath = [
                        `circle(0px at ${x}px ${y}px)`,
                        `circle(${endRadius}px at ${x}px ${y}px)`
                    ];
                    document.documentElement.animate(
                        {
                            clipPath: isDark ? clipPath : [...clipPath].reverse(),
                        },
                        {
                            duration: 500,
                            easing: 'cubic-bezier(0.16, 1, 0.3, 1)',
                            pseudoElement: isDark ? '::view-transition-new(root)' : '::view-transition-old(root)',
                        }
                    );
                });
            } else {
                // Fallback Smooth Theme Transition
                html.classList.add('theme-transitioning');
                applyTheme();
                setTimeout(() => html.classList.remove('theme-transitioning'), 500);
            }
        }
    </script>

    <!-- Motion One (Framer Motion Vanilla Engine) & Luxury Motion Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/motion@latest/dist/motion.js"></script>
    <script src="{{ asset('js/luxury-motion.js') }}"></script>
</body>
</html>
