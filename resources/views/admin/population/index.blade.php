@extends('admin.layouts.app')

@section('title', 'Kelola Penduduk')

@section('content')
<div class="content-header mb-4">
    <h2>Kelola Data Penduduk</h2>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#importModal">
        <i class="fas fa-file-excel"></i> Import Excel
    </button>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

<div class="card p-3">
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-sm">
            <thead class="table-dark">
                <tr>
                    <th rowspan="2">No</th>
                    <th rowspan="2">Nama</th>
                    <th rowspan="2">Alamat KK</th>
                    <th rowspan="2">KK Dikeluarkan</th>
                    <th rowspan="2">No. KK</th>
                    <th rowspan="2">NIK</th>
                    <th rowspan="2">Laki-laki/Perempuan</th>
                    <th rowspan="2">Hubungan Kepala Keluarga</th>
                    <th rowspan="2">Tempat Lahir</th>
                    <th rowspan="2">Tanggal Lahir</th>
                    <th rowspan="2">Bulan Lahir</th>
                    <th rowspan="2">Tahun Lahir</th>
                    <th rowspan="2">Status</th>
                    <th rowspan="2">Suku</th>
                    <th rowspan="2">Pendidikan Terakhir</th>
                    <th rowspan="2">Mata Pencarian</th>
                    <th rowspan="2">Pekerjaan Tambahan</th>
                    <th rowspan="2">Pertanian</th>
                    <th rowspan="2">Komoditas Utama</th>
                    <th rowspan="2">Komoditas Buah & Sayur</th>
                    <th rowspan="2">Bantuan</th>
                    
                    <th rowspan="2">Aksi</th>
                    
                </tr>
            </thead>
            <tbody>
                @php(
                    $sorted = $populations
                        ->sortBy('nama')
                        ->sortBy(function($p){
                            $key = strtoupper(trim($p->hubungan_kepala_keluarga ?? ''));
                            $priority = ['KK' => 0, 'ISTRI' => 1, 'ANAK' => 2];
                            return $priority[$key] ?? 99;
                        })
                        ->sortBy('no_kk')
                )
                @forelse($sorted as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->alamat_kk }}</td>
                    <td>
                        @if(!empty($item->kk_dikeluarkan))
                            {{ \Carbon\Carbon::parse($item->kk_dikeluarkan)->format('Y-m-d') }}
                        @else
                            -
                        @endif
                    </td>
                    <td>{{ $item->no_kk }}</td>
                    <td>{{ $item->nik }}</td>
                    <td>{{ $item->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                    <td>{{ $item->hubungan_kepala_keluarga }}</td>
                    <td>{{ $item->tempat_lahir }}</td>
                    @php($d = preg_replace('/[^0-9]/','', (string)($item->tanggal_lahir ?? '')))
                    @php($m = preg_replace('/[^0-9]/','', (string)($item->bulan_lahir ?? '')))
                    @php($y = preg_replace('/[^0-9]/','', (string)($item->tahun_lahir ?? '')))
                    <td>{{ $d !== '' ? str_pad($d, 2, '0', STR_PAD_LEFT) : (isset($item->tanggal_lahir) ? $item->tanggal_lahir : '-') }}</td>
                    <td>{{ $m !== '' ? str_pad($m, 2, '0', STR_PAD_LEFT) : (isset($item->bulan_lahir) ? $item->bulan_lahir : '-') }}</td>
                    <td>{{ $y !== '' ? $y : (isset($item->tahun_lahir) ? $item->tahun_lahir : '-') }}</td>
                    <td>{{ $item->status_perkawinan }}</td>
                    <td>{{ $item->suku }}</td>
                    <td>{{ $item->pendidikan_terakhir }}</td>
                    <td>{{ $item->mata_pencaharian }}</td>
                    <td>{{ $item->pekerjaan_tambahan ?? '-' }}</td>
                    <td>{{ number_format((float)($item->luas_lahan_pertanian ?? 0), 4, '.', '') }}</td>
                    <td>{{ $item->komoditas_utama }}</td>
                    <td>{{ $item->komoditas_buah_sayur }}</td>
                    <td>{{ $item->bantuan }}</td>
                    
                    <td>
                        <a href="#" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                        <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="35" class="text-center">Belum ada data penduduk.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Import Excel -->
<div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="{{ route('admin.population.import') }}" method="POST" enctype="multipart/form-data" class="modal-content">
      @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="importModalLabel">Import Data Penduduk dari Excel</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label for="file" class="form-label">Pilih File Excel (.xlsx)</label>
          <input type="file" class="form-control" name="file" id="file" accept=".xlsx,.xls" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Import</button>
      </div>
    </form>
  </div>
</div>
@endsection