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

Route::get('/test', 'TodoController@test');

Route::get('/todo', 'TodoController@index');
Route::post('/todo', 'TodoController@create');

Route::get('/todo/edit', 'TodoController@edit');
Route::post('/todo/edit', 'TodoController@update');
