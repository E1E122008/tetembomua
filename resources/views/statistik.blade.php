@extends('layouts.app')

@section('title', 'Statistik Desa - Desa Tetembomua')

@section('content')
<!-- Hero Section -->
<section class="hero-section" style="background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('/FOTO/DSC_0605.JPG') center/cover;">
    <div class="container">
        <div class="row align-items-center min-vh-50">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-4 fw-bold text-white mb-4">Statistik Desa Tetembomua</h1>
                <p class="lead text-white mb-0">Data Statistik Terkini Penduduk, Pendidikan, Ekonomi, dan Kesehatan</p>
            </div>
        </div>
    </div>
</section>

<!-- Quick Stats -->
<section class="py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-number">2,847</h3>
                        <p class="stat-label">Total Penduduk</p>
                        <span class="stat-change positive">+2.3% dari tahun lalu</span>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-home"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-number">685</h3>
                        <p class="stat-label">Kepala Keluarga</p>
                        <span class="stat-change positive">+1.8% dari tahun lalu</span>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-number">89.5%</h3>
                        <p class="stat-label">Angka Melek Huruf</p>
                        <span class="stat-change positive">+1.2% dari tahun lalu</span>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-number">Rp 2.8M</h3>
                        <p class="stat-label">PAD Desa</p>
                        <span class="stat-change positive">+15.3% dari tahun lalu</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Demografi Penduduk -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center mb-5">
                <h2 class="section-title">Demografi Penduduk</h2>
                <div class="title-underline"></div>
                <p class="text-muted">Data kependudukan berdasarkan usia dan jenis kelamin</p>
            </div>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="chart-card">
                    <h4>Distribusi Usia Penduduk</h4>
                    <canvas id="ageChart" width="400" height="300"></canvas>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="chart-card">
                    <h4>Rasio Jenis Kelamin</h4>
                    <canvas id="genderChart" width="400" height="300"></canvas>
                </div>
            </div>
        </div>
        
        <div class="row mt-4">
            <div class="col-lg-12">
                <div class="table-card">
                    <h4>Data Penduduk per Dusun</h4>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Dusun</th>
                                    <th>Laki-laki</th>
                                    <th>Perempuan</th>
                                    <th>Total</th>
                                    <th>KK</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Dusun I</td>
                                    <td>485</td>
                                    <td>512</td>
                                    <td>997</td>
                                    <td>245</td>
                                </tr>
                                <tr>
                                    <td>Dusun II</td>
                                    <td>423</td>
                                    <td>456</td>
                                    <td>879</td>
                                    <td>198</td>
                                </tr>
                                <tr>
                                    <td>Dusun III</td>
                                    <td>467</td>
                                    <td>504</td>
                                    <td>971</td>
                                    <td>242</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Pendidikan -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center mb-5">
                <h2 class="section-title">Statistik Pendidikan</h2>
                <div class="title-underline"></div>
                <p class="text-muted">Data tingkat pendidikan dan fasilitas pendidikan</p>
            </div>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="chart-card">
                    <h4>Tingkat Pendidikan</h4>
                    <canvas id="educationChart" width="400" height="300"></canvas>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="chart-card">
                    <h4>Angka Partisipasi Sekolah</h4>
                    <canvas id="schoolParticipationChart" width="400" height="300"></canvas>
                </div>
            </div>
        </div>
        
        <div class="row mt-4">
            <div class="col-lg-12">
                <div class="table-card">
                    <h4>Fasilitas Pendidikan</h4>
                    <div class="row g-4">
                        <div class="col-lg-3 col-md-6">
                            <div class="facility-card">
                                <div class="facility-icon">
                                    <i class="fas fa-school"></i>
                                </div>
                                <h5>SD/MI</h5>
                                <p class="facility-count">3 Sekolah</p>
                                <p class="facility-students">456 Siswa</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="facility-card">
                                <div class="facility-icon">
                                    <i class="fas fa-graduation-cap"></i>
                                </div>
                                <h5>SMP/MTs</h5>
                                <p class="facility-count">1 Sekolah</p>
                                <p class="facility-students">234 Siswa</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="facility-card">
                                <div class="facility-icon">
                                    <i class="fas fa-university"></i>
                                </div>
                                <h5>SMA/SMK</h5>
                                <p class="facility-count">0 Sekolah</p>
                                <p class="facility-students">-</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="facility-card">
                                <div class="facility-icon">
                                    <i class="fas fa-book"></i>
                                </div>
                                <h5>Perpustakaan</h5>
                                <p class="facility-count">1 Unit</p>
                                <p class="facility-students">150 Buku</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Ekonomi -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center mb-5">
                <h2 class="section-title">Statistik Ekonomi</h2>
                <div class="title-underline"></div>
                <p class="text-muted">Data perekonomian dan mata pencaharian masyarakat</p>
            </div>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="chart-card">
                    <h4>Mata Pencaharian</h4>
                    <canvas id="occupationChart" width="400" height="300"></canvas>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="chart-card">
                    <h4>Pendapatan per Kapita</h4>
                    <canvas id="incomeChart" width="400" height="300"></canvas>
                </div>
            </div>
        </div>
        
        <div class="row mt-4">
            <div class="col-lg-12">
                <div class="table-card">
                    <h4>Data UMKM Desa</h4>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Jenis Usaha</th>
                                    <th>Jumlah Unit</th>
                                    <th>Tenaga Kerja</th>
                                    <th>Omset (Rp)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Warung Makan</td>
                                    <td>15</td>
                                    <td>45</td>
                                    <td>150.000.000</td>
                                </tr>
                                <tr>
                                    <td>Kerajinan Tangan</td>
                                    <td>8</td>
                                    <td>24</td>
                                    <td>75.000.000</td>
                                </tr>
                                <tr>
                                    <td>Konveksi</td>
                                    <td>5</td>
                                    <td>20</td>
                                    <td>120.000.000</td>
                                </tr>
                                <tr>
                                    <td>Jasa</td>
                                    <td>12</td>
                                    <td>36</td>
                                    <td>90.000.000</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Kesehatan -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center mb-5">
                <h2 class="section-title">Statistik Kesehatan</h2>
                <div class="title-underline"></div>
                <p class="text-muted">Data kesehatan masyarakat dan fasilitas kesehatan</p>
            </div>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="chart-card">
                    <h4>Status Gizi Balita</h4>
                    <canvas id="nutritionChart" width="400" height="300"></canvas>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="chart-card">
                    <h4>Fasilitas Kesehatan</h4>
                    <canvas id="healthFacilityChart" width="400" height="300"></canvas>
                </div>
            </div>
        </div>
        
        <div class="row mt-4">
            <div class="col-lg-12">
                <div class="table-card">
                    <h4>Data Kesehatan</h4>
                    <div class="row g-4">
                        <div class="col-lg-3 col-md-6">
                            <div class="health-stat-card">
                                <div class="health-stat-icon">
                                    <i class="fas fa-baby"></i>
                                </div>
                                <h5>Balita</h5>
                                <p class="health-stat-number">156</p>
                                <p class="health-stat-desc">Anak usia 0-5 tahun</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="health-stat-card">
                                <div class="health-stat-icon">
                                    <i class="fas fa-user-injured"></i>
                                </div>
                                <h5>Lansia</h5>
                                <p class="health-stat-number">234</p>
                                <p class="health-stat-desc">Usia 60+ tahun</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="health-stat-card">
                                <div class="health-stat-icon">
                                    <i class="fas fa-hospital"></i>
                                </div>
                                <h5>Posyandu</h5>
                                <p class="health-stat-number">3</p>
                                <p class="health-stat-desc">Unit pelayanan</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="health-stat-card">
                                <div class="health-stat-icon">
                                    <i class="fas fa-user-md"></i>
                                </div>
                                <h5>Bidan</h5>
                                <p class="health-stat-number">2</p>
                                <p class="health-stat-desc">Tenaga kesehatan</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-5" style="background: var(--primary-gradient);">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h3 class="text-white mb-4">Data Terkini dan Akurat</h3>
                <p class="text-white mb-4">Statistik desa diperbarui secara berkala untuk memberikan informasi yang akurat</p>
                <a href="{{ route('contact') }}" class="btn btn-light btn-lg">Minta Data Lengkap</a>
            </div>
        </div>
    </div>
