<?php

class Commission {

    private $id;
    private $nom;
    private $description;
    private $etablissement;

    function __construct($id, $nom, $description,$etablissement) {
        $this->id = $id;
        $this->nom = $nom;
        $this->description = $description;
        $this->etablissement = $etablissement;
    }

    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getEtablissement() {
        return $this->etablissement;
    }


    public function setId($id) {
        $this->id = $id;
    }

    public function setLogo($nom) {
        $this->nom = $nom;
    }

    public function setDescription($description) {
        $this->description = $description;
    }
    
    public function setEtablissement($etablissement) {
        $this->etablissement = $etablissement;
    }


}
?>