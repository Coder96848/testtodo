<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/logout','Auth\LoginController@logout');
Route::get('/tasks', 'TaskController@index');
Route::post('/tasks/add', 'TaskController@postTask');
Route::delete('/task/delete/{task}', 'TaskController@destroy');