</section>

<style>
.stat-card {
    background: white;
    padding: 2rem;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    display: flex;
    align-items: center;
    transition: all 0.3s ease;
    height: 100%;
}

.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0,0,0,0.15);
}

.stat-icon {
    width: 80px;
    height: 80px;
    background: var(--primary-gradient);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 1.5rem;
}

.stat-icon i {
    font-size: 2rem;
    color: white;
}

.stat-number {
    font-size: 2.5rem;
    font-weight: 700;
    color: var(--primary-green);
    margin-bottom: 0.5rem;
}

.stat-label {
    font-weight: 600;
    color: var(--text-dark);
    margin-bottom: 0.5rem;
}

.stat-change {
    font-size: 0.9rem;
    font-weight: 500;
}

.stat-change.positive {
    color: #28a745;
}

.stat-change.negative {
    color: #dc3545;
}

.chart-card {
    background: white;
    padding: 2rem;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    height: 100%;
}

.chart-card h4 {
    color: var(--primary-green);
    margin-bottom: 1.5rem;
    font-weight: 600;
    text-align: center;
}

.table-card {
    background: white;
    padding: 2rem;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}

.table-card h4 {
    color: var(--primary-green);
    margin-bottom: 1.5rem;
    font-weight: 600;
}

.facility-card {
    background: var(--bg-light);
    padding: 1.5rem;
    border-radius: 10px;
    text-align: center;
    transition: all 0.3s ease;
}

