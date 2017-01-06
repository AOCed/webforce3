<!DOCTYPE html>
	<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<title>Auto Complétion</title>
		<link rel="stylesheet" href="assets/css/style.css">
	</head>
	<body>
		<header>
			<h1>Auto Complétion</h1>
		</header>
		<section>
			<h2>Formulaire de destination</h2>
			<form action=""> <!-- A completer -->
				<input id="destination" type="text" name="destination" required autocomplete="off" />
				<div class="choix">
					<!-- Ici on verra les choix possibles -->
				</div>
				<input type="submit" value="Sélectionnez" />
			</form>
		</section>



	<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
	<script type="text/javascript">
		// On peut ajouter notre code avec jQuery
		$(function(){
			$("input[name=destination]").on("keyup", function(){
				// Le code sera activé quand l'utilisateur va taper dans le champ input
				var textEntre = $("input[name=destination]").val();
				// console.log(textEntre);

				// Je veux envoyer ce texte avec ajax au serveur qui va me renvoyer une liste de noms correspondants
				// On passe les paramètres POST en 2eme paramètre avec un objet JS 
				$(".choix").load("libs/services.php", { action : "getDestinations", destination : textEntre });

				$(".choix").on("click", ".suggestion", function(event){
					var selected = $(this).text();
					// alert("coucou");
					console.log(selected);
					$("#destination").val(selected);
					$(".suggestion").slideUp(); // J'ai utilisé remove à la place de slideUp

				})
			})
		});
	</script>
	</body>
</html>