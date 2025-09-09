<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Settings;
use App\Helpers\SettingsHelper;

class SocialMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $socialMediaData = [
            'facebook' => 'https://facebook.com/desatetembomua',
            'facebook_handle' => 'DesaTetembomua',
            'instagram' => 'https://instagram.com/desatetembomua',
            'instagram_handle' => 'desa_tetembomua',
            'youtube' => 'https://youtube.com/@desatetembomua',
            'youtube_handle' => 'Desa Tetembomua',
            'whatsapp' => 'https://wa.me/6281234567890',
            'whatsapp_number' => '+62 812-3456-7890'
        ];

        // Get existing settings or create new one
        $settings = Settings::first();
        
        if ($settings) {
            // Update existing settings
            $currentSocialMedia = $settings->social_media ?? [];
            $updatedSocialMedia = array_merge($currentSocialMedia, $socialMediaData);
            
            $settings->update([
                'social_media' => $updatedSocialMedia
            ]);
        } else {
            // Create new settings with social media data
            Settings::create([
                'village_name' => 'Desa Tetembomua',
                'village_head' => 'Abdullah, SP',
                'term_period' => '2024 - Sekarang',
                'district' => 'Lambuya',
                'regency' => 'Konawe',
                'province' => 'Sulawesi Tenggara',
                'area' => '10.54 km²',
                'north_boundary' => 'Kecamatan Onembute',
                'east_boundary' => 'Kecamatan Onembute',
                'south_boundary' => 'Desa Wonua Hoa dan Asaki',
                'west_boundary' => 'Desa Amberi',
                'village_description' => 'Desa yang maju dan berbudaya dengan masyarakat yang ramah, produktif, dan komitmen untuk mengembangkan desa secara berkelanjutan',
                'contact_phone' => '+62 812-3456-7890',
                'contact_email' => 'info@desatetembomua.id',
                'contact_address' => 'Desa Tetembomua, Kecamatan Lambuya, Kabupaten Konawe, Sulawesi Tenggara',
                'social_media' => $socialMediaData,
                'website_status' => true,
                'maintenance_mode' => false
            ]);
        }

        // Clear cache to ensure new data is loaded
        SettingsHelper::clearCache();
        
        $this->command->info('Social media settings seeded successfully!');
    }
}
