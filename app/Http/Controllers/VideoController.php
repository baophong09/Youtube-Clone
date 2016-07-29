<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Debugbar;
use Auth;
use App\User as User;
use App\Channel as Channel;

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

}
