<?php

chdir('..');
include_once 'service/CommissionService.php';

extract($_POST);

$cs = new CommissionService();

if($op == 'show'){
    echo json_encode($cs->getList($commission));
}elseif($op == 'add'){
    $cs->addToList($cin,$commission);
    header('Content-type: application/json');
    echo json_encode($cs->getList($commission));
}elseif($op == 'remove'){
    $cs->removeFromList($cin,$commission);
    header('Content-type: application/json');
    echo json_encode($cs->getList($commission));
}elseif($op == 'getMembersComs'){
    header('Content-type: application/json');
    echo json_encode($cs->getMembersComs($membre));
}


