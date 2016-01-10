<?php
	$bytes = App\Http\Controllers\AdminController::getFolderSize("fileStorage");
	          
	$bytes += 41127470;
	$GB = round($bytes/1073741824);
	if($bytes <        1024)                        {                        $type = "  B"; }
	if($bytes >=       1024 && $bytes < 1048576   ) { $bytes /=       1024 ; $type = " KB"; }
	if($bytes >=    1048576 && $bytes < 1073741824) { $bytes /=    1048576 ; $type = " MB"; }
	if($bytes >= 1073741824) 				        { $bytes /= 1073741824 ; $type = " GB"; }
	$bytes = sprintf("%.2f", $bytes) . $type;
?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7"> 	<![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8">			<![endif]-->
<!--[if IE 8]>    <html class="lt-ie9"> 				<![endif]-->
<!--[if gt IE 8]><!-->
<html class="" lang="en" ng-app="Creative">
<!--<![endif]-->

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Dashboard</title>
	<link rel="stylesheet" href="<?= asset('../css/dashboard.css') ?>" />
	<link rel="shortcut icon" href="img/favicon.png" />
	<!--[if lt IE 9]>
	  <script src="../js/library/html5shiv.js"></script>
	<![endif]-->
</head>

<body class="" ng-controller="MainController">
	<nav class="navbar navbar-default navbar-fixed-top hideForPrint" id="main-navbar" role="primary">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>

				<a href="../" class="navbar-brand">
					<span class="brand">Creative</span>
				</a>
			</div>
		</div>
	</nav>

	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-2 col-xs-6 sidebar hideForPrint">
				<aside id="sidebar">
					<a href="#/files/add"><div class="uploadButton">
						<div class="iconArea">
							<span class="icon icon-cloud-upload"></span>
						</div>
					</div></a>
					<ul>
						<li><a ng-class="{active: current=='overview'}"   href="#/fileentry"><span class="icon icon-dashboard"></span>Overview</a></li>
						<li><a ng-class="{active: current=='images'}"     href="#/fileentry/images"><span class="icon icon-picture"></span>Image</a></li>
						<li><a ng-class="{active: current=='videos'}"     href="#/fileentry/videos"><span class="icon icon-film"></span>Video</a></li>
						<li><a ng-class="{active: current=='files'}"      href="#/fileentry/files"> <span class="icon icon-file"></span>Files</a></li>
						<li><a ng-class="{active: current=='teacher'}"    href="#/teachers"><span class="icon icon-teacher"></span>Teachers</a></li>
						<li><a ng-class="{active: current=='result'}"     href="#/exams"><span class="icon icon-result"></span>Result</a></li>
						<li><a ng-class="{active: current=='admissions'}" href="#/admissions"><span class="icon icon-english"></span>Admissions</a></li>
						<li><a ng-class="{active: current=='blog'}"       href="#/posts"><span class="icon icon-blog"></span>Blog</a></li>
						<li><a ng-class="{active: current=='settings'}"   href="#/settings"><span class="icon icon-settings"></span>Settings</a></li>
						<li><a href="<?= url('/auth/logout') ?>"><span class="icon icon-logout"></span>Logout</a></li>
					</ul>
					<div class="storage">
						<span class="text"><?= $bytes ?> / 100 GB</span><br>
						<progress value="<?= $GB ?>" max="100"></progress>
					</div>
				</aside>
			</div>
			<div class="col-sm-10 col-xs-12" ng-show="loadingIcon">
				<div class="spinner-container"><div class="spinner-icon"></div></div>
			</div>
			<main class="col-sm-10 col-xs-12" ng-view ng-hide="loadingIcon"></main>
		</div>
	</div>

	<!--<script src="../js/library/jquery.min.js"></script>
	<script src="../js/library/angular.min.js"></script>
	<script src="../js/library/angular-route.min.js"></script>
	<script src="../js/library/angular-resource.min.js"></script>
	<script src="../js/library/angular-animate.min.js"></script>
	<script src="../js/library/ng-file-upload.min.js"></script>
	<script src="../js/library/ui-bootstrap-custom-tpls.min.js"></script>
	<script src='../js/library/textAngular-rangy.min.js'></script>
	<script src='../js/library/textAngular-sanitize.min.js'></script>
	<script src='../js/library/textAngular.min.js'></script>
	<script src='../js/library/loading-bar.min.js'></script>
	<script src="../js/dashboard.js"></script>-->
	<script src="../js/dashboard.min.js"></script>
	<script src="../js/dashboard.js"></script>
</body>

</html>