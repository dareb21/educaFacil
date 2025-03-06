<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\Homework;
use Illuminate\Http\Request;


class TeacherController extends Controller
{
    public function teacherHome()
    {
        $cursos= Course::where("teacher_id",5)->get();
        
        return view("Teacher/teacher_home",compact("cursos"));
    }

public function course_dasboard($cursoId)
{
    $course=Course::find($cursoId);
    return view ("Teacher/teacher_dashboard",compact("course"));
}


public function Newhomework(Request $REQUEST)
{
    $hw= Homework::create(
        [
            'Name'=> $REQUEST->name,
            'Desc'=> $REQUEST->desc,
            'Points'=> $REQUEST->points,
            'Deadline'=> $REQUEST->deadline,
            'course_id'=> $REQUEST->course,
        ]
        );
        return redirect()->route('teacherHome')->with("mensaje","Tarea asignada con exito, mucha suerte.");

}


    public function homework($cursoId)
    {
        $course =Course::find($cursoId);
        return view("Teacher/teacher_homework",compact("course"));
    }

}
