<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('faqs')->insert([
            [
                'question' => 'Apa itu jejak karbon (carbon footprint)?',
                'answer' => 'Jejak karbon adalah total emisi gas rumah kaca yang dihasilkan oleh aktivitas individu, organisasi, atau produk.',
                'order' => 1,
                'is_published' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'question' => 'Mengapa kita perlu menghitung jejak karbon?',
                'answer' => 'Dengan menghitung jejak karbon, kita dapat mengetahui seberapa besar dampak aktivitas kita terhadap lingkungan dan mengambil langkah untuk menguranginya.',
                'order' => 2,
                'is_published' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'question' => 'Bagaimana cara mengurangi jejak karbon saya?',
                'answer' => 'Beberapa cara termasuk mengurangi penggunaan energi, menggunakan transportasi umum, dan memilih produk ramah lingkungan.',
                'order' => 3,
                'is_published' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
