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
        .sidebar-link {
            transition: all 0.3s ease;
            border-radius: 0.5rem;
        }
        .sidebar-link:hover {
            background-color: rgba(16, 185, 129, 0.1);
        }
        .sidebar-link.active {
            background-color: rgba(16, 185, 129, 0.2);
        }
        .card-hover {
            transition: all 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }
        .btn-logout {
            transition: all 0.3s ease;
        }
        .btn-logout:hover {
            transform: translateY(-1px);
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-gray-100 shadow-lg">
            <div class="flex flex-col h-full">
                <!-- Logo -->
                <div class="flex items-center justify-center h-16 border-b border-gray-200 bg-white">
                    <span class="text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-green-500 to-emerald-600">KaHejo</span>
                </div>

                <!-- User Profile -->
                <div class="p-4 border-b border-gray-200 bg-white">
                    <div class="flex items-center space-x-4">
                        <img class="h-10 w-10 rounded-full ring-2 ring-green-500" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="User">
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-900">{{ Auth::user()->name }}</p>
                            <p class="text-xs text-gray-500">Administrator</p>
                        </div>
                    </div>
                </div>

                <!-- Navigation Links -->
                <nav class="flex-1 px-4 py-4 space-y-1">
                    <a href="{{ route('main') }}" class="sidebar-link flex items-center px-4 py-3 text-gray-500 hover:text-gray-900">
                        <i class="fas fa-home w-6 text-green-600"></i>
                        <span class="ml-3">Dashboard</span>
                    </a>
                    <a href="{{ route('profile') }}" class="sidebar-link flex items-center px-4 py-3 text-gray-500 hover:text-gray-900">
                        <i class="fas fa-user w-6 text-green-600"></i>
                        <span class="ml-3">Profile</span>
                    </a>
                    <a href="{{ route('settings') }}" class="sidebar-link flex items-center px-4 py-3 text-gray-500 hover:text-gray-900">
                        <i class="fas fa-cog w-6 text-green-600"></i>
                        <span class="ml-3">Settings</span>
                    </a>
                    <a href="{{ route('carbon') }}" class="sidebar-link flex items-center px-4 py-3 text-gray-500 hover:text-gray-900">
                        <i class="fas fa-calculator w-6 text-green-600"></i>
                        <span class="ml-3">Carbon Calculator</span>
                    </a>
                    <a href="{{ route('company') }}" class="sidebar-link active flex items-center px-4 py-3 text-gray-900 hover:text-gray-900">
                        <i class="fas fa-building w-6 text-green-600"></i>
                        <span class="ml-3">Energy Consumption</span>
                    </a>
                </nav>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 overflow-auto">
            <!-- Top Bar -->
            <div class="bg-white shadow-sm">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex items-center">
                            <h1 class="text-2xl font-bold text-gray-900">Company Energy Consumption</h1>
                        </div>
                        <div class="flex items-center space-x-4">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
                <!-- Statistics Cards -->
                <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3 mb-8">
                    <div class="card-hover bg-white overflow-hidden shadow rounded-lg border border-gray-100">
                        <div class="p-5">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <div class="p-3 rounded-full bg-green-50">
                                        <i class="fas fa-bolt text-green-600 text-2xl"></i>
                                    </div>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <dl>
                                        <dt class="text-sm font-medium text-gray-500 truncate">Total Consumption</dt>
                                        <dd class="flex items-baseline">
                                            <div class="text-2xl font-semibold text-gray-900">1,234 kWh</div>
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-hover bg-white overflow-hidden shadow rounded-lg border border-gray-100">
                        <div class="p-5">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <div class="p-3 rounded-full bg-green-50">
                                        <i class="fas fa-chart-line text-green-600 text-2xl"></i>
                                    </div>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <dl>
                                        <dt class="text-sm font-medium text-gray-500 truncate">Monthly Average</dt>
                                        <dd class="flex items-baseline">
                                            <div class="text-2xl font-semibold text-gray-900">456 kWh</div>
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-hover bg-white overflow-hidden shadow rounded-lg border border-gray-100">
                        <div class="p-5">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <div class="p-3 rounded-full bg-green-50">
                                        <i class="fas fa-tree text-green-600 text-2xl"></i>
                                    </div>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <dl>
                                        <dt class="text-sm font-medium text-gray-500 truncate">Carbon Saved</dt>
                                        <dd class="flex items-baseline">
                                            <div class="text-2xl font-semibold text-gray-900">789 kg CO2</div>
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main Form Card -->
                <div class="bg-white shadow rounded-lg border border-gray-100">
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Energy Consumption Form</h3>
                    </div>
                    <div class="border-t border-gray-200 px-4 py-5 sm:p-6">
                        <form action="{{ url('/company') }}" method="POST">
                            @csrf
                            
                            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                                <div>
                                    <label for="source_type" class="block text-sm font-medium text-gray-700">Source Type</label>
                                    <div class="mt-1 relative rounded-md shadow-sm">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <i class="fas fa-power-off text-gray-400"></i>
                                        </div>
                                        <select name="source_type" id="source_type" class="focus:ring-green-500 focus:border-green-500 block w-full pl-10 sm:text-sm border-gray-300 rounded-md" required>
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
                                    <div class="mt-1 relative rounded-md shadow-sm">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <i class="fas fa-calculator text-gray-400"></i>
                                        </div>
                                        <input type="number" step="0.01" name="consumption_amount" id="consumption_amount" class="focus:ring-green-500 focus:border-green-500 block w-full pl-10 sm:text-sm border-gray-300 rounded-md" required min="0">
                                    </div>
                                    @error('consumption_amount')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="unit_measurement" class="block text-sm font-medium text-gray-700">Unit Measurement</label>
                                    <div class="mt-1 relative rounded-md shadow-sm">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <i class="fas fa-ruler text-gray-400"></i>
                                        </div>
                                        <select name="unit_measurement" id="unit_measurement" class="focus:ring-green-500 focus:border-green-500 block w-full pl-10 sm:text-sm border-gray-300 rounded-md" required>
                                            <option value="">Select Unit</option>
                                            <option value="kWh">kWh</option>
                                            <option value="liter">Liter</option>
                                            <option value="kg">Kilogram</option>
                                            <option value="m3">Meter Kubik</option>
                                        </select>
                                    </div>
                                    @error('unit_measurement')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="activity_type" class="block text-sm font-medium text-gray-700">Activity Type</label>
                                    <div class="mt-1 relative rounded-md shadow-sm">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <i class="fas fa-tasks text-gray-400"></i>
                                        </div>
                                        <select name="activity_type" id="activity_type" class="focus:ring-green-500 focus:border-green-500 block w-full pl-10 sm:text-sm border-gray-300 rounded-md" required>
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
                                    <div class="mt-1 relative rounded-md shadow-sm">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <i class="fas fa-map-marker-alt text-gray-400"></i>
                                        </div>
                                        <input type="text" name="location_name" id="location_name" class="focus:ring-green-500 focus:border-green-500 block w-full pl-10 sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                    @error('location_name')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="department" class="block text-sm font-medium text-gray-700">Department</label>
                                    <div class="mt-1 relative rounded-md shadow-sm">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <i class="fas fa-building text-gray-400"></i>
                                        </div>
                                        <input type="text" name="department" id="department" class="focus:ring-green-500 focus:border-green-500 block w-full pl-10 sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                    @error('department')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="consumption_date" class="block text-sm font-medium text-gray-700">Consumption Date</label>
                                    <div class="mt-1 relative rounded-md shadow-sm">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <i class="fas fa-calendar text-gray-400"></i>
                                        </div>
                                        <input type="date" name="consumption_date" id="consumption_date" class="focus:ring-green-500 focus:border-green-500 block w-full pl-10 sm:text-sm border-gray-300 rounded-md" required>
                                    </div>
                                    @error('consumption_date')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="reporting_period" class="block text-sm font-medium text-gray-700">Reporting Period</label>
                                    <div class="mt-1 relative rounded-md shadow-sm">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <i class="fas fa-clock text-gray-400"></i>
                                        </div>
                                        <select name="reporting_period" id="reporting_period" class="focus:ring-green-500 focus:border-green-500 block w-full pl-10 sm:text-sm border-gray-300 rounded-md" required>
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
                                <button type="reset" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                    <i class="fas fa-undo mr-2"></i>
                                    Reset
                                </button>
                                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                    <i class="fas fa-save mr-2"></i>
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
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