$(document).ready(function(){


	// Définir les variables globales
	var userChoice;
	var computerMemory = ['stone', 'paper', 'scissors'];
	var newGame = true;


	// Capter le clique sur les petites images
	$('nav img').click(function(){

		//Vérifier la variable newGame 
		if(newGame === true) {

			// Récupérer la valeur de l'attribut data-value
			userChoice = $(this).attr('data-value');

			// Afficher la balise img avec le bon src dans la première figure
			$('figure:first').html('<img src="' + $(this).attr('src')+ '" alt="choix:'+userChoice+'">');

			// Afficher le bouton pour lancer la partie
			$('button').fadeIn();
		}
	});


	// Capter le clique sur le bouton pour faire choisir l'oridnateur 
	$('button').click(function(){

		var computerChoice = computerMemory[Math.floor(Math.random()*computerMemory.length)];

		// Afficher la bonne image dans la deuxième figure grâce à computerChoice
		$('figure:last').html('<img src="img/'+computerChoice+'.svg" alt="choix:'+computerChoice+'">');

		// Vérifier le résultat de la partie 
		if (userChoice === computerChoice) {
			// Afficher le résultat dans le DOM
			$('section p').addClass('exaequo').text('Exaequo').fadeIn();
		} else if (userChoice === 'stone' && computerChoice === 'scissors') {
			// Afficher le résultat dans le DOM
			$('section p').addClass('win').text('Partie gagnée').fadeIn();
		} else if (userChoice === 'paper' && computerChoice === 'stone') {
			// Afficher le résultat dans le DOM
			$('section p').addClass('win').text('Partie gagnée').fadeIn();
		} else if (userChoice === 'scissors' && computerChoice === 'paper') {
			// Afficher le résultat dans le DOM
			$('section p').addClass('win').text('Partie gagnée').fadeIn();
		} else {
			// Afficher le résultat dans le DOM
			$('section p').addClass('lose').text('Partie perdue...').fadeIn();
		};

		// Supprimer le bouton et afficher le lien pour rejouer
		$(this).fadeOut(function(){
			$('a').fadeIn();
		});

		// Modifier la variable newGame pour empecher de rejouer
		newGame = false;
	})

	// Programmer le lien pour rejouer 
	$('a').click(function(){
		// Bloquer le comportement par défaut
		event.preventDefault();

		// Masquer le lien
		$(this).fadeOut();

		// Vider les variables userChoice et computerChoice
		userChoice = computerChoice = '';

		// Supprimer les class et le texte de 'section p'
		$('section p').fadeOut(function(){
			$(this).removeClass().text('')
		});

		// Vider les balises figure
		$('figure').fadeOut(function(){
			$(this).html('').show();
		});

		// Modifier la variable newGame 
		newGame = true;

	})



});