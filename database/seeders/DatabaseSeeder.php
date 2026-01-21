<?php

namespace Database\Seeders;

use App\Models\User;
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
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->call([
            SpecificationSeeder::class,
            MediumTypeSeeder::class,
            MediaSeeder::class,
            TeacherSeeder::class,
            SchoolClassSeeder::class,
            GameCategorySeeder::class,
            GameTypeSeeder::class,
            LevelSeeder::class,
            ExerciceSeeder::class,
            StudentSeeder::class,
        ]);
    }
}
