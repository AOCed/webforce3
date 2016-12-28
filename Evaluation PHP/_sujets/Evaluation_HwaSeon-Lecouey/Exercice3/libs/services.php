<?php
	session_start();
	require('../inc/connection.inc.php');

	// Récupération de l'information Action à partir du fichier add.inc.php
	if (isset($_GET['action']) && $_GET['action']!="") {
		switch($_GET['action']) {
			case 'add':
				add();
			break;

			default: break;
		}
	} else {		
		header('Location: ../index.php');
	}

	// Fonction qui prépare quand l'action "add" est executé
	function add() {
		global $connection;

		// Vérification des données saisis par utilisateur 
		if (!empty($_POST['title']) && !empty($_POST['director']) && !empty($_POST['storyline']) && !empty($_POST['actors']) && !empty($_POST['producer']) && !empty($_POST['year']) && !empty($_POST['language']) && !empty($_POST['category']) && !empty($_POST['video']) ) {
	
				// Préparation pour la vérification si le lien de la bande annonce est bien un lien
				$lienNecessaire = "http://";
				$lien = $_POST['video'];
				$lienVerif = strpos($lien, $lienNecessaire);

			// Vérification si les champs demandés comportent plus de 5 caractères
			if (strlen($_POST['title'])>6 && strlen($_POST['director'])>6 && strlen($_POST['actors'])>6 && strlen($_POST['producer'])>6 && strlen($_POST['storyline'])>6 && $lienVerif == true) {

				// Préparation la requête à envoyer
				$datas = array(
					"title" => $_POST['title'],
					"actors" => $_POST['actors'],
					"director" => $_POST['director'],
					"producer" => $_POST['producer'],
					"storyline" => $_POST['storyline'],
					"year" => $_POST['year'],
					"category" => $_POST['category'],
					"video" => $_POST['video'],
					"language" => $_POST['language']
					);

				$sql = "INSERT INTO movies (title, actors, director, producer, storyline, year_of_prod, category, video, language) VALUES(:title, :actors, :director, :producer, :storyline, :year, :category, :video, :language)";
				$req = $connection->prepare($sql);
				$req->execute($datas);

				// Une fois l'ajout est réussi, on envoie le message
				echo "<p style='color:green'>Le film est bien ajouté dans la base de données!<p><a href='../index.php?page=3'>Retour en arrière</a>";
				} else {
					// Quand les champs demandés ne comportent pas plus de 5 caractères, on envoie le message
					echo "<p style='color:red'>Veuilez saisir plus de 5 caractères. <p><a href='../index.php?page=3'>Retour en arrière</a>";
				} 
			} 
		}

?>
