@extends('layouts.app')

@section('title', 'Galeri - Desa Tetembomua')

@section('content')
<!-- Hero Section -->
<section class="hero-section" style="background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('/FOTO/DSC_0596.JPG') center/cover;">
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
            <!-- Kegiatan -->
            <div class="col-lg-4 col-md-6 gallery-item" data-category="kegiatan">
                <div class="gallery-card">
                    <div class="gallery-image">
                        <img src="/FOTO/kegiatan/WhatsApp Image 2025-08-23 at 21.15.00.jpeg" alt="Kegiatan Desa" class="img-fluid">
                        <div class="gallery-overlay">
                            <div class="overlay-content">
                                <h5>Kegiatan Musyawarah Desa</h5>
                                <p>Musyawarah perencanaan pembangunan desa tahun 2024</p>
                                <span class="gallery-date">15 Oktober 2024</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 gallery-item" data-category="kegiatan">
                <div class="gallery-card">
                    <div class="gallery-image">
                        <img src="/FOTO/kegiatan/WhatsApp Image 2025-08-23 at 21.14.55.jpeg" alt="Kegiatan Pertanian" class="img-fluid">
                        <div class="gallery-overlay">
                            <div class="overlay-content">
                                <h5>Pelatihan Pertanian</h5>
                                <p>Pelatihan teknik pertanian modern untuk petani desa</p>
                                <span class="gallery-date">20 Oktober 2024</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 gallery-item" data-category="kegiatan">
                <div class="gallery-card">
                    <div class="gallery-image">
                        <img src="/FOTO/kegiatan/WhatsApp Image 2025-08-23 at 21.14.54.jpeg" alt="Kegiatan Sosial" class="img-fluid">
                        <div class="gallery-overlay">
                            <div class="overlay-content">
                                <h5>Kegiatan Sosial</h5>
                                <p>Kegiatan gotong royong membersihkan lingkungan desa</p>
                                <span class="gallery-date">25 Oktober 2024</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 gallery-item" data-category="kegiatan">
                <div class="gallery-card">
                    <div class="gallery-image">
                        <img src="/FOTO/kegiatan/WhatsApp Image 2025-08-23 at 21.14.53.jpeg" alt="Kegiatan Pembangunan" class="img-fluid">
                        <div class="gallery-overlay">
                            <div class="overlay-content">
                                <h5>Kegiatan Pembangunan</h5>
                                <p>Progres pembangunan infrastruktur desa</p>
                                <span class="gallery-date">30 Oktober 2024</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 gallery-item" data-category="kegiatan">
                <div class="gallery-card">
                    <div class="gallery-image">
                        <img src="/FOTO/kegiatan/WhatsApp Image 2025-08-23 at 21.14.51.jpeg" alt="Kegiatan Masyarakat" class="img-fluid">
                        <div class="gallery-overlay">
                            <div class="overlay-content">
                                <h5>Kegiatan Masyarakat</h5>
                                <p>Kegiatan pemberdayaan masyarakat desa</p>
                                <span class="gallery-date">5 November 2024</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 gallery-item" data-category="kegiatan">
                <div class="gallery-card">
                    <div class="gallery-image">
                        <img src="/FOTO/kegiatan/WhatsApp Image 2025-08-23 at 21.14.50.jpeg" alt="Kegiatan Pelatihan" class="img-fluid">
                        <div class="gallery-overlay">
                            <div class="overlay-content">
                                <h5>Kegiatan Pelatihan</h5>
                                <p>Pelatihan keterampilan untuk warga desa</p>
                                <span class="gallery-date">10 November 2024</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 gallery-item" data-category="kegiatan">
                <div class="gallery-card">
                    <div class="gallery-image">
                        <img src="/FOTO/kegiatan/WhatsApp Image 2025-08-23 at 21.14.45.jpeg" alt="Kegiatan Desa" class="img-fluid">
                        <div class="gallery-overlay">
                            <div class="overlay-content">
                                <h5>Kegiatan Desa</h5>
                                <p>Dokumentasi berbagai kegiatan pembangunan desa</p>
                                <span class="gallery-date">15 November 2024</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Pembangunan -->
            <div class="col-lg-4 col-md-6 gallery-item" data-category="pembangunan">
                <div class="gallery-card">
                    <div class="gallery-image">
                        <img src="/FOTO/DSC_0596.JPG" alt="Pembangunan Jalan" class="img-fluid">
                        <div class="gallery-overlay">
                            <div class="overlay-content">
                                <h5>Pembangunan Jalan Desa</h5>
                                <p>Progres pembangunan jalan desa untuk meningkatkan aksesibilitas</p>
                                <span class="gallery-date">25 Oktober 2024</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 gallery-item" data-category="pembangunan">
                <div class="gallery-card">
                    <div class="gallery-image">
                        <img src="/FOTO/DSC_0605.JPG" alt="Pembangunan Air Bersih" class="img-fluid">
                        <div class="gallery-overlay">
                            <div class="overlay-content">
                                <h5>Sistem Air Bersih</h5>
                                <p>Instalasi sistem air bersih untuk seluruh warga desa</p>
                                <span class="gallery-date">30 Oktober 2024</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Potensi -->
            <div class="col-lg-4 col-md-6 gallery-item" data-category="potensi">
                <div class="gallery-card">
                    <div class="gallery-image">
                        <img src="/FOTO/DSC_0596.JPG" alt="Potensi Pertanian" class="img-fluid">
                        <div class="gallery-overlay">
                            <div class="overlay-content">
                                <h5>Lahan Pertanian</h5>
                                <p>Lahan pertanian subur yang menjadi tulang punggung ekonomi desa</p>
                                <span class="gallery-date">5 November 2024</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 gallery-item" data-category="potensi">
                <div class="gallery-card">
                    <div class="gallery-image">
                        <img src="/FOTO/DSC_0605.JPG" alt="Potensi UMKM" class="img-fluid">
                        <div class="gallery-overlay">
                            <div class="overlay-content">
                                <h5>UMKM Desa</h5>
                                <p>Usaha Mikro Kecil dan Menengah yang berkembang di desa</p>
                                <span class="gallery-date">10 November 2024</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Alam -->
            <div class="col-lg-4 col-md-6 gallery-item" data-category="alam">
                <div class="gallery-card">
                    <div class="gallery-image">
                        <img src="/FOTO/DSC_0596.JPG" alt="Pemandangan Alam" class="img-fluid">
                        <div class="gallery-overlay">
                            <div class="overlay-content">
                                <h5>Pemandangan Gunung</h5>
                                <p>Keindahan alam desa dengan pemandangan gunung yang memukau</p>
                                <span class="gallery-date">15 November 2024</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 gallery-item" data-category="alam">
                <div class="gallery-card">
                    <div class="gallery-image">
                        <img src="/FOTO/DSC_0605.JPG" alt="Persawahan" class="img-fluid">
                        <div class="gallery-overlay">
                            <div class="overlay-content">
                                <h5>Persawahan Terasering</h5>
                                <p>Persawahan terasering yang indah dan produktif</p>
                                <span class="gallery-date">20 November 2024</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 gallery-item" data-category="kegiatan">
                <div class="gallery-card">
                    <div class="gallery-image">
                        <img src="/FOTO/DSC_0596.JPG" alt="Kegiatan Sosial" class="img-fluid">
                        <div class="gallery-overlay">
                            <div class="overlay-content">
                                <h5>Kegiatan Sosial</h5>
                                <p>Kegiatan gotong royong membersihkan lingkungan desa</p>
                                <span class="gallery-date">25 November 2024</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 gallery-item" data-category="pembangunan">
                <div class="gallery-card">
                    <div class="gallery-image">
                        <img src="/FOTO/DSC_0605.JPG" alt="Pembangunan Balai Desa" class="img-fluid">
                        <div class="gallery-overlay">
                            <div class="overlay-content">
                                <h5>Balai Desa</h5>
                                <p>Pembangunan balai desa untuk kegiatan masyarakat</p>
                                <span class="gallery-date">30 November 2024</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 gallery-item" data-category="potensi">
                <div class="gallery-card">
                    <div class="gallery-image">
                        <img src="/FOTO/DSC_0596.JPG" alt="Potensi Pariwisata" class="img-fluid">
                        <div class="gallery-overlay">
                            <div class="overlay-content">
                                <h5>Potensi Pariwisata</h5>
                                <p>Lokasi wisata alam yang dapat dikembangkan</p>
                                <span class="gallery-date">5 Desember 2024</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 gallery-item" data-category="alam">
                <div class="gallery-card">
                    <div class="gallery-image">
                        <img src="/FOTO/DSC_0605.JPG" alt="Hutan Desa" class="img-fluid">
                        <div class="gallery-overlay">
                            <div class="overlay-content">
                                <h5>Hutan Lindung</h5>
                                <p>Hutan lindung yang menjaga kelestarian alam desa</p>
                                <span class="gallery-date">10 Desember 2024</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
