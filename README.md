# 🧾 Aplikasi Pengaduan Masyarakat

Proyek ini adalah aplikasi **Pengaduan Masyarakat** berbasis web menggunakan **Laravel**.  
Aplikasi ini memungkinkan masyarakat untuk membuat laporan pengaduan, serta admin dan petugas untuk menindaklanjutinya secara online.

---

## 🚀 Fitur Utama
- 👥 Login multi-role (Admin, Petugas, Masyarakat)
- 📝 Pengaduan online (buat, lihat status, dan tindak lanjut)
- 📊 Dashboard laporan pengaduan
- 📨 Tanggapan dari petugas
- 🔐 Otentikasi dan manajemen akun

---

## ⚙️ Persyaratan Sistem
Sebelum menjalankan proyek ini, pastikan kamu sudah menginstal:
- [PHP ≥ 8.1](https://www.php.net/downloads.php)
- [Composer](https://getcomposer.org/)
- [Laravel 10.x](https://laravel.com/docs)
- [MySQL / MariaDB](https://www.mysql.com/)
- [Git](https://git-scm.com/)
- [Node.js & NPM](https://nodejs.org/)

---

## 📥 Cara Instalasi

Jalankan langkah-langkah berikut di terminal:

```bash
# 1️⃣ Clone repository
git clone https://github.com/rafaprayata06/Project-PKL-Tentang-Pengaduan-Masyarakat-Menggunakan-Laravel.git

# 2️⃣ Masuk ke folder proyek
cd Project-PKL-Tentang-Pengaduan-Masyarakat-Menggunakan-Laravel

# 3️⃣ Install dependensi Laravel
composer install

# 4️⃣ Install dependensi frontend (opsional jika pakai Vite)
npm install && npm run dev

# 5️⃣ Duplikat file .env
cp .env.example .env

# 6️⃣ Generate key aplikasi Laravel
php artisan key:generate
