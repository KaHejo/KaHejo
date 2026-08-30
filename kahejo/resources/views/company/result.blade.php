@extends('layouts.app')

@section('title', 'Hasil Perhitungan Konsumsi Energi')

@section('styles')
<style>
    /* ============================================== */
    /* DEDICATED PRINT STYLESHEET (CLEAN FORMAL A4)  */
    /* ============================================== */
    @media print {
        #appSidebar,
        #sidebarBackdrop,
        #appTopBar,
        .ambient-glow-1,
        .ambient-glow-2,
        .ambient-grid,
        nav,
        header,
        footer,
        .screen-only,
        .print\:hidden {
            display: none !important;
        }

        @page {
            size: A4 portrait;
            margin: 10mm 14mm 10mm 14mm;
        }

        html, body {
            background: #ffffff !important;
            background-color: #ffffff !important;
            color: #0f172a !important;
            font-family: 'Plus Jakarta Sans', sans-serif !important;
            padding: 0 !important;
            margin: 0 !important;
            width: 100% !important;
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;
        }

        #mainContent {
            margin: 0 !important;
            padding: 0 !important;
            min-height: auto !important;
            width: 100% !important;
            background: #ffffff !important;
        }

        .print-certificate {
            display: block !important;
            width: 100% !important;
            background: #ffffff !important;
            color: #0f172a !important;
        }
    }

    @media screen {
        .print-certificate {
            display: none !important;
        }
    }
</style>
@endsection

@section('content')

