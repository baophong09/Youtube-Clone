@extends('home.dashboard')

@section('page.content')

	<div class="page-head">
		<div class="page-title">
			<h1>Dashboard <small>statistics & reports</small></h1>
		</div>
	</div>
	<a href="{{ $auth_url }}" class="btn btn-primary">Add channel</a>

@endsection


