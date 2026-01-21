<?php

namespace Database\Seeders;

use App\Models\MediumType;
use Illuminate\Database\Seeder;

class MediumTypeSeeder extends Seeder
{
    public function run(): void
    {
        $types = [
            ['name' => 'image'],
            ['name' => 'vidéo'],
        ];

        MediumType::query()->upsert($types, ['name']);
    }
}
