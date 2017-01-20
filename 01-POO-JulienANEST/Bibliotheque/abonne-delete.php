<?php

/**
 * Récupérer l'utilisateur grâce à l'id en GET (CF abonne_edit.php)
 * On crée une methode delete() dans la classe Abonne
 * On l'appelle 
 * Et on redirige vers abonne.php
 */

session_start();
require_once 'App/autoload.php';

use Model\Abonne;

$abonne = new Abonne();

if(isset($_GET['id'])){
	
	$abonne = Abonne::find($_GET['id']);
	$abonne->delete();
}
$_SESSION['msg'] = "L'utilisateur a bien été supprimé.";
header('Location: abonne.php');












