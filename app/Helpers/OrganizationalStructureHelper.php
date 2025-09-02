<?php

namespace App\Helpers;

use App\Models\OrganizationalStructure;
use Illuminate\Support\Facades\Cache;

class OrganizationalStructureHelper
{
    /**
     * Get all organizational structures with caching
     */
    public static function getAll()
    {
        return Cache::remember('organizational_structures', 3600, function () {
            return OrganizationalStructure::getStructuredData();
        });
    }

    /**
     * Get structures by role type with caching
     */
    public static function getByRoleType($roleType)
    {
        return Cache::remember("organizational_structures.{$roleType}", 3600, function () use ($roleType) {
            return OrganizationalStructure::getByRoleType($roleType);
        });
    }

    /**
     * Get active structures count
     */
    public static function getActiveCount()
    {
        return Cache::remember('organizational_structures_count', 3600, function () {
            return OrganizationalStructure::where('is_active', true)->count();
        });
    }

    /**
     * Clear all organizational structure cache
     */
    public static function clearCache()
    {
        Cache::forget('organizational_structures');
        Cache::forget('organizational_structures_count');
        
        // Clear individual role type caches
        $roleTypes = ['kepala_desa', 'perangkat', 'bpd', 'lpm', 'dusun', 'rt', 'lainnya'];
        foreach ($roleTypes as $type) {
            Cache::forget("organizational_structures.{$type}");
        }
    }

    /**
     * Get structure for specific position
     */
    public static function getByPosition($position)
    {
        return Cache::remember("organizational_structures.position.{$position}", 3600, function () use ($position) {
            return OrganizationalStructure::where('position', $position)
                ->where('is_active', true)
                ->first();
        });
    }

    /**
     * Get featured structures (for homepage display)
     */
    public static function getFeatured()
    {
        return Cache::remember('organizational_structures_featured', 3600, function () {
            return OrganizationalStructure::where('is_active', true)
                ->whereIn('role_type', ['kepala_desa', 'perangkat'])
                ->orderBy('sort_order')
                ->take(5)
                ->get();
        });
    }
}