<!-- ============================================== -->
<!-- 1. SCREEN VIEW (OBSIDIAN EMERALD GLASS THEME)  -->
<!-- ============================================== -->
<div class="screen-only max-w-4xl mx-auto py-8 px-4 sm:px-6 lg:px-8 space-y-8">

    <!-- Success Feedback Alert -->
    <div class="glass-card p-4 border-emeraldBrand/40 bg-[#071610]/90 flex items-center justify-between gap-4">
        <div class="flex items-center gap-3">
            <div class="w-9 h-9 rounded-xl bg-emeraldBrand/20 text-mintGlow flex items-center justify-center text-sm shadow-sm shrink-0">
                <i class="fa-solid fa-circle-check"></i>
            </div>
            <div>
                <h4 class="text-xs font-bold text-white">Perhitungan Emisi Karbon Selesai & Berhasil Dicatat</h4>
                <p class="text-[11px] text-slate-400">Data telah dikonversi ke satuan emisi karbon resmi (kg CO₂e) dan masuk ke inventarisasi ESG.</p>
            </div>
        </div>

        <a href="{{ route('company.history') }}" class="px-3.5 py-1.5 rounded-lg bg-white/[0.05] hover:bg-white/[0.1] text-mintGlow text-xs font-semibold border border-white/10 transition-colors shrink-0">
            Lihat di Log Riwayat
        </a>
    </div>

    <!-- Achievement Toast if any -->
    @if(session('achievement'))
    <div class="glass-card p-4 border-amber-500/40 bg-amber-950/20 flex items-center gap-3">
        <div class="w-9 h-9 rounded-xl bg-amber-500/20 text-amber-400 flex items-center justify-center text-sm shadow-sm shrink-0">
            <i class="fa-solid fa-trophy"></i>
        </div>
        <div>
            <h4 class="text-xs font-bold text-amber-300">Prestasi Baru Terbuka!</h4>
            <p class="text-[11px] text-slate-300">{{ session('achievement') }}</p>
        </div>
    </div>
    @endif

    <!-- Main Result Inspection Card -->
    <div class="glass-card p-6 sm:p-8 relative overflow-hidden">
        <div class="absolute -right-20 -top-20 w-72 h-72 bg-emeraldBrand/15 rounded-full blur-3xl pointer-events-none"></div>

        <!-- Card Header -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-6 mb-6 border-b border-white/[0.08]">
            <div class="flex items-center gap-3.5">
                <div class="w-12 h-12 rounded-2xl bg-emeraldBrand/15 border border-emeraldBrand/30 flex items-center justify-center text-mintGlow text-xl shadow-sm">
                    <i class="fa-solid fa-chart-pie"></i>
                </div>
                <div>
                    <span class="text-[10px] uppercase font-bold text-mintGlow tracking-wider block">Hasil Perhitungan Emisi Operasional</span>
                    <h1 class="text-xl sm:text-2xl font-extrabold text-white tracking-tight">
                        Ringkasan Jejak Emisi Karbon
                    </h1>
                </div>
            </div>

            <!-- Timestamp Badge -->
            <div class="text-left sm:text-right">
                <span class="text-[10px] text-slate-400 block uppercase font-semibold">Waktu Perhitungan</span>
                <span class="text-xs font-mono font-bold text-slate-200">
                    {{ $result['calculation_date'] ?? now()->format('d M Y, H:i') }}
                </span>
            </div>
        </div>

        <!-- Big Highlight Banner: CALCULATED CARBON EMISSION -->
        @php
            $source = strtolower($result['source_type']);
            $isScope2 = $result['is_scope_2'] ?? ($source == 'electricity');
            $carbonKg = $result['carbon_emission_kg'] ?? 0;
            $carbonTon = $result['carbon_emission_ton'] ?? ($carbonKg / 1000);
        @endphp
        <div class="p-6 sm:p-7 rounded-2xl bg-gradient-to-r from-emerald-950/50 via-[#0a271b]/70 to-emerald-950/50 border border-emeraldBrand/30 mb-6 flex flex-col md:flex-row items-center justify-between gap-6">
            <div class="flex items-center gap-5">
                <div class="w-16 h-16 rounded-2xl bg-emeraldBrand/25 border border-emeraldBrand/40 flex items-center justify-center text-mintGlow text-2xl shadow-lg shrink-0">
                    <i class="fa-solid fa-cloud-arrow-up"></i>
                </div>
                <div>
                    <span class="text-xs font-bold text-mintGlow uppercase tracking-wider block">Total Jejak Emisi Dihasilkan</span>
                    <div class="text-3xl sm:text-4xl font-black text-white tracking-tight mt-0.5">
                        {{ number_format($carbonKg, 2, ',', '.') }}
                        <span class="text-xl sm:text-2xl font-bold text-mintGlow">kg CO₂e</span>
                    </div>
                    <span class="text-xs text-slate-400 font-medium block mt-1">
                        Setara <strong class="text-white">{{ number_format($carbonTon, 3, ',', '.') }}</strong> Metrik Ton CO₂e
                    </span>
                </div>
            </div>

            <div class="flex flex-col sm:flex-row md:flex-col items-end gap-2 w-full md:w-auto">
                <span class="px-4 py-2 rounded-xl text-xs font-bold border flex items-center gap-2
                    {{ $isScope2 ? 'bg-emeraldBrand/15 text-mintGlow border-emeraldBrand/35' : 'bg-amber-500/15 text-amber-300 border-amber-500/35' }}">
                    <i class="fa-solid fa-shield-halved text-xs"></i>
                    <span>{{ $result['scope_classification'] ?? ($isScope2 ? 'Scope 2' : 'Scope 1') }}</span>
                </span>
                <span class="text-[11px] text-slate-400 font-mono">
                    Faktor: {{ number_format($result['emission_factor'] ?? 1, 2) }} kg CO₂e / {{ $result['unit_measurement'] }}
                </span>
            </div>
        </div>

        <!-- Calculation Formula Breakdown Strip -->
        <div class="p-3.5 rounded-xl bg-white/[0.03] border border-white/[0.07] mb-8 flex flex-col sm:flex-row sm:items-center justify-between text-xs text-slate-300 gap-2">
            <div class="flex items-center gap-2 font-mono">
                <i class="fa-solid fa-calculator text-mintGlow text-xs"></i>
                <span>Formula:</span>
                <strong class="text-white">{{ number_format($result['consumption_amount'], 2, ',', '.') }} {{ $result['unit_measurement'] }}</strong>
                <span>×</span>
                <strong class="text-white">{{ number_format($result['emission_factor'] ?? 1, 2) }}</strong>
                <span>=</span>
                <span class="font-bold text-mintGlow">{{ number_format($carbonKg, 2, ',', '.') }} kg CO₂e</span>
            </div>
            <span class="text-[11px] text-slate-400">Standar Kementerian ESDM & IPCC</span>
        </div>

        <!-- 3 Environmental Impact Equivalence Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-8">
            <!-- Trees Needed -->
            <div class="p-4 rounded-xl bg-white/[0.02] border border-white/[0.06] flex items-center gap-3.5">
                <div class="w-11 h-11 rounded-xl bg-emeraldBrand/15 text-mintGlow flex items-center justify-center text-lg shrink-0">
                    <i class="fa-solid fa-tree"></i>
                </div>
                <div>
                    <span class="text-[10px] uppercase font-bold text-slate-400 block tracking-wider">Pohon Penyeimbang</span>
                    <span class="text-base font-extrabold text-white block mt-0.5">
                        {{ $result['trees_needed'] ?? 1 }} Pohon
                    </span>
                    <span class="text-[10px] text-slate-400 block">Dibutuhkan selama 1 tahun</span>
                </div>
            </div>

            <!-- Car KM Equivalent -->
            <div class="p-4 rounded-xl bg-white/[0.02] border border-white/[0.06] flex items-center gap-3.5">
                <div class="w-11 h-11 rounded-xl bg-amber-500/15 text-amber-300 flex items-center justify-center text-lg shrink-0">
                    <i class="fa-solid fa-car"></i>
                </div>
                <div>
                    <span class="text-[10px] uppercase font-bold text-slate-400 block tracking-wider">Setara Kendaraan</span>
                    <span class="text-base font-extrabold text-white block mt-0.5">
                        {{ number_format($result['car_km_equivalent'] ?? 0, 0, ',', '.') }} km
                    </span>
                    <span class="text-[10px] text-slate-400 block">Perjalanan mobil bensin</span>
                </div>
            </div>

            <!-- Total Primary Energy -->
            <div class="p-4 rounded-xl bg-white/[0.02] border border-white/[0.06] flex items-center gap-3.5">
                <div class="w-11 h-11 rounded-xl bg-sky-500/15 text-sky-400 flex items-center justify-center text-lg shrink-0">
                    <i class="fa-solid fa-bolt-lightning"></i>
                </div>
                <div>
                    <span class="text-[10px] uppercase font-bold text-slate-400 block tracking-wider">Energi Primer</span>
                    <span class="text-base font-extrabold text-white block mt-0.5">
                        {{ number_format($result['energy_mj'] ?? 0, 1, ',', '.') }} MJ
                    </span>
                    <span class="text-[10px] text-slate-400 block">{{ number_format($result['energy_gj'] ?? 0, 2, ',', '.') }} GigaJoule</span>
                </div>
            </div>
        </div>

        <!-- Detailed Operational Parameters Grid -->
        <h3 class="text-xs font-bold text-slate-300 uppercase tracking-wider mb-3">Rincian Data Input Operasional</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs mb-8">
            <div class="p-4 rounded-xl bg-white/[0.02] border border-white/[0.06]">
                <span class="text-slate-400 block text-[11px] mb-1">Volume Penggunaan (Input):</span>
                <span class="font-bold text-white text-sm">
                    {{ number_format($result['consumption_amount'], 2, ',', '.') }} {{ $result['unit_measurement'] }}
                </span>
                <span class="text-[11px] text-slate-400 capitalize block mt-0.5">({{ $result['source_type'] }})</span>
            </div>

            <div class="p-4 rounded-xl bg-white/[0.02] border border-white/[0.06]">
                <span class="text-slate-400 block text-[11px] mb-1">Kategori Aktivitas Operasional:</span>
                <span class="font-bold text-white text-sm capitalize">{{ $result['activity_type'] }}</span>
            </div>

            <div class="p-4 rounded-xl bg-white/[0.02] border border-white/[0.06]">
                <span class="text-slate-400 block text-[11px] mb-1">Lokasi / Fasilitas:</span>
                <span class="font-bold text-white text-sm">{{ $result['location_name'] ?? 'Fasilitas Utama' }}</span>
            </div>

            <div class="p-4 rounded-xl bg-white/[0.02] border border-white/[0.06]">
                <span class="text-slate-400 block text-[11px] mb-1">Bulan Periode Konsumsi:</span>
                <span class="font-bold text-white text-sm">{{ $result['consumption_date'] }} ({{ ucfirst($result['reporting_period']) }})</span>
            </div>
        </div>

        <!-- Action Footer -->
        <div class="pt-6 border-t border-white/[0.08] flex flex-col sm:flex-row items-center justify-between gap-4">
            <a href="{{ route('company.history') }}" 
               class="px-5 py-2.5 rounded-xl bg-white/[0.04] hover:bg-white/[0.08] text-slate-300 hover:text-white border border-white/10 text-xs font-semibold flex items-center gap-2 transition-colors">
                <i class="fa-solid fa-arrow-left text-xs"></i>
                <span>Kembali ke Riwayat</span>
            </a>

            <div class="flex items-center gap-3 w-full sm:w-auto">
                <button type="button" onclick="window.print()" 
                        class="flex-1 sm:flex-none px-6 py-2.5 rounded-xl bg-gradient-to-r from-emeraldBrand to-emeraldDark hover:from-[#18c58f] hover:to-emeraldDark text-white text-xs font-bold shadow-lg shadow-emeraldBrand/25 transition-all duration-200 flex items-center justify-center gap-2 cursor-pointer">
                    <i class="fa-solid fa-print text-xs"></i>
                    <span>Cetak PDF Laporan</span>
                </button>
                <a href="{{ route('company') }}" 
                   class="flex-1 sm:flex-none px-5 py-2.5 rounded-xl bg-white/[0.06] hover:bg-white/[0.12] text-white border border-white/15 text-xs font-bold transition-colors flex items-center justify-center gap-2">
                    <i class="fa-solid fa-plus text-xs"></i>
                    <span>Catat Baru</span>
                </a>
            </div>
        </div>

    </div>

</div>

<!-- ============================================== -->
<!-- 2. OFFICIAL PRINT CERTIFICATE / ESG REPORT     -->
<!-- (Rendered exclusively when printing to PDF/A4) -->
<!-- ============================================== -->
<div class="print-certificate">
    <div style="font-family: 'Plus Jakarta Sans', sans-serif; color: #0f172a; line-height: 1.4; padding: 5px 0;">
        
        <!-- Document Header / Kop Surat -->
        <div style="display: flex; justify-content: space-between; align-items: flex-start; border-bottom: 2.5px solid #059669; padding-bottom: 14px; margin-bottom: 20px;">
            <div style="display: flex; align-items: center; gap: 14px;">
                <img src="{{ asset('images/logo.svg') }}" alt="KaHejo Logo" style="width: 44px; height: 44px; object-contain: contain;">
                <div>
                    <h2 style="font-size: 22px; font-weight: 800; color: #064e3b; margin: 0; letter-spacing: -0.5px;">KaHejo Climate Platform</h2>
                    <p style="font-size: 11px; color: #059669; font-weight: 700; text-transform: uppercase; margin: 2px 0 0 0; letter-spacing: 0.8px;">
                        Enterprise Greenhouse Gas (GHG) Accounting & Verification
                    </p>
                </div>
            </div>

            <div style="text-align: right; font-size: 11px; color: #475569;">
                <p style="margin: 0; font-weight: 700; color: #0f172a;">No. Dokumen: <span style="font-family: monospace; color: #059669;">KHJ-ENG-{{ sprintf('%06d', $consumption->id ?? 1) }}</span></p>
                <p style="margin: 3px 0 0 0;">Tanggal Terbit: <strong>{{ now()->format('d F Y, H:i') }} WIB</strong></p>
                <p style="margin: 3px 0 0 0;">Status: <strong style="color: #059669;">VERIFIKASI RESMI TERHITUNG</strong></p>
            </div>
        </div>

        <!-- Document Title Banner -->
        <div style="text-align: center; margin-bottom: 22px;">
            <h1 style="font-size: 17px; font-weight: 800; text-transform: uppercase; color: #0f172a; margin: 0; letter-spacing: 0.5px;">
                BUKTI HASIL PERHITUNGAN EMISI KONSUMSI ENERGI
            </h1>
            <p style="font-size: 12px; color: #64748b; margin: 4px 0 0 0; font-weight: 500;">
                Inventarisasi Emisi Gas Rumah Kaca (GRK) Berdasarkan Protokol GHG Scope 1 & Scope 2
            </p>
        </div>

        <!-- Entity & Facility Details (2 Columns) -->
        <div style="display: flex; gap: 16px; margin-bottom: 20px;">
            <div style="flex: 1; border: 1px solid #cbd5e1; border-radius: 8px; padding: 12px 14px; background-color: #f8fafc;">
                <h4 style="font-size: 10.5px; font-weight: 800; text-transform: uppercase; color: #059669; margin: 0 0 6px 0; letter-spacing: 0.5px;">
                    Informasi Entitas Pelapor
                </h4>
                <table style="width: 100%; font-size: 11.5px; border-collapse: collapse;">
                    <tr>
                        <td style="color: #64748b; padding: 2px 0; width: 40%;">Nama Pengguna:</td>
                        <td style="font-weight: 700; color: #0f172a; padding: 2px 0;">{{ Auth::user()->name }}</td>
                    </tr>
                    <tr>
                        <td style="color: #64748b; padding: 2px 0;">Alamat Email:</td>
                        <td style="font-weight: 600; color: #0f172a; padding: 2px 0;">{{ Auth::user()->email }}</td>
                    </tr>
                    <tr>
                        <td style="color: #64748b; padding: 2px 0;">Perusahaan:</td>
                        <td style="font-weight: 600; color: #0f172a; padding: 2px 0;">{{ Auth::user()->company ?? 'Umum / Mandiri' }}</td>
                    </tr>
                </table>
            </div>

            <div style="flex: 1; border: 1px solid #cbd5e1; border-radius: 8px; padding: 12px 14px; background-color: #f8fafc;">
                <h4 style="font-size: 10.5px; font-weight: 800; text-transform: uppercase; color: #059669; margin: 0 0 6px 0; letter-spacing: 0.5px;">
                    Rincian Fasilitas & Waktu
                </h4>
                <table style="width: 100%; font-size: 11.5px; border-collapse: collapse;">
                    <tr>
                        <td style="color: #64748b; padding: 2px 0; width: 45%;">Lokasi / Fasilitas:</td>
                        <td style="font-weight: 700; color: #0f172a; padding: 2px 0;">{{ $result['location_name'] ?? 'Fasilitas Operasional Utama' }}</td>
                    </tr>
                    <tr>
                        <td style="color: #64748b; padding: 2px 0;">Bulan Periode:</td>
                        <td style="font-weight: 600; color: #0f172a; padding: 2px 0;">{{ \Carbon\Carbon::parse($result['consumption_date'])->format('F Y') }}</td>
                    </tr>
                    <tr>
                        <td style="color: #64748b; padding: 2px 0;">Siklus Laporan:</td>
                        <td style="font-weight: 600; color: #0f172a; padding: 2px 0;">Laporan {{ ucfirst($result['reporting_period']) }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <!-- Calculated Emission Results Table -->
        <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px; font-size: 11.5px;">
            <thead>
                <tr style="background-color: #064e3b; color: #ffffff;">
                    <th style="padding: 9px 12px; text-align: left; font-weight: 700; border-top-left-radius: 6px; width: 35%;">Parameter Penilaian</th>
                    <th style="padding: 9px 12px; text-align: left; font-weight: 700;">Formula & Rincian Emisi</th>
                    <th style="padding: 9px 12px; text-align: right; font-weight: 700; border-top-right-radius: 6px; width: 28%;">Hasil Terhitung</th>
                </tr>
            </thead>
            <tbody>
                <tr style="border-bottom: 1px solid #e2e8f0;">
                    <td style="padding: 8px 12px; font-weight: 700; color: #334155;">Volume Penggunaan (Input)</td>
                    <td style="padding: 8px 12px; color: #0f172a; font-weight: 600; text-transform: capitalize;">
                        {{ $result['source_type'] }} — {{ ucfirst($result['activity_type']) }}
                    </td>
                    <td style="padding: 8px 12px; text-align: right; font-weight: 800; color: #0f172a;">
                        {{ number_format($result['consumption_amount'], 2, ',', '.') }} {{ $result['unit_measurement'] }}
                    </td>
                </tr>
                <tr style="border-bottom: 1px solid #e2e8f0; background-color: #f8fafc;">
                    <td style="padding: 8px 12px; font-weight: 700; color: #334155;">Faktor Emisi Karbon (EF)</td>
                    <td style="padding: 8px 12px; color: #475569;">
                        Standar Nasional ESDM & IPCC GHG Protocol
                    </td>
                    <td style="padding: 8px 12px; text-align: right; font-weight: 700; color: #059669;">
                        {{ number_format($result['emission_factor'] ?? 1, 4) }} kg CO₂e / {{ $result['unit_measurement'] }}
                    </td>
                </tr>
                <tr style="border-bottom: 2px solid #059669; background-color: #ecfdf5;">
                    <td style="padding: 12px; font-weight: 800; color: #064e3b; font-size: 12.5px;">
                        TOTAL JEJAK EMISI KARBON
                    </td>
                    <td style="padding: 12px; font-weight: 700; color: #064e3b;">
                        {{ number_format($result['consumption_amount'], 2, ',', '.') }} × {{ number_format($result['emission_factor'] ?? 1, 2) }}
                    </td>
                    <td style="padding: 12px; text-align: right; font-weight: 900; color: #064e3b; font-size: 14px;">
                        {{ number_format($carbonKg, 2, ',', '.') }} kg CO₂e
                        <span style="display: block; font-size: 10.5px; font-weight: 600; color: #059669;">
                            ({{ number_format($carbonTon, 3, ',', '.') }} Ton CO₂e)
                        </span>
                    </td>
                </tr>
                <tr style="border-bottom: 1px solid #e2e8f0;">
                    <td style="padding: 8px 12px; font-weight: 700; color: #334155;">Energi Primer Terkonsumsi</td>
                    <td style="padding: 8px 12px; color: #475569;">
                        Konversi Nilai Kalor Bahan
                    </td>
                    <td style="padding: 8px 12px; text-align: right; font-weight: 700; color: #0f172a;">
                        {{ number_format($result['energy_mj'] ?? 0, 1, ',', '.') }} MJ ({{ number_format($result['energy_gj'] ?? 0, 2, ',', '.') }} GJ)
                    </td>
                </tr>
                <tr style="border-bottom: 1px solid #e2e8f0; background-color: #f8fafc;">
                    <td style="padding: 8px 12px; font-weight: 700; color: #334155;">Ekivalensi Pohon Penyeimbang</td>
                    <td style="padding: 8px 12px; color: #475569;">
                        Dibutuhkan untuk menyerap emisi (21.77 kg/th)
                    </td>
                    <td style="padding: 8px 12px; text-align: right; font-weight: 800; color: #166534;">
                        {{ $result['trees_needed'] ?? 1 }} Pohon Dewasa / Tahun
                    </td>
                </tr>
                <tr style="border-bottom: 1px solid #e2e8f0;">
                    <td style="padding: 8px 12px; font-weight: 700; color: #334155;">Klasifikasi Protokol GHG</td>
                    <td style="padding: 8px 12px; color: #0f172a; font-weight: 600;">
                        {{ $result['scope_classification'] ?? 'Scope 1' }}
                    </td>
                    <td style="padding: 8px 12px; text-align: right; font-weight: 700; color: #059669;">
                        Tervalidasi
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- Decarbonization Recommendations Box -->
        <div style="border: 1.5px solid #a7f3d0; background-color: #f0fdf4; border-radius: 8px; padding: 10px 14px; margin-bottom: 22px;">
            <h4 style="font-size: 10.5px; font-weight: 800; text-transform: uppercase; color: #065f46; margin: 0 0 3px 0;">
                Catatan & Rekomendasi Dekarbonisasi (ESG Guidance):
            </h4>
            <p style="font-size: 11px; color: #166534; margin: 0; line-height: 1.45;">
                Hasil perhitungan dihitung menggunakan formula resmi inventarisasi GRK. Untuk menekan emisi karbon operasional, lakukan efisiensi rute armada dan pertimbangkan transisi armada listrik atau sertifikat energi terbarukan (REC).
            </p>
        </div>

        <!-- Verification Sign-off & Digital Stamp Section -->
        <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-top: 24px; padding-top: 10px;">
            <!-- Left: Digital Seal Stamp -->
            <div style="display: flex; align-items: center; gap: 12px;">
                <div style="width: 74px; height: 74px; border: 2px dashed #059669; border-radius: 50%; display: flex; flex-direction: column; align-items: center; justify-content: center; text-align: center; color: #059669; font-size: 7.5px; font-weight: 900; line-height: 1.1; padding: 4px;">
                    <span>★ KAHEJO ★</span>
                    <span style="font-size: 8.5px; font-weight: 900; margin: 2px 0;">CLIMATE</span>
                    <span>VERIFIED</span>
                </div>
                <div style="font-size: 10px; color: #64748b;">
                    <p style="margin: 0; font-weight: 700; color: #0f172a;">Verifikasi Perhitungan KaHejo</p>
                    <p style="margin: 2px 0 0 0;">Formula & Faktor Emisi Terkalibrasi</p>
                    <p style="margin: 2px 0 0 0; font-family: monospace; color: #059669;">CALC-ID: {{ strtoupper(md5(($consumption->id ?? 1) . $carbonKg)) }}</p>
                </div>
            </div>

            <!-- Right: Signature Authority -->
            <div style="text-align: center; width: 220px;">
                <p style="font-size: 10.5px; color: #64748b; margin: 0 0 35px 0;">Diterbitkan secara digital oleh:</p>
                <div style="font-size: 11.5px; font-weight: 800; color: #0f172a; border-top: 1px solid #0f172a; padding-top: 5px;">
                    KaHejo Climate Verification
                </div>
                <p style="font-size: 9.5px; color: #64748b; margin: 2px 0 0 0;">Sustainability Accounting Unit</p>
            </div>
        </div>

        <!-- Footnote / Legal Disclaimer -->
        <div style="margin-top: 24px; border-top: 1px solid #e2e8f0; padding-top: 8px; text-align: center; font-size: 9px; color: #94a3b8;">
            Dokumen ini sah sebagai bukti perhitungan emisi karbon internal & pelaporan ESG perusahaan tanpa memerlukan tanda tangan basah.
            Dicetak secara resmi melalui platform KaHejo (<span style="color: #059669;">https://kahejo.id</span>).
        </div>

    </div>
</div>

@endsection