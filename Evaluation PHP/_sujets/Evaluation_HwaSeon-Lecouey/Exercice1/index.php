<?php

// Déclaration du tableau avec les coordonnées d'une personne
$coordonnees = array(
	"Prénom" => "hwaseon",
	"Nom" => "choi",
	"Adresse" => "3 rue desprez",
	"Code Postal" => "75014",
	"Ville" => "paris",
	"Email" => "novlike@gmail.com",
	"Téléphone" => "0659217000",
	"Date de Naissance" => date("Y-m-d", mktime(0,0,0,4,3,1981))
	);

// Conversion de la date americaine à la francaise pour afficher 	
$coordonnees["Date de Naissance"] = date("d/m/Y", mktime(0,0,0,4,3,1981));

// Afficher les coordonnées à l'aide de la boucle "foreach"

echo "<h1>Voici mes coordonnées :</h1>";

foreach ($coordonnees as $key => $value) {

	echo "<ul><li>".$key." : ".$value."</li></ul>";

}

?>

<!-- Pour le style CSS -->
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Exercice01</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	
</body>
</html>