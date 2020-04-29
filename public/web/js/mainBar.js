$(document).ready(function(){
	var altura=$('.menu').offset().top;

	$(window).on('scroll', function(){
		if ($(window).scrollTop() > altura) {
			$('.menu').addClass('navbar-fixed-top');
		}else{
			$('.menu').removeClass('navbar-fixed-top');
		}
	});
});
