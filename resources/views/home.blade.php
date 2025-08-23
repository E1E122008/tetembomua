@extends('layouts.app')

@section('title', 'Beranda - Desa Tetembomua')

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="hero-content">
                    
                    <h1 class="display-4 fw-bold mb-4">Selamat Datang di Desa Tetembomua</h1>
                    <p class="lead mb-4">Desa yang maju dan berbudaya dengan masyarakat yang ramah, produktif, dan komitmen untuk mengembangkan desa secara berkelanjutan</p>
                    <div class="hero-buttons">
                        <a href="{{ route('about') }}" class="btn btn-primary btn-lg me-3">
                            <i class="fas fa-info-circle me-2"></i>Tentang Desa
                        </a>
                        <a href="{{ route('contact') }}" class="btn btn-outline-light btn-lg">
                            <i class="fas fa-envelope me-2"></i>Hubungi Kami
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="text-center">
                    <div class="hero-image-container">
                        <img src="https://images.unsplash.com/photo-1574323347407-f5e1ad6d020b?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" 
                             alt="Desa Tetembomua" class="img-fluid hero-image">
                        <div class="hero-image-overlay"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Quick Stats Section -->
<section class="section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-4 mb-4">
                <div class="card text-center h-100 stats-card">
                    <div class="card-body">
                        <div class="stats-icon">
                            <i class="fas fa-home fa-3x"></i>
                        </div>
                        <h4 class="card-title stats-number">850+</h4>
                        <p class="card-text">Kepala Keluarga</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 mb-4">
                <div class="card text-center h-100 stats-card">
                    <div class="card-body">
                        <div class="stats-icon">
                            <i class="fas fa-graduation-cap fa-3x"></i>
                        </div>
                        <h4 class="card-title stats-number">3</h4>
                        <p class="card-text">Sekolah</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 mb-4">
                <div class="card text-center h-100 stats-card">
                    <div class="card-body">
                        <div class="stats-icon">
                            <i class="fas fa-heartbeat fa-3x"></i>
                        </div>
                        <h4 class="card-title stats-number">1</h4>
                        <p class="card-text">Posyandu</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 mb-4">
                <div class="card text-center h-100 stats-card">
                    <div class="card-body">
                        <div class="stats-icon">
                            <i class="fas fa-seedling fa-3x"></i>
                        </div>
                        <h4 class="card-title stats-number">500+</h4>
                        <p class="card-text">Petani</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 mb-4">
                <div class="card text-center h-100 stats-card">
                    <div class="card-body">
                        <div class="stats-icon">
                            <i class="fas fa-industry fa-3x"></i>
                        </div>
                        <h4 class="card-title stats-number">25+</h4>
                        <p class="card-text">UMKM</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 mb-4">
                <div class="card text-center h-100 stats-card">
                    <div class="card-body">
                        <div class="stats-icon">
                            <i class="fas fa-mosque fa-3x"></i>
                        </div>
                        <h4 class="card-title stats-number">5</h4>
                        <p class="card-text">Tempat Ibadah</p>
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
            <p>Mengenal lebih dekat desa kami yang kaya akan budaya dan potensi</p>
        </div>
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4">
                <div class="about-image-container">
                    <img src="https://images.unsplash.com/photo-1574323347407-f5e1ad6d020b?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" 
                         alt="Desa Tetembomua" class="img-fluid about-image">
                    <div class="about-image-overlay"></div>
                </div>
            </div>
            <div class="col-lg-6">
                <h3 class="mb-4">Desa Tetembomua yang Maju dan Berbudaya</h3>
                <p class="mb-4">Desa Tetembomua adalah desa yang terletak di Kecamatan Lambuya, Kabupaten Konawe, Sulawesi Tenggara. Desa kami memiliki masyarakat yang beragam dengan berbagai profesi dan potensi. Selain terkenal dengan sektor pertanian yang maju, desa kami juga memiliki tradisi budaya yang kaya, pendidikan yang berkembang, dan semangat gotong royong yang tinggi dalam membangun desa.</p>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="feature-item">
                            <i class="fas fa-check-circle"></i>
                            <span>Masyarakat yang Beragam</span>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="feature-item">
                            <i class="fas fa-check-circle"></i>
                            <span>Pendidikan Berkualitas</span>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="feature-item">
                            <i class="fas fa-check-circle"></i>
                            <span>Pertanian Maju</span>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="feature-item">
                            <i class="fas fa-check-circle"></i>
                            <span>UMKM Berkembang</span>
                        </div>
                    </div>
                </div>
                <a href="{{ route('about') }}" class="btn btn-primary">Pelajari Lebih Lanjut</a>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="section bg-light">
    <div class="container">
        <div class="section-title">
            <h2>Layanan & Program Desa</h2>
            <p>Berbagai layanan dan program yang disediakan untuk masyarakat desa</p>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card text-center h-100 service-card">
                    <div class="card-body">
                        <div class="service-icon">
                            <i class="fas fa-file-alt fa-3x"></i>
                        </div>
                        <h5 class="card-title">Layanan Administrasi</h5>
                        <p class="card-text">Layanan pengurusan dokumen kependudukan, surat-menyurat, dan administrasi desa lainnya.</p>
                        <a href="{{ route('contact') }}" class="btn btn-outline-primary">Hubungi Kami</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card text-center h-100 service-card">
                    <div class="card-body">
                        <div class="service-icon">
                            <i class="fas fa-hands-helping fa-3x"></i>
                        </div>
                        <h5 class="card-title">Program Pemberdayaan</h5>
                        <p class="card-text">Program pemberdayaan masyarakat dalam berbagai aspek kehidupan dan ekonomi.</p>
                        <a href="{{ route('news') }}" class="btn btn-outline-success">Lihat Program</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card text-center h-100 service-card">
                    <div class="card-body">
                        <div class="service-icon">
                            <i class="fas fa-users fa-3x"></i>
                        </div>
                        <h5 class="card-title">Pelayanan Masyarakat</h5>
                        <p class="card-text">Pelayanan kesehatan, pendidikan, dan sosial untuk meningkatkan kesejahteraan masyarakat.</p>
                        <a href="{{ route('contact') }}" class="btn btn-outline-info">Informasi</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Latest News Section -->
