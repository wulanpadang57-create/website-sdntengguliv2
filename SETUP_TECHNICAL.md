# 🔧 Teknis Setup Script (setup.bat)

## Penjelasan Lengkap Cara Kerja Script

Script `setup.bat` adalah batch file Windows yang mengotomatisasi instalasi project. Berikut penjelasan teknis detailnya:

---

## 📖 Struktur Code

### 1. **Header & Initialization**
```batch
@echo off
setlocal enabledelayedexpansion
```

- `@echo off` - Menyembunyikan command yang dijalankan, hanya tampilkan output
- `setlocal enabledelayedexpansion` - Memungkinkan penggunaan variabel dengan `!variable!` untuk error handling

### 2. **Check Composer Installation**
```batch
echo [1/5] Checking composer installation...
where composer >nul 2>nul
if %errorlevel% neq 0 (
    echo ERROR: Composer tidak ditemukan!
    pause
    exit /b 1
)
```

**Cara Kerja:**
- `where composer` - Mencari program `composer` di PATH sistem
- `>nul 2>nul` - Redirect output ke null (tersembunyi), hanya cek status
- `%errorlevel%` - Variable yang menyimpan status command terakhir
  - `0` = sukses
  - `1` atau lebih = error
- `exit /b 1` - Exit script dengan status error (1)

**Hasil:**
```
✅ Jika composer ada:   echo "OK - Composer found"
❌ Jika composer tidak: pause, lalu exit
```

### 3. **Check npm Installation**
```batch
where npm >nul 2>nul
if %errorlevel% neq 0 (
    echo ERROR: npm tidak ditemukan!
    pause
    exit /b 1
)
```

Sama seperti composer check.

### 4. **Install PHP Dependencies**
```batch
echo [3/5] Installing PHP dependencies with composer...
call composer install
if %errorlevel% neq 0 (
    echo ERROR: Composer install gagal!
    pause
    exit /b 1
)
```

**Cara Kerja:**
- `call composer install` - Eksekusi command `composer install`
  - `call` = memungkinkan script melanjutkan setelah command selesai
  - Tanpa `call`, script tidak bisa lanjut ke step berikutnya
- Jika gagal, script stop dan tampilkan pesan error

**Apa yang dilakukan `composer install`:**
```
composer.json
    ↓
membaca dependencies (laravel/framework, etc)
    ↓
download dari Packagist repository
    ↓
ekstrak ke folder vendor/
    ↓
generate autoload file (vendor/autoload.php)
```

### 5. **Install Node Dependencies**
```batch
echo [4/5] Installing Node dependencies with npm...
call npm install
```

**Apa yang dilakukan `npm install`:**
```
package.json
    ↓
membaca devDependencies (vite, tailwindcss, etc)
    ↓
download dari npm registry
    ↓
ekstrak ke folder node_modules/
    ↓
generate package-lock.json
```

### 6. **Create .env from .env.example**
```batch
if not exist .env (
    copy .env.example .env
    echo OK - .env created from .env.example
) else (
    echo OK - .env already exists (skipped)
)
```

**Cara Kerja:**
- `if not exist .env` - Cek apakah file .env sudah ada
- `copy .env.example .env` - Copy template ke .env
- Jika sudah ada, skip (mencegah overwrite konfigurasi yang sudah ada)

### 7. **Generate APP_KEY**
```batch
findstr /R "^APP_KEY=base64:" .env >nul 2>nul
if %errorlevel% neq 0 (
    call php artisan key:generate
)
```

**Cara Kerja:**
- `findstr /R "^APP_KEY=base64:"` - Cari line yang mulai dengan `APP_KEY=base64:`
- Jika tidak ditemukan (error), jalankan `php artisan key:generate`
- `php artisan key:generate` menghasilkan encryption key unik untuk aplikasi

**Mengapa penting:**
- APP_KEY digunakan untuk encrypt data sensitif (passwords, sessions, dll)
- Harus unik per installation

