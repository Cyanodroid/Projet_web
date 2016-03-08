$(document).ready(function(){
	$('body').append('<p class="pull-right"><a href="#">Haut</a></p>');

	$('.pull-right').css({
		'position'				:	'fixed',
		'right'					:	'20px',
		'bottom'				:	'50px',
		'display'				:	'none',
		'padding'				:	'20px',
		'background'			:	'#222',
		'opacity'				:	'0.9',
		'z-index'				:	'2000'
	});

	$(window).scroll(function(){
		posScroll = $(document).scrollTop();
		if(posScroll >=600) 
			$('.pull-right').fadeIn(600);
		else
			$('.pull-right').fadeOut(600);
	});
});

$(function() {
	$('.ajax').click(function() {
		$('.indicator-busy').fadeIn();

		$.get($(this).attr('href'), {}, function(data) {
			$('#content').empty().append(data);
			$('.indicator-busy').fadeIn();
		})
	});
});

$('.slider').slick({
      dots: true,
      autoplay: true,
      autoplaySpeed: 8000,
      mobileFirst: true,
});