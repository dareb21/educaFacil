<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Homework extends Model
{
    use HasFactory;
    protected $fillable = [
        'Name',
        'Desc',
        'Points',
        'Deadline',
        'course_id',
    ];
}
