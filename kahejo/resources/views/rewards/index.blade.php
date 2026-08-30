@extends('layouts.app')

@section('title', 'Katalog Rewards')

@section('content')
<div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8 space-y-8">

    <!-- Top Hero Header & Points Summary Card -->
    <div class="glass-card p-6 sm:p-8 relative overflow-hidden">
        <div class="absolute -right-16 -top-16 w-64 h-64 bg-amber-500/10 rounded-full blur-3xl pointer-events-none"></div>

        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 relative z-10">
            <div>
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-amber-500/15 border border-amber-500/30 text-amber-300 text-xs font-semibold mb-2">
                    <i class="fa-solid fa-gift text-[11px]"></i>
                    <span>Tukar Poin Aksi Hijau</span>
                </div>
                <h1 class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight">
                    Katalog Hadiah & Rewards
                </h1>
                <p class="mt-1 text-sm text-slate-400 max-w-2xl">
                    Tukarkan akumulasi poin pengurangan jejak karbon Anda dengan merchandise ramah lingkungan dan voucher menarik!
                </p>
            </div>

            <!-- Total Points Balance Card -->
            @php
                $user = Auth::user();
                $totalPoints = $user->points ?? 0;
            @endphp
            <div class="flex items-center gap-4 self-start md:self-auto">
                <div class="p-4 rounded-2xl bg-white/[0.04] border border-white/10 flex items-center gap-3.5 shadow-lg shadow-black/20">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-amber-400 to-amber-600 flex items-center justify-center text-white text-xl shadow-lg shadow-amber-500/25 shrink-0">
                        <i class="fa-solid fa-coins"></i>
                    </div>
                    <div>
                        <span class="text-[10px] uppercase font-bold text-slate-400 block tracking-wider">Saldo Poin Anda</span>
                        <span class="text-xl font-black text-white leading-none block mt-0.5">
                            {{ number_format($totalPoints, 0, ',', '.') }} <span class="text-xs text-amber-400 font-semibold">PTS</span>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navigation Tabs: Prestasi & Rewards -->
        <div class="flex items-center gap-3 mt-6 pt-6 border-t border-white/[0.08]">
            <a href="{{ route('achievements') }}" 
               class="px-4 py-2 rounded-xl bg-white/[0.04] hover:bg-white/[0.08] text-slate-300 hover:text-white border border-white/10 text-xs font-semibold flex items-center gap-2 transition-colors">
                <i class="fa-solid fa-medal text-xs text-mintGlow"></i>
                <span>Daftar Prestasi & Badges</span>
            </a>
            <a href="{{ route('rewards') }}" 
               class="px-4 py-2 rounded-xl bg-emeraldBrand/20 text-mintGlow border border-emeraldBrand/40 text-xs font-bold flex items-center gap-2 shadow-sm">
                <i class="fa-solid fa-gift text-xs text-amber-400"></i>
                <span>Tukar Rewards & Hadiah</span>
            </a>
        </div>
    </div>

    <!-- Rewards Grid Section -->
    <div class="space-y-4">
        <div class="flex items-center justify-between">
            <h2 class="text-lg font-bold text-white tracking-tight flex items-center gap-2">
                <i class="fa-solid fa-boxes-stacked text-mintGlow text-sm"></i>
                <span>Pilihan Reward Tersedia</span>
            </h2>
            <span class="text-xs text-slate-400">Total {{ count($rewards) }} item</span>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse($rewards as $reward)
                @php
                    $canRedeem = ($totalPoints >= $reward->points_required) && ($reward->stock > 0);
                @endphp
                <div class="glass-card p-6 flex flex-col justify-between relative overflow-hidden transition-all duration-300 group hover:-translate-y-1">
                    
                    <!-- Top Stock & Points Badges -->
                    <div class="flex items-center justify-between gap-2 mb-4">
                        <span class="px-2.5 py-1 rounded-full text-[11px] font-bold flex items-center gap-1
                            {{ $reward->stock > 0 ? 'bg-emerald-500/15 text-mintGlow border border-emerald-500/30' : 'bg-rose-500/15 text-rose-400 border border-rose-500/30' }}">
                            <i class="fa-solid {{ $reward->stock > 0 ? 'fa-box' : 'fa-ban' }} text-[10px]"></i>
                            <span>Stok: {{ $reward->stock }}</span>
                        </span>

                        <span class="px-2.5 py-1 rounded-full bg-amber-400/15 text-amber-300 border border-amber-400/30 text-[11px] font-black flex items-center gap-1">
                            <i class="fa-solid fa-coins text-[10px] text-amber-400"></i>
                            <span>{{ number_format($reward->points_required, 0, ',', '.') }} PTS</span>
                        </span>
                    </div>

                    <!-- Image Showcase Container -->
                    <div class="w-full h-40 mb-4 rounded-2xl bg-white/[0.03] border border-white/10 flex items-center justify-center p-3 relative overflow-hidden group-hover:border-emeraldBrand/30 transition-colors">
                        @if($reward->reward_image)
                            <img src="{{ asset($reward->reward_image) }}" 
                                 alt="{{ $reward->reward_name }}" 
                                 class="w-full h-full object-contain transition-transform duration-300 group-hover:scale-110 drop-shadow-md">
                        @else
                            <i class="fa-solid fa-gift text-5xl text-emeraldBrand/40 group-hover:scale-110 transition-transform"></i>
                        @endif
                    </div>

                    <!-- Info -->
                    <div class="mb-5 flex-1">
                        <h3 class="font-extrabold text-white text-base mb-1 group-hover:text-mintGlow transition-colors line-clamp-1">
                            {{ $reward->reward_name }}
                        </h3>
                        <p class="text-xs text-slate-400 line-clamp-2 leading-relaxed">
                            {{ $reward->reward_description }}
                        </p>
                    </div>

                    <!-- Action Button -->
                    <div class="pt-3 border-t border-white/[0.08]">
                        @if($reward->stock > 0)
                            @if($totalPoints >= $reward->points_required)
                                <form action="{{ route('rewards.redeem', $reward->id) }}" method="POST" class="redeem-form w-full"
                                      data-name="{{ $reward->reward_name }}"
                                      data-desc="{{ $reward->reward_description }}"
                                      data-image="{{ $reward->reward_image ? asset($reward->reward_image) : '' }}"
                                      data-points="{{ $reward->points_required }}"
                                      data-stock="{{ $reward->stock }}">
                                    @csrf
                                    <button type="submit" 
                                            class="w-full py-2.5 px-4 rounded-xl bg-gradient-to-r from-emeraldBrand to-emeraldDark hover:from-[#18c58f] hover:to-emeraldDark text-white text-xs font-bold shadow-lg shadow-emeraldBrand/25 hover:shadow-emeraldBrand/40 transition-all duration-200 flex items-center justify-center gap-2 cursor-pointer">
                                        <i class="fa-solid fa-check-circle text-xs"></i>
                                        <span>Tukar Reward Ini</span>
                                    </button>
                                </form>
                            @else
                                <button disabled 
                                        class="w-full py-2.5 px-4 rounded-xl bg-white/[0.04] border border-white/10 text-slate-400 text-xs font-semibold flex items-center justify-center gap-2 cursor-not-allowed"
                                        title="Poin Anda tidak mencukupi (Butuh {{ $reward->points_required - $totalPoints }} pts lagi)">
                                    <i class="fa-solid fa-lock text-xs text-slate-500"></i>
                                    <span>Poin Belum Cukup</span>
                                </button>
                            @endif
                        @else
                            <button disabled 
                                    class="w-full py-2.5 px-4 rounded-xl bg-rose-500/10 border border-rose-500/20 text-rose-400 text-xs font-semibold flex items-center justify-center gap-2 cursor-not-allowed">
                                <i class="fa-solid fa-ban text-xs"></i>
                                <span>Stok Habis</span>
                            </button>
                        @endif
                    </div>

                </div>
            @empty
                <div class="col-span-4 glass-card p-12 text-center text-slate-400">
                    <i class="fa-solid fa-gift text-4xl text-slate-600 mb-3 block"></i>
                    <p class="text-sm font-semibold text-white">Belum Ada Reward</p>
                    <p class="text-xs text-slate-400 mt-1">Reward baru akan segera ditambahkan di katalog.</p>
                </div>
            @endforelse
        </div>
    </div>

