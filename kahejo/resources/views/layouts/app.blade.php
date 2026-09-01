<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="view-transition" content="same-origin">
    <title>@yield('title', 'Dashboard') — KaHejo</title>
    
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
            background-color: #050d0a;
            color: #f8fafc;
            min-height: 100vh;
            overflow-x: hidden;
            position: relative;
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
                linear-gradient(rgba(16, 185, 129, 0.05) 1px, transparent 1px),
                linear-gradient(90deg, rgba(16, 185, 129, 0.05) 1px, transparent 1px) !important;
        }

        html:not(.dark) .glass-card, 
        html:not(.dark) .glass-panel {
            background: rgba(255, 255, 255, 0.88) !important;
            border-color: rgba(16, 185, 129, 0.22) !important;
            box-shadow: 0 10px 30px -6px rgba(16, 185, 129, 0.09), 0 4px 16px -2px rgba(0, 0, 0, 0.04) !important;
        }

        html:not(.dark) .glass-card:hover {
            border-color: rgba(16, 185, 129, 0.5) !important;
            box-shadow: 0 20px 40px -8px rgba(16, 185, 129, 0.2), 0 0 24px rgba(52, 211, 153, 0.22) !important;
        }

        html:not(.dark) #appSidebar {
            background: rgba(255, 255, 255, 0.95) !important;
            border-color: rgba(16, 185, 129, 0.18) !important;
            box-shadow: 4px 0 24px rgba(0, 0, 0, 0.04) !important;
        }

        html:not(.dark) #appTopBar {
            background: rgba(255, 255, 255, 0.92) !important;
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

        html:not(.dark) .sidebar-icon {
            background: rgba(16, 185, 129, 0.08) !important;
            border-color: rgba(16, 185, 129, 0.18) !important;
            color: #059669 !important;
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
        html:not(.dark) .bg-white\/10 {
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

        /* User Profile Animated Dropdown Light Mode */
        html:not(.dark) #userDropdownMenu {
            background: rgba(255, 255, 255, 0.96) !important;
            border: 1px solid rgba(16, 185, 129, 0.25) !important;
            box-shadow: 0 20px 45px -10px rgba(0, 0, 0, 0.12), 0 0 24px rgba(16, 185, 129, 0.12) !important;
        }

        html:not(.dark) #userDropdownBtn {
            background: rgba(241, 245, 249, 0.85) !important;
            border-color: rgba(16, 185, 129, 0.2) !important;
        }

        html:not(.dark) #userDropdownBtn:hover {
            background: #ffffff !important;
            border-color: rgba(16, 185, 129, 0.4) !important;
        }

        html:not(.dark) #userDropdownMenu a {
            color: #334155 !important;
        }

        html:not(.dark) #userDropdownMenu a:hover {
            background: rgba(16, 185, 129, 0.08) !important;
            color: #065f46 !important;
        }

        html:not(.dark) #userDropdownMenu a[class*="bg-emeraldBrand"] {
            background: rgba(16, 185, 129, 0.14) !important;
            border-color: rgba(16, 185, 129, 0.35) !important;
        }

        html:not(.dark) #userDropdownMenu a span:first-child {
            color: #0f172a !important;
        }

        html:not(.dark) #userDropdownMenu a span:last-child {
            color: #64748b !important;
        }

        html:not(.dark) #userDropdownMenu a .w-7 {
            background: rgba(16, 185, 129, 0.12) !important;
            border-color: rgba(16, 185, 129, 0.25) !important;
            color: #059669 !important;
        }

        /* Sidebar Accordion Submenu Light Mode */
        html:not(.dark) .accordion-collapse a {
            color: #475569 !important;
        }

        html:not(.dark) .accordion-collapse a:hover {
            color: #065f46 !important;
            background: rgba(16, 185, 129, 0.08) !important;
        }

        html:not(.dark) .accordion-collapse a[class*="bg-emeraldBrand"] {
            color: #047857 !important;
            background: rgba(16, 185, 129, 0.14) !important;
            border-color: rgba(16, 185, 129, 0.35) !important;
        }

        html:not(.dark) .accordion-collapse a .w-6 {
            background: rgba(16, 185, 129, 0.08) !important;
            color: #059669 !important;
        }

        /* Logout Button Light Mode */
        html:not(.dark) .logout-btn {
            background: rgba(244, 63, 94, 0.08) !important;
            color: #e11d48 !important;
            border: 1px solid rgba(244, 63, 94, 0.25) !important;
        }

        html:not(.dark) .logout-btn:hover {
            background: rgba(244, 63, 94, 0.16) !important;
            color: #be123c !important;
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

        /* FIX BROWSER LIGHT/WHITE AUTOFILL ON DARK THEME */
        input:-webkit-autofill,
        input:-webkit-autofill:hover, 
        input:-webkit-autofill:focus, 
        input:-webkit-autofill:active,
        select:-webkit-autofill,
        select:-webkit-autofill:hover,
        select:-webkit-autofill:focus,
        textarea:-webkit-autofill {
            -webkit-box-shadow: 0 0 0 1000px #091a13 inset !important;
            -webkit-text-fill-color: #ffffff !important;
            caret-color: #34d399 !important;
            border-color: rgba(52, 211, 153, 0.45) !important;
            transition: background-color 5000s ease-in-out 0s;
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

        /* Luxurious Glass Cards with Shimmer Light Reflection & Staggered Appear */
        .glass-card, .framer-appear {
            position: relative;
            background: linear-gradient(145deg, rgba(11, 28, 21, 0.86) 0%, rgba(6, 18, 13, 0.94) 100%);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border: 1px solid rgba(52, 211, 153, 0.18);
            border-radius: 20px;
            box-shadow: 0 14px 36px -6px rgba(0, 0, 0, 0.6), 0 0 22px rgba(16, 185, 129, 0.08);
            transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1), 
                        box-shadow 0.4s cubic-bezier(0.16, 1, 0.3, 1), 
                        border-color 0.35s ease;
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

        /* Sidebar Navigation Item */
        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 0.65rem 0.75rem;
            border-radius: 14px;
            font-size: 0.84rem;
            font-weight: 600;
            color: #94a3b8;
            transition: color 0.25s cubic-bezier(0.16, 1, 0.3, 1), 
                        background 0.25s cubic-bezier(0.16, 1, 0.3, 1), 
                        border-color 0.25s cubic-bezier(0.16, 1, 0.3, 1), 
                        transform 0.25s cubic-bezier(0.16, 1, 0.3, 1),
                        box-shadow 0.25s cubic-bezier(0.16, 1, 0.3, 1);
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
            font-size: 0.88rem;
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.08);
            transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
            flex-shrink: 0;
        }

        .sidebar-link:hover .sidebar-icon {
            background: rgba(16, 185, 129, 0.15);
            border-color: rgba(52, 211, 153, 0.35);
            color: #34d399;
            transform: scale(1.08) rotate(3deg);
        }

        .sidebar-link.active .sidebar-icon {
            background: rgba(16, 185, 129, 0.25);
            border-color: rgba(52, 211, 153, 0.5);
            color: #34d399;
        }

        /* Ultra-Smooth User Profile Animated Dropdown */
        .dropdown-menu-animated {
            display: grid;
            grid-template-rows: 0fr;
            opacity: 0;
            transform: translateY(-8px) scale(0.96);
            transform-origin: top center;
            border-color: transparent !important;
            box-shadow: 0 0 0 transparent;
            transition: grid-template-rows 0.35s cubic-bezier(0.16, 1, 0.3, 1),
                        opacity 0.25s cubic-bezier(0.16, 1, 0.3, 1),
                        transform 0.35s cubic-bezier(0.16, 1, 0.3, 1),
                        border-color 0.25s ease,
                        box-shadow 0.35s ease;
            overflow: hidden;
            pointer-events: none;
        }

        .dropdown-menu-animated.show {
            grid-template-rows: 1fr;
            opacity: 1;
            transform: translateY(0) scale(1);
            border-color: rgba(52, 211, 153, 0.25) !important;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.8) !important;
            pointer-events: auto;
        }

        .dropdown-menu-animated-inner {
            min-height: 0;
            overflow: hidden;
        }

        /* Ultra-Smooth Accordion Collapse for Sidebar Submenus */
        .accordion-collapse {
            display: grid;
            grid-template-rows: 0fr;
            opacity: 0;
            transition: grid-template-rows 0.35s cubic-bezier(0.16, 1, 0.3, 1),
                        opacity 0.28s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .accordion-collapse.open {
            grid-template-rows: 1fr;
            opacity: 1;
        }

        .accordion-collapse-inner {
            min-height: 0;
            overflow: hidden;
        }

        /* Smooth Sidebar Deceleration */
        #appSidebar {
            transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.4s ease;
        }

        #mainContent {
            transition: margin-left 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }

        #sidebarBackdrop {
            transition: opacity 0.35s cubic-bezier(0.16, 1, 0.3, 1), backdrop-filter 0.35s ease;
        }

        /* Smooth Chevron Rotation */
        .smooth-chevron {
            transition: transform 0.35s cubic-bezier(0.16, 1, 0.3, 1), color 0.2s ease;
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
            transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
            cursor: pointer;
        }

        .logout-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(16, 185, 129, 0.45);
            background: linear-gradient(135deg, #34d399 0%, #059669 100%);
        }

        .logout-btn:active {
            transform: scale(0.98);
        }

        /* ============================================== */
        /* GLOBAL PRINT OPTIMIZATION                      */
        /* ============================================== */
        @media print {
            #appSidebar,
            #sidebarBackdrop,
            #appTopBar,
            .ambient-glow-1,
            .ambient-glow-2,
            .ambient-grid,
            header,
            nav,
            footer,
            .print\:hidden {
                display: none !important;
            }

            body {
                background: #ffffff !important;
                background-color: #ffffff !important;
                color: #0f172a !important;
            }

            #mainContent {
                margin: 0 !important;
                padding: 0 !important;
                min-height: auto !important;
                width: 100% !important;
                background: #ffffff !important;
            }
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
        <div class="flex flex-col h-full overflow-y-auto px-3 sm:px-3.5 py-5">
            
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
                </button>                <!-- Dropdown Menu Body -->
                <div id="userDropdownMenu" class="dropdown-menu-animated mt-2 rounded-2xl bg-[#091812]/95 backdrop-blur-2xl border border-emeraldBrand/25 shadow-2xl shadow-black/70">
                    <div class="dropdown-menu-animated-inner p-1.5 space-y-1">
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

                <!-- Item 2: Kalkulator Karbon Dropdown -->
                @php
                    $isCarbonActive = request()->routeIs('carbon*');
                @endphp
                <div class="space-y-1">
                    <button type="button" 
                            id="carbonDropdownBtn"
                            onclick="toggleSidebarDropdown('carbon')"
                            class="sidebar-link w-full justify-between cursor-pointer group {{ $isCarbonActive ? 'active' : '' }}">
                        <div class="flex items-center gap-2.5 min-w-0">
                            <div class="sidebar-icon shrink-0">
                                <i class="fa-solid fa-calculator"></i>
                            </div>
                            <span class="whitespace-nowrap font-semibold">Kalkulator Karbon</span>
                        </div>
                        <i class="fa-solid fa-chevron-down text-[10px] text-slate-400 group-hover:text-mintGlow smooth-chevron shrink-0 ml-1 {{ $isCarbonActive ? 'rotate-180 text-mintGlow' : '' }}" id="carbonChevron"></i>
                    </button>

                    <!-- Carbon Submenu -->
                    <div id="carbonSubmenu" class="accordion-collapse {{ $isCarbonActive ? 'open' : '' }}">
                        <div class="accordion-collapse-inner pl-4 pr-1 py-1 space-y-1">
                            <a href="{{ route('carbon') }}" 
                               class="flex items-center gap-2.5 px-3 py-2 rounded-xl text-xs font-semibold whitespace-nowrap {{ (request()->routeIs('carbon') && !request()->routeIs('carbon.history*')) ? 'text-mintGlow bg-emeraldBrand/15 border border-emeraldBrand/25' : 'text-slate-400 hover:text-white hover:bg-white/[0.04]' }} transition-all">
                                <div class="w-6 h-6 rounded-lg bg-white/[0.04] flex items-center justify-center text-[10px] shrink-0 {{ (request()->routeIs('carbon') && !request()->routeIs('carbon.history*')) ? 'text-mintGlow' : 'text-slate-400' }}">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </div>
                                <span class="whitespace-nowrap">Hitung Emisi</span>
                            </a>
                            <a href="{{ route('carbon.history') }}" 
                               class="flex items-center gap-2.5 px-3 py-2 rounded-xl text-xs font-semibold whitespace-nowrap {{ request()->routeIs('carbon.history*') ? 'text-mintGlow bg-emeraldBrand/15 border border-emeraldBrand/25' : 'text-slate-400 hover:text-white hover:bg-white/[0.04]' }} transition-all">
                                <div class="w-6 h-6 rounded-lg bg-white/[0.04] flex items-center justify-center text-[10px] shrink-0 {{ request()->routeIs('carbon.history*') ? 'text-mintGlow' : 'text-slate-400' }}">
                                    <i class="fa-solid fa-clock-rotate-left"></i>
                                </div>
                                <span class="whitespace-nowrap">Riwayat Perhitungan</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Item 3: Konsumsi Energi Dropdown -->
                @php
                    $isCompanyActive = request()->routeIs('company*');
                @endphp
                <div class="space-y-1">
                    <button type="button" 
                            id="companyDropdownBtn"
                            onclick="toggleSidebarDropdown('company')"
                            class="sidebar-link w-full justify-between cursor-pointer group {{ $isCompanyActive ? 'active' : '' }}">
                        <div class="flex items-center gap-2.5 min-w-0">
                            <div class="sidebar-icon shrink-0">
                                <i class="fa-solid fa-chart-line"></i>
                            </div>
                            <span class="whitespace-nowrap font-semibold">Konsumsi Energi</span>
                        </div>
                        <i class="fa-solid fa-chevron-down text-[10px] text-slate-400 group-hover:text-mintGlow smooth-chevron shrink-0 ml-1 {{ $isCompanyActive ? 'rotate-180 text-mintGlow' : '' }}" id="companyChevron"></i>
                    </button>

                    <!-- Company Submenu -->
                    <div id="companySubmenu" class="accordion-collapse {{ $isCompanyActive ? 'open' : '' }}">
                        <div class="accordion-collapse-inner pl-4 pr-1 py-1 space-y-1">
                            <a href="{{ route('company') }}" 
                               class="flex items-center gap-2.5 px-3 py-2 rounded-xl text-xs font-semibold {{ (request()->routeIs('company') && !request()->routeIs('company.history*') && !request()->routeIs('company.view*')) ? 'text-mintGlow bg-emeraldBrand/15 border border-emeraldBrand/25' : 'text-slate-400 hover:text-white hover:bg-white/[0.04]' }} transition-all">
                                <div class="w-6 h-6 rounded-lg bg-white/[0.04] flex items-center justify-center text-[10px] {{ (request()->routeIs('company') && !request()->routeIs('company.history*') && !request()->routeIs('company.view*')) ? 'text-mintGlow' : 'text-slate-400' }}">
                                    <i class="fa-solid fa-bolt"></i>
                                </div>
                                <span>Input Konsumsi</span>
                            </a>
                            <a href="{{ route('company.history') }}" 
                               class="flex items-center gap-2.5 px-3 py-2 rounded-xl text-xs font-semibold {{ (request()->routeIs('company.history*') || request()->routeIs('company.view*')) ? 'text-mintGlow bg-emeraldBrand/15 border border-emeraldBrand/25' : 'text-slate-400 hover:text-white hover:bg-white/[0.04]' }} transition-all">
                                <div class="w-6 h-6 rounded-lg bg-white/[0.04] flex items-center justify-center text-[10px] {{ (request()->routeIs('company.history*') || request()->routeIs('company.view*')) ? 'text-mintGlow' : 'text-slate-400' }}">
                                    <i class="fa-solid fa-clock-rotate-left"></i>
                                </div>
                                <span>Riwayat Konsumsi</span>
                            </a>
                        </div>
                    </div>
                </div>

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

                <a href="{{ route('faqs.index') }}" class="sidebar-link {{ request()->routeIs('faqs*') ? 'active' : '' }}">
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
            <div class="p-3 sm:p-3.5 border-t border-white/[0.08] bg-black/20">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="logout-btn">
                        <i class="fa-solid fa-arrow-right-from-bracket text-xs"></i>
                        <span>Keluar Akun</span>
                    </button>
                </form>
            </div>

        </div>
    </aside>

    <!-- Main Content Dynamic Container -->
    <div id="mainContent" class="flex-1 flex flex-col min-h-screen lg:ml-64 relative z-10 transition-all duration-300">
        
        <!-- Sticky Glass Top Header -->
        <header id="appTopBar" class="sticky top-0 z-30 px-4 sm:px-6 lg:px-8 py-3.5 bg-[#05110c]/85 backdrop-blur-xl border-b border-white/[0.08] flex items-center justify-between shadow-sm">
            <!-- Left: Toggle & Page Title -->
            <div class="flex items-center gap-3">
                <button id="sidebarToggle" class="p-2 rounded-xl bg-white/[0.05] hover:bg-white/[0.1] text-slate-300 hover:text-white border border-white/10 transition-colors focus:outline-none" aria-label="Toggle Sidebar Navigation">
                    <i class="fa-solid fa-bars text-sm"></i>
                </button>
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
                <button id="darkModeToggle" onclick="toggleKahejoTheme(event)" class="p-2 rounded-xl bg-white/[0.05] hover:bg-white/[0.1] text-slate-300 hover:text-white border border-white/10 transition-colors cursor-pointer" title="Ubah Tema">
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

        // User Account Dropdown Toggle Logic (Smooth Animated)
        const userDropdownBtn = document.getElementById('userDropdownBtn');
        const userDropdownMenu = document.getElementById('userDropdownMenu');
        const userDropdownChevron = document.getElementById('userDropdownChevron');

        if (userDropdownBtn && userDropdownMenu) {
            userDropdownBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                const isOpen = userDropdownMenu.classList.contains('show');
                if (isOpen) {
                    userDropdownMenu.classList.remove('show');
                    userDropdownBtn.setAttribute('aria-expanded', 'false');
                    if (userDropdownChevron) userDropdownChevron.style.transform = 'rotate(0deg)';
                } else {
                    userDropdownMenu.classList.add('show');
                    userDropdownBtn.setAttribute('aria-expanded', 'true');
                    if (userDropdownChevron) userDropdownChevron.style.transform = 'rotate(180deg)';
                }
            });

            // Close dropdown when clicking anywhere outside
            document.addEventListener('click', (e) => {
                if (!userDropdownBtn.contains(e.target) && !userDropdownMenu.contains(e.target)) {
                    userDropdownMenu.classList.remove('show');
                    userDropdownBtn.setAttribute('aria-expanded', 'false');
                    if (userDropdownChevron) userDropdownChevron.style.transform = 'rotate(0deg)';
                }
            });
        }

        // Sidebar Accordion Dropdowns (Smooth Animated)
        function toggleSidebarDropdown(name) {
            const menu = document.getElementById(name + 'Submenu');
            const chevron = document.getElementById(name + 'Chevron');
            if (!menu) return;

            const isOpen = menu.classList.contains('open');
            if (isOpen) {
                menu.classList.remove('open');
                if (chevron) {
                    chevron.classList.remove('rotate-180', 'text-mintGlow');
                }
            } else {
                menu.classList.add('open');
                if (chevron) {
                    chevron.classList.add('rotate-180', 'text-mintGlow');
                }
            }
        }

        // Global Ultra-Smooth Dark / Light Theme Toggle Function
        function toggleKahejoTheme(event) {
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
            const toggleBtn = document.getElementById('darkModeToggle');
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

    @yield('scripts')
</body>
</html>
