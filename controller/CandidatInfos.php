<?php
chdir('..');
include_once 'service/CandidatService.php';
extract($_POST);
//me
$cs = new CandidatService();

if ($op =='changepic'){
  $cs->changepic($cin,$photo);
}elseif ($op =='changecne') {
  $cs->changecne($cnerecto,$cneverso,$cin);
}

header('Content-type: application/json');
echo json_encode($cs->findByCin1($cin));
