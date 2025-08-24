@extends('admin.layouts.app')

@section('title', 'Pengaturan - Admin Panel')

@section('content')
<!-- Content Header -->
<div class="content-header fade-in">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h2><i class="fas fa-cog me-2"></i>Pengaturan Website</h2>
            <p class="text-muted mb-0">Kelola pengaturan umum website desa</p>
        </div>
        <div>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateSettingsModal">
                <i class="fas fa-edit me-2"></i>Update Pengaturan
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

<!-- Current Settings Display -->
<div class="row">
    <div class="col-lg-6 mb-4">
        <div class="card fade-in">
            <div class="card-header bg-transparent border-0">
                <h5 class="mb-0">
                    <i class="fas fa-info-circle me-2 text-primary"></i>
                    Informasi Desa
                </h5>
            </div>
            <div class="card-body">
                <div class="setting-item mb-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-muted">Nama Desa</span>
                        <strong>{{ $settings['village_name'] }}</strong>
                    </div>
                </div>
                <div class="setting-item mb-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-muted">Kepala Desa</span>
                        <strong>{{ $settings['village_head'] }}</strong>
                    </div>
                </div>
                <div class="setting-item mb-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-muted">Masa Jabatan</span>
                        <strong>{{ $settings['term_period'] }}</strong>
                    </div>
                </div>
                <div class="setting-item mb-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-muted">Luas Wilayah</span>
                        <strong>{{ $settings['area'] }}</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-6 mb-4">
        <div class="card fade-in">
            <div class="card-header bg-transparent border-0">
                <h5 class="mb-0">
                    <i class="fas fa-map-marked-alt me-2 text-primary"></i>
                    Lokasi Administratif
                </h5>
            </div>
            <div class="card-body">
                <div class="setting-item mb-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-muted">Kecamatan</span>
                        <strong>{{ $settings['district'] }}</strong>
                    </div>
                </div>
                <div class="setting-item mb-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-muted">Kabupaten</span>
                        <strong>{{ $settings['regency'] }}</strong>
                    </div>
                </div>
                <div class="setting-item mb-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-muted">Provinsi</span>
                        <strong>{{ $settings['province'] }}</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Boundary Information -->
