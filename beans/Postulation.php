<?php

class Postulation{

private $idconcour;
private $cin;
private $date;
private $etat;



function __construct($idconcour, $cin, $date,$etat) {
    $this->id = $id;
    $this->cin = $cin;
    $this->date = $date;
    $this->etat=$etat;

}

public function getIdconcour() {
    return $this->id;
}

public function getCin() {
    return $this->cin;
}

public function getDate() {
    return $this->date;
}
public function getEtat(){
  return $this->etat;
}


public function setIdconcour($id) {
    $this->id = $id;
}

public function setCin($cin) {
    $this->cin = $cin;
}

public function setDate($date) {
    $this->date = $date;
}
public function setEtat($etat){
  $this->etat=$etat;
}


}
