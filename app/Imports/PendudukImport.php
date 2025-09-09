<?php

namespace App\Imports;

use App\Models\Penduduk;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Concerns\Importable;
use Carbon\Carbon;

class PendudukImport implements ToModel, WithHeadingRow, WithValidation, WithUpserts
{
    use Importable;

    /**
     * Counter for how many rows are considered valid and converted to models.
     * This helps the controller detect when nothing was actually imported.
     */
    private int $rows = 0;

    /**
     * Normalize incoming row from various header names to internal field names.
     * Supports alternative headers commonly found in user-provided spreadsheets.
     */
    private function normalizeRow(array $row): array
    {
        // Ensure keys are snake_case and trimmed (WithHeadingRow already does basic conversion)
        $normalized = [];
        foreach ($row as $key => $value) {
            $normalizedKey = is_string($key) ? trim(strtolower($key)) : $key;
            $normalized[$normalizedKey] = is_string($value) ? trim($value) : $value;
        }

        // Header alias mapping => internal field name
        $aliasToField = [
            // Basic identity
            'nama' => 'nama',
            'nik' => 'nik',
            'no_kk' => 'no_kk',
            'no\. kk' => 'no_kk',
            'kk' => 'no_kk',

            // Alamat & KK date
            'alamat kartu keluarga' => 'alamat_kartu_keluarga',
            'alamat_kartu_keluarga' => 'alamat_kartu_keluarga',
            'kk_di_keluarkan_pada_tanggal' => 'tanggal_kk_dikeluarkan',
            'kk dikeluarkan pada tanggal' => 'tanggal_kk_dikeluarkan',
            'tanggal kk dikeluarkan' => 'tanggal_kk_dikeluarkan',

            // Jenis kelamin (from explicit field or L/P columns)
            'jenis_kelamin' => 'jenis_kelamin',

            // Hubungan KK
            'hubungan_kepala_keluarga' => 'hubungan_kepala_keluarga',
            'hubungan kepala keluarga' => 'hubungan_kepala_keluarga',

            // Tempat/Tanggal Lahir variants
            'tempat' => 'tempat_lahir',
            'tempat_lahir' => 'tempat_lahir',
            'tanggal' => 'tanggal_lahir',
            'tgl' => 'tanggal_lahir',
            'bulan' => 'bulan_lahir',
            'tahun' => 'tahun_lahir',
            'tanggal_lahir' => 'tanggal_lahir',
            'bulan_lahir' => 'bulan_lahir',
            'tahun_lahir' => 'tahun_lahir',

            // Status, suku, pendidikan, pekerjaan
            'status' => 'status_perkawinan',
            'status_perkawinan' => 'status_perkawinan',
            'suku' => 'suku',
            'pendidikan' => 'pendidikan_terakhir',
            'pendidikan_terakhir' => 'pendidikan_terakhir',
            'mata_pencaharian' => 'mata_pencaharian',
            'pekerjaan_tambahan' => 'pekerjaan_tambahan',
            'pekerjaan tambahan' => 'pekerjaan_tambahan',

            // Kendaraan
            'mobil' => 'kendaraan_mobil',
            'motor' => 'kendaraan_motor',
            'sepeda' => 'kendaraan_sepeda',
            'kendaraan_mobil' => 'kendaraan_mobil',
            'kendaraan_motor' => 'kendaraan_motor',
            'kendaraan_sepeda' => 'kendaraan_sepeda',

            // Ternak
            'sapi' => 'ternak_sapi',
            'kambing' => 'ternak_kambing',
            'ayam' => 'ternak_ayam',
            'ikan' => 'ternak_ikan',
            'ternak_sapi' => 'ternak_sapi',
            'ternak_kambing' => 'ternak_kambing',
            'ternak_ayam' => 'ternak_ayam',
            'ternak_ikan' => 'ternak_ikan',

            // Luas lahan
            'luas_lahan_pertanian' => 'luas_lahan_pertanian',
            'luas lahan (meter) pertanian' => 'luas_lahan_pertanian',
            'pertanian' => 'luas_lahan_pertanian',
            'luas_lahan_peternakan' => 'luas_lahan_peternakan',
            'luas lahan (meter) peternakan' => 'luas_lahan_peternakan',
            'peternakan' => 'luas_lahan_peternakan',

            // Komoditas & bantuan
            'komoditas_utama' => 'komoditas_utama',
            'komoditas utama' => 'komoditas_utama',
            'buah & sayur' => 'komoditas_buah_sayur',
            'komoditas_buah_sayur' => 'komoditas_buah_sayur',
            'bantuan' => 'status_bantuan',

            // Rumah
            'kepemilikan' => 'kepemilikan',
            'dinding' => 'status_rumah_dinding',
            'atap' => 'status_rumah_atap',
            'penggunaan_listrik' => 'status_rumah_listrik',
            'penggunaan listrik' => 'status_rumah_listrik',
            'mck' => 'status_rumah_mck',
        ];

        $mapped = [];
        foreach ($aliasToField as $alias => $field) {
            foreach ($normalized as $key => $value) {
                if ($key === $alias) {
                    $mapped[$field] = $value;
                }
            }
        }

        // Handle L/P columns for gender if present
        if (!isset($mapped['jenis_kelamin'])) {
            $nilaiL = $normalized['l'] ?? null;
            $nilaiP = $normalized['p'] ?? null;
            if ($this->truthy($nilaiL)) {
                $mapped['jenis_kelamin'] = 'L';
            } elseif ($this->truthy($nilaiP)) {
                $mapped['jenis_kelamin'] = 'P';
            }
        }

        // If tanggal lahir split across tgl/bulan/tahun, copy as-is (handled in model())
        $mapped['tanggal_lahir'] = $mapped['tanggal_lahir'] ?? ($normalized['tanggal'] ?? ($normalized['tgl'] ?? ($normalized['tanggal_lahir'] ?? null)));
        $mapped['bulan_lahir'] = $mapped['bulan_lahir'] ?? ($normalized['bulan'] ?? ($normalized['bulan_lahir'] ?? null));
        $mapped['tahun_lahir'] = $mapped['tahun_lahir'] ?? ($normalized['tahun'] ?? ($normalized['tahun_lahir'] ?? null));

        return $mapped + $normalized; // prefer mapped keys but keep original for any fallbacks
    }

