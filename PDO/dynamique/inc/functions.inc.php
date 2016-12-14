<?php 

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
	$_ENV['parentId'] 		= $datas->pa_parent_id;  
}

// Fonction qui affiche les menus
/**
*
* @param int $idPage l'id de la page
* @return html
*
**/

function displayMenu($idPage){
	global $connection;
	$html = "";
	// On selection les enfants de la page
	$sql = "SELECT pa_id, pa_title FROM pages WHERE pa_parent_id =?";
	$req = $connection->prepare($sql);
	$req->execute(array($idPage));

	if($req->rowCount()>0){
		$html = "<ul>";
		while($datas = $req->fetch(PDO::FETCH_OBJ)){
			$html .= "<li><a href='?page=".$datas->pa_id."'>".$datas->pa_title."</a></li>";
		} 
		$html .= "</ul>";
	}
	return $html;
}

function displayPath($idPage){
	global $connection;
	// On définit une variable à vide du chemin complet 
	$chemin_complet = "";
	if($idPage !=0) {
		// On récèpre les informations de la page en cours
		$sql = "SELECT pa_parent_id, pa_title FROM pages WHERE pa_id =?";
		$req = $connection->prepare($sql);
		$req->execute(array($idPage));
		$datas = $req->fetch(PDO::FETCH_OBJ);

		$chemin_page_en_cours = " <a href='?page=".$idPage."'>-> ".$datas->pa_title."</a>";
		// On remonte au parent
		$chemin_complet = displayPath($datas->pa_parent_id).$chemin_page_en_cours;
	} 
	return $chemin_complet;
}


 ?>