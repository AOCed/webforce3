<?php 

class Voiture 
{
	
	const NB_ROUES = 4;
	private static $contenanceReservoir = 50;
	private $couleur = "noir";

	/**
	 * 
	 * @var int le nombre de litres dans le reservoir
	 * 
	 */ 
	private $litresEssence = 5;

	public function getCouleur()
	{
		return $this->couleur;
	}
	
	public function setCouleur($couleur)
	{
		$this->couleur = $couleur;
	}
	
	public static function setContenanceReservoir($contenance)
	{
		self::$contenanceReservoir = $contenance;
	}
	
	public function getContenanceReservoir()
	{
		return self::$contenanceReservoir;
	}

	public function getLitresEssence() 
	{
		return $this->litresEssence;
	}

	public function setLitresEssence($litresEssence) 
	{
		$this->litresEssence = $litresEssence;

		return $this;
	}

}

class Pompe 
{

	const CONTENANCE = 800;
	private $litresEssence = 800;

	public function getContenance()
	{
		return $this->contenance;
	}

	public function setContenance($contenance){
		$this->contenance = $contenance;

		return $this;
	}

	public function getLitresEssence() 
	{
		return $this->litresEssence;
	}

	public function setLitresEssence($litresEssence) 
	{
		$this->litresEssence = $litresEssence;

		return $this;
	}

	/**
	 * 
	 *@param Voiture $voiture
	 * 
	 */ 
	public function fairePlein(Voiture $voiture)
	{

		// Mon Code
		// $essenceVoiture = $voiture->getLitresEssence();
		// $contenanceVoiture = $voiture->getContenanceReservoir();
		// // var_dump($contenanceVoiture);

		// while($essenceVoiture < $contenanceVoiture) {
		// 	$essenceVoiture ++;
		// }

		// $voiture->setLitresEssence($essenceVoiture);
		// $this->setLitresEssence(800 - ($essenceVoiture-5));


		// Code de Julien 
		// Combien d'essence pour faire le plein
		$besoinEssence = $voiture->getContenanceReservoir() - $voiture->getLitresEssence();

		// Fiare le plein c'est mettre le nombre de litre contenu à la valeur de la contenance du réservoir
		$voiture->setLitresEssence($voiture->getContenanceReservoir());
		
		// On enlèce le nombre de litres qu'il a fallu pour faire le plein
		$this->setLitresEssence($this->getLitresEssence()-$besoinEssence);


	}

}


$voiture = new Voiture();

echo "Le nombre de roue de la voiture est ".Voiture::NB_ROUES."<br/>";
echo "La contenance de réservoir au départ est ".$voiture->getContenanceReservoir()."<br/>";

$pompe = new Pompe();
echo "Avant plein : <br/>";
echo 'Essence dans la voiture est '.$voiture->getLitresEssence()."<br/>";
echo 'Essence dans la pompe est '.$pompe->getLitresEssence()."<br/>";

$pompe->fairePlein($voiture);
echo "Après plein : <br/>";
echo 'Essence dans la voiture est '.$voiture->getLitresEssence()."<br/>";
echo 'Essence dans la pompe est '.$pompe->getLitresEssence()."<br/>";

/*
Voiture::setContenanceReservoir(60);
echo "La couleur de la voiture est ".$voiture->getCouleur()." et sa contenance de réservoire est ".$voiture->getContenanceReservoir()."<br/>";

$voiture2 = new Voiture();
$voiture2->setCouleur('rouge');
echo "La couleur de la voiture 2 est ".$voiture2->getCouleur()." et sa contenance de réservoire est ".$voiture->getContenanceReservoir()."<br/>";
echo "La couleur de la voiture 1 est ".$voiture->getCouleur()." et sa contenance de réservoire est ".$voiture->getContenanceReservoir()."<br/>";

$voiture3 = new Voiture();
Voiture::setContenanceReservoir(40); // ca change que pour la voiture 3...
echo "La couleur de la voiture 3 est ".$voiture3->getCouleur()." et sa contenance de réservoire est ".$voiture3->getContenanceReservoir()."<br/>";

*/
?>