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
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <div class="hero-content">
                    <h1 class="display-4 fw-bold mb-4">Struktur Organisasi</h1>
                    <p class="lead mb-4">Pemerintahan Desa Tetembomua yang transparan dan partisipatif untuk melayani masyarakat</p>
                </div>
            </div>
            <div class="col-lg-4 text-center">
                <i class="fas fa-sitemap fa-6x text-white opacity-75"></i>
            </div>
        </div>
    </div>
</section>

<!-- Struktur Section -->
<section class="section">
    <div class="container">
        <!-- Pemerintah Desa -->
        <div class="row mb-5">
            <div class="col-12">
                <div class="card fade-in">
                    <div class="card-body p-5">
                        <div class="text-center mb-5">
                            <i class="fas fa-building fa-4x text-primary mb-3"></i>
                            <h2 class="text-primary fw-bold">PEMERINTAH DESA TETEMBOMUA</h2>
                            <p class="text-muted">Periode 2024 - Sekarang</p>
            </div>

                        <!-- Kepala Desa -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <div class="kepala-desa-card">
                                    <div class="text-center">
                                        <div class="avatar-container mb-3">
                                            <img src="{{ asset('FOTO/DSC_0596.JPG') }}" alt="Kepala Desa Abdullah, SP" class="rounded-circle" style="width: 100px; height: 100px; object-fit: cover; border: 3px solid white;">
                            </div>
                                        <h3 class="text-primary fw-bold">KEPALA DESA</h3>
                                        <h4 class="text-success">ABDULLAH, SP</h4>
                                        <p class="text-muted">Masa Jabatan: 2024 - Sekarang</p>
                            </div>
                        </div>
                    </div>
                </div>

                        <!-- Perangkat Desa -->
                        <div class="row">
                            <div class="col-12">
                                <h4 class="text-center mb-4">
                                    <i class="fas fa-users me-2 text-success"></i>
                                    PERANGKAT DESA
                                </h4>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="perangkat-card">
                                    <div class="perangkat-header">
                                        <i class="fas fa-file-alt fa-2x text-primary"></i>
                                        <h5 class="text-primary">Sekretaris Desa</h5>
                                    </div>
                                    <div class="perangkat-body">
                                        <h6 class="fw-bold">AHMAD FAJAR</h6>
            </div>
        </div>
    </div>

                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="perangkat-card">
                                    <div class="perangkat-header">
                                        <i class="fas fa-gavel fa-2x text-success"></i>
                                        <h5 class="text-success">Kasi Pemerintahan</h5>
        </div>
                                    <div class="perangkat-body">
                                        <h6 class="fw-bold">DARRMAWATI</h6>
                    </div>
                </div>
            </div>

                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="perangkat-card">
                                    <div class="perangkat-header">
                                        <i class="fas fa-heart fa-2x text-warning"></i>
                                        <h5 class="text-warning">Kasi Kesejahteraan</h5>
                    </div>
                                    <div class="perangkat-body">
                                        <h6 class="fw-bold">ARFAN</h6>
                    </div>
                </div>
                    </div>

                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="perangkat-card">
                                    <div class="perangkat-header">
                                        <i class="fas fa-handshake fa-2x text-info"></i>
                                        <h5 class="text-info">Kasi Pelayanan</h5>
                </div>
                                    <div class="perangkat-body">
                                        <h6 class="fw-bold">BASO SUARDI</h6>
                    </div>
                </div>
            </div>

                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="perangkat-card">
                                    <div class="perangkat-header">
                                        <i class="fas fa-edit fa-2x text-danger"></i>
                                        <h5 class="text-danger">Kaur TU dan Umum</h5>
                    </div>
                                    <div class="perangkat-body">
                                        <h6 class="fw-bold">DEVI FERAWATI</h6>
                    </div>
                </div>
                    </div>

                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="perangkat-card">
                                    <div class="perangkat-header">
                                        <i class="fas fa-coins fa-2x text-primary"></i>
                                        <h5 class="text-primary">Kaur Keuangan</h5>
                </div>
                                    <div class="perangkat-body">
                                        <h6 class="fw-bold">ASRIANI</h6>
                </div>
            </div>
        </div>

                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="perangkat-card">
                                    <div class="perangkat-header">
                                        <i class="fas fa-chart-line fa-2x text-success"></i>
                                        <h5 class="text-success">Kaur Perencanaan</h5>
        </div>
                                    <div class="perangkat-body">
                                        <h6 class="fw-bold">SOFIAN EFENDI</h6>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <!-- BPD -->
        <div class="row mb-5">
            <div class="col-12">
                <div class="card fade-in">
                    <div class="card-body p-5">
                        <div class="text-center mb-5">
                            <i class="fas fa-balance-scale fa-4x text-success mb-3"></i>
                            <h2 class="text-success fw-bold">BADAN PERMUSYAWARATAN DESA (BPD)</h2>
                            <p class="text-muted">Lembaga yang melaksanakan fungsi pemerintahan yang anggotanya merupakan wakil penduduk desa</p>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="bpd-card">
                                    <div class="bpd-header">
                                        <i class="fas fa-crown fa-2x text-warning"></i>
                                        <h5 class="text-warning">Ketua</h5>
                                    </div>
                                    <div class="bpd-body">
                                        <h6 class="fw-bold">AMIRUDDING</h6>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="bpd-card">
                                    <div class="bpd-header">
                                        <i class="fas fa-user-tie fa-2x text-info"></i>
                                        <h5 class="text-info">Wakil Ketua</h5>
                                    </div>
                                    <div class="bpd-body">
                                        <h6 class="fw-bold">ANUSA</h6>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="bpd-card">
                                    <div class="bpd-header">
                                        <i class="fas fa-file-alt fa-2x text-primary"></i>
                                        <h5 class="text-primary">Sekretaris</h5>
                                    </div>
                                    <div class="bpd-body">
                                        <h6 class="fw-bold">RASTI</h6>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="bpd-card">
                                    <div class="bpd-header">
                                        <i class="fas fa-users fa-2x text-success"></i>
                                        <h5 class="text-success">Anggota</h5>
                                    </div>
                                    <div class="bpd-body">
                                        <h6 class="fw-bold">MISRAYANI</h6>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="bpd-card">
                                    <div class="bpd-header">
                                        <i class="fas fa-users fa-2x text-success"></i>
                                        <h5 class="text-success">Anggota</h5>
                                    </div>
                                    <div class="bpd-body">
                                        <h6 class="fw-bold">BAMBANG HERMAN</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- LPM -->
        <div class="row">
            <div class="col-12">
                <div class="card fade-in">
                    <div class="card-body p-5">
                        <div class="text-center mb-5">
                            <i class="fas fa-hands-helping fa-4x text-warning mb-3"></i>
                            <h2 class="text-warning fw-bold">LEMBAGA PEMBERDAYAAN MASYARAKAT (LPM)</h2>
                            <p class="text-muted">Lembaga yang bertugas membantu pemerintah desa dalam pemberdayaan masyarakat</p>
    </div>

        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="lpm-card">
                                    <div class="lpm-header">
                                        <i class="fas fa-crown fa-2x text-warning"></i>
                                        <h5 class="text-warning">Ketua</h5>
                                    </div>
                                    <div class="lpm-body">
                                        <h6 class="fw-bold">MUH. ALIMIN</h6>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="lpm-card">
                                    <div class="lpm-header">
                                        <i class="fas fa-file-alt fa-2x text-primary"></i>
                                        <h5 class="text-primary">Sekretaris</h5>
                                    </div>
                                    <div class="lpm-body">
                                        <h6 class="fw-bold">ILYAS</h6>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="lpm-card">
                                    <div class="lpm-header">
                                        <i class="fas fa-coins fa-2x text-success"></i>
                                        <h5 class="text-success">Bendahara</h5>
                                    </div>
                                    <div class="lpm-body">
                                        <h6 class="fw-bold">HASBI</h6>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="lpm-card">
                                    <div class="lpm-header">
                                        <i class="fas fa-users fa-2x text-info"></i>
                                        <h5 class="text-info">Anggota</h5>
                                    </div>
                                    <div class="lpm-body">
                                        <h6 class="fw-bold">BAMBANG</h6>
                    </div>
                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="lpm-card">
                                    <div class="lpm-header">
                                        <i class="fas fa-users fa-2x text-info"></i>
                                        <h5 class="text-info">Anggota</h5>
                                    </div>
                                    <div class="lpm-body">
                                        <h6 class="fw-bold">M.AMING</h6>
            </div>
        </div>
    </div>

                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="lpm-card">
                                    <div class="lpm-header">
                                        <i class="fas fa-users fa-2x text-info"></i>
                                        <h5 class="text-info">Anggota</h5>
                                    </div>
                                    <div class="lpm-body">
                                        <h6 class="fw-bold">HAMRI KARIM</h6>
                                    </div>
        </div>
                            </div>

                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="lpm-card">
                                    <div class="lpm-header">
                                        <i class="fas fa-users fa-2x text-info"></i>
                                        <h5 class="text-info">Anggota</h5>
                                    </div>
                                    <div class="lpm-body">
                                        <h6 class="fw-bold">SHOLIKUN</h6>
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
.kepala-desa-card {
    background: linear-gradient(135deg, rgba(46, 139, 87, 0.1), rgba(60, 179, 113, 0.05));
    border: 3px solid var(--primary-green);
    border-radius: 20px;
    padding: 3rem;
    text-align: center;
    position: relative;
    overflow: hidden;
}

