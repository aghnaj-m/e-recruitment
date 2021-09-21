        <!-- page content -->
        <div class="table_container">
          <div class="row">
            <div class="col-md-12">

              <center><h1 class="page-header" style="font-family: Arial; ">Gestion des Concours </h1> </center>
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
                <i class="fas fa-plus-circle"></i> Ajouter un Concours
              </button>

              <br /> <br /> <br />

              <table class="table table-striped " id="manageMemberTable" name="<?php if($_SESSION['role'] == "admin" && isset($_SESSION['etablissement']))
              {
                echo $_SESSION['etablissement'];
                }else echo "";?>">
                <thead>
                  <tr>
                    <th>Session</th>
                    <th>Date Début Dépot</th>
                    <th>Date Fin Dépot</th>
                    <th>État</th>
                    <th>nbr Poste</th>
                    <th>Type</th>
                    <th>Établissement</th>
                    <th>Commission</th>
                    <th>Option</th>
                    <th>Postulation</th>
                  </tr>
                </thead>
                    <tbody></tbody>
              </table>



         <div class="modal fade" tabindex="-1" role="dialog" id="addMember">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title"><i class="fas fa-plus-circle"></i>Ajouter un Concours</h4>
              </div>

                <form  method="post"  class="form-horizontal" id="createMemberForm" enctype="multipart/form-data">

              <div class="modal-body row">
                <div class="messages"></div>
               <div class="form-group col-sm-6 mb-4"> <!--/here teh addclass has-error will appear -->
                <label for="name" class="col-sm-5 control-label">Session</label>
                <div>
                  <input type="date" class="form-control" id="session" name="session" placeholder="session" required>
              <!-- here the text will apper  -->
				<div id="sessionError"></div>

                </div>
              </div>
               <div class="form-group col-sm-6 mb-4"> <!--/here teh addclass has-error will appear -->
                <label for="name" class="col-sm-5 control-label">Date_Début_Dépot</label>
                <div>
                  <input type="date" class="form-control" id="dateDebutDepot" name="dateDebutDepot" required>
              <!-- here the text will apper  -->
				<div id="dateDebutDepotError"></div>

                </div>
              </div>
               <div class="form-group col-sm-6 mb-4"> <!--/here teh addclass has-error will appear -->
                <label for="name" class="col-sm-2 control-label">Date_Fin_Dépot</label>
                <div>
                  <input type="date" class="form-control" id="dateFinDepot" name="dateFinDepot" required>
		<div id="dateFinDepotError"></div>
                </div>
              </div>
               <div class="form-group col-sm-6 mb-4"> <!--/here teh addclass has-error will appear -->
                <label for="name" class="col-sm-2 control-label">État</label>
                <div>
                    <select type="text" class="form-control" id="etat" name="etat" required>
			<option>Ferme</option>
                        <option>Ouvert</option>
                    </select>
			<div id="etatError"></div>
                </div>
              </div>

		<div class="form-group col-sm-6 mb-4"> <!--/here teh addclass has-error will appear -->
		 <label for="name" class="col-sm-2 control-label">Nombre_de_Poste</label>
                <div>
                <input type="number" class="form-control" id="nbrPoste" name="nbrPoste" required>
                <div id="nbrPosteError"></div>
				<!-- here the text will apper  -->
                    </div>
                </div>
                <div class="form-group col-sm-6 mb-4"> <!--/here teh addclass has-error will appear -->
		 <label for="name" class="col-sm-2 control-label">Type</label>
                <div>
                <input type="text" class="form-control" id="type" name="type" required>
                <div id="typeError"></div>
				<!-- here the text will apper  -->
                    </div>
                </div>

                <?php if($_SESSION['role'] == 'super-admin'){ ?>
              <div class="form-group col-sm-6 mb-4"> <!--/here teh addclass has-error will appear -->
		            <label for="etablissement" class="col-sm-2 control-label">Établissement</label>
                <div>
                <select name="etablissement" class="form-control" type="text" id="etablissement" required>
                    <option> </option>
                </select>
                <div id="etablissementError"></div>
				<!-- here the text will apper  -->
                </div>
                </div>
                <?php } ?>

                <div class="form-group col-sm-6 mb-4"> <!--/here teh addclass has-error will appear -->
		            <label for="commission" class="col-sm-2 control-label">Commission</label>
                <div>
                <select name="commission" class="form-control" type="text" id="commission" required>
                    <option> </option>
                </select>
                <div id="commissionError"></div>
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

        <script src="script/concour.js" type="text/javascript"></script>
          <script src="vendor/bootstrap/js/popper.min.js" type="text/javascript"></script>
