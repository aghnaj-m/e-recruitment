<?php

class Membre {
    private $cin;
    private $nomfr;
    private $prenomfr;
    private $email;
    private $telephone;
    private $adresse;
    private $fonction;
    private $photo;
    private $password;
    private $grade;
    private $etablissement;
    function __construct($cin, $nomfr, $prenomfr, $email,$telephone, $adresse, $fonction, $photo, $grade, $etablissement,$password) {
        $this->cin = $cin;
        $this->nomfr = $nomfr;
        $this->prenomfr = $prenomfr;
        $this->telephone = $telephone;
        $this->email=$email;
        $this->adresse = $adresse;
        $this->fonction = $fonction;
        $this->photo = $photo;
        $this->grade = $grade;
        $this->etablissement = $etablissement;
        $this->password=md5($password);
    }
    public function getCin() {
        return $this->cin;
    }

    public function getNomfr() {
        return $this->nomfr;
    }

    public function getPrenomfr() {
        return $this->prenomfr;
    }


    public function getTelephone() {
        return $this->telephone;
    }

    public function getAdresse() {
        return $this->adresse;
    }

    public function getFonction() {
        return $this->fonction;
    }

    public function getPhoto() {
        return $this->photo;
    }


    public function getGrade() {
        return $this->grade;
    }

    public function getEmail() {
        return $this->email;
    }
    public function getPassword() {
        return $this->password;
    }

    public function getEtablissement() {
        return $this->etablissement;
    }

    public function setCin($cin) {
        $this->cin = $cin;
    }

    public function setNomfr($nomfr) {
        $this->nomfr = $nomfr;
    }

    public function setPrenomfr($prenomfr) {
        $this->prenomfr = $prenomfr;
    }

    public function setTelephone($telephone) {
        $this->telephone = $telephone;
    }

    public function setAdresse($adresse) {
        $this->adresse = $adresse;
    }

    public function setFonction($fonction) {
        $this->fonction = $fonction;
    }

    public function setPhoto($photo) {
        $this->photo = $photo;
    }

    public function setGrade($grade) {
        $this->grade = $grade;
    }

    public function setEtablissement($etablissement) {
        $this->etablissement = $etablissement;
    }
    public function setEmail($email) {
        $this->email = $email;
    }
    public function setPassword($password) {
        $this->password = $password;
    }



}
?>
