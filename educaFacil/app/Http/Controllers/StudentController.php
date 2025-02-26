<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enrollment;

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
        ->where("users.id",20)
        ->get();

        return view("Student/students_myCourses",compact("courses"));
    }
    public function dashboard($myCourseId)
    {
        return view("Student/students_dashborad");
    }
}