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
use App\Models\Posts;

class AdminController extends Controller
{
    public function newAdmin()
    {
        return view("Admin/admin_creation");
    }








    public function createAdmin(Request $REQUEST)
    {
        $data=$REQUEST->all();

        $data["gender"]=strtolower($data["gender"]);
        
        $REQUEST->merge($data);        
        
try
{
$REQUEST->validate([


            'name'      => 'required|string|max:255',  
            'email'     => 'required|email|unique:users,email',  
            'phone'     => 'required|string|digits:8',  
            'gender'    => 'required|string|in:masculino,femenino',   
            'birthday'  => 'required|date|before:today',
            'password'  => 'required|string|min:8',  
            'subrol'    => 'required|string|max:255',  
        ]);
        
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
        
    return redirect()->back()->with(["mensaje"=>"Admin creado con exito"]);
    }catch(\Illuminate\Validation\ValidationException $e)

    {
     return redirect()->back()->with("Error","Campos no validos, favor llenar otra vez.");
    }
}










    
    public function newTeacher()
    {
        return view("Admin/teacher_creation");
    }



















    public function createTeacher(Request $REQUEST)
    {
        $data=$REQUEST->all();

$data["gender"]=strtolower($data["gender"]);

$REQUEST->merge($data);

       try
     
       {
        $REQUEST->validate([
            'name'      => 'required|string|max:255',  
            'email'     => 'required|email|unique:users,email',  
            'phone'     => 'required|string|digits:8',  
            'gender'    => 'required|string|in:masculino,femenino',  
            'birthday'  => 'required|date|before:today',  
            'password'  => 'required|string|min:8',  
            'prof'      => 'required|string|max:255', 
        ]);

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

        return redirect()->back()->with(["mensaje"=>"Catedratico creado con exito"]);

    }catch(\Illuminate\Validation\ValidationException $e)

    {
     return redirect()->back()->with("Error","Campos no validos, favor llenar otra vez.");
    }
}










    public function newCategory()   
    {
        return view("Admin/categories_creation");
    }

    public function createCategory(Request $REQUEST)
    {
    try

    
    {
        $REQUEST->validate([
            'name' => 'required|string|max:255|min:5', 
            'desc' => 'required|string|max:500|min:10', 
        ]);

        $category = Category::create([
            'name' => $REQUEST->name,
            'desc'=> $REQUEST->desc,
        ]);
        
    return redirect()->back()->with(["mensaje"=>"Categoria creada con exito"]);
    } catch(\Illuminate\Validation\ValidationException $e)

    {
     return redirect()->back()->with("Error","Campos no validos, favor llenar otra vez.");
    }
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
        

        
        $REQUEST->validate([
            "name"        => "required|string|max:255|min:5",
            "desc"        => "required|string|min:10",
            "duration"    => "required|integer|min:3",
            "mode"        => "required|string|in:Live,Recorded",
            "max"         => "required|integer|min:4",
            "start"       => "required|date|after:today",
        ]);

        $data=$REQUEST->all();
        $data["days"]=strtoupper($data["days"]);
        $REQUEST->merge($data);
        $hora_inicio= $REQUEST->hour;
        $hora_clase = "1:30";
        $tiempo_total = strtotime($hora_inicio) + strtotime($hora_clase) -strtotime("00:00");
        $hora_fin=date("H:i",$tiempo_total);
       $horario = $hora_inicio. " - " . $hora_fin;
      
    if ($REQUEST->mode =="Live")
    
{

    $url ="https://meet.google.com/jxj-xsfz-npb?authuser=0";
}else
{
$url="https://drive.google.com/drive/folders/1BfPm4jWf-Ze4y5KLHbMltFGbdO_yHZCY?usp=sharing";
}
        
        $curso = new Course;
        $curso->name = $REQUEST->name;
        $curso->desc = $REQUEST->desc;
        $curso->duration = $REQUEST->duration;
        $curso->mode = $REQUEST->mode;
        $curso->free_spots = $REQUEST->max;
        $curso->date_start = $REQUEST->start;
        $curso->days =$REQUEST->days;
        $curso->hour =$horario;
        $curso->teacher_id = $REQUEST->teacher;
        $curso->category_id = $REQUEST->category;
        $curso->meeting_url = $url;
        $curso->save();
    
      
        return redirect()->back()->with(["mensaje" => "Curso creado con éxito"]);
    }
    



public function home()

{
    return view("Admin/admin_home");
}
















public function newPost()

{
    return view("Admin/new_post");
}



















public function createPost(Request $request)
{
try

{
    $request->validate([
        "post_title" =>"required|string|max:255",
        "post_description"=>"required"
    ]);

    $post = Posts::create([
        "post_title"=>$request->post_title,
        "post_description"=>$request->post_description,
    ]);

    return redirect()->back()->with(["mensaje"=>"Post creado con exito"]);
}catch(\Illuminate\Validation\ValidationException $e)

{
 return redirect()->back()->with("Error","Campos no validos, favor llenar otra vez.");
}
    

}




}
