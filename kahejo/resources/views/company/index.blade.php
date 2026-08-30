@extends('layouts.app')

@section('title', 'Konsumsi Energi')

@section('content')
<div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8 space-y-8">

    <!-- Top Hero Header Card -->
    <div class="glass-card p-6 sm:p-8 relative overflow-hidden">
        <div class="absolute -right-16 -top-16 w-64 h-64 bg-emeraldBrand/15 rounded-full blur-3xl pointer-events-none"></div>

        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 relative z-10">
            <div>
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emeraldBrand/10 border border-emeraldBrand/25 text-mintGlow text-xs font-semibold mb-2">
                    <i class="fa-solid fa-bolt-lightning text-[11px]"></i>
                    <span>Scope 1 & Scope 2 Energy Accounting</span>
                </div>
                <h1 class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight">
                    Konsumsi Energi Perusahaan
                </h1>
                <p class="mt-1 text-sm text-slate-400 max-w-2xl">
                    Catat dan pantau penggunaan energi operasional seperti listrik, bahan bakar armada, dan gas industri untuk inventarisasi emisi GHG terverifikasi.
                </p>
            </div>

            <!-- Action Link to History -->
            <div class="flex items-center gap-3 self-start md:self-auto">
                <a href="{{ route('company.history') }}" 
                   class="px-5 py-2.5 rounded-xl bg-white/[0.05] hover:bg-white/[0.1] text-white border border-white/15 text-xs font-bold transition-all duration-200 flex items-center gap-2 shadow-lg shadow-black/20 hover:border-emeraldBrand/40">
                    <i class="fa-solid fa-clock-rotate-left text-mintGlow text-xs"></i>
                    <span>Lihat Riwayat Konsumsi</span>
                </a>
            </div>
        </div>

        <!-- Scope Indicators Banner -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-6 pt-6 border-t border-white/[0.08]">
            <div class="flex items-center gap-3 p-3 rounded-xl bg-white/[0.02] border border-white/[0.06]">
                <div class="w-8 h-8 rounded-lg bg-emeraldBrand/15 text-mintGlow flex items-center justify-center text-xs shrink-0">
                    <i class="fa-solid fa-plug-circle-bolt"></i>
                </div>
                <div>
                    <span class="text-xs font-bold text-white block">Listrik (Scope 2)</span>
                    <span class="text-[10px] text-slate-400 block">Jaringan PLN / Generator</span>
                </div>
            </div>

            <div class="flex items-center gap-3 p-3 rounded-xl bg-white/[0.02] border border-white/[0.06]">
                <div class="w-8 h-8 rounded-lg bg-amber-500/15 text-amber-400 flex items-center justify-center text-xs shrink-0">
                    <i class="fa-solid fa-gas-pump"></i>
                </div>
                <div>
                    <span class="text-xs font-bold text-white block">Bahan Bakar (Scope 1)</span>
                    <span class="text-[10px] text-slate-400 block">Bensin, Solar, & Armada</span>
                </div>
            </div>

            <div class="flex items-center gap-3 p-3 rounded-xl bg-white/[0.02] border border-white/[0.06]">
                <div class="w-8 h-8 rounded-lg bg-sky-500/15 text-sky-400 flex items-center justify-center text-xs shrink-0">
                    <i class="fa-solid fa-fire-flame-simple"></i>
                </div>
                <div>
                    <span class="text-xs font-bold text-white block">Gas Alam & LPG (Scope 1)</span>
                    <span class="text-[10px] text-slate-400 block">Proses Pemanasan & Industri</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Energy Entry Form Card -->
    <div class="glass-card p-6 sm:p-8 relative">
        <div class="flex items-center justify-between pb-5 mb-6 border-b border-white/[0.08]">
            <div class="flex items-center gap-3.5">
                <div class="w-11 h-11 rounded-xl bg-emeraldBrand/15 border border-emeraldBrand/30 flex items-center justify-center text-mintGlow text-lg shadow-sm">
                    <i class="fa-solid fa-chart-line"></i>
                </div>
                <div>
                    <h2 class="text-lg sm:text-xl font-extrabold text-white tracking-tight">Formulir Input Konsumsi Energi</h2>
                    <p class="text-xs text-slate-400 mt-0.5">Isi rincian pemakaian energi operasional pada periode terkait.</p>
                </div>
            </div>

            <span class="hidden sm:inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emeraldBrand/10 border border-emeraldBrand/25 text-mintGlow text-[11px] font-bold">
                <span class="w-1.5 h-1.5 rounded-full bg-emeraldBrand animate-pulse"></span>
                <span>Standar GHG Protocol</span>
            </span>
        </div>

        <form action="{{ url('/company') }}" method="POST" class="space-y-6">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                
                <!-- Source Type -->
                <div>
                    <label for="source_type" class="block text-xs font-semibold text-slate-300 mb-1.5">
                        Jenis Sumber Energi <span class="text-emeraldBrand">*</span>
                    </label>
                    <div class="relative group">
                        <i class="fa-solid fa-power-off absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-500 text-sm group-focus-within:text-mintGlow transition-colors"></i>
                        <select name="source_type" id="source_type" required 
                                class="w-full pl-11 pr-4 py-3 rounded-xl bg-white/[0.04] focus:bg-white/[0.07] border border-white/15 focus:border-emeraldBrand focus:ring-2 focus:ring-emeraldBrand/25 text-white text-sm font-medium outline-none transition-all cursor-pointer">
                            <option value="" class="bg-[#0b1c15] text-slate-400">Pilih Sumber Energi</option>
                            <option value="electricity" class="bg-[#0b1c15] text-white">Listrik (Electricity - kWh)</option>
                            <option value="gasoline" class="bg-[#0b1c15] text-white">Bensin (Gasoline - Liter)</option>
                            <option value="diesel" class="bg-[#0b1c15] text-white">Solar (Diesel - Liter)</option>
                            <option value="gas" class="bg-[#0b1c15] text-white">Gas Alam (Natural Gas - m³)</option>
                            <option value="lpg" class="bg-[#0b1c15] text-white">LPG (Liquefied Petroleum Gas - kg)</option>
                        </select>
                    </div>
                    @error('source_type')
                        <p class="mt-1 text-xs text-rose-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Consumption Amount -->
                <div>
                    <label for="consumption_amount" class="block text-xs font-semibold text-slate-300 mb-1.5">
                        Jumlah Konsumsi <span class="text-emeraldBrand">*</span>
                    </label>
                    <div class="relative group">
                        <i class="fa-solid fa-calculator absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-500 text-sm group-focus-within:text-mintGlow transition-colors"></i>
                        <input type="number" step="0.01" min="0" name="consumption_amount" id="consumption_amount" required 
                               placeholder="Contoh: 1250.50"
                               class="w-full pl-11 pr-4 py-3 rounded-xl bg-white/[0.04] focus:bg-white/[0.07] border border-white/15 focus:border-emeraldBrand focus:ring-2 focus:ring-emeraldBrand/25 text-white placeholder-slate-500 text-sm font-medium outline-none transition-all">
                    </div>
                    @error('consumption_amount')
                        <p class="mt-1 text-xs text-rose-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Unit of Measurement -->
                <div>
                    <label for="unit_measurement" class="block text-xs font-semibold text-slate-300 mb-1.5">
                        Satuan Pengukuran <span class="text-emeraldBrand">*</span>
                    </label>
                    <div class="relative group">
                        <i class="fa-solid fa-ruler-combined absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-500 text-sm group-focus-within:text-mintGlow transition-colors"></i>
                        <select name="unit_measurement" id="unit_measurement" required 
                                class="w-full pl-11 pr-4 py-3 rounded-xl bg-white/[0.04] focus:bg-white/[0.07] border border-white/15 focus:border-emeraldBrand focus:ring-2 focus:ring-emeraldBrand/25 text-white text-sm font-medium outline-none transition-all cursor-pointer">
                            <option value="" class="bg-[#0b1c15] text-slate-400">Pilih Satuan Pengukuran</option>
                            <option value="kWh" class="bg-[#0b1c15] text-white">kWh (Kilowatt Hour)</option>
                            <option value="liter" class="bg-[#0b1c15] text-white">Liter</option>
                            <option value="m3" class="bg-[#0b1c15] text-white">Meter Kubik (m³)</option>
                            <option value="kg" class="bg-[#0b1c15] text-white">Kilogram (kg)</option>
                        </select>
                    </div>
                    @error('unit_measurement')
                        <p class="mt-1 text-xs text-rose-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Activity Type -->
                <div>
                    <label for="activity_type" class="block text-xs font-semibold text-slate-300 mb-1.5">
                        Tipe Aktivitas Operasional <span class="text-emeraldBrand">*</span>
                    </label>
                    <div class="relative group">
                        <i class="fa-solid fa-industry absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-500 text-sm group-focus-within:text-mintGlow transition-colors"></i>
                        <select name="activity_type" id="activity_type" required 
                                class="w-full pl-11 pr-4 py-3 rounded-xl bg-white/[0.04] focus:bg-white/[0.07] border border-white/15 focus:border-emeraldBrand focus:ring-2 focus:ring-emeraldBrand/25 text-white text-sm font-medium outline-none transition-all cursor-pointer">
                            <option value="" class="bg-[#0b1c15] text-slate-400">Pilih Kategori Aktivitas</option>
                            <option value="production" class="bg-[#0b1c15] text-white">Operasional Produksi / Pabrik</option>
                            <option value="transportation" class="bg-[#0b1c15] text-white">Logistik & Transportasi Kendaraan</option>
                            <option value="office" class="bg-[#0b1c15] text-white">Gedung Kantor & Administrasi</option>
                            <option value="any" class="bg-[#0b1c15] text-white">Umum / Aktivitas Lainnya</option>
                        </select>
                    </div>
                    @error('activity_type')
                        <p class="mt-1 text-xs text-rose-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Location Name -->
                <div>
                    <label for="location_name" class="block text-xs font-semibold text-slate-300 mb-1.5">
                        Nama Lokasi / Fasilitas
                    </label>
                    <div class="relative group">
                        <i class="fa-solid fa-location-dot absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-500 text-sm group-focus-within:text-mintGlow transition-colors"></i>
                        <input type="text" name="location_name" id="location_name" 
                               placeholder="Contoh: Pabrik Karawang Plant 1"
                               class="w-full pl-11 pr-4 py-3 rounded-xl bg-white/[0.04] focus:bg-white/[0.07] border border-white/15 focus:border-emeraldBrand focus:ring-2 focus:ring-emeraldBrand/25 text-white placeholder-slate-500 text-sm font-medium outline-none transition-all">
                    </div>
                    @error('location_name')
                        <p class="mt-1 text-xs text-rose-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Consumption Date & Reporting Period -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <!-- Consumption Date -->
                    <div>
                        <label for="consumption_date" class="block text-xs font-semibold text-slate-300 mb-1.5">
                            Bulan Periode <span class="text-emeraldBrand">*</span>
                        </label>
                        <div class="relative group">
                            <i class="fa-solid fa-calendar-days absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-500 text-sm group-focus-within:text-mintGlow transition-colors"></i>
                            <input type="month" name="consumption_date" id="consumption_date" required 
                                   class="w-full pl-11 pr-3 py-3 rounded-xl bg-white/[0.04] focus:bg-white/[0.07] border border-white/15 focus:border-emeraldBrand focus:ring-2 focus:ring-emeraldBrand/25 text-white text-sm font-medium outline-none transition-all">
                        </div>
                        @error('consumption_date')
                            <p class="mt-1 text-xs text-rose-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Reporting Period -->
                    <div>
                        <label for="reporting_period" class="block text-xs font-semibold text-slate-300 mb-1.5">
                            Periode Laporan <span class="text-emeraldBrand">*</span>
                        </label>
                        <div class="relative group">
                            <i class="fa-solid fa-clock absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-500 text-sm group-focus-within:text-mintGlow transition-colors"></i>
                            <select name="reporting_period" id="reporting_period" required 
                                    class="w-full pl-11 pr-3 py-3 rounded-xl bg-white/[0.04] focus:bg-white/[0.07] border border-white/15 focus:border-emeraldBrand focus:ring-2 focus:ring-emeraldBrand/25 text-white text-sm font-medium outline-none transition-all cursor-pointer">
                                <option value="monthly" class="bg-[#0b1c15] text-white">Bulanan (Monthly)</option>
                                <option value="yearly" class="bg-[#0b1c15] text-white">Tahunan (Yearly)</option>
                            </select>
                        </div>
                        @error('reporting_period')
                            <p class="mt-1 text-xs text-rose-400">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

            </div>

            <!-- Submit Action Bar -->
            <div class="pt-6 border-t border-white/[0.08] flex flex-col sm:flex-row items-center justify-between gap-4">
                <a href="{{ route('company.history') }}" 
                   class="px-5 py-3 rounded-xl bg-white/[0.04] hover:bg-white/[0.08] text-slate-300 hover:text-white border border-white/10 text-xs font-semibold flex items-center gap-2 transition-colors">
                    <i class="fa-solid fa-clock-rotate-left text-xs text-mintGlow"></i>
                    <span>Buka Riwayat Konsumsi</span>
                </a>

                <div class="flex items-center gap-3 w-full sm:w-auto">
                    <button type="reset" 
                            class="flex-1 sm:flex-none px-5 py-3 rounded-xl bg-white/[0.04] hover:bg-white/[0.08] text-slate-400 hover:text-white border border-white/10 text-xs font-semibold transition-colors cursor-pointer">
                        Reset Form
                    </button>
                    <button type="submit" 
                            class="flex-1 sm:flex-none px-7 py-3 rounded-xl bg-gradient-to-r from-emeraldBrand to-emeraldDark hover:from-[#18c58f] hover:to-emeraldDark text-white text-xs font-bold shadow-lg shadow-emeraldBrand/25 hover:shadow-emeraldBrand/40 transition-all duration-200 hover:-translate-y-0.5 flex items-center justify-center gap-2 cursor-pointer">
                        <i class="fa-solid fa-floppy-disk text-xs"></i>
                        <span>Hitung & Simpan Emisi</span>
                    </button>
                </div>
            </div>
        </form>
    </div>

