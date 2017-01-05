<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8" />
		<title>AJAX</title>
		<link rel="stylesheet" href="assets/css/style.css">
	</head>
	<body>
		<header>
			<h1>AJAX</h1>
		</header>
		<main>
			<section>
				<h2>Page Simple <?php echo date("H:i:s"); ?> </h2>
				<div class="contenu">
					Ceci est du contenu statique
				</div>
			</section>
			<section>
				<h2>Page Simple avec du contenu modifie par ajax</h2>
				<div class="contenu2">
					Ceci est du contenu statique qui va changer
				</div>
				<p>Ajax permet de charger du contenu depuis le serveur sans recharger toute la page</p>
				<!-- Code de main <a href="#">Cliquez ici pour le recharger</a> -->

			</section>
			<section>
				<h2 class="bouton3">Page Simple pour Ajax - click </h2>
				<div class="contenu3">
					Contenu 3 pour Ajax
				</div>
			</section>
		</main>
		<footer>
			<p>tous droits réservés 2017</p>
		</footer>

	<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
		<script type="text/javascript">
			// Je vais changer le contenu de la balise contenu2 sans recharger la page
			// Je vais changer le contenu de la balise "contenu2" sans recharger la page
		$(function(){
			// Code de Thomas
/*			$('a').click(function(event) {
				event.preventDefault();
				$('.contenu2').load('ajax-contenu2.php');
			};*/
			// Je veux que si on clique sur le h2.bouton3 alors on charge du contenu par ajax
			$("h2.bouton3").on("click", function(){
				$(".contenu3").load("ajax-contenu3.php");
			})
		});
		</script>
	</body>
</html>