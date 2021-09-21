<?php
chdir('..');
include_once 'connexion/Connexion.php';
include_once 'service/MembreService.php';
extract($_POST);

$ms = new MembreService();
if($etab == ''){
if ($op != '') {
    if ($op == 'add') {
    $ms->create(new Membre($cin, $nomfr, $prenomfr,$email ,$telephone, $adresse, $fonction, $photo, $grade, $etablissement,$password));
    } elseif ($op == 'update') {
        $ms->update(new Membre($cin, $nomfr, $prenomfr,$email,$telephone, $adresse, $fonction,$photo, $grade, $etablissement,$password));
    } elseif ($op == 'delete') {
        $ms->delete($ms->delete($cin));
    }
}

header('Content-type: application/json');
echo json_encode($ms->findAll());

}else{
    if ($op != '') {
        if ($op == 'add') {
        $ms->create(new Membre($cin, $nomfr, $prenomfr,$email ,$telephone, $adresse, $fonction, $photo, $grade, $etab,$password));
        } elseif ($op == 'update') {
            $ms->update(new Membre($cin, $nomfr, $prenomfr,$email,$telephone, $adresse, $fonction,$photo, $grade, $etab,$password));
        } elseif ($op == 'delete') {
            $ms->delete($ms->delete($cin));
        }
    }

    header('Content-type: application/json');
    echo json_encode($ms->findAllSpec($etab));

}
