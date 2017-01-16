<?php 

class Personne {
	private $prenom;
	private $nom;

	/* GETTER */
	public function getPrenom(){
		return $this->prenom;
	}

	/* SETTER */	
	public function setPrenom($prenom){
		if (is_string($prenom)) {
			$this->prenom = $prenom;
		}
		$this->prenom = $prenom;
	}

	public function getNom(){
		return $this->nom;
	}

	// Ajouter string dans le paramètre pour imposer type de paramètre
	public function setNnom(string $nom){
		$this->nom = $nom;
	}

	// SETTER de Classe Panier, on peut utiliser que des attributs de panier
	public function setPanier(Panier $panier){
		$this->panier = $panier;
	}
}

$truc = 'Toto';
$personne = new Personne();

$personne->setPrenom($truc);
$personne->setPrenom('Julien');

echo $personne->getPrenom();

 ?>