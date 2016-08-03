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

Route::get('/', [
	'uses'		=>	'HomeController@index',
	'as'		=> 'home'
]);

Route::get('test', function() {
	$data = file_get_contents("http://www.youtube.com/get_video_info?video_id=C_3d6GntKbk&el=vevo");
	
	parse_str($data);

	$arr = explode(',', $url_encoded_fmt_stream_map);

	foreach($arr as $v) {
		parse_str($v,$output);

		if(isset($output["s"])) {
			$output["new_s"] = DecryptYouTubeCypher($output["s"]);
		}
		dd($output);
	}
});

Route::get('test2', function() {
	$data = file_get_contents("http://www.youtube.com/get_video_info?video_id=89vxfJGdirY");

	parse_str($data);

	//dd($output);

	$arr = explode(',', $url_encoded_fmt_stream_map);

	foreach($arr as $v) {
		parse_str($v,$output);

		if(isset($output["s"])) {
			$output["new_s"] = DecryptYouTubeCypher($output["s"]);
		}
		dd($output);
	}

});


function DecryptYouTubeCypher($signature)
{
    $sigParts = explode('.', $signature);
    if (count($sigParts) == 2)
    {
        $sigParts[1] = substr(substr($sigParts[1], 0, 8) . substr($sigParts[0], 0, 1) . substr($sigParts[1], 9, 9) . substr($sigParts[1], -4, 1) . substr($sigParts[1], 19, 20) . substr($sigParts[1], 18, 1), 0, 40);
        $sigParts[0] = substr($sigParts[0], -40);
        $signature = strrev($sigParts[0] . '.' . $sigParts[1]);
    }
    return $signature;
}

Route::group(['prefix' => 'channel', 'middleware'=>'auth'], function() {
	Route::get('/', function(){
		return redirect()->route('channel.getManage');
	});

	Route::get('add', [
		'uses'	=>	'ChannelController@getAdd',
		'as'	=>	'channel.getAdd',
	]);

	Route::get('manage', [
		'uses'	=>	'ChannelController@getManage',
		'as'	=>	'channel.getManage'
	]);
});

Route::group(['prefix'=>'video', 'middleware'=>'auth'], function() {
	Route::get('upload', [
		'as'	=>	'video.getUpload',
		'uses'	=>	'VideoController@getUpload'
	]);

	Route::post('upload', [
		'as'	=>	'video.postUpload',
		'uses'	=>	'VideoController@postUpload'
	]);

	Route::get('clone/video', [
		'as'	=>	'video.getCloneVideo',
		'uses'	=>	'VideoController@getCloneVideo'
	]);

	Route::post('clone/video', [
		'as'	=>	'video.postCloneVideo',
		'uses'	=>	'VideoController@postCloneVideo'
	]);

	Route::get('clone/channel', [
		'as'	=>	'video.getCloneChannel',
		'uses'	=>	'VideoController@getCloneChannel'
	]);
});

Route::get('landing', [
	'uses'		=>	'HomeController@landing',
	'as'		=> 'landing',
	'middleware' => ['guest']
]);

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

Route::get('googleauth/{id}', [
	'uses'	=>	'VideoController@getAuth',
	'as'	=>	'video.getAuth',
	'middleware'	=>	['auth']
]);