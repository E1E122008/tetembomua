@extends('layouts.app')

@section('title', 'Struktur Organisasi - Desa Tetembomua')

@section('content')
<!-- Breadcrumb -->
<nav aria-label="breadcrumb" class="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
            <li class="breadcrumb-item"><a href="#">Profil Desa</a></li>
            <li class="breadcrumb-item active">Struktur Organisasi</li>
        </ol>
    </div>
</nav>

<!-- Hero Section -->
<section class="hero-section" style="min-height: 50vh;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 mx-auto text-center">
                <h1>Struktur Organisasi Desa</h1>
                <p>Organisasi pemerintahan desa yang mengelola dan mengembangkan Desa Tetembomua</p>
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
                     alt="Struktur Organisasi" class="img-fluid rounded-3 shadow">
            </div>
            <div class="col-lg-6">
                <h2 class="mb-4">Pemerintahan Desa</h2>
                <p class="mb-4">Struktur organisasi Desa Tetembomua dirancang untuk memberikan pelayanan yang optimal kepada masyarakat dan mengembangkan potensi desa secara berkelanjutan. Setiap elemen organisasi memiliki peran dan tanggung jawab yang jelas dalam mencapai visi dan misi desa.</p>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-users text-primary me-3 fa-2x"></i>
                            <div>
                                <h6 class="mb-0">15+ Aparatur</h6>
                                <small class="text-muted">Desa yang aktif</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-chart-line text-success me-3 fa-2x"></i>
                            <div>
                                <h6 class="mb-0">Efisien</h6>
                                <small class="text-muted">Pelayanan optimal</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Organizational Chart Section -->
<section class="section bg-light">
    <div class="container">
        <div class="section-title">
            <h2>Struktur Organisasi</h2>
            <p>Hierarki dan hubungan kerja dalam pemerintahan Desa Tetembomua</p>
        </div>
        <div class="org-chart">
            <!-- Level 1: Kepala Desa -->
            <div class="org-level">
                <div class="org-item chief">
                    <div class="org-card">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80" 
                             alt="Kepala Desa" class="org-avatar">
                        <h5>Kepala Desa</h5>
                        <p class="text-muted">Ahmad Supriadi</p>
                        <small>Periode 2021-2027</small>
                    </div>
                </div>
            </div>

            <!-- Level 2: Sekretaris dan Kasi -->
            <div class="org-level">
                <div class="org-item">
                    <div class="org-card">
                        <img src="https://images.unsplash.com/photo-1494790108755-2616b612b786?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80" 
                             alt="Sekretaris Desa" class="org-avatar">
                        <h6>Sekretaris Desa</h6>
                        <p class="text-muted">Siti Nurhaliza</p>
                    </div>
                </div>
                <div class="org-item">
                    <div class="org-card">
                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80" 
                             alt="Kasi Pemerintahan" class="org-avatar">
                        <h6>Kasi Pemerintahan</h6>
                        <p class="text-muted">Budi Santoso</p>
                    </div>
                </div>
                <div class="org-item">
                    <div class="org-card">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80" 
                             alt="Kasi Kesejahteraan" class="org-avatar">
                        <h6>Kasi Kesejahteraan</h6>
                        <p class="text-muted">Rudi Hartono</p>
                    </div>
                </div>
                <div class="org-item">
                    <div class="org-card">
                        <img src="https://images.unsplash.com/photo-1494790108755-2616b612b786?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80" 
                             alt="Kasi Pelayanan" class="org-avatar">
                        <h6>Kasi Pelayanan</h6>
                        <p class="text-muted">Dewi Sartika</p>
                    </div>
                </div>
            </div>

            <!-- Level 3: Staff -->
            <div class="org-level">
                <div class="org-item">
                    <div class="org-card small">
                        <h6>Staff Pemerintahan</h6>
                        <p class="text-muted">3 Orang</p>
                    </div>
                </div>
                <div class="org-item">
                    <div class="org-card small">
                        <h6>Staff Kesejahteraan</h6>
                        <p class="text-muted">2 Orang</p>
                    </div>
                </div>
                <div class="org-item">
                    <div class="org-card small">
                        <h6>Staff Pelayanan</h6>
                        <p class="text-muted">2 Orang</p>
                    </div>
                </div>
                <div class="org-item">
                    <div class="org-card small">
                        <h6>Staff Umum</h6>
                        <p class="text-muted">3 Orang</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Leadership Profiles Section -->
