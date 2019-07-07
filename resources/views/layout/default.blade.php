<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from colorlib.com/preview/theme/pizza/blog.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 04 Jul 2019 18:39:28 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
	<title>@yield('title', 'Home')</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Nothing+You+Could+Do" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('assets/css/open-iconic-bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/animate.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/owl.theme.default.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/aos.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/ionicons.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/bootstrap-datepicker.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/jquery.timepicker.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/flaticon.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/icomoon.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
		<div class="container">
			<a class="navbar-brand" href="{{route('posts')}}"><span class="flaticon-pizza-1 mr-1"></span>Pizza<br><small>Delicous</small></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="oi oi-menu"></span> Menu
			</button>
			<div class="collapse navbar-collapse" id="ftco-nav">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item"><a href="{{route('posts')}}" class="nav-link">Home</a></li>
					<li class="nav-item"><a href="{{route('services')}}" class="nav-link">Services</a></li>
					<li class="nav-item"><a href="{{route('about')}}" class="nav-link">About</a></li>
					<li class="nav-item"><a href="{{route('contact')}}" class="nav-link">Contact</a></li>
					<li class="nav-item"><a href="{{route('login')}}" class="nav-link">Login</a></li>
				</ul>
			</div>
		</div>
	</nav>

	<section class="home-slider owl-carousel img" style="background-image: url({{asset('assets/images/bg_1.jpg')}});">
		<div class="slider-item" style="background-image: url({{asset('assets/images/bg_3.jpg')}});">
			<div class="overlay"></div>
			<div class="container">
				<div class="row slider-text justify-content-center align-items-center">
					<div class="col-md-7 col-sm-12 text-center ftco-animate">
						<h1 class="mb-3 mt-5 bread">@yield('slider-item', 'Home')</h1>
					</div>
				</div>
			</div>
		</div>
	</section>
	@yield('content')


	<footer class="ftco-footer ftco-section img">
		<div class="overlay"></div>
		<div class="container">
			<div class="row mb-5">
				<div class="col-lg-3 col-md-6 mb-5 mb-md-5">
					<div class="ftco-footer-widget mb-4">
						<h2 class="ftco-heading-2">About Us</h2>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
						<ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
							<li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
							<li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
							<li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 mb-5 mb-md-5">
					<div class="ftco-footer-widget mb-4">
						<h2 class="ftco-heading-2">Recent Blog</h2>
						@foreach (App\Post::latest()->take(2)->get() as $post)
						<div class="block-21 mb-4 d-flex">
							<a class="blog-img mr-4" style="background-image: url('{{asset('storage/' . $post->image)}}');"></a>
							<div class="text">
								<h3 class="heading"><a href={{route('posts.view',['id'=>$post->id,])}}">{{$post->title }}</a></h3>
								<div class="meta">
									<div><span class="icon-calendar"></span> {{$post->created_at->format('M d, Y')}}</div>
									<div><span class="fa-list-alt"></span> {{$post->category->name}}</div>
									<div><span class="icon-eye"></span> {{$post->stat->views ? $post->stat->views: 0}} </div>
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
				<div class="col-lg-2 col-md-6 mb-5 mb-md-5">
					<div class="ftco-footer-widget mb-4 ml-md-4">
						<h2 class="ftco-heading-2">Services</h2>
						<ul class="list-unstyled">
							<li><a href="#" class="py-2 d-block">Cooked</a></li>
							<li><a href="#" class="py-2 d-block">Deliver</a></li>
							<li><a href="#" class="py-2 d-block">Quality Foods</a></li>
							<li><a href="#" class="py-2 d-block">Mixed</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 mb-5 mb-md-5">
					<div class="ftco-footer-widget mb-4">
						<h2 class="ftco-heading-2">Have a Questions?</h2>
						<div class="block-23 mb-3">
							<ul>
								<li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
								<li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
								<li><a href="#"><span class="icon icon-envelope"></span><span class="text"><span class="__cf_email__" data-cfemail="2c45424a436c5543595e4843414d4542024f4341">[email&#160;protected]</span></span></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 text-center">
					<p>
						This Blog is made with <i class="icon-heart" aria-hidden="true"></i> by Samia</a>
						<br>
						Copyright &copy;<script data-cfasync="false" src="{{asset('assets/js/email-decode.min.js')}}"></script>
						<script type="77dbc558f1cf9739292a9a5b-text/javascript">
							document.write(new Date().getFullYear());
						</script>
					</p>
				</div>
			</div>
		</div>
	</footer>

	<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
			<circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
			<circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" /></svg></div>


	<script src="{{asset('assets/js/jquery.min.js')}}" type="77dbc558f1cf9739292a9a5b-text/javascript"></script>
	<script src="{{asset('assets/js/jquery-migrate-3.0.1.min.js')}}" type="77dbc558f1cf9739292a9a5b-text/javascript"></script>
	<script src="{{asset('assets/js/popper.min.js')}}" type="77dbc558f1cf9739292a9a5b-text/javascript"></script>
	<script src="{{asset('assets/js/bootstrap.min.js')}}" type="77dbc558f1cf9739292a9a5b-text/javascript"></script>
	<script src="{{asset('assets/js/jquery.easing.1.3.js')}}" type="77dbc558f1cf9739292a9a5b-text/javascript"></script>
	<script src="{{asset('assets/js/jquery.waypoints.min.js')}}" type="77dbc558f1cf9739292a9a5b-text/javascript"></script>
	<script src="{{asset('assets/js/jquery.stellar.min.js')}}" type="77dbc558f1cf9739292a9a5b-text/javascript"></script>
	<script src="{{asset('assets/js/owl.carousel.min.js')}}" type="77dbc558f1cf9739292a9a5b-text/javascript"></script>
	<script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}" type="77dbc558f1cf9739292a9a5b-text/javascript"></script>
	<script src="{{asset('assets/js/aos.js')}}" type="77dbc558f1cf9739292a9a5b-text/javascript"></script>
	<script src="{{asset('assets/js/jquery.animateNumber.min.js')}}" type="77dbc558f1cf9739292a9a5b-text/javascript"></script>
	<script src="{{asset('assets/js/bootstrap-datepicker.js')}}" type="77dbc558f1cf9739292a9a5b-text/javascript"></script>
	<script src="{{asset('assets/js/jquery.timepicker.min.js')}}" type="77dbc558f1cf9739292a9a5b-text/javascript"></script>
	<script src="{{asset('assets/js/scrollax.min.js')}}" type="77dbc558f1cf9739292a9a5b-text/javascript"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&amp;sensor=false" type="77dbc558f1cf9739292a9a5b-text/javascript"></script>
	<script src="{{asset('assets/js/google-map.js')}}" type="77dbc558f1cf9739292a9a5b-text/javascript"></script>
	<script src="{{asset('assets/js/main.js')}}" type="77dbc558f1cf9739292a9a5b-text/javascript"></script>

	<script type="77dbc558f1cf9739292a9a5b-text/javascript">
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());

		gtag('config', 'UA-23581568-13');
	</script>
	<script src="{{asset('assets/js/rocket-loader.min.js')}}" data-cf-settings="77dbc558f1cf9739292a9a5b-|49" defer=""></script>
</body>

</html>