# 🚨 **TROUBLESHOOTING WEBSITE DESA TETEMBOMUA**

## ❌ **MASALAH: 404 NOT FOUND**

### **Gejala:**
- Error "404 NOT FOUND" saat mengakses `localhost:8000/admin`
- Halaman admin tidak dapat diakses

### **Penyebab:**
1. Route admin belum terdaftar
2. View admin belum ada
3. Server tidak berjalan

### **Solusi:**

#### **1. Cek Server Laravel**
```bash
# Pastikan server berjalan
php artisan serve

# Output yang diharapkan:
# Starting Laravel development server: http://127.0.0.1:8000
```

#### **2. Cek Route List**
```bash
# Lihat semua route yang terdaftar
php artisan route:list

# Pastikan ada route admin
```

#### **3. Clear Cache**
```bash
# Clear semua cache
php artisan cache:clear
php artisan config:clear
php artisan view:clear
php artisan route:clear
```

#### **4. Restart Server**
```bash
# Stop server (Ctrl+C)
# Jalankan ulang
php artisan serve
```

---

## ❌ **MASALAH: DATABASE CONNECTION ERROR**

### **Gejala:**
- Error "SQLSTATE[HY000] [1045] Access denied"
- Error "SQLSTATE[HY000] [2002] Connection refused"

### **Solusi:**

#### **1. Cek Konfigurasi Database**
```bash
# Edit file .env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=desa_tetembomua
DB_USERNAME=root
DB_PASSWORD=your_password
```

#### **2. Cek MySQL Service**
```bash
# Windows (XAMPP)
# Start MySQL di XAMPP Control Panel

# Linux
sudo systemctl start mysql

# Mac
brew services start mysql
```

#### **3. Buat Database**
```sql
CREATE DATABASE desa_tetembomua;
```

#### **4. Test Connection**
```bash
# Test koneksi database
php artisan tinker
# Di dalam tinker:
DB::connection()->getPdo();
```

---

## ❌ **MASALAH: PERMISSION DENIED**

### **Gejala:**
- Error "Permission denied" saat upload file
- Error "Storage link could not be created"

### **Solusi:**

#### **1. Set Permission Storage**
```bash
# Linux/Mac
chmod -R 755 storage/
chmod -R 755 bootstrap/cache/

# Windows (dalam Command Prompt sebagai Administrator)
icacls storage /grant Everyone:F /T
icacls bootstrap/cache /grant Everyone:F /T
```

#### **2. Create Storage Link**
```bash
# Buat symbolic link
php artisan storage:link
```

#### **3. Cek Folder Permissions**
```bash
# Pastikan folder dapat ditulis
ls -la storage/
ls -la bootstrap/cache/
```

---

## ❌ **MASALAH: VITE MANIFEST NOT FOUND**

### **Gejala:**
- Error "Vite manifest not found"
- CSS/JS tidak ter-load

### **Solusi:**

#### **1. Install Dependencies**
```bash
# Install Node.js dependencies
npm install
```

#### **2. Build Assets**
```bash
# Build untuk production
npm run build

# Atau untuk development
npm run dev
```

#### **3. Cek Vite Configuration**
```bash
# Pastikan file vite.config.js ada
ls vite.config.js
```

---

## ❌ **MASALAH: CLASS NOT FOUND**

### **Gejala:**
- Error "Class 'App\Models\News' not found"
- Error "Class 'App\Http\Controllers\Admin\DashboardController' not found"

### **Solusi:**

#### **1. Regenerate Autoload**
```bash
composer dump-autoload
```

#### **2. Clear Cache**
```bash
php artisan cache:clear
php artisan config:clear
```

#### **3. Cek Namespace**
```php
// Pastikan namespace benar
namespace App\Models;
namespace App\Http\Controllers\Admin;
```

---

## ❌ **MASALAH: LOGIN ADMIN TIDAK BERFUNGSI**

### **Gejala:**
- Form login tidak merespon
- Error setelah submit login

### **Solusi:**

#### **1. Cek User Admin**
```bash
# Buat user admin baru
php artisan tinker

# Di dalam tinker:
use App\Models\User;
User::create([
    'name' => 'Administrator',
    'email' => 'admin@desatetembomua.com',
    'password' => bcrypt('password123'),
    'role' => 'super_admin',
    'status' => 'active'
]);
```

