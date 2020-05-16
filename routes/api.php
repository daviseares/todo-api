<?php

use Illuminate\Http\Request;

//register
Route::post('register', 'UserController@create'); 

//user
Route::group(['middleware' => 'apiJwt'], function () {
    Route::get("user/list","UserController@index");
    Route::post("user/update/","UserController@update");
    Route::delete("user/detele/{user}","UserController@destroy");
});

//authentication
Route::post('auth/login', 'AuthController@login');

//tasks
Route::group(['middleware' => 'apiJwt'], function () {
    Route::get("tasks/list","TasksController@index");
    Route::get("tasks/show/{task}","TasksController@show");
    Route::post("tasks/create","TasksController@store");
    Route::patch("tasks/update/{task}","TasksController@update");
    Route::patch("tasks/check/{task}","TasksController@check");
    Route::delete("tasks/detele/{task}","TasksController@destroy");
});

