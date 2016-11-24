$(document).ready(function(){

	/* Variables globales */
	var tabBigImg = [];
	var tabVignettesImages = [];
	var barre = $('#barre');
	var progressebarre = barre.children();
	var pourcentText = barre.siblings('h2');

	/*********************************************************/
	/*************** Barre de chargement *********************/
	/*********************************************************/

	/* On stocke les images en mémoire */
	function addImgMemory() {
		var nbImg = item.imagesSrc.length;
		var j = 1;
		for (var i = 0; i < nbImg; i++) {

			/* Pour le nombre d'image rencontré dans l'objet Item,
			on crée un nouvel objet javascript de type Image() que
			l'on stocke dans un tableau. */
			tabBigImg.push(new Image());
			/* Attente de l'événement de chargement de l'image avant d'effectuer une action */
			tabBigImg[i].onload = function(){
				/* Calcul de la progression du chargement en pixels pour le transmettre 
				à la fonction qui se charge d'animer la barre */
				 var progress = calculProgression(nbImg, j);

				 animeProgression(progress, nbImg, j);

				 j++;
			}
			// console.log(item.fileRoot+item.imagesSrc[i]);
			tabBigImg[i].src = item.fileRoot+item.imagesSrc[i];
			/* Chargement et stockage des vignettes */
			tabVignettesImages.push(new Image());
			tabVignettesImages[i].src = item.fileRoot+item.imagesSrc[i];
		} 
	};

	/* Fonction qui calcule la valeur d'un pas pour le chargement (de la barre) */
	function calculProgression(pNbItem, pJ){
		/* Récupération de la taille du conteneur de la barre et 
		division de celle ci par le nombre d'image*/
		var num = barre.width() / pNbItem;
		/* Renvoie de la valeur d'une "étape" de progression
		multipliée par le nombre d'images déjà chargées */
		return num*pJ;
	};

	/* Fonction qui calcule la valeur d'un pourcentage (de la barre) */
	function calculPourcentage(pNbItem, pJ){
		var pourcent = 100/pNbItem;
		return pourcent*pJ;
	}

	/* Fonction lancé dès que levent load est passé dans les images */
	function animeProgression(pProgress, pNbImg, pJ) {
		/* Animation de la chaine de caractère */
		pourcentText.animate({
			"left": pProgress
		}, 100);
		/* Animation de la barre de progression */
		progressebarre.animate({
			"width": pProgress
		}, 100, function(){

			var p = calculPourcentage(pNbImg, pJ);
			/* Mise à j our de la chaine de caractère
			dans la fonction call-back de l'animation. */
			pourcentText.text(p+"%");
			/* Test pour savoir si on est à la fin du chargement 
			et si c'est le cas, on fait disparaitre la barre 
			et apparaitre les vignettes. */
			if (pJ === pNbImg) {
				 disparitionBarre();
				 apparitionConteneurVig();
			}
		});
	};

	/* Fonction d'animation de la disparition de la barre du chargement */
	function disparitionBarre(){
		/* On récupère le conteneur global de la barre du chargement et
		demande son parent le plus proche, qui est #conteneurBarre. */
		barre.parent().delay(0).animate({ /* delay: le temps d'attente 
			avant l'exeution de la fonction, equivalent à setTimeout en javascript */
			"opacity":0
		}, 100, function(){
			/* On fait disparaitre l'affichage du conteneur de la barre */
			barre.parent().css({'display':'none'});
		});
	}

	/*********************************************************/
	/*************** Création des vignettes ******************/
	/*********************************************************/
	var conteneurVignettes = $('#galerie');
	var pellicule = $('#pellicule');
	var vignettes;

	/* Fonction qui va servir à injecter toutes les images
	Attention: celles ci sont déjà créées dans tabVignettesImages */
	function injectionVig(){
		var sizeOfPellicule = 0;
		/* Premier boucle pour envoyer les images dans pellicule */
		for (var i = 0; i < tabVignettesImages.length; i++) {
			pellicule.append(tabVignettesImages[i]);
		}
		/* Deuxieme boucle pour calculer la longueur de pellicule */
		for (var i = 0; i < tabVignettesImages.length; i++) {
			sizeOfPellicule += pellicule.children().eq(i).innerWidth();
		}
		/* Attribution de la nouvelle longueur à pellicule */
		pellicule.css({'width':sizeOfPellicule});
		// console.log(sizeOfPellicule);

		if (sizeOfPellicule < conteneurVignettes.width()) {
			var posLeft = (conteneurVignettes.width()-sizeOfPellicule)/2
			pellicule.css({'left':posLeft});
		}
		/* Récupération ICI des vignettes image car elle avant le lancement
		de la fonction et de sa boucle les vignettes ne sont pas encore
		présente dans leur conteneur parent */
		vignettes = pellicule.children();
		vignettes.on('click', function(){
			openClosePopupMask($(this).index());
		})
	}

	function apparitionConteneurVig(){
		conteneurVignettes.delay(000).animate({
			'opacity':1,
			'bottom':50
		},100);
		injectionVig();
	}

/***********************************************************************/
/********************* Manipulation des Popup **************************/
/***********************************************************************/
	var mask = $('#mask');
	var popup = $('#popup');
	var closeBtn = popup.children('a:eq(0)');
	/* la method .not fonctionne comme la pseudo-class: not() in CSS.
	Elle permet d'exclure un item d'une sélection. */
	var prevNextBtn = $('#prevBtn, #nextBtn');


	/* Booleen qui sert à savoir si le mask et le popup sont ouvert ou non:
	false = invisible, true = visible */
	var openClose = false;
	/* Variable qui va servir à stocker l'index courant de l'image située dans le popup.
	Chaque fois que l'on clique sur une image vignette on stocke son index. */
	var currentIndexOfVig = 0;

	function openClosePopupMask(pIndex){
		if(!openClose){
			/* Ouverture avec image */
			addImagePopup(pIndex);
			/* Change display et opacité */
			popup.css({"display":'block'}).delay(100).animate({'opacity':1},400);
			mask.css({"display":'block'}).animate({'opacity':1},200);
			openClose = true; // mise à jour de la booleen
		} else {
			mask.delay(100).animate({'opacity':0}, 200, function(){
				mask.css({'display':'none'});
				popup.animate({'opacity':0}, 200, function(){
					popup.css({'display':'none'})
				});
			})
			openClose = false;
		}
	}

	/* Rappel de cette meme fonction (openClosePopupMask) en mettant en écouteur
	d'événement sur le masque et le BtnClose */
	mask.on('click', function(event){
		event.preventDefault();
		openClosePopupMask();
	});
	closeBtn.on('click', function(){
		openClosePopupMask();
	});
	/* Rappel de cette meme fonction mais avec un écouteur d'événement keyUp
	sur le document ou tout autre composant */
	$(document).keyup(function(event){
		if(openClose) {
			if (event.keyCode === 27) {
				openClosePopupMask();
			} else if (event.keyCode === 39 && currentIndexOfVig < tabBigImg.length-1){
				currentIndexOfVig++;
				addImagePopup(currentIndexOfVig);
			} else if (event.keyCode === 37 && currentIndexOfVig > 0) {
				currentIndexOfVig--;
				addImagePopup(currentIndexOfVig);
			}
		}
	});

	/* Fonction qu i va permettre de naviguer dans les images et les affichers dans le popup
	grace à l'index de li'mage cliquée */
	function addImagePopup(pIndex){
		currentIndexOfVig = pIndex;
		popup.children('div').children('img').remove(); // On supprime l'ancienne image 
		popup.children('div').append(tabBigImg[currentIndexOfVig]);

		// console.log(tabBigImg[currentIndexOfVig]);
	}

	/* Ecouteur d'événement permettant de changer d'image dans le Popup */
	prevNextBtn.on('click', function(){
		event.preventDefault();
		if (prevNextBtn.index(this) === 0 && currentIndexOfVig>0){
			currentIndexOfVig--;
			addImagePopup(currentIndexOfVig);
		} else if(prevNextBtn.index(this) === 1 && currentIndexOfVig < tabBigImg.length-1) {
			currentIndexOfVig++;
			addImagePopup(currentIndexOfVig);
		} else if (prevNextBtn.index(this) === 0) {
			currentIndexOfVig = tabBigImg.length-1;
			addImagePopup(currentIndexOfVig);	
		} else {
			currentIndexOfVig = 0;
			addImagePopup(currentIndexOfVig);				
		}

	});

	/* Fonction qui initialise tous les autres fonctions */
	function init() {
		addImgMemory();

		/* positionnement du conteneur de vignettes en dessous de la fenetre */
		conteneurVignettes.css({'bottom':-(conteneurVignettes.height()+50)});
	}
	init();
})
