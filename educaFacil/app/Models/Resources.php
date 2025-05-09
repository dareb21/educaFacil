<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Resources extends Model
{
    use HasFactory;
    protected $fillable = [
        'Name',
        'course_id',
        'teacher_id',
        'file_path',
    ];
}
