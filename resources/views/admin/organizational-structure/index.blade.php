@extends('admin.layouts.app')

@section('title', 'Struktur Organisasi - Admin Panel')

@section('content')
<!-- Content Header -->
<div class="content-header fade-in">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h2><i class="fas fa-sitemap me-2"></i>Struktur Organisasi</h2>
            <p class="text-muted mb-0">Kelola struktur organisasi desa</p>
        </div>
        <div>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addStructureModal">
                <i class="fas fa-plus me-2"></i>Tambah Struktur
            </button>
        </div>
    </div>
</div>

<!-- Success Message -->
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="fas fa-check-circle me-2"></i>
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

<!-- Error Message -->
@if(session('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <i class="fas fa-exclamation-circle me-2"></i>
    {{ session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

<!-- Structure Categories -->
<div class="row">
    <div class="col-12 mb-4">
        <div class="card fade-in">
            <div class="card-header bg-transparent border-0">
                <h5 class="mb-0">
                    <i class="fas fa-filter me-2 text-primary"></i>
                    Filter Berdasarkan Kategori
                </h5>
            </div>
            <div class="card-body">
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-outline-primary active" data-filter="all">Semua</button>
                    <button type="button" class="btn btn-outline-success" data-filter="kepala_desa">Kepala Desa</button>
                    <button type="button" class="btn btn-outline-info" data-filter="perangkat">Perangkat</button>
                    <button type="button" class="btn btn-outline-warning" data-filter="bpd">BPD</button>
                    <button type="button" class="btn btn-outline-secondary" data-filter="lpm">LPM</button>
                    <button type="button" class="btn btn-outline-danger" data-filter="dusun">Dusun</button>
                    <button type="button" class="btn btn-outline-dark" data-filter="rt">RT</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Structures List -->
<div class="row" id="structures-container">
    @foreach($structures as $structure)
    <div class="col-lg-4 col-md-6 mb-4 structure-item" data-role-type="{{ $structure->role_type }}">
        <div class="card fade-in h-100">
            <div class="card-header bg-transparent border-0 d-flex justify-content-between align-items-center">
                <span class="badge bg-primary">{{ ucfirst(str_replace('_', ' ', $structure->role_type)) }}</span>
                <div class="dropdown">
                    <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                        <i class="fas fa-ellipsis-v"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#" onclick="editStructure({{ $structure->id }})">
                            <i class="fas fa-edit me-2"></i>Edit
                        </a></li>
                        <li><a class="dropdown-item" href="#" onclick="toggleStatus({{ $structure->id }}, {{ $structure->is_active ? 'false' : 'true' }})">
                            <i class="fas fa-{{ $structure->is_active ? 'eye-slash' : 'eye' }} me-2"></i>
                            {{ $structure->is_active ? 'Nonaktifkan' : 'Aktifkan' }}
                        </a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-danger" href="#" onclick="deleteStructure({{ $structure->id }})">
                            <i class="fas fa-trash me-2"></i>Hapus
                        </a></li>
                    </ul>
                </div>
            </div>
            <div class="card-body text-center">
                <div class="avatar-container mb-3">
                    @if($structure->photo_path)
                        <span role="button" class="open-image" data-src="{{ asset($structure->photo_path) }}">
                            <img src="{{ asset($structure->photo_path) }}" alt="{{ $structure->name }}" 
                                 class="rounded-circle" style="width: 100px; height: 100px; object-fit: cover;">
                        </span>
                    @else
                        <i class="fas fa-user fa-3x text-muted"></i>
                    @endif
                </div>
                <h5 class="card-title">{{ $structure->name }}</h5>
                <p class="text-muted mb-2">{{ $structure->position }}</p>
                @if($structure->role_text)
                    <span class="badge bg-secondary mb-2">{{ $structure->role_text }}</span>
                @endif
                @if($structure->info)
                    <p class="text-muted small mb-2">{{ $structure->info }}</p>
                @endif
                <p class="text-muted small mb-0">Periode: {{ $structure->term_period }}</p>
                <div class="mt-2">
                    <span class="badge {{ $structure->is_active ? 'bg-success' : 'bg-danger' }}">
                        {{ $structure->is_active ? 'Aktif' : 'Nonaktif' }}
                    </span>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

<!-- Add Structure Modal -->
<div class="modal fade" id="addStructureModal" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-plus me-2"></i>Tambah Struktur Organisasi
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('admin.organizational-structure.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="position" class="form-label">Jabatan <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="position" name="position" required>
                            </div>
                            <div class="mb-3">
                                <label for="role_type" class="form-label">Kategori <span class="text-danger">*</span></label>
                                <select class="form-select" id="role_type" name="role_type" required>
                                    <option value="">Pilih Kategori</option>
                                    <option value="kepala_desa">Kepala Desa</option>
                                    <option value="perangkat">Perangkat Desa</option>
                                    <option value="bpd">BPD</option>
                                    <option value="lpm">LPM</option>
                                    <option value="dusun">Dusun</option>
                                    <option value="rt">RT</option>
                                    <option value="lainnya">Lainnya</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="role_text" class="form-label">Teks Tambahan</label>
                                <input type="text" class="form-control" id="role_text" name="role_text" 
                                       placeholder="Contoh: RT 1, Dusun 2">
                            </div>
                            <div class="mb-3">
                                <label for="term_period" class="form-label">Periode</label>
                                <input type="text" class="form-control" id="term_period" name="term_period" 
                                       value="2024 - Sekarang">
                            </div>
                            <div class="mb-3">
                                <label for="sort_order" class="form-label">Urutan</label>
                                <input type="number" class="form-control" id="sort_order" name="sort_order" value="0">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="info" class="form-label">Informasi Tambahan</label>
                        <textarea class="form-control" id="info" name="info" rows="3" 
                                  placeholder="Masa jabatan, pendidikan, pengalaman, dll"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="photo" class="form-label">Foto</label>
                        <input type="file" class="form-control" id="photo" name="photo" accept="image/*">
                        <small class="text-muted">Format: JPG, PNG. Maksimal 2MB</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Structure Modal -->
<div class="modal fade" id="editStructureModal" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-edit me-2"></i>Edit Struktur Organisasi
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="editStructureForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <!-- Same form fields as add modal -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="edit_name" class="form-label">Nama <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="edit_name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="edit_position" class="form-label">Jabatan <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="edit_position" name="position" required>
                            </div>
                            <div class="mb-3">
                                <label for="edit_role_type" class="form-label">Kategori <span class="text-danger">*</span></label>
                                <select class="form-select" id="edit_role_type" name="role_type" required>
                                    <option value="">Pilih Kategori</option>
                                    <option value="kepala_desa">Kepala Desa</option>
                                    <option value="perangkat">Perangkat Desa</option>
                                    <option value="bpd">BPD</option>
                                    <option value="lpm">LPM</option>
                                    <option value="dusun">Dusun</option>
                                    <option value="rt">RT</option>
                                    <option value="lainnya">Lainnya</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="edit_role_text" class="form-label">Teks Tambahan</label>
                                <input type="text" class="form-control" id="edit_role_text" name="role_text">
                            </div>
                            <div class="mb-3">
                                <label for="edit_term_period" class="form-label">Periode</label>
                                <input type="text" class="form-control" id="edit_term_period" name="term_period">
                            </div>
                            <div class="mb-3">
                                <label for="edit_sort_order" class="form-label">Urutan</label>
                                <input type="number" class="form-control" id="edit_sort_order" name="sort_order">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="edit_info" class="form-label">Informasi Tambahan</label>
                        <textarea class="form-control" id="edit_info" name="info" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="edit_photo" class="form-label">Foto</label>
                        <input type="file" class="form-control" id="edit_photo" name="photo" accept="image/*">
                        <small class="text-muted">Format: JPG, PNG. Maksimal 2MB</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
.avatar-container {
    width: 100px;
    height: 100px;
    margin: 0 auto;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #f8f9fa;
    border-radius: 50%;
}

.structure-item {
    transition: all 0.3s ease;
}

.structure-item:hover {
    transform: translateY(-5px);
}

.btn-group .btn {
    border-radius: 20px;
    margin-right: 5px;
}

.btn-group .btn.active {
    background-color: var(--bs-primary);
    border-color: var(--bs-primary);
    color: white;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Filter functionality
    const filterBtns = document.querySelectorAll('[data-filter]');
    const structureItems = document.querySelectorAll('.structure-item');
    
    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            // Remove active class from all buttons
            filterBtns.forEach(b => b.classList.remove('active'));
            // Add active class to clicked button
            this.classList.add('active');
            
            const filter = this.getAttribute('data-filter');
            
            structureItems.forEach(item => {
                if (filter === 'all' || item.getAttribute('data-role-type') === filter) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });
});

function editStructure(id) {
    // Fetch structure data and populate edit modal
    fetch(`/admin/organizational-structure/${id}/edit`)
        .then(response => response.json())
        .then(data => {
            document.getElementById('edit_name').value = data.name;
            document.getElementById('edit_position').value = data.position;
            document.getElementById('edit_role_type').value = data.role_type;
            document.getElementById('edit_role_text').value = data.role_text || '';
            document.getElementById('edit_term_period').value = data.term_period;
            document.getElementById('edit_sort_order').value = data.sort_order;
            document.getElementById('edit_info').value = data.info || '';
            
            document.getElementById('editStructureForm').action = `/admin/organizational-structure/${id}`;
            new bootstrap.Modal(document.getElementById('editStructureModal')).show();
        });
}

function toggleStatus(id, status) {
    if (confirm('Apakah Anda yakin ingin mengubah status struktur ini?')) {
        fetch(`/admin/organizational-structure/${id}/toggle-status`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ is_active: status })
        }).then(() => {
            location.reload();
        });
    }
}

function deleteStructure(id) {
    if (confirm('Apakah Anda yakin ingin menghapus struktur ini? Tindakan ini tidak dapat dibatalkan.')) {
        fetch(`/admin/organizational-structure/${id}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            }
        }).then(() => {
            location.reload();
        });
    }
}

// Add click event to all open-image elements
document.querySelectorAll('.open-image').forEach(function(element) {
    element.addEventListener('click', function() {
        const src = this.getAttribute('data-src');
        if (src) {
            // Use the existing adminImagePreviewModal from gallery
            const modal = document.getElementById('adminImagePreviewModal');
            const modalImg = document.getElementById('adminImagePreviewModalImg');
            if (modal && modalImg) {
                modalImg.src = src;
                new bootstrap.Modal(modal).show();
            }
        }
    });
});
</script>

<!-- Image Preview Modal -->
<div class="modal fade" id="organizationalStructureImageModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-md">
    <div class="modal-content" style="background: transparent; border: none;">
      <button type="button" class="btn-close btn-close-white ms-auto me-2 mt-2" data-bs-dismiss="modal" aria-label="Close"></button>
      <img id="organizationalStructureImageModalImg" src="" alt="Preview" style="width:100%; height:auto; border-radius:12px; box-shadow:0 20px 40px rgba(0,0,0,.4);">
    </div>
  </div>
</div>

@endsection
