@extends('layouts.app')

@section('title', 'Profile Saya')

@section('content')
<div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8 space-y-8">
    
    <!-- Profile Header Hero Card (Obsidian Emerald Glass) -->
    <div class="glass-card p-6 sm:p-8 relative overflow-hidden">
        <!-- Ambient radial glow behind header -->
        <div class="absolute -right-20 -top-20 w-64 h-64 bg-emeraldBrand/15 rounded-full blur-3xl pointer-events-none"></div>

        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-6 relative z-10">
            <div class="flex items-center gap-5">
                <!-- Avatar with glowing neon ring -->
                <div class="relative group shrink-0">
                    @if(Auth::user()->profile_photo_path)
                        <img class="h-20 w-20 rounded-2xl object-cover ring-4 ring-emeraldBrand/40 shadow-xl shadow-emeraldBrand/25" 
                             src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}" 
                             alt="{{ Auth::user()->name }}">
                    @else
                        <div class="h-20 w-20 rounded-2xl bg-gradient-to-br from-emerald-700 to-emerald-900 ring-4 ring-emeraldBrand/40 shadow-xl shadow-emeraldBrand/25 flex items-center justify-center text-2xl font-black text-white">
                            {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                        </div>
                    @endif
                    <div class="absolute -bottom-1.5 -right-1.5 w-6 h-6 rounded-full bg-emeraldBrand border-2 border-[#050d0a] flex items-center justify-center text-[10px] text-[#050d0a] font-black" title="Terverifikasi">
                        <i class="fa-solid fa-check"></i>
                    </div>
                </div>

                <div>
                    <div class="flex items-center gap-2 flex-wrap mb-1">
                        <h1 class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight">{{ Auth::user()->name }}</h1>
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-emeraldBrand/15 border border-emeraldBrand/30 text-mintGlow text-[11px] font-bold">
                            <i class="fa-solid fa-shield-halved text-[10px]"></i>
                            <span>Pegiat Net-Zero</span>
                        </span>
                    </div>
                    <p class="text-sm text-slate-400 flex items-center gap-2">
                        <i class="fa-solid fa-envelope text-xs text-mintGlow"></i>
                        <span>{{ Auth::user()->email }}</span>
                    </p>
                </div>
            </div>

            <!-- Quick Stats Pills -->
            <div class="flex items-center gap-3 self-start sm:self-auto">
                <div class="bg-white/[0.04] border border-white/10 rounded-2xl px-4 py-2.5 text-center">
                    <span class="text-[10px] uppercase font-bold text-slate-400 block tracking-wider">Status Akun</span>
                    <span class="text-xs font-extrabold text-mintGlow flex items-center gap-1.5 mt-0.5">
                        <span class="w-2 h-2 rounded-full bg-emeraldBrand animate-pulse"></span>
                        <span>Aktif & Terlindungi</span>
                    </span>
                </div>
                <div class="bg-white/[0.04] border border-white/10 rounded-2xl px-4 py-2.5 text-center">
                    <span class="text-[10px] uppercase font-bold text-slate-400 block tracking-wider">Peran Akun</span>
                    <span class="text-xs font-extrabold text-white mt-0.5 block">
                        {{ ucfirst(Auth::user()->role ?? 'Member') }}
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Forms Grid: Personal Info & Security -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        
        <!-- Form 1: Personal Information (7 Columns) -->
        <div class="lg:col-span-7 glass-card p-6 sm:p-8 flex flex-col justify-between">
            <div>
                <!-- Form Header -->
                <div class="flex items-center gap-3.5 pb-5 mb-6 border-b border-white/[0.08]">
                    <div class="w-11 h-11 rounded-xl bg-emeraldBrand/15 border border-emeraldBrand/30 flex items-center justify-center text-mintGlow text-lg shadow-sm">
                        <i class="fa-solid fa-user-pen"></i>
                    </div>
                    <div>
                        <h2 class="text-lg sm:text-xl font-extrabold text-white tracking-tight">Informasi Personal</h2>
                        <p class="text-xs text-slate-400 mt-0.5">Perbarui data profil dan informasi identitas akun Anda.</p>
                    </div>
                </div>

                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                    @csrf
                    @method('PUT')

                    <!-- Photo Upload Section -->
                    <div class="p-4 rounded-2xl bg-white/[0.03] border border-white/[0.08] flex items-center gap-4">
                        <div class="shrink-0">
                            @if(Auth::user()->profile_photo_path)
                                <img id="avatarPreview" class="h-14 w-14 rounded-xl object-cover ring-2 ring-emeraldBrand/40" 
                                     src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}" 
                                     alt="Preview">
                            @else
                                <div id="avatarPreview" class="h-14 w-14 rounded-xl bg-emerald-800/80 ring-2 ring-emeraldBrand/40 flex items-center justify-center text-sm font-bold text-white">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                                </div>
                            @endif
                        </div>
                        <div class="flex-1">
                            <label class="block text-xs font-semibold text-white mb-1">Ganti Foto Profil</label>
                            <input type="file" name="photo" id="photoInput" accept="image/*" 
                                   class="block w-full text-xs text-slate-400 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-emeraldBrand/15 file:text-mintGlow hover:file:bg-emeraldBrand/25 file:cursor-pointer cursor-pointer">
                            <p class="text-[10px] text-slate-500 mt-1">Format: JPG, PNG, atau GIF (Maks. 2MB)</p>
                        </div>
                    </div>

                    <!-- Name Field -->
                    <div>
                        <label for="name" class="block text-xs font-semibold text-slate-300 mb-1.5">
                            Nama Lengkap <span class="text-emeraldBrand">*</span>
                        </label>
                        <div class="relative group">
                            <i class="fa-solid fa-user absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-500 text-sm group-focus-within:text-mintGlow transition-colors"></i>
                            <input type="text" 
                                   name="name" 
                                   id="name" 
                                   value="{{ old('name', Auth::user()->name) }}" 
                                   required
                                   placeholder="Nama lengkap Anda"
                                   class="w-full pl-11 pr-4 py-3 rounded-xl bg-white/[0.04] focus:bg-white/[0.07] border border-white/15 focus:border-emeraldBrand focus:ring-2 focus:ring-emeraldBrand/25 text-white placeholder-slate-500 text-sm font-medium outline-none transition-all">
                        </div>
                        @error('name')
                            <p class="mt-1 text-xs text-rose-400 flex items-center gap-1">
                                <i class="fa-solid fa-circle-exclamation text-[10px]"></i>
                                <span>{{ $message }}</span>
                            </p>
                        @enderror
                    </div>

                    <!-- Email Field -->
                    <div>
                        <label for="email" class="block text-xs font-semibold text-slate-300 mb-1.5">
                            Alamat Email <span class="text-emeraldBrand">*</span>
                        </label>
                        <div class="relative group">
                            <i class="fa-solid fa-envelope absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-500 text-sm group-focus-within:text-mintGlow transition-colors"></i>
                            <input type="email" 
                                   name="email" 
                                   id="email" 
                                   value="{{ old('email', Auth::user()->email) }}" 
                                   required
                                   placeholder="nama@domain.com"
                                   class="w-full pl-11 pr-4 py-3 rounded-xl bg-white/[0.04] focus:bg-white/[0.07] border border-white/15 focus:border-emeraldBrand focus:ring-2 focus:ring-emeraldBrand/25 text-white placeholder-slate-500 text-sm font-medium outline-none transition-all">
                        </div>
                        @error('email')
                            <p class="mt-1 text-xs text-rose-400 flex items-center gap-1">
                                <i class="fa-solid fa-circle-exclamation text-[10px]"></i>
                                <span>{{ $message }}</span>
                            </p>
                        @enderror
                    </div>

                    <!-- Two Columns: Phone & Company -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <!-- Phone -->
                        <div>
                            <label for="phone" class="block text-xs font-semibold text-slate-300 mb-1.5">
                                Nomor Telepon / WhatsApp
                            </label>
                            <div class="relative group">
                                <i class="fa-solid fa-phone absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-500 text-sm group-focus-within:text-mintGlow transition-colors"></i>
                                <input type="text" 
                                       name="phone" 
                                       id="phone" 
                                       value="{{ old('phone', Auth::user()->phone ?? '') }}" 
                                       placeholder="08123456789"
                                       class="w-full pl-11 pr-4 py-3 rounded-xl bg-white/[0.04] focus:bg-white/[0.07] border border-white/15 focus:border-emeraldBrand focus:ring-2 focus:ring-emeraldBrand/25 text-white placeholder-slate-500 text-sm font-medium outline-none transition-all">
                            </div>
                        </div>

                        <!-- Company -->
                        <div>
                            <label for="company" class="block text-xs font-semibold text-slate-300 mb-1.5">
                                Perusahaan / Institusi
                            </label>
                            <div class="relative group">
                                <i class="fa-solid fa-building absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-500 text-sm group-focus-within:text-mintGlow transition-colors"></i>
                                <input type="text" 
                                       name="company" 
                                       id="company" 
                                       value="{{ old('company', Auth::user()->company ?? '') }}" 
                                       placeholder="Nama instansi / komunitas"
                                       class="w-full pl-11 pr-4 py-3 rounded-xl bg-white/[0.04] focus:bg-white/[0.07] border border-white/15 focus:border-emeraldBrand focus:ring-2 focus:ring-emeraldBrand/25 text-white placeholder-slate-500 text-sm font-medium outline-none transition-all">
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-3 border-t border-white/[0.08] flex justify-end">
                        <button type="submit" 
                                class="px-6 py-3 rounded-xl bg-gradient-to-r from-emeraldBrand to-emeraldDark hover:from-[#18c58f] hover:to-emeraldDark text-white text-xs font-bold tracking-wide shadow-lg shadow-emeraldBrand/25 hover:shadow-emeraldBrand/40 transition-all duration-200 hover:-translate-y-0.5 flex items-center gap-2 cursor-pointer">
                            <i class="fa-solid fa-floppy-disk text-xs"></i>
                            <span>Simpan Perubahan Profil</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Form 2: Update Password (5 Columns) -->
        <div class="lg:col-span-5 glass-card p-6 sm:p-8 flex flex-col justify-between">
            <div>
                <!-- Form Header -->
                <div class="flex items-center gap-3.5 pb-5 mb-6 border-b border-white/[0.08]">
                    <div class="w-11 h-11 rounded-xl bg-emeraldBrand/15 border border-emeraldBrand/30 flex items-center justify-center text-mintGlow text-lg shadow-sm">
                        <i class="fa-solid fa-shield-halved"></i>
                    </div>
                    <div>
                        <h2 class="text-lg sm:text-xl font-extrabold text-white tracking-tight">Keamanan & Kata Sandi</h2>
                        <p class="text-xs text-slate-400 mt-0.5">Ubah kata sandi untuk menjaga keamanan akun Anda.</p>
                    </div>
                </div>

                <form action="{{ route('password.update') }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <!-- Current Password -->
                    <div>
                        <label for="current_password" class="block text-xs font-semibold text-slate-300 mb-1.5">
                            Kata Sandi Saat Ini <span class="text-emeraldBrand">*</span>
                        </label>
                        <div class="relative group">
                            <i class="fa-solid fa-lock absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-500 text-sm group-focus-within:text-mintGlow transition-colors"></i>
                            <input type="password" 
                                   name="current_password" 
                                   id="current_password" 
                                   required
                                   placeholder="Masukkan sandi saat ini"
                                   class="w-full pl-11 pr-10 py-3 rounded-xl bg-white/[0.04] focus:bg-white/[0.07] border border-white/15 focus:border-emeraldBrand focus:ring-2 focus:ring-emeraldBrand/25 text-white placeholder-slate-500 text-sm font-medium outline-none transition-all">
                            <button type="button" 
                                    class="absolute right-3.5 top-1/2 -translate-y-1/2 text-slate-500 hover:text-mintGlow transition-colors focus:outline-none" 
                                    onclick="togglePass('current_password', this)">
                                <i class="fa-solid fa-eye text-xs"></i>
                            </button>
                        </div>
                        @error('current_password')
                            <p class="mt-1 text-xs text-rose-400 flex items-center gap-1">
                                <i class="fa-solid fa-circle-exclamation text-[10px]"></i>
                                <span>{{ $message }}</span>
                            </p>
                        @enderror
                    </div>

                    <!-- New Password -->
                    <div>
                        <label for="new_password" class="block text-xs font-semibold text-slate-300 mb-1.5">
                            Kata Sandi Baru <span class="text-emeraldBrand">*</span>
                        </label>
                        <div class="relative group">
                            <i class="fa-solid fa-key absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-500 text-sm group-focus-within:text-mintGlow transition-colors"></i>
                            <input type="password" 
                                   name="password" 
                                   id="new_password" 
                                   required
                                   placeholder="Minimal 8 karakter"
                                   class="w-full pl-11 pr-10 py-3 rounded-xl bg-white/[0.04] focus:bg-white/[0.07] border border-white/15 focus:border-emeraldBrand focus:ring-2 focus:ring-emeraldBrand/25 text-white placeholder-slate-500 text-sm font-medium outline-none transition-all">
                            <button type="button" 
                                    class="absolute right-3.5 top-1/2 -translate-y-1/2 text-slate-500 hover:text-mintGlow transition-colors focus:outline-none" 
                                    onclick="togglePass('new_password', this)">
                                <i class="fa-solid fa-eye text-xs"></i>
                            </button>
                        </div>
                        @error('password')
                            <p class="mt-1 text-xs text-rose-400 flex items-center gap-1">
                                <i class="fa-solid fa-circle-exclamation text-[10px]"></i>
                                <span>{{ $message }}</span>
                            </p>
                        @enderror

                        <!-- Password Strength Meter -->
                        <div class="mt-2">
                            <div class="h-1.5 w-full bg-white/10 rounded-full overflow-hidden">
                                <div id="passStrengthBar" class="h-full w-0 bg-emeraldBrand transition-all duration-300"></div>
                            </div>
                            <span id="passStrengthLabel" class="text-[10px] text-slate-400 mt-1 block">Gunakan kombinasi huruf, angka, & simbol</span>
                        </div>
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <label for="confirm_password" class="block text-xs font-semibold text-slate-300 mb-1.5">
                            Konfirmasi Kata Sandi Baru <span class="text-emeraldBrand">*</span>
                        </label>
                        <div class="relative group">
                            <i class="fa-solid fa-shield-check absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-500 text-sm group-focus-within:text-mintGlow transition-colors"></i>
                            <input type="password" 
                                   name="password_confirmation" 
                                   id="confirm_password" 
                                   required
                                   placeholder="Ulangi kata sandi baru"
                                   class="w-full pl-11 pr-10 py-3 rounded-xl bg-white/[0.04] focus:bg-white/[0.07] border border-white/15 focus:border-emeraldBrand focus:ring-2 focus:ring-emeraldBrand/25 text-white placeholder-slate-500 text-sm font-medium outline-none transition-all">
                            <button type="button" 
                                    class="absolute right-3.5 top-1/2 -translate-y-1/2 text-slate-500 hover:text-mintGlow transition-colors focus:outline-none" 
                                    onclick="togglePass('confirm_password', this)">
                                <i class="fa-solid fa-eye text-xs"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-3 border-t border-white/[0.08] flex justify-end">
                        <button type="submit" 
                                class="w-full py-3 rounded-xl bg-gradient-to-r from-emeraldBrand to-emeraldDark hover:from-[#18c58f] hover:to-emeraldDark text-white text-xs font-bold tracking-wide shadow-lg shadow-emeraldBrand/25 hover:shadow-emeraldBrand/40 transition-all duration-200 flex items-center justify-center gap-2 cursor-pointer">
                            <i class="fa-solid fa-lock text-xs"></i>
                            <span>Perbarui Kata Sandi</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>

