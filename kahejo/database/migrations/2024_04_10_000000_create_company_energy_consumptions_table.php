<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('company_energy_consumptions', function (Blueprint $table) {
            $table->id();
            $table->string('source_type'); // Jenis sumber energi (bensin, solar, gas, dll)
            $table->float('consumption_amount'); // Jumlah konsumsi
            $table->string('unit_measurement'); // Satuan pengukuran (liter, kg, kWh)
            $table->string('activity_type'); // Jenis aktivitas (transportasi, produksi, dll)
            $table->string('location_name')->nullable(); // Nama fasilitas/lokasi
            $table->date('consumption_date'); // Tanggal konsumsi
            $table->string('reporting_period'); // Periode pelaporan (bulanan/tahunan)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_energy_consumptions');
    }
}; 