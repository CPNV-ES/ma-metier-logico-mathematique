<?php

namespace Database\Seeders;

use App\Models\GameCategory;
use Illuminate\Database\Seeder;

class GameCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Addition'],
            ['name' => 'Soustraction'],
            ['name' => 'Multiplication'],
        ];

        // Évite les doublons si tu relances le seeder
        GameCategory::query()->upsert($categories, ['name']);
    }
}
