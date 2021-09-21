$(document).ready(function () {
    var cin=$('#cin').text();
    //alert(cin);
    $.ajax({
        url: 'controller/concourpostule.php',
        mimeType: 'json',
        data: {op: 'nonpostule',cin:cin},
        type: "POST",
    success: function(data) {
        remplir(data);
    },
    error: function(error) {
        alert('Failed!');
    }
});
$.ajax({
    url: 'controller/concourpostule.php',
    mimeType: 'json',
    data: {op:'postule',cin:cin},
    type: "POST",
success: function(data) {
    remplirpostulation(data);
},
error: function(error) {
    alert('Failed!');
}
});

$(document).on('click', '.annuler', function () {
  var id =$(this).attr('id');
  alert(id);
  $.ajax({
      url: 'controller/PostulationController.php',
      mimeType: 'json',
      data: {op:'delete',cin:cin,id:id},
      type: "POST",
  });
  alert('good');
  location.reload();
});

$(document).on('click', '.postuler', function () {
  var id=$(this).attr('id');
  confirm('etes-vous surs?');
  $.ajax({
      url: 'controller/PostulationController.php',
      mimeType: 'json',
      data: {op: 'add',cin:cin,id:id,etat:"Evaluation"},
      type: "POST"
});
alert("postulation avec succes");
location.reload();
});


$(document).on('click', '.chercher', function () {
let session=$('#session').val();
$.ajax({
    url: 'controller/concourpostule.php',
    mimeType: 'json',
    data: {op: 'bysession',cin:cin,session:session},
    type: "POST",
    success: function(data) {
        remplir(data);
    },
    error: function(error) {
        alert('Failed!');
    }
});
});
$(document).on('click', '.etat', function () {
let id=$(this).attr('id');
$.ajax({
    url: 'controller/PostulationController.php',
    mimeType: 'json',
    data: {op: 'etat',cin:cin,id:id},
    type: "POST",
    success: function(data) {
         $('#result').text('Etat De Votre postulation: '+data[0].etat);
    },
    error: function(error) {
        alert('Failed!');
    }
});
});



        function remplir(data)
        {
          if(data.length>0){
        var body = "<tr>";
        data.forEach((e) => {
            body    += '<th>Session:<br><span style="font-weight: bold;">'+e.session+'</span><br>Spécialité:<br><span style="font-weight: bold;">'+e.type+'</span><br>Nombre de postes:<br><span style="font-weight: bold;">'+e.nbrPoste+' Poste</span></th>';
            body    += "<th>" + e.libelleFrancais + "</th>";
            body    += "<th>" + e.dateDebutDepot + "</th>";
            body    += "<th>" + e.dateFinDepot + "</th>";
            body    += "<th>" + e.etat+ "</th>";

            body    +=     '<td><button class="btn btn-success postuler" id='+e.id+'>Postuler</button></td>';
            body    += "</tr>";
		});
		$("#manageMemberTable").DataTable();
		$( "#body" ).html("");
            $( "#body" ).html(body);
        /*DataTables instantiation.*/
     }else{
       $( "#body" ).html('<td colspan=6><div class="alert alert-success">Liste vide</div></td>');
     }
        }

                function remplirpostulation(data)
                {
                  console.log(data);
                  if(data.length>0){
                    var body = "<tr>";
                    data.forEach((e) => {
                        body    += '<th>Session:<br><span style="font-weight: bold;">'+e.session+'</span><br>Spécialité:<br><span style="font-weight: bold;">'+e.type+'</span><br>Nombre de postes:<br><span style="font-weight: bold;">'+e.nbrPoste+' Poste</span></th>';
                        body    += "<th>" + e.libelleFrancais + "</th>";
                        body    += "<th>" + e.dateDebutDepot + "</th>";
                        body    += "<th>" + e.dateFinDepot + "</th>";
                        body    += "<th>" + e.etat+ "</th>";
                        body    +=     `<td><div class='row'><div class='col-sm-6'><button class="btn btn-success etat"  id='+e.id+' data-toggle="modal" data-target="#myModal">Etat</button></div><div class='col-sm-6'><button  class="btn btn-danger annuler" id='+e.id+'><i class="fas fa-trash-restore-alt"></i></button></div></div></td>`;

                        body    += "</tr>";
                });
                $("#manageMemberTable").DataTable();
                $( "#postulation" ).html("");
                        $( "#postulation" ).html(body);
                  }else{
                    $( "#postulation" ).html('<td colspan=6><div class="alert alert-success">Liste vide</div></td>');
                  }



                }


    });
