<?php

include_once 'beans/Experience.php';
include_once 'dao/IDao.php';

class ExperienceService implements IDao {

    private $connexion;

    function __construct() {
        $this->connexion = new Connexion();
    }

    public function create($o) {
        $query = "INSERT INTO experience VALUES (NULL,?,?,?,?,?)";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($o->getType(),$o->getTitre() ,$o->getEtablissement(), $o->getAttestation(), $o->getCin())) or die('Error');
    }

    public function delete($id) {
        $query = "DELETE FROM experience WHERE id = ?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($id)) or die("erreur delete");
    }

    public function findAll() {
        $query = "select * from experience";
        $req = $this->connexion->getConnexion()->query($query);
        $f = $req->fetchAll(PDO::FETCH_OBJ);
        return $f;
    }
    public function findAllbyCin($cin) {
        $query = "select * from experience where cin=?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($cin));
        $f = $req->fetchAll(PDO::FETCH_OBJ);
        return $f;
    }

     public function update($o) {
        $query = "UPDATE experience SET type=?,titre=?,etablissement=? where id = ?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($o->getType(),$o->getTitre() ,$o->getEtablissement(), $o->getId())) or die('Error');
    }

      public function findById($id)
  {
      echo $id;
  }

  }


    ?>
