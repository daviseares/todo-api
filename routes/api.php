<?php

use Illuminate\Http\Request;

//register
Route::post('register', 'RegisterController@create');

//authentication
Route::post('auth/login', 'AuthController@login');

//tasks
Route::group(['middleware' => 'apiJwt'], function () {
    Route::get("tasks","TasksController@index");
});

Route::get("tasks/{task}","TasksController@show");
Route::post("tasks","TasksController@store");
Route::patch("tasks/{task}","TasksController@update");
Route::delete("tasks/{task}","TasksController@destroy");