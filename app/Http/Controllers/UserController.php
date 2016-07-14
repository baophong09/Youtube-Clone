<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User as User;

class UserController extends Controller
{
    public function getSignup(){
    	return view('user.signup');
    }

    public function create(Request $request) {

    }
}