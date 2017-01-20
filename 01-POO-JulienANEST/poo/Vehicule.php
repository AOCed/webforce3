<?php 

/**
 * 
 * faire une classe Voiture à une classe Moto qui héritent de VÃ©hicule
 * empecher de pouvoir instancier Véhicule
 * empecher la voiture et la moto de surcharger la  methode demarrer()
 * obliger les vehicules à avoir une méthode getCarburant qui renverra 'diesel' pour voiture et 'essence' pour Moto
 * faire que la vitesse max de la voiture soit de 60km/h de plus qu'un vehiculel pour la voiture et de 30km/h de plus pour la moto
 * afficher les appels aux methodes demarrer(), getCarburant() et getVitesseMax() pour une voiture et pour une moto
 * 
 */

abstract class Vehicule 
{

	final public function demarrer()
	{
		return 'Je demarre';
	}

	public function getVitesseMax()
	{
		return 100;
	}

	abstract function getCarburant();

}

class Voiture extends Vehicule
{

	protected $nom ="Voiture";

	public function getNom(){
		return $this->nom;
	}

	public function getCarburant()
	{
		return 'diesel';
	}

	public function getVitesseMax()
	{
		return parent::getVitesseMax() + 60;
	}

}

class Moto extends Vehicule
{
	protected $nom ="Moto";

	public function getNom(){
		return $this->nom;
	}

	public function getCarburant()
	{
		return 'essence';
	}
	
	public function getVitesseMax()
	{
		return parent::getVitesseMax() + 30;
	}

}

$voiture = new Voiture();
$moto = new Moto();

echo $voiture->getNom().": <br/>".$voiture->demarrer()." avec ".$voiture->getCarburant().".<br/> Ma vitesse maximale est de ".$voiture->getVitesseMax()."km/h. <br/>";
echo "<hr>";
echo $moto->getNom().": <br/>".$moto->demarrer()." avec ".$moto->getCarburant().".<br/> Ma vitesse maximale est de ".$moto->getVitesseMax()."km/h.";


?>