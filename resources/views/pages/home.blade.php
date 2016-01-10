@extends("master")

@section("content")
	<main>
		<div class="cycle-slideshow visible-lg" data-cycle-slides=".slide" data-cycle-timeout="5000">
			<div class="cycle-prev"><span class="icon-left-circle"></span></div> 
			<div class="cycle-next"><span class="icon-right-circle"></span></div>

		    <div class="slide">
		    	<img src="img/s1.jpg" alt="">
		    	<div class="transparent">
		    		<h3>Creative Coaching<br>A Digital Coaching</h3>
		    		<a class="btn animated zoomIn" href="about#packages">Get Admission</a>
		    	</div>
		    </div>
		    <div class="slide">
		    	<img src="img/s2.jpg" alt="">
		    	<div class="transparent">
		    		<h3>We provide digital education</h3>
		    		<a class="btn animated zoomIn" href="about#packages">Get Admission</a>
		    	</div>
		    </div>
		    <div class="slide">
		    	<img src="img/s3.jpg" alt="">
		    	<div class="transparent">
		    		<h3>We teach with proper care</h3>
		    		<a class="btn animated zoomIn" href="about#packages">Get Admission</a>
		    	</div>
		    </div>
		    <div class="slide">
		    	<img src="img/s4.jpg" alt="">
		    	<div class="transparent">
		    		<h3>Our honorable director</h3>
		    		<a class="btn animated zoomIn" href="about">Learn More</a>
		    	</div>
		    </div>
		    <div class="slide">
		    	<img src="img/s5.jpg" alt="">
		    	<div class="transparent">
		    		<h3>The teachers of Creatvie Coaching</h3>
		    		<a class="btn animated zoomIn" href="about">Learn More</a>
		    	</div>
		    </div>
		</div>

		<div class="container">
			<section class="whatis text-center">
				<h2>What is Creative Coaching?</h2>
				<p>Creative Coaching is a coaching for the students willing to participate in the Rajuk Uttara Model School admission test. We also provide academic coaching for the students of class V to IX, science coaching for the students of class IX to XII and business studies coaching for the students of class IX to XII</p>
			</section>
		</div>

		<div class="container">
			<section class="features">
				<div class="row">
					<div class="col-lg-6 col-md-4 hidden-sm hidden-xs">	
						<div class="img scroll">
							<img class="img1 img-responsive" src="img/219.png">
							<img class="img2 img-responsive" src="img/219.png">
						</div>
					</div>
					<div class="col-lg-6 col-md-8 col-sm-12 text">
						<h2>Features <span style="color: #7CC576">&amp</span><br>Why student love us?</h2>
						<div class="row">
							<section class="col-lg-12 col-md-6 col-sm-6 scroll">
								<div class="icon icon-physics"></div>
								<h4>Digital Education</h4>
								<p>We teach our students with projector</p>
							</section>
							<section class="col-lg-12 col-md-6 col-sm-6 scroll">
								<div class="icon icon-chemistry"></div>
								<h4>Special Care</h4>
								<p>We took care of each students properly</p>
							</section>
							<section class="col-lg-12 col-md-6 col-sm-6 scroll">
								<div class="icon icon-biology"></div>
								<h4>Study Material</h4>
								<p>We provide every kinds of study materials</p>
							</section>
							<section class="col-lg-12 col-md-6 col-sm-6 scroll">
								<div class="icon icon-mathematics"></div>
								<h4>Model Test</h4>
								<p>We take model test every week</p>
							</section>
						</div>
					</div>
				</div>
			</section>
		</div>

		<div class="container-fluid">
			<section class="teaching-process">
				<div class="row">
					<div class="left col-lg-9">
						<div class="cont">
							<h2>Our teaching process</h2>
							<p>We have qualified teachers who takes care every student personaly with proper care and exta time and extra care to the weak students.</p>
							<ul>
								<li><span class="icon-tick-circle"></span> Special Care for Every Students</li>
								<li><span class="icon-tick-circle"></span> Regular Model Test</li>
								<li><span class="icon-tick-circle"></span> Regular Consulting with Parents</li>
							</ul>
							<a href="/about" class="btn">Learn More</a>
						</div>
						<!--<div class="darkbg"></div>-->
					</div>
					<div class="right col-lg-3 visible-lg">
						<img src="img/classroom.png" class="img-responsive scroll">
					</div>
				</div>
			</section>
		</div>
	</main>
@stop

@section("script")
	<script>
		var isChrome = /Chrome/.test(navigator.userAgent) && /Google Inc/.test(navigator.vendor);
		var isSafari = /Safari/.test(navigator.userAgent) && /Apple Computer/.test(navigator.vendor);
    	if(isChrome || isSafari){
			$(".cycle-slideshow img").css({
				"height": window.innerHeight - 100 + "px",
				"width" : window.innerWidth - 5 + "px"
			});
			$(".cycle-slideshow .transparent").css({
				"height": window.innerHeight - 100 + "px"
			});
    	} else {
			$(".cycle-slideshow img").css({
				"height": window.innerHeight - 100 + "px",
				"width" : window.innerWidth - 17 + "px"
			});
			$(".cycle-slideshow .transparent").css({
				"height": window.innerHeight - 100 + "px"
			});
    	}
	</script>
@stop