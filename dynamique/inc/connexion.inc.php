<?php 

/* CONNEXION FACON PDO */

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
	$dbName = "dynamique"; // Mettre le nom de la base de donnée 
}

try {
	$connection = new PDO('mysql:host='.$server.';dbname='.$dbName,$login,$password); // 1er paramètre le nom du serveur, ensuite nom de db, login, password
}

catch(Exception $e) {
/*	echo "<pre>";
	print_r($e);
	echo "</pre>";*/
	echo 'Erreur : '.$e->getMessage().'<br />';
	echo 'N° : '.$e->getCode().'<br />';
	die();
};

?>