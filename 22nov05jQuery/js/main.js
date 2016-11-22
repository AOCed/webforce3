$(document).ready(function(){
	/* Récupération des objets Page et Menu et ensuite
	récupération de la hauteur de l'écran */
	var pages = $('.page');
	var btnLink = $('#menu a, #conteneurPuces a');
	var sizeWin = $(window).innerHeight();

	/* Fonction qui va permettre de donner une taille minimal en hauteur */

	function resizeHeightPage() {
		var newSizeH = sizeWin-recalculPadding(pages);
		console.log(newSizeH);
		pages.css({"min-height":sizeWin});
	}

	/* Fonction qui va servir à déterminer la taille de padding
	afin de la soustraire à la valeur de Height de la page. */
	function recalculPadding(pPage) {
		/* Récupération de la valeur (obj.css(propriété)) en chaine de caractère,
		ensuite extraction du chiffre (replace pour éliminer les px par vide)
		et puis conversion de celui-ci en number (utilisation de parseInt) */
		var paddingTopPage = parseInt(pPage.css('padding-top').replace('px',''));
		var paddingBottomPage = parseInt(pPage.css('padding-bottom').replace('px',''));
		return paddingTopPage+paddingBottomPage;
	}


	/* Modification du scroll du document en récupérant la position Top
	des ancres formées par le HREF des liens */
	btnLink.on('click', function(){
		var ancre = $(this).attr('href');
		var topPage = $(ancre).offset().top;
		$('html,body').animate({
			scrollTop:topPage
		}, 1500);
	});

	resizeHeightPage();

});