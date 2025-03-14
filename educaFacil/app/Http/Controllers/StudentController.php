<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enrollment;
use App\Models\Homework;
use App\Models\Course;
use App\Models\submit;
use App\Models\User;
use App\Models\Resources;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

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
        ->select('courses.name as Course','courses.id','courses.meeting_url')
        ->where("users.id", Auth::id())
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
       
        /*
        $hws = Homework::join('submit as s', 'homework.id', '=', 's.hw_id')
    ->join('students as st', 's.student_id', '=', 'st.user_id')
    ->join('users as u', 'st.user_id', '=', 'u.id')
    ->join('courses as c', 'homework.course_id', '=', 'c.id')
    ->select(
        'homework.name',
        'homework.desc',
        'homework.Points',
        'homework.deadline',
        's.Points as PuntosAlumno',
        'u.id'
    )
    ->where('c.id', $courseID)
    ->where('u.id', 1)
    ->get();
        */

        
        return view("Student/students_homework",compact("hws"));
    }

    public function submit(Request $request)
    {
        $file= $request->file("archivo");
        $hwname= $file->getClientOriginalName();
        $file_path=$file->storeAs("entregas", $hwname,"public");
        
        $submit=submit::create([
            'hw_id'=>$request->hw_id,
            'student_id'=>Auth::id(),
            'file_path'=>$file_path,
        ]);

     return redirect()->back()->with("mensaje","Su tarea ha subido con exito");
    
    }

public function resources($courseID)
{
    $resources=Resources::where("course_id",$courseID)->get();
  return view("Student/students_resources",compact("resources"));
}

public function prueba($resourceId)
    {
            $file=Resources::find($resourceId);
            $path = $file->file_path;
            
    if (Storage::disk("public")->exists($path))
    {   
        return Storage::disk("public")->download($path);
    }else    
    {
        return response()->json(["message"=>"Archivo NO encontrado"]);
    }
}

    public function Profile()
    {
        return view("Student/students_profile");
    }

    public function updateProfile(Request $request)
{
    $id =Auth::id();
    User::where("id",$id)
    ->update([
        "name"=>$request->name,
        "email"=>$request->email,
        "phone"=>$request->phone,
        "gender"=>$request->gender,
        "birthday"=>$request->birthday,
    ]);
    return redirect()->route('home');
    
    
}
    

}