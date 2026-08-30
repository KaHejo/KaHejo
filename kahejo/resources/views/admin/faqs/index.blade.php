@extends('layouts.admin')

@section('title', 'Manajemen FAQ')
@section('page-title', 'Manajemen FAQ')

@section('main-content')
<div class="max-w-7xl mx-auto space-y-6">

    <!-- Header & Action Row -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight flex items-center gap-2.5">
                <i class="fa-solid fa-circle-question text-emeraldBrand text-2xl"></i>
                <span>Pusat Tanya Jawab (FAQ)</span>
            </h1>
            <p class="text-slate-400 text-xs sm:text-sm mt-1">Kelola pertanyaan yang sering diajukan seputar metodologi emisi, reward, dan operasional KaHejo.</p>
        </div>

        <a href="{{ route('admin.faqs.create') }}" class="px-4 py-2.5 rounded-xl bg-gradient-to-r from-emeraldBrand to-emeraldDark hover:from-[#18c58f] hover:to-emeraldDark text-white text-xs font-bold shadow-lg shadow-emeraldBrand/25 transition-all transform hover:-translate-y-0.5 flex items-center gap-2 text-decoration-none self-start sm:self-auto">
            <i class="fa-solid fa-plus text-xs"></i>
            <span>Tambah Pertanyaan FAQ</span>
        </a>
    </div>

    <!-- FAQs Glass Table Container -->
    <div class="glass-card overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-xs sm:text-sm">
                <thead>
                    <tr class="border-b border-emeraldBrand/20 bg-emerald-950/40 text-slate-300 font-bold uppercase tracking-wider text-[11px]">
                        <th class="py-4 px-6">No</th>
                        <th class="py-4 px-6">Pertanyaan</th>
                        <th class="py-4 px-6">Status Publikasi</th>
                        <th class="py-4 px-6">Urutan</th>
                        <th class="py-4 px-6 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5 text-slate-200">
                    @forelse($faqs as $index => $faq)
                    <tr class="hover:bg-white/[0.03] transition-colors">
                        <td class="py-4 px-6 font-semibold text-slate-400">
                            {{ $index + 1 }}
                        </td>
                        <td class="py-4 px-6 max-w-md">
                            <div class="font-bold text-white mb-1">{{ $faq->question }}</div>
                            <div class="text-[11px] text-slate-400 line-clamp-1">{{ Str::limit(strip_tags($faq->answer), 90) }}</div>
                        </td>
                        <td class="py-4 px-6">
                            @if($faq->is_published)
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-emerald-500/15 border border-emerald-500/30 text-emerald-300 font-semibold text-xs">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
                                    <span>Aktif / Terbit</span>
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-slate-500/15 border border-slate-500/30 text-slate-300 font-semibold text-xs">
                                    <span>Draft</span>
                                </span>
                            @endif
                        </td>
                        <td class="py-4 px-6 font-mono text-slate-300">
                            #{{ $faq->order ?? 1 }}
                        </td>
                        <td class="py-4 px-6 text-center whitespace-nowrap">
                            <div class="inline-flex items-center gap-2">
                                <a href="{{ route('admin.faqs.edit', $faq->id) }}" class="w-8 h-8 rounded-lg bg-emerald-500/15 hover:bg-emerald-500/30 border border-emerald-500/30 text-mintGlow flex items-center justify-center transition-colors" title="Edit FAQ">
                                    <i class="fa-solid fa-pen-to-square text-xs"></i>
                                </a>
                                <form action="{{ route('admin.faqs.delete', $faq->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus FAQ ini?')" class="inline m-0">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-8 h-8 rounded-lg bg-rose-500/15 hover:bg-rose-500/30 border border-rose-500/30 text-rose-400 flex items-center justify-center transition-colors cursor-pointer" title="Hapus FAQ">
                                        <i class="fa-solid fa-trash text-xs"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-12 text-slate-400">
                            <div class="w-12 h-12 rounded-2xl bg-white/5 flex items-center justify-center text-slate-500 mx-auto mb-3 text-lg">
                                <i class="fa-solid fa-circle-question"></i>
                            </div>
                            <p class="font-medium text-sm">Belum ada daftar pertanyaan FAQ.</p>
                            <a href="{{ route('admin.faqs.create') }}" class="text-xs text-mintGlow hover:underline mt-2 inline-block font-semibold">
                                + Buat FAQ Pertama
                            </a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection