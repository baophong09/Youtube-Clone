@extends('home.dashboard')

@section('page.content')
	<form action="" method="post" enctype="multipart/form-data">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">

		@if($errors->has('url'))
			@foreach($errors->all() as $error)
				{{ $error }}
			@endforeach
		@endif

		<div class="form-group">
			<label for="">Select video</label>
			<input type="file" class="form-control" name="url">
		</div>

		<div class="form-group">
			<label for="">Select your channel</label>
			<select name="channel" class="form-control channel-select">
				<option value="">Select your channel</option>
				@foreach($channels as $channel)
					<option value="{{ $channel->youtube_channel_id }}" @if($channel->youtube_channel_id == Request::old('channel')) selected @elseif($channel->youtube_channel_id == Session::get('current_auth')) selected @endif>{{ $channel->name }}</option>
				@endforeach
			</select>
		</div>

		<div class="form-group">
			<button class="btn btn-primary">Upload</button>
		</div>
	</form>
@endsection