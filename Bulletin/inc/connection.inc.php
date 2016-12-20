<?php 

	// Configurer la connexion 
	$host = "localhost";
	$user = "root";
	$password = "";
	$db = "wf3class";

	try {
		$connection = new PDO('mysql:host='.$host.';dbname='.$db.';charset=utf8', $user, $password);
		// Pour débugguer
		// $connection->setAttribute(PDO::ATTR_ERRMODE? PDO::ERRMODE_EXCEPTION);
	} catch (Exception $e) {
		echo 'Erreur : '.$e->getMessage().'<br />';
		echo 'N° : '.$e->getCode().'<br />';
		die();
	}

?>