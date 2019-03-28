<?php

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
// Auth::routes([
//     'register' => false,
//     'verify' => false,
//     'reset' => false
//   ]);

Route::get('/', function () {
    return view('login');
});
Route::get('login','UserController@getLogin')->name('login');
Route::get('logout','UserController@logOut');
Route::post('login','UserController@postLogin');
// Route::get('/dashboard','HomeController@getIndex');
//Revenue
Route::get('/revenue',function(){
    return view('revenue/revenue');
});
//Teacher_Class
Route::get('/teacher_class',function(){
    return view('class/teacher_class');
});
//registration_class
Route::get('/registration_class',function(){
    return view('class/registration_class');
});
//ClassRoom
Route::get('/classroom',function(){
    return view('classroom/manage_room');
});
//Time_table of student
Route::get('timetable_student',function(){
    return view('student/timetable');
});
// exam
Route::get('/exam', function(){
		return view('examination/list');
});
Route::get('/checkDB', function (){
    dd(DB::connection()->getDatabaseName());
});
Route::get('/course', function(){
		return view('course/list');
});
Route::get('/class', function(){
	return view('class/list');
});
Route::get('/dashboard', function () {
    return view('layouts/dashboard');
});
Route::get('student', function(){
	return view('student/list');
});
Route::get('timetable', function(){
	return view('class/timetable');
});
Route::get('rollcall', function(){
	return view('class/rollcall');
});
Route::get('holiday', function(){
	return view('holiday/list');
});
Route::get('teacher', function(){
    return view('teacher/list');
});
Route::get('teacher-add', function(){
    return view('teacher/add');
});
Route::get('teacher-edit', function(){
    return view('teacher/edit');
});
Route::get('staff-list', function(){
    return view('staff/list');
});
Route::get('staff-add', function(){
    return view('staff/add');
});
Route::get('staff-edit', function(){
    return view('staff/edit');
});
