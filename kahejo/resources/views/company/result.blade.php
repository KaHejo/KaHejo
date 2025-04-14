<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Konsumsi Energi Perusahaan</title>
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
        .total-consumption {
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
            Data konsumsi energi berhasil disimpan
        </div>

        <h2>Hasil Konsumsi Energi</h2>
        
        <div class="result-item">
            <span class="result-label">Jenis Sumber Energi:</span>
            <span>{{ $result['source_type'] }}</span>
        </div>
        
        <div class="result-item">
            <span class="result-label">Jumlah Konsumsi:</span>
            <span>{{ $result['consumption_amount'] }} {{ $result['unit_measurement'] }}</span>
        </div>
        
        <div class="result-item">
            <span class="result-label">Jenis Aktivitas:</span>
            <span>{{ $result['activity_type'] }}</span>
        </div>
        
        <div class="result-item">
            <span class="result-label">Lokasi:</span>
            <span>{{ $result['location_name'] ?? 'Tidak ditentukan' }}</span>
        </div>
        
        <div class="result-item">
            <span class="result-label">Departemen:</span>
            <span>{{ $result['department'] ?? 'Tidak ditentukan' }}</span>
        </div>
        
        <div class="result-item">
            <span class="result-label">Tanggal Konsumsi:</span>
            <span>{{ $result['consumption_date'] }}</span>
        </div>
        
        <div class="result-item">
            <span class="result-label">Periode Pelaporan:</span>
            <span>{{ $result['reporting_period'] }}</span>
        </div>
        
        <div class="result-item">
            <span class="result-label">Tanggal Pencatatan:</span>
            <span>{{ $result['calculation_date'] }}</span>
        </div>

        <div class="database-info">
            <h3>Informasi Data</h3>
            <div class="result-item">
                <span class="result-label">ID Record:</span>
                <span>{{ $consumption->id }}</span>
            </div>
            <div class="result-item">
                <span class="result-label">Dibuat Pada:</span>
                <span>{{ $consumption->created_at }}</span>
            </div>
            <div class="result-item">
                <span class="result-label">Diperbarui Pada:</span>
                <span>{{ $consumption->updated_at }}</span>
            </div>
        </div>
        
        <a href="{{ url('/company') }}" class="back-button">Back to Form</a>
    </div>
</body>
</html> 