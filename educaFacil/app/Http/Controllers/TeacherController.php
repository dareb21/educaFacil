<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\Homework;
use Illuminate\Http\Request;
use App\Models\submit;
use App\Models\Resources;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class TeacherController extends Controller
{
    public function teacherHome()
    {
        
        $cursos= Course::where("teacher_id",Auth::id())->get();
        
        return view("Teacher/teacher_home",compact("cursos"));
    }

public function course_dasboard($cursoId)
{
    $course=Course::find($cursoId);
    
    return view ("Teacher/teacher_dashboard",compact("course"));
}


public function Newhomework(Request $REQUEST)
{
try
{
    $REQUEST->validate([
        "Name" => "required|string|min:1|max:255",
        "Desc" => "required|string|min:1",
        "Points" => "required|integer|min:1",
        "Deadline" => "required|date|after:today",
    ]);
    
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
    }catch (\Illuminate\Validation\ValidationException $e)
    
    {
        return redirect()->back()->with("Error","Favor introducir solo campos validos.");
    }

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
 

public function resources_Upload(Request $request)
{
try
{
    $request->validate([
            
        "file" => 'required|mimes:pdf,docx,xlsx,txt,pptx',
    ]);

    $file=$request->file("file");
    $resource=$file->getClientOriginalName();
    $file_path=$file->storeAs("Recursos",$resource,"public");
    Resources::create([
        'course_id'=>$request->course,
        'teacher_id'=>Auth::id(),
        'file_path'=>$file_path,
    ]);    
    return redirect()->back()->with("mensaje","Su archivo ha subido con exito");
}
catch (\Illuminate\Validation\ValidationException $e)
    
    {
        return redirect()->back()->with("Error","Formato de archivo no permitido. Permitidos: pdf, docx, xlsx, txt, pptx");
    }
}

public function evaluateThis(Request $request, $subId)

{
    $Points = DB::table('submit as s')
    ->join('homework as h', 's.hw_id', '=', 'h.id')
    ->where('s.id', $subId)
    ->select(      
    'h.Points as PuntosTAREA',
    )->first();


try
{
   $request->validate([

    'nota' => 'required|integer|min:0|max:' . intval($Points->PuntosTAREA)  
]);

    $thisSubmit=submit::find($subId);
    $note = Submit::where('id', $subId)->update(['Points' => $request->input('nota')]);
   
    session()->flash("mensaje", "Puntuación realizada con éxito.");
    return back();

} catch(\Illuminate\Validation\ValidationException $e)
{
    return redirect()->back()->with("Error"," Puntacion no valida.");
}
}


}





