<?php
error_reporting( ~E_NOTICE ); // avoid notice
include_once 'connexion/Connexion.php';

if(isset($_POST['changepic']))
{

$imgFile = $_FILES['newpic']['name'];
$tmp_dir = $_FILES['newpic']['tmp_name'];


  $upload_dir = 'img/candidats/'; // upload directory
  $imgExt   = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); //image extension !!
  // rename uploading image
  $userpic = $_SESSION['utilisateur'].".".$imgExt;

  // allow valid image file formats

    move_uploaded_file($tmp_dir,$upload_dir.$userpic);
    $_SESSION['photo']=$userpic;
  }
  if(isset($_POST['changecv']))
  {

  $cvFile = $_FILES['cv']['name'];
  $tmp_dir = $_FILES['cv']['tmp_name'];


    $upload_dir = 'img/candidats/cv/'; // upload directory
    $imgExt   = strtolower(pathinfo($cvFile,PATHINFO_EXTENSION)); //image extension !!
    // rename uploading image
    $usercv = $_SESSION['utilisateur'].".".$imgExt;

    // allow valid image file formats

      move_uploaded_file($tmp_dir,$upload_dir.$usercv);

    }
    if(isset($_POST['changecne']))
    {

      $cinFile = $_FILES['cinrecto']['name'];
      $tmp_dir = $_FILES['cinrecto']['tmp_name'];


        $upload_dir = 'img/candidats/cne/'; // upload directory
        $cinExt   = strtolower(pathinfo($cinFile,PATHINFO_EXTENSION)); //image extension !!
        // rename uploading image
        $usercin = $_SESSION['utilisateur']."recto.".$cinExt;

        // allow valid image file formats

          move_uploaded_file($tmp_dir,$upload_dir.$usercin);

      }
      if(isset($_POST['changecne']))
      {

        $cinFile = $_FILES['cinverso']['name'];
        $tmp_dir = $_FILES['cinverso']['tmp_name'];


          $upload_dir = 'img/candidats/cne/'; // upload directory
          $cinExt   = strtolower(pathinfo($cinFile,PATHINFO_EXTENSION)); //image extension !!
          // rename uploading image
          $usercin = $_SESSION['utilisateur']."verso.".$cinExt;

          // allow valid image file formats

            move_uploaded_file($tmp_dir,$upload_dir.$usercin);

        }
?>
<h1>Dossier: Informations Candidat</h1>
<div class="">
  <div class="" style='float:right;'>
    <img style='width:200px' class="img-profile rounded-circle" src="img/candidats/<?php if (isset($_SESSION['photo'])) {
                            echo $_SESSION['photo'];
                            } else
                                echo 'no-photo.jpg'
                            ?>" > <br><hr>

    <button type="button" name="button" class='btn btn-primary pull' data-toggle="modal" data-target="#changepicture" id='changepic'><i class="fas fa-camera"></i>'    changer ma photo</button>
  </div>
</div>
<hr>

  <button class="btn btn-primary pull pull-left modifier" data-toggle="modal" data-target="#addMember" id="modificationsInfos">
    <i class="fas fa-plus-circle"></i> Modifier mes infos
  </button>
  <br>
  <hr>
  <br>
  <!-- TABLE D'INFO GAUCHE -->
<div class="row">
  <div class="col-sm-5">
    <table class='table table-hover table-striped'>
      <tr>
        <th class='table-primary'>CIN</th>
        <td id='candidatcin'><?php
                                if (isset($_SESSION['utilisateur'])) {
                                    echo $_SESSION['utilisateur'];
                                }
                            ?></td>
      </tr>
      <tr>
        <th class='table-primary'>NOM</th>
        <td id='candidatnom'></td>
      </tr>
      <tr>
        <th class='table-primary'>PRENOM</th>
        <td id='candidatprenom'></td>
      </tr>
      <tr>
        <th class='table-primary'>الاسم العائلي</th>
        <td id='candidatnomar'></td>
      </tr>
      <tr>
        <th class='table-primary'>الاسم العائلي</th>
        <td id='candidatprenomar'></td>
      </tr>
      <tr>
        <th class='table-primary'>Telephone</th>
        <td id='candidattel'></td>
      </tr>
    </table>
  </div>

  <div class="col-sm-1"></div>

    <!-- TABLE D'INFO DROITE -->
<div class="col-sm-5">
  <table class='table table-hover table-striped'>
    <tr>
      <th class='table-primary'>Email</th>
      <td id='candidatemail'></td>
    </tr>
    <tr>
      <th class='table-primary'>Ville</th>
      <td id='candidatville'></td>
    </tr>
    <tr>
      <th class='table-primary'>Adresse</th>
      <td id='candidatadresse'></td>
    </tr>
    <tr>
      <th class='table-primary'>fonctionnaire</th>
      <td id='candidatfonction'></td>
    </tr>
    <tr>
      <th class='table-primary'>Date de naissance</th>
      <td id='candidatdate'></td>
    </tr>
    <tr>
      <th class='table-primary'>Lieu de naissance</th>
      <td id='candidatlieu'></td>
    </tr>
  </table>
