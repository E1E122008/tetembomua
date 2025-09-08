<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KartuKeluarga;
use App\Models\Penduduk;
use App\Services\ExcelNormalizationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Excel as MaatExcel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ImportController extends Controller
{
    public function uploadForm()
    {
        return view('admin.imports.upload');
    }

    public function handleUpload(Request $request, ExcelNormalizationService $service)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,xls,csv',
        ]);

        $path = $request->file('file')->store('imports');
        $abs = Storage::path($path);

        $result = $service->normalize($abs);

        // Keep in session for preview/commit
        $jobId = (string) Str::uuid();
        session(["import_job.$jobId" => [
            'path' => $path,
            'headers' => $result['headers'],
            'rows' => $result['rows'],
            'default_dusun' => $request->input('default_dusun'),
        ]]);
        // Keep reference to latest job so user can continue later
        session(['import_job_last' => $jobId]);

        return redirect()->route('admin.import.preview', ['job' => $jobId]);
    }

    public function preview(Request $request)
    {
        $jobId = $request->query('job');
        $state = session("import_job.$jobId");
        abort_if(!$state, 404);
        return view('admin.imports.preview', [
            'job' => $jobId,
            'headers' => $state['headers'],
            'rows' => $state['rows'],
        ]);
    }

    public function commit(Request $request)
    {
        $request->validate([
            'job' => 'required',
            'mode' => 'required|in:insert,upsert,skip',
        ]);

        $jobId = $request->input('job');
        $state = session("import_job.$jobId");
        abort_if(!$state, 404);

        // Apply client-side edits when provided
        $rows = $state['rows'];
        if ($request->filled('edited_rows')) {
            $edited = json_decode($request->input('edited_rows'), true);
            if (is_array($edited)) {
                $rows = $edited;
            }
        }
        $headers = $state['headers'];
        $defaultDusunId = $state['default_dusun'] ?? null;

        $map = $this->buildMap($headers);
        
        // Log headers and mapping for debugging
        Log::info("Import headers: " . json_encode($headers));
        Log::info("Import mapping: " . json_encode($map));

        $inserted = 0; $updated = 0; $skipped = 0; $errors = 0;

        DB::beginTransaction();
        try {
            foreach ($rows as $rowIndex => $row) {
                try {
                $data = $this->mapRow($row, $map);
                    
                    // Skip empty rows
                    if (!$data['nik'] && !$data['nama']) { 
                        $skipped++; 
                        continue; 
                    }

                    // Validate required fields
                    if (empty($data['nama'])) {
                        $errors++;
                        Log::warning("Row {$rowIndex}: Missing nama field");
                        Log::warning("Row {$rowIndex} data: " . json_encode($data));
                        Log::warning("Row {$rowIndex} raw: " . json_encode($row));
                        continue;
                    }

                // Ensure KK exists
                $kk = null;
                    if (!empty($data['no_kk'])) {
                        // Find kepala keluarga from the data
                        $kepalaKeluarga = $data['nama'] ?? 'Tidak Diketahui';
                        if (isset($data['hubungan_kepala_keluarga']) && 
                            in_array(strtoupper($data['hubungan_kepala_keluarga']), ['KK', 'KEPALA KELUARGA'])) {
                            $kepalaKeluarga = $data['nama'];
                        }
                        
                    $kk = KartuKeluarga::firstOrCreate(
                        ['no_kk' => $data['no_kk']],
                        [
                                'alamat' => $data['alamat_kartu_keluarga'] ?? '',
                                'tanggal_kk_dikeluarkan' => $data['tanggal_kk_dikeluarkan'],
                                'kepala_keluarga' => $kepalaKeluarga,
                            'dusun_id' => $this->resolveDusunId($row, $headers, $defaultDusunId),
                                'desa' => 'Desa Tetembomua', // Use actual desa name
                                'kecamatan' => 'Kecamatan Tetembomua',
                                'kabupaten' => 'Kabupaten Tetembomua',
                                'provinsi' => 'Sulawesi Tenggara',
                        ]
                    );
                }

                // Upsert penduduk by NIK (or insert if mode insert)
                    $existing = !empty($data['nik']) ? Penduduk::where('nik', $data['nik'])->first() : null;
                if ($existing) {
                    if ($request->input('mode') === 'upsert') {
                            $data['kartu_keluarga_id'] = $kk ? $kk->id : null;
                        $existing->fill($data);
                        $existing->save();
                        $updated++;
                    } else {
                        $skipped++;
                    }
                } else {
                        // Create new penduduk
                        $data['kartu_keluarga_id'] = $kk ? $kk->id : null;
                    Penduduk::create($data);
                    $inserted++;
                    }
                } catch (\Exception $e) {
                    $errors++;
                    Log::error("Error processing row {$rowIndex}: " . $e->getMessage());
                    Log::error("Row data: " . json_encode($row));
                    // Continue processing other rows
                }
            }
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
            report($e);
            return back()->with('error', 'Terjadi kesalahan saat menyimpan: '.$e->getMessage());
        }

        // Clear session job
        session()->forget("import_job.$jobId");

        return redirect()->route('admin.import.upload')
            ->with('success', "Import selesai! Data berhasil disimpan ke database. Inserted: $inserted, Updated: $updated, Skipped: $skipped, Errors: $errors");
    }

    public function exportPreview(Request $request)
    {
        $jobId = $request->query('job');
        $state = session("import_job.$jobId");
        abort_if(!$state, 404);

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Headers
        foreach ($state['headers'] as $i => $h) {
            $sheet->setCellValueByColumnAndRow($i+1, 1, $h);
        }
        // Rows
        foreach ($state['rows'] as $rIndex => $row) {
            $col = 1;
            foreach ($state['headers'] as $h) {
                $sheet->setCellValueByColumnAndRow($col, $rIndex + 2, $row[$h] ?? null);
                $col++;
            }
        }

        $writer = new Xlsx($spreadsheet);
        $fileName = 'preview_normalized_'.date('Ymd_His').'.xlsx';
        $tmp = storage_path('app/tmp_'.$fileName);
        $writer->save($tmp);
        return response()->download($tmp, $fileName)->deleteFileAfterSend(true);
    }

    private function buildMap(array $headers): array
    {
        // Map various possible headers to internal fields
        $aliases = [
            'no_kk' => ['no_kk','kk','no. kk'],
            'alamat_kartu_keluarga' => ['alamat','alamat_kartu_keluarga','alamat kk'],
            'tanggal_kk_dikeluarkan' => ['tanggal_kk_dikeluarkan','kk_di_keluarkan_pada_tanggal','tanggal kk dikeluarkan'],
            'nik' => ['nik'],
            'nama' => ['nama','nama_lengkap','name','Nama','NAMA','Nama Lengkap'],
            'jenis_kelamin' => ['jenis_kelamin','jk','gender'],
            'hubungan_kepala_keluarga' => ['hubungan_kepala_keluarga','hubungan kk'],
            'tempat_lahir' => ['tempat','tempat_lahir','kelahiran'],
            'tanggal_lahir' => ['tanggal_lahir','tanggal','tgl','_2'],
            'bulan_lahir' => ['bulan_lahir','bulan','_3'],
            'tahun_lahir' => ['tahun_lahir','tahun','_4'],
            'status_perkawinan' => ['status_perkawinan','status'],
            'suku' => ['suku'],
            'pendidikan_terakhir' => ['pendidikan_terakhir','pendidikan','pendidikan_teralhir'],
            'mata_pencaharian' => ['mata_pencaharian','pekerjaan'],
            'pekerjaan_tambahan' => ['pekerjaan_tambahan','pekerjaan tambahan'],
            'kendaraan_mobil' => ['kendaraan_mobil','mobil'],
            'kendaraan_motor' => ['kendaraan_motor','motor'],
            'kendaraan_sepeda' => ['kendaraan_sepeda','sepeda'],
            'ternak_sapi' => ['ternak_sapi','sapi'],
            'ternak_kambing' => ['ternak_kambing','kambing'],
            'ternak_ayam' => ['ternak_ayam','ayam'],
            'ternak_ikan' => ['ternak_ikan','ikan'],
            'luas_lahan_pertanian' => ['luas_lahan_pertanian','pertanian','luas_lahan_m(meter)'],
            'luas_lahan_peternakan' => ['luas_lahan_peternakan','peternakan'],
            'komoditas_utama' => ['komoditas_utama','komoditas utama','komoditas'],
            'komoditas_buah_sayur' => ['komoditas_buah_sayur','buah & sayur'],
            'status_bantuan' => ['status_bantuan','bantuan'],
            'kepemilikan' => ['kepemilikan','status_rumah'],
            'status_rumah_dinding' => ['status_rumah_dinding','dinding','_12'],
            'status_rumah_atap' => ['status_rumah_atap','atap','_13'],
            'status_rumah_listrik' => ['status_rumah_listrik','penggunaan_listrik','penggunaan listrik','_14'],
            'status_rumah_mck' => ['status_rumah_mck','mck','_15'],
            'dusun' => ['dusun'],
        ];
        $map = [];
        foreach ($aliases as $field => $cands) {
            foreach ($cands as $cand) {
                foreach ($headers as $h) {
                    if ($h === $cand) { $map[$field] = $h; break 2; }
                }
            }
        }
        return $map;
    }

    private function mapRow(array $row, array $map): array
    {
        $out = [];
        foreach ($map as $field => $header) {
            $out[$field] = $row[$header] ?? null;
        }
        
        // Handle L/P columns for gender (from log data)
        if (!isset($out['jenis_kelamin']) || empty($out['jenis_kelamin'])) {
            if (isset($row['l']) && !empty($row['l'])) {
                $out['jenis_kelamin'] = 'L';
            } elseif (isset($row['p']) && !empty($row['p'])) {
                $out['jenis_kelamin'] = 'P';
            } else {
                $out['jenis_kelamin'] = 'L'; // Default
            }
        } else {
        // Normalize gender to L/P
            $g = strtolower((string)$out['jenis_kelamin']);
            $out['jenis_kelamin'] = in_array($g, ['p','perempuan','female','f']) ? 'P' : 'L';
        }
        
        // Normalize boolean fields
        $booleanFields = ['kendaraan_mobil', 'kendaraan_motor', 'kendaraan_sepeda', 'status_bantuan'];
        foreach ($booleanFields as $field) {
            if (isset($out[$field])) {
                $out[$field] = $this->parseBoolean($out[$field]);
            } else {
                $out[$field] = false;
            }
        }
        
        // Normalize numeric fields
        $numericFields = ['ternak_sapi', 'ternak_kambing', 'ternak_ayam', 'ternak_ikan'];
        foreach ($numericFields as $field) {
            if (isset($out[$field])) {
                $value = $out[$field];
                if ($value === '-' || $value === '' || $value === null) {
                    $out[$field] = 0;
                } else {
                    $out[$field] = (int)$value;
                }
            } else {
                $out[$field] = 0;
            }
        }
        
        // Normalize decimal fields
        $decimalFields = ['luas_lahan_pertanian', 'luas_lahan_peternakan'];
        foreach ($decimalFields as $field) {
            if (isset($out[$field])) {
                $value = $out[$field];
                if ($value === '-' || $value === '' || $value === null) {
                    $out[$field] = 0.0;
                } else {
                    // Clean numeric value (remove spaces, commas)
                    $value = preg_replace('/[^\d.]/', '', $value);
                    $out[$field] = (float)($value ?: 0);
                }
            } else {
                $out[$field] = 0.0;
            }
        }
        
        // Normalize date fields
        if (!empty($out['tanggal_kk_dikeluarkan'])) {
            try {
                $out['tanggal_kk_dikeluarkan'] = \Carbon\Carbon::parse($out['tanggal_kk_dikeluarkan']);
            } catch (\Exception $e) {
                $out['tanggal_kk_dikeluarkan'] = now();
            }
        } else {
            $out['tanggal_kk_dikeluarkan'] = now();
        }
        
        // Normalize birth date components
        $out['tanggal_lahir'] = (int)($out['tanggal_lahir'] ?? 1);
        $out['bulan_lahir'] = (int)($out['bulan_lahir'] ?? 1);
        $out['tahun_lahir'] = (int)($out['tahun_lahir'] ?? 1990);
        
        // Normalize NIK (truncate to 16 characters if too long)
        if (!empty($out['nik'])) {
            $out['nik'] = substr($out['nik'], 0, 16);
        }
        
        // Normalize No KK (truncate to 20 characters if too long)
        if (!empty($out['no_kk'])) {
            $out['no_kk'] = substr($out['no_kk'], 0, 20);
        }
        
        // Fallbacks for required fields
        $out['hubungan_kepala_keluarga'] = $out['hubungan_kepala_keluarga'] ?? 'Anak';
        $out['status_perkawinan'] = $out['status_perkawinan'] ?? 'Belum Kawin';
        $out['pendidikan_terakhir'] = $out['pendidikan_terakhir'] ?? 'Tidak Sekolah';
        $out['mata_pencaharian'] = $out['mata_pencaharian'] ?? 'Tidak Bekerja';
        $out['tempat_lahir'] = $out['tempat_lahir'] ?? '';
        $out['suku'] = $out['suku'] ?? '';
        
        return $out;
    }
    
    private function parseBoolean($value): bool
    {
        if (is_bool($value)) {
            return $value;
        }
        
        if (is_string($value)) {
            $value = strtolower(trim($value));
            if ($value === '-' || $value === '' || $value === 'null') {
                return false;
            }
            return in_array($value, ['ya', 'yes', 'true', '1', 'ada', 'punya']);
        }
        
        if ($value === null || $value === '') {
            return false;
        }
        
        return (bool)$value;
    }

    private function resolveDusunId(array $row, array $headers, $defaultDusunId)
    {
        // 1) From row value
        if (in_array('dusun', $headers, true)) {
            $name = trim((string)($row['dusun'] ?? ''));
            if ($name !== '') {
                $existing = \App\Models\Dusun::where('nama', $name)->first();
                if ($existing) return $existing->id;
                $created = \App\Models\Dusun::create(['nama' => $name]);
                return $created->id;
            }
        }
        // 2) Fallback to default
        return $defaultDusunId ?: null;
    }

    // --- Delete Utilities ---
    public function tools()
    {
        return view('admin.imports.upload');
    }

    public function deletePenduduk(Request $request)
    {
        $request->validate(['nik' => 'required|string']);
        $count = \App\Models\Penduduk::where('nik', $request->input('nik'))->delete();
        return back()->with('status', "Hapus penduduk selesai: $count baris");
    }

    public function deleteKk(Request $request)
    {
        $request->validate(['no_kk' => 'required|string']);
        $kk = \App\Models\KartuKeluarga::where('no_kk', $request->input('no_kk'))->first();
        if (!$kk) {
            return back()->with('status', 'No KK tidak ditemukan');
        }
        // Hapus anggota terlebih dahulu (FK)
        $kk->penduduk()->delete();
        $kk->delete();
        return back()->with('status', 'Kartu Keluarga dan semua anggotanya telah dihapus');
    }

    public function clearPenduduk()
    {
        DB::table('penduduk')->truncate();
        return back()->with('status', 'Seluruh data penduduk telah dikosongkan');
    }

    public function clearKk()
    {
        // Kosongkan penduduk lalu KK
        DB::table('penduduk')->truncate();
        DB::table('kartu_keluarga')->truncate();
        return back()->with('status', 'Seluruh data KK dan penduduk telah dikosongkan');
    }
}