<section class="section">
    <div class="container">
        <div class="section-title">
            <h2>Profil Pimpinan</h2>
            <p>Para pemimpin yang menggerakkan kemajuan Desa Tetembomua</p>
        </div>
        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80" 
                                     alt="Kepala Desa" class="img-fluid rounded mb-3">
                            </div>
                            <div class="col-md-8">
                                <h5 class="card-title">Ahmad Supriadi</h5>
                                <p class="text-muted">Kepala Desa</p>
                                <p class="card-text">Memimpin Desa Tetembomua dengan visi pengembangan pertanian berkelanjutan dan pemberdayaan masyarakat.</p>
                                <div class="row">
                                    <div class="col-6">
                                        <small class="text-muted">Periode</small>
                                        <p class="mb-0">2021-2027</p>
                                    </div>
                                    <div class="col-6">
                                        <small class="text-muted">Pengalaman</small>
                                        <p class="mb-0">25 Tahun</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="https://images.unsplash.com/photo-1494790108755-2616b612b786?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80" 
                                     alt="Sekretaris Desa" class="img-fluid rounded mb-3">
                            </div>
                            <div class="col-md-8">
                                <h5 class="card-title">Siti Nurhaliza</h5>
                                <p class="text-muted">Sekretaris Desa</p>
                                <p class="card-text">Mengelola administrasi desa dan program pengembangan pertanian dengan dedikasi tinggi.</p>
                                <div class="row">
                                    <div class="col-6">
                                        <small class="text-muted">Jabatan</small>
                                        <p class="mb-0">Sekretaris</p>
                                    </div>
                                    <div class="col-6">
                                        <small class="text-muted">Pendidikan</small>
                                        <p class="mb-0">S1 Administrasi</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Departments Section -->
<section class="section bg-light">
    <div class="container">
        <div class="section-title">
            <h2>Bidang dan Tugas</h2>
            <p>Pembagian tugas dan tanggung jawab dalam pemerintahan desa</p>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-building text-primary me-2"></i>
                            Bidang Pemerintahan
                        </h5>
                        <p class="card-text">Mengelola administrasi kependudukan, pertanahan, dan ketentraman desa.</p>
                        <ul class="list-unstyled">
                            <li><i class="fas fa-check text-success me-2"></i>Administrasi kependudukan</li>
                            <li><i class="fas fa-check text-success me-2"></i>Pertanahan</li>
                            <li><i class="fas fa-check text-success me-2"></i>Ketentraman</li>
                            <li><i class="fas fa-check text-success me-2"></i>Keamanan</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-heart text-success me-2"></i>
                            Bidang Kesejahteraan
                        </h5>
                        <p class="card-text">Mengembangkan program sosial, kesehatan, dan pemberdayaan masyarakat.</p>
                        <ul class="list-unstyled">
                            <li><i class="fas fa-check text-success me-2"></i>Program sosial</li>
                            <li><i class="fas fa-check text-success me-2"></i>Kesehatan masyarakat</li>
                            <li><i class="fas fa-check text-success me-2"></i>Pemberdayaan</li>
                            <li><i class="fas fa-check text-success me-2"></i>Pendidikan</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-handshake text-warning me-2"></i>
                            Bidang Pelayanan
                        </h5>
                        <p class="card-text">Memberikan pelayanan administrasi dan informasi kepada masyarakat.</p>
                        <ul class="list-unstyled">
                            <li><i class="fas fa-check text-success me-2"></i>Pelayanan administrasi</li>
                            <li><i class="fas fa-check text-success me-2"></i>Informasi publik</li>
                            <li><i class="fas fa-check text-success me-2"></i>Pengaduan masyarakat</li>
                            <li><i class="fas fa-check text-success me-2"></i>Koordinasi</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- BPD Section -->
