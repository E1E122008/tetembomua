@extends('admin.layouts.app')

@section('title', 'Edit Data Penduduk')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-user-edit"></i> Edit Data Penduduk: {{ $penduduk->nama }}
                    </h3>
                    <div class="card-tools">
                        <a href="{{ route('penduduk.index') }}" class="btn btn-secondary btn-sm">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
                
                <form action="{{ route('penduduk.update', $penduduk->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
<div class="row">
                            <!-- Identitas Dasar -->
    <div class="col-md-6">
                                <h5 class="text-primary mb-3">
                                    <i class="fas fa-id-card"></i> Identitas Dasar
                                </h5>
                                
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror" 
                                           id="nama" name="nama" value="{{ old('nama', $penduduk->nama) }}" required>
                                    @error('nama')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="nik" class="form-label">NIK <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('nik') is-invalid @enderror" 
                                           id="nik" name="nik" value="{{ old('nik', $penduduk->nik) }}" maxlength="16" required>
                                    @error('nik')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="no_kk" class="form-label">No Kartu Keluarga <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('no_kk') is-invalid @enderror" 
                                           id="no_kk" name="no_kk" value="{{ old('no_kk', $penduduk->no_kk) }}" maxlength="20" required>
                                    @error('no_kk')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin <span class="text-danger">*</span></label>
                                    <select class="form-select @error('jenis_kelamin') is-invalid @enderror" 
                                            id="jenis_kelamin" name="jenis_kelamin" required>
                                        <option value="">-- Pilih Jenis Kelamin --</option>
                                        <option value="L" {{ old('jenis_kelamin', $penduduk->jenis_kelamin) == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="P" {{ old('jenis_kelamin', $penduduk->jenis_kelamin) == 'P' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                    @error('jenis_kelamin')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

        <div class="mb-3">
                                    <label for="hubungan_kepala_keluarga" class="form-label">Hubungan dengan Kepala Keluarga <span class="text-danger">*</span></label>
                                    <select class="form-select @error('hubungan_kepala_keluarga') is-invalid @enderror" 
                                            id="hubungan_kepala_keluarga" name="hubungan_kepala_keluarga" required>
                                        <option value="">-- Pilih Hubungan --</option>
                                        <option value="Kepala Keluarga" {{ old('hubungan_kepala_keluarga', $penduduk->hubungan_kepala_keluarga) == 'Kepala Keluarga' ? 'selected' : '' }}>Kepala Keluarga</option>
                                        <option value="Istri" {{ old('hubungan_kepala_keluarga', $penduduk->hubungan_kepala_keluarga) == 'Istri' ? 'selected' : '' }}>Istri</option>
                                        <option value="Anak" {{ old('hubungan_kepala_keluarga', $penduduk->hubungan_kepala_keluarga) == 'Anak' ? 'selected' : '' }}>Anak</option>
                                        <option value="Menantu" {{ old('hubungan_kepala_keluarga', $penduduk->hubungan_kepala_keluarga) == 'Menantu' ? 'selected' : '' }}>Menantu</option>
                                        <option value="Cucu" {{ old('hubungan_kepala_keluarga', $penduduk->hubungan_kepala_keluarga) == 'Cucu' ? 'selected' : '' }}>Cucu</option>
                                        <option value="Orang Tua" {{ old('hubungan_kepala_keluarga', $penduduk->hubungan_kepala_keluarga) == 'Orang Tua' ? 'selected' : '' }}>Orang Tua</option>
                                        <option value="Mertua" {{ old('hubungan_kepala_keluarga', $penduduk->hubungan_kepala_keluarga) == 'Mertua' ? 'selected' : '' }}>Mertua</option>
                                        <option value="Famili Lain" {{ old('hubungan_kepala_keluarga', $penduduk->hubungan_kepala_keluarga) == 'Famili Lain' ? 'selected' : '' }}>Famili Lain</option>
                                        <option value="Pembantu" {{ old('hubungan_kepala_keluarga', $penduduk->hubungan_kepala_keluarga) == 'Pembantu' ? 'selected' : '' }}>Pembantu</option>
                                        <option value="Lainnya" {{ old('hubungan_kepala_keluarga', $penduduk->hubungan_kepala_keluarga) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                    </select>
                                    @error('hubungan_kepala_keluarga')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
        </div>
    </div>

                            <!-- Data Kelahiran -->
    <div class="col-md-6">
                                <h5 class="text-primary mb-3">
                                    <i class="fas fa-birthday-cake"></i> Data Kelahiran
                                </h5>

                                <div class="mb-3">
                                    <label for="tempat_lahir" class="form-label">Tempat Lahir <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" 
                                           id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir', $penduduk->tempat_lahir) }}" required>
                                    @error('tempat_lahir')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label for="tanggal_lahir" class="form-label">Tanggal <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control @error('tanggal_lahir') is-invalid @enderror" 
                                                   id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir', $penduduk->tanggal_lahir) }}" 
                                                   min="1" max="31" required>
                                            @error('tanggal_lahir')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-4">
        <div class="mb-3">
                                            <label for="bulan_lahir" class="form-label">Bulan <span class="text-danger">*</span></label>
                                            <select class="form-select @error('bulan_lahir') is-invalid @enderror" 
                                                    id="bulan_lahir" name="bulan_lahir" required>
                                                <option value="">--</option>
                                                @for($i = 1; $i <= 12; $i++)
                                                    <option value="{{ $i }}" {{ old('bulan_lahir', $penduduk->bulan_lahir) == $i ? 'selected' : '' }}>
                                                        {{ $i }}
                                                    </option>
                                                @endfor
                                            </select>
                                            @error('bulan_lahir')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
        </div>
    </div>
                                    <div class="col-4">
        <div class="mb-3">
                                            <label for="tahun_lahir" class="form-label">Tahun <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control @error('tahun_lahir') is-invalid @enderror" 
                                                   id="tahun_lahir" name="tahun_lahir" value="{{ old('tahun_lahir', $penduduk->tahun_lahir) }}" 
                                                   min="1900" max="{{ date('Y') }}" required>
                                            @error('tahun_lahir')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
        </div>
    </div>

        <div class="mb-3">
                                    <label for="status_perkawinan" class="form-label">Status Perkawinan <span class="text-danger">*</span></label>
                                    <select class="form-select @error('status_perkawinan') is-invalid @enderror" 
                                            id="status_perkawinan" name="status_perkawinan" required>
                                        <option value="">-- Pilih Status --</option>
                                        <option value="Belum Kawin" {{ old('status_perkawinan', $penduduk->status_perkawinan) == 'Belum Kawin' ? 'selected' : '' }}>Belum Kawin</option>
                                        <option value="Kawin" {{ old('status_perkawinan', $penduduk->status_perkawinan) == 'Kawin' ? 'selected' : '' }}>Kawin</option>
                                        <option value="Cerai Hidup" {{ old('status_perkawinan', $penduduk->status_perkawinan) == 'Cerai Hidup' ? 'selected' : '' }}>Cerai Hidup</option>
                                        <option value="Cerai Mati" {{ old('status_perkawinan', $penduduk->status_perkawinan) == 'Cerai Mati' ? 'selected' : '' }}>Cerai Mati</option>
            </select>
                                    @error('status_perkawinan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="suku" class="form-label">Suku</label>
                                    <input type="text" class="form-control @error('suku') is-invalid @enderror" 
                                           id="suku" name="suku" value="{{ old('suku', $penduduk->suku) }}">
                                    @error('suku')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
        </div>
    </div>

                        <hr>

                        <div class="row">
                            <!-- Pendidikan & Pekerjaan -->
    <div class="col-md-6">
                                <h5 class="text-primary mb-3">
                                    <i class="fas fa-graduation-cap"></i> Pendidikan & Pekerjaan
                                </h5>

                                <div class="mb-3">
                                    <label for="pendidikan_terakhir" class="form-label">Pendidikan Terakhir <span class="text-danger">*</span></label>
                                    <select class="form-select @error('pendidikan_terakhir') is-invalid @enderror" 
                                            id="pendidikan_terakhir" name="pendidikan_terakhir" required>
                                        <option value="">-- Pilih Pendidikan --</option>
                                        <option value="Tidak Sekolah" {{ old('pendidikan_terakhir', $penduduk->pendidikan_terakhir) == 'Tidak Sekolah' ? 'selected' : '' }}>Tidak Sekolah</option>
                                        <option value="Tidak Tamat SD" {{ old('pendidikan_terakhir', $penduduk->pendidikan_terakhir) == 'Tidak Tamat SD' ? 'selected' : '' }}>Tidak Tamat SD</option>
                                        <option value="Tamat SD" {{ old('pendidikan_terakhir', $penduduk->pendidikan_terakhir) == 'Tamat SD' ? 'selected' : '' }}>Tamat SD</option>
                                        <option value="SLTP" {{ old('pendidikan_terakhir', $penduduk->pendidikan_terakhir) == 'SLTP' ? 'selected' : '' }}>SLTP</option>
                                        <option value="SLTA" {{ old('pendidikan_terakhir', $penduduk->pendidikan_terakhir) == 'SLTA' ? 'selected' : '' }}>SLTA</option>
                                        <option value="D I/D II" {{ old('pendidikan_terakhir', $penduduk->pendidikan_terakhir) == 'D I/D II' ? 'selected' : '' }}>D I/D II</option>
                                        <option value="D III" {{ old('pendidikan_terakhir', $penduduk->pendidikan_terakhir) == 'D III' ? 'selected' : '' }}>D III</option>
                                        <option value="D IV/S1" {{ old('pendidikan_terakhir', $penduduk->pendidikan_terakhir) == 'D IV/S1' ? 'selected' : '' }}>D IV/S1</option>
                                        <option value="S2" {{ old('pendidikan_terakhir', $penduduk->pendidikan_terakhir) == 'S2' ? 'selected' : '' }}>S2</option>
                                        <option value="S3" {{ old('pendidikan_terakhir', $penduduk->pendidikan_terakhir) == 'S3' ? 'selected' : '' }}>S3</option>
                                    </select>
                                    @error('pendidikan_terakhir')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

        <div class="mb-3">
                                    <label for="mata_pencaharian" class="form-label">Mata Pencaharian <span class="text-danger">*</span></label>
                                    <select class="form-select @error('mata_pencaharian') is-invalid @enderror" 
                                            id="mata_pencaharian" name="mata_pencaharian" required>
                                        <option value="">-- Pilih Pekerjaan --</option>
                                        <option value="Tidak Bekerja" {{ old('mata_pencaharian', $penduduk->mata_pencaharian) == 'Tidak Bekerja' ? 'selected' : '' }}>Tidak Bekerja</option>
                                        <option value="Petani" {{ old('mata_pencaharian', $penduduk->mata_pencaharian) == 'Petani' ? 'selected' : '' }}>Petani</option>
                                        <option value="Buruh Tani" {{ old('mata_pencaharian', $penduduk->mata_pencaharian) == 'Buruh Tani' ? 'selected' : '' }}>Buruh Tani</option>
                                        <option value="Nelayan" {{ old('mata_pencaharian', $penduduk->mata_pencaharian) == 'Nelayan' ? 'selected' : '' }}>Nelayan</option>
                                        <option value="Wiraswasta" {{ old('mata_pencaharian', $penduduk->mata_pencaharian) == 'Wiraswasta' ? 'selected' : '' }}>Wiraswasta</option>
                                        <option value="Karyawan Swasta" {{ old('mata_pencaharian', $penduduk->mata_pencaharian) == 'Karyawan Swasta' ? 'selected' : '' }}>Karyawan Swasta</option>
                                        <option value="PNS" {{ old('mata_pencaharian', $penduduk->mata_pencaharian) == 'PNS' ? 'selected' : '' }}>PNS</option>
                                        <option value="TNI/Polri" {{ old('mata_pencaharian', $penduduk->mata_pencaharian) == 'TNI/Polri' ? 'selected' : '' }}>TNI/Polri</option>
                                        <option value="IRT" {{ old('mata_pencaharian', $penduduk->mata_pencaharian) == 'IRT' ? 'selected' : '' }}>Ibu Rumah Tangga</option>
                                        <option value="Pelajar/Mahasiswa" {{ old('mata_pencaharian', $penduduk->mata_pencaharian) == 'Pelajar/Mahasiswa' ? 'selected' : '' }}>Pelajar/Mahasiswa</option>
                                        <option value="Lainnya" {{ old('mata_pencaharian', $penduduk->mata_pencaharian) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
            </select>
                                    @error('mata_pencaharian')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="pekerjaan_tambahan" class="form-label">Pekerjaan Tambahan</label>
                                    <input type="text" class="form-control @error('pekerjaan_tambahan') is-invalid @enderror" 
                                           id="pekerjaan_tambahan" name="pekerjaan_tambahan" value="{{ old('pekerjaan_tambahan', $penduduk->pekerjaan_tambahan) }}">
                                    @error('pekerjaan_tambahan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
        </div>
    </div>

                            <!-- Alamat & KK -->
    <div class="col-md-6">
                                <h5 class="text-primary mb-3">
                                    <i class="fas fa-map-marker-alt"></i> Alamat & Kartu Keluarga
                                </h5>

                                <div class="mb-3">
                                    <label for="alamat_kartu_keluarga" class="form-label">Alamat <span class="text-danger">*</span></label>
                                    <textarea class="form-control @error('alamat_kartu_keluarga') is-invalid @enderror" 
                                              id="alamat_kartu_keluarga" name="alamat_kartu_keluarga" rows="3" required>{{ old('alamat_kartu_keluarga', $penduduk->alamat_kartu_keluarga) }}</textarea>
                                    @error('alamat_kartu_keluarga')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

        <div class="mb-3">
                                    <label for="tanggal_kk_dikeluarkan" class="form-label">Tanggal KK Dikeluarkan <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control @error('tanggal_kk_dikeluarkan') is-invalid @enderror" 
                                           id="tanggal_kk_dikeluarkan" name="tanggal_kk_dikeluarkan" 
                                           value="{{ old('tanggal_kk_dikeluarkan', $penduduk->tanggal_kk_dikeluarkan->format('Y-m-d')) }}" required>
                                    @error('tanggal_kk_dikeluarkan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
        </div>
    </div>

                        <hr>

                        <div class="row">
                            <!-- Kendaraan -->
    <div class="col-md-4">
                                <h5 class="text-primary mb-3">
                                    <i class="fas fa-car"></i> Kendaraan
                                </h5>

                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="kendaraan_mobil" name="kendaraan_mobil" value="1" 
                                           {{ old('kendaraan_mobil', $penduduk->kendaraan_mobil) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="kendaraan_mobil">Mobil</label>
                                </div>

                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="kendaraan_motor" name="kendaraan_motor" value="1" 
                                           {{ old('kendaraan_motor', $penduduk->kendaraan_motor) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="kendaraan_motor">Motor</label>
                                </div>

                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="kendaraan_sepeda" name="kendaraan_sepeda" value="1" 
                                           {{ old('kendaraan_sepeda', $penduduk->kendaraan_sepeda) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="kendaraan_sepeda">Sepeda</label>
        </div>
    </div>

                            <!-- Ternak -->
    <div class="col-md-4">
                                <h5 class="text-primary mb-3">
                                    <i class="fas fa-paw"></i> Ternak
                                </h5>

                                <div class="mb-3">
                                    <label for="ternak_sapi" class="form-label">Sapi</label>
                                    <input type="number" class="form-control" id="ternak_sapi" name="ternak_sapi" 
                                           value="{{ old('ternak_sapi', $penduduk->ternak_sapi) }}" min="0">
                                </div>

                                <div class="mb-3">
                                    <label for="ternak_kambing" class="form-label">Kambing</label>
                                    <input type="number" class="form-control" id="ternak_kambing" name="ternak_kambing" 
                                           value="{{ old('ternak_kambing', $penduduk->ternak_kambing) }}" min="0">
                                </div>

                                <div class="mb-3">
                                    <label for="ternak_ayam" class="form-label">Ayam</label>
                                    <input type="number" class="form-control" id="ternak_ayam" name="ternak_ayam" 
                                           value="{{ old('ternak_ayam', $penduduk->ternak_ayam) }}" min="0">
                                </div>

        <div class="mb-3">
                                    <label for="ternak_ikan" class="form-label">Ikan</label>
                                    <input type="number" class="form-control" id="ternak_ikan" name="ternak_ikan" 
                                           value="{{ old('ternak_ikan', $penduduk->ternak_ikan) }}" min="0">
        </div>
    </div>

                            <!-- Lahan -->
    <div class="col-md-4">
                                <h5 class="text-primary mb-3">
                                    <i class="fas fa-seedling"></i> Lahan
                                </h5>

                                <div class="mb-3">
                                    <label for="luas_lahan_pertanian" class="form-label">Lahan Pertanian (m²)</label>
                                    <input type="number" class="form-control" id="luas_lahan_pertanian" name="luas_lahan_pertanian" 
                                           value="{{ old('luas_lahan_pertanian', $penduduk->luas_lahan_pertanian) }}" min="0" step="0.01">
                                </div>

                                <div class="mb-3">
                                    <label for="luas_lahan_peternakan" class="form-label">Lahan Peternakan (m²)</label>
                                    <input type="number" class="form-control" id="luas_lahan_peternakan" name="luas_lahan_peternakan" 
                                           value="{{ old('luas_lahan_peternakan', $penduduk->luas_lahan_peternakan) }}" min="0" step="0.01">
                                </div>

                                <div class="mb-3">
                                    <label for="komoditas_utama" class="form-label">Komoditas Utama</label>
                                    <input type="text" class="form-control" id="komoditas_utama" name="komoditas_utama" 
                                           value="{{ old('komoditas_utama', $penduduk->komoditas_utama) }}">
                                </div>

        <div class="mb-3">
                                    <label for="komoditas_buah_sayur" class="form-label">Komoditas Buah & Sayur</label>
                                    <input type="text" class="form-control" id="komoditas_buah_sayur" name="komoditas_buah_sayur" 
                                           value="{{ old('komoditas_buah_sayur', $penduduk->komoditas_buah_sayur) }}">
                                </div>
        </div>
    </div>

                        <hr>

                        <div class="row">
                            <!-- Status Rumah -->
    <div class="col-md-6">
                                <h5 class="text-primary mb-3">
                                    <i class="fas fa-home"></i> Status Rumah
                                </h5>

        <div class="mb-3">
                                    <label for="kepemilikan" class="form-label">Kepemilikan Rumah</label>
                                    <select class="form-select" id="kepemilikan" name="kepemilikan">
                                        <option value="">-- Pilih Kepemilikan --</option>
                                        <option value="Milik Sendiri" {{ old('kepemilikan', $penduduk->kepemilikan) == 'Milik Sendiri' ? 'selected' : '' }}>Milik Sendiri</option>
                                        <option value="Kontrak" {{ old('kepemilikan', $penduduk->kepemilikan) == 'Kontrak' ? 'selected' : '' }}>Kontrak</option>
                                        <option value="Sewa" {{ old('kepemilikan', $penduduk->kepemilikan) == 'Sewa' ? 'selected' : '' }}>Sewa</option>
                                        <option value="Bebas Sewa" {{ old('kepemilikan', $penduduk->kepemilikan) == 'Bebas Sewa' ? 'selected' : '' }}>Bebas Sewa</option>
                                        <option value="Lainnya" {{ old('kepemilikan', $penduduk->kepemilikan) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
            </select>
        </div>

                                <div class="mb-3">
                                    <label for="status_rumah_dinding" class="form-label">Dinding</label>
                                    <select class="form-select" id="status_rumah_dinding" name="status_rumah_dinding">
                                        <option value="">-- Pilih Jenis Dinding --</option>
                                        <option value="Tembok" {{ old('status_rumah_dinding', $penduduk->status_rumah_dinding) == 'Tembok' ? 'selected' : '' }}>Tembok</option>
                                        <option value="Kayu" {{ old('status_rumah_dinding', $penduduk->status_rumah_dinding) == 'Kayu' ? 'selected' : '' }}>Kayu</option>
                                        <option value="Bambu" {{ old('status_rumah_dinding', $penduduk->status_rumah_dinding) == 'Bambu' ? 'selected' : '' }}>Bambu</option>
                                        <option value="Campuran" {{ old('status_rumah_dinding', $penduduk->status_rumah_dinding) == 'Campuran' ? 'selected' : '' }}>Campuran</option>
                                        <option value="Lainnya" {{ old('status_rumah_dinding', $penduduk->status_rumah_dinding) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                    </select>
    </div>

        <div class="mb-3">
                                    <label for="status_rumah_atap" class="form-label">Atap</label>
                                    <select class="form-select" id="status_rumah_atap" name="status_rumah_atap">
                                        <option value="">-- Pilih Jenis Atap --</option>
                                        <option value="Genteng" {{ old('status_rumah_atap', $penduduk->status_rumah_atap) == 'Genteng' ? 'selected' : '' }}>Genteng</option>
                                        <option value="Seng" {{ old('status_rumah_atap', $penduduk->status_rumah_atap) == 'Seng' ? 'selected' : '' }}>Seng</option>
                                        <option value="Asbes" {{ old('status_rumah_atap', $penduduk->status_rumah_atap) == 'Asbes' ? 'selected' : '' }}>Asbes</option>
                                        <option value="Lainnya" {{ old('status_rumah_atap', $penduduk->status_rumah_atap) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                    </select>
        </div>

                                <div class="mb-3">
                                    <label for="status_rumah_listrik" class="form-label">Listrik</label>
                                    <select class="form-select" id="status_rumah_listrik" name="status_rumah_listrik">
                                        <option value="">-- Pilih Status Listrik --</option>
                                        <option value="Ada" {{ old('status_rumah_listrik', $penduduk->status_rumah_listrik) == 'Ada' ? 'selected' : '' }}>Ada</option>
                                        <option value="Tidak Ada" {{ old('status_rumah_listrik', $penduduk->status_rumah_listrik) == 'Tidak Ada' ? 'selected' : '' }}>Tidak Ada</option>
                                    </select>
    </div>

        <div class="mb-3">
                                    <label for="status_rumah_mck" class="form-label">MCK</label>
                                    <select class="form-select" id="status_rumah_mck" name="status_rumah_mck">
                                        <option value="">-- Pilih Status MCK --</option>
                                        <option value="Sendiri" {{ old('status_rumah_mck', $penduduk->status_rumah_mck) == 'Sendiri' ? 'selected' : '' }}>Sendiri</option>
                                        <option value="Bersama" {{ old('status_rumah_mck', $penduduk->status_rumah_mck) == 'Bersama' ? 'selected' : '' }}>Bersama</option>
                                        <option value="Tidak Ada" {{ old('status_rumah_mck', $penduduk->status_rumah_mck) == 'Tidak Ada' ? 'selected' : '' }}>Tidak Ada</option>
            </select>
        </div>
    </div>

                            <!-- Status Bantuan -->
    <div class="col-md-6">
                                <h5 class="text-primary mb-3">
                                    <i class="fas fa-hand-holding-heart"></i> Status Bantuan
                                </h5>

                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" id="status_bantuan" name="status_bantuan" value="1" 
                                           {{ old('status_bantuan', $penduduk->status_bantuan) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="status_bantuan">
                                        Menerima Bantuan Pemerintah
                                    </label>
                                </div>

                                <div class="alert alert-info">
                                    <i class="fas fa-info-circle"></i>
                                    <strong>Informasi:</strong> Centang jika penduduk menerima bantuan dari pemerintah seperti PKH, BPNT, atau bantuan lainnya.
        </div>
    </div>
        </div>
    </div>
                    
                    <div class="card-footer">
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('penduduk.index') }}" class="btn btn-secondary">
                                <i class="fas fa-times"></i> Batal
                            </a>
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-save"></i> Update Data
                            </button>
        </div>
    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
.text-primary {
    color: #007bff !important;
}

.card-header {
    background-color: #f8f9fa;
    border-bottom: 1px solid #dee2e6;
}

.form-label {
    font-weight: 500;
}

.text-danger {
    color: #dc3545 !important;
}

.alert-info {
    background-color: #d1ecf1;
    border-color: #bee5eb;
    color: #0c5460;
}

hr {
    border-top: 2px solid #dee2e6;
    margin: 2rem 0;
}
</style>
@endpush