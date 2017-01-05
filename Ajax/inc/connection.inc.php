<?php 

$host	 	= "localhost";
$dbname 	= "ajax";
$user 		= "root";
$password 	= "";

// http://php.net/manuel/fr/pdo.construct.php
try {
$connection = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
} catch(PDOException $e) {
	echo "Connexion échouée : ". $e->getMessage();
}

?>