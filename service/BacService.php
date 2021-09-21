<?php

include_once 'beans/Bac.php';
include_once 'Connexion/Connexion.php';
include_once 'dao/IDao.php';

class BacService implements IDao {

    private $connexion;

    function __construct() {
        $this->connexion = new Connexion();
    }

    public function create($o) {
        $query = "INSERT INTO bac VALUES (NULL,?,?,?,?,?,?)";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($o->getSerie(),$o->getType() ,$o->getDate(), $o->getVille(),$o->getFichier(),$o->getCin())) or die('Error');
    }

    public function delete($id) {
        $query = "DELETE FROM bac WHERE id = ?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($id)) or die("erreur delete");
    }

    public function findAll() {
        $query = "select * from bac";
        $req = $this->connexion->getConnexion()->query($query);
        $f = $req->fetchAll(PDO::FETCH_OBJ);
        return $f;
    }
    public function findAllbyCin($cin) {
        $query = "select * from bac where cin=?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($cin));
        $f = $req->fetchAll(PDO::FETCH_OBJ);
        return $f;
    }

     public function update($o) {
        $query = "UPDATE bac SET serie=?,type=?,date=?,ville=?,fichier=? where cin = ?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($o->getSerie(),$o->getType() ,$o->getDate(),$o->getVille(),$o->getFichier(),$o->getCin())) or die('Error');
    }

      public function findById($id)
  {
      echo $id;
  }

  }


    ?>
