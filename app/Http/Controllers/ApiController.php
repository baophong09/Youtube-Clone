<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Session;

class ApiController extends Controller
{
	public function decrypt($signature)
	{
		$js = Session::get('decipherer_js_file');

		$js = str_replace('})(_yt_player);', 'console.log(Hy("'.$signature.'"));})(_yt_player);', $js);

		return view('api.decrypt')->with([
			'js' =>	$js,
			'signature'	=>	$signature
		]);
	}
}
