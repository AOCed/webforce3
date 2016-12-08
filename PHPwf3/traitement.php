<?php 
require('./fonction07dec.php');
session_start();
/*
$_GET: ca contient dans un tableau les variables passées en GET(dans l'URL)
$_POST: ca contient dans un tableau les variables passées en POST(methode POST d'un formulaire)
$_SERVER: contient des informations qu'on peut utiliser avec ['--ici--']
		echo "<pre>";
		print_r($_SERVER);
		echo "<pre>";
*/

// isset() permet de savoir qu'une variable existe

// empty() vérifie les deux en même temps, si la variable existe et si elle est pas vide
//if(empty($_GET))

if (isset($_GET['action']) && $_GET['action']!==''){
	// Je vérifie si je connais bien l'action passé en paramètre GET
	switch($_GET['action']){

		case "calculeSigne":
			// On stocke le resultat dans une variable

			if(!empty($_POST['anneeSaisie'])) {
				$_SESSION['annee'] = $_POST['anneeSaisie'];
				$leSigne = maSigneChinois($_POST['anneeSaisie']);

				// Je renvoie vers la page signe avec le résultat trouvé:
				// Methode en passant un paramètre GET ->
				// header('Location: ./signe.php?res='.$leSigne);
				// Methode en utilisant une variable de SESSION ->
				$_SESSION['resultat'] = $leSigne;
			} else {
				$_SESSION['resultat'] = 'Saisissez votre année!';
				
			}
			header('Location: ./signe.php');
			exit;
		break;

		case "calculeAire":
			if(!empty($_POST['larSaisie'] && $_POST['lonSaisie']) && $_POST['larSaisie'] != "" && $_POST['lonSaisie'] !="") {
				$_SESSION['largeur'] = $_POST['larSaisie'];
				$_SESSION['longueur'] = $_POST['lonSaisie'];
 				$lAire = aireRectagle($_POST['larSaisie'], $_POST['lonSaisie']);
				$_SESSION['resultat2'] = $lAire;
			} else {
				$_SESSION['resultat2'] = 'Saissiez une largeur et une longueur!';
			}
			header('Location: ./signe.php');
			exit;
		break;

		case "displayPost":
			echo "<pre>";
			print_r($_POST);
			echo "<pre>";
		break;

		case "bissextile":

			if(!empty($_POST['anneeBis'])) {
				$_SESSION['bis'] = $_POST['anneeBis'];
				$resultAnnee = bissextile($_POST['anneeBis']);

				$_SESSION['resultat3'] = $resultAnnee;
			} else {
				$_SESSION['resultat3'] = 'Saisissez une année!';
				
			}
			header('Location: ./signe.php');
			exit;
		break;

		default:
			header('Location: '.$_SERVER['HTTP_REFERER']);
			exit;
		break;
	}
} else {
	// Fonction qui renvoie vers la page d'où tu viens
	header('Location: '.$_SERVER['HTTP_REFERER']);
	// Exit pour s'assurer de ne pas continuer à exécuter le code
	exit;
}





 ?>