        <!-- page content -->
        <div class="table_container">
          <div class="row">
            <div class="col-md-12">

              <center><h1 class="page-header" style="font-family: Arial; ">Gestion des Etablissements </h1> </center>
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

              <button class="btn btn-primary pull pull-right" data-toggle="modal" data-target="#addMember" id="addMemberModalBtn">
                <i class="fas fa-plus-circle"></i> Ajouter un Etablissement
              </button>

              <br /> <br /> <br />

              <table class="table table-striped " id="manageMemberTable" >
                <thead>
                  <tr>
                    <th>Logo</th>
                    <th>Libelle Arabe</th>
                    <th>libelle francais</th>
                    <th>Abreviation</th>
                    <th>Ville</th>
                    <th>Option</th>
                  </tr>
                </thead>
                    <tbody></tbody>
              </table>



         <div class="modal fade" tabindex="-1" role="dialog" id="addMember">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title"><i class="fas fa-plus-circle"></i>Ajouter une établissement</h4>
              </div>

                <form  method="post"  class="form-horizontal" id="createMemberForm" enctype="multipart/form-data">

              <div class="modal-body">
                <div class="messages"></div>
               <div class="form-group"> <!--/here teh addclass has-error will appear -->
                <label for="name" class="col-sm-5 control-label">Libelle en francais</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="libelleFrancais" name="libelleFrancais" placeholder="Libelle francais" required>
              <!-- here the text will apper  -->
				<div id="libelleFrancaisError"></div>

                </div>
              </div>
               <div class="form-group"> <!--/here teh addclass has-error will appear -->
                <label for="name" class="col-sm-5 control-label">Libelle en Arabe</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="libelleArabe" name="libelleArabe" placeholder="اسم المؤسسة بالعربية" required>
              <!-- here the text will apper  -->
				<div id="libelleArabeError"></div>

                </div>
              </div>
               <div class="form-group"> <!--/here teh addclass has-error will appear -->
                <label for="name" class="col-sm-2 control-label">Abreviation</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="abreviation" name="abreviation" placeholder="abreviation" required>
              <!-- here the text will apper  -->
							<div id="abreviationError"></div>
                </div>
              </div>
               <div class="form-group"> <!--/here teh addclass has-error will appear -->
                <label for="name" class="col-sm-2 control-label">Ville</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="ville" name="ville" placeholder="Ville..." required>
              <!-- here the text will apper  -->
							<div id="villeError"></div>
                </div>
              </div>

		<div class="form-group"> <!--/here teh addclass has-error will appear -->
		 <label for="name" class="col-sm-2 control-label">Logo</label>
                <div class="col-sm-10">
                <input type="file" class="form-control" id="photo" name="photo" required>
                <div id="photoError"></div>
				<!-- here the text will apper  -->
                    </div>
                </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                <button class="btn btn-primary ajouter">Sauvgarder</button>
              </div>
              </form>


            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!-- /add modal -->

            </div>
          </div>
        </div>

        <script src="script/etablissement.js" type="text/javascript"></script>
          <script src="vendor/bootstrap/js/popper.min.js" type="text/javascript"></script>
