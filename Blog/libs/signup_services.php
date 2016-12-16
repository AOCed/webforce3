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
			
			default: break;
		}
	}
	header('Location: '.$SERVER['HTTP_REFERER']);
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

			// Requete SQL pour récupérer le mot de passe pour vérification
			$sql = "SELECT user_password, user_id 
							FROM users 
						where user_email=:email";

			$req = $connection->prepare($sql);
			$req->execute($data);
			$result = $req->fetch();

			if(password_verify($_POST['password'], $result['user_password'])) {
				$_SESSION['user'] = $result['user_id'];

				setcookie('user_id', $result[user_id], 60*60*24*3);
			}

		} 

	}


?>