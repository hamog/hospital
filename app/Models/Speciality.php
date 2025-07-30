<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Cache;

class Speciality extends Model
{
    protected $fillable = [
        'title',
        'status',
    ];

    public static function clearAllCaches(): void
    {
        if (Cache::has('specialities')) {
            Cache::forget('specialities');
        }
    }

    public static function booted(): void
    {
        static::saved(function () {
            static::clearAllCaches();
        });
        static::deleted(function () {
            static::clearAllCaches();
        });
    }

    //Relations

    public function doctors(): HasMany
    {
        return $this->hasMany(Doctor::class);
    }
}
