<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmail;
use App\Mail\NewChapter;
use App\Models\Chapter;
use App\Models\User;
use App\ViewModels\VChapter;
use App\ViewModels\VCourse;
use App\ViewModels\VEnrollment;
use App\ViewModels\VTracking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;

class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {   $path = '';
        if ($request->hasFile('homework_file'))
        {
            $file = $request->file('homework_file');
            $originalname = $file->getClientOriginalName();
            $path = $file->storeAs('homework', $originalname, 'public');
        }
        $chapter = new Chapter();
        $chapter->course_id = $request->course_id;
        $chapter->title = $request->title;
        $chapter->mission = $request->mission;
        $chapter->start_date = $request->start_date;
        $chapter->end_date = $request->end_date;
        $chapter->homework_file = $path;
        $chapter->save();

        $enrollments = VEnrollment::where('course_id', $request->course_id)->get();
        // Mail::to('quyteoht@gmail.com')->send(new NewChapter($chapter, session('name')));
        SendEmail::dispatch($chapter, $enrollments, 'newchapter');
        if ($chapter)
            return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chapter  $chapter
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chapter  $chapter
     * @return \Illuminate\Http\Response
     */
    public function edit(Chapter $chapter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chapter  $chapter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $chapter = Chapter::find($request->id);
        if ($request->hasFile('homework_file'))
        {
            $file = $request->file('homework_file');
            $originalname = $file->getClientOriginalName();
            Storage::delete($request->old_homework_file);
            $path = $file->storeAs('homework', $originalname, 'public');
        }
        else
            $path = $request->old_homework_file;
        $chapter->title = $request->title;
        $chapter->mission = $request->mission;
        $chapter->start_date = $request->start_date;
        $chapter->end_date = $request->end_date;
        $chapter->homework_file = $path;
        $chapter->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chapter  $chapter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $chapter = Chapter::findOrFail($request->id)->delete();
        if ($chapter)
            return redirect()->back();
    }

    public function showResult($course_id, $chapter_id)
    {
        $course = VCourse::find($course_id);
        // dd($course);
        $dones = VTracking::where('chapter_id', $chapter_id)->get();
        $enrollments = VEnrollment::where('course_id', $course_id)->get();
        $chapter = VChapter::where('id', $chapter_id)->first();
        $except = array();
        foreach ($dones as $value)
            array_push($except, $value->student_id);
        $notdones = VEnrollment::where('course_id', $course_id)->whereNotIn('student_id', $except)->get();
        return view('teacher.chapter.result', compact(
            'dones',
            'notdones',
            'chapter',
            'course'
        ));
        // dd($chapter);

    }

    public function alertNotDone($course_id, $chapter_id)
    {
        $course = VCourse::where('id', $course_id)->first();
        $dones = VTracking::where('chapter_id', $chapter_id)->get();
        // $enrollments = VEnrollment::where('course_id', $course_id)->get();
        $chapter = VChapter::where('id', $chapter_id)->first();
        $except = array();
        foreach ($dones as $value)
            array_push($except, $value->student_id);
        $notdones = VEnrollment::where('course_id', $course_id)->whereNotIn('student_id', $except)->get();
        // dd($chapter, $course);
        SendEmail::dispatch($chapter, $notdones, 'alertnotdone');
        return redirect()->back();

    }
}
