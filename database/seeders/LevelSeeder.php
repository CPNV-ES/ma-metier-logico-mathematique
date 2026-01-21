<?php

namespace Database\Seeders;

use App\Models\GameType;
use App\Models\Level;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    public function run(): void
    {
        // Récupère tous les ids existants de game_types
        $gameTypeIds = GameType::query()->pluck('id');

        if ($gameTypeIds->isEmpty()) {
            throw new \RuntimeException("Aucun game_type trouvé. Exécute GameTypeSeeder avant LevelSeeder.");
        }

        $levels = [];

        foreach ($gameTypeIds as $gameTypeId) {
            $levels[] = ['name' => 'Niveau 1', 'game_type_id' => $gameTypeId];
            $levels[] = ['name' => 'Niveau 2', 'game_type_id' => $gameTypeId];
            $levels[] = ['name' => 'Niveau 3', 'game_type_id' => $gameTypeId];
        }

        // Évite les doublons si tu relances
        Level::query()->upsert($levels, ['name', 'game_type_id']);
    }
}
