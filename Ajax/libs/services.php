<?php 

// print_r($_POST);
// $_REQUEST va inclure $_POST et $_POST
// print_r($_REQUEST);
require_once('../inc/connection.inc.php');
require_once("../inc/functions.inc.php");
// Je veux enregistrer l'email dans une table newsletter dans une BDD AJAX

switch ($_GET['action']) {
	case "addNewsletter":
		addNewsletter();
		break;
	case "addChat":
		addChat();
		break;
	case "getChats":
		getChats();
		break;
}

function addNewsletter(){
	// Je veux utiliser la connexion deja crée;
	global $connection;
	$email = $_REQUEST["email"];

	// Vérification de sécurité
	if (!empty($email) && (filter_var($email, FILTER_VALIDATE_EMAIL) !== false)) {

		// Tableau associatif des infos à enregistrer dans la table newsletter
		$data = ["email"=>$email];

		// Requete SQL pour ajouter une ligne
		$sql = "INSERT INTO newsletter (email) VALUES ( :email) ";
		$req = $connection->prepare($sql);
		$req->execute($data);

		// Message de retour
		echo "Merci de votre inscription avec $email";

	}
}

function addChat() {
	global $connection;

	$pseudo = $_REQUEST["pseudo"];
	$message = $_REQUEST["message"];
	$date = date("Y-m-d H:i:s");

	if (!empty($pseudo) && !empty($message)) {
		$data = array(
			"pseudo"=>$pseudo,
			"message"=>$message,
			"date"=>$date
		);

		$sql = "INSERT INTO chat (chat_pseudo, chat_message, chat_date) VALUES ( :pseudo, :message, :date)";
		$req = $connection->prepare($sql);
		$req->execute($data);
	}

	getChats();
}

?>