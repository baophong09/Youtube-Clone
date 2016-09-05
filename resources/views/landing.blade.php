<html lang="en">
<head>
	<title>YoutubeClone - The Best Youtube Tool for Youtuber & Internet Marketing | Powered by MaskPHP.com</title>
	<link rel="stylesheet" type="text/css" href="{!! asset('assets/plugins/bootstrap/css/bootstrap.min.css') !!}">
	<link rel="stylesheet" type="text/css" href="{!! asset('assets/fa/css/font-awesome.min.css') !!}">
	<link rel="stylesheet" type="text/css" href="{!! asset('assets/css/default.css') !!}">
	<link href='http://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900|Montserrat:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="{!! asset('assets/landing/css/animate.css') !!}">
	<link rel="stylesheet" type="text/css" href="{!! asset('assets/landing/css/main.css') !!}">

	<script src="{!! asset('assets/landing/js/modernizr-2.7.1.js') !!}"></script>

</head>
<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="logo" href="/">YC</a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#pricing" class="scroll">Pricing</a>
					</li>
					<li><a href="{{ route('user.getLogin') }}">Login</a>
					</li>
				</ul>
			</div>
			<!--/.navbar-collapse -->
		</div>
	</div>

	<header>
		<div class="container">
			<div class="row">
				<div class="col-xs-6">
					<a href="/" class="logo">YC</a>
				</div>
				<div class="col-xs-6 signin text-right navbar-nav">
					<a href="#pricing" class="scroll">Pricing</a>&nbsp; &nbsp;<a href="{{ route('user.getLogin') }}">Login</a>
				</div>
			</div>

			<div class="row header-info">
				<div class="col-sm-10 col-sm-offset-1 text-center">
					<h1 class="wow fadeIn">A Product That can Change Your Life</h1>
					<br />
					<p class="lead wow fadeIn" data-wow-delay="0.5s">YouTube là một trang web chia sẻ video nơi người dùng có thể tải lên, xem và chia sẻ các video clip. YouTube do ba nhân viên cũ của PayPal tạo nên vào giữa tháng 2 năm 2005.</p>
					<br />

					<div class="row">
						<div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
							<div class="row">
								<div class="col-xs-6 text-right wow fadeInUp" data-wow-delay="1s">
									<a href="#be-the-first" class="btn btn-secondary btn-lg scroll">Learn More</a>
								</div>
								<div class="col-xs-6 text-left wow fadeInUp" data-wow-delay="1.4s">
									<a href="{{ route('user.getSignup') }}" class="btn btn-primary btn-lg">Sign Up</a>
								</div>
							</div>
							<!--End Button Row-->
						</div>
					</div>

				</div>
			</div>
		</div>
	</header>

	<div class="mouse-icon hidden-xs">
		<div class="scroll"></div>
	</div>

	<section id="be-the-first" class="pad-xl">
		<div class="container">
			<div class="row">
				<div class="col-sm-8 col-sm-offset-2 text-center margin-30 wow fadeIn" data-wow-delay="0.6s">
					<h2>Be the first</h2>
					<p class="lead">Lorem ipsum dolor sit amet, consectetur adipis.</p>
				</div>
			</div>

			<div class="iphone wow fadeInUp" data-wow-delay="1s">
				<img src="{!! asset('assets/landing/img/iphone.png') !!}">
			</div>
		</div>
	</section>

	<section id="main-info" class="pad-xl">
		<div class="container">
			<div class="row">
				<div class="col-sm-4 wow fadeIn" data-wow-delay="0.4s">
					<hr class="line purple">
					<h3>App Feature One Here</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam viverra orci ut est facilisis, eu elementum mi volutpat. Pellentesque ac tristique nisi.</p>
				</div>
				<div class="col-sm-4 wow fadeIn" data-wow-delay="0.8s">
					<hr class="line blue">
					<h3>App Feature One Here</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam viverra orci ut est facilisis, eu elementum mi volutpat. Pellentesque ac tristique nisi.</p>
				</div>
				<div class="col-sm-4 wow fadeIn" data-wow-delay="1.2s">
					<hr class="line yellow">
					<h3>App Feature One Here</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam viverra orci ut est facilisis, eu elementum mi volutpat. Pellentesque ac tristique nisi.</p>
				</div>
			</div>
		</div>
	</section>


	<!--Pricing-->
	<section id="pricing" class="pad-lg">
		<div class="container">
			<div class="row margin-40">
				<div class="col-sm-8 col-sm-offset-2 text-center">
					<h2 class="white">Pricing</h2>
					<p class="white">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam viverra orci ut.</p>
				</div>
			</div>

			<div class="row margin-50">

				<div class="col-sm-4 pricing-container wow fadeInUp" data-wow-delay="1s">
					<br />
					<ul class="list-unstyled pricing-table text-center">
						<li class="headline">
							<h5 class="white">Personal</h5>
						</li>
						<li class="price">
							<div class="amount">$5<small>/m</small>
							</div>
						</li>
						<li class="info">2 row section for you package information. You can include all details or icons</li>
						<li class="features first">Up To 25 Projects</li>
						<li class="features">10GB Storage</li>
						<li class="features">Other info</li>
						<li class="features last btn btn-secondary btn-wide"><a href="#">Get Started</a>
						</li>
					</ul>
				</div>

				<div class="col-sm-4 pricing-container wow fadeInUp" data-wow-delay="0.4s">
					<ul class="list-unstyled pricing-table active text-center">
						<li class="headline">
							<h5 class="white">Professional</h5>
						</li>
						<li class="price">
							<div class="amount">$12<small>/m</small>
							</div>
						</li>
						<li class="info">2 row section for you package information. You can include all details or icons</li>
						<li class="features first">Up To 25 Projects</li>
						<li class="features">10GB Storage</li>
						<li class="features">Other info</li>
						<li class="features">Other info</li>
						<li class="features last btn btn-secondary btn-wide"><a href="#">Get Started</a>
						</li>
					</ul>
				</div>

				<div class="col-sm-4 pricing-container wow fadeInUp" data-wow-delay="1.3s">
					<br />
					<ul class="list-unstyled pricing-table text-center">
						<li class="headline">
							<h5 class="white">Business</h5>
						</li>
						<li class="price">
							<div class="amount">$24<small>/m</small>
							</div>
						</li>
						<li class="info">2 row section for you package information. You can include all details or icons</li>
						<li class="features first">Up To 25 Projects</li>
						<li class="features">10GB Storage</li>
						<li class="features">Other info</li>
						<li class="features last btn btn-secondary btn-wide"><a href="#">Get Started</a>
						</li>
					</ul>
				</div>

			</div>

		</div>
	</section>


	<section id="invite" class="pad-lg light-gray-bg">
		<div class="container">
			<div class="row">
				<div class="col-sm-8 col-sm-offset-2 text-center">
					<i class="fa fa-envelope-o margin-40"></i>
					<h2 class="black">Sign up now</h2>
					<br />
					<p class="black">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam viverra orci ut.</p>
					<br />

					<div class="row">
						<div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
							<form role="form" method="get" action="{{ route('user.getSignup') }}">
								<!-- <div class="form-group">
									<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Email">
								</div> -->
								<button type="submit" class="btn btn-primary btn-lg">Sign Up</button>
							</form>
						</div>
					</div>
					<!--End Form row-->

				</div>
			</div>
		</div>
	</section>


	<section id="press" class="pad-sm">
		<div class="container">

			<div class="row margin-30 news-container">
				<div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 wow fadeInLeft" data-wow-delay="0.8s">
					<a href="#" target="_blank">
						<img class="news-img pull-left" src="{!! asset('assets/landing/img/press-01.jpg') !!}" alt="Tech Crunch">
						<p class="black">Sukienhay is the best event social in Vietnam.
							<br />
							<small><em>Sukienhay.com - January 15, 2015</em></small>
						</p>
					</a>
				</div>
			</div>

			<div class="row margin-30 news-container">
				<div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 wow fadeInLeft" data-wow-delay="1.2s">
					<a href="#" target="_blank">
						<img class="news-img pull-left" src="{!! asset('assets/landing/img/press-02.jpg') !!}" alt="Forbes">
						<p class="black">MaskPHP is the best framework in the world
							<br />
							<small><em>Maskphp.com</em></small>
						</p>
					</a>
				</div>
			</div>

		</div>
	</section>


	<footer>
		<div class="container">

			<div class="row">
				<div class="col-sm-8 margin-20">
					<ul class="list-inline social">
						<li>Connect with us on</li>
						<li><a href="#"><i class="fa fa-twitter"></i></a>
						</li>
						<li><a href="#"><i class="fa fa-facebook"></i></a>
						</li>
						<li><a href="#"><i class="fa fa-instagram"></i></a>
						</li>
					</ul>
				</div>

				<div class="col-sm-4 text-right">
					<p><small>Copyright &copy; 2014. All rights reserved. <br>
					Created by <a href="http://visualsoldiers.com">MaskPHP</a></small>
					</p>
				</div>
			</div>

		</div>
	</footer>

	<script src="{!! asset('assets/landing/js/jquery-1.11.0.min.js') !!}"></script>
    <script src="{!! asset('assets/plugins/bootstrap/js/bootstrap.min.js') !!}"></script>
	<script src="{!! asset('assets/landing/js/wow.min.js') !!}"></script>
	<script src="{!! asset('assets/landing/js/main.js') !!}"></script>
</body>
</html>