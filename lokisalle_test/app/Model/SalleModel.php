<?php

namespace Model;

use \W\Model\Model;

class SalleModel extends Model
{
	protected $primaryKey = "id_salle";

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
	private $description;
	
	/**
	 *
	 * @var string
	 */
	private $pays;
	
	/**
	 *
	 * @var string
	 */
	private $ville;
	
	/**
	 *
	 * @var string
	 */
	private $photo;
	
	/**
	 *
	 * @var string
	 */
	private $adresse;
	
	/**
	 *
	 * @var int
	 */
	private $cp;
	
	/**
	 *
	 * @var int
	 */
	private $capacite;
	
	/**
	 *
	 * @var string
	 */
	private $categorie;
	
	// Getters
	
	public function getId() {
		return $this->id;
	}
	public function getTitre() {
		return $this->titre;
	}
	public function getDescription() {
		return $this->description;
	}
	public function getPays() {
		return $this->pays;
	}
	public function getVille() {
		return $this->ville;
	}
	public function getPhoto() {
		return $this->photo;
	}
	public function getAdresse() {
		return $this->adresse;
	}
	public function getCp() {
		return $this->cp;
	}
	public function getCapacite() {
		return $this->capacite;
	}
	public function getCategorie() {
		return $this->categorie;
	}
	
	// Setters
	public function setId($id){
		$this->id = $id;
		return $id;
	}
	public function setTitre($titre) {
		$this->titre = $titre;
		return $titre;
	}
	public function setDescription($description) {
		$this->description = $description;
		return $description;
	}
	public function setPays($pays) {
		$this->pays = $pays;
		return $pays;
	}
	public function setVille($ville) {
		$this->ville = $ville;
		return $ville;
	}
	public function setPhoto($photo) {
		$this->photo = $photo;
		return $photo;
	}
	public function setAdresse($adresse) {
		$this->adresse = $adresse;
		return $adresse;
	}
	public function setCp($cp) {
		$this->cp = $cp;
		return $cp;
	}
	public function setCapacite($capacite) {
		$this->capacite = $capacite;
		return $capacite;
	}
	public function setCategorie($categorie) {
		$this->categorie = $categorie;
		return $categorie;
	}
	
	public function salleAdd($data) {
	
		
	}
	
	public function salleDelete($id){
		$salle = new SalleModel();
		$salle = $salle->delete($id);
	
		$this->redirectToRoute('default_salle');
	}

}

















