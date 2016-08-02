@extends('home.dashboard')

@section('page.content')
	<form action="" method="post" ng-controller="CloneController">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">

		@if($errors->has('url'))
			@foreach($errors->all() as $error)
				{{ $error }}
			@endforeach
		@endif

		<div class="form-group">
			<label for="">Url video</label>
			<textarea class="form-control" name="url" placeholder="Example: https://www.youtube.com/watch?v=F3JBn7ZCIHg" rows="5">{{ Request::old('url') }}</textarea>
		</div>

		<div class="form-group">
			<label for="">Select your channel</label>
			<select name="channel" class="form-control channel-select" ng-model="youtubeChannel" ng-change="changeAuth()">
				<option value="">Select your channel</option>
				@foreach($channels as $channel)
					<option value="{{ $channel->youtube_channel_id }}" @if($channel->youtube_channel_id == Session::get('current_auth')) ng-selected="true" @endif>{{ $channel->name }}</option>
				@endforeach
			</select>
		</div>

		<div class="form-group">
			<button class="btn btn-primary">Clone it!</button>
		</div>
	</form>
@endsection