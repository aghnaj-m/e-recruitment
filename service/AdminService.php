<?php
include_once 'beans/Admin.php';
include_once 'dao/IDao.php';

class AdminService implements IDao {

    private $connexion;

    function __construct() {
        $this->connexion = new Connexion();
    }

    public function create($o) {
        $query = "INSERT INTO `admin`(`cin`, `nom`, `prenom`, `telephone`, `adresse`, `photo`, `etablissement`) "
                . "VALUES (?,?,?,?,?,?,?)";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($o->getCin(), $o->getNom(), $o->getPrenom(), $o->getTelephone(),
         $o->getAdresse(), $o->getPhoto(), $o->getEtablissement() )) or die('Error');
    }

    public function delete($cin) {
        $query = "DELETE FROM admin WHERE cin = ?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($cin)) or die("erreur delete");
    }

    public function findAll() {
        $query = "select * from admin";
        $req = $this->connexion->getConnexion()->query($query);
        $f = $req->fetchAll(PDO::FETCH_OBJ);
        return $f;
    }

    public function findByCin($cin) {
        $query = "select * from admin where cin =?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($cin));
        $res = $req->fetch(PDO::FETCH_OBJ);
        $admin = new admin($res->cin, $res->nom, $res->prenom, $res->telephone, $res->adresse,$res->photo, $res->etablissement);
        return $admin;
    }

    public function update($o) {
        $query = "UPDATE admin SET  nom =?, prenom =?, telephone =?, adresse =? , photo = ? , etablissement = ? where cin = ?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($o->getNom(), $o->getPrenom(), $o->getTelephone(),
         $o->getAdresse(), $o->getPhoto(), $o->getEtablissement(),$o->getCin() )) or die('Error');
    }

}
