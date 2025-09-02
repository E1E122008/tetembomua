<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GalleryMedia;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class GalleryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get media from database if available, otherwise fallback to file system
        try {
            $media = GalleryMedia::orderBy('sort_order')
                ->orderBy('created_at', 'desc')
                ->get()
                ->map(function($item) {
                    return [
                        'id' => $item->id,
                        'name' => $item->filename,
                        'path' => $item->file_path,
                        'description' => $item->description,
                        'category' => $item->category,
                        'image_date' => $item->media_date ? $item->media_date->format('Y-m-d') : null,
                        'type' => $item->media_type,
                        'title' => $item->title,
                        'photographer' => $item->photographer,
                        'location' => $item->location,
                        'is_featured' => $item->is_featured,
                        'is_published' => $item->is_published
                    ];
                })->toArray();

            // Get stats
            $stats = [
                'total' => GalleryMedia::count(),
                'images' => GalleryMedia::where('media_type', 'image')->count(),
                'videos' => GalleryMedia::where('media_type', 'video')->count(),
                'featured' => GalleryMedia::where('is_featured', true)->count()
            ];
        } catch (\Exception $e) {
            // Fallback to file system
            $media = $this->getMediaFromFileSystem();
            $stats = [
                'total' => count($media),
                'images' => count(array_filter($media, fn($item) => ($item['type'] ?? 'image') === 'image')),
                'videos' => count(array_filter($media, fn($item) => ($item['type'] ?? 'image') === 'video')),
                'featured' => 0
            ];
        }
        
        return view('admin.gallery.index', compact('media', 'stats'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'media_file' => 'required|file|mimes:jpeg,png,jpg,mp4,avi,mov,wmv,flv,webm,ogg|max:10240',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'category' => 'nullable|string|in:kegiatan,pembangunan,potensi,alam',
            'photographer' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'media_date' => 'nullable|date',
            'is_featured' => 'boolean',
            'is_published' => 'boolean'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $file = $request->file('media_file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $extension = strtolower($file->getExtension());
            $isVideo = in_array($extension, ['mp4', 'avi', 'mov', 'wmv', 'flv', 'webm', 'ogg']);

            // Store file
            $path = $file->storeAs('public/FOTO/kegiatan', $filename);
            $filePath = 'storage/FOTO/kegiatan/' . $filename;

            // Create database record
            $mediaData = [
                'filename' => $filename,
                'original_name' => $file->getClientOriginalName(),
                'file_path' => $filePath,
                'title' => $request->title,
                'description' => $request->description,
                'category' => $request->category ?? 'kegiatan',
                'photographer' => $request->photographer,
                'location' => $request->location,
                'media_date' => $request->media_date,
                'media_type' => $isVideo ? 'video' : 'image',
                'file_size' => $file->getSize(),
                'is_featured' => $request->has('is_featured'),
                'is_published' => $request->has('is_published'),
                'sort_order' => 0
            ];

            GalleryMedia::create($mediaData);

            return redirect()->route('admin.gallery.index')
                ->with('success', 'Media berhasil diupload!');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal upload media: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $media = GalleryMedia::findOrFail($id);
        return response()->json($media);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $media = GalleryMedia::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'category' => 'nullable|string|in:kegiatan,pembangunan,potensi,alam',
            'photographer' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'media_date' => 'nullable|date',
            'is_featured' => 'boolean',
            'is_published' => 'boolean'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $media->update([
            'title' => $request->title,
            'description' => $request->description,
            'category' => $request->category,
            'photographer' => $request->photographer,
            'location' => $request->location,
            'media_date' => $request->media_date,
            'is_featured' => $request->has('is_featured'),
            'is_published' => $request->has('is_published')
        ]);

        return redirect()->route('admin.gallery.index')
            ->with('success', 'Media berhasil diperbarui!');
    }

    /**
     * Toggle featured status
     */
    public function toggleFeatured(Request $request, $id)
    {
        $media = GalleryMedia::findOrFail($id);
        $media->update(['is_featured' => !$media->is_featured]);

        $status = $media->is_featured ? 'ditandai sebagai featured' : 'dihapus dari featured';
        return response()->json(['message' => "Media berhasil {$status}"]);
    }

    /**
     * Toggle published status
     */
    public function togglePublished(Request $request, $id)
    {
        $media = GalleryMedia::findOrFail($id);
        $media->update(['is_published' => !$media->is_published]);

        $status = $media->is_published ? 'dipublish' : 'diunpublish';
        return response()->json(['message' => "Media berhasil {$status}"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $media = GalleryMedia::findOrFail($id);

        // Delete file if exists
        if ($media->file_path && Storage::exists(str_replace('storage/', 'public/', $media->file_path))) {
            Storage::delete(str_replace('storage/', 'public/', $media->file_path));
        }

        $media->delete();

        return redirect()->route('admin.gallery.index')
            ->with('success', 'Media berhasil dihapus!');
    }

    /**
     * Get media from file system (fallback method)
     */
    private function getMediaFromFileSystem()
    {
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
        
        return $media;
    }
}
