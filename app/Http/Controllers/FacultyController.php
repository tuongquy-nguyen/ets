<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\ViewModels\VFaculty;
use Illuminate\Http\Request;
use App\Http\Requests\FacultyRequest;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $supers = VFaculty::where('parent_id', null)->get();
        $faculties = VFaculty::get();
        return view('admin.faculty.index', compact('faculties','supers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.faculty.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FacultyRequest $request)
    {
        
        Faculty::create($request->all());
        return redirect(route('faculty.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function show(Faculty $faculty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function edit(Faculty $faculty)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function update(FacultyRequest $request)
    {
        $faculty = Faculty::where('id', $request->faculty_id)->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
        ]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $faculty = Faculty::findOrFail($request->id)->delete();
        if ($faculty)
            return redirect(route('faculty.index'));
        
    }
}
