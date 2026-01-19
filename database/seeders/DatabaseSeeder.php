<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Job;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Job::insert([
            [
                'title' => 'Frontend Developer',
                'description' => 'Menguasai Vue.js, JavaScript, HTML, CSS dan REST API'
            ],
            [
                'title' => 'Backend Developer',
                'description' => 'Menguasai Laravel, MySQL, PHP dan REST API'
            ],
            [
                'title' => 'Mobile Developer',
                'description' => 'Menguasai Flutter, Dart, Firebase'
            ],
        ]);
    }
}
