<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'desc',
        'duration',
        'mode',
        'student_max',
        'date_start',
    ];
}
