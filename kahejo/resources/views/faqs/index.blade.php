@extends('layouts.app')

@section('title', 'Tanya Jawab (FAQ)')

@section('styles')
<style>
    /* Details & Summary Styling */
    details summary::-webkit-details-marker {
        display: none;
    }
    details summary {
        list-style: none;
    }
    details {
        transition: border-color 0.35s cubic-bezier(0.16, 1, 0.3, 1), 
                    background 0.35s cubic-bezier(0.16, 1, 0.3, 1), 
                    box-shadow 0.35s cubic-bezier(0.16, 1, 0.3, 1),
                    transform 0.35s cubic-bezier(0.16, 1, 0.3, 1);
    }
    details[open] {
        border-color: rgba(52, 211, 153, 0.4) !important;
        background: rgba(6, 30, 20, 0.6) !important;
        box-shadow: 0 10px 30px -10px rgba(0, 0, 0, 0.6), 0 0 20px rgba(16, 185, 129, 0.12);
    }
    .faq-chevron {
        transition: transform 0.35s cubic-bezier(0.16, 1, 0.3, 1), color 0.25s ease;
    }
    details[open] .faq-chevron {
        transform: rotate(180deg);
        color: #34d399;
    }
    details[open] .faq-question {
        color: #34d399;
    }
    details[open] .faq-answer-container {
        animation: faqExpand 0.35s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }
    @keyframes faqExpand {
        0% { opacity: 0; transform: translateY(-8px); }
        100% { opacity: 1; transform: translateY(0); }
    }
</style>
@endsection

