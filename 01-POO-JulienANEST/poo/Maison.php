<?php 

class Maison {

	/**
	 * Constante de classe
	 * Comme une constante globale, sas valeur ne change jamais
	 * 
	 * On l'écrit en majuscule par convention (séparateur _(underscore) si plusieurs mots)
	 * ex: HAUTEUR_MAISON 
	 */
	const HAUTEUR = '10M';


	/** 
	* Valeur blanc par défaut pour l'attribut $couleur
	*
	* Ceci est un commentaire PHPDoc
	* $var string la couleur de la maison
	*
	*/
	private $couleur = "blanc";


	/**
	 * Un attribut static appartieint à la classe, et non aux objets qui l'instanacie
	 * 
	 * @var string
	 * 
	 */ 
	public static $espaceTerrain = "500M2";


	/**
	 * Un attribut static peut etre privé
	 * 
	 * @var int
	 * 
	 */
	private static $nbPieces = 5;


	/**
	 * Getter de l'attribut $couleur
	 * 
	 * @param string $couleur
	 * 
	 * $return string
	 */
	public function getCouleur() {
		return $this->couleur;
	}


	/**
	 * Setter de l'attribut $couleur
	 * 
	 * @param string $couleur
	 * 
	 * @return $this
	 */ 	
	public function setCouleur($couleur) {
		$this->couleur = $couleur;

		return $this;
	}


	/**
	 * Une methode statique est une méthode qu'on appelle via la classe, non pas une de ses instances
	 * 
	 * @return int
	 * 
	 */ 
	public static function getNbPieces() {
		// Self permet d'accéder à la classe elle même contrairement à $this qui fait référence à une instance de la classe
		// $this n'est pas accessible dans une méthode statique
		return self::$nbPieces;
	}


	public function getMonNbPiece(){
		return self::$nbPieces;
	}

}

$maison = new Maison();

echo "La couleur de la maison est ".$maison->getCouleur()."<br/>";

// Pour accéder à une constante de classe on utilise NomDeLaClasse::NOM_DE_LA_CONSTANTE
echo "La hauteur de la maison est ".Maison::HAUTEUR."<br>";

// Pour accéder à uun attribut statique appartenant à la classe
echo "L'espace terrain disponible est ".Maison::$espaceTerrain."<br>";

// Modification de l'attribut static $espaeTerrain
Maison::$espaceTerrain = "700M2";
echo "L'espace terrain disponible est ".Maison::$espaceTerrain."<br>";

// On ne peut pas avoir accès à cet attribut à l'extérieur de la classe
// echo Maison::$nbPieces;

// Appel à la fonction statique
echo "Le nombre de pièce est de ".Maison::getNbPieces()."<br>";
// Appel à la fonction normale à partir de l'attribut statique
echo "Mon nombre de pièce est de ".$maison->getMonNbPiece()."<br>";




?>