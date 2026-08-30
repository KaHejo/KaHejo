<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KaHejo — Platform Jejak Karbon & Gaya Hidup Berkelanjutan</title>
    
    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400;1,600&display=swap" rel="stylesheet">
    
    <!-- Font Awesome 6 Pro / Free CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            /* Deep Obsidian Emerald Dark Background */
            --bg-page-start: #06110d;
            --bg-page-mid: #091a13;
            --bg-page-end: #07120e;
            --bg-page: linear-gradient(180deg, var(--bg-page-start) 0%, var(--bg-page-mid) 50%, var(--bg-page-end) 100%);
            
            /* Sesuai Gambar: Vibrant Emerald Green (#10b981 -> #059669) */
            --bg-card: linear-gradient(145deg, #10b981 0%, #059669 65%, #047857 100%);
            --bg-card-hover: linear-gradient(145deg, #18c58f 0%, #059669 65%, #047857 100%);
            --border-card: rgba(167, 243, 208, 0.4);
            --border-card-hover: rgba(209, 250, 229, 0.75);
            
            /* Card Text Palette (Pure Crisp White on Vibrant Emerald Green) */
            --card-title: #ffffff;
            --card-desc: #f0fdf4;
            --card-muted: #d1fae5;
            
            /* Outer Content Palette */
            --text-main: #f8fafc;
            --text-muted: #94a3b8;
            --text-sub: #cbd5e1;
            
            /* Brand Accents */
            --primary-emerald: #10b981;
            --primary-mint: #34d399;
            --primary-neon: #34d399;
            --primary-glow: rgba(16, 185, 129, 0.35);
            
            /* Elevation & Shadows */
            --shadow-card: 0 12px 28px -6px rgba(0, 0, 0, 0.5), 0 0 20px rgba(16, 185, 129, 0.2);
            --shadow-card-hover: 0 18px 36px -6px rgba(0, 0, 0, 0.6), 0 0 28px rgba(52, 211, 153, 0.35);
            --gradient-emerald: linear-gradient(135deg, #10b981 0%, #059669 100%);
            --gradient-glow: linear-gradient(135deg, #34d399 0%, #10b981 50%, #047857 100%);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, sans-serif;
            scroll-behavior: smooth;
        }

        body {
            background: var(--bg-page);
            background-color: #06110d;
            color: var(--text-main);
            min-height: 100vh;
            overflow-x: hidden;
            position: relative;
            line-height: 1.6;
            -webkit-font-smoothing: antialiased;
        }

        /* Ambient Dynamic Glows */
        .ambient-glow-1 {
            position: fixed;
            top: -15%;
            left: 10%;
            width: 700px;
            height: 700px;
            background: radial-gradient(circle, rgba(16, 185, 129, 0.2) 0%, rgba(6, 17, 13, 0) 70%);
            border-radius: 50%;
            pointer-events: none;
            z-index: 0;
            filter: blur(80px);
            animation: pulseGlow 12s ease-in-out infinite alternate;
        }

        .ambient-glow-2 {
            position: fixed;
            top: 50%;
            right: -12%;
            width: 750px;
            height: 750px;
            background: radial-gradient(circle, rgba(5, 150, 105, 0.16) 0%, rgba(6, 17, 13, 0) 70%);
            border-radius: 50%;
            pointer-events: none;
            z-index: 0;
            filter: blur(90px);
            animation: pulseGlow 16s ease-in-out infinite alternate-reverse;
        }

        .ambient-grid {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                linear-gradient(rgba(255, 255, 255, 0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 255, 255, 0.03) 1px, transparent 1px);
            background-size: 56px 56px;
            pointer-events: none;
            z-index: 0;
        }

        @keyframes pulseGlow {
            0% { transform: scale(1) translate(0, 0); opacity: 0.7; }
            100% { transform: scale(1.18) translate(30px, 40px); opacity: 1; }
        }

        /* Compact Green Card Class */
        .green-card {
            background: var(--bg-card);
            border: 1px solid var(--border-card);
            border-radius: 18px;
            box-shadow: var(--shadow-card);
            color: var(--card-title);
            transition: transform 0.35s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.35s ease, border-color 0.35s ease;
            position: relative;
            overflow: hidden;
        }

        .green-card::before {
            content: '';
            position: absolute;
            top: var(--mouse-y, -120px);
            left: var(--mouse-x, -120px);
            width: 250px;
            height: 250px;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.22) 0%, transparent 70%);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            pointer-events: none;
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: 1;
        }

        .green-card:hover::before {
            opacity: 1;
        }

        .green-card:hover {
            border-color: var(--border-card-hover);
            background: var(--bg-card-hover);
            transform: translateY(-4px);
            box-shadow: var(--shadow-card-hover);
        }

        .green-card > * {
            position: relative;
            z-index: 2;
        }

        /* Top Navigation Bar */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 74px;
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 5%;
            background: rgba(6, 17, 13, 0.85);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.4);
            transition: all 0.3s ease;
        }

        .nav-brand {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
        }

        .nav-logo-icon {
            width: 38px;
            height: 38px;
            background: var(--gradient-emerald);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.15rem;
            color: #ffffff;
            box-shadow: 0 4px 14px var(--primary-glow);
            transition: transform 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .nav-brand:hover .nav-logo-icon {
            transform: rotate(14deg) scale(1.08);
        }

        .nav-brand-title {
            font-size: 1.35rem;
            font-weight: 800;
            letter-spacing: -0.5px;
            color: #f8fafc;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 2rem;
            list-style: none;
        }

        .nav-link {
            text-decoration: none;
            color: #cbd5e1;
            font-size: 0.92rem;
            font-weight: 600;
            position: relative;
            padding: 5px 0;
            transition: color 0.3s ease;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--primary-mint);
            border-radius: 2px;
            transition: width 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .nav-link:hover {
            color: var(--primary-mint);
        }

        .nav-link:hover::after {
            width: 100%;
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 0.85rem;
        }

        /* Mobile Hamburger Button */
        .mobile-menu-btn {
            display: none;
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.15);
            width: 40px;
            height: 40px;
            border-radius: 10px;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            color: #f8fafc;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
        }

        .mobile-menu-btn:hover {
            border-color: var(--primary-mint);
            color: var(--primary-mint);
        }

        /* Mobile Nav Drawer */
        .mobile-nav-drawer {
            position: fixed;
            top: 74px;
            left: 0;
            width: 100%;
            background: rgba(6, 17, 13, 0.97);
            backdrop-filter: blur(24px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.12);
            padding: 1.5rem 6% 2rem;
            display: flex;
            flex-direction: column;
            gap: 1.2rem;
            transform: translateY(-120%);
            opacity: 0;
            pointer-events: none;
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            z-index: 999;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.5);
        }

        .mobile-nav-drawer.active {
            transform: translateY(0);
            opacity: 1;
            pointer-events: auto;
        }

        .mobile-nav-links {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 0.9rem;
        }

        .mobile-nav-link {
            text-decoration: none;
            color: #f8fafc;
            font-size: 1.05rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0.4rem 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        }

        /* Compact Buttons */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 0.65rem 1.45rem;
            border-radius: 12px;
            font-size: 0.92rem;
            font-weight: 700;
            text-decoration: none;
            transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .btn-shimmer::after {
            content: '';
            position: absolute;
            top: 0;
            left: -120%;
            width: 70%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.35), transparent);
            transform: skewX(-20deg);
            transition: left 0.75s ease;
        }

        .btn-shimmer:hover::after {
            left: 150%;
        }

        .btn-ghost {
            background: rgba(255, 255, 255, 0.08);
            color: #f8fafc;
            border: 1px solid rgba(255, 255, 255, 0.16);
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
        }

        .btn-ghost:hover {
            color: var(--primary-mint);
            border-color: var(--primary-mint);
            background: rgba(255, 255, 255, 0.14);
            transform: translateY(-2px);
        }

        .btn-primary {
            background: var(--gradient-emerald);
            color: #ffffff;
            border: 1px solid rgba(52, 211, 153, 0.4);
            box-shadow: 0 4px 16px var(--primary-glow);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 22px rgba(16, 185, 129, 0.5);
            background: var(--gradient-glow);
        }

        .btn-secondary {
            background: rgba(255, 255, 255, 0.08);
            color: #f8fafc;
            border: 1px solid rgba(255, 255, 255, 0.18);
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
        }

        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.14);
            border-color: var(--primary-mint);
            color: var(--primary-mint);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
        }

        /* Main Container */
        .main-wrapper {
            position: relative;
            z-index: 1;
            padding: 110px 5% 50px;
            max-width: 1240px;
            margin: 0 auto;
        }

        /* Hero Section */
        .hero-section {
            display: grid;
            grid-template-columns: 1.15fr 0.85fr;
            gap: 3rem;
            align-items: center;
            min-height: calc(82vh - 74px);
            padding-bottom: 3.5rem;
            position: relative;
        }

        .hero-content {
            position: relative;
        }

        .badge-pill {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 7px 16px;
            background: rgba(16, 185, 129, 0.14);
            border: 1px solid rgba(52, 211, 153, 0.35);
            border-radius: 30px;
            font-size: 0.82rem;
            font-weight: 700;
            color: #34d399;
            margin-bottom: 1.3rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            animation: fadeInDown 0.8s ease backwards;
        }

        .badge-pulse {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: var(--primary-mint);
            box-shadow: 0 0 8px var(--primary-mint);
            animation: pulseDot 2s infinite;
        }

        .hero-title {
            font-size: clamp(2.3rem, 4.4vw, 3.4rem);
            font-weight: 800;
            line-height: 1.15;
            letter-spacing: -1.5px;
            color: #ffffff;
            margin-bottom: 1.15rem;
            animation: fadeInUp 0.8s ease 0.1s backwards;
        }

        .gradient-emerald-text {
            background: linear-gradient(135deg, #34d399 0%, #10b981 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            display: inline-block;
        }

        .hero-desc {
            font-size: clamp(0.95rem, 1.2vw, 1.08rem);
            color: #94a3b8;
            line-height: 1.7;
            margin-bottom: 2rem;
            max-width: 530px;
            animation: fadeInUp 0.8s ease 0.2s backwards;
        }

        .hero-cta {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 2.2rem;
            animation: fadeInUp 0.8s ease 0.3s backwards;
        }

        .hero-trust {
            display: flex;
            align-items: center;
            gap: 12px;
            animation: fadeInUp 0.8s ease 0.4s backwards;
        }

        .trust-avatars {
            display: flex;
            margin-right: 2px;
        }

        .trust-avatar {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            border: 2px solid #06110d;
            margin-left: -8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.72rem;
            font-weight: 800;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        }

        .trust-avatar:first-child {
            margin-left: 0;
            background: #d1fae5;
            color: #065f46;
        }

        .trust-avatar:nth-child(2) {
            background: #a7f3d0;
            color: #047857;
        }

        .trust-avatar:nth-child(3) {
            background: #6ee7b7;
            color: #064e3b;
        }

        .trust-text {
            font-size: 0.85rem;
            color: #94a3b8;
        }

        .trust-text strong {
            color: #ffffff;
        }

        /* Floating Badges in Hero */
        .floating-badge {
            position: absolute;
            background: rgba(12, 26, 20, 0.92);
            backdrop-filter: blur(14px);
            border: 1px solid rgba(52, 211, 153, 0.4);
            padding: 7px 14px;
            border-radius: 16px;
            box-shadow: 0 10px 24px rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.8rem;
            font-weight: 700;
            color: #6ee7b7;
            z-index: 10;
            pointer-events: none;
        }

        .badge-float-1 {
            top: -15px;
            right: 25px;
            animation: floatSlow 6s ease-in-out infinite alternate;
        }

        .badge-float-2 {
            bottom: -18px;
            left: 15px;
            animation: floatSlow 7s ease-in-out infinite alternate-reverse;
        }

        @keyframes floatSlow {
            0% { transform: translateY(0px) rotate(0deg); }
            100% { transform: translateY(-10px) rotate(1deg); }
        }

        /* Compact Carbon Calculator Widget */
        .calculator-widget {
            padding: 1.6rem 1.8rem;
            animation: fadeInRight 0.9s cubic-bezier(0.16, 1, 0.3, 1) backwards;
        }

        .widget-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.1rem;
            padding-bottom: 0.75rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }

        .widget-badge {
            font-size: 0.72rem;
            background: rgba(255, 255, 255, 0.22);
            color: #ffffff;
            padding: 4px 10px;
            border-radius: 16px;
            font-weight: 700;
            border: 1px solid rgba(255, 255, 255, 0.4);
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .widget-title {
            font-size: 1.18rem;
            font-weight: 800;
            color: #ffffff;
            letter-spacing: -0.2px;
        }

        .calc-field {
            margin-bottom: 0.95rem;
        }

        .calc-label {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.85rem;
            color: #ffffff;
            margin-bottom: 6px;
            font-weight: 700;
        }

        .slider-wrapper {
            position: relative;
            padding: 2px 0;
        }

        .calc-slider {
            width: 100%;
            height: 6px;
            border-radius: 6px;
            background: rgba(0, 0, 0, 0.25);
            outline: none;
            -webkit-appearance: none;
            appearance: none;
            transition: all 0.2s ease;
        }

        .calc-slider::-webkit-slider-thumb {
            -webkit-appearance: none;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            background: #ffffff;
            cursor: pointer;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.6);
            border: 2px solid var(--primary-mint);
            transition: transform 0.2s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .calc-slider::-webkit-slider-thumb:hover {
            transform: scale(1.2);
        }

        .calc-result-box {
            background: rgba(0, 0, 0, 0.25);
            border: 1px solid rgba(255, 255, 255, 0.25);
            border-radius: 14px;
            padding: 1.1rem 1.3rem;
            text-align: center;
            margin-top: 1.1rem;
            box-shadow: inset 0 2px 6px rgba(0, 0, 0, 0.2);
            position: relative;
            overflow: hidden;
        }

        .result-number {
            font-size: 2.3rem;
            font-weight: 800;
            color: #ffffff;
            line-height: 1;
            margin-bottom: 2px;
            letter-spacing: -1px;
            font-feature-settings: "tnum";
            transition: all 0.25s ease;
        }

        .result-unit {
            font-size: 0.82rem;
            color: #d1fae5;
            font-weight: 700;
        }

        .result-trees {
            margin-top: 8px;
            font-size: 0.8rem;
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            font-weight: 600;
            padding: 5px 10px;
            background: rgba(255, 255, 255, 0.18);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 8px;
        }

        /* Animated Progress Gauge */
        .emission-progress-bg {
            width: 100%;
            height: 5px;
            background: rgba(0, 0, 0, 0.2);
            border-radius: 4px;
            margin-top: 8px;
            overflow: hidden;
        }

        .emission-progress-bar {
            height: 100%;
            width: 35%;
            background: #ffffff;
            border-radius: 4px;
            transition: width 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }

        /* Compact Stats Bar */
        .stats-bar {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1rem;
            padding: 1.5rem 1.6rem;
            margin-bottom: 4.5rem;
        }

        .stat-card {
            text-align: center;
            padding: 0.3rem 0.6rem;
            position: relative;
        }

        .stat-card:not(:last-child)::after {
            content: '';
            position: absolute;
            right: 0;
            top: 15%;
            height: 70%;
            width: 1px;
            background: rgba(255, 255, 255, 0.25);
        }

        .stat-val {
            font-size: clamp(1.7rem, 2.5vw, 2.3rem);
            font-weight: 800;
            letter-spacing: -0.8px;
            color: #ffffff;
            margin-bottom: 2px;
            line-height: 1;
        }

        .stat-lbl {
            font-size: 0.85rem;
            color: #d1fae5;
            font-weight: 700;
        }

        /* Compact Bento Grid Section */
        .section-header {
            text-align: center;
            margin-bottom: 2.8rem;
        }

        .section-subtitle {
            font-size: 0.82rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1.8px;
            color: var(--primary-mint);
            margin-bottom: 0.4rem;
        }

        .section-title {
            font-size: clamp(1.8rem, 3vw, 2.5rem);
            font-weight: 800;
            letter-spacing: -0.8px;
            color: #ffffff;
            margin-bottom: 0.6rem;
            line-height: 1.25;
        }

        .section-desc {
            color: #94a3b8;
            max-width: 600px;
            margin: 0 auto;
            font-size: 0.98rem;
            line-height: 1.6;
        }

        .bento-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.2rem;
            margin-bottom: 4.5rem;
        }

        .bento-col-2 {
            grid-column: span 2;
        }

        .bento-card {
            padding: 1.6rem 1.8rem;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .bento-icon-wrapper {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.35);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            color: #ffffff;
            margin-bottom: 1rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            transition: transform 0.3s ease;
        }

        .bento-card:hover .bento-icon-wrapper {
            transform: scale(1.08) rotate(5deg);
        }

        .bento-card-title {
            font-size: 1.2rem;
            font-weight: 800;
            color: #ffffff;
            margin-bottom: 0.45rem;
            letter-spacing: -0.3px;
        }

        .bento-card-desc {
            font-size: 0.9rem;
            color: #f0fdf4;
            line-height: 1.6;
            margin-bottom: 1.2rem;
        }

        .bento-card-link {
            font-size: 0.88rem;
            font-weight: 700;
            color: #ffffff;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            margin-top: auto;
            transition: all 0.3s ease;
        }

        .bento-card-link:hover {
            gap: 10px;
            color: #d1fae5;
        }

        /* Compact How It Works Steps */
        .steps-section {
            margin-bottom: 4.5rem;
        }

        .steps-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.2rem;
        }

        .step-card {
            padding: 1.6rem 1.7rem;
        }

        .step-number {
            font-size: 2.6rem;
            font-weight: 800;
            line-height: 1;
            color: rgba(255, 255, 255, 0.25);
            margin-bottom: 0.6rem;
            letter-spacing: -1.5px;
        }

        .step-title {
            font-size: 1.15rem;
            font-weight: 800;
            color: #ffffff;
            margin-bottom: 0.35rem;
        }

        .step-desc {
            font-size: 0.88rem;
            color: #f0fdf4;
            line-height: 1.6;
        }

        /* Compact Testimonial Banner */
        .testimonial-banner {
            padding: 1.8rem 2.2rem;
            margin-bottom: 4.5rem;
            display: flex;
            align-items: center;
            gap: 1.8rem;
        }

        .quote-icon {
            font-size: 2.4rem;
            color: rgba(255, 255, 255, 0.3);
            flex-shrink: 0;
        }

        .quote-body {
            font-size: 1.05rem;
            font-weight: 600;
            line-height: 1.65;
            color: #ffffff;
            margin-bottom: 0.75rem;
            font-style: italic;
        }

        .quote-author {
            font-size: 0.95rem;
            font-weight: 800;
            color: #ffffff;
        }

        .quote-role {
            font-size: 0.82rem;
            color: #d1fae5;
            font-weight: 600;
        }

        /* Compact FAQ Accordion Section */
        .faq-section {
            margin-bottom: 4.5rem;
        }

        .faq-list {
            max-width: 820px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }

        .faq-item {
            border-radius: 14px;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .faq-question {
            padding: 1rem 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 0.98rem;
            font-weight: 800;
            color: #ffffff;
            cursor: pointer;
            user-select: none;
            transition: background 0.3s ease;
        }

        .faq-icon {
            font-size: 0.9rem;
            color: #ffffff;
            transition: transform 0.35s ease;
        }

        .faq-item.active .faq-icon {
            transform: rotate(180deg);
        }

        .faq-answer {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.35s cubic-bezier(0.16, 1, 0.3, 1), padding 0.3s ease;
            padding: 0 1.5rem;
            color: #f0fdf4;
            font-size: 0.9rem;
            line-height: 1.6;
        }

        .faq-item.active .faq-answer {
            max-height: 220px;
            padding: 0 1.5rem 1.1rem 1.5rem;
        }

        /* Compact Call To Action Box */
        .cta-box {
            padding: 3rem 2rem;
            text-align: center;
            background: linear-gradient(135deg, #10b981 0%, #059669 60%, #047857 100%);
            border: 1px solid rgba(167, 243, 208, 0.4);
            border-radius: 22px;
            margin-bottom: 4.5rem;
            box-shadow: 0 20px 40px -10px rgba(0, 0, 0, 0.6), 0 0 30px rgba(52, 211, 153, 0.3);
            position: relative;
            overflow: hidden;
        }

        .cta-box::before {
            content: '';
            position: absolute;
            top: -50%;
            left: 50%;
            transform: translateX(-50%);
            width: 500px;
            height: 250px;
            background: radial-gradient(ellipse, rgba(255, 255, 255, 0.3) 0%, transparent 70%);
            pointer-events: none;
        }

        .cta-title {
            font-size: clamp(1.8rem, 2.8vw, 2.4rem);
            font-weight: 800;
            letter-spacing: -0.8px;
            color: #ffffff;
            margin-bottom: 0.7rem;
            line-height: 1.2;
        }

        .cta-desc {
            font-size: 1rem;
            color: #f0fdf4;
            max-width: 600px;
            margin: 0 auto 1.8rem;
            line-height: 1.6;
        }

        /* Footer (Deep Obsidian Slate) */
        .footer {
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            padding: 3.8rem 5% 2rem;
            background: #040907;
            position: relative;
            z-index: 1;
        }

        .footer-content {
            max-width: 1240px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 2.8rem;
            margin-bottom: 2.8rem;
        }

        .footer-brand p {
            color: #94a3b8;
            font-size: 0.9rem;
            margin-top: 0.8rem;
            max-width: 320px;
            line-height: 1.6;
        }

        .footer-col-title {
            font-size: 0.92rem;
            font-weight: 800;
            color: #f8fafc;
            margin-bottom: 1rem;
            letter-spacing: 0.5px;
        }

        .footer-links {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 0.7rem;
        }

        .footer-links a {
            text-decoration: none;
            color: #94a3b8;
            font-size: 0.88rem;
            font-weight: 500;
            transition: color 0.25s ease;
        }

        .footer-links a:hover {
            color: var(--primary-mint);
        }

        .footer-bottom {
            max-width: 1240px;
            margin: 0 auto;
            padding-top: 1.8rem;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.85rem;
            color: #94a3b8;
        }

        .status-indicator {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 5px 12px;
            background: rgba(16, 185, 129, 0.12);
            border: 1px solid rgba(52, 211, 153, 0.3);
            border-radius: 20px;
            color: #34d399;
            font-size: 0.8rem;
            font-weight: 700;
        }

        .status-dot {
            width: 7px;
            height: 7px;
            background: var(--primary-mint);
            border-radius: 50%;
            box-shadow: 0 0 8px var(--primary-mint);
            animation: pulseDot 2s infinite;
        }

        @keyframes pulseDot {
            0%, 100% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.35); opacity: 0.7; }
        }

        /* Scroll Reveal Utility Classes */
        .reveal {
            opacity: 0;
            transform: translateY(25px);
            transition: opacity 0.7s cubic-bezier(0.16, 1, 0.3, 1), transform 0.7s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .reveal.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Keyframes */
        @keyframes fadeInDown {
            from { opacity: 0; transform: translateY(-16px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeInRight {
            from { opacity: 0; transform: translateX(25px); }
            to { opacity: 1; transform: translateX(0); }
        }

        /* Responsive Breakpoints */
        @media (max-width: 1024px) {
            .hero-section {
                grid-template-columns: 1fr;
                gap: 2.8rem;
                padding-top: 0.5rem;
            }
            .bento-grid {
                grid-template-columns: 1fr;
            }
            .bento-col-2 {
                grid-column: span 1;
            }
            .stats-bar {
                grid-template-columns: repeat(2, 1fr);
                gap: 1.5rem;
            }
            .stat-card:not(:last-child)::after {
                display: none;
            }
            .steps-grid {
                grid-template-columns: 1fr;
            }
            .footer-content {
                grid-template-columns: 1fr 1fr;
            }
            .badge-float-1, .badge-float-2 {
                display: none;
            }
        }

        @media (max-width: 768px) {
            .navbar {
                padding: 0 5%;
                height: 68px;
            }
            .nav-links, .nav-actions .btn {
                display: none;
            }
            .mobile-menu-btn {
                display: inline-flex;
            }
            .main-wrapper {
                padding: 95px 5% 35px;
            }
            .hero-title {
                letter-spacing: -0.8px;
            }
            .hero-cta {
                flex-direction: column;
                align-items: stretch;
            }
            .hero-cta .btn {
                width: 100%;
            }
            .stats-bar {
                grid-template-columns: 1fr;
                padding: 1.5rem 1.2rem;
                gap: 1.2rem;
            }
            .testimonial-banner {
                flex-direction: column;
                text-align: center;
                padding: 1.6rem 1.4rem;
                gap: 1.2rem;
            }
            .cta-box {
                padding: 2.4rem 1.4rem;
            }
            .footer-content {
                grid-template-columns: 1fr;
                gap: 2rem;
            }
            .footer-bottom {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }
        }
    </style>
</head>
<body>

    <!-- Ambient Dynamic Glows & Grid Background -->
    <div class="ambient-glow-1"></div>
    <div class="ambient-glow-2"></div>
    <div class="ambient-grid"></div>

    <!-- Navigation Bar -->
    <header class="navbar">
        <a href="/" class="nav-brand">
            <div class="nav-logo-icon">
                <i class="fa-solid fa-leaf"></i>
            </div>
            <span class="nav-brand-title">KaHejo</span>
        </a>

        <ul class="nav-links">
            <li><a href="#fitur" class="nav-link">Fitur Unggulan</a></li>
            <li><a href="#kalkulator" class="nav-link">Kalkulator Karbon</a></li>
            <li><a href="#cara-kerja" class="nav-link">Cara Kerja</a></li>
            <li><a href="#faq" class="nav-link">Tanya Jawab</a></li>
        </ul>

        <div class="nav-actions">
            @auth
                <a href="{{ route('main') }}" class="btn btn-primary btn-shimmer">
                    <i class="fa-solid fa-gauge"></i>
                    <span>Dashboard Saya</span>
                </a>
            @else
                <a href="{{ route('login') }}" class="btn btn-ghost">Masuk</a>
                <a href="{{ route('register') }}" class="btn btn-primary btn-shimmer">
                    <span>Mulai Sekarang</span>
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
            @endauth
            <!-- Mobile Menu Toggle -->
            <button class="mobile-menu-btn" id="mobile-toggle" aria-label="Toggle Menu">
                <i class="fa-solid fa-bars" id="menu-icon"></i>
            </button>
        </div>
    </header>

    <!-- Mobile Navigation Drawer -->
    <nav class="mobile-nav-drawer" id="mobile-drawer">
        <ul class="mobile-nav-links">
            <li>
                <a href="#fitur" class="mobile-nav-link" onclick="toggleMenu()">
                    <span>Fitur Unggulan</span>
                    <i class="fa-solid fa-chevron-right" style="font-size: 0.85rem; color: var(--primary-mint);"></i>
                </a>
            </li>
            <li>
                <a href="#kalkulator" class="mobile-nav-link" onclick="toggleMenu()">
                    <span>Kalkulator Karbon</span>
                    <i class="fa-solid fa-chevron-right" style="font-size: 0.85rem; color: var(--primary-mint);"></i>
                </a>
            </li>
            <li>
                <a href="#cara-kerja" class="mobile-nav-link" onclick="toggleMenu()">
                    <span>Cara Kerja</span>
                    <i class="fa-solid fa-chevron-right" style="font-size: 0.85rem; color: var(--primary-mint);"></i>
                </a>
            </li>
            <li>
                <a href="#faq" class="mobile-nav-link" onclick="toggleMenu()">
                    <span>Tanya Jawab (FAQ)</span>
                    <i class="fa-solid fa-chevron-right" style="font-size: 0.85rem; color: var(--primary-mint);"></i>
                </a>
            </li>
        </ul>
        <div style="display: flex; flex-direction: column; gap: 0.7rem; margin-top: 0.4rem;">
            @auth
                <a href="{{ route('main') }}" class="btn btn-primary" style="width: 100%;">
                    <i class="fa-solid fa-gauge"></i>
                    <span>Dashboard Saya</span>
                </a>
            @else
                <a href="{{ route('login') }}" class="btn btn-ghost" style="width: 100%;">Masuk</a>
                <a href="{{ route('register') }}" class="btn btn-primary" style="width: 100%;">
                    <span>Mulai Gratis</span>
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
            @endauth
        </div>
    </nav>

    <!-- Main Content Area -->
    <main class="main-wrapper">

        <!-- Hero Section -->
        <section class="hero-section">
            <div class="hero-content">
                <div class="badge-pill">
                    <span class="badge-pulse"></span>
                    <span>Platform Jejak Karbon & Net-Zero Terintegrasi</span>
                </div>
                
                <h1 class="hero-title">
                    Lacak Jejak Karbonmu, <br>
                    Wujudkan Bumi yang <br>
                    <span class="gradient-emerald-text">Lebih Hijau.</span>
                </h1>

                <p class="hero-desc">
                    KaHejo memudahkan individu dan perusahaan menghitung emisi harian, memantau efisiensi energi secara presisi, dan menukar aksi ramah lingkungan menjadi reward nyata.
                </p>

                <div class="hero-cta">
                    <a href="{{ route('register') }}" class="btn btn-primary btn-shimmer" style="padding: 0.85rem 1.75rem; font-size: 0.96rem;">
                        <i class="fa-solid fa-rocket"></i>
                        <span>Mulai Sekarang — Gratis</span>
                    </a>
                    <a href="#kalkulator" class="btn btn-secondary" style="padding: 0.85rem 1.6rem; font-size: 0.96rem;">
                        <i class="fa-solid fa-calculator"></i>
                        <span>Coba Simulasi Cepat</span>
                    </a>
                </div>

                <div class="hero-trust">
                    <div class="trust-avatars">
                        <div class="trust-avatar">KH</div>
                        <div class="trust-avatar"><i class="fa-solid fa-tree" style="font-size: 0.72rem;"></i></div>
                        <div class="trust-avatar"><i class="fa-solid fa-seedling" style="font-size: 0.72rem;"></i></div>
                    </div>
                    <p class="trust-text">
                        Dipercaya oleh <strong>10.000+</strong> pegiat lingkungan & <strong>50+</strong> komunitas aktif.
                    </p>
                </div>
            </div>

            <!-- Compact Live Carbon Widget Card with Floating Badges -->
            <div style="position: relative;">
                <!-- Floating Decorative Badges -->
                <div class="floating-badge badge-float-1">
                    <i class="fa-solid fa-leaf" style="color: var(--primary-mint);"></i>
                    <span>Emisi Turun 35%</span>
                </div>
                <div class="floating-badge badge-float-2">
                    <i class="fa-solid fa-award" style="color: #fbbf24;"></i>
                    <span>Eco Warrior Level 4</span>
                </div>

                <div class="calculator-widget green-card" id="kalkulator">
                    <div class="widget-header">
                        <div>
                            <div class="widget-title">Simulasi Jejak Karbon</div>
                            <span style="font-size: 0.8rem; color: var(--card-muted);">Geser untuk estimasi emisi bulanan</span>
                        </div>
                        <span class="widget-badge">
                            <i class="fa-solid fa-sliders"></i>
                            <span>Live Preview</span>
                        </span>
                    </div>

                    <div class="calc-field">
                        <div class="calc-label">
                            <span><i class="fa-solid fa-motorcycle" style="color: #ffffff; margin-right: 6px;"></i> Transportasi Kendaraan</span>
                            <strong id="transport-val">15 km/hari</strong>
                        </div>
                        <div class="slider-wrapper">
                            <input type="range" min="0" max="100" value="15" class="calc-slider" id="transport-slider" oninput="calculateEmission()">
                        </div>
                    </div>

                    <div class="calc-field">
                        <div class="calc-label">
                            <span><i class="fa-solid fa-bolt" style="color: #fef08a; margin-right: 6px;"></i> Konsumsi Listrik Rumah</span>
                            <strong id="electricity-val">150 kWh/bln</strong>
                        </div>
                        <div class="slider-wrapper">
                            <input type="range" min="20" max="800" value="150" class="calc-slider" id="electricity-slider" oninput="calculateEmission()">
                        </div>
                    </div>

                    <div class="calc-result-box">
                        <div class="result-number" id="total-co2">213.0</div>
                        <div class="result-unit">kg CO₂e / bulan</div>
                        
                        <!-- Progress Gauge Indicator -->
                        <div class="emission-progress-bg">
                            <div class="emission-progress-bar" id="progress-bar"></div>
                        </div>

                        <div class="result-trees">
                            <i class="fa-solid fa-tree" style="color: #ffffff;"></i>
                            <span>Butuh <strong id="trees-needed">10 pohon</strong> untuk menyerap emisi ini per tahun.</span>
                        </div>
                    </div>

                    <div style="margin-top: 1.1rem; text-align: center;">
                        <a href="{{ route('register') }}" class="btn" style="width: 100%; border-radius: 12px; padding: 0.78rem; background: #ffffff; color: #047857; font-weight: 800; font-size: 0.92rem; box-shadow: 0 4px 12px rgba(0,0,0,0.15);">
                            <span>Simpan & Pantau Lengkap di KaHejo</span>
                            <i class="fa-solid fa-chevron-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Compact Vibrant Emerald Stats Bar -->
        <section class="stats-bar green-card reveal" id="stats-section">
            <div class="stat-card">
                <div class="stat-val" data-target="54200">54.200+</div>
                <div class="stat-lbl">kg CO₂e Terkalkulasi</div>
            </div>
            <div class="stat-card">
                <div class="stat-val" data-target="10000">10.000+</div>
                <div class="stat-lbl">Pengguna Aktif</div>
            </div>
            <div class="stat-card">
                <div class="stat-val" data-target="3450">3.450+</div>
                <div class="stat-lbl">Pohon Ditanam</div>
            </div>
            <div class="stat-card">
                <div class="stat-val" data-target="99">98.8%</div>
                <div class="stat-lbl">Akurasi Perhitungan</div>
            </div>
        </section>

        <!-- Compact Bento Grid Features Section -->
        <section id="fitur" style="margin-bottom: 4.5rem;" class="reveal">
            <div class="section-header">
                <div class="section-subtitle">FITUR UNGGULAN</div>
                <h2 class="section-title">Solusi Komprehensif untuk Masa Depan Berkelanjutan</h2>
                <p class="section-desc">Dari kalkulasi emisi harian hingga optimasi energi korporat, KaHejo siap menjadi pendamping aksi hijau Anda.</p>
            </div>

            <div class="bento-grid">
                <!-- Card 1: Carbon Calculator -->
                <div class="bento-card green-card bento-col-2">
                    <div>
                        <div class="bento-icon-wrapper">
                            <i class="fa-solid fa-calculator"></i>
                        </div>
                        <h3 class="bento-card-title">Kalkulator Jejak Karbon Pribadi</h3>
                        <p class="bento-card-desc">
                            Hitung emisi harian secara presisi mulai dari konsumsi bahan bakar kendaraan, konsumsi listrik, hingga limbah rumah tangga menggunakan faktor emisi terstandarisasi Kementerian LHK & IPCC.
                        </p>
                    </div>
                    <a href="{{ route('register') }}" class="bento-card-link">
                        <span>Coba Kalkulator Karbon</span>
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>

                <!-- Card 2: Rewards & Gamification -->
                <div class="bento-card green-card">
                    <div>
                        <div class="bento-icon-wrapper">
                            <i class="fa-solid fa-gift"></i>
                        </div>
                        <h3 class="bento-card-title">Tukar Poin Jadi Rewards</h3>
                        <p class="bento-card-desc">
                            Setiap aksi pengurangan emisi memberi Anda poin reward yang dapat ditukar dengan voucher eksklusif dan merchandise ramah lingkungan.
                        </p>
                    </div>
                    <a href="{{ route('register') }}" class="bento-card-link">
                        <span>Jelajahi Reward</span>
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>

                <!-- Card 3: Company Energy Consumption -->
                <div class="bento-card green-card">
                    <div>
                        <div class="bento-icon-wrapper">
                            <i class="fa-solid fa-industry"></i>
                        </div>
                        <h3 class="bento-card-title">Konsumsi Energi Perusahaan</h3>
                        <p class="bento-card-desc">
                            Fasilitas pencatatan emisi operasional gedung dan manufaktur untuk membantu korporasi mencapai target ESG dan sertifikasi hijau resmi.
                        </p>
                    </div>
                    <a href="{{ route('register') }}" class="bento-card-link">
                        <span>Solusi Korporat</span>
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>

                <!-- Card 4: Achievements & Badges -->
                <div class="bento-card green-card bento-col-2">
                    <div>
                        <div class="bento-icon-wrapper">
                            <i class="fa-solid fa-medal"></i>
                        </div>
                        <h3 class="bento-card-title">Badge & Tantangan Komunitas</h3>
                        <p class="bento-card-desc">
                            Dapatkan lencana prestasi seperti <em>"Zero Waste Hero"</em> dan <em>"Clean Commuter"</em> saat Anda konsisten menerapkan pola hidup minim karbon. Bagikan pencapaian Anda kepada komunitas!
                        </p>
                    </div>
                    <a href="{{ route('register') }}" class="bento-card-link">
                        <span>Lihat Semua Prestasi</span>
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </section>

        <!-- Compact Steps Section -->
        <section id="cara-kerja" class="steps-section reveal">
            <div class="section-header">
                <div class="section-subtitle">LANGKAH SEDERHANA</div>
                <h2 class="section-title">Bagaimana KaHejo Bekerja?</h2>
                <p class="section-desc">Hanya butuh 3 menit setiap hari untuk berkontribusi menjaga kelestarian bumi.</p>
            </div>

            <div class="steps-grid">
                <div class="step-card green-card">
                    <div class="step-number">01</div>
                    <h3 class="step-title">Catat Aktivitas</h3>
                    <p class="step-desc">Masukkan jarak tempuh perjalanan harian, pemakaian listrik bulanan, atau kebiasaan belanja Anda dengan cepat dan mudah.</p>
                </div>
                <div class="step-card green-card">
                    <div class="step-number">02</div>
                    <h3 class="step-title">Dapatkan Analisis</h3>
                    <p class="step-desc">Sistem mengonversi data Anda menjadi metrik emisi kg CO₂e transparan beserta saran rekomendasi penghematan praktis.</p>
                </div>
                <div class="step-card green-card">
                    <div class="step-number">03</div>
                    <h3 class="step-title">Klaim Reward</h3>
                    <p class="step-desc">Dapatkan koin hijau setiap ada penurunan emisi, raih badge prestasi, dan tukarkan dengan beragam hadiah menarik.</p>
                </div>
            </div>
        </section>

        <!-- Compact Testimonial Banner -->
        <section class="testimonial-banner green-card reveal">
            <i class="fa-solid fa-quote-left quote-icon"></i>
            <div>
                <p class="quote-body">
                    "KaHejo benar-benar membuka mata tim kami tentang seberapa besar jejak karbon harian yang kami hasilkan. Antarmukanya intuitif, dan fitur reward-nya bikin seluruh tim termotivasi untuk naik sepeda atau transportasi umum!"
                </p>
                <div class="quote-author">Asher Akmal</div>
                <div class="quote-role">Inisiator Gerakan Pemuda Hijau & Pengguna Aktif KaHejo</div>
            </div>
        </section>

        <!-- Compact FAQ Accordion Section -->
        <section id="faq" class="faq-section reveal">
            <div class="section-header">
                <div class="section-subtitle">TANYA JAWAB</div>
                <h2 class="section-title">Pertanyaan yang Sering Diajukan</h2>
                <p class="section-desc">Punya pertanyaan seputar cara kerja KaHejo? Temukan jawabannya di bawah ini.</p>
            </div>

            <div class="faq-list">
                <div class="faq-item green-card">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <span>Apakah platform KaHejo gratis untuk digunakan?</span>
                        <i class="fa-solid fa-chevron-down faq-icon"></i>
                    </div>
                    <div class="faq-answer">
                        Ya, KaHejo 100% gratis untuk pengguna individu. Anda dapat menghitung jejak karbon, mengumpulkan poin reward, dan berpartisipasi dalam tantangan komunitas tanpa biaya sepeser pun.
                    </div>
                </div>

                <div class="faq-item green-card">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <span>Bagaimana cara KaHejo menghitung emisi karbon?</span>
                        <i class="fa-solid fa-chevron-down faq-icon"></i>
                    </div>
                    <div class="faq-answer">
                        Perhitungan kami menggunakan faktor emisi resmi yang divalidasi oleh Kementerian Lingkungan Hidup dan Kehutanan (KLHK) Republik Indonesia serta metodologi terstandarisasi Intergovernmental Panel on Climate Change (IPCC).
                    </div>
                </div>

                <div class="faq-item green-card">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <span>Bagaimana cara menukarkan poin reward?</span>
                        <i class="fa-solid fa-chevron-down faq-icon"></i>
                    </div>
                    <div class="faq-answer">
                        Setelah login ke dashboard, buka menu Rewards. Poin yang terkumpul dari penurunan emisi karbon Anda dapat ditukarkan langsung dengan voucher belanja produk ramah lingkungan atau bibit pohon untuk ditanam atas nama Anda.
                    </div>
                </div>
            </div>
        </section>

        <!-- Compact Call To Action Box -->
        <section class="cta-box reveal">
            <h2 class="cta-title">Siap Memulai Langkah Nyata <br> untuk Bumi Kita?</h2>
            <p class="cta-desc">Bergabunglah bersama ribuan pejuang lingkungan lainnya di KaHejo hari ini. Tanpa biaya pendaftaran, bebas iklan.</p>
            <div style="display: flex; justify-content: center; gap: 1rem; flex-wrap: wrap;">
                <a href="{{ route('register') }}" class="btn" style="background: #ffffff; color: #047857; padding: 0.9rem 2.1rem; font-size: 0.98rem; font-weight: 800; box-shadow: 0 4px 14px rgba(0,0,0,0.2);">
                    <i class="fa-solid fa-user-plus"></i>
                    <span>Daftar Akun Sekarang</span>
                </a>
                <a href="{{ route('login') }}" class="btn" style="background: rgba(255, 255, 255, 0.15); border: 1.5px solid #ffffff; color: #ffffff; padding: 0.9rem 2rem; font-size: 0.98rem; font-weight: 700;">
                    <span>Masuk ke Akun</span>
                </a>
            </div>
        </section>

    </main>

    <!-- Modern Footer (Deep Obsidian Slate) -->
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-brand">
                <div style="display: flex; align-items: center; gap: 10px;">
                    <div class="nav-logo-icon" style="width: 34px; height: 34px; font-size: 1rem;">
                        <i class="fa-solid fa-leaf"></i>
                    </div>
                    <span class="nav-brand-title" style="font-size: 1.2rem;">KaHejo</span>
                </div>
                <p>
                    Platform manajemen jejak karbon digital terdepan di Indonesia untuk masa depan rendah emisi dan berkelanjutan.
                </p>
            </div>

            <div>
                <h4 class="footer-col-title">Navigasi</h4>
                <ul class="footer-links">
                    <li><a href="#fitur">Fitur Utama</a></li>
                    <li><a href="#kalkulator">Kalkulator Emisi</a></li>
                    <li><a href="#cara-kerja">Cara Kerja</a></li>
                    <li><a href="{{ route('faqs.index') }}">Tanya Jawab (FAQ)</a></li>
                </ul>
            </div>

            <div>
                <h4 class="footer-col-title">Aplikasi</h4>
                <ul class="footer-links">
                    <li><a href="{{ route('login') }}">Masuk Pengguna</a></li>
                    <li><a href="{{ route('register') }}">Daftar Baru</a></li>
                    <li><a href="{{ route('admin.login') }}">Portal Admin</a></li>
                </ul>
            </div>

            <div>
                <h4 class="footer-col-title">Komunitas</h4>
                <ul class="footer-links">
                    <li><a href="#fitur">Program Penanaman Pohon</a></li>
                    <li><a href="#fitur">Komunitas Zero-Waste</a></li>
                    <li><a href="#fitur">Edukasi Iklim</a></li>
                </ul>
            </div>
        </div>

        <div class="footer-bottom">
            <div>
                &copy; 2026 KaHejo. Seluruh Hak Cipta Dilindungi.
            </div>
            <div class="status-indicator">
                <span class="status-dot"></span>
                <span>Semua Sistem Berjalan Normal</span>
            </div>
        </div>
    </footer>

    <!-- Interactive Scripts & Animations -->
    <script>
        // 1. Mobile Hamburger Menu Toggle
        function toggleMenu() {
            const drawer = document.getElementById('mobile-drawer');
            const icon = document.getElementById('menu-icon');
            const isOpen = drawer.classList.contains('active');
            
            if (isOpen) {
                drawer.classList.remove('active');
                icon.className = 'fa-solid fa-bars';
            } else {
                drawer.classList.add('active');
                icon.className = 'fa-solid fa-xmark';
            }
        }
        document.getElementById('mobile-toggle').addEventListener('click', toggleMenu);

        // 2. Interactive Spotlight Glow on Mouse Movement for Cards
        document.querySelectorAll('.green-card').forEach(card => {
            card.addEventListener('mousemove', e => {
                const rect = card.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                card.style.setProperty('--mouse-x', `${x}px`);
                card.style.setProperty('--mouse-y', `${y}px`);
            });
        });

        // 3. Dynamic Carbon Calculator Simulation
        function calculateEmission() {
            const transportKm = parseFloat(document.getElementById('transport-slider').value) || 0;
            const electricityKwh = parseFloat(document.getElementById('electricity-slider').value) || 0;

            document.getElementById('transport-val').innerText = transportKm + ' km/hari';
            document.getElementById('electricity-val').innerText = electricityKwh + ' kWh/bln';

            // Faktor emisi standar (IPCC/KemenLHK):
            // Transport: ~0.19 kg CO2e/km * 30 hari
            // Listrik grid: ~0.85 kg CO2e/kWh
            const monthlyTransportCO2 = transportKm * 0.19 * 30;
            const monthlyElectricityCO2 = electricityKwh * 0.85;

            const total = (monthlyTransportCO2 + monthlyElectricityCO2).toFixed(1);
            document.getElementById('total-co2').innerText = total;

            // Gauge progress bar calculation (max benchmark ~700 kg)
            const percentage = Math.min(Math.max((total / 700) * 100, 10), 100);
            document.getElementById('progress-bar').style.width = percentage + '%';

            // 1 pohon dewasa menyerap ~21.7 kg CO2/tahun
            const treesNeeded = Math.ceil(total / 21.7);
            document.getElementById('trees-needed').innerText = treesNeeded + ' pohon';
        }

        // 4. FAQ Accordion Toggle
        function toggleFaq(element) {
            const item = element.parentElement;
            const isActive = item.classList.contains('active');
            
            document.querySelectorAll('.faq-item').forEach(el => el.classList.remove('active'));
            
            if (!isActive) {
                item.classList.add('active');
            }
        }

        // 5. Scroll Reveal Observer
        document.addEventListener('DOMContentLoaded', () => {
            calculateEmission();

            const reveals = document.querySelectorAll('.reveal');
            const revealObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.15 });

            reveals.forEach(el => revealObserver.observe(el));
        });
    </script>
</body>
</html>