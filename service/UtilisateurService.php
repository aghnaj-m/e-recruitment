<?php
include_once 'beans/Utilisateur.php';
include_once 'dao/IDao.php';


class UtilisateurService implements IDao {

    private $connexion;

    function __construct() {
        $this->connexion = new Connexion();
    }

    public function create($o) {
        $query = "INSERT INTO `utilisateur`(`id`, `email`, `password`, `role`, `idMembre`, `idCandidat`, `idAdmin`) "
                . "VALUES (?,?,?,?,?,?,?)";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($o->getId(), $o->getEmail(), $o->getPassword(), $o->getRole(),
         $o->getIdMembre(), $o->getIdCandidat(), $o->getIdAdmin() )) or die('Error');
    }

    public function delete($id) {
        $query = "DELETE FROM Utilisateur WHERE id = ?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($id)) or die("erreur delete");
    }

    public function findAll() {
        $query = "select * from utilisateur";
        $req = $this->connexion->getConnexion()->query($query);
        $f = $req->fetchAll(PDO::FETCH_OBJ);
        return $f;
    }

    public function findById($id) {
        $query = "select * from utilisateur where id =?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($id));
        $res = $req->fetch(PDO::FETCH_OBJ);
        $utilisateur = new Utilisatteur($res->id, $res->email, $res->password, $res->role, $res->idMembre,$res->idCandidat, $res->idAdmin);
        return $utilisateur;
    }

    public function findByEmail($email) {
        $query = "select * from utilisateur where email =?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($email));
        $s = $req->fetchAll(PDO::FETCH_OBJ);
        if (count($s) != 0) {
            foreach ($s as $res) {
                $id = $res->id;
        }
            return $id;
        } else
            return -1;
        /* $employe = new Employe($res->cin, $res->nom, $res->prenom, $res->email, $res->telephone, $res->adresse, $res->password, $res->role, $res->photo, $res->fonction, $res->departement);
          return $employe; */
    }

    public function update($o) {
        $query = "UPDATE utilisateur SET  email =?, password =?, role =?, idMembre =? , idCandidat = ? , idAdmin = ? where id = ?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($o->getEmail(), $o->getPassword(), $o->getRole(), $o->getIdMembre(), $o->getIdCandidat(),
                    $o->getIdAdmin())) or die('Error');
    }

}