</div>
    <!-- TABLE D'INFO DROITE -->
</div>
<br>
<hr>
<div class="container row">

  <div class="col-sm-6">
      <h1>Carte Nationale d'Identite Electronique (CNIE) <h1>
        <button class="btn btn-primary pull pull-left modifier" data-toggle="modal" data-target="#addcne" id="modificationcne">  <i class="fas fa-plus-circle"></i> Charger mon CNE
        </button>
  </div>
  <div class="col-sm-1">

  </div>
  <div class='col-sm-4'>
      <h1>Curriculum vitæ (CV)<h1>
    <button class="btn btn-primary pull pull-right modifier" data-toggle="modal" data-target="#addcv" id="modificationcv">  <i class="fas fa-plus-circle"></i> Charger Mon cv
    </button>
  </div>

</div>
<br>
<hr>
<!----------------------------------   MODALS --------------------------------------------->

<!------- MODIFICATION MODAL ------>
<div class="modal fade" tabindex="-1" role="dialog" id="addMember">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h4 class="modal-title"><i class="fas fa-plus-circle"></i>Modifier mes infos</h4>
       </div>

         <form  method="post"  class="form-horizontal" id="createMemberForm" enctype="multipart/form-data">

       <div class="modal-body">
         <div class="messages"></div>

   <div class="row">
     <div class="col-sm-6">

               <div class="form-group"> <!--/here teh addclass has-error will appear -->
                <label for="name" class="col-sm-6 control-label">Nom Francais</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="nomfrancais" name="nomfrancais" placeholder="nom francais" required>
              <!-- here the text will apper  -->
         <div id="nomfrancaisError"></div>
                </div>
              </div>

               <div class="form-group"> <!--/here teh addclass has-error will appear -->
                <label for="name" class="col-sm-6 control-label">Prenom Francais</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="prenomfrancais" name="prenomfrancais" placeholder="prenom francais" required>
              <!-- here the text will apper  -->
         <div id="prenomfrancaisError"></div>
                </div>
              </div>
               <div class="form-group"> <!--/here teh addclass has-error will appear -->
                <label for="name" class="col-sm-5 control-label">Nom Arabe</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="nomarabe" name="nomarabe" placeholder="nom arabe" required>
              <!-- here the text will apper  -->
         <div id="nomarabeError"></div>
                </div>
              </div>

               <div class="form-group"> <!--/here teh addclass has-error will appear -->
                <label for="name" class="col-sm-2 control-label">Prenom Arabe</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="prenomarabe" name="prenomarabe" placeholder="prenom arabe" required>
              <!-- here the text will apper  -->
         <div id="prenomarabeError"></div>
                </div>
              </div>

               <div class="form-group"> <!--/here teh addclass has-error will appear -->
                <label for="name" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-12">
                  <input type="email" class="form-control" id="email" name="email" placeholder="email" required>
              <!-- here the text will apper  -->
         <div id="emailError"></div>
                </div>
              </div>

              <div class="form-group" id='passwordfield'> <!--/here teh addclass has-error will appear -->
               <label for="name" class="col-sm-2 control-label">Telephone</label>
               <div class="col-sm-12">
                 <input type="text" class="form-control" id="telephone" name="telephone" placeholder="telephone">
             <!-- here the text will apper  -->
             <div id="telephoneError"></div>
               </div>
             </div>

     </div>
     <div class="col-sm-6">
       <div class="form-group"> <!--/here teh addclass has-error will appear -->
       <label for="name" class="col-sm-2 control-label">Adresse</label>
       <div class="col-sm-12">
         <input type="text" class="form-control" id="adresse" name="adressee" placeholder="adresse" required>
     <!-- here the text will apper  -->
<div id="adresseError"></div>
       </div>
     </div>

       <div class="form-group"> <!--/here teh addclass has-error will appear -->
<label for="name" class="col-sm-2 control-label">Ville</label>
       <div class="col-sm-12">
       <input type="text" class="form-control" id="ville" name="ville" placeholder='ville' required>
       <div id="villeError"></div>
<!-- here the text will apper  -->
           </div>
       </div>

       <div class="form-group" id='fonctionnairefield'> <!--/here teh addclass has-error will appear -->
<label for="name" class="col-sm-2 control-label">Fonction</label>
       <div class="col-sm-12">
     <select class="form-control" name="fonctionnaire" id='fonctionnaire'>
       <option value="1">Fonctionnaire</option>
       <option value="0">Non</option>
     </select>
       <div id="fonctionError"></div>
<!-- here the text will apper  -->
           </div>
       </div>
