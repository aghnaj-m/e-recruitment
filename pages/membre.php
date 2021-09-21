        <!-- page content -->
        <div class="table_container">
          <div class="row">
            <div class="col-md-12">

              <center><h1 class="page-header" style="font-family: Arial; ">Gestion des Membres  </h1> </center>
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
                <i class="fas fa-plus-circle"></i> Ajouter un Membre
              </button>

              <br /> <br /> <br />

              <table class="table table-striped " id="manageMemberTable" name="<?php if($_SESSION['role'] == "admin" && isset($_SESSION['etablissement']))
              {
                echo $_SESSION['etablissement'];
                }else echo "";?>">
                <thead>
                  <tr>
                    <th>photo</th>
                    <th>Cin</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>email</th>
                    <th>Telephone</th>
                    <th>Adresse</th>
                    <th>Fonction</th>
                    <th>Grade</th>
                    <th>Etablissement</th>
                    <th>Option</th>
                  </tr>
                </thead>
                <tbody id='body'>

                </tbody>
              </table>



         <div class="modal fade" tabindex="-1" role="dialog" id="addMember">
          <div class="modal-dialog None" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title"><i class="fas fa-plus-circle"></i>Ajouter un member</h4>
              </div>

                <form  method="post"  class="form-horizontal" id="createMemberForm" enctype="multipart/form-data">

              <div class="modal-body">
                <div class="messages"></div>

               <div class="form-group" id='cinfield'> <!--/here teh addclass has-error will appear -->
                <label for="name" class="col-sm-5 control-label">Cin</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="cin" name="cin" placeholder="cin" required>
              <!-- here the text will apper  -->
				<div id="cinError"></div>
                </div>
              </div>

               <div class="form-group"> <!--/here teh addclass has-error will appear -->
                <label for="name" class="col-sm-5 control-label">Nom</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="nomfrancais" name="nomfrancais" placeholder="nom francais" required>
              <!-- here the text will apper  -->
				<div id="nomfrancaisError"></div>
                </div>
              </div>

               <div class="form-group"> <!--/here teh addclass has-error will appear -->
                <label for="name" class="col-sm-2 control-label">Prenom</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="prenomfrancais" name="prenomfrancais" placeholder="prenom francais" required>
              <!-- here the text will apper  -->
				<div id="prenomfrancaisError"></div>
                </div>
              </div>

              <div class="form-group"> <!--/here teh addclass has-error will appear -->
                <label for="name" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="email" name="email" placeholder="email" required>
              <!-- here the text will apper  -->
				<div id="emailError"></div>
                </div>
              </div>


                <div class="form-group"> <!--/here teh addclass has-error will appear -->
                <label for="name" class="col-sm-2 control-label">Telephone</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" id="telephone" name="telephone" placeholder="telephone" required>
              <!-- here the text will apper  -->
				<div id="telephoneError"></div>
                </div>
              </div>

                <div class="form-group"> <!--/here teh addclass has-error will appear -->
		 <label for="name" class="col-sm-2 control-label">Adresse</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="adresse" name="adresse" placeholder="Adresse" required>
                <div id="adresseError"></div>
				<!-- here the text will apper  -->
                    </div>
                </div>

                <div class="form-group"> <!--/here teh addclass has-error will appear -->
		 <label for="name" class="col-sm-2 control-label">Fonction</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="fonction" name="fonction" placeholder="Fonction" required>
                <div id="fonctionError"></div>
				<!-- here the text will apper  -->
                    </div>
                </div>
		<div class="form-group"> <!--/here teh addclass has-error will appear -->
		 <label for="name" class="col-sm-2 control-label">Photo</label>
                <div class="col-sm-10">
                <input type="file" class="form-control" id="photo" name="photo" placeholder="Photo" required>
                <div id="photoError"></div>
				<!-- here the text will apper  -->
                    </div>
                </div>

                <div class="form-group"> <!--/here teh addclass has-error will appear -->
		 <label for="name" class="col-sm-2 control-label">Grade</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="grade" name="grade" placeholder="Grade" required>
                <div id="gradeError"></div>
				<!-- here the text will apper  -->
                    </div>
                </div>
      <?php if($_SESSION['role'] == 'super-admin'){ ?>
                <div class="form-group"> <!--/here teh addclass has-error will appear -->
		 <label for="name" class="col-sm-2 control-label">Etablissement</label>
                <div class="col-sm-10">
                <select id="etablissement" name="etablissement" class="form-control" required></select>
                <div id="etablissementError"></div>
				<!-- here the text will apper  -->
                    </div>
                </div>
      <?php } ?>

                <div class="form-group"> <!--/here teh addclass has-error will appear -->
		 <label for="name" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-10">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                <div id="passwordError"></div>
				<!-- here the text will apper  -->
                    </div>
                </div>


              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                <button id='submitbtn' class="btn btn-primary">Sauvgarder</button>
              </div>
              </form>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!-- /add modal -->

            </div>
          </div>
        </div>

        <script src="script/membre.js" type="text/javascript"></script>
          <script src="vendor/bootstrap/js/popper.min.js" type="text/javascript"></script>
