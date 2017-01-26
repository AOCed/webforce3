<?php

namespace Controller;

use \W\Controller\Controller;

class ContactController extends Controller
{

	/**
	 * Affichage du formulaire
	 */
	public function form()
	{
		$this->show('contact/form');
	}

	/**
	 * Traitement du formulaire
	 */
	public function traitement()
	{
		
		$erreur = '';
		$ok = '';
		
		if(!empty($_POST)){
			
			$nom = strip_tags($_POST['nom']);
			$email = strip_tags($_POST['email']);
			$message = strip_tags($_POST['message']);
			
			if (strlen($message)< 5) {$erreur = "Le message est trop court.";}
			
			$ok = "Merci de nous avoir contacté";

		} else $erreur = "Il vous manque des informations nécessaire, réessayez.";

		$this->show('contact/traitement', ['erreur' => $erreur, 'ok' => $ok, 'nom' => $nom, 'email' => $email, 'message' => $message ]);
		

	}

}