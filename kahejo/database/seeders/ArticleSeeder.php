<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Article::truncate(); // Bersihkan data lama sebelum seeding baru

        // Artikel 1
        Article::create([
            'title' => 'Memahami Perubahan Iklim & Krisis Pemanasan Global',
            'slug' => Str::slug('Memahami Perubahan Iklim & Krisis Pemanasan Global'),
            'image_path' => 'https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?ixlib=rb-1.2.1&auto=format&fit=crop&w=1200&q=80',
            'reading_time' => 7,
            'published_at' => now()->subDays(2),
            'content' => '
                <h2>Apa Itu Perubahan Iklim?</h2>
                <p>Perubahan iklim merujuk pada perubahan jangka panjang dalam suhu rata-rata dan pola cuaca di seluruh dunia. Walaupun pergeseran cuaca dapat terjadi secara alami melalui siklus matahari, aktivitas manusia sejak Revolusi Industri abad ke-19 telah menjadi penggerak utama pemanasan global akibat pembakaran bahan bakar fosil seperti batu bara, minyak bumi, dan gas alam.</p>
                
                <h2>Penyebab Utama Peningkatan Gas Rumah Kaca (GRK)</h2>
                <p>Aktivitas harian masyarakat dan industri melepaskan gas rumah kaca yang memerangkap panas matahari di atmosfer bumi (efek rumah kaca), di antaranya:</p>
                <ul>
                    <li>Pembangkit listrik dan industri berbahan bakar fosil yang melepaskan Karbon Dioksida (CO₂).</li>
                    <li>Sektor transportasi berbasis bensin dan solar yang menyumbang polusi emisi bergerak.</li>
                    <li>Deforestasi dan alih fungsi lahan hutan yang mengurangi kapasitas penyerap karbon alami bumi.</li>
                    <li>Timbulan sampah organik di tempat pembuangan akhir (TPA) yang menghasilkan gas Metana (CH₄).</li>
                </ul>

                <h2>Dampak Nyata yang Dirasakan di Indonesia</h2>
                <p>Sebagai negara kepulauan tropis, Indonesia sangat rentan terhadap dampak perubahan iklim:</p>
                <ul>
                    <li>Kenaikan permukaan air laut yang mengancam wilayah pesisir dan pulau-pulau kecil.</li>
                    <li>Pola musim hujan dan kemarau yang semakin tidak menentu, mempengaruhi ketahanan pangan petani.</li>
                    <li>Peningkatan frekuensi cuaca ekstrem seperti gelombang panas, banjir bandang, dan kekeringan panjang.</li>
                    <li>Kerusakan ekosistem terumbu karang akibat pemanasan suhu permukaan air laut (*coral bleaching*).</li>
                </ul>

                <h2>Aksi Nyata yang Dapat Kita Lakukan</h2>
                <p>Langkah mitigasi perubahan iklim dimulai dari kesadaran individu dan komunitas:</p>
                <ul>
                    <li>Menghitung dan memantau jejak karbon pribadi secara berkala menggunakan platform KaHejo.</li>
                    <li>Menghemat konsumsi energi listrik di rumah dan fasilitas kerja harian.</li>
                    <li>Beralih ke transportasi umum, berjalan kaki, atau bersepeda untuk perjalanan jarak dekat.</li>
                    <li>Mendukung program reboisasi dan penanaman pohon untuk menyeimbangkan sisa emisi karbon.</li>
                </ul>
            ',
            'description' => 'Panduan komprehensif memahami penyebab efek rumah kaca, dampak pemanasan global di Indonesia, serta urgensi aksi dekarbonisasi bersama.'
        ]);

        // Artikel 2
        Article::create([
            'title' => 'Panduan Gaya Hidup Berkelanjutan (Sustainable Living) Sehari-hari',
            'slug' => Str::slug('Panduan Gaya Hidup Berkelanjutan Sustainable Living Sehari-hari'),
            'image_path' => 'https://images.unsplash.com/photo-1472214103451-9374bd1c798e?ixlib=rb-1.2.1&auto=format&fit=crop&w=1200&q=80',
            'reading_time' => 6,
            'published_at' => now()->subDays(5),
            'content' => '
                <h2>Mengenal Konsep Gaya Hidup Berkelanjutan</h2>
                <p>Gaya hidup berkelanjutan (*sustainable living*) adalah filosofi hidup di mana kita berusaha meminimalkan penggunaan sumber daya bumi dan jejak lingkungan pribadi, sehingga generasi masa depan tetap dapat menikmati kelestarian alam yang sama.</p>

                <h2>Prinsip Sirkularitas 5R dalam Pengelolaan Sampah</h2>
                <p>Mengurangi timbulan sampah rumah tangga dapat dilakukan dengan menerapkan prinsip 5R secara konsisten:</p>
                <ul>
                    <li><strong>Refuse (Tolak):</strong> Menolak kantong plastik sekali pakai, sedotan plastik, dan kemasan berlebih.</li>
                    <li><strong>Reduce (Kurangi):</strong> Membeli barang sesuai kebutuhan nyata dan menghindari perilaku konsumtif.</li>
                    <li><strong>Reuse (Gunakan Kembali):</strong> Memanfaatkan wadah atau botol minum berulang kali (*tumbler*).</li>
                    <li><strong>Repurpose (Alih Fungsi):</strong> Mengubah fungsi barang bekas menjadi produk yang bermanfaat.</li>
                    <li><strong>Recycle (Daur Ulang):</strong> Memilah sampah anorganik agar dapat diolah kembali oleh industri daur ulang.</li>
                </ul>

                <h2>Langkah Efisiensi Energi di Tempat Tinggal</h2>
                <p>Menghemat energi tidak hanya melindungi bumi, namun juga langsung memangkas biaya tagihan utilitas bulanan Anda:</p>
                <ul>
                    <li>Mengganti seluruh lampu penerangan rumah dengan lampu hemat energi berteknologi LED.</li>
                    <li>Mematikan peralatan elektronik dari stopkontak saat sedang tidak digunakan (*vampire power*).</li>
                    <li>Mengoptimalkan ventilasi dan pencahayaan alami di siang hari sebelum menyalakan pendingin ruangan (AC).</li>
                    <li>Mengatur suhu pendingin ruangan (AC) pada batas efisien yang direkomendasikan, yaitu 24°C - 25°C.</li>
                </ul>

                <h2>Konsumsi Pangan dan Konservasi Air Bersih</h2>
                <p>Pilihan makanan dan pemakaian air kita memiliki jejak karbon tersembunyi yang cukup signifikan:</p>
                <ul>
                    <li>Mengonsumsi pangan lokal untuk mengurangi emisi bahan bakar transportasi distribusi pangan.</li>
                    <li>Mengurangi pemborosan makanan (*food waste*) dengan membuat rencana belanja teratur.</li>
                    <li>Menutup keran air saat menyikat gigi atau mencuci tangan untuk mencegah air bersih terbuang percuma.</li>
                </ul>
            ',
            'description' => 'Tips praktis dan mudah diterapkan untuk mengurangi jejak emisi karbon pribadi dari rumah, transportasi, hingga pemilahan sampah.'
        ]);

        // Artikel 3
        Article::create([
            'title' => 'Mengenal Energi Bersih & Masa Depan Transisi Energi Terbarukan',
            'slug' => Str::slug('Mengenal Energi Bersih & Masa Depan Transisi Energi Terbarukan'),
            'image_path' => 'https://images.unsplash.com/photo-1501854140801-50d01698950b?ixlib=rb-1.2.1&auto=format&fit=crop&w=1200&q=80',
            'reading_time' => 8,
            'published_at' => now()->subWeek(),
            'content' => '
                <h2>Urgensi Transisi Menuju Energi Terbarukan</h2>
                <p>Energi terbarukan adalah sumber energi yang berasal dari proses alam berkelanjutan yang tidak akan habis dan menghasilkan emisi gas rumah kaca yang sangat rendah atau mendekati nol selama proses operasinya. Transisi energi merupakan pilar terpenting dunia untuk mencapai komitmen Net-Zero Emission pada tahun 2060.</p>

                <h2>Potensi Sumber Energi Terbarukan di Indonesia</h2>
                <p>Sebagai negara khatulistiwa di cincin api Pasifik, Indonesia dianugerahi potensi energi hijau yang melimpah:</p>
                <ul>
                    <li><strong>Energi Surya (Matahari):</strong> Memiliki intensitas radiasi matahari tinggi sepanjang tahun yang sangat ideal untuk Pembangkit Listrik Tenaga Surya (PLTS Atap).</li>
                    <li><strong>Energi Panas Bumi (Geothermal):</strong> Indonesia menyimpan sekitar 40% cadangan panas bumi dunia di sepanjang jalur vulkanik aktif.</li>
                    <li><strong>Energi Air (Hidro & Mikrohidro):</strong> Memanfaatkan aliran sungai deras untuk menggerakkan turbin pembangkit listrik ramah lingkungan.</li>
                    <li><strong>Energi Angin (Bayu):</strong> Potensi hembusan angin pantai di wilayah timur dan pesisir selatan nusantara.</li>
                    <li><strong>Biomassa & Biogas:</strong> Pemanfaatan limbah pertanian dan limbah organik untuk menghasilkan energi termal dan listrik.</li>
                </ul>

                <h2>Manfaat Nyata Penerapan Energi Bersih</h2>
                <p>Manfaat transisi energi bersih tidak hanya dirasakan oleh lingkungan, tetapi juga sektor sosial dan ekonomi:</p>
                <ul>
                    <li>Menghilangkan polusi udara berbahaya dan meningkatkan kualitas kesehatan masyarakat perkotaan.</li>
                    <li>Membuka peluang lapangan kerja hijau baru (*green jobs*) di bidang instalasi dan teknologi bersih.</li>
                    <li>Mencapai ketahanan energi nasional mandiri tanpa bergantung pada impor minyak mentah luar negeri.</li>
                    <li>Meningkatkan reputasi ESG (*Environmental, Social, Governance*) bagi perusahaan dan industri modern.</li>
                </ul>

                <h2>Bagaimana Kita Bisa Berkontribusi?</h2>
                <p>Anda dapat mulai berpartisipasi dengan memanfaatkan PLTS atap skala residensial, menggunakan sertifikat energi terbarukan (REC), serta terus memantau efisiensi konsumsi energi fasilitas Anda melalui platform KaHejo.</p>
            ',
            'description' => 'Eksplorasi potensi energi surya, angin, panas bumi, dan peran inovasi teknologi bersih dalam mempercepat pencapaian target Net-Zero Emission.'
        ]);
    }
}
