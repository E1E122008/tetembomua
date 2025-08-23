@extends('layouts.app')

@section('title', 'Tentang Desa - Desa Tetembomua')

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <div class="hero-content">
                    <h1 class="display-4 fw-bold mb-4">Tentang Desa Tetembomua</h1>
                    <p class="lead mb-4">Desa yang maju dan berbudaya dengan masyarakat yang ramah, produktif, dan komitmen untuk mengembangkan desa secara berkelanjutan</p>
                </div>
            </div>
            <div class="col-lg-4 text-center">
                <i class="fas fa-home fa-6x text-white opacity-75"></i>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card fade-in">
                    <div class="card-body p-5">
                        <div class="text-center mb-5">
                            <i class="fas fa-info-circle fa-4x text-primary mb-3"></i>
                            <h2 class="text-primary fw-bold">GAMBARAN UMUM DESA</h2>
                        </div>

                        <div class="row mb-5">
                            <div class="col-md-6">
                                <div class="info-box">
                                    <div class="info-icon">
                                        <i class="fas fa-map-marker-alt fa-2x text-primary"></i>
                                    </div>
                                    <div class="info-content">
                                        <h5 class="text-primary">Lokasi</h5>
                                        <p>Desa Tetembomua, Kecamatan Lambuya, Kabupaten Konawe, Provinsi Sulawesi Tenggara</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box">
                                    <div class="info-icon">
                                        <i class="fas fa-ruler-combined fa-2x text-success"></i>
                                    </div>
                                    <div class="info-content">
                                        <h5 class="text-success">Luas Wilayah</h5>
                                        <p>10,54 km² dengan jarak 62 km dari ibu kota Kabupaten Konawe</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-5">
                            <div class="col-md-6">
                                <div class="info-box">
                                    <div class="info-icon">
                                        <i class="fas fa-users fa-2x text-warning"></i>
                                    </div>
                                    <div class="info-content">
                                        <h5 class="text-warning">Penduduk</h5>
                                        <p>402 jiwa (222 laki-laki, 178 perempuan) tersebar di 6 RT dengan 118 KK</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box">
                                    <div class="info-icon">
                                        <i class="fas fa-seedling fa-2x text-info"></i>
                                    </div>
                                    <div class="info-content">
                                        <h5 class="text-info">Mata Pencaharian</h5>
                                        <p>Mayoritas petani (51%) dengan komoditas utama sawit, kakao, dan lada</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr class="my-5">

                        <h3 class="text-center mb-4">
                            <i class="fas fa-history me-3 text-success"></i>
                            Sejarah Terbentuknya Desa
                        </h3>

                        <div class="timeline">
                            <div class="timeline-item">
                                <div class="timeline-marker bg-primary"></div>
                                <div class="timeline-content">
                                    <h5 class="text-primary">Sebelum 1999</h5>
                                    <p>Daerah ini termasuk dalam Desa Awuliti yang wilayah Kecamatan Lambuya Kabupaten Konawe.</p>
                                </div>
                            </div>

                            <div class="timeline-item">
                                <div class="timeline-marker bg-success"></div>
                                <div class="timeline-content">
                                    <h5 class="text-success">Tahun 1999</h5>
                                    <p>Terjadi pemekaran Desa menjadi 2 Desa yaitu Awuliti dan Desa Amberi.</p>
                                </div>
                            </div>

                            <div class="timeline-item">
                                <div class="timeline-marker bg-warning"></div>
                                <div class="timeline-content">
                                    <h5 class="text-warning">Tahun 2007</h5>
                                    <p>Sebelum terbentuknya Desa Tetembomua adalah salah satu Dusun III pada saat bergabung dengan Desa Amberi, kemudian dimekarkan menjadi Desa Persiapan.</p>
                                </div>
                            </div>

                            <div class="timeline-item">
                                <div class="timeline-marker bg-info"></div>
                                <div class="timeline-content">
                                    <h5 class="text-info">Tahun 2008</h5>
                                    <p>Desa Tetembomua menjadi Desa Definitif sesuai dengan Peraturan Pemerintah yang berlaku.</p>
                                </div>
                            </div>
                        </div>

                        <hr class="my-5">

                        <h3 class="text-center mb-4">
                            <i class="fas fa-landmark me-3 text-warning"></i>
                            Asal Usul Nama Desa
                        </h3>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="text-center">
                                    <i class="fas fa-bridge fa-4x text-primary mb-3"></i>
                                    <h4 class="text-primary">Tetembomua</h4>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <p class="lead">
                                    Menurut Mantan Kepala Desa Almarhum Asrin dan penjelasan tokoh-tokoh masyarakat, 
                                    nama "Tetembomua" berasal dari Bahasa Tolaki yang artinya <strong>"Titian atau Jembatan yang Mendaki menyebrang Kali"</strong>.
                                </p>
                            </div>
                        </div>

                        <hr class="my-5">

                        <h3 class="text-center mb-4">
                            <i class="fas fa-bullseye me-3 text-danger"></i>
                            Visi Desa
                        </h3>

                        <div class="vision-box">
                            <blockquote class="blockquote text-center">
                                <p class="mb-0 lead fw-bold">
                                    "MEWUJUDKAN PEMERINTAH DESA YANG JUJUR, TRANSPARAN, ADIL, PARTISIPATIF, 
                                    DAN MENJADIKAN DESA AGRO WISATA BERBASIS PADA EKONOMI KREATIF, 
                                    MENUJU MASYARAKAT YANG BERIMAN, BERTAQWA, NYAMAN, INOVATIF, MAJU, SEJAHTERA, MANDIRI, DAN BERADAB"
                                </p>
                            </blockquote>
                        </div>

                        <hr class="my-5">

                        <h3 class="text-center mb-4">
                            <i class="fas fa-chart-line me-3 text-info"></i>
                            Potensi Unggulan
                        </h3>

                        <div class="row">
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="potential-card">
                                    <div class="potential-icon">
                                        <i class="fas fa-seedling fa-3x text-success"></i>
                                    </div>
                                    <h5 class="text-success">Pertanian & Perkebunan</h5>
                                    <p>Komoditas utama: Kelapa Sawit, Kakao, dan Lada dengan total lahan pertanian yang luas.</p>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="potential-card">
                                    <div class="potential-icon">
                                        <i class="fas fa-road fa-3x text-primary"></i>
                                    </div>
                                    <h5 class="text-primary">Lokasi Strategis</h5>
                                    <p>Berada di jalan provinsi penghubung antar kabupaten dan provinsi, potensial untuk perdagangan.</p>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="potential-card">
                                    <div class="potential-icon">
                                        <i class="fas fa-users fa-3x text-warning"></i>
                                    </div>
                                    <h5 class="text-warning">SDM Berkualitas</h5>
                                    <p>Mayoritas penduduk adalah petani berpengalaman dengan semangat gotong royong yang tinggi.</p>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="potential-card">
                                    <div class="potential-icon">
                                        <i class="fas fa-leaf fa-3x text-success"></i>
                                    </div>
                                    <h5 class="text-success">Agro Wisata</h5>
                                    <p>Potensi pengembangan desa agro wisata dengan keindahan alam dan pertanian yang menarik.</p>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="potential-card">
                                    <div class="potential-icon">
                                        <i class="fas fa-handshake fa-3x text-info"></i>
                                    </div>
                                    <h5 class="text-info">Gotong Royong</h5>
                                    <p>Semangat kebersamaan dan gotong royong masyarakat yang kuat dalam membangun desa.</p>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="potential-card">
                                    <div class="potential-icon">
                                        <i class="fas fa-mosque fa-3x text-primary"></i>
                                    </div>
                                    <h5 class="text-primary">Religius</h5>
                                    <p>Masyarakat yang religius dengan kegiatan keagamaan yang aktif dan harmonis.</p>
                                </div>
                            </div>
                        </div>

                        <hr class="my-5">

                        <h3 class="text-center mb-4">
                            <i class="fas fa-user-tie me-3 text-success"></i>
                            Kepemimpinan Saat Ini
                        </h3>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="leadership-card">
                                    <div class="leadership-avatar">
                                        <img src="{{ asset('FOTO/DSC_0596.JPG') }}" alt="Kepala Desa Abdullah, SP" class="rounded-circle" style="width: 120px; height: 120px; object-fit: cover;">
                                    </div>
                                    <div class="leadership-info">
                                        <h4 class="text-primary">Abdullah, SP</h4>
                                        <p class="text-muted">Kepala Desa</p>
                                        <p><strong>Masa Jabatan:</strong> 2024 - Sekarang</p>
                                        <p><strong>Status:</strong> Desa Definitif</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="leadership-card">
                                    <div class="leadership-avatar">
                                        <i class="fas fa-balance-scale fa-4x text-success"></i>
                                    </div>
                                    <div class="leadership-info">
                                        <h4 class="text-success">Amirudding</h4>
                                        <p class="text-muted">Ketua BPD</p>
                                        <p><strong>Fungsi:</strong> Mengayomi dan menyalurkan aspirasi masyarakat</p>
                                        <p><strong>Periode:</strong> 2024 - Sekarang</p>
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

