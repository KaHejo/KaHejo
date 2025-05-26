<?php

namespace App\Services;

class CarbonFootprintService
{
    // Emisi rata-rata per satuan (dalam kg CO2)
    private $electricityFactor = 0.85; // per kWh
    private $fuelFactor = 2.31; // per liter bensin
    private $wasteFactor = 1.9; // per kg sampah

    public function calculateFootprint($electricity_kwh, $fuel_liters, $waste_kg)
    {
        $electricityEmission = $electricity_kwh * $this->electricityFactor;
        $fuelEmission = $fuel_liters * $this->fuelFactor;
        $wasteEmission = $waste_kg * $this->wasteFactor;

        return round($electricityEmission + $fuelEmission + $wasteEmission, 2);
    }
}
