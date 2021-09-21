
$(document).ready(function () {
    $.ajax({
        /*
        scrollX: true,
	language: {
	"url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/French.json"
	},
        */
        url: 'controller/EtablissementController.php',
        mimeType: 'json',
        data: {op: ''},
        type: "POST",
    success: function(data) {
        remplir(data);
    },
    error: function(error) {
        alert('Failed!');
    }
});


$(document).on('click', '.modifier', function () {
  $(".modal-title").text('Modifier une établissement');
  $(".form-group").removeClass('has-error').removeClass('has-success');
  $(".text-danger").remove();
  $(".messages").html("");
     let id=$(this).attr('name');
     let libelleAr=$(this).closest('tr').find('td').eq(1).text();
     let libellefr=$(this).closest('tr').find('td').eq(2).text();
     let abbreviation=$(this).closest('tr').find('td').eq(3).text();
     let ville=$(this).closest('tr').find('td').eq(4).text();
     let photo=$(this).closest('tr').find('td').eq(0).find('img').eq(0).attr('src');
	 alert("id :"+ id);
	 alert(photo);
     $("#libelleFrancais").val(libellefr);
     $("#libelleArabe").val(libelleAr);
     $("#abreviation").val(abbreviation);
     $("#ville").val(ville);
     $("#createMemberForm").unbind('submit').bind('submit', function() {
 			$(".text-danger").remove();

                     var libelleFrancais = $("#libelleFrancais").val();
                     var libelleArabe = $("#libelleArabe").val();
                     var abreviation = $("#abreviation").val();
                     var ville = $("#ville").val();
                     var photo = $("#photo").val();

                     $.ajax({
                    url: 'controller/EtablissementController.php',
                    data: {op: 'update',id:id,libelleArabe: libelleArabe,libelleFrancais: libelleFrancais,abreviation: abreviation,ville:ville,photo:photo },
                    type: 'POST',
                    success: function (data, textStatus, jqXHR) {
						alert("Succues")
                        remplir(data);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(textStatus);
                    }
                });
  });

});



//AJOUT D'UN NV ETABLISSEMENT
    $("#addMemberModalBtn").on('click', function() {
      $("#libelleFrancais").val('');
      $("#libelleArabe").val('');
      $("#abreviation").val('');
      $("#ville").val('');
		// reset the form
		//$("#createMemberForm")[0].reset();
		// remove the error
		$(".form-group").removeClass('has-error').removeClass('has-success');
		$(".text-danger").remove();
		// empty the message div
		$(".messages").html("");



		$(document).on('click', '.ajouter', function () {

			$(".text-danger").remove();

                    var libelleFrancais = $("#libelleFrancais").val();
                    var libelleArabe = $("#libelleArabe").val();
                    var abreviation = $("#abreviation").val();
                    var ville = $("#ville").val();
                    var photo = $("#photo").val();


			// validation
			$("#libelleFrancais").blur(function(){
				var libelleFrancais = $("#libelleFrancais").val();
				if(libelleFrancais === "") {
					$("#libelleFrancais").closest('.form-group').addClass('has-error');
					$("#libelleFrancaisError").html('<p class="text-danger">libelle d\'etablissement est obligatoire</p>');
				} else {
					$("#libelleFrancais").closest('.form-group').removeClass('has-error');
					$("#libelleFrancais").closest('.form-group').addClass('has-success');
					$("#libelleFrancaisError").html('');
			}
		});

			$("#libelleArabe").blur(function(){
				if(libelleArabe === "") {
					$("#libelleArabe").closest('.form-group').addClass('has-error');
					$("#libelleArabeError").html("<p class=\"text-danger\">The 'num d'homologation' field is required</p>");
				} else {
					$("#libelleArabe").closest('.form-group').removeClass('has-error');
					$("#libelleArabe").closest('.form-group').addClass('has-success');
					$("#libelleArabeError").html('');
				}
		});

			$("#abreviation").blur(function(){
				if(abreviation === "") {
					$("#abreviation").closest('.form-group').addClass('has-error');
					$("#abreviationError").html('<p class="text-danger">The teneur field is required</p>');
				} else {
					$("#abreviation").closest('.form-group').removeClass('has-error');
					$("#abreviation").closest('.form-group').addClass('has-success');
					$("#abreviation").html('');
				}
		});

			$("#ville").blur(function(){
				if(ville === "") {
					$("#ville").closest('.form-group').addClass('has-error');
					$("#ville").html("<p class=\"text-danger\">The 'tableau_toxicologique' field is required</p>");
				} else {
					$("#ville").closest('.form-group').removeClass('has-error');
					$("#ville").closest('.form-group').addClass('has-success');
					$("#villeError").html('');
				}
		});


			$("#photo").blur(function(){
				if(photo == "") {
					$("#photo").closest('.form-group').addClass('has-error');
					$("#photoError").html('<p class="text-danger">The Photo field is required</p>');
				} else {
					$("#photo").closest('.form-group').removeClass('has-error');
					$("#photo").closest('.form-group').addClass('has-success');
					$("#photoError").html('');
				}
		});

             if(libelleArabe && libelleFrancais && abreviation && ville && photo) {
		//submi the form to server
		$.ajax({
			url : "controller/EtablissementController.php",
            type : "POST",
            data : {op: 'add',libelleArabe: libelleArabe,libelleFrancais: libelleFrancais,abreviation: abreviation,ville:ville,photo:photo },
			dataType : 'json',
			success:function(response) {
                // remove the error
				$(".form-group").removeClass('has-error').removeClass('has-success');

                $(".messages").html('<div class="alert alert-info alert-dismissible" role="alert">'+
		 		'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
		 		'<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
				'</div>');
				// reset the form
				remplir(response);	},
			error: function(response){
				alert(response.messages);
                $(".messages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
                      '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                      '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
					'</div>');
				}

				}); // ajax subit
			} /// if

	});


         });


    $(document).on('click', '.supprimer', function () {
	 var id = $(this).attr('name');
        if(id) {
			$.ajax({
				url: 'controller/EtablissementController.php',
				type: 'post',
				data: {op: 'delete' ,id : id},
				dataType: 'json',
				success:function(response) {
						$(".removeMessages").html('<div class="alert alert-info alert-dismissible" role="alert">'+
							  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
							  '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+'Etablissement bien supprimé !!!'+
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
	} else {
		alert('Error: Refresh the page again');
	}
    });




        function remplir(data)
        {
        var body = "<tr>";
        data.forEach((e) => {
            body    += '<td><img src="img/'+e.logo+'" class="rounded img-responsive" width="60" height="50"></td>';
            body    += "<td>" + e.libelleArab + "</td>";
            body    += "<td>" + e.libelleFrancais + "</td>";
            body    += "<td>" + e.abrOrg + "</td>";
            body    += "<td>" + e.ville + "</td>";
            body    +=     '<td><div class="dropdown mb-4">'+
                   '<button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'+
                      'Option'+
                    '</button>'+
                    '<div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">'+
                     '<a type="button"  id="editBtn" class="dropdown-item modifier" data-toggle="modal" data-target="#addMember" name="'+e.id+'"><i class="fa fa-edit"></i> Edit</a>'+
                      '<a type="button" id="removeBtn" class="dropdown-item supprimer" name="'+e.id+'"><i class="fa fa-trash"></i> Delete</a>'+
                    '</div>'+
                  '</div></td>';
            body    += "</tr>";
		});
		$( "#manageMemberTable tbody" ).html("");
		$( "#manageMemberTable tbody" ).html(body);
		$("#manageMemberTable").DataTable({
				//scrollX: true,
				language: {
					"url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/French.json"
			}});

        /*DataTables instantiation.*/

        }

    });
