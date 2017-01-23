<?php
// Model/Abonne.php
namespace Model;

use App\Cnx;

class Livre {
	
	/**
	 *
	 * @var int
	 */
	private $id;
	/**
	 *
	 * @var string
	 */
	private $titre;
	/**
	 *
	 * @var string
	 */
 	private $auteur;
 	
 	/**
 	 * 
 	 * @var int
 	 */
 	private $annee;
	/**
	 * 
	 * @var string
	 */
	private $description;
	
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
	public function getTitre() {
		return $this->titre;
	}
	
	/**
	 *
	 * @return string
	 */
	public function getAuteur() {
		return $this->auteur;
	}
	
	/**
	 *
	 * @return int
	 */
	public function getAnnee() {
		return $this->annee;
	}
	
	/**
	 *
	 * @return string
	 */
	public function getDescription() {
		return $this->description;
	}
	
	/**
	 *
	 * @return int
	 */
	public function setId($id) {
		$this->id = $id;
		return $this;
	}
	
	/**
	 *
	 * @return string
	 */
	public function setTitre($titre) {
		$this->titre = $titre;
		return $this;
	}
	
	/**
	 *
	 * @return string
	 */
	public function setAuteur($auteur) {
		$this->auteur = $auteur;
		return $this;
	}
	
	/**
	 *
	 * @return int
	 */
	public function setAnnee($annee) {
		$this->annee = $annee;
		return $this;
	}
	
	/**
	 *
	 * @return string
	 */
	public function setDescription($description) {
		$this->description = $description;
		return $this;
	}
	
	public static function fetchAll() {
	
		$cnx = Cnx::getInstance();
		$stmt = $cnx->query('SELECT * FROM livre ');
	
		//echo self::class;
		//self::class retourne le nom complet de la classe
		return $stmt->fetchAll(\PDO::FETCH_CLASS, self::class);
	
	}
	public static function find($id){
		$cnx = Cnx::getInstance();
		$stmt = $cnx->query('SELECT * FROM livre WHERE id=' . $id);
		return $stmt->fetchObject(self::class);
	}
	
	public static function findTitre($titre){
		$cnx = Cnx::getInstance();
		$titre = $cnx->quote("%$titre%");
		$stmt = $cnx->query('SELECT * from livre WHERE titre LIKE ' . $titre);
		return $stmt->fetchAll(\PDO::FETCH_CLASS, self::class);
	}
	
	public static function validateTitre($titre, &$msg) {
		if(empty($titre)) {
			$msg = "Le titre est obligatoire";
			return false;
		} elseif (strlen($titre)>50){
			$msg = "Le titre ne doit pas dépasser plus de 50 caractères.";
			return false;
		}
	
		return true;
	}
	
	public static function validateAuteur($auteur, &$msg) {
		if(empty($auteur)) {
			$msg = "L'auteur est obligatoire";
			return false;
		} elseif (strlen($auteur)>50){
			$msg = "L'auteur ne doit pas dépasser plus de 50 caractères.";
			return false;
		}
	
		return true;
	}
	
	public function save() {
		if($this->id){
			$this->update();
		} else {
			$this->insert();
		}
	}
	
	public function insert(){
		$cnx = Cnx::getInstance();
	
		$titre = $cnx->quote($this->titre);
		$auteur = $cnx->quote($this->auteur);
		$annee = $cnx->quote($this->annee);
		$description = $cnx->quote($this->description);
		$query = <<<EOS
INSERT INTO livre (titre, auteur, annee, description)
VALUES ($titre, $auteur, $annee, $description)
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
UPDATE livre SET
titre = {$cnx->quote($this->titre)},
auteur = {$cnx->quote($this->auteur)},
annee = {$cnx->quote($this->annee)},
description = {$cnx->quote($this->description)}
WHERE livre.id = {$cnx->quote($this->id)}
EOS;
		$cnx->exec($query);
	}
	
	
	public function delete() {
		$cnx = Cnx::getInstance();
	
		$cnx->exec('DELETE FROM livre WHERE livre.id='. $this->id);
	
		header('Location: livre.php');
	}
	
	
}






