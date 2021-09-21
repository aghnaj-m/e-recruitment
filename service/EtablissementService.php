<?php
include_once 'Connexion/Connexion.php';
include_once 'beans/Etablissement.php';
include_once 'dao/IDao.php';

class EtablissementService implements IDao {

    private $connexion;

    function __construct() {
        $this->connexion = new Connexion();
    }

    public function create($o) {
        $query = "INSERT INTO etablissement VALUES (NULL,?,?,?,?,?)";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($o->getLogo(), $o->getLibelleArabe(), $o->getLibelleFrancais(), $o->getAbr(), $o->getVille())) or die('Error');
    }

    public function delete($id) {
        $query = "DELETE FROM etablissement WHERE id = ?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($id)) or die("erreur delete");
    }

    public function findAll() {
        $query = "select * from etablissement";
        $req = $this->connexion->getConnexion()->query($query);
        $f = $req->fetchAll(PDO::FETCH_OBJ);
        return $f;
    }

     public function update($o) {
        $query = "UPDATE etablissement SET libelleArab=?,libelleFrancais=?,abrOrg=?,ville=? where id = ?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($o->getLibelleArabe(), $o->getLibelleFrancais(), $o->getAbr(), $o->getVille(),$o->getId())) or die('Error');
    }

      public function findById($id)
  {
    $query = "select * from etablissement where id =?";
    $req = $this->connexion->getConnexion()->prepare($query);
    $req->execute(array($id));
    $res = $req->fetch(PDO::FETCH_OBJ);
    $etablissement = new Etablissement($res->id, $res->logo, $res->libelleArab, $res->libelleFrancais, $res->abrOrg,$res->ville);
    return $etablissement;
  }
  public function getEtablissementByName($nom)
  {
      $query = "select * from etablissement where libelleFrancais =?";
      $req = $this->connexion->getConnexion()->prepare($query);
      $req->execute(array($nom));
      $res = $req->fetch(PDO::FETCH_OBJ);
      return $res;

  }


  }


    ?>
