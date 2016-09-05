@extends('master')

@section('content')

@include('home.include.header')

<div class="clearfix">
</div>

<div class="page-container">
	@include('home.include.sidebar')
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			@yield('page.content')
		</div>
	</div>
</div>

@endsection