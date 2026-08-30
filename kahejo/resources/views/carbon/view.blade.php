@extends('layouts.app')

@section('title', 'Detail Jejak Karbon')

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

    <!-- Main Detail Card -->
    <div class="glass-card p-6 sm:p-8 relative overflow-hidden">
        <div class="absolute -right-20 -top-20 w-72 h-72 bg-emeraldBrand/15 rounded-full blur-3xl pointer-events-none"></div>

        <!-- Header -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-6 mb-6 border-b border-white/[0.08]">
            <div class="flex items-center gap-3.5">
                <div class="w-12 h-12 rounded-2xl bg-emeraldBrand/15 border border-emeraldBrand/30 flex items-center justify-center text-mintGlow text-xl shadow-sm">
                    <i class="fa-solid fa-file-lines"></i>
                </div>
                <div>
                    <span class="text-[10px] uppercase font-bold text-mintGlow tracking-wider block">Catatan Riwayat Karbon</span>
                    <h1 class="text-xl sm:text-2xl font-extrabold text-white tracking-tight">
                        Detail Jejak Karbon Periode {{ \Carbon\Carbon::parse($carbon->month)->format('F Y') }}
                    </h1>
                </div>
            </div>

            <!-- Timestamp Badge -->
            <div class="text-left sm:text-right">
                <span class="text-[10px] text-slate-400 block uppercase font-semibold">Waktu Kalkulasi</span>
                <span class="text-xs font-mono font-bold text-slate-200">
                    {{ $carbon->created_at->format('d M Y, H:i') }}
                </span>
            </div>
        </div>

        <!-- Big Highlight Banner -->
        @php
            $totalKg = $carbon->total;
            $totalTon = $totalKg / 1000;
            $trees = max(1, round($totalKg / 21.77));
        @endphp
        <div class="p-6 sm:p-7 rounded-2xl bg-gradient-to-r from-emerald-950/50 via-[#0a271b]/70 to-emerald-950/50 border border-emeraldBrand/30 mb-8 flex flex-col md:flex-row items-center justify-between gap-6">
            <div class="flex items-center gap-5">
                <div class="w-16 h-16 rounded-2xl bg-emeraldBrand/25 border border-emeraldBrand/40 flex items-center justify-center text-mintGlow text-3xl shadow-lg shrink-0">
                    <i class="fa-solid fa-cloud-arrow-up"></i>
                </div>
                <div>
                    <span class="text-xs font-bold text-mintGlow uppercase tracking-wider block">Total Jejak Emisi Karbon</span>
                    <div class="text-3xl sm:text-4xl font-black text-white tracking-tight mt-0.5">
                        {{ number_format($totalKg, 2, ',', '.') }}
                        <span class="text-xl sm:text-2xl font-bold text-mintGlow">kg CO₂e</span>
                    </div>
                    <span class="text-xs text-slate-400 font-medium block mt-1">
                        Setara <strong class="text-white">{{ number_format($totalTon, 3, ',', '.') }}</strong> Metrik Ton CO₂e
                    </span>
                </div>
            </div>

            <div class="p-4 rounded-xl bg-white/[0.04] border border-white/10 flex items-center gap-3.5 w-full md:w-auto">
                <div class="w-10 h-10 rounded-xl bg-emeraldBrand/20 text-mintGlow flex items-center justify-center text-base shrink-0">
                    <i class="fa-solid fa-tree"></i>
                </div>
                <div>
                    <span class="text-[10px] uppercase font-bold text-slate-400 block tracking-wider">Pohon Penyeimbang</span>
                    <span class="text-sm font-extrabold text-white block mt-0.5">
                        Butuh {{ $trees }} Pohon Dewasa
                    </span>
                    <span class="text-[10px] text-slate-400 block">Selama 1 tahun untuk menyerap</span>
                </div>
            </div>
        </div>

        <!-- 4 Detailed Breakdown Cards -->
        <h3 class="text-xs font-bold text-slate-300 uppercase tracking-wider mb-3">Distribusi Emisi per Kategori</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
            <!-- Electricity -->
            <div class="p-4 rounded-xl bg-white/[0.02] border border-white/[0.06] flex items-center gap-3.5">
                <div class="w-10 h-10 rounded-xl bg-amber-500/15 text-amber-400 flex items-center justify-center text-base shrink-0">
                    <i class="fa-solid fa-bolt"></i>
                </div>
                <div>
                    <span class="text-[10px] uppercase font-bold text-slate-400 block tracking-wider">Listrik</span>
                    <span class="text-base font-extrabold text-white block mt-0.5">
                        {{ number_format($carbon->electricity, 2, ',', '.') }} kg
                    </span>
                    <span class="text-[10px] text-amber-400/90 font-semibold block">
                        {{ $totalKg > 0 ? number_format(($carbon->electricity / $totalKg) * 100, 1) : 0 }}% dari total
                    </span>
                </div>
            </div>

            <!-- Transportation -->
            <div class="p-4 rounded-xl bg-white/[0.02] border border-white/[0.06] flex items-center gap-3.5">
                <div class="w-10 h-10 rounded-xl bg-rose-500/15 text-rose-400 flex items-center justify-center text-base shrink-0">
                    <i class="fa-solid fa-car"></i>
                </div>
                <div>
                    <span class="text-[10px] uppercase font-bold text-slate-400 block tracking-wider">Transportasi</span>
                    <span class="text-base font-extrabold text-white block mt-0.5">
                        {{ number_format($carbon->transportation, 2, ',', '.') }} kg
                    </span>
                    <span class="text-[10px] text-rose-400/90 font-semibold block">
                        {{ $totalKg > 0 ? number_format(($carbon->transportation / $totalKg) * 100, 1) : 0 }}% dari total
                    </span>
                </div>
            </div>

            <!-- Waste -->
            <div class="p-4 rounded-xl bg-white/[0.02] border border-white/[0.06] flex items-center gap-3.5">
                <div class="w-10 h-10 rounded-xl bg-emeraldBrand/15 text-mintGlow flex items-center justify-center text-base shrink-0">
                    <i class="fa-solid fa-trash-can"></i>
                </div>
                <div>
                    <span class="text-[10px] uppercase font-bold text-slate-400 block tracking-wider">Limbah Padat</span>
                    <span class="text-base font-extrabold text-white block mt-0.5">
                        {{ number_format($carbon->waste, 2, ',', '.') }} kg
                    </span>
                    <span class="text-[10px] text-mintGlow font-semibold block">
                        {{ $totalKg > 0 ? number_format(($carbon->waste / $totalKg) * 100, 1) : 0 }}% dari total
                    </span>
                </div>
            </div>

            <!-- Water -->
            <div class="p-4 rounded-xl bg-white/[0.02] border border-white/[0.06] flex items-center gap-3.5">
                <div class="w-10 h-10 rounded-xl bg-sky-500/15 text-sky-400 flex items-center justify-center text-base shrink-0">
                    <i class="fa-solid fa-faucet-drip"></i>
                </div>
                <div>
                    <span class="text-[10px] uppercase font-bold text-slate-400 block tracking-wider">Air Bersih</span>
                    <span class="text-base font-extrabold text-white block mt-0.5">
                        {{ number_format($carbon->water, 2, ',', '.') }} kg
                    </span>
                    <span class="text-[10px] text-sky-400/90 font-semibold block">
                        {{ $totalKg > 0 ? number_format(($carbon->water / $totalKg) * 100, 1) : 0 }}% dari total
                    </span>
                </div>
            </div>
        </div>

        <!-- Action Footer -->
        <div class="pt-6 border-t border-white/[0.08] flex flex-col sm:flex-row items-center justify-between gap-4">
            <a href="{{ route('carbon.history') }}" 
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
                <a href="{{ route('carbon') }}" 
                   class="flex-1 sm:flex-none px-5 py-2.5 rounded-xl bg-white/[0.06] hover:bg-white/[0.12] text-white border border-white/15 text-xs font-bold transition-colors flex items-center justify-center gap-2">
                    <i class="fa-solid fa-plus text-xs"></i>
                    <span>Hitung Baru</span>
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
        
        <!-- Header / Kop Surat -->
        <div style="display: flex; justify-content: space-between; align-items: flex-start; border-bottom: 2.5px solid #059669; padding-bottom: 14px; margin-bottom: 20px;">
            <div style="display: flex; align-items: center; gap: 14px;">
                <img src="{{ asset('images/logo.svg') }}" alt="KaHejo Logo" style="width: 44px; height: 44px; object-contain: contain;">
                <div>
                    <h2 style="font-size: 22px; font-weight: 800; color: #064e3b; margin: 0; letter-spacing: -0.5px;">KaHejo Climate Platform</h2>
                    <p style="font-size: 11px; color: #059669; font-weight: 700; text-transform: uppercase; margin: 2px 0 0 0; letter-spacing: 0.8px;">
                        Carbon Footprint Verification & Offset Intelligence
                    </p>
                </div>
            </div>

            <div style="text-align: right; font-size: 11px; color: #475569;">
                <p style="margin: 0; font-weight: 700; color: #0f172a;">No. Dokumen: <span style="font-family: monospace; color: #059669;">KHJ-CRB-{{ sprintf('%06d', $carbon->id) }}</span></p>
                <p style="margin: 3px 0 0 0;">Tanggal Terbit: <strong>{{ now()->format('d F Y, H:i') }} WIB</strong></p>
                <p style="margin: 3px 0 0 0;">Status: <strong style="color: #059669;">TERVERIFIKASI SISTEM</strong></p>
            </div>
        </div>

        <!-- Title -->
        <div style="text-align: center; margin-bottom: 22px;">
            <h1 style="font-size: 17px; font-weight: 800; text-transform: uppercase; color: #0f172a; margin: 0; letter-spacing: 0.5px;">
                BUKTI HASIL EVALUASI JEJAK KARBON
            </h1>
            <p style="font-size: 12px; color: #64748b; margin: 4px 0 0 0; font-weight: 500;">
                Kalkulasi Emisi Karbon Personal & Fasilitas Berdasarkan Standar GHG Protocol
            </p>
        </div>

        <!-- Entity Details Box -->
        <div style="border: 1px solid #cbd5e1; border-radius: 8px; padding: 12px 16px; background-color: #f8fafc; margin-bottom: 20px;">
            <table style="width: 100%; font-size: 11.5px; border-collapse: collapse;">
                <tr>
                    <td style="color: #64748b; width: 25%; padding: 3px 0;">Nama Pemilik Akun:</td>
                    <td style="font-weight: 700; color: #0f172a; width: 35%; padding: 3px 0;">{{ Auth::user()->name }}</td>
                    <td style="color: #64748b; width: 20%; padding: 3px 0;">Bulan Periode:</td>
                    <td style="font-weight: 700; color: #0f172a; padding: 3px 0;">{{ \Carbon\Carbon::parse($carbon->month)->format('F Y') }}</td>
                </tr>
                <tr>
                    <td style="color: #64748b; padding: 3px 0;">Alamat Email:</td>
                    <td style="font-weight: 600; color: #0f172a; padding: 3px 0;">{{ Auth::user()->email }}</td>
                    <td style="color: #64748b; padding: 3px 0;">Tanggal Input:</td>
                    <td style="font-weight: 600; color: #0f172a; padding: 3px 0;">{{ $carbon->created_at->format('d M Y H:i') }}</td>
                </tr>
            </table>
        </div>

        <!-- Table Breakdown -->
        <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px; font-size: 11.5px;">
            <thead>
                <tr style="background-color: #064e3b; color: #ffffff;">
                    <th style="padding: 9px 12px; text-align: left; font-weight: 700; border-top-left-radius: 6px; width: 35%;">Kategori Sumber Emisi</th>
                    <th style="padding: 9px 12px; text-align: left; font-weight: 700;">Standar Emisi & Deskripsi</th>
                    <th style="padding: 9px 12px; text-align: right; font-weight: 700; border-top-right-radius: 6px; width: 28%;">Emisi Dihasilkan</th>
                </tr>
            </thead>
            <tbody>
                <tr style="border-bottom: 1px solid #e2e8f0;">
                    <td style="padding: 8px 12px; font-weight: 700; color: #334155;">1. Konsumsi Listrik</td>
                    <td style="padding: 8px 12px; color: #475569;">Faktor Emisi Grid Jamali (0.85 kg CO₂/kWh)</td>
                    <td style="padding: 8px 12px; text-align: right; font-weight: 700; color: #0f172a;">
                        {{ number_format($carbon->electricity, 2, ',', '.') }} kg CO₂
                    </td>
                </tr>
                <tr style="border-bottom: 1px solid #e2e8f0; background-color: #f8fafc;">
                    <td style="padding: 8px 12px; font-weight: 700; color: #334155;">2. Mobilitas Transportasi</td>
                    <td style="padding: 8px 12px; color: #475569;">Perjalanan Kendaraan Bermotor Pribadi</td>
                    <td style="padding: 8px 12px; text-align: right; font-weight: 700; color: #0f172a;">
                        {{ number_format($carbon->transportation, 2, ',', '.') }} kg CO₂
                    </td>
                </tr>
                <tr style="border-bottom: 1px solid #e2e8f0;">
                    <td style="padding: 8px 12px; font-weight: 700; color: #334155;">3. Timbulan Sampah / Limbah</td>
                    <td style="padding: 8px 12px; color: #475569;">Limbah Padat Domestik ke TPA</td>
                    <td style="padding: 8px 12px; text-align: right; font-weight: 700; color: #0f172a;">
                        {{ number_format($carbon->waste, 2, ',', '.') }} kg CO₂
                    </td>
                </tr>
                <tr style="border-bottom: 1px solid #e2e8f0; background-color: #f8fafc;">
                    <td style="padding: 8px 12px; font-weight: 700; color: #334155;">4. Penggunaan Air Bersih</td>
                    <td style="padding: 8px 12px; color: #475569;">Emisi Pengolahan & Distribusi Air Bersih</td>
                    <td style="padding: 8px 12px; text-align: right; font-weight: 700; color: #0f172a;">
                        {{ number_format($carbon->water, 2, ',', '.') }} kg CO₂
                    </td>
                </tr>
                <tr style="border-bottom: 2px solid #059669; background-color: #ecfdf5;">
                    <td style="padding: 12px; font-weight: 800; color: #064e3b; font-size: 12.5px;">
                        TOTAL JEJAK EMISI KARBON
                    </td>
                    <td style="padding: 12px; font-weight: 700; color: #064e3b;">
                        Akumulasi Seluruh Kategori Aktivitas
                    </td>
                    <td style="padding: 12px; text-align: right; font-weight: 900; color: #064e3b; font-size: 14px;">
                        {{ number_format($carbon->total, 2, ',', '.') }} kg CO₂e
                        <span style="display: block; font-size: 10.5px; font-weight: 600; color: #059669;">
                            ({{ number_format($carbon->total / 1000, 3, ',', '.') }} Ton CO₂e)
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- Recommendations Box -->
        <div style="border: 1.5px solid #a7f3d0; background-color: #f0fdf4; border-radius: 8px; padding: 10px 14px; margin-bottom: 22px;">
            <h4 style="font-size: 10.5px; font-weight: 800; text-transform: uppercase; color: #065f46; margin: 0 0 3px 0;">
                Target Netralisasi Emisi (*Carbon Offset*):
            </h4>
            <p style="font-size: 11px; color: #166534; margin: 0; line-height: 1.45;">
                Dibutuhkan penanaman minimal <strong>{{ $trees }} pohon dewasa</strong> selama 1 tahun untuk menyerap total emisi pada periode ini. Anda dapat mengimbangi jejak ini melalui program penanaman pohon atau aksi keberlanjutan KaHejo.
            </p>
        </div>

        <!-- Verification Sign-off & Digital Stamp Section -->
        <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-top: 24px; padding-top: 10px;">
            <!-- Left: Digital Seal Stamp -->
            <div style="display: flex; align-items: center; gap: 12px;">
                <div style="width: 74px; height: 74px; border: 2px dashed #059669; border-radius: 50%; display: flex; flex-direction: column; align-items: center; justify-content: center; text-align: center; color: #059669; font-size: 7.5px; font-weight: 900; line-height: 1.1; padding: 4px;">
                    <span>★ KAHEJO ★</span>
                    <span style="font-size: 8.5px; font-weight: 900; margin: 2px 0;">CARBON</span>
                    <span>VERIFIED</span>
                </div>
                <div style="font-size: 10px; color: #64748b;">
                    <p style="margin: 0; font-weight: 700; color: #0f172a;">Verifikasi Akuntansi Karbon KaHejo</p>
                    <p style="margin: 2px 0 0 0;">Standar Emisi IPCC & ESDM Terintegrasi</p>
                    <p style="margin: 2px 0 0 0; font-family: monospace; color: #059669;">HASH: {{ strtoupper(md5($carbon->id . $carbon->total)) }}</p>
                </div>
            </div>

            <!-- Right: Signature Authority -->
            <div style="text-align: center; width: 220px;">
                <p style="font-size: 10.5px; color: #64748b; margin: 0 0 35px 0;">Diterbitkan secara digital oleh:</p>
                <div style="font-size: 11.5px; font-weight: 800; color: #0f172a; border-top: 1px solid #0f172a; padding-top: 5px;">
                    KaHejo Climate Verification
                </div>
                <p style="font-size: 9.5px; color: #64748b; margin: 2px 0 0 0;">Carbon Accounting Unit</p>
            </div>
        </div>

        <!-- Footnote / Legal Disclaimer -->
        <div style="margin-top: 24px; border-top: 1px solid #e2e8f0; padding-top: 8px; text-align: center; font-size: 9px; color: #94a3b8;">
            Dokumen ini sah sebagai bukti evaluasi jejak karbon tanpa memerlukan tanda tangan basah.
            Dicetak secara resmi melalui platform KaHejo (<span style="color: #059669;">https://kahejo.id</span>).
        </div>

    </div>
</div>

@endsection