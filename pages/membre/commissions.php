
        <!-- page content -->
        <div class="table_container">
          <div class="row">
            <div class="col-md-12">
              <h2 class=" text-center  text-uppercase font-weight-bold" >VOS COMMISSIONS</h2>
              <br>
              <div class="removeMessages"></div>

                <div class="card shadow mb-4 Mycard" >
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                  <h4 class="m-0 font-weight-bold text-primary" id="listTitle" style="color: black;"></h4>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExample">
                  <div class="card-body">
                    <div id="membersList"></div>
                  </div>
                </div>
              </div>

              <br /> <br />
            <p><span style="color:red">*</span> Cliquer sur l'une des commissions pour voir ses membres !</p><br>
              <table class="table table-striped " id="manageMemberTable" name="<?php echo $_SESSION['utilisateur'];?>">
                <thead>
                  <tr>
                    <th>nom</th>
                    <th>Description</th>
                    <th>Date De Création</th>
                    <th style="display: none;"></th>
                  </tr>
                </thead>
                    <tbody></tbody>
              </table>

            </div>
          </div>
        </div>

        <script src="script/membre/commission.js" type="text/javascript"></script>
          <script src="vendor/bootstrap/js/popper.min.js" type="text/javascript"></script>



          