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

Route::get('/contest_pre/{id}', 'VicepresidentController@process_contest');


Route::get('/ivicHome', 'evotingController@index');

Route::get('/student_login', 'evotingController@view_auth');

Route::get('/submit_opt', 'evotingController@view_opt');

Route::post('student_login', 'evotingController@verified_login');








Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
