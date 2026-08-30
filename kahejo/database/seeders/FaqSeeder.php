<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Faq;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('faqs')->truncate();

        DB::table('faqs')->insert([
            [
                'question' => 'Apa itu jejak karbon (carbon footprint) dan gas rumah kaca (GRK)?',
                'answer' => 'Jejak karbon adalah total akumulasi emisi gas rumah kaca (terutama Karbon Dioksida / CO₂, Metana / CH₄, dan Nitrogen Oksida / N₂O) yang dihasilkan baik secara langsung maupun tidak langsung oleh aktivitas manusia, organisasi, atau proses produksi. Satuan standar internasional yang digunakan adalah kilogram atau ton CO₂ ekuivalen (kg CO₂e / ton CO₂e).',
                'order' => 1,
                'is_published' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'question' => 'Bagaimana cara kerja platform KaHejo dalam menghitung emisi?',
                'answer' => 'KaHejo mengalikan jumlah data aktivitas yang Anda masukkan (seperti kWh listrik, liter bensin/solar, m³ gas alam, dan kg sampah) dengan Faktor Emisi Resmi yang ditetapkan oleh Kementerian ESDM Republik Indonesia dan pedoman IPCC (Intergovernmental Panel on Climate Change) GHG Protocol. Rumus dasar: Emisi (kg CO₂e) = Data Aktivitas × Faktor Emisi.',
                'order' => 2,
                'is_published' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'question' => 'Apa perbedaan antara emisi Scope 1, Scope 2, dan Scope 3?',
                'answer' => 'Menurut GHG Protocol:
• Scope 1 (Emisi Langsung): Emisi dari sumber yang dimiliki atau dikendalikan langsung oleh fasilitas Anda, seperti pembakaran bensin atau solar pada kendaraan armada dan genset.
• Scope 2 (Emisi Tidak Langsung dari Energi): Emisi dari konsumsi listrik PLN yang dibeli dari jaringan ketenagalistrikan.
• Scope 3 (Emisi Tidak Langsung Lainnya): Emisi rantai pasok, perjalanan dinas, mobilitas harian, pengolahan air bersih, dan timbulan sampah domestik.',
                'order' => 3,
                'is_published' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'question' => 'Berapa faktor emisi yang digunakan untuk masing-masing sumber energi?',
                'answer' => 'KaHejo menggunakan faktor emisi rujukan nasional ESDM dan IPCC:
• Listrik PLN (Grid Jamali): 0,85 kg CO₂e / kWh
• Bahan Bakar Bensin (Gasoline): 2,31 kg CO₂e / Liter
• Bahan Bakar Solar (Diesel): 2,68 kg CO₂e / Liter
• Gas Alam (Natural Gas): 1,90 kg CO₂e / m³
• LPG (Liquefied Petroleum Gas): 2,98 kg CO₂e / kg',
                'order' => 4,
                'is_published' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'question' => 'Mengapa input konsumsi energi juga dikonversi ke kWh eq dan MegaJoule (MJ)?',
                'answer' => 'Setiap jenis bahan bakar memiliki wujud dan satuan yang berbeda (liter, meter kubik, atau kilogram). Untuk membandingkan dan menjumlahkan seluruh energi secara adil pada grafik dashboard, KaHejo mengonversinya ke satuan energi primer internasional (MegaJoule / MJ) dan energi listrik ekivalen (kWh eq) berdasarkan nilai kalor spesifik masing-masing bahan bakar (1 Liter Bensin ≈ 9,5 kWh eq, 1 Liter Solar ≈ 10,7 kWh eq).',
                'order' => 5,
                'is_published' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'question' => 'Bagaimana cara mencetak bukti resmi atau laporan verifikasi emisi?',
                'answer' => 'Setelah Anda mengisi formulir konsumsi energi atau kalkulator karbon, sistem akan menampilkan ringkasan hasil. Klik tombol "Cetak PDF Laporan" atau gunakan kombinasi Ctrl+P. Sistem telah dilengkapi tata letak formal A4 resmi lengkap dengan Kop Surat KaHejo, Nomor Dokumen Unik (contoh: KHJ-ENG-XXXXXX), dan Stempel Digital Verifikasi.',
                'order' => 6,
                'is_published' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'question' => 'Bagaimana cara memperoleh poin dan menukarkan rewards di KaHejo?',
                'answer' => 'Setiap kali Anda mencatat aktivitas ramah lingkungan, menghitung jejak karbon, dan menyelesaikan pencapaian (Achievements), Anda akan memperoleh Green Points. Poin ini dapat ditukarkan di halaman "Prestasi & Rewards" dengan berbagai voucher mitra hijau, merchandise ramah lingkungan, atau sertifikat penanaman pohon.',
                'order' => 7,
                'is_published' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'question' => 'Bagaimana cara menyeimbangkan (carbon offset) emisi yang sudah terlanjur dihasilkan?',
                'answer' => 'Emisi yang tidak dapat dihindari dapat diseimbangkan melalui aksi serapan karbon (Carbon Offset), seperti penanaman pohon mangrove atau pohon hutan tropis. Rata-rata 1 pohon dewasa menyerap sekitar 21,77 kg CO₂ per tahun. Sistem KaHejo secara otomatis menghitung berapa jumlah pohon penyeimbang yang Anda butuhkan setiap kali melakukan perhitungan emisi.',
                'order' => 8,
                'is_published' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
