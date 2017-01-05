<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<title>Chat</title>
		<link rel="stylesheet" href="assets/css/style.css">
	</head>
	<body>
		<header><h1>Chat @ Webforce3</h1></header>
		<main>
		<section>
			<h2>Formulaire de chat</h2>
			<form class="chat ajax" action="libs/services.php" method="post">
				<input type="text" placeholder="Pseudo" name="pseudo" required="required" />
				<input type="text" placeholder="Ecrire votre message" name="message" required="required" />
				<input type="submit" value="Envoyer" />
				<input type="hidden" name="action" value="addChat" />
				<div class="retour">
					<!-- Le message de retour -->
				<?php
				/*	<!-- On affiche les messages de tous les utilisateurs -->
					<!-- On connecte à la base de données  -->*/
					require_once("inc/connection.inc.php");
					// Charger les fonctions
					require_once("inc/functions.inc.php");
					// utiliser mes fonctions
					// Lire et afficher les lignes de la table chat
					getChats();

				?>	
				</div>
			</form>
		</section>
		</main>


	<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="assets/js/ajaxform.js"></script>
	<!-- Mettre à jour la discussion toutes les seconcdes -->
	<script type="text/javascript">
		setInterval(function(){
			// Relancer une requete Ajax pour mettre à jour la balise .retour
			$(".retour").load("libs/services.php?action=getChats");
		},1000);

		// Base de code pour utiliser jQuery
		$(function(){
			// On veut effacer le contenu de l'input[name=message] une fois que le message a été envoyé
			$("form.chat").on("submit", function(){
				// On veut effacer le contenu de l'input[name=message] une fois que le message a été envoyé
				$("form.chat input[name=message]").val("").focus();
			});
		})
	</script>
	</body>
</html>
