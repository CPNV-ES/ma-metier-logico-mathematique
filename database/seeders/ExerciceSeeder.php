<?php

namespace Database\Seeders;

use App\Models\Exercice;
use App\Models\Level;
use Illuminate\Database\Seeder;

class ExerciceSeeder extends Seeder
{
    public function run(): void
    {
        $levelIds = Level::query()->pluck('id');

        if ($levelIds->isEmpty()) {
            throw new \RuntimeException("Aucun level trouvé. Exécute LevelSeeder avant ExerciceSeeder.");
        }

        $exercices = [];

        // Exemple: 5 exercices par level
        foreach ($levelIds as $levelId) {
            for ($i = 1; $i <= 5; $i++) {
                $exercices[] = [
                    'level_id' => $levelId,
                ];
            }
        }

        Exercice::query()->insert($exercices);
    }
}
