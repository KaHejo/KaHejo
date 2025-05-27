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
                'category' => 'Listrik',
                'value' => 0.5,
                'unit' => 'kgCO2e/kWh',
                'description' => 'Faktor emisi untuk penggunaan listrik PLN',
                'source' => 'Kementerian ESDM 2024',
            ],
            [
                'name' => 'Bensin',
                'category' => 'Bensin',
                'value' => 0.2,
                'unit' => 'kgCO2e/liter',
                'description' => 'Faktor emisi untuk penggunaan bensin pada kendaraan',
                'source' => 'IPCC Guidelines 2023',
            ],
            [
                'name' => 'Sampah',
                'category' => 'Limbah',
                'value' => 2.5,
                'unit' => 'kgCO2e/Kg',
                'description' => 'Faktor emisi untuk pemebuangan sampah',
                'source' => 'IPCC Guidelines 2023',
            ],
            [
                'name' => 'Water',
                'category' => 'Air',
                'value' => 0.3,
                'unit' => 'kgCO2e/liter',
                'description' => 'Faktor emisi untuk penggunaan air dalam sehari',
                'source' => 'IPCC Guidelines 2023',
            ],
        ];

        foreach ($factors as $factor) {
            EmissionFactor::create($factor);
        }
    }
}