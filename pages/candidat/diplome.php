<?php
error_reporting( ~E_NOTICE ); // avoid notice
include_once 'connexion/Connexion.php';

if(isset($_POST['savefile']))
{

$imgFile = $_FILES['fichier']['name'];
$tmp_dir = $_FILES['fichier']['tmp_name'];


  $upload_dir = 'img/candidats/diplome/'; // upload directory
  $imgExt   = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); //image extension !!
  // rename uploading image
  $userpic = $_SESSION['utilisateur'].$_POST['specialite'].".".$imgExt;

  // allow valid image file formats

    move_uploaded_file($tmp_dir,$upload_dir.$userpic);
  }
  if(isset($_FILES['fichierbac']))
  {

  $imgFile = $_FILES['fichierbac']['name'];
  $tmp_dir = $_FILES['fichierbac']['tmp_name'];


    $upload_dir = 'img/candidats/bac/'; // upload directory
    $imgExt   = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); //image extension !!
    // rename uploading image
    $userpic = $_SESSION['utilisateur'].".".$imgExt;

    // allow valid image file formats

      move_uploaded_file($tmp_dir,$upload_dir.$userpic);
    }

?>
<style media="screen">
  a:hover{
    text-decoration: none;
  }
</style>
<!-- page content -->
<nav class="navbar navbar-expand-sm bg-light justify-content-center">
  <ul class="navbar-nav ">
    <a href="candidathome.php?p=bac">  <li class="nav-item" style=' padding:10px 50px;'>
      <h2><i class="fas fa-book-reader"></i> Parcours Scolaire</h2>
      </li> </a>
   <a href="candidathome.php?p=diplome"><li class="nav-item bg-primary"  style='color:white;padding:10px 50px;'>
     <h2><i class="fas fa-book"></i> Parcours Universitaire</h2>
   </li></a>


  </ul>
</nav>
<p id='cin' style='display:none;'><?php echo $_SESSION['utilisateur'] ?></p>

<div class="table_container">
  <div class="row">
    <div class="col-md-12">

      <center><h1 class="page-header" style="font-family: Suez One; ">Gestion des diplomes </h1> </center>
      <br>
      <div class="removeMessages">
<?php if(isset($_GET['query'])){
        $query = $_GET['query'];
        if($query == true)
        {
          echo '<div class="alert alert-info alert-dismissible" role="alert">'.
              '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'.
              '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong> Successfully added !</div>';

          }else {
                    echo '<div class="alert alert-warning alert-dismissible" role="alert">'.
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'.
                    '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>Error while adding the member information</div>';
                }
      } ?></div>

      <button class="btn btn-primary pull pull-left" data-toggle="modal" data-target="#addMember" id="addMemberModalBtn">
        <i class="fas fa-plus-circle"></i> Ajouter un diplome
      </button>

      <br /> <br /> <br />

      <table class="table table-striped " id="manageMemberTable" >
        <thead>
          <tr>
            <th style="display:none;">Id</th>
            <th>type de diplome</th>
            <th>specialité</th>
            <th>etablissement</th>
            <th>date d'obtention</th>
            <th>Ville d'obtention</th>
            <th>fichier</th>
            <th>options</th>
          </tr>
        </thead>
            <tbody></tbody>
      </table>



 <div class="modal fade" tabindex="-1" role="dialog" id="addMember">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><i class="fas fa-plus-circle"></i>Ajouter un diplome</h4>
      </div>

        <form  method="post"  class="form-horizontal" id="createMemberForm" enctype="multipart/form-data">

      <div class="modal-body">
        <div class="messages"></div>
       <div class="form-group"> <!--/here teh addclass has-error will appear -->
        <label for="name" class="col-sm-5 control-label">Type de diplome</label>
        <div class="col-sm-10">
          <datalist id='lestypes'>
            <option value="Ingénieur d'état">
            <option value="Master Spécialisé">
            <option value="License professionnelle">
            <option value="Technicien spécialisé">
            <option value="Diplome universitaire de technologies">
          </datalist>
          <input type="text" class="form-control" list='lestypes' id="type" name="type" placeholder="type de diplome" required>
      <!-- here the text will apper  -->
<div id="libelleFrancaisError"></div>

        </div>
      </div>
       <div class="form-group"> <!--/here teh addclass has-error will appear -->
        <label for="name" class="col-sm-5 control-label">Specialité</label>
        <div class="col-sm-10">
          <datalist id='lesspecialites'>
            <option value="Audit comptabilité gestion">
            <option value="sciences humaines">
            <option value="Marketing publicité">
            <option value="Communication">
            <option value="Batiment Travaux publiques">
            <option value="Réseaux Telecom">
            <option value="Industrie">
            <option value="Informatique">
          </datalist>
       <input type="text" class="form-control" id="specialite" name="specialite" list='lesspecialites' placeholder="specialite" required>
      <!-- here the text will apper  -->
