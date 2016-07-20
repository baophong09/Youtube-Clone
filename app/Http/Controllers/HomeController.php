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
