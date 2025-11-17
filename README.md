Employee Management System

Sistem Manajemen Pegawai berbasis Laravel 12 dan Filament 3.3 untuk Technical Test Full Stack Developer Intern di Sinergi Impact Indonesia.

📋 Daftar Isi

Fitur Utama

Tech Stack

Prasyarat

Instalasi

Struktur Database

Login Credentials

Fitur & Fungsionalitas

Struktur Project

Testing

Troubleshooting

Developer

✨ Fitur Utama
Fitur Wajib

✅ Autentikasi Admin (Filament Auth)

✅ Dashboard informatif (statistik & grafik)

✅ CRUD Pegawai Lengkap

✅ UUID sebagai Primary Key

✅ Validasi Form Bahasa Indonesia

✅ 8 Field Wajib
NIK, Nama, Email, Gender, Jabatan, Divisi, Tanggal Bergabung, ID Unik

✅ 5 Field Opsional
Telepon, Tanggal Lahir, Alamat, Status, Gaji

Fitur Bonus

✅ Dashboard Widgets (Stats, Bar Chart, Latest Employees)

✅ Advanced Search

✅ Multi Filter

✅ Bulk Actions

✅ Soft Delete

✅ Infolist Detail View

✅ Notification Feedback

✅ Responsive (Mobile Friendly)

✅ Siap integrasi Export Excel/PDF

✅ Validasi full Bahasa Indonesia

🛠️ Tech Stack
Teknologi	Versi	Fungsi
Laravel	12	PHP Framework
Filament	3.3.x	Admin Panel
PHP	8.2+	Backend
MySQL	8.0+	Database
TailwindCSS	3.x	Styling
Alpine.js	3.x	Interactivity
Livewire	3.x	Components
Composer	2.x	PHP Package Manager
Node.js	18+	JS Runtime
npm	9+	JS Package Manager
📋 Prasyarat

Pastikan sudah terinstall:

PHP >= 8.2
Composer >= 2.x
Node.js >= 18
MySQL >= 8.x
Git


Cek versi:

php --version
composer --version
node --version
npm --version
mysql --version

🚀 Instalasi
1. Clone Repository
git clone https://github.com/YOUR_USERNAME/employee-management-system.git
cd employee-management-system

2. Install Dependencies
composer install
npm install

3. Setup Environment
cp .env.example .env
php artisan key:generate

4. Konfigurasi Database
APP_NAME="Employee Management System"
APP_URL=http://localhost:8000
APP_LOCALE=id
APP_FALLBACK_LOCALE=id

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=employee_management
DB_USERNAME=root
DB_PASSWORD=your_password_here


Buat database:

CREATE DATABASE employee_management
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

5. Migrasi & Seed Database
php artisan migrate
php artisan db:seed


Seeder akan membuat:

1 admin user

50+ sample pegawai

6. Build Frontend
npm run build
# atau
npm run dev

7. Jalankan Server
php artisan serve


Akses:

App → http://localhost:8000

Admin Panel → http://localhost:8000/admin

🔐 Login Credentials
Field	Value
Email	admin@example.com

Password	password

⚠️ Ganti password setelah login pertama kali.

📊 Struktur Database
Tabel: employees
Field	Type	Null	Keterangan
id	UUID	NO	Primary Key
nik	VARCHAR(16)	NO	Unique
full_name	VARCHAR(255)	NO	—
email	VARCHAR(255)	NO	Unique
gender	ENUM	NO	Laki-laki / Perempuan
position	ENUM	NO	Staff / Admin / Supervisor / Manager / Intern
division	ENUM	NO	HRD / Finance / IT / Marketing / Operation / GA
join_date	DATE	NO	—
phone	VARCHAR(15)	YES	Opsional
birth_date	DATE	YES	Opsional
address	TEXT	YES	Opsional
employment_status	ENUM	NO	Aktif / Non-aktif / Resign / Cuti
base_salary	DECIMAL	YES	—
deleted_at	TIMESTAMP	YES	Soft delete
Indexes
Jenis Index	Kolom
Primary Key	id
Unique	nik, email
Index	division, position, employment_status, join_date
🎯 Fitur & Fungsionalitas
1. Dashboard

Stats Cards

Grafik Bar Pegawai per Divisi

Tabel 5 Pegawai Terbaru

2. CRUD Pegawai

Create

Read (search, filter, sort, pagination)

Update

Soft Delete + Restore

Bulk Delete

3. Validasi Form

Contoh pesan error:

"NIK wajib diisi."

"Format email tidak valid."

"Nomor telepon minimal 10 digit."

4. Search & Filter

Search by: nik, nama, email

Filter: divisi, jabatan, status, tanggal bergabung

5. Bulk Actions

Delete multiple

Update status massal