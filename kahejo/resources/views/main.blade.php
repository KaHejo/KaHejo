@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8 space-y-8">
    
    <!-- Welcome Header Section -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emeraldBrand/10 border border-emeraldBrand/25 text-mintGlow text-xs font-semibold mb-2">
                <span class="w-2 h-2 rounded-full bg-emeraldBrand animate-pulse"></span>
                <span>Live Carbon Tracking</span>
            </div>
            <h1 class="text-3xl sm:text-4xl font-extrabold text-white tracking-tight">
                Welcome back, <span class="bg-gradient-to-r from-mintGlow to-emeraldBrand bg-clip-text text-transparent">{{ Auth::user()->name }}</span>!
            </h1>
            <p class="mt-1 text-sm text-slate-400">Pantau perkembangan jejak karbon dan efisiensi energi harian Anda secara real-time.</p>
        </div>

        <div class="flex items-center gap-3">
            <a href="{{ route('carbon') }}" class="btn-shimmer inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-gradient-to-r from-emeraldBrand to-emeraldDark hover:from-[#18c58f] hover:to-emeraldDark text-white text-xs font-bold tracking-wide shadow-lg shadow-emeraldBrand/25 hover:shadow-emeraldBrand/40 transition-all duration-200 hover:-translate-y-0.5">
                <i class="fa-solid fa-plus text-xs"></i>
                <span>Hitung Emisi Baru</span>
            </a>
            <a href="{{ route('achievements') }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-white/[0.05] hover:bg-white/[0.1] text-slate-300 hover:text-white border border-white/10 text-xs font-semibold transition-all duration-200">
                <i class="fa-solid fa-trophy text-amber-400 text-xs animate-float"></i>
                <span>Poin & Reward</span>
            </a>
        </div>
    </div>

    <!-- 4 Compact Stats Cards (Obsidian Emerald Glass with Entrance Animation) -->
    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
        
        <!-- Card 1: Total Carbon Footprint -->
        <div class="glass-card animate-card-entrance delay-1 p-5 relative overflow-hidden group">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-semibold text-slate-400 tracking-wide uppercase">Total Carbon Footprint</p>
                    <h3 class="metric-glow text-2xl sm:text-3xl font-extrabold text-white mt-1.5 tracking-tight">
                        {{ number_format($stats['totalCarbonFootprint'], 2) }} <span class="text-sm font-semibold text-mintGlow">kg</span>
                    </h3>
                    <p class="text-[11px] text-slate-500 mt-1 flex items-center gap-1.5">
                        <i class="fa-regular fa-clock text-[10px]"></i>
                        <span>12 Bulan Terakhir</span>
                    </p>
                </div>
                <div class="w-12 h-12 rounded-2xl bg-emeraldBrand/15 border border-emeraldBrand/30 flex items-center justify-center text-mintGlow text-xl group-hover:scale-110 group-hover:rotate-6 transition-transform duration-300 shadow-md shadow-emeraldBrand/20 shrink-0">
                    <i class="fa-solid fa-leaf"></i>
                </div>
            </div>
            <div class="mt-4 pt-3 border-t border-white/[0.07] flex items-center justify-between text-[11px]">
                <span class="text-slate-400">Status Emisi</span>
                <span class="font-bold text-mintGlow">Terkontrol</span>
            </div>
        </div>

        <!-- Card 2: Monthly Average -->
        <div class="glass-card animate-card-entrance delay-2 p-5 relative overflow-hidden group">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-semibold text-slate-400 tracking-wide uppercase">Rata-Rata Bulanan</p>
                    <h3 class="metric-glow text-2xl sm:text-3xl font-extrabold text-white mt-1.5 tracking-tight">
                        {{ number_format($stats['averageMonthlyFootprint'], 2) }} <span class="text-sm font-semibold text-sky-400">kg</span>
                    </h3>
                    <p class="text-[11px] text-slate-500 mt-1 flex items-center gap-1.5">
                        <i class="fa-solid fa-calculator text-[10px]"></i>
                        <span>Berdasarkan riwayat data</span>
                    </p>
                </div>
                <div class="w-12 h-12 rounded-2xl bg-sky-500/15 border border-sky-500/30 flex items-center justify-center text-sky-400 text-xl group-hover:scale-110 group-hover:rotate-6 transition-transform duration-300 shadow-md shadow-sky-500/20 shrink-0">
                    <i class="fa-solid fa-chart-simple"></i>
                </div>
            </div>
            <div class="mt-4 pt-3 border-t border-white/[0.07] flex items-center justify-between text-[11px]">
                <span class="text-slate-400">Performa</span>
                <span class="font-bold text-sky-400">Stabil</span>
            </div>
        </div>

        <!-- Card 3: Last Month -->
        <div class="glass-card animate-card-entrance delay-3 p-5 relative overflow-hidden group">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-semibold text-slate-400 tracking-wide uppercase">Bulan Terakhir</p>
                    <h3 class="metric-glow text-2xl sm:text-3xl font-extrabold text-white mt-1.5 tracking-tight">
                        {{ number_format($stats['lastMonthFootprint'], 2) }} <span class="text-sm font-semibold text-amber-400">kg</span>
                    </h3>
                    <p class="text-[11px] text-slate-500 mt-1 flex items-center gap-1.5 truncate max-w-[140px]">
                        <i class="fa-regular fa-calendar text-[10px]"></i>
                        <span>{{ $carbonHistory->first()['date'] ?? 'Belum ada data' }}</span>
                    </p>
                </div>
                <div class="w-12 h-12 rounded-2xl bg-amber-500/15 border border-amber-500/30 flex items-center justify-center text-amber-400 text-xl group-hover:scale-110 group-hover:rotate-6 transition-transform duration-300 shadow-md shadow-amber-500/20 shrink-0">
                    <i class="fa-solid fa-calendar-days"></i>
                </div>
            </div>
            <div class="mt-4 pt-3 border-t border-white/[0.07] flex items-center justify-between text-[11px]">
                <span class="text-slate-400">Siklus</span>
                <span class="font-bold text-amber-400">Tercatat</span>
            </div>
        </div>

        <!-- Card 4: Improvement -->
        <div class="glass-card animate-card-entrance delay-4 p-5 relative overflow-hidden group">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-semibold text-slate-400 tracking-wide uppercase">Efisiensi / Improvement</p>
                    <h3 class="metric-glow text-2xl sm:text-3xl font-extrabold text-white mt-1.5 tracking-tight">
                        {{ number_format($stats['improvement'] ?? 0, 2) }}<span class="text-sm font-semibold text-mintGlow">%</span>
                    </h3>
                    <p class="text-[11px] text-slate-500 mt-1 flex items-center gap-1.5">
                        <i class="fa-solid fa-arrow-trend-up text-[10px] text-mintGlow"></i>
                        <span>Dibanding bulan lalu</span>
                    </p>
                </div>
                <div class="w-12 h-12 rounded-2xl bg-emeraldBrand/15 border border-emeraldBrand/30 flex items-center justify-center text-mintGlow text-xl group-hover:scale-110 group-hover:rotate-6 transition-transform duration-300 shadow-md shadow-emeraldBrand/20 shrink-0">
                    <i class="fa-solid fa-arrow-trend-up"></i>
                </div>
            </div>
            <div class="mt-4 pt-3 border-t border-white/[0.07] flex items-center justify-between text-[11px]">
                <span class="text-slate-400">Dampak</span>
                <span class="font-bold text-mintGlow">Positif 🌱</span>
            </div>
        </div>

    </div>

    <!-- Lowest Carbon Footprint Achievement Card -->
    <div class="glass-card animate-card-entrance delay-5 p-6 sm:p-7 relative overflow-hidden">
        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6 pb-6 border-b border-white/10">
            <div class="flex items-start sm:items-center gap-4">
                <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-amber-500/25 to-yellow-600/10 border border-amber-400/30 flex items-center justify-center text-amber-400 text-2xl shadow-lg shadow-amber-500/20 shrink-0">
                    <i class="fa-solid fa-trophy"></i>
                </div>
                <div>
                    <div class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-amber-500/15 border border-amber-500/30 text-amber-300 text-[10px] font-bold uppercase tracking-wider mb-1">
                        Best Performance Record
                    </div>
                    <h3 class="text-xl font-extrabold text-white tracking-tight">Lowest Carbon Footprint Achievement</h3>
                    <p class="text-xs text-slate-400 mt-0.5">Rekor emisi terendah yang berhasil Anda capai dalam pengelolaan jejak karbon.</p>
                </div>
            </div>

            <div class="bg-white/[0.04] border border-white/10 rounded-2xl px-5 py-3 flex items-center gap-4 self-start lg:self-auto">
                <div>
                    <span class="text-[11px] font-semibold text-slate-400 block uppercase tracking-wider">Rekor Terbaik</span>
                    <span class="text-2xl font-black text-white">
                        {{ number_format($stats['lowestFootprint']['value'] ?? 0, 2) }} <span class="text-sm font-semibold text-amber-400">kg CO₂</span>
                    </span>
                </div>
                <div class="text-[11px] text-slate-400 border-l border-white/10 pl-4">
                    <span class="block">Tercapai pada:</span>
                    <span class="font-semibold text-white">{{ $stats['lowestFootprint']['date'] ?? 'Belum ada rekor' }}</span>
                </div>
            </div>
        </div>

        <!-- 2 Comparison Metrics -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-6">
            <div class="p-4 rounded-xl bg-white/[0.03] border border-white/[0.08] hover:border-emeraldBrand/30 transition-colors flex items-center justify-between">
                <div>
                    <p class="text-xs font-semibold text-slate-400">Penurunan dari Rata-Rata</p>
                    <p class="text-2xl font-extrabold text-mintGlow mt-1">
                        @if($stats['averageMonthlyFootprint'] > 0)
                            {{ number_format((($stats['averageMonthlyFootprint'] - ($stats['lowestFootprint']['value'] ?? 0)) / $stats['averageMonthlyFootprint']) * 100, 1) }}%
                        @else
                            0%
                        @endif
                    </p>
                    <p class="text-[10px] text-slate-500 mt-0.5">Lebih hemat dari pengeluaran rata-rata</p>
                </div>
                <div class="w-10 h-10 rounded-xl bg-emeraldBrand/15 border border-emeraldBrand/30 flex items-center justify-center text-mintGlow">
                    <i class="fa-solid fa-arrow-trend-down text-base"></i>
                </div>
            </div>

            <div class="p-4 rounded-xl bg-white/[0.03] border border-white/[0.08] hover:border-sky-500/30 transition-colors flex items-center justify-between">
                <div>
                    <p class="text-xs font-semibold text-slate-400">Total Karbon Dihemat</p>
                    <p class="text-2xl font-extrabold text-sky-400 mt-1">
                        @if($stats['averageMonthlyFootprint'] > 0)
                            {{ number_format((($stats['averageMonthlyFootprint'] - ($stats['lowestFootprint']['value'] ?? 0)) / $stats['averageMonthlyFootprint']) * 100, 1) }}%
                        @else
                            0%
                        @endif
                    </p>
                    <p class="text-[10px] text-slate-500 mt-0.5">Kontribusi langsung perlindungan iklim</p>
                </div>
                <div class="w-10 h-10 rounded-xl bg-sky-500/15 border border-sky-500/30 flex items-center justify-center text-sky-400">
                    <i class="fa-solid fa-seedling text-base"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activities Section -->
    <div class="glass-card p-6 sm:p-7">
        <div class="flex items-center justify-between mb-5">
            <div>
                <h3 class="text-lg font-extrabold text-white tracking-tight">Recent Activities</h3>
                <p class="text-xs text-slate-400 mt-0.5">Aktivitas penghitungan emisi dan interaksi akun terkini.</p>
            </div>
            <span class="text-xs text-mintGlow font-semibold bg-emeraldBrand/10 px-3 py-1 rounded-full border border-emeraldBrand/25">
                Real-Time Logs
            </span>
        </div>

        <div class="divide-y divide-white/[0.07]">
            @forelse($activities as $activity)
                <div class="py-3.5 flex items-center justify-between group hover:bg-white/[0.02] px-2 rounded-xl transition-colors">
                    <div class="flex items-center gap-3.5">
                        <div class="w-9 h-9 rounded-xl bg-emeraldBrand/15 border border-emeraldBrand/25 flex items-center justify-center text-mintGlow text-sm shrink-0 group-hover:scale-105 transition-transform">
                            <i class="fa-solid fa-{{ $activity['icon'] }}"></i>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-white group-hover:text-mintGlow transition-colors">{{ $activity['title'] }}</p>
                            <p class="text-xs text-slate-400 mt-0.5">{{ $activity['time'] }}</p>
                        </div>
                    </div>
                    @if(isset($activity['value']))
                        <div class="text-right">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-bold bg-white/[0.05] border border-white/10 text-white">
                                {{ number_format($activity['value'], 2) }} kg
                            </span>
                        </div>
                    @endif
                </div>
            @empty
                <div class="py-8 text-center text-slate-500 text-sm">
                    <i class="fa-regular fa-folder-open text-2xl mb-2 block"></i>
                    Belum ada riwayat aktivitas terbaru yang tercatat.
                </div>
            @endforelse
        </div>
    </div>

    <!-- Carbon Footprint History Chart -->
    <div class="glass-card animate-card-entrance delay-5 p-6 sm:p-7">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 mb-6">
            <div>
                <h3 class="text-lg font-extrabold text-white tracking-tight">Carbon Footprint History</h3>
                <p class="text-xs text-slate-400 mt-0.5">Tren emisi karbon bulanan Anda dalam 12 bulan terakhir berdasarkan kategori.</p>
            </div>
            <div class="flex items-center gap-2 text-xs font-semibold text-slate-400 bg-white/[0.04] px-3 py-1.5 rounded-xl border border-white/10 self-start sm:self-auto">
                <span class="w-2 h-2 rounded-full bg-mintGlow animate-pulse"></span>
                <span>Satuan: kg CO₂e</span>
            </div>
        </div>

        <div class="h-80 sm:h-96 w-full">
            <canvas id="carbonChart"></canvas>
        </div>
    </div>

    <!-- Energy Consumption Analysis -->
    <div class="glass-card animate-card-entrance delay-6 p-6 sm:p-7">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 mb-6">
            <div>
                <h3 class="text-lg font-extrabold text-white tracking-tight">Energy Consumption Analysis</h3>
                <p class="text-xs text-slate-400 mt-0.5">Evaluasi pemakaian listrik, bahan bakar armada (bensin/solar), dan gas operasional.</p>
            </div>
            <div class="flex items-center gap-2 text-xs font-semibold text-slate-400 bg-white/[0.04] px-3 py-1.5 rounded-xl border border-white/10 self-start sm:self-auto">
                <span class="w-2 h-2 rounded-full bg-emeraldBrand"></span>
                <span>Scope 1 & Scope 2 Energy</span>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-center">
            <!-- Main Chart (8 cols) -->
            <div class="lg:col-span-8 h-80 sm:h-96">
                <canvas id="energyChart"></canvas>
            </div>

            <!-- Stats Summary Cards (4 cols) -->
            <div class="lg:col-span-4 space-y-4">
                <div class="p-4 rounded-2xl bg-white/[0.04] border border-white/10 hover:border-amber-400/30 transition-colors flex items-center justify-between">
                    <div>
                        <p class="text-xs font-semibold text-slate-400">Total Penggunaan Energi</p>
                        <p class="text-2xl font-extrabold text-white mt-1">
                            {{ number_format($energyStats['totalUsage'] ?? 0, 2) }} <span class="text-xs font-semibold text-amber-400">kWh</span>
                        </p>
                        <p class="text-[10px] text-slate-500 mt-0.5">Akumulasi seluruh sumber energi</p>
                    </div>
                    <div class="w-11 h-11 rounded-xl bg-amber-500/15 border border-amber-500/30 flex items-center justify-center text-amber-400 text-lg">
                        <i class="fa-solid fa-bolt"></i>
                    </div>
                </div>

                <div class="p-4 rounded-2xl bg-white/[0.04] border border-white/10 hover:border-emeraldBrand/30 transition-colors flex items-center justify-between">
                    <div>
                        <p class="text-xs font-semibold text-slate-400">Rata-rata Penggunaan Harian</p>
                        <p class="text-2xl font-extrabold text-white mt-1">
                            {{ number_format($energyStats['averageDaily'] ?? 0, 2) }} <span class="text-xs font-semibold text-mintGlow">kWh</span>
                        </p>
                        <p class="text-[10px] text-slate-500 mt-0.5">Konsumsi stabil harian</p>
                    </div>
                    <div class="w-11 h-11 rounded-xl bg-emeraldBrand/15 border border-emeraldBrand/30 flex items-center justify-center text-mintGlow text-lg">
                        <i class="fa-solid fa-gauge-high"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@section('scripts')
