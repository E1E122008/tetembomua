<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Settings extends Model
{
    use HasFactory;

    protected $fillable = [
        'village_name',
        'village_head',
        'term_period',
        'district',
        'regency',
        'province',
        'area',
        'north_boundary',
        'east_boundary',
        'south_boundary',
        'west_boundary',
        'village_description',
        'contact_phone',
        'contact_email',
        'contact_address',
        'social_media',
        'website_status',
        'maintenance_mode'
    ];

    protected $casts = [
        'social_media' => 'array',
        'maintenance_mode' => 'boolean',
        'website_status' => 'boolean'
    ];

    /**
     * Get setting value by key
     */
    public static function getValue($key, $default = null)
    {
        $setting = static::first();
        return $setting ? $setting->$key : $default;
    }

    /**
     * Update or create settings
     */
    public static function updateSettings($data)
    {
        $setting = static::first();
        
        if ($setting) {
            $setting->update($data);
        } else {
            $setting = static::create($data);
        }

        // Clear cache after update
        cache()->forget('website_settings');
        
        return $setting;
    }
}
