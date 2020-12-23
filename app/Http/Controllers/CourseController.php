<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Teacher;
use App\Models\Subject;
use App\Models\Student;
use App\ViewModels\VChapter;
use App\ViewModels\VCourse;
use App\ViewModels\VEnrollment;
use Illuminate\Http\Request;
use App\Http\Requests\CourseRequest;
use App\ViewModels\VChapterStudent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = VCourse::get();
        $teachers = Teacher::select('id', 'name')->get();
        $subjects = Subject::select('id', 'name')->get();
        return view('admin.course.index', compact('courses', 'subjects', 'teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseRequest $request)
    {
        $course = new Course();
        $course->name = $request->name;
        $course->subject_id = $request->subject_id;
        $course->teacher_id = $request->teacher_id;
        $course->start_date = $request->start_date;
        $course->end_date = $request->end_date;
        $course->location = $request->location;
        $course->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = VCourse::find($id);
        $chapters = VChapter::where('course_id', $id)->get();
        $enrollments = VEnrollment::where('course_id', $id)->get();
        return view('admin.course.show', compact('course', 'chapters', 'enrollments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(CourseRequest $request)
    {

        $course = Course::find($request->id);
        $course->name = $request->name;
        $course->subject_id = $request->subject_id;
        $course->teacher_id = $request->teacher_id;
        $course->start_date = $request->start_date;
        $course->end_date = $request->end_date;
        $course->location = $request->location;
        $course->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $course = Course::findOrFail($request->id)->delete();
        if ($course)
            return redirect()->back();
    }

    public function showStudent($course_id, $student_id)
    {
        // dd($course_id, $student_id);
        $student = $student_id;
        $course = VCourse::find($course_id);
        // $chapters = VChapter::where('course_id', $course_id)->get();
        $chapters = DB::table('viewtest')
                    ->where('course_id', $course_id)
                    ->where(function($query) use ($student_id) {
                        $query->where('student_id', $student_id)
                              ->orWhereNull('student_id');
                    })
                    ->orderBy('start_date', 'asc')
                    ->get();
        $enrollments = VEnrollment::where('course_id', $course_id)->get();
        // dd($chapters);
        return view('student.course.show', compact('course', 'chapters', 'enrollments', 'student'));
    }

    public function showTeacher($course_id)
    {
        // $teacher = $teacher_id;
        $course = VCourse::find($course_id);
        // $chapters = VChapter::where('course_id', $course_id)->paginate(10);
        $chapters = DB::table('viewchapters')
                    ->where('course_id', $course_id)
                    ->orderBy('created_at', 'desc')
                    ->paginate(10);
        $enrollments = VEnrollment::where('course_id', $course_id)->get();
        return view('teacher.course.show', compact(
            'course',
            'chapters',
            'enrollments'
        ));
    }
}
