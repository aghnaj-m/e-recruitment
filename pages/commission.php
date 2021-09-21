
        <!-- page content -->
        <div class="table_container">
          <div class="row">
            <div class="col-md-12">

              <center><h1 class="page-header" style="font-family: Arial; ">Gestion des Commissions</h1> </center>
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


                <div class="card shadow mb-4 Mycard" >
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                  <h4 class="m-0 font-weight-bold text-primary" id="listTitle" style="color: black;"></h4>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExample">
                  <div class="card-body">
                    <p><strong style="color:red;">NB: </strong>effectuez une <strong>multiple selection</strong> pour affecter les membres à cette commission! </p>
                    <br>
                    <select name="members" id="members" class="selectpicker form-control"
                     data-style="btn-success" multiple data-live-search="false">
                    </select><br><br>
                    <div id="membersList"></div>
                  </div>
                </div>
              </div>


              <button class="btn btn-primary pull pull-right" data-toggle="modal" data-target="#addMember" id="addMemberModalBtn">
                <i class="fas fa-plus-circle"></i> Ajouter un Commission
              </button>

              <br /> <br /> <br />

              <table class="table table-striped " id="manageMemberTable" name="<?php if($_SESSION['role'] == "admin" && isset($_SESSION['etablissement']))
              {
                echo $_SESSION['etablissement'];
                }else echo "";?>">
                <thead>
                  <tr>
                    <th>nom</th>
                    <th>Description</th>
                    <th>Etablissement</th>
                    <th>Date De Création</th>
                    <th>Option</th>
                    <th style="visibility: hidden;">
                  </tr>
                </thead>
                    <tbody></tbody>
              </table>

         <div class="modal fade" tabindex="-1" role="dialog" id="addMember">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title"><i class="fas fa-plus-circle"></i>Ajouter une Commission</h4>
              </div>

                <form  method="post"  class="form-horizontal" id="createMemberForm" enctype="multipart/form-data">

              <div class="modal-body">
                <div class="messages"></div>
               <div class="form-group"> <!--/here teh addclass has-error will appear -->
                <label for="name" class="col-sm-5 control-label">Nom</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="nom" name="nom" placeholder="nom de la commission" required>
              <!-- here the text will apper  -->
				<div id="nomError"></div>

                </div>
              </div>


                <div class="form-group"> <!--/here teh addclass has-error will appear -->
                <label for="name" class="col-sm-5 control-label">Description</label>
                <div class="col-sm-10">
                <textarea class="form-control" name="description" id="description" placeholder="description" cols="10" rows="10"></textarea>
              <!-- here the text will apper  -->
				<div id="descriptionError"></div>
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

        <script src="script/commission.js" type="text/javascript"></script>
          <script src="vendor/bootstrap/js/popper.min.js" type="text/javascript"></script>
