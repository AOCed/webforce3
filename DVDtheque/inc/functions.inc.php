<?php
require_once('init.inc.php');

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


	function search ($pQuery) {
		global $connection;
		
		$pQuery = explode(' ', $pQuery);

		$cCnt = count($pQuery);
		$regex = "";

		for ($i=0; $i < $cCnt; $i++) { 
			if($pQuery[$i] != ''){
				if ($i==0) {
					$regex .= $pQuery[$i];
				} else {
					$regex .= '|'.$pQuery[$i];
				}
			}
		}

		$regex = trim($regex, '|');

		$data = array('regex' => $regex);

		$sql = "SELECT * from list WHERE dvd_director REGEXP :regex or dvd_title REGEXP :regex or dvd_actors REGEXP :regex";
		$req = $connection->prepare($sql);
		$req->execute($data);

		return $req->fetchAll();
	}

	function showLetters() {

		global $connection;



		$sql = "SELECT DISTINCT SUBSTRING(dvd_title, 1, 1) as premlettre FROM `list` ORDER BY premlettre ASC";
		$req = $connection->query($sql);
		$req->execute();
		$d = $req->fetchAll();

		echo "<strong>Movie List by alphabet order</strong></br><strong>All</strong>";
		foreach ($d as $word) {

			echo '<a href="index.php?page=2&where='.$word['premlettre'].'">'.$word['premlettre']."</a>";
		}
	}


?>