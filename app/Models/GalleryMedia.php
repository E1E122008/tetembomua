<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GalleryMedia extends Model
{
    use HasFactory;

    protected $fillable = [
        'filename',
        'original_name',
        'file_path',
        'title',
        'description',
        'category',
        'tags',
        'media_date',
        'photographer',
        'location',
        'media_type',
        'file_size',
        'dimensions',
        'is_featured',
        'is_published',
        'sort_order'
    ];

    protected $casts = [
        'tags' => 'array',
        'media_date' => 'date',
        'is_featured' => 'boolean',
        'is_published' => 'boolean',
        'sort_order' => 'integer'
    ];

    /**
     * Get all published media
     */
    public static function getPublishedMedia()
    {
        return static::where('is_published', true)
            ->orderBy('sort_order')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    /**
     * Get media by category
     */
    public static function getByCategory($category)
    {
        return static::where('category', $category)
            ->where('is_published', true)
            ->orderBy('sort_order')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    /**
     * Get featured media
     */
    public static function getFeatured()
    {
        return static::where('is_featured', true)
            ->where('is_published', true)
            ->orderBy('sort_order')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    /**
     * Get media by type
     */
    public static function getByType($type)
    {
        return static::where('media_type', $type)
            ->where('is_published', true)
            ->orderBy('sort_order')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    /**
     * Search media
     */
    public static function search($query)
    {
        return static::where('is_published', true)
            ->where(function($q) use ($query) {
                $q->where('title', 'like', "%{$query}%")
                  ->orWhere('description', 'like', "%{$query}%")
                  ->orWhere('photographer', 'like', "%{$query}%")
                  ->orWhere('location', 'like', "%{$query}%");
            })
            ->orderBy('sort_order')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    /**
     * Scope for published media
     */
    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    /**
     * Scope for featured media
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    /**
     * Get full file URL
     */
    public function getFileUrlAttribute()
    {
        return asset($this->file_path);
    }

    /**
     * Get thumbnail URL (for images)
     */
    public function getThumbnailUrlAttribute()
    {
        if ($this->media_type === 'image') {
            // You can implement thumbnail generation here
            return $this->file_url;
        }
        return asset('FOTO/LOGO-removebg-preview.png');
    }

    /**
     * Get formatted file size
     */
    public function getFormattedFileSizeAttribute()
    {
        if (!$this->file_size) return null;
        
        $bytes = $this->file_size;
        $units = ['B', 'KB', 'MB', 'GB'];
        
        for ($i = 0; $bytes > 1024 && $i < count($units) - 1; $i++) {
            $bytes /= 1024;
        }
        
        return round($bytes, 2) . ' ' . $units[$i];
    }
}
