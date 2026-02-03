📦 FastPrint Inventory Management System
Proyek ini dibuat khusus untuk Seleksi Tahap Pertama Test Programmer - Fast Print Indonesia (Cabang Surabaya).

🚀 Cara Menjalankan di Laptop Sendiri
Ikuti langkah-langkah di bawah ini untuk menjalankan proyek ini di lingkungan lokal Anda.

1. Prasyarat (Prerequisites)

Pastikan Anda sudah menginstal:

- PHP (minimal versi 8.1)
- Composer
- MySQL/MariaDB (XAMPP/Laragon)

2. Kloning Repositori
- Buka terminal atau CMD, lalu jalankan perintah:
bash
git clone https://github.com/bhatito/test_fastprint.git
cd nama-repo
3. Instalasi Dependency
Instal semua library PHP yang dibutuhkan melalui Composer:
- composer install
4. Konfigurasi Database (.env)
- Salin file .env.example menjadi .env:
- cp .env.example .env
- Buka file .env menggunakan teks editor (VS Code/Notepad++).
- Cari bagian konfigurasi database dan sesuaikan menjadi:
- Cuplikan kode
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=fastprint_test
DB_USERNAME=root
DB_PASSWORD=
Catatan: Pastikan Anda sudah membuat database kosong bernama fastprint_test di phpMyAdmin/MySQL.

5. Generate Application Key
Jalankan perintah berikut untuk mengamankan aplikasi:
- php artisan key:generate
6. Migrasi Database & Seeding
Proyek ini sudah dilengkapi dengan seeder untuk Kategori, Status, dan User Admin. Jalankan perintah berikut untuk membuat tabel dan mengisi data awal:
- php artisan migrate --seed
7. Menjalankan Aplikasi
Terakhir, jalankan server lokal Laravel:
- php artisan serve
Akses aplikasi melalui browser di alamat: http://127.0.0.1:8000

🔑 Informasi Akun Login
Gunakan akun berikut untuk masuk ke dashboard (jika menggunakan UserSeeder default):

Email: admin@admin.com
Password: admin

🛠 Fitur Utama
Manajemen Produk: CRUD Produk dengan format harga ribuan otomatis.

Manajemen Kategori & Status: CRUD menggunakan modal AJAX yang responsif.

Sync API: Fitur untuk mengambil data produk langsung dari API FastPrint.

DataTable: Pencarian dan paginasi sisi klien untuk performa cepat.


Dibuat oleh [Bhatito Sharoni Putra]