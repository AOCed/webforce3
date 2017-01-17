<?php 
/*
- Ecrire les getters et setters
le pseudo ne doit pas etre vide
le mdp doit faire au moins 6 caractères

- Instancier un objet membre
- Definir pseudo $ mdp pour cette objet puis les afficher

*/

class Membre {
	private $pseudo;
	private $mdp;
	protected $nom;

	// Constructeur de la classe dès lors qu'on instancie la classe, cette méthode est appelée automatiquement parcequ'elle a ce nom : __construct();
	public function __construct($pseudo = "moi", $mdp = "12345678"){
		// echo "voici le constructeur";
		$this->setPseudo($pseudo);
		$this->setMdp($mdp);
	}

	// Getter de pseudo
	public function getPseudo(){
		return $this->pseudo;
	}
	// Setter de pseudo
	public function setPseudo($pseudo){
		// if(!empty($pseudo))

		if($pseudo != "") {
			$this->pseudo = $pseudo;
		}
		// Interface fluide (fluent interface)
		// On retourne $this pour pouvoir enchainer les appels aux setters
		return $this;
	}
	// Getter de mot de passe
	public function getMdp(){
		return $this->mdp;
	}
	// Setter de mot de passe
	public function setMdp($mdp){
		if(strlen($mdp) > 6) {
			$this->mdp = $mdp;
		}
		// Interface fluide (fluent interface)
		// On retourne $this pour pouvoir enchainer les appels aux setters
		return $this;
	}

	public function getNom(){
		return $this->nom;
	}

	// Ajouter string dans le paramÃ¨tre pour imposer type de paramÃ¨tre
	public function setNom($nom){
		$this->nom = $nom;
		return $this;
	}

	public function accederBackOffice() {
		return false;
	}

}

class Admin extends Membre {

	public function displayPseudo() {
		// On ne peut pas utiliser $this->pseudo car $pseudo est un attribut privé
		echo $this->getPseudo();
	}

	public function displayNom() {
		// On peut utiliser $this->nom car $nom est un attribut protégé de Membre donc accesible depuis les classes qui en héritent
		echo $this->nom;
	}

	/**
	 * 
	 * Surcharge la méthode accederBackOffice() de membre
	 * Quand on appelle la méthode depuis un objet Admin, c'est cette méthode et non celle de membre
	 */ 
	final public function accederBackOffice() {
		return true;
	}
}


final class SuperAdmin extends Admin {
	// Erreur puisque on ne peut pas surcharger une méthode déclarer "final
	// public function accederBackOffice() {
	// 	return false;
	// }
}


// Instancier l'objet Membre
$membre = new Membre();
$admin = new Admin();


echo "C'est le pseudo et mot de passe obtenu utilisant les méthodes de la class Membre ".$admin->getPseudo().' : '.$admin->getMdp();
echo "<hr>";
echo "C'est le pseudo obtenu utilisant la méthode getPseudo de la classe Membre - ".$admin->getPseudo();
echo "<hr>";
echo "Le nom de la classe $ membre - ".get_class($membre)."<br/>";
echo "Le nom de la classe $ admin - ".get_class($admin);
echo "<hr>";

var_dump($admin instanceof Admin);
var_dump($admin instanceof Membre); // Du fait de l'héritage, $admin est aussi une instance of Membre
echo "<hr>";
$admin->setNom('Richard');
$admin->displayNom();
echo "<hr>";
var_dump($admin->accederBackOffice());
echo "<hr>";
$superAdmin = new SuperAdmin();
var_dump($superAdmin instanceof Admin);
var_dump($superAdmin instanceof Membre);
echo "<hr>";
// SuperAdmin hérite d'admin, c'est la méthode surchargée dans admin qui eset appelée ici
var_dump($superAdmin->accederBackOffice());




// Définir les attributs pseudo et mdp
// $membre->setPseudo('hwaseon');
// $membre->setMdp('ceci est mon mdp');

// $membre2 = new Membre('test pseudo', 'test mot de passe');

// Afficher ces attributs 
// echo "<br/>".$membre->getPseudo()." : ".$membre->getMdp();
// echo "<br/>".$membre2->getPseudo()." : ".$membre2->getMdp();


// $membre3 = new Membre();

// Utilisation de "l'interface fluide"
// $membre3 
// 	->setPseudo("cestmoi") // setPseudo() Renvoie notre $membre3 (grace à return $this dans la méthode)
// 	->setMdp("Cestmonmdp") // et $membre3
// ;

// echo "<br/>".$membre3->getPseudo()." : ".$membre3->getMdp();






?>