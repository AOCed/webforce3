<?php
namespace Controller;

use Model\SalleModel;



class SalleController extends DefaultController {
	
	public function salle()
	{

			$salle = null;
			$salles = new SalleModel();
			$salles = $salles->findAll();
	
			if(isset($_GET['id'])){
				$salle = new SalleModel();
				$salle = $salle->find($_GET['id']);
			
			}
			// Salle -> nom du modèle, /salle -> nom du fonction(ou/et nom du dossier
			// 'salles' -> 
			// $salles -> données récupérées par findAll();
			// debug($salles);
			$this->show('salle/salle', ['salle'=> $salle, 
										'salles' => $salles]);
			

	}
	
	public function salleEdit() {
		
		if(isset($_POST) ){
			$salle = new SalleModel();
			$id = $salle['id_salle'];
			$data =  array(
					'titre'=>strip_tags($_POST['titre']),
			);

			$salle->update($data, $id);
			$this-> redirectToRoute('salle');
			// debug($salle);
		}
		
	}
	
	public function salleDelete($id){
		$salle = new SalleModel();
		$salle = $salle->delete($id);
	
		$this->redirectToRoute('default_salle');
	}



}






