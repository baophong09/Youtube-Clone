@extends('home.dashboard')

@section('page.content')

	<div class="page-head">
		<div class="page-title">
			<h1>Manage channel <small>control channel, edit & delete</small></h1>
		</div>
	</div>

	<div class="row margin-top-10">
		@foreach($channels as $channel)
		<div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
			<div class="dashboard-stat2">
				<div class="display">
					<div class="number">
						<h3 class="font-green-sharp"><a href="https://youtube.com/channel/{{ $channel->youtube_channel_id }}" target="_blank"> {{ $channel->name }}</a></h3>
						<small>{{ ($channel->info->snippet->description) ?: 'No description' }}</small>
					</div>
				</div>
				<div class="progress-info">
					<img src="{{ $channel->info->snippet->thumbnails->high->url }}" alt="" class="img-responsive">
				</div>
			</div>
		</div>
		@endforeach

		<div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
			<div class="dashboard-stat2">
				<div class="display">
					<div class="number">
						<a href="{{ route('channel.getAdd') }}">
							<span class="icon-plus"></span> Add new channel
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection


