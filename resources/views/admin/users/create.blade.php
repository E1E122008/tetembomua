@extends('admin.layouts.app')

@section('title', 'Tambah User - Admin Panel')

@section('content')
<!-- Content Header -->
<div class="content-header fade-in">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h2><i class="fas fa-user-plus me-2"></i>Tambah User</h2>
            <p class="text-muted mb-0">Buat user baru untuk admin panel</p>
        </div>
        <div>
            <a href="{{ route('admin.users') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-2"></i>Kembali
            </a>
        </div>
    </div>
</div>

<!-- Breadcrumb -->
<nav aria-label="breadcrumb" class="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.users') }}">Manajemen User</a></li>
        <li class="breadcrumb-item active">Tambah User</li>
    </ol>
</nav>

<!-- Form Card -->
<div class="row">
    <div class="col-lg-8">
        <div class="card fade-in">
            <div class="card-header bg-transparent border-0">
                <h5 class="mb-0">
                    <i class="fas fa-edit me-2 text-primary"></i>
                    Form Tambah User
                </h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.users.store') }}" method="POST">
                    @csrf
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                       id="name" name="name" value="{{ old('name') }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                       id="email" name="email" value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                           id="password" name="password" required>
                                    <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="text-muted">Minimal 8 karakter</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Konfirmasi Password <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="password" class="form-control" 
                                           id="password_confirmation" name="password_confirmation" required>
                                    <button class="btn btn-outline-secondary" type="button" id="toggleConfirmPassword">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="role" class="form-label">Role <span class="text-danger">*</span></label>
                                <select class="form-select @error('role') is-invalid @enderror" id="role" name="role" required>
                                    <option value="">Pilih Role</option>
                                    <option value="Super Admin" {{ old('role') == 'Super Admin' ? 'selected' : '' }}>Super Admin</option>
                                    <option value="Operator" {{ old('role') == 'Operator' ? 'selected' : '' }}>Operator</option>
                                </select>
                                @error('role')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                                <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                                    <option value="">Pilih Status</option>
                                    <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Aktif</option>
                                    <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Nonaktif</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="notes" class="form-label">Catatan</label>
                        <textarea class="form-control @error('notes') is-invalid @enderror" 
                                  id="notes" name="notes" rows="3" placeholder="Catatan tambahan tentang user ini...">{{ old('notes') }}</textarea>
                        @error('notes')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Action Buttons -->
                    <div class="row mt-4">
                        <div class="col-12">
                            <hr>
                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('admin.users') }}" class="btn btn-outline-secondary">
                                    <i class="fas fa-times me-2"></i>Batal
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-2"></i>Simpan User
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <!-- Role Information -->
        <div class="card fade-in mb-4">
            <div class="card-header bg-transparent border-0">
                <h5 class="mb-0">
                    <i class="fas fa-info-circle me-2 text-primary"></i>
                    Informasi Role
                </h5>
            </div>
            <div class="card-body">
                <div class="role-info mb-3">
                    <div class="d-flex align-items-center mb-2">
                        <span class="badge bg-danger me-2">Super Admin</span>
                        <strong>Administrator Utama</strong>
                    </div>
                    <ul class="list-unstyled small text-muted">
                        <li><i class="fas fa-check text-success me-1"></i>Semua fitur admin</li>
                        <li><i class="fas fa-check text-success me-1"></i>Manajemen user</li>
                        <li><i class="fas fa-check text-success me-1"></i>Pengaturan sistem</li>
                        <li><i class="fas fa-check text-success me-1"></i>Backup & restore</li>
                    </ul>
                </div>
                
                <div class="role-info">
                    <div class="d-flex align-items-center mb-2">
                        <span class="badge bg-warning me-2">Operator</span>
                        <strong>Operator</strong>
                    </div>
                    <ul class="list-unstyled small text-muted">
                        <li><i class="fas fa-check text-success me-1"></i>Kelola konten</li>
                        <li><i class="fas fa-check text-success me-1"></i>Upload media</li>
                        <li><i class="fas fa-check text-success me-1"></i>Update data</li>
                        <li><i class="fas fa-times text-danger me-1"></i>Manajemen user</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Password Requirements -->
        <div class="card fade-in">
            <div class="card-header bg-transparent border-0">
                <h5 class="mb-0">
                    <i class="fas fa-shield-alt me-2 text-primary"></i>
                    Persyaratan Password
                </h5>
            </div>
            <div class="card-body">
                <ul class="list-unstyled small">
                    <li class="mb-2">
                        <i class="fas fa-circle text-muted me-2"></i>
                        Minimal 8 karakter
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-circle text-muted me-2"></i>
                        Kombinasi huruf besar & kecil
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-circle text-muted me-2"></i>
                        Minimal 1 angka
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-circle text-muted me-2"></i>
                        Minimal 1 karakter khusus
                    </li>
                    <li>
                        <i class="fas fa-circle text-muted me-2"></i>
                        Tidak boleh sama dengan email
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<style>
.role-info {
    padding: 15px;
    border-radius: 10px;
    background: linear-gradient(135deg, #f8f9fa, #ffffff);
    border: 1px solid #e9ecef;
    margin-bottom: 15px;
}

.role-info:last-child {
    margin-bottom: 0;
}

.role-info ul li {
    padding: 2px 0;
}
</style>

<script>
// Password toggle functionality
document.getElementById('togglePassword').addEventListener('click', function() {
    const passwordField = document.getElementById('password');
    const icon = this.querySelector('i');
    
    if (passwordField.type === 'password') {
        passwordField.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        passwordField.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }
});

document.getElementById('toggleConfirmPassword').addEventListener('click', function() {
    const passwordField = document.getElementById('password_confirmation');
    const icon = this.querySelector('i');
    
    if (passwordField.type === 'password') {
        passwordField.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        passwordField.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }
});

// Password strength validation
document.getElementById('password').addEventListener('input', function() {
    const password = this.value;
    const requirements = document.querySelectorAll('.card-body ul li i');
    
    // Reset all requirements
    requirements.forEach(req => {
        req.className = 'fas fa-circle text-muted me-2';
    });
    
    // Check each requirement
    if (password.length >= 8) {
        requirements[0].className = 'fas fa-check text-success me-2';
    }
    
    if (/[a-z]/.test(password) && /[A-Z]/.test(password)) {
        requirements[1].className = 'fas fa-check text-success me-2';
    }
    
    if (/\d/.test(password)) {
        requirements[2].className = 'fas fa-check text-success me-2';
    }
    
    if (/[!@#$%^&*(),.?":{}|<>]/.test(password)) {
        requirements[3].className = 'fas fa-check text-success me-2';
    }
    
    const email = document.getElementById('email').value;
    if (password !== email) {
        requirements[4].className = 'fas fa-check text-success me-2';
    }
});
</script>
@endsection
