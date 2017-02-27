<?php

$online = false; // à changer en true lors du passage en production

if ($online) {
	$host     = "";
	$user     = "";
	$password = "";
	$dbName   = ""; // nom de la base de donnée
} else {
	$host     = "localhost";
	$user     = "root";
	$password = "";
	$dbName   = "exo1_userslist"; // nom de la base de donnée
}

$db = new PDO('mysql:host='.$host.';dbname='.$dbName.';charset=utf8',$user,$password);
