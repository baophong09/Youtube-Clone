@extends('home.dashboard')

@section('page.content')
	<form action="" method="post">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">

		@if($errors->has('url'))
			@foreach($errors->all() as $error)
				{{ $error }}
			@endforeach
		@endif

		<div class="form-group">
			<label for="">Url video</label>
			<input type="text" class="form-control" name="url" placeholder="Example: https://www.youtube.com/watch?v=F3JBn7ZCIHg">
		</div>

		<div class="form-group">
			<button class="btn btn-primary">Clone it!</button>
		</div>
	</form>
@endsection