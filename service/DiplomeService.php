<?php

include_once 'beans/Diplome.php';
include_once 'dao/IDao.php';
class DiplomeService implements IDao {

    private $connexion;

    function __construct() {
        $this->connexion = new Connexion();
    }

    public function create($o) {
        $query = "INSERT INTO diplome VALUES (NULL,?,?,?,?,?,?,?)";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($o->getSpecialite(), $o->getDate(), $o->getEtablissement(), $o->getVille(), $o->getType(),$o->getFichier(),$o->getCin())) or die('Error');
    }
    public function countall($cin) {
        $query = "select count(*) as nombre_diplome from diplome where cin=?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($cin)) or die('erreur');
        $f = $req->fetchAll(PDO::FETCH_OBJ);
        return $f;
    }

    public function delete($id) {
        $query = "DELETE FROM diplome WHERE id = ?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($id)) or die("erreur delete");
    }
    public function findAllbycin($cin) {
        $query = "select * from diplome where cin=?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($cin));
        $f = $req->fetchAll(PDO::FETCH_OBJ);
        return $f;
    }

    public function findAll() {
        $query = "select * from diplome";
        $req = $this->connexion->getConnexion()->query($query);
        $f = $req->fetchAll(PDO::FETCH_OBJ);
        return $f;
    }

     public function update($o) {
        $query = "UPDATE diplome SET specialité=?,date=?,etablissement=?,type=?,ville=? where id = ?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($o->getSpecialite(), $o->getDate(), $o->getEtablissement(), $o->getType(),$o->getVille(),$o->getId())) or die('Error');
    }

      public function findById($id)
  {
      echo $id;
  }

  }


    ?>
