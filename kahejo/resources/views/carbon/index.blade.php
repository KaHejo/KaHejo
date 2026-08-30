@extends('layouts.app')

@section('title', 'Kalkulator Karbon')

@section('content')
<div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8 space-y-8">

    <!-- Top Hero Header Card -->
    <div class="glass-card p-6 sm:p-8 relative overflow-hidden">
        <div class="absolute -right-16 -top-16 w-64 h-64 bg-emeraldBrand/15 rounded-full blur-3xl pointer-events-none"></div>

        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 relative z-10">
            <div>
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emeraldBrand/10 border border-emeraldBrand/25 text-mintGlow text-xs font-semibold mb-2">
                    <i class="fa-solid fa-calculator text-[11px]"></i>
                    <span>GHG Protocol Personal & Activity Accounting</span>
                </div>
                <h1 class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight">
                    Kalkulator Jejak Karbon
                </h1>
                <p class="mt-1 text-sm text-slate-400 max-w-2xl">
                    Hitung estimasi emisi gas rumah kaca (GRK) Anda dari konsumsi listrik, mobilitas harian, limbah rumah tangga, dan pemakaian air bersih.
                </p>
            </div>

            <!-- Action Link to History -->
            <div class="flex items-center gap-3 self-start md:self-auto">
                <a href="{{ route('carbon.history') }}" 
                   class="px-5 py-2.5 rounded-xl bg-white/[0.05] hover:bg-white/[0.1] text-white border border-white/15 text-xs font-bold transition-all duration-200 flex items-center gap-2 shadow-lg shadow-black/20 hover:border-emeraldBrand/40">
                    <i class="fa-solid fa-clock-rotate-left text-mintGlow text-xs"></i>
                    <span>Lihat Riwayat Kalkulasi</span>
                </a>
            </div>
        </div>

        <!-- 4 Scope Indicators Banner -->
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-3.5 mt-6 pt-6 border-t border-white/[0.08]">
            <div class="p-3 rounded-xl bg-white/[0.02] border border-white/[0.06] flex items-center gap-3">
                <div class="w-8 h-8 rounded-lg bg-amber-500/15 text-amber-400 flex items-center justify-center text-xs shrink-0">
                    <i class="fa-solid fa-bolt"></i>
                </div>
                <div>
                    <span class="text-xs font-bold text-white block">Listrik</span>
                    <span class="text-[10px] text-slate-400 block">kWh / Bulan</span>
                </div>
            </div>

            <div class="p-3 rounded-xl bg-white/[0.02] border border-white/[0.06] flex items-center gap-3">
                <div class="w-8 h-8 rounded-lg bg-rose-500/15 text-rose-400 flex items-center justify-center text-xs shrink-0">
                    <i class="fa-solid fa-car"></i>
                </div>
                <div>
                    <span class="text-xs font-bold text-white block">Transportasi</span>
                    <span class="text-[10px] text-slate-400 block">km / Hari</span>
                </div>
            </div>

            <div class="p-3 rounded-xl bg-white/[0.02] border border-white/[0.06] flex items-center gap-3">
                <div class="w-8 h-8 rounded-lg bg-emeraldBrand/15 text-mintGlow flex items-center justify-center text-xs shrink-0">
                    <i class="fa-solid fa-trash-can"></i>
                </div>
                <div>
                    <span class="text-xs font-bold text-white block">Limbah Padat</span>
                    <span class="text-[10px] text-slate-400 block">kg / Bulan</span>
                </div>
            </div>

            <div class="p-3 rounded-xl bg-white/[0.02] border border-white/[0.06] flex items-center gap-3">
                <div class="w-8 h-8 rounded-lg bg-sky-500/15 text-sky-400 flex items-center justify-center text-xs shrink-0">
                    <i class="fa-solid fa-faucet-drip"></i>
                </div>
                <div>
                    <span class="text-xs font-bold text-white block">Air Bersih</span>
                    <span class="text-[10px] text-slate-400 block">m³ / Bulan</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Carbon Form Card -->
    <div class="glass-card p-6 sm:p-8 relative">
        <div class="flex items-center justify-between pb-5 mb-6 border-b border-white/[0.08]">
            <div class="flex items-center gap-3.5">
                <div class="w-11 h-11 rounded-xl bg-emeraldBrand/15 border border-emeraldBrand/30 flex items-center justify-center text-mintGlow text-lg shadow-sm">
                    <i class="fa-solid fa-sliders"></i>
                </div>
                <div>
                    <h2 class="text-lg sm:text-xl font-extrabold text-white tracking-tight">Formulir Parameter Aktivitas</h2>
                    <p class="text-xs text-slate-400 mt-0.5">Masukkan data perkiraan konsumsi untuk periode evaluasi.</p>
                </div>
            </div>

            <span class="hidden sm:inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emeraldBrand/10 border border-emeraldBrand/25 text-mintGlow text-[11px] font-bold">
                <span class="w-1.5 h-1.5 rounded-full bg-emeraldBrand animate-pulse"></span>
                <span>Standar Faktor ESDM</span>
            </span>
        </div>

        <form action="{{ url('/carbon/calculate') }}" method="POST" class="space-y-6">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                
                <!-- Evaluation Month -->
                <div class="md:col-span-2 sm:w-1/2">
                    <label for="month" class="block text-xs font-semibold text-slate-300 mb-1.5">
                        Bulan Periode Evaluasi <span class="text-emeraldBrand">*</span>
                    </label>
                    <div class="relative group">
                        <i class="fa-solid fa-calendar-days absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-500 text-sm group-focus-within:text-mintGlow transition-colors"></i>
                        <input type="month" name="month" id="month" required 
                               class="w-full pl-11 pr-4 py-3 rounded-xl bg-white/[0.04] focus:bg-white/[0.07] border border-white/15 focus:border-emeraldBrand focus:ring-2 focus:ring-emeraldBrand/25 text-white text-sm font-medium outline-none transition-all cursor-pointer">
                    </div>
                    @error('month')
                        <p class="mt-1 text-xs text-rose-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Electricity Usage -->
                <div>
                    <label for="electricity" class="block text-xs font-semibold text-slate-300 mb-1.5">
                        Pemakaian Listrik Bulanan (kWh) <span class="text-emeraldBrand">*</span>
                    </label>
                    <div class="relative group">
                        <i class="fa-solid fa-bolt absolute left-3.5 top-1/2 -translate-y-1/2 text-amber-400 text-sm group-focus-within:text-mintGlow transition-colors"></i>
                        <input type="number" step="0.1" min="0" name="electricity" id="electricity" required 
                               placeholder="Contoh: 350.5" autocomplete="off"
                               class="w-full pl-11 pr-4 py-3 rounded-xl bg-white/[0.04] focus:bg-white/[0.07] border border-white/15 focus:border-emeraldBrand focus:ring-2 focus:ring-emeraldBrand/25 text-white placeholder-slate-500 text-sm font-medium outline-none transition-all">
                    </div>
                    <span class="text-[10px] text-slate-500 mt-1 block">Rata-rata tagihan PLN rumah tangga / kantor per bulan.</span>
                    @error('electricity')
                        <p class="mt-1 text-xs text-rose-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Daily Transportation -->
                <div>
                    <label for="transportation" class="block text-xs font-semibold text-slate-300 mb-1.5">
                        Jarak Tempuh Transportasi Harian (km) <span class="text-emeraldBrand">*</span>
                    </label>
                    <div class="relative group">
                        <i class="fa-solid fa-car absolute left-3.5 top-1/2 -translate-y-1/2 text-rose-400 text-sm group-focus-within:text-mintGlow transition-colors"></i>
                        <input type="number" step="0.1" min="0" name="transportation" id="transportation" required 
                               placeholder="Contoh: 25.0" autocomplete="off"
                               class="w-full pl-11 pr-4 py-3 rounded-xl bg-white/[0.04] focus:bg-white/[0.07] border border-white/15 focus:border-emeraldBrand focus:ring-2 focus:ring-emeraldBrand/25 text-white placeholder-slate-500 text-sm font-medium outline-none transition-all">
                    </div>
                    <span class="text-[10px] text-slate-500 mt-1 block">Total perjalanan pulang-pergi kendaraan bermotor per hari.</span>
                    @error('transportation')
                        <p class="mt-1 text-xs text-rose-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Monthly Waste -->
                <div>
                    <label for="waste" class="block text-xs font-semibold text-slate-300 mb-1.5">
                        Timbulan Sampah Bulanan (kg) <span class="text-emeraldBrand">*</span>
                    </label>
                    <div class="relative group">
                        <i class="fa-solid fa-trash-can absolute left-3.5 top-1/2 -translate-y-1/2 text-mintGlow text-sm group-focus-within:text-mintGlow transition-colors"></i>
                        <input type="number" step="0.1" min="0" name="waste" id="waste" required 
                               placeholder="Contoh: 45.0" autocomplete="off"
                               class="w-full pl-11 pr-4 py-3 rounded-xl bg-white/[0.04] focus:bg-white/[0.07] border border-white/15 focus:border-emeraldBrand focus:ring-2 focus:ring-emeraldBrand/25 text-white placeholder-slate-500 text-sm font-medium outline-none transition-all">
                    </div>
                    <span class="text-[10px] text-slate-500 mt-1 block">Estimasi volume sampah anorganik dan organik per bulan.</span>
                    @error('waste')
                        <p class="mt-1 text-xs text-rose-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Water Usage -->
                <div>
                    <label for="water" class="block text-xs font-semibold text-slate-300 mb-1.5">
                        Pemakaian Air Bersih Bulanan (m³) <span class="text-emeraldBrand">*</span>
                    </label>
                    <div class="relative group">
                        <i class="fa-solid fa-faucet-drip absolute left-3.5 top-1/2 -translate-y-1/2 text-sky-400 text-sm group-focus-within:text-mintGlow transition-colors"></i>
                        <input type="number" step="0.1" min="0" name="water" id="water" required 
                               placeholder="Contoh: 18.5" autocomplete="off"
                               class="w-full pl-11 pr-4 py-3 rounded-xl bg-white/[0.04] focus:bg-white/[0.07] border border-white/15 focus:border-emeraldBrand focus:ring-2 focus:ring-emeraldBrand/25 text-white placeholder-slate-500 text-sm font-medium outline-none transition-all">
                    </div>
                    <span class="text-[10px] text-slate-500 mt-1 block">Volume tagihan meteran PDAM atau pompa air sumur.</span>
                    @error('water')
                        <p class="mt-1 text-xs text-rose-400">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            <!-- Submit Action Bar -->
            <div class="pt-6 border-t border-white/[0.08] flex flex-col sm:flex-row items-center justify-between gap-4">
                <a href="{{ route('carbon.history') }}" 
                   class="px-5 py-3 rounded-xl bg-white/[0.04] hover:bg-white/[0.08] text-slate-300 hover:text-white border border-white/10 text-xs font-semibold flex items-center gap-2 transition-colors">
                    <i class="fa-solid fa-clock-rotate-left text-xs text-mintGlow"></i>
                    <span>Buka Riwayat Karbon</span>
                </a>

                <div class="flex items-center gap-3 w-full sm:w-auto">
                    <button type="reset" 
                            class="flex-1 sm:flex-none px-5 py-3 rounded-xl bg-white/[0.04] hover:bg-white/[0.08] text-slate-400 hover:text-white border border-white/10 text-xs font-semibold transition-colors cursor-pointer">
                        Reset Form
                    </button>
                    <button type="submit" 
                            class="flex-1 sm:flex-none px-7 py-3 rounded-xl bg-gradient-to-r from-emeraldBrand to-emeraldDark hover:from-[#18c58f] hover:to-emeraldDark text-white text-xs font-bold shadow-lg shadow-emeraldBrand/25 hover:shadow-emeraldBrand/40 transition-all duration-200 hover:-translate-y-0.5 flex items-center justify-center gap-2 cursor-pointer">
                        <i class="fa-solid fa-calculator text-xs"></i>
                        <span>Hitung Jejak Karbon</span>
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- ============================================== -->
    <!-- RESULTS SECTION (Displayed When Calculated)    -->
    <!-- ============================================== -->
    @if(isset($results))
    <div class="glass-card p-6 sm:p-8 relative overflow-hidden border-emeraldBrand/35">
        <div class="absolute -right-20 -top-20 w-72 h-72 bg-emeraldBrand/15 rounded-full blur-3xl pointer-events-none"></div>

        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-6 mb-6 border-b border-white/[0.08]">
            <div class="flex items-center gap-3.5">
                <div class="w-12 h-12 rounded-2xl bg-emeraldBrand/15 border border-emeraldBrand/30 flex items-center justify-center text-mintGlow text-xl shadow-sm">
                    <i class="fa-solid fa-chart-pie"></i>
                </div>
                <div>
                    <span class="text-[10px] uppercase font-bold text-mintGlow tracking-wider block">Hasil Perhitungan Berhasil</span>
                    <h2 class="text-xl sm:text-2xl font-extrabold text-white tracking-tight">
                        Ringkasan Jejak Emisi Karbon
                    </h2>
                </div>
            </div>

            <div class="text-left sm:text-right">
                <span class="text-[10px] text-slate-400 block uppercase font-semibold">Status</span>
                <span class="text-xs font-bold text-mintGlow flex items-center gap-1.5 mt-0.5">
                    <span class="w-1.5 h-1.5 rounded-full bg-emeraldBrand animate-pulse"></span>
                    <span>Tersimpan di Riwayat</span>
                </span>
            </div>
        </div>

        <!-- Big Total Impact Banner -->
        @php
            $totalKg = $results['total'] ?? 0;
            $totalTon = $totalKg / 1000;
            $trees = max(1, round($totalKg / 21.77));
        @endphp
        <div class="p-6 sm:p-7 rounded-2xl bg-gradient-to-r from-emerald-950/50 via-[#0a271b]/70 to-emerald-950/50 border border-emeraldBrand/30 mb-8 flex flex-col md:flex-row items-center justify-between gap-6">
            <div class="flex items-center gap-5">
                <div class="w-16 h-16 rounded-2xl bg-emeraldBrand/25 border border-emeraldBrand/40 flex items-center justify-center text-mintGlow text-3xl shadow-lg shrink-0">
                    <i class="fa-solid fa-cloud-arrow-up"></i>
                </div>
                <div>
                    <span class="text-xs font-bold text-mintGlow uppercase tracking-wider block">Total Jejak Emisi Karbon Bulanan</span>
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
                    <span class="text-[10px] text-slate-400 block">Selama 1 tahun untuk menetralisir</span>
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
                        {{ number_format($results['electricity'], 2, ',', '.') }} kg
                    </span>
                    <span class="text-[10px] text-amber-400/90 font-semibold block">
                        {{ $totalKg > 0 ? number_format(($results['electricity'] / $totalKg) * 100, 1) : 0 }}% dari total
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
                        {{ number_format($results['transportation'], 2, ',', '.') }} kg
                    </span>
                    <span class="text-[10px] text-rose-400/90 font-semibold block">
                        {{ $totalKg > 0 ? number_format(($results['transportation'] / $totalKg) * 100, 1) : 0 }}% dari total
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
                        {{ number_format($results['waste'], 2, ',', '.') }} kg
                    </span>
                    <span class="text-[10px] text-mintGlow font-semibold block">
                        {{ $totalKg > 0 ? number_format(($results['waste'] / $totalKg) * 100, 1) : 0 }}% dari total
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
                        {{ number_format($results['water'], 2, ',', '.') }} kg
                    </span>
                    <span class="text-[10px] text-sky-400/90 font-semibold block">
                        {{ $totalKg > 0 ? number_format(($results['water'] / $totalKg) * 100, 1) : 0 }}% dari total
                    </span>
                </div>
            </div>
        </div>

        <!-- Action Links -->
        <div class="pt-6 border-t border-white/[0.08] flex flex-col sm:flex-row items-center justify-between gap-4">
            <a href="{{ route('carbon.history') }}" 
               class="px-5 py-2.5 rounded-xl bg-white/[0.05] hover:bg-white/[0.1] text-mintGlow border border-white/10 text-xs font-bold flex items-center gap-2 transition-colors">
                <i class="fa-solid fa-table-list text-xs"></i>
                <span>Lihat Catatan di Riwayat</span>
            </a>

            <a href="{{ route('carbon') }}" 
               class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-emeraldBrand to-emeraldDark hover:from-[#18c58f] hover:to-emeraldDark text-white text-xs font-bold shadow-lg shadow-emeraldBrand/25 transition-all flex items-center gap-2">
                <i class="fa-solid fa-rotate-right text-xs"></i>
                <span>Hitung Ulang Periode Lain</span>
            </a>
        </div>

    </div>
    @endif

</div>

@section('scripts')
<script>
    // Auto-set current month if empty
    const monthInput = document.getElementById('month');
    if (monthInput && !monthInput.value) {
        const today = new Date();
        const month = String(today.getMonth() + 1).padStart(2, '0');
        const year = today.getFullYear();
        monthInput.value = `${year}-${month}`;
    }
</script>
@endsection
@endsection
