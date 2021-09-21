<?php
chdir('..');
include_once 'service/ExperienceService.php';
extract($_POST);

$ms = new ExperienceService();

if ($op != '') {
    if ($op == 'add') {
    $ms->create(new Experience($id, $type,$titre,$etablissement, $attestation, $cin));
    } elseif ($op == 'update') {
        $ms->update(new Experience($id,$type,$titre, $etablissement, $attestation, $cin));
    } elseif ($op == 'delete') {
        $ms->delete($ms->delete($id));
    }
}


header('Content-type: application/json');
echo json_encode($ms->findAllbycin($cin));
