<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Alumni extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'full_name',
        'nik',
        'place_of_birth',
        'date_of_birth',
        'gender',
        'nationality',
        'religion',
        'marital_status',
        'profile_picture',
    ];

    public function educationHistories()
    {
        return $this->hasMany(EducationHistory::class);
    }

    public function contacts()
    {
        return $this->hasMany(AlumniContact::class);
    }

    public function careers()
    {
        return $this->hasMany(Career::class);
    }

    public function activity()
    {
        return $this->hasOne(AlumniActivity::class);
    }

    public function achievements()
    {
        return $this->hasMany(Achievement::class);
    }

    public function organizations()
    {
        return $this->hasMany(Organization::class);
    }
}
