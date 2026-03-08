
⚠️ **Ubah password di production!**

## 📝 Struktur Folder
@echo off
REM ============================================
REM Setup Script untuk Website SDN 1
REM Untuk Windows (Laragon, XAMPP, dll)
REM ============================================

setlocal enabledelayedexpansion

echo.
echo ========================================
echo   Setup Website SDN 1 Tengguli
echo ========================================
echo.

REM 1. Check if composer is installed
echo [1/5] Checking composer installation...
where composer >nul 2>nul
if %errorlevel% neq 0 (
    echo ERROR: Composer tidak ditemukan! 
    echo Pastikan composer sudah terinstall dan accessible dari PATH
    echo Download dari: https://getcomposer.org/download/
    pause
    exit /b 1
)
echo OK - Composer found

REM 2. Check if npm is installed
echo.
echo [2/5] Checking npm installation...
where npm >nul 2>nul
if %errorlevel% neq 0 (
    echo ERROR: npm tidak ditemukan!
    echo Pastikan Node.js sudah terinstall
    echo Download dari: https://nodejs.org/
    pause
    exit /b 1
)
echo OK - npm found

REM 3. Install PHP Dependencies
echo.
echo [3/5] Installing PHP dependencies with composer...
call composer install
if %errorlevel% neq 0 (
    echo ERROR: Composer install gagal!
    pause
    exit /b 1
)
echo OK - PHP dependencies installed

REM 4. Install Node Dependencies
echo.
echo [4/5] Installing Node dependencies with npm...
call npm install
if %errorlevel% neq 0 (
    echo ERROR: npm install gagal!
    pause
    exit /b 1
)
echo OK - Node dependencies installed

REM 5. Copy .env.example to .env if not exists
echo.
echo [5/5] Setting up environment file...
if not exist .env (
    copy .env.example .env
    echo OK - .env created from .env.example
    echo.
    echo ⚠️  PERHATIAN: Buka file .env dan update:
    echo    - APP_URL (default: http://localhost)
    echo    - DB_HOST (default: 127.0.0.1)
    echo    - DB_DATABASE (default: websitesdn1tengguli)
    echo    - DB_USERNAME (default: root)
    echo    - DB_PASSWORD (sesuaikan dengan password database Anda)
) else (
    echo OK - .env already exists (skipped)
)

REM 6. Generate APP_KEY if not exists
echo.
echo [Bonus] Generating APP_KEY...
findstr /R "^APP_KEY=base64:" .env >nul 2>nul
if %errorlevel% neq 0 (
    call php artisan key:generate
    echo OK - APP_KEY generated
) else (
    echo OK - APP_KEY already exists
)

REM 7. Build frontend assets
echo.
echo [Bonus] Building frontend assets...
call npm run build
if %errorlevel% neq 0 (
    echo WARNING: Asset build gagal, tapi tidak kritis
)
echo OK - Assets built

echo.
echo ========================================
echo   ✅ Setup Selesai!
echo ========================================
echo.
echo Langkah selanjutnya:
echo.
echo 1. Buka .env dan update database credentials:
echo    - DB_HOST
echo    - DB_DATABASE  
echo    - DB_USERNAME
echo    - DB_PASSWORD
echo.
echo 2. Buat database baru di MySQL:
echo    CREATE DATABASE websitesdn1tengguli;
echo.
echo 3. Jalankan migrasi database:
echo    php artisan migrate
echo.
echo 4. Jalankan seeders (tambah admin user):
echo    php artisan db:seed
echo.
echo 5. Jalankan development server:
echo    php artisan serve
echo.
echo Development server akan berjalan di: http://localhost:8000
echo.
pause
