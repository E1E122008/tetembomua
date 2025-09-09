@extends('admin.layouts.app')

@section('title', 'Data Penduduk')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">
                        <i class="fas fa-users"></i> Data Penduduk
                    </h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-success btn-sm" onclick="addNewPenduduk()">
                            <i class="fas fa-plus"></i> Tambah Penduduk
                        </button>
                        <a href="{{ route('admin.penduduk.export', request()->query()) }}" class="btn btn-info btn-sm">
                            <i class="fas fa-download"></i> Export CSV
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <!-- Navigation Tabs -->
                    <ul class="nav nav-tabs mb-4" id="pendudukTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="data-tab" data-bs-toggle="tab" data-bs-target="#data" type="button" role="tab">
                                <i class="fas fa-list"></i> Data Penduduk
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="statistik-tab" data-bs-toggle="tab" data-bs-target="#statistik" type="button" role="tab">
                                <i class="fas fa-chart-bar"></i> Statistik
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="mata-pencaharian-tab" data-bs-toggle="tab" data-bs-target="#mata-pencaharian" type="button" role="tab">
                                <i class="fas fa-briefcase"></i> Mata Pencaharian
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="umkm-tab" data-bs-toggle="tab" data-bs-target="#umkm" type="button" role="tab">
                                <i class="fas fa-store"></i> UMKM
                            </button>
                        </li>
                    </ul>

                    <!-- Tab Content -->
                    <div class="tab-content" id="pendudukTabsContent">
                        <!-- Data Penduduk Tab -->
                        <div class="tab-pane fade show active" id="data" role="tabpanel">
                            <!-- Filter Form -->
                            <form method="GET" action="{{ route('penduduk.index') }}" class="mb-4">
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <label for="dusun_id" class="form-label">Filter Dusun:</label>
                                        <select name="dusun_id" id="dusun_id" class="form-select">
                                            <option value="">-- Semua Dusun --</option>
                                            @foreach($dusunList as $dusun)
                                                <option value="{{ $dusun->id }}" {{ $dusunId == $dusun->id ? 'selected' : '' }}>
                                                    {{ $dusun->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="search" class="form-label">Cari:</label>
                                        <input type="text" name="search" id="search" class="form-control" 
                                               placeholder="Nama, NIK, atau No KK..." value="{{ $search }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">&nbsp;</label>
                                        <div class="d-flex gap-2">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fas fa-search"></i> Filter
                                            </button>
                                            <a href="{{ route('penduduk.index') }}" class="btn btn-secondary">
                                                <i class="fas fa-times"></i> Reset
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </form>

                    <!-- Data Table -->
            <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NIK</th>
                            <th>No KK</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Hubungan KK</th>
                                    <th>Dusun</th>
                            <th>Usia</th>
                                    <th>Status</th>
                                    <th width="120">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($penduduk as $index => $p)
                        <tr>
                                        <td>{{ $penduduk->firstItem() + $index }}</td>
                            <td>
                                <strong>{{ $p->nama }}</strong>
                                            @if($p->status_bantuan)
                                                <span class="badge bg-warning text-dark ms-1">Bantuan</span>
                                            @endif
                            </td>
                            <td>{{ $p->nik }}</td>
                            <td>{{ $p->no_kk }}</td>
                            <td>
                                            <span class="badge {{ $p->jenis_kelamin == 'L' ? 'bg-primary' : 'bg-pink' }}">
                                                {{ $p->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
                                            </span>
                            </td>
                                        <td>{{ $p->hubungan_kepala_keluarga }}</td>
                                        <td>
                                            @if($p->kartuKeluarga && $p->kartuKeluarga->dusun)
                                                <span class="badge bg-info">{{ $p->kartuKeluarga->dusun->nama }}</span>
                                            @else
                                                <span class="text-muted">-</span>
                                @endif
                            </td>
                                        <td>{{ $p->usia }} tahun</td>
                                        <td>
                                            <span class="badge bg-secondary">{{ $p->status_perkawinan }}</span>
                            </td>
                            <td>
                                            <div class="btn-group" role="group">
                                                <button type="button" class="btn btn-info btn-sm" 
                                                        onclick="showDetail({{ $p->id }})" title="Lihat Detail">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <button type="button" class="btn btn-warning btn-sm" 
                                                        onclick="editRow({{ $p->id }})" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button type="button" class="btn btn-danger btn-sm" 
                                                        onclick="confirmDelete({{ $p->id }}, '{{ $p->nama }}')" title="Hapus">
                                                    <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10" class="text-center py-4">
                                <div class="text-muted">
                                                <i class="fas fa-users fa-3x mb-3"></i>
                                                <p>Tidak ada data penduduk ditemukan.</p>
                                                <button type="button" class="btn btn-success" onclick="addNewPenduduk()">
                                        <i class="fas fa-plus"></i> Tambah Data Pertama
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
                    @if($penduduk->hasPages())
            <div class="d-flex justify-content-center mt-4">
                            {{ $penduduk->appends(request()->query())->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Detail Modal -->
<div class="modal fade" id="detailModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Data Penduduk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="detailContent">
                <!-- Content will be loaded here -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- Create Modal -->
<div class="modal fade" id="createModal" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Penduduk Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="createForm" method="POST" action="{{ route('penduduk.store') }}">
                @csrf
                <div class="modal-body" id="createContent">
                    <!-- Content will be loaded here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data Penduduk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="editForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body" id="editContent">
                    <!-- Content will be loaded here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Simpan Perubahan</button>
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
                <h5 class="modal-title">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus data penduduk <strong id="deleteName"></strong>?</p>
                <p class="text-danger"><small>Tindakan ini tidak dapat dibatalkan.</small></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <form id="deleteForm" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function confirmDelete(id, name) {
    document.getElementById('deleteName').textContent = name;
    document.getElementById('deleteForm').action = '{{ route("penduduk.destroy", ":id") }}'.replace(':id', id);
    new bootstrap.Modal(document.getElementById('deleteModal')).show();
}

function showDetail(id) {
    // Show loading
    document.getElementById('detailContent').innerHTML = '<div class="text-center"><i class="fas fa-spinner fa-spin"></i> Memuat data...</div>';
    new bootstrap.Modal(document.getElementById('detailModal')).show();
    
    // Load detail via AJAX
    fetch(`/admin/penduduk/${id}`)
        .then(response => response.text())
        .then(html => {
            // Extract only the content from the show view
            const parser = new DOMParser();
            const doc = parser.parseFromString(html, 'text/html');
            const content = doc.querySelector('.card-body');
            document.getElementById('detailContent').innerHTML = content ? content.innerHTML : '<p>Data tidak ditemukan</p>';
        })
        .catch(error => {
            document.getElementById('detailContent').innerHTML = '<p class="text-danger">Error memuat data: ' + error.message + '</p>';
        });
}

function addNewPenduduk() {
    // Show loading
    document.getElementById('createContent').innerHTML = '<div class="text-center"><i class="fas fa-spinner fa-spin"></i> Memuat form...</div>';
    new bootstrap.Modal(document.getElementById('createModal')).show();
    
    // Load create form via AJAX
    fetch('/admin/penduduk/create')
        .then(response => response.text())
        .then(html => {
            // Extract only the form content from the create view
            const parser = new DOMParser();
            const doc = parser.parseFromString(html, 'text/html');
            const formContent = doc.querySelector('.card-body');
            document.getElementById('createContent').innerHTML = formContent ? formContent.innerHTML : '<p>Form tidak ditemukan</p>';
        })
        .catch(error => {
            document.getElementById('createContent').innerHTML = '<p class="text-danger">Error memuat form: ' + error.message + '</p>';
        });
}

function editRow(id) {
    // Show loading
    document.getElementById('editContent').innerHTML = '<div class="text-center"><i class="fas fa-spinner fa-spin"></i> Memuat form edit...</div>';
    new bootstrap.Modal(document.getElementById('editModal')).show();
    
    // Load edit form via AJAX
    fetch(`/admin/penduduk/${id}/edit`)
        .then(response => response.text())
        .then(html => {
            // Extract only the form content from the edit view
            const parser = new DOMParser();
            const doc = parser.parseFromString(html, 'text/html');
            const formContent = doc.querySelector('.card-body');
            document.getElementById('editContent').innerHTML = formContent ? formContent.innerHTML : '<p>Form tidak ditemukan</p>';
            
            // Set form action
            document.getElementById('editForm').action = `/admin/penduduk/${id}`;
        })
        .catch(error => {
            document.getElementById('editContent').innerHTML = '<p class="text-danger">Error memuat form: ' + error.message + '</p>';
        });
}

// Handle create form submission
document.getElementById('createForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    const url = this.action;
    
    // Show loading
    const submitBtn = this.querySelector('button[type="submit"]');
    const originalText = submitBtn.innerHTML;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Menyimpan...';
    submitBtn.disabled = true;
    
    fetch(url, {
        method: 'POST',
        body: formData,
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(response => {
        if (response.ok) {
            // Close modal and reload page
            bootstrap.Modal.getInstance(document.getElementById('createModal')).hide();
                location.reload();
        } else {
            throw new Error('Error menyimpan data');
        }
    })
    .catch(error => {
        alert('Error: ' + error.message);
        submitBtn.innerHTML = originalText;
        submitBtn.disabled = false;
    });
});

// Handle edit form submission
document.getElementById('editForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    const url = this.action;
    
    // Show loading
    const submitBtn = this.querySelector('button[type="submit"]');
    const originalText = submitBtn.innerHTML;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Menyimpan...';
    submitBtn.disabled = true;
    
    fetch(url, {
        method: 'POST',
        body: formData,
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(response => {
        if (response.ok) {
            // Close modal and reload page
            bootstrap.Modal.getInstance(document.getElementById('editModal')).hide();
            location.reload();
        } else {
            throw new Error('Error menyimpan data');
        }
    })
    .catch(error => {
        alert('Error: ' + error.message);
        submitBtn.innerHTML = originalText;
        submitBtn.disabled = false;
    });
});

// Auto-submit filter form when dusun changes
document.getElementById('dusun_id').addEventListener('change', function() {
    this.form.submit();
});
</script>
@endpush

@push('styles')
<style>
.bg-pink {
    background-color: #e91e63 !important;
    color: white !important;
}

.table th {
    background-color: #343a40;
    color: white;
    border-color: #454d55;
}

.btn-group .btn {
    margin-right: 2px;
}

.btn-group .btn:last-child {
    margin-right: 0;
}

.card-header {
    background-color: #f8f9fa;
    border-bottom: 1px solid #dee2e6;
}

.badge {
    font-size: 0.75em;
}
</style>
@endpush