# 🌾 Website Profil Desa Tetembomua

Website profil desa dengan tema pertanian yang modern dan menarik untuk **Desa Tetembomua, Kecamatan Lambuya, Kabupaten Konawe, Provinsi Sulawesi Tenggara**. Dibangun menggunakan framework Laravel dengan desain responsif dan user experience yang optimal.

## 🚀 Quick Start

### **Cara Cepat Menjalankan (Windows)**
```bash
# 1. Double click file setup.bat
# 2. Ikuti instruksi yang muncul
# 3. Jalankan server
php artisan serve
```

### **Cara Cepat Menjalankan (Linux/Mac)**
```bash
# 1. Berikan permission execute
chmod +x setup.sh

# 2. Jalankan script setup
./setup.sh

# 3. Jalankan server
php artisan serve
```

## 🌐 Akses Website

### **Public Website**
```
URL: http://localhost:8000
```

### **Admin Panel**
```
URL: http://localhost:8000/admin
Email: admin@desatetembomua.com
Password: password123
```

## 📋 Fitur Utama

### **Public Website**
- ✅ Desain responsif dan modern
- ✅ Tema pertanian yang menarik
- ✅ Navigasi yang mudah dan intuitif
- ✅ Konten yang informatif dan terstruktur
- ✅ Optimasi SEO
- ✅ Performa yang cepat
- ✅ Kompatibilitas multi-browser

### **Admin Panel**
- ✅ Dashboard dengan statistik
- ✅ Manajemen berita (CRUD)
- ✅ Update data kependudukan
- ✅ Manajemen data pertanian
- ✅ Upload gambar dan dokumen
- ✅ Role-based access control
- ✅ User management

## 🛠️ Teknologi

- **Backend:** Laravel 12.x (PHP 8.2+)
- **Frontend:** Bootstrap 5.3.0
- **Database:** MySQL/PostgreSQL/SQLite
- **Build Tool:** Vite
- **Icon:** Font Awesome 6.4.0
- **Font:** Google Fonts (Poppins)

## 📁 Struktur Proyek

```
webt/
├── app/
│   ├── Http/Controllers/
│   │   ├── Admin/           # Admin controllers
│   │   └── ...              # Public controllers
│   ├── Models/              # Database models
│   └── Http/Middleware/     # Custom middleware
├── resources/views/
│   ├── admin/               # Admin panel views
│   ├── layouts/             # Layout templates
│   ├── pertanian/           # Agriculture pages
│   └── profile/             # Village profile pages
├── routes/
│   ├── web.php              # Public routes
│   └── admin.php            # Admin routes
└── database/migrations/     # Database migrations
```

## 🔧 Instalasi Manual

### **Prerequisites**
- PHP 8.2+
- Composer
- Node.js 18+
- MySQL/PostgreSQL/SQLite

### **Steps**
```bash
# 1. Clone repository
git clone [URL_REPOSITORY]
cd webt

# 2. Install dependencies
composer install
npm install

# 3. Setup environment
cp .env.example .env
php artisan key:generate

# 4. Configure database in .env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=desa_tetembomua
DB_USERNAME=root
DB_PASSWORD=your_password

# 5. Run migrations
php artisan migrate

# 6. Create storage link
php artisan storage:link

# 7. Build assets
npm run build

# 8. Create admin user
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

# 9. Start server
php artisan serve
```

## 📱 Halaman Website

### **Public Pages**
- **Beranda** (`/`) - Halaman utama desa
- **Tentang** (`/about`) - Informasi tentang desa
- **Pertanian** (`/pertanian`) - Informasi pertanian
- **Profil Desa** (`/profile/*`) - Halaman profil desa
- **Kontak** (`/contact`) - Informasi kontak

### **Admin Pages**
- **Dashboard** (`/admin`) - Dashboard utama
- **Berita** (`/admin/news`) - Manajemen berita
- **Data Penduduk** (`/admin/population`) - Data kependudukan
- **Data Pertanian** (`/admin/agricultural`) - Data pertanian
- **User** (`/admin/users`) - Manajemen user

## 🔐 Role System

- **Super Admin:** Akses penuh ke semua fitur
- **Admin:** Akses ke dashboard dan manajemen konten
- **Editor:** Akses terbatas untuk edit konten
- **Viewer:** Hanya bisa melihat data

