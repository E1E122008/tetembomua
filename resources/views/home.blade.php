@extends('layouts.app')

@section('title', 'Beranda - Desa Tetembomua')

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="hero-content">
                    <h1>Selamat Datang di Desa Tetembomua</h1>
                    <p>Desa yang kaya akan potensi pertanian dengan masyarakat yang ramah dan produktif dalam mengembangkan sektor pertanian yang berkelanjutan.</p>
                    <div class="d-flex gap-3">
                        <a href="{{ route('profile.sejarah') }}" class="btn btn-primary">
                            <i class="fas fa-book me-2"></i>Pelajari Sejarah
                        </a>
                        <a href="{{ route('pertanian.index') }}" class="btn btn-outline-primary">
                            <i class="fas fa-seedling me-2"></i>Sektor Pertanian
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="text-center">
                    <img src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" 
                         alt="Pertanian Desa Tetembomua" class="img-fluid rounded-3 shadow-lg">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Quick Stats Section -->
<section class="section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-users fa-3x text-primary mb-3"></i>
                        <h4 class="card-title">2,500+</h4>
                        <p class="card-text">Jumlah Penduduk</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-seedling fa-3x text-success mb-3"></i>
                        <h4 class="card-title">500+</h4>
                        <p class="card-text">Petani Aktif</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-map-marked-alt fa-3x text-warning mb-3"></i>
                        <h4 class="card-title">1,200 Ha</h4>
                        <p class="card-text">Luas Lahan Pertanian</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-leaf fa-3x text-info mb-3"></i>
                        <h4 class="card-title">15+</h4>
                        <p class="card-text">Jenis Komoditas</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="section">
    <div class="container">
        <div class="section-title">
            <h2>Tentang Desa Tetembomua</h2>
            <p>Mengenal lebih dekat desa kami yang kaya akan budaya dan potensi pertanian</p>
        </div>
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4">
                <img src="https://images.unsplash.com/photo-1574323347407-f5e1ad6d020b?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" 
                     alt="Desa Tetembomua" class="img-fluid rounded-3 shadow">
            </div>
            <div class="col-lg-6">
                <h3 class="mb-4">Desa yang Berkelanjutan</h3>
                <p class="mb-4">Desa Tetembomua merupakan desa yang terletak di wilayah yang subur dengan potensi pertanian yang sangat besar. Masyarakat desa kami dikenal dengan semangat gotong royong yang tinggi dan komitmen untuk mengembangkan sektor pertanian secara berkelanjutan.</p>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-check-circle text-success me-3"></i>
                            <span>Pertanian Organik</span>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-check-circle text-success me-3"></i>
                            <span>Teknologi Modern</span>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-check-circle text-success me-3"></i>
                            <span>Pemasaran Digital</span>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-check-circle text-success me-3"></i>
                            <span>Pelatihan Petani</span>
                        </div>
                    </div>
                </div>
                <a href="{{ route('about') }}" class="btn btn-primary">Pelajari Lebih Lanjut</a>
            </div>
        </div>
    </div>
</section>

<!-- Agriculture Section -->
<section class="section bg-light">
    <div class="container">
        <div class="section-title">
            <h2>Sektor Pertanian</h2>
            <p>Menjelajahi berbagai aspek pertanian di Desa Tetembomua</p>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <img src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                         class="card-img-top" alt="Komoditas">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-seedling text-success me-2"></i>
                            Komoditas Unggulan
                        </h5>
                        <p class="card-text">Temukan berbagai komoditas pertanian unggulan yang menjadi andalan Desa Tetembomua.</p>
                        <a href="{{ route('pertanian.komoditas') }}" class="btn btn-outline-primary">Lihat Komoditas</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <img src="https://images.unsplash.com/photo-1574323347407-f5e1ad6d020b?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                         class="card-img-top" alt="Teknologi">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-cogs text-primary me-2"></i>
                            Teknologi Pertanian
                        </h5>
                        <p class="card-text">Inovasi teknologi pertanian modern yang diterapkan untuk meningkatkan produktivitas.</p>
                        <a href="{{ route('pertanian.teknologi') }}" class="btn btn-outline-primary">Lihat Teknologi</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <img src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                         class="card-img-top" alt="Petani">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-user-friends text-warning me-2"></i>
                            Data Petani
                        </h5>
                        <p class="card-text">Profil dan data petani-petani handal yang menggerakkan sektor pertanian desa.</p>
                        <a href="{{ route('pertanian.petani') }}" class="btn btn-outline-primary">Lihat Petani</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- News & Updates Section -->
<section class="section">
    <div class="container">
        <div class="section-title">
            <h2>Berita & Informasi Terkini</h2>
            <p>Update terbaru seputar kegiatan dan perkembangan Desa Tetembomua</p>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <span class="badge bg-success">Pertanian</span>
                            <small class="text-muted">2 hari yang lalu</small>
                        </div>
                        <h5 class="card-title">Panen Raya Padi Organik</h5>
                        <p class="card-text">Petani Desa Tetembomua berhasil melakukan panen raya padi organik dengan hasil yang memuaskan.</p>
                        <a href="#" class="btn btn-sm btn-outline-primary">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <span class="badge bg-primary">Teknologi</span>
                            <small class="text-muted">1 minggu yang lalu</small>
                        </div>
                        <h5 class="card-title">Pelatihan Smart Farming</h5>
                        <p class="card-text">Pemerintah desa mengadakan pelatihan smart farming untuk meningkatkan efisiensi pertanian.</p>
                        <a href="#" class="btn btn-sm btn-outline-primary">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <span class="badge bg-warning">Ekonomi</span>
                            <small class="text-muted">2 minggu yang lalu</small>
                        </div>
                        <h5 class="card-title">Pemasaran Digital Produk Desa</h5>
                        <p class="card-text">Inisiatif pemasaran digital untuk produk pertanian desa melalui platform online.</p>
                        <a href="#" class="btn btn-sm btn-outline-primary">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact CTA Section -->
<section class="section bg-primary text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h3>Ingin Mengetahui Lebih Lanjut?</h3>
                <p class="mb-0">Hubungi kami untuk informasi lebih detail tentang Desa Tetembomua dan potensi pertaniannya.</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="{{ route('contact') }}" class="btn btn-light btn-lg">
                    <i class="fas fa-phone me-2"></i>Hubungi Kami
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
