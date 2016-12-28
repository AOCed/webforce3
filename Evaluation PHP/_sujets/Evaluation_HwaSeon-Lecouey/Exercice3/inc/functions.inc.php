<?php
require_once('init.inc.php');

	// Fonction qui récupère des informations de la page à partir de la base de données
	function extractInfoPage(){
		global $connection;
		$sql = "SELECT * FROM pages WHERE pa_id = ? ";
		$req = $connection->prepare($sql);
		$req->execute(array($_ENV['page']));
		
		$datas = $req->fetch(PDO::FETCH_OBJ);
		$_ENV['title'] 			= $datas->pa_title;
		$_ENV['keywords'] 		= $datas->pa_keywords;
		$_ENV['content'] 		= $datas->pa_content;
		$_ENV['description'] 	= $datas->pa_description;
		$_ENV['parenId'] 		= $datas->pa_parent_id;
	}

	// Fonction qui montre où se trouve l'utilisateur 
	function displayPath($idPage){
		global $connection;
		// on definit une variable à vide du chemin complet
		$chemin_complet = "";
		if($idPage != 0){
			// on récupère les information de la page en cours
			$sql = "SELECT pa_parent_id, pa_title FROM pages WHERE pa_id = ? ";
			$req = $connection->prepare($sql);
			$req->execute(array($idPage));
			$datas = $req->fetch(PDO::FETCH_OBJ);
			
			$chemin_page_en_cours = " ><a href='?page=".$idPage."'>".$datas->pa_title."</a>";
			
			// on remonte au parent
			$chemin_complet = displayPath($datas->pa_parent_id).$chemin_page_en_cours;
			
			
		}
		// renvoie le chemin complet
		return $chemin_complet;
	}

	// Fonction qui montre le contenu de la page
	function displayMenu($idPage){
		global $connection;
		// on selectionne les enfants de la page
		$sql = "SELECT pa_id, pa_title FROM pages WHERE pa_parent_id = ? ";
		$req = $connection->prepare($sql);
		$req->execute(array($idPage));
		$html = "";
		if($req->rowCount()>0){
			$html = "<ul>";
			while($datas = $req->fetch(PDO::FETCH_OBJ)){
				$html .= "<li><a href='?page=".$datas->pa_id."'>".$datas->pa_title."</a></li>";
			}
			$html .= "</ul>";
		}
		return $html;
	}

?>