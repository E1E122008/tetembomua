@extends('admin.layouts.app')

@section('title', 'Usia Produktif')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Data Penduduk Usia Produktif (18-60 tahun)</h4>
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
                                    <th>Pendidikan</th>
                                    <th>Pekerjaan</th>
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
                                    <td>{{ $penduduk->pendidikan_terakhir }}</td>
                                    <td>{{ $penduduk->mata_pencaharian }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center text-muted">Tidak ada data penduduk usia produktif</td>
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
