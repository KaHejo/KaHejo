@extends('layouts.app')

@section('title', $article->title)

@section('styles')
<style>
    /* Styling for dynamic article HTML content */
    .article-body h2 {
        color: #ffffff;
        font-size: 1.35rem;
        font-weight: 800;
        margin-top: 2rem;
        margin-bottom: 0.85rem;
        letter-spacing: -0.02em;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    .article-body h2::before {
        content: '';
        display: inline-block;
        width: 4px;
        height: 1.1em;
        background: #10b981;
        border-radius: 4px;
    }
    .article-body h3 {
        color: #34d399;
        font-size: 1.15rem;
        font-weight: 700;
        margin-top: 1.5rem;
        margin-bottom: 0.65rem;
    }
    .article-body p {
        color: #cbd5e1;
        font-size: 0.95rem;
        line-height: 1.8;
        margin-bottom: 1.25rem;
    }
    .article-body ul {
        list-style-type: none;
        padding-left: 0;
        margin-bottom: 1.5rem;
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }
    .article-body ul li {
        color: #e2e8f0;
        font-size: 0.92rem;
        position: relative;
        padding-left: 1.5rem;
        line-height: 1.6;
    }
    .article-body ul li::before {
        content: '✔';
        position: absolute;
        left: 0;
        top: 0;
        color: #34d399;
        font-weight: bold;
        font-size: 0.85rem;
    }
    .article-body ol {
        list-style-type: decimal;
        padding-left: 1.5rem;
        color: #cbd5e1;
        margin-bottom: 1.5rem;
    }
    .article-body ol li {
        padding-left: 0.5rem;
        margin-bottom: 0.5rem;
        line-height: 1.6;
    }
</style>
@endsection

@section('content')
<div class="max-w-5xl mx-auto py-8 px-4 sm:px-6 lg:px-8 space-y-8">

    <!-- Navigation Breadcrumbs & Back Button -->
    <div class="flex items-center justify-between">
        <a href="{{ route('education') }}" 
           class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-white/[0.04] hover:bg-white/[0.08] text-slate-300 hover:text-white border border-white/10 text-xs font-bold transition-all group">
            <i class="fa-solid fa-arrow-left text-xs group-hover:-translate-x-1 transition-transform"></i>
            <span>Kembali ke Katalog Edukasi</span>
        </a>

        <span class="text-xs text-slate-400 font-semibold hidden sm:inline-block">
            Materi Edukasi Iklim KaHejo
        </span>
    </div>

    <!-- Main Article Card -->
    <article class="glass-card overflow-hidden relative">
        <div class="absolute -right-20 -top-20 w-80 h-80 bg-emeraldBrand/10 rounded-full blur-3xl pointer-events-none"></div>

        @php
            $imageUrl = $article->image_path;
            if ($imageUrl && !Str::startsWith($imageUrl, ['http://', 'https://'])) {
                $imageUrl = asset('storage/' . $imageUrl);
            }
            if (!$imageUrl) {
                $imageUrl = 'https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?ixlib=rb-1.2.1&auto=format&fit=crop&w=1200&q=80';
            }
        @endphp

        <!-- Featured Cover Image Banner -->
        <div class="relative h-72 sm:h-96 w-full overflow-hidden bg-black/50">
            <img src="{{ $imageUrl }}" alt="{{ $article->title }}" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-[#06150e] via-black/40 to-transparent"></div>

            <div class="absolute bottom-6 left-6 right-6 flex flex-wrap items-center gap-3">
                <span class="px-3 py-1 rounded-lg bg-emeraldBrand/30 border border-emeraldBrand/50 text-mintGlow text-xs font-bold uppercase tracking-wider backdrop-blur-md">
                    Literasi Iklim
                </span>
                <span class="px-3 py-1 rounded-lg bg-black/60 border border-white/15 text-slate-300 text-xs font-medium backdrop-blur-md flex items-center gap-1.5">
                    <i class="fa-regular fa-clock text-mintGlow text-[11px]"></i>
                    <span>{{ $article->reading_time ?? 8 }} Menit Waktu Baca</span>
                </span>
                <span class="px-3 py-1 rounded-lg bg-black/60 border border-white/15 text-slate-300 text-xs font-medium backdrop-blur-md flex items-center gap-1.5">
                    <i class="fa-regular fa-calendar text-slate-400 text-[11px]"></i>
                    <span>{{ $article->published_at ? \Carbon\Carbon::parse($article->published_at)->format('d F Y') : $article->created_at->format('d F Y') }}</span>
                </span>
            </div>
        </div>

        <!-- Article Inner Body -->
        <div class="p-6 sm:p-10 space-y-6">
            <!-- Article Main Title -->
            <h1 class="text-2xl sm:text-4xl font-extrabold text-white tracking-tight leading-tight">
                {{ $article->title }}
            </h1>

            @if($article->description)
                <div class="p-4 rounded-xl bg-emeraldBrand/10 border-l-4 border-emeraldBrand text-slate-300 text-sm italic leading-relaxed">
                    {{ $article->description }}
                </div>
            @endif

            <!-- Article Dynamic HTML Content -->
            <div class="article-body pt-4 border-t border-white/[0.08]">
                {!! $article->content !!}
            </div>

            <!-- Author / Platform Footnote -->
            <div class="pt-8 border-t border-white/[0.08] flex flex-col sm:flex-row items-center justify-between gap-4">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('images/logo.svg') }}" alt="KaHejo Logo" class="w-9 h-9 object-contain">
                    <div>
                        <span class="text-xs font-bold text-white block">Tim Edukasi Iklim KaHejo</span>
                        <span class="text-[11px] text-slate-400 block">Ditinjau berdasarkan pedoman keberlanjutan & mitigasi GRK.</span>
                    </div>
                </div>

                <div class="flex items-center gap-2">
                    <button type="button" onclick="navigator.clipboard.writeText(window.location.href); alert('Tautan artikel berhasil disalin!');" 
                            class="px-4 py-2 rounded-xl bg-white/[0.05] hover:bg-white/[0.1] text-slate-300 hover:text-white border border-white/10 text-xs font-semibold flex items-center gap-2 transition-colors cursor-pointer">
                        <i class="fa-solid fa-share-nodes text-mintGlow text-xs"></i>
                        <span>Bagikan Artikel</span>
                    </button>
                </div>
            </div>
        </div>
    </article>

    <!-- Related Articles Section -->
    @if(isset($related_articles) && $related_articles->count() > 0)
    <div class="space-y-4 pt-4">
        <div class="flex items-center gap-2.5">
            <div class="w-2.5 h-2.5 rounded-full bg-emeraldBrand"></div>
            <h2 class="text-lg sm:text-xl font-extrabold text-white tracking-tight">Artikel Terkait Lainnya</h2>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            @foreach($related_articles->take(2) as $related)
                @php
                    $relImg = $related->image_path;
                    if ($relImg && !Str::startsWith($relImg, ['http://', 'https://'])) {
                        $relImg = asset('storage/' . $relImg);
                    }
                    if (!$relImg) {
                        $relImg = 'https://images.unsplash.com/photo-1501854140801-50d01698950b?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80';
                    }
                @endphp
                <a href="{{ route('education.article', $related->slug) }}" 
                   class="glass-card overflow-hidden group hover:border-emeraldBrand/45 transition-all duration-300 flex items-center gap-4 p-4 text-decoration-none block">
                    <div class="w-24 h-24 rounded-xl overflow-hidden bg-black/40 shrink-0">
                        <img src="{{ $relImg }}" alt="{{ $related->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    </div>
                    <div class="flex-1 min-w-0">
                        <span class="text-[10px] font-bold text-mintGlow uppercase tracking-wider block">
                            {{ $related->reading_time ?? 5 }} Menit Baca
                        </span>
                        <h3 class="text-sm font-bold text-white group-hover:text-mintGlow transition-colors truncate mt-1">
                            {{ $related->title }}
                        </h3>
                        <p class="text-xs text-slate-400 line-clamp-2 mt-1">
                            {{ Str::limit(strip_tags($related->description ?? $related->content), 80) }}
                        </p>
                    </div>
                    <div class="w-8 h-8 rounded-lg bg-white/[0.04] group-hover:bg-emeraldBrand flex items-center justify-center text-slate-400 group-hover:text-white transition-colors shrink-0">
                        <i class="fa-solid fa-arrow-right text-xs"></i>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
    @endif

</div>
@endsection