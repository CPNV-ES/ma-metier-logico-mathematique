<?php

namespace Database\Seeders;

use App\Models\Exercice;
use App\Models\Level;
use App\Models\Media;
use Illuminate\Database\Seeder;

class ExerciceSeeder extends Seeder
{
    public function run(): void
    {
        $levelIds = Level::query()->pluck('id');
        $mediaIds = Media::query()->pluck('id');

        if ($levelIds->isEmpty()) {
            throw new \RuntimeException("Aucun level trouvé. Lance LevelSeeder avant ExerciceSeeder.");
        }

        if ($mediaIds->isEmpty()) {
            throw new \RuntimeException("Aucun media trouvé. Lance MediaSeeder avant ExerciceSeeder.");
        }

        $rows = [];
        foreach ($levelIds as $levelId) {
            for ($i = 1; $i <= 5; $i++) {
                $rows[] = [
                    'level_id' => $levelId,
                    'medium_id' => $mediaIds->random(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        Exercice::query()->insert($rows);
    }
}