#### **2. Cek Database Migration**
```bash
# Jalankan migration
php artisan migrate

# Atau fresh migration
php artisan migrate:fresh
```

#### **3. Cek Authentication**
```bash
# Install Laravel Breeze (jika belum)
composer require laravel/breeze --dev
php artisan breeze:install
```

---

## ❌ **MASALAH: SLOW PERFORMANCE**

### **Gejala:**
- Website lambat loading
- Response time tinggi

### **Solusi:**

#### **1. Optimize Laravel**
```bash
# Cache configuration
php artisan config:cache

# Cache routes
php artisan route:cache

# Cache views
php artisan view:cache

# Optimize autoloader
composer install --optimize-autoloader --no-dev
```

#### **2. Optimize Database**
```bash
# Clear database cache
php artisan db:clear-cache
```

#### **3. Check Server Resources**
```bash
# Cek memory usage
free -h

# Cek disk space
df -h
```

---

## ❌ **MASALAH: IMAGE NOT LOADING**

### **Gejala:**
- Gambar tidak muncul
- Error 404 untuk gambar

### **Solusi:**

#### **1. Cek Storage Link**
```bash
# Buat ulang storage link
php artisan storage:link
```

#### **2. Cek File Permissions**
```bash
# Set permission untuk upload
chmod -R 755 public/storage/
```

#### **3. Cek Image Path**
```php
// Pastikan path benar
asset('storage/images/filename.jpg')
```

---

## ✅ **CHECKLIST TROUBLESHOOTING**

### **Server Issues:**
- [ ] Server Laravel berjalan (`php artisan serve`)
- [ ] Port 8000 tidak digunakan aplikasi lain
- [ ] Firewall tidak memblokir port

### **Database Issues:**
- [ ] MySQL/MariaDB berjalan
- [ ] Database `desa_tetembomua` ada
- [ ] User database memiliki permission
- [ ] Konfigurasi `.env` benar

### **File Permission Issues:**
- [ ] Folder `storage/` dapat ditulis
- [ ] Folder `bootstrap/cache/` dapat ditulis
- [ ] Storage link terbuat (`php artisan storage:link`)

### **Dependencies Issues:**
- [ ] Composer dependencies terinstall (`composer install`)
- [ ] Node.js dependencies terinstall (`npm install`)
- [ ] Assets ter-build (`npm run build`)

### **Route Issues:**
- [ ] Route admin terdaftar di `routes/web.php`
- [ ] Cache route di-clear (`php artisan route:clear`)
- [ ] View admin ada di `resources/views/admin/`

---

## 📞 **GETTING HELP**

### **1. Check Logs**
```bash
# Laravel logs
tail -f storage/logs/laravel.log

# Error logs
tail -f storage/logs/error.log
```

### **2. Debug Mode**
```bash
# Set debug mode di .env
APP_DEBUG=true
```

### **3. Common Commands**
```bash
# List semua route
php artisan route:list

# Check Laravel version
php artisan --version

# Check PHP version
php --version

# Check Composer version
composer --version
```

### **4. Contact Support**
- **Email:** [Email support]
- **WhatsApp:** [Nomor WhatsApp]
- **Documentation:** [Link dokumentasi]

---

## 🎯 **QUICK FIXES**

### **Reset Everything:**
```bash
# 1. Clear all cache
php artisan cache:clear
php artisan config:clear
php artisan view:clear
php artisan route:clear

# 2. Regenerate autoload
composer dump-autoload

# 3. Rebuild assets
npm run build

# 4. Restart server
php artisan serve
```

### **Fresh Installation:**
```bash
# 1. Fresh migration
php artisan migrate:fresh

# 2. Create admin user
php artisan tinker
# Di dalam tinker:
use App\Models\User;
User::create([
    'name' => 'Administrator',
    'email' => 'admin@desatetembomua.com',
    'password' => bcrypt('password123'),
    'role' => 'super_admin',
    'status' => 'active'
]);

# 3. Create storage link
php artisan storage:link
```

---

*Panduan ini akan membantu mengatasi masalah umum yang terjadi pada website Desa Tetembomua.*
