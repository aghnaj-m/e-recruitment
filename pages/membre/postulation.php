<style>
  table { width: 100%;}
  td  { height: 55px;}
  th { height: 45px;}
</style>
<input type="hidden" id="cnc" name="<?php if(isset($_GET['cnc'])){echo $_GET['cnc'];}?>">
<div class="container">
<h3 class=" h2 page-header">Postulations Aux Concours</h3>
<br><br>
     <table class="table-striped table-bordered table-hover" id="manageMemberTable" name=<?php echo $_SESSION['utilisateur']; ?>>
      <thead class=" text-center bg-info text-white">
        <th>NOM</th>
        <th>PRENOM</th>
        <th>DATE POSTULATION</th>
        <th>ETAT</th>
        <th>NBR POSTE</th>
        <th>PROFILE</th>
        <th>OPTIONS</th>
       </thead>
     <tbody class="text-center">
    </tbody>
    </table>
</div>

<div aria-live="polite" aria-atomic="true" style="float: top-right; min-height: 150px; ">
  <div class="toast" id="toastAccepte" style="position: absolute; top: 0; right: 0; width: 300px; border-radius: 10px;">
    <div class="toast-header bg-success text-white">
      <strong class="mr-auto">Succès</strong>
      <small>juste maintenant</small>
      <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="toast-body">
    <p>Vous venez d'accepter une candidature!</p>
    </div>
  </div>
</div>

<div aria-live="polite" aria-atomic="true" style="float: top-right; min-height: 150px; ">
  <div class="toast" id="toastRefuse" style="position: absolute; top: 0; right: 0; width: 300px; border-radius: 10px;">
    <div class="toast-header bg-danger text-white">
      <strong class="mr-auto">Succès</strong>
      <small>juste maintenant</small>
      <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="toast-body">
    <p>Vous venez de reffuser une candidature!</p>
    </div>
  </div>
</div>



<script src="script/membre/postulation.js" type="text/javascript"></script>
