# Website SDN 1 Tengguli

Platform website untuk sekolah yang dibangun dengan Laravel 10 dan Tailwind CSS.

## 📋 Daftar Isi
- [Teknologi yang Digunakan](#teknologi-yang-digunakan)
- [Persyaratan Sistem](#persyaratan-sistem)
- [Panduan Setup Awal](#panduan-setup-awal)
- [Fitur Utama](#fitur-utama)
- [Struktur Database](#struktur-database)
- [Troubleshooting](#troubleshooting)

## 🛠️ Teknologi yang Digunakan

| Layer | Teknologi |
|-------|-----------|
| **Backend** | Laravel 10.10, PHP 8.1+ |
| **Frontend** | Tailwind CSS 3.1, Alpine.js 3.4, Vite 5.0 |
| **Database** | MySQL 8.0+ |
| **Build Tools** | Vite, npm/yarn |
| **Testing** | PHPUnit 10.1 |

## ⚙️ Persyaratan Sistem

Sebelum memulai, pastikan Anda sudah install:

- **PHP 8.1+** - [Download](https://www.php.net/downloads.php)
- **Composer** - [Download](https://getcomposer.org/download/)
- **Node.js 16+** - [Download](https://nodejs.org/)
- **MySQL 8.0+** - [Download](https://www.mysql.com/downloads/) atau gunakan Laragon/XAMPP
- **Git** - [Download](https://git-scm.com/)

### Verifikasi Instalasi
```bash
php --version
composer --version
node --version
npm --version
mysql --version
```

## 🚀 Panduan Setup Awal

### Untuk Windows (Laragon/XAMPP)

#### **Cara Tercepat (Menggunakan Setup Script):**

```bash
# 1. Clone repository
git clone <repository-url>
cd websitesdn1tengguli

# 2. Jalankan setup script (double-click atau cmd)
setup.bat

# 3. Buka .env dan sesuaikan konfigurasi database
# Contoh untuk Laragon:
DB_HOST=127.0.0.1
DB_DATABASE=websitesdn1tengguli
DB_USERNAME=root
DB_PASSWORD=

# 4. Buat database di MySQL
# Buka MySQL admin (Laragon: Win+Alt+M atau terminal)
CREATE DATABASE websitesdn1tengguli;

# 5. Jalankan migrations & seeders
php artisan migrate --seed

# 6. Jalankan server
php artisan serve

# Akses di http://localhost:8000
```

#### **Cara Manual (Step by Step):**

Jika `setup.bat` tidak berfungsi, lakukan manual:

```bash
# 1. Clone & masuk folder
git clone <repository-url>
cd websitesdn1tengguli

# 2. Copy environment file
copy .env.example .env

# 3. Update .env dengan database credentials
# Edit file .env:
APP_URL=http://localhost:8000
DB_HOST=127.0.0.1
DB_DATABASE=websitesdn1tengguli
DB_USERNAME=root
DB_PASSWORD=

# 4. Install PHP dependencies
composer install

# 5. Install Node dependencies
npm install

# 6. Generate APP_KEY
php artisan key:generate

# 7. Buat database
# Buka MySQL & jalankan:
CREATE DATABASE websitesdn1tengguli;

# 8. Jalankan migrasi
php artisan migrate

# 9. Jalankan seeder (buat admin user)
php artisan db:seed

# 10. Build frontend assets
npm run build

# 11. (Optional) Run in development mode dengan auto-reload
npm run dev

# 12. Di terminal baru, jalankan Laravel server
php artisan serve
```

### Untuk Linux/Mac

```bash
# Langkah sama seperti manual, tapi gunakan bash/zsh
git clone <repository-url>
cd websitesdn1tengguli
cp .env.example .env
nano .env  # Edit sesuaikan database
composer install
npm install
php artisan key:generate
# Buat database
php artisan migrate --seed
npm run build
php artisan serve
```

## 📦 Fitur Utama

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).


## Setup Project
# 1. Clone repository
git clone <repository-url>
cd websitesdn1tengguli

# 2. Copy .env.example ke .env
cp .env.example .env

# 3. Update .env sesuai environment baru
# Edit: DB_USERNAME, DB_PASSWORD, APP_URL, APP_KEY (jika kosong)

# 4. Install PHP dependencies
composer install

# 5. Install npm dependencies
npm install

# 6. Generate APP_KEY (jika belum)
php artisan key:generate

# 7. Buat database baru terlebih dahulu

# 8. Run migrations
php artisan migrate

# 9. Run seeders (untuk buat admin user)
php artisan db:seed

# 10. Build frontend assets
npm run build

# 11. Jalankan server
php artisan serve