<?php 
	require_once('../inc/init.inc.php');

	if(!empty($_GET['action'])){
		switch ($_GET['action']) {
			case 'postArticle':
				postArticle();
				break;
			
			default: break;
		}
	}

	header('Location: '.$_SERVER['HTTP_REFERER']);
	die();

	// Facon de commenter une fonction
	/**
	* @param 
	*
	* @return void
	**/

	function postArticle() {
		global $connection;

		// Configuration de l'image uploadée
		// Version Karim
		if($_FILES['image']['size']>0) {
			$dir = '../img';
			// Vérifier que le dossier de destination existe 
			if (file_exists($dir) && is_dir($dir)) {
				// Renommer le nom du fichier en timestamp pour raison sécurité
				$filename = time().".".pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

				// Déplacer le fichier depuis le dossier temporaire vers la destination
				if (move_uploaded_file($_FILES['image']['tmp_name'], $dir.'/'.$filename)){
					$filepath = 'img/'.$filename;
				} else {
					die("Upload failed");
				}
			}
		} else {
			die("Fichier non uploadé");
		}

		// Version Anthony
/*		if(!empty($_FILES['image']) && !empty($_FILES['image']['size']>0)){
			$filepath = "";
			$dir = "../img/";
			$filename = time().".".pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

			if(move_uploaded_file($_FILES['image']['name'], $dir.$filename)){

				$filepath = "img/".$filename;

			} else {
				die("upload failed");
			}
		} else {
			die('Fichier non uploadé');
		}*/

		if(!empty($_POST['title']) && !empty($_POST['text'])) {
			$data = array(
					"title" => $_POST['title'],
					"text" => $_POST['text'],
					"image" => $filepath,
					"user" => 1 );		

			$sql = "INSERT INTO articles (ar_title, ar_text, ar_id_user, ar_date, ar_image) VALUES (:title, :text, :user, NOW(), :image)";
			$req = $connection->prepare($sql);
			$req -> execute($data);
		} 


	}

?>

