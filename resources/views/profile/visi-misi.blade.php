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
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <div class="hero-content">
                    <h1 class="display-4 fw-bold mb-4">Visi & Misi Desa Tetembomua</h1>
                    <p class="lead mb-4">Arah dan tujuan pembangunan desa menuju masyarakat yang beriman, bertakwa, nyaman, inovatif, maju, sejahtera, mandiri, dan beradab</p>
                </div>
            </div>
            <div class="col-lg-4 text-center">
                <i class="fas fa-bullseye fa-6x text-white opacity-75"></i>
            </div>
        </div>
    </div>
</section>

<!-- Visi Section -->
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <!-- Visi -->
                <div class="card fade-in mb-5">
                    <div class="card-body p-5">
                        <div class="text-center mb-4">
                            <i class="fas fa-eye fa-4x text-primary mb-3"></i>
                            <h2 class="text-primary fw-bold">VISI DESA TETEMBOMUA</h2>
                </div>
                        
                        <div class="vision-box">
                            <blockquote class="blockquote text-center">
                                <p class="mb-0 lead fw-bold">
                                    "MEWUJUDKAN PEMERINTAH DESA YANG JUJUR, TRANSPARAN, ADIL, PARTISIPATIF, 
                                    DAN MENJADIKAN DESA AGRO WISATA BERBASIS PADA EKONOMI KREATIF, 
                                    MENUJU MASYARAKAT YANG BERIMAN, BERTAQWA, NYAMAN, INOVATIF, MAJU, SEJAHTERA, MANDIRI, DAN BERADAB"
                                </p>
                            </blockquote>
                    </div>
                </div>
            </div>

                <!-- Misi -->
                <div class="card fade-in">
                    <div class="card-body p-5">
                        <div class="text-center mb-5">
                            <i class="fas fa-tasks fa-4x text-success mb-3"></i>
                            <h2 class="text-success fw-bold">MISI DESA TETEMBOMUA</h2>
    </div>

        <div class="row">
                            <!-- Bidang Pemerintahan -->
                            <div class="col-lg-6 mb-4">
                                <div class="mission-card">
                                    <div class="mission-header">
                                        <i class="fas fa-building fa-2x text-primary"></i>
                                        <h4 class="text-primary">A. Bidang Pemerintahan</h4>
                        </div>
                                    <ul class="mission-list">
                                        <li>Transparansi dalam penataan dan pengelolaan Pemerintahan Desa</li>
                                        <li>Pemerataan Pembangunan Tiap dusun</li>
                                        <li>Melibatkan seluruh komponen masyarakat dalam musyawarah Desa</li>
                                        <li>Memprioritaskan dalam setiap usulan masyarakat</li>
                                        <li>Peningkatan Pelayanan yang Cepat bagi masyarakat kapan dan dimanapun baik langsung maupun Secara Online atau pemanfaatan Internet</li>
                                        <li>Penatan ADM Desa dengan baik</li>
                                        <li>Sinergis hubungan dengan Stekholder baik Tingkat Desa, Kec, Kab, Prov, dan Pusat</li>
                                    </ul>
                    </div>
                </div>

                            <!-- Bidang Pembangunan -->
                            <div class="col-lg-6 mb-4">
                                <div class="mission-card">
                                    <div class="mission-header">
                                        <i class="fas fa-hammer fa-2x text-warning"></i>
                                        <h4 class="text-warning">B. Bidang Pembangunan</h4>
            </div>
                                    
                                    <div class="sub-mission">
                                        <h6 class="text-success"><i class="fas fa-mosque me-2"></i>Keagamaan</h6>
                                        <ul class="mission-list">
                                            <li>Melanjutkan Pembangunan Mesjid Al-Muhajirin Desa Tetembomua bersama partisipasi Masyarakat</li>
                                            <li>Menghidupkan Kegiatan Keagamaan mulai usia dini s/d Orang Tua</li>
                                            <li>Memperhatikan Kesejahteraan Imam Mesjid, Guru Ngaji, dan Imam Desa</li>
                                        </ul>
                        </div>

                                    <div class="sub-mission">
                                        <h6 class="text-success"><i class="fas fa-seedling me-2"></i>Pertanian dan Perkebunan</h6>
                                        <ul class="mission-list">
                                            <li>Peningkatan Kapasitas Kelompok Tani (Menyehatkan Kelompok Tani)</li>
                                            <li>Memperhatikan Kebutuhan Petani/Pekebun Mulai Buka Lahan - Panen dan berkelanjutan</li>
                                            <li>Menfasilitasi pengadaan Pupuk dan Alsintan (Alat & Mesin Pertanian) bagi masyarakat</li>
                                            <li>Menfasilitasi kemitraan Petani dengan BUMDes</li>
                                            <li>Meningkatkan nilai jual hasil petani</li>
                                        </ul>
                    </div>

                                    <div class="sub-mission">
                                        <h6 class="text-success"><i class="fas fa-chart-line me-2"></i>Ekonomi</h6>
                                        <ul class="mission-list">
                                            <li>Pengembangan BUMDes dengan pembukaan Lapangan Kerja baru bagi masyarakat, melalui Ekonomi kreatif yang inovatif sehingga melahirkan Pendapatan Asli/ Kas Desa</li>
                                            <li>Menciptakan dan meningkatkan UMKM yang ada di Desa</li>
                                            <li>Menjadikan Desa Tetembomua sebagai Desa Agro Wisata di masa depan</li>
                                        </ul>
                </div>

                                    <div class="sub-mission">
                                        <h6 class="text-success"><i class="fas fa-heartbeat me-2"></i>Kesehatan</h6>
                                        <ul class="mission-list">
                                            <li>Menyediakan Obat, Vitamin bagi Ibu Hamil, Balita, Anak-anak, Remaja, Dewasa, dan Lansia</li>
                                            <li>Membantu biaya Pengobatan Warga kategori tidak mampu</li>
                                            <li>Membantu Menyediakan Obat Herbal bagi Masyarakat yang sakit menahun</li>
                                            <li>Menfasilitasi Kegiatan Senam Kesehatan Jasmani bagi masyarakat</li>
                                        </ul>
    </div>

                                    <div class="sub-mission">
                                        <h6 class="text-success"><i class="fas fa-graduation-cap me-2"></i>Pendidikan</h6>
                                        <ul class="mission-list">
                                            <li>Mambantu Beasiswa Anak Usia Sekolah SMP, SMA, Kuliah melalui dana Desa</li>
                                            <li>Membantu Seragam dan alat tulis Anak Sekolah yang baru masuk bagi yang kurang mampu</li>
                                            <li>Pembangunan Jaringan Listrik setiap lorong</li>
                                            <li>Pembukaan dan peningkatan Jalan Usaha Tani</li>
                                            <li>Rabat / Pengecoran Jalan Dusun</li>
                                            <li>Pengadaan Sumur Bor</li>
                                            <li>Pengadaan Lampu Jalan</li>
                                            <li>Pembangunan MCK/WC yang belum Punya</li>
                                            <li>Pembangunan Sarana Olah Raga</li>
                        </ul>
                    </div>
                </div>
            </div>

                            <!-- Bidang Pembinaan -->
            <div class="col-lg-6 mb-4">
                                <div class="mission-card">
                                    <div class="mission-header">
                                        <i class="fas fa-users fa-2x text-info"></i>
                                        <h4 class="text-info">C. Bidang Pembinaan dan Pemberdayaan Kemasyarakatan</h4>
                                    </div>
                                    <ul class="mission-list">
                                        <li>Peningkatan kapasitas Perangkat, BPD, Kader PKK, Kesehatan (Posyandu, Posbindu, BP2KB, Remaja, Lansia), RT, Lembaga Keagamaan, Lembaga Adat, LPM, Karang Taruna, dan Kelompok Tani</li>
                                        <li>Mendukung Keberlanjutan kegiatan masyarakat dalam bidang Perikanan dan Peternakan</li>
                        </ul>
                    </div>
                </div>

                            <!-- Keadaan Darurat -->
                            <div class="col-lg-6 mb-4">
                                <div class="mission-card">
                                    <div class="mission-header">
                                        <i class="fas fa-exclamation-triangle fa-2x text-danger"></i>
                                        <h4 class="text-danger">D. Keadaan Darurat</h4>
            </div>
                                    <ul class="mission-list">
                                        <li>Melanjutkan Bantuan Langsung Tunai (BLT-DD)</li>
                        </ul>
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
.vision-box {
    background: linear-gradient(135deg, rgba(46, 139, 87, 0.1), rgba(60, 179, 113, 0.05));
    border: 2px solid var(--primary-green);
    border-radius: 20px;
    padding: 3rem;
    position: relative;
    overflow: hidden;
}

