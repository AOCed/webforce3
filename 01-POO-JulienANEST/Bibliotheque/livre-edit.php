<?php

// livre-edit.php
session_start();
require_once 'App/autoload.php';

use Model\Livre;

$livre = new Livre();
$errors = [];

if (!empty($_POST)) {

	if (!Livre::validateTitre($_POST['titre'], $msg)) {
		$errors['titre'] = $msg;
	}
	if (!Livre::validateAuteur($_POST['auteur'], $msg)) {
		$errors['auteur'] = $msg;
	}


	$livre->setTitre($_POST['titre']);
	$livre->setAuteur($_POST['auteur']);
	$livre->setAnnee($_POST['annee']);
	$livre->setDescription($_POST['description']);

	if(!empty($_POST['id'])) { // Modification
		$livre->setId($_POST['id']);
	}

	if(empty($errors)) {
		$livre->save();
		$_SESSION['msg'] = "Le livre a bien été enregistré.";
		header('Location: livre.php');
	}

} elseif (isset($_GET['id'])) {
	$livre = Livre::find($_GET['id']);
}

require 'view/livre-edit.php';

?>