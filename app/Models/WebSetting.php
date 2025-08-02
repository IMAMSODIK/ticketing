<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WebSetting extends Model
{
    /** @use HasFactory<\Database\Factories\WebSettingFactory> */
    use HasFactory;

    protected $guarded = ['id'];

    public function creator(): BelongsTo{
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater(): BelongsTo{
        return $this->belongsTo(User::class, 'updated_by');
    }
}
