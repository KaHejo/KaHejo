@extends('layouts.admin')

@section('title', 'Edit Reward')
@section('page-title', 'Edit Reward')

@section('main-content')
<div class="max-w-3xl mx-auto space-y-6">

    <!-- Header & Back Button -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight flex items-center gap-2.5">
                <i class="fa-solid fa-pen-to-square text-emeraldBrand text-2xl"></i>
                <span>Edit Hadiah / Reward</span>
            </h1>
            <p class="text-slate-400 text-xs sm:text-sm mt-1">Perbarui detail, syarat poin, stok, atau gambar untuk reward ini.</p>
        </div>

        <a href="{{ route('admin.rewards.index') }}" class="px-3.5 py-2 rounded-xl bg-white/5 hover:bg-white/10 border border-white/10 text-slate-300 text-xs font-semibold flex items-center gap-2 text-decoration-none transition-colors">
            <i class="fa-solid fa-arrow-left"></i>
            <span>Kembali</span>
        </a>
    </div>

    <!-- Form Glass Card -->
    <div class="glass-card p-6 sm:p-8">
        <form action="{{ route('admin.rewards.update', $reward->id) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
            @method('put')

            <!-- Nama Reward -->
            <div>
                <label for="reward_name" class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">
                    Nama Hadiah / Reward <span class="text-emeraldBrand">*</span>
                </label>
                <input type="text" 
                       id="reward_name" 
                       name="reward_name" 
                       value="{{ old('reward_name', $reward->reward_name ?? $reward->name) }}" 
                       required 
                       class="admin-input">
                @error('reward_name')
                    <p class="text-xs text-rose-400 mt-1 flex items-center gap-1">
                        <i class="fa-solid fa-circle-exclamation text-[10px]"></i>
                        <span>{{ $message }}</span>
                    </p>
                @enderror
            </div>

            <!-- Deskripsi Reward -->
            <div>
                <label for="reward_description" class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">
                    Deskripsi Lengkap <span class="text-emeraldBrand">*</span>
                </label>
                <textarea id="reward_description" 
                          name="reward_description" 
                          rows="4" 
                          required 
                          class="admin-input">{{ old('reward_description', $reward->reward_description ?? $reward->description) }}</textarea>
                @error('reward_description')
                    <p class="text-xs text-rose-400 mt-1 flex items-center gap-1">
                        <i class="fa-solid fa-circle-exclamation text-[10px]"></i>
                        <span>{{ $message }}</span>
                    </p>
                @enderror
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <!-- Poin yang Diperlukan -->
                <div>
                    <label for="points_required" class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">
                        Poin Penukaran <span class="text-emeraldBrand">*</span>
                    </label>
                    <div class="relative">
                        <i class="fa-solid fa-gem absolute left-3.5 top-1/2 -translate-y-1/2 text-amber-400 text-xs"></i>
                        <input type="number" 
                               id="points_required" 
                               name="points_required" 
                               value="{{ old('points_required', $reward->points_required) }}" 
                               min="1" 
                               required 
                               class="admin-input pl-9">
                    </div>
                    @error('points_required')
                        <p class="text-xs text-rose-400 mt-1 flex items-center gap-1">
                            <i class="fa-solid fa-circle-exclamation text-[10px]"></i>
                            <span>{{ $message }}</span>
                        </p>
                    @enderror
                </div>

                <!-- Stok Reward -->
                <div>
                    <label for="stock" class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">
                        Jumlah Stok Tersedia <span class="text-emeraldBrand">*</span>
                    </label>
                    <div class="relative">
                        <i class="fa-solid fa-cubes-stacked absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-xs"></i>
                        <input type="number" 
                               id="stock" 
                               name="stock" 
                               value="{{ old('stock', $reward->stock) }}" 
                               min="0" 
                               required 
                               class="admin-input pl-9">
                    </div>
                    @error('stock')
                        <p class="text-xs text-rose-400 mt-1 flex items-center gap-1">
                            <i class="fa-solid fa-circle-exclamation text-[10px]"></i>
                            <span>{{ $message }}</span>
                        </p>
                    @enderror
                </div>
            </div>

            <!-- Upload Foto Reward -->
            <div>
                <label for="reward_image" class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">
                    Perbarui Foto / Banner Hadiah
                </label>
                @php
                    $currentImg = $reward->reward_image ?? $reward->image;
                @endphp
                @if($currentImg)
                    <div class="flex items-center gap-4 mb-3 p-3 rounded-xl bg-white/[0.03] border border-white/10">
                        <img src="{{ asset($currentImg) }}" alt="{{ $reward->reward_name ?? $reward->name }}" class="h-16 w-16 object-cover rounded-xl border border-emeraldBrand/30">
                        <div>
                            <span class="text-xs font-semibold text-slate-200">Foto Saat Ini</span>
                            <p class="text-[11px] text-slate-400">Unggah berkas baru di bawah jika ingin menggantinya.</p>
                        </div>
                    </div>
                @endif
                <div class="p-4 rounded-xl border border-dashed border-emeraldBrand/30 bg-emerald-950/20 text-center cursor-pointer hover:bg-emerald-950/30 transition-colors">
                    <input type="file" id="reward_image" name="reward_image" accept="image/*" class="w-full text-xs text-slate-400 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-emeraldBrand/20 file:text-mintGlow hover:file:bg-emeraldBrand/30">
                    <p class="text-[11px] text-slate-400 mt-2">Mendukung format JPG, PNG, WEBP (Maksimal 2MB).</p>
                </div>
                @error('reward_image')
                    <p class="text-xs text-rose-400 mt-1 flex items-center gap-1">
                        <i class="fa-solid fa-circle-exclamation text-[10px]"></i>
                        <span>{{ $message }}</span>
                    </p>
                @enderror
            </div>

            <!-- Action Buttons -->
            <div class="pt-4 border-t border-white/10 flex items-center justify-end gap-3">
                <a href="{{ route('admin.rewards.index') }}" class="px-5 py-2.5 rounded-xl bg-white/5 hover:bg-white/10 text-slate-300 text-xs font-bold transition-colors text-decoration-none">
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
