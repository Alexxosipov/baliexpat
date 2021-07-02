<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description'
    ];

    public function getBackgroundUrlAttribute(): string
    {
        return "/storage/sponsors/background_{$this->id}.jpg";
    }

    public function getLogoUrlAttribute(): string
    {
        return "/storage/sponsors/logo_{$this->id}.png";
    }
}
