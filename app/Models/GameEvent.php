<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameEvent extends Model
{
    use HasFactory;

    const GOAL = 1;
    const YELLOW_CARD = 2;
    const RED_CARD = 3;
    const ASSIST = 4;

    protected $fillable = [
        'game_id',
        'team_id',
        'player_id',
        'player_number',
        'player_name',
        'event_type',
        'minute'
    ];

    public function player()
    {
        return $this->belongsTo(Player::class);
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function getPlayerNameAttribute(): string
    {
        if ($this->player_id) {
            return "#{$this->player->number} {$this->player->first_name} {$this->player->last_name}";
        }

        return "#{$this->attributes['player_number']} {$this->attributes['player_name']}";
    }

    public function getEventTypeNameAttribute()
    {
        switch ($this->attributes['event_type']) {
            case 1:
                return 'goal';
            case 2:
                return 'yellow card';
            case 3:
                return 'red card';
            case 4:
                return 'assist';
            default:
                return 'unknown';
        }
    }

    public function getIconAttribute(): string
    {
        switch ($this->attributes['event_type']) {
            case 1:
                return asset('images/icons/soccer-ball.svg');
            case 2:
                return asset('images/icons/yellow-card.svg');
            case 3:
                return asset('images/icons/red-card.svg');
            case 4:
                return asset('images/icons/soccer-ball.svg');
            default:
                return 'unknown';
        }
    }
}
