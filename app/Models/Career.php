<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Career extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'alumni_id',
        'position',
        'company',
        'start_year',
        'end_year',
    ];

    public function alumni()
    {
        return $this->belongsTo(Alumni::class);
    }
}
