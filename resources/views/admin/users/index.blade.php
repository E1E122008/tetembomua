@extends('admin.layouts.app')

@section('title', 'Manajemen User - Admin Panel')

@section('content')
<!-- Content Header -->
<div class="content-header fade-in">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h2><i class="fas fa-user-cog me-2"></i>Manajemen User</h2>
            <p class="text-muted mb-0">Kelola user dan akses admin panel</p>
        </div>
        <div>
            <a href="{{ route('admin.users.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Tambah User
            </a>
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

<!-- Statistics Cards -->
<div class="row mb-4">
    <div class="col-lg-3 col-md-6 mb-3">
        <div class="card stat-card slide-in">
            <div class="card-body text-center">
                <i class="fas fa-users fa-3x text-primary mb-3"></i>
                <h3 class="mb-0">{{ count($users) }}</h3>
                <small>Total User</small>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 mb-3">
        <div class="card stat-card success slide-in">
            <div class="card-body text-center">
                <i class="fas fa-user-shield fa-3x text-success mb-3"></i>
                <h3 class="mb-0">{{ count(array_filter($users, fn($user) => $user['role'] == 'Super Admin')) }}</h3>
                <small>Super Admin</small>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 mb-3">
        <div class="card stat-card warning slide-in">
            <div class="card-body text-center">
                <i class="fas fa-user-tie fa-3x text-warning mb-3"></i>
                <h3 class="mb-0">{{ count(array_filter($users, fn($user) => $user['role'] == 'Operator')) }}</h3>
                <small>Operator</small>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 mb-3">
        <div class="card stat-card info slide-in">
            <div class="card-body text-center">
                <i class="fas fa-check-circle fa-3x text-info mb-3"></i>
                <h3 class="mb-0">{{ count(array_filter($users, fn($user) => $user['status'] == 'active')) }}</h3>
                <small>User Aktif</small>
            </div>
        </div>
    </div>
</div>

