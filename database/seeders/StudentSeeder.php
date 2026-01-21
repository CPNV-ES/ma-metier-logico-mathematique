<?php

namespace Database\Seeders;

use App\Models\SchoolClass;
use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        $classes = SchoolClass::query()->get(['id']);

        if ($classes->isEmpty()) {
            throw new \RuntimeException("Aucune school_class trouvée. Exécute d'abord le seeder de school_classes.");
        }

        foreach ($classes as $class) {
            Student::factory()
                ->count(20)
                ->create([
                    'school_class_id' => $class->id,
                ]);
        }
    }
}
