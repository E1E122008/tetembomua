@extends('layouts.app')

@section('title', 'Komoditas - Desa Tetembomua')

@section('content')
<!-- Breadcrumb -->
<nav aria-label="breadcrumb" class="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
            <li class="breadcrumb-item active">Komoditas</li>
        </ol>
    </div>
</nav>

<!-- Hero Section -->
<section class="hero-section" style="min-height: 50vh;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <div class="hero-content">
                                        
                    <h1 class="display-4 fw-bold mb-4">Komoditas Pertanian Unggulan</h1>
                    <p class="lead mb-4">Kelapa Sawit, Kakao, dan Lada sebagai komoditas utama yang menjadi tulang punggung perekonomian desa</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Overview Section -->
<section class="section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4">
                <div class="komoditas-image-container">
                <img src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" 
                         alt="Komoditas Pertanian" class="img-fluid komoditas-image">
                    <div class="komoditas-image-overlay"></div>
                </div>
            </div>
            <div class="col-lg-6">
                <h2 class="mb-4">Komoditas Unggulan Desa</h2>
                <p class="mb-4">Desa Tetembomua memiliki komoditas pertanian unggulan yang menjadi andalan ekonomi masyarakat. Mayoritas penduduk desa adalah petani dengan hasil panen utama berupa sawit, kakao, dan lada. Dengan luas lahan pertanian yang subur, desa ini mampu menghasilkan produk pertanian berkualitas tinggi yang siap dipasarkan ke tingkat regional dan nasional.</p>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-seedling text-success me-3 fa-2x"></i>
                            <div>
                                <h6 class="mb-0">3 Komoditas</h6>
                                <small class="text-muted">Unggulan utama</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-leaf text-primary me-3 fa-2x"></i>
                            <div>
                                <h6 class="mb-0">100% Organik</h6>
                                <small class="text-muted">Sertifikasi organik</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Plantation Crops Section -->
<section class="section bg-light">
    <div class="container">
        <div class="section-title">
            <h2>Tanaman Perkebunan</h2>
            <p>Komoditas perkebunan unggulan yang menjadi andalan ekonomi Desa Tetembomua</p>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <img src="https://images.unsplash.com/photo-1574323347407-f5e1ad6d020b?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                         class="card-img-top" alt="Kelapa Sawit">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-seedling text-success me-2"></i>
                            Kelapa Sawit
                        </h5>
                        <p class="card-text">Kelapa sawit berkualitas tinggi yang menjadi komoditas utama Desa Tetembomua dengan hasil panen yang optimal.</p>
                        <div class="row text-center">
                            <div class="col-6">
                                <small class="text-muted">Luas Tanam</small>
                                <h6 class="mb-0">800 Ha</h6>
                            </div>
                            <div class="col-6">
                                <small class="text-muted">Produksi</small>
                                <h6 class="mb-0">12,000 Ton</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <img src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                         class="card-img-top" alt="Kakao">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-seedling text-warning me-2"></i>
                            Kakao
                        </h5>
                        <p class="card-text">Kakao berkualitas premium yang menghasilkan biji kakao dengan cita rasa yang unggul untuk industri cokelat.</p>
                        <div class="row text-center">
                            <div class="col-6">
                                <small class="text-muted">Luas Tanam</small>
                                <h6 class="mb-0">300 Ha</h6>
                            </div>
                            <div class="col-6">
                                <small class="text-muted">Produksi</small>
                                <h6 class="mb-0">450 Ton</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <img src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                         class="card-img-top" alt="Lada">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-seedling text-info me-2"></i>
                            Lada
                        </h5>
                        <p class="card-text">Lada berkualitas tinggi yang menjadi komoditas rempah-rempah unggulan dengan aroma dan rasa yang kuat.</p>
                        <div class="row text-center">
                            <div class="col-6">
                                <small class="text-muted">Luas Tanam</small>
                                <h6 class="mb-0">150 Ha</h6>
                            </div>
                            <div class="col-6">
                                <small class="text-muted">Produksi</small>
                                <h6 class="mb-0">75 Ton</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Horticulture Section -->
<section class="section">
    <div class="container">
        <div class="section-title">
            <h2>Hortikultura</h2>
            <p>Sayuran dan buah-buahan segar yang berkualitas tinggi</p>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card h-100">
                    <img src="https://images.unsplash.com/photo-1574323347407-f5e1ad6d020b?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                         class="card-img-top" alt="Tomat">
                    <div class="card-body text-center">
                        <h6 class="card-title">Tomat Cherry</h6>
                        <p class="card-text small">Tomat cherry organik yang manis dan segar.</p>
                        <span class="badge bg-success">Organik</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card h-100">
                    <img src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                         class="card-img-top" alt="Cabai">
                    <div class="card-body text-center">
                        <h6 class="card-title">Cabai Merah</h6>
                        <p class="card-text small">Cabai merah yang pedas dan berkualitas tinggi.</p>
                        <span class="badge bg-success">Organik</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card h-100">
                    <img src="https://images.unsplash.com/photo-1574323347407-f5e1ad6d020b?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                         class="card-img-top" alt="Terong">
                    <div class="card-body text-center">
                        <h6 class="card-title">Terong Ungu</h6>
                        <p class="card-text small">Terong ungu yang segar dan bergizi tinggi.</p>
                        <span class="badge bg-success">Organik</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card h-100">
                    <img src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                         class="card-img-top" alt="Bayam">
                    <div class="card-body text-center">
                        <h6 class="card-title">Bayam Hijau</h6>
                        <p class="card-text small">Bayam hijau yang kaya zat besi dan vitamin.</p>
                        <span class="badge bg-success">Organik</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Fruits Section -->
