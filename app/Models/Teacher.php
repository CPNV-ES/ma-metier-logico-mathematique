<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
    ];

    /**
     * @var list<string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    public function schoolClasses()
    {
        return $this->hasMany(SchoolClass::class);
    }

    /**
     * Validation rules for creating a teacher.
     *
     * @return array<string, array<int, string>>
     */
    public static function createRules(): array
    {
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:teachers,email'],
            'password' => ['required', 'string', 'min:8'],
        ];
    }

    /**
     * Validation rules for updating a teacher.
     *
     * @return array<string, array<int, string>>
     */
    public static function updateRules(int $teacherId): array
    {
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:teachers,email,' . $teacherId . ',id'],
            'password' => ['nullable', 'string', 'min:8'],
        ];
    }
}
