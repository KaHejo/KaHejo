<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carbon Emission Form</title>
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
        input {
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
        <h2>Carbon Emission Form</h2>
        <form action="{{ url('/emissions/result') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="source_type">Source Type:</label>
                <input type="text" id="source_type" name="source_type" required>
            </div>

            <div class="form-group">
                <label for="consumption_amount">Consumption Amount:</label>
                <input type="number" id="consumption_amount" name="consumption_amount" step="0.01" required>
            </div>

            <div class="form-group">
                <label for="unit">Unit:</label>
                <input type="text" id="unit" name="unit" required>
            </div>

            <div class="form-group">
                <label for="emission_factor">Emission Factor:</label>
                <input type="number" id="emission_factor" name="emission_factor" step="0.0001" required>
            </div>

            <div class="form-group">
                <label for="emission_type">Emission Type:</label>
                <input type="text" id="emission_type" name="emission_type" required>
            </div>

            <div class="form-group">
                <label for="emission_date">Emission Date:</label>
                <input type="date" id="emission_date" name="emission_date" required>
            </div>

            <div class="form-group">
                <label for="location">Location:</label>
                <input type="text" id="location" name="location" required>
            </div>

            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html> 