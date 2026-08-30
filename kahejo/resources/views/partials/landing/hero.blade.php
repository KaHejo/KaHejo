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
                    <span><i class="fa-solid fa-motorcycle" style="color: var(--primary-mint); margin-right: 6px;"></i> Transportasi Kendaraan</span>
                    <strong id="transport-val">15 km/hari</strong>
                </div>
                <div class="slider-wrapper">
                    <input type="range" min="0" max="100" value="15" class="calc-slider" id="transport-slider" oninput="calculateEmission()">
                </div>
            </div>

            <div class="calc-field">
                <div class="calc-label">
                    <span><i class="fa-solid fa-bolt" style="color: #fbbf24; margin-right: 6px;"></i> Konsumsi Listrik Rumah</span>
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
                    <i class="fa-solid fa-tree" style="color: var(--primary-mint);"></i>
                    <span>Butuh <strong id="trees-needed" style="color: #ffffff;">10 pohon</strong> untuk menyerap emisi ini per tahun.</span>
                </div>
            </div>

            <div style="margin-top: 1.1rem; text-align: center;">
                <a href="{{ route('register') }}" class="btn btn-primary btn-shimmer" style="width: 100%; border-radius: 12px; padding: 0.78rem; font-size: 0.92rem;">
                    <span>Simpan & Pantau Lengkap di KaHejo</span>
                    <i class="fa-solid fa-chevron-right"></i>
                </a>
            </div>
        </div>
    </div>
</section>