## 🚨 Troubleshooting

### **Common Issues**
```bash
# Error "Class not found"
composer dump-autoload

# Error "Permission denied"
chmod -R 755 storage/
chmod -R 755 bootstrap/cache/

# Error "Vite manifest not found"
npm run build

# Clear cache
php artisan cache:clear
php artisan config:clear
php artisan view:clear
```

## 📞 Support

- **Email:** [Email support]
- **WhatsApp:** [Nomor WhatsApp]
- **Documentation:** [Link dokumentasi]

## 📄 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

---

**"Teknologi untuk Desa, Desa untuk Masa Depan"** 🌾

## 🛠️ Teknologi yang Digunakan

- **Framework**: Laravel 12.x
- **Frontend**: Bootstrap 5.3.0
- **Icons**: Font Awesome 6.4.0
- **Fonts**: Google Fonts (Poppins)
- **Images**: Unsplash (placeholder images)

## 📋 Persyaratan Sistem

- PHP >= 8.1
- Composer
- Web Server (Apache/Nginx)
- Database (MySQL/PostgreSQL/SQLite)

## 🚀 Cara Instalasi

### 1. Clone Repository
```bash
git clone <repository-url>
cd desa-tetembomua
```

### 2. Install Dependencies
```bash
composer install
```

### 3. Setup Environment
```bash
cp .env.example .env
php artisan key:generate
```

### 4. Konfigurasi Database
Edit file `.env` dan sesuaikan konfigurasi database:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=desa_tetembomua
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Jalankan Migration (Opsional)
```bash
php artisan migrate
```

### 6. Jalankan Server
```bash
php artisan serve
```

Website akan tersedia di `http://localhost:8000`

## 📁 Struktur Proyek

```
desa-tetembomua/
├── app/
│   └── Http/Controllers/
│       ├── HomeController.php
│       ├── ProfileController.php
│       └── PertanianController.php
├── resources/
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php
│       ├── profile/
│       │   ├── sejarah.blade.php
│       │   └── visi-misi.blade.php
│       ├── pertanian/
│       │   ├── index.blade.php
│       │   └── komoditas.blade.php
│       ├── home.blade.php
│       ├── about.blade.php
│       └── contact.blade.php
├── routes/
│   └── web.php
└── public/
    └── assets/
```

## 🎨 Customization

### Mengubah Warna Tema
Edit file `resources/views/layouts/app.blade.php` dan ubah variabel CSS:
```css
:root {
    --primary-green: #2E7D32;
    --secondary-green: #4CAF50;
    --light-green: #81C784;
    --dark-green: #1B5E20;
    --accent-orange: #FF9800;
}
```

### Mengubah Konten
- Edit file view di folder `resources/views/`
- Sesuaikan informasi desa, statistik, dan konten lainnya
- Ganti gambar placeholder dengan gambar asli desa

### Menambah Halaman Baru
1. Buat controller baru: `php artisan make:controller NamaController`
2. Tambahkan route di `routes/web.php`
3. Buat view di folder yang sesuai

## 📱 Responsive Design

Website ini sudah dioptimalkan untuk berbagai ukuran layar:
- **Desktop**: Layout penuh dengan sidebar dan navigasi lengkap
- **Tablet**: Layout menyesuaikan dengan ukuran tablet
- **Mobile**: Layout single column dengan navigasi hamburger

## 🔧 Maintenance

### Update Dependencies
```bash
composer update
```

### Clear Cache
```bash
php artisan cache:clear
php artisan config:clear
php artisan view:clear
```

### Backup Database
```bash
php artisan backup:run
```

## 📞 Kontak & Support

Untuk pertanyaan atau dukungan teknis, silakan hubungi:
- Email: support@desatetembomua.id
- WhatsApp: +62 812-3456-7890

## 📄 Lisensi

Proyek ini dibuat untuk Desa Tetembomua. Semua hak cipta dilindungi.

## 🙏 Ucapan Terima Kasih

Terima kasih kepada:
- Framework Laravel untuk kemudahan pengembangan
- Bootstrap untuk komponen UI yang responsif
- Font Awesome untuk icon-icon yang menarik
- Unsplash untuk gambar placeholder yang berkualitas

---

**Dibuat dengan ❤️ untuk Desa Tetembomua**
