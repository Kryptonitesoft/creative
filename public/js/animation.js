$(document).ready(function(){
	$(window).scroll(function(event){
		var y = $(this).scrollTop();
		
		if(y<=100) {
			$("body").removeClass("scroll");
			$("nav[role=primary]").removeClass("scroll");
		}

		if(y>=100) {
			$("body").addClass("scroll");
			$("nav[role=primary]").addClass("scroll");
		}

		if(window.innerWidth < 1200) {
			$(".img").removeClass("scroll");
			$(".features section").removeClass("scroll");
			$(".teaching-process img").removeClass("scroll");
			$(".teaching-process h2").addClass("rotateX");
			$(".teaching-process p").addClass("rotateX");
			$(".teaching-process li").addClass("rotateX");
			return;
		}

		if(y>=100) $(".whatis").addClass("animated zoomIn");
		if(y>=150) $(".teachers figure").addClass("animated zoomIn");
		if(y>=300) $(".features h2").addClass("animated zoomIn");

		if(y>=500) {
			$(".img").removeClass("scroll");
			$(".features section").removeClass("scroll");
		}

		if(y>=1000) $(".teaching-process h2").addClass("rotateX");
		if(y>=1100) $(".teaching-process p").addClass("rotateX");
		if(y>=1150) $(".teaching-process li").addClass("rotateX");
		if(y>=1150) $(".teaching-process img").removeClass("scroll");
		if(y>=1200) $(".teaching-process .btn").addClass("animated zoomIn");

		if(y>=1500) $(".social a").addClass("animated zoomIn");

		if(y>=1000) $(".packages section").addClass("animated zoomIn");
	});
});
