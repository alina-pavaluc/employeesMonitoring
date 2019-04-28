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

use App\Http\Middleware\EmployeeMiddleware;
use App\Http\Middleware\EmployerMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::middleware("auth")->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/changePassword', 'ChangePasswordController@changePassword');
    Route::post('/changePassword', 'ChangePasswordController@updatePassword');


    Route::middleware(EmployeeMiddleware::class)->group(function () {
        Route::post('/check-in', "CheckInController@checkIn");
        Route::post('/check-out', "CheckInController@checkOut");

        Route::post('/task/{task}/complete', 'TaskController@complete');

    });

    Route::middleware(EmployerMiddleware::class)->group(function () {
        Route::get('/employee', 'EmployeeController@create');
        Route::post('/employee', 'EmployeeController@store');

        Route::get('/employee/{user}', 'EmployeeController@edit');
        Route::post('/employee/{user}', 'EmployeeController@update');

        Route::delete('/employee/{user}', 'EmployeeController@delete');

        Route::get('/employee/{user}/tasks', 'TaskController@tasksOfEmployee')->name('employeeTasks');
        Route::post('/employee/{user}/tasks', 'TaskController@store');

        Route::get('/task/{task}', 'TaskController@edit');
        Route::post('/task/{task}', 'TaskController@update');
        Route::delete('/task/{task}', 'TaskController@delete');

    });
});
