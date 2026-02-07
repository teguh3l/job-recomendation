<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // SEEDER BERURUTAN
        $this->call([
            JobCategorySeeder::class,
            JobSeeder::class,
        ]);
    }
}
