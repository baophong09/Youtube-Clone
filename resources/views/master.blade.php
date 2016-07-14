<html lang="en">
<head>
	<title>@yield('title')</title>
	<link rel="stylesheet" type="text/css" href="{!! asset('asset/bootstrap/css/bootstrap.min.css') !!}">
	<link rel="stylesheet" type="text/css" href="{!! asset('asset/css/app.css') !!}">
</head>
<body>
	<div class="container-fluid">
		@yield('content');
	</div>
</body>
</html>