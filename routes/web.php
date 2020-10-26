<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return redirect('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/tasks-ended', 'TaskController@index')->name('task.ended');

Route::get('/task', 'TaskController@create')->name('task');

Route::post('/create', 'TaskController@store')->name('create');

Route::get('/task/{task}', 'TaskController@edit')->name('task.edit');

Route::patch('/task/{task}', 'TaskController@update')->name('edit');

Route::post('/task/{task}', 'TaskController@endTask')->name('endTask');

Route::delete('/task/{task}', 'TaskController@destroy')->name('task.delete');
