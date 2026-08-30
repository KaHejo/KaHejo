@extends('layouts.admin')

@section('title', 'Faktor Konversi Emisi')
@section('page-title', 'Faktor Emisi')

@section('main-content')
<div class="max-w-7xl mx-auto space-y-6">

    <!-- Header & Action Row -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight flex items-center gap-2.5">
                <i class="fa-solid fa-smog text-emeraldBrand text-2xl"></i>
                <span>Faktor Konversi Emisi Nasional</span>
            </h1>
            <p class="text-slate-400 text-xs sm:text-sm mt-1">Koefisien baku emisi GRK resmi (ESDM, IPCC, & KLHK) yang digunakan dalam mesin kalkulator KaHejo.</p>
        </div>

        <a href="{{ route('admin.emission-factors.create') }}" class="px-4 py-2.5 rounded-xl bg-gradient-to-r from-emeraldBrand to-emeraldDark hover:from-[#18c58f] hover:to-emeraldDark text-white text-xs font-bold shadow-lg shadow-emeraldBrand/25 transition-all transform hover:-translate-y-0.5 flex items-center gap-2 text-decoration-none self-start sm:self-auto">
            <i class="fa-solid fa-plus text-xs"></i>
            <span>Tambah Faktor Baru</span>
        </a>
    </div>

    <!-- Emission Factors Glass Table Container -->
    <div class="glass-card overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-xs sm:text-sm">
                <thead>
                    <tr class="border-b border-emeraldBrand/20 bg-emerald-950/40 text-slate-300 font-bold uppercase tracking-wider text-[11px]">
                        <th class="py-4 px-6">Nama Sumber</th>
                        <th class="py-4 px-6">Kategori</th>
                        <th class="py-4 px-6">Nilai Faktor</th>
                        <th class="py-4 px-6">Satuan (Unit)</th>
                        <th class="py-4 px-6">Rujukan / Sumber</th>
                        <th class="py-4 px-6 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5 text-slate-200">
                    @forelse($factors as $factor)
                    <tr class="hover:bg-white/[0.03] transition-colors">
                        <td class="py-4 px-6 font-bold text-white">
                            {{ $factor->name }}
                        </td>
                        <td class="py-4 px-6">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full bg-emeraldBrand/15 border border-emeraldBrand/30 text-mintGlow text-xs font-semibold">
                                {{ $factor->category }}
                            </span>
                        </td>
                        <td class="py-4 px-6 font-mono font-bold text-emerald-300">
                            {{ $factor->value }}
                        </td>
                        <td class="py-4 px-6 text-slate-300 font-mono text-xs">
                            {{ $factor->unit }}
                        </td>
                        <td class="py-4 px-6 text-slate-400 text-xs">
                            {{ $factor->source ?? 'ESDM / IPCC' }}
                        </td>
                        <td class="py-4 px-6 text-center whitespace-nowrap">
                            <div class="inline-flex items-center gap-2">
                                <a href="{{ route('admin.emission-factors.edit', $factor) }}" class="w-8 h-8 rounded-lg bg-emerald-500/15 hover:bg-emerald-500/30 border border-emerald-500/30 text-mintGlow flex items-center justify-center transition-colors" title="Edit Faktor Emisi">
                                    <i class="fa-solid fa-pen-to-square text-xs"></i>
                                </a>
                                <form action="{{ route('admin.emission-factors.destroy', $factor) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus faktor emisi ini?')" class="inline m-0">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-8 h-8 rounded-lg bg-rose-500/15 hover:bg-rose-500/30 border border-rose-500/30 text-rose-400 flex items-center justify-center transition-colors cursor-pointer" title="Hapus Faktor Emisi">
                                        <i class="fa-solid fa-trash text-xs"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-12 text-slate-400">
                            <div class="w-12 h-12 rounded-2xl bg-white/5 flex items-center justify-center text-slate-500 mx-auto mb-3 text-lg">
                                <i class="fa-solid fa-smog"></i>
                            </div>
                            <p class="font-medium text-sm">Belum ada data faktor emisi.</p>
                            <a href="{{ route('admin.emission-factors.create') }}" class="text-xs text-mintGlow hover:underline mt-2 inline-block font-semibold">
                                + Buat Faktor Emisi Pertama
                            </a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Guideline Card -->
    <div class="glass-card p-6 sm:p-7">
        <h3 class="text-sm font-bold text-white mb-2 flex items-center gap-2">
            <i class="fa-solid fa-book-bookmark text-mintGlow"></i>
            <span>Pedoman Pengelolaan Faktor Konversi</span>
        </h3>
        <p class="text-xs text-slate-300 leading-relaxed mb-3">
            Faktor konversi emisi adalah koefisien ilmiah pengali yang mengubah jumlah konsumsi fisik (kWh listrik, Liter bahan bakar, m³ gas) menjadi satuan standar kilogram setara karbon dioksida (<strong class="text-emeraldBrand">kg CO₂e</strong>).
        </p>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 text-xs text-slate-400 pt-2 border-t border-white/10">
            <div class="flex items-center gap-2">
                <i class="fa-solid fa-bolt text-amber-400"></i>
                <span>Listrik Jamali: <strong>0,85 kg/kWh</strong></span>
            </div>
            <div class="flex items-center gap-2">
                <i class="fa-solid fa-gas-pump text-rose-400"></i>
                <span>Bensin Ron 92: <strong>2,31 kg/L</strong></span>
            </div>
            <div class="flex items-center gap-2">
                <i class="fa-solid fa-truck-droplet text-blue-400"></i>
                <span>Solar Diesel: <strong>2,68 kg/L</strong></span>
            </div>
        </div>
    </div>

</div>
@endsection
