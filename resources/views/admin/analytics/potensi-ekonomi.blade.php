@extends('admin.layouts.app')

@section('title', 'Potensi Ekonomi')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Analisis Potensi Ekonomi Desa</h4>
                <div class="page-title-right">
                    <a href="{{ route('admin.analytics.dashboard') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali ke Dashboard
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Ternak per Dusun -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Potensi Ternak per Dusun</h4>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Dusun</th>
                                    <th class="text-center">Sapi</th>
                                    <th class="text-center">Kambing</th>
                                    <th class="text-center">Ayam</th>
                                    <th class="text-center">Ikan</th>
                                    <th class="text-center">Total Ternak</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($ternakPerDusun as $data)
                                @php
                                    $totalTernak = $data['ternak']['sapi'] + $data['ternak']['kambing'] + $data['ternak']['ayam'] + $data['ternak']['ikan'];
                                @endphp
                                <tr>
                                    <td><strong>{{ $data['dusun'] }}</strong></td>
                                    <td class="text-center">{{ $data['ternak']['sapi'] }}</td>
                                    <td class="text-center">{{ $data['ternak']['kambing'] }}</td>
                                    <td class="text-center">{{ $data['ternak']['ayam'] }}</td>
                                    <td class="text-center">{{ $data['ternak']['ikan'] }}</td>
                                    <td class="text-center"><strong>{{ $totalTernak }}</strong></td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted">Belum ada data ternak</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Lahan per Dusun -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Lahan Pertanian per Dusun</h4>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Dusun</th>
                                    <th class="text-center">Lahan Pertanian (Ha)</th>
                                    <th class="text-center">Lahan Peternakan (Ha)</th>
                                    <th class="text-center">Total Lahan (Ha)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($lahanPerDusun as $data)
                                @php
                                    $totalLahan = $data['lahan']['pertanian'] + $data['lahan']['peternakan'];
                                @endphp
                                <tr>
                                    <td><strong>{{ $data['dusun'] }}</strong></td>
                                    <td class="text-center">{{ number_format($data['lahan']['pertanian'], 2) }}</td>
                                    <td class="text-center">{{ number_format($data['lahan']['peternakan'], 2) }}</td>
                                    <td class="text-center"><strong>{{ number_format($totalLahan, 2) }}</strong></td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted">Belum ada data lahan</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Komoditas Utama -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Komoditas Utama Desa</h4>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Komoditas</th>
                                    <th class="text-center">Jumlah Keluarga</th>
                                    <th class="text-center">Persentase</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $totalKeluarga = $komoditas->sum('jumlah');
                                @endphp
                                @forelse($komoditas as $index => $kom)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td><strong>{{ $kom->komoditas_utama }}</strong></td>
                                    <td class="text-center">{{ $kom->jumlah }}</td>
                                    <td class="text-center">
                                        @if($totalKeluarga > 0)
                                            {{ round(($kom->jumlah / $totalKeluarga) * 100, 1) }}%
                                        @else
                                            0%
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted">Belum ada data komoditas</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
