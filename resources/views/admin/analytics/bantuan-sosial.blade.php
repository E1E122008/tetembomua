@extends('admin.layouts.app')

@section('title', 'Bantuan Sosial')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Data Penerima Bantuan Sosial</h4>
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
                                    <th>Nama</th>
                                    <th>NIK</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Usia</th>
                                    <th>Dusun</th>
                                    <th>No KK</th>
                                    <th>Status Rumah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($data as $index => $penduduk)
                                @php
                                    $usia = \Carbon\Carbon::now()->year - $penduduk->tahun_lahir;
                                @endphp
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td><strong>{{ $penduduk->nama }}</strong></td>
                                    <td>{{ $penduduk->nik }}</td>
                                    <td>
                                        <span class="badge {{ $penduduk->jenis_kelamin == 'L' ? 'bg-primary' : 'bg-pink' }}">
                                            {{ $penduduk->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
                                        </span>
                                    </td>
                                    <td>{{ $usia }} tahun</td>
                                    <td>{{ $penduduk->kartuKeluarga && $penduduk->kartuKeluarga->dusun ? $penduduk->kartuKeluarga->dusun->nama : 'Tidak ada dusun' }}</td>
                                    <td>{{ $penduduk->no_kk }}</td>
                                    <td>
                                        <div class="small">
                                            <div>Dinding: {{ $penduduk->status_rumah_dinding ?? '-' }}</div>
                                            <div>Atap: {{ $penduduk->status_rumah_atap ?? '-' }}</div>
                                            <div>Listrik: {{ $penduduk->status_rumah_listrik ?? '-' }}</div>
                                            <div>MCK: {{ $penduduk->status_rumah_mck ?? '-' }}</div>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center text-muted">Tidak ada data penerima bantuan sosial</td>
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
