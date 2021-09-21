<?php

include_once 'beans/Postulation.php';
include_once 'Connexion/Connexion.php';
include_once 'dao/IDao.php';
class PostulationService {
 private $connexion;

    function __construct() {
        $this->connexion = new Connexion();
    }

    public function create($cin,$id,$etat) {
        $query = "INSERT INTO postulation VALUES (?,?,CURRENT_DATE(),?,0)";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($cin,$id,$etat)) or die('Error');
    }

    public function delete($cin,$id) {
        $query = "DELETE FROM postulation WHERE cin = ? and IdConcour=?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($cin,$id)) or die("erreur delete");
    }
     public function valide($cin,$id) {
        $query = "UPDATE postulation SET valide ='1' WHERE cin = ? and IdConcour =?";
        //$query="UPDATE `postulation` SET `etat` = 'Evaluation', `valide` = '1' WHERE `postulation`.`cin` = ? AND `postulation`.`IdConcour` = ?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($cin,$id)) or die("erreur valide");
    }

    public function findAll($cnc) {
        $query = "select postulation.cin,candidat.nomFrancais,candidat.prenomFrancais,IdConcour,dateDePostulation,postulation.etat,valide,concours.type from postulation,candidat,concours where candidat.cin=postulation.cin and postulation.IdConcour=concours.id and concours.id=".$cnc."";
        $req = $this->connexion->getConnexion()->query($query);
        $f = $req->fetchAll(PDO::FETCH_OBJ);
        return $f;
    }
    public function findEtat($id,$cin) {
        $query = "select etat from postulation where IdConcour=? and cin=?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($id,$cin));
        $f = $req->fetchAll(PDO::FETCH_OBJ);
        return $f;
    }



     public function findBycin($cin) {
        $query = "select * from postulation where cin =?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($cin));
        $res = $req->fetch(PDO::FETCH_OBJ);
        return $res;
    }
    public function findForMembre($concours)
    {
        $query = "select candidat.cin , nomFrancais , prenomFrancais , session ,dateDePostulation, postulation.etat , concours.type , nbrPoste from postulation join candidat on postulation.cin = candidat.cin join concours on postulation.IdConcour = concours.id where postulation.IdConcour =".$concours." and valide = 1";
        $req = $this->connexion->getConnexion()->query($query);
        $f = $req->fetchAll(PDO::FETCH_OBJ);
        return $f;
    }

    public function acceptePostulation($cin,$concours) {
        $query = "update postulation set etat = 'Accepted' where cin = ? and IdConcour= ?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($cin,$concours)) or die("erreur acceptation");

    }
    public function refuserPostulation($cin,$concours) {
        $query = "update postulation set etat = 'Refused' where cin = ? and IdConcour= ?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($cin,$concours)) or die("erreur delete");

    }



  }


    ?>