<div class="row">
    <div class="col-12 mb-4">
        <div class="card fade-in">
            <div class="card-header bg-transparent border-0">
                <h5 class="mb-0">
                    <i class="fas fa-compass me-2 text-primary"></i>
                    Batas Wilayah
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <div class="boundary-item text-center">
                            <div class="boundary-icon north">
                                <i class="fas fa-arrow-up"></i>
                            </div>
                            <h6 class="mt-2">Utara</h6>
                            <p class="text-muted mb-0">{{ $settings['north_boundary'] }}</p>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="boundary-item text-center">
                            <div class="boundary-icon east">
                                <i class="fas fa-arrow-right"></i>
                            </div>
                            <h6 class="mt-2">Timur</h6>
                            <p class="text-muted mb-0">{{ $settings['east_boundary'] }}</p>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="boundary-item text-center">
                            <div class="boundary-icon south">
                                <i class="fas fa-arrow-down"></i>
                            </div>
                            <h6 class="mt-2">Selatan</h6>
                            <p class="text-muted mb-0">{{ $settings['south_boundary'] }}</p>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="boundary-item text-center">
                            <div class="boundary-icon west">
                                <i class="fas fa-arrow-left"></i>
                            </div>
                            <h6 class="mt-2">Barat</h6>
                            <p class="text-muted mb-0">{{ $settings['west_boundary'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Website Settings -->
<div class="row">
    <div class="col-lg-6 mb-4">
        <div class="card fade-in">
            <div class="card-header bg-transparent border-0">
                <h5 class="mb-0">
                    <i class="fas fa-globe me-2 text-primary"></i>
                    Pengaturan Website
                </h5>
            </div>
            <div class="card-body">
                <div class="setting-item mb-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-muted">Status Website</span>
                        <span class="badge bg-success">Aktif</span>
                    </div>
                </div>
                <div class="setting-item mb-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-muted">Versi Website</span>
                        <strong>v1.0.0</strong>
                    </div>
                </div>
                <div class="setting-item mb-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-muted">Terakhir Update</span>
                        <strong>{{ date('d/m/Y H:i') }}</strong>
                    </div>
                </div>
                <div class="setting-item">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-muted">Maintenance Mode</span>
                        <span class="badge bg-secondary">Nonaktif</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-6 mb-4">
        <div class="card fade-in">
            <div class="card-header bg-transparent border-0">
                <h5 class="mb-0">
                    <i class="fas fa-database me-2 text-primary"></i>
                    Informasi Sistem
                </h5>
            </div>
            <div class="card-body">
                <div class="setting-item mb-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-muted">Framework</span>
                        <strong>Laravel {{ app()->version() }}</strong>
                    </div>
                </div>
                <div class="setting-item mb-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-muted">PHP Version</span>
                        <strong>{{ phpversion() }}</strong>
                    </div>
                </div>
                <div class="setting-item mb-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-muted">Database</span>
                        <strong>MySQL</strong>
                    </div>
                </div>
                <div class="setting-item">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-muted">Environment</span>
                        <span class="badge bg-info">{{ config('app.env') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Update Settings Modal -->
<div class="modal fade" id="updateSettingsModal" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-edit me-2"></i>Update Pengaturan
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('admin.settings.update') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="mb-3">Informasi Desa</h6>
                            <div class="mb-3">
                                <label for="village_name" class="form-label">Nama Desa <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="village_name" name="village_name" 
                                       value="{{ $settings['village_name'] }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="village_head" class="form-label">Kepala Desa <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="village_head" name="village_head" 
                                       value="{{ $settings['village_head'] }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="term_period" class="form-label">Masa Jabatan <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="term_period" name="term_period" 
                                       value="{{ $settings['term_period'] }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="area" class="form-label">Luas Wilayah <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="area" name="area" 
                                       value="{{ $settings['area'] }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h6 class="mb-3">Lokasi Administratif</h6>
                            <div class="mb-3">
                                <label for="district" class="form-label">Kecamatan <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="district" name="district" 
                                       value="{{ $settings['district'] }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="regency" class="form-label">Kabupaten <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="regency" name="regency" 
                                       value="{{ $settings['regency'] }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="province" class="form-label">Provinsi <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="province" name="province" 
                                       value="{{ $settings['province'] }}" required>
                            </div>
                        </div>
                    </div>
                    
                    <hr>
                    
                    <div class="row">
                        <div class="col-12">
                            <h6 class="mb-3">Batas Wilayah</h6>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="north_boundary" class="form-label">Utara <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="north_boundary" name="north_boundary" 
                                       value="{{ $settings['north_boundary'] }}" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="east_boundary" class="form-label">Timur <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="east_boundary" name="east_boundary" 
                                       value="{{ $settings['east_boundary'] }}" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="south_boundary" class="form-label">Selatan <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="south_boundary" name="south_boundary" 
                                       value="{{ $settings['south_boundary'] }}" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="west_boundary" class="form-label">Barat <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="west_boundary" name="west_boundary" 
                                       value="{{ $settings['west_boundary'] }}" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Simpan Pengaturan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
.setting-item {
    padding: 12px 0;
    border-bottom: 1px solid #f0f0f0;
}

.setting-item:last-child {
    border-bottom: none;
}

.boundary-item {
    padding: 20px;
    border-radius: 10px;
    background: linear-gradient(135deg, #f8f9fa, #ffffff);
    border: 1px solid #e9ecef;
    transition: all 0.3s ease;
}

.boundary-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
}

.boundary-icon {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
    font-size: 1.5rem;
    color: white;
}

.boundary-icon.north {
    background: linear-gradient(135deg, #dc3545, #c82333);
}

.boundary-icon.east {
    background: linear-gradient(135deg, #007bff, #0056b3);
}

.boundary-icon.south {
    background: linear-gradient(135deg, #28a745, #1e7e34);
}

.boundary-icon.west {
    background: linear-gradient(135deg, #ffc107, #e0a800);
}
</style>
@endsection
