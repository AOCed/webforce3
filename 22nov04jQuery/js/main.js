$(document).ready(function(){
/*
	var linkTabs = $('#conteneurTabs').children('a');
	var panelTabs = $('conteneurTabs').children('div');
*/
	// récuperation des objets du Tab
	var linkTabs = $('.onglets');
	var panels = $('.panel');
	// console.log(linkTabs, panels);

	function modifPanel(pThis) {// Paramètre reçu: l'objet link sur lequel on a cliqué

		// On modifie l'index du panel correspondant au clique
		panels.eq(pThis.index()).css({"z-index":3});
		// On modifie l'index des panels frères (siblings) 
		panels.eq(pThis.index()).siblings().css({"z-index":1});
		// on modifie la classe de l'objet cliqué
		pThis.addClass('active');
		// on modifie/supprime la classe des frères de l'objet cliqué 
		pThis.siblings().removeClass('active');
	}
	/* Ajout d'un événement sur les tabs de facon à envoyer
	à la fonction qui controle les panels l'index du lien
	sur lequel on clique (this)*/
	linkTabs.on('click', function(event){
		event.preventDefault(); // Arrêt du comportement par défaut
		// Lancement de la fonction et attribution de la valeur du paramètre
		modifPanel($(this));
	})

	// fonction qui permet de donner la taille la plus grand aux autres panels
	function determinePanelSize() {
		var s = panels.eq(0).height();
		
		for (var i = 0; i < panels.length; i++) {
			if (s<panels.eq(i).height()){
				s = panels.eq(i).height();
			}
		}
		panels.css({'height':s});
	}

	/* fonction qui permet de démarrer avec le premier panel
		et le premier onglet sélectionné */
	function initialiseTabPanel() {
		panels.eq(0).css({"z-index":3});
		linkTabs.eq(0).addClass('active');
		determinePanelSize();
	}

	initialiseTabPanel();
})