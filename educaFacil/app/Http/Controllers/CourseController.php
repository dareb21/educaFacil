<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CourseController extends Controller
{
    public function courses()
    {
      
        $categories =Category::all();
        $courses = Course::join('categories', 'categories.id', '=', 'courses.category_id')
        ->select('courses.id','courses.name','courses.duration','courses.mode','courses.free_spots','courses.date_start','categories.name as category_name','courses.days as Day','courses.hour as Hour')
        ->where('free_spots','>',0)
        ->get();
        return view("Courses/course_home",compact("courses","categories"));
    }

    public function coursesView($courseId)
    {
        $auth=auth()->check();
        $course = Course::join('categories', 'categories.id', '=', 'courses.category_id')
        ->select('courses.id','courses.name','courses.desc','courses.duration','courses.mode','courses.free_spots','courses.date_start','categories.name as category_name','courses.days as Day','courses.hour as Hour')
        ->where('courses.id',$courseId)
        ->first();
        return view("Courses/course_view",compact("course","auth"));
    }


    public function coursesFilter(Request $request)
{   
    if ($request->input("categoryId") !==null)
{
    $categories =Category::all();
    $courses = Course::join('categories', 'categories.id', '=', 'courses.category_id')
    ->select('courses.id','courses.name','courses.duration','courses.mode','courses.free_spots','courses.date_start','categories.name as category_name')
    ->where('free_spots','>',0)
    ->where("category_id",$request->input("categoryId"))
    ->get();
    return view("Courses/course_home",compact("courses","categories"));
}else

{
    return redirect()->route('courses')->with("Error","Seleccione una categoria, por favor.");
}

}
    

public function enrollment($courseId)
{
    try {
    $user = Enrollment::where("student_id",Auth::id())->where("course_id",$courseId)->firstOrFail();
    return redirect()->route('courses')->with("Error","Usted ya esta inscrito en este curso.");
    }catch (ModelNotFoundException $e)
    {
    $enrol = new Enrollment;
    $enrol->student_id = Auth::id();
    $enrol->course_id =$courseId;
    $enrol->save();

    Course::where("id",$courseId)
    ->decrement("free_spots");
    $courses = $this ->courses();
    return redirect()->route('courses')->with("mensaje","Inscripcion realizada con exito.");
}
    
    
}

}
