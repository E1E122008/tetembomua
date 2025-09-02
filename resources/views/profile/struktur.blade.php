@extends('layouts.app')

@section('title', 'Struktur Organisasi - Desa Tetembomua')

@section('content')
<!-- Breadcrumb -->
<nav aria-label="breadcrumb" class="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
            <li class="breadcrumb-item"><a href="#">Profil Desa</a></li>
            <li class="breadcrumb-item active">Struktur Organisasi</li>
        </ol>
    </div>
</nav>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <div class="hero-content">
                    <h1 class="display-4 fw-bold mb-4">Struktur Organisasi</h1>
                    <p class="lead mb-4">Pemerintahan Desa Tetembomua yang transparan dan partisipatif untuk melayani masyarakat</p>
                </div>
            </div>
            <div class="col-lg-4 text-center">
                <i class="fas fa-sitemap fa-6x text-white opacity-75"></i>
            </div>
        </div>
    </div>
</section>

<!-- RT dan Dusun dari admin (jika tersedia) -->
@if(isset($struktur) && (isset($struktur['rt']) || isset($struktur['dusun'])))
<section class="section">
    <div class="container">
        @if(isset($struktur['rt']))
        <div class="row mb-5">
            <div class="col-12">
                <div class="card fade-in">
                    <div class="card-body p-5">
                        <div class="text-center mb-4">
                            <i class="fas fa-home fa-3x text-primary mb-2"></i>
                            <h3 class="fw-bold text-primary">Kepala RT 1–6</h3>
                        </div>
                        <div class="row g-4">
                            @foreach($struktur['rt'] as $i => $rt)
                            <div class="col-lg-4 col-md-6">
                                <div class="perangkat-card h-100">
                                    <div class="perangkat-header">
                                        <span class="badge bg-primary">RT {{ $i }}</span>
                                    </div>
                                    <div class="text-center mb-3">
                                        <span role="button" class="open-image" data-src="{{ $rt['photo'] ?? asset('FOTO/LOGO-removebg-preview.png') }}">
                                            <img src="{{ $rt['photo'] ?? asset('FOTO/LOGO-removebg-preview.png') }}" alt="RT {{ $i }}" class="rounded-circle" style="width: 80px; height: 80px; object-fit: cover; border: 2px solid #fff;">
                                        </span>
                                    </div>
                                    <div class="perangkat-body">
                                        <h6 class="fw-bold">{{ $rt['name'] ?? 'Kepala RT ' . $i }}</h6>
                                        @if(!empty($rt['info']))
                                            <p class="text-muted mb-0">{{ $rt['info'] }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        
        @php
            // Combine new entries with legacy (RT 1-6, Dusun 1-3) so older data still appears
            $dusunEntries = $struktur['entries']['dusun'] ?? [];
            $rtEntries = $struktur['entries']['rt'] ?? [];

            $legacyDusun = [];
            if (!empty($struktur['dusun']) && is_array($struktur['dusun'])) {
                foreach ($struktur['dusun'] as $i => $d) {
                    if (empty($d)) continue;
                    $legacyDusun[] = [
                        'name' => $d['name'] ?? ('Kepala Dusun ' . $i),
                        'role_type' => 'lainnya',
                        'role_text' => 'Dusun ' . $i,
                        'info' => $d['info'] ?? ($d['image_date'] ?? null),
                        'photo' => $d['photo'] ?? null,
                    ];
                }
            }

            $legacyRt = [];
            if (!empty($struktur['rt']) && is_array($struktur['rt'])) {
                foreach ($struktur['rt'] as $i => $r) {
                    if (empty($r)) continue;
                    $legacyRt[] = [
                        'name' => $r['name'] ?? ('RT ' . $i),
                        'role_type' => 'lainnya',
                        'role_text' => 'RT ' . $i,
                        'info' => $r['info'] ?? null,
                        'photo' => $r['photo'] ?? null,
                    ];
                }
            }

            $dusun = array_values(array_filter(array_merge($dusunEntries, $legacyDusun), function($x){ return !empty($x['name']); }));
            $rt = array_values(array_filter(array_merge($rtEntries, $legacyRt), function($x){ return !empty($x['name']); }));
        @endphp
        @if(!empty($dusun) || !empty($rt))
        <div class="row mt-4">
            <div class="col-12">
                <div class="card fade-in">
                    <div class="card-body p-5">
                        <div class="text-center mb-5">
                            <i class="fas fa-map-signs fa-4x text-primary mb-3"></i>
                            <h2 class="text-primary fw-bold">Bagan Kepala Dusun</h2>
                        </div>

                        <div class="row g-4">
                            @foreach($dusun as $d)
                            <div class="col-lg-6">
                                <div class="p-3 border rounded h-100">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="me-3" style="width:64px;height:64px;flex:0 0 64px;">
                                            @if(!empty($d['photo']))
                                            <span role="button" class="open-image" data-src="{{ $d['photo'] }}">
                                                <img src="{{ $d['photo'] }}" alt="{{ $d['name'] }}" class="rounded-circle" style="width:64px;height:64px;object-fit:cover;">
                                            </span>
                                            @else
                                            <span role="button" class="open-image" data-src="{{ asset('FOTO/LOGO-removebg-preview.png') }}">
                                                <img src="{{ asset('FOTO/LOGO-removebg-preview.png') }}" alt="Dusun" class="rounded-circle" style="width:64px;height:64px;object-fit:cover;">
                                            </span>
                                            @endif
                                        </div>
                                        <div>
                                            <div class="fw-bold">{{ $d['name'] }}</div>
                                            <div class="small text-muted">{{ ($d['role_type'] ?? '') === 'lainnya' ? ($d['role_text'] ?? 'Kepala Dusun') : ucfirst($d['role_type'] ?? 'Kepala Dusun') }}</div>
                                            @if(!empty($d['info']))
                                            <div class="small text-muted">{{ $d['info'] }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    @php
                                        $dusunNumber = null;
                                        if (!empty($d['role_text'])) {
                                            if (preg_match('/(\d+)/', $d['role_text'], $m)) { $dusunNumber = (int)$m[1]; }
                                        }
                                        $rtsForDusun = [];
                                        if (!empty($rt)) {
                                            foreach ($rt as $r) {
                                                $rtsForDusun[] = $r;
                                            }
                                        }
                                    @endphp

                                    @if(!empty($rtsForDusun))
                                    <div class="ms-2">
                                        <div class="small text-muted mb-2">RT:</div>
                                        <div class="d-flex flex-wrap gap-2">
                                            @foreach($rtsForDusun as $r)
                                            <div class="border rounded px-2 py-1 d-flex align-items-center" style="gap:.5rem;">
                                                @if(!empty($r['photo']))
                                                <span role="button" class="open-image" data-src="{{ $r['photo'] }}">
                                                    <img src="{{ $r['photo'] }}" alt="{{ $r['name'] }}" style="width:24px;height:24px;border-radius:50%;object-fit:cover;">
                                                </span>
                                                @endif
                                                <span class="small fw-semibold">{{ $r['role_text'] ?? 'RT' }}</span>
                                                <span class="small text-muted">{{ $r['name'] }}</span>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        @if(isset($struktur['dusun']))
        <div class="row mb-5">
            <div class="col-12">
                <div class="card fade-in">
                    <div class="card-body p-5">
                        <div class="text-center mb-4">
                            <i class="fas fa-map-signs fa-3x text-warning mb-2"></i>
                            <h3 class="fw-bold text-warning">Kepala Dusun 1–3</h3>
                        </div>
                        <div class="row g-4">
                            @foreach($struktur['dusun'] as $i => $dusun)
                            <div class="col-lg-4 col-md-6">
                                <div class="perangkat-card h-100">
                                    <div class="perangkat-header">
                                        <span class="badge bg-warning text-dark">Dusun {{ $i }}</span>
                                    </div>
                                    <div class="text-center mb-3">
                                        @if(!empty($dusun['photo']))
                                        <span role="button" class="open-image" data-src="{{ $dusun['photo'] }}">
                                            <img src="{{ $dusun['photo'] }}" alt="Dusun {{ $i }}" class="rounded-circle" style="width: 80px; height: 80px; object-fit: cover; border: 2px solid #fff;">
                                        </span>
                                        @else
                                        <span role="button" class="open-image" data-src="{{ asset('FOTO/LOGO-removebg-preview.png') }}">
                                            <img src="{{ asset('FOTO/LOGO-removebg-preview.png') }}" alt="Dusun {{ $i }}" class="rounded-circle" style="width: 80px; height: 80px; object-fit: cover; border: 2px solid #fff;">
                                        </span>
                                        @endif
                                    </div>
                                    <div class="perangkat-body">
                                        <h6 class="fw-bold">{{ $dusun['name'] ?? 'Kepala Dusun ' . $i }}</h6>
                                        @if(!empty($dusun['info']))
                                            <p class="text-muted mb-0">{{ $dusun['info'] }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>
@endif
<!-- Struktur Section -->
<section class="section">
    <div class="container">
        <!-- Pemerintah Desa -->
        <div class="row mb-5">
            <div class="col-12">
                <div class="card fade-in">
                    <div class="card-body p-5">
                        <div class="text-center mb-5">
                            <i class="fas fa-building fa-4x text-primary mb-3"></i>
                            <h2 class="text-primary fw-bold">PEMERINTAH DESA TETEMBOMUA</h2>
                            <p class="text-muted">Periode 2024 - Sekarang</p>
            </div>

                        <!-- Kepala Desa (dinamis jika tersedia) -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <div class="kepala-desa-card">
                                    <div class="text-center">
                                        <div class="avatar-container mb-3">
                                            <span role="button" class="open-image" data-src="{{ isset($struktur['kades']['photo']) && $struktur['kades']['photo'] ? $struktur['kades']['photo'] : asset('FOTO/DSC_0596.JPG') }}">
                                                <img src="{{ isset($struktur['kades']['photo']) && $struktur['kades']['photo'] ? $struktur['kades']['photo'] : asset('FOTO/DSC_0596.JPG') }}" alt="Kepala Desa" class="rounded-circle" style="width: 100px; height: 100px; object-fit: cover; border: 3px solid white;">
                                            </span>
                                        </div>
                                        <h3 class="text-primary fw-bold">KEPALA DESA</h3>
                                        <h4 class="text-success">{{ $struktur['kades']['name'] ?? 'ABDULLAH, SP' }}</h4>
                                        <p class="text-muted">{{ $struktur['kades']['info'] ?? 'Masa Jabatan: 2024 - Sekarang' }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                        <!-- Perangkat Desa (dinamis) -->
                        <div class="row">
                            <div class="col-12">
                                <h4 class="text-center mb-4">
                                    <i class="fas fa-users me-2 text-success"></i>
                                    PERANGKAT DESA
                                </h4>
                            </div>
                        </div>

                        @php $perangkat = $struktur['entries']['perangkat'] ?? []; @endphp
                        @if(!empty($perangkat))
                        <div class="row">
                            @foreach($perangkat as $p)
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="perangkat-card">
                                    <div class="perangkat-header">
                                        <i class="fas fa-id-badge fa-2x text-primary"></i>
                                        <h5 class="text-primary">{{ ($p['role_type'] ?? '') === 'lainnya' ? ($p['role_text'] ?? 'Perangkat') : ucfirst($p['role_type'] ?? 'Perangkat') }}</h5>
                                    </div>
                                    <div class="perangkat-body">
                                        @if(!empty($p['photo']))
                                        <div class="avatar-container mb-3">
                                            <span role="button" class="open-image" data-src="{{ $p['photo'] }}">
                                                <img src="{{ $p['photo'] }}" alt="{{ $p['name'] }}" class="rounded-circle" style="width: 80px; height: 80px; object-fit: cover; border: 2px solid white;">
                                            </span>
                                        </div>
                                        @endif
                                        <h6 class="fw-bold">{{ $p['name'] }}</h6>
                                        @if(!empty($p['info']))
                                            <p class="mb-0 text-muted">{{ $p['info'] }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @else
                        <p class="text-center text-muted">Belum ada data perangkat desa.</p>
                        @endif
                        </div>
                    </div>
                </div>
            </div>

        @php $bpd = $struktur['entries']['bpd'] ?? []; @endphp
        @if(!empty($bpd))
        <div class="row mb-5">
            <div class="col-12">
                <div class="card fade-in">
                    <div class="card-body p-5">
                        <div class="text-center mb-5">
                            <i class="fas fa-balance-scale fa-4x text-success mb-3"></i>
                            <h2 class="text-success fw-bold">BADAN PERMUSYAWARATAN DESA (BPD)</h2>
                            <p class="text-muted">Lembaga yang melaksanakan fungsi pemerintahan yang anggotanya merupakan wakil penduduk desa</p>
                        </div>

                        <div class="row">
                            @foreach($bpd as $m)
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="bpd-card">
                                    <div class="bpd-header">
                                        <i class="fas fa-user fa-2x text-primary"></i>
                                        <h5 class="text-primary">{{ ($m['role_type'] ?? '') === 'lainnya' ? ($m['role_text'] ?? 'Anggota') : ucfirst($m['role_type'] ?? 'Anggota') }}</h5>
                                    </div>
                                    <div class="bpd-body text-center">
                                        @if(!empty($m['photo']))
                                        <div class="avatar-container mb-3">
                                            <span role="button" class="open-image" data-src="{{ $m['photo'] }}">
                                                <img src="{{ $m['photo'] }}" alt="{{ $m['name'] }}" class="rounded-circle" style="width: 80px; height: 80px; object-fit: cover; border: 2px solid white;">
                                            </span>
                                        </div>
                                        @endif
                                        <h6 class="fw-bold">{{ $m['name'] }}</h6>
                                        @if(!empty($m['info']))
                                            <p class="mb-0 text-muted">{{ $m['info'] }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        @php $lpm = $struktur['entries']['lpm'] ?? []; @endphp
        @if(!empty($lpm))
        <div class="row">
            <div class="col-12">
                <div class="card fade-in">
                    <div class="card-body p-5">
                        <div class="text-center mb-5">
                            <i class="fas fa-hands-helping fa-4x text-warning mb-3"></i>
                            <h2 class="text-warning fw-bold">LEMBAGA PEMBERDAYAAN MASYARAKAT (LPM)</h2>
    </div>

        <div class="row">
                            @foreach($lpm as $m)
            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="lpm-card">
                                    <div class="lpm-header">
                                        <i class="fas fa-user fa-2x text-info"></i>
                                        <h5 class="text-info">{{ ($m['role_type'] ?? '') === 'lainnya' ? ($m['role_text'] ?? 'Anggota') : ucfirst($m['role_type'] ?? 'Anggota') }}</h5>
                                    </div>
                                    <div class="lpm-body text-center">
                                        @if(!empty($m['photo']))
                                        <div class="avatar-container mb-3">
                                            <span role="button" class="open-image" data-src="{{ $m['photo'] }}">
                                                <img src="{{ $m['photo'] }}" alt="{{ $m['name'] }}" class="rounded-circle" style="width: 80px; height: 80px; object-fit: cover; border: 2px solid white;">
                                            </span>
                                        </div>
                                        @endif
                                        <h6 class="fw-bold">{{ $m['name'] }}</h6>
                                        @if(!empty($m['info']))
                                            <p class="mb-0 text-muted">{{ $m['info'] }}</p>
                                        @endif
                    </div>
                </div>
            </div>
                            @endforeach
                                    </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @php $dusun = $struktur['entries']['dusun'] ?? []; @endphp
        @if(!empty($dusun))
        <div class="row mb-5">
            <div class="col-12">
                <div class="card fade-in">
                    <div class="card-body p-5">
                        <div class="text-center mb-5">
                            <i class="fas fa-map-signs fa-4x text-warning mb-3"></i>
                            <h2 class="text-warning fw-bold">KEPALA DUSUN</h2>
            </div>

                        <div class="row">
                            @foreach($dusun as $m)
            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="dusun-card">
                                    <div class="dusun-header">
                                        <i class="fas fa-id-badge fa-2x text-warning"></i>
                                        <h5 class="text-warning">{{ ($m['role_type'] ?? '') === 'lainnya' ? ($m['role_text'] ?? 'Anggota') : ucfirst($m['role_type'] ?? 'Anggota') }}</h5>
                                    </div>
                                    <div class="dusun-body">
                                        @if(!empty($m['photo']))
                                        <div class="avatar-container mb-3">
                                            <span role="button" class="open-image" data-src="{{ $m['photo'] }}">
                                                <img src="{{ $m['photo'] }}" alt="{{ $m['name'] }}" class="rounded-circle" style="width: 80px; height: 80px; object-fit: cover; border: 2px solid white;">
                                            </span>
                                        </div>
                                        @else
                                        <div class="avatar-container mb-3">
                                            <i class="fas fa-user fa-2x text-white"></i>
                                        </div>
                                        @endif
                                        <h6 class="fw-bold">{{ $m['name'] }}</h6>
                                        @if(!empty($m['info']))
                                            <p class="mb-0 text-muted">{{ $m['info'] }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach
                                    </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        @php $rt = $struktur['entries']['rt'] ?? []; @endphp
        @if(!empty($rt))
        <div class="row mb-5">
            <div class="col-12">
                <div class="card fade-in">
                    <div class="card-body p-5">
                        <div class="text-center mb-5">
                            <i class="fas fa-home fa-4x text-primary mb-3"></i>
                            <h2 class="text-primary fw-bold">RT</h2>
    </div>

                        <div class="row">
                            @foreach($rt as $m)
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="rt-card">
                                    <div class="rt-header">
                                        <i class="fas fa-id-badge fa-2x text-primary"></i>
                                        <h5 class="text-primary">{{ ($m['role_type'] ?? '') === 'lainnya' ? ($m['role_text'] ?? 'Anggota') : ucfirst($m['role_type'] ?? 'Anggota') }}</h5>
                                    </div>
                                    <div class="rt-body">
                                        @if(!empty($m['photo']))
                                        <div class="avatar-container mb-3">
                                            <span role="button" class="open-image" data-src="{{ $m['photo'] }}">
                                                <img src="{{ $m['photo'] }}" alt="{{ $m['name'] }}" class="rounded-circle" style="width: 80px; height: 80px; object-fit: cover; border: 2px solid white;">
                                            </span>
                                    </div>
                                        @else
                                        <div class="avatar-container mb-3">
                                            <i class="fas fa-user fa-2x text-white"></i>
        </div>
                                        @endif
                                        <h6 class="fw-bold">{{ $m['name'] }}</h6>
                                        @if(!empty($m['info']))
                                            <p class="mb-0 text-muted">{{ $m['info'] }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>

<!-- Image Preview Modal for Struktur Page -->
<div class="modal fade" id="strukturImagePreviewModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-md">
    <div class="modal-content" style="background: transparent; border: none;">
      <button type="button" class="btn-close btn-close-white ms-auto me-2 mt-2" data-bs-dismiss="modal" aria-label="Close"></button>
      <img id="strukturImagePreviewModalImg" src="" alt="Preview" style="width:100%; height:auto; border-radius:12px; box-shadow:0 20px 40px rgba(0,0,0,.4);">
    </div>
  </div>
  </div>

<style>
.kepala-desa-card {
    background: linear-gradient(135deg, rgba(46, 139, 87, 0.1), rgba(60, 179, 113, 0.05));
    border: 3px solid var(--primary-green);
    border-radius: 20px;
    padding: 3rem;
    text-align: center;
    position: relative;
    overflow: hidden;
}

.kepala-desa-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, transparent 30%, rgba(255,255,255,0.1) 50%, transparent 70%);
    animation: shine 3s ease-in-out infinite;
}

.avatar-container {
    width: 100px;
    height: 100px;
    background: var(--primary-gradient);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
    color: white;
    box-shadow: 0 10px 25px rgba(46, 139, 87, 0.3);
}

.perangkat-card, .bpd-card, .lpm-card, .dusun-card, .rt-card {
    background: white;
    border-radius: 15px;
    padding: 1.5rem;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    border-left: 4px solid var(--primary-green);
    height: 100%;
    transition: all 0.3s ease;
    text-align: center;
}

.perangkat-card:hover, .bpd-card:hover, .lpm-card:hover, .dusun-card:hover, .rt-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(46, 139, 87, 0.2);
}

.perangkat-header, .bpd-header, .lpm-header, .dusun-header, .rt-header {
    margin-bottom: 1rem;
    padding-bottom: 1rem;
    border-bottom: 2px solid rgba(46, 139, 87, 0.1);
}

.perangkat-header i, .bpd-header i, .lpm-header i, .dusun-header i, .rt-header i {
    margin-bottom: 0.5rem;
}

.perangkat-header h5, .bpd-header h5, .lpm-header h5, .dusun-header h5, .rt-header h5 {
    margin-bottom: 0;
    font-weight: 600;
}

.perangkat-body h6, .bpd-body h6, .lpm-body h6, .dusun-body h6, .rt-body h6 {
    margin-bottom: 0;
    color: var(--text-dark);
}

/* Custom border colors for different card types */
.dusun-card {
    border-left: 4px solid #ffc107; /* Warning color for Dusun */
}

.rt-card {
    border-left: 4px solid #0d6efd; /* Primary color for RT */
}

@keyframes shine {
    0%, 100% { transform: translateX(-100%); }
    50% { transform: translateX(100%); }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function(){
  const modalEl = document.getElementById('strukturImagePreviewModal');
  const imgEl = document.getElementById('strukturImagePreviewModalImg');
  if (!modalEl || !imgEl) return;
  const bsModal = new bootstrap.Modal(modalEl);
  document.querySelectorAll('.open-image').forEach(function(el){
    el.addEventListener('click', function(){
      const src = el.getAttribute('data-src');
      if (!src) return;
      imgEl.src = src;
      bsModal.show();
    });
  });
});
</script>
@endsection
