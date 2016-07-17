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

Route::get('/', function () {
	if(Auth::guest()) {
		dd('Not login');
	}
    dd(Auth::user());
});

Route::group(['prefix' => 'user'], function() {

	Route::get('signup', [
		'uses' 		=> 'UserController@getSignup',
		'as' 		=> 'user.getSignup',
		'middleware' => ['guest']
	]);

	Route::post('signup', [
		'uses' 	=> 'UserController@create',
		'as'	=> 'user.postSignup',
		'middleware' => ['guest']
	]);

	Route::get('login', [
		'uses'	=>	'UserController@getLogin',
		'as'	=>	'user.getLogin',
		'middleware' => ['guest']
	]);

	Route::post('login', [
		'uses'	=>	'UserController@postLogin',
		'as'	=>	'user.postLogin',
		'middleware' => ['guest']
	]);

	Route::get('logout', [
		'uses'	=>	'UserController@logout',
		'as'	=>	'user.logout',
		'middleware'	=>	['auth']
	]);
});