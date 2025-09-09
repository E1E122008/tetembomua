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
                <i class="fas fa-plus me-2"></i>Tambah Komoditas
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
        <div class="card stat-card primary slide-in">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="mb-0" id="totalFarmersText">{{ number_format($agricultural['farmers']) }}</h3>
                        <small class="text-muted">Total Petani</small>
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
                        <h3 class="mb-0" id="totalLandAreaText">{{ number_format($agricultural['land_area']) }}</h3>
                        <small class="text-muted">Luas Lahan (Ha)</small>
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
                        <small class="text-muted">Komoditas Utama</small>
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
                        <h3 class="mb-0" id="avgLandPerFarmerText">{{ round($agricultural['land_area'] / max($agricultural['farmers'],1), 2) }}</h3>
                        <small class="text-muted">Ha per Petani</small>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-calculator fa-2x text-info"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Additional Statistics Row -->
<div class="row mb-4">
    <div class="col-lg-4 col-md-6 mb-3">
        <div class="card stat-card secondary slide-in">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="mb-0">{{ count($agricultural['horticultures'] ?? []) }}</h3>
                        <small class="text-muted">Holtikultura</small>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-leaf fa-2x text-success"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 mb-3">
        <div class="card stat-card danger slide-in">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="mb-0">{{ count($agricultural['fruits'] ?? []) }}</h3>
                        <small class="text-muted">Buah-buahan</small>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-apple-alt fa-2x text-danger"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 mb-3">
        <div class="card stat-card dark slide-in">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="mb-0">{{ count($agricultural['commodities']) + count($agricultural['horticultures'] ?? []) + count($agricultural['fruits'] ?? []) }}</h3>
                        <small class="text-muted">Total Komoditas</small>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-chart-pie fa-2x text-dark"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-12 mb-4">
    <!-- Agricultural Insights -->
    <div class="card fade-in">
        <div class="card-header bg-transparent border-0">
            <h5 class="mb-0">
                <i class="fas fa-lightbulb me-2 text-primary"></i>
                Analisis Pertanian
            </h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="insight-item mb-3">
                        <div class="text-center">
                            <i class="fas fa-trophy text-warning mb-2"></i>
                            <h6 class="mb-1">Komoditas Unggulan</h6>
                            <small class="text-muted">
                                @php
                                    $topCommodity = collect($agricultural['commodities'])->sortByDesc('area')->first();
                                @endphp
                                {{ $topCommodity['name'] ?? 'Belum ada data' }}
                            </small>
                            <br>
                            <strong class="text-primary">{{ number_format($topCommodity['area'] ?? 0) }} Ha</strong>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="insight-item mb-3">
                        <div class="text-center">
                            <i class="fas fa-users text-info mb-2"></i>
                            <h6 class="mb-1">Rata-rata Petani</h6>
                            <small class="text-muted">per komoditas</small>
                            <br>
                            <strong class="text-primary">{{ count($agricultural['commodities']) > 0 ? round(array_sum(array_column($agricultural['commodities'], 'farmers')) / count($agricultural['commodities'])) : 0 }} orang</strong>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="insight-item mb-3">
                        <div class="text-center">
                            <i class="fas fa-chart-line text-success mb-2"></i>
                            <h6 class="mb-1">Produktivitas</h6>
                            <small class="text-muted">lahan per petani</small>
                            <br>
                            <strong class="text-primary">{{ round($agricultural['land_area'] / max($agricultural['farmers'], 1), 2) }} Ha</strong>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="insight-item mb-3">
                        <div class="text-center">
                            <i class="fas fa-seedling text-warning mb-2"></i>
                            <h6 class="mb-1">Total Komoditas</h6>
                            <small class="text-muted">semua kategori</small>
                            <br>
                            <strong class="text-primary">{{ count($agricultural['commodities']) + count($agricultural['horticultures'] ?? []) + count($agricultural['fruits'] ?? []) }} jenis</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Additional Data Tables Row -->
