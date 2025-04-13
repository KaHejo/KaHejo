<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('carbon_emissions', function (Blueprint $table) {
            $table->id();
            $table->string('source_type'); // listrik, bahan bakar, gas, dll
            $table->decimal('consumption_amount'); // jumlah konsumsi
            $table->string('unit'); // kWh, liter, m3, dll
            $table->decimal('emission_factor'); // faktor emisi per unit
            $table->decimal('total_emission'); // total emisi CO2e
            $table->string('emission_type'); // langsung/tidak langsung
            $table->date('emission_date');
            $table->string('location'); // lokasi/departemen
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('carbon_emissions');
    }
};