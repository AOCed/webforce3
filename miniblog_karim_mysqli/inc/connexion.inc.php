<?php 
// fichier qui fait la connexion entre PHP et MySQL

// Créer une variable pour définir notre environnnement
$online = false; // valeur true ou false;

if ($online) {
	// Pour mettre les informations lorsque le serveur est à distance
	$server = "";
	$login = "";
	$password = "";
	$dbName = ""; // Mettre le nom de la base de donnée 
} else {
	$server = "localhost";
	$login = "root";
	$password = "";
	$dbName = "twitter"; // Mettre le nom de la base de donnée 
}

// Connexion au serveur 
$connexion = mysqli_connect($server, $login, $password) or die("Erreur de connection au serveur: ".$server);


// connexion à la bdd
mysqli_select_db($connexion, $dbName) or die("Erreur de connection à la base de données: ".$dbName);
// Avoir les retours de nos futures requetes au format d'encodage UTF-8
mysqli_set_charset($connexion, 'utf8');
mysqli_query($connexion, 'SET CHARACTER SET utf8');
mysqli_query($connexion, 'SET NAMES utf8');

?>