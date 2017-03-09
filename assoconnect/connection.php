<?php

$online = false;

if ($online) {
	$host     = "";
	$user     = "";
	$pwd      = "";
	$database   = ""; // nom de la base de donnée
} else {
	$host     = "localhost";
	$user     = "root";
	$pwd      = "rootroot";
	$database   = "database"; // nom de la base de donnée
}

// Connexion au serveur
$connection = mysqli_connect($host, $user, $pwd) or die("Erreur de connection au serveur: ".$server);

// connexion à la bdd
mysqli_select_db($connection, $database) or die("Erreur de connection à la base de données: ".$database);
// Avoir les retours de nos futures requetes au format d'encodage UTF-8
mysqli_set_charset($connection, 'utf8');
//mysqli_query($connection, 'SET CHARACTER SET utf8');
//mysqli_query($connection, 'SET NAMES utf8');