</div>

@section('scripts')
<script>
    // Auto-update unit measurement options based on selected source type
    const sourceSelect = document.getElementById('source_type');
    const unitSelect = document.getElementById('unit_measurement');

    if (sourceSelect && unitSelect) {
        sourceSelect.addEventListener('change', function() {
            const sourceType = this.value;
            unitSelect.innerHTML = '<option value="" class="bg-[#0b1c15] text-slate-400">Pilih Satuan Pengukuran</option>';
            
            switch(sourceType) {
                case 'electricity':
                    unitSelect.innerHTML += '<option value="kWh" selected class="bg-[#0b1c15] text-white">kWh (Kilowatt Hour)</option>';
                    break;
                case 'gasoline':
                case 'diesel':
                    unitSelect.innerHTML += '<option value="liter" selected class="bg-[#0b1c15] text-white">Liter</option>';
                    break;
                case 'gas':
                    unitSelect.innerHTML += '<option value="m3" selected class="bg-[#0b1c15] text-white">Meter Kubik (m³)</option>';
                    break;
                case 'lpg':
                    unitSelect.innerHTML += '<option value="kg" selected class="bg-[#0b1c15] text-white">Kilogram (kg)</option>';
                    break;
                default:
                    unitSelect.innerHTML += '<option value="kWh" class="bg-[#0b1c15] text-white">kWh</option><option value="liter" class="bg-[#0b1c15] text-white">Liter</option><option value="m3" class="bg-[#0b1c15] text-white">Meter Kubik (m³)</option><option value="kg" class="bg-[#0b1c15] text-white">Kilogram (kg)</option>';
            }
        });
    }

    // Set current month as default for consumption date
    const dateInput = document.getElementById('consumption_date');
    if (dateInput && !dateInput.value) {
        const today = new Date();
        const month = String(today.getMonth() + 1).padStart(2, '0');
        const year = today.getFullYear();
        dateInput.value = `${year}-${month}`;
    }
</script>
@endsection
@endsection