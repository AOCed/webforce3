<?php
session_start();
require('../inc/connexion.inc.php');

// Verifier que l'on a bien une action passée en GET
if (isset($_GET['action']) && $_GET['action']!="") {
	switch($_GET['action']) {
		case 'add':
			add();
		break;
		
		case 'modify':
			modify();		
		break;

		case 'delete':
			delete();		
		break;

		default:
			header('Location: ../index.php');
		break;
	}
} else {
	
	header('Location: ../index.php');
}

function add(){
	global $connexion;
	// Vérifier que le nom, la ref et le prix ont été saisis
	if(trim($_POST['prName']) != "" && trim($_POST['prRef']) !="" && trim($_POST['prPrice']) !="") {
		// Je prépare ma requête d'insertion dans la table products
		$sql = "INSERT INTO `products` (`pr_id`, `pr_name`, `pr_ref`, `pr_description`, `pr_price`) VALUES (NULL, '".trim($_POST['prName'])."', '".trim($_POST['prRef'])."', '".trim($_POST['prDescription'])."', '".trim($_POST['prPrice'])."')";

		// echo $sql;
		
		// Envoyer la requete au serveur 
		$req = mysqli_query($connexion, $sql) or die(mysqli_error($connexion));
		// Retourner ensuite sur la page index pour pouvoir ré insérer 
		header('Location: ../index.php');
	} else {
		header('Location: ../add_modify_products.php');
	}
}

function modify(){
	global $connexion;
	if(trim($_POST['prName']) != "" && trim($_POST['prRef']) !="" && trim($_POST['prPrice']) !="") {
		// Je prépare ma requête d'insertion dans la table products

 		$sql = "UPDATE `products` SET `pr_name` = '".trim($_POST['prName'])."', `pr_ref` = '".trim($_POST['prRef'])."', `pr_description` = '".trim($_POST['prDescription'])."', `pr_price` = '".trim($_POST['prPrice'])."' WHERE `products`.`pr_id` = ".$_POST['prId']."";
		// echo $sql;
		
		// Envoyer la requete au serveur 
		mysqli_query($connexion, $sql);
		// Retourner ensuite sur la page index pour pouvoir ré insérer 
		header('Location: ../index.php');
	} else {
		header('Location: ../add_modify_products.php');
	}
}

function delete(){
	global $connexion;
	$sql = "DELETE FROM `products` WHERE `products`.`pr_id` = ".$_GET['id']."";
	mysqli_query($connexion, $sql);
	// Retourner ensuite sur la page index pour pouvoir ré insérer 
	header('Location: ../index.php'); 
	exit;
}


?>