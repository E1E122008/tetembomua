@extends('admin.layouts.app')

@section('title', 'KK Expired')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Kartu Keluarga yang Perlu Update (>5 tahun)</h4>
                <div class="page-title-right">
                    <a href="{{ route('admin.analytics.dashboard') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali ke Dashboard
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No KK</th>
                                    <th>Dusun</th>
                                    <th>Tanggal Dikeluarkan</th>
                                    <th>Usia KK (Tahun)</th>
                                    <th class="text-center">Jumlah Anggota</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($data as $index => $kk)
                                @php
                                    $usiaKK = \Carbon\Carbon::parse($kk->tanggal_kk_dikeluarkan)->diffInYears(\Carbon\Carbon::now());
                                @endphp
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td><strong>{{ $kk->no_kk }}</strong></td>
                                    <td>{{ $kk->dusun ? $kk->dusun->nama : 'Tidak ada dusun' }}</td>
                                    <td>{{ \Carbon\Carbon::parse($kk->tanggal_kk_dikeluarkan)->format('d/m/Y') }}</td>
                                    <td>
                                        <span class="badge {{ $usiaKK > 10 ? 'bg-danger' : ($usiaKK > 7 ? 'bg-warning' : 'bg-success') }}">
                                            {{ $usiaKK }} tahun
                                        </span>
                                    </td>
                                    <td class="text-center">{{ $kk->penduduk_count }}</td>
                                    <td>
                                        @if($usiaKK > 10)
                                            <span class="badge bg-danger">Sangat Mendesak</span>
                                        @elseif($usiaKK > 7)
                                            <span class="badge bg-warning">Mendesak</span>
                                        @else
                                            <span class="badge bg-success">Perlu Update</span>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center text-muted">Tidak ada KK yang perlu update</td>
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
