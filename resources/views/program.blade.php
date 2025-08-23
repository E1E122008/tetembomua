@extends('layouts.app')

@section('title', 'Program Desa - Desa Tetembomua')

@section('content')
<!-- Hero Section -->
<section class="hero-section" style="background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('/FOTO/DSC_0605.JPG') center/cover;">
    <div class="container">
        <div class="row align-items-center min-vh-50">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-4 fw-bold text-white mb-4">Program Desa Tetembomua</h1>
                <p class="lead text-white mb-0">Program Pembangunan dan Pengembangan Desa yang Berkelanjutan</p>
            </div>
        </div>
    </div>
</section>

<!-- Program Pembangunan -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center mb-5">
                <h2 class="section-title">Program Pembangunan</h2>
                <div class="title-underline"></div>
                <p class="text-muted">Program pembangunan infrastruktur dan fasilitas desa</p>
            </div>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="program-card">
                    <div class="program-status ongoing">Sedang Berjalan</div>
                    <div class="card-icon">
                        <i class="fas fa-road"></i>
                    </div>
                    <h4>Pembangunan Jalan Desa</h4>
                    <p class="program-desc">Pembangunan dan perbaikan jalan desa untuk meningkatkan aksesibilitas</p>
                    <div class="program-details">
                        <div class="detail-item">
                            <span class="label">Lokasi:</span>
                            <span class="value">Dusun I, II, III</span>
                        </div>
                        <div class="detail-item">
                            <span class="label">Anggaran:</span>
                            <span class="value">Rp 500.000.000</span>
                        </div>
                        <div class="detail-item">
                            <span class="label">Target:</span>
                            <span class="value">Desember 2024</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="program-card">
                    <div class="program-status completed">Selesai</div>
                    <div class="card-icon">
                        <i class="fas fa-tint"></i>
                    </div>
                    <h4>Pembangunan Air Bersih</h4>
                    <p class="program-desc">Instalasi sistem air bersih untuk seluruh warga desa</p>
                    <div class="program-details">
                        <div class="detail-item">
                            <span class="label">Lokasi:</span>
                            <span class="value">Seluruh Desa</span>
                        </div>
                        <div class="detail-item">
                            <span class="label">Anggaran:</span>
                            <span class="value">Rp 300.000.000</span>
                        </div>
                        <div class="detail-item">
                            <span class="label">Selesai:</span>
                            <span class="value">Juni 2024</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="program-card">
                    <div class="program-status planned">Direncanakan</div>
                    <div class="card-icon">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <h4>Penerangan Jalan</h4>
                    <p class="program-desc">Instalasi lampu jalan tenaga surya di seluruh desa</p>
                    <div class="program-details">
                        <div class="detail-item">
                            <span class="label">Lokasi:</span>
                            <span class="value">Jalan Utama</span>
                        </div>
                        <div class="detail-item">
                            <span class="label">Anggaran:</span>
                            <span class="value">Rp 200.000.000</span>
                        </div>
                        <div class="detail-item">
                            <span class="label">Target:</span>
                            <span class="value">Maret 2025</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SDGs Program -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center mb-5">
                <h2 class="section-title">Program SDGs Desa</h2>
                <div class="title-underline"></div>
                <p class="text-muted">Sustainable Development Goals untuk pembangunan berkelanjutan</p>
            </div>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="sdgs-card" style="background: linear-gradient(135deg, #E5243B, #FF6B6B);">
                    <div class="sdgs-number">1</div>
                    <h5>Tanpa Kemiskinan</h5>
                    <p>Program pemberdayaan ekonomi masyarakat miskin</p>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-check me-2"></i>Bantuan UMKM</li>
                        <li><i class="fas fa-check me-2"></i>Pelatihan Wirausaha</li>
                    </ul>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="sdgs-card" style="background: linear-gradient(135deg, #DDA63A, #FFD93D);">
                    <div class="sdgs-number">2</div>
                    <h5>Tanpa Kelaparan</h5>
                    <p>Program ketahanan pangan dan pertanian berkelanjutan</p>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-check me-2"></i>Diversifikasi Pangan</li>
                        <li><i class="fas fa-check me-2"></i>Pertanian Organik</li>
                    </ul>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="sdgs-card" style="background: linear-gradient(135deg, #4C9F38, #6BCF7F);">
                    <div class="sdgs-number">3</div>
                    <h5>Kehidupan Sehat</h5>
                    <p>Program kesehatan dan kesejahteraan masyarakat</p>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-check me-2"></i>Posyandu Lansia</li>
                        <li><i class="fas fa-check me-2"></i>Sanitasi Lingkungan</li>
                    </ul>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="sdgs-card" style="background: linear-gradient(135deg, #C5192D, #FF8A80);">
                    <div class="sdgs-number">4</div>
                    <h5>Pendidikan Berkualitas</h5>
                    <p>Program pendidikan yang inklusif dan berkualitas</p>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-check me-2"></i>Beasiswa Anak</li>
                        <li><i class="fas fa-check me-2"></i>Perpustakaan Desa</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Usulan Masyarakat -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center mb-5">
                <h2 class="section-title">Usulan Masyarakat</h2>
                <div class="title-underline"></div>
                <p class="text-muted">Aspirasi dan usulan dari masyarakat desa</p>
            </div>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="usulan-card">
                    <div class="usulan-header">
                        <div class="usulan-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="usulan-info">
                            <h5>Pembangunan Balai Desa</h5>
                            <span class="usulan-date">Diusulkan: 15 Oktober 2024</span>
                        </div>
                    </div>
                    <p class="usulan-desc">Pembangunan balai desa yang lebih besar untuk menampung kegiatan masyarakat dan rapat desa</p>
                    <div class="usulan-stats">
                        <span class="stat-item"><i class="fas fa-thumbs-up"></i> 45 Dukungan</span>
                        <span class="stat-item"><i class="fas fa-comments"></i> 12 Komentar</span>
                    </div>
                    <div class="progress mt-3">
                        <div class="progress-bar" style="width: 75%">75% Dukungan</div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="usulan-card">
                    <div class="usulan-header">
                        <div class="usulan-icon">
                            <i class="fas fa-wifi"></i>
                        </div>
                        <div class="usulan-info">
                            <h5>Internet Desa</h5>
                            <span class="usulan-date">Diusulkan: 20 Oktober 2024</span>
                        </div>
                    </div>
                    <p class="usulan-desc">Pemasangan internet desa untuk mendukung pendidikan dan ekonomi digital</p>
                    <div class="usulan-stats">
                        <span class="stat-item"><i class="fas fa-thumbs-up"></i> 38 Dukungan</span>
                        <span class="stat-item"><i class="fas fa-comments"></i> 8 Komentar</span>
                    </div>
                    <div class="progress mt-3">
                        <div class="progress-bar" style="width: 60%">60% Dukungan</div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="usulan-card">
                    <div class="usulan-header">
                        <div class="usulan-icon">
                            <i class="fas fa-leaf"></i>
                        </div>
                        <div class="usulan-info">
                            <h5>Program Go Green</h5>
                            <span class="usulan-date">Diusulkan: 25 Oktober 2024</span>
                        </div>
                    </div>
                    <p class="usulan-desc">Program penghijauan desa dengan penanaman pohon dan pengelolaan sampah</p>
                    <div class="usulan-stats">
                        <span class="stat-item"><i class="fas fa-thumbs-up"></i> 52 Dukungan</span>
                        <span class="stat-item"><i class="fas fa-comments"></i> 15 Komentar</span>
                    </div>
                    <div class="progress mt-3">
                        <div class="progress-bar" style="width: 85%">85% Dukungan</div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="usulan-card">
                    <div class="usulan-header">
                        <div class="usulan-icon">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <div class="usulan-info">
                            <h5>Pelatihan Komputer</h5>
                            <span class="usulan-date">Diusulkan: 30 Oktober 2024</span>
                        </div>
                    </div>
                    <p class="usulan-desc">Pelatihan komputer dan teknologi informasi untuk pemuda desa</p>
                    <div class="usulan-stats">
                        <span class="stat-item"><i class="fas fa-thumbs-up"></i> 41 Dukungan</span>
                        <span class="stat-item"><i class="fas fa-comments"></i> 10 Komentar</span>
                    </div>
                    <div class="progress mt-3">
                        <div class="progress-bar" style="width: 70%">70% Dukungan</div>
                    </div>
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
                <h3 class="text-white mb-4">Sampaikan Aspirasi Anda</h3>
                <p class="text-white mb-4">Berkontribusi dalam pembangunan desa dengan menyampaikan usulan dan aspirasi Anda</p>
                <a href="{{ route('contact') }}" class="btn btn-light btn-lg">Kirim Usulan</a>
            </div>
        </div>
    </div>
