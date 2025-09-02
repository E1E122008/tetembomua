<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OrganizationalStructure;

class OrganizationalStructureImportSeeder extends Seeder
{
    public function run(): void
    {
        $path = public_path('data/struktur.json');
        if (!file_exists($path)) {
            $this->command?->warn('struktur.json not found, skipping import.');
            return;
        }
        $json = @file_get_contents($path);
        if ($json === false) {
            $this->command?->warn('Failed to read struktur.json, skipping.');
            return;
        }
        $data = json_decode($json, true);
        if (!is_array($data)) {
            $this->command?->warn('Invalid JSON struktur.json, skipping.');
            return;
        }

        // Import Kepala Desa
        if (!empty($data['kades'])) {
            OrganizationalStructure::updateOrCreate(
                ['name' => $data['kades']['name'] ?? 'Kepala Desa'],
                [
                    'position' => 'Kepala Desa',
                    'role_type' => 'kepala_desa',
                    'role_text' => null,
                    'info' => $data['kades']['info'] ?? null,
                    'photo_path' => $data['kades']['photo'] ?? null,
                    'term_period' => '2024 - Sekarang',
                    'is_active' => true,
                    'sort_order' => 0,
                ]
            );
        }

        $importEntries = function(array $entries, string $roleType, ?string $defaultRoleText = null) {
            $order = 1;
            foreach ($entries as $e) {
                OrganizationalStructure::updateOrCreate(
                    [
                        'name' => $e['name'] ?? 'Unknown',
                        'position' => match ($roleType) {
                            'perangkat' => $e['role_text'] ?? ($e['role_type'] ?? 'Perangkat'),
                            'dusun' => 'Kepala Dusun',
                            'rt' => 'Kepala RT',
                            'bpd' => $e['role_text'] ?? ($e['role_type'] ?? 'Anggota BPD'),
                            'lpm' => $e['role_text'] ?? ($e['role_type'] ?? 'Anggota LPM'),
                            default => ucfirst($roleType),
                        },
                        'role_type' => $roleType,
                        'role_text' => $e['role_text'] ?? $defaultRoleText,
                    ],
                    [
                        'info' => $e['info'] ?? null,
                        'photo_path' => $e['photo'] ?? null,
                        'term_period' => '2024 - Sekarang',
                        'is_active' => true,
                        'sort_order' => $order++,
                    ]
                );
            }
        };

        $entries = $data['entries'] ?? [];
        if (!empty($entries['perangkat']) && is_array($entries['perangkat'])) {
            $importEntries($entries['perangkat'], 'perangkat');
        }
        if (!empty($entries['bpd']) && is_array($entries['bpd'])) {
            $importEntries($entries['bpd'], 'bpd');
        }
        if (!empty($entries['lpm']) && is_array($entries['lpm'])) {
            $importEntries($entries['lpm'], 'lpm');
        }
        if (!empty($entries['dusun']) && is_array($entries['dusun'])) {
            $importEntries($entries['dusun'], 'dusun');
        }
        if (!empty($entries['rt']) && is_array($entries['rt'])) {
            $importEntries($entries['rt'], 'rt');
        }

        $this->command?->info('Organizational structures imported from JSON.');
    }
}
