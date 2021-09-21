<?php

include_once 'beans/Concour.php';
include_once 'Connexion/Connexion.php';
include_once 'dao/IDao.php';

class ConcourService implements IDao {
 private $connexion;

    function __construct() {
        $this->connexion = new Connexion();
    }

    public function create($o) {
        $query = "INSERT INTO concours VALUES (NULL,?,?,?,?,?,?,?,?)";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($o->getSession(), $o->getDateDebutDepot(), $o->getDateFinDepot(), $o->getEtat(), $o->getNbrPoste(),$o->getType(),$o->getEtablissement(),$o->getCommission())) or die('Error');
    }

    public function delete($id) {
        $query = "DELETE FROM concours WHERE id = ?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($id)) or die("erreur delete");
    }
    public function afficher($id) {
        $query = "select * FROM postulation WHERE IdConcour = ?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($id)) or die("erreur afficher");
    }

    public function findAll() {
        $query = "select concours.id,session,dateDebutDepot,dateFinDepot,etat,nbrPoste,type,libelleFrancais, commission.nom as commission from concours join etablissement on concours.etablissement = etablissement.id left join commission on concours.commission =commission.id";
        $req = $this->connexion->getConnexion()->query($query);
        $f = $req->fetchAll(PDO::FETCH_OBJ);
        return $f;
    }
    public function findAllpostule($cin) {
        $query = "select concours.id,session,dateDebutDepot,dateFinDepot,etat,nbrPoste,type,libelleFrancais from concours , etablissement where concours.etablissement = etablissement.id and concours.id in (select IdConcour from postulation where cin=?)";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($cin)) or die("erreur delete");
        $f = $req->fetchAll(PDO::FETCH_OBJ);
        return $f;
    }
    public function findAllnonpostule($cin) {
        $query = "select concours.id,session,dateDebutDepot,dateFinDepot,etat,nbrPoste,type,libelleFrancais from concours , etablissement where concours.etablissement = etablissement.id and concours.id not in (select IdConcour from postulation where cin=?)";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($cin)) or die("erreur delete");
        $f = $req->fetchAll(PDO::FETCH_OBJ);
        return $f;
    }
    public function findAllnonpostuleSearch($cin,$session) {
        $query = "select concours.id,session,dateDebutDepot,dateFinDepot,etat,nbrPoste,type,libelleFrancais from concours , etablissement where session=? and concours.etablissement = etablissement.id and concours.id in (select IdConcour from postulation where cin=?)";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($session,$cin)) or die("erreur delete");
        $f = $req->fetchAll(PDO::FETCH_OBJ);
        return $f;
    }

    public function findAllSpec($etab) {
        $query = "select concours.id,session,dateDebutDepot,dateFinDepot,etat,nbrPoste,type,libelleFrancais, commission.nom as commission from concours join etablissement
            on concours.etablissement = etablissement.id left join commission
            on concours.commission =commission.id
            where concours.etablissement =".$etab;
        $req = $this->connexion->getConnexion()->query($query);
        $f = $req->fetchAll(PDO::FETCH_OBJ);
        return $f;
    }


    public function update($o) {
       $query = "UPDATE concours SET session=?,dateDebutDepot=?,dateFinDepot=?,etat=?,nbrPoste=?,type=?,etablissement=?,commission = ? where id = ?";
       $req = $this->connexion->getConnexion()->prepare($query);
       $req->execute(array($o->getSession(), $o->getDateDebutDepot(), $o->getDateFinDepot(), $o->getEtat(),$o->getNbrPoste(),$o->getType(),$o->getEtablissement(),$o->getCommission(),$o->getId())) or die('Error');
   }

     public function findById($id) {
        $query = "select * from concours where id =?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($id));
        $res = $req->fetch(PDO::FETCH_OBJ);
        $concour = new Concour($res->id, $res->session, $res->dateDebutDepot, $res->dateFinDepot, $res->etat, $res->nbrPoste,$res->type, $res->etablissement);
        return $concour;
    }
    public function findCountConcours() {
        $query = "select abrOrg,count(*) as nombre_concours from concours,etablissement where concours.etablissement=etablissement.id group by etablissement";
        $req = $this->connexion->getConnexion()->query($query);
        $f = $req->fetchAll(PDO::FETCH_OBJ);
        return $f;
    }
    public function getByCommissions($commissions) {
        $com = join("','",$commissions);
        $query = "select concours.id, session , dateDebutDepot , dateFinDepot , etat, nbrPoste , type , nom as commission
        from concours join commission on concours.commission = commission.id where concours.commission in ('$com') ";
        $req = $this->connexion->getConnexion()->query($query);
        $f = $req->fetchAll(PDO::FETCH_OBJ);
        return $f;
    }

  }


    ?>
