<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Carbon Emission</title>
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
        .result-item {
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }
        .result-label {
            font-weight: bold;
            margin-right: 10px;
        }
        .total-emissions {
            font-size: 1.2em;
            font-weight: bold;
            color: #4CAF50;
            margin-top: 20px;
            padding: 10px;
            background-color: #f9f9f9;
            border-radius: 4px;
        }
        .back-button {
            display: inline-block;
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
            margin-top: 20px;
        }
        .back-button:hover {
            background-color: #45a049;
        }
        .success-message {
            background-color: #dff0d8;
            color: #3c763d;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 4px;
            border: 1px solid #d6e9c6;
        }
        .database-info {
            background-color: #f8f9fa;
            padding: 15px;
            margin-top: 20px;
            border-radius: 4px;
            border: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="success-message">
            Data emisi karbon berhasil disimpan ke database!
        </div>

        <h2>Carbon Emission Results</h2>
        
        <div class="result-item">
            <span class="result-label">Source Type:</span>
            <span>{{ $result['source_type'] }}</span>
        </div>
        
        <div class="result-item">
            <span class="result-label">Consumption Amount:</span>
            <span>{{ $result['consumption_amount'] }} {{ $result['unit'] }}</span>
        </div>
        
        <div class="result-item">
            <span class="result-label">Emission Factor:</span>
            <span>{{ $result['emission_factor'] }}</span>
        </div>
        
        <div class="result-item">
            <span class="result-label">Emission Type:</span>
            <span>{{ $result['emission_type'] }}</span>
        </div>
        
        <div class="result-item">
            <span class="result-label">Emission Date:</span>
            <span>{{ $result['emission_date'] }}</span>
        </div>
        
        <div class="result-item">
            <span class="result-label">Location:</span>
            <span>{{ $result['location'] }}</span>
        </div>
        
        <div class="result-item">
            <span class="result-label">Calculation Date:</span>
            <span>{{ $result['calculation_date'] }}</span>
        </div>
        
        <div class="total-emissions">
            Total Emissions: {{ $result['total_emissions'] }} {{ $result['emissions_unit'] }}
        </div>

        <div class="database-info">
            <h3>Database Record Information</h3>
            <div class="result-item">
                <span class="result-label">Record ID:</span>
                <span>{{ $emission->id }}</span>
            </div>
            <div class="result-item">
                <span class="result-label">Created At:</span>
                <span>{{ $emission->created_at }}</span>
            </div>
            <div class="result-item">
                <span class="result-label">Updated At:</span>
                <span>{{ $emission->updated_at }}</span>
            </div>
        </div>
        
        <a href="{{ url('/emissions') }}" class="back-button">Back to Form</a>
    </div>
</body>
</html> 