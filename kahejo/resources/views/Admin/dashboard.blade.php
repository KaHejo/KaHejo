@extends('layouts.admin')

@section('main-content')
<div class="container mx-auto px-4 py-8">
    <!-- Dashboard Summary Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6 mb-8">
        <div class="bg-white rounded-lg shadow-md p-6 flex flex-col items-center">
            <div class="text-kahejo-darkest text-3xl font-bold mb-2">{{ $usersCount }}</div>
            <div class="text-kahejo-medium font-semibold">Users</div>
        </div>
        <div class="bg-white rounded-lg shadow-md p-6 flex flex-col items-center">
            <div class="text-kahejo-darkest text-3xl font-bold mb-2">{{ $achievementsCount }}</div>
            <div class="text-kahejo-medium font-semibold">Achievements</div>
        </div>
        <div class="bg-white rounded-lg shadow-md p-6 flex flex-col items-center">
            <div class="text-kahejo-darkest text-3xl font-bold mb-2">{{ $emisiCount }}</div>
            <div class="text-kahejo-medium font-semibold">Emission Factors</div>
        </div>
        <div class="bg-white rounded-lg shadow-md p-6 flex flex-col items-center">
            <div class="text-kahejo-darkest text-3xl font-bold mb-2">{{ $historyClaimsCount }}</div>
            <div class="text-kahejo-medium font-semibold">History Claims</div>
        </div>
        <div class="bg-white rounded-lg shadow-md p-6 flex flex-col items-center">
            <div class="text-kahejo-darkest text-3xl font-bold mb-2">{{ $rewardsCount }}</div>
            <div class="text-kahejo-medium font-semibold">Rewards</div>
        </div>
        <div class="bg-white rounded-lg shadow-md p-6 flex flex-col items-center">
            <div class="text-kahejo-darkest text-3xl font-bold mb-2">{{ $totalPoints }}</div>
            <div class="text-kahejo-medium font-semibold">Total User Points</div>
        </div>
    </div>

    <!-- Grafik History Claim per Bulan -->
    <div class="mt-8">
        <h2 class="text-2xl font-bold mb-4">Total History Claim per Month</h2>
        <div class="bg-white rounded-lg shadow-md p-6">
            <canvas id="historyClaimChart" height="100"></canvas>
        </div>
    </div>
</div>

<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('historyClaimChart').getContext('2d');
    const historyClaimChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($historyClaimMonths) !!},
            datasets: [{
                label: 'Total History Claim',
                data: {!! json_encode($historyClaimCounts) !!},
                backgroundColor: '#10B981',
                borderColor: '#059669',
                borderWidth: 2,
                borderRadius: 8,
                maxBarThickness: 40,
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false },
                title: { display: false }
            },
            scales: {
                x: {
                    grid: { display: false },
                    title: { display: true, text: 'Month' }
                },
                y: {
                    beginAtZero: true,
                    title: { display: true, text: 'Total Claims' }
                }
            }
        }
    });
</script>
@endsection