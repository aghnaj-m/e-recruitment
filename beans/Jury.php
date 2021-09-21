<?php

class Jury {
    private $id;
    private $nom;
    private $prenom;
    private $etablissement;
    private $grade;
    private $idThese;

    function __construct($id, $nom,$prenom, $etablissement, $grade, $idThese) {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom=$prenom;
        $this->etablissement = $etablissement;
        $this->grade = $grade;
        $this->idThese = $idThese;
    }
    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }
    public function getPrenom(){
      return $this->prenom;
    }
    public function getEtablissement() {
        return $this->etablissement;
    }

    public function getGrade() {
        return $this->grade;
    }

    public function getIdThese() {
        return $this->idThese;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }
    public function setPrenom($prenom){
      $this->prenom=$prenom;
    }
    public function setEtablissement($etablissement) {
        $this->etablissement = $etablissement;
    }

    public function setGrade($grade) {
        $this->grade = $grade;
    }

    public function setIdThese($idThese) {
        $this->idThese = $idThese;
    }




}



 ?>
