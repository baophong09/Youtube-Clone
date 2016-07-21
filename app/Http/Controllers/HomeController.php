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
		$uri = \Request::route()->getName();

		return view('home.dashboard')->with([
		]);
	}

	/*
	 * Landing page
	 */
    public function landing()
    {
    	return view('landing');
    }
}
