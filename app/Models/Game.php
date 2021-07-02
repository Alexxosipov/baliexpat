<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'tournament_id',
        'home_team_id',
        'away_team_id',
        'home_goals',
        'away_goals',
        'start_at',
        'location',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'start_at',
    ];

    public function homeTeam(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'home_team_id');
    }

    public function awayTeam(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'away_team_id');
    }

    public function tournament(): BelongsTo
    {
        return $this->belongsTo(Tournament::class);
    }

    public function events(): HasMany
    {
        return $this->hasMany(GameEvent::class);
    }

    public function getScoreAttribute(): string
    {
        if (!is_null($this->home_goals) && !is_null($this->away_goals)) {
            return "{$this->home_goals}:{$this->away_goals}";
        }

        return 'vs';
    }

    public function getTournamentNameAttribute(): string
    {
        return $this->tournament_id ? $this->tournament->name : 'Friendly game';
    }
}
