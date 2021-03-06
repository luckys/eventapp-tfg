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

// Password reset link request routes...
Route::get('auth/password/email', 'Auth\PasswordController@getEmail');
Route::post('auth/password/email', 'Auth\PasswordController@postEmail');
Route::get('auth/password/reset/{token}', 'Auth\PasswordController@getChangePassword');
Route::post('auth/password/reset', 'Auth\PasswordController@postReset');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    Route::get('/dashboard', 'UserController@index');

    Route::get('auth/user/profile', 'UserController@show');
    Route::get('auth/user/profile/edit', 'UserController@edit');
    Route::put('auth/user/profile', 'UserController@update');
    Route::get('auth/user/change-password', 'UserController@getChangePassword');
    Route::patch('auth/user/change-password', 'UserController@updatePassword');

    Route::get('events/create', 'EventController@create');
    Route::get('events', 'EventController@list');
    Route::post('events', 'EventController@store');
    Route::get('events/show/{id}', 'EventController@showEvent');
    Route::get('events/{id}/edit', 'EventController@edit');
    Route::put('events/{id}', 'EventController@update');
    Route::delete('events/{id}', ['as' => 'admin.events.destroy', 'uses' => 'EventController@destroy']);

    Route::get('talks', 'TalkController@list');
    Route::get('talks/create', 'TalkController@create');
    Route::post('talks', 'TalkController@store');
    Route::get('talks/{id}/edit', 'TalkController@edit');
    Route::get('talks/{id}/subscribe', 'TalkController@formSubscribe');
    Route::put('talks/{id}', 'TalkController@update');
    Route::post('talks/{id}/subscribe/events', ['as' => 'admin.events.subscribe', 'uses' => 'EventController@subscribeTalk']);
    Route::post('talks/{id}/unsubscribe/events', ['as' => 'admin.events.unsubscribe', 'uses' => 'EventController@unsubscribeTalk']);
    Route::delete('talks/{id}', ['as' => 'admin.talks.destroy', 'uses' => 'TalkController@destroy']);
    Route::get('events/{event_id}/talks/change/state/{talk_id}', 'TalkController@changeState');
    Route::get('events/{event_id}/talks/delete/state/{talk_id}', 'EventController@deleteState');
});

Route::group(['prefix' => 'api'], function () {
    Route::get('events/{limit?}', 'EventController@index');
    Route::get('talks/{limit?}', 'TalkController@index');
    Route::get('all', 'MainController@all');
});

Route::get('events', 'EventController@allEvents');
Route::get('events/show/{id}', 'EventController@show');
Route::get('events/{id}/form', 'EventController@formBuy');
Route::get('events/{id}/buy', 'EventController@buyEvent');
Route::post('events/payment', 'EventController@paymentEvent');
Route::get('events/ticket/{id}/purchased', 'EventController@getTicket');

Route::get('talks', 'TalkController@allTalks');
Route::get('talks/show/{id}', 'TalkController@show');
Route::get('talks/{id}/form', 'TalkController@formBuy');
Route::get('talks/{id}/buy', 'TalkController@buyTalk');
Route::post('talks/payment', 'TalkController@paymentTalk');
Route::get('talks/ticket/{id}/purchased', 'TalkController@getTicket');


