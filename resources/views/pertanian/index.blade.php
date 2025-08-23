@extends('layouts.app')

@section('title', 'Pertanian - Desa Tetembomua')

@section('content')
<!-- Breadcrumb -->
<nav aria-label="breadcrumb" class="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
            <li class="breadcrumb-item active">Pertanian</li>
        </ol>
    </div>
</nav>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <div class="hero-content">
                    <div class="text-center mb-4">
                        <img src="{{ asset('FOTO/LOGO-removebg-preview.png') }}" alt="Logo Desa Tetembomua" height="60" class="mb-3">
                    </div>
                    <h1 class="display-4 fw-bold mb-4">Sektor Pertanian Desa Tetembomua</h1>
                    <p class="lead mb-4">Mengembangkan pertanian modern yang berkelanjutan dengan mengedepankan kearifan lokal dan teknologi inovatif</p>
                </div>
            </div>
            <div class="col-lg-4 text-center">
                <i class="fas fa-seedling fa-6x text-white opacity-75"></i>
            </div>
        </div>
    </div>
</section>

<!-- Overview Section -->
<section class="section">
    <div class="container">
                <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card fade-in">
                    <div class="card-body p-5">
                        <div class="text-center mb-5">
                            <i class="fas fa-chart-pie fa-4x text-success mb-3"></i>
                            <h2 class="text-success fw-bold">GAMBARAN UMUM PERTANIAN</h2>
                            </div>

                        <div class="row mb-5">
                            <div class="col-md-6">
                                <div class="info-box">
                                    <div class="info-icon">
                                        <i class="fas fa-users fa-2x text-primary"></i>
                        </div>
                                    <div class="info-content">
                                        <h5 class="text-primary">Petani</h5>
                                        <p>206 petani aktif dengan pengalaman bertani yang tinggi</p>
                            </div>
                        </div>
                    </div>
                            <div class="col-md-6">
                                <div class="info-box">
                                    <div class="info-icon">
                                        <i class="fas fa-ruler-combined fa-2x text-success"></i>
                            </div>
                                    <div class="info-content">
                                        <h5 class="text-success">Luas Lahan</h5>
                                        <p>10,54 km² dengan mayoritas lahan perkebunan</p>
                </div>
            </div>
        </div>
    </div>

                        <div class="row mb-5">
                            <div class="col-md-6">
                                <div class="info-box">
                                    <div class="info-icon">
                                        <i class="fas fa-seedling fa-2x text-warning"></i>
        </div>
                                    <div class="info-content">
                                        <h5 class="text-warning">Komoditas Utama</h5>
                                        <p>Kelapa Sawit, Kakao, dan Lada sebagai komoditas unggulan</p>
                    </div>
                </div>
            </div>
                            <div class="col-md-6">
                                <div class="info-box">
                                    <div class="info-icon">
                                        <i class="fas fa-chart-line fa-2x text-info"></i>
                    </div>
                                    <div class="info-content">
                                        <h5 class="text-info">Produktivitas</h5>
                                        <p>Produktivitas tinggi dengan teknologi pertanian modern</p>
                    </div>
                </div>
            </div>
        </div>

                        <hr class="my-5">

                        <h3 class="text-center mb-4">
                            <i class="fas fa-leaf me-3 text-success"></i>
                            Jenis Pertanian
                        </h3>

        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="agriculture-card">
                                    <div class="agriculture-icon">
                                        <i class="fas fa-tree fa-3x text-success"></i>
                                    </div>
                                    <h5 class="text-success">Kelapa Sawit</h5>
                                    <p>Komoditas perkebunan utama dengan produktivitas tinggi dan nilai ekonomi yang stabil.</p>
                                    <div class="agriculture-stats">
                                        <span class="badge bg-success">Unggulan</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="agriculture-card">
                                    <div class="agriculture-icon">
                                        <i class="fas fa-seedling fa-3x text-warning"></i>
                                    </div>
                                    <h5 class="text-warning">Kakao</h5>
                                    <p>Tanaman kakao berkualitas tinggi dengan pengolahan yang menghasilkan produk premium.</p>
                                    <div class="agriculture-stats">
                                        <span class="badge bg-warning">Premium</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="agriculture-card">
                                    <div class="agriculture-icon">
                                        <i class="fas fa-pepper-hot fa-3x text-danger"></i>
                    </div>
                                    <h5 class="text-danger">Lada</h5>
                                    <p>Lada hitam dan putih dengan aroma dan rasa yang khas untuk pasar lokal dan ekspor.</p>
                                    <div class="agriculture-stats">
                                        <span class="badge bg-danger">Ekspor</span>
                </div>
            </div>
        </div>
    </div>

                        <hr class="my-5">

                        <h3 class="text-center mb-4">
                            <i class="fas fa-tools me-3 text-primary"></i>
                            Teknologi Pertanian
                        </h3>

        <div class="row">
            <div class="col-lg-6 mb-4">
                                <div class="tech-card">
                                    <div class="tech-icon">
                                        <i class="fas fa-tint fa-2x text-info"></i>
                        </div>
                                    <div class="tech-content">
                                        <h5 class="text-info">Sistem Irigasi</h5>
                                        <p>Sistem irigasi modern yang memastikan ketersediaan air untuk tanaman sepanjang tahun.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mb-4">
                                <div class="tech-card">
                                    <div class="tech-icon">
                                        <i class="fas fa-leaf fa-2x text-success"></i>
                        </div>
                                    <div class="tech-content">
                                        <h5 class="text-success">Pupuk Organik</h5>
                                        <p>Penggunaan pupuk organik untuk menjaga kesuburan tanah dan kelestarian lingkungan.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mb-4">
                                <div class="tech-card">
                                    <div class="tech-icon">
                                        <i class="fas fa-bug fa-2x text-warning"></i>
                        </div>
                                    <div class="tech-content">
                                        <h5 class="text-warning">Pengendalian Hama</h5>
                                        <p>Sistem pengendalian hama terpadu yang ramah lingkungan dan efektif.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mb-4">
                                <div class="tech-card">
                                    <div class="tech-icon">
                                        <i class="fas fa-chart-line fa-2x text-primary"></i>
                                    </div>
                                    <div class="tech-content">
                                        <h5 class="text-primary">Monitoring Digital</h5>
                                        <p>Sistem monitoring digital untuk memantau pertumbuhan dan kesehatan tanaman.</p>
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

