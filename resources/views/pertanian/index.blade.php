@extends('layouts.app')

@section('title', 'Sektor Pertanian - Desa Tetembomua')

@section('content')
<!-- Breadcrumb -->
<nav aria-label="breadcrumb" class="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
            <li class="breadcrumb-item active">Sektor Pertanian</li>
        </ol>
    </div>
</nav>

<!-- Hero Section -->
<section class="hero-section" style="min-height: 50vh;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 mx-auto text-center">
                <h1>Sektor Pertanian Desa Tetembomua</h1>
                <p>Menjelajahi potensi dan inovasi pertanian yang menjadi tulang punggung ekonomi desa</p>
            </div>
        </div>
    </div>
</section>

<!-- Overview Section -->
<section class="section">
    <div class="container">
        <div class="section-title">
            <h2>Gambaran Umum Pertanian</h2>
            <p>Potensi dan perkembangan sektor pertanian di Desa Tetembomua</p>
        </div>
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4">
                <img src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" 
                     alt="Pertanian Desa" class="img-fluid rounded-3 shadow">
            </div>
            <div class="col-lg-6">
                <h3 class="mb-4">Pertanian Berkelanjutan</h3>
                <p class="mb-4">Sektor pertanian merupakan tulang punggung ekonomi Desa Tetembomua. Mayoritas penduduk desa adalah petani dengan hasil panen utama berupa sawit, kakao, dan lada. Dengan luas lahan pertanian mencapai 1,250 hektar, desa ini memiliki potensi besar dalam pengembangan pertanian modern yang berkelanjutan.</p>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-chart-line text-success me-3 fa-2x"></i>
                            <div>
                                <h5 class="mb-0">Produktivitas Tinggi</h5>
                                <small class="text-muted">Hasil panen optimal</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-leaf text-primary me-3 fa-2x"></i>
                            <div>
                                <h5 class="mb-0">Organik</h5>
                                <small class="text-muted">Ramah lingkungan</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-cogs text-warning me-3 fa-2x"></i>
                            <div>
                                <h5 class="mb-0">Teknologi Modern</h5>
                                <small class="text-muted">Efisien & efektif</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-users text-info me-3 fa-2x"></i>
                            <div>
                                <h5 class="mb-0">SDM Unggul</h5>
                                <small class="text-muted">Petani terampil</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Statistics Section -->
<section class="section bg-light">
    <div class="container">
        <div class="section-title">
            <h2>Statistik Pertanian</h2>
            <p>Data dan fakta sektor pertanian Desa Tetembomua</p>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-map-marked-alt fa-3x text-primary mb-3"></i>
                        <h3 class="card-title text-primary">1,250 Ha</h3>
                        <p class="card-text">Luas Lahan Pertanian</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-user-friends fa-3x text-success mb-3"></i>
                        <h3 class="card-title text-success">500+</h3>
                        <p class="card-text">Petani Aktif</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-seedling fa-3x text-warning mb-3"></i>
                        <h3 class="card-title text-warning">3</h3>
                        <p class="card-text">Komoditas Unggulan</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-chart-bar fa-3x text-info mb-3"></i>
                        <h3 class="card-title text-info">85%</h3>
                        <p class="card-text">Tingkat Produktivitas</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Agriculture Types Section -->
<section class="section">
    <div class="container">
        <div class="section-title">
            <h2>Komoditas Unggulan</h2>
            <p>Komoditas perkebunan utama yang menjadi andalan ekonomi Desa Tetembomua</p>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <img src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                         class="card-img-top" alt="Kelapa Sawit">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-seedling text-primary me-2"></i>
                            Kelapa Sawit
                        </h5>
                        <p class="card-text">Perkebunan kelapa sawit yang menjadi komoditas utama dengan hasil panen yang optimal dan berkualitas tinggi.</p>
                        <ul class="list-unstyled">
                            <li><i class="fas fa-check text-success me-2"></i>Luas 800 Ha</li>
                            <li><i class="fas fa-check text-success me-2"></i>Produksi 12,000 Ton</li>
                            <li><i class="fas fa-check text-success me-2"></i>Kualitas premium</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <img src="https://images.unsplash.com/photo-1574323347407-f5e1ad6d020b?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                         class="card-img-top" alt="Kakao">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-seedling text-success me-2"></i>
                            Kakao
                        </h5>
                        <p class="card-text">Perkebunan kakao yang menghasilkan biji kakao berkualitas premium untuk industri cokelat.</p>
                        <ul class="list-unstyled">
                            <li><i class="fas fa-check text-success me-2"></i>Luas 300 Ha</li>
                            <li><i class="fas fa-check text-success me-2"></i>Produksi 450 Ton</li>
                            <li><i class="fas fa-check text-success me-2"></i>Kualitas premium</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <img src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                         class="card-img-top" alt="Lada">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-seedling text-warning me-2"></i>
                            Lada
                        </h5>
                        <p class="card-text">Perkebunan lada yang menghasilkan rempah-rempah berkualitas tinggi dengan aroma dan rasa yang kuat.</p>
                        <ul class="list-unstyled">
                            <li><i class="fas fa-check text-success me-2"></i>Luas 150 Ha</li>
                            <li><i class="fas fa-check text-success me-2"></i>Produksi 75 Ton</li>
                            <li><i class="fas fa-check text-success me-2"></i>Kualitas premium</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Technology Section -->
