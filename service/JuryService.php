<?php

include_once 'beans/Jury.php';
include_once 'Connexion/Connexion.php';
include_once 'dao/IDao.php';

class JuryService implements IDao {

    private $connexion;

    function __construct() {
        $this->connexion = new Connexion();
    }

    public function create($o) {
        $query = "INSERT INTO jury VALUES (NULL,?,?,?,?,?)";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($o->getNom(),$o->getPrenom() ,$o->getEtablissement(), $o->getGrade(), $o->getIdThese())) or die('Error');
    }

    public function delete($id) {
        $query = "DELETE FROM jury WHERE id = ?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($id)) or die("erreur delete");
    }

    public function findAll() {
        $query = "select * from jury";
        $req = $this->connexion->getConnexion()->query($query);
        $f = $req->fetchAll(PDO::FETCH_OBJ);
        return $f;
    }
    public function findAllbyThese($idthese) {
        $query = "select * from jury where idthese=?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($idthese));
        $f = $req->fetchAll(PDO::FETCH_OBJ);
        return $f;
    }

     public function update($o) {
        $query = "UPDATE jury SET nom=?,prenom=?,etablissement=?,grade=? where id = ?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($o->getNom(),$o->getPrenom() ,$o->getEtablissement(),$o->getGrade() ,$o->getId())) or die('Error');
    }

      public function findById($id)
  {
      echo $id;
  }

  }


    ?>
