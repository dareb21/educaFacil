<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Posts extends Model
{
    protected $table = 'post';
    use HasFactory;
    protected $fillable = [
        'post_title',
        'post_description',
    ];
}
