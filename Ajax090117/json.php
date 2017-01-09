<!doctype html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>AJAX AVEC JSON</title>
		<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	</head>
	<body>
		<header>
			<h1>AJAX AVEC JSON</h1>
		</header>
		<main>
<section>
	<h2>AJAX AVEC DU JSON</h2>
	<div class="contenu2">
		CECI EST DU CONTENU STATIQUE QUI VA CHANGER
	</div>
</section>		
		</main>
		<footer>
			<p>tous droits réservés 2017</p>
		</footer>

<!-- CHARGER LE CODE DE JQUERY -->
<script
  src="https://code.jquery.com/jquery-3.1.1.min.js"
  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
  crossorigin="anonymous"></script>
  
<script type="text/javascript">

// POUR UTILISER jQuery, JE METS MON CODE DANS CE BLOC D'INITIALISATION
$(function() {
	// Ce code sera affiché dans la page sera prete
	// On va utiliser $.getJSON pour charger du contenu au format json depuis le serveur
	// http://api.jquery.com/jquery.getjson/
	$.getJSON("libs/services.php", {"action" : "getJSON"}) 
		// Ce code sera activé quand la page web va recevoir la réponse du serveurs
		// jQuery transforme le texte recu du serveur en un objet javascript
	    .done(function() {
	        console.log( "second success" );
	    })
	    .done(function(dataJSON){
	    	var codeHTML = "<h3>"+dataJSON.prenom + " "+dataJSON.nom + "</h3>";
	    	
			// Je vais insérer le code HTML construit dans la balise .contenu2
			$(".contenu2").html(codeHTML);
	    })
	

		.fail(function(){
			console.log("error");
		})
		.always(function(){
			console.log('complete');
		})

		// console.log(dataJSON);
	});

</script>
	</body>
</html>