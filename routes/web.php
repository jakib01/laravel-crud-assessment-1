<?php

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

Route::group(['namespace' => 'App\Http\Controllers'], function()
{
    /**
     * Home Routes
     */
    Route::get('/', 'HomeController@index')->name('home.index');

    Route::group(['middleware' => ['guest']], function() {
        /**
         * Register Routes
         */
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');

    });

    Route::group(['middleware' => ['auth']], function() {
        /**
         * Logout Routes
         */
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');

        Route::get('/employee/index', 'EmployeeController@index')->name('employee.index');
        Route::get('/employee/create', 'EmployeeController@create')->name('employee.create');
        Route::post('/employee/store', 'EmployeeController@store')->name('employee.store');
        Route::get('/employee/edit/{id}', 'EmployeeController@edit')->name('employee.edit');
        Route::put('/employee/update/{id}', 'EmployeeController@update')->name('employee.update');
        Route::get('/employee/delete/{id}', 'EmployeeController@delete')->name('employee.delete');

        Route::get('/todo/index', 'TodoApiController@index')->name('todo.index');
        Route::get('/todo/call/api', 'TodoApiController@apiCall')->name('todo.apiCall');
        Route::get('/todo/call/api/exportPdf', 'TodoApiController@exportPdf')->name('todo.apiCall.exportPdf');
    });
});
