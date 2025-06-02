<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Energy</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f6f8fa 0%, #e9ecef 100%);
        }
        .nav-link {
            position: relative;
            transition: all 0.3s ease;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            margin: 0 0.25rem;
        }
        .nav-link:hover {
            color: #10B981;
            background-color: rgba(16, 185, 129, 0.1);
            transform: translateY(-2px);
        }
        .nav-link.active {
            color: #10B981;
            background-color: rgba(16, 185, 129, 0.1);
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
            animation: slideIn 0.3s ease-out;
        }
        @keyframes slideIn {
            from { transform: scaleX(0); }
            to { transform: scaleX(1); }
        }
        .nav-icon {
            transition: transform 0.3s ease;
        }
        .nav-link:hover .nav-icon {
            transform: translateY(-2px) scale(1.1);
        }
        .logo-text {
            background: linear-gradient(45deg, #10B981, #059669);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            font-weight: 700;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
        }
        .user-profile {
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
        }
        .user-profile:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .logout-btn {
            transition: all 0.3s ease;
            background: linear-gradient(45deg, #10B981, #059669);
            color: white;
            padding: 0.5rem 1.25rem;
            border-radius: 9999px;
            font-weight: 500;
            border: none;
            box-shadow: 0 2px 4px rgba(16, 185, 129, 0.2);
        }
        .logout-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(16, 185, 129, 0.3);
        }
        .card-hover {
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
        }
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        .form-input:focus + .form-icon,
        .form-select:focus + .form-icon {
            color: #10B981;
            transform: scale(1.1);
        }
        .form-group:hover .form-icon {
            color: #10B981;
            transform: scale(1.1);
        }
        input:focus, select:focus {
            border-color: #10B981;
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.2);
            border-width: 2px;
        }
        .form-control {
            transition: all 0.3s ease;
        }
        .form-control:hover {
            border-color: #10B981;
        }
        .btn-primary {
            background: linear-gradient(45deg, #10B981, #059669);
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(16, 185, 129, 0.2);
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 8px rgba(16, 185, 129, 0.3);
        }
        .btn-secondary {
            transition: all 0.3s ease;
        }
        .btn-secondary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .floating-label {
            position: relative;
            margin-bottom: 1.5rem;
        }
        .floating-label input:focus ~ label,
        .floating-label input:not(:placeholder-shown) ~ label {
            transform: translateY(-1.5rem) scale(0.85);
            color: #10B981;
        }
        .floating-label label {
            transition: all 0.2s ease;
            transform-origin: left top;
        }
    </style>
</head>
<body class="min-h-screen">
    <!-- Navbar -->
    <nav class="bg-white/80 backdrop-blur-md shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <!-- Logo and Navigation -->
                <div class="flex items-center">
                    <div class="flex-shrink-0 flex items-center">
                        <span class="logo-text text-2xl">KaHejo</span>
                    </div>
                    <div class="hidden md:flex md:ml-10">
                        <a href="{{ route('main') }}" class="nav-link flex items-center text-sm font-medium text-gray-500">
                            <i class="nav-icon fas fa-home text-lg mr-2"></i>
                            Dashboard
                        </a>
                        <a href="{{ route('profile') }}" class="nav-link flex items-center text-sm font-medium text-gray-500">
                            <i class="nav-icon fas fa-user text-lg mr-2"></i>
                            Profile
                        </a>
                        <a href="{{ route('carbon') }}" class="nav-link flex items-center text-sm font-medium text-gray-500">
                            <i class="nav-icon fas fa-calculator text-lg mr-2"></i>
                            Carbon Calculator
                        </a>
                        <a href="{{ route('company') }}" class="nav-link active flex items-center text-sm font-medium">
                            <i class="nav-icon fas fa-chart-line text-lg mr-2"></i>
                            Energy Consumption
                        </a>
                        <a href="{{ route('achievements') }}" class="nav-link flex items-center text-sm font-medium text-gray-500">
                            <i class="nav-icon fas fa-trophy text-lg mr-2"></i>
                            Achievements
                        </a>
                    </div>
                </div>

                <!-- Right side of navbar -->
                <div class="flex items-center space-x-6">
                    <!-- User Profile -->
                    <div class="user-profile flex items-center bg-gray-50 rounded-full px-3 py-1">
                        <img class="h-8 w-8 rounded-full ring-2 ring-green-500" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="User">
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-900">{{ Auth::user()->name }}</p>
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
        <!-- Main Form Card -->
        <div class="bg-white/90 backdrop-blur-md shadow-xl rounded-xl border-l-4 border-green-500 transform transition-all duration-300 hover:shadow-2xl" data-aos="fade-up" data-aos-duration="1000">
            <div class="px-6 py-6 sm:px-8 border-b border-gray-100">
                <div class="flex items-center justify-between">
                    <h3 class="text-2xl font-bold text-gray-900 flex items-center">
                        <i class="fas fa-chart-line text-green-500 mr-3"></i>
                        Energy Consumption Form
                    </h3>
                    <div class="flex items-center space-x-2">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800 animate-pulse">
                            <i class="fas fa-info-circle mr-2"></i>
                            Required fields
                        </span>
                    </div>
                </div>
            </div>
            <div class="px-6 py-6 sm:p-8">
                <form action="{{ url('/company') }}" method="POST" class="space-y-8">
                    @csrf
                    
                    <div class="grid grid-cols-1 gap-8 sm:grid-cols-2">
                        <div class="form-group">
                            <label for="source_type" class="block text-sm font-medium text-gray-700 mb-1">
                                Source Type
                            </label>
                            <div class="mt-1 relative rounded-md shadow-sm group">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-power-off text-gray-400 group-hover:text-green-500 transition-colors"></i>
                                </div>
                                <select name="source_type" id="source_type" class="focus:ring-green-500 focus:border-green-500 focus:border-2 block w-full pl-10 sm:text-sm border-gray-300 rounded-md hover:border-green-400 transition-colors" required>
                                    <option value="">Select Source Type</option>
                                    <option value="electricity">Electricity</option>
                                    <option value="gasoline">Gasoline</option>
                                    <option value="diesel">Diesel</option>
                                    <option value="gas">Gas</option>
                                    <option value="lpg">LPG</option>
                                </select>
                            </div>
                            @error('source_type')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="consumption_amount" class="block text-sm font-medium text-gray-700 mb-1">
                                Consumption Amount
                            </label>
                            <div class="mt-1 relative rounded-md shadow-sm group">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-calculator text-gray-400 group-hover:text-green-500 transition-colors"></i>
                                </div>
                                <input type="number" step="0.01" name="consumption_amount" id="consumption_amount" class="focus:ring-green-500 focus:border-green-500 focus:border-2 block w-full pl-10 sm:text-sm border-gray-300 rounded-md hover:border-green-400 transition-colors" required min="0" placeholder="0.00">
                            </div>
                            @error('consumption_amount')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="unit_measurement" class="block text-sm font-medium text-gray-700 mb-1">
                                Unit Measurement
                            </label>
                            <div class="mt-1 relative rounded-md shadow-sm group">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-ruler text-gray-400 group-hover:text-green-500 transition-colors"></i>
                                </div>
                                <select name="unit_measurement" id="unit_measurement" class="focus:ring-green-500 focus:border-green-500 focus:border-2 block w-full pl-10 sm:text-sm border-gray-300 rounded-md hover:border-green-400 transition-colors" required>
                                    <option value="">Select Unit</option>
                                </select>
                            </div>
                            @error('unit_measurement')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="activity_type" class="block text-sm font-medium text-gray-700 mb-1">
                                Activity Type
                            </label>
                            <div class="mt-1 relative rounded-md shadow-sm group">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-tasks text-gray-400 group-hover:text-green-500 transition-colors"></i>
                                </div>
                                <select name="activity_type" id="activity_type" class="focus:ring-green-500 focus:border-green-500 focus:border-2 block w-full pl-10 sm:text-sm border-gray-300 rounded-md hover:border-green-400 transition-colors" required>
                                    <option value="">Select Activity Type</option>
                                    <option value="production">Production</option>
                                    <option value="transportation">Transportation</option>
                                    <option value="office">Office</option>
                                    <option value="any">Any</option>
                                </select>
                            </div>
                            @error('activity_type')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="location_name" class="block text-sm font-medium text-gray-700 mb-1">Location Name</label>
                            <div class="mt-1 relative rounded-md shadow-sm group">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-map-marker-alt text-gray-400 group-hover:text-green-500 transition-colors"></i>
                                </div>
                                <input type="text" name="location_name" id="location_name" class="focus:ring-green-500 focus:border-green-500 focus:border-2 block w-full pl-10 sm:text-sm border-gray-300 rounded-md hover:border-green-400 transition-colors" placeholder="Enter location name">
                            </div>
                            @error('location_name')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="consumption_date" class="block text-sm font-medium text-gray-700 mb-1">
                                Consumption Date
                            </label>
                            <div class="mt-1 relative rounded-md shadow-sm group">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-calendar text-gray-400 group-hover:text-green-500 transition-colors"></i>
                                </div>
                                <input type="month" name="consumption_date" id="consumption_date" class="focus:ring-green-500 focus:border-green-500 focus:border-2 block w-full pl-10 sm:text-sm border-gray-300 rounded-md hover:border-green-400 transition-colors" required>
                            </div>
                            @error('consumption_date')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="reporting_period" class="block text-sm font-medium text-gray-700 mb-1">
                                Reporting Period
                            </label>
                            <div class="mt-1 relative rounded-md shadow-sm group">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-clock text-gray-400 group-hover:text-green-500 transition-colors"></i>
                                </div>
                                <select name="reporting_period" id="reporting_period" class="focus:ring-green-500 focus:border-green-500 focus:border-2 block w-full pl-10 sm:text-sm border-gray-300 rounded-md hover:border-green-400 transition-colors" required>
                                    <option value="">Select Period</option>
                                    <option value="monthly">Monthly</option>
                                    <option value="yearly">Yearly</option>
                                </select>
                            </div>
                            @error('reporting_period')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-8 flex justify-end space-x-4">
                        <a href="{{ route('company.history') }}" class="inline-flex items-center px-6 py-3 border-2 border-green-500 text-green-600 rounded-lg text-sm font-medium hover:bg-green-50 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transform hover:-translate-y-1">
                            <i class="fas fa-history mr-2"></i>
                            View History
                        </a>
                        <button type="reset" class="inline-flex items-center px-6 py-3 border-2 border-gray-300 shadow-sm text-sm font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transform hover:-translate-y-1">
                            <i class="fas fa-undo mr-2"></i>
                            Reset Form
                        </button>
                        <button type="submit" class="inline-flex items-center px-8 py-3 border border-transparent shadow-sm text-sm font-medium rounded-lg text-white bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-600 transform hover:-translate-y-1">
                            <i class="fas fa-save mr-2"></i>
                            Submit Data
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Initialize AOS
        AOS.init();

        // Dynamically update unit measurement options based on source type
        document.getElementById('source_type').addEventListener('change', function() {
            const unitSelect = document.getElementById('unit_measurement');
            const sourceType = this.value;
            
            // Clear current options
            unitSelect.innerHTML = '<option value="">Select Unit</option>';
            
            // Add relevant options based on source type
            switch(sourceType) {
                case 'electricity':
                    unitSelect.innerHTML += '<option value="kWh">kWh</option>';
                    break;
                case 'gasoline':
                case 'diesel':
                    unitSelect.innerHTML += '<option value="liter">Liter</option>';
                    break;
                case 'gas':
                    unitSelect.innerHTML += '<option value="m3">Meter Kubik</option>';
                    break;
                case 'lpg':
                    unitSelect.innerHTML += '<option value="kg">Kilogram</option>';
                    break;
            }
        });

        // Set current month and year as default for consumption date
        const today = new Date();
        const currentMonth = String(today.getMonth() + 1).padStart(2, '0');
        const currentYear = today.getFullYear();
        document.getElementById('consumption_date').value = `${currentYear}-${currentMonth}`;

        // Add smooth scrolling
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        // Add form validation feedback
        const form = document.querySelector('form');
        form.addEventListener('submit', function(e) {
            if (!form.checkValidity()) {
                e.preventDefault();
                // Add shake animation to invalid fields
                document.querySelectorAll(':invalid').forEach(field => {
                    field.classList.add('animate-shake');
                    setTimeout(() => field.classList.remove('animate-shake'), 500);
                });
            }
        });
    </script>
</body>
</html> 