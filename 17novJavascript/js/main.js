// 1. lancer une commande javascript pour attendre le chargement

window.onload = function() {

/* 2. première étape : je dois faire en sorte qu'un panel soit activé 
par un onglet. donc je recupère les composants HTML des onglets
(les "a") et les panels ("div") 
(utilisation de tableau pour le stockage des elements: donc boucle)
*/

	var ongletsTab = []; // element global au script car déclaré en dehors de tout fonctio
	var panelsTab = [];

	function fabriqueTab() {
		var onglets = document.getElementById('conteneurTabs').getElementsByTagName('a');
		//htmlCollection construit par la methode getElementsbyTagName('nom du balise')
		var panels = document.getElementById('conteneurTabs').getElementsByTagName('div');
		//htmlCollection construit par la methode getElementsbyClassName('nom du class')

		for (var i = 0; i < onglets.length; i++) {
			ongletsTab.push(onglets[i]); // la methode Push permet de ranger une donnée à la fin
			panelsTab.push(panels[i]);
		}

	} 

	/* Cette fonction permet de récupérer la hauteur du plus granrd panel
	pour la donner ensuite aux autres */
	function changeTaillePanel() {
		/* Initialisation d'une variable contenant la hauteur d'un panel */
		var panelTaille = panelsTab[0].offsetHeight;

		for (var i = 0; i < panelsTab.length; i++) {
			/* Si panelTaille est inférieure à la taille du panel correspondant 
			à l'index i ... */
			if (panelTaille < panelsTab[i].offsetHeight) {
				panelTaille = panelsTab[i].offsetHeight;
				console.log(panelTaille, panelsTab[i].offsetHeight);
			}

		}
		/* Création d'une boucle qui va permettre d'appliquer cette valeur a tous les panels */
		for (var i = 0; i < panelsTab.length; i++) {
			panelsTab[i].style.height = panelTaille+'px';
		}
	}




/* 
Créer une fonction ( modifCalquePanel() ) qui va permettre de changer le z-index des panels
de facon à ce que celui qui correspond à l'index de l'onglet sur lequel
l'utilisateur soit mis devant les autres. 
(déterminer les indexs de chaque composants)
(utilisation de la propriété "style" pour modifier le css.)
le stockage des elements dans des tableaux (array)  permet accès 
à la  methode 'indexof' qui va permettre de connaitre l'index de placement
de mon objet transmis en 'this' lors du lancement de ma fonction
par l'écouteur d'evenement et donc de modifier l'objet correspondant
au meme index dans le tableau des panel.
cette fonction a besoin d'un paramètre 'this'
*/



	function modifCalquePanel(pIndex) {
		/* pIndex etant la veleur envoyée au moment où on lance la fonction
		(une représentation symbolique de la valeur) */

		for (var i = 0; i < panelsTab.length; i++) {
			if (i !== pIndex) {
				/* Test conditionnel permettant de définir quel est le panel qui doit 
				être actif on profite de cette condition pour mettre la classe active
				sur l'onglet cliqué et pour le retirer aux autres onglets  */
				ongletsTab[i].classList.remove('active');
				panelsTab[i].style.zIndex = 1;
				// panelsTab[i].style.display = 'none';
			} else {
				ongletsTab[i].classList.add('active');
				panelsTab[i].style.zIndex = 3;
				// panelsTab[i].style.display = 'block';
			}
		}
	}

/* 
Placer un ecouteur d'evenement sur les onglets afin que l'utilisasteur
puisse cliquer et activer les panels. 
(utilisation de addEventListener, donc possibilité de bloquer l'action 
naturelle du lien et possibilité d'utiliser 'this' pour déterminer
l'onglet sur lequel l'utilisateur clique. )
l'ecouteur lance la fonction ( modifCalquePanel() ) de changement du css des panels.
l'ecouteur va donner 'this' en paramètre.
*/


	function ajouteEvenement() {
		/* pour mettre un evenemtn sur chaque objet, on passe par boucle */
		for (var i = 0; i < ongletsTab.length; i++) {
			ongletsTab[i].addEventListener('click', function(event){
				/* "Event" est un objet fourni par la methode addeventlistner 
				   lors du clique (ou tout autre type d'event tel que 
				   'mousedown', 'mouseup', 'mouseenter', 'mouseleave', 'mousemouve'...),
				   on va ici se servir de cette "event" pour stopper l'action fourni
				   par défaut d'un lien de type 'a'. */
			event.preventDefault();

			/* On recupère l'index de position dans le tableau OngletsTab de l'élément 
			sur lequel on clique. */
			var ongletsCourantIndex = ongletsTab.indexOf(this);
			modifCalquePanel(ongletsCourantIndex);
			});
		}
	}

/*
Créer une fonction d'initialisation.
*/
	function init() {
		fabriqueTab();
		ajouteEvenement();
		changeTaillePanel();
		ongletsTab[0].classList.add('active');
		panelsTab[0].style.zIndex = 3;
	}
		

	/*Mon Code 
		var ongletTab = document.getElementsByClassName('onglets');
		var panelTab = document.getElementsByClassName('panel');
		console.log(ongletTab);
		// console.log(panelTab);
	
		for (var i = 0; i < ongletTab.length; i++) {
			ongletTab[i];
			// console.log(ongletTab[i]);
		}

		for (var i = 0; i < panelTab.length; i++) {
			panelTab[i];
			// console.log(panelTab[i]);
		}

		function modifCalquePanel() {

		}*/

	init();

}