<?php

include_once 'beans/Commission.php';
include_once 'Connexion/Connexion.php';
include_once 'dao/IDao.php';

class CommissionService implements IDao {

    private $connexion;

    function __construct() {
        $this->connexion = new Connexion();
    }

    public function create($o) {
        $query = "INSERT INTO commission VALUES (NULL,?,?,?,now())";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($o->getNom(), $o->getDescription(),$o->getEtablissement())) or die('Error');
    }

    public function delete($id) {
        $query = "DELETE FROM commission WHERE id = ?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($id)) or die("erreur delete");
    }

    public function findAll() {
        $query = "select commission.id , nom , description , libelleFrancais, dateCreation from commission,etablissement where commission.etablissement = etablissement.id";
        $req = $this->connexion->getConnexion()->query($query);
        $f = $req->fetchAll(PDO::FETCH_OBJ);
        return $f;
    }

    public function findAllSpec($etab) {
        $query = "select commission.id , nom , description , libelleFrancais , dateCreation from commission,etablissement where commission.etablissement = etablissement.id and ( etablissement.id = '".$etab."' or etablissement.libelleFrancais  = '".$etab."')";
        $req = $this->connexion->getConnexion()->query($query);
        $f = $req->fetchAll(PDO::FETCH_OBJ);
        return $f;
    }


     public function update($o) {
        $query = "UPDATE commission SET nom=?,description=?,etablissement=? where id = ?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($o->getNom(), $o->getDescription(),$o->getEtablissement(),$o->getId())) or die('Error update');
    }


    public function getByMember($membre)
    {
        $query = "select * from commission join comiteMembres on commission.id = comiteMembres.idCommission where idMembre = '".$membre."'";
        $req = $this->connexion->getConnexion()->query($query);
        $f = $req->fetchAll(PDO::FETCH_OBJ);
        return $f;
    }


    public function getList($commission) {
        $query = "select cin,nom,prenom,grade,libelleFrancais,photo from comiteMembres join membre on comiteMembres.idMembre = membre.cin join etablissement on membre.etablissement = etablissement.id where idCommission = ".$commission;
        $req = $this->connexion->getConnexion()->query($query);
        $f = $req->fetchAll(PDO::FETCH_OBJ);
        return $f;
    }
    public function removeFromList($cin,$commission) {
        $query = "DELETE FROM comiteMembres WHERE idMembre = ? and idCommission = ?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($cin,$commission)) or die("erreur");
    }
    public function addToList($cin,$commission) {
        $query = "INSERT INTO comiteMembres VALUES (?,?,now())";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($cin,$commission)) or die('Error');
    }


    public function getMembersComs($membre)
    {
        $query = "select distinct idCommission from comiteMembres where idMembre ='".$membre."'";
        $req = $this->connexion->getConnexion()->query($query);
        $f = $req->fetchAll(PDO::FETCH_OBJ);
        return $f;
    }


  }


    ?>
