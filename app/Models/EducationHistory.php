<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EducationHistory extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'alumni_id',
        'student_id', // NIM baru untuk jenjang pendidikan
        'degree_level',
        'program',
        'degree',
        'graduation_year',
        'honor',
        'no_ijazah',
    ];

    public function alumni()
    {
        return $this->belongsTo(Alumni::class);
    }
}
