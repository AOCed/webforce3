$(document).ready(function(){

	function isEmailValid(mail){
		var pattern = new RegExp(/[^\s]+@[^\s]+\.[^\s.]+/)
		return pattern.test(mail);
	}


	$('form').submit(function(event){

		event.preventDefault();

		var civilite = $('[name="civilite"]:checked').val();




		// Vérifier le champs de civilité 
		if (civilite === undefined) {
			$('#civiliteError').text('Vous devez sélectionner votre civilité');;
		} 

		// Vérifier le champs de nom
		if ($('[name = "userNom"]').val().length < 2) {
			$('#nomError').text('Un nom ne peut pas faire moins de 2 caractères.');
		}

		if ($('[name="userPrenom"]').val().length < 2) {
			$('#prenomError').text('Un prénom ne peut pas faire moins de 2 caractères.');
		}

		if ($('[name = "userAge"]').val() <= 5 || $('[name = "userAge"]').val() >= 140) {
			$('#ageError').text('L\'âge doit être compris entre 5 et 140.');
		}

		if ($('[name = "userPays"]').val().length === 0) {
			$('#paysError').text('Vous devez sélectionner votre pays de résidence');
		}

		if( isEmailValid($('[name = "userEmail"]').val() )){
		
		}

	});

});