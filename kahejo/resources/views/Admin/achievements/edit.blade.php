@extends('layouts.admin')

@section('title', 'Edit Prestasi')
@section('page-title', 'Edit Prestasi')

@section('main-content')
<div class="max-w-3xl mx-auto space-y-6">

    <!-- Header & Back Button -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight flex items-center gap-2.5">
                <i class="fa-solid fa-pen-to-square text-emeraldBrand text-2xl"></i>
                <span>Edit Prestasi / Lencana</span>
            </h1>
            <p class="text-slate-400 text-xs sm:text-sm mt-1">Perbarui kriteria, syarat poin, dan lencana untuk prestasi ini.</p>
        </div>

        <a href="{{ route('admin.achievements.index') }}" class="px-3.5 py-2 rounded-xl bg-white/5 hover:bg-white/10 border border-white/10 text-slate-300 text-xs font-semibold flex items-center gap-2 text-decoration-none transition-colors">
            <i class="fa-solid fa-arrow-left"></i>
            <span>Kembali</span>
        </a>
    </div>

    <!-- Form Glass Card -->
    <div class="glass-card p-6 sm:p-8">
        <form action="{{ route('admin.achievements.update', $achievement->id) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
            @method('PUT')

            <!-- Nama Prestasi -->
            <div>
                <label for="name" class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">
                    Nama Prestasi / Lencana <span class="text-emeraldBrand">*</span>
                </label>
                <input type="text" 
                       id="name" 
                       name="name" 
                       value="{{ old('name', $achievement->name) }}" 
                       required 
                       class="admin-input">
                @error('name')
                    <p class="text-xs text-rose-400 mt-1 flex items-center gap-1">
                        <i class="fa-solid fa-circle-exclamation text-[10px]"></i>
                        <span>{{ $message }}</span>
                    </p>
                @enderror
            </div>

            <!-- Deskripsi Prestasi -->
            <div>
                <label for="description" class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">
                    Deskripsi Kriteria Pencapaian <span class="text-emeraldBrand">*</span>
                </label>
                <textarea id="description" 
                          name="description" 
                          rows="3" 
                          required 
                          class="admin-input">{{ old('description', $achievement->description) }}</textarea>
                @error('description')
                    <p class="text-xs text-rose-400 mt-1 flex items-center gap-1">
                        <i class="fa-solid fa-circle-exclamation text-[10px]"></i>
                        <span>{{ $message }}</span>
                    </p>
                @enderror
            </div>

            <!-- Kategori -->
            <div>
                <label for="category" class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">
                    Kategori Sumber Emisi <span class="text-emeraldBrand">*</span>
                </label>
                <select name="category" id="category" required class="admin-input">
                    <option value="electricity" {{ old('category', $achievement->category) == 'electricity' ? 'selected' : '' }} class="bg-[#0b1c15]">Listrik (Electricity)</option>
                    <option value="gasoline" {{ old('category', $achievement->category) == 'gasoline' ? 'selected' : '' }} class="bg-[#0b1c15]">Bensin (Gasoline)</option>
                    <option value="diesel" {{ old('category', $achievement->category) == 'diesel' ? 'selected' : '' }} class="bg-[#0b1c15]">Solar (Diesel)</option>
                    <option value="gas" {{ old('category', $achievement->category) == 'gas' ? 'selected' : '' }} class="bg-[#0b1c15]">Gas Alam (Natural Gas)</option>
                    <option value="lpg" {{ old('category', $achievement->category) == 'lpg' ? 'selected' : '' }} class="bg-[#0b1c15]">LPG</option>
                </select>
                @error('category')
                    <p class="text-xs text-rose-400 mt-1 flex items-center gap-1">
                        <i class="fa-solid fa-circle-exclamation text-[10px]"></i>
                        <span>{{ $message }}</span>
                    </p>
                @enderror
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <!-- Points Needed -->
                <div>
                    <label for="points_needed" class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">
                        Poin / Syarat Diperlukan <span class="text-emeraldBrand">*</span>
                    </label>
                    <input type="number" 
                           id="points_needed" 
                           name="points_needed" 
                           value="{{ old('points_needed', $achievement->points_needed) }}" 
                           min="0" 
                           required 
                           class="admin-input">
                    @error('points_needed')
                        <p class="text-xs text-rose-400 mt-1 flex items-center gap-1">
                            <i class="fa-solid fa-circle-exclamation text-[10px]"></i>
                            <span>{{ $message }}</span>
                        </p>
                    @enderror
                </div>

                <!-- Points Awarded -->
                <div>
                    <label for="points_awarded" class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">
                        Bonus Poin yang Diberikan <span class="text-emeraldBrand">*</span>
                    </label>
                    <input type="number" 
                           id="points_awarded" 
                           name="points_awarded" 
                           value="{{ old('points_awarded', $achievement->points_awarded) }}" 
                           min="0" 
                           required 
                           class="admin-input">
                    @error('points_awarded')
                        <p class="text-xs text-rose-400 mt-1 flex items-center gap-1">
                            <i class="fa-solid fa-circle-exclamation text-[10px]"></i>
                            <span>{{ $message }}</span>
                        </p>
                    @enderror
                </div>
            </div>

            <!-- Upload Ikon Prestasi -->
            <div>
                <label for="icon" class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">
                    Perbarui Ikon / Lencana Medali
                </label>
                @if($achievement->icon)
                    <div class="flex items-center gap-4 mb-3 p-3 rounded-xl bg-white/[0.03] border border-white/10">
                        <img src="{{ asset($achievement->icon) }}" alt="{{ $achievement->name }}" class="h-14 w-14 object-cover rounded-xl border border-amber-500/30">
                        <div>
                            <span class="text-xs font-semibold text-slate-200">Ikon Saat Ini</span>
                            <p class="text-[11px] text-slate-400">Unggah berkas baru jika ingin menggantinya.</p>
                        </div>
                    </div>
                @endif
                <div class="p-4 rounded-xl border border-dashed border-emeraldBrand/30 bg-emerald-950/20 text-center cursor-pointer hover:bg-emerald-950/30 transition-colors">
                    <input type="file" id="icon" name="icon" accept="image/*" class="w-full text-xs text-slate-400 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-emeraldBrand/20 file:text-mintGlow hover:file:bg-emeraldBrand/30">
                    <p class="text-[11px] text-slate-400 mt-2">Mendukung format PNG, JPG, SVG, WEBP.</p>
                </div>
                @error('icon')
                    <p class="text-xs text-rose-400 mt-1 flex items-center gap-1">
                        <i class="fa-solid fa-circle-exclamation text-[10px]"></i>
                        <span>{{ $message }}</span>
                    </p>
                @enderror
            </div>

            <!-- Action Buttons -->
            <div class="pt-4 border-t border-white/10 flex items-center justify-end gap-3">
                <a href="{{ route('admin.achievements.index') }}" class="px-5 py-2.5 rounded-xl bg-white/5 hover:bg-white/10 text-slate-300 text-xs font-bold transition-colors text-decoration-none">
                    Batal
                </a>
                <button type="submit" class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-emeraldBrand to-emeraldDark hover:from-[#18c58f] hover:to-emeraldDark text-white text-xs font-bold shadow-lg shadow-emeraldBrand/30 transition-all transform hover:-translate-y-0.5 flex items-center gap-2 cursor-pointer">
                    <i class="fa-solid fa-check text-xs"></i>
                    <span>Simpan Perubahan</span>
                </button>
            </div>
        </form>
    </div>

</div>
@endsection
