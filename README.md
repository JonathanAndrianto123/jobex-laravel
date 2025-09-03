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

## 📷 Screenshot
Login Page<img width="1299" height="573" alt="image" src="https://github.com/user-attachments/assets/c981f5d4-4f1a-4b8f-abfd-132dde006987" />
Home Page Job Recruiter<img width="1351" height="690" alt="image" src="https://github.com/user-attachments/assets/511b7ab2-d041-459a-a3d7-060e503a073d" />
Job Vacancy Addition Page<img width="1353" height="610" alt="image" src="https://github.com/user-attachments/assets/c4abd5bb-7fda-4ada-bb19-1256462d909c" />
Job Recruiter Vacancy List<img width="1353" height="608" alt="image" src="https://github.com/user-attachments/assets/8dc7c254-2b9f-492e-9253-f10b54f0369b" />
Applicant List Page<img width="1352" height="607" alt="image" src="https://github.com/user-attachments/assets/8cc6523d-da50-415f-bf98-6ce97b944d23" />
Home Page Job Seeker<img width="1353" height="612" alt="image" src="https://github.com/user-attachments/assets/7440541b-2750-4728-a77f-2d380ea43c42" />
Vacancy List<img width="1353" height="608" alt="image" src="https://github.com/user-attachments/assets/2c1bd008-a8cd-4f9e-8a4f-86cd48d86b03" />
Application History<img width="1352" height="611" alt="image" src="https://github.com/user-attachments/assets/e409d9d8-0e4f-4611-aa5e-bd3a0bf65ac2" />
Vacancy Descripton<img width="1352" height="609" alt="image" src="https://github.com/user-attachments/assets/7019e962-8a19-4625-a5dd-2a89d8529f37" />


## 💡 Cara Menjalankan
1. Clone repo ini:
   ```bash
   git clone https://github.com/username/jobex-laravel.git
   cd jobex-laravel

2. Install dependencies:
    ```bash
    composer install
    npm install && npm run dev
    Copy .env.example jadi .env lalu sesuaikan database.

3. Generate key:
    ```bash
    php artisan key:generate

4. Migrasi database:
    ```bash
    php artisan migrate --seed

5. Jalankan server:
    ```bash
    php artisan serve
### ✨ Kontributor
Jonathan Satriani Gracio Andrianto (Developer)
