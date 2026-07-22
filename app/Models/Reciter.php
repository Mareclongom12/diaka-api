<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Reciter extends Model
{
    protected $fillable = ['nom', 'photo_url', 'style'];

    public function audios(): HasMany
    {
        return $this->hasMany(Audio::class);
    }
}
