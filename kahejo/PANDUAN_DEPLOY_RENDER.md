# 🚀 Panduan Deploy KaHejo ke Render.com (100% Gratis)

Panduan ini berisi langkah-langkah mudah untuk mendeploy aplikasi **KaHejo** ke **Render.com** secara gratis menggunakan konfigurasi Docker yang sudah disiapkan.

---

## 📋 Langkah 1: Push Project ke GitHub

1. Buka Terminal / PowerShell di folder project `kahejo`:
   ```bash
   git add .
   git commit -m "Siapkan konfigurasi deployment Render Docker"
   git push origin main
   ```
   *(Pastikan semua kodingan terbaru sudah berada di repositori GitHub Anda)*

---

## 🌐 Langkah 2: Buat Web Service di Render.com

1. Buka dan login ke **[https://dashboard.render.com](https://dashboard.render.com)** menggunakan akun GitHub Anda.
2. Di pojok kanan atas, klik tombol **"New +"** lalu pilih **"Web Service"**.
3. Pilih opsi **"Build and deploy from a Git repository"** lalu klik **"Next"**.
4. Cari dan pilih repositori **`kahejo`** Anda, kemudian klik **"Connect"**.

---

## ⚙️ Langkah 3: Konfigurasi Web Service di Render

Isi formulir pembuatan service dengan detail berikut:

| Field | Nilai / Pilihan |
| :--- | :--- |
| **Name** | `kahejo-app` *(atau nama yang Anda inginkan)* |
| **Region** | `Singapore` *(paling dekat dan cepat untuk Indonesia)* |
| **Branch** | `main` |
| **Language / Runtime** | **`Docker`** *(Render akan otomatis mendeteksi file `Dockerfile`)* |
| **Instance Type** | **`Free`** *(0.1 CPU, 512 MB RAM, 100% Gratis)* |

---

## 🔑 Langkah 4: Tambahkan Environment Variables (Wajib)

Gulir ke bawah ke bagian **"Environment Variables"**, lalu tambahkan variabel berikut:

1. **`APP_KEY`** : Salin nilai `APP_KEY` dari file `.env` lokal Anda (contoh: `base64:xxx...`)
2. **`APP_ENV`** : `production`
3. **`APP_DEBUG`** : `false`
4. **`DB_CONNECTION`** : `sqlite`
5. **`LOG_CHANNEL`** : `stderr`

*(Catatan: Jika nanti Anda ingin menggunakan database MySQL dari TiDB Cloud / Aiven, Anda tinggal mengganti `DB_CONNECTION=mysql`, `DB_HOST=...`, `DB_DATABASE=...`, `DB_USERNAME=...`, dan `DB_PASSWORD=...` di menu Environment Variables ini)*

---

## 🚀 Langkah 5: Mulai Deploy & Selesai!

1. Klik tombol **"Deploy Web Service"** di bagian paling bawah.
2. Render akan otomatis:
   - Mengunduh kodingan dari GitHub.
   - Membangun container Docker dengan PHP 8.3 & Nginx.
   - Menginstall seluruh dependency Composer.
   - Menjalankan migrasi database (`php artisan migrate`) dan seeder admin secara otomatis.
3. Tunggu sekitar 2–3 menit hingga status berubah menjadi **"Live"** dengan tanda centang hijau ✅.
4. Klik **URL website Anda** di pojok kiri atas (contoh: `https://kahejo-app.onrender.com`).

Selamat! Website **KaHejo** Anda sekarang sudah resmi online dan bisa diakses oleh siapa saja di seluruh dunia! 🎉🌿
