<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    /**
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'game_type_id',
    ];

    public function gameType(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(GameType::class);
    }

    public function exercices()
    {
        return $this->hasMany(Exercise::class);
    }

    /**
     * @return array<string, array<int, string>>
     */
    public static function createRules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'game_type_id' => ['required', 'integer', 'exists:game_types,id'],
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
