<?php

namespace Database\Seeders;

use App\Models\Media;
use App\Models\MediumType;
use App\Models\Specification;
use Illuminate\Database\Seeder;

class MediaSeeder extends Seeder
{
    public function run(): void
    {
        if (!Specification::query()->exists()) {
            throw new \RuntimeException("Aucune specification trouvée. Exécute SpecificationSeeder avant MediaSeeder.");
        }

        if (!MediumType::query()->exists()) {
            throw new \RuntimeException("Aucun medium_type trouvé. Exécute MediumTypeSeeder avant MediaSeeder.");
        }

        Media::factory()->count(50)->create();
    }
}
