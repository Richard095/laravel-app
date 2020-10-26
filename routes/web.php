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

Route::get('/all-tasks', 'TaskController@allTasks')->name('all.tasks');

Route::get('/tasks-ended', 'TaskController@index')->name('task.ended');

Route::get('/task/{user_id}', 'TaskController@create')->name('task');

Route::get('/task/{task}/editar', 'TaskController@edit')->name('task.edit');

Route::post('/task-create/{user_id}', 'TaskController@store')->name('task.create');



Route::patch('/task/{task}', 'TaskController@update')->name('edit');

Route::post('/task/{task}', 'TaskController@endTask')->name('endTask');

Route::delete('/task/{task}', 'TaskController@destroy')->name('task.delete');
