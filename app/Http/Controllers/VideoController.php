<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Debugbar;
use Auth;
use App\User as User;
use App\Channel as Channel;
use Session;

class VideoController extends Controller
{
	public function getUpload()
	{
		$channels = Auth::user()->channels;

		$channels = Channel::format($channels);

		return view('video.upload')->with([
			'channels'	=>	$channels
		]);
	}

	public function postUpload(Request $request)
	{
		dd($request);
	}

	public function getCloneVideo()
	{
		$channels = Auth::user()->channels;

		$channels = Channel::format($channels);

		return view('video.clone.video')->with([
			'channels'	=>	$channels
		]);
	}

	public function postCloneVideo(Request $request)
	{
		$rules = [
			'url'	=>	'required|youtube_video',
			'channel'	=>	'required'
		];

		$messages = [
			'youtube_video'	=>	'This is not valid youtube video url'
		];

		$this->validate($request,$rules,$messages);

		dd('all okay');
	}

	public function getCloneChannel()
	{
		dd('get Clone channel');
	}

	public function getAuth($id,$redirect_url) {
		$current_id = Session::get('current_auth');

		$redirect = true;

		if($current_id === $id) {
			$redirect = false;
		}

		if($redirect) {

			$client = new \Google_Client();
			$client->setClientId(env('GOOGLE_CLIENT_ID'));
			$client->setClientSecret(env('GOOGLE_CLIENT_SECRET'));
			$client->setScopes('https://www.googleapis.com/auth/youtube.force-ssl');

			$redirect = filter_var('http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . '/channel/add', FILTER_SANITIZE_URL);
			$client->setRedirectUri($redirect);

		}

		return json_encode(array("redirect"=>$redirect));
	}

}