<div class="row">
    <!-- Tabel Holtikultura -->
    <div class="col-lg-6 mb-4">
        <div class="card fade-in">
            <div class="card-header bg-transparent border-0">
                <h5 class="mb-0">
                    <i class="fas fa-leaf me-2 text-success"></i>
                    Holtikultura
                </h5>
            </div>
            <div class="card-body">
                <div class="table-responsive agricultural-table">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Luas (Ha)</th>
                                <th>Jumlah Petani</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse(($agricultural['horticultures'] ?? [] ) as $i => $item)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td><strong>{{ $item['name'] }}</strong></td>
                                <td>{{ number_format($item['area']) }} Ha</td>
                                <td>{{ number_format($item['farmers']) }} orang</td>
                            </tr>
                            @empty
                            <tr><td colspan="4" class="text-muted">Belum ada data holtikultura.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Tabel Buah-buahan -->
    <div class="col-lg-6 mb-4">
        <div class="card fade-in">
            <div class="card-header bg-transparent border-0">
                <h5 class="mb-0">
                    <i class="fas fa-apple-alt me-2 text-danger"></i>
                    Buah-buahan
                </h5>
            </div>
            <div class="card-body">
                <div class="table-responsive agricultural-table">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Luas (Ha)</th>
                                <th>Jumlah Petani</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse(($agricultural['fruits'] ?? []) as $i => $item)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td><strong>{{ $item['name'] }}</strong></td>
                                <td>{{ number_format($item['area']) }} Ha</td>
                                <td>{{ number_format($item['farmers']) }} orang</td>
                            </tr>
                            @empty
                            <tr><td colspan="4" class="text-muted">Belum ada data buah-buahan.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
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
                <div class="table-responsive agricultural-table">
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
            <div class="card-body" id="distributionContainer">
                @foreach($agricultural['commodities'] as $commodity)
                <div class="commodity-item mb-3">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="commodity-name">{{ $commodity['name'] }}</span>
                        <span class="commodity-percentage">{{ round(($commodity['area'] / max($agricultural['land_area'],1)) * 100, 1) }}%</span>
                    </div>
                    <div class="progress" style="height: 10px;">
                        <div class="progress-bar" 
                             style="width: {{ ($commodity['area'] / max($agricultural['land_area'],1)) * 100 }}%; 
                                    background: {{ $loop->index == 0 ? '#28a745' : ($loop->index == 1 ? '#ffc107' : ($loop->index == 2 ? '#17a2b8' : '#6c757d')) }};">
                        </div>
                    </div>
                    <small class="text-muted">{{ number_format($commodity['area']) }} Ha - {{ number_format($commodity['farmers']) }} petani</small>
                </div>
                @endforeach
                        </div>
                    </div>
                </div>
                

    
        
    
</div>

