<?php
error_reporting( ~E_NOTICE ); // avoid notice
include_once 'connexion/Connexion.php';

if(isset($_POST['savepublication']))
{

$imgFile = $_FILES['fichierpublication']['name'];
$tmp_dir = $_FILES['fichierpublication']['tmp_name'];


  $upload_dir = 'img/candidats/publication/'; // upload directory
  $imgExt   = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); //image extension !!
  // rename uploading image
  $userpic = $_SESSION['utilisateur'].$_POST['datepublication'].".".$imgExt;

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
    <a href="candidathome.php?p=these">  <li class="nav-item" style=' padding:10px 150px;'>
      <h2><i class="fas fa-book-reader"></i> These</h2>
      </li> </a>
   <a href="candidathome.php?p=publication"><li class="nav-item bg-primary"  style='color:white;padding:10px 150px;'>
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
      <h3>Mes Publications</h3>
      <hr><br>

      <button class="btn btn-primary pull pull-left" data-toggle="modal" data-target="#addMemberpub" id="addMemberModalBtn">
        <i class="fas fa-plus-circle"></i> Ajouter une publication
      </button>

      <br /> <br /> <br />

      <table class="table table-striped " id="manageMemberTable" >
        <thead>
          <tr>
            <th style="display:none;">Id</th>
            <th>url</th>
            <th>titre</th>
            <th>date</th>
            <th>type</th>
            <th>fichier</th>
            <th>options</th>
          </tr>
        </thead>
            <tbody id='bodypublication'></tbody>
      </table>



 <div class="modal fade" tabindex="-1" role="dialog" id="addMemberpub">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><i class="fas fa-plus-circle"></i>Ajouter une thèse</h4>
      </div>

        <form  method="post"  class="form-horizontal" id="createMemberForm" enctype="multipart/form-data">

      <div class="modal-body">
        <div class="messages"></div>
       <div class="form-group"> <!--/here teh addclass has-error will appear -->
        <label for="name" class="col-sm-5 control-label">Url</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="urlpublication" name="urlpublication" placeholder="url de publication" required>
      <!-- here the text will apper  -->
<div id="libelleFrancaisError3"></div>

        </div>
      </div>
       <div class="form-group"> <!--/here teh addclass has-error will appear -->
        <label for="name" class="col-sm-5 control-label">Titre</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="titrepublication" name="titrepublication" placeholder="titre de la publication" required>
      <!-- here the text will apper  -->
<div id="libelleArabeError3"></div>

        </div>
      </div>
       <div class="form-group"> <!--/here teh addclass has-error will appear -->
        <label for="name" class="col-sm-2 control-label">Type</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="typepublication" name="typepublication" placeholder="type de publication" required>
      <!-- here the text will apper  -->
      <div id="abreviationError"></div>
        </div>
      </div>
       <div class="form-group"> <!--/here teh addclass has-error will appear -->
        <label for="name" class="col-sm-2 control-label">Date</label>
        <div class="col-sm-10">
          <input type="date" class="form-control" id="datepublication" name="datepublication" placeholder="date" required>
      <!-- here the text will apper  -->
      <div id="villeError"></div>
        </div>
      </div>
      <div class="form-group"> <!--/here teh addclass has-error will appear -->
       <label for="name" class="col-sm-2 control-label">Fichier</label>
       <div class="col-sm-10">
         <input type="file" class="form-control" id="fichierpublication" name="fichierpublication" placeholder="fichier" required>
     <!-- here the text will apper  -->
     <div id="villeError"></div>
       </div>
     </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
        <button type="submit" name='savepublication' id='savepublication' class="btn btn-primary">Sauvgarder</button>
      </div>
      </form>


    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /add modal -->


<div class="modal fade" tabindex="-1" role="dialog" id="modificationPub">
 <div class="modal-dialog" role="document">
   <div class="modal-content">
     <div class="modal-header">
       <h4 class="modal-title"><i class="fas fa-plus-circle"></i>Modifier une Publication</h4>
     </div>

       <form  method="post"  class="form-horizontal" id="modifyMemberForm" enctype="multipart/form-data">

     <div class="modal-body">
       <div class="messages"></div>
      <div class="form-group"> <!--/here teh addclass has-error will appear -->
       <label for="name" class="col-sm-5 control-label">URL</label>
       <div class="col-sm-10">
         <input type="text" class="form-control" id="urlpublication2" name="urlpublication2" placeholder="url de publication" required>
     <!-- here the text will apper  -->
<div id="libelleFrancaisError"></div>

       </div>
     </div>
      <div class="form-group"> <!--/here teh addclass has-error will appear -->
       <label for="name" class="col-sm-5 control-label">titre</label>
       <div class="col-sm-10">
         <input type="text" class="form-control" id="titrepublication2" name="titrepublication2" placeholder="titre" required>
     <!-- here the text will apper  -->
<div id="libelleArabeError"></div>

       </div>
     </div>
      <div class="form-group"> <!--/here teh addclass has-error will appear -->
       <label for="name" class="col-sm-2 control-label">type</label>
       <div class="col-sm-10">
         <input type="text" class="form-control" id="typepublication2" name="typepublication2" placeholder="type de publication" required>
     <!-- here the text will apper  -->
     <div id="abreviationError"></div>
       </div>
     </div>
     <div class="form-group"> <!--/here teh addclass has-error will appear -->
      <label for="name" class="col-sm-2 control-label">date</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="datepublication2" name="datepublication2" placeholder="date de publication" required>
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

<script src="script/candidat/publication.js" type="text/javascript"></script>
  <script src="vendor/bootstrap/js/popper.min.js" type="text/javascript"></script>
