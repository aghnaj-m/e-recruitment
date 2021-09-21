<?php
chdir('..');
include_once 'service/DiplomeService.php';
extract($_POST);

$ms = new DiplomeService();

if ($op != '') {
    if ($op == 'add') {
    $ms->create(new Diplome($id, $specialite, $date, $etablissement, $ville, $type, $fichier, $cin));
    } elseif ($op == 'update') {
        $ms->update(new Diplome($id, $specialite, $date, $etablissement, $ville, $type, $fichier, $cin));
    } elseif ($op == 'delete') {
        $ms->delete($ms->delete($id));
    }
}



header('Content-type: application/json');
echo json_encode($ms->findAllbycin($cin));
