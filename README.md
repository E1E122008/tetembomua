# Website Profil Desa Tetembomua

Website profil desa dengan tema pertanian yang modern dan menarik untuk Desa Tetembomua, Kecamatan Lambuya, Kabupaten Konawe, Provinsi Sulawesi Tenggara. Dibangun menggunakan framework Laravel dengan desain responsif dan user experience yang optimal.

## 🚀 Fitur Utama

### 📱 Desain Responsif
- Tampilan yang optimal di desktop, tablet, dan mobile
- Navigasi yang mudah dan intuitif
- Loading yang cepat dan smooth

### 🎨 Tema Pertanian Modern
- Warna-warna hijau yang mencerminkan tema pertanian
- Animasi dan transisi yang menarik
- Layout yang clean dan profesional

### 📄 Halaman Lengkap
- **Beranda**: Overview desa dengan statistik dan informasi utama
- **Profil Desa**: Sejarah, visi-misi, struktur organisasi, demografi
- **Sektor Pertanian**: Informasi lengkap tentang pertanian desa
- **Komoditas**: Detail produk pertanian unggulan
- **Teknologi**: Inovasi teknologi pertanian yang diterapkan
- **Data Petani**: Profil petani-petani handal
- **Tentang**: Informasi lengkap tentang desa
- **Kontak**: Form kontak dan informasi lengkap

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
