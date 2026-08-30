@extends('layouts.admin')

@section('title', 'Pencapaian Pengguna')
@section('page-title', 'User Achievements')

@section('main-content')
<div class="max-w-7xl mx-auto space-y-6">

    <!-- Header & Action Row -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight flex items-center gap-2.5">
                <i class="fa-solid fa-award text-emeraldBrand text-2xl"></i>
                <span>Capaian Prestasi Pengguna</span>
            </h1>
            <p class="text-slate-400 text-xs sm:text-sm mt-1">Daftar lencana keberlanjutan yang telah berhasil dibuka oleh masing-masing pengguna.</p>
        </div>

        <div class="flex items-center gap-3">
            <span class="px-3.5 py-1.5 rounded-full bg-emeraldBrand/10 border border-emeraldBrand/25 text-mintGlow text-xs font-semibold">
                Total: {{ count($userAchievements) }} Lencana Terbuka
            </span>
        </div>
    </div>

    <!-- User Achievements Glass Table Container -->
    <div class="glass-card overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-xs sm:text-sm">
                <thead>
                    <tr class="border-b border-emeraldBrand/20 bg-emerald-950/40 text-slate-300 font-bold uppercase tracking-wider text-[11px]">
                        <th class="py-4 px-6">No</th>
                        <th class="py-4 px-6">Pengguna</th>
                        <th class="py-4 px-6">Lencana Prestasi</th>
                        <th class="py-4 px-6">Kategori</th>
                        <th class="py-4 px-6">Tanggal Diraih</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5 text-slate-200">
                    @forelse($userAchievements as $userAchievement)
                    <tr class="hover:bg-white/[0.03] transition-colors">
                        <td class="py-4 px-6 font-semibold text-slate-400">
                            {{ $loop->iteration }}
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-xl bg-gradient-to-br from-emeraldBrand/30 to-teal-800/40 border border-emeraldBrand/30 flex items-center justify-center text-mintGlow font-bold text-xs shrink-0">
                                    {{ strtoupper(substr($userAchievement->user->name ?? 'U', 0, 2)) }}
                                </div>
                                <div>
                                    <div class="font-bold text-white">{{ $userAchievement->user->name ?? 'Pengguna' }}</div>
                                    <div class="text-[11px] text-slate-400">{{ $userAchievement->user->email ?? '-' }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex items-center gap-2.5">
                                <div class="w-7 h-7 rounded-lg bg-amber-500/15 border border-amber-500/30 flex items-center justify-center text-amber-400 text-xs">
                                    <i class="fa-solid fa-medal"></i>
                                </div>
                                <span class="font-bold text-white">{{ $userAchievement->achievement->name ?? 'Prestasi' }}</span>
                            </div>
                        </td>
                        <td class="py-4 px-6">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full bg-emeraldBrand/15 border border-emeraldBrand/30 text-mintGlow text-xs font-semibold">
                                {{ $userAchievement->achievement->category ?? 'Umum' }}
                            </span>
                        </td>
                        <td class="py-4 px-6 text-slate-400 text-xs font-mono">
                            {{ $userAchievement->created_at ? $userAchievement->created_at->format('d M Y, H:i') : '-' }}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-12 text-slate-400">
                            <div class="w-12 h-12 rounded-2xl bg-white/5 flex items-center justify-center text-slate-500 mx-auto mb-3 text-lg">
                                <i class="fa-solid fa-award"></i>
                            </div>
                            <p class="font-medium text-sm">Belum ada pengguna yang meraih lencana prestasi.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
