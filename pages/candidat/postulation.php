<h2>Mes Postulations :</h2><br>
<p id='cin' style='display:none;'><?php echo $_SESSION['utilisateur'] ?></p>
<div class="table-responsive">
						<table class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th>Détails</th>
									<th>Etablissement</th>
									<th>Nombre de postes</th>
									<th>Date fin dépôt</th>
									<th>Etat</th>
									<th colspan=2>Action</th>
								</tr>
							</thead>
							<tbody id='postulation'>

							</tbody>
						</table>



					</div>

<div class="col-md-12" style="margin-top: 10px; margin-bottom: 20px;">
						<h3 class="title">Liste des Concours :</h3> <br>

						<div class="col-md-12">
								<div class="col-md-6">
									<div class="form-group">
										<label for="session" class="control-label">Session</label>
										<select id="session" name="session" class="form-control underlined">

											<option value="2020-03-30">Session 30 Mars 2020</option>

											<option value="2020-04-15">Session 15 Avril 2020</option>

                      <option value="2020-04-30">Session 30 Avril 2020</option>

											<option value="2020-05-15">Session 15 May 2020</option>

                      <option value="2020-05-30">Session 30 May 2020</option>
											
											<option value="2020-06-15">Session 15 Juin 2020</option>
										</select>
									</div>

									<div class="form-group">
										<button class="btn btn-primary chercher"> Chercher </button>
									</div>
								</div>
							<input type="hidden" name="__ncforminfo" value="B3iD_VdR1vdiilKGDZuHL4_NUPb5OXnwVjjQT54ny1xxrblnwm_k5yopn4boEdVU68SXI3_V0unHBBSnGOwIRTV9mbMGBc9L"></form>
              <table class="table table-striped table-bordered table-hover">
              							<thead>
              								<tr>
              									<th>Détail</th>
              									<th>Etablissement</th>
              									<th>Date début dépôt</th>
              									<th>Date fin dépôt</th>
              									<th>Etat</th>
              									<th>Action</th>
              								</tr>
              							</thead>
              							<tbody id='body'>

              </tbody>
            </table>
						<div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

     <!-- Modal content-->
       <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Etat de votre Postulation</h4>
      </div>
      <div class="modal-body">
        <p id='result'></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
      </div>
      </div>

           </div>
           </div>
            <script src="script/candidat/postulation.js" type="text/javascript"></script>
              <script src="vendor/bootstrap/js/popper.min.js" type="text/javascript"></script>
