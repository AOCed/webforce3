<?php

namespace Model;

class Salle 
{
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
	public function setTitre($titre) {
		$this->titre = $titre;
		return $titre;
	}
	public function getDescription($description) {
		$this->description = $description;
		return $description;
	}
	public function getPays($pays) {
		$this->pays = $pays;
		return $pays;
	}
	public function getVille($ville) {
		$this->ville = $ville;
		return $ville;
	}
	public function getPhoto($photo) {
		$this->photo = $photo;
		return $photo;
	}
	public function getAdresse($adresse) {
		$this->adresse = $adresse;
		return $adresse;
	}
	public function getCp($cp) {
		$this->cp = $cp;
		return $cp;
	}
	public function getCapacite($capacite) {
		$this->capacite = $capacite;
		return $capacite;
	}
	public function getCategorie($categorie) {
		$this->categorie = $categorie;
		return $categorie;
	}
	

	
}

















