@extends('admin.layouts.app')

@section('title', 'Manajemen Berita - Admin Panel')

@section('content')
<!-- Content Header -->
<div class="content-header fade-in">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h2><i class="fas fa-newspaper me-2"></i>Manajemen Berita</h2>
            <p class="text-muted mb-0">Kelola berita dan informasi desa</p>
        </div>
        <div>
            <a href="{{ route('admin.news.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Tambah Berita
            </a>
        </div>
    </div>
</div>

<!-- Success Message -->
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="fas fa-check-circle me-2"></i>
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

<!-- News Table -->
<div class="card fade-in">
    <div class="card-header bg-transparent border-0">
        <h5 class="mb-0">
            <i class="fas fa-list me-2 text-primary"></i>
            Daftar Berita
        </h5>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($news as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>
                            <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}" 
                                 style="width: 60px; height: 40px; object-fit: cover; border-radius: 5px;">
                        </td>
                        <td>
                            <strong>{{ $item['title'] }}</strong>
                            <br>
                            <small class="text-muted">{{ Str::limit($item['content'], 100) }}</small>
                        </td>
                        <td>{{ $item['author'] }}</td>
                        <td>{{ date('d/m/Y', strtotime($item['date'])) }}</td>
                        <td>
                            @if($item['status'] == 'published')
                                <span class="badge bg-success">Published</span>
                            @else
                                <span class="badge bg-warning">Draft</span>
                            @endif
                        </td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="#" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="#" class="btn btn-sm btn-outline-info">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <button type="button" class="btn btn-sm btn-outline-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Statistics Cards -->
<div class="row mt-4">
    <div class="col-lg-3 col-md-6 mb-3">
        <div class="card stat-card slide-in">
            <div class="card-body text-center">
                <i class="fas fa-newspaper fa-3x text-primary mb-3"></i>
                <h3 class="mb-0">{{ count($news) }}</h3>
                <small>Total Berita</small>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 mb-3">
        <div class="card stat-card success slide-in">
            <div class="card-body text-center">
                <i class="fas fa-check-circle fa-3x text-success mb-3"></i>
                <h3 class="mb-0">{{ count(array_filter($news, fn($item) => $item['status'] == 'published')) }}</h3>
                <small>Published</small>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 mb-3">
        <div class="card stat-card warning slide-in">
            <div class="card-body text-center">
                <i class="fas fa-clock fa-3x text-warning mb-3"></i>
                <h3 class="mb-0">{{ count(array_filter($news, fn($item) => $item['status'] == 'draft')) }}</h3>
                <small>Draft</small>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 mb-3">
        <div class="card stat-card info slide-in">
            <div class="card-body text-center">
                <i class="fas fa-calendar fa-3x text-info mb-3"></i>
                <h3 class="mb-0">{{ count(array_filter($news, fn($item) => date('Y-m', strtotime($item['date'])) == date('Y-m'))) }}</h3>
                <small>Bulan Ini</small>
            </div>
        </div>
    </div>
</div>
@endsection
