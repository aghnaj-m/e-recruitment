<?php
chdir('..');
include_once 'service/PostulationService.php';
extract($_POST);

$ms = new PostulationService();
//em
if ($op != '') {
    if ($op == 'add') {
    $ms->create($cin,$id,$etat);
    }elseif ($op == 'delete') {
        $ms->delete($ms->delete($cin,$id));
    }elseif ($op == 'acceptePostulation') {
      $ms->acceptePostulation($cin,$concours);
      header('Content-type: application/json');
      echo json_encode($ms->findForMembre($concours));
      return ;  
    }elseif ($op == 'refuserPostulation') {
      $ms->refuserPostulation($cin,$concours);
      header('Content-type: application/json');
      echo json_encode($ms->findForMembre($concours));
      return ;  
    }elseif ($op == 'valide') {
        $ms->valide($cin,$id);
    }elseif ($op == 'findallbycin') {
      header('Content-type: application/json');
      echo json_encode($ms->findBycin($cin));
    }elseif ($op == 'etat'){
      header('Content-type: application/json');
      echo json_encode($ms->findEtat($id,$cin));
    }elseif ($op == 'findForMembre'){
      header('Content-type: application/json');
      echo json_encode($ms->findForMembre($concours));
      return ;
    }
}else {
  header('Content-type: application/json');
  echo json_encode($ms->findAll($cnc));
}
