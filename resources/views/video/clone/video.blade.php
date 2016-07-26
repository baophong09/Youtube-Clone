@extends('home.dashboard')

@section('page.content')
	<form action="" method="post">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">

		<div class="form-group">
			<label for="">Link video</label>
			<input type="text" class="form-control" placeholder="Example: https://www.youtube.com/watch?v=F3JBn7ZCIHg">
		</div>

		<div class="form-group">
			<button class="btn btn-primary">Clone it!</button>
		</div>
	</form>
@endsection