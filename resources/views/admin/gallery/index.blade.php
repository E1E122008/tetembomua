@extends('admin.layouts.app')

@section('title', 'Manajemen Galeri - Admin Panel')

@section('content')
<!-- Content Header -->
<div class="content-header fade-in">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h2><i class="fas fa-images me-2"></i>Manajemen Galeri</h2>
            <p class="text-muted mb-0">Kelola foto, gambar, dan video kegiatan desa</p>
        </div>
        <div>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#uploadModal">
                <i class="fas fa-upload me-2"></i>Upload Media
            </button>
        </div>
    </div>
</div>

<!-- Success/Error Messages -->
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="fas fa-check-circle me-2"></i>
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

@if(session('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <i class="fas fa-exclamation-circle me-2"></i>
    {{ session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

<!-- Statistics Cards -->
<div class="row mb-4">
    <div class="col-lg-2 col-md-4 col-sm-6 mb-3">
        <div class="card stat-card slide-in">
            <div class="card-body text-center">
                <i class="fas fa-images fa-3x text-primary mb-3"></i>
                <h3 class="mb-0">{{ count($media) }}</h3>
                <small>Total Media</small>
            </div>
        </div>
    </div>
    <div class="col-lg-2 col-md-4 col-sm-6 mb-3">
        <div class="card stat-card success slide-in">
            <div class="card-body text-center">
                <i class="fas fa-tags fa-3x text-success mb-3"></i>
                <h3 class="mb-0">{{ count(array_unique(array_column($media, 'category'))) }}</h3>
                <small>Kategori Aktif</small>
            </div>
        </div>
    </div>
    <div class="col-lg-2 col-md-4 col-sm-6 mb-3">
        <div class="card stat-card warning slide-in">
            <div class="card-body text-center">
                <i class="fas fa-calendar fa-3x text-warning mb-3"></i>
                <h3 class="mb-0">{{ count(array_filter($media, fn($img) => date('Y-m', strtotime($img['date'])) == date('Y-m'))) }}</h3>
                <small>Upload Bulan Ini</small>
            </div>
        </div>
    </div>
    <div class="col-lg-2 col-md-4 col-sm-6 mb-3">
        <div class="card stat-card info slide-in">
            <div class="card-body text-center">
                <i class="fas fa-hdd fa-3x text-info mb-3"></i>
                <h3 class="mb-0">{{ round(array_sum(array_column($media, 'size')) / 1024 / 1024, 2) }} MB</h3>
                <small>Total Ukuran</small>
            </div>
        </div>
    </div>
    <div class="col-lg-2 col-md-4 col-sm-6 mb-3">
        <div class="card stat-card danger slide-in">
            <div class="card-body text-center">
                <i class="fas fa-video fa-3x text-danger mb-3"></i>
                <h3 class="mb-0">{{ count(array_filter($media, fn($item) => ($item['type'] ?? 'image') === 'video')) }}</h3>
                <small>Total Video</small>
            </div>
        </div>
    </div>
    <div class="col-lg-2 col-md-4 col-sm-6 mb-3">
        <div class="card stat-card secondary slide-in">
            <div class="card-body text-center">
                <i class="fas fa-image fa-3x text-secondary mb-3"></i>
                <h3 class="mb-0">{{ count(array_filter($media, fn($item) => ($item['type'] ?? 'image') === 'image')) }}</h3>
                <small>Total Gambar</small>
            </div>
        </div>
    </div>
</div>

<!-- Gallery Grid -->
<div class="card fade-in">
    <div class="card-header bg-transparent border-0">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="mb-0">
                <i class="fas fa-th me-2 text-primary"></i>
                Daftar Gambar
            </h5>
            <div class="filter-buttons">
                <button class="filter-btn active" data-filter="all">Semua</button>
                <button class="filter-btn" data-filter="kegiatan">Kegiatan</button>
                <button class="filter-btn" data-filter="pembangunan">Pembangunan</button>
                <button class="filter-btn" data-filter="potensi">Potensi</button>
                <button class="filter-btn" data-filter="alam">Alam</button>
            </div>
        </div>
    </div>
    <div class="card-body">
        @if(count($media) > 0)
        <div class="row g-3">
            @foreach($media as $item)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="gallery-item" data-category="{{ $item['category'] ?? 'kegiatan' }}">
                    <div class="gallery-media">
                        @if(($item['type'] ?? 'image') === 'video')
                            <video controls class="img-fluid">
                                <source src="{{ $item['path'] }}" type="video/mp4">
                                <source src="{{ $item['path'] }}" type="video/webm">
                                <source src="{{ $item['path'] }}" type="video/ogg">
                                Browser Anda tidak mendukung tag video.
                            </video>
                            <div class="video-overlay">
                                <i class="fas fa-play-circle fa-3x text-white"></i>
                            </div>
                        @else
                            <img src="{{ $item['path'] }}" alt="{{ $item['name'] }}" class="img-fluid">
                        @endif
                        <div class="gallery-overlay">
                            <div class="overlay-content">
                                @if(($item['type'] ?? 'image') === 'video')
                                    <span class="badge bg-danger mb-2">Video</span>
                                @endif
                                @if(isset($item['category']) && $item['category'])
                                    <span class="badge bg-primary mb-2">{{ ucfirst($item['category']) }}</span>
                                @endif
                                @if(isset($item['description']) && $item['description'])
                                    <p class="mb-2 description-text">{{ $item['description'] }}</p>
                                @else
                                    <p class="mb-2 text-muted">Tidak ada keterangan</p>
                                @endif
                                @if(isset($item['image_date']) && $item['image_date'])
                                    <p class="mb-2">{{ date('d/m/Y', strtotime($item['image_date'])) }}</p>
                                @else
                                    <p class="mb-2">{{ date('d/m/Y H:i', strtotime($item['date'])) }}</p>
                                @endif
                                <p class="mb-2">{{ round($item['size'] / 1024, 2) }} KB</p>
                                <div class="btn-group" role="group">
                                    <a href="{{ $item['path'] }}" target="_blank" class="btn btn-sm btn-outline-light">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <button type="button" class="btn btn-sm btn-outline-warning" 
                                            onclick="editMedia('{{ $item['name'] }}', '{{ isset($item['description']) ? addslashes($item['description']) : '' }}', '{{ isset($item['category']) ? $item['category'] : '' }}', '{{ isset($item['image_date']) ? $item['image_date'] : '' }}')">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-outline-danger" 
                                            onclick="deleteMedia('{{ $item['name'] }}')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="gallery-info p-2">
                        <div class="d-flex justify-content-between align-items-start mb-1">
                            <h6 class="mb-0 text-truncate">{{ $item['name'] }}</h6>
                            <div>
                                @if(($item['type'] ?? 'image') === 'video')
                                    <span class="badge bg-danger me-1">Video</span>
                                @endif
                                @if(isset($item['category']) && $item['category'])
                                    <span class="badge bg-primary">{{ ucfirst($item['category']) }}</span>
                                @endif
                            </div>
                        </div>
                        @if(isset($item['description']) && $item['description'])
                            <p class="mb-1 small text-muted description-text">{{ $item['description'] }}</p>
                        @else
                            <p class="mb-1 small text-muted">Tidak ada keterangan</p>
                        @endif
                        @if(isset($item['image_date']) && $item['image_date'])
                            <small class="text-muted">{{ date('d/m/Y', strtotime($item['image_date'])) }}</small>
                        @else
                            <small class="text-muted">{{ date('d/m/Y', strtotime($item['date'])) }}</small>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-5">
            <i class="fas fa-images fa-4x text-muted mb-3"></i>
            <h5 class="text-muted">Belum ada media</h5>
            <p class="text-muted">Upload gambar atau video pertama untuk memulai galeri</p>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#uploadModal">
                <i class="fas fa-upload me-2"></i>Upload Media
            </button>
        </div>
        @endif
    </div>
</div>

<!-- Upload Modal -->
<div class="modal fade" id="uploadModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-upload me-2"></i>Upload Media
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('admin.gallery.upload') }}" method="POST" enctype="multipart/form-data" id="uploadForm">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="images" class="form-label">Pilih Gambar</label>
                                <input type="file" class="form-control" id="images" name="images[]" 
                                       accept="image/*" multiple>
                                <small class="text-muted">Format: JPG, PNG, GIF. Maksimal 2MB per file.</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="videos" class="form-label">Pilih Video</label>
                                <input type="file" class="form-control" id="videos" name="videos[]" 
                                       accept="video/*" multiple>
                                <small class="text-muted">Format: MP4, AVI, MOV, WMV. Maksimal 100MB per file.</small>
                            </div>
                        </div>
                    </div>
                    
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i>
                        <strong>Catatan:</strong> Pilih minimal satu file gambar atau video untuk diupload.
                    </div>
                    
                    <div class="upload-preview" id="uploadPreview" style="display: none;">
                        <h6>Preview Media:</h6>
                        <div class="row g-2" id="previewContainer">
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="category" class="form-label">Kategori <span class="text-danger">*</span></label>
                                <select class="form-control" id="category" name="category" required>
                                    <option value="">Pilih Kategori</option>
                                    <option value="kegiatan">Kegiatan</option>
                                    <option value="pembangunan">Pembangunan</option>
                                    <option value="potensi">Potensi</option>
                                    <option value="alam">Alam</option>
                                </select>
                                <small class="text-muted">Kategori untuk filter galeri</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="image_date" class="form-label">Tanggal Gambar <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" id="image_date" name="image_date" value="{{ date('Y-m-d') }}" required>
                                <small class="text-muted">Tanggal ketika gambar diambil/dilakukan</small>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="description" class="form-label">Keterangan Gambar</label>
                        <textarea class="form-control" id="description" name="description" rows="3" 
                                  placeholder="Masukkan keterangan untuk gambar yang diupload..."></textarea>
                        <small class="text-muted">Keterangan akan ditampilkan di galeri publik</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-upload me-2"></i>Upload Media
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Image Modal -->
<div class="modal fade" id="editModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-edit me-2"></i>Edit Keterangan Media
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="editForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama File</label>
                        <input type="text" class="form-control" id="editMediaName" readonly>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="editCategory" class="form-label">Kategori <span class="text-danger">*</span></label>
                                <select class="form-control" id="editCategory" name="category" required>
                                    <option value="">Pilih Kategori</option>
                                    <option value="kegiatan">Kegiatan</option>
                                    <option value="pembangunan">Pembangunan</option>
                                    <option value="potensi">Potensi</option>
                                    <option value="alam">Alam</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="editImageDate" class="form-label">Tanggal Gambar <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" id="editImageDate" name="image_date" required>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="editDescription" class="form-label">Keterangan Media</label>
                        <textarea class="form-control" id="editDescription" name="description" rows="4" 
                                  placeholder="Masukkan keterangan untuk media..."></textarea>
                        <small class="text-muted">Keterangan akan ditampilkan di galeri publik</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-warning">
                        <i class="fas fa-save me-2"></i>Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-exclamation-triangle me-2 text-danger"></i>Konfirmasi Hapus
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus media <strong id="deleteMediaName"></strong>?</p>
                <p class="text-muted">Tindakan ini tidak dapat dibatalkan.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <form id="deleteForm" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash me-2"></i>Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
.gallery-item {
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    background: white;
}

.gallery-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.2);
}

