<?php

namespace Database\Seeders;

use App\Models\GameCategory;
use App\Models\GameType;
use Illuminate\Database\Seeder;

class GameTypeSeeder extends Seeder
{
    public function run(): void
    {
        // Récupère les IDs existants par nom (et échoue si une catégorie manque)
        $additionId = GameCategory::query()->where('name', 'Addition')->value('id');
        $soustractionId = GameCategory::query()->where('name', 'Soustraction')->value('id');
        $multiplicationId = GameCategory::query()->where('name', 'Multiplication')->value('id');

        if (!$additionId || !$soustractionId || !$multiplicationId) {
            throw new \RuntimeException("Catégories manquantes: exécute GameCategorySeeder avant GameTypeSeeder.");
        }

        $types = [
            ['name' => 'Tu connais les couleurs ?', 'game_category_id' => $additionId],
            ['name' => 'Quoi ?', 'game_category_id' => $additionId],

            ['name' => 'Les maths', 'game_category_id' => $soustractionId],
            ['name' => 'Oh non !', 'game_category_id' => $soustractionId],

            ['name' => 'Vraiment', 'game_category_id' => $multiplicationId],
            ['name' => 'Sérieux', 'game_category_id' => $multiplicationId],
        ];

        // Évite les doublons si tu relances le seeder
        GameType::query()->upsert($types, ['name', 'game_category_id']);
    }
}
