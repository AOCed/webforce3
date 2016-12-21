<?php
$online = false;
if($online){
	$server = "";
	$login = "";
	$password = ""; 
	$dbName = ""; // nom de la base de donnée
} else {
	$server = "localhost";
	$login = "root";
	$password = ""; 
	$dbName = "dynamique2"; // nom de la base de donnée
}

try {
	$connexion = new PDO('mysql:host='.$server.';dbname='.$dbName, $login, $password);
	$connexion->exec("SET NAMES 'UTF8'");
}
catch(Exception $e){
	echo 'Erreur : '.$e->getMessage().'<br />';
	echo 'N° : '.$e->getCode().'<br />';
	die();
}

?>