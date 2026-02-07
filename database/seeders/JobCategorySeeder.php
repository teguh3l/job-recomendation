<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JobCategory;

class JobCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Teknik Informatika',
            'Agribisnis',
            'Bioteknologi',
            'Farmasi',
            'Teknik Elektro',
            'Teknik Industri',
            'Teknologi Pangan Halal',
        ];

        foreach ($categories as $name) {
            JobCategory::create(['name' => $name]);
        }
    }
}
