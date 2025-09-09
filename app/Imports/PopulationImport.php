<?php

namespace App\Imports;

use App\Models\Population;
use PhpOffice\PhpSpreadsheet\Shared\Date as ExcelDate;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Illuminate\Support\Facades\Log;

class PopulationImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnError, SkipsOnFailure
{
    use Importable, SkipsErrors, SkipsFailures;

    /**
     * Cache data per No KK to forward-fill missing values within the same family card group.
     * @var array<string,array{alamat_kk?:mixed, kk_dikeluarkan?:mixed, suku?:mixed}>
     */
    private array $cacheByNoKk = [];

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // Skip empty rows
        if (empty($row['nama']) && empty($row['nik'])) {
            Log::info('Skipping empty row:', $row);
            return null;
        }

        // Debug: Log the row data
        Log::info('Importing population row:', $row);

        try {
            // Check if NIK already exists
            $existingNik = $row['nik'] ?? null;
            if ($existingNik && Population::where('nik', $existingNik)->exists()) {
                Log::warning('Skipping duplicate NIK', ['nik' => $existingNik, 'nama' => $row['nama']]);
                return null; // Skip this row
            }

            // Generate unique NIK if not provided
            $nik = $row['nik'] ?? null;
            if (!$nik) {
                do {
                    $nik = 'NIK-' . time() . '-' . rand(1000, 9999);
                } while (Population::where('nik', $nik)->exists());
            }

            // Mapping berdasarkan header Excel yang sebenarnya
            $jenisKelamin = 'L'; // default
            if (isset($row['laki_laki']) && $row['laki_laki'] == 1) {
                $jenisKelamin = 'L';
            } elseif (isset($row['perempuan']) && $row['perempuan'] == 1) {
                $jenisKelamin = 'P';
            }

            // Forward-fill values based on no_kk cache
            $noKk = $row['no_kk'] ?? null;
            $cached = $noKk && isset($this->cacheByNoKk[$noKk]) ? $this->cacheByNoKk[$noKk] : [];

            // Ekstrak tanggal, bulan, tahun lahir dari berbagai kemungkinan format
            // Ambil kolom dengan berbagai kemungkinan header
            $valTgl = $this->pick($row, ['tanggal_lahir','tgl','tggl','tanggal','0']);
            $valBln = $this->pick($row, ['bulan_lahir','bulan','bln','1']);
            $valThn = $this->pick($row, ['tahun_lahir','tahun','thn','2']);

            [$tgl, $bln, $thn] = $this->extractDayMonthYear($valTgl, $valBln, $valThn);

            // Bangun tanggal lengkap jika dd, mm, yyyy tersedia
            $fullDob = null;
            if (!empty($tgl) && !empty($bln) && !empty($thn)) {
                $fullDob = sprintf('%s-%s-%s', $thn, $bln, $tgl);
            }

            $populationData = [
                'no_kk' => $row['no_kk'] ?? null,
                // Normalisasi tanggal KK dikeluarkan dari berbagai format (Excel serial / string)
                'kk_dikeluarkan' => $this->normalizeExcelDate($row['kk_di_keluarkan'] ?? ($row['tanggal_kk_dikeluarkan'] ?? ($cached['kk_dikeluarkan'] ?? null))),
                'nik' => $nik,
                'nama' => $row['nama'] ?? 'Nama Tidak Diketahui',
                'alamat_kk' => $row['alamat_kk'] ?? ($cached['alamat_kk'] ?? null),
                'hubungan_kepala_keluarga' => $row['hubungan_kepala_keluarga'] ?? null, // dari log: hubungan_kepala_keluarga
                'jenis_kelamin' => $jenisKelamin,
                'tempat_lahir' => $row['kelahiran'] ?? null, // dari log: kelahiran
                // Simpan tanggal lahir sebagai tanggal penuh jika bisa disusun
                'tanggal_lahir' => $fullDob,
                'bulan_lahir' => $bln,
                'tahun_lahir' => $thn,
                'status_perkawinan' => $row['status'] ?? null, // dari log: status
                'suku' => $row['suku'] ?? ($cached['suku'] ?? null),
                'pendidikan_terakhir' => $row['pendidikan_teralhir'] ?? null, // dari log: pendidikan_teralhir
                'mata_pencaharian' => $row['mata_pencaharian'] ?? null,
                'pekerjaan_tambahan' => $row['pekerjaan_tambahan'] ?? null,
                'motor' => (int)($row['3'] ?? 0), // dari log: "3" adalah motor
                'mobil' => (int)($row['4'] ?? 0), // dari log: "4" adalah mobil
                'sepeda' => 0, // tidak ada di log
                'sapi' => (int)($row['5'] ?? 0), // dari log: "5" adalah sapi
                'kambing' => (int)($row['6'] ?? 0), // dari log: "6" adalah kambing
                'ayam' => (int)($row['7'] ?? 0), // dari log: "7" adalah ayam
                'ikan' => 0, // tidak ada di log
                // Konversi luas dari meter persegi ke hektar (1 ha = 10.000 m2)
                'luas_lahan_pertanian' => $this->convertToHectare($this->pick($row, [
                    'luas_lahan_m_meter','luas_lahan_m_met','luas_lahan_m','luas_lahan','luas_lahan_pertanian','pertanian'
                ])),
                'luas_lahan_peternakan' => 0, // tidak ada di log
                'komoditas_utama' => $row['komoditas'] ?? null, // dari log: komoditas
                'komoditas_buah_sayur' => $row['9'] ?? null, // dari log: "9" adalah buah sayur
                'bantuan' => $row['bantuan'] ?? null,
                'status_kepemilikan_rumah' => $row['status_rumah'] ?? null, // dari log: status_rumah
                'status_dinding' => $row['10'] ?? null, // dari log: "10" adalah dinding
                'status_atap' => $row['11'] ?? null, // dari log: "11" adalah atap
                'status_lantai' => $row['12'] ?? null, // dari log: "12" adalah lantai
                'penggunaan_listrik' => $row['13'] ?? null, // dari log: "13" adalah listrik
                'mck' => null, // tidak ada di log
            ];
            
            Log::info('Creating Population with data:', $populationData);
            
            $population = new Population($populationData);
            $population->save();

            // Update cache for this no_kk with the latest non-null values
            if ($noKk) {
                $this->cacheByNoKk[$noKk] = [
                    'alamat_kk' => $population->alamat_kk,
                    'kk_dikeluarkan' => $population->kk_dikeluarkan,
                    'suku' => $population->suku,
                ];
            }
            
            Log::info('Population saved successfully with ID:', ['id' => $population->id]);
            
            return $population;
        } catch (\Exception $e) {
            Log::error('Error creating Population model', [
                'row' => $row,
                'error' => $e->getMessage()
            ]);
            throw $e;
        }
    }

    /**
     * Validation rules
     */
    public function rules(): array
    {
        return [
            '*.nama' => 'required|string|max:255',
            '*.nik' => 'nullable|string|max:16',
            '*.jenis_kelamin' => 'nullable|in:L,P',
        ];
    }

    /**
     * Custom validation messages
     */
    public function customValidationMessages()
    {
        return [
            '*.nama.required' => 'Nama wajib diisi',
            '*.nik.unique' => 'NIK sudah ada di database',
            '*.jenis_kelamin.in' => 'Jenis kelamin harus L atau P',
        ];
    }

    private function normalizeExcelDate($value): ?string
    {
        if ($value === null || $value === '') {
            return null;
        }
        // If numeric (Excel serial), convert using PhpSpreadsheet helper
        if (is_numeric($value)) {
            try {
                $dateTime = ExcelDate::excelToDateTimeObject((float)$value);
                return $dateTime->format('Y-m-d');
            } catch (\Throwable $e) {
                // fall through to string parsing
            }
        }
        // Try to parse common string formats
        $ts = strtotime((string)$value);
        if ($ts !== false) {
            return date('Y-m-d', $ts);
        }
        return null;
    }

    private function convertToHectare($value): float
    {
        if ($value === null || $value === '') {
            return 0.0;
        }
        // Accept values like "1000", "1.000", "1,000" and convert to float meters
        if (is_string($value)) {
            $normalized = str_replace(['.', ','], ['', '.'], $value);
            if (is_numeric($normalized)) {
                $value = (float)$normalized;
            }
        }
        $meters = (float)$value;
        return round($meters / 10000, 4); // 4 decimal precision for hectares
    }

    /**
     * Extract day, month, year from provided inputs. Inputs may be serials or strings.
     * Returns array [dd, mm, yyyy] with zero-padding for day/month.
     */
    private function extractDayMonthYear($day, $month, $year): array
    {
        // If a complete date is provided in $day, parse it first
        $fullDate = $this->normalizeExcelDate($day);
        if ($fullDate) {
            return [
                date('d', strtotime($fullDate)),
                date('m', strtotime($fullDate)),
                date('Y', strtotime($fullDate)),
            ];
        }

        // Otherwise, try individual components
        $d = $this->parseNumber($day);
        $m = $this->parseNumber($month);
        $y = $this->parseNumber($year);

        $d = $d !== null ? str_pad((string)min(max((int)$d,1),31), 2, '0', STR_PAD_LEFT) : null;
        $m = $m !== null ? str_pad((string)min(max((int)$m,1),12), 2, '0', STR_PAD_LEFT) : null;
        $y = $y !== null ? str_pad((string)min(max((int)$y,1900),2100), 4, '0', STR_PAD_LEFT) : null;

        return [$d, $m, $y];
    }

    private function parseNumber($value): ?int
    {
        if ($value === null || $value === '') return null;
        if (is_numeric($value)) return (int)$value;
        $normalized = preg_replace('/[^0-9]/', '', (string)$value);
        return $normalized === '' ? null : (int)$normalized;
    }

    private function pick(array $row, array $keys)
    {
        foreach ($keys as $k) {
            if (array_key_exists($k, $row) && $row[$k] !== null && $row[$k] !== '') {
                return $row[$k];
            }
        }
        return null;
    }
}
