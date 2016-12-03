$(document).ready(function() {
	var word = 'Tableau';

	for (var i = 0 ; i <= word.length ; i++) {
		if (i === 0) {
			$('form').append('<input type="text" maxlength="1" value="' + word[i] + '"readonly> ');
		} else if (i === word.length) {
			$('form').append('<input type="text" maxlength="1" value="' + word[i - 1] + '"readonly>');
		} else {
			$('form').append('<input type="text" maxlength="1"> ');			
		}
	}

	// Au moment où l'utilisateur envoie le formulaire...
	$('form').submit(function(event) {
		event.preventDefault();

		for (var i = 0 ; i <= word.length ; i++) {
			
		}
	});
}); 