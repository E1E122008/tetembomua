@extends('layouts.app')

@section('title', 'Galeri - Desa Tetembomua')

@section('content')
<!-- Hero Section -->
<section class="hero-section" style="background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('/FOTO/devyle.jpeg') center/cover;">
    <div class="container">
        <div class="row align-items-center min-vh-50">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-4 fw-bold text-white mb-4">Galeri Desa Tetembomua</h1>
                <p class="lead text-white mb-0">Dokumentasi Kegiatan, Pembangunan, dan Potensi Desa</p>
            </div>
        </div>
    </div>
</section>

<!-- Filter Buttons -->
<section class="py-4 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="filter-buttons">
                    <button class="filter-btn active" data-filter="all">Semua</button>
                    <button class="filter-btn" data-filter="kegiatan">Kegiatan</button>
                    <button class="filter-btn" data-filter="pembangunan">Pembangunan</button>
                    <button class="filter-btn" data-filter="potensi">Potensi</button>
                    <button class="filter-btn" data-filter="alam">Alam</button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Gallery Grid -->
<section class="py-5">
    <div class="container">
        <div class="row g-4" id="gallery-grid">
            @if(isset($media) && count($media) > 0)
                @foreach($media as $item)
                <div class="col-lg-4 col-md-6 gallery-item" data-category="{{ $item['category'] ?? 'kegiatan' }}">
                    <div class="gallery-card">
                        <div class="gallery-image">
                            @if(($item['type'] ?? 'image') === 'video')
                                <video controls class="img-fluid" preload="metadata" style="background:#000">
                                    <source src="{{ $item['path'] }}" type="video/mp4">
                                    <source src="{{ $item['path'] }}" type="video/webm">
                                    <source src="{{ $item['path'] }}" type="video/ogg">
                                    Browser Anda tidak mendukung tag video.
                                </video>
                            @else
                                <img src="{{ $item['path'] }}" alt="{{ $item['name'] }}" class="img-fluid">
                            @endif
                            <div class="gallery-overlay">
                                <div class="overlay-content">
                                    @if(!empty($item['description']))
                                        <p>{{ $item['description'] }}</p>
                                    @else
                                        <p>Kegiatan Desa Tetembomua</p>
                                    @endif
                                    @if(!empty($item['image_date']))
                                        <span class="gallery-date">{{ date('d F Y', strtotime($item['image_date'])) }}</span>
                                    @else
                                        <span class="gallery-date">{{ date('d F Y', strtotime('now')) }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <div class="col-12 text-center py-5">
                    <i class="fas fa-images fa-4x text-muted mb-3"></i>
                    <h5 class="text-muted">Belum ada media</h5>
                    <p class="text-muted">Galeri akan ditampilkan setelah ada gambar atau video yang diupload</p>
                </div>
            @endif
        </div>
    </div>
</section>
    </div>
</section>

<!-- Video Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center mb-5">
                <h2 class="section-title">Video Dokumentasi</h2>
                <div class="title-underline"></div>
                <p class="text-muted">Video dokumentasi kegiatan dan potensi desa</p>
            </div>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="video-card">
                    <div class="video-placeholder">
                        <i class="fas fa-play-circle"></i>
                        <h5>Profil Desa Tetembomua</h5>
                        <p>Video profil lengkap desa yang menampilkan potensi dan kegiatan</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="video-card">
                    <div class="video-placeholder">
                        <i class="fas fa-play-circle"></i>
                        <h5>Kegiatan Pertanian</h5>
                        <p>Dokumentasi kegiatan pertanian dan pelatihan petani</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-5" style="background: var(--primary-gradient);">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h3 class="text-white mb-4">Bagikan Momen Indah Desa</h3>
                <p class="text-white mb-4">Kirim foto dan video kegiatan desa untuk ditampilkan di galeri</p>
                <a href="{{ route('contact') }}" class="btn btn-light btn-lg">Kirim Dokumentasi</a>
            </div>
        </div>
    </div>
</section>

<style>
.filter-buttons {
    display: flex;
    justify-content: center;
    gap: 1rem;
    flex-wrap: wrap;
}

.filter-btn {
    padding: 0.75rem 1.5rem;
    border: 2px solid var(--primary-green);
    background: transparent;
    color: var(--primary-green);
    border-radius: 25px;
    font-weight: 600;
    transition: all 0.3s ease;
    cursor: pointer;
}

.filter-btn:hover,
.filter-btn.active {
    background: var(--primary-green);
    color: white;
}

.gallery-card {
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    height: 100%;
}

.gallery-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.2);
}

.gallery-image {
    position: relative;
    overflow: hidden;
    aspect-ratio: 4/3;
}

.gallery-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.gallery-card:hover .gallery-image img {
    transform: scale(1.1);
}

.gallery-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.9));
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.gallery-card:hover .gallery-overlay {
    opacity: 1;
}

.overlay-content {
    text-align: center;
    color: white;
    padding: 1rem;
}

.overlay-content h5 {
    font-weight: 600;
    margin-bottom: 0.5rem;
}

.overlay-content p {
    font-size: 0.9rem;
    margin-bottom: 0.5rem;
    opacity: 0.9;
}

.gallery-date {
    font-size: 0.8rem;
    opacity: 0.7;
    font-style: italic;
}

/* Video Cards */
.video-card {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    height: 100%;
}

.video-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0,0,0,0.15);
}

.video-placeholder {
    padding: 3rem 2rem;
    text-align: center;
    background: var(--bg-light);
    height: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.video-placeholder i {
    font-size: 4rem;
    color: var(--primary-green);
    margin-bottom: 1rem;
}

.video-placeholder h5 {
    color: var(--primary-green);
    margin-bottom: 0.5rem;
    font-weight: 600;
}

.video-placeholder p {
    color: var(--text-light);
    margin-bottom: 0;
}

/* Responsive */
@media (max-width: 768px) {
    .filter-buttons {
        gap: 0.5rem;
    }
    
    .filter-btn {
        padding: 0.5rem 1rem;
        font-size: 0.9rem;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const filterBtns = document.querySelectorAll('.filter-btn');
    const galleryItems = document.querySelectorAll('.gallery-item');
    
    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            // Remove active class from all buttons
            filterBtns.forEach(b => b.classList.remove('active'));
            // Add active class to clicked button
            this.classList.add('active');
            
            const filter = this.getAttribute('data-filter');
            
            galleryItems.forEach(item => {
                if (filter === 'all' || item.getAttribute('data-category') === filter) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });
});
</script>
@endsection
