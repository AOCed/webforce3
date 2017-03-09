<?php 

	require_once('../inc/init.inc.php');

	if(!empty($_GET['action'])){
		switch ($_GET['action']) {
			case 'signup':
				signup();
				die();
				break;

			case 'login':
				login();
			break;

			case 'logout':
				logout();
			break;
			case 'contact':
				contact();
			break;
			
			
			default: break;
		}
	}
	header('Location: '.$_SERVER['HTTP_REFERER']);
	die();

/*	header('Location: '.$_SERVER['HTTP_REFERER']);
	die();*/

// Facon de commenter une fonction
/**
* @param 
*
* @return void
**/

	function signup() {

		global $connection;

		if(!empty($_POST['email']) && !empty($_POST['password']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {

			$data = array(
				"email"=>$_POST['email'],
				"password"=>password_hash($_POST['password'], PASSWORD_BCRYPT)
			);

				$sql = "INSERT INTO `users` (`user_email`, `user_password`) VALUES (:email, :password);";
				$req = $connection->prepare($sql);
				$req->execute($data);

				header ('Location: ../inc/thx.inc.php');
		} else {
			die('inscription invalidé');
		}
	}

	function login(){

		global $connection;

		// Je vérifie que le mot de passe et l'adresse e-mail ont été renseigné et que l'e-mail est au bon format 
		if (!empty($_POST['email']) && !empty($_POST['password']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {

			$data = array(
				"email"=>$_POST['email']
				);
			// Requete SQL pour récupérer le mot de passe pour vérification
			$sql = "SELECT user_password, user_id, user_is_admin
						FROM users 
						where user_email=:email";

			$req = $connection->prepare($sql);
			$req->execute($data);
			$result=$req->fetch();
		


			if(password_verify($_POST['password'], $result['user_password'])) {

				$_SESSION['user'] = $result['user_id'];
				// La valeur de cette session est soit 0 ou 1 pour différencier entre utilisateur lambda et administrateur
				$_SESSION['admin'] = $result['user_is_admin'];

				$req = $connection->prepare($sql);
				$req->execute($data);
				$result = $req->fetch();

				setcookie('user_id', $result['user_id'], time() + 60*60*24*1);

				header ('Location: ../index.php');
				exit;
			} else {
				die("Identifiant or mot de passe incorrect");
			}
		}
	}


	function logout(){

		session_destroy();
		setcookie("user_id", "", time()-3600);
/*		Ou alors utiliser Unset  pour détruire cookie 
		unset($_COOKIE['user_id']);*/
		header ('Location: ../index.php');
		exit;

	}

	function contact() {

		if(!empty($_POST['email']) && !empty($_POST['subject']) && !empty($_POST['message']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
			/* Empecher d'injecter des scripts ou d'images par utilisateur */
			$_POST['subject'] = htmlentities($_POST['subject']);
			$_POST['message'] = htmlentities($_POST['message']);
			
			// Format par défaut possible
			/*$headers = "From: Nom Prénom <email@monsite.com>";*/
			$headers = "From: ".$_POST['email']."\r\n";
			$headers .= "Content-type:text/html; charset=utf-8 \r\n";

			mail('novlike@gmail.com', $_POST['subject'], $_POST['message']);

		} else {
			die('Formulaire mal rempli');
		}

	}

?>
