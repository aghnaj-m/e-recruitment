        <!-- page content -->
        <div class="table_container">
          <div class="row">
            <div class="col-md-12">
                        <br /> <br />
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
              } ?>
              </div>
              <br /> <br />
				<p style='display:none'; id="cnc"><?php if(isset($_GET['concour'])) echo $_GET['concour'];?></p>
					
              <table class="table table-striped " id="manageMemberTable" name="<?php if($_SESSION['role'] == "admin" && isset($_SESSION['etablissement']))
              {
                echo $_SESSION['etablissement'];
                }else echo "";?>">
                <thead>
                  <tr>
                    <th>Candidat</th>
                    <th>Profile Recherché</th>
                    <th>Date de postulation</th>
                    <th>État</th>
                    <th>Consulter</th>
                    <th>Valider</th>
                  </tr>
                </thead>
                <tbody id='body'>

                </tbody>
              </table>

            </div>
          </div>
        </div>

        <script src="script/postulation.js" type="text/javascript"></script>
          <script src="vendor/bootstrap/js/popper.min.js" type="text/javascript"></script>

