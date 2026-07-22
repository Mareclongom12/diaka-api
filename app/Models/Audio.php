<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Audio extends Model
{
    protected $table = 'audios';

    protected $fillable = ['sourate_id', 'reciter_id', 'url', 'duree'];

    public function sourate(): BelongsTo
    {
        return $this->belongsTo(Sourate::class);
    }

    public function reciter(): BelongsTo
    {
        return $this->belongsTo(Reciter::class);
    }
}