</div>

<!-- Interactive Scripts for Profile Page -->
<script>
    // 1. Password Visibility Toggle
    function togglePass(inputId, btn) {
        const input = document.getElementById(inputId);
        const icon = btn.querySelector('i');
        if (!input || !icon) return;

        const isPass = input.type === 'password';
        input.type = isPass ? 'text' : 'password';
        icon.classList.toggle('fa-eye', !isPass);
        icon.classList.toggle('fa-eye-slash', isPass);
    }

    // 2. Avatar Instant Preview
    const photoInput = document.getElementById('photoInput');
    const avatarPreview = document.getElementById('avatarPreview');
    if (photoInput && avatarPreview) {
        photoInput.addEventListener('change', (e) => {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (event) => {
                    if (avatarPreview.tagName === 'IMG') {
                        avatarPreview.src = event.target.result;
                    } else {
                        // Replace div with img
                        const img = document.createElement('img');
                        img.id = 'avatarPreview';
                        img.className = 'h-14 w-14 rounded-xl object-cover ring-2 ring-emeraldBrand/40';
                        img.src = event.target.result;
                        avatarPreview.replaceWith(img);
                    }
                };
                reader.readAsDataURL(file);
            }
        });
    }

    // 3. Password Strength Gauge
    const newPassInput = document.getElementById('new_password');
    const strengthBar = document.getElementById('passStrengthBar');
    const strengthLabel = document.getElementById('passStrengthLabel');

    if (newPassInput && strengthBar && strengthLabel) {
        newPassInput.addEventListener('input', () => {
            const val = newPassInput.value;
            let score = 0;

            if (val.length >= 8) score += 25;
            if (/[A-Z]/.test(val)) score += 25;
            if (/[0-9]/.test(val)) score += 25;
            if (/[^A-Za-z0-9]/.test(val)) score += 25;

            strengthBar.style.width = score + '%';

            if (score === 0) {
                strengthBar.className = 'h-full w-0 bg-transparent transition-all duration-300';
                strengthLabel.innerText = 'Gunakan kombinasi huruf, angka, & simbol';
                strengthLabel.className = 'text-[10px] text-slate-400 mt-1 block';
            } else if (score <= 25) {
                strengthBar.className = 'h-full bg-rose-500 transition-all duration-300';
                strengthLabel.innerText = 'Kekuatan sandi: Lemah';
                strengthLabel.className = 'text-[10px] text-rose-400 font-semibold mt-1 block';
            } else if (score <= 50) {
                strengthBar.className = 'h-full bg-amber-500 transition-all duration-300';
                strengthLabel.innerText = 'Kekuatan sandi: Sedang';
                strengthLabel.className = 'text-[10px] text-amber-400 font-semibold mt-1 block';
            } else if (score <= 75) {
                strengthBar.className = 'h-full bg-sky-400 transition-all duration-300';
                strengthLabel.innerText = 'Kekuatan sandi: Baik';
                strengthLabel.className = 'text-[10px] text-sky-400 font-semibold mt-1 block';
            } else {
                strengthBar.className = 'h-full bg-emeraldBrand transition-all duration-300';
                strengthLabel.innerText = 'Kekuatan sandi: Sangat Kuat 🛡️';
                strengthLabel.className = 'text-[10px] text-mintGlow font-semibold mt-1 block';
            }
        });
    }
</script>
@endsection