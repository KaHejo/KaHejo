@extends('layouts.admin')

@section('title', 'Katalog Prestasi')
@section('page-title', 'Prestasi')

@section('main-content')
<div class="max-w-7xl mx-auto space-y-6">

    <!-- Header & Action Row -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight flex items-center gap-2.5">
                <i class="fa-solid fa-medal text-emeraldBrand text-2xl"></i>
                <span>Katalog Prestasi & Lencana</span>
            </h1>
            <p class="text-slate-400 text-xs sm:text-sm mt-1">Kelola lencana penghargaan dan insentif poin yang dapat diraih pengguna melalui aksi pengurangan jejak karbon.</p>
        </div>

        <a href="{{ route('admin.achievements.create') }}" class="px-4 py-2.5 rounded-xl bg-gradient-to-r from-emeraldBrand to-emeraldDark hover:from-[#18c58f] hover:to-emeraldDark text-white text-xs font-bold shadow-lg shadow-emeraldBrand/25 transition-all transform hover:-translate-y-0.5 flex items-center gap-2 text-decoration-none self-start sm:self-auto">
            <i class="fa-solid fa-plus text-xs"></i>
            <span>Tambah Prestasi Baru</span>
        </a>
    </div>

    <!-- Achievements Glass Table Container -->
    <div class="glass-card overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-xs sm:text-sm">
                <thead>
                    <tr class="border-b border-emeraldBrand/20 bg-emerald-950/40 text-slate-300 font-bold uppercase tracking-wider text-[11px]">
                        <th class="py-4 px-6">No</th>
                        <th class="py-4 px-6">Ikon Lencana</th>
                        <th class="py-4 px-6">Nama Prestasi</th>
                        <th class="py-4 px-6">Kategori</th>
                        <th class="py-4 px-6">Syarat Poin</th>
                        <th class="py-4 px-6">Hadiah Poin</th>
                        <th class="py-4 px-6">Deskripsi</th>
                        <th class="py-4 px-6 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5 text-slate-200">
                    @forelse($achievements as $achievement)
                    <tr class="hover:bg-white/[0.03] transition-colors">
                        <td class="py-4 px-6 font-semibold text-slate-400">
                            {{ $loop->iteration }}
                        </td>
                        <td class="py-4 px-6">
                            @if($achievement->icon)
                                <img src="{{ asset($achievement->icon) }}" alt="{{ $achievement->name }}" class="h-11 w-11 object-cover rounded-xl border border-amber-500/30 shadow-md">
                            @else
                                <div class="h-11 w-11 rounded-xl bg-amber-500/15 border border-amber-500/30 flex items-center justify-center text-amber-400 text-base">
                                    <i class="fa-solid fa-medal"></i>
                                </div>
                            @endif
                        </td>
                        <td class="py-4 px-6">
                            <div class="font-bold text-white text-sm">{{ $achievement->name }}</div>
                            <div class="text-[11px] text-slate-400">ID: #ACH-{{ str_pad($achievement->id, 3, '0', STR_PAD_LEFT) }}</div>
                        </td>
                        <td class="py-4 px-6">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full bg-emeraldBrand/15 border border-emeraldBrand/30 text-mintGlow text-xs font-semibold">
                                {{ $achievement->category ?? 'Umum' }}
                            </span>
                        </td>
                        <td class="py-4 px-6 text-slate-300 font-mono">
                            {{ number_format($achievement->points_needed ?? 0) }} Poin
                        </td>
                        <td class="py-4 px-6">
                            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-emerald-500/15 border border-emerald-500/30 text-emerald-300 font-bold text-xs">
                                <i class="fa-solid fa-plus text-[10px]"></i>
                                <span>{{ number_format($achievement->points_awarded ?? 0) }}</span>
                            </span>
                        </td>
                        <td class="py-4 px-6 text-slate-400 max-w-xs truncate text-xs">
                            {{ $achievement->description ?? '-' }}
                        </td>
                        <td class="py-4 px-6 text-center whitespace-nowrap">
                            <div class="inline-flex items-center gap-2">
                                <a href="{{ route('admin.achievements.edit', $achievement->id) }}" class="w-8 h-8 rounded-lg bg-emerald-500/15 hover:bg-emerald-500/30 border border-emerald-500/30 text-mintGlow flex items-center justify-center transition-colors" title="Edit Prestasi">
                                    <i class="fa-solid fa-pen-to-square text-xs"></i>
                                </a>
                                <form action="{{ route('admin.achievements.destroy', $achievement->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus prestasi ini?')" class="inline m-0">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="w-8 h-8 rounded-lg bg-rose-500/15 hover:bg-rose-500/30 border border-rose-500/30 text-rose-400 flex items-center justify-center transition-colors cursor-pointer" title="Hapus Prestasi">
                                        <i class="fa-solid fa-trash text-xs"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center py-12 text-slate-400">
                            <div class="w-12 h-12 rounded-2xl bg-white/5 flex items-center justify-center text-slate-500 mx-auto mb-3 text-lg">
                                <i class="fa-solid fa-medal"></i>
                            </div>
                            <p class="font-medium text-sm">Belum ada lencana prestasi yang dibuat.</p>
                            <a href="{{ route('admin.achievements.create') }}" class="text-xs text-mintGlow hover:underline mt-2 inline-block font-semibold">
                                + Buat Prestasi Baru
                            </a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection