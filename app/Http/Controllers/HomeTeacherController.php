<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ActClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Teacher;
use App\ViewModels\VCourse;
use App\ViewModels\VTeacher;

class HomeTeacherController extends Controller
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
        $user = Auth::user();
        $teacher = VTeacher::where('user_id', $user->id)->first();
        $actclass = ActClass::where('teacher_id', $teacher->id)->first();
        $courses = VCourse::where('teacher_id', $teacher->id)->get();

        return view('teacher.index', compact(
            'user',
            'teacher',
            'actclass',
            'courses'
        ));
    }
}