    /**
     * Upsert by unique NIK to avoid duplicate key errors.
     */
    public function uniqueBy()
    {
        return 'nik';
    }

    private function truthy($value): bool
    {
        if (is_bool($value)) return $value;
        if (is_numeric($value)) return (float)$value != 0.0;
        if (is_string($value)) {
            $v = strtolower(trim($value));
            return in_array($v, ['1','ya','y','yes','true','ada','punya']);
        }
        return !empty($value);
    }

    /**
     * Normalize Excel numeric identifiers (avoid scientific notation and keep as string).
     */
    private function normalizeIdNumber($value): ?string
    {
        if ($value === null || $value === '') return null;
        if (is_string($value)) {
            $trimmed = trim($value);
            // Remove spaces and non-digits except leading zeros should be preserved
            if (preg_match('/^[0-9]+$/', $trimmed)) {
                return $trimmed;
            }
            // If contains scientific notation, try to expand using BCMath style fallback
            if (stripos($trimmed, 'e+') !== false || stripos($trimmed, 'e-') !== false) {
                // Best-effort expansion for common Excel export formats
                $parts = preg_split('/e\+?/i', $trimmed);
                if (count($parts) === 2 && is_numeric($parts[0]) && is_numeric($parts[1])) {
                    $base = str_replace(['.', ','], '', (string)$parts[0]);
                    $exp = (int)$parts[1];
                    return $base . str_repeat('0', max(0, $exp - (strlen($base) - 1)));
                }
            }
            // Fallback: strip non-digits
            $digits = preg_replace('/\D+/', '', $trimmed);
            return $digits ?: null;
        }
        if (is_int($value)) return (string)$value;
        if (is_float($value)) {
            // Avoid scientific notation; drop decimal part
            return sprintf('%.0f', $value);
        }
        return null;
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // Allow flexible headers by normalizing/mapping aliases
        $row = $this->normalizeRow($row);

        // Skip empty or separator rows (no core identifiers)
        $maybeNama = isset($row['nama']) ? trim((string)$row['nama']) : '';
        $maybeNik = isset($row['nik']) ? trim((string)$row['nik']) : '';
        if ($maybeNama === '' && $maybeNik === '') {
            return null;
        }

        // Parse tanggal lahir
        $tanggalLahir = null;
        $bulanLahir = null;
        $tahunLahir = null;
        
        if (isset($row['tanggal_lahir']) && $row['tanggal_lahir']) {
            try {
                $date = Carbon::parse($row['tanggal_lahir']);
                $tanggalLahir = $date->day;
                $bulanLahir = $date->month;
                $tahunLahir = $date->year;
            } catch (\Exception $e) {
                // Jika parsing gagal, coba format lain
                if (is_numeric($row['tanggal_lahir'])) {
                    $tahunLahir = (int)$row['tanggal_lahir'];
                }
            }
        }

        // If split into components, override with explicit numbers when present
        if (isset($row['tanggal']) && !$tanggalLahir) {
            $tanggalLahir = (int)$row['tanggal'];
        }
        if (isset($row['bulan']) && !$bulanLahir) {
            $bulanLahir = (int)$row['bulan'];
        }
        if (isset($row['tahun']) && !$tahunLahir) {
            $tahunLahir = (int)$row['tahun'];
        }

        // Parse tanggal KK
        $tanggalKK = null;
        $kkKey = isset($row['tanggal_kk_dikeluarkan']) ? 'tanggal_kk_dikeluarkan' : (isset($row['kk_di_keluarkan_pada_tanggal']) ? 'kk_di_keluarkan_pada_tanggal' : null);
        if ($kkKey && $row[$kkKey]) {
            try {
                $tanggalKK = Carbon::parse($row[$kkKey]);
            } catch (\Exception $e) {
                $tanggalKK = now();
            }
        } else {
            $tanggalKK = now();
        }

        $nik = $this->normalizeIdNumber($row['nik'] ?? null);
        $noKk = $this->normalizeIdNumber($row['no_kk'] ?? null);

        $this->rows++;

        return new Penduduk([
            'nama' => $maybeNama ?: ($row['nama'] ?? ''),
            'nik' => $nik ?? ($row['nik'] ?? ''),
            'no_kk' => $noKk ?? ($row['no_kk'] ?? ''),
            'jenis_kelamin' => $row['jenis_kelamin'] ?? 'L',
            'hubungan_kepala_keluarga' => $row['hubungan_kepala_keluarga'] ?? 'Anak',
            'alamat_kartu_keluarga' => $row['alamat_kartu_keluarga'] ?? '',
            'tanggal_kk_dikeluarkan' => $tanggalKK,
            'tempat_lahir' => $row['tempat_lahir'] ?? ($row['tempat'] ?? ''),
            'tanggal_lahir' => $tanggalLahir ?? (int)($row['tanggal'] ?? 1),
            'bulan_lahir' => $bulanLahir ?? (int)($row['bulan'] ?? 1),
            'tahun_lahir' => $tahunLahir ?? (int)($row['tahun'] ?? 1990),
            'status_perkawinan' => $this->mapStatusPerkawinan($row['status_perkawinan'] ?? ($row['status'] ?? 'Belum Kawin')),
            'suku' => $row['suku'] ?? '',
            'pendidikan_terakhir' => $row['pendidikan_terakhir'] ?? ($row['pendidikan'] ?? 'Tidak Sekolah'),
            'mata_pencaharian' => $row['mata_pencaharian'] ?? 'Tidak Bekerja',
            'pekerjaan_tambahan' => $row['pekerjaan_tambahan'] ?? null,
            'kendaraan_mobil' => $this->parseBoolean($row['kendaraan_mobil'] ?? false),
            'kendaraan_motor' => $this->parseBoolean($row['kendaraan_motor'] ?? false),
            'kendaraan_sepeda' => $this->parseBoolean($row['kendaraan_sepeda'] ?? false),
            'ternak_sapi' => (int)($row['ternak_sapi'] ?? ($row['sapi'] ?? 0)),
            'ternak_kambing' => (int)($row['ternak_kambing'] ?? ($row['kambing'] ?? 0)),
            'ternak_ayam' => (int)($row['ternak_ayam'] ?? ($row['ayam'] ?? 0)),
            'ternak_ikan' => (int)($row['ternak_ikan'] ?? ($row['ikan'] ?? 0)),
            'luas_lahan_pertanian' => (float)($row['luas_lahan_pertanian'] ?? ($row['pertanian'] ?? 0)),
            'luas_lahan_peternakan' => (float)($row['luas_lahan_peternakan'] ?? ($row['peternakan'] ?? 0)),
            'komoditas_utama' => $row['komoditas_utama'] ?? ($row['komoditas utama'] ?? null),
            'komoditas_buah_sayur' => $row['komoditas_buah_sayur'] ?? ($row['buah & sayur'] ?? null),
            'status_bantuan' => $this->parseBoolean($row['status_bantuan'] ?? ($row['bantuan'] ?? false)),
            'kepemilikan' => $row['kepemilikan'] ?? null,
            'status_rumah_dinding' => $row['status_rumah_dinding'] ?? ($row['dinding'] ?? null),
            'status_rumah_atap' => $row['status_rumah_atap'] ?? ($row['atap'] ?? null),
            'status_rumah_listrik' => $row['status_rumah_listrik'] ?? ($row['penggunaan_listrik'] ?? null),
            'status_rumah_mck' => $row['status_rumah_mck'] ?? ($row['mck'] ?? null),
        ]);
    }

