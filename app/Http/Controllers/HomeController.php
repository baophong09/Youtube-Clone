<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use App\User as User;

class HomeController extends Controller
{
	public function index()
	{
		if(Auth::guest()) {
			return view('landing');
		}

		$user = Auth::user();

		return view('home.dashboard')->with([
			'user'	=>	$user,
			'body_class' => 'page-header-fixed page-sidebar-closed-hide-logo page-sidebar-closed-hide-logo'
		]);

		dd('Hello '.$user->name);
	}

	/*
	 * Landing page
	 */
    public function landing()
    {
    	return view('landing');
    }
}
