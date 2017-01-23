<?php
// livre.php
session_start();
require_once 'App/autoload.php';

use Model\Livre;

if (isset($_GET['titre'])) {
	$livres = Livre::findTitre($_GET['titre']);
} else {
	$livres = Livre::fetchAll();
}

// echo "<pre>";
// var_dump($file);
// echo "</pre>";


require 'view/livre.php';