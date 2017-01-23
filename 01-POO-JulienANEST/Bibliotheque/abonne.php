<?php
// Abonne.php
session_start();
require_once 'App/autoload.php';

use Model\Abonne;

if (isset($_GET['nom'])) {
	$abonnes = Abonne::findNom($_GET['nom']);
} else {
	$abonnes = Abonne::fetchAll();
}

// echo "<pre>";
// var_dump($abonnes);
// echo "</pre>";

// var_dump(Abonne::validateEmail('ddd@email.fr', $msg));
// var_dump(filter_var('ddd@email', FILTER_VALIDATE_EMAIL));

require 'view/abonne.php';

