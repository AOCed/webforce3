<?php 
	require('../inc/init_session.inc.php');

	if (!empty($_GET['action'])){

		switch($_GET['action']) {
			case 'login':
				login();
				header ('Location: ../index.php');
				die();
			break;

			case 'addPost':
				addPost();
				header ('Location: ../index.php');
			break;

			case 'deletePost':
				deletePost();
				header ('Location: ../index.php');
			break; 

			case 'logout':
				session_destroy();
				header ('Location: ../index.php');
			break;

			default: break;
		}
	}



	function login(){

		global $connexion;

		// Je vérifie que le mot de passe et l'adresse e-mail ont été renseigné et que l'e-mail est au bon format 
		if (!empty($_POST['mail']) && !empty($_POST['password']) && filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {

			// Requete SQL pour récupérer le mot de passe pour vérification
			$sql = "SELECT users_password 
							FROM users 
						where users_mail='".mysqli_real_escape_string($connexion, $_POST['mail'])."' ";

			// Envoyer la requete au serveur =
			$req = mysqli_query($connexion, $sql);

			// Je vérifie que la requete renvoie les résultats
			if (mysqli_num_rows($req)!=0) {
				$data = mysqli_fetch_assoc($req);
			}

			// Vérifier que le mot de passe envoyé par l'utilisateur correspond à celui stocké dans la BDD
			// password_verify va avec password_hash
			if(password_verify($_POST['password'], $data['users_password'])){
				$sql2 = "SELECT * 
							FROM users 
						where users_mail='".mysqli_real_escape_string($connexion, $_POST['mail'])."' ";
				$req2 = mysqli_query($connexion, $sql2);
				if (mysqli_num_rows($req2)!=0) {
					// Insérer les données de l'utilisateur en session
					$_SESSION['user'] = mysqli_fetch_assoc($req2);

					header('Location: ../index.php');
					die();
				}


			} else {
				die ("mauvais mot de passe");
			}
		} else {
			// Si l'email n'est pas bon
			die("Aucun utilisateur ne correspondant à cette adresse");
		}
	}

	function addPost(){

		global $connexion;

		if (!empty($_POST['message'])) {

			$message = htmlentities($_POST['message']);
			$message = mysqli_real_escape_string($connexion, $message);

			$sql = "INSERT INTO `messages` 
						(`users_id`, `msg_text`, `msg_date`) 
					VALUES ('".$_SESSION['user']['users_id']."', '".$message."', CURRENT_TIMESTAMP)";

			// echo $sql;

			mysqli_query($connexion, $sql); // Pas besoin de stocker dans $req

		}
	}

	function deletePost(){
		global $connexion;

		if(!empty($_GET['target'])) {
			// Je m'assure que target est un nombre entier
			settype($_GET['target'], 'integer');

			$sql = "DELETE FROM `messages` WHERE `msg_id` = ".$_GET['target'];
			mysqli_query($connexion, $sql);

		}
	}

?>