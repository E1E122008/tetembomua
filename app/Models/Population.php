<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Population extends Model
{
    protected $fillable = [
        'no_kk', 'kk_dikeluarkan', 'nik', 'nama', 'alamat_kk', 'hubungan_kepala_keluarga', 'jenis_kelamin',
        'tempat_lahir', 'tanggal_lahir', 'bulan_lahir', 'tahun_lahir', 'status_perkawinan', 'suku', 'pendidikan_terakhir', 'mata_pencaharian', 'pekerjaan_tambahan',
        'motor', 'mobil', 'sepeda', 'sapi', 'kambing', 'ayam', 'ikan',
        'luas_lahan_pertanian', 'luas_lahan_peternakan',
        'komoditas_utama', 'komoditas_buah_sayur', 'bantuan',
        'status_kepemilikan_rumah', 'status_dinding', 'status_atap', 'status_lantai', 'penggunaan_listrik', 'mck'
    ];
}