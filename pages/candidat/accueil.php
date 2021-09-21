<p id='cin' style='display:none;'><?php echo $_SESSION['utilisateur'] ?></p>
<br>
<p class="h2 text-center text-primary text-uppercase font-weight-bold">Plateforme de Gestion des Concours de Recrutement de l'université Chouaib Doukkali</p>
<br>
<hr>
<br>
<div class="row">
  <!-- Earnings (Monthly) Card Example -->
  <div class="col-sm-6">
    <a href="candidathome.php?p=infos" style="text-decoration: none;">
    <div class="card border-left-info shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-info text-uppercase mb-1"> <h2>Informations Personnelles</h2> </div>
            <div class="row no-gutters align-items-center">
              <div class="col-auto">
                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
              </div>
              <div class="col">
                <div class="progress progress-sm mr-2">
                  <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-auto">
            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
    </a>
  </div>
  <!-- Earnings (Monthly) Card Example -->
  <div class="col-sm-6" >
    <a href="candidathome.php?p=diplome" style="text-decoration: none;">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><h2>Mes Diplomes</h2></div>
              <div class="h5 mb-0 font-weight-bold text-gray-800" id='nombrediplome'>...</div>
            </div>
            <div class="col-auto">

              <i class="fas fa-graduation-cap fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </a>

  </div>
</div>
<br>
<div class='row'>
  <!-- Earnings (Monthly) Card Example -->
  <div class="col-sm-6">
    <a href="candidathome.php?p=these" style="text-decoration: none;">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><h2>Mes Theses et Publications</h2></div>
              <div class="h5 mb-0 font-weight-bold text-gray-800" id='nombrethese'>...</div>
            </div>
            <div class="col-auto">

              <i class="fas fa-book-reader fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    </a>




  <!-- Pending Requests Card Example -->
  <div class="col-sm-6" >
    <a href="candidathome.php?p=experience" style="text-decoration: none;">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"><h2>Mes Experiences Pédagogiques</h2></div>
              <div class="h5 mb-0 font-weight-bold text-gray-800" id='nombrepublication'>...</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-chalkboard-teacher fa-2x text-gray-300"></i>

            </div>
          </div>
        </div>
      </div>
    </a>

  </div>
</div>
<script src="script/candidat/accueil.js" type="text/javascript"></script>
  <script src="vendor/bootstrap/js/popper.min.js" type="text/javascript"></script>