<section class="section">
    <div class="container">
        <div class="section-title">
            <h2>Berita Terbaru</h2>
            <p>Informasi terkini seputar kegiatan dan program desa</p>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 news-card">
                    <div class="news-image-container">
                        <img src="https://images.unsplash.com/photo-1574323347407-f5e1ad6d020b?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                             class="card-img-top" alt="Program Desa">
                        <div class="news-overlay">
                            <span class="badge">Program</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="news-meta">
                            <small class="text-muted">15 Des 2024</small>
                        </div>
                        <h5 class="card-title">Pelaksanaan Program Pemberdayaan Masyarakat</h5>
                        <p class="card-text">Program pemberdayaan masyarakat desa telah dilaksanakan dengan sukses melibatkan seluruh elemen masyarakat.</p>
                        <a href="{{ route('news') }}" class="btn btn-outline-primary btn-sm">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 news-card">
                    <div class="news-image-container">
                        <img src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                             class="card-img-top" alt="Pertanian">
                        <div class="news-overlay">
                            <span class="badge">Pertanian</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="news-meta">
                            <small class="text-muted">12 Des 2024</small>
                        </div>
                        <h5 class="card-title">Pelatihan Teknologi Pertanian Modern</h5>
                        <p class="card-text">Kegiatan pelatihan teknologi pertanian modern untuk meningkatkan produktivitas petani desa.</p>
                        <a href="{{ route('news') }}" class="btn btn-outline-success btn-sm">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 news-card">
                    <div class="news-image-container">
                        <img src="https://images.unsplash.com/photo-1574323347407-f5e1ad6d020b?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                             class="card-img-top" alt="Infrastruktur">
                        <div class="news-overlay">
                            <span class="badge">Infrastruktur</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="news-meta">
                            <small class="text-muted">10 Des 2024</small>
                        </div>
                        <h5 class="card-title">Pembangunan Jalan Desa Selesai</h5>
                        <p class="card-text">Proyek pembangunan jalan desa sepanjang 2 kilometer telah selesai dan siap digunakan masyarakat.</p>
                        <a href="{{ route('news') }}" class="btn btn-outline-info btn-sm">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('news') }}" class="btn btn-primary">
                <i class="fas fa-newspaper me-2"></i>Lihat Semua Berita
            </a>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="section bg-primary text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h3>Butuh Informasi Lebih Lanjut?</h3>
                <p class="mb-0">Hubungi kami untuk mendapatkan informasi detail seputar layanan dan program desa.</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="{{ route('contact') }}" class="btn btn-light btn-lg">
                    <i class="fas fa-phone me-2"></i>Hubungi Kami
                </a>
            </div>
        </div>
    </div>
