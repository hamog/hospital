<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class DoctorRole extends Model
{
    protected $fillable = [
        'title',
        'quota',
        'required'
    ];

    public static function getSumQuota()
    {
        return self::query()->sum('quota');
    }

    public function doctors(): BelongsToMany
    {
        return $this->belongsToMany(Doctor::class);
    }
}
