<?php 
require_once('../inc/init.inc.php');

	function displaySelect(){
		global $connexion;

		$sql = "SELECT * FROM salle";
		$req = $connexion->prepare($sql);
		$req->execute();

		$html = "<select name='salle'>";
			while($data=$req->fetch()){
			$html .= '<option value='.$data['id_salle'].">".$data['id_salle']." - ".$data['titre']." - ".$data['adresse'].", ".$data['cp'].', '.$data['ville']." - ".$data['capacite']."pers".'</option>';
			}
		$html .= '</select>';
		return $html;
	}

	?>

