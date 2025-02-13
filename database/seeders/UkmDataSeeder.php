<?php

namespace Database\Seeders;

use App\Models\Ukm;
use Illuminate\Database\Seeder;

class UkmDataSeeder extends Seeder
{
    /**
     * Jalankan seeder database.
     */
    public function run(): void
    {
        Ukm::where('admin_ukm_id', 3)->update([
            'logo' => 'logo1.png',
            'deskripsi' => 'Testing',
            'sejarah' => 'Testing',
            'visi' => 'Testing',
            'misi' => 'Testing',
            'struktur_organisasi' => null,
            'media_sosial' => json_encode([
                'instagram' => 'Testing',
                'facebook' => 'Testing',
                'twitter' => 'Testing',
                'tiktok' => 'Testing'
            ])
        ]);
    }
}
