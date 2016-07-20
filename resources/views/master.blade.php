<html lang="en">
<head>
	<title>@yield('title')</title>
	<link rel="stylesheet" type="text/css" href="{!! asset('assets/plugins/bootstrap/css/bootstrap.min.css') !!}">
	<link rel="stylesheet" type="text/css" href="{!! asset('assets/fa/css/font-awesome.min.css') !!}">
	<link rel="stylesheet" type="text/css" href="{!! asset('assets/css/default.css') !!}">
	<link rel="stylesheet" type="text/css" href="{!! asset('assets/plugins/uniform/css/uniform.default.min.css') !!}">
	<link rel="stylesheet" type="text/css" href="{!! asset('assets/css/component-rounded.css') !!}">
	<link rel="stylesheet" type="text/css" href="{!! asset('assets/css/app.css') !!}">
	@yield('master.css')
</head>
<body class="{{ isset($body_class) ? $body_class : '' }}" ng-app="app">
	<div class="container-fluid">
		@yield('content')
	</div>

	<script src="{!! asset('assets/js/jquery-2.2.4.min.js') !!}"></script>
	<script src="{!! asset('assets/plugins/uniform/jquery.uniform.min.js') !!}"></script>
	<script src="{!! asset('assets/js/angular-1.5.7.min.js') !!}"></script>
	<script src="{!! asset('assets/plugins/bootstrap/js/bootstrap.min.js') !!}"></script>
	<script src="{!! asset('assets/js/app.js') !!}"></script>
	@yield('master.js')
</body>
</html>