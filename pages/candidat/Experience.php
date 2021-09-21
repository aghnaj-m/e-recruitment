<?php
error_reporting( ~E_NOTICE ); // avoid notice
include_once 'connexion/Connexion.php';

if(isset($_POST['savefile']))
{

$imgFile = $_FILES['fichier']['name'];
$tmp_dir = $_FILES['fichier']['tmp_name'];


  $upload_dir = 'img/candidats/experience/'; // upload directory
  $imgExt   = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); //image extension !!
  // rename uploading image
  $userpic = $_SESSION['utilisateur'].$_POST['titre'].".".$imgExt;

  // allow valid image file formats

    move_uploaded_file($tmp_dir,$upload_dir.$userpic);
  }

?>

<!-- page content -->
<p id='cin' style='display:none;'><?php echo $_SESSION['utilisateur'] ?></p>
<!--<nav class="navbar navbar-expand-sm bg-light justify-content-center">
  <ul class="navbar-nav">
    <li class="nav-item" style='padding:0px 100px;'>
      <a class="nav-link" href="#">Link 1</a>
    </li>
    <li class="nav-item"  style='padding:0px 100px;'>
      <a class="nav-link" href="#">Link 2</a>
    </li>
    <li class="nav-item"  style='padding:0px 100px;'>
      <a class="nav-link" href="#">Link 3</a>
    </li>
  </ul>
</nav>-->
<div class="table_container">
  <div class="row">
    <div class="col-md-12">

      <center><h1 class="page-header" style="font-family: Suez One; ">Gestion des Experiences Pédagogiques </h1> </center>
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
        <i class="fas fa-plus-circle"></i> Ajouter une experience
      </button>

      <br /> <br /> <br />

      <table class="table table-striped " id="manageMemberTable" >
        <thead>
          <tr>
            <th style="display:none;">Id</th>
            <th>type d'enseignement</th>
            <th>titre de formation</th>
            <th>etablissement</th>
            <th>attestation</th>
            <th>options</th>
          </tr>
        </thead>
            <tbody></tbody>
      </table>



 <div class="modal fade" tabindex="-1" role="dialog" id="addMember">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><i class="fas fa-plus-circle"></i>Ajouter une experience</h4>
      </div>

        <form  method="post"  class="form-horizontal" id="createMemberForm" enctype="multipart/form-data">

      <div class="modal-body">
        <div class="messages"></div>
       <div class="form-group"> <!--/here teh addclass has-error will appear -->
        <label for="name" class="col-sm-5 control-label">Type d'enseignement</label>
        <div class="col-sm-10">
          <datalist id='lestypes'>
            <option value="Vacation TP">
            <option value="Vacation TD">
            <option value="Vacation cours">
            <option value="Vacation animés">
            <option value="Formation suivie">
          </datalist>
          <input type="text" class="form-control" list='lestypes' id="type" name="type" placeholder="type de diplome" required>
      <!-- here the text will apper  -->
<div id="libelleFrancaisError"></div>

        </div>
      </div>
       <div class="form-group"> <!--/here teh addclass has-error will appear -->
        <label for="name" class="col-sm-5 control-label">Titre de Formation</label>
        <div class="col-sm-10">

       <input type="text" class="form-control" id="titre" name="titre"  placeholder="titre de formation" required>
      <!-- here the text will apper  -->
<div id="libelleArabeError"></div>

        </div>
      </div>
       <div class="form-group"> <!--/here teh addclass has-error will appear -->
        <label for="name" class="col-sm-2 control-label">Etablissement</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="etablissement" name="etablissement" placeholder="etablissement" required>
      <!-- here the text will apper  -->
      <div id="abreviationError"></div>
        </div>
      </div>



        <div class="form-group" id='fichierfield'> <!--/here teh addclass has-error will appear -->
        <label for="name" class="col-sm-2 control-label">Attestation</label>
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
       <h4 class="modal-title"><i class="fas fa-plus-circle"></i>Modifier une experience</h4>
     </div>

       <form  method="post"  class="form-horizontal" id="modifyMemberForm" enctype="multipart/form-data">

     <div class="modal-body">
       <div class="messages"></div>
      <div class="form-group"> <!--/here teh addclass has-error will appear -->
       <label for="name" class="col-sm-5 control-label">Type d'enseignement</label>
       <div class="col-sm-10">
         <datalist id='lestypes'>
           <option value="Vacation TP">
           <option value="Vacation TD">
           <option value="Vacation cours">
           <option value="Vacation animés">
           <option value="Formation suivie">
         </datalist>
         <input type="text" class="form-control" id="type2" list='lestypes' name="type2" placeholder="type de diplome" required>
     <!-- here the text will apper  -->

<div id="libelleFrancaisError"></div>

       </div>
     </div>
      <div class="form-group"> <!--/here teh addclass has-error will appear -->
       <label for="name" class="col-sm-5 control-label">Titre de formation</label>
       <div class="col-sm-10">
         <input type="text" class="form-control" id="titre2" name="titre2" placeholder="titre de formation" required>
     <!-- here the text will apper  -->
<div id="libelleArabeError"></div>

       </div>
     </div>
      <div class="form-group"> <!--/here teh addclass has-error will appear -->
       <label for="name" class="col-sm-2 control-label">Etablissement</label>
       <div class="col-sm-10">
         <input type="text" class="form-control" id="etablissement2" name="etablissement2" placeholder="etablissement" required>
     <!-- here the text will apper  -->
     <div id="abreviationError"></div>
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

<script src="script/candidat/experience.js" type="text/javascript"></script>
</script>
  <script src="vendor/bootstrap/js/popper.min.js" type="text/javascript"></script>
