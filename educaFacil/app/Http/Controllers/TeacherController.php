<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\Homework;
use Illuminate\Http\Request;
use App\Models\submit;
use App\Models\Resources;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class TeacherController extends Controller
{
    public function teacherHome()
    {
        $cursos= Course::where("teacher_id",3)->get();
        
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
public function homeHomework($cursoId)
{
    $course=Course::find($cursoId);
    return view("Teacher/teacher_homeHomework",compact("course"));
}


public function evaluate($cursoId)
{
    $results = DB::table('courses as c')
        ->join('homework as h', 'c.id', '=', 'h.course_id')
        ->where('c.id', $cursoId)
        ->select([
            'h.Name as Name',
            'h.id as Hid',
            'h.Desc as Desc',
            'h.Points as Points',
            'h.Deadline as Line',
            'h.created_at as start',

            
        ])
        ->get();
    return view("Teacher/teacher_evaluate",compact("results"));
}

    public function homework($cursoId)
    {
        $course =Course::find($cursoId);
        return view("Teacher/teacher_homework",compact("course"));
    }

    public function submits($hwId)   
    {
        $results = DB::table('submit as s')
            ->join('students as st', 's.student_id', '=', 'st.user_id')
            ->join('users as u', 'st.user_id', '=', 'u.id')
            ->join('homework as h', 's.hw_id', '=', 'h.id')
            ->where('s.hw_id', $hwId)
            ->select( 
                'u.name as Name',
                's.created_at as Entregado', 
                's.student_id as Estudiante',
                's.id as Sub_id', 
                's.Points as PuntosESTU',
                'h.Points as PuntosTAREA',
            )
            ->get();

        return view ("Teacher/teacher_submits",compact("results"));
    }

    public function download($subId)
{
   
    $file=submit::find($subId);
   
    $path= $file->file_path;
    
    if (Storage::disk('public')->exists($path))
    {  
        return Storage::disk('public')->download($path);
    }else
{
    return response()->json(["message"=>"Archivo NO encontrado"]);
}
    
}


public function Resources($cursoId)
{
    $course = Course::find($cursoId);
 return view("Teacher/teacher_resources",compact("course"));
}
 
/////// TE QUEDASTE POR LA PARTE DE HACER LOS RECURSOS



public function resources_Upload(Request $request)
{
    $file=$request->file("file");
    $resource=$file->getClientOriginalName();
    $file_path=$file->storeAs("Recursos",$resource,"public");
    Resources::create([
        'course_id'=>$request->course,
        'teacher_id'=>3,
        'file_path'=>$file_path,
    ]);    
    return redirect()->back()->with("mensaje","Su archivo ha subido con exito");
}

}
