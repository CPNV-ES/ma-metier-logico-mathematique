<?php

namespace Database\Factories;

use App\Models\Media;
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
        static $schoolClassIds = null;
        static $mediaIds = null;

        $schoolClassIds ??= SchoolClass::query()->pluck('id');
        $mediaIds ??= Media::query()->pluck('id');

        if ($schoolClassIds->isEmpty()) {
            throw new \RuntimeException("Aucune school_class trouvée. Lance SchoolClassSeeder avant StudentSeeder.");
        }

        if ($mediaIds->isEmpty()) {
            throw new \RuntimeException("Aucun media trouvé. Lance MediaSeeder avant StudentSeeder.");
        }

        return [
            'first_name' => $this->faker->firstName(),
            'last_name'  => $this->faker->lastName(),
            'school_class_id' => $schoolClassIds->random(),
            'medium_id' => $mediaIds->random(),
        ];
    }

    public function forClass(int $schoolClassId): static
    {
        return $this->state(fn () => ['school_class_id' => $schoolClassId]);
    }
}
