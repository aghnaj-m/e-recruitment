<style>
  table { width: 100%;}
  td  { height: 55px;}
  th { height: 45px;}
  @font-face {font-family: "bebas";src: url("fonts/BebasNeue-Bold.ttf");}
</style>
<div class="container">
<h2 class="text-primary" >Vos Concours:</h2>
  <br><br>
    <p id='ETABLISSEMENTID' style='display:none'><?php echo $_SESSION['etablissement']; ?></p>
     <div class="table-responsive">
				<table class="table table-striped table-bordered table-hover" id="manageMemberTable" name=<?php echo $_SESSION['utilisateur']; ?>>

        <thead class=" text-center">
          <th>Session</th>
          <th>Date Debut Depot</th>
          <th>Date Fin Depot</th>
          <th>Etat</th>
          <th>nbr Poste</th>
          <th>Profile Cherché</th>
          <th>Commission</th>
         <th>Consulter</th>
       </thead>
      <tbody class="text-center" border="1">
      </tbody>
      </table>
</div>
</div>

<script src="script/membre/concours.js" type="text/javascript"></script>
