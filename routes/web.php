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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::middleware("auth")->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::post('/check-in', "CheckInController@checkIn");
    Route::post('/check-out', "CheckInController@checkOut");

    Route::get('/employee', 'EmployeeController@create');
    Route::post('/employee', 'EmployeeController@store');

    Route::get('/employee/{user}', 'EmployeeController@edit');
    Route::post('/employee/{user}', 'EmployeeController@update');

    Route::delete('/employee/{user}', 'EmployeeController@delete');

    Route::get('/changePassword', 'ChangePasswordController@changePassword');
    Route::post('/changePassword', 'ChangePasswordController@updatePassword');

    Route::get('/employee/{user}/tasks', 'TaskController@index');
    Route::post('/employee/{user}/tasks', 'TaskController@store');

    Route::post('/task/{task}/complete', 'TaskController@complete');

});
