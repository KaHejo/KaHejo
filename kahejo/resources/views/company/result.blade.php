<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Konsumsi Energi Perusahaan</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f6f7fb 0%, #f1f5f9 100%);
        }
        .card-hover {
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
        }
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
            gap: 1rem;
        }
        .timeline-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
        }
        .btn-back {
            transition: all 0.3s ease;
            background: linear-gradient(45deg, #10B981, #059669);
            box-shadow: 0 4px 6px rgba(16, 185, 129, 0.2);
        }
        .btn-back:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 8px rgba(16, 185, 129, 0.3);
        }
        .section-title {
            position: relative;
            padding-left: 1.5rem;
            margin-bottom: 1rem;
        }
        .section-title::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 1rem;
            height: 1rem;
            background: linear-gradient(45deg, #10B981, #059669);
            border-radius: 0.25rem;
            animation: pulse 2s infinite;
        }
        @keyframes pulse {
            0% { transform: translateY(-50%) scale(1); }
            50% { transform: translateY(-50%) scale(1.1); }
            100% { transform: translateY(-50%) scale(1); }
        }
        .info-card {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 0.75rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            padding: 1rem;
            transition: all 0.3s ease;
            border: 1px solid rgba(16, 185, 129, 0.1);
        }
        .info-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.1);
            border-color: rgba(16, 185, 129, 0.3);
        }
        .success-badge {
            background: linear-gradient(135deg, #10B981 0%, #059669 100%);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 1rem;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            box-shadow: 0 4px 6px rgba(16, 185, 129, 0.2);
            animation: slideIn 0.5s ease-out;
        }
        @keyframes slideIn {
            from { transform: translateY(-20px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        .icon-wrapper {
            transition: all 0.3s ease;
        }
        .info-card:hover .icon-wrapper {
            transform: scale(1.1) rotate(5deg);
        }
        .stat-value {
            background: linear-gradient(45deg, #10B981, #059669);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            font-weight: 600;
        }
        .chart-container {
            position: relative;
            margin: auto;
            height: 300px;
            width: 100%;
        }
        .floating-card {
            animation: float 6s ease-in-out infinite;
        }
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }
    </style>
</head>
<body>
    <div class="min-h-screen">
        <!-- Top Bar -->
        <div class="bg-white/80 backdrop-blur-md shadow-lg sticky top-0 z-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <h1 class="text-xl font-bold text-gray-900 flex items-center">
                            <i class="fas fa-chart-line text-green-500 mr-3"></i>
                            Hasil Konsumsi Energi
                        </h1>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
            <!-- Success Alert -->
            <div class="mb-6" data-aos="fade-down">
                <div class="success-badge">
                    <i class="fas fa-check-circle text-xl"></i>
                    <span class="text-sm font-medium">Data konsumsi energi berhasil disimpan</span>
                </div>
            </div>

            <!-- Main Card -->
            <div class="card-hover bg-white/90 backdrop-blur-md shadow-xl rounded-xl border border-gray-100 overflow-hidden" data-aos="fade-up">
                <div class="px-6 py-4 border-b border-gray-100">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="p-2 rounded-lg bg-gradient-to-r from-green-50 to-emerald-50">
                                <i class="fas fa-chart-line text-xl text-green-600"></i>
                            </div>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-lg font-semibold text-gray-900">Hasil Konsumsi Energi</h3>
                            <p class="text-sm text-gray-500">Detail informasi konsumsi energi perusahaan</p>
                        </div>
                    </div>
                </div>

                <div class="p-6 space-y-6">
                    <!-- Energy Consumption Chart -->
                    <div class="mb-8" data-aos="fade-up" data-aos-delay="100">
                        <div class="section-title">
                            <h4 class="text-lg font-semibold text-gray-900">Grafik Konsumsi Energi</h4>
                        </div>
                        <div class="chart-container">
                            <canvas id="consumptionChart"></canvas>
                        </div>
                    </div>

                    <!-- Energy Source Section -->
                    <div data-aos="fade-up" data-aos-delay="200">
                        <div class="section-title">
                            <h4 class="text-lg font-semibold text-gray-900">Sumber Energi</h4>
                        </div>
                        <div class="info-grid">
                            <div class="info-card floating-card">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 icon-wrapper">
                                        <div class="p-2 rounded-lg bg-gradient-to-r from-green-50 to-emerald-50">
                                            <i class="fas fa-plug text-lg text-green-600"></i>
                                        </div>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-gray-500">Jenis</p>
                                        <p class="text-base font-semibold stat-value">{{ $result['source_type'] }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="info-card floating-card">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 icon-wrapper">
                                        <div class="p-2 rounded-lg bg-gradient-to-r from-green-50 to-emerald-50">
                                            <i class="fas fa-bolt text-lg text-green-600"></i>
                                        </div>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-gray-500">Jumlah</p>
                                        <p class="text-base font-semibold stat-value">{{ $result['consumption_amount'] }} {{ $result['unit_measurement'] }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Activity Information Section -->
                    <div data-aos="fade-up" data-aos-delay="300">
                        <div class="section-title">
                            <h4 class="text-lg font-semibold text-gray-900">Informasi Aktivitas</h4>
                        </div>
                        <div class="info-grid">
                            <div class="info-card floating-card">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 icon-wrapper">
                                        <div class="p-2 rounded-lg bg-gradient-to-r from-green-50 to-emerald-50">
                                            <i class="fas fa-tasks text-lg text-green-600"></i>
                                        </div>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-gray-500">Jenis</p>
                                        <p class="text-base font-semibold stat-value">{{ $result['activity_type'] }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="info-card floating-card">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 icon-wrapper">
                                        <div class="p-2 rounded-lg bg-gradient-to-r from-green-50 to-emerald-50">
                                            <i class="fas fa-map-marker-alt text-lg text-green-600"></i>
                                        </div>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-gray-500">Lokasi</p>
                                        <p class="text-base font-semibold stat-value">{{ $result['location_name'] ?? 'Tidak ditentukan' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Time Information Section -->
                    <div data-aos="fade-up" data-aos-delay="400">
                        <div class="section-title">
                            <h4 class="text-lg font-semibold text-gray-900">Informasi Waktu</h4>
                        </div>
                        <div class="timeline-grid">
                            <div class="info-card floating-card">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 icon-wrapper">
                                        <div class="p-2 rounded-lg bg-gradient-to-r from-green-50 to-emerald-50">
                                            <i class="fas fa-clock text-lg text-green-600"></i>
                                        </div>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-gray-500">Tanggal Konsumsi</p>
                                        <p class="text-base font-semibold stat-value">{{ $result['consumption_date'] }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="info-card floating-card">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 icon-wrapper">
                                        <div class="p-2 rounded-lg bg-gradient-to-r from-green-50 to-emerald-50">
                                            <i class="fas fa-calendar-alt text-lg text-green-600"></i>
                                        </div>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-gray-500">Periode Pelaporan</p>
                                        <p class="text-base font-semibold stat-value">{{ $result['reporting_period'] }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="info-card floating-card">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 icon-wrapper">
                                        <div class="p-2 rounded-lg bg-gradient-to-r from-green-50 to-emerald-50">
                                            <i class="fas fa-save text-lg text-green-600"></i>
                                        </div>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-gray-500">Tanggal Pencatatan</p>
                                        <p class="text-base font-semibold stat-value">{{ $result['calculation_date'] }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Database Information Section -->
                    <div data-aos="fade-up" data-aos-delay="500">
                        <div class="section-title">
                            <h4 class="text-lg font-semibold text-gray-900">Informasi Data</h4>
                        </div>
                        <div class="info-grid">
                            <div class="info-card floating-card">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 icon-wrapper">
                                        <div class="p-2 rounded-lg bg-gradient-to-r from-green-50 to-emerald-50">
                                            <i class="fas fa-hashtag text-lg text-green-600"></i>
                                        </div>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-gray-500">ID Record</p>
                                        <p class="text-base font-semibold stat-value">#{{ $consumption->id }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="info-card floating-card">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 icon-wrapper">
                                        <div class="p-2 rounded-lg bg-gradient-to-r from-green-50 to-emerald-50">
                                            <i class="fas fa-calendar-plus text-lg text-green-600"></i>
                                        </div>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-gray-500">Dibuat Pada</p>
                                        <p class="text-base font-semibold stat-value">{{ $consumption->created_at->format('d M Y') }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="info-card floating-card">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 icon-wrapper">
                                        <div class="p-2 rounded-lg bg-gradient-to-r from-green-50 to-emerald-50">
                                            <i class="fas fa-calendar-check text-lg text-green-600"></i>
                                        </div>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-gray-500">Diperbarui Pada</p>
                                        <p class="text-base font-semibold stat-value">{{ $consumption->updated_at->format('d M Y') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="px-6 py-4 border-t border-gray-100 flex justify-between items-center">
                    <a href="{{ url('/company') }}" class="btn-back inline-flex items-center px-4 py-2 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Kembali ke Form
                    </a>
                    <button onclick="window.print()" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-all duration-300 transform hover:-translate-y-1">
                        <i class="fas fa-print mr-2"></i>
                        Cetak Laporan
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Initialize AOS
        AOS.init({
            duration: 800,
            once: true
        });

        // Initialize Chart
        const ctx = document.getElementById('consumptionChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Konsumsi Energi'],
                datasets: [{
                    label: '{{ $result["source_type"] }} ({{ $result["unit_measurement"] }})',
                    data: [{{ $result['consumption_amount'] }}],
                    backgroundColor: [
                        'rgba(16, 185, 129, 0.2)'
                    ],
                    borderColor: [
                        'rgba(16, 185, 129, 1)'
                    ],
                    borderWidth: 2,
                    borderRadius: 5,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Grafik Konsumsi Energi'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(0, 0, 0, 0.1)'
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                },
                animation: {
                    duration: 2000,
                    easing: 'easeInOutQuart'
                }
            }
        });

        // Add print styles
        const style = document.createElement('style');
        style.textContent = `
            @media print {
                body * {
                    visibility: hidden;
                }
                .card-hover, .card-hover * {
                    visibility: visible;
                }
                .card-hover {
                    position: absolute;
                    left: 0;
                    top: 0;
                    width: 100%;
                }
                .btn-back, button {
                    display: none;
                }
            }
        `;
        document.head.appendChild(style);
    </script>
</body>
</html> 