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

Route::group(['middleware' => 'web'], function() {
    Route::get('/', 'HomeController@index');

    Route::get('/about', 'AboutController@index');

    Route::get('/contact', 'ContactController@index');

    Route::get('/login', 'LoginController@index');
    Route::post('/login', 'LoginController@store');
    Route::get('/logout', 'LoginController@destroy');

    Route::get('/post/create','PostController@create');
    Route::post('/post','PostController@store');
    Route::get('/post/{post}','PostController@show');
    Route::get('/post/{post}/edit','PostController@edit');
    Route::patch('/post/{post}','PostController@update');
    Route::delete('/post/{post}','PostController@destroy');

    Route::get('/tag', 'TagsController@index');
    Route::get('/tag/{name}', 'TagsController@show');

    Route::get('/theme', 'ThemeController@index');
    Route::post('/theme', 'ThemeController@store');
});