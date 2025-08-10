@extends('layouts.app')

@section('title', 'Sejarah - Desa Tetembomua')

@section('content')
<!-- Breadcrumb -->
<nav aria-label="breadcrumb" class="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
            <li class="breadcrumb-item"><a href="#">Profil Desa</a></li>
            <li class="breadcrumb-item active">Sejarah</li>
        </ol>
    </div>
</nav>

<!-- Hero Section -->
<section class="hero-section" style="min-height: 50vh;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 mx-auto text-center">
                <h1>Sejarah Desa Tetembomua</h1>
                <p>Mengenal perjalanan panjang desa kami dari masa lalu hingga sekarang</p>
            </div>
        </div>
    </div>
</section>

<!-- Timeline Section -->
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="timeline">
                    <div class="timeline-item">
                        <div class="timeline-marker"></div>
                        <div class="timeline-content">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Awal Mula (1800-1900)</h4>
                                    <p class="card-text">Desa Tetembomua berawal dari sekelompok keluarga petani yang mencari lahan subur untuk bercocok tanam. Nama "Tetembomua" berasal dari bahasa lokal yang berarti "tanah yang subur dan menjanjikan".</p>
                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <img src="https://images.unsplash.com/photo-1574323347407-f5e1ad6d020b?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                                                 alt="Awal Mula" class="img-fluid rounded">
                                        </div>
                                        <div class="col-md-6">
                                            <ul class="list-unstyled">
                                                <li><i class="fas fa-check text-success me-2"></i>Pemukiman pertama</li>
                                                <li><i class="fas fa-check text-success me-2"></i>Pembukaan lahan pertanian</li>
                                                <li><i class="fas fa-check text-success me-2"></i>Pembentukan struktur sosial</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="timeline-item">
                        <div class="timeline-marker"></div>
                        <div class="timeline-content">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Era Kolonial (1900-1945)</h4>
                                    <p class="card-text">Pada masa kolonial, Desa Tetembomua menjadi salah satu sentra produksi pertanian yang penting. Sistem pertanian tradisional mulai berkembang dengan pengenalan tanaman komersial.</p>
                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <ul class="list-unstyled">
                                                <li><i class="fas fa-check text-success me-2"></i>Pengenalan tanaman komersial</li>
                                                <li><i class="fas fa-check text-success me-2"></i>Pembangunan infrastruktur dasar</li>
                                                <li><i class="fas fa-check text-success me-2"></i>Peningkatan populasi</li>
                                            </ul>
                                        </div>
                                        <div class="col-md-6">
                                            <img src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                                                 alt="Era Kolonial" class="img-fluid rounded">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="timeline-item">
                        <div class="timeline-marker"></div>
                        <div class="timeline-content">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Era Kemerdekaan (1945-1980)</h4>
                                    <p class="card-text">Setelah kemerdekaan, Desa Tetembomua mengalami transformasi besar. Program pembangunan pertanian nasional membawa modernisasi ke desa ini.</p>
                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <img src="https://images.unsplash.com/photo-1574323347407-f5e1ad6d020b?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                                                 alt="Era Kemerdekaan" class="img-fluid rounded">
                                        </div>
                                        <div class="col-md-6">
                                            <ul class="list-unstyled">
                                                <li><i class="fas fa-check text-success me-2"></i>Program revolusi hijau</li>
                                                <li><i class="fas fa-check text-success me-2"></i>Pembangunan irigasi</li>
                                                <li><i class="fas fa-check text-success me-2"></i>Pendidikan petani</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="timeline-item">
                        <div class="timeline-marker"></div>
                        <div class="timeline-content">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Era Modern (1980-Sekarang)</h4>
                                    <p class="card-text">Di era modern, Desa Tetembomua terus berkembang dengan mengadopsi teknologi pertanian modern sambil mempertahankan kearifan lokal.</p>
                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <ul class="list-unstyled">
                                                <li><i class="fas fa-check text-success me-2"></i>Teknologi pertanian modern</li>
                                                <li><i class="fas fa-check text-success me-2"></i>Pertanian organik</li>
                                                <li><i class="fas fa-check text-success me-2"></i>Pemasaran digital</li>
                                            </ul>
                                        </div>
                                        <div class="col-md-6">
                                            <img src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                                                 alt="Era Modern" class="img-fluid rounded">
                                        </div>
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

<!-- Legacy Section -->
<section class="section bg-light">
    <div class="container">
        <div class="section-title">
            <h2>Warisan Budaya</h2>
            <p>Nilai-nilai dan tradisi yang tetap terjaga hingga saat ini</p>
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

<style>
.timeline {
    position: relative;
    padding: 2rem 0;
}

.timeline::before {
    content: '';
    position: absolute;
    left: 50%;
    top: 0;
    bottom: 0;
    width: 2px;
    background: var(--primary-green);
    transform: translateX(-50%);
}

.timeline-item {
    position: relative;
    margin-bottom: 3rem;
}

.timeline-marker {
    position: absolute;
    left: 50%;
    top: 20px;
    width: 20px;
    height: 20px;
    background: var(--primary-green);
    border-radius: 50%;
    transform: translateX(-50%);
    z-index: 2;
}

.timeline-content {
    width: 45%;
    margin-left: 55%;
}

.timeline-item:nth-child(even) .timeline-content {
    margin-left: 0;
    margin-right: 55%;
}

@media (max-width: 768px) {
    .timeline::before {
        left: 20px;
    }
    
    .timeline-marker {
        left: 20px;
    }
    
    .timeline-content {
        width: calc(100% - 50px);
        margin-left: 50px;
    }
    
    .timeline-item:nth-child(even) .timeline-content {
        margin-left: 50px;
        margin-right: 0;
    }
}
</style>
@endsection
