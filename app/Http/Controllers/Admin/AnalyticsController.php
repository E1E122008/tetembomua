<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Penduduk;
use App\Models\KartuKeluarga;
use App\Models\Dusun;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AnalyticsController extends Controller
{
    public function dashboard()
    {
        // Total penduduk
        $totalPenduduk = Penduduk::count();
        $totalLakiLaki = Penduduk::where('jenis_kelamin', 'L')->count();
        $totalPerempuan = Penduduk::where('jenis_kelamin', 'P')->count();
        
        // Distribusi usia
        $usiaAnak = Penduduk::whereRaw('YEAR(CURDATE()) - tahun_lahir <= 17')->count();
        $usiaProduktif = Penduduk::whereRaw('YEAR(CURDATE()) - tahun_lahir BETWEEN 18 AND 60')->count();
        $usiaLansia = Penduduk::whereRaw('YEAR(CURDATE()) - tahun_lahir > 60')->count();
        
        // Data per dusun
        $dataPerDusun = Dusun::withCount(['kartuKeluarga as total_kk'])
            ->withCount(['kartuKeluarga as total_penduduk' => function($query) {
                $query->join('penduduk', 'kartu_keluarga.no_kk', '=', 'penduduk.no_kk');
            }])
            ->withCount(['kartuKeluarga as laki_laki' => function($query) {
                $query->join('penduduk', 'kartu_keluarga.no_kk', '=', 'penduduk.no_kk')
                      ->where('penduduk.jenis_kelamin', 'L');
            }])
            ->withCount(['kartuKeluarga as perempuan' => function($query) {
                $query->join('penduduk', 'kartu_keluarga.no_kk', '=', 'penduduk.no_kk')
                      ->where('penduduk.jenis_kelamin', 'P');
            }])
            ->get();
        
        // Tingkat pendidikan
        $pendidikan = Penduduk::selectRaw('pendidikan_terakhir, COUNT(*) as jumlah')
            ->groupBy('pendidikan_terakhir')
            ->orderBy('jumlah', 'desc')
            ->get();
        
        // Mata pencaharian
        $mataPencaharian = Penduduk::selectRaw('mata_pencaharian, COUNT(*) as jumlah')
            ->groupBy('mata_pencaharian')
            ->orderBy('jumlah', 'desc')
            ->get();
        
        // Kepemilikan kendaraan
        $kendaraan = [
            'mobil' => Penduduk::where('kendaraan_mobil', true)->count(),
            'motor' => Penduduk::where('kendaraan_motor', true)->count(),
            'sepeda' => Penduduk::where('kendaraan_sepeda', true)->count(),
        ];
        
        // Status rumah
        $statusRumah = [
            'dinding' => Penduduk::selectRaw('status_rumah_dinding, COUNT(*) as jumlah')
                ->groupBy('status_rumah_dinding')
                ->get(),
            'atap' => Penduduk::selectRaw('status_rumah_atap, COUNT(*) as jumlah')
                ->groupBy('status_rumah_atap')
                ->get(),
            'listrik' => Penduduk::selectRaw('status_rumah_listrik, COUNT(*) as jumlah')
                ->groupBy('status_rumah_listrik')
                ->get(),
            'mck' => Penduduk::selectRaw('status_rumah_mck, COUNT(*) as jumlah')
                ->groupBy('status_rumah_mck')
                ->get(),
        ];
        
        // KK yang perlu update (>5 tahun)
        $kkPerluUpdate = KartuKeluarga::whereRaw('DATEDIFF(CURDATE(), tanggal_kk_dikeluarkan) > 1825')
            ->count();
        
        // Data ternak
        $ternak = [
            'sapi' => Penduduk::sum('ternak_sapi'),
            'kambing' => Penduduk::sum('ternak_kambing'),
            'ayam' => Penduduk::sum('ternak_ayam'),
            'ikan' => Penduduk::sum('ternak_ikan'),
        ];
        
        // Lahan pertanian
        $lahanPertanian = Penduduk::sum('luas_lahan_pertanian');
        $lahanPeternakan = Penduduk::sum('luas_lahan_peternakan');
        
        return view('admin.analytics.dashboard', compact(
            'totalPenduduk', 'totalLakiLaki', 'totalPerempuan',
            'usiaAnak', 'usiaProduktif', 'usiaLansia',
            'dataPerDusun', 'pendidikan', 'mataPencaharian',
            'kendaraan', 'statusRumah', 'kkPerluUpdate',
            'ternak', 'lahanPertanian', 'lahanPeternakan'
        ));
    }
    
    public function pendudukPerDusun()
    {
        $data = Dusun::withCount(['kartuKeluarga as total_kk'])
            ->withCount(['kartuKeluarga as total_penduduk' => function($query) {
                $query->join('penduduk', 'kartu_keluarga.no_kk', '=', 'penduduk.no_kk');
            }])
            ->withCount(['kartuKeluarga as laki_laki' => function($query) {
                $query->join('penduduk', 'kartu_keluarga.no_kk', '=', 'penduduk.no_kk')
                      ->where('penduduk.jenis_kelamin', 'L');
            }])
            ->withCount(['kartuKeluarga as perempuan' => function($query) {
                $query->join('penduduk', 'kartu_keluarga.no_kk', '=', 'penduduk.no_kk')
                      ->where('penduduk.jenis_kelamin', 'P');
            }])
            ->get();
        
        return view('admin.analytics.penduduk-per-dusun', compact('data'));
    }
    
    public function kkExpired()
    {
        $data = KartuKeluarga::with('dusun')
            ->whereRaw('DATEDIFF(CURDATE(), tanggal_kk_dikeluarkan) > 1825')
            ->withCount('penduduk')
            ->orderBy('tanggal_kk_dikeluarkan', 'asc')
            ->get();
        
        return view('admin.analytics.kk-expired', compact('data'));
    }
    
    public function usiaProduktif()
    {
        $data = Penduduk::with(['kartuKeluarga.dusun'])
            ->whereRaw('YEAR(CURDATE()) - tahun_lahir BETWEEN 18 AND 60')
            ->orderBy('tahun_lahir', 'desc')
            ->get();
        
        return view('admin.analytics.usia-produktif', compact('data'));
    }
    
    public function usiaSekolah()
    {
        $data = Penduduk::with(['kartuKeluarga.dusun'])
            ->whereRaw('YEAR(CURDATE()) - tahun_lahir BETWEEN 6 AND 18')
            ->orderBy('tahun_lahir', 'desc')
            ->get();
        
        return view('admin.analytics.usia-sekolah', compact('data'));
    }
    
    public function lansia()
    {
        $data = Penduduk::with(['kartuKeluarga.dusun'])
            ->whereRaw('YEAR(CURDATE()) - tahun_lahir > 60')
            ->orderBy('tahun_lahir', 'asc')
            ->get();
        
        return view('admin.analytics.lansia', compact('data'));
    }
    
    public function bantuanSosial()
    {
        $data = Penduduk::with(['kartuKeluarga.dusun'])
            ->where('status_bantuan', true)
            ->get();
        
        return view('admin.analytics.bantuan-sosial', compact('data'));
    }
    
    public function potensiEkonomi()
    {
        // Data ternak per dusun
        $ternakPerDusun = Dusun::with(['kartuKeluarga.penduduk'])
            ->get()
            ->map(function($dusun) {
                $ternak = [
                    'sapi' => 0,
                    'kambing' => 0,
                    'ayam' => 0,
                    'ikan' => 0,
                ];
                
                foreach($dusun->kartuKeluarga as $kk) {
                    foreach($kk->penduduk as $penduduk) {
                        $ternak['sapi'] += $penduduk->ternak_sapi;
                        $ternak['kambing'] += $penduduk->ternak_kambing;
                        $ternak['ayam'] += $penduduk->ternak_ayam;
                        $ternak['ikan'] += $penduduk->ternak_ikan;
                    }
                }
                
                return [
                    'dusun' => $dusun->nama,
                    'ternak' => $ternak
                ];
            });
        
        // Data lahan per dusun
        $lahanPerDusun = Dusun::with(['kartuKeluarga.penduduk'])
            ->get()
            ->map(function($dusun) {
                $lahan = [
                    'pertanian' => 0,
                    'peternakan' => 0,
                ];
                
                foreach($dusun->kartuKeluarga as $kk) {
                    foreach($kk->penduduk as $penduduk) {
                        $lahan['pertanian'] += $penduduk->luas_lahan_pertanian;
                        $lahan['peternakan'] += $penduduk->luas_lahan_peternakan;
                    }
                }
                
                return [
                    'dusun' => $dusun->nama,
                    'lahan' => $lahan
                ];
            });
        
        // Komoditas utama
        $komoditas = Penduduk::selectRaw('komoditas_utama, COUNT(*) as jumlah')
            ->whereNotNull('komoditas_utama')
            ->groupBy('komoditas_utama')
            ->orderBy('jumlah', 'desc')
            ->get();
        
        return view('admin.analytics.potensi-ekonomi', compact(
            'ternakPerDusun', 'lahanPerDusun', 'komoditas'
        ));
    }
}
