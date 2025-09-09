@extends('layouts.app')

@section('title', 'Komoditas - Desa Tetembomua')

@section('content')
<!-- Breadcrumb -->
<nav aria-label="breadcrumb" class="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
            <li class="breadcrumb-item active">Komoditas</li>
        </ol>
    </div>
</nav>

<!-- Hero Section -->
<section class="hero-section" style="min-height: 50vh;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <div class="hero-content">
                                        
                    <h1 class="display-4 fw-bold mb-4">Komoditas Pertanian Unggulan</h1>
                    <p class="lead mb-4">
                        @if(count($agricultural['commodities']) > 0)
                            {{ collect($agricultural['commodities'])->pluck('name')->take(3)->join(', ') }} sebagai komoditas utama yang menjadi tulang punggung perekonomian desa
                        @else
                            Komoditas pertanian berkualitas tinggi yang menjadi andalan ekonomi masyarakat Desa Tetembomua
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Overview Section -->
<section class="section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4">
                <div class="komoditas-image-container">
                    <span role="button" class="open-image" data-src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80">
                        <img src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" 
                             alt="Komoditas Pertanian" class="img-fluid komoditas-image">
                    </span>
                    <div class="komoditas-image-overlay"></div>
                </div>
            </div>
            <div class="col-lg-6">
                <h2 class="mb-4">Komoditas Unggulan Desa</h2>
                <p class="mb-4">
                    Desa Tetembomua memiliki {{ count($agricultural['commodities']) + count($agricultural['horticultures']) + count($agricultural['fruits']) }} jenis komoditas pertanian unggulan yang menjadi andalan ekonomi masyarakat. 
                    @if($agricultural['farmers'] > 0)
                        Dengan {{ number_format($agricultural['farmers']) }} petani dan luas lahan {{ number_format($agricultural['land_area']) }} hektar, 
                    @endif
                    desa ini mampu menghasilkan produk pertanian berkualitas tinggi yang siap dipasarkan ke tingkat regional dan nasional.
                </p>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-seedling text-success me-3 fa-2x"></i>
                            <div>
                                <h6 class="mb-0">{{ count($agricultural['commodities']) + count($agricultural['horticultures']) + count($agricultural['fruits']) }} Komoditas</h6>
                                <small class="text-muted">Unggulan utama</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-leaf text-primary me-3 fa-2x"></i>
                            <div>
                                <h6 class="mb-0">{{ number_format($agricultural['land_area']) }} Ha</h6>
                                <small class="text-muted">Total luas lahan</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Statistics Section -->
@if($agricultural['farmers'] > 0 || $agricultural['land_area'] > 0)
<section class="section bg-light">
    <div class="container">
        <div class="section-title">
            <h2>Statistik Pertanian</h2>
            <p>Data pertanian terkini Desa Tetembomua</p>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-users fa-3x text-primary mb-3"></i>
                        <h3 class="text-primary">{{ number_format($agricultural['farmers']) }}</h3>
                        <h6 class="card-title">Total Petani</h6>
                        <p class="card-text small text-muted">Petani aktif di Desa Tetembomua</p>
                    </div>
                </div>
                            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-map fa-3x text-success mb-3"></i>
                        <h3 class="text-success">{{ number_format($agricultural['land_area']) }}</h3>
                        <h6 class="card-title">Luas Lahan (Ha)</h6>
                        <p class="card-text small text-muted">Total luas lahan pertanian</p>
                            </div>
                        </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-seedling fa-3x text-warning mb-3"></i>
                        <h3 class="text-warning">{{ count($agricultural['commodities']) + count($agricultural['horticultures']) + count($agricultural['fruits']) }}</h3>
                        <h6 class="card-title">Jenis Komoditas</h6>
                        <p class="card-text small text-muted">Total jenis komoditas yang dibudidayakan</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-calculator fa-3x text-info mb-3"></i>
                        <h3 class="text-info">{{ $agricultural['farmers'] > 0 ? round($agricultural['land_area'] / $agricultural['farmers'], 2) : 0 }}</h3>
                        <h6 class="card-title">Ha per Petani</h6>
                        <p class="card-text small text-muted">Rata-rata luas lahan per petani</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</section>
@endif

