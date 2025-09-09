# 🌐 Sistem Media Sosial Dinamis - Desa Tetembomua

## 📋 **Overview**

Sistem media sosial dinamis yang memungkinkan admin untuk mengelola semua link dan handle media sosial melalui admin panel, tanpa perlu mengubah kode.

## 🏗️ **Struktur Sistem**

### **1. Database Schema**
```sql
-- Tabel settings dengan field social_media (JSON)
social_media: {
    "facebook": "https://facebook.com/desatetembomua",
    "facebook_handle": "DesaTetembomua",
    "instagram": "https://instagram.com/desatetembomua", 
    "instagram_handle": "desa_tetembomua",
    "youtube": "https://youtube.com/@desatetembomua",
    "youtube_handle": "Desa Tetembomua",
    "whatsapp": "https://wa.me/6281234567890",
    "whatsapp_number": "+62 812-3456-7890"
}
```

### **2. Komponen Reusable**
- **File**: `resources/views/components/social-media.blade.php`
- **Fitur**: Komponen Blade yang dapat digunakan di berbagai halaman
- **Props**: `showTitle`, `title`, `subtitle`, `class`, `size`

### **3. Admin Management**
- **Halaman**: `/admin/settings`
- **Fitur**: Form lengkap untuk mengelola semua media sosial
- **Validasi**: URL validation untuk semua platform

## 🚀 **Cara Penggunaan**

### **1. Untuk Admin (Mengelola Media Sosial)**

#### **Akses Admin Panel:**
1. Login ke admin panel: `/admin/login`
2. Navigasi ke **Pengaturan** → **Update Pengaturan**
3. Scroll ke bagian **Media Sosial**
4. Isi form dengan data yang benar:

```html
Facebook URL: https://facebook.com/desatetembomua
Facebook Handle: DesaTetembomua

Instagram URL: https://instagram.com/desatetembomua
Instagram Handle: desa_tetembomua

YouTube URL: https://youtube.com/@desatetembomua
YouTube Handle: Desa Tetembomua

WhatsApp URL: https://wa.me/6281234567890
WhatsApp Number: +62 812-3456-7890
```

#### **Format URL yang Benar:**
- **Facebook**: `https://facebook.com/username` atau `https://fb.com/username`
- **Instagram**: `https://instagram.com/username`
- **YouTube**: `https://youtube.com/@channel` atau `https://youtube.com/c/channel`
- **WhatsApp**: `https://wa.me/6281234567890` (format internasional)

### **2. Untuk Developer (Menggunakan Komponen)**

#### **Basic Usage:**
```blade
<x-social-media />
```

#### **Custom Usage:**
```blade
<x-social-media 
    :show-title="true"
    title="Follow Us"
    subtitle="Stay connected with us"
    size="large"
    class="my-custom-class"
/>
```

#### **Size Options:**
- `small` - Icons 2x, cards col-md-2
- `normal` - Icons 3x, cards col-md-3 (default)
- `large` - Icons 4x, cards col-md-3

#### **Hide Title:**
```blade
<x-social-media :show-title="false" />
```

### **3. Untuk Frontend (Manual Implementation)**

#### **Menggunakan SettingsHelper:**
```php
@php
    $socialMedia = \App\Helpers\SettingsHelper::get('social_media', []);
    $villageName = \App\Helpers\SettingsHelper::get('village_name', 'Desa Tetembomua');
@endphp

<a href="{{ $socialMedia['facebook'] ?? '#' }}" target="_blank" rel="noopener">
    <i class="fab fa-facebook"></i>
    @{{ $socialMedia['facebook_handle'] ?? $villageName }}
</a>
```

## 🔧 **Setup & Installation**

### **1. Run Seeder (Optional)**
```bash
php artisan db:seed --class=SocialMediaSeeder
```

### **2. Clear Cache**
```bash
php artisan cache:clear
php artisan config:clear
```

