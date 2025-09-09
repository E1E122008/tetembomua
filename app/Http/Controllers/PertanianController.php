<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AgriculturalCommodity;

class PertanianController extends Controller
{
    public function komoditas()
    {
        // Get data from agricultural_data table - filter out zero values
        $commodities = AgriculturalCommodity::where('commodity_type', 'other')
            ->get();
            
        $horticultures = AgriculturalCommodity::where('commodity_type', 'vegetables')
            ->get();
            
        $fruits = AgriculturalCommodity::where('commodity_type', 'fruits')
            ->get();

        // Calculate totals
        $allCommodities = $commodities->concat($horticultures)->concat($fruits);
        $totalArea = $allCommodities->sum('land_area');
        $totalFarmers = $allCommodities->sum('number_of_farmers');

        // Prepare data for view
        $agricultural = [
            'farmers' => $totalFarmers,
            'land_area' => $totalArea,
            'commodities' => $commodities->map(fn($c) => [
                'name' => $c->commodity_name, 
                'area' => (float)$c->land_area, 
                'farmers' => (int)$c->number_of_farmers, 
                'production_volume' => (float)$c->production_volume,
                'productivity' => (float)$c->productivity_per_hectare,
                'income' => (float)$c->average_income_per_hectare,
                'harvest_season' => $c->harvest_season,
                'notes' => $c->notes,
                'image_path' => $c->image_path,
                'description' => $c->notes // Gunakan notes sebagai description
            ])->toArray(),
            'horticultures' => $horticultures->map(fn($c) => [
                'name' => $c->commodity_name, 
                'area' => (float)$c->land_area, 
                'farmers' => (int)$c->number_of_farmers, 
                'production_volume' => (float)$c->production_volume,
                'productivity' => (float)$c->productivity_per_hectare,
                'income' => (float)$c->average_income_per_hectare,
                'harvest_season' => $c->harvest_season,
                'notes' => $c->notes,
                'image_path' => $c->image_path,
                'description' => $c->notes // Gunakan notes sebagai description
            ])->toArray(),
            'fruits' => $fruits->map(fn($c) => [
                'name' => $c->commodity_name, 
                'area' => (float)$c->land_area, 
                'farmers' => (int)$c->number_of_farmers, 
                'production_volume' => (float)$c->production_volume,
                'productivity' => (float)$c->productivity_per_hectare,
                'income' => (float)$c->average_income_per_hectare,
                'harvest_season' => $c->harvest_season,
                'notes' => $c->notes,
                'image_path' => $c->image_path,
                'description' => $c->notes // Gunakan notes sebagai description
            ])->toArray(),
        ];

        // Ensure we always have the agricultural data structure
        $agricultural = array_merge([
            'farmers' => 0,
            'land_area' => 0,
            'commodities' => [],
            'horticultures' => [],
            'fruits' => [],
        ], $agricultural);

        return view('pertanian.komoditas', compact('agricultural'));
    }
}