<section class="section bg-light">
    <div class="container">
        <div class="section-title">
            <h2>Teknologi Pertanian</h2>
            <p>Inovasi teknologi yang diterapkan dalam pertanian Desa Tetembomua</p>
        </div>
        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-tint text-primary me-2"></i>
                            Sistem Irigasi Modern
                        </h5>
                        <p class="card-text">Sistem irigasi yang menggunakan teknologi modern untuk mengoptimalkan penggunaan air dan meningkatkan produktivitas tanaman.</p>
                        <div class="progress mb-3">
                            <div class="progress-bar bg-primary" style="width: 90%">90% Efisiensi</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-mobile-alt text-success me-2"></i>
                            Smart Farming
                        </h5>
                        <p class="card-text">Penerapan teknologi smart farming dengan monitoring berbasis aplikasi untuk mengoptimalkan hasil pertanian.</p>
                        <div class="progress mb-3">
                            <div class="progress-bar bg-success" style="width: 75%">75% Implementasi</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-recycle text-warning me-2"></i>
                            Pertanian Organik
                        </h5>
                        <p class="card-text">Sistem pertanian organik yang ramah lingkungan dengan penggunaan pupuk dan pestisida alami.</p>
                        <div class="progress mb-3">
                            <div class="progress-bar bg-warning" style="width: 85%">85% Organik</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-solar-panel text-info me-2"></i>
                            Energi Terbarukan
                        </h5>
                        <p class="card-text">Pemanfaatan energi surya untuk sistem irigasi dan peralatan pertanian yang ramah lingkungan.</p>
                        <div class="progress mb-3">
                            <div class="progress-bar bg-info" style="width: 60%">60% Terbarukan</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Future Plans Section -->
<section class="section">
    <div class="container">
        <div class="section-title">
            <h2>Rencana Pengembangan</h2>
            <p>Visi dan misi pengembangan sektor pertanian ke depan</p>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-rocket fa-3x text-primary mb-3"></i>
                        <h5 class="card-title">Peningkatan Produktivitas</h5>
                        <p class="card-text">Target peningkatan produktivitas pertanian sebesar 25% dalam 3 tahun ke depan melalui teknologi modern.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-globe fa-3x text-success mb-3"></i>
                        <h5 class="card-title">Pemasaran Global</h5>
                        <p class="card-text">Ekspansi pasar produk pertanian ke tingkat nasional dan internasional dengan sertifikasi organik.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-graduation-cap fa-3x text-warning mb-3"></i>
                        <h5 class="card-title">Pendidikan Petani</h5>
                        <p class="card-text">Program pelatihan dan pendidikan berkelanjutan untuk meningkatkan kompetensi petani.</p>
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
                <h3>Ingin Mengetahui Lebih Detail?</h3>
                <p class="mb-0">Jelajahi berbagai aspek pertanian Desa Tetembomua melalui halaman-halaman berikut.</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <div class="d-flex gap-2 justify-content-lg-end">
                    <a href="{{ route('pertanian.komoditas') }}" class="btn btn-light">
                        <i class="fas fa-seedling me-2"></i>Komoditas
                    </a>
                    <a href="{{ route('pertanian.teknologi') }}" class="btn btn-outline-light">
                        <i class="fas fa-cogs me-2"></i>Teknologi
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
