<?php

namespace Controller;

use \W\Controller\Controller;

class DefaultController extends Controller
{


	/**
	 * Page d'accueil par défaut
	 */
	public function home()
	{
		$this->show('default/home',  ['username' => 'nov']);
	}
	public function salle() 
	{	
		$this->show('Salle/salle');	
		
	}
	public function plan()
	{
		$this->show('default/plan');
	}

	


}

