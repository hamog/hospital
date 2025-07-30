<?php

namespace App\Models;

use Couchbase\Role;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Hash;

class Doctor extends Model
{
    protected $fillable = [
        'name',
        'speciality_id',
        'national_code',
        'medical_number',
        'mobile',
        'password',
        'status',
    ];

    protected function password(): Attribute
    {
        return Attribute::make(
            set: fn (?string $value) => is_null($value) ? $this->attributes['password'] : bcrypt($value),
        );
    }

    //Relations

    public function speciality(): BelongsTo
    {
        return $this->belongsTo(Speciality::class);
    }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(DoctorRole::class);
    }
}
