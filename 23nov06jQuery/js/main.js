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
		}, 300);
		/* Animation de la barre de progression */
		progressebarre.animate({
			"width": pProgress
		}, 300, function(){

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
		barre.parent().delay(200).animate({ /* delay: le temps d'attente 
			avant l'exeution de la fonction, equivalent à setTimeout en javascript */
			"opacity":0
		}, 300, function(){
			/* On fait disparaitre l'affichage du conteneur de la barre */
			barre.parent().css({'display':'none'});
		});
	}

	/*********************************************************/
	/*************** Création des vignettes ******************/
	/*********************************************************/
	var conteneurVignettes = $('#galerie');
	var pellicule = conteneurVignettes.children();
	/* Fonction de redimentionnement du conteneur pellicule,
	utilisation de la taille d'une vignette multipliée 
	par le nombre de vignettes */
/*	function resizePellicule(){
		var sizeWidth =
	}*/

	/* Fonction qui va servir à injecter toutes les images
	Attention: celles ci sont déjà créées dans tabVignettesImages */
	function injectionVig(){
		for (var i = 0; i < tabVignettesImages.length; i++) {
			pellicule.append(tabVignettesImages[i]);
		}
	}



	function apparitionConteneurVig(){
		conteneurVignettes.delay(300).animate({
			'opacity':1,
			'bottom':50
		},300);
		injectionVig();
	}



	/* Fonction qui initialise tous les autres fonctions */
	function init() {
		addImgMemory();
		/* positionnement du conteneur de vignettes en dessous de la fenetre */
		conteneurVignettes.css({'bottom':-(conteneurVignettes.height()+50)});
	}
	init();
})
