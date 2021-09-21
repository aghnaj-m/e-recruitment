<?php
chdir('..');
include_once 'service/ConcourService.php';
extract($_POST);

$ms = new ConcourService();
if($op=='postule'){
  header('Content-type: application/json');
  echo json_encode($ms->findAllpostule($cin));
}elseif ($op=='nonpostule') {
  header('Content-type: application/json');
  echo json_encode($ms->findAllnonpostule($cin));
}elseif($op=='bysession'){
  header('Content-type: application/json');
  echo json_encode($ms->findAllnonpostuleSearch($cin,$session));
}
