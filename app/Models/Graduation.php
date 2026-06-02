<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Graduation extends Model
{
    protected $fillable = [

        'academic_year',

        'nisn',
        'name',
        'class',
        'status',

        'participant_number',
        'birth_place_date',

        'mtk_score',
        'indo_score',

        'mtk_category',
        'indo_category',
    ];
}
