<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hitung Jejak Karbon</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #e0e0e0; /* abu-abu lembut */
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
        }

        h1 {
            margin-top: 50px;
            color: #2e7d32; /* hijau gelap */
        }

        form {
            background-color: #fff;
            padding: 30px 40px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #4caf50;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #43a047;
        }

        .result {
            background-color: #f1f8e9;
            border: 1px solid #c5e1a5;
            border-radius: 10px;
            padding: 25px;
            margin-top: 30px;
            width: 100%;
            max-width: 500px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .result p {
            margin: 10px 0;
        }

        @media (max-width: 600px) {
            form, .result {
                padding: 20px;
            }

            h1 {
                font-size: 22px;
            }
        }
    </style>
</head>
<body>
    <h1>Formulir Jejak Karbon</h1>

    <form action="{{ url('/carbon/calculate') }}" method="POST">
        @csrf
        <label>Listrik (kWh):</label>
        <input type="number" name="electricity_kwh" step="0.01" required>

        <label>Bensin (liter):</label>
        <input type="number" name="fuel_liters" step="0.01" required>

        <label>Sampah (kg):</label>
        <input type="number" name="waste_kg" step="0.01" required>

        <button type="submit">Hitung Jejak Karbon</button>
    </form>

    @if(isset($result))
        <div class="result">
            <h2 style="color: #2e7d32;">Hasil Perhitungan</h2>
            <p><strong>Listrik:</strong> {{ $input['electricity_kwh'] }} kWh</p>
            <p><strong>Bensin:</strong> {{ $input['fuel_liters'] }} liter</p>
            <p><strong>Sampah:</strong> {{ $input['waste_kg'] }} kg</p>
            <hr>
            <p><strong>Total Emisi:</strong> <span style="color: #2e7d32;">{{ $result }} kg CO₂</span></p>
        </div>
    @endif
</body>
</html>
