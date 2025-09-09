@extends('admin.layouts.app')

@section('title', 'Detail Data Penduduk')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-user"></i> Detail Data Penduduk: {{ $penduduk->nama }}
                    </h3>
                    <div class="card-tools">
                        <a href="{{ route('penduduk.index') }}" class="btn btn-secondary btn-sm">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                        <a href="{{ route('penduduk.edit', $penduduk->id) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                    </div>
                </div>
                
                <div class="card-body">
<div class="row">
                        <!-- Identitas Dasar -->
    <div class="col-md-6">
                            <div class="card border-primary">
                                <div class="card-header bg-primary text-white">
                                    <h5 class="card-title mb-0">
                                        <i class="fas fa-id-card"></i> Identitas Dasar
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <table class="table table-borderless">
                                        <tr>
                                            <td width="40%"><strong>Nama Lengkap:</strong></td>
                <td>{{ $penduduk->nama }}</td>
            </tr>
            <tr>
                                            <td><strong>NIK:</strong></td>
                <td>{{ $penduduk->nik }}</td>
            </tr>
            <tr>
                                            <td><strong>No Kartu Keluarga:</strong></td>
                <td>{{ $penduduk->no_kk }}</td>
            </tr>
            <tr>
                                            <td><strong>Jenis Kelamin:</strong></td>
                                            <td>
                                                <span class="badge {{ $penduduk->jenis_kelamin == 'L' ? 'bg-primary' : 'bg-pink' }}">
                                                    {{ $penduduk->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
                                                </span>
                                            </td>
            </tr>
            <tr>
                                            <td><strong>Hubungan KK:</strong></td>
                <td>{{ $penduduk->hubungan_kepala_keluarga }}</td>
            </tr>
            <tr>
                                            <td><strong>Usia:</strong></td>
                                            <td>{{ $penduduk->usia }} tahun</td>
            </tr>
        </table>
    </div>
                            </div>
                        </div>

                        <!-- Data Kelahiran -->
    <div class="col-md-6">
                            <div class="card border-success">
                                <div class="card-header bg-success text-white">
                                    <h5 class="card-title mb-0">
                                        <i class="fas fa-birthday-cake"></i> Data Kelahiran
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <table class="table table-borderless">
                                        <tr>
                                            <td width="40%"><strong>Tempat Lahir:</strong></td>
                <td>{{ $penduduk->tempat_lahir }}</td>
            </tr>
            <tr>
                                            <td><strong>Tanggal Lahir:</strong></td>
                <td>{{ $penduduk->tanggal_lahir }}/{{ $penduduk->bulan_lahir }}/{{ $penduduk->tahun_lahir }}</td>
            </tr>
            <tr>
                                            <td><strong>Status Perkawinan:</strong></td>
                                            <td>
                                                <span class="badge bg-secondary">{{ $penduduk->status_perkawinan }}</span>
                                            </td>
            </tr>
            <tr>
                                            <td><strong>Suku:</strong></td>
                                            <td>{{ $penduduk->suku ?: '-' }}</td>
            </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <!-- Pendidikan & Pekerjaan -->
                        <div class="col-md-6">
                            <div class="card border-info">
                                <div class="card-header bg-info text-white">
                                    <h5 class="card-title mb-0">
                                        <i class="fas fa-graduation-cap"></i> Pendidikan & Pekerjaan
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <table class="table table-borderless">
                                        <tr>
                                            <td width="40%"><strong>Pendidikan Terakhir:</strong></td>
                <td>{{ $penduduk->pendidikan_terakhir }}</td>
            </tr>
            <tr>
                                            <td><strong>Mata Pencaharian:</strong></td>
                <td>{{ $penduduk->mata_pencaharian }}</td>
            </tr>
                                        <tr>
                                            <td><strong>Pekerjaan Tambahan:</strong></td>
                                            <td>{{ $penduduk->pekerjaan_tambahan ?: '-' }}</td>
            </tr>
        </table>
                                </div>
    </div>
</div>

                        <!-- Alamat & KK -->
    <div class="col-md-6">
                            <div class="card border-warning">
                                <div class="card-header bg-warning text-dark">
                                    <h5 class="card-title mb-0">
                                        <i class="fas fa-map-marker-alt"></i> Alamat & Kartu Keluarga
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <table class="table table-borderless">
                                        <tr>
                                            <td width="40%"><strong>Alamat:</strong></td>
                <td>{{ $penduduk->alamat_kartu_keluarga }}</td>
            </tr>
            <tr>
                                            <td><strong>Dusun:</strong></td>
                                            <td>
                                                @if($penduduk->kartuKeluarga && $penduduk->kartuKeluarga->dusun)
                                                    <span class="badge bg-info">{{ $penduduk->kartuKeluarga->dusun->nama }}</span>
                                                @else
                                                    <span class="text-muted">-</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Tanggal KK Dikeluarkan:</strong></td>
                <td>{{ $penduduk->tanggal_kk_dikeluarkan->format('d/m/Y') }}</td>
            </tr>
            <tr>
                                            <td><strong>Status KK:</strong></td>
                <td>
                    @if($penduduk->kk_expired)
                        <span class="badge bg-danger">Expired</span>
                    @else
                        <span class="badge bg-success">Aktif</span>
                    @endif
                </td>
            </tr>
        </table>
    </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <!-- Kendaraan -->
                        <div class="col-md-4">
                            <div class="card border-secondary">
                                <div class="card-header bg-secondary text-white">
                                    <h5 class="card-title mb-0">
                                        <i class="fas fa-car"></i> Kendaraan
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <table class="table table-borderless">
                                        <tr>
                                            <td width="50%"><strong>Mobil:</strong></td>
                                            <td>
                                                @if($penduduk->kendaraan_mobil)
                                                    <span class="badge bg-success">Ya</span>
                                                @else
                                                    <span class="badge bg-secondary">Tidak</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Motor:</strong></td>
                                            <td>
                                                @if($penduduk->kendaraan_motor)
                                                    <span class="badge bg-success">Ya</span>
                                                @else
                                                    <span class="badge bg-secondary">Tidak</span>
                    @endif
                </td>
            </tr>
            <tr>
                                            <td><strong>Sepeda:</strong></td>
                                            <td>
                                                @if($penduduk->kendaraan_sepeda)
                                                    <span class="badge bg-success">Ya</span>
                                                @else
                                                    <span class="badge bg-secondary">Tidak</span>
                                                @endif
                </td>
            </tr>
            <tr>
                                            <td><strong>Total Kendaraan:</strong></td>
                                            <td>
                                                <span class="badge bg-primary">{{ $penduduk->total_kendaraan }}</span>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Ternak -->
                        <div class="col-md-4">
                            <div class="card border-dark">
                                <div class="card-header bg-dark text-white">
                                    <h5 class="card-title mb-0">
                                        <i class="fas fa-paw"></i> Ternak
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <table class="table table-borderless">
                                        <tr>
                                            <td width="50%"><strong>Sapi:</strong></td>
                                            <td>{{ $penduduk->ternak_sapi }} ekor</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Kambing:</strong></td>
                                            <td>{{ $penduduk->ternak_kambing }} ekor</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Ayam:</strong></td>
                                            <td>{{ $penduduk->ternak_ayam }} ekor</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Ikan:</strong></td>
                                            <td>{{ $penduduk->ternak_ikan }} ekor</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Total Ternak:</strong></td>
                                            <td>
                                                <span class="badge bg-primary">{{ $penduduk->total_ternak }} ekor</span>
                </td>
            </tr>
        </table>
                                </div>
                            </div>
                        </div>

                        <!-- Lahan -->
                        <div class="col-md-4">
                            <div class="card border-success">
                                <div class="card-header bg-success text-white">
                                    <h5 class="card-title mb-0">
                                        <i class="fas fa-seedling"></i> Lahan
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <table class="table table-borderless">
                                        <tr>
                                            <td width="50%"><strong>Lahan Pertanian:</strong></td>
                                            <td>{{ number_format($penduduk->luas_lahan_pertanian, 2) }} m²</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Lahan Peternakan:</strong></td>
                                            <td>{{ number_format($penduduk->luas_lahan_peternakan, 2) }} m²</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Total Lahan:</strong></td>
                                            <td>
                                                <span class="badge bg-primary">{{ number_format($penduduk->total_lahan, 2) }} m²</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Komoditas Utama:</strong></td>
                                            <td>{{ $penduduk->komoditas_utama ?: '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Komoditas Buah & Sayur:</strong></td>
                                            <td>{{ $penduduk->komoditas_buah_sayur ?: '-' }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
    </div>
</div>

                    <div class="row mt-4">
                        <!-- Status Rumah -->
                        <div class="col-md-6">
                            <div class="card border-info">
                                <div class="card-header bg-info text-white">
                                    <h5 class="card-title mb-0">
                                        <i class="fas fa-home"></i> Status Rumah
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <table class="table table-borderless">
                                        <tr>
                                            <td width="40%"><strong>Kepemilikan:</strong></td>
                                            <td>{{ $penduduk->kepemilikan ?: '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Dinding:</strong></td>
                                            <td>{{ $penduduk->status_rumah_dinding ?: '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Atap:</strong></td>
                                            <td>{{ $penduduk->status_rumah_atap ?: '-' }}</td>
            </tr>
            <tr>
                                            <td><strong>Listrik:</strong></td>
                                            <td>{{ $penduduk->status_rumah_listrik ?: '-' }}</td>
            </tr>
            <tr>
                                            <td><strong>MCK:</strong></td>
                                            <td>{{ $penduduk->status_rumah_mck ?: '-' }}</td>
            </tr>
        </table>
    </div>
                            </div>
                        </div>

                        <!-- Status Bantuan -->
                        <div class="col-md-6">
                            <div class="card border-warning">
                                <div class="card-header bg-warning text-dark">
                                    <h5 class="card-title mb-0">
                                        <i class="fas fa-hand-holding-heart"></i> Status Bantuan
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <table class="table table-borderless">
                                        <tr>
                                            <td width="40%"><strong>Menerima Bantuan:</strong></td>
                                            <td>
                                                @if($penduduk->status_bantuan)
                                                    <span class="badge bg-success">Ya</span>
                                                @else
                                                    <span class="badge bg-secondary">Tidak</span>
                                                @endif
                                            </td>
                                        </tr>
                                    </table>
                                    
                                    @if($penduduk->status_bantuan)
                                        <div class="alert alert-success mt-3">
                                            <i class="fas fa-check-circle"></i>
                                            <strong>Penduduk menerima bantuan pemerintah</strong>
</div>
@endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Informasi Tambahan -->
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="card border-light">
                                <div class="card-header bg-light">
                                    <h5 class="card-title mb-0">
                                        <i class="fas fa-info-circle"></i> Informasi Tambahan
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p><strong>Data dibuat:</strong> {{ $penduduk->created_at->format('d/m/Y H:i') }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p><strong>Terakhir diupdate:</strong> {{ $penduduk->updated_at->format('d/m/Y H:i') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card-footer">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('penduduk.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali ke Daftar
                        </a>
                        <div>
                            <a href="{{ route('penduduk.edit', $penduduk->id) }}" class="btn btn-warning">
                                <i class="fas fa-edit"></i> Edit Data
                            </a>
                            <button type="button" class="btn btn-danger" 
                                    onclick="confirmDelete({{ $penduduk->id }}, '{{ $penduduk->nama }}')">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus data penduduk <strong id="deleteName"></strong>?</p>
                <p class="text-danger"><small>Tindakan ini tidak dapat dibatalkan.</small></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <form id="deleteForm" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function confirmDelete(id, name) {
    document.getElementById('deleteName').textContent = name;
    document.getElementById('deleteForm').action = '{{ route("penduduk.destroy", ":id") }}'.replace(':id', id);
    new bootstrap.Modal(document.getElementById('deleteModal')).show();
}
</script>
@endpush

@push('styles')
<style>
.bg-pink {
    background-color: #e91e63 !important;
    color: white !important;
}

.card {
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
    border: 1px solid rgba(0, 0, 0, 0.125);
}

.card-header {
    border-bottom: 1px solid rgba(0, 0, 0, 0.125);
}

.table-borderless td {
    border: none;
    padding: 0.5rem 0;
}

.badge {
    font-size: 0.75em;
}

.alert {
    border: 1px solid transparent;
    border-radius: 0.375rem;
}

.card-footer {
    background-color: #f8f9fa;
    border-top: 1px solid #dee2e6;
}
</style>
@endpush