.gallery-media {
    position: relative;
    aspect-ratio: 4/3;
    overflow: hidden;
}

.gallery-media img,
.gallery-media video {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.gallery-item:hover .gallery-media img,
.gallery-item:hover .gallery-media video {
    transform: scale(1.1);
}

.video-overlay {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    opacity: 0.8;
    transition: opacity 0.3s ease;
}

.gallery-item:hover .video-overlay {
    opacity: 1;
}

/* Video specific styles */
.gallery-media video {
    background-color: #000;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .gallery-item {
        margin-bottom: 1rem;
    }
    
    .filter-buttons {
        justify-content: center;
        margin-top: 1rem;
    }
    
    .filter-btn {
        font-size: 0.7rem;
        padding: 0.4rem 0.8rem;
    }
}

/* Stat card colors */
.stat-card.secondary {
    background: linear-gradient(135deg, #6c757d, #495057);
    color: white;
}

.stat-card.danger {
    background: linear-gradient(135deg, #dc3545, #c82333);
    color: white;
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

.gallery-item:hover .gallery-overlay {
    opacity: 1;
}

.overlay-content {
    text-align: center;
    color: white;
    padding: 1rem;
}

.overlay-content h6 {
    font-weight: 600;
    margin-bottom: 0.5rem;
    font-size: 0.9rem;
}

.overlay-content p {
    font-size: 0.8rem;
    margin-bottom: 0.5rem;
    opacity: 0.9;
}

.description-text {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
}

.gallery-info {
    border-top: 1px solid #eee;
}

.upload-preview {
    border: 1px solid #dee2e6;
    border-radius: 10px;
    padding: 15px;
    background-color: #f8f9fa;
}

.preview-item {
    border-radius: 5px;
    overflow: hidden;
    border: 1px solid #dee2e6;
}

.preview-item img {
    width: 100%;
    height: 80px;
    object-fit: cover;
}

.filter-buttons {
    display: flex;
    gap: 0.5rem;
    flex-wrap: wrap;
}

.filter-btn {
    padding: 0.5rem 1rem;
    border: 2px solid var(--primary-green);
    background: transparent;
    color: var(--primary-green);
    border-radius: 20px;
    font-weight: 600;
    font-size: 0.8rem;
    transition: all 0.3s ease;
    cursor: pointer;
}

.filter-btn:hover,
.filter-btn.active {
    background: var(--primary-green);
    color: white;
}
</style>

<script>
// Media preview functionality
function updatePreview() {
    const imageFiles = document.getElementById('images').files;
    const videoFiles = document.getElementById('videos').files;
    const preview = document.getElementById('uploadPreview');
    const container = document.getElementById('previewContainer');
    
    const allFiles = [...Array.from(imageFiles), ...Array.from(videoFiles)];
    
    if (allFiles.length > 0) {
        container.innerHTML = '';
        preview.style.display = 'block';
        
        allFiles.forEach((file, index) => {
            const div = document.createElement('div');
            div.className = 'col-md-3 col-sm-4 col-6';
            
            if (file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    div.innerHTML = `
                        <div class="preview-item">
                            <img src="${e.target.result}" alt="Preview ${index + 1}">
                        </div>
                    `;
                }
                reader.readAsDataURL(file);
            } else if (file.type.startsWith('video/')) {
                div.innerHTML = `
                    <div class="preview-item">
                        <video controls style="width: 100%; height: 80px; object-fit: cover;">
                            <source src="${URL.createObjectURL(file)}" type="${file.type}">
                        </video>
                    </div>
                `;
            }
            
            container.appendChild(div);
        });
    } else {
        preview.style.display = 'none';
    }
}

document.getElementById('images').addEventListener('change', updatePreview);
document.getElementById('videos').addEventListener('change', updatePreview);

// Form validation
document.getElementById('uploadForm').addEventListener('submit', function(e) {
    const imageFiles = document.getElementById('images').files;
    const videoFiles = document.getElementById('videos').files;
    
    if (imageFiles.length === 0 && videoFiles.length === 0) {
        e.preventDefault();
        alert('Pilih minimal satu file gambar atau video untuk diupload.');
        return false;
    }
});

// Edit media functionality
function editMedia(filename, description, category, imageDate) {
    document.getElementById('editMediaName').value = filename;
    document.getElementById('editDescription').value = description;
    document.getElementById('editCategory').value = category || '';
    document.getElementById('editImageDate').value = imageDate || '';
    document.getElementById('editForm').action = '/admin/gallery/' + encodeURIComponent(filename) + '/edit';
    new bootstrap.Modal(document.getElementById('editModal')).show();
}

// Delete media functionality
function deleteMedia(filename) {
    document.getElementById('deleteMediaName').textContent = filename;
    document.getElementById('deleteForm').action = '/admin/gallery/' + encodeURIComponent(filename);
    new bootstrap.Modal(document.getElementById('deleteModal')).show();
}

// Filter functionality
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
