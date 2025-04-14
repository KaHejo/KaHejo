<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Energy Consumption</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input, select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        .error {
            color: red;
            font-size: 0.9em;
            margin-top: 5px;
        }
        
    </style>
</head>
<body>
    
    <div class="container">
        <h2>Company Energy Consumption</h2>
        
        <form action="{{ url('/company') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="source_type">Source Type:</label>
                <select name="source_type" id="source_type" required>
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

            <div class="form-group">
                <label for="consumption_amount">Consumption Amount:</label>
                <input type="number" step="0.01" name="consumption_amount" id="consumption_amount" required min="0">
                @error('consumption_amount')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="unit_measurement">Unit Measurement:</label>
                <select name="unit_measurement" id="unit_measurement" required>
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

            <div class="form-group">
                <label for="activity_type">Activity Type:</label>
                <select name="activity_type" id="activity_type" required>
                    <option value="">Select Activity Type</option>
                    <option value="production">Production</option>
                    <option value="transportation">Transportation</option>
                    <option value="office">Office</option>
                    <option value="utilities">Utilities</option>
                </select>
                @error('activity_type')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="location_name">Location Name:</label>
                <input type="text" name="location_name" id="location_name">
                @error('location_name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="department">Department:</label>
                <input type="text" name="department" id="department">
                @error('department')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="consumption_date">Consumption Date:</label>
                <input type="date" name="consumption_date" id="consumption_date" required>
                @error('consumption_date')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="reporting_period">Reporting Period:</label>
                <select name="reporting_period" id="reporting_period" required>
                    <option value="">Select Period</option>
                    <option value="monthly">Monthly</option>
                    <option value="yearly">Yearly</option>
                </select>
                @error('reporting_period')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-actions">
                <a href="{{ route('main') }}">
                <button type="button" style="background-color: #ccc; color: black;">Back</button>
                </a>
                <button type="submit">Submit</button>
            </div>

        </form>
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
    </script>
</body>
</html> 