<!-- Users Table -->
<div class="card fade-in">
    <div class="card-header bg-transparent border-0">
        <h5 class="mb-0">
            <i class="fas fa-list me-2 text-primary"></i>
            Daftar User
        </h5>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Tanggal Dibuat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $index => $user)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="avatar me-3">
                                    <i class="fas fa-user-circle fa-2x text-primary"></i>
                                </div>
                                <div>
                                    <strong>{{ $user['name'] }}</strong>
                                    @if($user['role'] == 'Super Admin')
                                        <br><small class="text-muted">Administrator Utama</small>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td>{{ $user['email'] }}</td>
                        <td>
                            @if($user['role'] == 'Super Admin')
                                <span class="badge bg-danger">{{ $user['role'] }}</span>
                            @else
                                <span class="badge bg-warning">{{ $user['role'] }}</span>
                            @endif
                        </td>
                        <td>
                            @if($user['status'] == 'active')
                                <span class="badge bg-success">Aktif</span>
                            @else
                                <span class="badge bg-secondary">Nonaktif</span>
                            @endif
                        </td>
                        <td>{{ date('d/m/Y', strtotime($user['created_at'])) }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-sm btn-outline-primary" 
                                        data-bs-toggle="modal" data-bs-target="#editUserModal{{ $user['id'] }}">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-outline-info" 
                                        data-bs-toggle="modal" data-bs-target="#viewUserModal{{ $user['id'] }}">
                                    <i class="fas fa-eye"></i>
                                </button>
                                @if($user['role'] != 'Super Admin')
                                <button type="button" class="btn btn-sm btn-outline-danger" 
                                        onclick="deleteUser({{ $user['id'] }}, '{{ $user['name'] }}')">
                                    <i class="fas fa-trash"></i>
                                </button>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- User Detail Modals -->
@foreach($users as $user)
<!-- View User Modal -->
<div class="modal fade" id="viewUserModal{{ $user['id'] }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-user me-2"></i>Detail User
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="text-center mb-4">
                    <i class="fas fa-user-circle fa-5x text-primary mb-3"></i>
                    <h4>{{ $user['name'] }}</h4>
                    <p class="text-muted">{{ $user['email'] }}</p>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="info-item mb-3">
                            <label class="text-muted">Role</label>
                            <div>
                                @if($user['role'] == 'Super Admin')
                                    <span class="badge bg-danger">{{ $user['role'] }}</span>
                                @else
                                    <span class="badge bg-warning">{{ $user['role'] }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-item mb-3">
                            <label class="text-muted">Status</label>
                            <div>
                                @if($user['status'] == 'active')
                                    <span class="badge bg-success">Aktif</span>
                                @else
                                    <span class="badge bg-secondary">Nonaktif</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="info-item mb-3">
                    <label class="text-muted">Tanggal Dibuat</label>
                    <div>{{ date('d F Y H:i', strtotime($user['created_at'])) }}</div>
                </div>
                
                <div class="info-item">
                    <label class="text-muted">Hak Akses</label>
                    <div>
                        @if($user['role'] == 'Super Admin')
                            <ul class="list-unstyled mb-0">
                                <li><i class="fas fa-check text-success me-2"></i>Semua fitur admin</li>
                                <li><i class="fas fa-check text-success me-2"></i>Manajemen user</li>
                                <li><i class="fas fa-check text-success me-2"></i>Pengaturan sistem</li>
                            </ul>
                        @else
                            <ul class="list-unstyled mb-0">
                                <li><i class="fas fa-check text-success me-2"></i>Kelola konten</li>
                                <li><i class="fas fa-check text-success me-2"></i>Upload media</li>
                                <li><i class="fas fa-times text-danger me-2"></i>Manajemen user</li>
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit User Modal -->
<div class="modal fade" id="editUserModal{{ $user['id'] }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-edit me-2"></i>Edit User
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="#" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name{{ $user['id'] }}" class="form-label">Nama <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="name{{ $user['id'] }}" name="name" 
                               value="{{ $user['name'] }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="email{{ $user['id'] }}" class="form-label">Email <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" id="email{{ $user['id'] }}" name="email" 
                               value="{{ $user['email'] }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="role{{ $user['id'] }}" class="form-label">Role <span class="text-danger">*</span></label>
                        <select class="form-select" id="role{{ $user['id'] }}" name="role" required>
                            <option value="Super Admin" {{ $user['role'] == 'Super Admin' ? 'selected' : '' }}>Super Admin</option>
                            <option value="Operator" {{ $user['role'] == 'Operator' ? 'selected' : '' }}>Operator</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="status{{ $user['id'] }}" class="form-label">Status <span class="text-danger">*</span></label>
                        <select class="form-select" id="status{{ $user['id'] }}" name="status" required>
                            <option value="active" {{ $user['status'] == 'active' ? 'selected' : '' }}>Aktif</option>
                            <option value="inactive" {{ $user['status'] == 'inactive' ? 'selected' : '' }}>Nonaktif</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="password{{ $user['id'] }}" class="form-label">Password Baru</label>
                        <input type="password" class="form-control" id="password{{ $user['id'] }}" name="password" 
                               placeholder="Kosongkan jika tidak ingin mengubah password">
                        <small class="text-muted">Minimal 8 karakter</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteUserModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-exclamation-triangle me-2 text-danger"></i>Konfirmasi Hapus
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus user <strong id="deleteUserName"></strong>?</p>
                <p class="text-muted">Tindakan ini tidak dapat dibatalkan dan user tidak akan dapat mengakses admin panel lagi.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <form id="deleteUserForm" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash me-2"></i>Hapus User
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
.avatar {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, var(--primary-green), var(--secondary-green));
    color: white;
}

.info-item {
    padding: 10px 0;
}

.info-item label {
    font-weight: 600;
    margin-bottom: 5px;
    display: block;
}

.info-item ul li {
    padding: 2px 0;
}
</style>

<script>
function deleteUser(userId, userName) {
    document.getElementById('deleteUserName').textContent = userName;
    document.getElementById('deleteUserForm').action = `/admin/users/${userId}`;
    new bootstrap.Modal(document.getElementById('deleteUserModal')).show();
}
</script>
@endsection
