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
Route::get('/crud', 'EmployeController@index');
Route::post('/crud/create', 'EmployeController@create');
Route::get('/crud/show/{id}', 'EmployeController@show');
Route::post('/crud/update/{id}', 'EmployeController@edit');
Route::get('/crud/delete/{id}', 'EmployeController@destroy');