.timeline {
    position: relative;
    padding-left: 30px;
}

.timeline::before {
    content: '';
    position: absolute;
    left: 15px;
    top: 0;
    bottom: 0;
    width: 2px;
    background: linear-gradient(to bottom, var(--primary-green), var(--accent-teal));
}

.timeline-item {
    position: relative;
    margin-bottom: 30px;
}

.timeline-marker {
    position: absolute;
    left: -22px;
    top: 5px;
    width: 12px;
    height: 12px;
    border-radius: 50%;
    border: 3px solid white;
    box-shadow: 0 0 0 3px rgba(46, 139, 87, 0.2);
}

.timeline-content {
    background: white;
    padding: 20px;
    border-radius: 15px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    border-left: 4px solid var(--primary-green);
}

.timeline-content h5 {
    margin-bottom: 10px;
    font-weight: 600;
}

.timeline-content p {
    margin-bottom: 0;
    color: var(--text-light);
}

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

.potential-card {
    background: white;
    border-radius: 15px;
    padding: 2rem;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    border-left: 4px solid var(--primary-green);
    text-align: center;
    height: 100%;
    transition: all 0.3s ease;
}

.potential-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(46, 139, 87, 0.2);
}

.potential-icon {
    margin-bottom: 1.5rem;
}

.potential-card h5 {
    margin-bottom: 1rem;
    font-weight: 600;
}

.potential-card p {
    color: var(--text-light);
    margin-bottom: 0;
}

.leadership-card {
    background: white;
    border-radius: 15px;
    padding: 2rem;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    border-left: 4px solid var(--primary-green);
    text-align: center;
    height: 100%;
    transition: all 0.3s ease;
}

.leadership-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(46, 139, 87, 0.2);
}

.leadership-avatar {
    margin-bottom: 1.5rem;
}

.leadership-info h4 {
    margin-bottom: 0.5rem;
    font-weight: 600;
}

.leadership-info p {
    margin-bottom: 0.5rem;
    color: var(--text-dark);
}

.leadership-info p:last-child {
    margin-bottom: 0;
}
</style>
@endsection