### 8. **Build Frontend Assets**
```batch
echo [Bonus] Building frontend assets...
call npm run build
```

**Apa yang dilakukan `npm run build`:**
```
resources/css/ + resources/js/
    ↓
Vite compiler
    ↓
minified & optimized
    ↓
public/build/
```

Output di terminal:
```
VITE v5.0.0  building for production...
✓ 145 modules transformed
dist/assets/app.abc123.js ... 85.5kb
dist/assets/style.def456.css ... 12.3kb
```

---

## 🔄 Flow Diagram

```
START
  │
  ├─→ Check composer exists?
  │    └─→ ❌ STOP & EXIT with error
  │
  ├─→ Check npm exists?
  │    └─→ ❌ STOP & EXIT with error
  │
  ├─→ composer install
  │    ├─→ download vendor/
  │    └─→ ❌ STOP if error
  │
  ├─→ npm install
  │    ├─→ download node_modules/
  │    └─→ ❌ STOP if error
  │
  ├─→ .env tidak ada?
  │    └─→ Copy .env.example → .env
  │
  ├─→ APP_KEY kosong?
  │    └─→ php artisan key:generate
  │
  ├─→ npm run build
  │    └─→ Compile CSS/JS
  │
  └─→ END ✅
       (tampilkan next steps)
```

---

## 📊 Status Check & Error Handling

| Step | Command | Pengecekan |
|------|---------|-----------|
| 1 | `where composer` | Path environment |
| 2 | `where npm` | Path environment |
| 3 | `composer install` | Return code 0 |
| 4 | `npm install` | Return code 0 |
| 5 | `if not exist .env` | File existence |
| 6 | `findstr APP_KEY` | File content |
| 7 | `npm run build` | Asset compilation |

---

## 🚨 Error Handling Pattern

Script menggunakan pattern ini:

```batch
REM kritical step
call command-name
if %errorlevel% neq 0 (
    echo ERROR: Deskripsi error
    pause
    exit /b 1
)
echo OK - Success message
```

**Error Codes:**
- `0` = Success
- `1` = Generic error (composer/npm failed)
- Non-zero = Stop script

---

## 🎯 Keuntungan Setup Script

### Sebelum (tanpa script):
```bash
# Developer harus tahu & jalankan manual:
git clone url
copy .env.example .env
# EDIT .env (risky, banyak typo)
composer install
npm install
php artisan key:generate
php artisan migrate
php artisan db:seed
npm run build
php artisan serve
# = 10+ langkah, banyak yang bisa salah
```

### Sesudah (dengan script):
```bash
# Developer:
git clone url
setup.bat
# Wait... Done! ✅
# Only tinggal edit .env credentials & run migrate
```

---

## 💡 Customization

### Tambah Step Baru
Contoh: tambah Cache Clear
```batch
echo.
echo [Bonus] Clearing caches...
call php artisan config:cache
call php artisan view:cache
call php artisan route:cache
echo OK - Caches cleared
```

### Buat untuk Linux (setup.sh)
```bash
#!/bin/bash

echo "Setting up project..."

# Check composer
command -v composer >/dev/null 2>&1 || { echo "Composer not found!"; exit 1; }

# Check npm
command -v npm >/dev/null 2>&1 || { echo "npm not found!"; exit 1; }

# Install
composer install
npm install

# .env
[ ! -f .env ] && cp .env.example .env

# Key
php artisan key:generate

# Build
npm run build

echo "Setup complete!"
```

---

## 📝 Summary

Script `setup.bat` mengotomatisasi 5 langkah kritis:

1. ✅ **Validasi Tools** - Cek composer & npm
2. 📦 **Install Packages** - PHP & Node dependencies
3. ⚙️ **Setup Config** - Copy & setup .env
4. 🔐 **Security** - Generate encryption key
5. 🎨 **Build Assets** - Compile CSS/JS

**Result:** Dari 10+ langkah manual → 1 click / 1 command! 🚀
