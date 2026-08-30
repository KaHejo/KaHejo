@extends('layouts.admin')

@section('title', 'Tambah FAQ Baru')
@section('page-title', 'Tambah FAQ')

@section('main-content')
<div class="max-w-3xl mx-auto space-y-6">

    <!-- Header & Back Button -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight flex items-center gap-2.5">
                <i class="fa-solid fa-circle-question text-emeraldBrand text-2xl"></i>
                <span>Tambah Pertanyaan FAQ Baru</span>
            </h1>
            <p class="text-slate-400 text-xs sm:text-sm mt-1">Tambahkan panduan dan penjelasan resmi terkait penggunaan platform KaHejo.</p>
        </div>

        <a href="{{ route('admin.faqs.index') }}" class="px-3.5 py-2 rounded-xl bg-white/5 hover:bg-white/10 border border-white/10 text-slate-300 text-xs font-semibold flex items-center gap-2 text-decoration-none transition-colors">
            <i class="fa-solid fa-arrow-left"></i>
            <span>Kembali</span>
        </a>
    </div>

    <!-- Form Glass Card -->
    <div class="glass-card p-6 sm:p-8">
        <form action="{{ route('admin.faqs.store') }}" method="POST" class="space-y-5">
            @csrf

            <!-- Pertanyaan -->
            <div>
                <label for="question" class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">
                    Teks Pertanyaan <span class="text-emeraldBrand">*</span>
                </label>
                <input type="text" 
                       id="question" 
                       name="question" 
                       value="{{ old('question') }}" 
                       placeholder="Misal: Dari mana asal faktor konversi emisi listrik di KaHejo?" 
                       required 
                       class="admin-input">
                @error('question')
                    <p class="text-xs text-rose-400 mt-1 flex items-center gap-1">
                        <i class="fa-solid fa-circle-exclamation text-[10px]"></i>
                        <span>{{ $message }}</span>
                    </p>
                @enderror
            </div>

            <!-- Jawaban -->
            <div>
                <label for="answer" class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">
                    Jawaban Lengkap <span class="text-emeraldBrand">*</span>
                </label>
                <textarea id="answer" 
                          name="answer" 
                          rows="6" 
                          placeholder="Tuliskan jawaban yang komprehensif, jelas, dan edukatif..." 
                          required 
                          class="admin-input">{{ old('answer') }}</textarea>
                @error('answer')
                    <p class="text-xs text-rose-400 mt-1 flex items-center gap-1">
                        <i class="fa-solid fa-circle-exclamation text-[10px]"></i>
                        <span>{{ $message }}</span>
                    </p>
                @enderror
            </div>

            <!-- Urutan Tampilan -->
            <div>
                <label for="order" class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">
                    Nomor Urut Tampilan
                </label>
                <input type="number" 
                       id="order" 
                       name="order" 
                       value="{{ old('order', 1) }}" 
                       min="1" 
                       class="admin-input">
                @error('order')
                    <p class="text-xs text-rose-400 mt-1 flex items-center gap-1">
                        <i class="fa-solid fa-circle-exclamation text-[10px]"></i>
                        <span>{{ $message }}</span>
                    </p>
                @enderror
            </div>

            <!-- Checkbox Publikasi -->
            <div class="p-4 rounded-xl bg-white/[0.03] border border-white/10">
                <label class="flex items-center gap-3 cursor-pointer select-none">
                    <input type="checkbox" 
                           name="is_published" 
                           value="1" 
                           {{ old('is_published', 1) ? 'checked' : '' }} 
                           class="w-4 h-4 rounded border-white/20 bg-white/5 text-emeraldBrand focus:ring-emeraldBrand/30 focus:ring-offset-0">
                    <div>
                        <span class="text-xs font-bold text-white">Publikasikan FAQ ini sekarang</span>
                        <p class="text-[11px] text-slate-400">Pertanyaan akan langsung tampil pada halaman Tanya Jawab publik.</p>
                    </div>
                </label>
            </div>

            <!-- Action Buttons -->
            <div class="pt-4 border-t border-white/10 flex items-center justify-end gap-3">
                <a href="{{ route('admin.faqs.index') }}" class="px-5 py-2.5 rounded-xl bg-white/5 hover:bg-white/10 text-slate-300 text-xs font-bold transition-colors text-decoration-none">
                    Batal
                </a>
                <button type="submit" class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-emeraldBrand to-emeraldDark hover:from-[#18c58f] hover:to-emeraldDark text-white text-xs font-bold shadow-lg shadow-emeraldBrand/30 transition-all transform hover:-translate-y-0.5 flex items-center gap-2 cursor-pointer">
                    <i class="fa-solid fa-floppy-disk text-xs"></i>
                    <span>Simpan FAQ</span>
                </button>
            </div>
        </form>
    </div>

</div>
@endsection