# Jobex - Job Portal (Laravel)

## 🚀 Deskripsi
Jobex adalah aplikasi job portal berbasis Laravel yang dirancang untuk menghubungkan **perusahaan (employer)** dengan **pencari kerja (jobseeker)**.  
Aplikasi ini mendukung sistem multi-role (admin, employer, user) dengan autentikasi, manajemen lowongan, dan fitur lamaran kerja online.  

## ⚡ Fitur Utama
### 🔑 Autentikasi
- Register & Login
- Role-based access (Admin, Employer, Jobseeker)
- Logout

### 👤 Jobseeker
- Melihat daftar lowongan kerja
- Melihat detail pekerjaan
- Melamar pekerjaan
- Melihat & mengelola riwayat lamaran
- Menyimpan lowongan sebagai favorit

### 🏢 Employer
- Dashboard employer
- Tambah, edit, hapus lowongan
- Melihat daftar lowongan milik sendiri
- Melihat & mengelola daftar pelamar
- Update status lamaran (accept/decline)

### 🛠️ Admin
- Dashboard admin
- Manajemen employer (lihat detail, hapus)
- Manajemen jobseeker
- Manajemen lowongan
- Laporan data (employers, jobseekers, jobs, applications)

## 🛠️ Teknologi
- **Framework**: Laravel 10
- **Database**: MySQL
- **Frontend**: Blade, Bootstrap/Tailwind (opsional)
- **Authentication**: Middleware + Role-based access

## 📌 Routes (ringkasan)
Beberapa route penting:
- `/` → Homepage
- `/login`, `/register` → Autentikasi
- `/dashboard/home` → Dashboard user
- `/employer/home` → Dashboard employer
- `/admin/home` → Dashboard admin
- `/jobs/joblist` → Daftar lowongan
- `/lamaran/{id}/apply` → Form lamaran

> Untuk detail lengkap, lihat file [`routes/web.php`](routes/web.php).

## ⚠️ Status
⚠️ Project masih dalam tahap pengembangan (in-progress).

## 📷 Screenshot (Opsional)
*(tambahkan screenshot aplikasi di sini setelah ada UI jalan)*

## 💡 Cara Menjalankan
1. Clone repo ini:
   ```bash
   git clone https://github.com/username/jobex-laravel.git
   cd jobex-laravel
Install dependencies:

bash
Salin kode
composer install
npm install && npm run dev
Copy .env.example jadi .env lalu sesuaikan database.

Generate key:

bash
Salin kode
php artisan key:generate
Migrasi database:

bash
Salin kode
php artisan migrate --seed
Jalankan server:

bash
Salin kode
php artisan serve
✨ Kontributor
Jonathan Satriani Gracio Andrianto (Developer)
