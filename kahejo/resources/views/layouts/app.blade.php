<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
    <title>KaHejo - @yield('title', 'Dashboard')</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .nav-link {
            transition: none;
        }
        .nav-link:hover {
            background-color: transparent;
        }
        .nav-link.active {
            background-color: #E8F5E9;
        }
        .card-hover {
            transition: all 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }
        .btn-logout {
            transition: none;
        }
        .btn-logout:hover {
            transform: none;
        }
        .form-input:focus + .form-icon,
        .form-select:focus + .form-icon {
            color: #10B981;
        }
        
        .form-group:hover .form-icon {
            color: #10B981;
        }

        input:focus, select:focus {
            border-color: #10B981;
            box-shadow: 0 0 0 1px rgba(16, 185, 129, 0.2);
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navbar -->
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <!-- Logo and Navigation -->
                <div class="flex">
                    <div class="flex-shrink-0 flex items-center">
                        <span class="text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-green-500 to-emerald-600">KaHejo</span>
                    </div>
                    <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                        <a href="{{ route('main') }}" class="nav-link inline-flex items-center px-1 pt-1 text-sm font-medium text-gray-500">
                            <i class="fas fa-home w-6 text-green-600"></i>
                            <span class="ml-2">Dashboard</span>
                        </a>
                        <a href="{{ route('profile') }}" class="nav-link inline-flex items-center px-1 pt-1 text-sm font-medium text-gray-500">
                            <i class="fas fa-user w-6 text-green-600"></i>
                            <span class="ml-2">Profile</span>
                        </a>
                        <a href="{{ route('carbon') }}" class="nav-link inline-flex items-center px-1 pt-1 text-sm font-medium text-gray-500">
                            <i class="fas fa-calculator w-6 text-green-600"></i>
                            <span class="ml-2">Carbon Calculator</span>
                        </a>
                        <a href="{{ route('company') }}" class="nav-link active inline-flex items-center px-1 pt-1 text-sm font-medium text-gray-900">
                            <i class="fas fa-chart-line w-6 text-green-600"></i>
                            <span class="ml-2">Energy Consumption</span>
                        </a>
                    </div>
                </div>

                <!-- Right side of navbar -->
                <div class="flex items-center">
                    <!-- User Profile -->
                    <div class="flex items-center space-x-4">
                        <img class="h-8 w-8 rounded-full ring-2 ring-green-500" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="User">
                        <div class="hidden md:block">
                            <p class="text-sm font-medium text-gray-900">{{ Auth::user()->name }}</p>
                            <p class="text-xs text-gray-500">Administrator</p>
                        </div>
                    </div>

                    <!-- Notifications and Logout -->
                    <div class="ml-4 flex items-center space-x-4">
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="btn-logout inline-flex items-center px-4 py-2 border border-green-500 text-green-500 rounded-full text-sm font-medium">
                                <i class="fas fa-sign-out-alt mr-2"></i>
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
=======
    <title>Carbon Footprint Calculator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --gray-color: #6c757d;
            --green-color: #28a745;
            --light-gray: #f8f9fa;
        }
        
        body {
            background-color: #ffffff;
        }
        
        .navbar {
            background-color: var(--green-color);
        }
        
        .btn-primary {
            background-color: var(--green-color);
            border-color: var(--green-color);
        }
        
        .btn-primary:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }
        
        .card {
            border-color: var(--light-gray);
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        }
        
        .card-header {
            background-color: var(--light-gray);
            color: var(--gray-color);
            font-weight: 500;
        }
        
        table thead {
            background-color: var(--light-gray);
        }
        
        .page-title {
            color: var(--gray-color);
            margin-bottom: 1.5rem;
            padding-bottom: 0.5rem;
            border-bottom: 1px solid #eee;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="/">Carbon Footprint Calculator</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('emission-factors*') ? 'active' : '' }}" href="{{ route('emission-factors.index') }}">Faktor Emisi</a>
                    </li>
                </ul>
>>>>>>> origin/Daniel-Branch
            </div>
        </div>
    </nav>

<<<<<<< HEAD
    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Flash Messages -->
    @if(session('success'))
    <div class="fixed bottom-4 right-4 bg-green-500 text-white px-4 py-2 rounded-lg shadow-lg">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="fixed bottom-4 right-4 bg-red-500 text-white px-4 py-2 rounded-lg shadow-lg">
        {{ session('error') }}
    </div>
    @endif

    <script>
        // Auto-hide flash messages after 3 seconds
        setTimeout(function() {
            const flashMessages = document.querySelectorAll('.fixed.bottom-4.right-4');
            flashMessages.forEach(message => {
                message.style.opacity = '0';
                setTimeout(() => message.remove(), 500);
            });
        }, 3000);
    </script>
</body>
</html> 
=======
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        
        @yield('content')
    </div>
    
    <footer class="bg-light mt-5 py-3">
        <div class="container text-center">
            <p class="text-muted mb-0">&copy; {{ date('Y') }} Carbon Footprint Calculator</p>
        </div>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
>>>>>>> origin/Daniel-Branch
