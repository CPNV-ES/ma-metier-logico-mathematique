<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = 'media';

    /**
     * @var list<string>
     */
    protected $fillable = [
        'path',
        'specification_id',
        'medium_type_id',
    ];

    public function specification(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Specification::class);
    }

    public function mediumType(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(MediumType::class);
    }

    /**
     * @return array<string, array<int, string>>
     */
    public static function createRules(): array
    {
        return [
            'path' => ['required', 'string', 'max:255'],
            'specification_id' => ['required', 'integer', 'exists:specifications,id'],
            'medium_type_id' => ['required', 'integer', 'exists:medium_types,id'],
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
