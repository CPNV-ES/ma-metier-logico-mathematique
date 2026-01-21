<?php

namespace Database\Factories;

use App\Models\SchoolClass;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Student>
 */
class StudentFactory extends Factory
{
    protected $model = Student::class;

    public function definition(): array
    {
        $schoolClassId = SchoolClass::query()->inRandomOrder()->value('id');

        if (!$schoolClassId) {
            throw new \RuntimeException("Aucune school_class trouvée. Exécute d'abord le seeder de school_classes.");
        }

        return [
            'first_name' => $this->faker->firstName(),
            'last_name'  => $this->faker->lastName(),
            'school_class_id' => $schoolClassId,
        ];
    }
}
