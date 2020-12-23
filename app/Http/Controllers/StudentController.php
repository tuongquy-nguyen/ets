<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use App\ViewModels\VStudent;
use App\Http\Requests\StudentRequest;
use App\Http\Requests\UpdateStudent;
use App\Jobs\SendEmail;
use App\Models\ActClass;
use Illuminate\Http\Request;
use App\Jobs\SendNewUser;
use App\Jobs\UserNew;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actclasses = ActClass::get();
        $students = VStudent::get();
        return view('admin.student.index', compact('actclasses', 'students'));
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
    public function store(StudentRequest $request)
    {
        $file_name = '';
        $student = new Student();
        $student->createNew($request->email);
        $lastid = $student->getLastUser();

        if ($request->hasFile('profile'))
        {
            $file = $request->profile;
            $file_name = $file->getClientOriginalName();
            $file->move('img/student', $file_name);
        }
        Student::create([
            'name' => $request->name,
            'student_no' => $request->student_no,
            'dob' => $request->dob,
            'gender' => $request->gender,
            'actclass_id' => $request->actclass_id,
            'user_id' => $lastid,
            'phone' => $request->phone,
            'profile' => $file_name,
            'birthplace' => $request->birthplace,
            'nationality' => $request->nationality,
            'religion' => $request->religion,
            'folk' => $request->folk,
            'id_card_no' => $request->id_card_no,
            'id_card_date' => $request->id_card_date,
            'id_card_place' => $request->id_card_place,
            'address' => $request->address,
            'father_name' => $request->father_name,
            'father_phone' => $request->father_phone,
            'mother_name' => $request->mother_name,
            'mother_phone' => $request->mother_phone,
        ]);

        $data = VStudent::all()->last();
        $email = $request->email;
        UserNew::dispatch($data, $email);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudent $request)
    {
        $file_name = '';
        if ($request->hasFile('profile'))
        {
            $file = $request->profile;
            $file_name = $file->getClientOriginalName();
            $file->move('img/student', $file_name);
        }
        else {
            $file_name = $request->old_profile;
        }

        $student = Student::find($request->student_id);
        $student->name = $request->name;
        $student->gender = $request->gender;
        $student->student_no = $request->student_no;
        $student->profile = $file_name;
        $student->phone = $request->phone;
        $student->actclass_id = $request->actclass_id;
        $student->dob = $request->dob;
        $student->birthplace = $request->birthplace;
        $student->nationality = $request->nationality;
        $student->folk = $request->folk;
        $student->religion = $request->religion;
        $student->id_card_no = $request->id_card_no;
        $student->id_card_date = $request->id_card_date;
        $student->id_card_place = $request->id_card_place;
        $student->father_name = $student->father_name;
        $student->father_phone = $request->father_phone;
        $student->mother_name = $request->mother_name;
        $student->mother_phone = $request->mother_phone;
        $student->address = $request->address;
        $student->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $student = Student::findOrFail($request->id)->delete();
        $user = User::findOrFail($request->user_id)->delete();
        if ($student && $user)
            return redirect()->back();
    }
}
