<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Carbon\Carbon;

class Penduduk extends Model
{
    use HasFactory;

    protected $table = 'penduduk';

    protected $fillable = [
        'nama',
        'alamat_kartu_keluarga',
        'tanggal_kk_dikeluarkan',
        'no_kk',
        'nik',
        'jenis_kelamin',
        'hubungan_kepala_keluarga',
        'tempat_lahir',
        'tanggal_lahir',
        'bulan_lahir',
        'tahun_lahir',
        'status_perkawinan',
        'suku',
        'pendidikan_terakhir',
        'mata_pencaharian',
        'pekerjaan_tambahan',
        'kendaraan_mobil',
        'kendaraan_motor',
        'kendaraan_sepeda',
        'ternak_sapi',
        'ternak_kambing',
        'ternak_ayam',
        'ternak_ikan',
        'luas_lahan_pertanian',
        'luas_lahan_peternakan',
        'komoditas_utama',
        'komoditas_buah_sayur',
        'status_bantuan',
        'kepemilikan',
        'status_rumah_dinding',
        'status_rumah_atap',
        'status_rumah_listrik',
        'status_rumah_mck',
    ];

    protected $casts = [
        'tanggal_kk_dikeluarkan' => 'date',
        'tanggal_lahir' => 'integer',
        'bulan_lahir' => 'integer',
        'tahun_lahir' => 'integer',
        'kendaraan_mobil' => 'boolean',
        'kendaraan_motor' => 'boolean',
        'kendaraan_sepeda' => 'boolean',
        'ternak_sapi' => 'integer',
        'ternak_kambing' => 'integer',
        'ternak_ayam' => 'integer',
        'ternak_ikan' => 'integer',
        'luas_lahan_pertanian' => 'decimal:2',
        'luas_lahan_peternakan' => 'decimal:2',
        'status_bantuan' => 'boolean',
    ];

    /**
     * Get kartu keluarga
     */
    public function kartuKeluarga(): BelongsTo
    {
        return $this->belongsTo(KartuKeluarga::class, 'no_kk', 'no_kk');
    }

    /**
     * Get usia penduduk
     */
    public function getUsiaAttribute(): int
    {
        if (!$this->tahun_lahir || !$this->bulan_lahir || !$this->tanggal_lahir) {
            return 0;
        }

        $tanggalLahir = Carbon::createFromDate(
            $this->tahun_lahir,
            $this->bulan_lahir,
            $this->tanggal_lahir
        );

        return $tanggalLahir->age;
    }

    /**
     * Get usia range
     */
    public function getUsiaRangeAttribute(): string
    {
        $usia = $this->usia;
        
        if ($usia < 18) return '0-17';
        if ($usia < 60) return '18-60';
        return '60+';
    }

    /**
     * Get status KK expired
     */
    public function getKkExpiredAttribute(): bool
    {
        if (!$this->tanggal_kk_dikeluarkan) {
            return false;
        }

        return $this->tanggal_kk_dikeluarkan->diffInYears(now()) > 5;
    }

    /**
     * Get total ternak
     */
    public function getTotalTernakAttribute(): int
    {
        return ($this->ternak_sapi ?? 0) + 
               ($this->ternak_kambing ?? 0) + 
               ($this->ternak_ayam ?? 0) + 
               ($this->ternak_ikan ?? 0);
    }

    /**
     * Get total luas lahan
     */
    public function getTotalLahanAttribute(): float
    {
        return ($this->luas_lahan_pertanian ?? 0) + 
               ($this->luas_lahan_peternakan ?? 0);
    }

    /**
     * Get total kendaraan
     */
    public function getTotalKendaraanAttribute(): int
    {
        $total = 0;
        if ($this->kendaraan_mobil) $total++;
        if ($this->kendaraan_motor) $total++;
        if ($this->kendaraan_sepeda) $total++;
        return $total;
    }

    /**
     * Get dusun dari alamat
     */
    public function getDusunAttribute(): string
    {
        // Extract dusun from alamat_kartu_keluarga
        $alamat = $this->alamat_kartu_keluarga;
        if (preg_match('/Dusun\s+(\w+)/i', $alamat, $matches)) {
            return $matches[1];
        }
        return 'Tidak Diketahui';
    }

    /**
     * Scope untuk filter berdasarkan usia
     */
    public function scopeUsiaRange($query, $min, $max)
    {
        return $query->whereRaw('TIMESTAMPDIFF(YEAR, CONCAT(tahun_lahir, "-", bulan_lahir, "-", tanggal_lahir), CURDATE()) BETWEEN ? AND ?', [$min, $max]);
    }

    /**
     * Scope untuk filter berdasarkan jenis kelamin
     */
    public function scopeJenisKelamin($query, $jenis)
    {
        return $query->where('jenis_kelamin', $jenis);
    }

    /**
     * Scope untuk filter berdasarkan dusun
     */
    public function scopeDusun($query, $dusun)
    {
        return $query->where('alamat_kartu_keluarga', 'like', "%{$dusun}%");
    }

    /**
     * Scope untuk filter KK expired
     */
    public function scopeKkExpired($query)
    {
        return $query->where('tanggal_kk_dikeluarkan', '<', now()->subYears(5));
    }

    /**
     * Scope untuk filter usia produktif
     */
    public function scopeUsiaProduktif($query)
    {
        return $query->whereRaw('TIMESTAMPDIFF(YEAR, CONCAT(tahun_lahir, "-", bulan_lahir, "-", tanggal_lahir), CURDATE()) BETWEEN 18 AND 60');
    }

    /**
     * Scope untuk filter usia sekolah
     */
    public function scopeUsiaSekolah($query)
    {
        return $query->whereRaw('TIMESTAMPDIFF(YEAR, CONCAT(tahun_lahir, "-", bulan_lahir, "-", tanggal_lahir), CURDATE()) BETWEEN 6 AND 18');
    }

    /**
     * Scope untuk filter lansia
     */
    public function scopeLansia($query)
    {
        return $query->whereRaw('TIMESTAMPDIFF(YEAR, CONCAT(tahun_lahir, "-", bulan_lahir, "-", tanggal_lahir), CURDATE()) >= 60');
    }
}