</div>

<!-- Modal Konfirmasi Redeem (Obsidian Emerald Glass Modal) -->
<div id="redeemModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/75 backdrop-blur-md hidden transition-opacity duration-200 p-4">
    <div class="glass-card max-w-md w-full p-6 sm:p-7 relative border border-emeraldBrand/30 shadow-2xl shadow-black/80 animate-scaleUp">
        
        <!-- Close Button -->
        <button id="closeModalBtn" class="absolute top-4 right-4 w-8 h-8 rounded-lg bg-white/[0.05] hover:bg-white/[0.1] text-slate-400 hover:text-white flex items-center justify-center transition-colors cursor-pointer" aria-label="Tutup">
            <i class="fa-solid fa-xmark text-sm"></i>
        </button>

        <div class="flex flex-col items-center text-center">
            <!-- Modal Reward Image Container -->
            <div id="modalRewardImage" class="w-24 h-24 mb-4 rounded-2xl bg-white/[0.04] border border-white/10 flex items-center justify-center p-2 shadow-inner"></div>

            <span class="px-3 py-1 rounded-full bg-emeraldBrand/15 border border-emeraldBrand/30 text-mintGlow text-[11px] font-bold mb-2">
                Konfirmasi Penukaran Poin
            </span>

            <h3 id="modalRewardName" class="font-extrabold text-xl text-white tracking-tight mb-1"></h3>
            <p id="modalRewardDesc" class="text-slate-400 text-xs mb-5 max-w-sm leading-relaxed"></p>

            <!-- Points Cost Breakdown Box -->
            <div class="w-full p-4 rounded-xl bg-white/[0.03] border border-white/10 mb-6 space-y-2 text-xs">
                <div class="flex items-center justify-between text-slate-300">
                    <span>Biaya Poin:</span>
                    <span id="modalRewardPoints" class="font-black text-amber-300"></span>
                </div>
                <div class="flex items-center justify-between text-slate-300">
                    <span>Saldo Poin Anda Saat Ini:</span>
                    <span class="font-bold text-white">{{ number_format($totalPoints, 0, ',', '.') }} PTS</span>
                </div>
                <div class="flex items-center justify-between pt-2 border-t border-white/[0.08] text-slate-300">
                    <span>Ketersediaan Stok:</span>
                    <span id="modalRewardStock" class="font-bold text-mintGlow"></span>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center gap-3 w-full">
                <button type="button" id="cancelModalBtn" class="flex-1 py-2.5 px-4 rounded-xl bg-white/[0.06] hover:bg-white/[0.12] text-slate-300 text-xs font-semibold transition-colors cursor-pointer">
                    Batal
                </button>
                <form id="modalRedeemForm" method="POST" class="flex-1">
                    @csrf
                    <button type="submit" class="w-full py-2.5 px-4 rounded-xl bg-gradient-to-r from-emeraldBrand to-emeraldDark hover:from-[#18c58f] hover:to-emeraldDark text-white text-xs font-bold shadow-lg shadow-emeraldBrand/25 transition-all cursor-pointer">
                        <i class="fa-solid fa-check mr-1.5 text-xs"></i>
                        <span>Konfirmasi</span>
                    </button>
                </form>
            </div>
        </div>

    </div>
