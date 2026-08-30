<!-- Modern Footer (Deep Obsidian Slate) -->
<footer class="footer">
    <div class="footer-content">
        <div class="footer-brand">
            <div style="display: flex; align-items: center; gap: 10px;">
                <img src="{{ asset('images/logo.svg') }}" alt="KaHejo Logo" style="width: 32px; height: 32px; object-fit: contain; filter: drop-shadow(0 0 8px rgba(52, 211, 153, 0.5));">
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
