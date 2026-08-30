@extends('layouts.admin')

@section('title', 'Dashboard Admin')
@section('page-title', 'Overview Konsol')

@section('main-content')
<div class="max-w-7xl mx-auto space-y-8">

    <!-- Hero Welcome Banner -->
    <div class="glass-card p-6 sm:p-8 relative overflow-hidden">
        <!-- Ambient radial shine -->
        <div class="absolute -top-16 -right-16 w-64 h-64 bg-emeraldBrand/15 rounded-full blur-3xl pointer-events-none"></div>
        <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-5">
            <div class="space-y-2">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emeraldBrand/10 border border-emeraldBrand/25 text-mintGlow text-xs font-semibold">
                    <span class="w-2 h-2 rounded-full bg-emeraldBrand animate-pulse"></span>
                    <span>Pusat Kendali Operasional KaHejo</span>
                </div>
                <h1 class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight">
                    Selamat Datang di Konsol <span class="bg-gradient-to-r from-mintGlow to-emeraldBrand bg-clip-text text-transparent">Administrator.</span>
                </h1>
                <p class="text-slate-300 text-xs sm:text-sm max-w-2xl leading-relaxed">
                    Pantau seluruh metrik operasional platform dekarbonisasi, verifikasi aktivitas komunitas, dan kelola ekosistem keberlanjutan secara terpadu dalam satu panel kontrol.
                </p>
            </div>

            <div class="flex items-center gap-3 shrink-0">
                <a href="{{ route('admin.rewards.create') }}" class="px-4 py-2.5 rounded-xl bg-gradient-to-r from-emeraldBrand to-emeraldDark hover:from-[#18c58f] hover:to-emeraldDark text-white text-xs font-bold shadow-lg shadow-emeraldBrand/25 transition-all transform hover:-translate-y-0.5 flex items-center gap-2 text-decoration-none">
                    <i class="fa-solid fa-plus text-xs"></i>
                    <span>Tambah Reward</span>
                </a>
                <a href="{{ route('admin.faqs.create') }}" class="px-4 py-2.5 rounded-xl bg-white/[0.06] hover:bg-white/[0.12] border border-white/15 text-slate-200 text-xs font-semibold transition-all flex items-center gap-2 text-decoration-none">
                    <i class="fa-solid fa-circle-plus text-xs text-mintGlow"></i>
                    <span>Tambah FAQ</span>
                </a>
            </div>
        </div>
    </div>

    <!-- 6 Glass Metric Summary Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-4 sm:gap-5">
        
        <!-- Card 1: Users -->
        <div class="glass-card p-5 flex flex-col justify-between group">
            <div class="flex items-center justify-between mb-3">
                <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Total Pengguna</span>
                <div class="w-8 h-8 rounded-xl bg-emerald-500/15 border border-emerald-500/30 flex items-center justify-center text-mintGlow text-xs group-hover:scale-110 transition-transform">
                    <i class="fa-solid fa-users"></i>
                </div>
            </div>
            <div>
                <div class="text-2xl lg:text-3xl font-extrabold text-white tracking-tight">{{ number_format($usersCount) }}</div>
                <div class="text-[11px] text-slate-400 mt-1 flex items-center gap-1">
                    <span class="text-emeraldBrand font-bold">Terdaftar</span> di platform
                </div>
            </div>
        </div>

        <!-- Card 2: Achievements -->
        <div class="glass-card p-5 flex flex-col justify-between group">
            <div class="flex items-center justify-between mb-3">
                <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Total Prestasi</span>
                <div class="w-8 h-8 rounded-xl bg-amber-500/15 border border-amber-500/30 flex items-center justify-center text-amber-400 text-xs group-hover:scale-110 transition-transform">
                    <i class="fa-solid fa-medal"></i>
                </div>
            </div>
            <div>
                <div class="text-2xl lg:text-3xl font-extrabold text-white tracking-tight">{{ number_format($achievementsCount) }}</div>
                <div class="text-[11px] text-slate-400 mt-1 flex items-center gap-1">
                    <span class="text-amber-400 font-bold">Lencana</span> siap dicapai
                </div>
            </div>
        </div>

        <!-- Card 3: Emission Factors -->
        <div class="glass-card p-5 flex flex-col justify-between group">
            <div class="flex items-center justify-between mb-3">
                <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Faktor Emisi</span>
                <div class="w-8 h-8 rounded-xl bg-cyan-500/15 border border-cyan-500/30 flex items-center justify-center text-cyan-400 text-xs group-hover:scale-110 transition-transform">
                    <i class="fa-solid fa-smog"></i>
                </div>
            </div>
            <div>
                <div class="text-2xl lg:text-3xl font-extrabold text-white tracking-tight">{{ number_format($emisiCount) }}</div>
                <div class="text-[11px] text-slate-400 mt-1 flex items-center gap-1">
                    <span class="text-cyan-400 font-bold">Standar ESDM</span> & IPCC
                </div>
            </div>
        </div>

        <!-- Card 4: History Claims -->
        <div class="glass-card p-5 flex flex-col justify-between group">
            <div class="flex items-center justify-between mb-3">
                <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Total Klaim</span>
                <div class="w-8 h-8 rounded-xl bg-purple-500/15 border border-purple-500/30 flex items-center justify-center text-purple-400 text-xs group-hover:scale-110 transition-transform">
                    <i class="fa-solid fa-receipt"></i>
                </div>
            </div>
            <div>
                <div class="text-2xl lg:text-3xl font-extrabold text-white tracking-tight">{{ number_format($historyClaimsCount) }}</div>
                <div class="text-[11px] text-slate-400 mt-1 flex items-center gap-1">
                    <span class="text-purple-400 font-bold">Penukaran</span> reward
                </div>
            </div>
        </div>

        <!-- Card 5: Rewards -->
        <div class="glass-card p-5 flex flex-col justify-between group">
            <div class="flex items-center justify-between mb-3">
                <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Katalog Hadiah</span>
                <div class="w-8 h-8 rounded-xl bg-teal-500/15 border border-teal-500/30 flex items-center justify-center text-teal-400 text-xs group-hover:scale-110 transition-transform">
                    <i class="fa-solid fa-gift"></i>
                </div>
            </div>
            <div>
                <div class="text-2xl lg:text-3xl font-extrabold text-white tracking-tight">{{ number_format($rewardsCount) }}</div>
                <div class="text-[11px] text-slate-400 mt-1 flex items-center gap-1">
                    <span class="text-teal-400 font-bold">Voucher & Barang</span> aktif
                </div>
            </div>
        </div>

        <!-- Card 6: Total Points -->
        <div class="glass-card p-5 flex flex-col justify-between group">
            <div class="flex items-center justify-between mb-3">
                <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Total Poin</span>
                <div class="w-8 h-8 rounded-xl bg-rose-500/15 border border-rose-500/30 flex items-center justify-center text-rose-400 text-xs group-hover:scale-110 transition-transform">
                    <i class="fa-solid fa-gem"></i>
                </div>
            </div>
            <div>
                <div class="text-2xl lg:text-3xl font-extrabold text-white tracking-tight">{{ number_format($totalPoints) }}</div>
                <div class="text-[11px] text-slate-400 mt-1 flex items-center gap-1">
                    <span class="text-rose-400 font-bold">Poin Hijau</span> beredar
                </div>
            </div>
        </div>

    </div>

    <!-- Main Chart Section: Monthly History Claims -->
    <div class="glass-card p-6 sm:p-8">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6 pb-4 border-b border-white/10">
            <div>
                <h2 class="text-lg sm:text-xl font-bold text-white tracking-tight flex items-center gap-2">
                    <i class="fa-solid fa-chart-column text-emeraldBrand text-base"></i>
                    <span>Analisis Penukaran Hadiah (*History Claims per Bulan*)</span>
                </h2>
                <p class="text-slate-400 text-xs mt-1">Tren frekuensi klaim reward oleh seluruh pengguna platform KaHejo.</p>
            </div>
            <div class="flex items-center gap-2 text-xs font-semibold text-mintGlow bg-emeraldBrand/10 border border-emeraldBrand/20 px-3 py-1.5 rounded-full self-start sm:self-auto">
                <span class="w-2 h-2 rounded-full bg-emeraldBrand animate-pulse"></span>
                <span>Statistik Terverifikasi</span>
            </div>
        </div>

        <div class="relative w-full" style="min-height: 300px; height: 350px;">
            <canvas id="historyClaimChart"></canvas>
        </div>
    </div>

    <!-- Quick Control Shortcuts -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
        <div class="glass-card p-6 flex items-start gap-4">
            <div class="w-10 h-10 rounded-xl bg-emerald-500/15 border border-emerald-500/30 flex items-center justify-center text-emeraldBrand text-base shrink-0">
                <i class="fa-solid fa-users-gear"></i>
            </div>
            <div>
                <h3 class="text-sm font-bold text-white mb-1">Kelola Anggota</h3>
                <p class="text-xs text-slate-400 mb-3">Lihat dan audit saldo poin serta data akun pengguna terdaftar.</p>
                <a href="{{ route('admin.users.index') }}" class="text-xs text-mintGlow font-semibold hover:underline flex items-center gap-1">
                    Buka Data Pengguna &rarr;
                </a>
            </div>
        </div>

        <div class="glass-card p-6 flex items-start gap-4">
            <div class="w-10 h-10 rounded-xl bg-teal-500/15 border border-teal-500/30 flex items-center justify-center text-teal-400 text-base shrink-0">
                <i class="fa-solid fa-boxes-packing"></i>
            </div>
            <div>
                <h3 class="text-sm font-bold text-white mb-1">Stok & Voucher Hadiah</h3>
                <p class="text-xs text-slate-400 mb-3">Atur ketersediaan voucher dan syarat poin penukaran bibit pohon.</p>
                <a href="{{ route('admin.rewards.index') }}" class="text-xs text-mintGlow font-semibold hover:underline flex items-center gap-1">
                    Kelola Katalog Hadiah &rarr;
                </a>
            </div>
        </div>

        <div class="glass-card p-6 flex items-start gap-4">
            <div class="w-10 h-10 rounded-xl bg-cyan-500/15 border border-cyan-500/30 flex items-center justify-center text-cyan-400 text-base shrink-0">
                <i class="fa-solid fa-calculator"></i>
            </div>
            <div>
                <h3 class="text-sm font-bold text-white mb-1">Faktor Emisi Nasional</h3>
                <p class="text-xs text-slate-400 mb-3">Perbarui koefisien konversi listrik, BBM, dan gas sesuai regulasi ESDM.</p>
                <a href="{{ route('admin.emission-factors.index') }}" class="text-xs text-mintGlow font-semibold hover:underline flex items-center gap-1">
                    Atur Koefisien Emisi &rarr;
                </a>
            </div>
        </div>
    </div>

