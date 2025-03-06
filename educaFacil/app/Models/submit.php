<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class submit extends Model
{

    protected $table = 'submit';
    
    use HasFactory;
    protected $fillable = [
        'student_id',
        'Points',
        'hw_id',
        'file_path',
        'course_id',
    ];
}
