# 🚀 Panduan Deploy KaHejo ke Vercel (100% Gratis & Tanpa Kartu)

Aplikasi **KaHejo** kini sudah dilengkapi dengan arsitektur **Serverless PHP Runtime** siap pakai untuk **Vercel**!

---

## 📋 Langkah 1: Push Project ke GitHub

Buka Terminal / PowerShell di folder project `kahejo` dan jalankan:
```bash
git add .
git commit -m "Konfigurasi Serverless Laravel untuk Vercel"
git push origin main
```

---

## 🌐 Langkah 2: Import Project ke Vercel Dashboard

1. Buka dashboard Vercel Anda di **[https://vercel.com/dashboard](https://vercel.com/dashboard)**.
2. Klik tombol **"Add New..."** di kanan atas $\rightarrow$ pilih **"Project"**.
3. Di daftar repositori GitHub, cari repositori **`kahejo`**, lalu klik tombol **"Import"**.

---

## ⚙️ Langkah 3: Konfigurasi Project di Vercel

Pada formulir konfigurasi project:
1. **Framework Preset**: Biarkan **`Other`** (Vercel akan otomatis membaca file `vercel.json`).
2. **Root Directory**: Biarkan `./` (default).
3. **Environment Variables**:
   Buka accordion **"Environment Variables"**, lalu tambahkan:
   * **`APP_KEY`** : `base64:n4E3tGKcaBuUvW6u2lbl/Lw8IJecrexz5b2u3AS8RJk`
   * **`APP_ENV`** : `production`
   * **`APP_DEBUG`** : `false`
   * **`DB_CONNECTION`** : `sqlite`
   * **`SESSION_DRIVER`** : `cookie`
   * **`CACHE_STORE`** : `array`
   * **`LOG_CHANNEL`** : `stderr`

---

## 🚀 Langkah 4: Klik Deploy!

1. Klik tombol **"Deploy"**.
2. Vercel akan otomatis:
   - Membangun container serverless PHP.
   - Mengarahkan seluruh route dan file CSS/JS/Gambar.
   - Membuat URL live berkecepatan tinggi dengan sertifikat SSL gratis (contoh: `https://kahejo.vercel.app`).

Selamat! Website KaHejo Anda sekarang aktif di infrastruktur global serverless Vercel! 🎉✨
