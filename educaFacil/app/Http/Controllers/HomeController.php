<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userOrTeacher= Auth::user();
        
        if ($userOrTeacher->role == "Teacher")
        {
        return redirect()->route('teacherHome');
        }
        
        if ($userOrTeacher->role == "Admin")
        {
        return redirect()->route('adminHome');
        }
        
        return view('home');
    }
}
