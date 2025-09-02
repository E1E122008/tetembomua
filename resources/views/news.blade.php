@extends('layouts.app')

@section('title', 'Berita & Informasi - Desa Tetembomua')

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 mx-auto text-center">
                <div class="hero-content">
                    <h1>Berita & Informasi Terkini</h1>
                    <p>Dapatkan informasi terbaru seputar kegiatan, program, dan perkembangan Desa Tetembomua</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- News Section -->
<section class="section">
    <div class="container">
        <div class="section-title">
            <h2>Berita Terbaru</h2>
            <p>Informasi terkini seputar kegiatan dan program desa</p>
        </div>
        
        <!-- Featured News -->
        <div class="row mb-5">
            <div class="col-lg-8">
                <div class="card featured-news">
                    <span role="button" class="open-image" data-src="https://images.unsplash.com/photo-1574323347407-f5e1ad6d020b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80">
                        <img src="https://images.unsplash.com/photo-1574323347407-f5e1ad6d020b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                             class="card-img-top" alt="Kegiatan Desa">
                    </span>
                    <div class="card-body">
                        <div class="news-meta mb-3">
                            <span class="badge bg-primary">Utama</span>
                            <small class="text-muted ms-3">
                                <i class="fas fa-calendar me-1"></i>15 Desember 2024
                            </small>
                        </div>
                        <h3 class="card-title">Pelaksanaan Program Pemberdayaan Masyarakat Desa</h3>
                        <p class="card-text">Program pemberdayaan masyarakat desa telah dilaksanakan dengan sukses. Kegiatan ini melibatkan seluruh elemen masyarakat desa dalam rangka meningkatkan kesejahteraan dan kemandirian desa.</p>
                        <a href="#" class="btn btn-primary">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-bullhorn text-primary me-2"></i>
                            Pengumuman Terbaru
                        </h5>
                        <div class="announcement-list">
                            <div class="announcement-item mb-3">
                                <h6>Rapat Koordinasi Desa</h6>
                                <p class="text-muted mb-1">Jumat, 20 Desember 2024</p>
                                <small class="text-muted">Pukul 19:00 WITA di Balai Desa</small>
                            </div>
                            <div class="announcement-item mb-3">
                                <h6>Pendaftaran Bantuan UMKM</h6>
                                <p class="text-muted mb-1">Deadline: 25 Desember 2024</p>
                                <small class="text-muted">Syarat dan ketentuan berlaku</small>
                            </div>
                            <div class="announcement-item">
                                <h6>Jadwal Posyandu</h6>
                                <p class="text-muted mb-1">Setiap Senin minggu ke-2</p>
                                <small class="text-muted">Pukul 08:00 - 12:00 WITA</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- News Grid -->
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <span role="button" class="open-image" data-src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80">
                        <img src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                             class="card-img-top" alt="Pertanian">
                    </span>
                    <div class="card-body">
                        <div class="news-meta mb-2">
                            <span class="badge bg-success">Pertanian</span>
                            <small class="text-muted ms-2">
                                <i class="fas fa-calendar me-1"></i>12 Desember 2024
                            </small>
                        </div>
                        <h5 class="card-title">Pelatihan Teknologi Pertanian Modern</h5>
                        <p class="card-text">Kegiatan pelatihan teknologi pertanian modern telah diselenggarakan untuk meningkatkan produktivitas petani desa.</p>
                        <a href="#" class="btn btn-outline-primary btn-sm">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <span role="button" class="open-image" data-src="https://images.unsplash.com/photo-1574323347407-f5e1ad6d020b?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80">
                        <img src="https://images.unsplash.com/photo-1574323347407-f5e1ad6d020b?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                             class="card-img-top" alt="Infrastruktur">
                    </span>
                    <div class="card-body">
                        <div class="news-meta mb-2">
                            <span class="badge bg-info">Infrastruktur</span>
                            <small class="text-muted ms-2">
                                <i class="fas fa-calendar me-1"></i>10 Desember 2024
                            </small>
                        </div>
                        <h5 class="card-title">Pembangunan Jalan Desa Selesai</h5>
                        <p class="card-text">Proyek pembangunan jalan desa sepanjang 2 kilometer telah selesai dan siap digunakan oleh masyarakat.</p>
                        <a href="#" class="btn btn-outline-primary btn-sm">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <span role="button" class="open-image" data-src="https://images.unsplash.com/photo-1574323347407-f5e1ad6d020b?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80">
                        <img src="https://images.unsplash.com/photo-1574323347407-f5e1ad6d020b?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                             class="card-img-top" alt="Pendidikan">
                    </span>
                    <div class="card-body">
                        <div class="news-meta mb-2">
                            <span class="badge bg-warning">Pendidikan</span>
                            <small class="text-muted ms-2">
                                <i class="fas fa-calendar me-1"></i>8 Desember 2024
                            </small>
                        </div>
                        <h5 class="card-title">Program Beasiswa untuk Anak Desa</h5>
                        <p class="card-text">Program beasiswa untuk anak-anak desa yang berprestasi telah dibuka dengan kuota 20 penerima.</p>
                        <a href="#" class="btn btn-outline-primary btn-sm">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <span role="button" class="open-image" data-src="https://images.unsplash.com/photo-1574323347407-f5e1ad6d020b?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80">
                        <img src="https://images.unsplash.com/photo-1574323347407-f5e1ad6d020b?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                             class="card-img-top" alt="Kesehatan">
                    </span>
                    <div class="card-body">
                        <div class="news-meta mb-2">
                            <span class="badge bg-danger">Kesehatan</span>
                            <small class="text-muted ms-2">
                                <i class="fas fa-calendar me-1"></i>5 Desember 2024
                            </small>
                        </div>
                        <h5 class="card-title">Kampanye Vaksinasi COVID-19</h5>
                        <p class="card-text">Kampanye vaksinasi COVID-19 untuk masyarakat desa telah dilaksanakan dengan target 100% vaksinasi.</p>
                        <a href="#" class="btn btn-outline-primary btn-sm">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <span role="button" class="open-image" data-src="https://images.unsplash.com/photo-1574323347407-f5e1ad6d020b?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80">
                        <img src="https://images.unsplash.com/photo-1574323347407-f5e1ad6d020b?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                             class="card-img-top" alt="Ekonomi">
                    </span>
                    <div class="card-body">
                        <div class="news-meta mb-2">
                            <span class="badge bg-secondary">Ekonomi</span>
                            <small class="text-muted ms-2">
                                <i class="fas fa-calendar me-1"></i>3 Desember 2024
                            </small>
                        </div>
                        <h5 class="card-title">Peluncuran Program UMKM Desa</h5>
                        <p class="card-text">Program pengembangan UMKM desa telah diluncurkan dengan dukungan dana dari pemerintah pusat.</p>
                        <a href="#" class="btn btn-outline-primary btn-sm">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <span role="button" class="open-image" data-src="https://images.unsplash.com/photo-1574323347407-f5e1ad6d020b?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80">
                        <img src="https://images.unsplash.com/photo-1574323347407-f5e1ad6d020b?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                             class="card-img-top" alt="Budaya">
                    </span>
                    <div class="card-body">
                        <div class="news-meta mb-2">
                            <span class="badge bg-dark">Budaya</span>
                            <small class="text-muted ms-2">
                                <i class="fas fa-calendar me-1"></i>1 Desember 2024
                            </small>
                        </div>
                        <h5 class="card-title">Festival Budaya Desa Tetembomua</h5>
                        <p class="card-text">Festival budaya desa akan diselenggarakan untuk melestarikan adat istiadat dan budaya lokal.</p>
                        <a href="#" class="btn btn-outline-primary btn-sm">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <nav aria-label="News pagination" class="mt-5">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </div>
