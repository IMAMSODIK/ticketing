<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class JenisTiket extends Model
{
    /** @use HasFactory<\Database\Factories\JenisTiketFactory> */
    use HasFactory;

    public $incrementing = false;
    protected $keyType = 'string';

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = (string) Str::uuid();
            }
        });
    }

    protected $guarded = ['id'];

    public function event(): BelongsTo{
        return $this->belongsTo(Event::class);
    }

    public function pembayaran(): HasMany{
        return $this->hasMany(Pembayaran::class);
    }
}
