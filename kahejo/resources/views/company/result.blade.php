<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Konsumsi Energi Perusahaan</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #2ecc71;
            --primary-dark: #27ae60;
            --secondary-color: #95a5a6;
            --text-color: #2c3e50;
            --light-bg: #f8f9fa;
            --border-color: #e9ecef;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--light-bg);
            color: var(--text-color);
            line-height: 1.6;
        }

        .page-container {
            max-width: 1000px;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        .success-alert {
            background-color: #d4edda;
            border-left: 4px solid var(--primary-color);
            color: #155724;
            padding: 1rem;
            border-radius: 0 4px 4px 0;
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }

        .success-alert i {
            font-size: 1.5rem;
            margin-right: 1rem;
            color: var(--primary-color);
        }

        .main-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .card-header {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            color: white;
            padding: 1.5rem;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .card-content {
            padding: 2rem;
        }

        .info-section {
            background: var(--light-bg);
            border-radius: 10px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .info-section-header {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
            color: var(--text-color);
            font-size: 1.2rem;
            font-weight: 600;
        }

        .info-section-header i {
            color: var(--primary-color);
            margin-right: 0.75rem;
            font-size: 1.4rem;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
        }

        .info-item {
            display: flex;
            justify-content: space-between;
            padding: 0.75rem;
            border-bottom: 1px solid var(--border-color);
        }

        .info-item:last-child {
            border-bottom: none;
        }

        .info-label {
            color: var(--secondary-color);
            font-weight: 500;
        }

        .info-value {
            font-weight: 600;
            color: var(--text-color);
        }

        .timeline-item {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
        }

        .timeline-icon {
            width: 40px;
            height: 40px;
            background-color: rgba(46, 204, 113, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
        }

        .timeline-icon i {
            color: var(--primary-color);
        }

        .timeline-content {
            flex: 1;
        }

        .timeline-title {
            font-weight: 600;
            margin-bottom: 0.25rem;
        }

        .timeline-text {
            color: var(--secondary-color);
        }

        .database-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
        }

        .database-item {
            background: white;
            padding: 1rem;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }

        .database-label {
            color: var(--secondary-color);
            font-size: 0.875rem;
            margin-bottom: 0.5rem;
        }

        .database-value {
            font-size: 1.125rem;
            font-weight: 600;
            color: var(--text-color);
        }

        .actions {
            background: var(--light-bg);
            padding: 1.5rem;
            border-top: 1px solid var(--border-color);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .btn-back {
            background-color: var(--primary-color);
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 6px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            transition: all 0.3s ease;
            border: none;
        }

        .btn-back:hover {
            background-color: var(--primary-dark);
            color: white;
            transform: translateY(-1px);
        }

        .btn-back i {
            margin-right: 0.5rem;
        }

        @media (max-width: 768px) {
            .page-container {
                margin: 1rem auto;
            }

            .card-content {
                padding: 1rem;
            }

            .info-grid {
                grid-template-columns: 1fr;
            }

            .database-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="page-container">
        <!-- Success Message -->
        <div class="success-alert">
            <i class="fas fa-check-circle"></i>
            <span>Data konsumsi energi berhasil disimpan</span>
        </div>

        <!-- Main Card -->
        <div class="main-card">
            <div class="card-header">
                <i class="fas fa-chart-line me-2"></i>
                Hasil Konsumsi Energi
            </div>

            <div class="card-content">
                <!-- Energy Source Section -->
                <div class="info-section">
                    <div class="info-section-header">
                        <i class="fas fa-plug"></i>
                        Sumber Energi
                    </div>
                    <div class="info-grid">
                        <div class="info-item">
                            <span class="info-label">Jenis:</span>
                            <span class="info-value">{{ $result['source_type'] }}</span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Jumlah:</span>
                            <span class="info-value">{{ $result['consumption_amount'] }} {{ $result['unit_measurement'] }}</span>
                        </div>
                    </div>
                </div>

                <!-- Activity Information -->
                <div class="info-section">
                    <div class="info-section-header">
                        <i class="fas fa-building"></i>
                        Informasi Aktivitas
                    </div>
                    <div class="info-grid">
                        <div class="info-item">
                            <span class="info-label">Jenis:</span>
                            <span class="info-value">{{ $result['activity_type'] }}</span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Lokasi:</span>
                            <span class="info-value">{{ $result['location_name'] ?? 'Tidak ditentukan' }}</span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Departemen:</span>
                            <span class="info-value">{{ $result['department'] ?? 'Tidak ditentukan' }}</span>
                        </div>
                    </div>
                </div>

                <!-- Timeline Information -->
                <div class="info-section">
                    <div class="info-section-header">
                        <i class="fas fa-calendar"></i>
                        Informasi Waktu
                    </div>
                    <div class="timeline">
                        <div class="timeline-item">
                            <div class="timeline-icon">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div class="timeline-content">
                                <div class="timeline-title">Tanggal Konsumsi</div>
                                <div class="timeline-text">{{ $result['consumption_date'] }}</div>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-icon">
                                <i class="fas fa-calendar-alt"></i>
                            </div>
                            <div class="timeline-content">
                                <div class="timeline-title">Periode Pelaporan</div>
                                <div class="timeline-text">{{ $result['reporting_period'] }}</div>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-icon">
                                <i class="fas fa-save"></i>
                            </div>
                            <div class="timeline-content">
                                <div class="timeline-title">Tanggal Pencatatan</div>
                                <div class="timeline-text">{{ $result['calculation_date'] }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Database Information -->
                <div class="info-section">
                    <div class="info-section-header">
                        <i class="fas fa-database"></i>
                        Informasi Data
                    </div>
                    <div class="database-grid">
                        <div class="database-item">
                            <div class="database-label">ID Record</div>
                            <div class="database-value">#{{ $consumption->id }}</div>
                        </div>
                        <div class="database-item">
                            <div class="database-label">Dibuat Pada</div>
                            <div class="database-value">{{ $consumption->created_at->format('d M Y') }}</div>
                        </div>
                        <div class="database-item">
                            <div class="database-label">Diperbarui Pada</div>
                            <div class="database-value">{{ $consumption->updated_at->format('d M Y') }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="actions">
                <a href="{{ url('/company') }}" class="btn-back">
                    <i class="fas fa-arrow-left"></i>
                    Back ke Form
                </a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 