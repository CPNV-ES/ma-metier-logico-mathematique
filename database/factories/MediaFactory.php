<?php

namespace Database\Factories;

use App\Models\Media;
use App\Models\MediumType;
use App\Models\Specification;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Media>
 */
class MediaFactory extends Factory
{
    protected $model = Media::class;

    public function definition(): array
    {
        $specificationId = Specification::query()->inRandomOrder()->value('id');
        $mediumTypeId    = MediumType::query()->inRandomOrder()->value('id');

        if (!$specificationId) {
            throw new \RuntimeException("Aucune specification trouvée. Lance SpecificationSeeder avant MediaSeeder.");
        }

        if (!$mediumTypeId) {
            throw new \RuntimeException("Aucun medium_type trouvé. Lance MediumTypeSeeder avant MediaSeeder.");
        }

        // Liste fixe de 3 paths (à compléter à la main)
        $paths = [
            '/img/chat.jpg',
            '/img/chien.webp',
            '/img/cochon.webp',
        ];

        return [
            // Prend une des 3 images au hasard
            'path' => $this->faker->randomElement($paths),
            'specification_id' => $specificationId,
            'medium_type_id' => $mediumTypeId,
        ];
    }
}
