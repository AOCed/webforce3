<?php
include_once('../inc/connexion.inc.php');
include_once('../inc/functions.inc.php');

// on vérifie que l'on a bien une action passée en GET
if(isset($_GET['action']) && $_GET['action']!=""){
	switch($_GET['action']){
		case "addNote":
			addNote();
		break;
		case "addEleve":
			addEleve();
		break;
		case "addMatiere":
			addMatiere();
		break;
		case "supMatiere":
			supprime('matieres','ma_id',5);
		break;
		case "supEleve":
			supprime('eleves','el_id',7);
		break;
		
		default:
			header('Location: ../index.php');
		break;
	}
} else {
	header('Location: ../index.php');
}


function addNote(){
	global $connexion;	
	//print_r($_POST);
	if($_POST['note'] != ""){
		$sql = "INSERT INTO notes (fk_el_id, fk_ma_id, no_note) VALUES (:eleveID,:matiereID, :note)";
		$req = $connexion->prepare($sql);
		$datas = array('eleveID'=>$_POST['eleves'], 'matiereID'=>$_POST['matieres'] , 'note'=>$_POST['note']);
		$req->execute($datas);
	}
	header('Location: ../index.php?page=6');
}


function addEleve(){
	global $connexion;
	
	if(!empty(trim($_POST['nom'])) && !empty(trim($_POST['prenom'])) ){
		$sql = "INSERT INTO eleves (el_name, el_firstname) VALUES (:name, :firstname)";
		$req = $connexion->prepare($sql);
		$datas = array('name'=> $_POST['nom'], 'firstname'=>$_POST['prenom']);
		$req->execute($datas);
	}
	  	
	header('Location: ../index.php?page=7');
}

function addMatiere(){
	global $connexion;
	
	if(!empty(trim($_POST['nom']))){
		$datas = array('name'=> $_POST['nom']);
		$sql = "SELECT ma_name FROM matieres WHERE ma_name = :name";
		$req = $connexion->prepare($sql);		
		$req->execute($datas);
		
		// si on a aucun résultat à la requete ci-dessus, alors pour insérer la nouvelle matière
		if($req->rowCount()==0){
			$sql = "INSERT INTO matieres (ma_name) VALUES (:name)";
			$req = $connexion->prepare($sql);		
			$req->execute($datas);
		}
		
	}
		
	header('Location: ../index.php?page=5');
}


function supprime($tableName,$ColName,$idPage){
	global $connexion;
	$sql = "DELETE FROM $tableName WHERE $ColName = ".$_GET['id'];
	$connexion->exec($sql);
	header('Location: ../index.php?page='.$idPage);
}

?>