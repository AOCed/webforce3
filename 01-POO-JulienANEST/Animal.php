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

	// une méthode abstraite doit etre définie dans les classes qui surcharge
	abstract public function crier();
}

class Chat extends Animal 
{

	protected $nom = "chat";

	public function crier() {
		return "Miaou";
	}

	// une classe qui contient une méthode abstraite doit être déclarée abstraite
	// abstract public function manger();

}

// Erreur les deux lignes suivantes: avec abstract class -> On ne peut pas instasncier une classe Abstraite
// $animal = new Animal(); 
// echo $animal->getNom();

echo "<hr>";

$chat = new Chat();
echo $chat->getNom();

echo "<hr>";
echo $chat->crier();

?>