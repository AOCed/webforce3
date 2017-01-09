<?php 

// print_r($_POST);
// $_REQUEST va inclure $_POST et $_POST
// print_r($_REQUEST);
require_once('../inc/connection.inc.php');
require_once("../inc/functions.inc.php");
// Je veux enregistrer l'email dans une table newsletter dans une BDD AJAX

switch ($_REQUEST['action']) {
	case "addNewsletter":
		addNewsletter();
		break;
	case "addChat":
		addChat();
		break;
	case "getChats":
		getChats();
		break;
	case "getDestinations":
		getDestinations();
		break;
	case "getSection":
		getSection();
		break;
	case "getJSON":
		getJSON();
		break;
	default:
		echo "service non défini";
		break;
}


function getJSON () {

	// COTE PHP ON A DE L'INFORMATION DANS UN TABLEAU ASSOCIATIF
	$tabAssoc = [
		"nom"		=> "maurice",
		"prenom"	=> "albert"
	];
	// JE VAIS TRANSFORMER CE TABLEAU ASSOCIATIF EN TEXTE JSON
	// http://php.net/manual/en/function.json-encode.php
	$texteJSON = json_encode($tabAssoc);
	
	// ENVOYER LE TEXTE JSON AU NAVIGATEUR
	echo $texteJSON;
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

	function getDestinations(){

		global $connection;

		$destination = $_POST['destination'];

		if (empty($_POST['destination'])) {
			return;
		}

		$data = array(
			"destination" => $destination."%"
		);

		$sql = "SELECT * FROM destination WHERE dst_city LIKE :destination or dst_country LIKE :destination";
		$req = $connection->prepare($sql);
		$req->execute($data);
		$data = $req->fetchAll();

		foreach ($data as $d) {
			echo "<div class='suggestion'>".$d['dst_city'].", ".$d['dst_country']."</div>";
		}
	}

	function getSection() {
		global $connection;

		$idSection = $_REQUEST['idSection'];	

		$datas = array();


		// $sql = "SELECT * FROM `list` ORDER BY `dvd_year` ASC";
		$sql = "SELECT * FROM `list` WHERE dvd_id > $idSection LIMIT 1";
		$req = $connection->prepare($sql);
		$req->execute(); 
		// $datas = $req->fetchAll();
/*		echo "<pre>";
		var_dump($data[0]);
		echo "</pre>";
		die();*/

		while($datas = $req->fetch()){
			// echo "<pre>";
			// var_dump($datas);
			// echo "</pre>";
			// die();
		//for ($i=0; $i < count($datas); $i++) { 

			echo "<section class='movie'>";
			echo "	<h2>Titre: ".$datas['dvd_title']."<h2>";
			echo "	<p>Synopsis: ".$datas['dvd_story']."</p>";
			echo "	<span>Réalisateur: ".$datas['dvd_director']." / </span>";
			echo "	<span>Acteur: ".$datas['dvd_actors']." / </span>";
			echo "	<span>Genre: ".$datas['dvd_genre']." / </span>";
			echo "	<span>Année de production: ".$datas['dvd_year']."</span>";
			echo "</section>";
		}
	}
?>