<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function news()
    {
        // Sample news data - in real app this would come from database
        $news = [
            [
                'id' => 1,
                'title' => 'Panen Kelapa Sawit Berhasil',
                'content' => 'Panen kelapa sawit di Desa Tetembomua berhasil dengan hasil yang memuaskan...',
                'image' => '/FOTO/DSC_0596.JPG',
                'author' => 'Admin',
                'date' => '2024-12-15',
                'status' => 'published'
            ],
            [
                'id' => 2,
                'title' => 'Pelatihan Teknologi Pertanian',
                'content' => 'Pelatihan teknologi pertanian modern untuk meningkatkan produktivitas...',
                'image' => '/FOTO/DSC_0605.JPG',
                'author' => 'Admin',
                'date' => '2024-12-14',
                'status' => 'published'
            ]
        ];

        return view('admin.news.index', compact('news'));
    }

    public function createNews()
    {
        return view('admin.news.create');
    }

    public function storeNews(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Handle image upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('FOTO/news'), $imageName);
            $imagePath = '/FOTO/news/' . $imageName;
        }

        // In real app, save to database
        // News::create([...]);

        return redirect()->route('admin.news')->with('success', 'Berita berhasil ditambahkan');
    }

    public function population()
    {
        // Sample population data
        $population = [
            'total' => 402,
            'male' => 222,
            'female' => 178,
            'households' => 118,
            'rt_count' => 6,
            'farmers' => 206,
            'traders' => 57,
            'students' => 102
        ];

        return view('admin.population.index', compact('population'));
    }

    public function updatePopulation(Request $request)
    {
        $request->validate([
            'total' => 'required|numeric',
            'male' => 'required|numeric',
            'female' => 'required|numeric',
            'households' => 'required|numeric',
            'rt_count' => 'required|numeric',
            'farmers' => 'required|numeric',
            'traders' => 'required|numeric',
            'students' => 'required|numeric'
        ]);

        // In real app, update database
        // Population::update([...]);

        return redirect()->route('admin.population')->with('success', 'Data penduduk berhasil diperbarui');
    }

    public function agricultural()
    {
        // Sample agricultural data
        $agricultural = [
            'farmers' => 206,
            'land_area' => 850,
            'commodities' => [
                ['name' => 'Kelapa Sawit', 'area' => 450, 'farmers' => 150],
                ['name' => 'Kakao', 'area' => 200, 'farmers' => 80],
                ['name' => 'Padi', 'area' => 150, 'farmers' => 120],
                ['name' => 'Jagung', 'area' => 50, 'farmers' => 45]
            ]
        ];

        return view('admin.agricultural.index', compact('agricultural'));
    }

    public function updateAgricultural(Request $request)
    {
        $request->validate([
            'farmers' => 'required|numeric',
            'land_area' => 'required|numeric'
        ]);

        // In real app, update database
        // Agricultural::update([...]);

        return redirect()->route('admin.agricultural')->with('success', 'Data pertanian berhasil diperbarui');
    }

    public function users()
    {
        // Sample users data
        $users = [
            [
                'id' => 1,
                'name' => 'Admin Utama',
                'email' => 'admin@tetembomua.com',
                'role' => 'Super Admin',
                'status' => 'active',
                'created_at' => '2024-01-01'
            ],
            [
                'id' => 2,
                'name' => 'Operator Desa',
                'email' => 'operator@tetembomua.com',
                'role' => 'Operator',
                'status' => 'active',
                'created_at' => '2024-01-15'
            ]
        ];

        return view('admin.users.index', compact('users'));
    }

    public function createUser()
    {
        return view('admin.users.create');
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
            'role' => 'required|in:Super Admin,Operator'
        ]);

        // In real app, create user
        // User::create([...]);

        return redirect()->route('admin.users')->with('success', 'User berhasil ditambahkan');
    }

    public function settings()
    {
        // Get settings from database or use defaults
        $settings = \App\Helpers\SettingsHelper::getAll();
        
        return view('admin.settings.index', compact('settings'));
    }

    public function updateSettings(Request $request)
    {
        $request->validate([
            'village_name' => 'required|string|max:255',
            'village_head' => 'required|string|max:255',
            'term_period' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'regency' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'area' => 'required|string|max:255',
            'north_boundary' => 'required|string|max:255',
            'east_boundary' => 'required|string|max:255',
            'south_boundary' => 'required|string|max:255',
            'west_boundary' => 'required|string|max:255',
            'village_description' => 'nullable|string',
            'contact_phone' => 'nullable|string|max:255',
            'contact_email' => 'nullable|email|max:255',
            'contact_address' => 'nullable|string',
            'website_status' => 'boolean',
            'maintenance_mode' => 'boolean'
        ]);

        // Update settings in database
        $settingsData = $request->only([
            'village_name', 'village_head', 'term_period',
            'district', 'regency', 'province', 'area',
            'north_boundary', 'east_boundary', 'south_boundary', 'west_boundary',
            'village_description', 'contact_phone', 'contact_email', 'contact_address',
            'website_status', 'maintenance_mode'
        ]);

        // Convert checkbox values to boolean
        $settingsData['website_status'] = $request->has('website_status');
        $settingsData['maintenance_mode'] = $request->has('maintenance_mode');

        // Update settings using the model
        \App\Models\Settings::updateSettings($settingsData);

        // Clear cache
        \App\Helpers\SettingsHelper::clearCache();

        return redirect()->route('admin.settings')->with('success', 'Pengaturan berhasil diperbarui dan website telah diupdate!');
    }

    public function gallery()
    {
        // Get images and videos from kegiatan folder
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
                $isVideo = in_array($extension, ['mp4', 'avi', 'mov', 'wmv', 'flv', 'webm']);
                
                $media[] = [
                    'name' => $filename,
                    'path' => '/FOTO/kegiatan/' . $filename,
                    'size' => $file->getSize(),
                    'date' => date('Y-m-d H:i:s', $file->getMTime()),
                    'description' => $descriptions[$filename]['description'] ?? null,
                    'category' => $descriptions[$filename]['category'] ?? null,
                    'image_date' => $descriptions[$filename]['image_date'] ?? null,
                    'type' => $descriptions[$filename]['type'] ?? ($isVideo ? 'video' : 'image')
                ];
            }
        }

        return view('admin.gallery.index', compact('media'));
    }

    public function uploadGallery(Request $request)
    {
        $request->validate([
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'videos.*' => 'nullable|mimes:mp4,avi,mov,wmv,flv,webm|max:5120000', // 100MB max for videos
            'category' => 'required|in:kegiatan,pembangunan,potensi,alam',
            'image_date' => 'required|date',
            'description' => 'nullable|string|max:500'
        ]);

        $descriptionsPath = public_path('FOTO/kegiatan/descriptions.json');
        $descriptions = [];
        
        // Load existing descriptions
        if (File::exists($descriptionsPath)) {
            $descriptions = json_decode(File::get($descriptionsPath), true) ?? [];
        }

        $uploadedFiles = [];

        // Handle image uploads
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('FOTO/kegiatan'), $imageName);
                
                // Save image data
                $descriptions[$imageName] = [
                    'description' => $request->description,
                    'category' => $request->category,
                    'image_date' => $request->image_date,
                    'type' => 'image'
                ];
                $uploadedFiles[] = $imageName;
            }
        }

        // Handle video uploads
        if ($request->hasFile('videos')) {
            foreach ($request->file('videos') as $video) {
                $videoName = time() . '_' . $video->getClientOriginalName();
                $video->move(public_path('FOTO/kegiatan'), $videoName);
                
                // Save video data
                $descriptions[$videoName] = [
                    'description' => $request->description,
                    'category' => $request->category,
                    'image_date' => $request->image_date,
                    'type' => 'video'
                ];
                $uploadedFiles[] = $videoName;
            }
        }
            
        // Save descriptions to JSON file
        if (!empty($uploadedFiles)) {
            File::put($descriptionsPath, json_encode($descriptions, JSON_PRETTY_PRINT));
        }

        $message = '';
        if (!empty($uploadedFiles)) {
            $fileTypes = array_unique(array_map(function($file) use ($descriptions) {
                return $descriptions[$file]['type'] ?? 'file';
            }, $uploadedFiles));
            
            if (count($fileTypes) === 1) {
                $message = ucfirst($fileTypes[0]) . ' berhasil diunggah';
            } else {
                $message = 'File berhasil diunggah';
            }
        }

        return redirect()->route('admin.gallery')->with('success', $message);
    }

    public function editGalleryImage(Request $request, $filename)
    {
        $request->validate([
            'category' => 'required|in:kegiatan,pembangunan,potensi,alam',
            'image_date' => 'required|date',
            'description' => 'nullable|string|max:500'
        ]);

        $descriptionsPath = public_path('FOTO/kegiatan/descriptions.json');
        $descriptions = [];
        
        // Load existing descriptions
        if (File::exists($descriptionsPath)) {
            $descriptions = json_decode(File::get($descriptionsPath), true) ?? [];
        }

        // Update media data
        $descriptions[$filename] = [
            'description' => $request->description,
            'category' => $request->category,
            'image_date' => $request->image_date,
            'type' => $descriptions[$filename]['type'] ?? 'image' // Preserve existing type
        ];
        
        // Save descriptions to JSON file
        File::put($descriptionsPath, json_encode($descriptions, JSON_PRETTY_PRINT));

        return redirect()->route('admin.gallery')->with('success', 'Data gambar berhasil diperbarui');
    }

    public function deleteGalleryImage($filename)
    {
        $imagePath = public_path('FOTO/kegiatan/' . $filename);
        $descriptionsPath = public_path('FOTO/kegiatan/descriptions.json');
        
        if (File::exists($imagePath)) {
            File::delete($imagePath);
            
            // Remove description from JSON file
            if (File::exists($descriptionsPath)) {
                $descriptions = json_decode(File::get($descriptionsPath), true) ?? [];
                unset($descriptions[$filename]);
                File::put($descriptionsPath, json_encode($descriptions, JSON_PRETTY_PRINT));
            }
            
            return redirect()->route('admin.gallery')->with('success', 'Gambar berhasil dihapus');
        }

        return redirect()->route('admin.gallery')->with('error', 'Gambar tidak ditemukan');
    }

    // Struktur Organisasi - Admin
    public function structure()
    {
        $path = public_path('data/struktur.json');
        $struktur = [
            'kades' => [
                'name' => 'Nama Kepala Desa',
                'info' => 'Masa Jabatan: 2024 - Sekarang',
                'photo' => null,
            ],
            'rt' => [],
            'dusun' => []
        ];

        for ($i = 1; $i <= 6; $i++) {
            $struktur['rt'][$i] = $struktur['rt'][$i] ?? [
                'name' => "Kepala RT $i",
                'info' => null,
                'photo' => null,
            ];
        }
        for ($i = 1; $i <= 3; $i++) {
            $struktur['dusun'][$i] = $struktur['dusun'][$i] ?? [
                'name' => "Kepala Dusun $i",
                'info' => null,
                'photo' => null,
            ];
        }

        if (File::exists($path)) {
            $loaded = json_decode(File::get($path), true) ?? [];
            // Merge defaults with loaded content to ensure new keys exist
            $struktur = array_replace_recursive($struktur, $loaded);
        }

        return view('admin.structure.index', compact('struktur'));
    }

    public function updateStructure(Request $request)
    {
        $path = public_path('data/struktur.json');
        $uploadDir = public_path('FOTO/struktur');
        if (!File::exists($uploadDir)) {
            File::ensureDirectoryExists($uploadDir);
        }

        // Load existing
        $struktur = [
            'kdes' => null,
        ];
        if (File::exists($path)) {
            $struktur = json_decode(File::get($path), true) ?? [];
        }

        // Initialize structure
        $data = [
            'kades' => [
                'name' => $request->input('kades_name'),
                'info' => $request->input('kades_info'),
                'photo' => $struktur['kades']['photo'] ?? null,
            ],
            'rt' => [],
            'dusun' => []
        ];

        // Handle Kepala Desa photo
        if ($request->hasFile('kades_photo')) {
            $file = $request->file('kades_photo');
            if ($file->isValid()) {
                $name = 'kades_' . time() . '_' . $file->getClientOriginalName();
                $file->move($uploadDir, $name);
                $data['kades']['photo'] = '/FOTO/struktur/' . $name;
            }
        }

        // RT 1-6
        for ($i = 1; $i <= 6; $i++) {
            $current = $struktur['rt'][$i] ?? [];
            $entry = [
                'name' => $request->input("rt{$i}_name"),
                'info' => $request->input("rt{$i}_info"),
                'photo' => $current['photo'] ?? null,
            ];
            if ($request->hasFile("rt{$i}_photo")) {
                $file = $request->file("rt{$i}_photo");
                if ($file->isValid()) {
                    $name = 'rt' . $i . '_' . time() . '_' . $file->getClientOriginalName();
                    $file->move($uploadDir, $name);
                    $entry['photo'] = '/FOTO/struktur/' . $name;
                }
            }
            $data['rt'][$i] = $entry;
        }

        // Dusun 1-3
        for ($i = 1; $i <= 3; $i++) {
            $current = $struktur['dusun'][$i] ?? [];
            $entry = [
                'name' => $request->input("dusun{$i}_name"),
                'info' => $request->input("dusun{$i}_info"),
                'photo' => $current['photo'] ?? null,
            ];
            if ($request->hasFile("dusun{$i}_photo")) {
                $file = $request->file("dusun{$i}_photo");
                if ($file->isValid()) {
                    $name = 'dusun' . $i . '_' . time() . '_' . $file->getClientOriginalName();
                    $file->move($uploadDir, $name);
                    $entry['photo'] = '/FOTO/struktur/' . $name;
                }
            }
            $data['dusun'][$i] = $entry;
        }

        File::ensureDirectoryExists(dirname($path));
        File::put($path, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

        return redirect()->route('admin.structure')->with('success', 'Struktur organisasi berhasil diperbarui');
    }

    public function updateKades(Request $request)
    {
        $request->validate([
            'kades_name' => 'required|string|max:255',
            'kades_info' => 'nullable|string|max:255',
            'kades_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096',
        ]);

        $data = $this->loadStrukturData();
        if (!isset($data['kades'])) {
            $data['kades'] = ['name' => null, 'info' => null, 'photo' => null];
        }

        $data['kades']['name'] = $request->input('kades_name');
        $data['kades']['info'] = $request->input('kades_info');

        if ($request->hasFile('kades_photo')) {
            $uploadDir = public_path('FOTO/struktur');
            File::ensureDirectoryExists($uploadDir);
            $file = $request->file('kades_photo');
            if ($file->isValid()) {
                $name = 'kades_' . time() . '_' . $file->getClientOriginalName();
                $file->move($uploadDir, $name);
                $data['kades']['photo'] = '/FOTO/struktur/' . $name;
            }
        }

        $this->saveStrukturData($data);

        return redirect()->route('admin.structure')->with('success', 'Data Kepala Desa berhasil diperbarui');
    }

    // Helpers for Struktur JSON
    private function loadStrukturData(): array
    {
        $path = public_path('data/struktur.json');
        if (File::exists($path)) {
            $data = json_decode(File::get($path), true) ?? [];
        } else {
            $data = [];
        }
        // Ensure collections exist
        $data['entries'] = $data['entries'] ?? [
            'rt' => [], 'dusun' => [], 'perangkat' => [], 'bpd' => [], 'lpm' => []
        ];
        return $data;
    }

    private function saveStrukturData(array $data): void
    {
        $path = public_path('data/struktur.json');
        File::ensureDirectoryExists(dirname($path));
        File::put($path, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }

    public function storeStructureEntry(Request $request)
    {
        $request->validate([
            'category' => 'required|in:rt,dusun,perangkat,bpd,lpm',
            'name' => 'required|string|max:255',
            'role_type' => 'required|in:ketua,sekretaris,laninya,lainnya',
            'role_text' => 'nullable|string|max:255',
            'info' => 'nullable|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096',
        ]);

        $data = $this->loadStrukturData();

        $entry = [
            'id' => uniqid('', true),
            'category' => $request->category,
            'name' => $request->name,
            'role_type' => $request->role_type === 'laninya' ? 'lainnya' : $request->role_type,
            'role_text' => $request->role_text,
            'info' => $request->info,
            'photo' => null,
        ];

        if ($request->hasFile('photo')) {
            $uploadDir = public_path('FOTO/struktur');
            File::ensureDirectoryExists($uploadDir);
            $file = $request->file('photo');
            if ($file->isValid()) {
                $name = 'entry_' . time() . '_' . $file->getClientOriginalName();
                $file->move($uploadDir, $name);
                $entry['photo'] = '/FOTO/struktur/' . $name;
            }
        }

        $data['entries'][$entry['category']][] = $entry;
        $this->saveStrukturData($data);

        return redirect()->route('admin.structure')->with('success', 'Struktur berhasil ditambahkan');
    }

    public function updateStructureEntry(Request $request, string $id)
    {
        $request->validate([
            'category' => 'required|in:rt,dusun,perangkat,bpd,lpm',
            'name' => 'required|string|max:255',
            'role_type' => 'required|in:ketua,sekretaris,lainnya',
            'role_text' => 'nullable|string|max:255',
            'info' => 'nullable|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096',
        ]);

        $data = $this->loadStrukturData();
        $category = $request->category;
        $updated = false;

        foreach ($data['entries'] as $cat => &$list) {
            foreach ($list as &$item) {
                if (($item['id'] ?? '') === $id) {
                    // If category changed, remove and re-add later
                    if ($cat !== $category) {
                        $moved = $item;
                        $list = array_values(array_filter($list, function ($x) use ($id) { return ($x['id'] ?? '') !== $id; }));
                        $item = null; // break marker
                        // set to add to target later
                        $entry = $moved;
                        $entry['category'] = $category;
                    } else {
                        $item['name'] = $request->name;
                        $item['role_type'] = $request->role_type;
                        $item['role_text'] = $request->role_text;
                        $item['info'] = $request->info;
                        $entry =& $item;
                    }

                    if ($request->hasFile('photo')) {
                        $uploadDir = public_path('FOTO/struktur');
                        File::ensureDirectoryExists($uploadDir);
                        $file = $request->file('photo');
                        if ($file->isValid()) {
                            $name = 'entry_' . time() . '_' . $file->getClientOriginalName();
                            $file->move($uploadDir, $name);
                            $entry['photo'] = '/FOTO/struktur/' . $name;
                        }
                    }

                    // If moved to new category
                    if (($entry['category'] ?? $cat) !== $cat) {
                        $data['entries'][$entry['category']][] = $entry;
                    }
                    $updated = true;
                    break 2;
                }
            }
        }

        if ($updated) {
            $this->saveStrukturData($data);
            return redirect()->route('admin.structure')->with('success', 'Struktur berhasil diperbarui');
        }

        return redirect()->route('admin.structure')->with('error', 'Data struktur tidak ditemukan');
    }

    public function deleteStructureEntry(string $id)
    {
        $data = $this->loadStrukturData();
        $removed = false;
        foreach ($data['entries'] as $cat => $list) {
            $filtered = array_values(array_filter($list, function ($x) use ($id) { return ($x['id'] ?? '') !== $id; }));
            if (count($filtered) !== count($list)) {
                $data['entries'][$cat] = $filtered;
                $removed = true;
            }
        }
        if ($removed) {
            $this->saveStrukturData($data);
            return redirect()->route('admin.structure')->with('success', 'Struktur berhasil dihapus');
        }
        return redirect()->route('admin.structure')->with('error', 'Data struktur tidak ditemukan');
    }
}
