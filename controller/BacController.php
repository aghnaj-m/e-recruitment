<?php
chdir('..');
include_once 'service/BacService.php';
extract($_POST);

$ms = new BacService();

if ($op != '') {
    if ($op == 'add') {
    $ms->create(new Bac($id,$serie,$type,$date,$ville, $fichier, $cin));
    } elseif ($op == 'update') {
        $ms->update(new Bac($id,$serie,$type,$date,$ville, $fichier, $cin));
    } elseif ($op == 'delete') {
        $ms->delete($ms->delete($id));
    }
}


header('Content-type: application/json');
echo json_encode($ms->findAllbycin($cin));
