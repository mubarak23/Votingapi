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

Route::get('/contest_welfare/{id}', 'WelfareController@process_contest');

Route::get('/contest_treasurer/{id}', 'TreasurerController@process_contest');
Route::get('/contest_fin_sec/{id}', 'FinSecController@process_contest');
Route::get('/contest_asist_fin_sec/{id}', 'AsisFinSecController@process_contest');
Route::get('/contest_academic/{id}', 'AcademicCandController@process_contest');
Route::get('/contest_sales_dir/{id}', 'SaleCandController@process_contest');

Route::get('/contest_sport_dir/{id}', 'SportDirController@process_contest');

Route::get('/contest_social_dir/{id}', 'social_dirController@process_contest');


Route::get('add_student', 'StudentController@add_student');
Route::post('/add_student', 'StudentController@add');

Route::get('show_student/{student_id}', 'StudentController@student_details');




Route::get('/ivicHome', 'evotingController@index')->name('ivicHome');

Route::get('/student_login', 'evotingController@view_auth');
Route::get('/student_opt', 'evotingController@view_opt');

Route::get('/submit_opt', 'evotingController@view_opt');

Route::post('student_login', 'evotingController@verified_login');

Route::get('voting', 'evotingController@show_voting');

//presidential section
Route::get('vote/show_president', 'evotingController@president')->name('show_president');

Route::post('vote/vote_pre', 'PresidentController@process_vote')->name('vote_pre');

//vp section
Route::get('vote/show_vp_president', 'evotingController@vp')->name('show_vp');

Route::post('vote/vote_vp', 'VicePresidentController@process_vote')->name('vote_vp');

//sec gen
Route::get('vote/show_sec', 'evotingController@sec_gen')->name('show_sec');
Route::post('vote/vote_sec', 'SecGenController@process_vote')->name('vote_sec');

//Asis sec gen
Route::get('vote/show_asist_sec', 'evotingController@asissec_gen')->name('show_asist_sec');
Route::post('vote/vote_asist_sec', 'AsisSecGenController@process_vote')->name('vote_asist_sec');

//fin sec 

Route::get('vote/show_fin_sec', 'evotingController@fin_sec')->name('show_fin_sec');
Route::post('vote/vote_fin_sec', 'FinSecController@process_vote')->name('vote_fin_sec');
//asis fin sec
Route::get('vote/show_asist_fin_sec', 'evotingController@asist_fin_sec')->name('show_asist_fin_sec');
Route::post('vote/vote_asist_fin_sec', 'AsisFinSecController@process_vote')->name('vote_asist_fin_sec');


//sales director
Route::get('vote/show_sales', 'evotingController@sales_dir')->name('show_sale');
Route::post('vote/vote_sale', 'SaleCandController@process_vote')->name('vote_sale');

//sacial director
Route::get('vote/show_social', 'evotingController@social_dir')->name('show_social');
Route::post('vote/vote_social', 'social_dirCandController@process_vote')->name('vote_sale');

//sport director
Route::get('vote/show_sport', 'evotingController@sport_dir')->name('show_sport');
Route::post('vote/vote_sport', 'SportDirController@process_vote')->name('vote_sport');

//sport director
Route::get('vote/show_pro', 'evotingController@pro')->name('show_pro');
Route::post('vote/vote_pro', 'ProCandController@process_vote')->name('vote_pro');

//Academic director
Route::get('vote/show_academic_dir', 'evotingController@academic_dir')->name('show_acadenic_dir');
Route::post('vote/vote_academic_dir', 'AcademicCandController@process_vote')->name('vote_academic_dir');

//Welfare
Route::get('vote/show_welfare', 'evotingController@Welfare')->name('show_welfare');
Route::post('vote/vote_Welfare', 'WelfareController@process_vote')->name('vote_Welfare');

//treasurer
Route::get('vote/show_treasurer', 'evotingController@treasurer')->name('show_treasurer');
Route::post('vote/vote_treasurer', 'TreasurerController@process_vote')->name('vote_treasurer');

Route::get('vote/confirm_vote', 'WelfareController@confirm_vote')->name('confirm_vote');

Route::get('admin/show_result', 'ResultComputeController@show_result')->name('show_result');

Route::get('admin/logout', 'evotingController@getlogout')->name('admin_logout');


//coming back here
Route::get('admin/compute_president/{num_candidate}', 'ResultComputeController@compute_president')->name('compute_president');















Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