</section>

<style>
/* Hero Image Styles */
.hero-image-container {
    position: relative;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 20px 40px rgba(46, 139, 87, 0.3);
}

.hero-image {
    border-radius: 20px;
    transition: transform 0.5s ease;
}

.hero-image-container:hover .hero-image {
    transform: scale(1.05);
}

.hero-image-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, 
        rgba(46, 139, 87, 0.2), 
        rgba(60, 179, 113, 0.1), 
        rgba(32, 178, 170, 0.2));
    border-radius: 20px;
}

/* Stats Cards Modern Styles */
.stats-icon {
    background: var(--primary-gradient);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    margin-bottom: 1rem;
    transition: transform 0.3s ease;
}

.stats-card:hover .stats-icon {
    transform: scale(1.1);
}

.stats-number {
    background: var(--primary-gradient);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    font-weight: 700;
    margin-bottom: 0.5rem;
}

/* About Section Styles */
.about-image-container {
    position: relative;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 15px 35px rgba(46, 139, 87, 0.2);
}

.about-image {
    border-radius: 20px;
    transition: transform 0.5s ease;
}

.about-image-container:hover .about-image {
    transform: scale(1.03);
}

.about-image-overlay {
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

/* Feature Items */
.feature-item {
    display: flex;
    align-items: center;
    padding: 0.5rem 0;
}

.feature-item i {
    background: var(--primary-gradient);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    margin-right: 1rem;
    font-size: 1.2rem;
}

/* Service Cards */
.service-card {
    transition: all 0.4s ease;
}

.service-icon {
    background: var(--primary-gradient);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    margin-bottom: 1.5rem;
    transition: transform 0.3s ease;
}

.service-card:hover .service-icon {
    transform: scale(1.1) rotate(5deg);
}

/* News Cards */
.news-card {
    transition: all 0.4s ease;
}

.news-image-container {
    position: relative;
    overflow: hidden;
    border-radius: 20px 20px 0 0;
}

.news-image-container img {
    transition: transform 0.5s ease;
}

.news-card:hover .news-image-container img {
    transform: scale(1.1);
}

.news-overlay {
    position: absolute;
    top: 1rem;
    right: 1rem;
}

.news-overlay .badge {
    background: var(--primary-gradient);
    border: none;
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 0.8rem;
}

.news-meta {
    margin-bottom: 1rem;
}

/* Custom color classes for better balance */
.text-primary {
    background: var(--primary-gradient);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.text-success {
    color: var(--secondary-green) !important;
}

.text-info {
    color: var(--accent-teal) !important;
}

.text-warning {
    color: var(--warm-brown) !important;
}

.text-danger {
    color: #e74c3c !important;
}

.text-secondary {
    color: var(--dark-green) !important;
}

.bg-primary {
    background: var(--primary-gradient) !important;
}

.bg-success {
    background: var(--secondary-green) !important;
}

.bg-info {
    background: var(--accent-teal) !important;
}

.bg-warning {
    background: var(--warm-brown) !important;
}

.bg-danger {
    background: #e74c3c !important;
}

.bg-secondary {
    background: var(--dark-green) !important;
}

.btn-outline-success {
    border-color: var(--secondary-green);
    color: var(--secondary-green);
}

.btn-outline-success:hover {
    background: var(--secondary-green);
    border-color: var(--secondary-green);
}

.btn-outline-info {
    border-color: var(--accent-teal);
    color: var(--accent-teal);
}

.btn-outline-info:hover {
    background: var(--accent-teal);
    border-color: var(--accent-teal);
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .hero-image-container {
        margin-top: 2rem;
    }
    
    .stats-card {
        margin-bottom: 1rem;
    }
}
</style>
@endsection
