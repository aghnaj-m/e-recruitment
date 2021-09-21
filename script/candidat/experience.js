
$(document).ready(function () {
    var cin=$('#cin').text();
    //alert(cin);
    $.ajax({
        url: 'controller/ExperienceController.php',
        mimeType: 'json',
        data: {op: '',cin:cin},
        type: "POST",
    success: function(data) {
        remplir(data);
    },
    error: function(error) {
        alert('Failed!');
    }
});


$(document).on('click', '.modifier', function () {
  $(".modal-title").text('Modifier Mes Experiences Pédagogiques');
  $(".form-group").removeClass('has-error').removeClass('has-success');
  $(".text-danger").remove();
  $(".messages").html("");

     let id=$(this).closest('tr').find('th').eq(0).text();
     let type=$(this).closest('tr').find('th').eq(1).text();
     let titre=$(this).closest('tr').find('th').eq(2).text();
     let etablissement=$(this).closest('tr').find('th').eq(3).text();

    alert(id);
     $("#type2").val(type);
     $("#titre2").val(titre);
     $("#etablissement2").val(etablissement);

     //$("#").val(ville);
     $("#modifyMemberForm").unbind('submit').bind('submit', function() {
 			$(".text-danger").remove();

                     var type = $("#type2").val();
                     var etablissement= $("#etablissement2").val();
                     var titre = $("#titre2").val();
                     //alert(type+etablissement+titre);


                     $.ajax({
                    url: 'controller/ExperienceController.php',
                    data: {op: 'update',id:id,etablissement: etablissement,type: type,titre:titre,cin:cin,attestation:'fichier.pdf'},
                    type: 'POST',
                    success: function (data, textStatus, jqXHR) {
                        //alert(id+etablissement+type+date+ville+specialite);
                        remplir(data);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(textStatus);
                    }
                });
  });

});



//AJOUT D'UN NV ETABLISSEMENT
/*$('#addMemberModalBtn').click(function(event) {
  $("#type").val('');
  $("#etablissement").val('');
  $("#date").val('');
  $("#ville").val('');
  $("#specialite").val('');
});*/


	$('#createMemberForm').submit(function(event) {
    //alert('submited');
    var type = $("#type").val();
    var titre = $("#titre").val();
    var etablissement = $("#etablissement").val();
    var attestation =cin+titre+"."+$('#fichier').val().split('.')[1];
    //alert(type+titre+etablissement+attestation);
$.ajax({
url : "controller/ExperienceController.php",
type : "POST",
data : {op: 'add',cin: cin,id:44,titre: titre,etablissement:etablissement,type:type,attestation:attestation},
dataType : 'json',
success:function(response) {
  $(".removeMessages").html('<div class="alert alert-info alert-dismissible" role="alert">'+
      '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
      '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+'Diplome bien ajouté!!!'+
    '</div>');
  remplir(response);
	},
error: function(response){
alert(response.messages);
$(".removeMessages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
    '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
    '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+'Something went wrong!'+
  '</div>');
}
}); // ajax subit


});






    $(document).on('click', '.supprimer', function () {
	       var id = $(this).closest('tr').find('th').eq(0).text();
         alert(id);
			$.ajax({
				url: 'controller/ExperienceController.php',
				type: 'post',
				data: {op: 'delete' ,id : id,cin:cin},
				dataType: 'json',
				success:function(response) {
						$(".removeMessages").html('<div class="alert alert-info alert-dismissible" role="alert">'+
							  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
							  '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+'Experience  bien supprimée !!!'+
							'</div>');
						// refresh the table
						remplir(response);
						// close the modal
						$("#removeMemberModal").modal('hide');
				},
				error: function(response){
					alert("Error");
					$(".removeMessages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
						  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
						  '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+'Something went wrong!'+
						'</div>');

				}
			});

    });




        function remplir(data)
        {
          if(data.length>0){
        var body = "<tr>";
        data.forEach((e) => {
            body    += '<th style="display:none;">'+e.id+'</th>';
            body    += "<th>" + e.type + "</th>";
            body    += "<th>" + e.titre + "</th>";
            body    += "<th>" + e.etablissement+ "</th>";

            body += '<td><a target="_blank" href="img/candidats/experience/'+e.attestation+'"><i class="far fa-file-pdf fa-2x"></i></a></td>';
            body    +=     '<td><div class="dropdown mb-4">'+
                   '<button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'+
                      'Option'+
                    '</button>'+
                    '<div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">'+
                     '<a type="button"  id="editBtn" class="dropdown-item modifier" data-toggle="modal" data-target="#modificationMember" name="'+e.id+'"><i class="fa fa-edit"></i> Edit</a>'+
                      '<a type="button" id="removeBtn" class="dropdown-item supprimer" name="'+e.id+'"><i class="fa fa-trash"></i> Delete</a>'+
                    '</div>'+
                  '</div></td>';
            body    += "</tr>";
		});
		//$("#manageMemberTable").DataTable();
		$( "#manageMemberTable tbody" ).html("");
            $( "#manageMemberTable tbody" ).html(body);
        /*DataTables instantiation.*/
   }else{
     $('#manageMemberTable tbody').html('<tr><td colspan=8><div class="alert alert-success">Liste vide</div></td></tr>');
   }
        }

    });
