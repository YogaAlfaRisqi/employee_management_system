1. PREPARATION — Project Initialization
✔ System & Tools

[x]Pastikan PHP 8.2+ terinstal

[x]Pastikan Composer terinstal

[x]Pastikan Node.js & NPM terinstal

[x]Pastikan MySQL tersedia

2. REPOSITORY SETUP

[x] Buat repo GitHub public

[x] Clone repo ke lokal

[x] Buat branch develop

[x] Commit awal “initialize setup laravel 12 installing”

3. Laravel Installation

[x] Install Laravel 12 menggunakan Composer

[x] Setup .env

[x] Generate app key

[x] Buat database fsi_test

[x] Commit: “chore: setup Laravel 11 base project”

4. Optional (Direkomendasikan)

[x] Install FilamentPHP v3 (admin panel modern)

[x] Install Panel & Theme default

[] Commit: “feat: install & configure Filament admin panel”

- AUTHENTICATION MODULE (feature/auth)

Requirement: Admin dapat login ke sistem.

✔ Branch Preparation

 Checkout branch feature/auth

✔ Database

 Buat migration admins (jika tidak memakai Filament)

 name

 email (unique)

 password

 timestamps

 Buat seeder Admin default

 Commit: “feat: add admin migration & seeder”

✔ Authentication Logic

 Buat LoginController

 Buat login form (Blade / Filament)

 Implementasi login menggunakan session guard web

 Validasi form login:

 email required + valid

 password required

 Error handling:

 Email tidak ditemukan

 Password salah

 Implement logout logic

 Commit: “feat: add admin login & logout functionality”

✔ Middleware

 Tambahkan middleware auth

 Proteksi halaman dashboard & employee management

 Commit: “feat: add auth middleware protection”

✔ Testing Manual

 Login sukses dengan akun admin

 Login gagal dengan email salah

 Login gagal dengan password salah

 Akses dashboard tanpa login = redirect ke login

✔ Merging

 Merge feature/auth → develop

 Hapus branch (opsional)

- EMPLOYEE CRUD MODULE (feature/employee-crud)

Requirement: CRUD lengkap beserta validasi.

✔ Branch Preparation

 Checkout branch feature/employee-crud

✔ Database — Migration Tabel employees

Field wajib:

 NIK (unique, 8–16 digit)

 Nama Lengkap

 Email (unique)

 Jenis Kelamin (L/P)

 Jabatan (select: Staff, Admin, Supervisor, Manager, Intern)

 Divisi (HRD, Finance, IT, Marketing, Operation, GA)

 Tanggal Bergabung (date)

 ID Unik Pegawai (UUID/ULID auto)

Field opsional:

 Nomor Telepon (10–13 digit)

 Tanggal Lahir

 Alamat

 Status Karyawan (Aktif, Non-aktif, Resign, Cuti)

 Gaji Pokok

Database Changes:

 Tambahkan index untuk email, nik

 Commit: “feat: add employees migration with required fields”

✔ Model

 Buat Model Employee

 Generate UUID otomatis (boot method)

 Commit: “feat: add Employee model with UUID generator”

✔ Form Request Validation

 Buat StoreEmployeeRequest

 Buat UpdateEmployeeRequest

 Validasi lengkap sesuai requirement

 Commit: “feat: add form request validation for employees”

✔ Repository Layer (opsional tapi profesional)

 Buat EmployeeRepository

 findAll

 findById

 create

 update

 delete

 Commit: “refactor: add repository layer for employee CRUD”

✔ Service Layer (opsional)

 Buat EmployeeService

 Commit: “refactor: add service layer for cleaner business logic”

✔ CRUD Pages

 Index page dengan pagination

 Create page + validasi

 Edit page + validasi

 Delete logic

 Opsional: Detail page

 Commit: “feat: implement full employee CRUD pages”

✔ Testing Manual

 Create pegawai baru → berhasil

 Edit pegawai → berhasil

 Delete pegawai → terhapus

 Validasi muncul jika data tidak lengkap

 Email & NIK duplikat ditolak

✔ Merging

 Merge feature/employee-crud → develop

- DASHBOARD MODULE (feature/dashboard)

Requirement: Menampilkan total jumlah pegawai.

✔ Branch Preparation

 Checkout branch feature/dashboard

✔ Dashboard Data

 Buat controller dashboard

 Total pegawai (mandatory)

✔ Nilai Tambah (Optional)

 Grafik pegawai per divisi

 Grafik pegawai per jabatan

 5 pegawai terbaru

 Quick action cards:

 Tambah pegawai

 Lihat pegawai

✔ UI Dashboard

 Tampilan menggunakan component modern

 Statistik dengan card UI

 Commit: “feat: add dashboard with total employee stats”

✔ Merging

 Merge feature/dashboard → develop

- UI/UX ENHANCEMENT (feature/ui-enhancement)

Requirement opsional tapi meningkatkan kesan profesional.

✔ Branch Preparation

 Checkout feature/ui-enhancement

✔ General UI Enhancements

 Layout admin konsisten

 Navigasi sidebar

 Typography & spacing rapi

 Button & input konsisten

 Flash message: success/error

✔ UX Enhancements

 Searching employees (optional)

 Filtering (optional)

 Responsiveness (mobile, tablet)

 Empty state friendly

 Confirm dialog saat delete

✔ Commit

 Commit: “style: improve UI/UX for overall admin pages”

✔ Merging

 Merge feature/ui-enhancement → develop

- FIXES & IMPROVEMENTS (fix/...)

Tidak terikat urutan. Bisa dilakukan setelah review internal.

✔ Fixes

 Fix validasi tidak muncul

 Fix duplicate email handling

 Fix total pegawai salah

 Fix UI tampilan rusak di mobile

 Fix bug kecil lainnya

✔ Commit Format
fix: validation failing on employee update  
fix: incorrect employee count on dashboard  
fix: improve responsive layout  

✔ Merge

 Merge fix → develop


- PROJECT DOCUMENTATION (chore/readme)
✔ README Documentation

 Deskripsi aplikasi

 Fitur

 Tech stack

 Cara install

 Cara menjalankan

 Cara login admin

 Struktur projek

 Screenshot UI (opsional)

 Development checklist

 Branching strategy

 Catatan dev

✔ Commit

 Commit: “chore: add full project documentation”

✔ Merge

 Merge chore/readme → develop


- FINALIZATION — Delivery
✔ Merge Final

 Merge develop → main

 Tag release: v1.0.0

 Push tag ke GitHub

✔ Video Demo (2–4 menit)

 Penjelasan login

 Penjelasan dashboard

 Penjelasan CRUD pegawai

 Penjelasan struktur kode

 Penjelasan teknologi



# Project To-Do List

[] Initial Setup  
[] Auth  
[] Employee CRUD  
[] Dashboard  
[] UI/UX  
[] Documentation  
[] Final Video  