<!-- Plantation Crops Section -->
<section class="section">
    <div class="container">
        <div class="section-title">
            <h2>Tanaman Perkebunan</h2>
            <p>Komoditas perkebunan unggulan yang menjadi andalan ekonomi Desa Tetembomua</p>
        </div>
        <div class="row justify-content-center">
            @forelse($agricultural['commodities'] as $index => $commodity)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    @if(isset($commodity['image_path']) && $commodity['image_path'])
                    <span role="button" class="open-image" data-src="{{ asset($commodity['image_path']) }}">
                        <img src="{{ asset($commodity['image_path']) }}" 
                             class="card-img-top" alt="{{ $commodity['name'] }}">
                    </span>
                    @else
                    <div class="card-img-top d-flex align-items-center justify-content-center bg-light" style="height: 200px;">
                        <i class="fas fa-seedling fa-3x text-muted"></i>
                    </div>
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-seedling text-success me-2"></i>
                            {{ $commodity['name'] }}
                        </h5>
                        <p class="card-text">{{ $commodity['description'] ?? 'Komoditas berkualitas tinggi yang menjadi andalan ekonomi Desa Tetembomua.' }}</p>
                        <div class="row text-center">
                            <div class="col-6">
                                <small class="text-muted">Luas Tanam</small>
                                <h6 class="mb-0">{{ number_format($commodity['area']) }} Ha</h6>
                            </div>
                            <div class="col-6">
                                <small class="text-muted">Jumlah Petani</small>
                                <h6 class="mb-0">{{ number_format($commodity['farmers']) }} orang</h6>
                            </div>
                        </div>
                        @if($commodity['production_volume'] > 0)
                        <div class="row text-center mt-2">
                            <div class="col-6">
                                <small class="text-muted">Produksi</small>
                                <h6 class="mb-0">{{ number_format($commodity['production_volume']) }} Ton</h6>
                            </div>
                            <div class="col-6">
                                <small class="text-muted">Produktivitas</small>
                                <h6 class="mb-0">{{ number_format($commodity['productivity']) }} Ton/Ha</h6>
                            </div>
                        </div>
                        @endif
                        <div class="text-center mt-2">
                            <span class="badge bg-success">Organik</span>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
            <div class="col-12">
                <div class="text-center py-5">
                    <i class="fas fa-seedling fa-3x text-muted mb-3"></i>
                    <h5 class="text-muted">Belum ada data komoditas perkebunan</h5>
                    <p class="text-muted">Data komoditas perkebunan akan ditampilkan setelah admin menambahkan data di panel admin.</p>
                    <a href="{{ route('contact') }}" class="btn btn-outline-primary">
                        <i class="fas fa-envelope me-2"></i>Hubungi Admin
                    </a>
            </div>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Horticulture Section -->
<section class="section">
    <div class="container">
        <div class="section-title">
            <h2>Hortikultura</h2>
            <p>Sayuran dan buah-buahan segar yang berkualitas tinggi</p>
        </div>
        <div class="row justify-content-center">
            @forelse($agricultural['horticultures'] as $index => $horticulture)
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card h-100">
                    @if(isset($horticulture['image_path']) && $horticulture['image_path'])
                    <span role="button" class="open-image" data-src="{{ asset($horticulture['image_path']) }}">
                        <img src="{{ asset($horticulture['image_path']) }}" 
                             class="card-img-top" alt="{{ $horticulture['name'] }}">
                    </span>
                    @else
                    <div class="card-img-top d-flex align-items-center justify-content-center bg-light" style="height: 200px;">
                        <i class="fas fa-leaf fa-3x text-muted"></i>
                    </div>
                    @endif
                    <div class="card-body text-center">
                        <h6 class="card-title">{{ $horticulture['name'] }}</h6>
                        <p class="card-text small">{{ $horticulture['description'] ?? 'Sayuran berkualitas tinggi yang segar dan bergizi.' }}</p>
                        <div class="row text-center mt-2">
                            <div class="col-6">
                                <small class="text-muted">Luas</small>
                                <div class="fw-bold">{{ number_format($horticulture['area']) }} Ha</div>
                    </div>
                            <div class="col-6">
                                <small class="text-muted">Petani</small>
                                <div class="fw-bold">{{ number_format($horticulture['farmers']) }}</div>
                </div>
            </div>
                        @if($horticulture['production_volume'] > 0)
                        <div class="row text-center mt-1">
                            <div class="col-6">
                                <small class="text-muted">Produksi</small>
                                <div class="fw-bold">{{ number_format($horticulture['production_volume']) }} Ton</div>
                    </div>
                            <div class="col-6">
                                <small class="text-muted">Produktivitas</small>
                                <div class="fw-bold">{{ number_format($horticulture['productivity']) }} Ton/Ha</div>
                </div>
            </div>
                        @endif
                        <div class="text-center mt-2">
                        <span class="badge bg-success">Organik</span>
                    </div>
                </div>
            </div>
            </div>
            @empty
            <div class="col-12">
                <div class="text-center py-4">
                    <i class="fas fa-leaf fa-2x text-muted mb-2"></i>
                    <h6 class="text-muted">Belum ada data holtikultura</h6>
                    <p class="text-muted small">Data holtikultura akan ditampilkan setelah admin menambahkan data di panel admin.</p>
                    <a href="{{ route('contact') }}" class="btn btn-sm btn-outline-success">
                        <i class="fas fa-envelope me-1"></i>Hubungi Admin
                    </a>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Fruits Section -->