<section class="section bg-light">
    <div class="container">
        <div class="section-title">
            <h2>Buah-Buahan</h2>
            <p>Buah-buahan segar yang dipanen langsung dari kebun desa</p>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <img src="https://images.unsplash.com/photo-1574323347407-f5e1ad6d020b?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                         class="card-img-top" alt="Pisang">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-apple-alt text-warning me-2"></i>
                            Pisang Raja
                        </h5>
                        <p class="card-text">Pisang raja yang manis dan bergizi tinggi, cocok untuk konsumsi langsung maupun olahan.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="badge bg-success">Organik</span>
                            <small class="text-muted">Panen: 3x setahun</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <img src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                         class="card-img-top" alt="Pepaya">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-apple-alt text-warning me-2"></i>
                            Pepaya California
                        </h5>
                        <p class="card-text">Pepaya California yang manis dan segar, kaya akan vitamin C dan serat.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="badge bg-success">Organik</span>
                            <small class="text-muted">Panen: Sepanjang tahun</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <img src="https://images.unsplash.com/photo-1574323347407-f5e1ad6d020b?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                         class="card-img-top" alt="Jeruk">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-apple-alt text-warning me-2"></i>
                            Jeruk Siam
                        </h5>
                        <p class="card-text">Jeruk Siam yang manis dan segar, kaya akan vitamin C untuk kesehatan.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="badge bg-success">Organik</span>
                            <small class="text-muted">Panen: Musim kemarau</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Spices Section -->
<section class="section">
    <div class="container">
        <div class="section-title">
            <h2>Rempah-Rempah</h2>
            <p>Rempah-rempah berkualitas yang menjadi bumbu dapur</p>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-seedling fa-3x text-success mb-3"></i>
                        <h6 class="card-title">Kunyit</h6>
                        <p class="card-text small">Kunyit organik yang berkhasiat untuk kesehatan.</p>
                        <span class="badge bg-success">Organik</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-seedling fa-3x text-warning mb-3"></i>
                        <h6 class="card-title">Jahe</h6>
                        <p class="card-text small">Jahe merah yang berkhasiat untuk kesehatan.</p>
                        <span class="badge bg-success">Organik</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-seedling fa-3x text-primary mb-3"></i>
                        <h6 class="card-title">Lengkuas</h6>
                        <p class="card-text small">Lengkuas yang segar untuk bumbu masakan.</p>
                        <span class="badge bg-success">Organik</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-seedling fa-3x text-info mb-3"></i>
                        <h6 class="card-title">Kencur</h6>
                        <p class="card-text small">Kencur yang berkhasiat untuk kesehatan.</p>
                        <span class="badge bg-success">Organik</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Quality Standards Section -->
<section class="section bg-light">
    <div class="container">
        <div class="section-title">
            <h2>Standar Kualitas</h2>
            <p>Komitmen kami dalam menghasilkan produk berkualitas tinggi</p>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-certificate fa-3x text-primary mb-3"></i>
                        <h5 class="card-title">Sertifikasi Organik</h5>
                        <p class="card-text">Semua produk telah bersertifikasi organik dari lembaga sertifikasi terakreditasi.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-leaf fa-3x text-success mb-3"></i>
                        <h5 class="card-title">Ramah Lingkungan</h5>
                        <p class="card-text">Pertanian yang ramah lingkungan tanpa penggunaan pestisida kimia.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-heart fa-3x text-danger mb-3"></i>
                        <h5 class="card-title">Sehat & Bergizi</h5>
                        <p class="card-text">Produk yang sehat dan bergizi tinggi untuk konsumen.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="section bg-primary text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h3>Ingin Membeli Produk Kami?</h3>
                <p class="mb-0">Hubungi kami untuk informasi pemesanan dan kerjasama bisnis produk pertanian Desa Tetembomua.</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="{{ route('contact') }}" class="btn btn-light btn-lg">
                    <i class="fas fa-shopping-cart me-2"></i>Hubungi Kami
                </a>
            </div>
        </div>
    </div>
</section>
<style>
/* Custom color classes for consistency */
.text-primary {
    color: var(--primary-green) !important;
}

.text-success {
    color: var(--secondary-green) !important;
}

.text-warning {
    color: var(--light-brown) !important;
}

.text-info {
    color: var(--accent-brown) !important;
}

.bg-primary {
    background: linear-gradient(135deg, var(--primary-green), var(--secondary-green)) !important;
}

.bg-success {
    background-color: var(--secondary-green) !important;
}

.bg-warning {
    background-color: var(--light-brown) !important;
}

.bg-info {
    background-color: var(--accent-brown) !important;
}

.btn-outline-primary {
    border-color: var(--primary-green);
    color: var(--primary-green);
}

.btn-outline-primary:hover {
    background: var(--primary-gradient);
    border-color: var(--primary-green);
}

/* Komoditas Image Styles */
.komoditas-image-container {
    position: relative;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 15px 35px rgba(46, 139, 87, 0.2);
}

.komoditas-image {
    border-radius: 20px;
    transition: transform 0.5s ease;
}

.komoditas-image-container:hover .komoditas-image {
    transform: scale(1.03);
}

.komoditas-image-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, 
        rgba(46, 139, 87, 0.1), 
        rgba(60, 179, 113, 0.05), 
        rgba(32, 178, 170, 0.1));
    border-radius: 20px;
}

/* Card Image Styles */
.card-img-top {
    height: 200px;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.card:hover .card-img-top {
    transform: scale(1.05);
}
</style>
@endsection