</section>

<style>
.program-card {
    background: white;
    padding: 2rem;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    position: relative;
    transition: all 0.3s ease;
    height: 100%;
}

.program-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.15);
}

.program-status {
    position: absolute;
    top: 1rem;
    right: 1rem;
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
    color: white;
}

.program-status.ongoing {
    background: #FFA726;
}

.program-status.completed {
    background: #66BB6A;
}

.program-status.planned {
    background: #42A5F5;
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

.program-card h4 {
    color: var(--primary-green);
    margin-bottom: 1rem;
    font-weight: 600;
    text-align: center;
}

.program-desc {
    color: var(--text-light);
    text-align: center;
    margin-bottom: 1.5rem;
}

.program-details {
    background: var(--bg-light);
    padding: 1rem;
    border-radius: 10px;
}

.detail-item {
    display: flex;
    justify-content: space-between;
    margin-bottom: 0.5rem;
}

.detail-item:last-child {
    margin-bottom: 0;
}

.detail-item .label {
    font-weight: 600;
    color: var(--text-dark);
}

.detail-item .value {
    color: var(--text-light);
}

/* SDGs Cards */
.sdgs-card {
    color: white;
    padding: 2rem;
    border-radius: 15px;
    text-align: center;
    transition: all 0.3s ease;
    height: 100%;
    position: relative;
    overflow: hidden;
}

.sdgs-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.2);
}

