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
	// Vérifier que le poids du fichier uploadé est supérieur à zéro (qu'il contient des informations)

	if($_FILES['prImage']['size']>0) {
		$dir = '../content/media';

		// Vérifier que le dossier de destination existe 
		if (file_exists($dir) && is_dir($dir)) {
			// Renommer le nom du fichier en timestamp pour raison sécurité
			$filename = time().".".pathinfo($_FILES['prImage']['name'], PATHINFO_EXTENSION);

			// Déplacer le fichier depuis le dossier temporaire vers la destination
			if (move_uploaded_file($_FILES['prImage']['tmp_name'], $dir.'/'.$filename)){
				$filepath = 'content/media/'.$filename;
			} else {
				die("Upload failed");
			}
		}
	} else {
		die("Fichier non uploadé");
	}

	// Vérifier que le nom, la ref et le prix ont été saisis
	if(trim($_POST['message']) != "") {
		// Je prépare ma requête d'insertion dans la table products
		$sql = "INSERT INTO `products` (`users_id`, `msg_text`) VALUES ('".trim($_POST['user']['firstname'])."', '".trim($_POST['message'])."')";

		// echo $sql;
		
		// Envoyer la requete au serveur 
		$req = mysqli_query($connexion, $sql) or die(mysqli_error($connexion));
		// Retourner ensuite sur la page index pour pouvoir ré insérer 
		header('Location: ../index.php');
	} else {
		header('Location: ../add_modify_messages.php');
	}
	exit;
}

function modify(){
	global $connexion;


	if(trim($_POST['prName']) != "" && trim($_POST['prRef']) !="" && trim($_POST['prPrice']) !="" ) {


		if($_FILES['prImage']['size']>0) {
			$dir = '../content/media';

			// Vérifier que le dossier de destination existe 
			if (file_exists($dir) && is_dir($dir)) {
				// Renommer le nom du fichier en timestamp pour raison sécurité
				$filename = time().".".pathinfo($_FILES['prImage']['name'], PATHINFO_EXTENSION);

				// Déplacer le fichier depuis le dossier temporaire vers la destination
				if (move_uploaded_file($_FILES['prImage']['tmp_name'], $dir.'/'.$filename)){
					$filepath = 'content/media/'.$filename;
				} else {
					die("Upload failed");
				}
			}
		} 
		if (isset($filepath)) {

			if (!empty($_POST['prFilepath'])) {
				unlink("../".$_POST['prFilepath']); 
			}
	
			$sql = "UPDATE `products` SET `pr_name` = '".trim($_POST['prName'])."', `pr_ref` = '".trim($_POST['prRef'])."', `pr_description` = '".trim($_POST['prDescription'])."', `pr_price` = '".trim($_POST['prPrice'])."'  , `pr_image` = '".$filepath."'  WHERE `products`.`pr_id` = ".$_POST['prId'];
		} else {

			// Je prépare ma requête d'insertion dans la table products
 			$sql = "UPDATE `products` SET `pr_name` = '".trim($_POST['prName'])."', `pr_ref` = '".trim($_POST['prRef'])."', `pr_description` = '".trim($_POST['prDescription'])."', `pr_price` = '".trim($_POST['prPrice'])."' WHERE `products`.`pr_id` = ".$_POST['prId']." ";
 		}
		
		// Envoyer la requete au serveur 
		mysqli_query($connexion, $sql);
		// Retourner ensuite sur la page index pour pouvoir ré insérer 
		header('Location: ../index.php');
	} else {
		header('Location: ../add_modify_products.php');
	}
	exit;
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