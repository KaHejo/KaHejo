@extends('layouts.admin')

@section('title', 'Tambah Faktor Emisi')
@section('page-title', 'Tambah Faktor Emisi')

@section('main-content')
<div class="max-w-3xl mx-auto space-y-6">

    <!-- Header & Back Button -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight flex items-center gap-2.5">
                <i class="fa-solid fa-smog text-emeraldBrand text-2xl"></i>
                <span>Tambah Faktor Emisi Baru</span>
            </h1>
            <p class="text-slate-400 text-xs sm:text-sm mt-1">Daftarkan koefisien konversi karbon baku berdasarkan rujukan resmi ESDM / IPCC.</p>
        </div>

        <a href="{{ route('admin.emission-factors.index') }}" class="px-3.5 py-2 rounded-xl bg-white/5 hover:bg-white/10 border border-white/10 text-slate-300 text-xs font-semibold flex items-center gap-2 text-decoration-none transition-colors">
            <i class="fa-solid fa-arrow-left"></i>
            <span>Kembali</span>
        </a>
    </div>

    <!-- Form Glass Card -->
    <div class="glass-card p-6 sm:p-8">
        <form action="{{ route('admin.emission-factors.store') }}" method="POST" class="space-y-5">
            @csrf

            <!-- Nama Faktor -->
            <div>
                <label for="name" class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">
                    Nama Sumber Energi / Material <span class="text-emeraldBrand">*</span>
                </label>
                <input type="text" 
                       id="name" 
                       name="name" 
                       value="{{ old('name') }}" 
                       placeholder="Misal: Listrik Jaringan Jamali / Bensin RON 92" 
                       required 
                       class="admin-input">
                @error('name')
                    <p class="text-xs text-rose-400 mt-1 flex items-center gap-1">
                        <i class="fa-solid fa-circle-exclamation text-[10px]"></i>
                        <span>{{ $message }}</span>
                    </p>
                @enderror
            </div>

            <!-- Kategori -->
            <div>
                <label for="category" class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">
                    Kategori Emisi <span class="text-emeraldBrand">*</span>
                </label>
                <select name="category" id="category" required class="admin-input">
                    <option value="" disabled {{ old('category') ? '' : 'selected' }} class="bg-[#0b1c15]">Pilih kategori</option>
                    <option value="Listrik" {{ old('category') == 'Listrik' ? 'selected' : '' }} class="bg-[#0b1c15]">Listrik (Kelistrikan PLN)</option>
                    <option value="Bensin" {{ old('category') == 'Bensin' ? 'selected' : '' }} class="bg-[#0b1c15]">Bahan Bakar Bensin (Gasoline)</option>
                    <option value="Solar" {{ old('category') == 'Solar' ? 'selected' : '' }} class="bg-[#0b1c15]">Bahan Bakar Solar (Diesel)</option>
                    <option value="Gas" {{ old('category') == 'Gas' ? 'selected' : '' }} class="bg-[#0b1c15]">Gas Alam & LPG</option>
                    <option value="Limbah" {{ old('category') == 'Limbah' ? 'selected' : '' }} class="bg-[#0b1c15]">Limbah & Sampah</option>
                    <option value="Air" {{ old('category') == 'Air' ? 'selected' : '' }} class="bg-[#0b1c15]">Konsumsi Air Bersih</option>
                </select>
                @error('category')
                    <p class="text-xs text-rose-400 mt-1 flex items-center gap-1">
                        <i class="fa-solid fa-circle-exclamation text-[10px]"></i>
                        <span>{{ $message }}</span>
                    </p>
                @enderror
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <!-- Nilai -->
                <div>
                    <label for="value" class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">
                        Nilai Faktor Konversi <span class="text-emeraldBrand">*</span>
                    </label>
                    <input type="number" 
                           step="0.0001" 
                           id="value" 
                           name="value" 
                           value="{{ old('value') }}" 
                           placeholder="Misal: 0.85" 
                           required 
                           class="admin-input">
                    @error('value')
                        <p class="text-xs text-rose-400 mt-1 flex items-center gap-1">
                            <i class="fa-solid fa-circle-exclamation text-[10px]"></i>
                            <span>{{ $message }}</span>
                        </p>
                    @enderror
                </div>

                <!-- Unit -->
                <div>
                    <label for="unit" class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">
                        Satuan (Unit) <span class="text-emeraldBrand">*</span>
                    </label>
                    <input type="text" 
                           id="unit" 
                           name="unit" 
                           value="{{ old('unit') }}" 
                           placeholder="Misal: kgCO2e/kWh atau kgCO2e/liter" 
                           required 
                           class="admin-input">
                    @error('unit')
                        <p class="text-xs text-rose-400 mt-1 flex items-center gap-1">
                            <i class="fa-solid fa-circle-exclamation text-[10px]"></i>
                            <span>{{ $message }}</span>
                        </p>
                    @enderror
                </div>
            </div>

            <!-- Sumber Referensi -->
            <div>
                <label for="source" class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">
                    Sumber Regulasi / Referensi Ilmiah
                </label>
                <input type="text" 
                       id="source" 
                       name="source" 
                       value="{{ old('source') }}" 
                       placeholder="Misal: Peraturan Menteri ESDM 2024 / IPCC Guidelines 2023" 
                       class="admin-input">
                @error('source')
                    <p class="text-xs text-rose-400 mt-1 flex items-center gap-1">
                        <i class="fa-solid fa-circle-exclamation text-[10px]"></i>
                        <span>{{ $message }}</span>
                    </p>
                @enderror
            </div>

            <!-- Deskripsi -->
            <div>
                <label for="description" class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">
                    Catatan Metodologi
                </label>
                <textarea id="description" 
                          name="description" 
                          rows="3" 
                          placeholder="Tambahkan catatan metodologi perhitungan atau ruang lingkup emisi..." 
                          class="admin-input">{{ old('description') }}</textarea>
            </div>

            <!-- Action Buttons -->
            <div class="pt-4 border-t border-white/10 flex items-center justify-end gap-3">
                <a href="{{ route('admin.emission-factors.index') }}" class="px-5 py-2.5 rounded-xl bg-white/5 hover:bg-white/10 text-slate-300 text-xs font-bold transition-colors text-decoration-none">
                    Batal
                </a>
                <button type="submit" class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-emeraldBrand to-emeraldDark hover:from-[#18c58f] hover:to-emeraldDark text-white text-xs font-bold shadow-lg shadow-emeraldBrand/30 transition-all transform hover:-translate-y-0.5 flex items-center gap-2 cursor-pointer">
                    <i class="fa-solid fa-floppy-disk text-xs"></i>
                    <span>Simpan Faktor Emisi</span>
                </button>
            </div>
        </form>
    </div>

</div>
@endsection
