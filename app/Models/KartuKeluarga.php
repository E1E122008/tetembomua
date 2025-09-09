<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KartuKeluarga extends Model
{
    use HasFactory;

    protected $table = 'kartu_keluarga';

    protected $fillable = [
        'no_kk',
        'alamat',
        'rt',
        'rw',
        'dusun',
        'desa',
        'kecamatan',
        'kabupaten',
        'provinsi',
        'kode_pos',
        'tanggal_kk_dikeluarkan',
        'kepala_keluarga',
        'dusun_id',
    ];

    protected $casts = [
        'tanggal_kk_dikeluarkan' => 'date',
    ];

    /**
     * Get the penduduk for this kartu keluarga.
     */
    public function penduduk(): HasMany
    {
        // Relasi berdasarkan kolom nomor KK, karena tabel penduduk tidak memiliki kartu_keluarga_id
        return $this->hasMany(Penduduk::class, 'no_kk', 'no_kk');
    }

    public function dusun(): BelongsTo
    {
        return $this->belongsTo(Dusun::class);
    }

    /**
     * Get kepala keluarga
     */
    public function kepalaKeluarga()
    {
        return $this->penduduk()
            ->where('hubungan_kepala_keluarga', 'Kepala Keluarga')
            ->first();
    }

    /**
     * Get jumlah anggota keluarga
     */
    public function getJumlahAnggotaAttribute(): int
    {
        return $this->penduduk()->count();
    }

    /**
     * Get status KK expired
     */
    public function getExpiredAttribute(): bool
    {
        if (!$this->tanggal_kk_dikeluarkan) {
            return false;
        }

        return $this->tanggal_kk_dikeluarkan->diffInYears(now()) > 5;
    }
}
