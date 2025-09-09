@extends('admin.layouts.app')

@section('title', 'Impor Data - Upload')

@section('content')
<div class="container-fluid py-4">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-circle me-2"></i>
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Upload File Excel</h5>
                </div>
                <div class="card-body">
                    @php($hasDusun = \Illuminate\Support\Facades\Schema::hasTable('dusun'))
                    @if(!$hasDusun)
                        <div class="alert alert-warning mb-3">
                            Tabel <strong>dusun</strong> belum tersedia. Jalankan migrasi database terlebih dahulu agar fitur pemetaan dusun aktif.
                        </div>
                    @endif
                    <form method="post" action="{{ route('admin.import.handle') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="file" class="form-label">Pilih File (.xlsx, .xls, .csv)</label>
                            <input type="file" class="form-control" id="file" name="file" required>
                            @if($errors->has('file'))
                                <div class="text-danger small mt-1">{{ $errors->first('file') }}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="default_dusun" class="form-label">Set Dusun Default (opsional)</label>
                            <select class="form-select" id="default_dusun" name="default_dusun">
                                <option value="">— Tidak ditetapkan —</option>
                                @if($hasDusun)
                                    @php($dusunList = \App\Models\Dusun::orderBy('nama')->get())
                                    @foreach($dusunList as $d)
                                        <option value="{{ $d->id }}">{{ $d->nama }}</option>
                                    @endforeach
                                @endif
                            </select>
                            <div class="form-text">Jika file tidak memiliki kolom Dusun, semua KK akan memakai dusun ini.</div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Unggah & Normalisasi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


