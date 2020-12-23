<?php

use App\Http\Controllers\ChapterController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});

Route::get('/home', function () {
    return view('home')->name('home');
});

Route::group(['prefix' => 'admin', 'middleware'=>'checktest'], function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('faculty', 'FacultyController');

    Route::resource('actclass', 'ActClassController');

    Route::resource('chapter', 'ChapterController');

    Route::resource('course', 'CourseController');

    Route::resource('enrollment', 'EnrollmentController');

    Route::resource('homework', 'HomeworkController');

    Route::resource('mark', 'MarkController');

    Route::resource('process', 'ProcessController');

    Route::resource('student', 'StudentController');

    Route::resource('teacher', 'TeacherController');

    Route::resource('user', 'UserController');

    Route::resource('subject', 'SubjectController');

});



Auth::routes();

Route::group(['prefix' => 'student', 'middleware'=>'checkstudent'], function () {
    Route::get('/', 'HomeStudentController@index')->name('home-student');

    Route::get('/{student}', 'HomeStudentController@show')->name('student.show');

    Route::resource('user', 'UserController');

    Route::resource('process', 'ProcessController');

});


Route::get('/teacher', 'HomeController@teacher')->name('teacher');

Route::get('/course/{course}/{student}', 'CourseController@showStudent')->name('course.studentShow');


Route::group(['prefix' => 'teacher', 'middleware'=>'checkteacher'], function () {
    Route::get('/', 'HomeTeacherController@index')->name('home-teacher');
    Route::get('/course/{course}', 'CourseController@showTeacher')->name('course.teacherShow');
    Route::get('/course/{course}/{chapter}', 'ChapterController@showResult')->name('showresult');
    Route::get('/alert/{course}/{chapter}', 'ChapterController@alertNotDone')->name('alert');

    Route::resource('mark', 'MarkController');
    Route::resource('chapter', 'ChapterController');
});