.sdgs-number {
    font-size: 3rem;
    font-weight: 700;
    opacity: 0.3;
    position: absolute;
    top: 1rem;
    right: 1rem;
}

.sdgs-card h5 {
    font-weight: 600;
    margin-bottom: 1rem;
    position: relative;
    z-index: 1;
}

.sdgs-card p {
    margin-bottom: 1rem;
    position: relative;
    z-index: 1;
}

.sdgs-card ul li {
    margin-bottom: 0.5rem;
    position: relative;
    z-index: 1;
}

/* Usulan Cards */
.usulan-card {
    background: white;
    padding: 2rem;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    height: 100%;
}

.usulan-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0,0,0,0.15);
}

.usulan-header {
    display: flex;
    align-items: center;
    margin-bottom: 1rem;
}

.usulan-icon {
    width: 60px;
    height: 60px;
    background: var(--primary-gradient);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 1rem;
}

.usulan-icon i {
    font-size: 1.5rem;
    color: white;
}

.usulan-info h5 {
    color: var(--primary-green);
    margin-bottom: 0.25rem;
    font-weight: 600;
}

.usulan-date {
    font-size: 0.9rem;
    color: var(--text-light);
}

.usulan-desc {
    color: var(--text-dark);
    margin-bottom: 1rem;
    line-height: 1.6;
}

.usulan-stats {
    display: flex;
    gap: 1rem;
    margin-bottom: 1rem;
}

.stat-item {
    font-size: 0.9rem;
    color: var(--text-light);
}

.stat-item i {
    color: var(--primary-green);
    margin-right: 0.25rem;
}

.progress {
    height: 8px;
    border-radius: 4px;
    background: var(--bg-light);
}

.progress-bar {
    background: var(--primary-gradient);
    border-radius: 4px;
    font-size: 0.8rem;
    color: white;
    text-align: center;
    line-height: 8px;
}
</style>
@endsection
