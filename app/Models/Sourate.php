<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sourate extends Model
{
    protected $fillable = [
        'numero',
        'nom_arabe',
        'nom_francais',
        'nombre_versets',
        'revelation',
    ];

    public function audios(): HasMany
    {
        return $this->hasMany(Audio::class);
    }

    public function favoris(): HasMany
    {
        return $this->hasMany(Favori::class);
    }
}
