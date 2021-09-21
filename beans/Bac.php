<?php

class Bac {
    private $id;
    private $serie;
    private $type;
    private $date;
    private $ville;
    private $fichier;
    private $cin;
    function __construct($id, $serie, $type, $date, $ville, $fichier, $cin) {
        $this->id = $id;
        $this->serie = $serie;
        $this->type = $type;
        $this->date = $date;
        $this->ville = $ville;
        $this->fichier = $fichier;
        $this->cin = $cin;
    }
    public function getId() {
        return $this->id;
    }

    public function getSerie() {
        return $this->serie;
    }

    public function getType() {
        return $this->type;
    }

    public function getDate() {
        return $this->date;
    }

    public function getVille() {
        return $this->ville;
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

    public function setSerie($serie) {
        $this->serie = $serie;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function setVille($ville) {
        $this->ville = $ville;
    }

    public function setFichier($fichier) {
        $this->fichier = $fichier;
    }

    public function setCin($cin) {
        $this->cin = $cin;
    }



}
   
