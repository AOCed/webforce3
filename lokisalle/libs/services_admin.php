<?php 

require_once('../inc/init.inc.php');

if (isset($_GET['action']) && $_GET['action']!="") {
		switch($_GET['action']) {
			case 'addSalle':
				addSalle();
			break;
			case 'modifSalle':
				modifSalle();
			break;
			case 'deleteSalle':
				deleteSalle();
			break;
			default: break;
		}
	} else {		
		header('Location: ../index.php');
	}

function addSalle() {
	global $connexion;

	$titre = trim($_POST['titre']);
	$pays = trim($_POST['pays']);
	$description = trim($_POST['description']);
	$ville = trim($_POST['ville']);
	$adresse = trim($_POST['adresse']);
	$capacite = trim($_POST['capacite']);
	$cp = trim($_POST['codepostal']);
	$categorie = $_POST['categorie'];

	if (!empty($titre) && !empty($pays) && !empty($description) && !empty($ville) && !empty($adresse) && !empty($capacite) && !empty($categorie)) {

		if(!empty($_FILES['image']) && !empty($_FILES['image']['size']>0)){

			$filepath = "";
			$dir = "../assets/img/";
			$filename = time().".".pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
			if(move_uploaded_file($_FILES['image']['tmp_name'], $dir.$filename)){
				$filepath = "img/".$filename;
			} else {
				die("upload failed");
			}
			} else {
				die('Fichier non uploadé');
			}
		
		$data = array(
			"titre" => $titre,
			"pays" => $pays,
			"description" => $description,
			"ville" => $ville,
			"photo" => $filepath,
			"adresse" => $adresse,
			"capacite" => $capacite,
			"cp" => $cp,
			"categorie" => $categorie
		);

		$sql = "INSERT INTO `salle` (`titre`, `description`, `photo`, `pays`, `ville`, `adresse`, `cp`, `capacite`, `categorie`) VALUES ( :titre, :description, :photo, :pays, :ville, :adresse, :cp, :capacite, :categorie )";
		$req = $connexion->prepare($sql);
		$req->execute($data);

		header('Location: ../admin/index.php');

	} else {
		echo "Problème lors de l'ajout";
	}
}

function modifSalle() {
	global $connexion;

	$titre = trim($_POST['titre']);
	$pays = trim($_POST['pays']);
	$description = trim($_POST['description']);
	$ville = trim($_POST['ville']);
	$adresse = trim($_POST['adresse']);
	$capacite = trim($_POST['capacite']);
	$cp = trim($_POST['codepostal']);
	$categorie = $_POST['categorie'];

		if (!empty($titre) && !empty($pays) && !empty($description) && !empty($ville) && !empty($adresse) && !empty($capacite) && !empty($categorie)) {


			if(!empty($_POST['filepath'])){
				$filepath = $_POST['filepath'];
			} else{
				$filepath = "";
			}

			if(!empty($_FILES['image']) && $_FILES['image']['size']>0) {
				$dir = '../assets/img/';

				// Vérifier que le dossier de destination existe 
				if (file_exists($dir) && is_dir($dir)) {
					// Renommer le nom du fichier en timestamp pour raison sécurité
					$filename = time().".".pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

					// Déplacer le fichier depuis le dossier temporaire vers la destination
					if (move_uploaded_file($_FILES['image']['tmp_name'], $dir.$filename)){

						if($filepath !=""){
							unlink('../'.$filepath);
						}
						$filepath = 'img/'.$filename;
					} 
				}
			} 

			$data = array(
				"titre" => $titre,
				"pays" => $pays,
				"description" => $description,
				"ville" => $ville,
				"photo" => $filepath,
				"adresse" => $adresse,
				"capacite" => $capacite,
				"cp" => $cp,
				"categorie" => $categorie
			);
// echo "<pre>";
// var_dump($data);
// echo "</pre>";
// die();
			$sql = "UPDATE `salle` SET titre=:titre, description=:description, photo=:photo, pays=:pays, ville=:ville, adresse=:adresse, cp=:cp, capacite=:capacite, categorie=:categorie WHERE id_salle=".$_POST['id_salle'];
			$req = $connexion->prepare($sql);
			$req->execute($data);
			
			header('Location: ../admin/index.php');

	} else {
		echo "Problème lors de modification";
	}
}


function deleteSalle(){
	global $connexion;

	$sql = "DELETE FROM salle WHERE salle.id_salle=".$_GET['id'];
	$req = $connexion->prepare($sql);
	$req->execute();

	header('Location: ../admin/index.php');
}
?>