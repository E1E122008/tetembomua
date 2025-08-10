@extends('layouts.app')

@section('title', 'Teknologi Pertanian - Desa Tetembomua')

@section('content')
<!-- Breadcrumb -->
<nav aria-label="breadcrumb" class="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{ route('pertanian.index') }}">Pertanian</a></li>
            <li class="breadcrumb-item active">Teknologi</li>
        </ol>
    </div>
</nav>

<!-- Hero Section -->
<section class="hero-section" style="min-height: 50vh;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 mx-auto text-center">
                <h1>Teknologi Pertanian Modern</h1>
                <p>Inovasi teknologi yang diterapkan untuk meningkatkan produktivitas pertanian Desa Tetembomua</p>
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
                     alt="Teknologi Pertanian" class="img-fluid rounded-3 shadow">
            </div>
            <div class="col-lg-6">
                <h2 class="mb-4">Pertanian 4.0</h2>
                <p class="mb-4">Desa Tetembomua telah mengadopsi teknologi pertanian modern untuk meningkatkan efisiensi dan produktivitas. Dengan kombinasi teknologi tradisional dan inovasi terbaru, kami berhasil mengoptimalkan hasil pertanian sambil tetap menjaga kelestarian lingkungan.</p>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-robot text-primary me-3 fa-2x"></i>
                            <div>
                                <h6 class="mb-0">Smart Farming</h6>
                                <small class="text-muted">Pertanian cerdas</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-leaf text-success me-3 fa-2x"></i>
                            <div>
                                <h6 class="mb-0">Ramah Lingkungan</h6>
                                <small class="text-muted">Teknologi hijau</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Smart Farming Section -->
<section class="section bg-light">
    <div class="container">
        <div class="section-title">
            <h2>Smart Farming</h2>
            <p>Teknologi pertanian cerdas yang mengoptimalkan hasil panen</p>
        </div>
        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-mobile-alt text-primary me-2"></i>
                            Monitoring Berbasis Aplikasi
                        </h5>
                        <p class="card-text">Sistem monitoring pertanian yang dapat diakses melalui smartphone. Petani dapat memantau kondisi lahan, kelembaban tanah, dan kebutuhan air secara real-time.</p>
                        <ul class="list-unstyled">
                            <li><i class="fas fa-check text-success me-2"></i>Monitoring real-time</li>
                            <li><i class="fas fa-check text-success me-2"></i>Notifikasi otomatis</li>
                            <li><i class="fas fa-check text-success me-2"></i>Data historis</li>
                        </ul>
                        <div class="progress mb-3">
                            <div class="progress-bar bg-primary" style="width: 85%">85% Implementasi</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-satellite text-success me-2"></i>
                            IoT Sensors
                        </h5>
                        <p class="card-text">Sensor IoT yang dipasang di lahan untuk mengumpulkan data kelembaban, suhu, dan nutrisi tanah secara otomatis.</p>
                        <ul class="list-unstyled">
                            <li><i class="fas fa-check text-success me-2"></i>Sensor kelembaban</li>
                            <li><i class="fas fa-check text-success me-2"></i>Sensor suhu</li>
                            <li><i class="fas fa-check text-success me-2"></i>Sensor pH tanah</li>
                        </ul>
                        <div class="progress mb-3">
                            <div class="progress-bar bg-success" style="width: 70%">70% Implementasi</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Irrigation System Section -->
<section class="section">
    <div class="container">
        <div class="section-title">
            <h2>Sistem Irigasi Modern</h2>
            <p>Teknologi irigasi yang mengoptimalkan penggunaan air</p>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <img src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                         class="card-img-top" alt="Drip Irrigation">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-tint text-primary me-2"></i>
                            Drip Irrigation
                        </h5>
                        <p class="card-text">Sistem irigasi tetes yang menghemat air dan memastikan tanaman mendapat air yang tepat.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="badge bg-success">Efisien 90%</span>
                            <small class="text-muted">500 Ha terpasang</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <img src="https://images.unsplash.com/photo-1574323347407-f5e1ad6d020b?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                         class="card-img-top" alt="Sprinkler System">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-cloud-rain text-info me-2"></i>
                            Sprinkler System
                        </h5>
                        <p class="card-text">Sistem penyiraman otomatis yang meniru hujan alami untuk tanaman tertentu.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="badge bg-info">Efisien 85%</span>
                            <small class="text-muted">300 Ha terpasang</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <img src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                         class="card-img-top" alt="Smart Control">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-cogs text-warning me-2"></i>
                            Smart Control
                        </h5>
                        <p class="card-text">Kontrol otomatis berdasarkan data sensor untuk mengoptimalkan penggunaan air.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="badge bg-warning">Efisien 95%</span>
                            <small class="text-muted">800 Ha terpasang</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Precision Agriculture Section -->
