@extends('master')

@section('master.css')
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/user/login.css') }}">
	<style>
		.has-error .form-control {
			border-color: #ebccd1 !important;
			-webkit-box-shadow: none;
			box-shadow: none;
		}

		#register-btn {
			text-decoration: none;
		}
	</style>
@endsection

@section('content')
	<div class="content">
		<form class="login-form" action="{{ route('user.postLogin') }}" method="post">
			<input type="hidden" name="_token" value="{!! csrf_token() !!}" />

			<h3 class="form-title">Login</h3>
			<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
				<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
				<label class="control-label visible-ie8 visible-ie9">Username</label>
				<input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email" value="{!! Request::old('email') !!}" />

				@if($errors->has('email'))
					<div class="help-container">
						<span class="help-error">
							{{ $errors->first('email') }}
						</span>
					</div>
				@endif
			</div>
			<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
				<label class="control-label visible-ie8 visible-ie9">Password</label>
				<input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" value="{!! Request::old('password') !!}" />

				@if($errors->has('password'))
					<div class="help-container">
						<span class="help-error">
							{{ $errors->first('password') }}
						</span>
					</div>
				@endif
			</div>
			<div class="form-actions">
				<button type="submit" class="btn btn-success uppercase">Login</button>
				<label class="rememberme check">
				<input type="checkbox" name="remember"/>Remember </label>
				<a href="javascript:;" id="forget-password" class="forget-password">Forgot Password?</a>
			</div>
			<div class="create-account">
				<p>
					<a href="{{ route('user.getSignup') }}" id="register-btn" class="uppercase">Create an account</a>
				</p>
			</div>
		</form>
	</div>
@endsection