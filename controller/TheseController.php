<?php
chdir('..');
include_once 'service/TheseService.php';
extract($_POST);

$ms = new TheseService();

if ($op != '') {
    if ($op == 'add') {
    $ms->create(new These($id, $type, $date, $centre, $fichier, $candidat));
    } elseif ($op == 'update') {
        $ms->update(new These($id, $type, $date, $centre, $fichier, $candidat));
    } elseif ($op == 'delete') {
        $ms->delete($ms->delete($id));
    }
}



header('Content-type: application/json');
echo json_encode($ms->findAllbycin($candidat));
