@extends('layouts.app')

@section('title', 'Demografi - Desa Tetembomua')

@section('content')
<!-- Breadcrumb -->
<nav aria-label="breadcrumb" class="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
            <li class="breadcrumb-item"><a href="#">Profil Desa</a></li>
            <li class="breadcrumb-item active">Demografi</li>
        </ol>
    </div>
</nav>

<!-- Hero Section -->
<section class="hero-section" style="min-height: 50vh;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 mx-auto text-center">
                <h1>Demografi Desa Tetembomua</h1>
                <p>Data kependudukan dan statistik demografis yang menggambarkan kondisi masyarakat desa</p>
            </div>
        </div>
    </div>
</section>

<!-- Overview Section -->
<section class="section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4">
                <div class="demografi-image-container">
                    <img src="https://images.unsplash.com/photo-1574323347407-f5e1ad6d020b?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" 
                         alt="Demografi Desa" class="img-fluid demografi-image">
                    <div class="demografi-image-overlay"></div>
                </div>
            </div>
            <div class="col-lg-6">
                <h2 class="mb-4">Profil Kependudukan</h2>
                <p class="mb-4">Desa Tetembomua memiliki jumlah penduduk yang terus berkembang dengan komposisi yang seimbang. Masyarakat desa dikenal dengan semangat gotong royong yang tinggi dan komitmen untuk mengembangkan sektor pertanian secara berkelanjutan.</p>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-users text-primary me-3 fa-2x"></i>
                            <div>
                                <h6 class="mb-0">2,500+ Jiwa</h6>
                                <small class="text-muted">Total penduduk</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-home text-success me-3 fa-2x"></i>
                            <div>
                                <h6 class="mb-0">500+ KK</h6>
                                <small class="text-muted">Kartu keluarga</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Population Statistics Section -->
<section class="section bg-light">
    <div class="container">
        <div class="section-title">
            <h2>Statistik Kependudukan</h2>
            <p>Data lengkap tentang jumlah dan komposisi penduduk Desa Tetembomua</p>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-users fa-3x text-primary mb-3"></i>
                        <h3 class="card-title text-primary">2,547</h3>
                        <p class="card-text">Total Penduduk</p>
                        <small class="text-muted">Update: Desember 2024</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-male fa-3x text-success mb-3"></i>
                        <h3 class="card-title text-success">1,298</h3>
                        <p class="card-text">Laki-laki</p>
                        <small class="text-muted">51% dari total</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-female fa-3x text-warning mb-3"></i>
                        <h3 class="card-title text-warning">1,249</h3>
                        <p class="card-text">Perempuan</p>
                        <small class="text-muted">49% dari total</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-home fa-3x text-info mb-3"></i>
                        <h3 class="card-title text-info">523</h3>
                        <p class="card-text">Kartu Keluarga</p>
                        <small class="text-muted">Rata-rata 4.9 jiwa/KK</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Wilayah Section -->
<section class="section">
    <div class="container">
        <div class="section-title">
            <h2>Informasi Wilayah</h2>
            <p>Data luas wilayah dan pembagian administratif desa</p>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-map-marked-alt fa-3x text-primary mb-3"></i>
                        <h5 class="card-title">Luas Wilayah</h5>
                        <h3 class="text-primary">2,500 Ha</h3>
                        <p class="card-text">Total luas wilayah Desa Tetembomua</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-home fa-3x text-warning mb-3"></i>
                        <h5 class="card-title">Jumlah Dusun</h5>
                        <h3 class="text-warning">4 Dusun</h3>
                        <p class="card-text">Dusun A, B, C, dan D</p>
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
                <h3>Data Demografi Terkini</h3>
                <p class="mb-0">Untuk informasi demografi yang lebih detail dan terkini, silakan hubungi kantor desa atau kunjungi langsung.</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="{{ route('contact') }}" class="btn btn-light btn-lg">
                    <i class="fas fa-info-circle me-2"></i>Informasi Lebih Lanjut
                </a>
            </div>
        </div>
    </div>
</section>

<style>
.age-group, .education-level {
    margin-bottom: 1rem;
}

.progress {
    height: 8px;
    border-radius: 4px;
}

.progress-bar {
    border-radius: 4px;
}

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
    background: var(--primary-gradient) !important;
}

/* Demografi Image Styles */
.demografi-image-container {
    position: relative;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 15px 35px rgba(46, 139, 87, 0.2);
}

.demografi-image {
    border-radius: 20px;
    transition: transform 0.5s ease;
}

.demografi-image-container:hover .demografi-image {
    transform: scale(1.03);
}

.demografi-image-overlay {
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
</style>
@endsection
