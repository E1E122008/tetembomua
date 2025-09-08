<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Population;
use Illuminate\Http\Request;
use App\Imports\PopulationImport;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use App\Services\ExcelNormalizationService;
use Illuminate\Support\Facades\Storage;

class PopulationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Urutkan: Kelompok per No KK, lalu prioritas hubungan: KK -> ISTRI -> ANAK -> lainnya, lalu nama
        $populations = Population::orderBy('no_kk')
            ->orderByRaw("CASE 
                WHEN UPPER(TRIM(hubungan_kepala_keluarga)) = 'KK' THEN 0 
                WHEN UPPER(TRIM(hubungan_kepala_keluarga)) = 'ISTRI' THEN 1 
                WHEN UPPER(TRIM(hubungan_kepala_keluarga)) = 'ANAK' THEN 2 
                ELSE 99 END")
            ->orderBy('nama')
            ->get();

        // Soft-normalize date fields so data tersimpan konsisten untuk tampilan berikutnya
        $populations->each(function (Population $p) {
            $dirty = false;

            // Jika tanggal_lahir penuh ada, pecah ke komponen bila kosong
            if (!empty($p->tanggal_lahir) && preg_match('/^\d{4}-\d{2}-\d{2}$/', (string)$p->tanggal_lahir)) {
                $dt = Carbon::parse($p->tanggal_lahir);
                if (empty($p->bulan_lahir)) { $p->bulan_lahir = $dt->format('m'); $dirty = true; }
                if (empty($p->tahun_lahir)) { $p->tahun_lahir = $dt->format('Y'); $dirty = true; }
                if (empty($p->tanggal_lahir)) { $p->tanggal_lahir = $dt->format('d'); $dirty = true; }
            } else {
                // Jika komponen ada, pastikan zero padding dan simpan kembali
                if (!empty($p->tanggal_lahir)) {
                    $d = preg_replace('/[^0-9]/', '', (string)$p->tanggal_lahir);
                    if ($d !== '') { $val = str_pad($d, 2, '0', STR_PAD_LEFT); if ($p->tanggal_lahir !== $val) { $p->tanggal_lahir = $val; $dirty = true; } }
                }
                if (!empty($p->bulan_lahir)) {
                    $m = preg_replace('/[^0-9]/', '', (string)$p->bulan_lahir);
                    if ($m !== '') { $val = str_pad($m, 2, '0', STR_PAD_LEFT); if ($p->bulan_lahir !== $val) { $p->bulan_lahir = $val; $dirty = true; } }
                }
                if (!empty($p->tahun_lahir)) {
                    $y = preg_replace('/[^0-9]/', '', (string)$p->tahun_lahir);
                    if ($y !== '' && $p->tahun_lahir !== $y) { $p->tahun_lahir = $y; $dirty = true; }
                }
            }

            if ($dirty) {
                $p->save();
            }
        });
        return view('admin.population.index', compact('populations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function importExcel(Request $request, ExcelNormalizationService $normalizer)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv'
        ]);
        
        try {
            // Log import start
            \Log::info('Starting population import', [
                'file_name' => $request->file('file')->getClientOriginalName(),
                'file_size' => $request->file('file')->getSize(),
                'user_id' => auth()->id()
            ]);
            
            // Count data before import
            $beforeCount = Population::count();
            
            // Simpan file sementara dan normalisasi header dua baris (seperti contoh CSV)
            // Pastikan folder storage/app/imports ada
            Storage::disk('local')->makeDirectory('imports');
            $tmpPath = $request->file('file')->storeAs(
                'imports',
                uniqid('population_') . '.' . $request->file('file')->getClientOriginalExtension(),
                'local'
            );
            $absPath = Storage::disk('local')->path($tmpPath);

            if (!is_file($absPath)) {
                throw new \RuntimeException("File not found after upload: {$absPath}");
            }

            $normalized = $normalizer->normalize($absPath);

            $importer = new PopulationImport();
            $imported = 0;
            foreach ($normalized['rows'] as $row) {
                // Penyesuaian agar cocok dengan mapping importer
                if (!isset($row['alamat_kk']) && isset($row['alamat'])) {
                    $row['alamat_kk'] = $row['alamat'];
                }

                // Jalankan mapping model per baris
                $model = $importer->model($row);
                if ($model !== null) {
                    $imported++;
                }
            }
            
            // Count data after import
            $afterCount = Population::count();
            $importedCount = $afterCount - $beforeCount;
            
            // Log import success
            \Log::info('Population import successful', [
                'imported_count' => $importedCount,
                'total_count' => $afterCount
            ]);
            
            return redirect()->route('admin.population.index')->with('success', "Data penduduk berhasil diimpor! {$importedCount} data baru ditambahkan.");
            
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            // Handle validation errors
            $errors = $e->failures();
            $errorMessages = [];
            
            foreach ($errors as $error) {
                $errorMessages[] = "Baris {$error->row()}: " . implode(', ', $error->errors());
            }
            
            \Log::error('Population import validation failed', [
                'errors' => $errorMessages,
                'file_name' => $request->file('file')->getClientOriginalName()
            ]);
            
            return redirect()->back()->with('error', 'Gagal import: ' . implode(' | ', $errorMessages));
            
        } catch (\Exception $e) {
            // Handle other errors
            \Log::error('Population import failed', [
                'error' => $e->getMessage(),
                'file' => $request->file('file')->getClientOriginalName(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return redirect()->back()->with('error', 'Gagal import: ' . $e->getMessage());
        }
    }
}