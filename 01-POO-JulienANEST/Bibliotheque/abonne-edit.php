<?php

// abonne-edit.php
session_start();
require_once 'App/autoload.php';

use Model\Abonne;

$abonne = new Abonne();
$errors = [];

if (!empty($_POST)) {
	
	if (!Abonne::validatePrenom($_POST['prenom'], $msg)) {
		$errors['prenom'] = $msg;
	}
	if (!Abonne::validateNom($_POST['nom'], $msg)) {
		$errors['nom'] = $msg;
	}
	
	$abonne->setPrenom($_POST['prenom']);
	$abonne->setNom($_POST['nom']);
	
	
	if(!empty($_POST['id'])) { // Modification 
		$abonne->setId($_POST['id']);
	}
	
	if(empty($errors)) {
		$abonne->save();
		$_SESSION['msg'] = "L'abonné a bien été enregistré.";
		header('Location: abonne.php');
	}
		
} elseif (isset($_GET['id'])) {
	$abonne = Abonne::find($_GET['id']);
} 

require 'view/abonne-edit.php';

?>

