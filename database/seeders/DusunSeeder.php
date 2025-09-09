<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Dusun;

class DusunSeeder extends Seeder
{
    /**
     * Run the database seeder.
     */
    public function run(): void
    {
        $dusunData = [
            ['nama' => 'Dusun 1'],
            ['nama' => 'Dusun 2'],
            ['nama' => 'Dusun 3'],
        ];

        foreach ($dusunData as $dusun) {
            Dusun::firstOrCreate(
                ['nama' => $dusun['nama']],
                $dusun
            );
        }
    }
}