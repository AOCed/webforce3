<?php
namespace Controller;

use Model\SalleModel;



class SalleController extends DefaultController {
	
	public function salle()
	{
		$salles = new SalleModel();
		if(isset($_GET['id'])){
			$salles = $salles->find($_GET['id']);
		} else {
			$salles = $salles->findAll();
		}
		
		// debug($salles);
		// Salle -> nom du modèle, /salle -> nom du fonction(ou/et nom du dossier
		// 'salles' -> 
		// $salles -> données récupérées par findAll();
		$this->show('Salle/salle', ['salles' => $salles]);
	}

	
}






