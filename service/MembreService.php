<?php

include_once 'beans/Membre.php';
include_once 'dao/IDao.php';

class MembreService implements IDao {

    private $connexion;

    function __construct() {
        $this->connexion = new Connexion();
    }

    public function create($o) {
        $query = "INSERT INTO membre VALUES (?,?,?,?,?,?,?,?,?,?,?)";
        $req = $this->connexion->getConnexion()->prepare($query);
        $arr = array($o->getCin(),$o->getNomfr(), $o->getPrenomfr(),$o->getTelephone(), $o->getAdresse(), $o->getFonction(), $o->getPhoto(), $o->getGrade(),$o->getEtablissement(),$o->getEmail(),$o->getPassword());
        $req->execute($arr) or die('Error nrml');
    }



    public function delete($cin) {
        $query = "DELETE FROM membre WHERE cin = ?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($cin)) or die("erreur delete");
    }

    public function findAll() {
        $query = "select cin ,nom,prenom,email,telephone,adresse,fonction,photo,grade,libelleFrancais,etablissement from membre , etablissement where membre.etablissement = etablissement.id";
        $req = $this->connexion->getConnexion()->query($query);
        $f = $req->fetchAll(PDO::FETCH_OBJ);
        return $f;
    }

  
    public function findAllSpec($etab) {
        $query = 'select cin ,nom,prenom,email,telephone,adresse,fonction,photo,grade,libelleFrancais,etablissement from membre , etablissement where membre.etablissement = etablissement.id and (membre.etablissement = "'.$etab.'" or etablissement.libelleFrancais = "'.$etab.'")';
        $req = $this->connexion->getConnexion()->query($query);
        $f = $req->fetchAll(PDO::FETCH_OBJ);
        return $f;
    }


//t
    public function update($o) {
        $query = "UPDATE membre SET nom=?,prenom=?,telephone=?,adresse=?,fonction=?,photo=?,grade=?,etablissement=?,email=?,password=? where cin = ?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($o->getNomfr(), $o->getPrenomfr(), $o->getTelephone(),
        $o->getAdresse(), $o->getFonction(),$o->getPhoto(), $o->getGrade(),$o->getEtablissement(),$o->getEmail(),$o->getPassword(),$o->getCin())) or die('Error');
    }
    public function findCountMembre() {
        $query = "select abrOrg,count(*) as nombre_membres from membre,etablissement where membre.etablissement=etablissement.id group by etablissement";
        $req = $this->connexion->getConnexion()->query($query);
        $f = $req->fetchAll(PDO::FETCH_OBJ);
        return $f;
    }
    public function findByCin($cin) {
        $query = "select * from membre where cin =?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($cin));
        $res = $req->fetch(PDO::FETCH_OBJ);
        $membre = new Membre($res->cin, $res->nom, $res->prenom,$res->email,$res->telephone,$res->adresse,$res->fonction, $res->photo,$res->grade, $res->etablissement,$res->password);
        return $membre;
    }
}
?>
