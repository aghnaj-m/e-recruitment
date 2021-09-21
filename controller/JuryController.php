<?php
chdir('..');
include_once 'service/JuryService.php';
extract($_POST);

$ms = new JuryService();

if ($op != '') {
    if ($op == 'add') {
    $ms->create(new Jury($id, $nom,$prenom,$etablissement, $grade, $idThese));
    } elseif ($op == 'update') {
        $ms->update(new Jury($id, $nom,$prenom,$etablissement, $grade, $idThese));
    } elseif ($op == 'delete') {
        $ms->delete($ms->delete($id));
    }
}


header('Content-type: application/json');
echo json_encode($ms->findAllbyThese($idThese));
