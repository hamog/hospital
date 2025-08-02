<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Insurance extends Model
{
    protected $fillable = [
        'name',
        'type',
        'discount',
        'status'
    ];
}