.vision-box::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, transparent 30%, rgba(255,255,255,0.1) 50%, transparent 70%);
    animation: shine 3s ease-in-out infinite;
}

@keyframes shine {
    0%, 100% { transform: translateX(-100%); }
    50% { transform: translateX(100%); }
}

.mission-card {
    background: white;
    border-radius: 15px;
    padding: 1.5rem;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    border-left: 4px solid var(--primary-green);
    height: 100%;
    transition: all 0.3s ease;
}

.mission-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(46, 139, 87, 0.2);
}

.mission-header {
    display: flex;
    align-items: center;
    margin-bottom: 1.5rem;
    padding-bottom: 1rem;
    border-bottom: 2px solid rgba(46, 139, 87, 0.1);
}

.mission-header i {
    margin-right: 1rem;
}

.mission-header h4 {
    margin-bottom: 0;
    font-weight: 600;
}

.sub-mission {
    margin-bottom: 1.5rem;
}

.sub-mission:last-child {
    margin-bottom: 0;
}

.sub-mission h6 {
    font-weight: 600;
    margin-bottom: 0.5rem;
    color: var(--primary-green);
}

.mission-list {
    list-style: none;
    padding-left: 0;
    margin-bottom: 0;
}

.mission-list li {
    position: relative;
    padding-left: 1.5rem;
    margin-bottom: 0.5rem;
    line-height: 1.6;
    color: var(--text-dark);
}

.mission-list li::before {
    content: '✓';
    position: absolute;
    left: 0;
    top: 0;
    color: var(--primary-green);
    font-weight: bold;
}

.mission-list li:last-child {
    margin-bottom: 0;
}

.blockquote {
    border-left: none;
    font-style: italic;
}

.blockquote p {
    font-size: 1.1rem;
    line-height: 1.8;
}
</style>
@endsection
