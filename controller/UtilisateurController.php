<?php
chdir('..');
include_once 'service/UtilisateurService.php';
extract($_POST);

$us = new UtilisateurService();
if ($op != '') {
    if ($op == 'add') {
    $us->create(new Utilisateur($cin, $nom, $prenom, $email, $telephone, $adresse, $password, $role, $photo,$membre));
    } elseif ($op == 'update') {
        $us->update(new Utilisateur($cin, $nom, $prenom, $email, $telephone, $adresse, $password, $role, $photo,$membre));
    } elseif ($op == 'delete') {
        $us->delete($us->delete($cin));
    }   
}



header('Content-type: application/json');
echo json_encode($us->findAll());
