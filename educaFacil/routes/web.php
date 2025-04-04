<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DonationController;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Admin

Route::middleware(['auth','role:Admin'])->group(function() {
Route::get('/admin/home/',[AdminController::class,"home"])->name("adminHome");
//Route::get('/laravel',[AdminController::class,"laravel"])->name("laravel");
Route::get('/admin/create/teacher',[AdminController::class,"newTeacher"])->name("newTeacher");
Route::post('/admin/create/teacher',[AdminController::class,"createTeacher"])->name("createTeacher");

Route::get('/admin/create/category',[AdminController::class,"newCategory"])->name("newCategory");
Route::post('/admin/create/category',[AdminController::class,"createCategory"])->name("createCategory");

Route::get('/admin/create/course',[AdminController::class,"newCourse"])->name("newCourse");
Route::post('/admin/create/course',[AdminController::class,"createCourse"])->name("createCourse");

Route::get('/admin/create/admin',[AdminController::class,"newAdmin"])->name("newAdmin");
Route::post("/admin/create/admin",[AdminController::class,"createAdmin"])->name("createAdmin");
Route::get("/admin/create/post",[AdminController::class,"newPost"])->name("newPost");
Route::post("/admin/create/post",[AdminController::class,"createPost"])->name("createPost");
Route::get("/myProfile",[StudentController::class,"Profile"])->name("Profile");
Route::put("/myProfile",[StudentController::class,"updateProfile"])->name("updateProfile");
});


//teacher

Route::middleware(['auth','role:Teacher'])->group(function() {

Route::get('/teacher/home',[TeacherController::class,"teacherHome"])->name("teacherHome");
Route::get('/teacher/dashboardHW/{cursoId}',[TeacherController::class,"homeHomework"])->name("homeHomework");
Route::get('/teacher/homework/{cursoId}',[TeacherController::class,"homework"])->name("homework");
Route::post('/teacher/homework/{cursoId}',[TeacherController::class,"Newhomework"])->name("Newhomework");
Route::get('/dashboard/course/{cursoId}',[TeacherController::class,"course_dasboard"])->name("course_dashboard");
Route::get('/evaluate/course/hw/{cursoId}',[TeacherController::class,"Evaluate"])->name("evaluate");
Route::get('/evaluate/hw/{hwId}',[TeacherController::class,"submits"])->name("submits");
Route::get('/download/hw/{subId}',[TeacherController::class,"download"])->name("download");
Route::get("/Resources/{cursoId}",[TeacherController::class,"Resources"])->name("Resources");
Route::post("/Resources/{cursoId}",[TeacherController::class,"resources_Upload"])->name("resources_Upload");
Route::get("/evaluateThis/{subId}",[TeacherController::class,"evaluateThis"])->name("evaluateThis");
Route::get("/myProfile",[StudentController::class,"Profile"])->name("Profile");
Route::put("/myProfile",[StudentController::class,"updateProfile"])->name("updateProfile");
});
//estudiante

Route::middleware(['auth','role:Estudiante'])->group(function() {

Route::get('/myCourses',[StudentController::class,"myCourses"])->name("myCourses");
Route::get('/myCourses/course/{myCourseId}',[StudentController::class,"dashboard"])->name("dashboard");
Route::post('/courses/view/{courseId}',[CourseController::class,"enrollment"])->name("enrollment");
Route::get("homework/{courseID}",[StudentController::class,"homework"])->name("Homework_stu");
Route::post("homework/{courseID}",[StudentController::class,"submit"])->name("submit");
Route::put("homework/{courseID}",[StudentController::class,"submit_Update"])->name("submit_Update");
Route::get('/resources-available/{courseID}',[StudentController::class,"resources"])->name("resources_stu");
Route::get("/resources-available/download/{resourceId}",[StudentController::class,"prueba"])->name("prueba");

Route::get('/myRecord',[StudentController::class,"historial"])->name("historial");
Route::get("/myProfile",[StudentController::class,"Profile"])->name("Profile");
Route::put("/myProfile",[StudentController::class,"updateProfile"])->name("updateProfile");
});

Route::get("/donation",[DonationController::class,"donationView"])->name("donationView");
Route::post("/paypal",[DonationController::class,"donation"])->name("donation");
Route::get("/success",[DonationController::class,"success"])->name("success");
Route::get("/cancel",[DonationController::class,"cancel"])->name("cancel");


Route::get('/courses',[CourseController::class,"courses"])->name("courses");
Route::get('/courses/view/{courseId}',[CourseController::class,"coursesView"])->name("coursesView");
Route::get('/course',[CourseController::class,"coursesFilter"])->name("coursesFilter");


//Route::put("homework/update/{}")
/////Extras
Route::get('/noticias',[PostController::class,"posts"])->name("posts");
