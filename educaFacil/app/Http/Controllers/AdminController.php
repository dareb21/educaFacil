<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Teacher;
use App\Models\User;
use App\Models\Category;
use App\Models\Course;

class AdminController extends Controller
{
    public function newAdmin()
    {
        return view("Admin/admin_creation");
    }

    public function createAdmin(Request $REQUEST)
    {
        $user = User::create([
            'name' => $REQUEST->name,
            'email' => $REQUEST->email,
            'phone' => $REQUEST->phone,
            'gender' => $REQUEST->gender,
            'birthday' => $REQUEST->birthday,
            'role' => 'Admin',
            'password' => Hash::make($REQUEST->password),
        ]);

        Admin::create([
            'user_id' => $user->id,  
            'subrol' => $REQUEST->subrol,
        ]);
    }
    
    public function newTeacher()
    {
        return view("Admin/teacher_creation");
    }

    public function createTeacher(Request $REQUEST)
    {
        $user = User::create([
            'name' => $REQUEST->name,
            'email' => $REQUEST->email,
            'phone' => $REQUEST->phone,
            'gender' => $REQUEST->gender,
            'birthday' => $REQUEST->birthday,
            'role' => 'Teacher',
            'password' => Hash::make($REQUEST->password),
        ]);

        
        Teacher::create([
            'user_id' => $user->id,  
            'profession' => $REQUEST->prof,
        ]);
    }

    public function newCategory()   
    {
        return view("Admin/categories_creation");
    }

    public function createCategory(Request $REQUEST)
    {
        $category = Category::create([
            'name' => $REQUEST->name,
            'desc'=> $REQUEST->desc,
        ]);
    }

    public function newCourse()
    {
    $teachers = DB::table("users")->select("id","name")->where("role","teacher")->get();
    
    $categories = DB::table("categories")->select("id","name")->get();    
    //dd($categories);      
    return view("Admin/course_creation",compact("teachers","categories"));
    }
    

    public function createCourse(Request $REQUEST)
    {
        $curso = new Course;
        
        $curso->name = $REQUEST->name;
        $curso->desc = $REQUEST->desc;
        $curso->duration = $REQUEST->duration;
        $curso->mode = $REQUEST->mode;
        $curso->free_spots = $REQUEST->max;
        $curso->date_start = $REQUEST->start;
        $curso->teacher_id = $REQUEST->teacher;
        $curso->category_id = $REQUEST->category;
        $curso->save();   
    }


    public function posts()
    
{
    return view("post");
}
}
