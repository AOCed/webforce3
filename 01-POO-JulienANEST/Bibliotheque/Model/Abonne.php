<?php

// Model/Abonne.php
namespace Model;

use App\Cnx;

class Abonne {
	
	/**
	 * 
	 * @var int
	 */
	private $id;
	
	/**
	 * 
	 * @var string
	 */
	private $nom;
	
	/**
	 * 
	 * @var string
	 */
	private $prenom;
	
	/**
	 * 
	 * @var string
	 */
	private $email;

	/**
	 * 
	 * @var string
	 */
	private $mdp;


	/**
	 * 
	 * @return int
	 */
	public function getId() {
		return $this->id;
	}
	
	/**
	 * 
	 * @return string
	 */
	public function getNom() {
		return $this->nom;
	}

	/**
	 * 
	 * @return string
	 */
	public function getPrenom() {
		return $this->prenom;
	}

	/**
	 * 
	 * @return string
	 */
	public function getEmail() {
		return $this->email;
	}

	/**
	 * 
	 * @return string
	 */
	public function getMdp() {
		return $this->mdp;
	}

	/**
	 * 
	 * @param int $id
	 */
	public function setId($id) {
			$this->id = $id;
			return $id;
		}
	
	/**
	 * 
	 * @param string $nom
	 */
	public function setNom($nom) {
		$this->nom = $nom;
		return $nom;
	}
	
	/** 
	 * 
	 * @param string $prenom
	 */
	public function setPrenom($prenom) {
		$this->prenom = $prenom;
		return $prenom;
	}

	/**
	*
	* @param string $email
	*/
	public function setEmail($email) {
		$this->email = $email;
		return $email;
	}

	/**
	*
	* @param string $mdp
	*/
	public function setMdp($mdp) {
		$this->mdp = $mdp;
		return $mdp;
	}
	
	public static function fetchAll() {
		
		$cnx = Cnx::getInstance();
		$stmt = $cnx->query('SELECT * FROM abonne ');
		
		//echo self::class;	
		//self::class retourne le nom complet de la classe
		return $stmt->fetchAll(\PDO::FETCH_CLASS, self::class);
		
	}
	
	public static function find($id){
		$cnx = Cnx::getInstance();
		$stmt = $cnx->query('SELECT * FROM abonne WHERE id=' . $id);
		return $stmt->fetchObject(self::class);
	}
	
	public static function findNom($nom){
		$cnx = Cnx::getInstance();
		$nom = $cnx->quote("%$nom%");
		$stmt = $cnx->query('SELECT * from abonne WHERE nom LIKE ' . $nom);
		return $stmt->fetchAll(\PDO::FETCH_CLASS, self::class);
	}
	
	// & -> http://php.net/manual/fr/language.references.pass.php 
	public static function validatePrenom($prenom, &$msg) {
		if(empty($prenom)) {
			$msg = "Le prénom est obligatoire";
			return false;
		} elseif (strlen($prenom)>50){
			$msg = "Le prénom ne doit pas dépasser plus de 50 caractères.";
			return false;
		}
		
		return true;	
	}
	
	public static function validateNom($nom, &$msg) {
		
		if(empty($nom)) {
			$msg = "Le nom est obligatoire";
			return false;
		} elseif (strlen($nom)>100){
			$msg = "Le nom ne doit pas dépasser plus de 100 caractères.";
			return false;
		}
	
		return true;
	}
	

	public static function validateEmail($email, &$msg) {
		
		if(empty($email)) {
			$msg = "L'adresse email est obligatoire";
			return false;
		} elseif (strlen($nom)>100){
			$msg = "L'adresse email ne doit pas dépasser plus de 100 caractères.";
			return false;
		} elseif (!filter_var($email, FILTER_VAlIDATE_EMAIL)) {
			$msg = "Merci de rentrer correct email adresse.";
			return false;
		}
	
		return true;
	}

	// var_dump(filter_var($email, FILTER_VAlIDATE_EMAIL));

	public function save() {
		if($this->id){
			$this->update();
		} else {
			$this->insert();
		}
	}
	
	public function insert(){
		$cnx = Cnx::getInstance();
		
		$prenom = $cnx->quote($this->prenom);
		$nom = $cnx->quote($this->nom);
		$email = $cnx->quote($this->email);
		$query = <<<EOS
INSERT INTO abonne(prenom, nom, email)
VALUES ($prenom, $nom, $email)
EOS;
		$cnx->exec($query);
		$this->setId($cnx->LastInsertId());
	}
	
	public function update(){
		$cnx = Cnx::getInstance();
		
// 		$prenom = $cnx->quote($this->prenom);
// 		$nom = $cnx->quote($this->nom);
// 		$id = $cnx->quote($this->id);
		$query = <<<EOS
UPDATE abonne SET 
prenom = {$cnx->quote($this->prenom)}, 
nom = {$cnx->quote($this->nom)},
email = {$cnx->quote($this->email)}
WHERE abonne.id = {$cnx->quote($this->id)}
EOS;
		$cnx->exec($query);
	}

	
	public function delete() {
		$cnx = Cnx::getInstance();

		$cnx->exec('DELETE FROM abonne WHERE abonne.id='. $this->id);
		
		header('Location: abonne.php');
	}
}











