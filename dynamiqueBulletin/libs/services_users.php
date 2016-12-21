<?php
session_start();
require('../inc/connexion.inc.php');

// on vérifie que l'on a bien une action passée en GET
if(isset($_GET['action']) && $_GET['action']!=""){
	switch($_GET['action']){
		case "verifConnect":
			verifConnect();
		break;
		
		default:
			header('Location: ../index.php');
		break;
	}
} else {
	header('Location: ../index.php');
}


function verifConnect(){
	global $connexion;
	
	// ecrire une requete sql pour tester si utilisateur qui essaie de se connecter est connu ET est un admin
	$sql = "SELECT * FROM users WHERE us_mail='".$_POST['usMail']."'  AND us_password='".$_POST['usPwd']."' AND us_type='admin'";
	//echo $sql;
	
	// on envoie la requete sql au serveur
	$req = mysqli_query($connexion, $sql) or die (mysqli_error($connexion));
	// le nombre de lignes de résultats trouvés
	//echo mysqli_num_rows($req);
	
	if(mysqli_num_rows($req)==1){
		// je stocke LA ligne d'enregistrement retournée après notre requète dans une variable de type tableau
		$datas = mysqli_fetch_assoc($req);
		
		/*echo "<pre>";
		print_r($datas);
		echo "</pre>";*/
		
		// on met en session son prénom et son type
		$_SESSION['user']['firstname'] = $datas['us_firstname'];
		$_SESSION['user']['type'] = $datas['us_type'];
		
		header('Location: ../index.php');
	} else {
		// si l'utilisateur n'existe pas, ou n'est pas admin
		header('Location: ../admin.php');
	}
	
}
?>