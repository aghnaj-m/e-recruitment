<?php
chdir('..');
include_once 'service/ConcourService.php';
extract($_POST);

$ms = new ConcourService();

if($etab == ''){
if ($op != '') {
    if ($op == 'add') {
    $ms->create(new Concour(0, $session, $dateDebutDepot, $dateFinDepot, $etat, $nbrPoste, $type, $etablissement,$commission));
    } elseif ($op == 'update') {
        $ms->update(new Concour($id, $session, $dateDebutDepot, $dateFinDepot, $etat, $nbrPoste, $type, $etablissement,$commission));
    } elseif ($op == 'delete') {
        $ms->delete($ms->delete($id));
    } elseif ($op == 'afficher') {
        $ms->delete($ms->afficher($id));
    }elseif ($op == 'getByCommissions') {
        header('Content-type: application/json');
        echo json_encode($ms->getByCommissions($commissions));
        return ;
    }
}

header('Content-type: application/json');
echo json_encode($ms->findAll());

}else{
    if ($op != '') {
        if ($op == 'add') {
            $ms->create(new Concour(0, $session, $dateDebutDepot, $dateFinDepot, $etat, $nbrPoste, $type, $etab,$commission));
        } elseif ($op == 'update') {
                $ms->update(new Concour($id, $session, $dateDebutDepot, $dateFinDepot, $etat, $nbrPoste, $type, $etab,$commission));
        } elseif ($op == 'delete') {
                $ms->delete($ms->delete($id));
        } elseif ($op == 'afficher') {
                $ms->delete($ms->afficher($id));
        }
    }

    header('Content-type: application/json');
    echo json_encode($ms->findAllSpec($etab));
}    
