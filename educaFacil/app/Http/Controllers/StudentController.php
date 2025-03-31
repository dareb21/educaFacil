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
        
if ($hws->isEmpty())

{
    return view("Student/students_homework",compact("hws"));
}
else

{
    $submits= [];
    $pointsGain=[];
    foreach ($hws as $hw)
{
$hasSubmit=Submit::where("hw_id",$hw->id)
                ->where("student_id",Auth::id())
                ->exists();
$submits[$hw->id]= $hasSubmit ? "Si":"No";
if ($hasSubmit)
{
$point =Submit::select("Points")
->where("hw_id",$hw->id)
->where("student_id",Auth::id())
->first();
if ($point)
{
    $pointsGain[$hw->id]=$point;
}

}


}
return view("Student/students_homework",compact("hws","submits","pointsGain"));
}  
        
}

public function submit(Request $request)
    {
        try      
{
        $request->validate([
            
            "archivo" => 'required|mimes:pdf,docx,xlsx,txt,pptx',
        ]);
        $file= $request->file("archivo");
        $hwname= $file->getClientOriginalName();
        $file_path=$file->storeAs("entregas", $hwname,"public");
        
        $submit=submit::create([
            'hw_id'=>$request->hw_id,
            'student_id'=>Auth::id(),
            'file_path'=>$file_path,
        ]);
       
        
    return redirect()->back()->with(["mensaje"=>"Su tarea ha subido con exito"]);
    }
    catch (\Illuminate\Validation\ValidationException $e)
    
    {
        return redirect()->back()->with("Error","Formato de archivo no permitido. Permitidos: pdf, docx, xlsx, txt, pptx");
    }
    
    }




    public function submit_Update(Request $request)
    {
    try      
    {
        $request->validate([
            
            "archivo" => 'required|mimes:pdf,docx,xlsx,txt,pptx',
        ]);

    $thisSubmit=Submit::where("hw_id",$request->hw_id)
    ->where("student_id",Auth::id())
    ->first();

        if ($thisSubmit)
        {  
            if (Storage::disk('public')->exists($thisSubmit->file_path)){
                Storage::disk('public')->delete($thisSubmit->file_path);
            }

         $file= $request->file("archivo");
        $hwname=$file->getClientOriginalName();
        $file_path=$file->storeAs("entregas", $hwname,"public");


        $thisSubmit->update([
            'file_path' => $file_path,
        ]);
        return redirect()->back()->with(["mensaje"=>"Su tarea ha actualizada con exito"]);
        }   
        return redirect()->back()->with("Error", "No se encontró la tarea para actualizar.");
    }
   
    catch (\Illuminate\Validation\ValidationException $e)
    
    {
        return redirect()->back()->with("Error","Formato de archivo no permitido. Permitidos: pdf, docx, xlsx, txt, pptx");
    }
    
    }

public function resources($courseID)
{
    $resources=Resources::where("course_id",$courseID)->get();
   //dd($resources->isEmpty());

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
$user=Auth::user();

if (now()->diffInHours($user->updated_at) < 24) {
    return redirect()->back()->with("Cooldown", "Debe esperar 1 día antes de actualizar nuevamente su perfil.");
}

try  {
$request->validate([
    "name" => "required|string|max:255",
    "email" => "required|email|unique:users,email," . $user->id,
    "phone" => "required|digits:8",
    "gender" => "required|in:Masculino,Femenino",
    "birthday" => "required|date|before:today",
]);

$user->update([
        "name"=>$request->name,
        "email"=>$request->email,
        "phone"=>$request->phone,
        "gender"=>$request->gender,
        "birthday"=>$request->birthday,
    ]);
    return redirect()->back()->with("Mensaje","Actualizacion exitosa");
}catch(\Illuminate\Validation\ValidationException $e)
{
return redirect()->back()->with("Error","Solo campos validos");
}
}


public function historial()
{

    $courses = Enrollment::join('courses', 'courses.id', '=', 'enrollments.course_id')
    ->join('users','users.id','=','enrollments.student_id')
    ->select('courses.name as Course','courses.date_start as Start','courses.mode as Mode')
    ->where("users.id", Auth::id())
    ->get();

    return view("Student/historial",compact("courses"));

}



}