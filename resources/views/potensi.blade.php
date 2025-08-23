@extends('layouts.app')

@section('title', 'Potensi Desa - Desa Tetembomua')

@section('content')
<!-- Hero Section -->
<section class="hero-section" style="background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('/FOTO/DSC_0596.JPG') center/cover;">
    <div class="container">
        <div class="row align-items-center min-vh-50">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-4 fw-bold text-white mb-4">Potensi Desa Tetembomua</h1>
                <p class="lead text-white mb-0">Menggali dan Mengembangkan Sumber Daya Lokal untuk Kesejahteraan Masyarakat</p>
            </div>
        </div>
    </div>
</section>

<!-- Potensi Pertanian -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center mb-5">
                <h2 class="section-title">Potensi Pertanian</h2>
                <div class="title-underline"></div>
                <p class="text-muted">Sektor pertanian menjadi tulang punggung perekonomian desa</p>
            </div>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="potensi-card">
                    <div class="card-icon">
                        <i class="fas fa-seedling"></i>
                    </div>
                    <h4>Komoditas Unggulan</h4>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-check text-success me-2"></i>Padi Sawah</li>
                        <li><i class="fas fa-check text-success me-2"></i>Jagung</li>
                        <li><i class="fas fa-check text-success me-2"></i>Kedelai</li>
                        <li><i class="fas fa-check text-success me-2"></i>Sayuran</li>
                    </ul>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="potensi-card">
                    <div class="card-icon">
                        <i class="fas fa-tree"></i>
                    </div>
                    <h4>Perkebunan</h4>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-check text-success me-2"></i>Kelapa</li>
                        <li><i class="fas fa-check text-success me-2"></i>Kakao</li>
                        <li><i class="fas fa-check text-success me-2"></i>Kopi</li>
                        <li><i class="fas fa-check text-success me-2"></i>Pala</li>
                    </ul>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="potensi-card">
                    <div class="card-icon">
                        <i class="fas fa-cow"></i>
                    </div>
                    <h4>Peternakan</h4>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-check text-success me-2"></i>Sapi Potong</li>
                        <li><i class="fas fa-check text-success me-2"></i>Ayam Kampung</li>
                        <li><i class="fas fa-check text-success me-2"></i>Kambing</li>
                        <li><i class="fas fa-check text-success me-2"></i>Ikan Lele</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Potensi Pariwisata -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center mb-5">
                <h2 class="section-title">Potensi Pariwisata</h2>
                <div class="title-underline"></div>
                <p class="text-muted">Keindahan alam dan budaya lokal yang menarik</p>
            </div>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="potensi-card">
                    <div class="card-icon">
                        <i class="fas fa-mountain"></i>
                    </div>
                    <h4>Wisata Alam</h4>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-check text-success me-2"></i>Pemandangan Gunung</li>
                        <li><i class="fas fa-check text-success me-2"></i>Persawahan Terasering</li>
                        <li><i class="fas fa-check text-success me-2"></i>Air Terjun</li>
                        <li><i class="fas fa-check text-success me-2"></i>Hutan Lindung</li>
                    </ul>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="potensi-card">
                    <div class="card-icon">
                        <i class="fas fa-drum"></i>
                    </div>
                    <h4>Wisata Budaya</h4>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-check text-success me-2"></i>Rumah Adat</li>
                        <li><i class="fas fa-check text-success me-2"></i>Tarian Tradisional</li>
                        <li><i class="fas fa-check text-success me-2"></i>Kerajinan Tangan</li>
                        <li><i class="fas fa-check text-success me-2"></i>Kuliner Lokal</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Potensi UMKM -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center mb-5">
                <h2 class="section-title">Potensi UMKM</h2>
                <div class="title-underline"></div>
                <p class="text-muted">Usaha Mikro Kecil dan Menengah yang berkembang</p>
            </div>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="potensi-card">
                    <div class="card-icon">
                        <i class="fas fa-utensils"></i>
                    </div>
                    <h4>Makanan & Minuman</h4>
                    <p>Produksi makanan tradisional dan olahan hasil pertanian</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="potensi-card">
                    <div class="card-icon">
                        <i class="fas fa-hands-helping"></i>
                    </div>
                    <h4>Kerajinan</h4>
                    <p>Anyaman bambu, ukiran kayu, dan kerajinan tangan lainnya</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="potensi-card">
                    <div class="card-icon">
                        <i class="fas fa-tshirt"></i>
                    </div>
                    <h4>Konveksi</h4>
                    <p>Produksi pakaian dan tekstil untuk kebutuhan lokal</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="potensi-card">
                    <div class="card-icon">
                        <i class="fas fa-tools"></i>
                    </div>
                    <h4>Jasa</h4>
                    <p>Bengkel, salon, dan berbagai jasa lainnya</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Potensi Sumber Daya Alam -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center mb-5">
                <h2 class="section-title">Sumber Daya Alam</h2>
                <div class="title-underline"></div>
                <p class="text-muted">Kekayaan alam yang dapat dikembangkan</p>
            </div>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="potensi-card">
                    <div class="card-icon">
                        <i class="fas fa-tint"></i>
                    </div>
                    <h4>Sumber Air</h4>
                    <p>Mata air alami yang melimpah untuk kebutuhan pertanian dan air bersih</p>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="potensi-card">
                    <div class="card-icon">
                        <i class="fas fa-leaf"></i>
                    </div>
                    <h4>Hutan</h4>
                    <p>Hutan lindung dan hutan produksi yang dapat dikelola secara berkelanjutan</p>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="potensi-card">
                    <div class="card-icon">
                        <i class="fas fa-sun"></i>
                    </div>
                    <h4>Energi Terbarukan</h4>
                    <p>Potensi energi surya dan mikrohidro untuk pembangkit listrik</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-5" style="background: var(--primary-gradient);">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h3 class="text-white mb-4">Mari Bersama Mengembangkan Potensi Desa</h3>
                <p class="text-white mb-4">Kami mengundang investor, mitra, dan semua pihak untuk berkolaborasi dalam mengembangkan potensi Desa Tetembomua</p>
                <a href="{{ route('contact') }}" class="btn btn-light btn-lg">Hubungi Kami</a>
            </div>
        </div>
    </div>
</section>

<style>
.potensi-card {
    background: white;
    padding: 2rem;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    text-align: center;
    transition: all 0.3s ease;
    height: 100%;
}

.potensi-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.15);
}

.card-icon {
    width: 80px;
    height: 80px;
    background: var(--primary-gradient);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
}

.card-icon i {
    font-size: 2rem;
    color: white;
}

.potensi-card h4 {
    color: var(--primary-green);
    margin-bottom: 1rem;
    font-weight: 600;
}

.potensi-card ul li {
    margin-bottom: 0.5rem;
    color: var(--text-dark);
}

.potensi-card p {
    color: var(--text-light);
    line-height: 1.6;
}
</style>
@endsection