@section('content')
<div class="max-w-5xl mx-auto py-8 px-4 sm:px-6 lg:px-8 space-y-8">

    <!-- Hero Header Card -->
    <div class="glass-card p-6 sm:p-8 relative overflow-hidden">
        <div class="absolute -right-16 -top-16 w-64 h-64 bg-emeraldBrand/15 rounded-full blur-3xl pointer-events-none"></div>

        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 relative z-10">
            <div>
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emeraldBrand/10 border border-emeraldBrand/25 text-mintGlow text-xs font-semibold mb-2">
                    <i class="fa-solid fa-circle-question text-[11px]"></i>
                    <span>Pusat Bantuan & Metodologi KaHejo</span>
                </div>
                <h1 class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight">
                    Tanya Jawab (FAQ)
                </h1>
                <p class="mt-1 text-sm text-slate-400 max-w-2xl">
                    Temukan jawaban atas pertanyaan umum seputar akuntansi karbon, faktor emisi resmi ESDM & IPCC, konversi energi, dan penggunaan platform KaHejo.
                </p>
            </div>

            <!-- Quick Stats Badge -->
            <div class="flex items-center gap-3 self-start md:self-auto">
                <div class="px-4 py-2 rounded-xl bg-white/[0.04] border border-white/10 flex items-center gap-2.5">
                    <div class="w-8 h-8 rounded-lg bg-emeraldBrand/15 text-mintGlow flex items-center justify-center text-xs shrink-0">
                        <i class="fa-solid fa-comments"></i>
                    </div>
                    <div>
                        <span class="text-[10px] uppercase font-bold text-slate-400 block">Total Panduan</span>
                        <span class="text-xs font-extrabold text-white block">{{ $faqs->count() }} Pertanyaan</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Interactive Search Bar -->
        <div class="mt-6 pt-6 border-t border-white/[0.08]">
            <div class="relative group">
                <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-sm group-focus-within:text-mintGlow transition-colors"></i>
                <input type="text" id="faqSearchInput" 
                       placeholder="Cari pertanyaan... (contoh: faktor emisi, Scope 1, offset, atau sertifikat)" 
                       class="w-full pl-12 pr-12 py-3.5 rounded-xl bg-white/[0.04] focus:bg-white/[0.07] border border-white/15 focus:border-emeraldBrand focus:ring-2 focus:ring-emeraldBrand/25 text-white placeholder-slate-400 text-sm font-medium outline-none transition-all">
                <button type="button" id="clearSearchBtn" onclick="clearFaqSearch()" class="hidden absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 hover:text-white transition-colors">
                    <i class="fa-solid fa-xmark text-sm"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Quick Category Pill Filter -->
    <div class="flex flex-wrap items-center gap-2" id="categoryFilters">
        <button type="button" onclick="filterFaqTag('all', this)" class="faq-tag-btn px-4 py-1.5 rounded-xl text-xs font-semibold bg-emeraldBrand/20 text-mintGlow border border-emeraldBrand/40 transition-all">
            Semua Pertanyaan
        </button>
        <button type="button" onclick="filterFaqTag('faktor emisi', this)" class="faq-tag-btn px-4 py-1.5 rounded-xl text-xs font-semibold bg-white/[0.04] text-slate-300 border border-white/10 hover:text-white hover:border-emeraldBrand/40 transition-all">
            Faktor Emisi & Metodologi
        </button>
        <button type="button" onclick="filterFaqTag('scope', this)" class="faq-tag-btn px-4 py-1.5 rounded-xl text-xs font-semibold bg-white/[0.04] text-slate-300 border border-white/10 hover:text-white hover:border-emeraldBrand/40 transition-all">
            Scope 1, 2, & 3
        </button>
        <button type="button" onclick="filterFaqTag('sertifikat', this)" class="faq-tag-btn px-4 py-1.5 rounded-xl text-xs font-semibold bg-white/[0.04] text-slate-300 border border-white/10 hover:text-white hover:border-emeraldBrand/40 transition-all">
            Cetak PDF & Verifikasi
        </button>
        <button type="button" onclick="filterFaqTag('offset', this)" class="faq-tag-btn px-4 py-1.5 rounded-xl text-xs font-semibold bg-white/[0.04] text-slate-300 border border-white/10 hover:text-white hover:border-emeraldBrand/40 transition-all">
            Pohon & Offset Karbon
        </button>
    </div>

    <!-- FAQ Accordion List -->
    <div class="space-y-4" id="faqAccordionContainer">
        @forelse($faqs as $index => $faq)
            <details class="faq-item glass-card p-5 sm:p-6 transition-all duration-300 rounded-2xl group border border-white/10 hover:border-emeraldBrand/30" 
                     data-question="{{ strtolower($faq->question) }}" 
                     data-answer="{{ strtolower($faq->answer) }}">
                <summary class="flex items-center justify-between gap-4 font-bold text-white transition-colors cursor-pointer select-none">
                    <div class="flex items-center gap-3.5">
                        <div class="w-8 h-8 rounded-xl bg-emeraldBrand/15 border border-emeraldBrand/25 text-mintGlow flex items-center justify-center text-xs font-bold shrink-0">
                            {{ $index + 1 }}
                        </div>
                        <span class="faq-question text-sm sm:text-base font-bold transition-colors leading-snug">
                            {{ $faq->question }}
                        </span>
                    </div>
                    <div class="w-8 h-8 rounded-lg bg-white/[0.03] group-hover:bg-white/[0.07] flex items-center justify-center text-slate-400 shrink-0 transition-colors">
                        <i class="fa-solid fa-chevron-down text-xs faq-chevron transition-transform duration-300"></i>
                    </div>
                </summary>

                <!-- Answer Content -->
                <div class="faq-answer-container mt-4 pt-4 border-t border-white/[0.06] text-xs sm:text-sm text-slate-300 leading-relaxed space-y-2">
                    {!! nl2br(e($faq->answer)) !!}
                </div>
            </details>
        @empty
            <div class="glass-card p-12 text-center space-y-3">
                <div class="w-14 h-14 rounded-2xl bg-emeraldBrand/15 text-mintGlow flex items-center justify-center text-2xl mx-auto">
                    <i class="fa-solid fa-circle-question"></i>
                </div>
                <h3 class="text-base font-bold text-white">Belum Ada FAQ Tersedia</h3>
                <p class="text-xs text-slate-400">Pertanyaan umum sedang dirangkum oleh tim dukungan kami.</p>
            </div>
        @endforelse

        <!-- No Results Fallback for Search -->
        <div id="noFaqResults" class="hidden glass-card p-10 text-center space-y-3">
            <div class="w-12 h-12 rounded-xl bg-rose-500/15 text-rose-400 flex items-center justify-center text-xl mx-auto">
                <i class="fa-solid fa-magnifying-glass"></i>
            </div>
            <h3 class="text-sm font-bold text-white">Tidak Ditemukan Jawaban yang Cocok</h3>
            <p class="text-xs text-slate-400">Coba gunakan kata kunci lain atau pilih salah satu filter topik di atas.</p>
        </div>
    </div>

    <!-- Bottom Help CTA Card -->
    <div class="glass-card p-6 sm:p-8 bg-gradient-to-r from-emerald-950/40 via-[#0a271b]/60 to-emerald-950/40 border-emeraldBrand/30 flex flex-col md:flex-row items-center justify-between gap-6">
        <div class="flex items-center gap-4">
            <div class="w-14 h-14 rounded-2xl bg-emeraldBrand/20 border border-emeraldBrand/35 flex items-center justify-center text-mintGlow text-2xl shrink-0">
                <i class="fa-solid fa-headset"></i>
            </div>
            <div>
                <h3 class="text-base sm:text-lg font-bold text-white">Punya Pertanyaan Lain yang Belum Terjawab?</h3>
                <p class="text-xs text-slate-400 mt-0.5">
                    Pelajari artikel panduan di modul Edukasi Iklim atau langsung mulai menghitung emisi pertama Anda.
                </p>
            </div>
        </div>

        <div class="flex items-center gap-3 w-full md:w-auto">
            <a href="{{ route('education') }}" 
               class="flex-1 md:flex-none px-5 py-2.5 rounded-xl bg-white/[0.05] hover:bg-white/[0.1] border border-white/15 text-slate-200 hover:text-white text-xs font-bold text-center transition-colors">
                Baca Edukasi Iklim
            </a>
            <a href="{{ route('carbon') }}" 
               class="flex-1 md:flex-none px-5 py-2.5 rounded-xl bg-gradient-to-r from-emeraldBrand to-emeraldDark text-white text-xs font-bold text-center shadow-lg shadow-emeraldBrand/20 transition-all">
                Kalkulator Karbon
            </a>
        </div>
    </div>

