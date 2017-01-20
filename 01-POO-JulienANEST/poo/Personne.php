<?php 

class Personne {

	private $prenom;
        private $nom;

	/**
	 * 
	 * @var Panier
	 * 
	 */
	private $panier;

	public function __construct($prenom, $nom) {

		// l'utilisateur posséde un panier dès sa création (dès l'instanciation)
		$this->setPanier(new Panier());
                
		$this
			->setPrenom($prenom)
			->setNom($nom)
		;
		// Parce que les setters retournent $this, équivaut à :
		// $this->setPrenom($prenom);
		// $this->setNom($nom);
	}

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
		return $this;
	}

	public function getNom(){
		return $this->nom;
	}

	// Ajouter string dans le paramètre pour imposer type de paramètre
	public function setNom($nom){
		$this->nom = $nom;
		return $this;
	}

	public function getPanier() {
		return $this->panier;
	}

	// SETTER de Classe Panier, on peut utiliser que des attributs de panier
	public function setPanier(Panier $panier){
		$this->panier = $panier;

	}

/*	public function getNomComplet(){
		return $this->getPrenom()." ".$this->getNom();
	}*/

	// Pour afficher le nom complet sans utiliser fontion getNomComplet();
	public function __toString() {
		return "<br/>".$this->nom." ".$this->prenom;
	}
        
    public function addArticlePanier(Article $article) {

    	// Instanceof permet de savoir si une variable (ou un attribut) est une instance de la classe Panier, donc un objet de type Panier
    	if($this->panier instanceof Panier) {
        	$this->panier->addArticle($article);
    	}
    }
}

class Panier {

	private $articles = array();


	/**
	 * 
	 * @return  array
	 */
	public function getArticles() {

		return $this->articles;
	}

	/**
	 * 
	 * @param  array $articles
	 */	
	public function setArticles(array $articles) {
		
		// ne vérifie pas que chaque élément de $article est bien un objett Article
		// $this->articles = $articles;

		foreach ($articles as $article) {
			$this->addArticle($article);
		}
	
	}

	public function addArticle(Article $article) {

		$this->articles[] = $article;

	}

	public function displayArticles() {

		/*
		Sans m�thode __toString();
		$new_arr = [];

		foreach ($this->articles as $panierArticle) {
			$new_arr[] = $panierArticle->getNom();
		}

		echo implode(',',$new_arr);
		*/
	
		// Avec methode __toString();
		echo implode(',', $this->articles);
	}

}

class article {
	private $nom;

	public function __construct($nom = null) {
		$this->nom = $nom;
	}

	public function getNom() {
		return $this->nom;
	}
	
	public function setNom($nom) {
		$this->nom = $nom;
	}
	/**
	 * Methode "magique" appelée quand on essaie d'afficher l'objet 
	 * DOIT retourner une chaine de caractère
	 * 
	 * @return  string la représentation en chaine de caractère de l'objet
	 * 
	 */
	public function __toString() {
		return $this->nom;
	}
}


$personne = new Personne('Hwaseon', 'Lecouey');
// echo $personne->getNomComplet();

$panier = $personne->getPanier();

$chaussures = new Article('chaussures');
$chaussettes = new Article('chaussettes');

/* Cr�er un tableau avec 2 articles */
$articles = array($chaussures, $chaussettes);

$pull = new Article('pull');
$panier->addArticle($pull);

/* Ajouter ces articles au panier de la personne -- Utiliser la méthode setArticles() de Panier */
/* Cr�er un nouvel article et l'ajouter au panier -- Utiliser la méthode addArticle() de panier */
/* Afficher le contenu du panier de la personne -- Utiliser la méthode getArticles de Panier */
$jean = new Article('jean');
$panier->addArticle($jean);

$echarpe = new Article('echarpe');
$panier->addArticle($echarpe);

$mouchoire = new Article('mouchoire');
$personne->addArticlePanier($mouchoire);

$gants = new Article('gants');
$personne->addArticlePanier($gants);

$panier->setArticles($articles);

$panier->displayArticles();



echo $personne;


// $personne->setPrenom($truc);
// $personne->setPrenom('Julien');
// echo $personne->getPrenom();




?>