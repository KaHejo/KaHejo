@extends('layouts.app')

@section('title', 'Hasil Konsumsi Energi')

@section('content')
<div class="max-w-4xl mx-auto py-8 px-4 sm:px-6 lg:px-8 space-y-8 print:p-0 print:max-w-full">

    <!-- Success Feedback Alert (Hide when printing) -->
    <div class="glass-card p-4 border-emeraldBrand/40 bg-[#071610]/90 flex items-center justify-between gap-4 print:hidden">
        <div class="flex items-center gap-3">
            <div class="w-9 h-9 rounded-xl bg-emeraldBrand/20 text-mintGlow flex items-center justify-center text-sm shadow-sm shrink-0">
                <i class="fa-solid fa-circle-check"></i>
            </div>
            <div>
                <h4 class="text-xs font-bold text-white">Data Konsumsi Berhasil Disimpan & Divalidasi</h4>
                <p class="text-[11px] text-slate-400">Data telah masuk ke inventarisasi emisi GHG operasional perusahaan Anda.</p>
            </div>
        </div>

        <a href="{{ route('company.history') }}" class="px-3.5 py-1.5 rounded-lg bg-white/[0.05] hover:bg-white/[0.1] text-mintGlow text-xs font-semibold border border-white/10 transition-colors shrink-0">
            Lihat di Log Riwayat
        </a>
    </div>

    <!-- Achievement Toast if any -->
    @if(session('achievement'))
    <div class="glass-card p-4 border-amber-500/40 bg-amber-950/20 flex items-center gap-3 print:hidden">
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
    <div class="glass-card p-6 sm:p-8 relative overflow-hidden print:border-none print:shadow-none">
        <div class="absolute -right-20 -top-20 w-64 h-64 bg-emeraldBrand/10 rounded-full blur-3xl pointer-events-none print:hidden"></div>

        <!-- Header -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-6 mb-6 border-b border-white/[0.08]">
            <div class="flex items-center gap-3.5">
                <div class="w-12 h-12 rounded-2xl bg-emeraldBrand/15 border border-emeraldBrand/30 flex items-center justify-center text-mintGlow text-xl shadow-sm">
                    <i class="fa-solid fa-file-invoice"></i>
                </div>
                <div>
                    <span class="text-[10px] uppercase font-bold text-mintGlow tracking-wider block">Bukti Pencatatan Energi</span>
                    <h1 class="text-xl sm:text-2xl font-extrabold text-white tracking-tight">
                        Detail Konsumsi Energi
                    </h1>
                </div>
            </div>

            <!-- Timestamp Badge -->
            <div class="text-left sm:text-right">
                <span class="text-[10px] text-slate-400 block uppercase font-semibold">Waktu Pencatatan</span>
                <span class="text-xs font-mono font-bold text-slate-200">
                    {{ $result['calculation_date'] ?? now()->format('d M Y, H:i') }}
                </span>
            </div>
        </div>

        <!-- Big Highlight Banner -->
        @php
            $source = strtolower($result['source_type']);
            $isScope2 = ($source == 'electricity');
        @endphp
        <div class="p-6 rounded-2xl bg-gradient-to-r from-emerald-950/40 via-[#0a2318]/60 to-emerald-950/40 border border-emeraldBrand/25 mb-8 flex flex-col sm:flex-row items-center justify-between gap-6 text-center sm:text-left">
            <div class="flex items-center gap-4">
                <div class="w-16 h-16 rounded-2xl bg-emeraldBrand/20 border border-emeraldBrand/40 flex items-center justify-center text-mintGlow text-2xl shadow-lg shrink-0">
                    @if($source == 'electricity')
                        <i class="fa-solid fa-bolt"></i>
                    @elseif($source == 'gasoline' || $source == 'diesel')
                        <i class="fa-solid fa-gas-pump"></i>
                    @else
                        <i class="fa-solid fa-fire-flame-simple"></i>
                    @endif
                </div>
                <div>
                    <span class="text-xs font-semibold text-slate-400 block">Total Volume Energi</span>
                    <div class="text-3xl font-black text-white tracking-tight mt-0.5">
                        {{ number_format($result['consumption_amount'], 2, ',', '.') }}
                        <span class="text-lg font-bold text-mintGlow">{{ $result['unit_measurement'] }}</span>
                    </div>
                </div>
            </div>

            <div class="flex items-center gap-2">
                <span class="px-3.5 py-1.5 rounded-full text-xs font-bold border flex items-center gap-2
                    {{ $isScope2 ? 'bg-emeraldBrand/15 text-mintGlow border-emeraldBrand/35' : 'bg-amber-500/15 text-amber-300 border-amber-500/35' }}">
                    <i class="fa-solid fa-shield-halved text-xs"></i>
                    <span>{{ $isScope2 ? 'Scope 2 (Listrik Tidak Langsung)' : 'Scope 1 (Bahan Bakar Langsung)' }}</span>
                </span>
            </div>
        </div>

        <!-- Detailed Breakdown Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs mb-8">
            <div class="p-4 rounded-xl bg-white/[0.02] border border-white/[0.06]">
                <span class="text-slate-400 block text-[11px] mb-1">Sumber Energi:</span>
                <span class="font-bold text-white text-sm capitalize">{{ $result['source_type'] }}</span>
            </div>

            <div class="p-4 rounded-xl bg-white/[0.02] border border-white/[0.06]">
                <span class="text-slate-400 block text-[11px] mb-1">Kategori Aktivitas Operasional:</span>
                <span class="font-bold text-white text-sm capitalize">{{ $result['activity_type'] }}</span>
            </div>

            <div class="p-4 rounded-xl bg-white/[0.02] border border-white/[0.06]">
                <span class="text-slate-400 block text-[11px] mb-1">Lokasi / Fasilitas:</span>
                <span class="font-bold text-white text-sm">{{ $result['location_name'] ?? 'Pabrik / Kantor Utama' }}</span>
            </div>

            <div class="p-4 rounded-xl bg-white/[0.02] border border-white/[0.06]">
                <span class="text-slate-400 block text-[11px] mb-1">Bulan Periode Konsumsi:</span>
                <span class="font-bold text-white text-sm">{{ $result['consumption_date'] }} ({{ ucfirst($result['reporting_period']) }})</span>
            </div>
        </div>

        <!-- ESG Recommendation Note -->
        <div class="p-4 rounded-2xl bg-white/[0.02] border border-white/[0.06] flex items-start gap-3.5 mb-8">
            <div class="w-8 h-8 rounded-lg bg-mintGlow/15 text-mintGlow flex items-center justify-center text-xs shrink-0 mt-0.5">
                <i class="fa-solid fa-lightbulb"></i>
            </div>
            <div class="text-xs text-slate-300 leading-relaxed">
                <span class="font-bold text-white block mb-0.5">Rekomendasi Dekarbonisasi:</span>
                Optimalkan jam operasional mesin berat dan pertimbangkan transisi panel surya atap (PLTS Atap) untuk menekan emisi Scope 2 pada fasilitas ini.
            </div>
        </div>

        <!-- Action Footer (Hidden on Print) -->
        <div class="pt-6 border-t border-white/[0.08] flex flex-col sm:flex-row items-center justify-between gap-4 print:hidden">
            <a href="{{ route('company.history') }}" 
               class="px-5 py-2.5 rounded-xl bg-white/[0.04] hover:bg-white/[0.08] text-slate-300 hover:text-white border border-white/10 text-xs font-semibold flex items-center gap-2 transition-colors">
                <i class="fa-solid fa-arrow-left text-xs"></i>
                <span>Kembali ke Riwayat</span>
            </a>

            <div class="flex items-center gap-3 w-full sm:w-auto">
                <button type="button" onclick="window.print()" 
                        class="flex-1 sm:flex-none px-5 py-2.5 rounded-xl bg-white/[0.06] hover:bg-white/[0.12] text-white border border-white/15 text-xs font-bold flex items-center justify-center gap-2 transition-colors cursor-pointer">
                    <i class="fa-solid fa-print text-xs text-mintGlow"></i>
                    <span>Cetak Bukti (PDF)</span>
                </button>
                <a href="{{ route('company') }}" 
                   class="flex-1 sm:flex-none px-6 py-2.5 rounded-xl bg-gradient-to-r from-emeraldBrand to-emeraldDark hover:from-[#18c58f] hover:to-emeraldDark text-white text-xs font-bold shadow-lg shadow-emeraldBrand/25 hover:shadow-emeraldBrand/40 transition-all duration-200 flex items-center justify-center gap-2">
                    <i class="fa-solid fa-plus text-xs"></i>
                    <span>Catat Konsumsi Baru</span>
                </a>
            </div>
        </div>

    </div>

</div>
@endsection