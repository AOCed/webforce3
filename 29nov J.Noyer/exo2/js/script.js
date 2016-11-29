$(document).ready(function(){

	// Vider les message d'erreur au focus des inputs 
	$('input, select').focus(function(){
		$(this).prev().text(''); 
	});

	// Fermer le popIn
	$('section').click(function(){
		$(this).fadeOut();
	})


	/* Validation d'un formulaire en Javascript 
		1. Capter le submit du formulaire en bloquant le comportement par défaut
		2. Vérifier que les champs (Input, textarea, select,...) font au minimum 5 caractères
		3. Indiquer s'il y a des erreurs 
		4. Si les champs sont correctement renseignés, valider le formulaire
	*/ 

	$('form').submit(function(){
		// Définir une variable pour valider le formulaire 
		var formScore = 0;

		// Bloquer le comportemenet par défaut du formulaire
		event.preventDefault();

		// Vérifier le fullname = minimum 5 caractères	
		if ( $('[name="fullName"]').val().length < 5) {
			// Afficher le message d'erreur
			$('[name="fullName"]').prev().text('Minimum 5 caractères pour votre nom complet');

		} else {
			console.log('champ ok');
			formScore++;
		}

		// Vérifier le fullname = minimum 5 caractères	
		if ( $('[name="userEmail"]').val().length < 5) {
			// Afficher le message d'erreur
			$('[name="userEmail"]').prev().text('Minimum 5 caractères pour votre nom complet');

		} else {
			console.log('champ ok');
			formScore++;
		}

		// Vérifier la valeur de la balise Select
		if( $('select').val().length === 0 ){
			$('select').prev().text('Veuillez indiquer votre genre');
		} else {
			console.log('select ok')
			formScore++;
		}

		// Vérifier la variable formScore
		if (formScore === 3) {

			$('article').html(''+
				'<p>Merci d\'avoir rempli le formulaire!</p>'+
				'<p>Fullname ='+$('[name="fullName"]').val()+'</p>'+
				'<p>Email='+$('[name="userEmail"]').val()+'</p>'+
				'<p>Gender='+$('select').val()+'</p>'+
				'<p>Message='+$('textarea')+'</p>');
			$('section').fadeIn();
		}

	});


});