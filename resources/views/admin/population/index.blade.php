@extends('admin.layouts.app')

@section('title', 'Data Penduduk - Admin Panel')

@section('content')
<!-- Content Header -->
<div class="content-header fade-in">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h2><i class="fas fa-users me-2"></i>Data Penduduk</h2>
            <p class="text-muted mb-0">Kelola data kependudukan desa</p>
        </div>
        <div>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updatePopulationModal">
                <i class="fas fa-edit me-2"></i>Update Data
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

<!-- Statistics Cards -->
<div class="row mb-4">
    <div class="col-lg-3 col-md-6 mb-3">
        <div class="card stat-card slide-in">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="mb-0">{{ number_format($population['total']) }}</h3>
                        <small>Total Penduduk</small>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-users fa-2x text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 mb-3">
        <div class="card stat-card success slide-in">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="mb-0">{{ number_format($population['male']) }}</h3>
                        <small>Laki-laki</small>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-male fa-2x text-success"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 mb-3">
        <div class="card stat-card warning slide-in">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="mb-0">{{ number_format($population['female']) }}</h3>
                        <small>Perempuan</small>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-female fa-2x text-warning"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 mb-3">
        <div class="card stat-card info slide-in">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="mb-0">{{ number_format($population['households']) }}</h3>
                        <small>Total KK</small>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-home fa-2x text-info"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Detailed Statistics -->
<div class="row">
    <div class="col-lg-8 mb-4">
        <div class="card fade-in">
            <div class="card-header bg-transparent border-0">
                <h5 class="mb-0">
                    <i class="fas fa-chart-pie me-2 text-primary"></i>
                    Statistik Penduduk
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="stat-item mb-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="stat-label">Laki-laki</span>
                                <span class="stat-value text-success">{{ number_format($population['male']) }}</span>
                            </div>
                            <div class="progress mt-2" style="height: 8px;">
                                <div class="progress-bar bg-success" style="width: {{ ($population['male'] / $population['total']) * 100 }}%"></div>
                            </div>
                        </div>
                        
                        <div class="stat-item mb-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="stat-label">Perempuan</span>
                                <span class="stat-value text-warning">{{ number_format($population['female']) }}</span>
                            </div>
                            <div class="progress mt-2" style="height: 8px;">
                                <div class="progress-bar bg-warning" style="width: {{ ($population['female'] / $population['total']) * 100 }}%"></div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="stat-item mb-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="stat-label">Petani</span>
                                <span class="stat-value text-primary">{{ number_format($population['farmers']) }}</span>
                            </div>
                            <div class="progress mt-2" style="height: 8px;">
                                <div class="progress-bar bg-primary" style="width: {{ ($population['farmers'] / $population['total']) * 100 }}%"></div>
                            </div>
                        </div>
                        
                        <div class="stat-item mb-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="stat-label">Pedagang</span>
                                <span class="stat-value text-info">{{ number_format($population['traders']) }}</span>
                            </div>
                            <div class="progress mt-2" style="height: 8px;">
                                <div class="progress-bar bg-info" style="width: {{ ($population['traders'] / $population['total']) * 100 }}%"></div>
                            </div>
                        </div>
                        
                        <div class="stat-item mb-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="stat-label">Pelajar</span>
                                <span class="stat-value text-danger">{{ number_format($population['students']) }}</span>
                            </div>
                            <div class="progress mt-2" style="height: 8px;">
                                <div class="progress-bar bg-danger" style="width: {{ ($population['students'] / $population['total']) * 100 }}%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4 mb-4">
        <div class="card fade-in">
            <div class="card-header bg-transparent border-0">
                <h5 class="mb-0">
                    <i class="fas fa-info-circle me-2 text-primary"></i>
                    Informasi Tambahan
                </h5>
            </div>
            <div class="card-body">
                <div class="info-item mb-3">
                    <div class="d-flex justify-content-between">
                        <span class="text-muted">Jumlah RT</span>
                        <strong>{{ $population['rt_count'] }}</strong>
                    </div>
                </div>
                <div class="info-item mb-3">
                    <div class="d-flex justify-content-between">
                        <span class="text-muted">Rata-rata per KK</span>
                        <strong>{{ round($population['total'] / $population['households'], 1) }} orang</strong>
                    </div>
                </div>
                <div class="info-item mb-3">
                    <div class="d-flex justify-content-between">
                        <span class="text-muted">Rasio Gender</span>
                        <strong>{{ round($population['male'] / $population['female'], 2) }}</strong>
                    </div>
                </div>
                <div class="info-item">
                    <div class="d-flex justify-content-between">
                        <span class="text-muted">Persentase Petani</span>
                        <strong>{{ round(($population['farmers'] / $population['total']) * 100, 1) }}%</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Update Population Modal -->
<div class="modal fade" id="updatePopulationModal" tabindex="-1">
            <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-edit me-2"></i>Update Data Penduduk
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('admin.population.update') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="total" class="form-label">Total Penduduk <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="total" name="total" 
                                       value="{{ $population['total'] }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="male" class="form-label">Laki-laki <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="male" name="male" 
                                       value="{{ $population['male'] }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="female" class="form-label">Perempuan <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="female" name="female" 
                                       value="{{ $population['female'] }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="households" class="form-label">Total KK <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="households" name="households" 
                                       value="{{ $population['households'] }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="rt_count" class="form-label">Jumlah RT <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="rt_count" name="rt_count" 
                                       value="{{ $population['rt_count'] }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="farmers" class="form-label">Petani <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="farmers" name="farmers" 
                                       value="{{ $population['farmers'] }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="traders" class="form-label">Pedagang <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="traders" name="traders" 
                                       value="{{ $population['traders'] }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="students" class="form-label">Pelajar <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="students" name="students" 
                                       value="{{ $population['students'] }}" required>
                            </div>
                        </div>
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

<style>
.stat-item {
    padding: 10px 0;
}

.stat-label {
    font-weight: 500;
    color: var(--text-dark);
}

.stat-value {
    font-weight: 700;
    font-size: 1.1rem;
}

.info-item {
    padding: 8px 0;
    border-bottom: 1px solid #f0f0f0;
}

.info-item:last-child {
    border-bottom: none;
}
</style>
@endsection
