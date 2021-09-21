<?php

include_once 'beans/Publication.php';
include_once 'Connexion/Connexion.php';
include_once 'dao/IDao.php';

class PublicationService implements IDao {
 private $connexion;

    function __construct() {
        $this->connexion = new Connexion();
    }

    public function create($o) {
        $query = "INSERT INTO publication VALUES (NULL,?,?,?,?,?,?)";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($o->getUrl(), $o->getTitre(), $o->getType(), $o->getDate(), $o->getCandidat(),$o->getFichier())) or die('Error');
    }

    public function delete($id) {
        $query = "DELETE FROM publication WHERE id = ?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($id)) or die("erreur delete");
    }
    public function countall($cin) {
        $query = "select count(*) as nombre_diplome from publication where candidat=?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($cin));
        $f = $req->fetchAll(PDO::FETCH_OBJ);
        return $f;
    }
    public function findAll() {
        $query = "select * from publication";
        $req = $this->connexion->getConnexion()->query($query);
        $f = $req->fetchAll(PDO::FETCH_OBJ);
        return $f;
    }
    public function findAllbycin($cin) {
        $query = "select * from publication where candidat=?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($cin));
        $f = $req->fetchAll(PDO::FETCH_OBJ);
        return $f;
    }


     public function update($o) {
        $query = "UPDATE publication SET url=?,titre=?,type=?,date=? where id = ?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($o->getUrl(), $o->getTitre(), $o->getType(), $o->getdate(),$o->getId())) or die('Error');
    }



  }


    ?>
