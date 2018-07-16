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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/candidate', 'PresidentController@candidate');

Route::get('/all_candidate', 'StudentController@allcandidate');

Route::get('/contest_pre/{id}', 'PresidentController@process_contest');

Route::get('/contest_vp/{id}', 'VicePresidentController@process_contest');
Route::get('/contest_secgen/{id}', 'SecGenController@contest_sec_gens');
Route::get('/contest_asis_sec/{id}', 'AsisSecGenController@process_contest');


Route::get('add_student', 'StudentController@add_student');
Route::post('/add_student', 'StudentController@add');

Route::get('show_student/{student_id}', 'StudentController@student_details');




Route::get('/ivicHome', 'evotingController@index');

Route::get('/student_login', 'evotingController@view_auth');
Route::get('/student_opt', 'evotingController@view_opt');

Route::get('/submit_opt', 'evotingController@view_opt');

Route::post('student_login', 'evotingController@verified_login');








Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
