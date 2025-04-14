<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Energy Consumption</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f9fafb;
            color: #333333;
        }
        .navbar {
            background-color: #ffffff !important;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
        }
        .navbar-brand {
            color: #2ecc71 !important;
            font-weight: bold;
            font-size: 1.5rem;
        }
        .nav-link {
            color: #4b5563 !important;
            transition: all 0.3s ease;
            padding-bottom: 0.5rem;
            margin-bottom: -1px;
            border-bottom: 2px solid transparent;
        }
        .nav-link:hover {
            color: #1f2937 !important;
            border-bottom: 2px solid #e5e7eb;
        }
        .nav-link.active {
            color: #111827 !important;
            border-bottom: 2px solid #2ecc71;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            background-color: #ffffff;
        }
        .card-header {
            background-color: #f8f9fa !important;
            border-bottom: 1px solid #e9ecef;
            color: #333333;
        }
        .form-control {
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 10px;
            transition: all 0.3s ease;
        }
        .form-control:focus {
            border-color: #4CAF50;
            box-shadow: 0 0 0 0.2rem rgba(76, 175, 80, 0.25);
        }
        .btn-primary {
            background-color: #4CAF50;
            border-color: #4CAF50;
        }
        .btn-primary:hover {
            background-color: #45a049;
            border-color: #45a049;
        }
        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }
        .error {
            color: #dc3545;
            font-size: 0.9em;
            margin-top: 5px;
        }
        .form-label {
            font-weight: 600;
            color: #333333;
        }
        .page-title {
            color: #333333;
            margin-bottom: 1.5rem;
            font-weight: 700;
        }
        .form-actions {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="#">KaHejo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('main') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('profile') }}">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('settings') }}">Settings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('carbon') }}">Carbon Calculator</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('emissions') }}">Emission</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('company') }}">Company Energy Consumption</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2 class="page-title">Company Energy Consumption</h2>
            </div>
            <div class="card-body">
                <form action="{{ url('/company') }}" method="POST">
                    @csrf
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="source_type" class="form-label">Source Type:</label>
                            <select name="source_type" id="source_type" class="form-control" required>
                                <option value="">Select Source Type</option>
                                <option value="electricity">Electricity</option>
                                <option value="gasoline">Gasoline</option>
                                <option value="diesel">Diesel</option>
                                <option value="gas">Gas</option>
                                <option value="lpg">LPG</option>
                            </select>
                            @error('source_type')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>  

                        <div class="col-md-6 mb-3">
                            <label for="consumption_amount" class="form-label">Consumption Amount:</label>
                            <input type="number" step="0.01" name="consumption_amount" id="consumption_amount" class="form-control" required min="0">
                            @error('consumption_amount')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="unit_measurement" class="form-label">Unit Measurement:</label>
                            <select name="unit_measurement" id="unit_measurement" class="form-control" required>
                                <option value="">Select Unit</option>
                                <option value="kWh">kWh</option>
                                <option value="liter">Liter</option>
                                <option value="kg">Kilogram</option>
                                <option value="m3">Meter Kubik</option>
                            </select>
                            @error('unit_measurement')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="activity_type" class="form-label">Activity Type:</label>
                            <select name="activity_type" id="activity_type" class="form-control" required>
                                <option value="">Select Activity Type</option>
                                <option value="production">Production</option>
                                <option value="transportation">Transportation</option>
                                <option value="office">Office</option>
                                <option value="any">Any</option>
                            </select>
                            @error('activity_type')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="location_name" class="form-label">Location Name:</label>
                            <input type="text" name="location_name" id="location_name" class="form-control">
                            @error('location_name')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="department" class="form-label">Department:</label>
                            <input type="text" name="department" id="department" class="form-control">
                            @error('department')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="consumption_date" class="form-label">Consumption Date:</label>
                            <input type="date" name="consumption_date" id="consumption_date" class="form-control" required>
                            @error('consumption_date')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="reporting_period" class="form-label">Reporting Period:</label>
                            <select name="reporting_period" id="reporting_period" class="form-control" required>
                                <option value="">Select Period</option>
                                <option value="monthly">Monthly</option>
                                <option value="yearly">Yearly</option>
                            </select>
                            @error('reporting_period')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-actions">
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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
    </script>
</body>
</html> 