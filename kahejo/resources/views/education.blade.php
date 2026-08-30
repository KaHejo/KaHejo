@extends('layouts.app')

@section('title', 'Edukasi Iklim')

@section('content')
<div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8 space-y-8">

    <!-- Top Hero Header Card -->
    <div class="glass-card p-6 sm:p-8 relative overflow-hidden">
        <div class="absolute -right-16 -top-16 w-64 h-64 bg-emeraldBrand/15 rounded-full blur-3xl pointer-events-none"></div>

        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 relative z-10">
            <div>
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emeraldBrand/10 border border-emeraldBrand/25 text-mintGlow text-xs font-semibold mb-2">
                    <i class="fa-solid fa-graduation-cap text-[11px]"></i>
                    <span>Pusat Literasi Iklim & Dekarbonisasi</span>
                </div>
                <h1 class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight">
                    Edukasi Iklim & Keberlanjutan
                </h1>
                <p class="mt-1 text-sm text-slate-400 max-w-2xl">
                    Pelajari wawasan mendalam mengenai sains perubahan iklim, panduan gaya hidup rendah emisi, dan transisi menuju energi bersih masa depan.
                </p>
            </div>

            <!-- Create New Article Button -->
            <div class="flex items-center gap-3 self-start md:self-auto">
                <a href="{{ route('education.articles.create') }}" 
                   class="px-5 py-2.5 rounded-xl bg-gradient-to-r from-emeraldBrand to-emeraldDark hover:from-[#18c58f] hover:to-emeraldDark text-white text-xs font-bold shadow-lg shadow-emeraldBrand/25 hover:shadow-emeraldBrand/40 transition-all duration-200 flex items-center gap-2">
                    <i class="fa-solid fa-pen-nib text-xs"></i>
                    <span>Tulis Artikel Baru</span>
                </a>
            </div>
        </div>

        <!-- 3 Knowledge Highlight Pillars -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3.5 mt-6 pt-6 border-t border-white/[0.08]">
            <div class="p-3.5 rounded-xl bg-white/[0.02] border border-white/[0.06] flex items-center gap-3.5">
                <div class="w-10 h-10 rounded-xl bg-emeraldBrand/15 text-mintGlow flex items-center justify-center text-sm shrink-0">
                    <i class="fa-solid fa-earth-americas"></i>
                </div>
                <div>
                    <span class="text-xs font-bold text-white block">Sains & Krisis Iklim</span>
                    <span class="text-[11px] text-slate-400 block mt-0.5">Memahami dinamika gas rumah kaca & mitigasi global.</span>
                </div>
            </div>

            <div class="p-3.5 rounded-xl bg-white/[0.02] border border-white/[0.06] flex items-center gap-3.5">
                <div class="w-10 h-10 rounded-xl bg-amber-500/15 text-amber-400 flex items-center justify-center text-sm shrink-0">
                    <i class="fa-solid fa-solar-panel"></i>
                </div>
                <div>
                    <span class="text-xs font-bold text-white block">Energi Bersih Terbarukan</span>
                    <span class="text-[11px] text-slate-400 block mt-0.5">Transisi tenaga surya, angin, hidro, dan efisiensi utilitas.</span>
                </div>
            </div>

            <div class="p-3.5 rounded-xl bg-white/[0.02] border border-white/[0.06] flex items-center gap-3.5">
                <div class="w-10 h-10 rounded-xl bg-sky-500/15 text-sky-400 flex items-center justify-center text-sm shrink-0">
                    <i class="fa-solid fa-recycle"></i>
                </div>
                <div>
                    <span class="text-xs font-bold text-white block">Sirkularitas & Gaya Hidup</span>
                    <span class="text-[11px] text-slate-400 block mt-0.5">Pengurangan limbah, mobilitas hijau, dan konservasi air.</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Article Catalog Section -->
    <div class="space-y-5">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-2.5">
                <div class="w-2.5 h-2.5 rounded-full bg-emeraldBrand"></div>
                <h2 class="text-lg sm:text-xl font-extrabold text-white tracking-tight">Koleksi Artikel & Panduan</h2>
            </div>
            <span class="text-xs font-semibold text-slate-400">
                Menampilkan <strong class="text-mintGlow">{{ $articles->count() }}</strong> Materi Edukasi
            </span>
        </div>

        <!-- Article Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($articles as $article)
                @php
                    $imageUrl = $article->image_path;
                    if ($imageUrl && !Str::startsWith($imageUrl, ['http://', 'https://'])) {
                        $imageUrl = asset('storage/' . $imageUrl);
                    }
                    if (!$imageUrl) {
                        $imageUrl = 'https://images.unsplash.com/photo-1472214103451-9374bd1c798e?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80';
                    }
                @endphp
                <a href="{{ route('education.article', $article->slug) }}" 
                   class="glass-card overflow-hidden group hover:border-emeraldBrand/45 hover:shadow-xl hover:shadow-emeraldBrand/10 transition-all duration-300 flex flex-col justify-between block text-decoration-none">
                    
                    <!-- Cover Image with Gradient Overlay -->
                    <div class="relative h-52 w-full overflow-hidden bg-black/40">
                        <img src="{{ $imageUrl }}" alt="{{ $article->title }}" 
                             class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#071710] via-black/30 to-transparent"></div>

                        <!-- Reading Time Chip -->
                        <div class="absolute top-3.5 right-3.5 px-3 py-1 rounded-full bg-black/70 backdrop-blur-md border border-white/15 text-[11px] font-semibold text-slate-200 flex items-center gap-1.5 shadow-md">
                            <i class="fa-regular fa-clock text-mintGlow text-[10px]"></i>
                            <span>{{ $article->reading_time ?? 5 }} mnt baca</span>
                        </div>

                        <!-- Category Indicator -->
                        <div class="absolute bottom-3 left-4">
                            <span class="px-2.5 py-0.5 rounded-lg bg-emeraldBrand/25 border border-emeraldBrand/40 text-mintGlow text-[10px] font-bold uppercase tracking-wider backdrop-blur-sm">
                                Edukasi Lingkungan
                            </span>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="p-6 flex-1 flex flex-col justify-between space-y-4">
                        <div>
                            <div class="flex items-center gap-2 text-[11px] text-slate-400 font-medium mb-2">
                                <i class="fa-regular fa-calendar text-slate-500"></i>
                                <span>{{ $article->published_at ? \Carbon\Carbon::parse($article->published_at)->format('d M Y') : $article->created_at->format('d M Y') }}</span>
                            </div>
                            <h3 class="text-base sm:text-lg font-bold text-white group-hover:text-mintGlow transition-colors leading-snug line-clamp-2">
                                {{ $article->title }}
                            </h3>
                            <p class="mt-2 text-xs text-slate-400 leading-relaxed line-clamp-3">
                                {{ Str::limit(strip_tags($article->description ?? $article->content), 120) }}
                            </p>
                        </div>

                        <div class="pt-4 border-t border-white/[0.06] flex items-center justify-between text-xs font-bold text-mintGlow group-hover:text-white transition-colors">
                            <span>Baca Selengkapnya</span>
                            <div class="w-7 h-7 rounded-lg bg-emeraldBrand/15 group-hover:bg-emeraldBrand flex items-center justify-center text-mintGlow group-hover:text-white transition-all transform group-hover:translate-x-1">
                                <i class="fa-solid fa-arrow-right text-[11px]"></i>
                            </div>
                        </div>
                    </div>
                </a>
            @empty
                <div class="col-span-full glass-card p-12 text-center space-y-4">
                    <div class="w-16 h-16 rounded-2xl bg-emeraldBrand/15 border border-emeraldBrand/30 flex items-center justify-center text-mintGlow text-2xl mx-auto">
                        <i class="fa-solid fa-book-open-reader"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-white">Belum Ada Artikel Edukasi</h3>
                        <p class="text-xs text-slate-400 max-w-sm mx-auto mt-1">
                            Artikel dan panduan edukasi iklim sedang disiapkan untuk memperkaya literasi hijau Anda.
                        </p>
                    </div>
                    <a href="{{ route('education.articles.create') }}" 
                       class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-gradient-to-r from-emeraldBrand to-emeraldDark text-white text-xs font-bold shadow-lg shadow-emeraldBrand/25 hover:shadow-emeraldBrand/40 transition-all">
                        <i class="fa-solid fa-plus text-xs"></i>
                        <span>Tambah Artikel Pertama</span>
                    </a>
                </div>
            @endforelse
        </div>
    </div>

    <!-- Bottom Eco Callout Card -->
    <div class="glass-card p-6 sm:p-8 bg-gradient-to-r from-emerald-950/40 via-[#0a271b]/60 to-emerald-950/40 border-emeraldBrand/30 flex flex-col md:flex-row items-center justify-between gap-6">
        <div class="flex items-center gap-4">
            <div class="w-14 h-14 rounded-2xl bg-emeraldBrand/20 border border-emeraldBrand/35 flex items-center justify-center text-mintGlow text-2xl shrink-0">
                <i class="fa-solid fa-seedling"></i>
            </div>
            <div>
                <h3 class="text-base sm:text-lg font-bold text-white">Sudah Mengukur Jejak Karbon Anda Hari Ini?</h3>
                <p class="text-xs text-slate-400 mt-0.5">
                    Terapkan wawasan yang Anda pelajari dengan langsung memantau emisi harian dan konsumsi energi fasilitas Anda.
                </p>
            </div>
        </div>

        <div class="flex items-center gap-3 w-full md:w-auto">
            <a href="{{ route('carbon') }}" 
               class="flex-1 md:flex-none px-5 py-2.5 rounded-xl bg-emeraldBrand/20 hover:bg-emeraldBrand/30 border border-emeraldBrand/40 text-mintGlow text-xs font-bold text-center transition-colors">
                Kalkulator Karbon
            </a>
            <a href="{{ route('company') }}" 
               class="flex-1 md:flex-none px-5 py-2.5 rounded-xl bg-gradient-to-r from-emeraldBrand to-emeraldDark text-white text-xs font-bold text-center shadow-md transition-all">
                Konsumsi Energi
            </a>
        </div>
    </div>

</div>
@endsection