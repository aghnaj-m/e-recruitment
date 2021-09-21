<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Employe
 *
 * @author mosab
 */
class Utilisatteur {

    private $id;
    private $email;
    private $password;
    private $idMembre;
    private $idCandidat;
    private $idAdmin;
    
    function __construct($id, $email, $password, $role, $idMembre,$idCandidat, $idAdmin ) {
        $this->$id = $id;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
        $this->idMembre = $idMembre;
        $this->idCandidat = $idCandidat;
        $this->idAdmin = $idAdmin;

    }
    
    function getId() {
        return $this->id;
    }

    function getEmail() {
        return $this->email;
    }

    function getPassword() {
        return $this->password;
    }

    function getRole() {
        return $this->role;
    }

    function getIdMembre() {
        return $this->idMembre;
    }


    function getIdCandidat() {
        return $this->idCandidat;
    }

    function getIdAdmin() {
        return $this->idAdmin;
    }


    function setId($id) {
        $this->id = $id;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setRole($role) {
        $this->role = $role;
    }

    function setIdMembre($idMembre) {
        $this->idMembre = $idMembre;
    }


    function setIdCandidat($idCandidat) {
        $this->idCandidat = $idCandidat;
    }

    function setIdAdmin($idAdmin) {
         $this->idAdmin = $idAdmin;
    }



    
}
