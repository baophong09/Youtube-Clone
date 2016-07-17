<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

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
		$data = $request->all();

		User::create([
			'name'	=>	$data['name'],
			'email'	=>	$data['email'],
			'password' => bcrypt($data['password'])
		]);

		return redirect('/')->with('info', 'Your account has been created.');
	}

	public function getLogin()
	{
		return view('user.login')->with('body_class','login');
	}
}