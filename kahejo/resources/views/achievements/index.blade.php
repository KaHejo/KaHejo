@extends('layouts.app')

@section('title', 'Prestasi & Pencapaian')

@section('content')
<div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8 space-y-8">

    <!-- Top Hero Header & Points Summary Card -->
    <div class="glass-card p-6 sm:p-8 relative overflow-hidden">
        <div class="absolute -right-16 -top-16 w-64 h-64 bg-emeraldBrand/15 rounded-full blur-3xl pointer-events-none"></div>

        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 relative z-10">
            <div>
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emeraldBrand/10 border border-emeraldBrand/25 text-mintGlow text-xs font-semibold mb-2">
                    <i class="fa-solid fa-medal text-[11px]"></i>
                    <span>Gamifikasi & Eco Badges</span>
                </div>
                <h1 class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight">
                    Prestasi & Pencapaian
                </h1>
                <p class="mt-1 text-sm text-slate-400 max-w-2xl">
                    Kumpulkan poin dari setiap aksi pengurangan emisi dan catat jejak prestasi Anda untuk membuka lencana eksklusif.
                </p>
            </div>

            <!-- Total Points Balance Pill -->
            @php
                $user = Auth::user();
                $totalPoints = $user->points ?? 0;
                $userAchievements = $user->achievements ? $user->achievements->pluck('id')->toArray() : [];
                $totalCount = $achievements->total();
                $unlockedCount = count($userAchievements);
                $percentage = $totalCount > 0 ? round(($unlockedCount / $totalCount) * 100) : 0;
            @endphp
            <div class="flex items-center gap-4 self-start md:self-auto">
                <div class="p-4 rounded-2xl bg-white/[0.04] border border-white/10 flex items-center gap-3.5 shadow-lg shadow-black/20">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-amber-400 to-amber-600 flex items-center justify-center text-white text-xl shadow-lg shadow-amber-500/25 shrink-0">
                        <i class="fa-solid fa-coins"></i>
                    </div>
                    <div>
                        <span class="text-[10px] uppercase font-bold text-slate-400 block tracking-wider">Total Poin Anda</span>
                        <span class="text-xl font-black text-white leading-none block mt-0.5">
                            {{ number_format($totalPoints, 0, ',', '.') }} <span class="text-xs text-amber-400 font-semibold">PTS</span>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navigation Tabs: Prestasi & Rewards -->
        <div class="flex items-center gap-3 mt-6 pt-6 border-t border-white/[0.08]">
            <a href="{{ route('achievements') }}" 
               class="px-4 py-2 rounded-xl bg-emeraldBrand/20 text-mintGlow border border-emeraldBrand/40 text-xs font-bold flex items-center gap-2 shadow-sm">
                <i class="fa-solid fa-medal text-xs"></i>
                <span>Daftar Prestasi ({{ $unlockedCount }}/{{ $totalCount }})</span>
            </a>
            <a href="{{ route('rewards') }}" 
               class="px-4 py-2 rounded-xl bg-white/[0.04] hover:bg-white/[0.08] text-slate-300 hover:text-white border border-white/10 text-xs font-semibold flex items-center gap-2 transition-colors">
                <i class="fa-solid fa-gift text-xs text-amber-400"></i>
                <span>Tukar Rewards & Hadiah</span>
            </a>
        </div>
    </div>

    <!-- Overview Metrics Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
        <div class="glass-card p-5">
            <div class="flex items-center justify-between mb-3">
                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Prestasi Diraih</span>
                <div class="w-8 h-8 rounded-lg bg-emeraldBrand/15 text-mintGlow flex items-center justify-center text-xs">
                    <i class="fa-solid fa-circle-check"></i>
                </div>
            </div>
            <div class="text-2xl font-extrabold text-white">{{ $unlockedCount }} <span class="text-xs text-slate-400 font-normal">/ {{ $totalCount }} Badge</span></div>
            <p class="text-[11px] text-slate-400 mt-1">Lencana keberlanjutan yang telah aktif</p>
        </div>

        <div class="glass-card p-5">
            <div class="flex items-center justify-between mb-3">
                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Tingkat Kemajuan</span>
                <div class="w-8 h-8 rounded-lg bg-sky-500/15 text-sky-400 flex items-center justify-center text-xs">
                    <i class="fa-solid fa-chart-pie"></i>
                </div>
            </div>
            <div class="text-2xl font-extrabold text-white">{{ $percentage }}%</div>
            <div class="w-full bg-white/10 h-1.5 rounded-full overflow-hidden mt-2">
                <div class="bg-gradient-to-r from-emeraldBrand to-mintGlow h-full rounded-full" style="width: {{ $percentage }}%"></div>
            </div>
        </div>

        <div class="glass-card p-5">
            <div class="flex items-center justify-between mb-3">
                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Rewards Siap Ditukar</span>
                <div class="w-8 h-8 rounded-lg bg-amber-500/15 text-amber-400 flex items-center justify-center text-xs">
                    <i class="fa-solid fa-gift"></i>
                </div>
            </div>
            <div class="text-2xl font-extrabold text-white">Katalog Aktif</div>
            <a href="{{ route('rewards') }}" class="text-[11px] text-mintGlow hover:underline inline-flex items-center gap-1 mt-1 font-semibold">
                <span>Kunjungi Katalog Hadiah</span>
                <i class="fa-solid fa-arrow-right text-[9px]"></i>
            </a>
        </div>
    </div>

    <!-- Achievements Cards Grid -->
    <div class="space-y-4">
        <div class="flex items-center justify-between">
            <h2 class="text-lg font-bold text-white tracking-tight flex items-center gap-2">
                <i class="fa-solid fa-trophy text-amber-400 text-sm"></i>
                <span>Semua Lencana Prestasi</span>
            </h2>
            <span class="text-xs text-slate-400">Halaman {{ $achievements->currentPage() }} dari {{ $achievements->lastPage() }}</span>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse($achievements as $achievement)
                @php
                    $achieved = in_array($achievement->id, $userAchievements);
                @endphp
                <div class="glass-card p-6 flex flex-col items-center text-center relative overflow-hidden transition-all duration-300 group
                    {{ $achieved ? 'border-emeraldBrand/35 shadow-lg shadow-emeraldBrand/10' : 'opacity-70 hover:opacity-100' }}">
                    
                    @if($achieved)
                        <!-- Achieved Glow Ribbon/Badge -->
                        <div class="absolute top-3 right-3 px-2 py-0.5 rounded-full bg-emeraldBrand/20 border border-emeraldBrand/40 text-mintGlow text-[10px] font-bold flex items-center gap-1">
                            <i class="fa-solid fa-check text-[9px]"></i>
                            <span>Terbuka</span>
                        </div>
                    @else
                        <div class="absolute top-3 right-3 px-2 py-0.5 rounded-full bg-white/[0.05] border border-white/10 text-slate-400 text-[10px] font-semibold flex items-center gap-1">
                            <i class="fa-solid fa-lock text-[9px]"></i>
                            <span>Terkunci</span>
                        </div>
                    @endif

                    <!-- Icon Circle -->
                    <div class="w-20 h-20 mb-4 rounded-2xl flex items-center justify-center relative transition-transform duration-300 group-hover:scale-105
                        {{ $achieved 
                            ? 'bg-gradient-to-br from-emerald-600/30 to-emerald-950/80 border-2 border-emeraldBrand/50 shadow-xl shadow-emeraldBrand/25' 
                            : 'bg-white/[0.03] border border-white/10 grayscale' }}">
                        @if($achievement->icon)
                            <img src="{{ asset($achievement->icon) }}" alt="{{ $achievement->name }}" class="w-12 h-12 object-contain mx-auto">
                        @else
                            <i class="fa-solid fa-award text-3xl {{ $achieved ? 'text-mintGlow' : 'text-slate-500' }}"></i>
                        @endif
                    </div>

                    <!-- Details -->
                    <h3 class="font-extrabold text-white text-base mb-1.5 group-hover:text-mintGlow transition-colors line-clamp-1">
                        {{ $achievement->name }}
                    </h3>
                    <p class="text-xs text-slate-400 mb-4 line-clamp-2 leading-relaxed flex-1">
                        {{ $achievement->description }}
                    </p>

                    <!-- Meta Tags -->
                    <div class="w-full pt-3 border-t border-white/[0.08] flex items-center justify-between text-xs">
                        <span class="px-2.5 py-1 rounded-lg bg-white/[0.04] text-slate-300 text-[11px] font-medium">
                            {{ ucfirst($achievement->category ?? 'Umum') }}
                        </span>
                        <span class="px-2.5 py-1 rounded-lg font-bold flex items-center gap-1
                            {{ $achieved ? 'bg-amber-400/15 text-amber-300 border border-amber-400/30' : 'bg-white/[0.04] text-slate-400' }}">
                            <i class="fa-solid fa-coins text-[10px] text-amber-400"></i>
                            <span>+{{ $achievement->points_awarded ?? 0 }} pts</span>
                        </span>
                    </div>
                </div>
            @empty
                <div class="col-span-4 glass-card p-12 text-center text-slate-400">
                    <i class="fa-solid fa-medal text-4xl text-slate-600 mb-3 block"></i>
                    <p class="text-sm font-semibold text-white">Belum Ada Prestasi</p>
                    <p class="text-xs text-slate-400 mt-1">Data prestasi akan segera ditambahkan oleh administrator.</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-8 flex justify-center">
            {{ $achievements->links() }}
        </div>
    </div>

</div>
@endsection