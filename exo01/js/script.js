$(document).ready(function(){

	// Ajouter une class 'footer' sur la balise div 
	$('div').addClass('footer');

	// Créer une variable 'name' avec en valeur votre nom complet
	var name = 'hwaseon choi';

/*	// Demander à l'utilisateur de renseigner son nom 
	var userName = prompt('Quel est ton nom?');

	// Afficher dans une alert 'NAME et USERNAME sont de bons amis !'
	alert(name + ' et ' + userName + ' sont de bons amis!');*/

	// Créer un tableau de données (Collection de données)
	var myArray = ['Pierre', 'Paul', 'Ringo'];

	// Afficher dans la console : Bonjour Pierre, Bonjour Paul et Bonjour Ringo

	for (var i = 0; i < myArray.length; i++) {
		console.log('Bonjour '+myArray[i]);
	}


	var myInput = $('[name="fullName"]');
	// Validation du formulaire

	$('form').submit(function(){
		event.preventDefault();

		/*Le formulaire est validé quand au moins 5 caractères ont été 
		saisis dans le input*/
		if(myInput.val().length < 5){
			alert('Au moins 5 caractères!');
		} else {
			// Afficher dans la console la valeur du input et le nombre de caractère
			console.log( myInput.val() )
			console.log( myInput.val().length );
		}

	})



})
