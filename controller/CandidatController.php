<?php
chdir('..');
include_once 'service/CandidatService.php';
extract($_POST);

$ms = new CandidatService();

if ($op != '') {
    if ($op == 'add') {
    $ms->create(new Candidat($cin, $nomar, $prenomar, $nomfr, $prenomfr,$telephone, $adresse, $ville, $fonctionnaire, $dateNaissance, $lieuNaissance, $cinrecto, $cinverso,$photo, $email,$password));
    } elseif ($op == 'update') {
        $ms->update(new Candidat($cin, $nomar, $prenomar, $nomfr, $prenomfr,$telephone, $adresse, $ville, $fonctionnaire, $dateNaissance, $lieuNaissance, $cinrecto, $cinverso,$photo, $email,$password));
    } elseif ($op == 'delete') {
        $ms->delete($ms->delete($cin));
    }elseif ($op == 'updateall') {
        $ms->updateall(new Candidat($cin, $nomar, $prenomar, $nomfr, $prenomfr,$telephone, $adresse, $ville, $fonctionnaire, $dateNaissance, $lieuNaissance, $cinrecto, $cinverso,$photo, $email,$password));
    }
}



header('Content-type: application/json');
echo json_encode($ms->findAll());