<section class="section bg-light">
    <div class="container">
        <div class="section-title">
            <h2>Buah-Buahan</h2>
            <p>Buah-buahan segar yang dipanen langsung dari kebun desa</p>
        </div>
        <div class="row justify-content-center">
            @forelse($agricultural['fruits'] as $index => $fruit)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    @if(isset($fruit['image_path']) && $fruit['image_path'])
                    <span role="button" class="open-image" data-src="{{ asset($fruit['image_path']) }}">
                        <img src="{{ asset($fruit['image_path']) }}" 
                             class="card-img-top" alt="{{ $fruit['name'] }}">
                    </span>
                    @else
                    <div class="card-img-top d-flex align-items-center justify-content-center bg-light" style="height: 200px;">
                        <i class="fas fa-apple-alt fa-3x text-muted"></i>
                    </div>
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-apple-alt text-warning me-2"></i>
                            {{ $fruit['name'] }}
                        </h5>
                        <p class="card-text">{{ $fruit['description'] ?? 'Buah-buahan segar yang dipanen langsung dari kebun desa dengan kualitas terbaik.' }}</p>
                        <div class="row text-center mb-2">
                            <div class="col-6">
                                <small class="text-muted">Luas</small>
                                <div class="fw-bold">{{ number_format($fruit['area']) }} Ha</div>
                            </div>
                            <div class="col-6">
                                <small class="text-muted">Petani</small>
                                <div class="fw-bold">{{ number_format($fruit['farmers']) }}</div>
                        </div>
                    </div>
                        @if($fruit['production_volume'] > 0)
                        <div class="row text-center mb-2">
                            <div class="col-6">
                                <small class="text-muted">Produksi</small>
                                <div class="fw-bold">{{ number_format($fruit['production_volume']) }} Ton</div>
                            </div>
                            <div class="col-6">
                                <small class="text-muted">Produktivitas</small>
                                <div class="fw-bold">{{ number_format($fruit['productivity']) }} Ton/Ha</div>
                </div>
            </div>
                        @endif
                        <div class="text-center mt-2">
                            <span class="badge bg-success">Organik</span>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="text-center py-4">
                    <i class="fas fa-apple-alt fa-2x text-muted mb-2"></i>
                    <h6 class="text-muted">Belum ada data buah-buahan</h6>
                    <p class="text-muted small">Data buah-buahan akan ditampilkan setelah admin menambahkan data di panel admin.</p>
                    <a href="{{ route('contact') }}" class="btn btn-sm btn-outline-warning">
                        <i class="fas fa-envelope me-1"></i>Hubungi Admin
                    </a>
                        </div>
                    </div>
            @endforelse
        </div>
    </div>
</section>



