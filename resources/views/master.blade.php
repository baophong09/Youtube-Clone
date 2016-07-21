<html lang="en">
<head>
	<title>@yield('title')</title>
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" type="text/css" href="{!! asset('assets/plugins/bootstrap/css/bootstrap.min.css') !!}">
	<link rel="stylesheet" type="text/css" href="{!! asset('assets/fa/css/font-awesome.min.css') !!}">
	<link href="{!! asset('assets/plugins/simple-line-icons/simple-line-icons.min.css') !!}" rel="stylesheet" type="text/css"/>

	<link rel="stylesheet" type="text/css" href="{!! asset('assets/css/default.css') !!}">
	<link rel="stylesheet" type="text/css" href="{!! asset('assets/plugins/uniform/css/uniform.default.min.css') !!}">
	<link rel="stylesheet" type="text/css" href="{!! asset('assets/css/component-rounded.css') !!}">
	<link rel="stylesheet" type="text/css" href="{!! asset('assets/css/app.css') !!}">
	
	<link href="{!! asset('assets/css/plugins.css') !!}" rel="stylesheet" type="text/css"/>
	<link href="{!! asset('assets/css/layout.css') !!}" rel="stylesheet" type="text/css"/>
	<link href="{!! asset('assets/css/themes/light.css') !!}" rel="stylesheet" type="text/css" id="style_color"/>
	<link href="{!! asset('assets/css/custom.css') !!}" rel="stylesheet" type="text/css"/>
	@yield('master.css')
</head>
<body class="{{ isset($body_class) ? $body_class : 'page-header-fixed page-sidebar-closed-hide-logo page-sidebar-closed-hide-logo' }}" ng-app="app">
	<div class="container-fluid">
		@yield('content')
	</div>
	<!-- core -->
	<script src="{!! asset('assets/js/jquery-2.2.4.min.js') !!}"></script>
	<script src="{!! asset('assets/plugins/jquery-migrate.min.js') !!}" type="text/javascript"></script>
	<script src="{!! asset('assets/plugins/jquery-ui/jquery-ui.min.js') !!}" type="text/javascript"></script>

	<script src="{!! asset('assets/js/angular-1.5.7.min.js') !!}"></script>

	<script src="{!! asset('assets/plugins/bootstrap/js/bootstrap.min.js') !!}"></script>

	<script src="{!! asset('assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js') !!}" type="text/javascript"></script>
	<script src="{!! asset('assets/plugins/jquery.blockui.min.js') !!}" type="text/javascript"></script>
	<script src="{!! asset('assets/plugins/jquery.cokie.min.js') !!}" type="text/javascript"></script>
	<script src="{!! asset('assets/plugins/uniform/jquery.uniform.min.js') !!}"></script>
	<!-- endcore -->

	<script src="{!! asset('assets/js/metronic.js') !!}" type="text/javascript"></script>
	<script src="{!! asset('assets/js/layout.js') !!}" type="text/javascript"></script>
	<script src="{!! asset('assets/js/demo.js') !!}" type="text/javascript"></script>
	<script src="{!! asset('assets/js/app.js') !!}"></script>
	<script>

	$(document).ready(function() {    
		Metronic.init();
		Layout.init(); // init layout
   		Demo.init(); // init demo features 
   	});
	</script>
	@yield('master.js')
</body>
</html>