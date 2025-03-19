<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CourseController extends Controller
{
    public function courses()
    {
       
        $courses = Course::join('categories', 'categories.id', '=', 'courses.category_id')
        ->select('courses.id','courses.name','courses.duration','courses.mode','courses.free_spots','courses.date_start','categories.name as category_name')
        ->where('free_spots','>',0)
        ->get();
        return view("Courses/course_home",compact("courses"));
    }

    public function coursesView($courseId)
    {
       
        $course = Course::join('categories', 'categories.id', '=', 'courses.category_id')
        ->select('courses.id','courses.name','courses.desc','courses.duration','courses.mode','courses.free_spots','courses.date_start','categories.name as category_name')
        ->where('courses.id',$courseId)
        ->first();
        return view("Courses/course_view",compact("course"));
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