<!-- Update Agricultural Modal -->
<div class="modal fade" id="updateAgriculturalModal" tabindex="-1">
            <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-edit me-2"></i>Kelola Komoditas & Total
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('admin.agricultural.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3 d-flex gap-2">
                        <div class="flex-fill">
                            <label class="form-label mb-1">Total Petani (otomatis)</label>
                            <input type="number" class="form-control" id="total_farmers_display" value="{{ $agricultural['farmers'] }}" disabled>
                            <input type="hidden" id="farmers" name="farmers" value="{{ $agricultural['farmers'] }}">
                            </div>
                        <div class="flex-fill">
                            <label class="form-label mb-1">Total Luas Lahan (Ha) (otomatis)</label>
                            <input type="number" class="form-control" id="total_land_area_display" value="{{ $agricultural['land_area'] }}" disabled>
                            <input type="hidden" id="land_area" name="land_area" value="{{ $agricultural['land_area'] }}">
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h6 class="mb-0">Data Komoditas</h6>
                        <button type="button" id="btnAddCommodity" class="btn btn-sm btn-primary">
                            <i class="fas fa-plus me-1"></i> Tambah Komoditas
                        </button>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-sm align-middle" id="commodityTable">
                            <thead>
                                <tr>
                                    <th style="width:30%">Nama Komoditas</th>
                                    <th style="width:18%">Luas Lahan (Ha)</th>
                                    <th style="width:18%">Jumlah Petani</th>
                                    <th style="width:18%">Gambar</th>
                                    <th style="width:20%">Deskripsi</th>
                                    <th style="width:12%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                        @foreach($agricultural['commodities'] as $index => $commodity)
                                <tr>
                                    <td>
                                        <input type="text" class="form-control commodity-name" name="commodities[{{ $index }}][name]" value="{{ $commodity['name'] }}" required>
                                    </td>
                                    <td>
                                        <input type="number" step="0.01" class="form-control commodity-area" name="commodities[{{ $index }}][area]" value="{{ $commodity['area'] }}">
                                    </td>
                                    <td>
                                        <input type="number" class="form-control commodity-farmers" name="commodities[{{ $index }}][farmers]" value="{{ $commodity['farmers'] }}">
                                    </td>
                                    <td>
                                        <input type="file" accept="image/*" class="form-control commodity-image" name="commodities[{{ $index }}][image]">
                                        @if(isset($commodity['image_path']) && $commodity['image_path'])
                                        <small class="text-muted">Gambar saat ini: {{ basename($commodity['image_path']) }}</small>
                                        @endif
                                    </td>
                                    <td><input type="text" class="form-control commodity-desc" name="commodities[{{ $index }}][description]" placeholder="Deskripsi"></td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-danger btnRemoveRow"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                                </div>

                    <hr>
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h6 class="mb-0">Data Holtikultura</h6>
                        <button type="button" id="btnAddHorti" class="btn btn-sm btn-primary">
                            <i class="fas fa-plus me-1"></i> Tambah Holtikultura
                        </button>
                                    </div>
                    <div class="table-responsive">
                        <table class="table table-sm align-middle commodity-table" id="hortiTable">
                            <thead>
                                <tr>
                                    <th style="width:30%">Nama</th>
                                    <th style="width:18%">Luas (Ha)</th>
                                    <th style="width:18%">Jumlah Petani</th>
                                    <th style="width:18%">Gambar</th>
                                    <th style="width:20%">Deskripsi</th>
                                    <th style="width:12%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($agricultural['horticultures'] ?? [] as $index => $horticulture)
                                <tr>
                                    <td>
                                        <input type="text" class="form-control horticulture-name" name="horticultures[{{ $index }}][name]" value="{{ $horticulture['name'] }}" required>
                                    </td>
                                    <td>
                                        <input type="number" step="0.01" class="form-control horticulture-area" name="horticultures[{{ $index }}][area]" value="{{ $horticulture['area'] }}">
                                    </td>
                                    <td>
                                        <input type="number" class="form-control horticulture-farmers" name="horticultures[{{ $index }}][farmers]" value="{{ $horticulture['farmers'] }}">
                                    </td>
                                    <td>
                                        <input type="file" accept="image/*" class="form-control horticulture-image" name="horticultures[{{ $index }}][image]">
                                        @if(isset($horticulture['image_path']) && $horticulture['image_path'])
                                        <small class="text-muted">Gambar saat ini: {{ basename($horticulture['image_path']) }}</small>
                                        @endif
                                    </td>
                                    <td>
                                        <input type="text" class="form-control horticulture-desc" name="horticultures[{{ $index }}][description]" value="{{ $horticulture['description'] ?? '' }}" placeholder="Deskripsi">
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-danger btnRemoveRow"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                                    </div>

                    <hr>
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h6 class="mb-0">Data Buah-buahan</h6>
                        <button type="button" id="btnAddFruit" class="btn btn-sm btn-primary">
                            <i class="fas fa-plus me-1"></i> Tambah Buah-buahan
                        </button>
                                </div>
                    <div class="table-responsive">
                        <table class="table table-sm align-middle commodity-table" id="fruitTable">
                            <thead>
                                <tr>
                                    <th style="width:30%">Nama</th>
                                    <th style="width:18%">Luas (Ha)</th>
                                    <th style="width:18%">Jumlah Petani</th>
                                    <th style="width:18%">Gambar</th>
                                    <th style="width:20%">Deskripsi</th>
                                    <th style="width:12%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($agricultural['fruits'] ?? [] as $index => $fruit)
                                <tr>
                                    <td>
                                        <input type="text" class="form-control fruit-name" name="fruits[{{ $index }}][name]" value="{{ $fruit['name'] }}" required>
                                    </td>
                                    <td>
                                        <input type="number" step="0.01" class="form-control fruit-area" name="fruits[{{ $index }}][area]" value="{{ $fruit['area'] }}">
                                    </td>
                                    <td>
                                        <input type="number" class="form-control fruit-farmers" name="fruits[{{ $index }}][farmers]" value="{{ $fruit['farmers'] }}">
                                    </td>
                                    <td>
                                        <input type="file" accept="image/*" class="form-control fruit-image" name="fruits[{{ $index }}][image]">
                                        @if(isset($fruit['image_path']) && $fruit['image_path'])
                                        <small class="text-muted">Gambar saat ini: {{ basename($fruit['image_path']) }}</small>
                                        @endif
                                    </td>
                                    <td>
                                        <input type="text" class="form-control fruit-desc" name="fruits[{{ $index }}][description]" value="{{ $fruit['description'] ?? '' }}" placeholder="Deskripsi">
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-danger btnRemoveRow"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                        @endforeach
                            </tbody>
                        </table>
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
<script>
document.addEventListener('DOMContentLoaded', function(){
    const table = document.getElementById('commodityTable');
    const hortiTable = document.getElementById('hortiTable');
    const fruitTable = document.getElementById('fruitTable');
    const btnAdd = document.getElementById('btnAddCommodity');
    const landHidden = document.getElementById('land_area');
    const landDisplay = document.getElementById('total_land_area_display');
    const farmersHidden = document.getElementById('farmers');
    const farmersDisplay = document.getElementById('total_farmers_display');

    function recalcTotals(){
        let totalArea = 0;
        let totalFarmers = 0;
        
        // Calculate from all tables
        [table, hortiTable, fruitTable].forEach(function(currentTable) {
            if (currentTable) {
                currentTable.querySelectorAll('tbody tr').forEach(function(tr){
                    const area = parseFloat(tr.querySelector('.commodity-area, .horticulture-area, .fruit-area')?.value || '0');
                    const farmers = parseInt(tr.querySelector('.commodity-farmers, .horticulture-farmers, .fruit-farmers')?.value || '0');
                    if (!isNaN(area)) totalArea += area;
                    if (!isNaN(farmers)) totalFarmers += farmers;
                });
            }
        });
        
        totalArea = Math.round(totalArea * 100) / 100;
        landHidden.value = totalArea;
        landDisplay.value = totalArea;
        farmersHidden.value = totalFarmers;
        farmersDisplay.value = totalFarmers;

        // Update KPI cards
        const totalLandText = document.getElementById('totalLandAreaText');
        const totalFarmersText = document.getElementById('totalFarmersText');
        const avgText = document.getElementById('avgLandPerFarmerText');
        if (totalLandText) totalLandText.textContent = new Intl.NumberFormat().format(totalArea);
        if (totalFarmersText) totalFarmersText.textContent = new Intl.NumberFormat().format(totalFarmers);
        if (avgText) avgText.textContent = (totalFarmers > 0 ? (Math.round((totalArea/totalFarmers)*100)/100) : 0).toFixed(2);

        // Update Distribution list (right card)
        const container = document.getElementById('distributionContainer');
        if (container) {
            const rows = Array.from(table.querySelectorAll('tbody tr')).map((tr, idx) => {
                const name = tr.querySelector('.commodity-name')?.value || `Komoditas ${idx+1}`;
                const area = parseFloat(tr.querySelector('.commodity-area')?.value || '0') || 0;
                const farmers = parseInt(tr.querySelector('.commodity-farmers')?.value || '0') || 0;
                return { name, area, farmers };
            });
            container.innerHTML = '';
            rows.forEach((r, i) => {
                const percent = totalArea > 0 ? Math.round((r.area/totalArea)*1000)/10 : 0;
                const color = i===0?'#28a745':(i===1?'#ffc107':(i===2?'#17a2b8':'#6c757d'));
                const wrapper = document.createElement('div');
                wrapper.className = 'commodity-item mb-3';
                wrapper.innerHTML = `
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="commodity-name">${nameHtml(r.name)}</span>
                        <span class="commodity-percentage">${percent.toFixed(1)}%</span>
                    </div>
                    <div class="progress" style="height: 10px;">
                        <div class="progress-bar" style="width:${percent}%; background:${color};"></div>
                    </div>
                    <small class="text-muted">${new Intl.NumberFormat().format(r.area)} Ha - ${new Intl.NumberFormat().format(r.farmers)} petani</small>
                `;
                container.appendChild(wrapper);
            });
        }
    }

    function bindRowEvents(tr){
        tr.querySelectorAll('.commodity-area, .commodity-farmers, .horticulture-area, .horticulture-farmers, .fruit-area, .fruit-farmers').forEach(function(inp){
            inp.addEventListener('input', recalcTotals);
        });
        const btnRemove = tr.querySelector('.btnRemoveRow');
        if (btnRemove) {
            btnRemove.addEventListener('click', function(){
                tr.remove();
                recalcTotals();
            });
        }
    }

    // bind existing rows for all tables
    [table, hortiTable, fruitTable].forEach(function(currentTable) {
        if (currentTable) {
            currentTable.querySelectorAll('tbody tr').forEach(bindRowEvents);
        }
    });
    recalcTotals();

    btnAdd?.addEventListener('click', function(){
        const index = table.querySelectorAll('tbody tr').length;
        const tr = document.createElement('tr');
        tr.innerHTML = `
            <td><input type="text" class="form-control commodity-name" name="commodities[${index}][name]" required></td>
            <td><input type="number" step="0.01" class="form-control commodity-area" name="commodities[${index}][area]" value="0"></td>
            <td><input type="number" class="form-control commodity-farmers" name="commodities[${index}][farmers]" value="0"></td>
            <td><input type="file" accept="image/*" class="form-control commodity-image" name="commodities[${index}][image]"></td>
            <td><input type="text" class="form-control commodity-desc" name="commodities[${index}][description]" placeholder="Deskripsi"></td>
            <td><button type="button" class="btn btn-sm btn-danger btnRemoveRow"><i class="fas fa-trash"></i></button></td>
        `;
        table.querySelector('tbody').appendChild(tr);
        bindRowEvents(tr);
        recalcTotals();
    });

    function addRowTo(tableEl, group, idx){
        const tr = document.createElement('tr');
        const nameClass = group === 'horticultures' ? 'horticulture-name' : group === 'fruits' ? 'fruit-name' : 'commodity-name';
        const areaClass = group === 'horticultures' ? 'horticulture-area' : group === 'fruits' ? 'fruit-area' : 'commodity-area';
        const farmersClass = group === 'horticultures' ? 'horticulture-farmers' : group === 'fruits' ? 'fruit-farmers' : 'commodity-farmers';
        const imageClass = group === 'horticultures' ? 'horticulture-image' : group === 'fruits' ? 'fruit-image' : 'commodity-image';
        const descClass = group === 'horticultures' ? 'horticulture-desc' : group === 'fruits' ? 'fruit-desc' : 'commodity-desc';
        
        tr.innerHTML = `
            <td><input type="text" class="form-control ${nameClass}" name="${group}[${idx}][name]" required></td>
            <td><input type="number" step="0.01" class="form-control ${areaClass}" name="${group}[${idx}][area]" value="0"></td>
            <td><input type="number" class="form-control ${farmersClass}" name="${group}[${idx}][farmers]" value="0"></td>
            <td><input type="file" accept="image/*" class="form-control ${imageClass}" name="${group}[${idx}][image]"></td>
            <td><input type="text" class="form-control ${descClass}" name="${group}[${idx}][description]" placeholder="Deskripsi"></td>
            <td><button type="button" class="btn btn-sm btn-danger btnRemoveRow"><i class="fas fa-trash"></i></button></td>
        `;
        tableEl.querySelector('tbody').appendChild(tr);
        bindRowEvents(tr);
        recalcTotals();
    }

    document.getElementById('btnAddHorti')?.addEventListener('click', function(){
        const idx = hortiTable.querySelectorAll('tbody tr').length;
        addRowTo(hortiTable, 'horticultures', idx);
    });
    document.getElementById('btnAddFruit')?.addEventListener('click', function(){
        const idx = fruitTable.querySelectorAll('tbody tr').length;
        addRowTo(fruitTable, 'fruits', idx);
    });

    function nameHtml(str){
        const div = document.createElement('div');
        div.textContent = str;
        return div.innerHTML;
    }
});
</script>
@endsection
