<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
<<<<<<< HEAD
        Admin::create([
            'name' => 'Admin',
            'email' => 'admin@kahejo.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin'
        ]);
    }
}
=======
        // Contoh data admin
        DB::table('admins')->insert([
            [
                'name' => 'Admin Kahejo',
                'email' => 'adminkahejo@gmail.com',
                'email_verified_at' => null,
                'password' => Hash::make('password123'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
>>>>>>> origin/backupkevin_branch
