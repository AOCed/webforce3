<?php 

session_start();
require('../inc/connexion.inc.php');

// Verifier que l'on a bien une action passée en GET
if (isset($_GET['action']) && $_GET['action']!="") {
	switch($_GET['action']) {
		case 'verifConnect':
			verifConnect();
		break;

		default:
			header('Location: ../index.php');
		break;
	}
} else {

	header('Location: ../index.php');
}



function verifConnect() {
	global $connexion;

	/*Ecrire une requête sql pour vérifier si l'utilisateur qui essaie de se connecter
	est connu ET est un admin */

	$sql = "SELECT * FROM users WHERE users_mail='".$_POST['userMail']."' AND users_password='".$_POST['userPwd']."' AND users_type='admin'";

	// Envoyer la requete au serveur 
	$req = mysqli_query($connexion, $sql) or die(mysqli_error($connexion));

	// Le nombre de lignes de résultats trouvés
	// echo mysqli_num_rows($req);

	if (mysqli_num_rows($req) == 1) {
		// Stocker la ligne d'enregistrement retournée après notre requete dans une variable de type tableau
		$datas = mysqli_fetch_assoc($req);
/*		echo "<pres>";
		print_r($datas);
		echo "<pres>";*/

		// On met en session son prénom et son type 
		$_SESSION['user']['name'] = $datas['users_name'];
		$_SESSION['user']['firstname'] = $datas['users_firstname'];
		$_SESSION['user']['type'] = $datas['users_type'];

		header('Location: ../index.php');
	} else {
		// Si l'utilisateur n'existe pas ou se trompe des informations de connexion
		$_SESSION['user']['error'] = 'Problème d\'identifiant ou mot de passe!';
		header('Location: ../admin.php');
	}

}

?>