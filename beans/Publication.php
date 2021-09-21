<?php

class Publication{
    private $id;
    private $url;
    private $titre;
    private $type;
    private $date;
    private $candidat;
    private $fichier;
    function __construct($id, $url, $titre, $type, $date, $candidat, $fichier) {
        $this->id = $id;
        $this->url = $url;
        $this->titre = $titre;
        $this->type = $type;
        $this->date = $date;
        $this->candidat = $candidat;
        $this->fichier = $fichier;
    }
    public function getId() {
        return $this->id;
    }

    public function getUrl() {
        return $this->url;
    }

    public function getTitre() {
        return $this->titre;
    }

    public function getType() {
        return $this->type;
    }

    public function getDate() {
        return $this->date;
    }

    public function getCandidat() {
        return $this->candidat;
    }

    public function getFichier() {
        return $this->fichier;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setUrl($url) {
        $this->url = $url;
    }

    public function setTitre($titre) {
        $this->titre = $titre;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function setCandidat($candidat) {
        $this->candidat = $candidat;
    }

    public function setFichier($fichier) {
        $this->fichier = $fichier;
    }





}


?>
