$(document).ready(function(){


	$('form').submit(function(){

		// Bloquer le comportemenet par défaut du formulaire
		event.preventDefault();
		var formScore = 0;

		if ($('[name="listeChat"]').val().length === 0){
			$('select').next().addClass('errorListe').text('Choisissez votre chat.');
		} else {
			formScore++;
		}
		// Vérifier si les caractères saisis sont minimum 15
		if ($('[name="raison"]').val().length < 15){
			$('textarea').next().addClass('error').text('Raison d\'adoption minimum 15 caractères');
		} else {
			formScore++;
		}

		// Envoyer le message de merci lorsque les champs sont bien saisis
		if (formScore === 2) {
			$('select, textarea, label, [type="submit"]').fadeOut();
			$('fieldset').fadeIn().addClass('valid').text('Merci d\'avoir rempli le formulaire!');
		}	

	});

});