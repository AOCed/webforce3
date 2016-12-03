$(document).ready(function() {

	$('li').hover(function(){
		$(this).children('.menuDeroulant').show(100);
		$(this).children('.menuDeroulant').hover(function(){
			$(this).parent('li').addClass('active');
		})
	}, function (){
		$(this).children('.menuDeroulant').hide(50);
		$(this).removeClass('active');
	});

}); 