.facility-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
}

.facility-icon {
    width: 60px;
    height: 60px;
    background: var(--primary-gradient);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1rem;
}

.facility-icon i {
    font-size: 1.5rem;
    color: white;
}

.facility-card h5 {
    color: var(--primary-green);
    margin-bottom: 0.5rem;
    font-weight: 600;
}

.facility-count {
    font-size: 1.2rem;
    font-weight: 600;
    color: var(--text-dark);
    margin-bottom: 0.25rem;
}

.facility-students {
    font-size: 0.9rem;
    color: var(--text-light);
    margin-bottom: 0;
}

.health-stat-card {
    background: var(--bg-light);
    padding: 1.5rem;
    border-radius: 10px;
    text-align: center;
    transition: all 0.3s ease;
}

.health-stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
}

.health-stat-icon {
    width: 60px;
    height: 60px;
    background: var(--primary-gradient);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1rem;
}

.health-stat-icon i {
    font-size: 1.5rem;
    color: white;
}

.health-stat-card h5 {
    color: var(--primary-green);
    margin-bottom: 0.5rem;
    font-weight: 600;
}

.health-stat-number {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--text-dark);
    margin-bottom: 0.25rem;
}

.health-stat-desc {
    font-size: 0.9rem;
    color: var(--text-light);
    margin-bottom: 0;
}
</style>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Age Distribution Chart
    const ageCtx = document.getElementById('ageChart').getContext('2d');
    new Chart(ageCtx, {
        type: 'bar',
        data: {
            labels: ['0-4', '5-9', '10-14', '15-19', '20-24', '25-29', '30-34', '35-39', '40-44', '45-49', '50-54', '55-59', '60+'],
            datasets: [{
                label: 'Laki-laki',
                data: [89, 95, 102, 98, 85, 92, 88, 76, 68, 62, 58, 52, 78],
                backgroundColor: '#2E8B57',
                borderColor: '#2E8B57',
                borderWidth: 1
            }, {
                label: 'Perempuan',
                data: [92, 98, 105, 102, 88, 95, 92, 78, 72, 65, 60, 55, 82],
                backgroundColor: '#3CB371',
                borderColor: '#3CB371',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Gender Ratio Chart
    const genderCtx = document.getElementById('genderChart').getContext('2d');
    new Chart(genderCtx, {
        type: 'doughnut',
        data: {
            labels: ['Laki-laki', 'Perempuan'],
            datasets: [{
                data: [1375, 1472],
                backgroundColor: ['#2E8B57', '#3CB371'],
                borderWidth: 2,
                borderColor: '#fff'
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });

    // Education Level Chart
    const educationCtx = document.getElementById('educationChart').getContext('2d');
    new Chart(educationCtx, {
        type: 'pie',
        data: {
            labels: ['Tidak Sekolah', 'SD/MI', 'SMP/MTs', 'SMA/SMK', 'D3/S1', 'S2/S3'],
            datasets: [{
                data: [156, 892, 756, 623, 234, 45],
                backgroundColor: ['#FF6B6B', '#4ECDC4', '#45B7D1', '#96CEB4', '#FFEAA7', '#DDA0DD'],
                borderWidth: 2,
                borderColor: '#fff'
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });

    // School Participation Chart
    const participationCtx = document.getElementById('schoolParticipationChart').getContext('2d');
    new Chart(participationCtx, {
        type: 'line',
        data: {
            labels: ['2019', '2020', '2021', '2022', '2023', '2024'],
            datasets: [{
                label: 'SD/MI',
                data: [95.2, 94.8, 95.5, 96.1, 96.8, 97.2],
                borderColor: '#2E8B57',
                backgroundColor: 'rgba(46, 139, 87, 0.1)',
                tension: 0.4
            }, {
                label: 'SMP/MTs',
                data: [78.5, 79.2, 80.1, 81.5, 82.8, 83.5],
                borderColor: '#3CB371',
                backgroundColor: 'rgba(60, 179, 113, 0.1)',
                tension: 0.4
            }, {
                label: 'SMA/SMK',
                data: [45.2, 46.8, 48.5, 50.2, 52.1, 53.8],
                borderColor: '#20B2AA',
                backgroundColor: 'rgba(32, 178, 170, 0.1)',
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    max: 100
                }
            }
        }
    });

    // Occupation Chart
    const occupationCtx = document.getElementById('occupationChart').getContext('2d');
    new Chart(occupationCtx, {
        type: 'bar',
        data: {
            labels: ['Pertanian', 'Peternakan', 'Perdagangan', 'Jasa', 'PNS', 'Swasta', 'Lainnya'],
            datasets: [{
                label: 'Jumlah',
                data: [456, 234, 189, 156, 89, 123, 67],
                backgroundColor: '#2E8B57',
                borderColor: '#2E8B57',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Income Chart
    const incomeCtx = document.getElementById('incomeChart').getContext('2d');
    new Chart(incomeCtx, {
        type: 'line',
        data: {
            labels: ['2019', '2020', '2021', '2022', '2023', '2024'],
            datasets: [{
                label: 'Pendapatan per Kapita (Juta Rp)',
                data: [2.1, 2.3, 2.5, 2.8, 3.1, 3.4],
                borderColor: '#2E8B57',
                backgroundColor: 'rgba(46, 139, 87, 0.1)',
                tension: 0.4,
                fill: true
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Nutrition Chart
    const nutritionCtx = document.getElementById('nutritionChart').getContext('2d');
    new Chart(nutritionCtx, {
        type: 'doughnut',
        data: {
            labels: ['Baik', 'Kurang', 'Buruk'],
            datasets: [{
                data: [134, 18, 4],
                backgroundColor: ['#28a745', '#ffc107', '#dc3545'],
                borderWidth: 2,
                borderColor: '#fff'
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });

    // Health Facility Chart
    const healthCtx = document.getElementById('healthFacilityChart').getContext('2d');
    new Chart(healthCtx, {
        type: 'bar',
        data: {
            labels: ['Posyandu', 'Puskesmas', 'Klinik', 'Apotek'],
            datasets: [{
                label: 'Jumlah',
                data: [3, 1, 0, 2],
                backgroundColor: '#2E8B57',
                borderColor: '#2E8B57',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});
</script>
@endsection
