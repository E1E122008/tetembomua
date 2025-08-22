<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PopulationData extends Model
{
    use HasFactory;

    protected $fillable = [
        'year',
        'total_population',
        'male',
        'female',
        'households',
        'notes'
    ];

    protected $casts = [
        'year' => 'integer',
        'total_population' => 'integer',
        'male' => 'integer',
        'female' => 'integer',
        'households' => 'integer'
    ];

    public function getPopulationGrowthAttribute()
    {
        $previousYear = $this->where('year', $this->year - 1)->first();
        
        if ($previousYear) {
            return $this->total_population - $previousYear->total_population;
        }
        
        return 0;
    }

    public function getGrowthPercentageAttribute()
    {
        $previousYear = $this->where('year', $this->year - 1)->first();
        
        if ($previousYear && $previousYear->total_population > 0) {
            return round((($this->total_population - $previousYear->total_population) / $previousYear->total_population) * 100, 2);
        }
        
        return 0;
    }
}
