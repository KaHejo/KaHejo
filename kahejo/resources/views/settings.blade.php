@extends('layouts.app')

@section('title', 'Pengaturan Sistem')

@section('content')
<div class="max-w-6xl mx-auto py-8 px-4 sm:px-6 lg:px-8 space-y-8">

    <!-- Top Hero Header -->
    <div class="glass-card p-6 sm:p-8 relative overflow-hidden">
        <div class="absolute -right-16 -top-16 w-64 h-64 bg-emeraldBrand/15 rounded-full blur-3xl pointer-events-none"></div>

        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 relative z-10">
            <div>
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emeraldBrand/10 border border-emeraldBrand/25 text-mintGlow text-xs font-semibold mb-2">
                    <i class="fa-solid fa-sliders text-[11px]"></i>
                    <span>Preferensi & Kontrol Platform</span>
                </div>
                <h1 class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight">
                    Pengaturan KaHejo
                </h1>
                <p class="mt-1 text-sm text-slate-400 max-w-2xl">
                    Personalisasi target batas emisi, frekuensi pengingat aksi hijau, privasi peringkat komunitas, serta manajemen ekspor data jejak karbon Anda.
                </p>
            </div>

            <!-- Quick Save / Status Pill -->
            <div class="flex items-center gap-3">
                <button type="button" id="saveAllSettingsBtn" 
                        class="px-5 py-2.5 rounded-xl bg-gradient-to-r from-emeraldBrand to-emeraldDark hover:from-[#18c58f] hover:to-emeraldDark text-white text-xs font-bold shadow-lg shadow-emeraldBrand/25 hover:shadow-emeraldBrand/40 transition-all duration-200 flex items-center gap-2 cursor-pointer active:scale-95">
                    <i class="fa-solid fa-floppy-disk text-xs"></i>
                    <span>Simpan Preferensi</span>
                </button>
            </div>
        </div>

        <!-- Quick Navigation Anchors -->
        <div class="flex items-center gap-2 mt-6 pt-6 border-t border-white/[0.08] overflow-x-auto pb-1 text-xs font-semibold">
            <a href="#carbon-budget" class="px-3.5 py-1.5 rounded-xl bg-white/[0.04] hover:bg-white/[0.08] text-slate-300 hover:text-white border border-white/10 transition-colors whitespace-nowrap flex items-center gap-2">
                <i class="fa-solid fa-bullseye text-mintGlow text-xs"></i>
                <span>Target Karbon</span>
            </a>
            <a href="#notifications" class="px-3.5 py-1.5 rounded-xl bg-white/[0.04] hover:bg-white/[0.08] text-slate-300 hover:text-white border border-white/10 transition-colors whitespace-nowrap flex items-center gap-2">
                <i class="fa-solid fa-bell text-amber-400 text-xs"></i>
                <span>Notifikasi</span>
            </a>
            <a href="#appearance" class="px-3.5 py-1.5 rounded-xl bg-white/[0.04] hover:bg-white/[0.08] text-slate-300 hover:text-white border border-white/10 transition-colors whitespace-nowrap flex items-center gap-2">
                <i class="fa-solid fa-palette text-sky-400 text-xs"></i>
                <span>Tampilan</span>
            </a>
            <a href="#privacy" class="px-3.5 py-1.5 rounded-xl bg-white/[0.04] hover:bg-white/[0.08] text-slate-300 hover:text-white border border-white/10 transition-colors whitespace-nowrap flex items-center gap-2">
                <i class="fa-solid fa-shield-halved text-purple-400 text-xs"></i>
                <span>Privasi</span>
            </a>
            <a href="#data-management" class="px-3.5 py-1.5 rounded-xl bg-white/[0.04] hover:bg-white/[0.08] text-slate-300 hover:text-white border border-white/10 transition-colors whitespace-nowrap flex items-center gap-2">
                <i class="fa-solid fa-database text-rose-400 text-xs"></i>
                <span>Data & Akun</span>
            </a>
        </div>
    </div>

    <!-- Main Settings Form Container -->
    <div class="space-y-8">

        <!-- ============================================== -->
        <!-- SECTION 1: TARGET KARBON & SATUAN (CARBON BUDGET) -->
        <!-- ============================================== -->
        <div id="carbon-budget" class="glass-card p-6 sm:p-8 space-y-6">
            <div class="flex items-center gap-3.5 pb-5 border-b border-white/[0.08]">
                <div class="w-11 h-11 rounded-xl bg-emeraldBrand/15 border border-emeraldBrand/30 flex items-center justify-center text-mintGlow text-lg shadow-sm">
                    <i class="fa-solid fa-bullseye"></i>
                </div>
                <div>
                    <h2 class="text-lg sm:text-xl font-extrabold text-white tracking-tight">Target Karbon & Satuan Emisi</h2>
                    <p class="text-xs text-slate-400 mt-0.5">Konfigurasikan batas anggaran emisi bulanan dan standar kalkulasi GHG.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Target Batas Emisi Bulanan (Carbon Budget) -->
                <div class="p-5 rounded-2xl bg-white/[0.03] border border-white/[0.08] space-y-4">
                    <div>
                        <div class="flex items-center justify-between mb-1">
                            <label class="text-xs font-bold text-white flex items-center gap-1.5">
                                <span>Anggaran Karbon Bulanan (*Monthly Budget*)</span>
                            </label>
                            <span id="budgetValueDisplay" class="text-xs font-black text-mintGlow bg-emeraldBrand/15 px-2 py-0.5 rounded-lg border border-emeraldBrand/30">
                                180 kg CO₂e
                            </span>
                        </div>
                        <p class="text-[11px] text-slate-400">Target batas maksimal jejak karbon yang ingin Anda pertahankan setiap bulan.</p>
                    </div>

                    <input type="range" id="carbonBudgetSlider" min="50" max="600" step="10" value="180" 
                           class="w-full accent-emeraldBrand bg-white/10 rounded-lg cursor-pointer h-2">

                    <div class="flex justify-between text-[10px] text-slate-500 font-semibold">
                        <span>50 kg (Sangat Rendah)</span>
                        <span>300 kg (Rata-rata)</span>
                        <span>600 kg (Tinggi)</span>
                    </div>

                    <div class="p-3 rounded-xl bg-emeraldBrand/10 border border-emeraldBrand/20 flex items-start gap-2.5 text-xs text-slate-300">
                        <i class="fa-solid fa-circle-info text-mintGlow mt-0.5 text-xs shrink-0"></i>
                        <span>Sistem KaHejo akan memberikan peringatan otomatis jika konsumsi energi Anda telah mencapai 80% dari target ini.</span>
                    </div>
                </div>

                <!-- Satuan Pengukuran & Basis Standar -->
                <div class="p-5 rounded-2xl bg-white/[0.03] border border-white/[0.08] space-y-4">
                    <div>
                        <label class="text-xs font-bold text-white block mb-1">Satuan Pengukuran Emisi Utama</label>
                        <p class="text-[11px] text-slate-400 mb-3">Pilih format angka yang ditampilkan pada seluruh grafik dashboard.</p>
                        
                        <div class="grid grid-cols-2 gap-3">
                            <label class="p-3 rounded-xl bg-white/[0.04] border border-emeraldBrand/40 flex items-center gap-3 cursor-pointer hover:bg-white/[0.07] transition-all">
                                <input type="radio" name="unit_preference" value="kg" checked class="text-emeraldBrand focus:ring-emeraldBrand">
                                <div>
                                    <span class="text-xs font-bold text-white block">Kilogram (kg CO₂e)</span>
                                    <span class="text-[10px] text-slate-400 block">Presisi untuk personal</span>
                                </div>
                            </label>

                            <label class="p-3 rounded-xl bg-white/[0.04] border border-white/10 flex items-center gap-3 cursor-pointer hover:bg-white/[0.07] transition-all">
                                <input type="radio" name="unit_preference" value="ton" class="text-emeraldBrand focus:ring-emeraldBrand">
                                <div>
                                    <span class="text-xs font-bold text-white block">Metrik Ton (t CO₂e)</span>
                                    <span class="text-[10px] text-slate-400 block">Standar industri/perusahaan</span>
                                </div>
                            </label>
                        </div>
                    </div>

                    <div class="pt-2">
                        <label class="text-xs font-bold text-white block mb-1">Basis Standar Faktor Emisi</label>
                        <select class="w-full px-3.5 py-2.5 rounded-xl bg-white/[0.04] border border-white/15 focus:border-emeraldBrand text-white text-xs font-medium outline-none">
                            <option value="esdm" class="bg-[#0b1c15] text-white">Standar Nasional Indonesia (Kemen ESDM & KLHK RI)</option>
                            <option value="ipcc" class="bg-[#0b1c15] text-white">Standar Global (IPCC & GHG Protocol Scopes 1-3)</option>
                            <option value="uk_defra" class="bg-[#0b1c15] text-white">UK DEFRA Greenhouse Gas Reporting Standards</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- ============================================== -->
        <!-- SECTION 2: NOTIFIKASI & PENGINGAT (NOTIFICATIONS) -->
        <!-- ============================================== -->
        <div id="notifications" class="glass-card p-6 sm:p-8 space-y-6">
            <div class="flex items-center gap-3.5 pb-5 border-b border-white/[0.08]">
                <div class="w-11 h-11 rounded-xl bg-amber-500/15 border border-amber-500/30 flex items-center justify-center text-amber-400 text-lg shadow-sm">
                    <i class="fa-solid fa-bell"></i>
                </div>
                <div>
                    <h2 class="text-lg sm:text-xl font-extrabold text-white tracking-tight">Notifikasi & Pengingat Aksi Hijau</h2>
                    <p class="text-xs text-slate-400 mt-0.5">Tentukan frekuensi pengingat pencatatan emisi dan pemberitahuan penting.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Toggle 1: Pengingat Mingguan -->
                <div class="p-4 rounded-2xl bg-white/[0.03] border border-white/[0.07] flex items-center justify-between">
                    <div class="flex items-start gap-3.5">
                        <div class="w-8 h-8 rounded-xl bg-emeraldBrand/15 text-mintGlow flex items-center justify-center text-xs shrink-0 mt-0.5">
                            <i class="fa-solid fa-calendar-check"></i>
                        </div>
                        <div>
                            <span class="text-xs font-bold text-white block">Pengingat Input Emisi Mingguan</span>
                            <span class="text-[11px] text-slate-400 block mt-0.5">Kirim pengingat setiap Minggu pukul 18:00 untuk mencatat emisi transportasi & listrik.</span>
                        </div>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer shrink-0 ml-4">
                        <input type="checkbox" checked class="sr-only peer">
                        <div class="w-11 h-6 bg-white/10 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-emeraldBrand"></div>
                    </label>
                </div>

                <!-- Toggle 2: Peringatan Ambang Batas -->
                <div class="p-4 rounded-2xl bg-white/[0.03] border border-white/[0.07] flex items-center justify-between">
                    <div class="flex items-start gap-3.5">
                        <div class="w-8 h-8 rounded-xl bg-rose-500/15 text-rose-400 flex items-center justify-center text-xs shrink-0 mt-0.5">
                            <i class="fa-solid fa-triangle-exclamation"></i>
                        </div>
                        <div>
                            <span class="text-xs font-bold text-white block">Peringatan Kuota Target Emisi</span>
                            <span class="text-[11px] text-slate-400 block mt-0.5">Beritahu saya saat jejak karbon bulan ini telah melampaui 80% dari target.</span>
                        </div>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer shrink-0 ml-4">
                        <input type="checkbox" checked class="sr-only peer">
                        <div class="w-11 h-6 bg-white/10 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-emeraldBrand"></div>
                    </label>
                </div>

                <!-- Toggle 3: Notifikasi Rewards -->
                <div class="p-4 rounded-2xl bg-white/[0.03] border border-white/[0.07] flex items-center justify-between">
                    <div class="flex items-start gap-3.5">
                        <div class="w-8 h-8 rounded-xl bg-amber-500/15 text-amber-400 flex items-center justify-center text-xs shrink-0 mt-0.5">
                            <i class="fa-solid fa-gift"></i>
                        </div>
                        <div>
                            <span class="text-xs font-bold text-white block">Notifikasi Prestasi & Rewards</span>
                            <span class="text-[11px] text-slate-400 block mt-0.5">Kabar saat lencana keberlanjutan baru terbuka atau katalog hadiah baru dirilis.</span>
                        </div>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer shrink-0 ml-4">
                        <input type="checkbox" checked class="sr-only peer">
                        <div class="w-11 h-6 bg-white/10 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-emeraldBrand"></div>
                    </label>
                </div>

                <!-- Toggle 4: Monthly Digest -->
                <div class="p-4 rounded-2xl bg-white/[0.03] border border-white/[0.07] flex items-center justify-between">
                    <div class="flex items-start gap-3.5">
                        <div class="w-8 h-8 rounded-xl bg-sky-500/15 text-sky-400 flex items-center justify-center text-xs shrink-0 mt-0.5">
                            <i class="fa-solid fa-file-lines"></i>
                        </div>
                        <div>
                            <span class="text-xs font-bold text-white block">Laporan Ringkas Bulanan (Email)</span>
                            <span class="text-[11px] text-slate-400 block mt-0.5">Terima rangkuman grafik penurunan emisi dan penghematan energi setiap akhir bulan.</span>
                        </div>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer shrink-0 ml-4">
                        <input type="checkbox" class="sr-only peer">
                        <div class="w-11 h-6 bg-white/10 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-emeraldBrand"></div>
                    </label>
                </div>
            </div>
        </div>

        <!-- ============================================== -->
        <!-- SECTION 3: TAMPILAN & AKSESIBILITAS (APPEARANCE) -->
        <!-- ============================================== -->
        <div id="appearance" class="glass-card p-6 sm:p-8 space-y-6">
            <div class="flex items-center gap-3.5 pb-5 border-b border-white/[0.08]">
                <div class="w-11 h-11 rounded-xl bg-sky-500/15 border border-sky-500/30 flex items-center justify-center text-sky-400 text-lg shadow-sm">
                    <i class="fa-solid fa-palette"></i>
                </div>
                <div>
                    <h2 class="text-lg sm:text-xl font-extrabold text-white tracking-tight">Tampilan & Aksesibilitas</h2>
                    <p class="text-xs text-slate-400 mt-0.5">Sesuaikan preferensi visual dashboard dan performa animasi perangkat.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                <!-- Theme Option -->
                <div class="p-5 rounded-2xl bg-white/[0.03] border border-white/[0.08] flex flex-col justify-between">
                    <div>
                        <div class="flex items-center gap-2 mb-2">
                            <i class="fa-solid fa-moon text-mintGlow text-sm"></i>
                            <h4 class="text-xs font-bold text-white">Mode Tema Tampilan</h4>
                        </div>
                        <p class="text-[11px] text-slate-400 mb-4">Gunakan mode gelap Obsidian Emerald default untuk kenyamanan mata.</p>
                    </div>
                    <div class="flex items-center justify-between pt-3 border-t border-white/[0.08]">
                        <span class="text-xs text-mintGlow font-bold">Obsidian Emerald</span>
                        <span class="px-2 py-0.5 rounded-md bg-emeraldBrand/20 text-mintGlow text-[10px] font-bold">Aktif</span>
                    </div>
                </div>

                <!-- Ambient Glow Toggle -->
                <div class="p-5 rounded-2xl bg-white/[0.03] border border-white/[0.08] flex flex-col justify-between">
                    <div>
                        <div class="flex items-center gap-2 mb-2">
                            <i class="fa-solid fa-wand-magic-sparkles text-amber-400 text-sm"></i>
                            <h4 class="text-xs font-bold text-white">Animasi Efek Pendaran</h4>
                        </div>
                        <p class="text-[11px] text-slate-400 mb-4">Matikan jika Anda ingin menghemat daya baterai pada perangkat laptop/HP.</p>
                    </div>
                    <div class="flex items-center justify-between pt-3 border-t border-white/[0.08]">
                        <span class="text-xs text-slate-300 font-medium">Ambient Orbs</span>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" id="ambientGlowToggle" checked class="sr-only peer">
                            <div class="w-9 h-5 bg-white/10 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-emeraldBrand"></div>
                        </label>
                    </div>
                </div>

                <!-- Density Mode -->
                <div class="p-5 rounded-2xl bg-white/[0.03] border border-white/[0.08] flex flex-col justify-between">
                    <div>
                        <div class="flex items-center gap-2 mb-2">
                            <i class="fa-solid fa-table-cells-large text-purple-400 text-sm"></i>
                            <h4 class="text-xs font-bold text-white">Kepadatan Tata Letak</h4>
                        </div>
                        <p class="text-[11px] text-slate-400 mb-4">Pilih kerapatan elemen dan kartu pada dashboard utama.</p>
                    </div>
                    <div class="flex items-center justify-between pt-3 border-t border-white/[0.08]">
                        <span class="text-xs text-slate-300 font-medium">Mode Kompak</span>
                        <span class="px-2 py-0.5 rounded-md bg-white/[0.06] text-white text-[10px] font-bold">Default</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- ============================================== -->
        <!-- SECTION 4: PRIVASI & KOMUNITAS (PRIVACY) -->
        <!-- ============================================== -->
        <div id="privacy" class="glass-card p-6 sm:p-8 space-y-6">
            <div class="flex items-center gap-3.5 pb-5 border-b border-white/[0.08]">
                <div class="w-11 h-11 rounded-xl bg-purple-500/15 border border-purple-500/30 flex items-center justify-center text-purple-400 text-lg shadow-sm">
                    <i class="fa-solid fa-shield-halved"></i>
                </div>
                <div>
                    <h2 class="text-lg sm:text-xl font-extrabold text-white tracking-tight">Privasi & Papan Peringkat Komunitas</h2>
                    <p class="text-xs text-slate-400 mt-0.5">Kontrol bagaimana profil dan prestasi pengurangan emisi Anda dilihat pengguna lain.</p>
                </div>
            </div>

            <div class="space-y-4">
                <!-- Visibilitas di Leaderboard -->
                <div class="p-4 rounded-2xl bg-white/[0.03] border border-white/[0.07] flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                    <div>
                        <span class="text-xs font-bold text-white block">Visibilitas Papan Peringkat (*Leaderboard*)</span>
                        <span class="text-[11px] text-slate-400 block mt-0.5">Tentukan bagaimana nama Anda dicantumkan pada peringkat pelopor aksi iklim.</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <select class="px-3.5 py-2 rounded-xl bg-white/[0.04] border border-white/15 focus:border-emeraldBrand text-white text-xs font-medium outline-none">
                            <option value="public" class="bg-[#0b1c15]">Publik (Nama Lengkap & Poin)</option>
                            <option value="pseudonym" class="bg-[#0b1c15]">Anonim (Eco Warrior #{{ substr(md5(Auth::id()), 0, 4) }})</option>
                            <option value="private" class="bg-[#0b1c15]">Privat (Sembunyikan dari Peringkat)</option>
                        </select>
                    </div>
                </div>

                <!-- Bagikan Sertifikat Publik -->
                <div class="p-4 rounded-2xl bg-white/[0.03] border border-white/[0.07] flex items-center justify-between">
                    <div>
                        <span class="text-xs font-bold text-white block">Tautan Portofolio Net-Zero Publik</span>
                        <span class="text-[11px] text-slate-400 block mt-0.5">Izinkan link sertifikat pencapaian emisi Anda dapat diakses pihak eksternal / LinkedIn.</span>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer shrink-0 ml-4">
                        <input type="checkbox" checked class="sr-only peer">
                        <div class="w-11 h-6 bg-white/10 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-emeraldBrand"></div>
                    </label>
                </div>
            </div>
        </div>

        <!-- ============================================== -->
        <!-- SECTION 5: MANAJEMEN DATA & ZONA AKUN (DATA) -->
        <!-- ============================================== -->
        <div id="data-management" class="glass-card p-6 sm:p-8 space-y-6">
            <div class="flex items-center gap-3.5 pb-5 border-b border-white/[0.08]">
                <div class="w-11 h-11 rounded-xl bg-rose-500/15 border border-rose-500/30 flex items-center justify-center text-rose-400 text-lg shadow-sm">
                    <i class="fa-solid fa-database"></i>
                </div>
                <div>
                    <h2 class="text-lg sm:text-xl font-extrabold text-white tracking-tight">Manajemen Data & Zona Akun</h2>
                    <p class="text-xs text-slate-400 mt-0.5">Ekspor riwayat data perhitungan Anda atau kelola status keberlanjutan akun.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <!-- Ekspor Data -->
                <div class="p-5 rounded-2xl bg-white/[0.03] border border-white/[0.08] flex flex-col justify-between space-y-4">
                    <div>
                        <div class="flex items-center gap-2 mb-1">
                            <i class="fa-solid fa-file-export text-mintGlow text-sm"></i>
                            <h4 class="text-xs font-bold text-white">Ekspor Riwayat Emisi</h4>
                        </div>
                        <p class="text-[11px] text-slate-400 leading-relaxed">
                            Unduh seluruh catatan kalkulasi jejak karbon pribadi dan konsumsi energi perusahaan Anda untuk arsip atau audit ESG.
                        </p>
                    </div>

                    <div class="flex items-center gap-2.5 pt-2">
                        <button type="button" onclick="exportData('csv')" class="flex-1 py-2 px-3 rounded-xl bg-white/[0.05] hover:bg-white/[0.1] text-white border border-white/10 text-xs font-semibold flex items-center justify-center gap-1.5 transition-colors cursor-pointer">
                            <i class="fa-solid fa-file-csv text-mintGlow"></i>
                            <span>Format CSV</span>
                        </button>
                        <button type="button" onclick="exportData('pdf')" class="flex-1 py-2 px-3 rounded-xl bg-white/[0.05] hover:bg-white/[0.1] text-white border border-white/10 text-xs font-semibold flex items-center justify-center gap-1.5 transition-colors cursor-pointer">
                            <i class="fa-solid fa-file-pdf text-rose-400"></i>
                            <span>Laporan PDF</span>
                        </button>
                    </div>
                </div>

                <!-- Danger Zone -->
                <div class="p-5 rounded-2xl bg-rose-950/20 border border-rose-500/25 flex flex-col justify-between space-y-4">
                    <div>
                        <div class="flex items-center gap-2 mb-1">
                            <i class="fa-solid fa-skull-crossbones text-rose-400 text-sm"></i>
                            <h4 class="text-xs font-bold text-rose-300">Zona Bahaya Akun</h4>
                        </div>
                        <p class="text-[11px] text-slate-400 leading-relaxed">
                            Tindakan di bawah ini bersifat permanen. Seluruh pencapaian dan poin reward Anda tidak dapat dipulihkan kembali.
                        </p>
                    </div>

                    <div class="pt-2">
                        <button type="button" onclick="confirmDeleteAccount()" class="w-full py-2 px-4 rounded-xl bg-rose-500/15 hover:bg-rose-500/25 border border-rose-500/40 text-rose-300 text-xs font-bold transition-colors cursor-pointer flex items-center justify-center gap-2">
                            <i class="fa-solid fa-trash-can text-xs"></i>
                            <span>Hapus Akun Permanen</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

<!-- Interactive Toast Feedback -->
<div id="settingsToast" class="fixed bottom-6 right-6 z-50 transform translate-y-20 opacity-0 transition-all duration-300 pointer-events-none">
    <div class="glass-card px-5 py-3.5 border-emeraldBrand/40 shadow-2xl shadow-emeraldBrand/20 flex items-center gap-3 bg-[#071610]/95">
        <div class="w-7 h-7 rounded-full bg-emeraldBrand/20 text-mintGlow flex items-center justify-center text-xs shrink-0">
            <i class="fa-solid fa-check"></i>
        </div>
        <div>
            <p class="text-xs font-bold text-white" id="toastTitle">Pengaturan Tersimpan</p>
            <p class="text-[11px] text-slate-400" id="toastMsg">Seluruh preferensi platform berhasil diperbarui.</p>
        </div>
    </div>
</div>

@section('scripts')
<script>
    // 1. Carbon Budget Slider Live Display
    const slider = document.getElementById('carbonBudgetSlider');
    const display = document.getElementById('budgetValueDisplay');
    if (slider && display) {
        slider.addEventListener('input', (e) => {
            display.textContent = e.target.value + ' kg CO₂e';
        });
    }

    // 2. Ambient Glow Toggle (Actually toggles the background glow orbs in layout!)
    const glowToggle = document.getElementById('ambientGlowToggle');
    if (glowToggle) {
        // Restore saved preference
        if (localStorage.getItem('kahejo_disable_glow') === 'true') {
            glowToggle.checked = false;
            document.querySelectorAll('.ambient-glow-1, .ambient-glow-2').forEach(el => el.style.display = 'none');
        }

        glowToggle.addEventListener('change', (e) => {
            if (e.target.checked) {
                document.querySelectorAll('.ambient-glow-1, .ambient-glow-2').forEach(el => el.style.display = 'block');
                localStorage.setItem('kahejo_disable_glow', 'false');
            } else {
                document.querySelectorAll('.ambient-glow-1, .ambient-glow-2').forEach(el => el.style.display = 'none');
                localStorage.setItem('kahejo_disable_glow', 'true');
            }
        });
    }

    // 3. Save Settings Toast Feedback
    const saveBtn = document.getElementById('saveAllSettingsBtn');
    const toast = document.getElementById('settingsToast');
    if (saveBtn && toast) {
        saveBtn.addEventListener('click', () => {
            toast.classList.remove('translate-y-20', 'opacity-0', 'pointer-events-none');
            toast.classList.add('translate-y-0', 'opacity-100');

            setTimeout(() => {
                toast.classList.remove('translate-y-0', 'opacity-100');
                toast.classList.add('translate-y-20', 'opacity-0', 'pointer-events-none');
            }, 3000);
        });
    }

    // 4. Export Data Handler
    function exportData(type) {
        const title = document.getElementById('toastTitle');
        const msg = document.getElementById('toastMsg');
        if (title && msg) {
            title.textContent = 'Menyiapkan Ekspor Data';
            msg.textContent = `Riwayat emisi sedang diproses dalam format ${type.toUpperCase()}...`;
        }
        if (toast) {
            toast.classList.remove('translate-y-20', 'opacity-0', 'pointer-events-none');
            toast.classList.add('translate-y-0', 'opacity-100');
            setTimeout(() => {
                toast.classList.remove('translate-y-0', 'opacity-100');
                toast.classList.add('translate-y-20', 'opacity-0', 'pointer-events-none');
                // Reset title
                title.textContent = 'Pengaturan Tersimpan';
                msg.textContent = 'Seluruh preferensi platform berhasil diperbarui.';
            }, 3000);
        }
    }

    // 5. Delete Account Confirmation Prompt
    function confirmDeleteAccount() {
        if (confirm('PERINGATAN: Apakah Anda yakin ingin menghapus akun ini secara permanen? Seluruh riwayat perhitungan emisi dan poin reward Anda akan dihapus.')) {
            alert('Permintaan penghapusan akun telah dicatat. Administrator akan memproses penutupan data.');
        }
    }
</script>
@endsection
@endsection
