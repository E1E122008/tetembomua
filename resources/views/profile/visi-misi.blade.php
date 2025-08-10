@extends('layouts.app')

@section('title', 'Visi & Misi - Desa Tetembomua')

@section('content')
<!-- Breadcrumb -->
<nav aria-label="breadcrumb" class="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
            <li class="breadcrumb-item"><a href="#">Profil Desa</a></li>
            <li class="breadcrumb-item active">Visi & Misi</li>
        </ol>
    </div>
</nav>

<!-- Hero Section -->
<section class="hero-section" style="min-height: 50vh;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 mx-auto text-center">
                <h1>Visi & Misi Desa Tetembomua</h1>
                <p>Arah dan tujuan pengembangan desa untuk masa depan yang lebih baik</p>
            </div>
        </div>
    </div>
</section>

<!-- Vision Section -->
<section class="section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4">
                <img src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" 
                     alt="Visi Desa" class="img-fluid rounded-3 shadow">
            </div>
            <div class="col-lg-6">
                <div class="card border-0 bg-primary text-white">
                    <div class="card-body p-5">
                        <h2 class="card-title mb-4">
                            <i class="fas fa-eye me-3"></i>
                            Visi Desa
                        </h2>
                        <p class="card-text fs-5">
                            "Terwujudnya Desa Tetembomua sebagai desa pertanian modern yang mandiri, berkelanjutan, dan sejahtera dengan mengedepankan kearifan lokal dan teknologi inovatif untuk meningkatkan kualitas hidup masyarakat."
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Mission Section -->
<section class="section bg-light">
    <div class="container">
        <div class="section-title">
            <h2>Misi Desa</h2>
            <p>Langkah-langkah strategis untuk mencapai visi Desa Tetembomua</p>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <div class="mission-icon mb-4">
                            <i class="fas fa-seedling fa-3x text-success"></i>
                        </div>
                        <h5 class="card-title">Misi 1</h5>
                        <p class="card-text">Mengembangkan sektor pertanian modern yang berkelanjutan dengan menerapkan teknologi inovatif dan ramah lingkungan.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <div class="mission-icon mb-4">
                            <i class="fas fa-users fa-3x text-primary"></i>
                        </div>
                        <h5 class="card-title">Misi 2</h5>
                        <p class="card-text">Meningkatkan kualitas sumber daya manusia melalui pendidikan, pelatihan, dan pemberdayaan masyarakat.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <div class="mission-icon mb-4">
                            <i class="fas fa-chart-line fa-3x text-warning"></i>
                        </div>
                        <h5 class="card-title">Misi 3</h5>
                        <p class="card-text">Mengembangkan ekonomi desa yang mandiri melalui diversifikasi usaha dan peningkatan nilai tambah produk.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <div class="mission-icon mb-4">
                            <i class="fas fa-infrastructure fa-3x text-info"></i>
                        </div>
                        <h5 class="card-title">Misi 4</h5>
                        <p class="card-text">Membangun infrastruktur desa yang memadai untuk mendukung aktivitas pertanian dan kesejahteraan masyarakat.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <div class="mission-icon mb-4">
                            <i class="fas fa-globe fa-3x text-success"></i>
                        </div>
                        <h5 class="card-title">Misi 5</h5>
                        <p class="card-text">Mengembangkan kerjasama dengan berbagai pihak untuk memperluas pasar dan meningkatkan akses teknologi.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <div class="mission-icon mb-4">
                            <i class="fas fa-leaf fa-3x text-warning"></i>
                        </div>
                        <h5 class="card-title">Misi 6</h5>
                        <p class="card-text">Melestarikan lingkungan dan kearifan lokal dalam pengembangan desa yang berkelanjutan.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Goals Section -->