<section class="section">
    <div class="container">
        <div class="section-title">
            <h2>Badan Permusyawaratan Desa (BPD)</h2>
            <p>Lembaga perwakilan masyarakat yang berfungsi mengayomi dan menyalurkan aspirasi</p>
        </div>
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 text-center">
                                <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80" 
                                     alt="Ketua BPD" class="img-fluid rounded mb-3">
                                <h5>Ketua BPD</h5>
                                <p class="text-muted">H. Muhammad Rizki</p>
                            </div>
                            <div class="col-md-8">
                                <h5>Anggota BPD</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <ul class="list-unstyled">
                                            <li><i class="fas fa-user text-primary me-2"></i>Wakil Ketua: Siti Aminah</li>
                                            <li><i class="fas fa-user text-success me-2"></i>Sekretaris: Ahmad Fauzi</li>
                                            <li><i class="fas fa-user text-warning me-2"></i>Anggota: Budi Prasetyo</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <ul class="list-unstyled">
                                            <li><i class="fas fa-user text-info me-2"></i>Anggota: Dewi Sartika</li>
                                            <li><i class="fas fa-user text-danger me-2"></i>Anggota: Rudi Hartono</li>
                                            <li><i class="fas fa-user text-secondary me-2"></i>Anggota: Nurul Hidayah</li>
                                        </ul>
                                    </div>
                                </div>
                                <p class="mt-3">BPD berfungsi sebagai lembaga perwakilan masyarakat yang mengayomi dan menyalurkan aspirasi masyarakat dalam penyelenggaraan pemerintahan desa.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Information Section -->
<section class="section bg-light">
    <div class="container">
        <div class="section-title">
            <h2>Informasi Kontak</h2>
            <p>Hubungi aparatur desa untuk layanan dan informasi</p>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-phone fa-3x text-primary mb-3"></i>
                        <h5 class="card-title">Kepala Desa</h5>
                        <p class="card-text">+62 812-3456-7890</p>
                        <small class="text-muted">Jam Kerja: 08:00 - 16:00</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-envelope fa-3x text-success mb-3"></i>
                        <h5 class="card-title">Sekretaris Desa</h5>
                        <p class="card-text">sekretaris@desatetembomua.id</p>
                        <small class="text-muted">Respon: 24 jam</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-map-marker-alt fa-3x text-warning mb-3"></i>
                        <h5 class="card-title">Kantor Desa</h5>
                        <p class="card-text">Jl. Desa Tetembomua No. 1</p>
                        <small class="text-muted">Senin - Sabtu</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.org-chart {
    text-align: center;
    margin: 2rem 0;
}

.org-level {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-bottom: 2rem;
    flex-wrap: wrap;
}

.org-item {
    margin: 0 1rem;
    position: relative;
}

.org-item.chief {
    margin-bottom: 2rem;
}

.org-card {
    background: white;
    border: 2px solid var(--primary-green);
    border-radius: 10px;
    padding: 1rem;
    min-width: 150px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    transition: transform 0.3s ease;
}

.org-card:hover {
    transform: translateY(-5px);
}

.org-card.chief {
    border-color: var(--dark-green);
    background: linear-gradient(135deg, var(--primary-green), var(--secondary-green));
    color: white;
}

.org-card.small {
    min-width: 120px;
    padding: 0.5rem;
}

.org-avatar {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    object-fit: cover;
    margin-bottom: 0.5rem;
}

.org-level:not(:last-child)::after {
    content: '';
    position: absolute;
    bottom: -1rem;
    left: 50%;
    width: 2px;
    height: 1rem;
    background: var(--primary-green);
    transform: translateX(-50%);
}

@media (max-width: 768px) {
    .org-level {
        flex-direction: column;
    }
    
    .org-item {
        margin: 0.5rem 0;
    }
}
</style>
@endsection
