<?php


chdir('..');
include_once 'service/CommissionService.php';
extract($_POST);

$cs = new CommissionService();

if($etab == ''){
if ($op != '') {
    if ($op == 'add') {
    $cs->create(new Commission(0, $nom, $description,$etablissement));
    } elseif ($op == 'update') {
        $cs->update(new Commission($id, $nom, $description,$etablissement));
    } elseif ($op == 'delete') {
        $cs->delete($id);
    }elseif ($op == 'getByMember') {
        header('Content-type: application/json');
        echo json_encode($cs->getByMember($membre));
        return ;
    }
}
header('Content-type: application/json');
echo json_encode($cs->findAll());
}else {
    if ($op != '') {
        if ($op == 'add') {
        $cs->create(new Commission(0, $nom, $description,$etab));
        } elseif ($op == 'update') {
            $cs->update(new Commission($id, $nom, $description,$etab));
        } elseif ($op == 'delete') {
            $cs->delete($id);
        }
    }
    header('Content-type: application/json');
    echo json_encode($cs->findAllSpec($etab));
    
}