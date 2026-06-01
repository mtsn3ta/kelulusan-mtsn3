<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'school_name',
        'academic_year',
        'announcement_date',
        'background_image',
        'principal_message',
        'is_active',
    ];
}