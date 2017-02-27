/* <Résumé d'action>
	Lors du clique sur l'un des titres des panels: Identifier si le panel correspondant
	au titre est ouvert, si oui, le fermer pas d'autre action.
	Sinon ouvrir le panel et fermer tout autre panel qui pourrait être. */

/* Etape I 
	1. Lancer une commande javascript pour attendre le chargement
		4-1. Créer un tableau global dans lequel on met autant d'info 'false 
			 qu'il a de panel  */

/* Etape II 
	4-1. Déclarer de tableaux globaux qui vont contenir les objets HTML
		de facon à pouvoir utiliser indexOf(objet).
	4-3. Créer d'une fonction qui va peupler ces tableaux grace à une boucle
		 sur le nombre d'élément à récupérer. */

/* Etape III 
	3. Pour deployer les panels, on va avoir besoin d'ecouteur d'événement
 	  appliqué sur l'élément déclencheur (le titre du panel: onglet) 
		3-1. Uiliser une boucle (for) pour appliquer "addEventListner"; type click
		3-2. Stopper le comportement par défaut du lien addEventListner
		3-3. Lancer une fonction qui va modifier les panels  */

/* Etape Iv 
	4. Pour modifier les panels, commencer par créer une fonction qui va être placée 
	  dans addEventListner et qui a pour paramètre l'index de 'this'. (Afin de travailler 
	  avec l'index de 'this' qui doit correspondre à un panel à ce même index 
	  et une valeur dans le tableau(4.1 - false)*)
		4-2. Dans cette fonction, on teste, si le panel courant est ouvert grace au tableau
			 (4-1. - falses)* déclaré au début du script. 
		4-4. Une fois le teste exécuté, déployer ou fermer les ou le panel en jouant sur 
			 sa propriété height. */

window.onload = function() {

	var falseTab = [];
	var ongletsTab = []; 
	var panelsTab = [];


	function fabriqueTab() {
		var onglets = document.getElementById('conteneurTabs').getElementsByTagName('a');
		var panels = document.getElementById('conteneurTabs').getElementsByTagName('div');

		for (var i = 0; i < onglets.length; i++) {
			ongletsTab.push(onglets[i]);
			panelsTab.push(panels[i]);
			falseTab.push(false);
		}

	}

	function ajouteEvent() {
		for (var i = 0; i < ongletsTab.length; i++) {
			ongletsTab[i].addEventListener('click', function(event) {
				event.preventDefault();

				var ongletsCourantIndex = ongletsTab.indexOf(this);
				ouvertPanel(ongletsCourantIndex);
			});
		}
	}

	function ouvertPanel(pIndex) {
		for (var i = 0; i < panelsTab.length; i++) {
			if(i !== pIndex){
				panelsTab[i].style.height = 0+"px";
				falseTab[i] = false;
			}		
		}

		if(falseTab[pIndex]===false){
			panelsTab[pIndex].style.height = 'auto';
			falseTab[pIndex] = true;
		}else{
			panelsTab[pIndex].style.height = 0+"px";
			falseTab[pIndex] = false;
		}
	}

	fabriqueTab();
	ajouteEvent();
}
