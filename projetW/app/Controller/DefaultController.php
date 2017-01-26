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
		$this->show('default/home');
	}
	
	/**
	 * Page de test
	 */
	public function test()
	{
		$this->show('default/test');
		$movie = new \Manager\MovieManager();
		$film = $movie->find(1);
		
		$this->show('default/test', ['film' => $film]);
	}

}