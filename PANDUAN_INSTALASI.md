# 📋 **PANDUAN INSTALASI & AKSES WEBSITE DESA TETEMBOMUA**

## 🛠️ **PRASYARAT SISTEM**

### **A. Software yang Diperlukan:**
- **PHP:** 8.2 atau lebih tinggi
- **Composer:** Latest version
- **Node.js:** 18+ (untuk Vite)
- **Database:** MySQL 8.0+ / PostgreSQL / SQLite
- **Web Server:** Apache / Nginx (opsional untuk development)

### **B. Ekstensi PHP yang Diperlukan:**
```bash
- BCMath PHP Extension
- Ctype PHP Extension
- cURL PHP Extension
- DOM PHP Extension
- Fileinfo PHP Extension
- JSON PHP Extension
- Mbstring PHP Extension
- OpenSSL PHP Extension
- PCRE PHP Extension
- PDO PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension
```

---

## 📥 **LANGKAH INSTALASI**

### **Step 1: Clone Repository**
```bash
# Clone repository dari Git
git clone [URL_REPOSITORY_ANDA]
cd webt

# Atau jika sudah ada di local
cd /path/to/webt
```

### **Step 2: Install Dependencies**
```bash
# Install PHP dependencies
composer install

# Install Node.js dependencies
npm install
```

### **Step 3: Setup Environment**
```bash
# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

### **Step 4: Konfigurasi Database**
```bash
# Edit file .env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=desa_tetembomua
DB_USERNAME=root
DB_PASSWORD=your_password
```

### **Step 5: Setup Database**
```bash
# Jalankan migration
php artisan migrate

# Jalankan seeder (opsional)
php artisan db:seed

# Buat symbolic link untuk storage
php artisan storage:link
```

### **Step 6: Build Assets**
```bash
# Build untuk development
npm run dev

# Atau build untuk production
npm run build
```

---

## 🚀 **CARA MENJALANKAN**

### **A. Development Server (Laravel)**
```bash
# Jalankan development server
php artisan serve

# Server akan berjalan di: http://localhost:8000
```

### **B. Vite Development Server (Frontend)**
```bash
# Jalankan Vite server untuk hot reload
npm run dev

# Vite akan berjalan di: http://localhost:5173
```

### **C. Menggunakan Laragon/XAMPP**
1. **Laragon:**
   - Copy project ke folder `C:\laragon\www\`
   - Akses via: `http://webt.test` atau `http://localhost/webt`

2. **XAMPP:**
   - Copy project ke folder `C:\xampp\htdocs\`
   - Akses via: `http://localhost/webt`

---

## 🌐 **CARA AKSES WEBSITE**

### **A. Public Website (Frontend)**
```
URL: http://localhost:8000
atau
URL: http://webt.test (jika menggunakan Laragon)
```

**Halaman yang Tersedia:**
- **Beranda:** `/` - Halaman utama desa
- **Tentang:** `/about` - Informasi tentang desa
- **Pertanian:** `/pertanian` - Informasi pertanian
- **Profil Desa:** `/profile/*` - Halaman profil desa
- **Kontak:** `/contact` - Informasi kontak

### **B. Admin Panel (Backend)**
```
URL: http://localhost:8000/admin
atau
URL: http://webt.test/admin
```

**Fitur Admin Panel:**
- **Dashboard:** `/admin` - Dashboard utama
- **Manajemen Berita:** `/admin/news` - Kelola berita
- **Data Penduduk:** `/admin/population` - Kelola data penduduk
- **Data Pertanian:** `/admin/agricultural` - Kelola data pertanian
- **Manajemen User:** `/admin/users` - Kelola user (Super Admin)

---

## 🔐 **LOGIN ADMIN PANEL**

### **A. Membuat User Admin Pertama**
```bash
# Buat user admin via tinker
php artisan tinker

# Di dalam tinker, jalankan:
use App\Models\User;
User::create([
    'name' => 'Administrator',
    'email' => 'admin@desatetembomua.com',
    'password' => bcrypt('password123'),
    'role' => 'super_admin',
    'status' => 'active'
]);
```

### **B. Login Credentials**
```
Email: admin@desatetembomua.com
Password: password123
```