</div>

@section('scripts')
<script>
    document.querySelectorAll('.redeem-form').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();

            const name = form.getAttribute('data-name');
            const desc = form.getAttribute('data-desc');
            const image = form.getAttribute('data-image');
            const points = form.getAttribute('data-points');
            const stock = form.getAttribute('data-stock');

            document.getElementById('modalRewardName').textContent = name;
            document.getElementById('modalRewardDesc').textContent = desc;
            document.getElementById('modalRewardPoints').textContent = points + ' PTS';
            document.getElementById('modalRewardStock').textContent = stock + ' unit';

            const imgDiv = document.getElementById('modalRewardImage');
            if (image) {
                imgDiv.innerHTML = `<img src="${image}" alt="${name}" class="w-full h-full object-contain drop-shadow">`;
            } else {
                imgDiv.innerHTML = `<i class="fa-solid fa-gift text-4xl text-emeraldBrand"></i>`;
            }

            document.getElementById('modalRedeemForm').action = form.action;
            document.getElementById('redeemModal').classList.remove('hidden');
        });
    });

    const closeModal = () => document.getElementById('redeemModal').classList.add('hidden');
    
    document.getElementById('closeModalBtn').onclick = closeModal;
    document.getElementById('cancelModalBtn').onclick = closeModal;
    document.getElementById('redeemModal').addEventListener('click', function(e) {
        if (e.target === this) closeModal();
    });
</script>
@endsection
@endsection