$(document).ready(function() {
	var questions = [	
		'Combien font 259 + 63 ?',
		'Combien font 15 * 3 ?',
		'Combien font 50 / 2 ?',
		'Combien font 99 - 11 ?',
		'Combien font 200 * (3 + 6 ) ?',
		'Combien font 55 + 6 / 2 ?',
		'Combien font (24 - (5 + 12)) * 7 ?',
		'24 est-il un multiple de 5 ?',
		'(11 * 5) est-il supérieur à (600 * 12) ?',
		'Dans x * 7 = 42, combien vaut x ?'
	];

	var reponses = [
		322,
		45,
		25,
		88,
		1800,
		58,
		49,
		'non',
		'oui',
		6
	];

	var errors = []; // On initialise le tableau qui va tracker les erreurs à chaque question

	// Pour tricher dans la console...
	for (var i = 0 ; i < reponses.length ; i++) {
		console.log('Réponse ' + (i + 1) + ' : ' + reponses[i]);
	}

	// On veut pouvoir suivre le score de l'élève
	var score = 0;
	var step = 0;

	$('p').html(('Question ') + (step+1)  + 'sur' + questions.length);
	$('label').text(questions[0]);
	$('form').submit(function(event){
		event.preventDefault();

		var userReponse = $('[name="reponse"]').val();
		
		if (userReponse == reponses[step]) {
			score++;
			errors.push(false);
		} else {
			errors.push(true);
		}
			


		if (step < reponses.length-1) {
			step++;

			$('p').html(('Question ') + (step+1)  + 'sur' + questions.length);
			$('label').text(questions[step]);
		} else {
			// On veut afficher le résultat 
			$('form').hide();

			var messageResultats = 'Vous avez répondu correctement à ' + score +' sur ' + questions.length + '. </br><br>';

			for (var i = 0; i < errors.length; i++) {
				if (errors[i] == false) {

					messageResultats += questions[i] + '<br> ' +'<p class="correct"> VRAI </p>'  +'<br>';

				} else {
					messageResultats += questions[i] + '<br> '+ '<p class="faux"> FAUX </p> '+'la bonne réponse est '+reponses[i]+'<br><br>';
				}
			}

			$('p').html(messageResultats);

		}


	})
}); 