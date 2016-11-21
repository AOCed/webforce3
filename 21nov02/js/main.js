$(document).ready(function(){

	// Tableau construit pour avoir le src des vignettes (pas de changement entre js et jq)
	var imgFiles = ['1.jpg', '2.jpg','3.jpg','4.jpg','5.jpg','6.jpg', '7.jpg', '8.jpg','9.jpg','10.jpg'];
	var dir = "img/galerie/vignettes/";
	var inc = 0;
	var vignettes;

	// recuperation des elemnts du Dom et assigner à un nouveau variable
	var conteneurVignettes = $('#galerie');
	var openGalerie = $('#openGalerie'); 

	function creationVignettes() {	
		if (conteneurVignettes.children().length === 0) {
			for (var i = 0; i < imgFiles.length; i++) {
				var div = $('<div/>');
				var im = $('<img src="'+dir+imgFiles[i]+'">');
				div.append(im);
				conteneurVignettes.append(div);
			}
			// Récupération des vignettes dans le conteneur
			vignettes = conteneurVignettes.children('div');
			animeVignette();

	///// mettre un ecouteur d'événement sur les vignettes
	//// pour lancer une fonction de modification de chaine de caractère
	//// pour obtenir un src
			vignettes.on('click', function(){
				addSrcPopup($(this).children().attr('src'));
				animeOnMaskPopup();
			});
		}
	}

	// Fonction recursive --> qui se rappelle elle même. 
	// Pour animer l'opacité des vignettes
	function animeVignette() {
		alert()
		// Récuperation des vignettes dans le conteneur

		// vig.animate(dataCss:obligatoire, timer:optionnel, easing:optionnel, callback:optionnel)
		vignettes.eq(inc).animate({
			'opacity':1
		}, 400, function(){
			if (inc < vignettes.length) {
				inc++;
				animeVignette();
			}
		});
	};

	openGalerie.on('click', function(){
		creationVignettes();
	});

	/*	
	openGalerie.click(function(){
			creationVignettes();
	});
	*/

	/////////// code pour le popup

	var popup = $('#popup');
	var mask = $('#mask');
	var closeBtn = popup.children('a');

	/* fonction permettant de modifier la chaine de caractère
	  extraite du src de la vignette */
	function modifVig(pSrc) {
		/* La methode "replace" sert à remplacer un bout de chaine
			par un autre. */
		return pSrc.replace('vignettes2/','');
	};

	/* Fonction qui va permettre d'actualiser le src de l'image du popup */
	function addSrcPopup(pSrc) {
		var nouvelleSrc = modifVig(pSrc);
		popup.find('img').attr('src', nouvelleSrc);
	};

	/* Fonction d'ouverture du mask et du popup lors du clique sur une vignette*/
	function animeOnMaskPopup() {
		popup.css({'display':'block'}).delay(300).animate({'opacity':1},500);
		mask.css({'display':'block'}).animate({'opacity':1},500);

	};

	/*Fonction de fermeture du mask et du popup lors du clique sur le closesBtn du popup*/
	function animeOffMaskPopup() {
		popup.animate({"opacity":0}, 400, function(){
			popup.css({'display':"none"});
			mask.animate({'opacity':1},500, function (){
				mask.css({"display":"none"});
			});
		})
		mask.css({'display':'block'}).animate({'opacity':1},500);

	};

	mask.on('click', function(){
		animeOffMaskPopup();
	});
	closeBtn.on('click', function(){
		animeOffMaskPopup();
	})

})