<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravolt\Indonesia\Models\City;

class Event extends Model
{
    /** @use HasFactory<\Database\Factories\EventFactory> */
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

    public function creator(): BelongsTo{
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater(): BelongsTo{
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function kota(){
        return $this->belongsTo(City::class, 'kota_id');
    }

    public function jenisTiket(): BelongsTo{
        return $this->belongsTo(JenisTiket::class, 'jenis_tiket_id');
    }
}
