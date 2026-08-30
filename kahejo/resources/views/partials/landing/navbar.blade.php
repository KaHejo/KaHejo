<!-- Navigation Bar -->
<header class="navbar">
    <a href="/" class="nav-brand">
        <img src="{{ asset('images/logo.svg') }}" alt="KaHejo Logo" class="nav-logo-img">
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
