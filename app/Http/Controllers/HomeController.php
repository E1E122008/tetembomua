<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function news()
    {
        return view('news');
    }

    public function potensi()
    {
        return view('potensi');
    }

    public function program()
    {
        return view('program');
    }

    public function galeri()
    {
        // Get media (images and videos) from kegiatan folder with descriptions
        $kegiatanPath = public_path('FOTO/kegiatan');
        $descriptionsPath = public_path('FOTO/kegiatan/descriptions.json');
        $media = [];
        
        // Load descriptions if exists
        $descriptions = [];
        if (File::exists($descriptionsPath)) {
            $descriptions = json_decode(File::get($descriptionsPath), true) ?? [];
        }
        
        if (File::exists($kegiatanPath)) {
            $files = File::files($kegiatanPath);
            foreach ($files as $file) {
                $filename = $file->getFilename();
                // Skip descriptions.json file
                if ($filename === 'descriptions.json') continue;

                $extension = strtolower($file->getExtension());
                $isVideo = in_array($extension, ['mp4', 'avi', 'mov', 'wmv', 'flv', 'webm', 'ogg']);

                $media[] = [
                    'name' => $filename,
                    'path' => '/FOTO/kegiatan/' . $filename,
                    'description' => $descriptions[$filename]['description'] ?? null,
                    'category' => $descriptions[$filename]['category'] ?? null,
                    'image_date' => $descriptions[$filename]['image_date'] ?? null,
                    'type' => $descriptions[$filename]['type'] ?? ($isVideo ? 'video' : 'image')
                ];
            }
        }
        
        return view('galeri', compact('media'));
    }

    public function statistik()
    {
        return view('statistik');
    }
}
