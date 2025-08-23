@extends('layouts.app')

@section('title', 'Sejarah Desa - Desa Tetembomua')

@section('content')
<!-- Breadcrumb -->
<nav aria-label="breadcrumb" class="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
            <li class="breadcrumb-item"><a href="#">Profil Desa</a></li>
            <li class="breadcrumb-item active">Sejarah Desa</li>
        </ol>
    </div>
</nav>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <div class="hero-content">
                    <h1 class="display-4 fw-bold mb-4">Sejarah Desa Tetembomua</h1>
                    <p class="lead mb-4">Mengenal asal usul dan perjalanan panjang terbentuknya Desa Tetembomua dari masa ke masa</p>
                </div>
            </div>
            <div class="col-lg-4 text-center">
                <i class="fas fa-history fa-6x text-white opacity-75"></i>
            </div>
        </div>
    </div>
</section>

<!-- Sejarah Section -->
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card fade-in">
                    <div class="card-body p-5">
                        <h2 class="text-center mb-5">
                            <i class="fas fa-landmark me-3 text-primary"></i>
                            Asal Usul Nama Desa
                        </h2>
                        
                        <div class="row mb-5">
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
                            <i class="fas fa-calendar-alt me-3 text-success"></i>
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
                            <i class="fas fa-user-tie me-3 text-warning"></i>
                            Daftar Kepala Desa
                        </h3>

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="table-primary">
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Kepala Desa</th>
                                        <th>Masa Bhakti</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td><strong>Asrin. P (Alm)</strong></td>
                                        <td>2007 - 2009</td>
                                        <td><span class="badge bg-warning">Desa Persiapan</span></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td><strong>Asrin. P (Alm)</strong></td>
                                        <td>2009 - 2014</td>
                                        <td><span class="badge bg-success">Desa Definitif</span></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td><strong>Asrin. P (Alm)</strong></td>
                                        <td>2014 - 2019</td>
                                        <td><span class="badge bg-success">Desa Definitif</span></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td><strong>Tinasari</strong></td>
                                        <td>2020 - 2024</td>
                                        <td><span class="badge bg-info">Desa Pelaksana</span></td>
                                    </tr>
                                    <tr class="table-active">
                                        <td>5</td>
                                        <td><strong>Abdullah, SP</strong></td>
                                        <td>2024 - Sekarang</td>
                                        <td><span class="badge bg-primary">Desa Definitif</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <hr class="my-5">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="card bg-light">
                                    <div class="card-body text-center">
                                        <i class="fas fa-map-marker-alt fa-3x text-primary mb-3"></i>
                                        <h5>Lokasi Strategis</h5>
                                        <p class="mb-0">Berada di jalan provinsi penghubung antara Kabupaten Konawe Utara dan Kabupaten Konawe serta jalan utama menuju Provinsi Sulawesi Selatan dan Tengah.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card bg-light">
                                    <div class="card-body text-center">
                                        <i class="fas fa-seedling fa-3x text-success mb-3"></i>
                                        <h5>Potensi Pertanian</h5>
                                        <p class="mb-0">Sebagian besar wilayah merupakan lahan kawasan kehutanan perkebunan yang menjadi mata pencaharian utama penduduk.</p>
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
</style>
@endsection
