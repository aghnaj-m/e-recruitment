<?php
include_once 'connexion/Connexion.php';
include_once 'beans/Candidat.php';
include_once 'dao/IDao.php';

class CandidatService implements IDao {
//test
    private $connexion;

    function __construct() {
        $this->connexion = new Connexion();
    }

    public function create($o) {
        $query = "INSERT INTO candidat VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($o->getCin(),$o->getNomar(), $o->getPrenomar(), $o->getNomfr(), $o->getPrenomfr(),$o->getTelephone(),$o->getAdresse(),$o->getVille(),$o->getFonctionnaire(),$o->getDateNaissance(),$o->getLieuNaissance(),$o->getCinrecto(),$o->getCinverso(),$o->getPhoto(),$o->getEmail(),$o->getPassword())) or die('Error');
    }

    public function delete($cin) {
        $query = "DELETE FROM candidat WHERE cin = ?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($cin)) or die("erreur delete");
    }


    public function findAll() {
        $query = "select * from candidat";
        $req = $this->connexion->getConnexion()->query($query);
        $f = $req->fetchAll(PDO::FETCH_OBJ);
        return $f;
    }

     public function update($o) {
        $query = "UPDATE candidat SET nomArab=?,prenomArab=?,nomFrancais=?,prenomFrancais=?,telephone=?,adresse=?,ville=?,lieuNaissance=? where cin = ?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($o->getNomar(), $o->getPrenomar(), $o->getNomfr(), $o->getPrenomfr(),$o->getTelephone(),$o->getAdresse(),$o->getVille(),$o->getLieuNaissance(),$o->getCin())) or die('Error');
    }
    public function updateall($o) {
       $query = "UPDATE candidat SET nomArab=?,prenomArab=?,nomFrancais=?,prenomFrancais=?,telephone=?,adresse=?,ville=?,lieuNaissance=?,dateNaissance=?,fonctionnaire=? where cin = ?";
       $req = $this->connexion->getConnexion()->prepare($query);
       $req->execute(array($o->getNomar(), $o->getPrenomar(), $o->getNomfr(), $o->getPrenomfr(),$o->getTelephone(),$o->getAdresse(),$o->getVille(),$o->getLieuNaissance(),$o->getDateNaissance(),$o->getFonctionnaire(),$o->getCin())) or die('Error');
   }


      public function findById($id)
  {
      echo $id;
  }
  public function findByCin($cin) {
      $query = "select * from candidat where cin =?";
      $req = $this->connexion->getConnexion()->prepare($query);
      $req->execute(array($cin));
      $res = $req->fetch(PDO::FETCH_OBJ);
      $candidat = new Candidat($res->cin, $res->nomArab, $res->prenomArab,$res->nomFrancais,$res->prenomFrancais,$res->telephone, $res->adresse,$res->ville, $res->fonctionnaire,$res->dateNaissance,$res->lieuNaissance,$res->cinRecto,$res->cinVerso,$res->photo,$res->email,$res->password);
      return $candidat;
  }
  public function findByCin1($cin) {
      $query = "select * from candidat where cin =?";
      $req = $this->connexion->getConnexion()->prepare($query);
      $req->execute(array($cin));
      $res = $req->fetch(PDO::FETCH_OBJ);
      return $res;
  }
  public function changepic($cin,$photo){
    $query='update candidat set photo=? where cin=?';
    $req=$this->connexion->getConnexion()->prepare($query);
    $req->execute(array($photo,$cin));
  }
  public function changecne($cnerecto,$cneverso,$cin){
    $query='update candidat set cinRecto=?,cinVerso=? where cin=?';
    $req=$this->connexion->getConnexion()->prepare($query);
    $req->execute(array($cnerecto,$cneverso,$cin));
  }


  }


    ?>