</div>

<!-- Chart Script -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const canvas = document.getElementById('historyClaimChart');
        if (!canvas) return;

        const ctx = canvas.getContext('2d');
        const months = {!! json_encode($historyClaimMonths) !!};
        const counts = {!! json_encode($historyClaimCounts) !!};

        // If no data, provide default monthly labels
        const displayLabels = (months && months.length > 0) ? months : ['Jan 2026', 'Feb 2026', 'Mar 2026', 'Apr 2026', 'Mei 2026', 'Jun 2026', 'Jul 2026', 'Agu 2026'];
        const displayData = (counts && counts.length > 0) ? counts : [0, 0, 0, 0, 0, 0, 0, 0];

        // Gradient for bars
        const barGradient = ctx.createLinearGradient(0, 0, 0, 300);
        barGradient.addColorStop(0, 'rgba(16, 185, 129, 0.9)');
        barGradient.addColorStop(1, 'rgba(5, 150, 105, 0.2)');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: displayLabels,
                datasets: [{
                    label: 'Total Klaim Diselesaikan',
                    data: displayData,
                    backgroundColor: barGradient,
                    borderColor: '#34d399',
                    borderWidth: 1.5,
                    borderRadius: 8,
                    maxBarThickness: 42,
                    hoverBackgroundColor: '#34d399',
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        backgroundColor: 'rgba(6, 22, 16, 0.95)',
                        borderColor: 'rgba(52, 211, 153, 0.4)',
                        borderWidth: 1,
                        titleColor: '#ffffff',
                        bodyColor: '#34d399',
                        padding: 12,
                        cornerRadius: 10,
                        callbacks: {
                            label: function(context) {
                                return ' ' + context.parsed.y + ' Penukaran Hadiah';
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        grid: {
                            color: 'rgba(255, 255, 255, 0.04)'
                        },
                        ticks: {
                            color: '#94a3b8',
                            font: { family: 'Plus Jakarta Sans', size: 11 }
                        }
                    },
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(255, 255, 255, 0.04)'
                        },
                        ticks: {
                            color: '#94a3b8',
                            font: { family: 'Plus Jakarta Sans', size: 11 },
                            stepSize: 1
                        }
                    }
                }
            }
        });
    });
</script>
@endsection