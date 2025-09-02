<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrganizationalStructure extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'position',
        'role_type',
        'role_text',
        'info',
        'photo_path',
        'term_period',
        'is_active',
        'sort_order'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer'
    ];

    /**
     * Get all active structures grouped by role type
     */
    public static function getStructuredData()
    {
        $structures = static::where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get()
            ->groupBy('role_type');

        $mapItems = function ($collection) {
            return $collection->map(function (self $item) {
                return [
                    'name' => $item->name,
                    'role_type' => $item->role_type,
                    'role_text' => $item->role_text,
                    'info' => $item->info,
                    'photo' => $item->photo_path ? asset($item->photo_path) : null,
                ];
            })->values()->toArray();
        };

        $kadesModel = $structures->get('kepala_desa', collect())->first();
        $kades = null;
        if ($kadesModel instanceof self) {
            $kades = [
                'name' => $kadesModel->name,
                'info' => $kadesModel->info,
                'photo' => $kadesModel->photo_path ? asset($kadesModel->photo_path) : null,
            ];
        }

        // Build entries in the shape expected by the Blade view
        $entries = [
            'perangkat' => $mapItems($structures->get('perangkat', collect())),
            'bpd' => $mapItems($structures->get('bpd', collect())),
            'lpm' => $mapItems($structures->get('lpm', collect())),
            'dusun' => $mapItems($structures->get('dusun', collect())),
            'rt' => $mapItems($structures->get('rt', collect())),
        ];

        return [
            'entries' => $entries,
            'kades' => $kades,
        ];
    }

    /**
     * Get structure by role type
     */
    public static function getByRoleType($roleType)
    {
        return static::where('role_type', $roleType)
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();
    }

    /**
     * Scope for active structures
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Get photo URL
     */
    public function getPhotoUrlAttribute()
    {
        if ($this->photo_path) {
            return asset($this->photo_path);
        }
        return asset('FOTO/LOGO-removebg-preview.png');
    }
}
