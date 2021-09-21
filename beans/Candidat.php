
<?php


class Candidat {

  private $cin;
  private $nomfr;
  private $prenomfr;
  private $nomar;
  private $prenomar;
  private $email;
  private $password;
  private $telephone;
  private $adresse;
  private $ville;
  private $fonctionnaire;
  private $lieuNaissance;
  private $dateNaissance;
  private $photo;
  private $cinrecto;
  private $cinverso;
  function __construct($cin, $nomar, $prenomar, $nomfr, $prenomfr,$telephone, $adresse, $ville, $fonctionnaire, $dateNaissance, $lieuNaissance, $cinrecto, $cinverso,$photo, $email,$password) {
      $this->cin = $cin;
      $this->nomfr = $nomfr;
      $this->prenomfr = $prenomfr;
      $this->nomar = $nomar;
      $this->prenomar = $prenomar;
      $this->email = $email;
      $this->password=md5($password);
      $this->telephone = $telephone;
      $this->adresse = $adresse;
      $this->ville = $ville;
      $this->fonctionnaire = $fonctionnaire;
      $this->lieuNaissance = $lieuNaissance;
      $this->dateNaissance = $dateNaissance;
      $this->photo = $photo;
      $this->cinrecto = $cinrecto;
      $this->cinverso = $cinverso;
  }
  public function getCin() {
      return $this->cin;
  }

  public function getNomfr() {
      return $this->nomfr;
  }

  public function getPrenomfr() {
      return $this->prenomfr;
  }

  public function getNomar() {
      return $this->nomar;
  }

  public function getPrenomar() {
      return $this->prenomar;
  }

  public function getEmail() {
      return $this->email;
  }
  public function getPassword() {
      return $this->password;
  }

  public function getTelephone() {
      return $this->telephone;
  }

  public function getAdresse() {
      return $this->adresse;
  }

  public function getVille() {
      return $this->ville;
  }

  public function getFonctionnaire() {
      return $this->fonctionnaire;
  }

  public function getLieuNaissance() {
      return $this->lieuNaissance;
  }

  public function getDateNaissance() {
      return $this->dateNaissance;
  }

  public function getPhoto() {
      return $this->photo;
  }

  public function getCinrecto() {
      return $this->cinrecto;
  }

  public function getCinverso() {
      return $this->cinverso;
  }

  public function setCin($cin) {
      $this->cin = $cin;
  }

  public function setNomfr($nomfr) {
      $this->nomfr = $nomfr;
  }

  public function setPrenomfr($prenomfr) {
      $this->prenomfr = $prenomfr;
  }

  public function setNomar($nomar) {
      $this->nomar = $nomar;
  }

  public function setPrenomar($prenomar) {
      $this->prenomar = $prenomar;
  }

  public function setEmail($email) {
      $this->email = $email;
  }
  public function setPassword($password) {
      $this->password= $password;
  }

  public function setTelephone($telephone) {
      $this->telephone = $telephone;
  }

  public function setAdresse($adresse) {
      $this->adresse = $adresse;
  }

  public function setVille($ville) {
      $this->ville = $ville;
  }

  public function setFonctionnaire($fonctionnaire) {
      $this->fonctionnaire = $fonctionnaire;
  }

  public function setLieuNaissance($lieuNaissance) {
      $this->lieuNaissance = $lieuNaissance;
  }

  public function setDateNaissance($dateNaissance) {
      $this->dateNaissance = $dateNaissance;
  }

  public function setPhoto($photo) {
      $this->photo = $photo;
  }

  public function setCinrecto($cinrecto) {
      $this->cinrecto = $cinrecto;
  }

  public function setCinverso($cinverso) {
      $this->cinverso = $cinverso;
  }



}
