<?php 

// Encapsulation est de vouloir ne pas mettre attributs public dans une classe

class Panier {

	// Une variable dans une classe on appelle Attribut
	public $nbProduits = 1;

	// Attribut privé : accessible uniquement depuis l'intérieur de la classe
	private $utilisateur = "Toto";

	// Une fonction on appelle Methode qui appartient à une class
	public function ajouterArticle() {
		return 'Article ajouté';
	}
	private function retirerArticle() {
		return 'Article retiré';
	}
	public function afficheUtilisateur(){
		// $this fait référence à l'objet instancié de la classe
		echo $this->utilisateur;
	}
	public function enleverArticle(){
		echo $this->retirerArticle();
	}

}



$panier = new Panier();
$panier2 = new Panier();

$panier->nbProduits = 5;

var_dump($panier->nbProduits);
var_dump($panier2->nbProduits);

echo "<br />";
echo $panier->ajouterArticle();

echo "<br />";

$panier->afficheUtilisateur();
echo "<br />";

$panier->enleverArticle();


?>