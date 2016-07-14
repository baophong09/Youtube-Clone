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
    return view('welcome');
});

Route::group(['prefix' => 'user'], function() {

	Route::get('signup', [
		'uses' => 'UserController@getSignup',
		'as' =>	'user.getSignup'
	]);

	Route::post('signup', [
		'uses' 	=> 'UserController@create',
		'as'	=> 'user.postSignup'
	]);

});