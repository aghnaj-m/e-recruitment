<?php

include_once 'beans/These.php';
include_once 'dao/IDao.php';

class TheseService implements IDao {
 private $connexion;

    function __construct() {
        $this->connexion = new Connexion();
    }

    public function create($o) {
        $query = "INSERT INTO these VALUES (NULL,?,?,?,?,?)";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($o->getType(), $o->getDate(), $o->getCentre(), $o->getFichier(), $o->getCandidat())) or die('Error');
    }

    public function delete($id) {
        $query = "DELETE FROM these WHERE id = ?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($id)) or die("erreur delete");
    }

    public function findAll() {
        $query = "select * from these";
        $req = $this->connexion->getConnexion()->query($query);
        $f = $req->fetchAll(PDO::FETCH_OBJ);
        return $f;
    }
    public function countall($cin) {
        $query = "select count(*) as nombre_diplome from these where CinCandidat=?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($cin)) or die('erreur');
        $f = $req->fetchAll(PDO::FETCH_OBJ);
        return $f;
    }
    public function findAllbycin($cin) {
        $query = "select * from these where CinCandidat=?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($cin));
        $f = $req->fetchAll(PDO::FETCH_OBJ);
        return $f;
    }


     public function update($o) {
        $query = "UPDATE these SET type=?,date=?,centre=? where id = ?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($o->gettype(), $o->getDate(), $o->getCentre(),$o->getId())) or die('Error');
    }



  }


    ?>
