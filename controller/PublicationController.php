<?php
chdir('..');
include_once 'service/PublicationService.php';
extract($_POST);

$ms = new PublicationService();

if ($op != '') {
    if ($op == 'add') {
    $ms->create(new Publication($id, $url, $titre, $type, $date, $candidat, $fichier));
    } elseif ($op == 'update') {
        $ms->update(new Publication($id, $url, $titre, $type, $date, $candidat, $fichier));
    } elseif ($op == 'delete') {
        $ms->delete($ms->delete($id));
    }
}



header('Content-type: application/json');
echo json_encode($ms->findAllbycin($candidat));
