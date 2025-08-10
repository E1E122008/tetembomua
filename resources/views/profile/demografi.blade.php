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
                <img src="https://images.unsplash.com/photo-1574323347407-f5e1ad6d020b?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" 
                     alt="Demografi Desa" class="img-fluid rounded-3 shadow">
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

<!-- Age Distribution Section -->
<section class="section">
    <div class="container">
        <div class="section-title">
            <h2>Distribusi Usia</h2>
            <p>Komposisi penduduk berdasarkan kelompok usia</p>
        </div>
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <h5 class="card-title">Kelompok Usia Produktif</h5>
                                <div class="age-group mb-3">
                                    <div class="d-flex justify-content-between">
                                        <span>15-64 tahun</span>
                                        <span class="text-primary fw-bold">1,678 (66%)</span>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar bg-primary" style="width: 66%"></div>
                                    </div>
                                </div>
                                <div class="age-group mb-3">
                                    <div class="d-flex justify-content-between">
                                        <span>25-54 tahun</span>
                                        <span class="text-success fw-bold">1,147 (45%)</span>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" style="width: 45%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <h5 class="card-title">Kelompok Usia Non-Produktif</h5>
                                <div class="age-group mb-3">
                                    <div class="d-flex justify-content-between">
                                        <span>0-14 tahun</span>
                                        <span class="text-warning fw-bold">611 (24%)</span>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar bg-warning" style="width: 24%"></div>
                                    </div>
                                </div>
                                <div class="age-group mb-3">
                                    <div class="d-flex justify-content-between">
                                        <span>65+ tahun</span>
                                        <span class="text-info fw-bold">258 (10%)</span>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar bg-info" style="width: 10%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <p class="text-muted">Rasio ketergantungan: 52% (rendah)</p>
                            <small class="text-muted">Indikator demografis yang menguntungkan untuk pembangunan</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Education Level Section -->
<section class="section bg-light">
    <div class="container">
        <div class="section-title">
            <h2>Tingkat Pendidikan</h2>
            <p>Distribusi penduduk berdasarkan tingkat pendidikan terakhir</p>
        </div>
        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-graduation-cap text-primary me-2"></i>
                            Pendidikan Formal
                        </h5>
                        <div class="education-level mb-3">
                            <div class="d-flex justify-content-between">
                                <span>S1/S2/S3</span>
                                <span class="text-primary fw-bold">156 (6%)</span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar bg-primary" style="width: 6%"></div>
                            </div>
                        </div>
                        <div class="education-level mb-3">
                            <div class="d-flex justify-content-between">
                                <span>D3/SMA/SMK</span>
                                <span class="text-success fw-bold">892 (35%)</span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar bg-success" style="width: 35%"></div>
                            </div>
                        </div>
                        <div class="education-level mb-3">
                            <div class="d-flex justify-content-between">
                                <span>SMP</span>
                                <span class="text-warning fw-bold">1,147 (45%)</span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" style="width: 45%"></div>
                            </div>
                        </div>
                        <div class="education-level mb-3">
                            <div class="d-flex justify-content-between">
                                <span>SD</span>
                                <span class="text-info fw-bold">352 (14%)</span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar bg-info" style="width: 14%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-chart-pie text-success me-2"></i>
                            Analisis Pendidikan
                        </h5>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="text-center">
                                    <i class="fas fa-user-graduate fa-3x text-primary mb-2"></i>
                                    <h6>Angka Melek Huruf</h6>
                                    <h4 class="text-primary">94.5%</h4>
                                    <small class="text-muted">Sangat tinggi</small>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="text-center">
                                    <i class="fas fa-school fa-3x text-success mb-2"></i>
                                    <h6>Rata-rata Lama Sekolah</h6>
                                    <h4 class="text-success">9.2 Tahun</h4>
                                    <small class="text-muted">Setara SMP</small>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="text-center">
                                    <i class="fas fa-users fa-3x text-warning mb-2"></i>
                                    <h6>Penduduk Usia Sekolah</h6>
                                    <h4 class="text-warning">611</h4>
                                    <small class="text-muted">0-14 tahun</small>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="text-center">
                                    <i class="fas fa-chart-line fa-3x text-info mb-2"></i>
                                    <h6>Tren Pendidikan</h6>
                                    <h4 class="text-info">Meningkat</h4>
                                    <small class="text-muted">5% per tahun</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Employment Section -->
<section class="section">
    <div class="container">
        <div class="section-title">
            <h2>Mata Pencaharian</h2>
            <p>Distribusi penduduk berdasarkan sektor pekerjaan</p>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-seedling fa-3x text-success mb-3"></i>
                        <h5 class="card-title">Pertanian</h5>
                        <h3 class="text-success">65%</h3>
                        <p class="card-text">1,656 penduduk bekerja di sektor pertanian</p>
                        <ul class="list-unstyled text-start">
                            <li><i class="fas fa-check text-success me-2"></i>Petani padi</li>
                            <li><i class="fas fa-check text-success me-2"></i>Petani sayuran</li>
                            <li><i class="fas fa-check text-success me-2"></i>Petani buah</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-store fa-3x text-primary mb-3"></i>
                        <h5 class="card-title">Perdagangan</h5>
                        <h3 class="text-primary">15%</h3>
                        <p class="card-text">382 penduduk bekerja di sektor perdagangan</p>
                        <ul class="list-unstyled text-start">
                            <li><i class="fas fa-check text-success me-2"></i>Pedagang</li>
                            <li><i class="fas fa-check text-success me-2"></i>Warung</li>
                            <li><i class="fas fa-check text-success me-2"></i>Jasa</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-briefcase fa-3x text-warning mb-3"></i>
                        <h5 class="card-title">Lainnya</h5>
                        <h3 class="text-warning">20%</h3>
                        <p class="card-text">509 penduduk bekerja di sektor lainnya</p>
                        <ul class="list-unstyled text-start">
                            <li><i class="fas fa-check text-success me-2"></i>PNS</li>
                            <li><i class="fas fa-check text-success me-2"></i>Swasta</li>
                            <li><i class="fas fa-check text-success me-2"></i>Wiraswasta</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Population Growth Section -->
<section class="section bg-light">
    <div class="container">
        <div class="section-title">
            <h2>Pertumbuhan Penduduk</h2>
            <p>Tren pertumbuhan penduduk dalam 5 tahun terakhir</p>
        </div>
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="row text-center">
                            <div class="col-md-3 mb-3">
                                <h5 class="text-primary">2020</h5>
                                <h4 class="text-primary">2,347</h4>
                                <small class="text-muted">Jiwa</small>
                            </div>
                            <div class="col-md-3 mb-3">
                                <h5 class="text-success">2021</h5>
                                <h4 class="text-success">2,389</h4>
                                <small class="text-muted">Jiwa (+1.8%)</small>
                            </div>
                            <div class="col-md-3 mb-3">
                                <h5 class="text-warning">2022</h5>
                                <h4 class="text-warning">2,432</h4>
                                <small class="text-muted">Jiwa (+1.8%)</small>
                            </div>
                            <div class="col-md-3 mb-3">
                                <h5 class="text-info">2023</h5>
                                <h4 class="text-info">2,489</h4>
                                <small class="text-muted">Jiwa (+2.3%)</small>
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <h5 class="text-success">2024</h5>
                            <h3 class="text-success">2,547</h3>
                            <small class="text-muted">Jiwa (+2.3%)</small>
                            <p class="mt-3">Laju pertumbuhan penduduk: 1.8% per tahun (stabil)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Population Density Section -->
<section class="section">
    <div class="container">
        <div class="section-title">
            <h2>Kepadatan Penduduk</h2>
            <p>Analisis kepadatan dan distribusi penduduk di wilayah desa</p>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-map-marked-alt fa-3x text-primary mb-3"></i>
                        <h5 class="card-title">Luas Wilayah</h5>
                        <h3 class="text-primary">2,500 Ha</h3>
                        <p class="card-text">Total luas wilayah Desa Tetembomua</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-users fa-3x text-success mb-3"></i>
                        <h5 class="card-title">Kepadatan</h5>
                        <h3 class="text-success">102 Jiwa/km²</h3>
                        <p class="card-text">Kepadatan penduduk per kilometer persegi</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-home fa-3x text-warning mb-3"></i>
                        <h5 class="card-title">Dusun</h5>
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
</style>
@endsection