<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Prepare data for Carbon Chart
    const carbonData = @json($carbonHistory);
    const dates = carbonData.map(item => item.date);
    const totals = carbonData.map(item => item.total);
    const electricity = carbonData.map(item => item.electricity);
    const transportation = carbonData.map(item => item.transportation);
    const waste = carbonData.map(item => item.waste);
    const water = carbonData.map(item => item.water);

    const carbonChartCtx = document.getElementById('carbonChart');
    if (carbonChartCtx) {
        new Chart(carbonChartCtx, {
            type: 'line',
            data: {
                labels: dates.length ? dates : ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [
                    {
                        label: 'Total Emisi',
                        data: totals.length ? totals : [0, 0, 0, 0, 0, 0],
                        borderColor: '#10b981',
                        backgroundColor: 'rgba(16, 185, 129, 0.12)',
                        borderWidth: 3,
                        pointBackgroundColor: '#34d399',
                        pointBorderColor: '#050d0a',
                        pointBorderWidth: 2,
                        pointRadius: 4,
                        tension: 0.4,
                        fill: true
                    },
                    {
                        label: 'Listrik',
                        data: electricity.length ? electricity : [0, 0, 0, 0, 0, 0],
                        borderColor: '#fbbf24',
                        backgroundColor: 'rgba(251, 191, 36, 0.08)',
                        borderWidth: 2,
                        borderDash: [4, 4],
                        tension: 0.3,
                        fill: false
                    },
                    {
                        label: 'Transportasi',
                        data: transportation.length ? transportation : [0, 0, 0, 0, 0, 0],
                        borderColor: '#38bdf8',
                        backgroundColor: 'rgba(56, 189, 248, 0.08)',
                        borderWidth: 2,
                        tension: 0.3,
                        fill: false
                    },
                    {
                        label: 'Sampah',
                        data: waste.length ? waste : [0, 0, 0, 0, 0, 0],
                        borderColor: '#f87171',
                        backgroundColor: 'rgba(248, 113, 113, 0.08)',
                        borderWidth: 2,
                        tension: 0.3,
                        fill: false
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                        labels: {
                            color: '#94a3b8',
                            font: { family: 'Plus Jakarta Sans', size: 12, weight: 600 },
                            usePointStyle: true,
                            boxWidth: 8
                        }
                    },
                    tooltip: {
                        backgroundColor: 'rgba(5, 13, 10, 0.95)',
                        titleColor: '#ffffff',
                        bodyColor: '#34d399',
                        borderColor: 'rgba(52, 211, 153, 0.3)',
                        borderWidth: 1,
                        padding: 10,
                        cornerRadius: 12
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: { color: '#64748b', font: { family: 'Plus Jakarta Sans', size: 11 } },
                        grid: { color: 'rgba(255, 255, 255, 0.06)' }
                    },
                    x: {
                        ticks: { color: '#64748b', font: { family: 'Plus Jakarta Sans', size: 11 } },
                        grid: { color: 'rgba(255, 255, 255, 0.04)' }
                    }
                }
            }
        });
    }

    // Prepare data for Energy Chart
    const energyData = @json($energyConsumption);
    const energyDates = energyData.map(item => item.date);
    const electricityData = energyData.map(item => item.electricity);
    const fuelData = energyData.map(item => item.fuel);
    const gasData = energyData.map(item => item.gas);

    const energyChartCtx = document.getElementById('energyChart');
    if (energyChartCtx) {
        new Chart(energyChartCtx, {
            type: 'bar',
            data: {
                labels: energyDates.length ? energyDates : ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [
                    {
                        label: 'Listrik (kWh)',
                        data: electricityData.length ? electricityData : [0, 0, 0, 0, 0, 0],
                        backgroundColor: 'rgba(251, 191, 36, 0.75)',
                        borderColor: '#fbbf24',
                        borderWidth: 1,
                        borderRadius: 6
                    },
                    {
                        label: 'Bahan Bakar (Liter)',
                        data: fuelData.length ? fuelData : [0, 0, 0, 0, 0, 0],
                        backgroundColor: 'rgba(244, 63, 94, 0.75)',
                        borderColor: '#f43f5e',
                        borderWidth: 1,
                        borderRadius: 6
                    },
                    {
                        label: 'Gas Alam & LPG (m³/kg)',
                        data: gasData.length ? gasData : [0, 0, 0, 0, 0, 0],
                        backgroundColor: 'rgba(56, 189, 248, 0.75)',
                        borderColor: '#38bdf8',
                        borderWidth: 1,
                        borderRadius: 6
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                        labels: {
                            color: '#94a3b8',
                            font: { family: 'Plus Jakarta Sans', size: 12, weight: 600 },
                            usePointStyle: true,
                            boxWidth: 8
                        }
                    },
                    tooltip: {
                        backgroundColor: 'rgba(5, 13, 10, 0.95)',
                        titleColor: '#ffffff',
                        bodyColor: '#34d399',
                        borderColor: 'rgba(52, 211, 153, 0.3)',
                        borderWidth: 1,
                        padding: 10,
                        cornerRadius: 12,
                        callbacks: {
                            label: function(context) {
                                let label = context.dataset.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                if (context.parsed.y !== null) {
                                    label += context.parsed.y.toLocaleString('id-ID');
                                }
                                return label;
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: { color: '#64748b', font: { family: 'Plus Jakarta Sans', size: 11 } },
                        grid: { color: 'rgba(255, 255, 255, 0.06)' }
                    },
                    x: {
                        ticks: { color: '#64748b', font: { family: 'Plus Jakarta Sans', size: 11 } },
                        grid: { color: 'rgba(255, 255, 255, 0.04)' }
                    }
                }
            }
        });
    }
</script>
@endsection
