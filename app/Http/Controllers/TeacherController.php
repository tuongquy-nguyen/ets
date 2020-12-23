<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\User;
use App\Models\Faculty;
use App\ViewModels\VTeacher;
use Illuminate\Http\Request;
use App\Http\Requests\TeacherRequest;
use App\Http\Requests\UpdateTeacher;
use Illuminate\Support\Facades\File;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $teachers = VTeacher::get();
        $faculties = Faculty::where('parent_id', null)->get();
        return view('admin.teacher.index', compact('teachers', 'faculties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeacherRequest $request)
    {
        $file_name = '';
        $teacher = new Teacher();
        $teacher->createNew($request->email);
        $lastid = $teacher->getLastUser();
        if ($request->hasFile('profile'))
        {
            $file = $request->profile;
            $file_name = $file->getClientOriginalName();
            $file->move('img/teacher', $file_name);
        }
        Teacher::create([
            'name' => $request->name,
            'gender' => $request->gender,
            'profile' => $request->profile,
            'user_id' => $lastid,
            'profile' => $file_name,
            'faculty_id' => $request->faculty_id,
            'dob' => $request->dob,
            'birthplace' => $request->birthplace,
            'nationality' => $request->nationality,
            'folk' => $request->folk,
            'religion' => $request->religion,
            'id_card_no' => $request->id_card_no,
            'id_card_date' => $request->id_card_date,
            'id_card_place' => $request->id_card_place,
            'address' => $request->address,
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTeacher $request)
    {
        // dd($request);
        $file_name = '';
        if ($request->hasFile('updateprofile'))
        {
            $file = $request->updateprofile;
            $file_name = $file->getClientOriginalName();
            $file->move('img/teacher', $file_name);
        }
        else {
            $file_name = $request->old_profile;
        }

        $teacher = Teacher::find($request->teacher_id);
        $teacher->name = $request->name;
        $teacher->gender = $request->gender;
        $teacher->profile = $file_name;
        $teacher->faculty_id = $request->faculty_id;
        $teacher->dob = $request->dob;
        $teacher->birthplace = $request->birthplace;
        $teacher->nationality = $request->nationality;
        $teacher->folk = $request->folk;
        $teacher->religion = $request->religion;
        $teacher->id_card_no = $request->id_card_no;
        $teacher->id_card_date = $request->id_card_date;
        $teacher->id_card_place = $request->id_card_place;
        $teacher->address = $request->address;
        $teacher->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $teacher = Teacher::findOrFail($request->id)->delete();
        $user = User::findOrFail($request->user_id)->delete();
        if ($teacher)
            return redirect()->back();
    }
}
