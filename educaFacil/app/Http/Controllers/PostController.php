<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;

class PostController extends Controller
{
    public function posts()
{
    $posts=Posts::all();
    return view("post",compact("posts"));
}
}
