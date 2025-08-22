<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Desa Tetembomua</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .sidebar {
            background: linear-gradient(135deg, #2E7D32 0%, #4CAF50 100%);
            min-height: 100vh;
            color: white;
        }
        .sidebar .nav-link {
            color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            margin: 5px 0;
        }
        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
        }
        .main-content {
            padding: 2rem;
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        .stat-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }
        .stat-card.success {
            background: linear-gradient(135deg, #2E7D32 0%, #4CAF50 100%);
        }
        .stat-card.warning {
            background: linear-gradient(135deg, #FF9800 0%, #FFC107 100%);
        }
        .stat-card.info {
            background: linear-gradient(135deg, #2196F3 0%, #03A9F4 100%);
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 sidebar p-3">
                <div class="text-center mb-4">
                    <i class="fas fa-leaf fa-3x mb-2"></i>
                    <h5>Admin Panel</h5>
                    <small>Desa Tetembomua</small>
                </div>
                
                <nav class="nav flex-column">
                    <a class="nav-link active" href="#">
                        <i class="fas fa-tachometer-alt me-2"></i>
                        Dashboard
                    </a>
                    <a class="nav-link" href="#">
                        <i class="fas fa-newspaper me-2"></i>
                        Berita
                    </a>
                    <a class="nav-link" href="#">
                        <i class="fas fa-users me-2"></i>
                        Data Penduduk
                    </a>
                    <a class="nav-link" href="#">
                        <i class="fas fa-seedling me-2"></i>
                        Data Pertanian
                    </a>
                    <a class="nav-link" href="#">
                        <i class="fas fa-user-cog me-2"></i>
                        Manajemen User
                    </a>
                    <a class="nav-link" href="#">
                        <i class="fas fa-cog me-2"></i>
                        Pengaturan
                    </a>
                    <hr class="my-3">
                    <a class="nav-link" href="{{ route('home') }}">
                        <i class="fas fa-home me-2"></i>
                        Kembali ke Website
                    </a>
                    <a class="nav-link" href="#">
                        <i class="fas fa-sign-out-alt me-2"></i>
                        Logout
                    </a>
                </nav>
            </div>

            <!-- Main Content -->
            <div class="col-md-9 col-lg-10 main-content">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2><i class="fas fa-tachometer-alt me-2"></i>Dashboard</h2>
                    <div class="text-muted">
                        <i class="fas fa-calendar me-1"></i>
                        {{ date('d F Y') }}
                    </div>
                </div>

                <!-- Statistics Cards -->
                <div class="row mb-4">
                    <div class="col-md-3 mb-3">
                        <div class="card stat-card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h3 class="mb-0">15</h3>
                                        <small>Total Berita</small>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="fas fa-newspaper fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card stat-card success">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h3 class="mb-0">12</h3>
                                        <small>Berita Dipublikasi</small>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="fas fa-check-circle fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card stat-card warning">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h3 class="mb-0">3</h3>
                                        <small>Draft Berita</small>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="fas fa-edit fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card stat-card info">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h3 class="mb-0">5</h3>
                                        <small>Total User</small>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="fas fa-users fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Content Cards -->
                <div class="row">
                    <div class="col-lg-8 mb-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0">
                                    <i class="fas fa-newspaper me-2"></i>
                                    Berita Terbaru
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="list-group list-group-flush">
                                    <div class="list-group-item d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6 class="mb-1">Panen Kelapa Sawit Berhasil</h6>
                                            <small class="text-muted">
                                                <i class="fas fa-user me-1"></i>Admin
                                                <i class="fas fa-calendar ms-2 me-1"></i>15 Des 2024
                                            </small>
                                        </div>
                                        <span class="badge bg-success">Published</span>
                                    </div>
                                    <div class="list-group-item d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6 class="mb-1">Pelatihan Teknologi Pertanian</h6>
                                            <small class="text-muted">
                                                <i class="fas fa-user me-1"></i>Admin
                                                <i class="fas fa-calendar ms-2 me-1"></i>14 Des 2024
                                            </small>
                                        </div>
                                        <span class="badge bg-success">Published</span>
                                    </div>
                                    <div class="list-group-item d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6 class="mb-1">Update Data Kependudukan</h6>
                                            <small class="text-muted">
                                                <i class="fas fa-user me-1"></i>Admin
                                                <i class="fas fa-calendar ms-2 me-1"></i>13 Des 2024
                                            </small>
                                        </div>
                                        <span class="badge bg-warning">Draft</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 mb-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0">
                                    <i class="fas fa-chart-pie me-2"></i>
                                    Statistik Desa
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="text-center mb-3">
                                    <h4 class="text-primary">2,500</h4>
                                    <p class="text-muted mb-0">Total Penduduk</p>
                                </div>
                                <div class="row text-center">
                                    <div class="col-6">
                                        <h6 class="text-info">1,250</h6>
                                        <small class="text-muted">Laki-laki</small>
                                    </div>
                                    <div class="col-6">
                                        <h6 class="text-danger">1,250</h6>
                                        <small class="text-muted">Perempuan</small>
                                    </div>
                                </div>
                                <hr>
                                <div class="text-center">
                                    <h6 class="text-success">1,250 Ha</h6>
                                    <small class="text-muted">Luas Lahan Pertanian</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0">
                                    <i class="fas fa-bolt me-2"></i>
                                    Aksi Cepat
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3 mb-2">
                                        <a href="#" class="btn btn-primary w-100">
                                            <i class="fas fa-plus me-2"></i>
                                            Tambah Berita
                                        </a>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <a href="#" class="btn btn-success w-100">
                                            <i class="fas fa-users me-2"></i>
                                            Update Data Penduduk
                                        </a>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <a href="#" class="btn btn-warning w-100">
                                            <i class="fas fa-seedling me-2"></i>
                                            Update Data Pertanian
                                        </a>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <a href="#" class="btn btn-info w-100">
                                            <i class="fas fa-user-plus me-2"></i>
                                            Tambah User
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
