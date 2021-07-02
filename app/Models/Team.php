<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function players()
    {
        return $this->belongsTo(Player::class);
    }

    public function getLogoUrlAttribute()
    {
        return "/storage/teams/logos/logo_{$this->id}.jpg";
    }
}