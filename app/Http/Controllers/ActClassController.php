<?php

namespace App\Http\Controllers;

use App\Models\ActClass;
use App\Models\Faculty;
use App\Models\Teacher;
use App\ViewModels\VActClass;
use Illuminate\Http\Request;
use App\Http\Requests\ActClassRequest;

class ActClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actclasses = VActClass::get();
        $teachers = Teacher::get();
        $faculties = Faculty::whereNotNull('parent_id')->get();
        return view('admin.actclass.index', compact('actclasses'), compact('faculties', 'teachers'));
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
    public function store(ActClassRequest $request)
    {
        $actclass = actclass::create([
            'name' => $request->name,
            'faculty_id' => $request->faculty_id,
            'teacher_id' => $request->teacher_id,
        ]);

        if ($actclass)
            return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ActClass  $actClass
     * @return \Illuminate\Http\Response
     */
    public function show(ActClass $actClass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ActClass  $actClass
     * @return \Illuminate\Http\Response
     */
    public function edit(ActClass $actClass)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ActClass  $actClass
     * @return \Illuminate\Http\Response
     */
    public function update(ActClassRequest $request)
    {
        $actclass = ActClass::find($request->actclass_id);
        $actclass->name = $request->name;
        $actclass->teacher_id = $request->teacher_id;
        $actclass->faculty_id = $request->faculty_id;
        $actclass->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ActClass  $actClass
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $actclass = ActClass::findOrFail($request->id)->delete();
        if ($actclass)
            return redirect()->back();
    }
}
