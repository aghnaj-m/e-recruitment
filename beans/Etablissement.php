<?php

class Etablissement {

    private $id;
    private $logo;
    private $libelleArabe;
    private $libelleFrancais;
    private $abr;
    private $ville;

    function __construct($id, $logo, $libelleArabe, $libelleFrancais, $abr, $ville) {
        $this->id = $id;
        $this->logo = $logo;
        $this->libelleArabe = $libelleArabe;
        $this->libelleFrancais = $libelleFrancais;
        $this->abr = $abr;
        $this->ville = $ville;
    }

    public function getId() {
        return $this->id;
    }

    public function getLogo() {
        return $this->logo;
    }

    public function getLibelleArabe() {
        return $this->libelleArabe;
    }

    public function getLibelleFrancais() {
        return $this->libelleFrancais;
    }

    public function getAbr() {
        return $this->abr;
    }

    public function getVille() {
        return $this->ville;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setLogo($logo) {
        $this->logo = $logo;
    }

    public function setLibelleArabe($libelleArabe) {
        $this->libelleArabe = $libelleArabe;
    }

    public function setLibelleFrancais($libelleFrancais) {
        $this->libelleFrancais = $libelleFrancais;
    }

    public function setAbr($abr) {
        $this->abr = $abr;
    }

    public function setVille($ville) {
        $this->ville = $ville;
    }

}
?>