<?php 
/**
 * 
 * Une interface contient une liste de m�thode � d�finir quand on va l'implementer
 * 
 */
interface Texture {
	/**
	 * @return string
	 */
	public function getMatiere();
	
	public function getCouleur();
	
	/**
	 * La classe qui impl�mente l'interface devra d�finir la m�thode avec la meme visibilit�
	 * et les meme param�tres
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
 * Pour impl�menter une interface, on doit d�finir les m�thodes qu'elle contient
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
 * On peut h�riter d'une classe et impl�menter une interface
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
	// $volume est un objet d'une classe qui impl�mente l'interface Volume
	// D�s lors que la classe impl�mente cet interface, notre objet $volume a une m�thode getForme()
	return $volume->getForme();
}

$rectangle = new Rectangle();
$carre = new Carre();

echo $rectangle->getCouleur();
echo "<hr>";
echo getFormeVolume($carre)."<br/>";
echo getFormeVolume($rectangle);














?>