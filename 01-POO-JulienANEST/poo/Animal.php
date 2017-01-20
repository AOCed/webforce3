<?php 

// abstract : une classe pour hériter, mais pas pour instancier
abstract class Animal 
{

	protected $nom = 'animal';

	public function getNom()
	{
		return $this->nom;
	}

	public function setNom($nom)
	{
		$this->nom = $nom;
		return $this;
	}

	public function identifier(){
		return 'Je suis un animal';
	}

	// une méthode abstraite doit etre définie dans les classes qui surcharge
	abstract public function crier();
}

class Chat extends Animal 
{

	protected $nom = "chat";

	public function crier() {
		return "Miaou";
	}

	public function identifier(){

		// Parent permet de faire référence 
		return parent::identifier()." et je suis un ".$this->nom;
	}

	// une classe qui contient une méthode abstraite doit être déclarée abstraite
	// abstract public function manger();

}

class Chien extends Animal {

	public function crier() {
		return "Wouaf";
	}
}

class Maitre {
	/**
	 * 
	 * @var Animal
	 */
	private $animal;
	
	public function getAnimal(){
		return $this->animal;
	}
	
	public function setAnimal(Animal $animal){
		$this->animal = $animal;
	}
	public function frappeAnimal(){
		// $this->animal est un objet Animal cette m�thode ou etre declaree abstrait
		return $this->animal->crier();
	}
}



// Erreur les deux lignes suivantes: avec abstract class -> On ne peut pas instasncier une classe Abstraite
// $animal = new Animal(); 
// echo $animal->getNom();

$chat = new Chat();

// echo $chat->getNom();
// echo "<hr>";
// echo $chat->crier();
// echo "<hr>";
// echo $chat->identifier();

$chien = new Chien();

$maitre1 = new Maitre();
$maitre2 = new Maitre();

$maitre1->setAnimal($chat);
$maitre2->setAnimal($chien);

echo "<hr>";
echo $maitre1->frappeAnimal()."<br>";
echo $maitre2->frappeAnimal();










?>