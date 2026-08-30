@extends('layouts.app')

@section('title', 'Riwayat Konsumsi Energi')

@section('content')
<div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8 space-y-8">

    <!-- Top Hero Header Card -->
    <div class="glass-card p-6 sm:p-8 relative overflow-hidden">
        <div class="absolute -right-16 -top-16 w-64 h-64 bg-emeraldBrand/15 rounded-full blur-3xl pointer-events-none"></div>

        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 relative z-10">
            <div>
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emeraldBrand/10 border border-emeraldBrand/25 text-mintGlow text-xs font-semibold mb-2">
                    <i class="fa-solid fa-clock-rotate-left text-[11px]"></i>
                    <span>Log Emisi Historis</span>
                </div>
                <h1 class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight">
                    Riwayat Konsumsi Energi
                </h1>
                <p class="mt-1 text-sm text-slate-400 max-w-2xl">
                    Daftar seluruh catatan penggunaan energi operasional perusahaan yang telah tervalidasi oleh sistem KaHejo.
                </p>
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center gap-3 self-start md:self-auto">
                <a href="{{ route('company') }}" 
                   class="px-5 py-2.5 rounded-xl bg-gradient-to-r from-emeraldBrand to-emeraldDark hover:from-[#18c58f] hover:to-emeraldDark text-white text-xs font-bold shadow-lg shadow-emeraldBrand/25 hover:shadow-emeraldBrand/40 transition-all duration-200 flex items-center gap-2">
                    <i class="fa-solid fa-plus text-xs"></i>
                    <span>Catat Konsumsi Baru</span>
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
                    <span class="text-[10px] uppercase font-bold text-slate-400 block tracking-wider">Total Catatan</span>
                    <span class="text-xl font-extrabold text-white block mt-0.5">{{ $consumptions->total() }} Data</span>
                </div>
            </div>

            <div class="p-4 rounded-xl bg-white/[0.02] border border-white/[0.06] flex items-center gap-4">
                <div class="w-10 h-10 rounded-xl bg-amber-500/15 text-amber-400 flex items-center justify-center text-base shrink-0">
                    <i class="fa-solid fa-calendar-check"></i>
                </div>
                <div>
                    <span class="text-[10px] uppercase font-bold text-slate-400 block tracking-wider">Entri Terakhir</span>
                    <span class="text-base font-bold text-white block mt-0.5">
                        {{ $consumptions->first() ? \Carbon\Carbon::parse($consumptions->first()->consumption_date)->format('M Y') : 'Belum Ada' }}
                    </span>
                </div>
            </div>

            <div class="p-4 rounded-xl bg-white/[0.02] border border-white/[0.06] flex items-center gap-4">
                <div class="w-10 h-10 rounded-xl bg-sky-500/15 text-sky-400 flex items-center justify-center text-base shrink-0">
                    <i class="fa-solid fa-shield-halved"></i>
                </div>
                <div>
                    <span class="text-[10px] uppercase font-bold text-slate-400 block tracking-wider">Status Validasi</span>
                    <span class="text-xs font-bold text-mintGlow flex items-center gap-1.5 mt-1">
                        <span class="w-1.5 h-1.5 rounded-full bg-emeraldBrand animate-pulse"></span>
                        <span>Terverifikasi Otomatis</span>
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
                    <span>Tabel Catatan Konsumsi</span>
                </h2>
                <p class="text-xs text-slate-400 mt-0.5">Menampilkan seluruh riwayat inventarisasi energi Scope 1 & 2.</p>
            </div>

            <span class="text-xs text-slate-400">
                Halaman {{ $consumptions->currentPage() }} dari {{ $consumptions->lastPage() }}
            </span>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-white/[0.06] text-left text-xs">
                <thead class="bg-white/[0.02] text-slate-400 uppercase tracking-wider font-semibold">
                    <tr>
                        <th class="py-3.5 px-6">Periode</th>
                        <th class="py-3.5 px-6">Sumber Energi</th>
                        <th class="py-3.5 px-6">Jumlah Konsumsi</th>
                        <th class="py-3.5 px-6">Kategori Aktivitas</th>
                        <th class="py-3.5 px-6">Lokasi Fasilitas</th>
                        <th class="py-3.5 px-6 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/[0.04] text-slate-300">
                    @forelse($consumptions as $consumption)
                        <tr class="hover:bg-white/[0.02] transition-colors group">
                            <!-- Date / Period -->
                            <td class="py-4 px-6 whitespace-nowrap">
                                <div class="flex items-center gap-2 font-bold text-white">
                                    <i class="fa-solid fa-calendar-day text-slate-500 text-xs"></i>
                                    <span>{{ \Carbon\Carbon::parse($consumption->consumption_date)->format('F Y') }}</span>
                                </div>
                                <span class="text-[10px] text-slate-500 block mt-0.5">
                                    Laporan {{ ucfirst($consumption->reporting_period ?? 'Bulanan') }}
                                </span>
                            </td>

                            <!-- Source Type -->
                            <td class="py-4 px-6 whitespace-nowrap">
                                @php
                                    $source = strtolower($consumption->source_type);
                                @endphp
                                @if($source == 'electricity')
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-emeraldBrand/15 text-mintGlow border border-emeraldBrand/30 font-bold text-[11px]">
                                        <i class="fa-solid fa-bolt text-[10px]"></i>
                                        <span>Listrik</span>
                                    </span>
                                @elseif($source == 'gasoline')
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-amber-500/15 text-amber-300 border border-amber-500/30 font-bold text-[11px]">
                                        <i class="fa-solid fa-gas-pump text-[10px]"></i>
                                        <span>Bensin</span>
                                    </span>
                                @elseif($source == 'diesel')
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-orange-500/15 text-orange-300 border border-orange-500/30 font-bold text-[11px]">
                                        <i class="fa-solid fa-truck text-[10px]"></i>
                                        <span>Solar</span>
                                    </span>
                                @elseif($source == 'gas')
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-sky-500/15 text-sky-300 border border-sky-500/30 font-bold text-[11px]">
                                        <i class="fa-solid fa-fire-flame-simple text-[10px]"></i>
                                        <span>Gas Alam</span>
                                    </span>
                                @elseif($source == 'lpg')
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-indigo-500/15 text-indigo-300 border border-indigo-500/30 font-bold text-[11px]">
                                        <i class="fa-solid fa-box text-[10px]"></i>
                                        <span>LPG</span>
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-white/[0.06] text-white border border-white/10 font-bold text-[11px]">
                                        {{ ucfirst($consumption->source_type) }}
                                    </span>
                                @endif
                            </td>

                            <!-- Consumption Amount -->
                            <td class="py-4 px-6 whitespace-nowrap">
                                <span class="font-extrabold text-white text-sm">
                                    {{ number_format($consumption->consumption_amount, 2, ',', '.') }}
                                </span>
                                <span class="text-xs text-slate-400 font-semibold ml-1">
                                    {{ $consumption->unit_measurement }}
                                </span>
                            </td>

                            <!-- Activity Type -->
                            <td class="py-4 px-6 whitespace-nowrap">
                                <span class="px-2.5 py-1 rounded-lg bg-white/[0.04] text-slate-300 text-[11px] font-medium">
                                    {{ ucfirst($consumption->activity_type ?? 'Umum') }}
                                </span>
                            </td>

                            <!-- Location -->
                            <td class="py-4 px-6 whitespace-nowrap">
                                <span class="text-slate-300 flex items-center gap-1.5">
                                    <i class="fa-solid fa-location-dot text-slate-500 text-[11px]"></i>
                                    <span>{{ $consumption->location_name ?? 'Kantor / Pabrik Utama' }}</span>
                                </span>
                            </td>

                            <!-- Action -->
                            <td class="py-4 px-6 whitespace-nowrap text-right">
                                <a href="{{ route('company.view', $consumption->id) }}" 
                                   class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-white/[0.05] hover:bg-emeraldBrand hover:text-white border border-white/10 hover:border-emeraldBrand text-slate-300 text-xs font-semibold transition-colors group-hover:border-emeraldBrand/40">
                                    <span>Rincian</span>
                                    <i class="fa-solid fa-chevron-right text-[10px]"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-12 px-6 text-center text-slate-400">
                                <i class="fa-solid fa-folder-open text-4xl text-slate-600 mb-3 block"></i>
                                <p class="text-sm font-semibold text-white">Belum Ada Riwayat Konsumsi</p>
                                <p class="text-xs text-slate-400 mt-1">Gunakan formulir untuk mencatat konsumsi energi pertama Anda.</p>
                                <a href="{{ route('company') }}" class="inline-flex items-center gap-2 mt-4 px-4 py-2 rounded-xl bg-emeraldBrand text-white text-xs font-bold">
                                    <i class="fa-solid fa-plus text-xs"></i>
                                    <span>Catat Sekarang</span>
                                </a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="p-6 border-t border-white/[0.08] flex justify-center">
            {{ $consumptions->links() }}
        </div>
    </div>

</div>
@endsection