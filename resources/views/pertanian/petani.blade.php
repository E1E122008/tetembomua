@extends('layouts.app')

@section('title', 'Data Petani - Desa Tetembomua')

@section('content')
<!-- Breadcrumb -->
<nav aria-label="breadcrumb" class="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{ route('pertanian.index') }}">Pertanian</a></li>
            <li class="breadcrumb-item active">Data Petani</li>
        </ol>
    </div>
</nav>

<!-- Hero Section -->
<section class="hero-section" style="min-height: 50vh;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 mx-auto text-center">
                <h1>Data Petani Desa Tetembomua</h1>
                <p>Profil petani-petani handal yang menggerakkan sektor pertanian desa</p>
            </div>
        </div>
    </div>
</section>

<!-- Overview Section -->
<section class="section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4">
                <img src="https://images.unsplash.com/photo-1574323347407-f5e1ad6d020b?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" 
                     alt="Petani Desa" class="img-fluid rounded-3 shadow">
            </div>
            <div class="col-lg-6">
                <h2 class="mb-4">Petani Unggulan Desa</h2>
                <p class="mb-4">Desa Tetembomua memiliki lebih dari 500 petani aktif yang terampil dan berpengalaman dalam berbagai jenis pertanian. Petani-petani kami telah mengadopsi teknologi modern sambil tetap mempertahankan kearifan lokal dalam bercocok tanam.</p>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-users text-primary me-3 fa-2x"></i>
                            <div>
                                <h6 class="mb-0">500+ Petani</h6>
                                <small class="text-muted">Aktif bercocok tanam</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-graduation-cap text-success me-3 fa-2x"></i>
                            <div>
                                <h6 class="mb-0">85% Terlatih</h6>
                                <small class="text-muted">Teknologi modern</small>
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
            <h2>Statistik Petani</h2>
            <p>Data dan fakta tentang petani Desa Tetembomua</p>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-user-friends fa-3x text-primary mb-3"></i>
                        <h3 class="card-title text-primary">500+</h3>
                        <p class="card-text">Total Petani</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-male fa-3x text-success mb-3"></i>
                        <h3 class="card-title text-success">350</h3>
                        <p class="card-text">Petani Pria</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-female fa-3x text-warning mb-3"></i>
                        <h3 class="card-title text-warning">150</h3>
                        <p class="card-text">Petani Wanita</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-graduation-cap fa-3x text-info mb-3"></i>
                        <h3 class="card-title text-info">425</h3>
                        <p class="card-text">Petani Terlatih</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Top Farmers Section -->
<section class="section">
    <div class="container">
        <div class="section-title">
            <h2>Petani Unggulan</h2>
            <p>Petani-petani terbaik yang telah berhasil mengembangkan pertanian modern</p>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                         class="card-img-top" alt="Pak Ahmad">
                    <div class="card-body text-center">
                        <h5 class="card-title">Pak Ahmad Supriadi</h5>
                        <p class="text-muted">Petani Padi Organik</p>
                        <p class="card-text">Petani dengan pengalaman 25 tahun dalam budidaya padi organik. Berhasil mengembangkan varietas padi unggul dengan hasil panen 8 ton per hektar.</p>
                        <div class="row text-center">
                            <div class="col-6">
                                <small class="text-muted">Luas Lahan</small>
                                <h6 class="mb-0">5 Ha</h6>
                            </div>
                            <div class="col-6">
                                <small class="text-muted">Hasil Panen</small>
                                <h6 class="mb-0">40 Ton</h6>
                            </div>
                        </div>
                        <div class="mt-3">
                            <span class="badge bg-success">Petani Berprestasi 2023</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <img src="https://images.unsplash.com/photo-1494790108755-2616b612b786?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                         class="card-img-top" alt="Bu Siti">
                    <div class="card-body text-center">
                        <h5 class="card-title">Bu Siti Nurhaliza</h5>
                        <p class="text-muted">Petani Sayuran Organik</p>
                        <p class="card-text">Pemimpin kelompok tani wanita yang berhasil mengembangkan sayuran organik berkualitas tinggi. Menggunakan teknologi hidroponik modern.</p>
                        <div class="row text-center">
                            <div class="col-6">
                                <small class="text-muted">Luas Lahan</small>
                                <h6 class="mb-0">2 Ha</h6>
                            </div>
                            <div class="col-6">
                                <small class="text-muted">Jenis Sayuran</small>
                                <h6 class="mb-0">15+</h6>
                            </div>
                        </div>
                        <div class="mt-3">
                            <span class="badge bg-primary">Pemimpin Kelompok Tani</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                         class="card-img-top" alt="Pak Budi">
                    <div class="card-body text-center">
                        <h5 class="card-title">Pak Budi Santoso</h5>
                        <p class="text-muted">Petani Buah-Buahan</p>
                        <p class="card-text">Ahli dalam budidaya buah-buahan dengan sistem pertanian terpadu. Mengembangkan kebun buah yang menghasilkan berbagai jenis buah sepanjang tahun.</p>
                        <div class="row text-center">
                            <div class="col-6">
                                <small class="text-muted">Luas Lahan</small>
                                <h6 class="mb-0">3 Ha</h6>
                            </div>
                            <div class="col-6">
                                <small class="text-muted">Jenis Buah</small>
                                <h6 class="mb-0">8+</h6>
                            </div>
                        </div>
                        <div class="mt-3">
                            <span class="badge bg-warning">Pertanian Terpadu</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Farmer Categories Section -->
<section class="section bg-light">
    <div class="container">
        <div class="section-title">
            <h2>Kategori Petani</h2>
            <p>Pengelompokan petani berdasarkan spesialisasi dan keahlian</p>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-seedling fa-3x text-success mb-3"></i>
                        <h5 class="card-title">Petani Padi</h5>
                        <p class="card-text">200+ petani yang mengkhususkan diri dalam budidaya padi organik dengan teknologi modern.</p>
                        <div class="progress mb-3">
                            <div class="progress-bar bg-success" style="width: 90%">90% Organik</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-carrot fa-3x text-warning mb-3"></i>
                        <h5 class="card-title">Petani Sayuran</h5>
                        <p class="card-text">150+ petani yang fokus pada budidaya sayuran organik dengan sistem hidroponik.</p>
                        <div class="progress mb-3">
                            <div class="progress-bar bg-warning" style="width: 85%">85% Hidroponik</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-apple-alt fa-3x text-primary mb-3"></i>
                        <h5 class="card-title">Petani Buah</h5>
                        <p class="card-text">100+ petani yang mengembangkan kebun buah dengan sistem pertanian terpadu.</p>
                        <div class="progress mb-3">
                            <div class="progress-bar bg-primary" style="width: 75%">75% Terpadu</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-leaf fa-3x text-info mb-3"></i>
                        <h5 class="card-title">Petani Rempah</h5>
                        <p class="card-text">50+ petani yang mengkhususkan diri dalam budidaya rempah-rempah berkualitas tinggi.</p>
                        <div class="progress mb-3">
                            <div class="progress-bar bg-info" style="width: 95%">95% Organik</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Training Programs Section -->
<section class="section">
    <div class="container">
        <div class="section-title">
            <h2>Program Pelatihan Petani</h2>
            <p>Program pengembangan kompetensi untuk meningkatkan kualitas petani</p>
        </div>
        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-graduation-cap text-primary me-2"></i>
                            Pelatihan Teknologi Modern
                        </h5>
                        <p class="card-text">Program pelatihan intensif untuk petani dalam menggunakan teknologi pertanian modern seperti smart farming dan IoT.</p>
                        <ul class="list-unstyled">
                            <li><i class="fas fa-check text-success me-2"></i>Smart farming applications</li>
                            <li><i class="fas fa-check text-success me-2"></i>IoT sensor management</li>
                            <li><i class="fas fa-check text-success me-2"></i>Data analysis</li>
                        </ul>
                        <span class="badge bg-primary">300+ Petani Terlatih</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-leaf text-success me-2"></i>
                            Pertanian Organik
                        </h5>
                        <p class="card-text">Pelatihan khusus untuk mengembangkan pertanian organik yang ramah lingkungan dan berkelanjutan.</p>
                        <ul class="list-unstyled">
                            <li><i class="fas fa-check text-success me-2"></i>Pupuk organik</li>
                            <li><i class="fas fa-check text-success me-2"></i>Pestisida alami</li>
                            <li><i class="fas fa-check text-success me-2"></i>Sertifikasi organik</li>
                        </ul>
                        <span class="badge bg-success">400+ Petani Terlatih</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-chart-line text-warning me-2"></i>
                            Manajemen Bisnis
                        </h5>
                        <p class="card-text">Pelatihan manajemen bisnis pertanian untuk meningkatkan nilai tambah dan pemasaran produk.</p>
                        <ul class="list-unstyled">
                            <li><i class="fas fa-check text-success me-2"></i>Perencanaan bisnis</li>
                            <li><i class="fas fa-check text-success me-2"></i>Pemasaran digital</li>
                            <li><i class="fas fa-check text-success me-2"></i>Keuangan pertanian</li>
                        </ul>
                        <span class="badge bg-warning">200+ Petani Terlatih</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-users text-info me-2"></i>
                            Kepemimpinan Kelompok
                        </h5>
                        <p class="card-text">Pelatihan kepemimpinan untuk membentuk kelompok tani yang solid dan produktif.</p>
                        <ul class="list-unstyled">
                            <li><i class="fas fa-check text-success me-2"></i>Manajemen kelompok</li>
                            <li><i class="fas fa-check text-success me-2"></i>Komunikasi efektif</li>
                            <li><i class="fas fa-check text-success me-2"></i>Resolusi konflik</li>
                        </ul>
                        <span class="badge bg-info">50+ Pemimpin Terlatih</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Achievements Section -->
<section class="section bg-light">
    <div class="container">
        <div class="section-title">
            <h2>Prestasi Petani</h2>
            <p>Penghargaan dan prestasi yang telah diraih petani Desa Tetembomua</p>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-trophy fa-3x text-warning mb-3"></i>
                        <h5 class="card-title">Petani Berprestasi</h5>
                        <p class="card-text">5 petani meraih penghargaan petani berprestasi tingkat kabupaten tahun 2023.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-medal fa-3x text-success mb-3"></i>
                        <h5 class="card-title">Sertifikasi Organik</h5>
                        <p class="card-text">300+ petani telah mendapatkan sertifikasi pertanian organik dari lembaga terakreditasi.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-star fa-3x text-primary mb-3"></i>
                        <h5 class="card-title">Inovasi Teknologi</h5>
                        <p class="card-text">10+ inovasi teknologi pertanian yang dikembangkan oleh petani lokal.</p>
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
                <h3>Ingin Bergabung dengan Petani Kami?</h3>
                <p class="mb-0">Hubungi kami untuk informasi tentang program pelatihan dan kesempatan bergabung dengan komunitas petani Desa Tetembomua.</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="{{ route('contact') }}" class="btn btn-light btn-lg">
                    <i class="fas fa-users me-2"></i>Bergabung
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
