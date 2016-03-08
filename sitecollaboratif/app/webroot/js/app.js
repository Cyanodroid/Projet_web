$(document).ready(function(){
	// $('body').append('<p class="pull-right"><a href="#">Haut</a></p>');
	$('body').append('<a href="#" class="to-the-top"><i class="fa fa-arrow-up"></i></a>');

	$('.to-the-top').css({
		'position'				:	'fixed',
		'right'					:	'0',
		'bottom'				:	'0',
		'display'				:	'none',
		'padding'				:	'13px',
		'background'			:	'#222',
		'opacity'				:	'0.9',
		'color'                 :   '#fff',
		'z-index'				:	'2000'
	});

	$(window).scroll(function(){
		posScroll = $(document).scrollTop();
		if(posScroll >=600) 
			$('.to-the-top').fadeIn(600);
		else
			$('.to-the-top').fadeOut(600);
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
