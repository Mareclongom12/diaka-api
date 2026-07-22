<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Favori extends Model
{
    protected $fillable = ['user_id', 'sourate_id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function sourate(): BelongsTo
    {
        return $this->belongsTo(Sourate::class);
    }
}
