<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enrollment;
use App\Models\Homework;
use App\Models\Course;
use App\Models\submit;

class StudentController extends Controller
{
    public function studentHome()
    {
        return view("Student/student_home");
    }

    public function myCourses()
    {
        $courses = Enrollment::join('courses', 'courses.id', '=', 'enrollments.course_id')
        ->join('users','users.id','=','enrollments.student_id')
        ->select('courses.name as Course','courses.id')
        ->where("users.id",3)
        ->get();

        return view("Student/students_myCourses",compact("courses"));
    }
    public function dashboard($myCourseId)
    {
        $course=Course::find($myCourseId);
        return view("Student/students_dashborad",compact("course"));
    }


    public function homework($courseID)
    {
        $hws=Homework::where("course_id",$courseID)->get();
        //dd($hws);
        return view("Student/students_homework",compact("hws"));
    }

    public function submit(Request $request)
    {
        $file= $request->file("archivo");
        $hwname= $file->getClientOriginalName();
        $file_path=$file->storeAs("entregas", $hwname,"public");
        
        $submit=submit::create([
            'hw_id'=>$request->hw_id,
            'student_id'=>3,
            'file_path'=>$file_path,
        ]);

     return redirect()->back()->with("mensaje","Se tarea ha subido con exito");
    
    }



}