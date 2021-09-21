<?php
//diplome class
class Diplome{

private $id;
private $specialite;
private $date;
private $etablissement;
private $ville;
private $type;
private $fichier;
private $cin;


function __construct($id, $specialite, $date, $etablissement, $ville, $type, $fichier, $cin) {
    $this->id = $id;
    $this->specialite = $specialite;
    $this->date = $date;
    $this->etablissement = $etablissement;
    $this->ville = $ville;
    $this->type = $type;
    $this->fichier = $fichier;
    $this->cin = $cin;
}

public function getId() {
    return $this->id;
}

public function getSpecialite() {
    return $this->specialite;
}

public function getDate() {
    return $this->date;
}

public function getEtablissement() {
    return $this->etablissement;
}

public function getVille() {
    return $this->ville;
}

public function getType() {
    return $this->type;
}

public function getFichier() {
    return $this->fichier;
}

public function getCin() {
    return $this->cin;
}

public function setId($id) {
    $this->id = $id;
}

public function setSpecialite($specialite) {
    $this->specialite = $specialite;
}

public function setDate($date) {
    $this->date = $date;
}

public function setEtablissement($etablissement) {
    $this->etablissement = $etablissement;
}

public function setVille($ville) {
    $this->ville = $ville;
}

public function setType($type) {
    $this->type = $type;
}

public function setFichier($fichier) {
    $this->fichier = $fichier;
}

public function setCin($cin) {
    $this->cin = $cin;
}
}