<style>
.info-box {
    display: flex;
    align-items: flex-start;
    margin-bottom: 2rem;
    padding: 1.5rem;
    background: linear-gradient(135deg, rgba(46, 139, 87, 0.05), rgba(60, 179, 113, 0.02));
    border-radius: 15px;
    border-left: 4px solid var(--primary-green);
}

.info-icon {
    margin-right: 1rem;
    flex-shrink: 0;
}

.info-content h5 {
    margin-bottom: 0.5rem;
    font-weight: 600;
}

.info-content p {
    margin-bottom: 0;
    color: var(--text-dark);
}

.agriculture-card {
    background: white;
    border-radius: 15px;
    padding: 2rem;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    border-left: 4px solid var(--primary-green);
    text-align: center;
    height: 100%;
    transition: all 0.3s ease;
}

.agriculture-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(46, 139, 87, 0.2);
}

.agriculture-icon {
    margin-bottom: 1.5rem;
}

.agriculture-card h5 {
    margin-bottom: 1rem;
    font-weight: 600;
}

.agriculture-card p {
    color: var(--text-light);
    margin-bottom: 1.5rem;
}

.agriculture-stats {
    margin-top: auto;
}

.tech-card {
    display: flex;
    align-items: flex-start;
    padding: 1.5rem;
    background: white;
    border-radius: 15px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    border-left: 4px solid var(--primary-green);
    transition: all 0.3s ease;
}

.tech-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(46, 139, 87, 0.2);
}

.tech-icon {
    margin-right: 1rem;
    flex-shrink: 0;
}

.tech-content h5 {
    margin-bottom: 0.5rem;
    font-weight: 600;
}

.tech-content p {
    margin-bottom: 0;
    color: var(--text-light);
}
</style>
@endsection

