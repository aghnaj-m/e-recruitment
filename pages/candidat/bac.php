<style media="screen">
  a:hover{
    text-decoration: none;
  }
</style>

<nav class="navbar navbar-expand-sm bg-light justify-content-center">
  <ul class="navbar-nav ">
    <a href="candidathome.php?p=bac">  <li class="nav-item bg-primary" style='color:white; padding:10px 50px;'>
      <h2><i class="fas fa-book-reader"></i> Parcours Scolaire</h2>
      </li> </a>
   <a href="candidathome.php?p=diplome"><li class="nav-item"  style='padding:10px 50px;'>
     <h2><i class="fas fa-book"></i> Parcours Universitaire</h2>
   </li></a>


  </ul>
</nav>
<hr>
<br>
<p id='cin' style='display:none;'><?php echo $_SESSION['utilisateur'] ?></p>

<div class="container">
  <form id='form' action="candidathome.php?p=diplome" method="post" enctype="multipart/form-data">

  <div class="row" style='margin: 0px 0px 20px 0px;'>
     <input type="text" id='id' hidden>
    <div class="col-sm-6">
      <label for="">Série du bac</label>
      <datalist id='lestypes'>
                  <option value="Sciences de la Vie et de la Terre">
									<option value="Sciences Physiques et Chimiques">
									<option value="Sciences Maths A">
									<option value="Sciences Maths B">
									<option value="Sciences Economiques">
									<option value="Techniques de Gestion et de Comptabilité">
									<option value="Sciences agronomiques">
									<option value="Sciences et Technologies Electriques">
									<option value="Sciences et Technologies Mécaniques">
									<option value="Arts Appliqués">
									<option value="Sciences Humaines">
									<option value="Sciences de la Chariaâ">
									<option value="Sciences de Langue Arabe">
      </datalist>
      <input type="text" name="serie" id='serie' list='lestypes' placeholder="série du bac" class='form-control' required>
    </div>
    <div class="col-sm-6">
      <label for="">Type du bac</label>
      <select class="form-control" id='type'>
        <option id='national' value="national" selected>National</option>
        <option id='etranger' value="etranger">Etranger</option>
      </select>
    </div>
  </div>
  <div class='row' style='margin: 0px 0px 20px 0px;'>
    <div class="col-sm-6">
      <label for="">Date d'obtention</label>
      <input type="date" name="date" id='date' class='form-control' required>
    </div>
    <div class="col-sm-6">
      <label for="">Ville d'obtention</label>
      <input type="text" name="ville" id='ville' placeholder="ville d'obtention" class='form-control' required>
    </div>
  </div>
  <div class="row" style='margin: 0px 0px 20px 0px;'>

    <div class="col-sm-3">

    </div>
    <div class="col-sm-6">
      <label for="">Attestation scannée</label>
      <input type="file" id='fichierbac' name='fichierbac'  class='form-control'>
    </div>

  </div>
  <div class="row">
    <div class="col-sm-10"></div>
    <div class="col-sm-2">
      <button type="submit" id='save' name'save' class='btn btn-primary suivant' name="button">Suivant</button>
    </div>

  </div>

</form>
</div>
<script src="script/candidat/bac.js" type="text/javascript"></script>
  <script src="vendor/bootstrap/js/popper.min.js" type="text/javascript"></script>
