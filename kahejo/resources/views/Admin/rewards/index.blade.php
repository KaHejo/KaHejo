@extends('layouts.admin')

@section('title', 'Katalog Rewards')
@section('page-title', 'Rewards')

@section('main-content')
<div class="max-w-7xl mx-auto space-y-6">

    <!-- Header & Action Row -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight flex items-center gap-2.5">
                <i class="fa-solid fa-gift text-emeraldBrand text-2xl"></i>
                <span>Katalog Rewards & Hadiah</span>
            </h1>
            <p class="text-slate-400 text-xs sm:text-sm mt-1">Kelola daftar voucher belanja hijau, bibit pohon, dan merchandise untuk penukaran poin pengguna.</p>
        </div>

        <a href="{{ route('admin.rewards.create') }}" class="px-4 py-2.5 rounded-xl bg-gradient-to-r from-emeraldBrand to-emeraldDark hover:from-[#18c58f] hover:to-emeraldDark text-white text-xs font-bold shadow-lg shadow-emeraldBrand/25 transition-all transform hover:-translate-y-0.5 flex items-center gap-2 text-decoration-none self-start sm:self-auto">
            <i class="fa-solid fa-plus text-xs"></i>
            <span>Tambah Hadiah Baru</span>
        </a>
    </div>

    <!-- Rewards Glass Table Container -->
    <div class="glass-card overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-xs sm:text-sm">
                <thead>
                    <tr class="border-b border-emeraldBrand/20 bg-emerald-950/40 text-slate-300 font-bold uppercase tracking-wider text-[11px]">
                        <th class="py-4 px-6">No</th>
                        <th class="py-4 px-6">Foto</th>
                        <th class="py-4 px-6">Nama Hadiah</th>
                        <th class="py-4 px-6">Poin Dibutuhkan</th>
                        <th class="py-4 px-6">Stok Tersedia</th>
                        <th class="py-4 px-6">Deskripsi</th>
                        <th class="py-4 px-6 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5 text-slate-200">
                    @forelse($rewards as $item)
                    <tr class="hover:bg-white/[0.03] transition-colors">
                        <td class="py-4 px-6 font-semibold text-slate-400">
                            {{ $loop->iteration + ($rewards->currentPage() - 1) * $rewards->perPage() }}
                        </td>
                        <td class="py-4 px-6">
                            @php
                                $imgSrc = $item->reward_image ?? $item->image;
                            @endphp
                            @if($imgSrc)
                                <img src="{{ asset($imgSrc) }}" alt="{{ $item->reward_name ?? $item->name }}" class="h-12 w-12 object-cover rounded-xl border border-emeraldBrand/30 shadow-md">
                            @else
                                <div class="h-12 w-12 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center text-slate-500 text-xs">
                                    <i class="fa-solid fa-image"></i>
                                </div>
                            @endif
                        </td>
                        <td class="py-4 px-6">
                            <div class="font-bold text-white text-sm">{{ $item->reward_name ?? $item->name }}</div>
                            <div class="text-[11px] text-slate-400">ID: #RWD-{{ str_pad($item->id, 3, '0', STR_PAD_LEFT) }}</div>
                        </td>
                        <td class="py-4 px-6">
                            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-amber-500/15 border border-amber-500/30 text-amber-300 font-bold text-xs">
                                <i class="fa-solid fa-gem text-[10px]"></i>
                                <span>{{ number_format($item->points_required) }} Poin</span>
                            </span>
                        </td>
                        <td class="py-4 px-6">
                            @if($item->stock > 5)
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-emerald-500/15 border border-emerald-500/30 text-emerald-300 font-bold text-xs">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
                                    <span>{{ $item->stock }} Tersedia</span>
                                </span>
                            @elseif($item->stock > 0)
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-amber-500/15 border border-amber-500/30 text-amber-300 font-bold text-xs">
                                    <span class="w-1.5 h-1.5 rounded-full bg-amber-400 animate-pulse"></span>
                                    <span>Sisa {{ $item->stock }}</span>
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-rose-500/15 border border-rose-500/30 text-rose-300 font-bold text-xs">
                                    <span class="w-1.5 h-1.5 rounded-full bg-rose-400"></span>
                                    <span>Habis</span>
                                </span>
                            @endif
                        </td>
                        <td class="py-4 px-6 text-slate-400 max-w-xs truncate text-xs">
                            {{ $item->reward_description ?? $item->description ?? '-' }}
                        </td>
                        <td class="py-4 px-6 text-center whitespace-nowrap">
                            <div class="inline-flex items-center gap-2">
                                <a href="{{ route('admin.rewards.edit', $item->id) }}" class="w-8 h-8 rounded-lg bg-emerald-500/15 hover:bg-emerald-500/30 border border-emerald-500/30 text-mintGlow flex items-center justify-center transition-colors" title="Edit Reward">
                                    <i class="fa-solid fa-pen-to-square text-xs"></i>
                                </a>
                                <form action="{{ route('admin.rewards.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus reward ini?')" class="inline m-0">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="w-8 h-8 rounded-lg bg-rose-500/15 hover:bg-rose-500/30 border border-rose-500/30 text-rose-400 flex items-center justify-center transition-colors cursor-pointer" title="Hapus Reward">
                                        <i class="fa-solid fa-trash text-xs"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-12 text-slate-400">
                            <div class="w-12 h-12 rounded-2xl bg-white/5 flex items-center justify-center text-slate-500 mx-auto mb-3 text-lg">
                                <i class="fa-solid fa-gift"></i>
                            </div>
                            <p class="font-medium text-sm">Belum ada katalog reward.</p>
                            <a href="{{ route('admin.rewards.create') }}" class="text-xs text-mintGlow hover:underline mt-2 inline-block font-semibold">
                                + Buat Hadiah Pertama
                            </a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($rewards->hasPages())
        <div class="p-4 border-t border-white/10 flex justify-end">
            {{ $rewards->links() }}
        </div>
        @endif
    </div>

</div>
@endsection