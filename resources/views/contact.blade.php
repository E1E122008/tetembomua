@extends('layouts.app')

@section('title', 'Kontak - ' . ($siteSettings['village_name'] ?? 'Desa Tetembomua'))

@section('content')
<!-- Breadcrumb -->
<nav aria-label="breadcrumb" class="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
            <li class="breadcrumb-item active">Kontak</li>
        </ol>
    </div>
</nav>

<!-- Hero Section -->
<section class="hero-section" style="min-height: 50vh;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 mx-auto text-center">
                <h1>Hubungi {{ $siteSettings['village_name'] ?? 'Desa Tetembomua' }}</h1>
                <p>Silakan hubungi kami untuk informasi lebih lanjut tentang {{ $siteSettings['village_name'] ?? 'Desa Tetembomua' }}</p>
            </div>
        </div>
    </div>
</section>

<!-- Contact Information Section -->
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-map-marker-alt fa-3x text-primary mb-3"></i>
                        <h5 class="card-title">Alamat</h5>
                        <p class="card-text">
                            {{ $siteSettings['contact_address'] ?? ('Desa ' . ($siteSettings['village_name'] ?? 'Tetembomua') . ', Kecamatan ' . ($siteSettings['district'] ?? 'Lambuya') . ', Kabupaten ' . ($siteSettings['regency'] ?? 'Konawe') . ', Provinsi ' . ($siteSettings['province'] ?? 'Sulawesi Tenggara')) }}<br>
                            Kode Pos: 93464
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-phone fa-3x text-success mb-3"></i>
                        <h5 class="card-title">Telepon</h5>
                        <p class="card-text">
                            @php $phone = $siteSettings['contact_phone'] ?? '+62 812-3456-7890'; @endphp
                            <a href="tel:{{ preg_replace('/\s+/', '', $phone) }}" class="text-decoration-none">{{ $phone }}</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-envelope fa-3x text-warning mb-3"></i>
                        <h5 class="card-title">Email</h5>
                        <p class="card-text">
                            <a href="mailto:{{ $siteSettings['contact_email'] ?? 'info@desatetembomua.id' }}" class="text-decoration-none">{{ $siteSettings['contact_email'] ?? 'info@desatetembomua.id' }}</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card fade-in">
                    <div class="card-body text-center">
                        <img src="{{ asset('FOTO/DSC_0596.JPG') }}" alt="Kepala Desa {{ $siteSettings['village_head'] ?? 'Abdullah, SP' }}" class="rounded-circle mb-3" style="width: 100px; height: 100px; object-fit: cover;">
                        <h5 class="card-title">{{ $siteSettings['village_head'] ?? 'Abdullah, SP' }}</h5>
                        <p class="text-muted">Kepala Desa</p>
                        <p class="card-text">Masa Jabatan: {{ $siteSettings['term_period'] ?? '2024 - Sekarang' }}</p>
                        <div class="contact-info">
                            @if(!empty($siteSettings['contact_phone']))
                            <p><i class="fas fa-phone me-2"></i>{{ $siteSettings['contact_phone'] }}</p>
                            @endif
                            @if(!empty($siteSettings['contact_email']))
                            <p><i class="fas fa-envelope me-2"></i>{{ $siteSettings['contact_email'] }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Form Section -->
<section class="section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="section-title">
                    <h2>Kirim Pesan</h2>
                    <p>Silakan isi form di bawah ini untuk mengirim pesan kepada kami</p>
                </div>
                <div class="card">
                    <div class="card-body">
                        <form>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="nama" class="form-label">Nama Lengkap *</label>
                                    <input type="text" class="form-control" id="nama" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Email *</label>
                                    <input type="email" class="form-control" id="email" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="telepon" class="form-label">Telepon</label>
                                    <input type="tel" class="form-control" id="telepon">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="subjek" class="form-label">Subjek *</label>
                                    <select class="form-select" id="subjek" required>
                                        <option value="">Pilih Subjek</option>
                                        <option value="informasi">Informasi Umum</option>
                                        <option value="pertanian">Sektor Pertanian</option>
                                        <option value="kerjasama">Kerjasama</option>
                                        <option value="kunjungan">Kunjungan</option>
                                        <option value="lainnya">Lainnya</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="pesan" class="form-label">Pesan *</label>
                                <textarea class="form-control" id="pesan" rows="5" required placeholder="Tulis pesan Anda di sini..."></textarea>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="fas fa-paper-plane me-2"></i>Kirim Pesan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="section">
    <div class="container">
        <div class="section-title">
            <h2>Lokasi Kami</h2>
            <p>Peta lokasi {{ $siteSettings['village_name'] ?? 'Desa Tetembomua' }}</p>
        </div>
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="ratio ratio-21x9">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3987.5!2d122.5!3d-3.9166666666666665!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zM8KwNTUnMDAuMCJTIDEyMsKwMzAnMDAuMCJF!5e0!3m2!1sen!2sid!4v1234567890" 
                                    style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Office Hours Section -->
<section class="section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <div class="card">
                    <div class="card-body text-center">
                        <h4 class="card-title mb-4">
                            <i class="fas fa-clock text-primary me-2"></i>
                            Jam Kerja Kantor Desa
                        </h4>
                        <div class="row">
                            <div class="col-md-6">
                                <h6>Senin - Jumat</h6>
                                <p class="text-muted">08:00 - 16:00 WIB</p>
                            </div>
                            <div class="col-md-6">
                                <h6>Sabtu</h6>
                                <p class="text-muted">08:00 - 12:00 WIB</p>
                            </div>
                        </div>
                        <hr>
                        <p class="mb-0">
                            <strong>Catatan:</strong> Kantor desa tutup pada hari Minggu dan hari libur nasional
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Social Media Section -->
<section class="section">
    <div class="container">
        <div class="section-title">
            <h2>Ikuti Kami</h2>
            <p>Ikuti media sosial kami untuk informasi terbaru</p>
        </div>
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="row text-center">
                    <div class="col-md-3 col-6 mb-4">
                        <a href="{{ $siteSettings['social_media']['facebook'] ?? '#' }}" class="text-decoration-none">
                            <div class="card h-100">
                                <div class="card-body">
                                    <i class="fab fa-facebook fa-3x text-primary mb-3"></i>
                                    <h6>Facebook</h6>
                                    <small class="text-muted">@{{ ($siteSettings['village_name'] ?? 'DesaTetembomua') }}</small>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 col-6 mb-4">
                        <a href="{{ $siteSettings['social_media']['instagram'] ?? '#' }}" class="text-decoration-none">
                            <div class="card h-100">
                                <div class="card-body">
                                    <i class="fab fa-instagram fa-3x text-danger mb-3"></i>
                                    <h6>Instagram</h6>
                                    <small class="text-muted">@{{ str_replace(' ', '', strtolower($siteSettings['village_name'] ?? 'desa_tetembomua')) }}</small>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 col-6 mb-4">
                        <a href="{{ $siteSettings['social_media']['youtube'] ?? '#' }}" class="text-decoration-none">
                            <div class="card h-100">
                                <div class="card-body">
                                    <i class="fab fa-youtube fa-3x text-danger mb-3"></i>
                                    <h6>YouTube</h6>
                                    <small class="text-muted">{{ $siteSettings['village_name'] ?? 'Desa Tetembomua' }}</small>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 col-6 mb-4">
                        <a href="#" class="text-decoration-none">
                            <div class="card h-100">
                                <div class="card-body">
                                    <i class="fab fa-whatsapp fa-3x text-success mb-3"></i>
                                    <h6>WhatsApp</h6>
                                    <small class="text-muted">{{ $siteSettings['contact_phone'] ?? '+62 812-3456-7890' }}</small>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.form-control:focus, .form-select:focus {
    border-color: var(--primary-green);
    box-shadow: 0 0 0 0.2rem rgba(46, 125, 50, 0.25);
}

.btn-primary {
    background: var(--primary-green);
    border-color: var(--primary-green);
}

.btn-primary:hover {
    background: var(--dark-green);
    border-color: var(--dark-green);
}
</style>
@endsection
