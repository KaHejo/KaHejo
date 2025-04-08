<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Carbon Calculator Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1100px;
            margin: auto;
            padding: 2rem;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 2rem;
        }

        .card {
            background-color: white;
            border-radius: 12px;
            padding: 1.5rem;
            margin: 1rem 0;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            transition: 0.3s ease;
        }

        .card:hover {
            transform: translateY(-2px);
        }

        .stats {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .stat-card {
            flex: 1;
            min-width: 250px;
            padding: 1rem;
            border-radius: 12px;
            color: white;
        }

        .bg-green {
            background-color: #28a745;
        }

        .bg-blue {
            background-color: #007bff;
        }

        canvas {
            margin-top: 1rem;
        }

        @media (max-width: 768px) {
            .stats {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Carbon Calculator Dashboard</h2>

        <!-- Statistik -->
        <div class="stats">
            <div class="stat-card bg-green">
                <h4>Total Emisi</h4>
                <h2>{{ number_format($totalEmission, 2) }} kg CO₂</h2>
            </div>

            @foreach ($emissionsByCategory as $category => $value)
                <div class="stat-card bg-blue">
                    <h4>{{ ucfirst($category) }}</h4>
                    <h3>{{ number_format($value, 2) }} kg CO₂</h3>
                </div>
            @endforeach
        </div>

        <!-- Grafik -->
        <div class="card">
            <h4>Grafik Emisi Bulanan</h4>
            <canvas id="emissionChart" height="100"></canvas>
        </div>
    </div>

    <script>
    const labels = {!! json_encode($monthlyEmissions->keys()) !!};
    const data = {!! json_encode($monthlyEmissions->values()) !!};

    const ctx = document.getElementById('emissionChart').getContext('2d');
    const chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Emisi CO₂ (kg)',
                data: data,
                borderColor: 'rgba(0, 123, 255, 1)',
                backgroundColor: 'rgba(0, 123, 255, 0.1)',
                fill: true,
                tension: 0.3
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

</body>
</html>
