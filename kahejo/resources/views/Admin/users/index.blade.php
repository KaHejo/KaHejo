@extends('layouts.admin')

@section('title', 'Manajemen Pengguna')
@section('page-title', 'Pengguna')

@section('main-content')
<div class="max-w-7xl mx-auto space-y-6">

    <!-- Header & Action Row -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight flex items-center gap-2.5">
                <i class="fa-solid fa-users text-emeraldBrand text-2xl"></i>
                <span>Manajemen Pengguna</span>
            </h1>
            <p class="text-slate-400 text-xs sm:text-sm mt-1">Daftar seluruh akun pengguna yang terdaftar di platform KaHejo beserta akumulasi poin hijau.</p>
        </div>

        <div class="flex items-center gap-3">
            <span class="px-3.5 py-1.5 rounded-full bg-emeraldBrand/10 border border-emeraldBrand/25 text-mintGlow text-xs font-semibold">
                Total: {{ $users->total() ?? $users->count() }} Anggota
            </span>
        </div>
    </div>

    <!-- Users Glass Table Container -->
    <div class="glass-card overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-xs sm:text-sm">
                <thead>
                    <tr class="border-b border-emeraldBrand/20 bg-emerald-950/40 text-slate-300 font-bold uppercase tracking-wider text-[11px]">
                        <th class="py-4 px-6">No</th>
                        <th class="py-4 px-6">Pengguna</th>
                        <th class="py-4 px-6">Alamat Email</th>
                        <th class="py-4 px-6">Perusahaan</th>
                        <th class="py-4 px-6">Saldo Poin</th>
                        <th class="py-4 px-6">Tanggal Bergabung</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5 text-slate-200">
                    @forelse($users as $user)
                    <tr class="hover:bg-white/[0.03] transition-colors">
                        <td class="py-4 px-6 font-semibold text-slate-400">
                            {{ $loop->iteration + ($users->currentPage() - 1) * $users->perPage() }}
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-emeraldBrand/30 to-teal-800/40 border border-emeraldBrand/30 flex items-center justify-center text-mintGlow font-bold text-xs shrink-0">
                                    {{ strtoupper(substr($user->name, 0, 2)) }}
                                </div>
                                <div>
                                    <div class="font-bold text-white">{{ $user->name }}</div>
                                    <div class="text-[11px] text-slate-400">ID: #USR-{{ str_pad($user->id, 4, '0', STR_PAD_LEFT) }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="py-4 px-6 text-slate-300 font-mono text-xs">
                            {{ $user->email }}
                        </td>
                        <td class="py-4 px-6 text-slate-400">
                            {{ $user->company ?? 'Individu' }}
                        </td>
                        <td class="py-4 px-6">
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emeraldBrand/15 border border-emeraldBrand/30 text-mintGlow font-bold text-xs">
                                <i class="fa-solid fa-gem text-[10px]"></i>
                                <span>{{ number_format($user->points ?? 0) }} Poin</span>
                            </span>
                        </td>
                        <td class="py-4 px-6 text-slate-400 text-xs">
                            {{ $user->created_at ? $user->created_at->format('d M Y') : '-' }}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-12 text-slate-400">
                            <div class="w-12 h-12 rounded-2xl bg-white/5 flex items-center justify-center text-slate-500 mx-auto mb-3 text-lg">
                                <i class="fa-solid fa-user-slash"></i>
                            </div>
                            <p class="font-medium text-sm">Belum ada data pengguna yang terdaftar.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($users->hasPages())
        <div class="p-4 border-t border-white/10 flex justify-end">
            {{ $users->links() }}
        </div>
        @endif
    </div>

</div>
@endsection