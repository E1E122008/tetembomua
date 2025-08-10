@extends('layouts.app')

@section('title', 'Tentang - Desa Tetembomua')

@section('content')
<!-- Breadcrumb -->
<nav aria-label="breadcrumb" class="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
            <li class="breadcrumb-item active">Tentang</li>
        </ol>
    </div>
</nav>

<!-- Hero Section -->
<section class="hero-section" style="min-height: 50vh;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 mx-auto text-center">
                <h1>Tentang Desa Tetembomua</h1>
                <p>Mengenal lebih dekat desa kami yang kaya akan budaya dan potensi pertanian</p>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4">
                <img src="https://images.unsplash.com/photo-1574323347407-f5e1ad6d020b?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" 
                     alt="Desa Tetembomua" class="img-fluid rounded-3 shadow">
            </div>
            <div class="col-lg-6">
                <h2 class="mb-4">Desa yang Berkelanjutan</h2>
                <p class="mb-4">Desa Tetembomua merupakan desa yang terletak di wilayah yang subur dengan potensi pertanian yang sangat besar. Mayoritas penduduk desa adalah petani dengan hasil panen utama berupa sawit, kakao, dan lada. Masyarakat desa kami dikenal dengan semangat gotong royong yang tinggi dan komitmen untuk mengembangkan sektor pertanian secara berkelanjutan.</p>
                <p class="mb-4">Dengan luas wilayah sekitar 2,500 hektar dan jumlah penduduk lebih dari 2,500 jiwa, Desa Tetembomua telah menjadi salah satu desa pertanian yang maju di wilayah ini dengan fokus pada komoditas perkebunan unggulan.</p>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-map-marker-alt text-primary me-3"></i>
                            <div>
                                <h6 class="mb-0">Lokasi Strategis</h6>
                                <small class="text-muted">Akses mudah ke kota</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-leaf text-success me-3"></i>
                            <div>
                                <h6 class="mb-0">Lahan Subur</h6>
                                <small class="text-muted">Tanah yang produktif</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Values Section -->
<section class="section bg-light">
    <div class="container">
        <div class="section-title">
            <h2>Nilai-Nilai Desa</h2>
            <p>Prinsip dan nilai yang menjadi fondasi pengembangan Desa Tetembomua</p>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-hands-helping fa-3x text-primary mb-3"></i>
                        <h5 class="card-title">Gotong Royong</h5>
                        <p class="card-text">Semangat gotong royong yang menjadi ciri khas masyarakat Desa Tetembomua dalam membangun desa.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-seedling fa-3x text-success mb-3"></i>
                        <h5 class="card-title">Kearifan Lokal</h5>
                        <p class="card-text">Pengetahuan tradisional dalam bercocok tanam yang diwariskan dari generasi ke generasi.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-users fa-3x text-warning mb-3"></i>
                        <h5 class="card-title">Kebersamaan</h5>
                        <p class="card-text">Nilai kebersamaan dan solidaritas yang terjalin erat antar warga desa.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Achievements Section -->
<section class="section">
    <div class="container">
        <div class="section-title">
            <h2>Pencapaian Desa</h2>
            <p>Prestasi dan penghargaan yang telah diraih Desa Tetembomua</p>
        </div>
        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-trophy text-warning fa-2x me-3"></i>
                            <h5 class="card-title mb-0">Desa Pertanian Terbaik</h5>
                        </div>
                        <p class="card-text">Penghargaan sebagai desa pertanian terbaik tingkat kabupaten tahun 2023.</p>
                        <small class="text-muted">Diberikan oleh Pemerintah Kabupaten</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-medal text-success fa-2x me-3"></i>
                            <h5 class="card-title mb-0">Sertifikasi Organik</h5>
                        </div>
                        <p class="card-text">Sertifikasi produk pertanian organik untuk 10 jenis komoditas utama.</p>
                        <small class="text-muted">Diberikan oleh Lembaga Sertifikasi Organik</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-star text-primary fa-2x me-3"></i>
                            <h5 class="card-title mb-0">Desa Digital</h5>
                        </div>
                        <p class="card-text">Pengakuan sebagai desa digital dalam pengembangan teknologi pertanian.</p>
                        <small class="text-muted">Diberikan oleh Kementerian Pertanian</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-award text-info fa-2x me-3"></i>
                            <h5 class="card-title mb-0">Inovasi Pertanian</h5>
                        </div>
                        <p class="card-text">Penghargaan inovasi teknologi pertanian untuk sistem irigasi modern.</p>
                        <small class="text-muted">Diberikan oleh Universitas Pertanian</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="section bg-light">
    <div class="container">
        <div class="section-title">
            <h2>Tim Pengelola Desa</h2>
            <p>Para pemimpin dan pengelola yang menggerakkan kemajuan Desa Tetembomua</p>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80" 
                             alt="Kepala Desa" class="rounded-circle mb-3" style="width: 120px; height: 120px; object-fit: cover;">
                        <h5 class="card-title">Ahmad Supriadi</h5>
                        <p class="text-muted">Kepala Desa</p>
                        <p class="card-text">Memimpin Desa Tetembomua dengan visi pengembangan pertanian berkelanjutan dan pemberdayaan masyarakat.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <img src="https://images.unsplash.com/photo-1494790108755-2616b612b786?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80" 
                             alt="Sekretaris Desa" class="rounded-circle mb-3" style="width: 120px; height: 120px; object-fit: cover;">
                        <h5 class="card-title">Siti Nurhaliza</h5>
                        <p class="text-muted">Sekretaris Desa</p>
                        <p class="card-text">Mengelola administrasi desa dan program pengembangan pertanian dengan dedikasi tinggi.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80" 
                             alt="Kepala Seksi Pertanian" class="rounded-circle mb-3" style="width: 120px; height: 120px; object-fit: cover;">
                        <h5 class="card-title">Budi Santoso</h5>
                        <p class="text-muted">Kepala Seksi Pertanian</p>
                        <p class="card-text">Ahli pertanian yang mengembangkan teknologi modern untuk meningkatkan produktivitas.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="section">
    <div class="container">
        <div class="section-title">
            <h2>Hubungi Kami</h2>
            <p>Silakan hubungi kami untuk informasi lebih lanjut tentang Desa Tetembomua</p>
        </div>
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <h5><i class="fas fa-map-marker-alt text-primary me-2"></i>Alamat</h5>
                                <p>Desa Tetembomua, Kecamatan Lambuya<br>
                                Kabupaten Konawe, Provinsi Sulawesi Tenggara<br>
                                Kode Pos: 93464</p>
                            </div>
                            <div class="col-md-6 mb-4">
                                <h5><i class="fas fa-phone text-success me-2"></i>Telepon</h5>
                                <p>+62 812-3456-7890<br>
                                +62 812-3456-7891</p>
                            </div>
                            <div class="col-md-6 mb-4">
                                <h5><i class="fas fa-envelope text-warning me-2"></i>Email</h5>
                                <p>info@desatetembomua.id<br>
                                pertanian@desatetembomua.id</p>
                            </div>
                            <div class="col-md-6 mb-4">
                                <h5><i class="fas fa-clock text-info me-2"></i>Jam Kerja</h5>
                                <p>Senin - Jumat: 08:00 - 16:00<br>
                                Sabtu: 08:00 - 12:00</p>
                            </div>
                        </div>
                        <div class="text-center">
                            <a href="{{ route('contact') }}" class="btn btn-primary">
                                <i class="fas fa-envelope me-2"></i>Kirim Pesan
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
