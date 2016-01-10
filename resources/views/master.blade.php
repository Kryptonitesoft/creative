<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7"> 	<![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8">			<![endif]-->
<!--[if IE 8]>    <html class="lt-ie9"> 				<![endif]-->
<!--[if gt IE 8]><!-->
<html class="" lang="en">
<!--<![endif]-->

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{ $pageTitle }}</title>
	<link rel="stylesheet" href="{{ asset('/css/styles.css') }}" />
	<link rel="shortcut icon" href="img/favicon.png" />
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	@yield('styles');
</head>

<body class="">
	<nav class="navbar navbar-default navbar-fixed-top" id="main-navbar" role="primary">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainnav">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>

				<a href="/" class="navbar-brand">
					<span class="icon-logo"></span> <span class="brand">CREATIVE COACHING</span>
				</a>
			</div>
			<div class="collapse navbar-collapse navbar-right" id="mainnav">
				<ul class="nav navbar-nav">
					<li><a href="/">Home</a></li>
					<li><a href="/gallery">Galary</a></li>
					<li><a href="/about">About</a></li>
					<li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">More <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="/about#packages">Admission</a></li>
							<li><a href="/documents">Documents</a></li>
							<li><a href="/results">Results</a></li>
							<li><a href="/blog">Blog</a></li>
			          	</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	@yield('content');

	<footer>
		<div class="container text-center">
			<div class="social">
				<a href="https://twitter.com/creativcoaching"><span class="icon-twitter"></span></a>
				<a href="https://www.facebook.com"><span class="icon-facebook"></span></a>
				<a href="https://www.youtube.com"><span class="icon-youtube"></span></a>
				<a href="https://www.google.com/maps"><span class="icon-map"></span></a>
			</div>
			<nav role="footer">
				<ul>
					<li><a href="/home">Home</a></li> |
					<li><a href="/about">About</a></li> |
					<li><a href="/developers">Developers</a></li>
				</ul>
				Copyright &copy Creative Coaching
			</nav>
		</div>
	</footer>
	<!--<script src="js/library/jquery.min.js"></script>
	<script src="js/library/jquery.bootstrap.min.js"></script>
	<script src="js/library/jquery.cycle2.min.js"></script>
	<script src="js/library/angular.min.js"></script>
	<script src="js/library/angular-route.min.js"></script>
	<script src="js/library/angular-animate.min.js"></script>
	<script src="js/library/angular-resource.min.js"></script>
	<script src="js/library/ui-bootstrap-custom-tpls.min.js"></script>
	<script src="js/library/ng-file-upload.min.js"></script>
	<script src='js/library/textAngular-rangy.min.js'></script>
	<script src='js/library/textAngular-sanitize.min.js'></script>
	<script src='js/library/textAngular.min.js'></script>
	<script src='js/library/loading-bar.min.js'></script>
	<script src="js/animation.js"></script>-->
	<script src='js/app.min.js'></script>
	<script src="js/creative.js"></script>
	<script src='js/blog.js'></script>
	@yield("script");
	
</body>

</html>