    /**
     * Expose how many rows were processed into models.
     */
    public function getRowCount(): int
    {
        return $this->rows;
    }

    /**
     * Parse boolean value from Excel
     */
    private function parseBoolean($value)
    {
        if (is_bool($value)) {
            return $value;
        }
        
        if (is_string($value)) {
            $value = strtolower(trim($value));
            return in_array($value, ['ya', 'yes', 'true', '1', 'ada', 'punya']);
        }
        
        return (bool)$value;
    }

    /**
     * Map short status codes (e.g., K/D/H/B/E) to readable statuses.
     */
    private function mapStatusPerkawinan($value): string
    {
        if (!$value) return 'Belum Kawin';
        $v = strtolower(trim((string)$value));
        $map = [
            'k' => 'Kawin',
            'kawin' => 'Kawin',
            'd' => 'Duda/Janda',
            'j' => 'Duda/Janda',
            'h' => 'Hidup Bersama',
            'b' => 'Belum Kawin',
            'belum kawin' => 'Belum Kawin',
            'e' => 'Cerai',
            'cerai' => 'Cerai',
        ];
        return $map[$v] ?? $value;
    }

    /**
     * Validation rules
     */
    public function rules(): array
    {
        return [
            '*.nama' => 'nullable|string|max:255',
            '*.nik' => 'nullable',
            '*.no_kk' => 'nullable',
            '*.jenis_kelamin' => 'nullable|in:L,P',
            '*.alamat_kartu_keluarga' => 'nullable|string|max:500',
            '*.tempat_lahir' => 'nullable|string|max:255',
            '*.status_perkawinan' => 'nullable|string|max:50',
            '*.suku' => 'nullable|string|max:100',
            '*.pendidikan_terakhir' => 'nullable|string|max:100',
            '*.mata_pencaharian' => 'nullable|string|max:100',
        ];
    }
}