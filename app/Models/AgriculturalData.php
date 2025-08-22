<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgriculturalData extends Model
{
    use HasFactory;

    protected $fillable = [
        'commodity',
        'area_hectares',
        'production_ton',
        'year',
        'notes'
    ];

    protected $casts = [
        'year' => 'integer',
        'area_hectares' => 'decimal:2',
        'production_ton' => 'decimal:2'
    ];

    public function getProductivityAttribute()
    {
        if ($this->area_hectares > 0) {
            return round($this->production_ton / $this->area_hectares, 2);
        }
        return 0;
    }

    public function getProductivityLabelAttribute()
    {
        $productivity = $this->productivity;
        
        if ($productivity >= 15) {
            return 'Sangat Tinggi';
        } elseif ($productivity >= 10) {
            return 'Tinggi';
        } elseif ($productivity >= 5) {
            return 'Sedang';
        } else {
            return 'Rendah';
        }
    }

    public function scopeByCommodity($query, $commodity)
    {
        return $query->where('commodity', $commodity);
    }

    public function scopeByYear($query, $year)
    {
        return $query->where('year', $year);
    }
}
