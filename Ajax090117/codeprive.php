<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Code Privé avec Javascript</title>
</head>
<body>
	<section>
		<h3>Comment faire du code privé en JS</h3>
		<script>
			// Problèmatique 
			// Comment protéger une partie de son code pour empecher les autres codeurs d'appeler certaines fonctions
			var monObjectPublic = (function(){
					// TEST
					console.log('fonction activée');
				// Je crée une variable locale (Privées)
				var objetPublic = {};
				// Si je veux avoir du code privé, je le mets dans ma fonction
				var fairePrive = function(){
					console.log("action privée");
				};

				var compteur = 0;
				// Pour rendre public certaines variables ou fonctions, il faut les ajouter dans objectPublic
				objetPublic.fairePublic = function(){
					console.log("action publique");
					// Je peux activer les fonctions privées
					fairePrive();
					compteur = compteur +1;
				}
				// Je renvoie la valeur de la variable locale
				return objetPublic;
			})();

			monObjectPublic.fairePublic();

			// Ceci est une ecriture d'erreur
			// fairePrive();
		</script>
	</section>
</body>
</html>