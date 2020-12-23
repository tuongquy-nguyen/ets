<?php

namespace App\Http\Controllers;

use App\Models\Process;
use App\Models;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class ProcessController extends Controller
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
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Process  $process
     * @return \Illuminate\Http\Response
     */
    public function show(Process $process)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Process  $process
     * @return \Illuminate\Http\Response
     */
    public function edit(Process $process)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Process  $process
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dd($request);
        $path = '';
        if ($request->hasFile('homework_file'))
        {
            $file = $request->file('homework_file');
            $originalname = $request->enrollment_id . '_' . $request->chapter_id . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('studentfiles', $originalname, 'public');
        }
        if ($request->status == 1)
            $complete_time = Carbon::now();
        else
            $complete_time = null;
        $enrollment = Enrollment::where([
            'student_id' => session('student_id'),
            'course_id' => $request->course_id
        ])->first();
        // dd($enrollment);
        $process = Process::updateOrCreate([
            'id' => $request->process_id,
        ],[
            'enrollment_id' => $enrollment->id,
            'chapter_id' => $request->chapter_id,
            'homework_file' => $path,
            'complete_time' => $complete_time,
            'status' => $request->status,
        ]);
        // dd($process);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Process  $process
     * @return \Illuminate\Http\Response
     */
    public function destroy(Process $process)
    {
        //
    }

    public function storeProcess(Request $request)
    {

    }
}
