<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Player extends Model
{
    use HasFactory;

    public const POSITION_GOALKEEPER = 1;
    public const POSITION_DEFENDER = 2;
    public const POSITION_MIDFIELDER = 3;
    public const POSITION_STRIKER = 4;

    protected $fillable = [
        'first_name',
        'last_name',
        'number',
        'position_id',
    ];

    public function getPositionNameAttribute(): string
    {
        switch ($this->attributes['position_id']) {
            case static::POSITION_GOALKEEPER:
                return 'goalkeeper';
            case static::POSITION_DEFENDER:
                return 'defender';
            case static::POSITION_MIDFIELDER:
                return 'midfielder';
            case static::POSITION_STRIKER:
                return 'striker';
            default:
                return 'unknown';
        }
    }

    public function getPhotoUrlAttribute(): string
    {
        return "/storage/players/photos/{$this->id}.jpg";
    }

    public function getFullNameAttribute(): string
    {
        return "$this->first_name $this->last_name";
    }
}
