<?php
error_reporting( ~E_NOTICE ); // avoid notice
include_once 'connexion/Connexion.php';

if(isset($_POST['savefile']))
{

$imgFile = $_FILES['fichier']['name'];
$tmp_dir = $_FILES['fichier']['tmp_name'];


  $upload_dir = 'img/candidats/these/'; // upload directory
  $imgExt   = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); //image extension !!
  // rename uploading image
  $userpic = $_SESSION['utilisateur'].$_POST['date'].".".$imgExt;

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
<!-- page content -->
<nav class="navbar navbar-expand-sm bg-light justify-content-center">
  <ul class="navbar-nav ">
    <a href="candidathome.php?p=these">  <li class="nav-item bg-primary" style='color: white;padding:10px 150px;'>
      <h2><i class="fas fa-book-reader"></i> These</h2>
      </li> </a>
   <a href="candidathome.php?p=publication"><li class="nav-item "  style='padding:10px 150px;'>
     <h2><i class="fas fa-book"></i> Publications</h2>
   </li></a>


  </ul>
</nav>
<p id='cin' style='display:none;'><?php echo $_SESSION['utilisateur'] ?></p>
<div class="table_container">
  <div class="row">
    <div class="col-md-12">


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
      <br><hr>
      <h3>Mes Thèses</h3>
      <hr><br>

      <button class="btn btn-primary pull pull-left" data-toggle="modal" data-target="#addMember" id="addMemberModalBtn">
        <i class="fas fa-plus-circle"></i> Ajouter une thèse
      </button>

      <br /> <br /> <br />

      <table class="table table-striped " id="manageMemberTable" >
        <thead>
          <tr>
            <th style='display:none;'>Id</th>
            <th>type de thèse</th>
            <th>date</th>
            <th>centre de recherche</th>
            <th>fichier</th>
            <th>Jury</th>
            <th>options</th>
          </tr>
        </thead>
            <tbody id='bodythese'></tbody>
      </table>

       <div class="modal fade" tabindex="-1" role="dialog" id="addMember">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"><i class="fas fa-plus-circle"></i>Ajouter une thèse</h4>
            </div>

              <form  method="post"  class="form-horizontal" id="createMemberForm" enctype="multipart/form-data">

            <div class="modal-body">
              <div class="messages"></div>
             <div class="form-group"> <!--/here teh addclass has-error will appear -->
              <label for="name" class="col-sm-5 control-label">Type de thèse</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="type" name="type" placeholder="type de these" required>
            <!-- here the text will apper  -->
      <div id="libelleFrancaisError"></div>

              </div>
            </div>
             <div class="form-group"> <!--/here teh addclass has-error will appear -->
              <label for="name" class="col-sm-5 control-label">Date</label>
              <div class="col-sm-10">
                <input type="date" class="form-control" id="date" name="date" placeholder="date" required>
            <!-- here the text will apper  -->
      <div id="libelleArabeError"></div>

              </div>
            </div>
             <div class="form-group"> <!--/here teh addclass has-error will appear -->
              <label for="name" class="col-sm-2 control-label">Centre de recherche</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="centre" name="centre" placeholder="centre" required>
            <!-- here the text will apper  -->
            <div id="abreviationError"></div>
              </div>
            </div>
             <div class="form-group"> <!--/here teh addclass has-error will appear -->
              <label for="name" class="col-sm-2 control-label">Fichier</label>
              <div class="col-sm-10">
                <input type="file" class="form-control" id="fichier" name="fichier" placeholder="fichier" required>
            <!-- here the text will apper  -->
            <div id="villeError"></div>
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
             <h4 class="modal-title"><i class="fas fa-plus-circle"></i>Modifier une Thèse</h4>
           </div>

             <form  method="post"  class="form-horizontal" id="modifyMemberForm" enctype="multipart/form-data">

           <div class="modal-body">
             <div class="messages"></div>
            <div class="form-group"> <!--/here teh addclass has-error will appear -->
             <label for="name" class="col-sm-5 control-label">type de thèse</label>
             <div class="col-sm-10">
               <input type="text" class="form-control" id="type2" name="type2" placeholder="type de diplome" required>
           <!-- here the text will apper  -->
      <div id="libelleFrancaisError"></div>

             </div>
           </div>
            <div class="form-group"> <!--/here teh addclass has-error will appear -->
             <label for="name" class="col-sm-5 control-label">date</label>
             <div class="col-sm-10">
               <input type="date" class="form-control" id="date2" name="date2" placeholder="date" required>
           <!-- here the text will apper  -->
      <div id="libelleArabeError"></div>

             </div>
           </div>
            <div class="form-group"> <!--/here teh addclass has-error will appear -->
             <label for="name" class="col-sm-2 control-label">centre de recherche</label>
             <div class="col-sm-10">
               <input type="text" class="form-control" id="centre2" name="centre2" placeholder="etablissement" required>
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

      <div id="showjuries" class="modal fade" role="dialog">
      <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
      <div class="modal-header">
      <h4 class="modal-title">La liste des membres de Jury</h4>
      <p style='display:none' id='hidden2'></p>
      </div>
      <div class="modal-body">
        <table class='table table-hover'>
          <thead>
            <tr>
              <th>Nom</th>
              <th>Prenom</th>
              <th>Etablissement</th>
              <th>Grade</th>
              <th>Option</th>
            </tr>
          </thead>
        <tbody id='listejuries'>

        </tbody>

        </table>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-info" data-dismiss="modal">Fermer</button>
      </div>
      </div>
      </div>
      </div>
<!--modal-->
      <div id="ADDJURY" class="modal fade" role="dialog">
      <div class="modal-dialog">

<!-- Modal content-->
 <div class="modal-content">
<div class="modal-header">
  <h4 class="modal-title">Ajouter les membres de Jury</h4>
  <p style='display:none' id='hidden'></p>
</div>
<div class="modal-body">
  <form class="" action="candidathome.php?p=these" method="post">
    <div class="row">
      <div class="col-sm-6">
        <label for="name-jury" class='label-control'>Nom :</label>
         <input type="text" class='form-control' name='name-jury' id='name-jury' required>
      </div>
      <div class="col-sm-6">
        <label for="prenom-jury" class='label-control'>Prenom : </label>
          <input type="text" class='form-control' id='prenom-jury' required>
      </div>
    </div>

   <div class="">
     <label for="etablissement-jury" class='label-control'>Etablissement : </label>
       <input type="text" class='form-control' id='etablissement-jury' required>
   </div>
   <div class="">
     <label for="etablissement-jury" class='label-control'>Grade : </label>
       <select class="form-control" name="grade-jury" id='grade-jury'>
         <option value="PH" selected>PH</option>
         <option value="PES">PES</option>
       </select>
   </div>

</div>
<div class="modal-footer">
  <button type="submit" class="btn btn-info add-finish-jury" >Ajouter</button>
</div>
</div>
</form>





    </div>
  </div>
</div>

<script src="script/candidat/these.js" type="text/javascript"></script>
  <script src="vendor/bootstrap/js/popper.min.js" type="text/javascript"></script>
