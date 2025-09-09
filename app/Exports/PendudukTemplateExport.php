<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PendudukTemplateExport implements FromArray, WithHeadings, WithStyles, WithColumnWidths
{
    /**
     * @return array
     */
    public function array(): array
    {
        return [
            [
                'Ahmad Susanto',
                '1234567890123456',
                '1234567890123456',
                'L',
                'Kepala Keluarga',
                'Dusun A, RT 01, RW 01, Desa Tetembomua',
                '2020-01-01',
                'Kendari',
                '1990-05-15',
                '1990-05-15',
                '1990-05-15',
                'Kawin',
                'Buton',
                'SMA',
                'Petani',
                'Pedagang',
                'Ya',
                'Ya',
                'Tidak',
                2,
                5,
                20,
                0,
                2.5,
                1.0,
                'Padi',
                'Sayuran',
                'Tidak',
                'Rumah',
                'Layak',
                'Layak',
                'Ada',
                'Ada'
            ]
        ];
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'nama',
            'nik',
            'no_kk',
            'jenis_kelamin',
            'hubungan_kepala_keluarga',
            'alamat_kartu_keluarga',
            'tanggal_kk_dikeluarkan',
            'tempat_lahir',
            'tanggal_lahir',
            'bulan_lahir',
            'tahun_lahir',
            'status_perkawinan',
            'suku',
            'pendidikan_terakhir',
            'mata_pencaharian',
            'pekerjaan_tambahan',
            'kendaraan_mobil',
            'kendaraan_motor',
            'kendaraan_sepeda',
            'ternak_sapi',
            'ternak_kambing',
            'ternak_ayam',
            'ternak_ikan',
            'luas_lahan_pertanian',
            'luas_lahan_peternakan',
            'komoditas_utama',
            'komoditas_buah_sayur',
            'status_bantuan',
            'kepemilikan',
            'status_rumah_dinding',
            'status_rumah_atap',
            'status_rumah_listrik',
            'status_rumah_mck'
        ];
    }

    /**
     * @param Worksheet $sheet
     * @return array
     */
    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],
        ];
    }

    /**
     * @return array
     */
    public function columnWidths(): array
    {
        return [
            'A' => 20, // nama
            'B' => 20, // nik
            'C' => 20, // no_kk
            'D' => 15, // jenis_kelamin
            'E' => 20, // hubungan_kepala_keluarga
            'F' => 40, // alamat_kartu_keluarga
            'G' => 20, // tanggal_kk_dikeluarkan
            'H' => 15, // tempat_lahir
            'I' => 15, // tanggal_lahir
            'J' => 15, // bulan_lahir
            'K' => 15, // tahun_lahir
            'L' => 15, // status_perkawinan
            'M' => 15, // suku
            'N' => 20, // pendidikan_terakhir
            'O' => 20, // mata_pencaharian
            'P' => 20, // pekerjaan_tambahan
            'Q' => 15, // kendaraan_mobil
            'R' => 15, // kendaraan_motor
            'S' => 15, // kendaraan_sepeda
            'T' => 15, // ternak_sapi
            'U' => 15, // ternak_kambing
            'V' => 15, // ternak_ayam
            'W' => 15, // ternak_ikan
            'X' => 20, // luas_lahan_pertanian
            'Y' => 20, // luas_lahan_peternakan
            'Z' => 20, // komoditas_utama
            'AA' => 20, // komoditas_buah_sayur
            'AB' => 15, // status_bantuan
            'AC' => 15, // kepemilikan
            'AD' => 20, // status_rumah_dinding
            'AE' => 20, // status_rumah_atap
            'AF' => 20, // status_rumah_listrik
            'AG' => 15, // status_rumah_mck
        ];
    }
}