### **3. Test Setup**
1. Visit `/contact` - Lihat section "Ikuti Kami"
2. Visit `/admin/settings` - Test form media sosial
3. Update settings dan lihat perubahan di frontend

## 📱 **Platform yang Didukung**

### **1. Facebook**
- **URL**: Link ke halaman Facebook
- **Handle**: Username yang ditampilkan (tanpa @)
- **Icon**: `fab fa-facebook`
- **Color**: Primary blue

### **2. Instagram**
- **URL**: Link ke profil Instagram
- **Handle**: Username yang ditampilkan (tanpa @)
- **Icon**: `fab fa-instagram`
- **Color**: Gradient (pink-red)

### **3. YouTube**
- **URL**: Link ke channel YouTube
- **Handle**: Nama channel yang ditampilkan
- **Icon**: `fab fa-youtube`
- **Color**: Red

### **4. WhatsApp**
- **URL**: Link WhatsApp dengan nomor
- **Number**: Nomor yang ditampilkan
- **Icon**: `fab fa-whatsapp`
- **Color**: Green

## 🎨 **Styling & Customization**

### **CSS Classes:**
```css
.social-media-section     /* Container utama */
.social-card             /* Card individual */
.social-link             /* Link wrapper */
.social-card:hover       /* Hover effect */
```

### **Custom Styling:**
```blade
<x-social-media class="my-custom-social" />
```

```css
.my-custom-social .social-card {
    border-radius: 20px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}
```

## 🔄 **Antisipasi Perubahan Akun**

### **1. Backup & Restore**
- Data tersimpan di database `settings` table
- Export/import settings untuk backup
- Seeder untuk restore default values

### **2. Fallback System**
- Jika URL kosong, link ke `#`
- Jika handle kosong, gunakan nama desa
- Default values di `SettingsHelper`

### **3. Cache Management**
- Cache otomatis clear saat update
- Manual clear: `SettingsHelper::clearCache()`
- Cache duration: 1 jam

## 🐛 **Troubleshooting**

### **Problem**: Link tidak berfungsi
**Solution**: 
1. Pastikan URL format benar
2. Test URL di browser
3. Clear cache: `php artisan cache:clear`

### **Problem**: Handle tidak muncul
**Solution**:
1. Check database `social_media` field
2. Pastikan handle tidak kosong
3. Check fallback logic di komponen

### **Problem**: Styling tidak sesuai
**Solution**:
1. Check CSS conflicts
2. Override dengan custom CSS
3. Check Bootstrap version compatibility

## 📊 **Monitoring & Analytics**

### **1. Track Clicks (Optional)**
```javascript
// Add to social-media.blade.php
document.querySelectorAll('.social-link').forEach(link => {
    link.addEventListener('click', function(e) {
        // Track click event
        console.log('Social media clicked:', this.href);
    });
});
```

### **2. Google Analytics**
```javascript
// Track social media clicks
gtag('event', 'click', {
    'event_category': 'Social Media',
    'event_label': 'Facebook'
});
```

## 🚀 **Future Enhancements**

### **1. Additional Platforms**
- Twitter/X
- TikTok
- LinkedIn
- Telegram

### **2. Advanced Features**
- QR Code generator
- Social media analytics
- Auto-update from API
- Bulk import/export

### **3. Mobile Optimization**
- Touch-friendly buttons
- Swipe gestures
- Mobile-specific layouts

## 📝 **Best Practices**

### **1. URL Management**
- Selalu gunakan HTTPS
- Test semua link sebelum deploy
- Update handle saat ganti akun

### **2. Content Strategy**
- Konsisten dengan branding
- Update handle sesuai platform
- Monitor engagement

### **3. Security**
- Validasi URL input
- Sanitize user input
- Prevent XSS attacks

---

**Sistem ini memberikan fleksibilitas penuh untuk admin dalam mengelola media sosial tanpa perlu mengubah kode!** 🎯✨