<section class="section">
    <div class="container">
        <div class="section-title">
            <h2>Tujuan Pembangunan</h2>
            <p>Target pencapaian yang ingin diraih dalam 5 tahun ke depan</p>
        </div>
        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-target text-primary me-2"></i>
                            Tujuan Ekonomi
                        </h5>
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Peningkatan pendapatan petani sebesar 50%</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Diversifikasi komoditas pertanian</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Pengembangan agroindustri</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Pemasaran produk ke pasar nasional</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-graduation-cap text-success me-2"></i>
                            Tujuan Sosial
                        </h5>
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Peningkatan kualitas pendidikan</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Pelatihan keterampilan petani</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Pengembangan organisasi petani</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Pemberdayaan perempuan</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-cogs text-warning me-2"></i>
                            Tujuan Teknologi
                        </h5>
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Implementasi smart farming</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Sistem irigasi modern</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Pertanian presisi</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Digitalisasi pertanian</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-tree text-info me-2"></i>
                            Tujuan Lingkungan
                        </h5>
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>100% pertanian organik</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Konservasi lahan</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Pengelolaan air berkelanjutan</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Pengurangan emisi karbon</li>
                        </ul>
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
            <h2>Nilai-Nilai Dasar</h2>
            <p>Prinsip-prinsip yang menjadi fondasi dalam mencapai visi dan misi</p>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-hands-helping fa-3x text-primary mb-3"></i>
                        <h5 class="card-title">Gotong Royong</h5>
                        <p class="card-text">Semangat kebersamaan dalam membangun desa yang lebih baik.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-lightbulb fa-3x text-warning mb-3"></i>
                        <h5 class="card-title">Inovasi</h5>
                        <p class="card-text">Terus berinovasi dalam pengembangan pertanian modern.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-leaf fa-3x text-success mb-3"></i>
                        <h5 class="card-title">Berkelanjutan</h5>
                        <p class="card-text">Mengutamakan kelestarian lingkungan untuk generasi mendatang.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-balance-scale fa-3x text-info mb-3"></i>
                        <h5 class="card-title">Keadilan</h5>
                        <p class="card-text">Mewujudkan keadilan sosial bagi seluruh masyarakat desa.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Implementation Strategy -->
<section class="section">
    <div class="container">
        <div class="section-title">
            <h2>Strategi Implementasi</h2>
            <p>Langkah-langkah konkret dalam mewujudkan visi dan misi desa</p>
        </div>
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="timeline-vertical">
                    <div class="timeline-item">
                        <div class="timeline-marker"></div>
                        <div class="timeline-content">
                            <h5>Tahap 1: Persiapan (Tahun 1)</h5>
                            <p>Penyusunan rencana detail, sosialisasi kepada masyarakat, dan persiapan infrastruktur dasar.</p>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-marker"></div>
                        <div class="timeline-content">
                            <h5>Tahap 2: Implementasi (Tahun 2-3)</h5>
                            <p>Pelaksanaan program-program prioritas, pelatihan petani, dan pengembangan teknologi.</p>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-marker"></div>
                        <div class="timeline-content">
                            <h5>Tahap 3: Pengembangan (Tahun 4)</h5>
                            <p>Ekspansi program, penguatan kelembagaan, dan pengembangan pasar.</p>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-marker"></div>
                        <div class="timeline-content">
                            <h5>Tahap 4: Konsolidasi (Tahun 5)</h5>
                            <p>Evaluasi hasil, perbaikan sistem, dan persiapan untuk tahap selanjutnya.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.mission-icon {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--primary-green), var(--secondary-green));
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
    color: white;
}

.timeline-vertical {
    position: relative;
    padding: 2rem 0;
}

.timeline-vertical::before {
    content: '';
    position: absolute;
    left: 20px;
    top: 0;
    bottom: 0;
    width: 2px;
    background: var(--primary-green);
}

.timeline-item {
    position: relative;
    margin-bottom: 2rem;
    padding-left: 60px;
}

.timeline-marker {
    position: absolute;
    left: 11px;
    top: 0;
    width: 20px;
    height: 20px;
    background: var(--primary-green);
    border-radius: 50%;
    border: 3px solid white;
    box-shadow: 0 0 0 3px var(--primary-green);
}

.timeline-content {
    background: white;
    padding: 1.5rem;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.timeline-content h5 {
    color: var(--primary-green);
    margin-bottom: 0.5rem;
}
</style>
@endsection
