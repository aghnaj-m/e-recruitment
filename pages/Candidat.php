<!-- page content -->
<div class="table_container">
  <div class="row">
    <div class="col-md-12">

      <center><h1 class="page-header" style="font-family: Arial ">Gestion des Candidats  </h1> </center>
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

     <!--<button class="btn btn-primary pull pull-right" data-toggle="modal" data-target="#addMember" id="addMemberModalBtn">
        <i class="fas fa-plus-circle"></i> Ajouter un Candidat
      </button>-->

      <br /> <br /> <br />

      <table class="table table-striped " id="manageMemberTable" >
        <thead>
          <tr>
          <th>photo</th>
            <th>Cin</th>
            <th>NomFr</th>
            <th>PrenomFr</th>
            <th>NomAr</th>
            <th>PrenomAr</th>
            <th>Telephone</th>
            <th>Ville</th>
            <th>lieu de naissance</th>
            <th>Adresse</th>
            <th>Option</th>
          </tr>
        </thead>
            <tbody id='body'></tbody>
      </table>



 <div class="modal fade" tabindex="-1" role="dialog" id="addMember">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><i class="fas fa-plus-circle"></i>Modifier un canidat</h4>
      </div>

        <form  method="post"  class="form-horizontal" id="createMemberForm" enctype="multipart/form-data">

      <div class="modal-body">
        <div class="messages"></div>

  <!--     <div class="form-group" id='cinfield'>
        <label for="name" class="col-sm-5 control-label">Cin</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="cin" name="cin" placeholder="cin" required>

<div id="cinError"></div>
        </div>
      </div> -->

       <div class="form-group"> <!--/here teh addclass has-error will appear -->
        <label for="name" class="col-sm-5 control-label">Nom Francais</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="nomfrancais" name="nomfrancais" placeholder="nom francais" required>
      <!-- here the text will apper  -->
<div id="nomfrancaisError"></div>
        </div>
      </div>

       <div class="form-group"> <!--/here teh addclass has-error will appear -->
        <label for="name" class="col-sm-2 control-label">Prenom Francais</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="prenomfrancais" name="prenomfrancais" placeholder="prenom francais" required>
      <!-- here the text will apper  -->
<div id="prenomfrancaisError"></div>
        </div>
      </div>
       <div class="form-group"> <!--/here teh addclass has-error will appear -->
        <label for="name" class="col-sm-5 control-label">Nom Arabe</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="nomarabe" name="nomarabe" placeholder="nom arabe" required>
      <!-- here the text will apper  -->
<div id="nomarabeError"></div>
        </div>
      </div>

       <div class="form-group"> <!--/here teh addclass has-error will appear -->
        <label for="name" class="col-sm-2 control-label">Prenom Arabe</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="prenomarabe" name="prenomarabe" placeholder="prenom arabe" required>
      <!-- here the text will apper  -->
<div id="prenomarabeError"></div>
        </div>
      </div>

      <div class="form-group" id='telephonefield'> <!--/here teh addclass has-error will appear -->
       <label for="name" class="col-sm-2 control-label">Telephone</label>
       <div class="col-sm-10">
         <input type="text" class="form-control" id="telephone" name="telephone" placeholder="telephone" required>
     <!-- here the text will apper  -->
     <div id="telephoneError"></div>
       </div>
     </div>

        <div class="form-group"> <!--/here teh addclass has-error will appear -->
        <label for="name" class="col-sm-2 control-label">Adresse</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="adresse" name="adressee" placeholder="adresse" required>
      <!-- here the text will apper  -->
<div id="adresseError"></div>
        </div>
      </div>

        <div class="form-group"> <!--/here teh addclass has-error will appear -->
<label for="name" class="col-sm-2 control-label">Ville</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="ville" name="ville" placeholder='ville' required>
        <div id="villeError"></div>
<!-- here the text will apper  -->
            </div>
        </div>

        <div class="form-group" id='fonctionnairefield'> <!--/here teh addclass has-error will appear -->
<label for="name" class="col-sm-2 control-label">Fonction</label>
        <div class="col-sm-10">
      <select class="form-control" name="fonctionnaire" id='fonctionnaire' required>
        <option value="1">Fonctionnaire</option>
        <option value="0">Non</option>
      </select>
        <div id="fonctionError"></div>
<!-- here the text will apper  -->
            </div>
        </div>
<div class="form-group"> <!--/here teh addclass has-error will appear -->
<label for="name" class="col-sm-2 control-label">Lieu de Naissance</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="lieu" name="lieu" placeholder="lieu de naissance" required>
        <div id="lieuError"></div>
<!-- here the text will apper  -->
            </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
        <button type="submit" id='submitbtn' class="btn btn-primary">Sauvgarder</button>
      </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /add modal -->

    </div>
  </div>
</div>

<script src="script/Candidat.js" type="text/javascript"></script>
  <script src="vendor/bootstrap/js/popper.min.js" type="text/javascript"></script>
