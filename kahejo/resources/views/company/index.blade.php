<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KaHejo - Company Energy</title>
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
        .card-hover {
            transition: all 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
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
    <nav class="bg-white shadow-md">
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
                    </div>
                </div>

                <!-- Right side of navbar -->
                <div class="flex items-center space-x-6">
                    <!-- User Profile -->
                    <div class="user-profile flex items-center bg-gray-50 rounded-full px-3 py-1">
                        <img class="h-8 w-8 rounded-full ring-2 ring-green-500" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="User">
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-900">{{ Auth::user()->name }}</p>
                            <p class="text-xs text-gray-500">Administrator</p>
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
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <!-- Main Form Card -->
        <div class="bg-white shadow-lg rounded-lg border-l-4 border-green-500">
            <div class="px-4 py-5 sm:px-6 border-b border-gray-100">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Energy Consumption Form</h3>
                    <div class="flex items-center space-x-2">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                            <i class="fas fa-info-circle mr-1"></i>
                            Required fields
                        </span>
                    </div>
                </div>
            </div>
            <div class="px-4 py-5 sm:p-6">
                <form action="{{ url('/company') }}" method="POST" class="space-y-6">
                    @csrf
                    
                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                        <div class="form-group">
                            <label for="source_type" class="block text-sm font-medium text-gray-700">
                                Source Type
                            </label>
                            <div class="mt-1 relative rounded-md shadow-sm group">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-power-off text-gray-400 group-hover:text-green-500 transition-colors"></i>
                                </div>
                                <select name="source_type" id="source_type" class="focus:ring-green-500 focus:border-green-500 block w-full pl-10 sm:text-sm border-gray-200 rounded-md hover:border-green-300 transition-colors" required>
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
                            <label for="consumption_amount" class="block text-sm font-medium text-gray-700">
                                Consumption Amount
                            </label>
                            <div class="mt-1 relative rounded-md shadow-sm group">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-calculator text-gray-400 group-hover:text-green-500 transition-colors"></i>
                                </div>
                                <input type="number" step="0.01" name="consumption_amount" id="consumption_amount" class="focus:ring-green-500 focus:border-green-500 block w-full pl-10 sm:text-sm border-gray-200 rounded-md hover:border-green-300 transition-colors" required min="0" placeholder="0.00">
                            </div>
                            @error('consumption_amount')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="unit_measurement" class="block text-sm font-medium text-gray-700">
                                Unit Measurement
                            </label>
                            <div class="mt-1 relative rounded-md shadow-sm group">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-ruler text-gray-400 group-hover:text-green-500 transition-colors"></i>
                                </div>
                                <select name="unit_measurement" id="unit_measurement" class="focus:ring-green-500 focus:border-green-500 block w-full pl-10 sm:text-sm border-gray-200 rounded-md hover:border-green-300 transition-colors" required>
                                    <option value="">Select Unit</option>
                                </select>
                            </div>
                            @error('unit_measurement')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="activity_type" class="block text-sm font-medium text-gray-700">
                                Activity Type
                            </label>
                            <div class="mt-1 relative rounded-md shadow-sm group">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-tasks text-gray-400 group-hover:text-green-500 transition-colors"></i>
                                </div>
                                <select name="activity_type" id="activity_type" class="focus:ring-green-500 focus:border-green-500 block w-full pl-10 sm:text-sm border-gray-200 rounded-md hover:border-green-300 transition-colors" required>
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
                            <label for="location_name" class="block text-sm font-medium text-gray-700">Location Name</label>
                            <div class="mt-1 relative rounded-md shadow-sm group">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-map-marker-alt text-gray-400 group-hover:text-green-500 transition-colors"></i>
                                </div>
                                <input type="text" name="location_name" id="location_name" class="focus:ring-green-500 focus:border-green-500 block w-full pl-10 sm:text-sm border-gray-200 rounded-md hover:border-green-300 transition-colors" placeholder="Enter location name">
                            </div>
                            @error('location_name')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="department" class="block text-sm font-medium text-gray-700">Department</label>
                            <div class="mt-1 relative rounded-md shadow-sm group">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-building text-gray-400 group-hover:text-green-500 transition-colors"></i>
                                </div>
                                <input type="text" name="department" id="department" class="focus:ring-green-500 focus:border-green-500 block w-full pl-10 sm:text-sm border-gray-200 rounded-md hover:border-green-300 transition-colors" placeholder="Enter department name">
                            </div>
                            @error('department')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="consumption_date" class="block text-sm font-medium text-gray-700">
                                Consumption Date
                            </label>
                            <div class="mt-1 relative rounded-md shadow-sm group">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-calendar text-gray-400 group-hover:text-green-500 transition-colors"></i>
                                </div>
                                <input type="date" name="consumption_date" id="consumption_date" class="focus:ring-green-500 focus:border-green-500 block w-full pl-10 sm:text-sm border-gray-200 rounded-md hover:border-green-300 transition-colors" required>
                            </div>
                            @error('consumption_date')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="reporting_period" class="block text-sm font-medium text-gray-700">
                                Reporting Period
                            </label>
                            <div class="mt-1 relative rounded-md shadow-sm group">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-clock text-gray-400 group-hover:text-green-500 transition-colors"></i>
                                </div>
                                <select name="reporting_period" id="reporting_period" class="focus:ring-green-500 focus:border-green-500 block w-full pl-10 sm:text-sm border-gray-200 rounded-md hover:border-green-300 transition-colors" required>
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

                    <div class="mt-6 flex justify-end space-x-3">
                        <a href="{{ route('company.history') }}" class="inline-flex items-center px-4 py-2 border border-green-500 text-green-500 rounded-md text-sm font-medium hover:bg-green-50 transition-colors">
                            <i class="fas fa-history mr-2"></i>
                            History
                        </a>
                        <button type="reset" class="inline-flex items-center px-4 py-2 border border-gray-200 shadow-sm text-sm font-medium rounded-md text-gray-600 bg-white hover:text-green-600 hover:border-green-500 transition-all duration-150 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                            <i class="fas fa-undo mr-2"></i>
                            Reset
                        </button>
                        <button type="submit" class="inline-flex items-center px-6 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 transition-all duration-150 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                            <i class="fas fa-save mr-2"></i>
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
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

        // Set today's date as default for consumption date
        document.getElementById('consumption_date').valueAsDate = new Date();
    </script>
</body>
</html> 