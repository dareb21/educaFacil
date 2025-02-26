<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin/create/admin',[AdminController::class,"newAdmin"])->name("newAdmin");
Route::post("/admin/create/admin",[AdminController::class,"createAdmin"])->name("createAdmin");

Route::get('/admin/create/teacher',[AdminController::class,"newTeacher"])->name("newTeacher");
Route::post('/admin/create/teacher',[AdminController::class,"createTeacher"])->name("createTeacher");

Route::get('/admin/create/category',[AdminController::class,"newCategory"])->name("newCategory");
Route::post('/admin/create/category',[AdminController::class,"createCategory"])->name("createCategory");

Route::get('/admin/create/course',[AdminController::class,"newCourse"])->name("newCourse");
Route::post('/admin/create/course',[AdminController::class,"createCourse"])->name("createCourse");


Route::get('/teacher/home',[TeacherController::class,"teacherHome"])->name("teacherHome");

Route::get('/myCourses',[StudentController::class,"myCourses"])->name("myCourses");

Route::get('/myCourses/course/{myCourseId}',[StudentController::class,"dashboard"])->name("dashboard");

Route::get('/courses',[CourseController::class,"courses"])->name("courses");
Route::get('/courses/view/{courseId}',[CourseController::class,"coursesView"])->name("coursesView");
Route::post('/courses/view/{courseId}',[CourseController::class,"enrollment"])->name("enrollment");


Route::get('/noticias',[AdminController::class,"posts"])->name("posts");
