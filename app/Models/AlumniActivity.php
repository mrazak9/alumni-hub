<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AlumniActivity extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'alumni_id',
        'membership_status',
        'activity',
        'notes',
    ];

    public function alumni()
    {
        return $this->belongsTo(Alumni::class);
    }
}
