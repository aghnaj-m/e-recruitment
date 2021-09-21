        <!-- page content -->
        <div class="table_container">
          <div class="row">
            <div class="col-md-12">

              <center><h1 class="page-header" style="font-family: Suez One; ">E-recrutement( back office) <small style="font-family: Chalkduster;">gestion</small> </h1> </center>
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
                <i class="fas fa-plus-circle"></i> Ajouter un utilisateur
              </button>

              <br /> <br /> <br />

              <table class="table table-striped " id="manageMemberTable" >
                <thead>
                  <tr>
                    
                    <th>Cin</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Email</th>
                    <th>Telephone</th>
                    <th>Adresse</th>
                    <th>Role</th>
                    <th>photo</th>
                    <th>Membre</th>
                  </tr>
                </thead>
                    <tbody></tbody>                
              </table>
              
              
              
         <div class="modal fade" tabindex="-1" role="dialog" id="addMember">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title"><i class="fas fa-plus-circle"></i>Ajouter une actualité</h4>
              </div>

                <form  method="post"  class="form-horizontal" id="createMemberForm" enctype="multipart/form-data">

              <div class="modal-body">
                <div class="messages"></div>
                
               <div class="form-group"> <!--/here teh addclass has-error will appear -->
                <label for="name" class="col-sm-5 control-label">Cin</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="cin" name="cin" placeholder="cin" required>
              <!-- here the text will apper  -->
				<div id="cinError"></div>
                </div>
              </div>
                
               <div class="form-group"> <!--/here teh addclass has-error will appear -->
                <label for="name" class="col-sm-5 control-label">Nom </label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="nom" name="nom" placeholder="nom" required>
              <!-- here the text will apper  -->
				<div id="nomError"></div>
                </div>
              </div>
                
               <div class="form-group"> <!--/here teh addclass has-error will appear -->
                <label for="name" class="col-sm-2 control-label">Prenom </label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="prenom" name="prenom" placeholder="prenom" required>
              <!-- here the text will apper  -->
				<div id="prenomError"></div>
                </div>
              </div>
               
            
               <div class="form-group"> <!--/here teh addclass has-error will appear -->
                <label for="name" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                  <input type="email" class="form-control" id="email" name="email" placeholder="email" required>
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
                <input type="text" class="form-control" id="adresse" name="adresse" required>
                <div id="adresseError"></div>
				<!-- here the text will apper  -->
                    </div>
                </div>
                
                <div class="form-group"> <!--/here teh addclass has-error will appear -->
		 <label for="name" class="col-sm-2 control-label">Role</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="role" name="role" required>
                <div id="roleError"></div>
				<!-- here the text will apper  -->
                    </div>
                </div>
		<div class="form-group"> <!--/here teh addclass has-error will appear -->
		 <label for="name" class="col-sm-2 control-label">Photo</label>
                <div class="col-sm-10">
                <input type="file" class="form-control" id="photo" name="photo" required>
                <div id="photoError"></div>
				<!-- here the text will apper  -->
                    </div>
                </div>
                
                
                
                <div class="form-group"> <!--/here teh addclass has-error will appear -->
		 <label for="name" class="col-sm-2 control-label">Membre</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="membre" name="membre" required>
                <div id="membreError"></div>
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

        <script src="script/utilisateur.js" type="text/javascript"></script>
          <script src="vendor/bootstrap/js/popper.min.js" type="text/javascript"></script>


