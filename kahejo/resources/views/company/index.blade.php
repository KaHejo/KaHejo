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
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <!-- Main Form Card -->
        <div class="bg-white shadow-lg rounded-lg border-l-4 border-green-500">
            <div class="px-4 py-5 sm:px-6 border-b border-gray-100">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Energy Consumption Form</h3>
            </div>
            <div class="px-4 py-5 sm:p-6">
                <form action="{{ url('/company') }}" method="POST">
                    @csrf
                    
                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                        <div>
                            <label for="source_type" class="block text-sm font-medium text-gray-700">Source Type</label>
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

                        <div>
                            <label for="consumption_amount" class="block text-sm font-medium text-gray-700">Consumption Amount</label>
                            <div class="mt-1 relative rounded-md shadow-sm group">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-calculator text-gray-400 group-hover:text-green-500 transition-colors"></i>
                                </div>
                                <input type="number" step="0.01" name="consumption_amount" id="consumption_amount" class="focus:ring-green-500 focus:border-green-500 block w-full pl-10 sm:text-sm border-gray-200 rounded-md hover:border-green-300 transition-colors" required min="0">
                            </div>
                            @error('consumption_amount')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="unit_measurement" class="block text-sm font-medium text-gray-700">Unit Measurement</label>
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

                        <div>
                            <label for="activity_type" class="block text-sm font-medium text-gray-700">Activity Type</label>
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

                        <div>
                            <label for="location_name" class="block text-sm font-medium text-gray-700">Location Name</label>
                            <div class="mt-1 relative rounded-md shadow-sm group">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-map-marker-alt text-gray-400 group-hover:text-green-500 transition-colors"></i>
                                </div>
                                <input type="text" name="location_name" id="location_name" class="focus:ring-green-500 focus:border-green-500 block w-full pl-10 sm:text-sm border-gray-200 rounded-md hover:border-green-300 transition-colors">
                            </div>
                            @error('location_name')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="department" class="block text-sm font-medium text-gray-700">Department</label>
                            <div class="mt-1 relative rounded-md shadow-sm group">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-building text-gray-400 group-hover:text-green-500 transition-colors"></i>
                                </div>
                                <input type="text" name="department" id="department" class="focus:ring-green-500 focus:border-green-500 block w-full pl-10 sm:text-sm border-gray-200 rounded-md hover:border-green-300 transition-colors">
                            </div>
                            @error('department')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="consumption_date" class="block text-sm font-medium text-gray-700">Consumption Date</label>
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

                        <div>
                            <label for="reporting_period" class="block text-sm font-medium text-gray-700">Reporting Period</label>
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