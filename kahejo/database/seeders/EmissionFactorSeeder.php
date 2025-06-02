<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EmissionFactor;

class EmissionFactorSeeder extends Seeder
{
    public function run()
    {
        $factors = [
            [
                'name' => 'Listrik PLN',
                'category' => 'Energi',
                'value' => 0.870,
                'unit' => 'kgCO2e/kWh',
                'description' => 'Faktor emisi untuk penggunaan listrik PLN',
                'source' => 'Kementerian ESDM 2024',
            ],
            [
                'name' => 'Bensin',
                'category' => 'Transportasi',
                'value' => 2.3307,
                'unit' => 'kgCO2e/liter',
                'description' => 'Faktor emisi untuk penggunaan bensin pada kendaraan',
                'source' => 'IPCC Guidelines 2023',
            ],
            [
                'name' => 'Diesel',
                'category' => 'Transportasi',
                'value' => 2.6413,
                'unit' => 'kgCO2e/liter',
                'description' => 'Faktor emisi untuk penggunaan solar pada kendaraan',
                'source' => 'IPCC Guidelines 2023',
            ],
        ];

        foreach ($factors as $factor) {
            EmissionFactor::create($factor);
        }
    }
}