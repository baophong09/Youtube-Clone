<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User as User;
use App\Channel as Channel;

class VideoController extends Controller
{
	public function getCloneVideo() {
		dd('get Clone video');
	}

	public function getCloneChannel() {
		dd('get Clone channel');
	}

}
