<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('/administrator', 'AdministratorController@index');
Route::get('/manager', 'ManagerController@index');
Route::resource('addemployee', 'EmployeeController');
Route::resource('user', 'CreateuserController');
Route::resource('Supervisor', 'SupervisorController');

Route::resource('schedule', 'ScheduleController');
Route::get('schedule/generate', 'ScheduleController@generate');
Route::post('schedule/generate', 'ScheduleController@generate');

Route::get('/changepassword', 'SettingsController@showChangePasswordForm');
Route::post('/changepassword', 'SettingsController@updatePassword');
// Route::resource('password/reset', 'SettingsController');

Route::get('downloadReport/xls', 'ScheduleController@downloadReport');
Route::post('downloadReport/xls', 'ScheduleController@downloadReport');


