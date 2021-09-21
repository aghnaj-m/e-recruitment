<?php

class Experience {
    private $id;
    private $type;
    private $titre;
    private $etablissement;
    private $attestation;
    private $cin;

    function __construct($id, $type,$titre, $etablissement, $attestation, $cin) {
        $this->id = $id;
        $this->type = $type;
        $this->titre=$titre;
        $this->etablissement = $etablissement;
        $this->attestation = $attestation;
        $this->cin = $cin;
    }
    public function getId() {
        return $this->id;
    }

    public function getType() {
        return $this->type;
    }
    public function getTitre(){
      return $this->titre;
    }
    public function getEtablissement() {
        return $this->etablissement;
    }

    public function getAttestation() {
        return $this->attestation;
    }

    public function getCin() {
        return $this->cin;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setType($type) {
        $this->type = $type;
    }
    public function setTitre($titre){
      $this->titre=$titre;
    }
    public function setEtablissement($etablissement) {
        $this->etablissement = $etablissement;
    }

    public function setAttestation($attestation) {
        $this->attestation = $attestation;
    }

    public function setCin($cin) {
        $this->cin = $cin;
    }




}



 ?>
