<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
