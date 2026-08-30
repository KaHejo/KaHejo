@extends('layouts.app')

@section('title', 'Tulis Artikel Edukasi')

@section('content')
<div class="max-w-4xl mx-auto py-8 px-4 sm:px-6 lg:px-8 space-y-8">

    <!-- Back Button -->
    <div>
        <a href="{{ route('education') }}" 
           class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-white/[0.04] hover:bg-white/[0.08] text-slate-300 hover:text-white border border-white/10 text-xs font-bold transition-all group">
            <i class="fa-solid fa-arrow-left text-xs group-hover:-translate-x-1 transition-transform"></i>
            <span>Kembali ke Katalog Edukasi</span>
        </a>
    </div>

    <!-- Main Card -->
    <div class="glass-card p-6 sm:p-8 relative overflow-hidden">
        <div class="absolute -right-16 -top-16 w-64 h-64 bg-emeraldBrand/15 rounded-full blur-3xl pointer-events-none"></div>

        <!-- Header -->
        <div class="flex items-center gap-3.5 pb-6 mb-6 border-b border-white/[0.08]">
            <div class="w-12 h-12 rounded-2xl bg-emeraldBrand/15 border border-emeraldBrand/30 flex items-center justify-center text-mintGlow text-xl shadow-sm">
                <i class="fa-solid fa-pen-nib"></i>
            </div>
            <div>
                <span class="text-[10px] uppercase font-bold text-mintGlow tracking-wider block">Kontributor Pengetahuan Hijau</span>
                <h1 class="text-xl sm:text-2xl font-extrabold text-white tracking-tight">
                    Publikasi Artikel Edukasi Iklim
                </h1>
            </div>
        </div>

        <form action="{{ route('education.articles.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Title -->
            <div>
                <label for="title" class="block text-xs font-semibold text-slate-300 mb-1.5">
                    Judul Artikel <span class="text-emeraldBrand">*</span>
                </label>
                <div class="relative group">
                    <i class="fa-solid fa-heading absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-500 text-sm group-focus-within:text-mintGlow transition-colors"></i>
                    <input type="text" name="title" id="title" required 
                           placeholder="Contoh: 10 Langkah Praktis Menuju Rumah Tangga Net-Zero"
                           class="w-full pl-11 pr-4 py-3 rounded-xl bg-white/[0.04] focus:bg-white/[0.07] border border-white/15 focus:border-emeraldBrand focus:ring-2 focus:ring-emeraldBrand/25 text-white placeholder-slate-500 text-sm font-medium outline-none transition-all">
                </div>
                @error('title')
                    <p class="mt-1 text-xs text-rose-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Featured Image Upload -->
            <div>
                <label class="block text-xs font-semibold text-slate-300 mb-1.5">
                    Cover / Gambar Utama
                </label>
                <div class="p-6 rounded-2xl border-2 border-dashed border-white/15 hover:border-emeraldBrand/40 bg-white/[0.02] hover:bg-white/[0.04] transition-colors text-center">
                    <i class="fa-solid fa-cloud-arrow-up text-3xl text-mintGlow/80 mb-2"></i>
                    <p class="text-xs text-slate-300 font-semibold mb-1">
                        Pilih foto atau seret gambar ke sini
                    </p>
                    <p class="text-[10px] text-slate-500 mb-3">Format JPG, PNG, atau WebP (Maks. 2MB)</p>
                    <label class="cursor-pointer inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-emeraldBrand/20 hover:bg-emeraldBrand/30 border border-emeraldBrand/40 text-mintGlow text-xs font-bold transition-colors">
                        <i class="fa-solid fa-image text-xs"></i>
                        <span>Pilih Berkas</span>
                        <input type="file" name="image" id="image" accept="image/*" class="sr-only" onchange="showImageName(this)">
                    </label>
                    <p id="imageFileName" class="text-xs text-mintGlow mt-2 font-mono hidden"></p>
                </div>
                @error('image')
                    <p class="mt-1 text-xs text-rose-400">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!-- Reading Time -->
                <div>
                    <label for="reading_time" class="block text-xs font-semibold text-slate-300 mb-1.5">
                        Estimasi Waktu Baca (Menit) <span class="text-emeraldBrand">*</span>
                    </label>
                    <div class="relative group">
                        <i class="fa-regular fa-clock absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-500 text-sm group-focus-within:text-mintGlow transition-colors"></i>
                        <input type="number" min="1" max="60" name="reading_time" id="reading_time" required 
                               placeholder="Contoh: 5"
                               class="w-full pl-11 pr-4 py-3 rounded-xl bg-white/[0.04] focus:bg-white/[0.07] border border-white/15 focus:border-emeraldBrand focus:ring-2 focus:ring-emeraldBrand/25 text-white placeholder-slate-500 text-sm font-medium outline-none transition-all">
                    </div>
                    @error('reading_time')
                        <p class="mt-1 text-xs text-rose-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Published Date -->
                <div>
                    <label for="published_at" class="block text-xs font-semibold text-slate-300 mb-1.5">
                        Tanggal Terbit
                    </label>
                    <div class="relative group">
                        <i class="fa-regular fa-calendar absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-500 text-sm group-focus-within:text-mintGlow transition-colors"></i>
                        <input type="date" name="published_at" id="published_at" 
                               value="{{ date('Y-m-d') }}"
                               class="w-full pl-11 pr-4 py-3 rounded-xl bg-white/[0.04] focus:bg-white/[0.07] border border-white/15 focus:border-emeraldBrand focus:ring-2 focus:ring-emeraldBrand/25 text-white text-sm font-medium outline-none transition-all">
                    </div>
                    @error('published_at')
                        <p class="mt-1 text-xs text-rose-400">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Description / Excerpt -->
            <div>
                <label for="description" class="block text-xs font-semibold text-slate-300 mb-1.5">
                    Ringkasan Singkat (Deskripsi) <span class="text-emeraldBrand">*</span>
                </label>
                <textarea name="description" id="description" rows="2" required 
                          placeholder="Ringkasan 1-2 kalimat untuk pratinjau kartu artikel..."
                          class="w-full px-4 py-3 rounded-xl bg-white/[0.04] focus:bg-white/[0.07] border border-white/15 focus:border-emeraldBrand focus:ring-2 focus:ring-emeraldBrand/25 text-white placeholder-slate-500 text-sm font-medium outline-none transition-all"></textarea>
                @error('description')
                    <p class="mt-1 text-xs text-rose-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Content -->
            <div>
                <label for="content" class="block text-xs font-semibold text-slate-300 mb-1.5">
                    Isi Konten Artikel <span class="text-emeraldBrand">*</span>
                </label>
                <textarea name="content" id="content" rows="10" required 
                          placeholder="Tuliskan konten artikel lengkap. Anda dapat menggunakan format paragraf atau tag HTML seperti <h2>, <p>, dan <ul>..."
                          class="w-full px-4 py-3 rounded-xl bg-white/[0.04] focus:bg-white/[0.07] border border-white/15 focus:border-emeraldBrand focus:ring-2 focus:ring-emeraldBrand/25 text-white placeholder-slate-500 text-sm font-medium outline-none transition-all font-mono text-xs"></textarea>
                @error('content')
                    <p class="mt-1 text-xs text-rose-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Action -->
            <div class="pt-6 border-t border-white/[0.08] flex items-center justify-between gap-4">
                <a href="{{ route('education') }}" 
                   class="px-5 py-2.5 rounded-xl bg-white/[0.04] hover:bg-white/[0.08] text-slate-300 hover:text-white border border-white/10 text-xs font-semibold transition-colors">
                    Batal
                </a>

                <button type="submit" 
                        class="px-7 py-3 rounded-xl bg-gradient-to-r from-emeraldBrand to-emeraldDark hover:from-[#18c58f] hover:to-emeraldDark text-white text-xs font-bold shadow-lg shadow-emeraldBrand/25 hover:shadow-emeraldBrand/40 transition-all duration-200 hover:-translate-y-0.5 flex items-center gap-2 cursor-pointer">
                    <i class="fa-solid fa-paper-plane text-xs"></i>
                    <span>Terbitkan Artikel</span>
                </button>
            </div>

        </form>
    </div>

</div>

@section('scripts')
<script>
    function showImageName(input) {
        const fileLabel = document.getElementById('imageFileName');
        if (input.files && input.files[0]) {
            fileLabel.textContent = 'Berkas dipilih: ' + input.files[0].name;
            fileLabel.classList.remove('hidden');
        }
    }
</script>
@endsection
@endsection