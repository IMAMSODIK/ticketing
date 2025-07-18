<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JenisTiket extends Model
{
    /** @use HasFactory<\Database\Factories\JenisTiketFactory> */
    use HasFactory;

    protected $guarded = ['id'];

    public function event(): BelongsTo{
        return $this->belongsTo(Event::class);
    }
}
