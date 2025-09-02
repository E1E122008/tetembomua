<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GalleryMedia;
use Illuminate\Support\Facades\File;

class GalleryMediaImportSeeder extends Seeder
{
    public function run(): void
    {
        $kegiatanPath = public_path('FOTO/kegiatan');
        $descriptionsPath = public_path('FOTO/kegiatan/descriptions.json');

        $descriptions = [];
        if (File::exists($descriptionsPath)) {
            $descriptions = json_decode(File::get($descriptionsPath), true) ?? [];
        }

        if (!File::exists($kegiatanPath)) {
            $this->command?->warn('No kegiatan folder found, skipping media import.');
            return;
        }

        $files = File::files($kegiatanPath);
        foreach ($files as $file) {
            $filename = $file->getFilename();
            if ($filename === 'descriptions.json') continue;

            $extension = strtolower($file->getExtension());
            $isVideo = in_array($extension, ['mp4', 'avi', 'mov', 'wmv', 'flv', 'webm', 'ogg']);
            $meta = $descriptions[$filename] ?? [];

            GalleryMedia::updateOrCreate(
                ['filename' => $filename],
                [
                    'original_name' => $filename,
                    'file_path' => '/FOTO/kegiatan/' . $filename,
                    'title' => $meta['title'] ?? null,
                    'description' => $meta['description'] ?? null,
                    'category' => $meta['category'] ?? 'kegiatan',
                    'tags' => $meta['tags'] ?? null,
                    'media_date' => $meta['image_date'] ?? null,
                    'photographer' => $meta['photographer'] ?? null,
                    'location' => $meta['location'] ?? null,
                    'media_type' => $meta['type'] ?? ($isVideo ? 'video' : 'image'),
                    'file_size' => File::size($file->getRealPath()) ?: null,
                    'dimensions' => null,
                    'is_featured' => false,
                    'is_published' => true,
                    'sort_order' => 0,
                ]
            );
        }

        $this->command?->info('Gallery media imported from file system and descriptions.json.');
    }
}
