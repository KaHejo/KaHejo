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
        // Data admin (updateOrInsert agar aman dijalankan berulang kali tanpa duplikasi)
        DB::table('admins')->updateOrInsert(
            ['email' => 'adminkahejo@gmail.com'],
            [
                'name' => 'Admin',
                'email_verified_at' => null,
                'password' => Hash::make('admin123'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
