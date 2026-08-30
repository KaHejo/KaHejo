@extends('layouts.admin')

@section('title', 'Riwayat Klaim Hadiah')
@section('page-title', 'History Claims')

@section('main-content')
<div class="max-w-7xl mx-auto space-y-6">

    <!-- Header & Action Row -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight flex items-center gap-2.5">
                <i class="fa-solid fa-receipt text-emeraldBrand text-2xl"></i>
                <span>Riwayat Klaim Hadiah (*History Claims*)</span>
            </h1>
            <p class="text-slate-400 text-xs sm:text-sm mt-1">Catatan audit penukaran poin reward oleh seluruh pengguna platform KaHejo.</p>
        </div>

        <div class="flex items-center gap-3">
            <span class="px-3.5 py-1.5 rounded-full bg-emeraldBrand/10 border border-emeraldBrand/25 text-mintGlow text-xs font-semibold">
                Total: {{ $claims->total() ?? $claims->count() }} Transaksi
            </span>
        </div>
    </div>

    <!-- History Claims Glass Table Container -->
    <div class="glass-card overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-xs sm:text-sm">
                <thead>
                    <tr class="border-b border-emeraldBrand/20 bg-emerald-950/40 text-slate-300 font-bold uppercase tracking-wider text-[11px]">
                        <th class="py-4 px-6">No</th>
                        <th class="py-4 px-6">Pengguna</th>
                        <th class="py-4 px-6">Reward yang Diklaim</th>
                        <th class="py-4 px-6">Poin Digunakan</th>
                        <th class="py-4 px-6">Status</th>
                        <th class="py-4 px-6">Waktu Transaksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5 text-slate-200">
                    @forelse($claims as $claim)
                    <tr class="hover:bg-white/[0.03] transition-colors">
                        <td class="py-4 px-6 font-semibold text-slate-400">
                            {{ $loop->iteration + ($claims->currentPage() - 1) * $claims->perPage() }}
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-xl bg-gradient-to-br from-emeraldBrand/30 to-teal-800/40 border border-emeraldBrand/30 flex items-center justify-center text-mintGlow font-bold text-xs shrink-0">
                                    {{ strtoupper(substr($claim->user->name ?? 'U', 0, 2)) }}
                                </div>
                                <div>
                                    <div class="font-bold text-white">{{ $claim->user->name ?? 'Pengguna' }}</div>
                                    <div class="text-[11px] text-slate-400">{{ $claim->user->email ?? '-' }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex items-center gap-2.5">
                                <div class="w-7 h-7 rounded-lg bg-teal-500/15 border border-teal-500/30 flex items-center justify-center text-teal-400 text-xs">
                                    <i class="fa-solid fa-gift"></i>
                                </div>
                                <span class="font-semibold text-slate-200">{{ $claim->reward->reward_name ?? $claim->reward->name ?? 'Reward' }}</span>
                            </div>
                        </td>
                        <td class="py-4 px-6">
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-amber-500/15 border border-amber-500/30 text-amber-300 font-bold text-xs">
                                <i class="fa-solid fa-gem text-[10px]"></i>
                                <span>-{{ number_format($claim->points_used ?? $claim->reward->points_required ?? 0) }} Poin</span>
                            </span>
                        </td>
                        <td class="py-4 px-6">
                            @php
                                $status = strtolower($claim->status ?? 'approved');
                            @endphp
                            @if($status === 'approved' || $status === 'selesai' || $status === 'success')
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-emerald-500/15 border border-emerald-500/30 text-emerald-300 font-semibold text-xs">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
                                    <span>Berhasil / Disetujui</span>
                                </span>
                            @elseif($status === 'pending')
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-amber-500/15 border border-amber-500/30 text-amber-300 font-semibold text-xs">
                                    <span class="w-1.5 h-1.5 rounded-full bg-amber-400 animate-pulse"></span>
                                    <span>Menunggu Konfirmasi</span>
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-slate-500/15 border border-slate-500/30 text-slate-300 font-semibold text-xs">
                                    <span>{{ ucfirst($status) }}</span>
                                </span>
                            @endif
                        </td>
                        <td class="py-4 px-6 text-slate-400 text-xs font-mono">
                            {{ $claim->created_at ? $claim->created_at->format('d M Y, H:i') : '-' }}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-12 text-slate-400">
                            <div class="w-12 h-12 rounded-2xl bg-white/5 flex items-center justify-center text-slate-500 mx-auto mb-3 text-lg">
                                <i class="fa-solid fa-receipt"></i>
                            </div>
                            <p class="font-medium text-sm">Belum ada riwayat transaksi klaim hadiah.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($claims->hasPages())
        <div class="p-4 border-t border-white/10 flex justify-end">
            {{ $claims->links() }}
        </div>
        @endif
    </div>

</div>
@endsection