<div id="libelleArabeError"></div>

        </div>
      </div>
       <div class="form-group"> <!--/here teh addclass has-error will appear -->
        <label for="name" class="col-sm-2 control-label">Etablissement d'obtention</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="etablissement" name="etablissement" placeholder="etablissement" required>
      <!-- here the text will apper  -->
      <div id="abreviationError"></div>
        </div>
      </div>
       <div class="form-group"> <!--/here teh addclass has-error will appear -->
        <label for="name" class="col-sm-2 control-label">Ville d'obtention</label>
        <div class="col-sm-10">
          <datalist id='lesvilles'>
            <option value="Casablanca">
            <option value="Eljadida">
            <option value="Safi">
            <option value="Agadir">
            <option value="Essaouira">
            <option value="Marrakech">
            <option value="Rabat">
            <option value="KENITRA">
            <option value="FES">
            <option value="TANGER">
              <option value="Meknes">
              <option value="Tetouan">
              <option value="Guelmim">

          </datalist>
          <input type="text" class="form-control" list="lesvilles" id="ville" name="ville" placeholder="Ville d'obtention" required>
      <!-- here the text will apper  -->
      <div id="villeError"></div>
        </div>
      </div>

<div class="form-group"> <!--/here teh addclass has-error will appear -->
<label for="name" class="col-sm-2 control-label">Date d'obtention</label>
        <div class="col-sm-10">
        <input type="date" class="form-control" id="date" name="date" required>
        <div id="photoError"></div>
<!-- here the text will apper  -->
            </div>
        </div>
        <div class="form-group" id='fichierfield'> <!--/here teh addclass has-error will appear -->
        <label for="name" class="col-sm-2 control-label">Fichier</label>
                <div class="col-sm-10">
                <input type="file" class="form-control" id="fichier" name="fichier" required>
                <div id="photoError"></div>
        <!-- here the text will apper  -->
                    </div>
                </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
        <button type="submit" name='savefile' id='savefile' class="btn btn-primary">Sauvgarder</button>
      </div>
      </form>


    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /add modal -->


<div class="modal fade" tabindex="-1" role="dialog" id="modificationMember">
 <div class="modal-dialog" role="document">
   <div class="modal-content">
     <div class="modal-header">
       <h4 class="modal-title"><i class="fas fa-plus-circle"></i>Modifier un diplome</h4>
     </div>

       <form  method="post"  class="form-horizontal" id="modifyMemberForm" enctype="multipart/form-data">

     <div class="modal-body">
       <div class="messages"></div>
      <div class="form-group"> <!--/here teh addclass has-error will appear -->
       <label for="name" class="col-sm-5 control-label">Type de diplome</label>
       <div class="col-sm-10">
         <input type="text" class="form-control" id="type2" name="type2" placeholder="type de diplome" required>
     <!-- here the text will apper  -->
<div id="libelleFrancaisError"></div>

       </div>
     </div>
      <div class="form-group"> <!--/here teh addclass has-error will appear -->
       <label for="name" class="col-sm-5 control-label">Specialité</label>
       <div class="col-sm-10">
         <input type="text" class="form-control" id="specialite2" name="specialite2" placeholder="specialite" required>
     <!-- here the text will apper  -->
<div id="libelleArabeError"></div>

       </div>
     </div>
      <div class="form-group"> <!--/here teh addclass has-error will appear -->
       <label for="name" class="col-sm-2 control-label">Etablissement d'obtention</label>
       <div class="col-sm-10">
         <input type="text" class="form-control" id="etablissement2" name="etablissement2" placeholder="etablissement" required>
     <!-- here the text will apper  -->
     <div id="abreviationError"></div>
       </div>
     </div>
      <div class="form-group"> <!--/here teh addclass has-error will appear -->
       <label for="name" class="col-sm-2 control-label">Ville d'obtention</label>
       <div class="col-sm-10">
         <input type="text" class="form-control" id="ville2" name="ville2" placeholder="Ville d'obtention" required>
     <!-- here the text will apper  -->
     <div id="villeError"></div>
       </div>
     </div>

<div class="form-group"> <!--/here teh addclass has-error will appear -->
<label for="name" class="col-sm-2 control-label">Date d'obtention</label>
       <div class="col-sm-10">
       <input type="date" class="form-control" id="date2" name="date2" required>
       <div id="photoError"></div>
<!-- here the text will apper  -->
</div>
       </div>


     </div>
     <div class="modal-footer">
       <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
       <button type="submit" class="btn btn-primary">Sauvgarder</button>
     </div>
     </form>


   </div><!-- /.modal-content -->
 </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /add modal -->

    </div>
  </div>
</div>


<script src="script/candidat/diplome.js" type="text/javascript"></script>
  <script src="vendor/bootstrap/js/popper.min.js" type="text/javascript"></script>
