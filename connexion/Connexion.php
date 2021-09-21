<?php


class Connexion {
    private $connexion;

    public function __construct() {
        $host = 'localhost';
        $dbname = 'recrutement';
        $login = 'root';
        $password = 'root';
        try {
            $this->connexion = new PDO("mysql:host=$host;dbname=$dbname;port=3306", $login, $password);
            $this->connexion->query("SET NAMES UTF8");
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    function __destruct(){}

    function getConnexion() {
        return $this->connexion;
    }
}
