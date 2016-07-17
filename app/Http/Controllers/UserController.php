<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;

use App\User as User;

class UserController extends Controller
{
	public function getSignup()
	{
		return view('user.signup');
	}

	public function create(Request $request)
	{

		// Rules of form
		$rules = [
			'name'	=>	'required|max:32|alpha_spaces',
			'email'	=>	'required|email',
			'password'	=>	'required|min:6|max:32',
			'password_confirm'	=>	'required|same:password',
			'agree_term'		=>	'required'
		];

		// custom message
		$message = [
			'alpha_spaces' => 'The :attribute may only contain letters and space.'
		];

		$this->validate($request,$rules, $message);

		// User post is valid
		User::create([
			'name'	=>	$request->input('name'),
			'email'	=>	$request->input('email'),
			'password' => bcrypt($request->input('password'))
		]);

		return redirect('/')->with('info', 'Your account has been created.');
	}

	public function getLogin()
	{
		return view('user.login')->with('body_class','login');
	}

	public function postLogin(Request $request)
	{
		$rules = [
			'email'		=>	'required',
			'password'	=>	'required'
		];

		$this->validate($request,$rules);

		// Login is valid
		// Check Auth
		if(!Auth::attempt(['email'=>$request->input('email'), 'password'=>$request->input('password')], $request->has('remember'))) {
			return redirect()->back()->with('info', 'Could not sign in you in with those details.');
		}

		return redirect('/')->with('info', 'You are now signed in.');
	}

	public function logout()
	{
		Auth::logout();

		return redirect('/');
	}
}