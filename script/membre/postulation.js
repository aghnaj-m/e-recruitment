
$(document).ready(function () {
    var membre = $('#manageMemberTable').attr("name");
    var cnc = $('#cnc').attr("name");

    $.ajax({
        url: 'controller/PostulationController.php',
        mimeType: 'json',
        data: {op: 'findForMembre',concours: cnc},
        type: "POST",
    success: function(data) {
        remplir(data);
    },
    error: function(error) {
        alert('Failed');
    }
});


$('#toastAccepte').toast({
    delay: 4000,
});
$('#toastRefuse').toast({
    delay: 4000,
});



function remplir(data)
{
    if(data.length>0){
        $( "#manageMemberTable tbody" ).html("");
        data.forEach((e) => {
        let body = "<tr>";
        body    += "<td>" + e.nomFrancais + "</td>";
        body    += "<td>" + e.prenomFrancais + "</td>";
        body    += "<td>" + e.dateDePostulation + "</td>";
        if(e.etat === "Evaluation"){
            body    += "<td><span class=\"label bg-warning text-white\">" + e.etat + "</span></td>";
        }
        else if(e.etat === "Accepted")
            body    += "<td><span class='label bg-success text-white'>" + e.etat + "</span></td>";
        else
            body    += "<td><span class='label bg-danger text-white'>" + e.etat + "</span></td>";
            body    += "<td>" + e.nbrPoste + "</td>";
            body    += "<td>" + e.type + "</td>";
            body    += '<td><a type="button" class="btn btn-info text-white" href="membrehome.php?p=profile&profile='+e.cin+'" ><i class="fas fa-id-badge"></i> Profile</a>';
            if(e.etat === "Evaluation"){
            body    +=      '<button type="button" id="'+e.cin+'Accepter" class="btn btn-success text-white" > Accepter</button>';
            body    +=      '<button type="button" id="'+e.cin+'Rejeter" class="btn btn-danger text-white" >  Rejeter</button>';
            }
            body    += "</td></tr>";
            $( "#manageMemberTable tbody" ).append(body);
            if(document.getElementById(e.cin+'Accepter'))
            document.getElementById(e.cin+'Accepter').addEventListener('click',function(){
                accepter(e.cin,e.nomFrancais,e.prenomFrancais);
            });
            if(document.getElementById(e.cin+'Rejeter'))
            document.getElementById(e.cin+'Rejeter').addEventListener('click',function(){
                rejeter(e.cin,e.nomFrancais,e.prenomFrancais);
            });

		});
    $( "#manageMemberTable" ).DataTable({
        //scrollX: true,
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/French.json"
        }});

    }else{
        $( "#manageMemberTable tbody" ).html('<td colspan=6><div class="alert alert-success">Aucun postulation trouée !</div></td>');
    }

}


function accepter(cin,nom,prenom)
{
if(confirm('Etes vous sure de vouloir accepter Mr.'+nom+' '+prenom)){
    $.ajax({
        url: 'controller/PostulationController.php',
        mimeType: 'json',
        data: {op: 'findForMembre',concours: cnc},
        type: "POST",
        async: false,
        success: function(data) {
            const placeLimit = data[0].nbrPoste;
            let currAccepted = 0;
            data.forEach((e) => {
                if(e.etat == 'Accepted')
                    currAccepted++;
            });
            if(currAccepted >= placeLimit)
            {
                alert('VOUS AVEZ DÉJA DES CANDIDATS SÉLÉCTIONNÉS POUR CE CONCOURS !');
            }else{
                $.ajax({
                    url: 'controller/PostulationController.php',
                    mimeType: 'json',
                    data: {op: 'acceptePostulation',cin: cin,concours:cnc},
                    type: "POST",
                    success: function(data) {
                        //alert("CANDIDAT ACCEPTÉ !!!!");
                        $('#toastAccepte').toast('show');
                        remplir(data);
                    },
                    error: function(error) {
                        alert('Failed');
                    }
                });

            }
        },
        error: function(error) {
            alert('Failed');
        }
    });
}else{
    alert('Canceled!');
}

}

function rejeter(cin,nom,prenom)
{
    if(confirm('Etes vous sure de vouloir reffuser Mr.'+nom+' '+prenom))
    $.ajax({
        url: 'controller/PostulationController.php',
        mimeType: 'json',
        data: {op: 'refuserPostulation',cin: cin,concours:cnc},
        type: "POST",
        success: function(data) {
            $('#toastRefuse').toast('show');
            remplir(data);
        },
        error: function(error) {
            alert('Failed');
        }
    });
}



    });
