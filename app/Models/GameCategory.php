<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameCategory extends Model
{
    use HasFactory;
    /**
     * @var list<string>
     */
    protected $fillable = [
        'name',
    ];

    public function gameTypes()
    {
        return $this->hasMany(GameType::class);
    }

    /**
     * @return array<string, array<int, string>>
     */
    public static function createRules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
        ];
    }

    public function media(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Media::class, 'medium_id'); // FK par défaut: media_id
    }

    /**
     * @return array<string, array<int, string>>
     */
    public static function updateRules(): array
    {
        return self::createRules();
    }
}