<!-- Quality Standards Section -->
<section class="section bg-light">
    <div class="container">
        <div class="section-title">
            <h2>Standar Kualitas</h2>
            <p>Komitmen kami dalam menghasilkan produk berkualitas tinggi</p>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-certificate fa-3x text-primary mb-3"></i>
                        <h5 class="card-title">Sertifikasi Organik</h5>
                        <p class="card-text">Semua produk telah bersertifikasi organik dari lembaga sertifikasi terakreditasi.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-leaf fa-3x text-success mb-3"></i>
                        <h5 class="card-title">Ramah Lingkungan</h5>
                        <p class="card-text">Pertanian yang ramah lingkungan tanpa penggunaan pestisida kimia.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-heart fa-3x text-danger mb-3"></i>
                        <h5 class="card-title">Sehat & Bergizi</h5>
                        <p class="card-text">Produk yang sehat dan bergizi tinggi untuk konsumen.</p>
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
                <h3>Ingin Membeli Produk Kami?</h3>
                <p class="mb-0">Hubungi kami untuk informasi pemesanan dan kerjasama bisnis produk pertanian Desa Tetembomua.</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="{{ route('contact') }}" class="btn btn-light btn-lg">
                    <i class="fas fa-shopping-cart me-2"></i>Hubungi Kami
                </a>
            </div>
        </div>
    </div>
</section>
<style>
/* Custom color classes for consistency */
.text-primary {
    color: var(--primary-green) !important;
}

.text-success {
    color: var(--secondary-green) !important;
}

.text-warning {
    color: var(--light-brown) !important;
}

.text-info {
    color: var(--accent-brown) !important;
}

.bg-primary {
    background: linear-gradient(135deg, var(--primary-green), var(--secondary-green)) !important;
}

.bg-success {
    background-color: var(--secondary-green) !important;
}

.bg-warning {
    background-color: var(--light-brown) !important;
}

.bg-info {
    background-color: var(--accent-brown) !important;
}

.btn-outline-primary {
    border-color: var(--primary-green);
    color: var(--primary-green);
}

.btn-outline-primary:hover {
    background: var(--primary-gradient);
    border-color: var(--primary-green);
}

/* Komoditas Image Styles */
.komoditas-image-container {
    position: relative;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 15px 35px rgba(46, 139, 87, 0.2);
}

.komoditas-image {
    border-radius: 20px;
    transition: transform 0.5s ease;
}

.komoditas-image-container:hover .komoditas-image {
    transform: scale(1.03);
}

.komoditas-image-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, 
        rgba(46, 139, 87, 0.1), 
        rgba(60, 179, 113, 0.05), 
        rgba(32, 178, 170, 0.1));
    border-radius: 20px;
}

/* Card Image Styles */
.card-img-top {
    height: 200px;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.card:hover .card-img-top {
    transform: scale(1.05);
}

/* Image Preview Modal */
.image-preview-modal {
    display: none;
    position: fixed;
    z-index: 9999;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.9);
    backdrop-filter: blur(5px);
}

.image-preview-content {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    max-width: 70%;
    max-height: 70%;
}

.image-preview-content img {
    width: 100%;
    height: auto;
    border-radius: 12px;
    box-shadow: 0 20px 40px rgba(0,0,0,0.4);
}

.image-preview-close {
    position: absolute;
    top: 20px;
    right: 30px;
    color: white;
    font-size: 40px;
    font-weight: bold;
    cursor: pointer;
    z-index: 10000;
}

.image-preview-close:hover {
    color: #ccc;
}

.open-image {
    cursor: pointer;
    transition: transform 0.3s ease;
}

.open-image:hover {
    transform: scale(1.02);
}
</style>

<!-- Image Preview Modal -->
<div class="image-preview-modal" id="imagePreviewModal">
    <span class="image-preview-close" onclick="closeImagePreview()">&times;</span>
    <div class="image-preview-content">
        <img id="imagePreviewImg" src="" alt="Preview">
    </div>
</div>

<script>
function openImagePreview(src) {
    document.getElementById('imagePreviewImg').src = src;
    document.getElementById('imagePreviewModal').style.display = 'block';
    document.body.style.overflow = 'hidden';
}

function closeImagePreview() {
    document.getElementById('imagePreviewModal').style.display = 'none';
    document.body.style.overflow = 'auto';
}

// Close modal when clicking outside the image
document.getElementById('imagePreviewModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeImagePreview();
    }
});

// Add click event to all open-image elements
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.open-image').forEach(function(element) {
        element.addEventListener('click', function() {
            const src = this.getAttribute('data-src');
            if (src) {
                openImagePreview(src);
            }
        });
    });
});
</script>

@endsection

