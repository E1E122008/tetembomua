<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgriculturalCommodity extends Model
{
    use HasFactory;

    protected $table = 'agricultural_data';
    
    protected $fillable = [
        'commodity_name', 'commodity_type', 'land_area', 'production_volume',
        'productivity_per_hectare', 'number_of_farmers', 'average_income_per_hectare',
        'harvest_season', 'notes', 'image_path', 'data_date', 'updated_by'
    ];

    protected $casts = [
        'land_area' => 'decimal:2',
        'production_volume' => 'decimal:2',
        'productivity_per_hectare' => 'decimal:2',
        'average_income_per_hectare' => 'decimal:2',
        'data_date' => 'date',
    ];
}


