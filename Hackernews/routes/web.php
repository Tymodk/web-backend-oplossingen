<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'PostsController@index');
Route::get('article/add', 'PostsController@create');
Route::get('comments/{id}', 'PostsController@show');
Route::get('instructies', 'PostsController@instructies');

Auth::routes();
Route::get('/home', 'HomeController@index');
Route::post('article/add', 'PostsController@store');
Route::post('comments/{id}', 'PostsController@addComment');
