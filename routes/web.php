<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/','JobController@index');//landing page

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/jobs/{id}/{job}','JobController@show')->name('jobs.show');

Route::post('jobs/apply/{id}','JobController@apply')->name('jobs.apply');//apply jobs

Route::get('jobs/myjob','JobController@myjob')->name('jobs.myjob');

Route::get('jobs/applicants','JobController@applicants')->name('jobs.applicants');




Route::get('user/profile','UserProfileController@index')->name('profile.create');//now

Route::post('profile/store','UserProfileController@store')->name('profile.store');
Route::post('profile/coverletter','UserProfileController@coverletter')->name('profile.coverletter');
Route::post('profile/resume','UserProfileController@resume')->name('profile.resume');
Route::post('profile/avatar','UserProfileController@avatar')->name('profile.avatar');



//company routes
Route::get('/company/{id}/{company}','CompanyController@index')->name('company.index');

Route::get('/company/companyjob','CompanyController@companyjob')->name('company.companyjob');//for vue

//employer registration
Route::view('employer/profile', 'auth.emp_register')->name('employer.registration');
Route::post('employer/profile/store','EmployerProfileController@store')->name('employer.store');

//create and update company profile
Route::get('company/create', 'CompanyController@create')->name('company.create');//now

Route::post('comapny/store','CompanyController@store')->name('company.store');
Route::post('company/cover','CompanyController@cover')->name('company.cover');


//create jobs
Route::get('/jobs','JobController@create')->name('jobs.create');
Route::post('save_job','JobController@save_job');




//Route::prefix('data')->namespace('Data')->middleware(['web','auth'])->group(base_path('route/web/data.php'));