</div>
@endsection

@section('scripts')
<script>
    // Live Search Filter
    const searchInput = document.getElementById('faqSearchInput');
    const clearBtn = document.getElementById('clearSearchBtn');
    const faqItems = document.querySelectorAll('.faq-item');
    const noResults = document.getElementById('noFaqResults');

    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const query = this.value.trim().toLowerCase();
            if (query.length > 0) {
                clearBtn.classList.remove('hidden');
            } else {
                clearBtn.classList.add('hidden');
            }

            let matchCount = 0;
            faqItems.forEach(item => {
                const question = item.getAttribute('data-question') || '';
                const answer = item.getAttribute('data-answer') || '';

                if (question.includes(query) || answer.includes(query)) {
                    item.classList.remove('hidden');
                    matchCount++;
                    if (query.length > 2) {
                        item.setAttribute('open', 'true');
                    }
                } else {
                    item.classList.add('hidden');
                    item.removeAttribute('open');
                }
            });

            if (matchCount === 0) {
                noResults.classList.remove('hidden');
            } else {
                noResults.classList.add('hidden');
            }
        });
    }

    function clearFaqSearch() {
        if (searchInput) {
            searchInput.value = '';
            clearBtn.classList.add('hidden');
            faqItems.forEach(item => {
                item.classList.remove('hidden');
                item.removeAttribute('open');
            });
            noResults.classList.add('hidden');
        }
    }

    function filterFaqTag(tag, buttonEl) {
        // Highlight active tag
        document.querySelectorAll('.faq-tag-btn').forEach(btn => {
            btn.className = 'faq-tag-btn px-4 py-1.5 rounded-xl text-xs font-semibold bg-white/[0.04] text-slate-300 border border-white/10 hover:text-white hover:border-emeraldBrand/40 transition-all';
        });
        buttonEl.className = 'faq-tag-btn px-4 py-1.5 rounded-xl text-xs font-semibold bg-emeraldBrand/20 text-mintGlow border border-emeraldBrand/40 transition-all';

        if (tag === 'all') {
            clearFaqSearch();
            return;
        }

        searchInput.value = tag;
        searchInput.dispatchEvent(new Event('input'));
    }
</script>
@endsection
