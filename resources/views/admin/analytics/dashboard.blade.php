@extends('admin.layouts.app')

@section('title', 'Dashboard Analytics')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Dashboard Analytics & Laporan</h4>
            </div>
        </div>
    </div>

    <!-- Statistik Utama -->
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <h5 class="text-muted fw-normal mt-0 text-truncate" title="Total Penduduk">Total Penduduk</h5>
                            <h3 class="my-2 py-1">{{ number_format($totalPenduduk) }}</h3>
                        </div>
                        <div class="col-6">
                            <div class="text-end">
                                <i class="fas fa-users text-primary" style="font-size: 3rem;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <h5 class="text-muted fw-normal mt-0 text-truncate" title="Laki-laki">Laki-laki</h5>
                            <h3 class="my-2 py-1 text-primary">{{ number_format($totalLakiLaki) }}</h3>
                        </div>
                        <div class="col-6">
                            <div class="text-end">
                                <i class="fas fa-male text-primary" style="font-size: 3rem;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <h5 class="text-muted fw-normal mt-0 text-truncate" title="Perempuan">Perempuan</h5>
                            <h3 class="my-2 py-1 text-pink">{{ number_format($totalPerempuan) }}</h3>
                        </div>
                        <div class="col-6">
                            <div class="text-end">
                                <i class="fas fa-female text-pink" style="font-size: 3rem;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <h5 class="text-muted fw-normal mt-0 text-truncate" title="KK Perlu Update">KK Perlu Update</h5>
                            <h3 class="my-2 py-1 text-warning">{{ number_format($kkPerluUpdate) }}</h3>
                        </div>
                        <div class="col-6">
                            <div class="text-end">
                                <i class="fas fa-exclamation-triangle text-warning" style="font-size: 3rem;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Distribusi Usia -->
    <div class="row">
        <div class="col-xl-4 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Distribusi Usia</h4>
                    <div class="row text-center">
                        <div class="col-4">
                            <div class="border-end">
                                <h4 class="text-primary">{{ number_format($usiaAnak) }}</h4>
                                <p class="text-muted mb-0">Anak (0-17)</p>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="border-end">
                                <h4 class="text-success">{{ number_format($usiaProduktif) }}</h4>
                                <p class="text-muted mb-0">Produktif (18-60)</p>
                            </div>
                        </div>
                        <div class="col-4">
                            <h4 class="text-info">{{ number_format($usiaLansia) }}</h4>
                            <p class="text-muted mb-0">Lansia (60+)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-8 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Data per Dusun</h4>
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>Dusun</th>
                                    <th class="text-center">KK</th>
                                    <th class="text-center">Penduduk</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($dataPerDusun as $dusun)
                                <tr>
                                    <td>{{ $dusun->nama }}</td>
                                    <td class="text-center">{{ $dusun->total_kk }}</td>
                                    <td class="text-center">{{ $dusun->total_penduduk }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="text-center text-muted">Belum ada data dusun</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Grafik dan Analisis -->
    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Tingkat Pendidikan</h4>
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>Pendidikan</th>
                                    <th class="text-center">Jumlah</th>
                                    <th class="text-center">%</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pendidikan as $edu)
                                <tr>
                                    <td>{{ $edu->pendidikan_terakhir }}</td>
                                    <td class="text-center">{{ $edu->jumlah }}</td>
                                    <td class="text-center">{{ $totalPenduduk > 0 ? round(($edu->jumlah / $totalPenduduk) * 100, 1) : 0 }}%</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Mata Pencaharian</h4>
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>Pekerjaan</th>
                                    <th class="text-center">Jumlah</th>
                                    <th class="text-center">%</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($mataPencaharian as $kerja)
                                <tr>
                                    <td>{{ $kerja->mata_pencaharian }}</td>
                                    <td class="text-center">{{ $kerja->jumlah }}</td>
                                    <td class="text-center">{{ $totalPenduduk > 0 ? round(($kerja->jumlah / $totalPenduduk) * 100, 1) : 0 }}%</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Kepemilikan Kendaraan -->
    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Kepemilikan Kendaraan</h4>
                    <div class="row text-center">
                        <div class="col-4">
                            <h4 class="text-primary">{{ $kendaraan['mobil'] }}</h4>
                            <p class="text-muted mb-0">Mobil</p>
                        </div>
                        <div class="col-4">
                            <h4 class="text-success">{{ $kendaraan['motor'] }}</h4>
                            <p class="text-muted mb-0">Motor</p>
                        </div>
                        <div class="col-4">
                            <h4 class="text-info">{{ $kendaraan['sepeda'] }}</h4>
                            <p class="text-muted mb-0">Sepeda</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Potensi Ternak</h4>
                    <div class="row text-center">
                        <div class="col-3">
                            <h4 class="text-primary">{{ $ternak['sapi'] }}</h4>
                            <p class="text-muted mb-0">Sapi</p>
                        </div>
                        <div class="col-3">
                            <h4 class="text-success">{{ $ternak['kambing'] }}</h4>
                            <p class="text-muted mb-0">Kambing</p>
                        </div>
                        <div class="col-3">
                            <h4 class="text-info">{{ $ternak['ayam'] }}</h4>
                            <p class="text-muted mb-0">Ayam</p>
                        </div>
                        <div class="col-3">
                            <h4 class="text-warning">{{ $ternak['ikan'] }}</h4>
                            <p class="text-muted mb-0">Ikan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Lahan Pertanian -->
    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Lahan Pertanian</h4>
                    <div class="row text-center">
                        <div class="col-6">
                            <h4 class="text-success">{{ number_format($lahanPertanian, 2) }}</h4>
                            <p class="text-muted mb-0">Hektar Pertanian</p>
                        </div>
                        <div class="col-6">
                            <h4 class="text-info">{{ number_format($lahanPeternakan, 2) }}</h4>
                            <p class="text-muted mb-0">Hektar Peternakan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Status Rumah - Listrik</h4>
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>Status</th>
                                    <th class="text-center">Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($statusRumah['listrik'] as $status)
                                <tr>
                                    <td>{{ $status->status_rumah_listrik }}</td>
                                    <td class="text-center">{{ $status->jumlah }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Menu Laporan -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Menu Laporan</h4>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('admin.analytics.penduduk-per-dusun') }}" class="btn btn-outline-primary w-100">
                                <i class="fas fa-map-marker-alt"></i><br>
                                Penduduk per Dusun
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('admin.analytics.kk-expired') }}" class="btn btn-outline-warning w-100">
                                <i class="fas fa-calendar-times"></i><br>
                                KK Expired
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('admin.analytics.usia-produktif') }}" class="btn btn-outline-success w-100">
                                <i class="fas fa-briefcase"></i><br>
                                Usia Produktif
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('admin.analytics.usia-sekolah') }}" class="btn btn-outline-info w-100">
                                <i class="fas fa-graduation-cap"></i><br>
                                Usia Sekolah
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('admin.analytics.lansia') }}" class="btn btn-outline-secondary w-100">
                                <i class="fas fa-user-clock"></i><br>
                                Lansia
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('admin.analytics.bantuan-sosial') }}" class="btn btn-outline-danger w-100">
                                <i class="fas fa-hands-helping"></i><br>
                                Bantuan Sosial
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('admin.analytics.potensi-ekonomi') }}" class="btn btn-outline-dark w-100">
                                <i class="fas fa-chart-line"></i><br>
                                Potensi Ekonomi
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
