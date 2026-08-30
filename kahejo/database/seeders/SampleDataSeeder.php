<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CarbonFootprint;
use App\Models\CompanyEnergyConsumption;
use App\Models\User;
use Carbon\Carbon;

class SampleDataSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();
        if (!$user) {
            $this->command->error("User not found!");
            return;
        }

        $userId = $user->id;

        // 1. Bersihkan data lama user ini agar fresh
        CarbonFootprint::where('user_id', $userId)->delete();
        CompanyEnergyConsumption::where('user_id', $userId)->delete();

        // 2. Masukkan 10 Data Kalkulator Karbon (Tren Positif Dekarbonisasi)
        $carbonData = [
            [
                'month' => '2025-11-01',
                'electricity' => 210.0,
                'transportation' => 210.0,
                'waste' => 137.5,
                'water' => 7.5,
                'total' => 565.0,
                'created_at' => Carbon::parse('2025-11-28 14:30:00'),
            ],
            [
                'month' => '2025-12-01',
                'electricity' => 225.0,
                'transportation' => 252.0,
                'waste' => 150.0,
                'water' => 8.4,
                'total' => 635.4,
                'created_at' => Carbon::parse('2025-12-29 16:45:00'),
            ],
            [
                'month' => '2026-01-01',
                'electricity' => 190.0,
                'transportation' => 180.0,
                'waste' => 120.0,
                'water' => 6.6,
                'total' => 496.6,
                'created_at' => Carbon::parse('2026-01-27 10:15:00'),
            ],
            [
                'month' => '2026-02-01',
                'electricity' => 175.0,
                'transportation' => 168.0,
                'waste' => 105.0,
                'water' => 6.0,
                'total' => 454.0,
                'created_at' => Carbon::parse('2026-02-26 11:20:00'),
            ],
            [
                'month' => '2026-03-01',
                'electricity' => 160.0,
                'transportation' => 150.0,
                'waste' => 95.0,
                'water' => 5.7,
                'total' => 410.7,
                'created_at' => Carbon::parse('2026-03-28 09:40:00'),
            ],
            [
                'month' => '2026-04-01',
                'electricity' => 150.0,
                'transportation' => 132.0,
                'waste' => 87.5,
                'water' => 5.4,
                'total' => 374.9,
                'created_at' => Carbon::parse('2026-04-29 13:50:00'),
            ],
            [
                'month' => '2026-05-01',
                'electricity' => 140.0,
                'transportation' => 120.0,
                'waste' => 80.0,
                'water' => 5.1,
                'total' => 345.1,
                'created_at' => Carbon::parse('2026-05-27 15:10:00'),
            ],
            [
                'month' => '2026-06-01',
                'electricity' => 130.0,
                'transportation' => 108.0,
                'waste' => 70.0,
                'water' => 4.8,
                'total' => 312.8,
                'created_at' => Carbon::parse('2026-06-28 08:35:00'),
            ],
            [
                'month' => '2026-07-01',
                'electricity' => 120.0,
                'transportation' => 96.0,
                'waste' => 62.5,
                'water' => 4.5,
                'total' => 283.0,
                'created_at' => Carbon::parse('2026-07-30 17:00:00'),
            ],
            [
                'month' => '2026-08-01',
                'electricity' => 110.0,
                'transportation' => 90.0,
                'waste' => 55.0,
                'water' => 4.2,
                'total' => 259.2,
                'created_at' => Carbon::parse('2026-08-28 11:00:00'),
            ],
        ];

        foreach ($carbonData as $item) {
            CarbonFootprint::create([
                'user_id' => $userId,
                'month' => $item['month'],
                'electricity' => $item['electricity'],
                'transportation' => $item['transportation'],
                'waste' => $item['waste'],
                'water' => $item['water'],
                'total' => $item['total'],
                'created_at' => $item['created_at'],
                'updated_at' => $item['created_at'],
            ]);
        }

        // 3. Masukkan 10 Data Konsumsi Energi (Beragam Sumber & Lokasi)
        $energyData = [
            [
                'source_type' => 'electricity',
                'consumption_amount' => 850.0,
                'unit_measurement' => 'kWh',
                'activity_type' => 'office',
                'location_name' => 'Gedung Pusat Bandung',
                'consumption_date' => '2025-11-15',
                'reporting_period' => 'monthly',
                'created_at' => Carbon::parse('2025-11-15 10:00:00'),
            ],
            [
                'source_type' => 'diesel',
                'consumption_amount' => 320.0,
                'unit_measurement' => 'liter',
                'activity_type' => 'logistics',
                'location_name' => 'Gudang Logistik Cimahi',
                'consumption_date' => '2025-12-10',
                'reporting_period' => 'monthly',
                'created_at' => Carbon::parse('2025-12-10 14:30:00'),
            ],
            [
                'source_type' => 'gasoline',
                'consumption_amount' => 210.0,
                'unit_measurement' => 'liter',
                'activity_type' => 'transportation',
                'location_name' => 'Armada Distribusi Bandung Barat',
                'consumption_date' => '2026-01-20',
                'reporting_period' => 'monthly',
                'created_at' => Carbon::parse('2026-01-20 09:15:00'),
            ],
            [
                'source_type' => 'electricity',
                'consumption_amount' => 780.0,
                'unit_measurement' => 'kWh',
                'activity_type' => 'production',
                'location_name' => 'Pabrik Perakitan Padalarang',
                'consumption_date' => '2026-02-14',
                'reporting_period' => 'monthly',
                'created_at' => Carbon::parse('2026-02-14 11:45:00'),
            ],
            [
                'source_type' => 'gas',
                'consumption_amount' => 145.0,
                'unit_measurement' => 'm3',
                'activity_type' => 'production',
                'location_name' => 'Fasilitas Termal Rancaekek',
                'consumption_date' => '2026-03-18',
                'reporting_period' => 'monthly',
                'created_at' => Carbon::parse('2026-03-18 16:20:00'),
            ],
            [
                'source_type' => 'gasoline',
                'consumption_amount' => 175.0,
                'unit_measurement' => 'liter',
                'activity_type' => 'transportation',
                'location_name' => 'Depot Operasional Pasteur',
                'consumption_date' => '2026-04-22',
                'reporting_period' => 'monthly',
                'created_at' => Carbon::parse('2026-04-22 13:00:00'),
            ],
            [
                'source_type' => 'lpg',
                'consumption_amount' => 95.0,
                'unit_measurement' => 'kg',
                'activity_type' => 'facility',
                'location_name' => 'Kantin & Mess Karyawan',
                'consumption_date' => '2026-05-16',
                'reporting_period' => 'monthly',
                'created_at' => Carbon::parse('2026-05-16 10:30:00'),
            ],
            [
                'source_type' => 'electricity',
                'consumption_amount' => 690.0,
                'unit_measurement' => 'kWh',
                'activity_type' => 'office',
                'location_name' => 'Gedung Pusat Bandung',
                'consumption_date' => '2026-06-25',
                'reporting_period' => 'monthly',
                'created_at' => Carbon::parse('2026-06-25 15:00:00'),
            ],
            [
                'source_type' => 'diesel',
                'consumption_amount' => 260.0,
                'unit_measurement' => 'liter',
                'activity_type' => 'logistics',
                'location_name' => 'Pusat Ekspedisi Soekarno Hatta',
                'consumption_date' => '2026-07-28',
                'reporting_period' => 'monthly',
                'created_at' => Carbon::parse('2026-07-28 14:10:00'),
            ],
            [
                'source_type' => 'gasoline',
                'consumption_amount' => 129.0, // Mempertahankan angka inputan Anda 129 Liter
                'unit_measurement' => 'liter',
                'activity_type' => 'production',
                'location_name' => 'Sentra Produksi Bandung',
                'consumption_date' => '2026-08-15',
                'reporting_period' => 'monthly',
                'created_at' => Carbon::parse('2026-08-15 11:30:00'),
            ],
        ];

        foreach ($energyData as $item) {
            CompanyEnergyConsumption::create([
                'user_id' => $userId,
                'source_type' => $item['source_type'],
                'consumption_amount' => $item['consumption_amount'],
                'unit_measurement' => $item['unit_measurement'],
                'activity_type' => $item['activity_type'],
                'location_name' => $item['location_name'],
                'consumption_date' => $item['consumption_date'],
                'reporting_period' => $item['reporting_period'],
                'created_at' => $item['created_at'],
                'updated_at' => $item['created_at'],
            ]);
        }
    }
}
