<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataPencaharian extends Model
{
    use HasFactory;

    protected $table = 'mata_pencaharian';

    protected $fillable = [
        'nama',
        'jumlah',
        'deskripsi',
        'aktif',
    ];

    protected $casts = [
        'aktif' => 'boolean',
    ];

    /**
     * Scope untuk mata pencaharian aktif
     */
    public function scopeAktif($query)
    {
        return $query->where('aktif', true);
    }
}
