<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Model\User;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([EmissionFactorSeeder::class]);

        $this->call([AdminSeeder::class]);
    }
}