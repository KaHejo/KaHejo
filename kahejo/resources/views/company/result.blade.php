<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Konsumsi Energi Perusahaan - KaHejo</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f6f7fb 0%, #f1f5f9 100%);
        }
        .card-hover {
            transition: all 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }
        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
            gap: 0.5rem;
        }
        .timeline-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 0.5rem;
        }
        .btn-back {
            transition: all 0.3s ease;
        }
        .btn-back:hover {
            transform: translateY(-1px);
        }
        .section-title {
            position: relative;
            padding-left: 1.5rem;
            margin-bottom: 0.5rem;
        }
        .section-title::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 1rem;
            height: 1rem;
            background: #10b981;
            border-radius: 0.25rem;
        }
        .info-card {
            background: white;
            border-radius: 0.375rem;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
            padding: 0.75rem !important;
        }
        .info-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .success-badge {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: white;
            padding: 0.25rem 0.5rem;
            border-radius: 1rem;
            display: inline-flex;
            align-items: center;
            gap: 0.375rem;
        }
    </style>
</head>
<body>
    <div class="min-h-screen">
        <!-- Top Bar -->
        <div class="bg-white shadow-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-14">
                    <div class="flex items-center">
                        <h1 class="text-lg font-bold text-gray-900">Hasil Konsumsi Energi</h1>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="max-w-7xl mx-auto py-4 sm:px-6 lg:px-8">
            <!-- Success Alert -->
            <div class="mb-4">
                <div class="success-badge">
                    <i class="fas fa-check-circle"></i>
                    <span class="text-sm font-medium">Data konsumsi energi berhasil disimpa</span>
                </div>
            </div>

            <!-- Main Card -->
            <div class="card-hover bg-white shadow-lg rounded-lg border border-gray-100 overflow-hidden">
                <div class="px-4 py-3 border-b border-gray-100">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="p-1.5 rounded-lg bg-gradient-to-r from-green-50 to-emerald-50">
                                <i class="fas fa-chart-line text-lg text-green-600"></i>
                            </div>
                        </div>
                        <div class="ml-2">
                            <h3 class="text-base font-semibold text-gray-900">Hasil Konsumsi Energi</h3>
                            <p class="text-xs text-gray-500">Detail informasi konsumsi energi perusahaan</p>
                        </div>
                    </div>
                </div>

                <div class="p-3 space-y-3">
                    <!-- Energy Source Section -->
                    <div>
                        <div class="section-title mb-3">
                            <h4 class="text-base font-semibold text-gray-900">Sumber Energi</h4>
                        </div>
                        <div class="info-grid">
                            <div class="info-card p-3">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <div class="p-1 rounded-lg bg-green-50">
                                            <i class="fas fa-plug text-sm text-green-600"></i>
                                        </div>
                                    </div>
                                    <div class="ml-2">
                                        <p class="text-xs font-medium text-gray-500">Jenis</p>
                                        <p class="text-xs font-semibold text-gray-900">{{ $result['source_type'] }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="info-card p-3">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <div class="p-1.5 rounded-lg bg-green-50">
                                            <i class="fas fa-bolt text-green-600"></i>
                                        </div>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-xs font-medium text-gray-500">Jumlah</p>
                                        <p class="text-sm font-semibold text-gray-900">{{ $result['consumption_amount'] }} {{ $result['unit_measurement'] }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Activity Information Section -->
                    <div>
                        <div class="section-title mb-3">
                            <h4 class="text-base font-semibold text-gray-900">Informasi Aktivitas</h4>
                        </div>
                        <div class="info-grid">
                            <div class="info-card p-3">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <div class="p-1.5 rounded-lg bg-green-50">
                                            <i class="fas fa-tasks text-green-600"></i>
                                        </div>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-xs font-medium text-gray-500">Jenis</p>
                                        <p class="text-sm font-semibold text-gray-900">{{ $result['activity_type'] }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="info-card p-3">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <div class="p-1.5 rounded-lg bg-green-50">
                                            <i class="fas fa-map-marker-alt text-green-600"></i>
                                        </div>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-xs font-medium text-gray-500">Lokasi</p>
                                        <p class="text-sm font-semibold text-gray-900">{{ $result['location_name'] ?? 'Tidak ditentukan' }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="info-card p-3">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <div class="p-1.5 rounded-lg bg-green-50">
                                            <i class="fas fa-building text-green-600"></i>
                                        </div>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-xs font-medium text-gray-500">Departemen</p>
                                        <p class="text-sm font-semibold text-gray-900">{{ $result['department'] ?? 'Tidak ditentukan' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Time Information Section -->
                    <div>
                        <div class="section-title mb-3">
                            <h4 class="text-base font-semibold text-gray-900">Informasi Waktu</h4>
                        </div>
                        <div class="timeline-grid">
                            <div class="info-card p-3">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <div class="p-1.5 rounded-lg bg-green-50">
                                            <i class="fas fa-clock text-green-600"></i>
                                        </div>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-xs font-medium text-gray-500">Tanggal Konsumsi</p>
                                        <p class="text-sm font-semibold text-gray-900">{{ $result['consumption_date'] }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="info-card p-3">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <div class="p-1.5 rounded-lg bg-green-50">
                                            <i class="fas fa-calendar-alt text-green-600"></i>
                                        </div>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-xs font-medium text-gray-500">Periode Pelaporan</p>
                                        <p class="text-sm font-semibold text-gray-900">{{ $result['reporting_period'] }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="info-card p-3">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <div class="p-1.5 rounded-lg bg-green-50">
                                            <i class="fas fa-save text-green-600"></i>
                                        </div>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-xs font-medium text-gray-500">Tanggal Pencatatan</p>
                                        <p class="text-sm font-semibold text-gray-900">{{ $result['calculation_date'] }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Database Information Section -->
                    <div>
                        <div class="section-title mb-3">
                            <h4 class="text-base font-semibold text-gray-900">Informasi Data</h4>
                        </div>
                        <div class="info-grid">
                            <div class="info-card p-3">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <div class="p-1.5 rounded-lg bg-green-50">
                                            <i class="fas fa-hashtag text-green-600"></i>
                                        </div>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-xs font-medium text-gray-500">ID Record</p>
                                        <p class="text-sm font-semibold text-gray-900">#{{ $consumption->id }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="info-card p-3">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <div class="p-1.5 rounded-lg bg-green-50">
                                            <i class="fas fa-calendar-plus text-green-600"></i>
                                        </div>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-xs font-medium text-gray-500">Dibuat Pada</p>
                                        <p class="text-sm font-semibold text-gray-900">{{ $consumption->created_at->format('d M Y') }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="info-card p-3">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <div class="p-1.5 rounded-lg bg-green-50">
                                            <i class="fas fa-calendar-check text-green-600"></i>
                                        </div>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-xs font-medium text-gray-500">Diperbarui Pada</p>
                                        <p class="text-sm font-semibold text-gray-900">{{ $consumption->updated_at->format('d M Y') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Back Button at Bottom Left -->
                <div class="px-4 py-3 border-t border-gray-100">
                    <a href="{{ url('/company') }}" class="btn-back inline-flex items-center px-2.5 py-1 border border-transparent text-xs font-medium rounded-full text-white bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        <i class="fas fa-arrow-left mr-1"></i>
                        Kembali ke Form
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html> 