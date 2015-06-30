@extends("master")

@section("content")
	<main class="container about" ng-app="Creative">
		
		<h2>Director</h2>
		<div class="row director">
			<div class="col-sm-4 left">
				<img class="animated zoomIn" src="{{$teachers[0]->image}}" alt="Mohammad Sazzad Hossain">
			</div>
			<div class="col-sm-8 right">
				<a href="http://fb.me/sazzadhossain1979"><h3 class="name rotateX">{{$teachers[0]->name}}</h3></a>
				<div class="education rotateX">
					Head of the Department of Biology<br>
					Nawab Habibullah Model School &amp College<br>
					{{$teachers[0]->designation}}<br>
					Creative Coaching
				</div>
				<div class="education rotateX" ta-bind><?= nl2br($teachers[0]->education); ?></div>
				<blockquote class="hidden-sm hidden-xs rotateX">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos asperiores tempore maiores debitis assumenda autem similique reprehenderit dolor esse consectetur ab, unde quis itaque? Recusandae numquam nobis dicta illo qui.</blockquote>
			</div>
		</div>

		<h2>Teachers</h2>
		<div class="row teachers">
			@foreach ($teachers as $teacher)
			<?php if($teacher->id == 1) continue; ?>
			<div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-vs-12">
				<figure>
					<img src="{{$teacher->image}}" alt="{{$teacher->name}}">
					<a href="{{$teacher->fb}}">
						<figcaption class="name">{{$teacher->name}}</figcaption>
					</a>
					<figcaption class="designation">{{$teacher->designation}}</figcaption>
					<figcaption class="teaches">{{$teacher->teaches}}</figcaption>
					<figcaption class="edu">{{$teacher->education}}</figcaption>
				</figure>
			</div>
			@endforeach
		</div>
		<div ng-controller="AdmissionController">
		<h2 id="packages">Packages</h2>
		<div class="row packages" >
			<div class="col-md-3 col-sm-6 col-xs-6 col-vs-12">
				<section>
					<div class="header">Rajuk Admission Coaching</div>
					<div class="icon"><span class="icon-teacher"></span></div>
					<div class="class">V to VIII</div>
					<div class="subjects">Bangla<br>English<br>Mathematics</div>
					<div class="btn" ng-click="open(1)">Apply</div>
				</section>
			</div>
			<div class="col-md-3 col-sm-6 col-xs-6 col-vs-12">
				<section>
					<div class="header">Academic Coaching</div>
					<div class="icon"><span class="icon-pencil"></span></div>
					<div class="class">V to VIII</div>
					<div class="subjects">Bangla<br>English<br>Mathematics</div>
					<div class="btn" ng-click="open(2)">Apply</div>
				</section>
			</div>
			<div class="col-md-3 col-sm-6 col-xs-6 col-vs-12">
				<section>
					<div class="header">Science Coching</div>
					<div class="icon"><span class="icon-chemistry"></span></div>
					<div class="class">IX to XII</div>
					<div class="subjects">Physics, Chemistry<br>Mathematics<br>Biology &amp ICT</div>
					<div class="btn" ng-click="open(3)">Apply</div>
				</section>
			</div>
			<div class="col-md-3 col-sm-6 col-xs-6 col-vs-12">
				<section>
					<div class="header">Business Studies Coching</div>
					<div class="icon"><span class="icon-english"></span></div>
					<div class="class">IX to XII</div>
					<div class="subjects">Accounting<br>Introduction to Business<br>Finance and Banking</div>
					<div class="btn" ng-click="open(4)">Apply</div>
				</section>
			</div>
		</div>
	</main>
@stop