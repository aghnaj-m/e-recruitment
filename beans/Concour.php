<?php

class Concour {
    private $id;
    private $session;
    private $dateDebutDepot;
    private $dateFinDepot;
    private $etat;
    private $nbrPoste;
    private $type;
    private $etablissement;
    private $commission;
   
    function __construct($id, $session, $dateDebutDepot, $dateFinDepot, $etat, $nbrPoste, $type, $etablissement,$commission) {
        $this->id = $id;
        $this->session = $session;
        $this->dateDebutDepot = $dateDebutDepot;
        $this->dateFinDepot = $dateFinDepot;
        $this->etat = $etat;
        $this->nbrPoste = $nbrPoste;
        $this->type = $type;
        $this->etablissement = $etablissement;
        $this->commission = $commission;
    }
    public function getId() {
        return $this->id;
    }

    public function getSession() {
        return $this->session;
    }

    public function getDateDebutDepot() {
        return $this->dateDebutDepot;
    }

    public function getDateFinDepot() {
        return $this->dateFinDepot;
    }

    public function getEtat() {
        return $this->etat;
    }

    public function getNbrPoste() {
        return $this->nbrPoste;
    }

    public function getType() {
        return $this->type;
    }

    public function getEtablissement() {
        return $this->etablissement;
    }

    public function getCommission()
    {
        return $this->commission;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setSession($session) {
        $this->session = $session;
    }

    public function setDateDebutDepot($dateDebutDepot) {
        $this->dateDebutDepot = $dateDebutDepot;
    }

    public function setDateFinDepot($dateFinDepot) {
        $this->dateFinDepot = $dateFinDepot;
    }

    public function setEtat($etat) {
        $this->etat = $etat;
    }

    public function setNbrPoste($nbrPoste) {
        $this->nbrPoste = $nbrPoste;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function setEtablissement($etablissement) {
        $this->etablissement = $etablissement;
    }

    public function setCommission($commission) {
        $this->commission = $commission;
    }
    



}
