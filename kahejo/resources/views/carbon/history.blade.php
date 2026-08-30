@extends('layouts.app')

@section('title', 'Riwayat Jejak Karbon')

@section('content')
<div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8 space-y-8">

    <!-- Top Hero Header Card -->
    <div class="glass-card p-6 sm:p-8 relative overflow-hidden">
        <div class="absolute -right-16 -top-16 w-64 h-64 bg-emeraldBrand/15 rounded-full blur-3xl pointer-events-none"></div>

        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 relative z-10">
            <div>
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emeraldBrand/10 border border-emeraldBrand/25 text-mintGlow text-xs font-semibold mb-2">
                    <i class="fa-solid fa-calculator text-[11px]"></i>
                    <span>Log Emisi Personal & Fasilitas</span>
                </div>
                <h1 class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight">
                    Riwayat Perhitungan Jejak Karbon
                </h1>
                <p class="mt-1 text-sm text-slate-400 max-w-2xl">
                    Daftar seluruh riwayat kalkulasi jejak karbon (listrik, transportasi, limbah, dan air) yang telah Anda lakukan.
                </p>
            </div>

            <!-- Action Button -->
            <div class="flex items-center gap-3 self-start md:self-auto">
                <a href="{{ route('carbon') }}" 
                   class="px-5 py-2.5 rounded-xl bg-gradient-to-r from-emeraldBrand to-emeraldDark hover:from-[#18c58f] hover:to-emeraldDark text-white text-xs font-bold shadow-lg shadow-emeraldBrand/25 hover:shadow-emeraldBrand/40 transition-all duration-200 flex items-center gap-2">
                    <i class="fa-solid fa-plus text-xs"></i>
                    <span>Hitung Emisi Baru</span>
                </a>
            </div>
        </div>

        <!-- Metric Summary Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-6 pt-6 border-t border-white/[0.08]">
            <div class="p-4 rounded-xl bg-white/[0.02] border border-white/[0.06] flex items-center gap-4">
                <div class="w-10 h-10 rounded-xl bg-emeraldBrand/15 text-mintGlow flex items-center justify-center text-base shrink-0">
                    <i class="fa-solid fa-table-list"></i>
                </div>
                <div>
                    <span class="text-[10px] uppercase font-bold text-slate-400 block tracking-wider">Total Perhitungan</span>
                    <span class="text-xl font-extrabold text-white block mt-0.5">{{ $carbonFootprints->total() }} Sesi</span>
                </div>
            </div>

            <div class="p-4 rounded-xl bg-white/[0.02] border border-white/[0.06] flex items-center gap-4">
                <div class="w-10 h-10 rounded-xl bg-amber-500/15 text-amber-400 flex items-center justify-center text-base shrink-0">
                    <i class="fa-solid fa-clock-rotate-left"></i>
                </div>
                <div>
                    <span class="text-[10px] uppercase font-bold text-slate-400 block tracking-wider">Kalkulasi Terakhir</span>
                    <span class="text-base font-bold text-white block mt-0.5">
                        {{ $carbonFootprints->first() ? $carbonFootprints->first()->created_at->format('d M Y') : 'Belum Ada' }}
                    </span>
                </div>
            </div>

            <div class="p-4 rounded-xl bg-white/[0.02] border border-white/[0.06] flex items-center gap-4">
                <div class="w-10 h-10 rounded-xl bg-sky-500/15 text-sky-400 flex items-center justify-center text-base shrink-0">
                    <i class="fa-solid fa-gauge-high"></i>
                </div>
                <div>
                    <span class="text-[10px] uppercase font-bold text-slate-400 block tracking-wider">Emisi Rata-Rata</span>
                    <span class="text-base font-bold text-mintGlow block mt-0.5">
                        {{ number_format($carbonFootprints->avg('total') ?? 0, 1, ',', '.') }} kg CO₂e
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- History Table Card -->
    <div class="glass-card overflow-hidden">
        <div class="p-6 border-b border-white/[0.08] flex items-center justify-between flex-wrap gap-4">
            <div>
                <h2 class="text-lg font-bold text-white tracking-tight flex items-center gap-2">
                    <i class="fa-solid fa-list-check text-mintGlow text-sm"></i>
                    <span>Tabel Riwayat Kalkulasi Karbon</span>
                </h2>
                <p class="text-xs text-slate-400 mt-0.5">Rincian breakdown emisi per kategori aktivitas.</p>
            </div>

            <span class="text-xs text-slate-400">
                Halaman {{ $carbonFootprints->currentPage() }} dari {{ $carbonFootprints->lastPage() }}
            </span>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-white/[0.06] text-left text-xs">
                <thead class="bg-white/[0.02] text-slate-400 uppercase tracking-wider font-semibold">
                    <tr>
                        <th class="py-3.5 px-6">Tanggal</th>
                        <th class="py-3.5 px-6">Listrik</th>
                        <th class="py-3.5 px-6">Transportasi</th>
                        <th class="py-3.5 px-6">Limbah</th>
                        <th class="py-3.5 px-6">Air</th>
                        <th class="py-3.5 px-6">Total Emisi</th>
                        <th class="py-3.5 px-6 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/[0.04] text-slate-300">
                    @forelse($carbonFootprints as $carbon)
                        <tr class="hover:bg-white/[0.02] transition-colors group">
                            <!-- Date -->
                            <td class="py-4 px-6 whitespace-nowrap">
                                <div class="flex items-center gap-2 font-bold text-white">
                                    <i class="fa-solid fa-calendar-day text-slate-500 text-xs"></i>
                                    <span>{{ $carbon->created_at->format('d M Y, H:i') }}</span>
                                </div>
                            </td>

                            <!-- Electricity -->
                            <td class="py-4 px-6 whitespace-nowrap font-medium text-slate-300">
                                {{ number_format($carbon->electricity, 2, ',', '.') }} kg
                            </td>

                            <!-- Transportation -->
                            <td class="py-4 px-6 whitespace-nowrap font-medium text-slate-300">
                                {{ number_format($carbon->transportation, 2, ',', '.') }} kg
                            </td>

                            <!-- Waste -->
                            <td class="py-4 px-6 whitespace-nowrap font-medium text-slate-300">
                                {{ number_format($carbon->waste, 2, ',', '.') }} kg
                            </td>

                            <!-- Water -->
                            <td class="py-4 px-6 whitespace-nowrap font-medium text-slate-300">
                                {{ number_format($carbon->water, 2, ',', '.') }} kg
                            </td>

                            <!-- Total -->
                            <td class="py-4 px-6 whitespace-nowrap">
                                <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-lg bg-emeraldBrand/15 text-mintGlow border border-emeraldBrand/30 font-bold text-xs">
                                    <i class="fa-solid fa-leaf text-[10px]"></i>
                                    <span>{{ number_format($carbon->total, 2, ',', '.') }} kg CO₂e</span>
                                </div>
                            </td>

                            <!-- Action -->
                            <td class="py-4 px-6 whitespace-nowrap text-right">
                                <a href="{{ route('carbon.view', $carbon->id) }}" 
                                   class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-white/[0.05] hover:bg-emeraldBrand hover:text-white border border-white/10 hover:border-emeraldBrand text-slate-300 text-xs font-semibold transition-colors group-hover:border-emeraldBrand/40">
                                    <span>Rincian</span>
                                    <i class="fa-solid fa-chevron-right text-[10px]"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-12 px-6 text-center text-slate-400">
                                <i class="fa-solid fa-calculator text-4xl text-slate-600 mb-3 block"></i>
                                <p class="text-sm font-semibold text-white">Belum Ada Riwayat Perhitungan Karbon</p>
                                <p class="text-xs text-slate-400 mt-1">Gunakan kalkulator karbon untuk menghitung jejak emisi pertama Anda.</p>
                                <a href="{{ route('carbon') }}" class="inline-flex items-center gap-2 mt-4 px-4 py-2 rounded-xl bg-emeraldBrand text-white text-xs font-bold">
                                    <i class="fa-solid fa-plus text-xs"></i>
                                    <span>Hitung Sekarang</span>
                                </a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="p-6 border-t border-white/[0.08] flex justify-center">
            {{ $carbonFootprints->links() }}
        </div>
    </div>

</div>
@endsection