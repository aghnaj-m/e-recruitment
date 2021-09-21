$(document).ready(function () {

    //var etab = $('#manageMemberTable').attr("name");
    var membre = $('#manageMemberTable').attr("name");
    var commissions = [];
    $.ajax({
        url: 'controller/CMController.php',
        mimeType: 'json',
        data: {op: 'getMembersComs',membre: membre},
        type: "POST",
        async: false,
    success: function(data) {
            data.forEach(e =>{
            commissions.push(e.idCommission);
        })
    },
    error: function(error) {
        alert('Failed to bring commissions!');
    }
});


	$.ajax({
        url: 'controller/ConcourController.php',
        mimeType: 'json',
        data: {op: 'getByCommissions',etab: '',commissions: commissions},
        type: "POST",
    success: function(data) {
        remplir(data);
    },
    error: function(error) {
        alert('Failed to bring concours!');
    }
	});


    function remplir(data)
    {
    if(data.length>0){
        var body = "<tr>";
        data.forEach((e) => {
        console.log(e.id);
        body    += "<td>" + e.session + "</td>";
        body    += "<td>" + e.dateDebutDepot + "</td>";
        body    += "<td>" + e.dateFinDepot + "</td>";
        body    += "<td>" + e.etat + "</td>";
        body    += "<td>" + e.nbrPoste + "</td>";
        body    += "<td>" + e.type + "</td>";
        body    += "<td>" + e.commission + "</td>";
        body    +=     '<td>'+
               '<a href="membrehome.php?p=postulation&cnc='+e.id+'" class="btn btn-success" type="button" id="consulter" name="e.id" >'+
                  'Consulter'+
                '</a></td>';
        body    += "</tr>";
        });
        $( "#manageMemberTable tbody" ).html("");
        $( "#manageMemberTable tbody" ).html(body);
        //$( "#manageMemberTable" ).DataTable({
        //scrollX: true,
        //language: {
          //  "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/French.json"
        //}});

    }else{
        $( "#manageMemberTable tbody" ).html('<td colspan=6><div class="alert alert-success">Aucun Concours Trouée !</div></td>');
    }    

  }


});