<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            EmissionFactorSeeder::class,
            ArticleSeeder::class,
        ]);

        $this->call([
            AdminSeeder::class,
        ]);

        $this->call([
        FaqSeeder::class,
        ]);

    }
}