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
    <!-- jsPDF Library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
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
        /* Add styles for PDF generation */
        .pdf-preview {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            z-index: 1000;
            justify-content: center;
            align-items: center;
        }
        .pdf-preview-content {
            background: white;
            padding: 2rem;
            border-radius: 1rem;
            max-width: 90%;
            max-height: 90%;
            overflow: auto;
        }
        .pdf-preview-close {
            position: absolute;
            top: 1rem;
            right: 1rem;
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .pdf-preview-close:hover {
            transform: scale(1.1);
        }
        .pdf-loading {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.9);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 1001;
        }
        .pdf-loading-content {
            text-align: center;
        }
        .pdf-loading-spinner {
            border: 4px solid #f3f3f3;
            border-top: 4px solid #10B981;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
            margin: 0 auto 1rem;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
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
                    <i class="fas fa-check-circle"></i>

                    <span class="text-sm font-medium">Data konsumsi energi berhasil disimpan</span>
                </div>
            </div>
            <!-- Achievement Alert -->
            @if(session('achievement'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('achievement') }}
                </div>
            @endif

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
                                        <p class="text-xs font-medium text-gray-500">Dibuat Oleh</p>
                                        <p class="text-sm font-semibold text-gray-900">{{ $result['user_name'] }}</p>
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
                    <div class="flex space-x-3">
                        <button onclick="window.print()" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-all duration-300 transform hover:-translate-y-1">
                            <i class="fas fa-print mr-2"></i>
                            Cetak Laporan
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- PDF Preview Modal -->
    <div id="pdfPreview" class="pdf-preview">
        <div class="pdf-preview-content">
            <iframe id="pdfViewer" width="100%" height="600px" frameborder="0"></iframe>
        </div>
        <div class="pdf-preview-close" onclick="closePDFPreview()">
            <i class="fas fa-times"></i>
        </div>
    </div>

    <!-- PDF Loading Indicator -->
    <div id="pdfLoading" class="pdf-loading">
        <div class="pdf-loading-content">
            <div class="pdf-loading-spinner"></div>
            <p class="text-gray-700 font-medium">Membuat PDF...</p>
        </div>
    </div>

    <script>
        // Initialize AOS
        AOS.init({
            duration: 800,
            once: true
        });

        // Initialize Chart
        

        // PDF Generation Function
        async function generatePDF() {
            const loading = document.getElementById('pdfLoading');
            loading.style.display = 'flex';
            
            try {
                const { jsPDF } = window.jspdf;
                const doc = new jsPDF('p', 'mm', 'a4');
                const element = document.querySelector('.card-hover');
                
                // Create a clone of the element for PDF generation
                const clone = element.cloneNode(true);
                clone.style.width = '210mm'; // A4 width
                clone.style.padding = '20mm';
                document.body.appendChild(clone);
                
                // Convert the element to canvas
                const canvas = await html2canvas(clone, {
                    scale: 2,
                    useCORS: true,
                    logging: false,
                    backgroundColor: '#ffffff'
                });
                
                // Remove the clone
                document.body.removeChild(clone);
                
                // Add the image to PDF
                const imgData = canvas.toDataURL('image/png');
                const pdfWidth = doc.internal.pageSize.getWidth();
                const pdfHeight = (canvas.height * pdfWidth) / canvas.width;
                
                doc.addImage(imgData, 'PNG', 0, 0, pdfWidth, pdfHeight);
                
                // Add header
                doc.setFontSize(20);
                doc.setTextColor(16, 185, 129);
                doc.text('Laporan Konsumsi Energi', pdfWidth/2, 15, { align: 'center' });
                
                // Add footer
                const pageCount = doc.internal.getNumberOfPages();
                for(let i = 1; i <= pageCount; i++) {
                    doc.setPage(i);
                    doc.setFontSize(10);
                    doc.setTextColor(100);
                    doc.text(
                        `Halaman ${i} dari ${pageCount}`,
                        pdfWidth/2,
                        doc.internal.pageSize.getHeight() - 10,
                        { align: 'center' }
                    );
                }
                
                // Save the PDF
                const fileName = `Laporan_Konsumsi_Energi_${new Date().toISOString().split('T')[0]}.pdf`;
                doc.save(fileName);
                
                // Show success message
                const successBadge = document.createElement('div');
                successBadge.className = 'success-badge fixed bottom-4 right-4';
                successBadge.innerHTML = `
                    <i class="fas fa-check-circle text-xl"></i>
                    <span class="text-sm font-medium">PDF berhasil diunduh</span>
                `;
                document.body.appendChild(successBadge);
                setTimeout(() => successBadge.remove(), 3000);
                
            } catch (error) {
                console.error('Error generating PDF:', error);
                alert('Terjadi kesalahan saat membuat PDF. Silakan coba lagi.');
            } finally {
                loading.style.display = 'none';
            }
        }

        function closePDFPreview() {
            document.getElementById('pdfPreview').style.display = 'none';
        }

        // Enhanced print styles
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
                @page {
                    size: A4;
                    margin: 20mm;
                }
            }
        `;
        document.head.appendChild(style);
    </script>
</body>
</html>