<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'MainController@index');

Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::post('auth/signup', 'UserController@signUp');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    Route::get('/dashboard', function () {
        return view('admin.master');
    });

    Route::get('events/create', 'EventController@create');
    Route::get('events', 'EventController@list');
    Route::post('events', 'EventController@store');

    Route::get('talks/create', 'TalkController@create');
    Route::post('talks', 'TalkController@store');
});

Route::get('api/events', 'EventController@index');
Route::get('events/show/{id}', 'EventController@show');


