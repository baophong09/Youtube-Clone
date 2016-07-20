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
		<form class="register-form" action="" method="post">
			<input type="hidden" name="_token" value="{{ csrf_token() }}" />
			<h3>Sign Up</h3>
			<p class="hint">
				Enter your account details below:
			</p>
			<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
				<input type="text" class="form-control" name="name" placeholder="Full name" value="{{ Request::old('name') ?: '' }}">

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

				@if ($errors->has('password_confirm'))
					<div class="help-container">
						<span class="help-error">
							{{ $errors->first('password_confirm') }}
						</span>
					</div>
				@endif
			</div>

			<div class="form-group margin-top-20 margin-bottom-20">
				<label class="check">
				<input type="checkbox" name="agree_term" {{ !$errors->has('agree_term') ? 'checked' : ''}}/> I agree to the <a href="javascript:;">
				Terms of Service </a>
				& <a href="javascript:;">
				Privacy Policy </a>
				</label>
				<div id="register_tnc_error">
					@if ($errors->has('agree_term'))
						<span class="help-error">
							{{ $errors->first('agree_term') }}
						</span>
					@endif
				</div>

			</div>
			<div class="form-actions">
				<button type="button" id="register-back-btn" class="btn btn-default">Back</button>
				<button type="submit" id="register-submit-btn" class="btn btn-success uppercase pull-right">Submit</button>
			</div>
		</form>
	</div>
@endsection