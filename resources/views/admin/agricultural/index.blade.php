@extends('admin.layouts.app')

@section('title', 'Data Pertanian - Admin Panel')

@section('content')
<!-- Content Header -->
<div class="content-header fade-in">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h2><i class="fas fa-seedling me-2"></i>Data Pertanian</h2>
            <p class="text-muted mb-0">Kelola data pertanian dan komoditas desa</p>
        </div>
        <div>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateAgriculturalModal">
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
                        <h3 class="mb-0">{{ number_format($agricultural['farmers']) }}</h3>
                        <small>Total Petani</small>
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
                        <h3 class="mb-0">{{ number_format($agricultural['land_area']) }}</h3>
                        <small>Luas Lahan (Ha)</small>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-map fa-2x text-success"></i>
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
                        <h3 class="mb-0">{{ count($agricultural['commodities']) }}</h3>
                        <small>Jenis Komoditas</small>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-seedling fa-2x text-warning"></i>
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
                        <h3 class="mb-0">{{ round($agricultural['land_area'] / $agricultural['farmers'], 2) }}</h3>
                        <small>Rata-rata Lahan/Petani</small>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-calculator fa-2x text-info"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Commodities Overview -->
<div class="row">
    <div class="col-lg-8 mb-4">
        <div class="card fade-in">
            <div class="card-header bg-transparent border-0">
                <h5 class="mb-0">
                    <i class="fas fa-chart-bar me-2 text-primary"></i>
                    Komoditas Pertanian
                </h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Komoditas</th>
                                <th>Luas Lahan (Ha)</th>
                                <th>Jumlah Petani</th>
                                <th>Persentase</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($agricultural['commodities'] as $index => $commodity)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    <strong>{{ $commodity['name'] }}</strong>
                                </td>
                                <td>{{ number_format($commodity['area']) }} Ha</td>
                                <td>{{ number_format($commodity['farmers']) }} orang</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="progress flex-grow-1 me-2" style="height: 8px;">
                                            <div class="progress-bar bg-success" 
                                                 style="width: {{ ($commodity['area'] / $agricultural['land_area']) * 100 }}%"></div>
                                        </div>
                                        <small>{{ round(($commodity['area'] / $agricultural['land_area']) * 100, 1) }}%</small>
                                    </div>
                                </td>
                                <td>
                                    @if($commodity['area'] > 100)
                                        <span class="badge bg-success">Unggulan</span>
                                    @elseif($commodity['area'] > 50)
                                        <span class="badge bg-warning">Menengah</span>
                                    @else
                                        <span class="badge bg-info">Kecil</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4 mb-4">
        <div class="card fade-in">
            <div class="card-header bg-transparent border-0">
                <h5 class="mb-0">
                    <i class="fas fa-chart-pie me-2 text-primary"></i>
                    Distribusi Komoditas
                </h5>
            </div>
            <div class="card-body">
                @foreach($agricultural['commodities'] as $commodity)
                <div class="commodity-item mb-3">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="commodity-name">{{ $commodity['name'] }}</span>
                        <span class="commodity-percentage">{{ round(($commodity['area'] / $agricultural['land_area']) * 100, 1) }}%</span>
                    </div>
                    <div class="progress" style="height: 10px;">
                        <div class="progress-bar" 
                             style="width: {{ ($commodity['area'] / $agricultural['land_area']) * 100 }}%; 
                                    background: {{ $loop->index == 0 ? '#28a745' : ($loop->index == 1 ? '#ffc107' : ($loop->index == 2 ? '#17a2b8' : '#6c757d')) }};">
                        </div>
                    </div>
                    <small class="text-muted">{{ number_format($commodity['area']) }} Ha - {{ number_format($commodity['farmers']) }} petani</small>
                </div>
                @endforeach
            </div>
        </div>
        
        <!-- Agricultural Insights -->
        <div class="card fade-in">
            <div class="card-header bg-transparent border-0">
                <h5 class="mb-0">
                    <i class="fas fa-lightbulb me-2 text-primary"></i>
                    Analisis Pertanian
                </h5>
            </div>
            <div class="card-body">
                <div class="insight-item mb-3">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-trophy text-warning me-2"></i>
                        <div>
                            <strong>Komoditas Unggulan</strong>
                            <br>
                            <small class="text-muted">
                                @php
                                    $topCommodity = collect($agricultural['commodities'])->sortByDesc('area')->first();
                                @endphp
                                {{ $topCommodity['name'] }} ({{ number_format($topCommodity['area']) }} Ha)
                            </small>
                        </div>
                    </div>
                </div>
                
                <div class="insight-item mb-3">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-users text-info me-2"></i>
                        <div>
                            <strong>Rata-rata Petani</strong>
                            <br>
                            <small class="text-muted">{{ round(array_sum(array_column($agricultural['commodities'], 'farmers')) / count($agricultural['commodities'])) }} per komoditas</small>
                        </div>
                    </div>
                </div>
                
                <div class="insight-item">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-chart-line text-success me-2"></i>
                        <div>
                            <strong>Produktivitas</strong>
                            <br>
                            <small class="text-muted">{{ round($agricultural['land_area'] / $agricultural['farmers'], 2) }} Ha per petani</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Update Agricultural Modal -->
<div class="modal fade" id="updateAgriculturalModal" tabindex="-1">
            <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-edit me-2"></i>Update Data Pertanian
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('admin.agricultural.update') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="farmers" class="form-label">Total Petani <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="farmers" name="farmers" 
                                       value="{{ $agricultural['farmers'] }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="land_area" class="form-label">Total Luas Lahan (Ha) <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="land_area" name="land_area" 
                                       value="{{ $agricultural['land_area'] }}" required>
                            </div>
                        </div>
                    </div>
                    
                    <hr>
                    
                    <h6 class="mb-3">Data Komoditas</h6>
                    <div class="row">
                        @foreach($agricultural['commodities'] as $index => $commodity)
                        <div class="col-md-6 mb-3">
                            <div class="card">
                                <div class="card-header">
                                    <h6 class="mb-0">{{ $commodity['name'] }}</h6>
                                </div>
                                <div class="card-body">
                                    <div class="mb-2">
                                        <label class="form-label">Luas Lahan (Ha)</label>
                                        <input type="number" class="form-control" 
                                               name="commodities[{{ $index }}][area]" 
                                               value="{{ $commodity['area'] }}">
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label">Jumlah Petani</label>
                                        <input type="number" class="form-control" 
                                               name="commodities[{{ $index }}][farmers]" 
                                               value="{{ $commodity['farmers'] }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
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
.commodity-item {
    padding: 10px 0;
}

.commodity-name {
    font-weight: 600;
    color: var(--text-dark);
}

.commodity-percentage {
    font-weight: 700;
    color: var(--primary-green);
}

.insight-item {
    padding: 15px;
    border-radius: 10px;
    background: linear-gradient(135deg, #f8f9fa, #ffffff);
    border: 1px solid #e9ecef;
    transition: all 0.3s ease;
}

.insight-item:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.insight-item i {
    font-size: 1.2rem;
}
</style>
@endsection
