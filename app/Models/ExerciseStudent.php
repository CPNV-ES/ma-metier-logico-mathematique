<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ExerciseStudent extends Pivot
{
    protected $table = 'exercise_student';

    public $incrementing = false;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'exercise_id',
        'student_id',
        'attempt',
        'completed',
    ];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'completed' => 'boolean',
    ];

    public function exercice(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Exercice::class, 'exercise_id');
    }

    public function student(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    /**
     * @return array<string, array<int, string>>
     */
    public static function createRules(): array
    {
        return [
            'exercise_id' => ['required', 'integer', 'exists:exercices,id'],
            'student_id' => ['required', 'integer', 'exists:students,id'],
            'attempt' => ['required', 'integer', 'min:1'],
            'completed' => ['required', 'boolean'],
        ];
    }

    /**
     * @return array<string, array<int, string>>
     */
    public static function updateRules(): array
    {
        return self::createRules();
    }
}
