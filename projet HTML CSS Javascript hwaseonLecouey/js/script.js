$(document).ready(function(){


	$('form').submit(function(){

		// Bloquer le comportemenet par défaut du formulaire
		event.preventDefault();
		var formScore = 0;

		// Vérifier si les caractères saisis sont minimum 15
		if ($('[name="raison"]').val().length < 15){
			$('textarea').addClass('error');
		} else {
			formScore++;
		}

		// Envoyer le message de merci lorsque les champs sont bien saisis
		if (formScore === 1) {
			alert('Merci d\'avoir rempli le formulaire!');
		}	

	});

});