</section>

<!-- Newsletter Section -->
<section class="section bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h3>Dapatkan Informasi Terbaru</h3>
                <p class="mb-4">Berlangganan newsletter untuk mendapatkan informasi terbaru seputar kegiatan dan program desa langsung ke email Anda.</p>
            </div>
            <div class="col-lg-6">
                <form class="newsletter-form">
                    <div class="input-group">
                        <input type="email" class="form-control" placeholder="Masukkan email Anda" required>
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-paper-plane me-2"></i>Berlangganan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<style>
.featured-news {
    border: none;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.featured-news .card-img-top {
    height: 300px;
    object-fit: cover;
}

.news-meta {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
}

.announcement-item {
    padding: 1rem 0;
    border-bottom: 1px solid #eee;
}

.announcement-item:last-child {
    border-bottom: none;
}

.newsletter-form .input-group {
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    border-radius: 25px;
    overflow: hidden;
}

.newsletter-form .form-control {
    border: none;
    padding: 15px 20px;
}

.newsletter-form .btn {
    border-radius: 0 25px 25px 0;
    padding: 15px 25px;
}

.card-img-top {
    height: 200px;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.news-card:hover .card-img-top {
    transform: scale(1.05);
}

/* Featured News Image */
.featured-news .card-img-top {
    height: 300px;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.featured-news:hover .card-img-top {
    transform: scale(1.03);
}

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

.text-danger {
    color: #e74c3c !important;
}

.text-secondary {
    color: var(--dark-green) !important;
}

.bg-primary {
    background: linear-gradient(135deg, var(--primary-green), var(--secondary-green)) !important;
}

.bg-success {
    background-color: var(--secondary-green) !important;
}

.bg-info {
    background-color: var(--accent-brown) !important;
}

.bg-warning {
    background-color: var(--light-brown) !important;
}

.bg-danger {
    background-color: #e74c3c !important;
}

.bg-secondary {
    background-color: var(--dark-green) !important;
}

.bg-dark {
    background-color: var(--dark-green) !important;
}

.btn-outline-primary {
    border-color: var(--primary-green);
    color: var(--primary-green);
}

.btn-outline-primary:hover {
    background-color: var(--primary-green);
    border-color: var(--primary-green);
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