<div class="form-group"> <!--/here teh addclass has-error will appear -->
<label for="name" class="col-sm-6 control-label">Lieu de Naissance</label>
       <div class="col-sm-12">
       <input type="text" class="form-control" id="lieu" name="lieu" placeholder="lieu de naissance" required>
       <div id="lieuError"></div>
<!-- here the text will apper  -->
           </div>
       </div>



       <div class="form-group" id='datefield'> <!--/here teh addclass has-error will appear -->
<label for="name" class="col-sm-6 control-label">Date de Naissance</label>
       <div class="col-sm-12">
       <input type="date" class="form-control" id="date" name="date" required>
       <div id="dateError"></div>
<!-- here the text will apper  -->
           </div>
       </div>
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

<!------- MODIFICATION MODAL ------>

<!------- CV MODAL ------>
<div class="modal fade" tabindex="-1" role="dialog" id="addcv">
 <div class="modal-dialog" role="document">
   <div class="modal-content">
     <div class="modal-header">
       <h4 class="modal-title"><i class="fas fa-camera"></i>'  Charger mon cv</h4>
     </div>

       <form  method="post" action='candidathome.php?p=infos' class="form-horizontal" id="changecv" enctype="multipart/form-data">

     <div class="modal-body">



      <div class="form-group"> <!--/here teh addclass has-error will appear -->
       <label for="name" class="col-sm-8 control-label">Veuillez charger votre cv : </label>
       <div class="col-sm-10">
         <input type="file" class="form-control" id="cv" name="cv" placeholder="cv" required>
     <!-- here the text will apper  -->
       </div>
     </div>
     <div class="form-group">
            <button type="submit" name="changecv" class='btn btn-primary pull'  id='changecv'><i class="fas fa-camera"></i>'    changer mon cv</button>
     </div>
     </div>
     </form>
   </div><!-- /.modal-content -->
 </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!------- /CV MODAL ------>


<!------- CNE MODAL ------>
<div class="modal fade" tabindex="-1" role="dialog" id="addcne">
 <div class="modal-dialog" role="document">
   <div class="modal-content">
     <div class="modal-header">
       <h4 class="modal-title"><i class="fas fa-camera"></i>'  Charger mon cin</h4>
     </div>

       <form  method="post" action='candidathome.php?p=infos' class="form-horizontal" id="changecneform" enctype="multipart/form-data">

     <div class="modal-body">



      <div class="form-group"> <!--/here teh addclass has-error will appear -->
       <label for="name" class="col-sm-8 control-label">Veuillez charger votre cin recto : </label>
       <div class="col-sm-10">
         <input type="file" class="form-control" id="cinrecto" name="cinrecto" placeholder="cinverso" required>
     <!-- here the text will apper  -->
       </div>
     </div>
     <div class="form-group"> <!--/here teh addclass has-error will appear -->
      <label for="name" class="col-sm-8 control-label">Veuillez charger votre cin verso : </label>
      <div class="col-sm-10">
        <input type="file" class="form-control" id="cinverso" name="cinverso" placeholder="cinverso" required>
    <!-- here the text will apper  -->
      </div>
    </div>
     <div class="form-group">
            <button type="submit" name="changecne" class='btn btn-primary pull'  id='changecne'><i class="fas fa-camera"></i>'    changer mon cne</button>
     </div>




     </div>

     </form>
   </div><!-- /.modal-content -->
 </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!------- /CNE MODAL ------>

<!------- PICTURE MODAL ------>

<div class="modal fade" tabindex="-1" role="dialog" id="changepicture">
 <div class="modal-dialog" role="document">
   <div class="modal-content">
     <div class="modal-header">
       <h4 class="modal-title"><i class="fas fa-camera"></i>'  Changer ma photo</h4>
     </div>

       <form  method="post" action='candidathome.php?p=infos' class="form-horizontal" id="changepicform" enctype="multipart/form-data">

     <div class="modal-body">



      <div class="form-group"> <!--/here teh addclass has-error will appear -->
       <label for="name" class="col-sm-8 control-label">Veuillez choisir une image : </label>
       <div class="col-sm-10">
         <input type="file" class="form-control" id="newpic" name="newpic" placeholder="newpic" required>
     <!-- here the text will apper  -->
       </div>
     </div>
     <div class="form-group">
            <button type="submit" name="changepic" class='btn btn-primary pull' data-toggle="modal" data-target="#changepicture" id='changepic'><i class="fas fa-camera"></i>'    changer ma photo</button>
     </div>
     </div>

     </form>
   </div><!-- /.modal-content -->
 </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!------- /PICTURE MODAL ------>



<script src="script/candidat/infos.js" type="text/javascript"></script>
<script type="text/javascript" src="vendor/jquery/jquery.min.js">
</script>
  <script src="vendor/bootstrap/js/popper.min.js" type="text/javascript"></script>
