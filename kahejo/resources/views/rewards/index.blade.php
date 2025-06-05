<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KaHejo - Rewards</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'kahejo': {
                            'darkest': '#3E362E',
                            'dark': '#865D36',
                            'medium': '#93785B',
                            'light': '#AC8968',
                            'lightest': '#A69080',
                        },
                    },
                },
            },
        }
    </script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .nav-link {
            position: relative;
            transition: color 0.2s ease;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            margin: 0 0.25rem;
        }
        .nav-link:hover {
            color: #10B981;
            background-color: #F3F4F6;
        }
        .nav-link.active {
            color: #10B981;
            background-color: #F3F4F6;
        }
        .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 100%;
            height: 2px;
            background: linear-gradient(to right, #10B981, #059669);
            border-radius: 2px;
        }
        .nav-icon {
            transition: transform 0.2s ease;
        }
        .nav-link:hover .nav-icon {
            transform: translateY(-1px);
        }
        .logo-text {
            background: linear-gradient(to right, #10B981, #059669);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            font-weight: 700;
        }
        .user-profile {
            transition: transform 0.2s ease;
        }
        .user-profile:hover {
            transform: translateY(-1px);
        }
        .logout-btn {
            transition: all 0.2s ease;
            background: linear-gradient(to right, #10B981, #059669);
            color: white;
            padding: 0.5rem 1.25rem;
            border-radius: 9999px;
            font-weight: 500;
            border: none;
        }
        .logout-btn:hover {
            opacity: 0.9;
            transform: translateY(-1px);
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navbar -->
    <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <!-- Logo and Navigation -->
                <div class="flex items-center">
                    <div class="flex-shrink-0 flex items-center">
                        <span class="logo-text text-2xl font-extrabold">KaHejo</span>
                    </div>
                    <div class="hidden md:flex md:ml-10">
                        <a href="{{ route('main') }}" class="nav-link flex items-center text-sm font-medium text-gray-500 {{ request()->routeIs('main') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-home text-lg mr-2"></i>
                            Dashboard
                        </a>
                        <a href="{{ route('profile') }}" class="nav-link flex items-center text-sm font-medium text-gray-500 {{ request()->routeIs('profile') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-user text-lg mr-2"></i>
                            Profile
                        </a>
                        <a href="{{ route('carbon') }}" class="nav-link flex items-center text-sm font-medium text-gray-500 {{ request()->routeIs('carbon') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-calculator text-lg mr-2"></i>
                            Carbon Calculator
                        </a>
                        <a href="{{ route('company') }}" class="nav-link flex items-center text-sm font-medium text-gray-500 {{ request()->routeIs('company') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-chart-line text-lg mr-2"></i>
                            Energy Consumption
                        </a>
                        <a href="{{ route('achievements') }}" class="nav-link flex items-center text-sm font-medium text-gray-500 {{ request()->routeIs('achievements') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-trophy text-lg mr-2"></i>
                            Achievements
                        </a>
                        <a href="{{ route('education') }}" class="nav-link flex items-center text-sm font-medium text-gray-500 {{ request()->routeIs('achievements.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-trophy text-lg mr-2"></i>
                            Education
                        </a>
                    </div>
                </div>
                <!-- Right side of navbar -->
                <div class="flex items-center space-x-6">
                    <!-- User Profile -->
                    <div class="user-profile flex items-center bg-gray-50 rounded-full px-3 py-1">
                        <img class="h-8 w-8 rounded-full ring-2 ring-green-500" src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name ?? 'User') }}&background=10B981&color=fff" alt="User">
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-900">{{ Auth::user()->name ?? 'User' }}</p>
                            <p class="text-xs text-gray-500">User</p>
                        </div>
                    </div>
                    <!-- Logout Button -->
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="logout-btn inline-flex items-center">
                            <i class="fas fa-sign-out-alt mr-2"></i>
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto py-8 sm:px-6 lg:px-8">
        <div class="bg-white shadow rounded-lg border border-kahejo-light/20 p-6">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6 gap-4">
                <div>
                    <h1 class="text-2xl font-bold text-kahejo-darkest">Rewards</h1>
                    <p class="text-kahejo-medium mt-1">Tukarkan poinmu dengan reward menarik!</p>
                </div>
                <div class="flex items-center space-x-3 mt-4 sm:mt-0">
                    @php
                        $user = Auth::user();
                        $totalPoints = $user->points;
                    @endphp
                    <span class="inline-flex items-center px-3 py-2 rounded-lg bg-green-100 text-green-700 font-semibold text-lg">
                        <i class="fas fa-coins mr-2"></i>
                        Total Points: {{ $totalPoints }}
                    </span>
                </div>
            </div>

            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Modal Konfirmasi Redeem -->
            <div id="redeemModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-40 hidden">
                <div class="bg-white rounded-lg shadow-lg max-w-sm w-full p-6 relative">
                    <button id="closeModalBtn" class="absolute top-2 right-2 text-gray-400 hover:text-red-500 text-xl">&times;</button>
                    <div class="flex flex-col items-center text-center">
                        <div id="modalRewardImage" class="mb-3"></div>
                        <h2 id="modalRewardName" class="font-bold text-lg text-kahejo-darkest mb-1"></h2>
                        <p id="modalRewardDesc" class="text-kahejo-medium text-sm mb-2"></p>
                        <div class="flex justify-center items-center space-x-2 mb-4">
                            <span id="modalRewardPoints" class="px-2 py-1 text-xs rounded-full bg-kahejo-dark text-white"></span>
                            <span id="modalRewardStock" class="px-2 py-1 text-xs rounded-full"></span>
                        </div>
                        <form id="modalRedeemForm" method="POST">
                            @csrf
                            <button type="submit" class="inline-flex items-center px-4 py-2 rounded-lg bg-green-500 hover:bg-green-600 text-white font-semibold shadow transition">
                                <i class="fas fa-check-circle mr-2"></i>
                                Konfirmasi Redeem
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @forelse($rewards as $reward)
                    <div class="bg-kahejo-lightest/10 border border-kahejo-light/30 rounded-lg shadow p-5 flex flex-col items-center text-center transition-all duration-200">
                        <div class="w-20 h-20 mb-3 flex items-center justify-center rounded-full border-2 border-kahejo-dark bg-white">
                            @if($reward->reward_image)
                                <img src="{{ asset($reward->reward_image) }}" alt="{{ $reward->name }}" class="w-14 h-14 object-contain mx-auto">
                            @else
                                <i class="fas fa-gift text-4xl text-kahejo-dark"></i>
                            @endif
                        </div>
                        <div class="font-semibold text-kahejo-darkest text-lg mb-1">{{ $reward->reward_name }}</div>
                        <div class="text-kahejo-medium text-sm mb-2">{{ $reward->reward_description }}</div>
                        <div class="flex justify-center items-center space-x-2 mb-2">
                            <span class="px-2 py-1 text-xs rounded-full bg-kahejo-dark text-white">
                                {{ $reward->points_required }} pts
                            </span>
                            <span class="px-2 py-1 text-xs rounded-full {{ $reward->stock > 0 ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                Stock: {{ $reward->stock }}
                            </span>
                        </div>
                        @if($reward->stock > 0)
                            @if($totalPoints >= $reward->points_required)
                                <form action="{{ route('rewards.redeem', $reward->id) }}" method="POST" class="redeem-form"
                                    data-name="{{ $reward->reward_name }}"
                                    data-desc="{{ $reward->reward_description }}"
                                    data-image="{{ $reward->reward_image ? asset($reward->reward_image) : '' }}"
                                    data-points="{{ $reward->points_required }}"
                                    data-stock="{{ $reward->stock }}"
                                    data-stock-badge="{{ $reward->stock > 0 ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}"
                                >
                                    @csrf
                                    <button type="submit" class="inline-flex items-center px-4 py-2 rounded-lg bg-green-500 hover:bg-green-600 text-white font-semibold shadow transition redeem-btn">
                                        <i class="fas fa-check-circle mr-2"></i>
                                        Redeem
                                    </button>
                                </form>
                            @else
                                <button class="inline-flex items-center px-4 py-2 rounded-lg bg-gray-300 text-gray-500 font-semibold shadow cursor-not-allowed" disabled>
                                    <i class="fas fa-lock mr-2"></i>
                                    Not enough points
                                </button>
                            @endif
                        @else
                            <button class="inline-flex items-center px-4 py-2 rounded-lg bg-red-300 text-red-700 font-semibold shadow cursor-not-allowed" disabled>
                                <i class="fas fa-times-circle mr-2"></i>
                                Out of stock
                            </button>
                        @endif
                    </div>
                @empty
                    <div class="col-span-4 text-center text-kahejo-medium py-8">
                        Belum ada reward tersedia.
                    </div>
                @endforelse
            </div>
        </div>
    </div>
    <script>
        document.querySelectorAll('.redeem-form').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();

                // Ambil data reward dari atribut data-*
                const name = form.getAttribute('data-name');
                const desc = form.getAttribute('data-desc');
                const image = form.getAttribute('data-image');
                const points = form.getAttribute('data-points');
                const stock = form.getAttribute('data-stock');
                const stockBadge = form.getAttribute('data-stock-badge');

                // Isi modal dengan data reward
                document.getElementById('modalRewardName').textContent = name;
                document.getElementById('modalRewardDesc').textContent = desc;
                document.getElementById('modalRewardPoints').textContent = points + ' pts';
                document.getElementById('modalRewardStock').textContent = 'Stock: ' + stock;
                document.getElementById('modalRewardStock').className = 'px-2 py-1 text-xs rounded-full ' + stockBadge;

                // Gambar
                const imgDiv = document.getElementById('modalRewardImage');
                if (image) {
                    imgDiv.innerHTML = `<img src="${image}" alt="${name}" class="w-14 h-14 object-contain mx-auto rounded-full border-2 border-kahejo-dark bg-white">`;
                } else {
                    imgDiv.innerHTML = `<i class="fas fa-gift text-4xl text-kahejo-dark"></i>`;
                }

                // Set action form modal
                document.getElementById('modalRedeemForm').action = form.action;

                // Tampilkan modal
                document.getElementById('redeemModal').classList.remove('hidden');
            });
        });

        // Tombol close modal
        document.getElementById('closeModalBtn').onclick = function() {
            document.getElementById('redeemModal').classList.add('hidden');
        };
        // Klik di luar modal untuk close
        document.getElementById('redeemModal').addEventListener('click', function(e) {
            if (e.target === this) {
                this.classList.add('hidden');
            }
        });
    </script>
</body>
</html>