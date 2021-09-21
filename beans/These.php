<?php


class These {
    private $id;
    private $type;
    private $date;
    private $centre;
    private $fichier;
    private $candidat;
    function __construct($id, $type, $date, $centre, $fichier, $candidat) {
        $this->id = $id;
        $this->type = $type;
        $this->date = $date;
        $this->centre = $centre;
        $this->fichier = $fichier;
        $this->candidat = $candidat;
    }
    public function getId() {
        return $this->id;
    }

    public function getType() {
        return $this->type;
    }

    public function getDate() {
        return $this->date;
    }

    public function getCentre() {
        return $this->centre;
    }

    public function getFichier() {
        return $this->fichier;
    }

    public function getCandidat() {
        return $this->candidat;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function setCentre($centre) {
        $this->centre = $centre;
    }

    public function setFichier($fichier) {
        $this->fichier = $fichier;
    }

    public function setCandidat($candidat) {
        $this->candidat = $candidat;
    }



}
