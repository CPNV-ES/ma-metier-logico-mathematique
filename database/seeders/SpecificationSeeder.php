<?php

namespace Database\Seeders;

use App\Models\Specification;
use Illuminate\Database\Seeder;

class SpecificationSeeder extends Seeder
{
    public function run(): void
    {
        $specifications = [
            ['name' => 'Forme'],
            ['name' => 'Animal'],
            ['name' => 'Couleur'],
            ['name' => 'Nombre'],
            ['name' => 'Taille'],
        ];

        // évite les doublons si tu relances le seeder
        Specification::query()->upsert($specifications, ['name']);
    }
}
