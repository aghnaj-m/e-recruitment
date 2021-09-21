<?php

chdir('..');
include_once 'service/ConcourService.php';
include_once 'service/MembreService.php';

extract($_POST);

$cs = new ConcourService();
$ms = new MembreService();

if($chart == 'cpe'){
    header('Content-type: application/json');
    echo json_encode($cs->findCountConcours());
}elseif($chart == 'mpe'){
    header('Content-type: application/json');
    echo json_encode($ms->findCountMembre());
}else{
    echo 'no charts sets';
}
