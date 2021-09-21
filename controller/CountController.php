<?php
chdir('..');
include_once 'service/PublicationService.php';
include_once 'service/TheseService.php';
include_once 'service/DiplomeService.php';
//include_once 'service/CandidatService.php';
extract($_POST);

$ms = new PublicationService();
$ts =new TheseService();
$ds=new DiplomeService();
//$cs=new CandidatService();
if($op=='diplome'){
  header('Content-type: application/json');
  echo json_encode($ds->countall($cin));
}elseif ($op=='these') {
  header('Content-type: application/json');
  echo json_encode($ts->countall($cin));
}elseif ($op=='publication') {
  header('Content-type: application/json');
  echo json_encode($ms->countall($cin));
}
