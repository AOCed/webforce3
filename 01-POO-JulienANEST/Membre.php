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
}

// Instancier l'objet Membre
$membre = new Membre();


// Définir les attributs pseudo et mdp
$membre->setPseudo('hwaseon');
$membre->setMdp('ceci est mon mdp');

$membre2 = new Membre('test pseudo', 'test mot de passe');

// Afficher ces attributs 
echo "<br/>".$membre->getPseudo()." : ".$membre->getMdp();
echo "<br/>".$membre2->getPseudo()." : ".$membre2->getMdp();


$membre3 = new Membre();

// Utilisation de "l'interface fluide"
$membre3 
	->setPseudo("cestmoi") // setPseudo() Renvoie notre $membre3 (grace à return $this dans la méthode)
	->setMdp("Cestmonmdp") // et $membre3
;

echo "<br/>".$membre3->getPseudo()." : ".$membre3->getMdp();






?>