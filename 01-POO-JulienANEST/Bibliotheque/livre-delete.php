<?php

/**
 * Récupérer l'utilisateur grâce à l'id en GET (CF livre-edit.php)
* On crée une methode delete() dans la classe Abonne
* On l'appelle
* Et on redirige vers abonne.php
*/

session_start();
require_once 'App/autoload.php';

use Model\Livre;

$livre = new Livre();

if(isset($_GET['id'])){

	$livre = Livre::find($_GET['id']);
	$livre->delete();
}
$_SESSION['msg'] = "L'utilisateur a bien été supprimé.";
header('Location: livre.php');