.kepala-desa-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, transparent 30%, rgba(255,255,255,0.1) 50%, transparent 70%);
    animation: shine 3s ease-in-out infinite;
}

.avatar-container {
    width: 100px;
    height: 100px;
    background: var(--primary-gradient);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
    color: white;
    box-shadow: 0 10px 25px rgba(46, 139, 87, 0.3);
}

.perangkat-card, .bpd-card, .lpm-card {
    background: white;
    border-radius: 15px;
    padding: 1.5rem;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    border-left: 4px solid var(--primary-green);
    height: 100%;
    transition: all 0.3s ease;
    text-align: center;
}

.perangkat-card:hover, .bpd-card:hover, .lpm-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(46, 139, 87, 0.2);
}

.perangkat-header, .bpd-header, .lpm-header {
    margin-bottom: 1rem;
    padding-bottom: 1rem;
    border-bottom: 2px solid rgba(46, 139, 87, 0.1);
}

.perangkat-header i, .bpd-header i, .lpm-header i {
    margin-bottom: 0.5rem;
}

.perangkat-header h5, .bpd-header h5, .lpm-header h5 {
    margin-bottom: 0;
    font-weight: 600;
}

.perangkat-body h6, .bpd-body h6, .lpm-body h6 {
    margin-bottom: 0;
    color: var(--text-dark);
}

@keyframes shine {
    0%, 100% { transform: translateX(-100%); }
    50% { transform: translateX(100%); }
}
</style>
@endsection
