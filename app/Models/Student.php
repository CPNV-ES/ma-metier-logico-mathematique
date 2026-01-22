<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    /**
     * @var list<string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'school_class_id',
    ];

    public function schoolClass(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(SchoolClass::class);
    }

    public function exercices(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Exercise::class, 'exercise_student', 'student_id', 'exercise_id')
            ->withPivot(['attempt', 'completed'])
            ->withTimestamps();
    }

    public function media(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Media::class, 'medium_id'); // FK par défaut: media_id
    }

    /**
     * @return array<string, array<int, string>>
     */
    public static function createRules(): array
    {
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'school_class_id' => ['required', 'integer', 'exists:school_classes,id'],
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
