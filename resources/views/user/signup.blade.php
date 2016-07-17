@extends('master')

@section('master.css')
<style>
	body {
		background: #2c3e50;
	}

	.signup-row {
		margin: 7% auto;
	}

	.div-form-signup {
		background: #fff;
	    padding: 20px;
	    border-top: 0;
	    color: #666;
	}

	#form-signup .form-group {
		position: relative;
	}

	#form-signup .form-group:not('.has-error') .form-control {
		border-radius: 0;
    	box-shadow: none;
    	border-color: #d2d6de;
    	padding-right: 42.5px;
    	position: relative;
	}

	#form-signup .form-group i.fa {
		position: absolute;
		right: 0;
		top: 0;
		display: block;
	    width: 34px;
	    height: 34px;
	    line-height: 34px;
	}

	.signup-title {
		text-align: center;
		padding: 10px;
		font-weight: 400;
	}
</style>
@endsection

@section('content')
	<div class="row signup-row">
		<div class="col-md-4 col-md-offset-4 col-sm-8 col-sm-offset-2 div-form-signup">
			<p class="signup-title">Register a new membership</p>

			<form action="{!! route('user.postSignup'); !!}" method="post" id="form-signup">
				<input type="hidden" name="_token" value="{!! csrf_token(); !!}">

				<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
					<input type="text" class="form-control" name="name" placeholder="Full name" value="{{ Request::old('name') ?: '' }}">
					<i class="fa fa-user"></i>
					@if ($errors->has('name'))
						<div class="help-container">
							<span class="help-error">
								{{ $errors->first('name') }}
							</span>
						</div>
					@endif
				</div>

				<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
					<input type="text" class="form-control" name="email" placeholder="Email" value="{{ Request::old('email') ?: '' }}">
					<i class="fa fa-envelope"></i>

					@if ($errors->has('email'))
						<div class="help-container">
							<span class="help-error">
								{{ $errors->first('email') }}
							</span>
						</div>
					@endif
				</div>

				<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
					<input type="password" class="form-control" name="password" placeholder="Password">
					<i class="fa fa-key"></i>

					@if ($errors->has('password'))
						<div class="help-container">
							<span class="help-error">
								{{ $errors->first('password') }}
							</span>
						</div>
					@endif
				</div>

				<div class="form-group {{ $errors->has('password_confirm') ? 'has-error' : '' }}">
					<input type="password" class="form-control" name="password_confirm" placeholder="Retype Password">
					<i class="fa fa-check"></i>

					@if ($errors->has('password_confirm'))
						<div class="help-container">
							<span class="help-error">
								{{ $errors->first('password_confirm') }}
							</span>
						</div>
					@endif
				</div>

				<div class="row">
					<div class="col-sm-6">
						<label><input type="checkbox" name="agree_term" {{ !$errors->has('agree_term') ? 'checked' : ''}}> I agree to the terms</label>
						@if ($errors->has('agree_term'))
							<span class="help-error">
								{{ $errors->first('agree_term') }}
							</span>
						@endif
					</div>

					<div class="col-sm-6">
						<button type="submit" class="btn btn-primary pull-right">Register <i class="fa fa-sign-in"></i></button>
					</div>
				</div>

			</form>

			<p class="text-center fw700">
				- OR -
			</p>

			<a href="" class="btn btn-block btn-default">Login</a>
		</div>
	</div>
@endsection