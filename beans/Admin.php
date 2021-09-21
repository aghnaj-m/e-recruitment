<?php

class Admin {

    private $cin;
    private $nom;
    private $prenom;
    private $telephone;
    private $adresse;
    private $photo;
	private $etablissement;
	

	function __construct($cin, $nom, $prenom, $telephone, $adresse, $photo,$etablissement) {
        $this->cin = $cin;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->telephone = $telephone;
        $this->adresse = $adresse;
		$this->photo = $photo;
		$this->etablissement = $etablissement;
    }


	public function getCin() {
		return $this->cin;
	}

	public function setCin($cin) {
		$this->cin = $cin;
	}

	public function getNom() {
		return $this->nom;
	}

	public function setNom($nom) {
		$this->nom = $nom;
	}

	public function getPrenom() {
		return $this->prenom;
	}

	public function setPrenom($prenom) {
		$this->prenom = $prenom;
	}

	public function getTelephone() {
		return $this->telephone;
	}

	public function setTelephone($telephone) {
		$this->telephone = $telephone;
	}

	public function getAdresse() {
		return $this-adresse;
	}

	public function setAdresse($adresse) {
		$this->adresse = $adresse;
	}

	public function getPhoto() {
		return $this->photo;
	}

	public function setPhoto($photo) {
		$this->photo = $photo;
	}

	public function getEtablissement() {
		return $this->etablissement;
	}

	public function setEtablissement($etablissement) {
		$this->etablissement = $etablissement;
	}

    


}