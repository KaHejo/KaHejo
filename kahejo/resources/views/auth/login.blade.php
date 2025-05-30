<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - KaHejo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#2ecc71',
                        secondary: '#27ae60',
                        accent: '#f39c12',
                        dark: '#2c3e50',
                        light: '#ecf0f1',
                    },
                    fontFamily: {
                        'poppins': ['Poppins', 'sans-serif'],
                    },
                    animation: {
                        'gradient': 'gradient 8s linear infinite',
                        'float': 'float 3s ease-in-out infinite',
                        'pulse-slow': 'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                    },
                    keyframes: {
                        gradient: {
                            '0%, 100%': {
                                'background-size': '200% 200%',
                                'background-position': 'left center'
                            },
                            '50%': {
                                'background-size': '200% 200%',
                                'background-position': 'right center'
                            },
                        },
                    },
                }
            }
        }
    </script>
</head>
<body class="bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen flex items-center justify-center p-4 font-poppins">
    <!-- Animated Background -->
    <div class="fixed inset-0 bg-gradient-to-br from-primary/5 to-secondary/5 z-0">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%232ecc71\' fill-opacity=\'0.05\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')]"></div>
    </div>

    <!-- Success Alert -->
    @if(session('success'))
        <div class="fixed top-4 left-1/2 transform -translate-x-1/2 z-50 animate-slideDown">
            <div class="bg-gradient-to-r from-green-500 to-green-600 text-white px-6 py-3 rounded-xl shadow-lg flex items-center backdrop-blur-sm bg-opacity-90">
                <i class="fas fa-check-circle mr-2"></i>
            {{ session('success') }}
                <button class="ml-4 text-white hover:text-gray-200 transition-colors duration-200" onclick="this.parentElement.parentElement.remove()">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
    @endif

    <!-- Error Alert -->
    @if($errors->any())
        <div class="fixed top-4 left-1/2 transform -translate-x-1/2 z-50 animate-slideDown">
            <div class="bg-gradient-to-r from-red-500 to-red-600 text-white px-6 py-3 rounded-xl shadow-lg flex items-center backdrop-blur-sm bg-opacity-90 animate-shake">
                <i class="fas fa-exclamation-circle mr-2"></i>
            {{ $errors->first() }}
                <button class="ml-4 text-white hover:text-gray-200 transition-colors duration-200" onclick="this.parentElement.parentElement.remove()">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
    @endif

    <div class="w-full max-w-6xl bg-white/80 backdrop-blur-md rounded-3xl shadow-2xl overflow-hidden flex flex-col md:flex-row relative z-10 border border-white/20">
        <!-- Left Side - Branding -->
        <div class="md:w-1/2 bg-gradient-to-br from-primary to-secondary p-8 md:p-12 flex flex-col justify-center items-center text-white relative overflow-hidden">
            <div class="absolute inset-0 opacity-10">
                <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width=\'100\' height=\'100\' viewBox=\'0 0 100 100\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cpath d=\'M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z\' fill=\'%23ffffff\' fill-opacity=\'0.1\' fill-rule=\'evenodd\'/%3E%3C/svg%3E')]"></div>
            </div>
            <div class="relative z-10 text-center">
                <div class="text-7xl mb-8 animate-float">
                <i class="fas fa-leaf"></i>
                </div>
                <h2 class="text-5xl font-bold mb-6 text-shadow">Welcome to KaHejo</h2>
                <p class="text-xl opacity-90 max-w-md leading-relaxed">
                    Your personal health companion. Track your health, get personalized recommendations, and achieve your wellness goals.
                </p>
                <div class="mt-12 flex space-x-4">
                    <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4 text-center">
                        <i class="fas fa-heartbeat text-3xl mb-2"></i>
                        <p class="text-sm">Health Tracking</p>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4 text-center">
                        <i class="fas fa-chart-line text-3xl mb-2"></i>
                        <p class="text-sm">Analytics</p>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4 text-center">
                        <i class="fas fa-bullseye text-3xl mb-2"></i>
                        <p class="text-sm">Goals</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side - Login Form -->
        <div class="md:w-1/2 p-8 md:p-12 flex flex-col justify-center">
            <div class="max-w-md mx-auto w-full">
                <div class="text-center mb-8">
                    <h2 class="text-4xl font-bold text-gray-800 mb-3">Welcome Back!</h2>
                    <p class="text-gray-600">Please enter your credentials to access your account</p>
            </div>

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                    <div class="relative group">
                        <input type="text" 
                               class="w-full pl-12 pr-4 py-4 rounded-xl border-2 border-gray-200 focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all duration-200 bg-white/50 backdrop-blur-sm group-hover:border-primary/50"
                               id="name" 
                               name="name" 
                               value="{{ old('name') }}"
                               placeholder="Your Name" 
                               required 
                               autofocus>
                        <i class="fas fa-user absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400 group-hover:text-primary transition-colors duration-200"></i>
                    @error('name')
                            <p class="mt-2 text-sm text-red-500 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i>
                                {{ $message }}
                            </p>
                    @enderror
                </div>

                    <div class="relative group">
                        <input type="password" 
                               class="w-full pl-12 pr-4 py-4 rounded-xl border-2 border-gray-200 focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all duration-200 bg-white/50 backdrop-blur-sm group-hover:border-primary/50"
                               id="password" 
                               name="password" 
                               placeholder="Password" 
                               required>
                        <i class="fas fa-lock absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400 group-hover:text-primary transition-colors duration-200"></i>
                    @error('password')
                            <p class="mt-2 text-sm text-red-500 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i>
                                {{ $message }}
                            </p>
                    @enderror
                </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input type="checkbox" 
                                   id="remember" 
                                   name="remember"
                                   class="w-5 h-5 rounded border-gray-300 text-primary focus:ring-primary">
                            <label for="remember" class="ml-2 text-sm text-gray-600">
                        Remember Me
                    </label>
                        </div>
                        <a href="#" class="text-sm text-primary hover:text-secondary transition-colors duration-200">
                            Forgot Password?
                        </a>
                </div>

                    <button type="submit" 
                            class="w-full py-4 px-4 bg-gradient-to-r from-primary to-secondary text-white rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 flex items-center justify-center group">
                        <i class="fas fa-sign-in-alt mr-2 group-hover:rotate-12 transition-transform duration-200"></i>
                        Login
                </button>

                    <div class="text-center space-y-4">
                        <p class="text-gray-600">
                            Don't have an account? 
                            <a href="{{ route('register') }}" class="text-primary font-semibold hover:text-secondary transition-colors duration-200">
                                Register here
                            </a>
                        </p>
                        <p class="text-gray-600">
                            Login As 
                            <a href="{{ route('admin.login') }}" class="text-primary font-semibold hover:text-secondary transition-colors duration-200">
                                Admin
                            </a>
                        </p>
                </div>
            </form>
            </div>
        </div>
    </div>

    <style>
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        @keyframes slideDown {
            from { transform: translate(-50%, -100%); opacity: 0; }
            to { transform: translate(-50%, 0); opacity: 1; }
        }
        @keyframes shake {
            0%, 100% { transform: translate(-50%, 0); }
            25% { transform: translate(-52%, 0); }
            75% { transform: translate(-48%, 0); }
        }
        .animate-float {
            animation: float 3s ease-in-out infinite;
        }
        .animate-slideDown {
            animation: slideDown 0.5s ease-out;
        }
        .animate-shake {
            animation: shake 0.5s ease-in-out;
        }
        .text-shadow {
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }
    </style>
</body>
</html>