### **C. Role System**
- **Super Admin:** Akses penuh ke semua fitur
- **Admin:** Akses ke dashboard dan manajemen konten
- **Editor:** Akses terbatas untuk edit konten
- **Viewer:** Hanya bisa melihat data

---

## 📱 **STRUKTUR URL WEBSITE**

### **Public Website:**
```
http://localhost:8000/
├── /                    # Beranda
├── /about              # Tentang Desa
├── /contact            # Kontak
├── /pertanian          # Pertanian
│   ├── /               # Halaman utama pertanian
│   ├── /komoditas      # Komoditas unggulan
│   ├── /petani         # Profil petani
│   └── /teknologi      # Teknologi pertanian
└── /profile            # Profil Desa
    ├── /demografi      # Data demografi
    ├── /sejarah        # Sejarah desa
    ├── /struktur       # Struktur organisasi
    └── /visi-misi      # Visi dan misi
```

### **Admin Panel:**
```
http://localhost:8000/admin/
├── /                    # Dashboard
├── /news               # Manajemen berita
│   ├── /               # Daftar berita
│   ├── /create         # Tambah berita
│   └── /{id}/edit      # Edit berita
├── /population         # Data kependudukan
├── /agricultural       # Data pertanian
└── /users              # Manajemen user (Super Admin)
```

---

## 🔧 **KONFIGURASI TAMBAHAN**

### **A. File Upload**
```bash
# Pastikan folder storage dapat ditulis
chmod -R 775 storage/
chmod -R 775 bootstrap/cache/
```

### **B. Cache Configuration**
```bash
# Clear cache jika ada masalah
php artisan cache:clear
php artisan config:clear
php artisan view:clear
php artisan route:clear
```

### **C. Database Seeding**
```bash
# Jalankan seeder untuk data awal
php artisan db:seed --class=UserSeeder
php artisan db:seed --class=NewsSeeder
php artisan db:seed --class=PopulationDataSeeder
php artisan db:seed --class=AgriculturalDataSeeder
```

---

## 🚨 **TROUBLESHOOTING**

### **A. Error "Class not found"**
```bash
# Regenerate autoload files
composer dump-autoload
```

### **B. Error "Permission denied"**
```bash
# Set permission yang benar
chmod -R 755 storage/
chmod -R 755 bootstrap/cache/
```

### **C. Error "Database connection"**
```bash
# Cek konfigurasi database di .env
# Pastikan database sudah dibuat
# Jalankan migration ulang
php artisan migrate:fresh
```

### **D. Error "Vite manifest not found"**
```bash
# Build assets
npm run build
```

---

## 📊 **MONITORING & LOGS**

### **A. Log Files**
```bash
# Laravel logs
tail -f storage/logs/laravel.log

# Error logs
tail -f storage/logs/error.log
```

### **B. Performance Monitoring**
```bash
# Clear cache untuk performa
php artisan optimize
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

---

## 🔒 **KEAMANAN**

### **A. Environment Variables**
```bash
# Pastikan .env tidak di-commit ke Git
# Gunakan .env.example sebagai template
```

### **B. File Permissions**
```bash
# Set permission yang aman
chmod 644 .env
chmod -R 755 storage/
chmod -R 755 bootstrap/cache/
```

### **C. SSL Certificate (Production)**
```bash
# Install SSL certificate
# Konfigurasi HTTPS di web server
```

---

## 📞 **SUPPORT**

### **A. Development Issues**
- Cek Laravel documentation
- Cek error logs di `storage/logs/`
- Gunakan `php artisan --help` untuk command list

### **B. Contact Support**
- **Email:** [Email support]
- **WhatsApp:** [Nomor WhatsApp]
- **Documentation:** [Link dokumentasi]

---

## ✅ **CHECKLIST INSTALASI**

- [ ] PHP 8.2+ terinstall
- [ ] Composer terinstall
- [ ] Node.js terinstall
- [ ] Database terkonfigurasi
- [ ] Dependencies terinstall
- [ ] Environment file terkonfigurasi
- [ ] Migration berhasil dijalankan
- [ ] Storage link terbuat
- [ ] Assets ter-build
- [ ] User admin terbuat
- [ ] Website dapat diakses
- [ ] Admin panel dapat diakses

---

*Panduan ini dibuat untuk memudahkan instalasi dan akses website Desa Tetembomua.*
