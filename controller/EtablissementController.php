<?php


chdir('..');
include_once 'service/EtablissementService.php';
extract($_POST);

$ss = new EtablissementService();
if ($op != '') {
    if ($op == 'add') {
    $ss->create(new Etablissement(0, $photo, $libelleArabe,$libelleFrancais,$abreviation,$ville));
    } elseif ($op == 'update') {
        $ss->update(new Etablissement($id, $photo, $libelleArabe,$libelleFrancais,$abreviation,$ville));
    } elseif ($op == 'delete') {
        $ss->delete($id);
    } elseif ($op == 'getByName') {
        header('Content-type: application/json');
        echo json_encode($ss->getEtablissementByName($nom));
        return ;
    }
}


header('Content-type: application/json');
echo json_encode($ss->findAll());
