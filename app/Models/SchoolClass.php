<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolClass extends Model
{
    protected $table = 'school_classes';

    /**
     * Champs modifiables en mass assignment.
     */
    protected $fillable = [
        'name',
        'class_code',
        'teacher_id',
    ];

    public function teacher(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Teacher::class);
    }

    /**
     * Validation rules for creating a school class.
     *
     * @return array<string, array<int, string>>
     */
    public static function createRules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255', 'unique:school_classes,name'],
            'class_code' => ['required', 'string', 'max:255', 'unique:school_classes,class_code'],
            'teacher_id' => ['nullable', 'integer', 'exists:teachers,id'],
        ];
    }

    /**
     * Validation rules for updating a school class.
     *
     * @return array<string, array<int, string>>
     */
    public static function updateRules(int $classId): array
    {
        return [
            'name' => ['required', 'string', 'max:255', 'unique:school_classes,name,' . $classId . ',id'],
            'class_code' => ['required', 'string', 'max:255', 'unique:school_classes,class_code,' . $classId . ',id'],
            'teacher_id' => ['nullable', 'integer', 'exists:teachers,id'],
        ];
    }
}
