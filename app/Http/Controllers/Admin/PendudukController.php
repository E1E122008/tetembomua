<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Penduduk;
use App\Models\KartuKeluarga;
use App\Models\Dusun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PendudukController extends Controller
{
    /**
     * Display a listing of penduduk grouped by dusun
     */
    public function index(Request $request)
    {
        $dusunId = $request->get('dusun_id');
        $search = $request->get('search');
        
        $query = Penduduk::with('kartuKeluarga.dusun');
        
        // Filter by dusun if selected
        if ($dusunId) {
            $query->whereHas('kartuKeluarga', function($q) use ($dusunId) {
                $q->where('dusun_id', $dusunId);
            });
        }
        
        // Search functionality
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                  ->orWhere('nik', 'like', "%{$search}%")
                  ->orWhere('no_kk', 'like', "%{$search}%");
            });
        }

        $penduduk = $query->orderBy('nama')->paginate(20);
        $dusunList = Dusun::orderBy('nama')->get();
        
        return view('admin.penduduk.index', compact('penduduk', 'dusunList', 'dusunId', 'search'));
    }

    /**
     * Show the form for creating a new penduduk
     */
    public function create()
    {
        $dusunList = Dusun::orderBy('nama')->get();
        $kartuKeluargaList = KartuKeluarga::with('dusun')->orderBy('no_kk')->get();
        
        return view('admin.penduduk.create', compact('dusunList', 'kartuKeluargaList'));
    }

    /**
     * Store a newly created penduduk
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|max:16|unique:penduduk,nik',
            'no_kk' => 'required|string|max:20',
            'jenis_kelamin' => 'required|in:L,P',
            'hubungan_kepala_keluarga' => 'required|string|max:255',
            'alamat_kartu_keluarga' => 'required|string',
            'tanggal_kk_dikeluarkan' => 'required|date',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|integer|min:1|max:31',
            'bulan_lahir' => 'required|integer|min:1|max:12',
            'tahun_lahir' => 'required|integer|min:1900|max:' . date('Y'),
            'status_perkawinan' => 'required|string|max:255',
            'suku' => 'nullable|string|max:255',
            'pendidikan_terakhir' => 'required|string|max:255',
            'mata_pencaharian' => 'required|string|max:255',
            'pekerjaan_tambahan' => 'nullable|string|max:255',
            'kendaraan_mobil' => 'boolean',
            'kendaraan_motor' => 'boolean',
            'kendaraan_sepeda' => 'boolean',
            'ternak_sapi' => 'integer|min:0',
            'ternak_kambing' => 'integer|min:0',
            'ternak_ayam' => 'integer|min:0',
            'ternak_ikan' => 'integer|min:0',
            'luas_lahan_pertanian' => 'numeric|min:0',
            'luas_lahan_peternakan' => 'numeric|min:0',
            'komoditas_utama' => 'nullable|string|max:255',
            'komoditas_buah_sayur' => 'nullable|string|max:255',
            'status_bantuan' => 'boolean',
            'kepemilikan' => 'nullable|string|max:255',
            'status_rumah_dinding' => 'nullable|string|max:255',
            'status_rumah_atap' => 'nullable|string|max:255',
            'status_rumah_listrik' => 'nullable|string|max:255',
            'status_rumah_mck' => 'nullable|string|max:255',
        ]);

        DB::beginTransaction();
        try {
            // Ensure KK exists
            $kk = KartuKeluarga::firstOrCreate(
                ['no_kk' => $request->no_kk],
                [
                    'alamat' => $request->alamat_kartu_keluarga,
                    'tanggal_kk_dikeluarkan' => $request->tanggal_kk_dikeluarkan,
                    'kepala_keluarga' => $request->hubungan_kepala_keluarga === 'Kepala Keluarga' ? $request->nama : null,
                    'desa' => 'Desa Tetembomua',
                    'kecamatan' => 'Kecamatan Tetembomua',
                    'kabupaten' => 'Kabupaten Tetembomua',
                    'provinsi' => 'Sulawesi Tenggara',
                ]
            );

            // Create penduduk
        $penduduk = Penduduk::create($request->all());
            
            DB::commit();

        return redirect()->route('admin.penduduk.index')
                ->with('success', 'Data penduduk berhasil ditambahkan.');
                
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error creating penduduk: ' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Display the specified penduduk
     */
    public function show(Penduduk $penduduk)
    {
        $penduduk->load('kartuKeluarga.dusun');
        return view('admin.penduduk.show', compact('penduduk'));
    }

    /**
     * Show the form for editing the specified penduduk
     */
    public function edit(Penduduk $penduduk)
    {
        $dusunList = Dusun::orderBy('nama')->get();
        $kartuKeluargaList = KartuKeluarga::with('dusun')->orderBy('no_kk')->get();
        
        return view('admin.penduduk.edit', compact('penduduk', 'dusunList', 'kartuKeluargaList'));
    }

    /**
     * Update the specified penduduk
     */
    public function update(Request $request, Penduduk $penduduk)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|max:16|unique:penduduk,nik,' . $penduduk->id,
            'no_kk' => 'required|string|max:20',
            'jenis_kelamin' => 'required|in:L,P',
            'hubungan_kepala_keluarga' => 'required|string|max:255',
            'alamat_kartu_keluarga' => 'required|string',
            'tanggal_kk_dikeluarkan' => 'required|date',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|integer|min:1|max:31',
            'bulan_lahir' => 'required|integer|min:1|max:12',
            'tahun_lahir' => 'required|integer|min:1900|max:' . date('Y'),
            'status_perkawinan' => 'required|string|max:255',
            'suku' => 'nullable|string|max:255',
            'pendidikan_terakhir' => 'required|string|max:255',
            'mata_pencaharian' => 'required|string|max:255',
            'pekerjaan_tambahan' => 'nullable|string|max:255',
            'kendaraan_mobil' => 'boolean',
            'kendaraan_motor' => 'boolean',
            'kendaraan_sepeda' => 'boolean',
            'ternak_sapi' => 'integer|min:0',
            'ternak_kambing' => 'integer|min:0',
            'ternak_ayam' => 'integer|min:0',
            'ternak_ikan' => 'integer|min:0',
            'luas_lahan_pertanian' => 'numeric|min:0',
            'luas_lahan_peternakan' => 'numeric|min:0',
            'komoditas_utama' => 'nullable|string|max:255',
            'komoditas_buah_sayur' => 'nullable|string|max:255',
            'status_bantuan' => 'boolean',
            'kepemilikan' => 'nullable|string|max:255',
            'status_rumah_dinding' => 'nullable|string|max:255',
            'status_rumah_atap' => 'nullable|string|max:255',
            'status_rumah_listrik' => 'nullable|string|max:255',
            'status_rumah_mck' => 'nullable|string|max:255',
        ]);

        DB::beginTransaction();
        try {
            // Update penduduk
        $penduduk->update($request->all());
            
            // Update KK if needed
            $kk = KartuKeluarga::where('no_kk', $request->no_kk)->first();
            if ($kk) {
                $kk->update([
                    'alamat' => $request->alamat_kartu_keluarga,
                    'tanggal_kk_dikeluarkan' => $request->tanggal_kk_dikeluarkan,
                    'kepala_keluarga' => $request->hubungan_kepala_keluarga === 'Kepala Keluarga' ? $request->nama : $kk->kepala_keluarga,
                ]);
            }
            
            DB::commit();

        return redirect()->route('admin.penduduk.index')
                ->with('success', 'Data penduduk berhasil diperbarui.');
                
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error updating penduduk: ' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan saat memperbarui data: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Remove the specified penduduk
     */
    public function destroy(Penduduk $penduduk)
    {
        try {
            $nama = $penduduk->nama;
        $penduduk->delete();

        return redirect()->route('admin.penduduk.index')
                ->with('success', "Data penduduk '{$nama}' berhasil dihapus.");
                
        } catch (\Exception $e) {
            Log::error('Error deleting penduduk: ' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan saat menghapus data: ' . $e->getMessage());
        }
    }

    /**
     * Get penduduk by dusun (AJAX)
     */
    public function getByDusun(Request $request)
    {
        $dusunId = $request->get('dusun_id');
        
        if (!$dusunId) {
            return response()->json(['data' => []]);
        }
        
        $penduduk = Penduduk::whereHas('kartuKeluarga', function($q) use ($dusunId) {
            $q->where('dusun_id', $dusunId);
        })->with('kartuKeluarga.dusun')->orderBy('nama')->get();
        
        return response()->json(['data' => $penduduk]);
    }

    /**
     * Export penduduk data
     */
    public function export(Request $request)
    {
        $dusunId = $request->get('dusun_id');
        
        $query = Penduduk::with('kartuKeluarga.dusun');
        
        if ($dusunId) {
            $query->whereHas('kartuKeluarga', function($q) use ($dusunId) {
                $q->where('dusun_id', $dusunId);
            });
        }
        
        $penduduk = $query->orderBy('nama')->get();
        
        // Create CSV
        $filename = 'data_penduduk_' . date('Y-m-d_H-i-s') . '.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];
        
        $callback = function() use ($penduduk) {
            $file = fopen('php://output', 'w');
            
            // CSV Headers
            fputcsv($file, [
                'Nama', 'NIK', 'No KK', 'Jenis Kelamin', 'Hubungan KK',
                'Alamat', 'Tanggal KK Dikeluarkan', 'Tempat Lahir', 'Tanggal Lahir',
                'Bulan Lahir', 'Tahun Lahir', 'Status Perkawinan', 'Suku',
                'Pendidikan Terakhir', 'Mata Pencaharian', 'Pekerjaan Tambahan',
                'Kendaraan Mobil', 'Kendaraan Motor', 'Kendaraan Sepeda',
                'Ternak Sapi', 'Ternak Kambing', 'Ternak Ayam', 'Ternak Ikan',
                'Luas Lahan Pertanian', 'Luas Lahan Peternakan', 'Komoditas Utama',
                'Komoditas Buah Sayur', 'Status Bantuan', 'Kepemilikan',
                'Status Rumah Dinding', 'Status Rumah Atap', 'Status Rumah Listrik',
                'Status Rumah MCK', 'Dusun'
            ]);
            
            // CSV Data
            foreach ($penduduk as $p) {
                fputcsv($file, [
                    $p->nama, $p->nik, $p->no_kk, $p->jenis_kelamin, $p->hubungan_kepala_keluarga,
                    $p->alamat_kartu_keluarga, $p->tanggal_kk_dikeluarkan, $p->tempat_lahir,
                    $p->tanggal_lahir, $p->bulan_lahir, $p->tahun_lahir, $p->status_perkawinan,
                    $p->suku, $p->pendidikan_terakhir, $p->mata_pencaharian, $p->pekerjaan_tambahan,
                    $p->kendaraan_mobil ? 'Ya' : 'Tidak', $p->kendaraan_motor ? 'Ya' : 'Tidak',
                    $p->kendaraan_sepeda ? 'Ya' : 'Tidak', $p->ternak_sapi, $p->ternak_kambing,
                    $p->ternak_ayam, $p->ternak_ikan, $p->luas_lahan_pertanian, $p->luas_lahan_peternakan,
                    $p->komoditas_utama, $p->komoditas_buah_sayur, $p->status_bantuan ? 'Ya' : 'Tidak',
                    $p->kepemilikan, $p->status_rumah_dinding, $p->status_rumah_atap,
                    $p->status_rumah_listrik, $p->status_rumah_mck,
                    $p->kartuKeluarga->dusun->nama ?? 'Tidak Diketahui'
                ]);
            }
            
            fclose($file);
        };
        
        return response()->stream($callback, 200, $headers);
    }
}