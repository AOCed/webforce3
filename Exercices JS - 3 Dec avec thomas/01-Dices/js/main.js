$(document).ready(function() {
	function randomNumber(min, max) {
		// Cette fonction permet de générer un nombre aléatoire compris entre min (inclus) et max (inclus)
		random = (min + Math.floor(Math.random() * max));

		return random;
	}



	// Au moment où l'utilisateur envoie le formulaire...
	$('form').submit(function(event) {
		event.preventDefault();

		// Récuperer les données rentrés par les utilisateurs
		var numberDices = $('#nbDices').val();
		var numberFaces = $('#nbFaces').val();
		var randomResult;

		// Si on a bien 1dé et qu'il fait au moins 2 faces, on poursuit notre petit programme. Si un ptit malin a mis
		// des lettres ou un nombre négatif, qu'il aille se faire voir! 

		if (numberDices >= 1 && numberFaces >=2 ) {

			var randomTotal = 0;
			var message = 'Vous jetez '+ numberDices + ' dès à ' + numberFaces + '<br>' + 'Resultat: ';

			if (numberDices >1) {
				message += ' (';
			}

			for (var i = 0; i < numberDices; i++) {	
				randomResult = randomNumber(1,numberFaces);

				console.log(randomResult);
				randomTotal += randomResult;

				if (numberDices > 1){
					message += randomResult;
					
					if (i < numberDices-1) {

						message += ', ';
					}
				
				}

			}

			if (numberDices > 1) {
				message += ') =';
			}


			message += randomTotal;


			$('section').html(message).fadeIn().css({display:"inline-block"});
			
		} else {
			alert('rentrez un dès supérieur à 0, faces supérieres à 2');
		}


	});


});