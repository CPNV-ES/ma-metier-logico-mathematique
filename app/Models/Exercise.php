<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    protected $table = 'exercices';

    /**
     * @var list<string>
     */
    protected $fillable = [
        'level_id',
        'content',
        'answer',
    ];

    public function level(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Level::class);
    }

    public function students(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Student::class, 'exercise_student', 'exercise_id', 'student_id')
            ->withPivot(['attempt', 'completed'])
            ->withTimestamps();
    }

    /**
     * @return array<string, array<int, string>>
     */
    public static function createRules(): array
    {
        return [
            'level_id' => ['required', 'integer', 'exists:levels,id'],
        ];
    }

    /**
     * @return array<string, array<int, string>>
     */
    public static function updateRules(): array
    {
        return self::createRules();
    }

    protected function casts(): array
    {
        return [
            'content' => 'array',
            'answer'  => 'array',
        ];
    }
}
