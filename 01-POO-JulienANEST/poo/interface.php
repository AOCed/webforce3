<?php 
/**
 * 
 * Une interface contient une liste de méthode à définir quand on va l'implementer
 * 
 */
interface Texture {
	/**
	 * @return string
	 */
	public function getMatiere();
	
	public function getCouleur();
	
	/**
	 * La classe qui implémente l'interface devra définir la méthode avec la meme visibilité
	 * et les meme paramètres
	 * @param type $couleur
	 */
	public function setCouleur($couleur);
}

interface Volume {
	
	public function getForme();
	
	public function getContenance();
}

/**
 * 
 * Pour implémenter une interface, on doit définir les méthodes qu'elle contient
 *
 */
class Objet implements Texture {
	
	protected $couleur;
	
	public function getMatiere(){
		return 'Bois';
	}

	public function getCouleur(){
		return $this->couleur;
	}
	
	public function setCouleur($couleur){
		$this->couleur = $couleur;
	}
}

/**
 * 
 * On peut hériter d'une classe et implémenter une interface
 *
 */
class Carre extends Objet implements Volume {

	public function getForme() {
		return 'Carre';
	}
	
	public function getContenance(){
		return 50;
	}
}

class Rectangle implements Volume, Texture {
	
	protected $couleur = "rose";
	
	public function getMatiere(){
		return 'Pierre';
	}
	
	public function setCouleur($couleur){
		$this->couleur = $couleur; 
	}
	
	public function getCouleur(){
		return $this->couleur;
	}
	
	public function getForme(){
		return 'Rectangle';
	}
	
	public function getContenance(){
		return 45;
	}

}

function getFormeVolume(Volume $volume) {
	// $volume est un objet d'une classe qui implémente l'interface Volume
	// Dès lors que la classe implémente cet interface, notre objet $volume a une méthode getForme()
	return $volume->getForme();
}

$rectangle = new Rectangle();
$carre = new Carre();

echo $rectangle->getCouleur();
echo "<hr>";
echo getFormeVolume($carre)."<br/>";
echo getFormeVolume($rectangle);














?>