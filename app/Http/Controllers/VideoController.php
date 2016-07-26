<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User as User;
use App\Channel as Channel;

class VideoController extends Controller
{
	public function getCloneVideo() {
		return view('video.clone.video');
	}

	public function postCloneVideo(Request $request) {
		dd($request);
	}

	public function getCloneChannel() {
		dd('get Clone channel');
	}

}
