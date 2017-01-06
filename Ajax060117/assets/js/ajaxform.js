$(function(){
	// Je veux passer mon formulaire de newsletter en Ajax
	// Je prends le controle sur le bouton SUBMIT et désactive le fonctionnenment par défaut
	// Je vais récupérer les données reçus par le formulaire (email)
	// Et je les envoie par Ajax et récupère le message du retour dans la balise div.retour
	$("form.ajax").on("submit", function(event){
		// Ce code sera activé quand le formualire sera envoyé
		// Bloquer le fonctionnement par défaut du submit
		event.preventDefault();
		// Je récupère l'email
		// var email = $("form.newsletter input[name=email]").val();
		// Je construis la main de la requête GET à envoyer
		// var requeteGet = "libs/services.php?action=addNewsletter&email=" + email;
		// $(".retour").load(requeteGet)

		// Serialize envoie la requete en ajax
		var parametresGet = $(this).serialize();
		var requeteGet = "libs/services.php";
		// J'envoie la requete en ajax
		$(".retour").load(requeteGet, parametresGet);
	})
});