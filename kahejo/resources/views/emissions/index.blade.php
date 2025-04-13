<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carbon Emission </title>
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
        <h2>Carbon Emission</h2>
        
        <form action="{{ route('emissions.result') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="source_type">Source Type:</label>
                <select name="source_type" id="source_type" required>
                    <option value="">Select Source Type</option>
                    <option value="electricity">Electricity</option>
                    <option value="fuel">Fuel</option>
                    <option value="gas">Gas</option>
                    <option value="water">Water</option>
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
                <label for="unit">Unit:</label>
                <select name="unit" id="unit" required>
                    <option value="">Select Unit</option>
                    <option value="kWh">kWh</option>
                    <option value="liter">Liter</option>
                    <option value="m3">m³</option>
                </select>
                @error('unit')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="emission_factor">Emission Factor:</label>
                <input type="number" step="0.0001" name="emission_factor" id="emission_factor" required min="0">
                @error('emission_factor')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="emission_type">Emission Type:</label>
                <select name="emission_type" id="emission_type" required>
                    <option value="">Select Emission Type</option>
                    <option value="scope1">Scope 1</option>
                    <option value="scope2">Scope 2</option>
                    <option value="scope3">Scope 3</option>
                </select>
                @error('emission_type')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="emission_date">Emission Date:</label>
                <input type="date" name="emission_date" id="emission_date" required>
                @error('emission_date')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="location">Location:</label>
                <input type="text" name="location" id="location" required>
                @error('location')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit">Calculate Emissions</button>
        </form>
    </div>
</body>
</html> 