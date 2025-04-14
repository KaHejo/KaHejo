<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Konsumsi Energi Perusahaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #2ecc71;
            --primary-light: #e8f8f1;
            --text-color: #2c3e50;
            --border-color: #edf2f7;
            --background: #f8fafc;
            --card-shadow: 0 2px 4px rgba(0,0,0,0.04);
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: var(--background);
            color: var(--text-color);
            line-height: 1.5;
        }

        .page-container {
            max-width: 800px;
            margin: 1rem auto;
            padding: 0 1rem;
        }

        .success-alert {
            padding: 0.5rem 1rem;
            margin-bottom: 1rem;
        }

        .success-alert i {
            font-size: 1rem;
            margin-right: 0.5rem;
        }

        .main-card {
            background: white;
            border-radius: 12px;
            box-shadow: var(--card-shadow);
        }

        .card-header {
            padding: 0.75rem 1rem;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .card-header i {
            color: var(--primary-color);
            font-size: 1.25rem;
        }

        .card-header-text {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--text-color);
        }

        .card-content {
            padding: 1rem;
        }

        .info-section {
            margin-bottom: 1rem;
        }

        .info-section:last-child {
            margin-bottom: 0;
        }

        .info-section-header {
            margin-bottom: 0.5rem;
            padding-bottom: 0.25rem;
        }

        .info-section-header i {
            font-size: 1rem;
            margin-right: 0.5rem;
        }

        .info-section-title {
            font-size: 1rem;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 0.5rem;
        }

        .info-item {
            padding: 0.5rem;
            background: var(--background);
            border-radius: 6px;
        }

        .info-label {
            font-size: 0.8rem;
            margin-bottom: 0.125rem;
        }

        .info-value {
            font-size: 0.9rem;
        }

        .timeline {
            display: grid;
            gap: 0.5rem;
        }

        .timeline-item {
            display: flex;
            align-items: center;
            padding: 0.5rem;
            background: var(--background);
            border-radius: 6px;
        }

        .timeline-icon {
            width: 28px;
            height: 28px;
            background: white;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 0.75rem;
        }

        .timeline-icon i {
            color: var(--primary-color);
            font-size: 0.875rem;
        }

        .timeline-content {
            flex: 1;
        }

        .timeline-title {
            font-size: 0.8rem;
            color: #64748b;
            margin-bottom: 0.125rem;
        }

        .timeline-text {
            font-size: 0.9rem;
            font-weight: 500;
            color: var(--text-color);
        }

        .database-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 0.5rem;
        }

        .database-item {
            padding: 0.5rem;
            background: var(--background);
            border-radius: 6px;
        }

        .database-label {
            font-size: 0.8rem;
            margin-bottom: 0.125rem;
        }

        .database-value {
            font-size: 0.9rem;
            font-weight: 500;
            color: var(--text-color);
        }

        .actions {
            padding: 0.75rem 1rem;
            border-top: 1px solid var(--border-color);
            display: flex;
            justify-content: flex-start;
        }

        .btn-back {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            background: var(--primary-color);
            color: white;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 500;
            transition: background-color 0.2s;
            font-size: 0.9rem;
        }

        .btn-back:hover {
            background: #27ae60;
            color: white;
        }

        @media (max-width: 640px) {
            .page-container {
                margin: 1rem auto;
            }

            .info-grid, .database-grid {
                grid-template-columns: 1fr;
            }

            .card-header {
                padding: 1rem;
            }

            .card-content {
                padding: 1rem;
            }

            .actions {
                padding: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="page-container">
        <div class="success-alert">
            <i class="fas fa-check-circle"></i>
            <span>Data konsumsi energi berhasil disimpan</span>
        </div>

        <div class="main-card">
            <div class="card-header">
                <i class="fas fa-chart-line"></i>
                <span class="card-header-text">Hasil Konsumsi Energi</span>
            </div>

            <div class="card-content">
                <div class="info-section">
                    <div class="info-section-header">
                        <i class="fas fa-plug"></i>
                        <span class="info-section-title">Sumber Energi</span>
                    </div>
                    <div class="info-grid">
                        <div class="info-item">
                            <div class="info-label">Jenis</div>
                            <div class="info-value">{{ $result['source_type'] }}</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Jumlah</div>
                            <div class="info-value">{{ $result['consumption_amount'] }} {{ $result['unit_measurement'] }}</div>
                        </div>
                    </div>
                </div>

                <div class="info-section">
                    <div class="info-section-header">
                        <i class="fas fa-building"></i>
                        <span class="info-section-title">Informasi Aktivitas</span>
                    </div>
                    <div class="info-grid">
                        <div class="info-item">
                            <div class="info-label">Jenis</div>
                            <div class="info-value">{{ $result['activity_type'] }}</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Lokasi</div>
                            <div class="info-value">{{ $result['location_name'] ?? 'Tidak ditentukan' }}</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Departemen</div>
                            <div class="info-value">{{ $result['department'] ?? 'Tidak ditentukan' }}</div>
                        </div>
                    </div>
                </div>

                <div class="info-section">
                    <div class="info-section-header">
                        <i class="fas fa-calendar"></i>
                        <span class="info-section-title">Informasi Waktu</span>
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

                <div class="info-section">
                    <div class="info-section-header">
                        <i class="fas fa-database"></i>
                        <span class="info-section-title">Informasi Data</span>
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

            <div class="actions">
                <a href="{{ url('/company') }}" class="btn-back">
                    <i class="fas fa-arrow-left"></i>
                    <span>Back ke Form</span>
                </a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 