<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Student;
use App\Models;
use App\ViewModels;
use App\ViewModels\CountCourse;
use App\ViewModels\MyCourse;
use App\ViewModels\VActClass;
use App\ViewModels\VCourse;
use App\ViewModels\VEnrollment;
use App\ViewModels\VStudent;
use App\VNotDone;
use DB;

class HomeStudentController extends Controller
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
        $id = $user->id;

        $student = Student::where('user_id', $id)->first();
        $notdone = VNotDone::where('student_id', $student->id)->first();
        $class = VActClass::where('id', $student->actclass_id)->first();
        $count_course = CountCourse::where('student_id', $student->id)->first();
        $mycourses = MyCourse::where('student_id', $student->id)->get();

        return view('student.index', compact(
            'user',
            'student',
            'class',
            'notdone',
            'count_course',
            'mycourses'
        ));

    }

    public function show($student_id)
    {
        $student = VStudent::find($student_id);
        $class = VActClass::where('id', $student->actclass_id)->first();
        return view('student.profile', compact(
            'student',
            'class'
        ));
    }


}
