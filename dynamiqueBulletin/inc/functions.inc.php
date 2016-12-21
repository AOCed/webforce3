<?php
function extractInfoPage(){
	global $connexion;
	$sql = "SELECT * FROM pages WHERE pa_id = ? ";
	$req = $connexion->prepare($sql);
	$req->execute(array($_ENV['page']));
	
	$datas = $req->fetch(PDO::FETCH_OBJ);
	$_ENV['title'] 			= $datas->pa_title;
	$_ENV['keywords'] 		= $datas->pa_keywords;
	$_ENV['content'] 		= $datas->pa_content;
	$_ENV['description'] 	= $datas->pa_description;
	$_ENV['parenId'] 		= $datas->pa_parent_id;
}




/**
* fonction qui affiche les menus
* 
* @param int $idPage l'id de la page
* 
* @return html
*/
function displayMenu($idPage){
	global $connexion;
	// on selectionne les enfants de la page
	$sql = "SELECT pa_id, pa_title FROM pages WHERE pa_parent_id = ? ";
	$req = $connexion->prepare($sql);
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


function displayPath($idPage){
	global $connexion;
	// on definit une variable à vide du chemin complet
	$chemin_complet = "";
	if($idPage != 0){
		// on récupère les information de la page en cours
		$sql = "SELECT pa_parent_id, pa_title FROM pages WHERE pa_id = ? ";
		$req = $connexion->prepare($sql);
		$req->execute(array($idPage));
		$datas = $req->fetch(PDO::FETCH_OBJ);
		
		$chemin_page_en_cours = " -> <a href='?page=".$idPage."'>".$datas->pa_title."</a>";
		
		// on remonte au parent
		$chemin_complet = displayPath($datas->pa_parent_id).$chemin_page_en_cours;
		
		
	}
	// renvoie le chemin complet
	return $chemin_complet;
}


function displaySelect($tableName,$colValue,$colDisplay){
	global $connexion;
	$sql = "SELECT * FROM ".$tableName;
	$req = $connexion->prepare($sql);
	$req->execute();
	
	$html = '<select name="'.$tableName.'">';
	while($datas = $req->fetch()){
		$html .= '<option value="'.$datas[$colValue].'">'.$datas[$colDisplay].'</option>';
	}
	
	$html .= '</select>';
	
	return $html;
}


function getResultsByMatiere($idMatiere){
	global $connexion;
	$sql = "
			SELECT
			  TRUNCATE(AVG(no_note),2) AS noteAvg, MIN(no_note) AS noteMin, MAX(no_note) AS noteMax
			FROM
			  notes
			WHERE
			  fk_ma_id = :idMatiere
	";
	$req = $connexion->prepare($sql);
	$data = array('idMatiere'=>$idMatiere);
	$req->execute($data);
	 
	return $req->fetch();
}


function displayListEleves(){
	global $connexion;
	$sql = "
SELECT
  *
FROM
  `eleves`
ORDER BY
  `eleves`.`el_name`,
  `eleves`.`el_firstname`
";
	$req = $connexion->query($sql);
	$html = "";
	while($datas = $req->fetch()){
		$html .= $datas['el_name']." ".$datas['el_firstname']." <a href='libs/services.php?action=supEleve&id=".$datas['el_id']."'>Supp</a><br />";
	}
	return $html;
}

function displayListMatieres(){
	global $connexion;
	$sql = "
SELECT
  *
FROM
  `matieres`
ORDER BY
  `matieres`.`ma_name`
";
	$req = $connexion->query($sql);
	$html = "";
	while($datas = $req->fetch()){
		$html .= $datas['ma_name']." <a href='libs/services.php?action=supMatiere&id=".$datas['ma_id']."'>Supp</a><br />";
	}
	return $html;
}


?>