<section class="section bg-light">
    <div class="container">
        <div class="section-title">
            <h2>Pertanian Presisi</h2>
            <p>Teknologi yang memungkinkan pengelolaan lahan secara presisi</p>
        </div>
        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-map-marked-alt text-primary me-2"></i>
                            GPS Mapping
                        </h5>
                        <p class="card-text">Pemetaan lahan menggunakan GPS untuk mengidentifikasi variasi kondisi tanah dan mengoptimalkan penanaman.</p>
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="list-unstyled">
                                    <li><i class="fas fa-check text-success me-2"></i>Pemetaan lahan</li>
                                    <li><i class="fas fa-check text-success me-2"></i>Analisis variasi</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="list-unstyled">
                                    <li><i class="fas fa-check text-success me-2"></i>Optimasi penanaman</li>
                                    <li><i class="fas fa-check text-success me-2"></i>Monitoring hasil</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-chart-line text-success me-2"></i>
                            Data Analytics
                        </h5>
                        <p class="card-text">Analisis data pertanian untuk memprediksi hasil panen dan mengoptimalkan perencanaan.</p>
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="list-unstyled">
                                    <li><i class="fas fa-check text-success me-2"></i>Prediksi hasil</li>
                                    <li><i class="fas fa-check text-success me-2"></i>Analisis tren</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="list-unstyled">
                                    <li><i class="fas fa-check text-success me-2"></i>Optimasi input</li>
                                    <li><i class="fas fa-check text-success me-2"></i>Perencanaan strategis</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Renewable Energy Section -->
<section class="section">
    <div class="container">
        <div class="section-title">
            <h2>Energi Terbarukan</h2>
            <p>Pemanfaatan energi ramah lingkungan untuk pertanian</p>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-solar-panel fa-3x text-warning mb-3"></i>
                        <h5 class="card-title">Solar Panel</h5>
                        <p class="card-text">Panel surya untuk menggerakkan sistem irigasi dan peralatan pertanian.</p>
                        <div class="progress mb-3">
                            <div class="progress-bar bg-warning" style="width: 60%">60% Terpasang</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-wind fa-3x text-info mb-3"></i>
                        <h5 class="card-title">Wind Turbine</h5>
                        <p class="card-text">Turbin angin untuk menghasilkan energi listrik tambahan.</p>
                        <div class="progress mb-3">
                            <div class="progress-bar bg-info" style="width: 40%">40% Terpasang</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-recycle fa-3x text-success mb-3"></i>
                        <h5 class="card-title">Biogas</h5>
                        <p class="card-text">Pemanfaatan limbah pertanian untuk menghasilkan biogas.</p>
                        <div class="progress mb-3">
                            <div class="progress-bar bg-success" style="width: 75%">75% Terpasang</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Training Section -->
<section class="section bg-light">
    <div class="container">
        <div class="section-title">
            <h2>Pelatihan Teknologi</h2>
            <p>Program pelatihan untuk meningkatkan kompetensi petani dalam teknologi pertanian</p>
        </div>
        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-graduation-cap text-primary me-2"></i>
                            Pelatihan Smart Farming
                        </h5>
                        <p class="card-text">Pelatihan intensif untuk petani dalam menggunakan teknologi smart farming.</p>
                        <ul class="list-unstyled">
                            <li><i class="fas fa-check text-success me-2"></i>Penggunaan aplikasi</li>
                            <li><i class="fas fa-check text-success me-2"></i>Pemeliharaan sensor</li>
                            <li><i class="fas fa-check text-success me-2"></i>Analisis data</li>
                        </ul>
                        <span class="badge bg-primary">500+ Petani Terlatih</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-users text-success me-2"></i>
                            Kelompok Tani Digital
                        </h5>
                        <p class="card-text">Pembentukan kelompok tani yang fokus pada pengembangan teknologi pertanian.</p>
                        <ul class="list-unstyled">
                            <li><i class="fas fa-check text-success me-2"></i>Sharing knowledge</li>
                            <li><i class="fas fa-check text-success me-2"></i>Kolaborasi teknologi</li>
                            <li><i class="fas fa-check text-success me-2"></i>Inovasi bersama</li>
                        </ul>
                        <span class="badge bg-success">20+ Kelompok Aktif</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Future Technology Section -->
<section class="section">
    <div class="container">
        <div class="section-title">
            <h2>Teknologi Masa Depan</h2>
            <p>Rencana pengembangan teknologi pertanian ke depan</p>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-drone fa-3x text-primary mb-3"></i>
                        <h5 class="card-title">Drone Pertanian</h5>
                        <p class="card-text">Penggunaan drone untuk monitoring lahan dan penyemprotan pestisida.</p>
                        <span class="badge bg-warning">Dalam Pengembangan</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-robot fa-3x text-success mb-3"></i>
                        <h5 class="card-title">Robot Pertanian</h5>
                        <p class="card-text">Robot untuk otomatisasi proses penanaman dan panen.</p>
                        <span class="badge bg-info">Rencana 2025</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-brain fa-3x text-warning mb-3"></i>
                        <h5 class="card-title">AI & Machine Learning</h5>
                        <p class="card-text">Implementasi AI untuk prediksi hasil dan optimasi pertanian.</p>
                        <span class="badge bg-primary">Rencana 2026</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="section bg-primary text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h3>Ingin Mempelajari Teknologi Ini?</h3>
                <p class="mb-0">Hubungi kami untuk informasi pelatihan dan kerjasama dalam pengembangan teknologi pertanian.</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="{{ route('contact') }}" class="btn btn-light btn-lg">
                    <i class="fas fa-graduation-cap me-2"></i>Pelatihan
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
