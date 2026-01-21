<?php

namespace Database\Seeders;

use App\Models\GameCategory;
use App\Models\Media;
use App\Models\MediumType;
use App\Models\Specification;
use Illuminate\Database\Seeder;

class GameCategorySeeder extends Seeder
{
    public function run(): void
    {
        // 1) Tes images (à saisir à la main)
        $categoryImages = [
            'Classification' => '/img/classification.png',
            'Sériation'      => '/img/seriation.png',
            'Conservation'   => '/img/conservation.png',
        ];

        // 2) Choix “par défaut” pour créer le Media
        //    (adapte les noms selon tes seeders)
        $specificationId = Specification::query()->where('name', 'Forme')->value('id')
            ?? Specification::query()->value('id');

        $mediumTypeId = MediumType::query()->where('name', 'image')->value('id')
            ?? MediumType::query()->value('id');

        if (!$specificationId) {
            throw new \RuntimeException("Aucune specification trouvée. Seed SpecificationSeeder avant GameCategorySeeder.");
        }
        if (!$mediumTypeId) {
            throw new \RuntimeException("Aucun medium_type trouvé. Seed MediumTypeSeeder avant GameCategorySeeder.");
        }

        // 3) Pour chaque catégorie : on crée (ou récupère) son Media via le path
        $categories = [];
        foreach ($categoryImages as $categoryName => $path) {
            $media = Media::query()->firstOrCreate(
                ['path' => $path],
                [
                    'specification_id' => $specificationId,
                    'medium_type_id' => $mediumTypeId,
                ]
            );

            $categories[] = [
                'name' => $categoryName,
                'medium_id' => $media->id,
            ];
        }

        // 4) Upsert: update medium_id si relancé
        GameCategory::query()->upsert($categories, ['name'], ['medium_id']);
    }
}
