
$(document).ready(function () {
    var cin=$('#cin').text();
    //alert(cin);
    $.ajax({
        url: 'controller/PublicationController.php',
        mimeType: 'json',
        data: {op: '',candidat:cin},
        type: "POST",
    success: function(data) {
        remplir(data);
    },
    error: function(error) {
        alert('Failed!');
    }
});


$(document).on('click', '.modifier', function () {
  $(".modal-title").text('Modifier les informations de mes thèses');
  $(".form-group").removeClass('has-error').removeClass('has-success');
  $(".text-danger").remove();
  $(".messages").html("");

     let id=$(this).closest('tr').find('th').eq(0).text();
     let url=$(this).closest('tr').find('th').eq(1).text();
     let titre=$(this).closest('tr').find('th').eq(2).text();
     let date=$(this).closest('tr').find('th').eq(3).text();
     let type=$(this).closest('tr').find('th').eq(4).text();
    //alert(id);
     $("#urlpublication2").val(url);
     $("#titrepublication2").val(titre);
     $("#typepublication2").val(type);
     $('#datepublication2').val(date);
     //$("#").val(ville);
     $("#modifyMemberForm").unbind('submit').bind('submit', function() {
 			$(".text-danger").remove();

                     var url = $("#urlpublication2").val();
                     var titre= $("#titrepublication2").val();
                     var type = $("#typepublication2").val();
                    var date=$('#datepublication2').val();
                     $.ajax({
                    url: 'controller/PublicationController.php',
                    data: {op: 'update',id:id,url:url,date: date,titre:titre,type:type,candidat:'B174138',fichier:'fichier.pdf'},
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
    var url = $("#urlpublication").val();
    var date = $("#datepublication").val();
    var titre = $("#titrepublication").val();
    var type= $('#typepublication').val();
    var fichier =cin+date+"."+$('#fichierpublication').val().split('.')[1];
    alert(url+date+titre+type+fichier);
    //alert(type+date+centre+fichier);
$.ajax({
url : "controller/PublicationController.php",
type : "POST",
data : {op: 'add',candidat: cin,id:44,type: type,date:date,titre:titre,fichier:fichier,url:url},
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
				url: 'controller/PublicationController.php',
				type: 'post',
				data: {op: 'delete' ,id : id,candidat:cin},
				dataType: 'json',
				success:function(response) {
						$(".removeMessages").html('<div class="alert alert-info alert-dismissible" role="alert">'+
							  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
							  '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+'Diplome  bien supprimé !!!'+
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
            body    += "<th>" + e.url + "</th>";
            body    += "<th>" + e.titre + "</th>";
            body    += "<th>" + e.date + "</th>";
            body    += "<th>" + e.type+ "</th>";

            body += '<td><a target="_blank" href="img/candidats/publication/'+e.fichier+'"><i class="far fa-file-pdf fa-2x"></i></a></td>';
            body    +=     '<td><div class="dropdown mb-4">'+
                   '<button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'+
                      'Option'+
                    '</button>'+
                    '<div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">'+
                     '<a type="button"  id="editBtn" class="dropdown-item modifier" data-toggle="modal" data-target="#modificationPub" name="'+e.id+'"><i class="fa fa-edit"></i> Edit</a>'+
                      '<a type="button" id="removeBtn" class="dropdown-item supprimer" name="'+e.id+'"><i class="fa fa-trash"></i> Delete</a>'+
                    '</div>'+
                  '</div></td>';
            body    += "</tr>";
		});
		//$("#manageMemberTable").DataTable();
		$( "#bodypublication" ).html("");
            $( "#bodypublication" ).html(body);
        /*DataTables instantiation.*/
}else{
  $('#bodypublication').html('<tr><td colspan=7><div class="alert alert-success">Liste vide</div></td></tr>');
}
        }

    });
