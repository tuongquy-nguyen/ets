<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Faculty;
use App\ViewModels\VSubject;
use App\Http\Requests\SubjectRequest;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = VSubject::get();
        $faculties = Faculty::whereNotNull('parent_id')->get();
        return view('admin.subject.index', compact('subjects', 'faculties'));
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
    public function store(SubjectRequest $request)
    {
        // $file_name = '';
        if ($request->hasFile('profile'))
        {
            $file = $request->profile;
            $file_name = $file->getClientOriginalName();
            $file->move('img/subject', $file_name);
        }
        $subject = new Subject();
        $subject->name = $request->name;
        $subject->credit = $request->credit;
        $subject->faculty_id = $request->faculty_id;
        $subject->profile = $file_name;
        $subject->description = $request->description;
        $subject->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $file_name = '';
        if ($request->hasFile('profile'))
        {
            $file = $request->profile;
            $file_name = $file->getClientOriginalName();
            $file->move('img/subject', $file_name);
        }
        else {
            $file_name = $request->old_profile;
        }
        $subject = Subject::find($request->subject_id);
        $subject->name = $request->name;
        $subject->credit = $request->credit;
        $subject->faculty_id = $request->faculty_id;
        $subject->profile = $file_name;
        $subject->description = $request->description;
        $subject->save();
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $subject = Subject::findOrFail($request->id)->delete();
        if ($subject)
            return redirect()->back();
    }
}
