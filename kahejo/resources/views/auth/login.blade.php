<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk — KaHejo</title>
    
    <!-- KaHejo Favicon / Web Tab Icon -->
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/logo.svg') }}">
    <link rel="alternate icon" type="image/jpeg" href="{{ asset('images/logo.jpg') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/logo.jpg') }}">
    
    <!-- Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        emeraldBrand: '#10b981',
                        emeraldDark: '#059669',
                        mintGlow: '#34d399',
                        obsidianBg: '#050d0a',
                    },
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <!-- Modular Auth Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body class="min-h-screen flex items-center justify-center p-4 sm:p-6 lg:p-8">

    <!-- Ambient Dynamic Background -->
    <div class="ambient-glow-1"></div>
    <div class="ambient-glow-2"></div>
    <div class="ambient-grid"></div>

    <!-- Floating Top Navigation -->
    <header class="fixed top-5 left-5 right-5 z-50 flex items-center justify-between max-w-6xl mx-auto pointer-events-none">
        <a href="/" class="pointer-events-auto inline-flex items-center gap-2.5 px-4 py-2 rounded-xl bg-white/[0.07] hover:bg-white/[0.14] text-white border border-white/15 backdrop-blur-xl text-xs font-semibold tracking-wide transition-all duration-200 hover:-translate-x-0.5 shadow-lg shadow-black/20">
            <i class="fa-solid fa-arrow-left text-xs text-emeraldBrand"></i>
            <span>Kembali ke Beranda</span>
        </a>

        <div class="pointer-events-auto hidden sm:flex items-center gap-2 text-xs text-slate-400 bg-white/[0.05] border border-white/10 px-3.5 py-1.5 rounded-full backdrop-blur-md">
            <span class="w-2 h-2 rounded-full bg-emeraldBrand animate-pulse"></span>
            <span>Platform Net-Zero Terpadu</span>
        </div>
    </header>

    <!-- Success Notification -->
    @if(session('success'))
        <div class="fixed top-6 left-1/2 transform -translate-x-1/2 z-50 animate-slideDown max-w-md w-full px-4">
            <div class="bg-gradient-to-r from-emerald-600 to-teal-700 text-white px-5 py-3 rounded-2xl shadow-2xl flex items-center justify-between backdrop-blur-xl border border-emerald-400/30">
                <div class="flex items-center gap-3">
                    <i class="fa-solid fa-circle-check text-lg text-emerald-200"></i>
                    <span class="text-sm font-medium">{{ session('success') }}</span>
                </div>
                <button class="text-white/80 hover:text-white transition-colors" onclick="this.parentElement.parentElement.remove()">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
        </div>
    @endif

    <!-- Error Alert Notification -->
    @if($errors->any())
        <div class="fixed top-6 left-1/2 transform -translate-x-1/2 z-50 animate-slideDown max-w-md w-full px-4">
            <div class="bg-gradient-to-r from-red-600 to-rose-700 text-white px-5 py-3 rounded-2xl shadow-2xl flex items-center justify-between backdrop-blur-xl border border-red-400/30 animate-shake">
                <div class="flex items-center gap-3">
                    <i class="fa-solid fa-circle-exclamation text-lg text-rose-200"></i>
                    <span class="text-sm font-medium">{{ $errors->first() }}</span>
                </div>
                <button class="text-white/80 hover:text-white transition-colors" onclick="this.parentElement.parentElement.remove()">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
        </div>
    @endif

    <!-- Main Glass Auth Container -->
    <main class="w-full max-w-5xl bg-[#091712]/85 backdrop-blur-2xl rounded-3xl shadow-[0_25px_70px_-15px_rgba(0,0,0,0.85)] border border-emeraldBrand/25 overflow-hidden grid grid-cols-1 lg:grid-cols-12 relative z-10 my-16">
        
        <!-- Left Showcase Side (5 Columns) -->
        <section class="lg:col-span-5 bg-gradient-to-br from-[#063b2c]/90 via-[#072a20]/95 to-[#041a13] p-8 lg:p-10 flex flex-col justify-between relative overflow-hidden border-b lg:border-b-0 lg:border-r border-emeraldBrand/20">
            <!-- Ambient Radial Reflection -->
            <div class="absolute -top-24 -left-24 w-72 h-72 bg-emeraldBrand/20 rounded-full blur-3xl pointer-events-none"></div>

            <!-- Brand Header -->
            <div class="relative z-10">
                <a href="/" class="inline-flex items-center gap-3 mb-8 group text-decoration-none">
                    <img src="{{ asset('images/logo.svg') }}" alt="KaHejo Logo" class="w-11 h-11 object-contain drop-shadow-[0_0_12px_rgba(52,211,153,0.5)] transition-transform duration-300 group-hover:scale-110 group-hover:rotate-6">
                    <span class="text-2xl font-extrabold tracking-tight text-white">KaHejo</span>
                </a>

                <h1 class="text-2xl lg:text-3xl font-extrabold text-white leading-tight mb-3 tracking-tight">
                    Selamat Datang <br>
                    <span class="bg-gradient-to-r from-mintGlow to-emeraldBrand bg-clip-text text-transparent">Kembali di KaHejo.</span>
                </h1>
                
                <p class="text-slate-300 text-sm leading-relaxed mb-6">
                    Masuk ke dashboard personal Anda untuk memantau emisi terkini, menukarkan reward poin, dan memperbarui catatan keberlanjutan.
                </p>
            </div>

            <!-- Feature Checkpoints -->
            <div class="relative z-10 space-y-3.5 my-6">
                <div class="flex items-center gap-3 p-2.5 rounded-xl bg-white/[0.04] border border-white/[0.08] backdrop-blur-sm">
                    <div class="w-7 h-7 rounded-lg bg-emeraldBrand/15 border border-emeraldBrand/30 flex items-center justify-center text-mintGlow text-xs shrink-0">
                        <i class="fa-solid fa-gauge-high"></i>
                    </div>
                    <span class="text-xs font-semibold text-slate-200">Dashboard Real-Time & Analisis Emisi Harian</span>
                </div>

                <div class="flex items-center gap-3 p-2.5 rounded-xl bg-white/[0.04] border border-white/[0.08] backdrop-blur-sm">
                    <div class="w-7 h-7 rounded-lg bg-emeraldBrand/15 border border-emeraldBrand/30 flex items-center justify-center text-mintGlow text-xs shrink-0">
                        <i class="fa-solid fa-gift"></i>
                    </div>
                    <span class="text-xs font-semibold text-slate-200">Tukar Poin Jadi Voucher & Bibit Pohon</span>
                </div>

                <div class="flex items-center gap-3 p-2.5 rounded-xl bg-white/[0.04] border border-white/[0.08] backdrop-blur-sm">
                    <div class="w-7 h-7 rounded-lg bg-emeraldBrand/15 border border-emeraldBrand/30 flex items-center justify-center text-mintGlow text-xs shrink-0">
                        <i class="fa-solid fa-medal"></i>
                    </div>
                    <span class="text-xs font-semibold text-slate-200">Lencana Komunitas & Tantangan Net-Zero</span>
                </div>
            </div>

            <!-- Community Live Badge -->
            <div class="relative z-10 pt-4 border-t border-white/10 flex items-center gap-3">
                <div class="flex -space-x-2">
                    <div class="w-8 h-8 rounded-full bg-emerald-700 border-2 border-[#041a13] flex items-center justify-center text-[10px] font-bold text-white">KH</div>
                    <div class="w-8 h-8 rounded-full bg-emerald-600 border-2 border-[#041a13] flex items-center justify-center text-[10px] font-bold text-white"><i class="fa-solid fa-tree"></i></div>
                    <div class="w-8 h-8 rounded-full bg-emerald-500 border-2 border-[#041a13] flex items-center justify-center text-[10px] font-bold text-white"><i class="fa-solid fa-seedling"></i></div>
                </div>
                <div class="text-xs text-slate-300">
                    <strong class="text-white font-bold">10.000+</strong> pegiat aktif telah bergabung.
                </div>
            </div>
        </section>

        <!-- Right Form Side (7 Columns) -->
        <section class="lg:col-span-7 p-8 lg:p-12 flex flex-col justify-center bg-[#07140f]/95">
            <div class="max-w-md mx-auto w-full">
                
                <!-- Form Header -->
                <div class="mb-7 text-center sm:text-left">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emeraldBrand/10 border border-emeraldBrand/25 text-mintGlow text-xs font-semibold mb-3">
                        <i class="fa-solid fa-key text-[11px]"></i>
                        <span>Autentikasi Akun Aman</span>
                    </div>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight">Masuk ke Akun</h2>
                    <p class="text-slate-400 text-xs sm:text-sm mt-1">Masukkan kredensial akun KaHejo Anda untuk melanjutkan.</p>
                </div>

                <!-- Login Form -->
                <form method="POST" action="{{ route('login') }}" class="space-y-4">
                    @csrf

                    <!-- Name / Username -->
                    <div>
                        <label for="name" class="block text-xs font-semibold text-slate-300 mb-1.5">
                            Nama Pengguna <span class="text-emeraldBrand">*</span>
                        </label>
                        <div class="relative">
                            <i class="fa-solid fa-user absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-500 text-sm transition-colors duration-200 group-focus-within:text-emeraldBrand"></i>
                            <input type="text" 
                                   id="name" 
                                   name="name" 
                                   value="{{ old('name') }}" 
                                   placeholder="Nama pengguna Anda" 
                                   required 
                                   autofocus 
                                   class="auth-input">
                        </div>
                        @error('name')
                            <p class="mt-1 text-xs text-rose-400 flex items-center gap-1">
                                <i class="fa-solid fa-circle-exclamation text-[10px]"></i>
                                <span>{{ $message }}</span>
                            </p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div>
                        <div class="flex items-center justify-between mb-1.5">
                            <label for="password" class="block text-xs font-semibold text-slate-300">
                                Kata Sandi <span class="text-emeraldBrand">*</span>
                            </label>
                            <a href="#" class="text-xs text-mintGlow hover:text-emeraldBrand transition-colors font-medium hover:underline">
                                Lupa Kata Sandi?
                            </a>
                        </div>
                        <div class="relative">
                            <i class="fa-solid fa-lock absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-500 text-sm transition-colors duration-200"></i>
                            <input type="password" 
                                   id="password" 
                                   name="password" 
                                   placeholder="Masukkan kata sandi Anda" 
                                   required 
                                   class="auth-input" 
                                   style="padding-right: 2.85rem;">
                            <button type="button" 
                                    id="togglePassword" 
                                    class="absolute right-3.5 top-1/2 -translate-y-1/2 text-slate-400 hover:text-mintGlow transition-colors duration-200 focus:outline-none"
                                    aria-label="Toggle Password Visibility">
                                <i class="fa-solid fa-eye text-sm"></i>
                            </button>
                        </div>
                        @error('password')
                            <p class="mt-1 text-xs text-rose-400 flex items-center gap-1">
                                <i class="fa-solid fa-circle-exclamation text-[10px]"></i>
                                <span>{{ $message }}</span>
                            </p>
                        @enderror
                    </div>

                    <!-- Remember Me Checkbox -->
                    <div class="flex items-center justify-between py-1">
                        <label class="inline-flex items-center gap-2 text-xs text-slate-300 cursor-pointer select-none">
                            <input type="checkbox" 
                                   id="remember" 
                                   name="remember" 
                                   class="w-4 h-4 rounded border-white/20 bg-white/5 text-emeraldBrand focus:ring-emeraldBrand/30 focus:ring-offset-0 transition-colors">
                            <span>Ingat Saya di Perangkat Ini</span>
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-2">
                        <button type="submit" 
                                class="btn-shimmer w-full py-3.5 px-4 rounded-xl bg-gradient-to-r from-emeraldBrand to-emeraldDark hover:from-[#18c58f] hover:to-emeraldDark text-white font-bold text-sm tracking-wide shadow-lg shadow-emeraldBrand/30 hover:shadow-xl hover:shadow-emeraldBrand/40 transition-all duration-200 transform hover:-translate-y-0.5 flex items-center justify-center gap-2 cursor-pointer">
                            <i class="fa-solid fa-right-to-bracket text-xs"></i>
                            <span>Masuk ke Akun</span>
                        </button>
                    </div>

                    <!-- Switch to Register & Admin Portal -->
                    <div class="text-center pt-3 border-t border-white/10 space-y-2.5">
                        <p class="text-xs text-slate-400">
                            Belum memiliki akun? 
                            <a href="{{ route('register') }}" class="text-mintGlow font-bold hover:text-emeraldBrand hover:underline ml-1 transition-colors">
                                Daftar Akun Baru Sekarang
                            </a>
                        </p>
                        <p class="text-[11px] text-slate-500">
                            Pengelola sistem? 
                            <a href="{{ route('admin.login') }}" class="text-slate-400 hover:text-white transition-colors underline font-medium">
                                Masuk Portal Admin &rarr;
                            </a>
                        </p>
                    </div>
                </form>

            </div>
        </section>

    </main>

    <!-- Interactive Scripts -->
    <script>
        // Password Visibility Toggle
        const toggleBtn = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');

        if (toggleBtn && passwordInput) {
            toggleBtn.addEventListener('click', () => {
                const isPassword = passwordInput.getAttribute('type') === 'password';
                passwordInput.setAttribute('type', isPassword ? 'text' : 'password');
                const icon = toggleBtn.querySelector('i');
                if (icon) {
                    icon.classList.toggle('fa-eye', !isPassword);
                    icon.classList.toggle('fa-eye-slash', isPassword);
                }
            });
        }
    </script>
</body>
</html>
