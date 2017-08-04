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
    return view('index');
});


//route===GET====================
Route::get('todos' , 'todoController@index');
Route::get('todos/create' , 'todoController@create');
Route::get('todos/edit/{id}' , 'todoController@edit');
Route::get('todos/checked/{id}' , 'todoController@checked');
//route===POST===================
Route::post('todos/update' , 'todoController@update');
Route::post('todos/save' , 'todoController@save');
Route::post('todos/delete' , 'todoController@delete');