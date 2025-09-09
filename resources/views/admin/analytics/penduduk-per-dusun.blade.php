@extends('admin.layouts.app')

@section('title', 'Penduduk per Dusun')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Data Penduduk per Dusun</h4>
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
                                    <th>Nama Dusun</th>
                                    <th class="text-center">Jumlah KK</th>
                                    <th class="text-center">Total Penduduk</th>
                                    <th class="text-center">Laki-laki</th>
                                    <th class="text-center">Perempuan</th>
                                    <th class="text-center">Persentase</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $totalKK = $data->sum('total_kk');
                                    $totalPenduduk = $data->sum('total_penduduk');
                                @endphp
                                @forelse($data as $index => $dusun)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td><strong>{{ $dusun->nama }}</strong></td>
                                    <td class="text-center">{{ $dusun->total_kk }}</td>
                                    <td class="text-center">{{ $dusun->total_penduduk }}</td>
                                    <td class="text-center">{{ $dusun->laki_laki }}</td>
                                    <td class="text-center">{{ $dusun->perempuan }}</td>
                                    <td class="text-center">
                                        @if($totalPenduduk > 0)
                                            {{ round(($dusun->total_penduduk / $totalPenduduk) * 100, 1) }}%
                                        @else
                                            0%
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center text-muted">Belum ada data dusun</td>
                                </tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr class="table-primary">
                                    <th colspan="2">TOTAL</th>
                                    <th class="text-center">{{ $totalKK }}</th>
                                    <th class="text-center">{{ $totalPenduduk }}</th>
                                    <th class="text-center">{{ $data->sum('laki_laki') }}</th>
                                    <th class="text-center">{{ $data->sum('perempuan') }}</th>
                                    <th class="text-center">100%</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
