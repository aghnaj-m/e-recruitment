$(document).ready(function () {
    var manageMemberTable; //id de la table
    $.ajax({
        url: 'controller/UtilisateurController.php',
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

//AJOUT D'UN NV ETABLISSEMENT
    $("#addMemberModalBtn").on('click', function() {
		// reset the form
		//$("#createMemberForm")[0].reset();
		// remove the error
		$(".form-group").removeClass('has-error').removeClass('has-success');
		$(".text-danger").remove();
		// empty the message div
		$(".messages").html("");



		$("#createMemberForm").unbind('submit').bind('submit', function() {

			$(".text-danger").remove();

                    var cin = $("#cin").val();
                    var nom = $("#nom").val();
                    var prenom = $("#prenom").val();
                    var email = $("#email").val();
                    var telephone = $("#telephone").val();
                    var adresse = $("#adresse").val();
                    var password = $("#password").val();
                    var role = $("#role").val();
                    var photo = $("#photo").val();
                    var membre = $("#membre").val();
                  

			// validation
			$("#cin").blur(function(){
			var cin = $("#cin").val();
			if(cin === "") {
				$("#cin").closest('.form-group').addClass('has-error');
				$("#cinError").html('<p class="text-danger">ce champs est obligatoire</p>');
			} else {
				$("#cin").closest('.form-group').removeClass('has-error');
				$("#cin").closest('.form-group').addClass('has-success');
				$("#cinError").html('');
			}
		});
                
		$("#nom").blur(function(){
			if(nom === "") {
				$("#nom").closest('.form-group').addClass('has-error');
				$("#nomError").html("<p class=\"text-danger\">ce champs est obligatoire</p>");
			} else {
				$("#nom").closest('.form-group').removeClass('has-error');
				$("#nom").closest('.form-group').addClass('has-success');
				$("#nomError").html('');
			}
		});
                
		$("#prenom").blur(function(){
			if(prenom === "") {
				$("#prenom").closest('.form-group').addClass('has-error');
				$("#prenomError").html('<p class="text-danger">ce champs est obligatoire</p>');
			} else {
				$("#prenom").closest('.form-group').removeClass('has-error');
				$("#prenom").closest('.form-group').addClass('has-success');
				$("#prenomError").html('');
			}
		});
                
                $("#email").blur(function(){
			if(email === "") {
				$("#email").closest('.form-group').addClass('has-error');
				$("#emailError").html("<p class=\"text-danger\">ce champs est obligatoire</p>");
			} else {
				$("#email").closest('.form-group').removeClass('has-error');
				$("#email").closest('.form-group').addClass('has-success');
				$("#emailError").html('');
			}
		});
                $("#telephone").blur(function(){
			if(telephone === "") {
				$("#telephone").closest('.form-group').addClass('has-error');
				$("#telephoneError").html("<p class=\"text-danger\">ce champs est obligatoire</p>");
			} else {
				$("#telephone").closest('.form-group').removeClass('has-error');
				$("#telephone").closest('.form-group').addClass('has-success');
				$("#telephoneError").html('');
			}
		});
                $("#adresse").blur(function(){
			if(adresse === "") {
				$("#adresse").closest('.form-group').addClass('has-error');
				$("#adresseError").html("<p class=\"text-danger\">ce champs est obligatoire</p>");
			} else {
				$("#adresse").closest('.form-group').removeClass('has-error');
				$("#adresse").closest('.form-group').addClass('has-success');
				$("#adresseError").html('');
			}
		});
                $("#password").blur(function(){
			if(password === "") {
				$("#password").closest('.form-group').addClass('has-error');
				$("#passwordError").html("<p class=\"text-danger\">ce champs est obligatoire</p>");
			} else {
				$("#password").closest('.form-group').removeClass('has-error');
				$("#password").closest('.form-group').addClass('has-success');
				$("#passwordError").html('');
			}
		});
                $("#role").blur(function(){
			if(role === "") {
				$("#role").closest('.form-group').addClass('has-error');
				$("#roleError").html("<p class=\"text-danger\">ce champs est obligatoire</p>");
			} else {
				$("#role").closest('.form-group').removeClass('has-error');
				$("#role").closest('.form-group').addClass('has-success');
				$("#roleError").html('');
			}
		});


		$("#photo").blur(function(){
			if(photo == "") {
				$("#photo").closest('.form-group').addClass('has-error');
				$("#photoError").html('<p class="text-danger">ce champs est obligatoire</p>');
			} else {
				$("#photo").closest('.form-group').removeClass('has-error');
				$("#photo").closest('.form-group').addClass('has-success');
				$("#photoError").html('');
			}
		});
                $("#membre").blur(function(){
			if(membre == "") {
				$("#membre").closest('.form-group').addClass('has-error');
				$("#membreError").html('<p class="text-danger">ce champs est obligatoire</p>');
			} else {
				$("#membre").closest('.form-group').removeClass('has-error');
				$("#membre").closest('.form-group').addClass('has-success');
				$("#membreError").html('');
			}
		});
              

             if(cin && nom && prenom && email && telephone && adresse && role && photo && membre) {
		//submi the form to server
		$.ajax({
		url : "controller/UtilisateurController.php",
                type : "POST",
                data : {op: 'add',cin: cin,nom: nom,prenom: prenom,email:email,telephone:telephone,adresse:adresse,role:role,photo:photo,membre:membre},
		dataType : 'json',
		success:function(response) {
                    alert("good");
                // remove the error
		$(".form-group").removeClass('has-error').removeClass('has-success');

                if(response.success === true) {
                $(".messages").html('<div class="alert alert-info alert-dismissible" role="alert">'+
		 '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
		 '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
		'</div>');

		// reset the form
		//$("#createMemberForm")[0].reset();

		// reload the datatables
		//manageMemberTable.ajax.reload(null, false);
                remplir(response);
		// this function is built in function of datatables;

		} else {
                	$(".messages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
                      '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                      '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
			'</div>');
						}  // /else
                                                remplir(response);
					} // success
				}); // ajax subit
			} /// if

	}); 
      
        
         });
        
        
        function removeMem(cin = null) {
	if(cin) {
		// click on remove button
		$("#removeBtn").unbind('click').bind('click', function() {
			$.ajax({
				url: 'controller/UtilisateurController.php',
				type: 'post',
				data: {op:'delete' ,cin : cin},
				dataType: 'json',
				success:function(response) {
					if(response.success == true) {
						$(".removeMessages").html('<div class="alert alert-info alert-dismissible" role="alert">'+
							  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
							  '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
							'</div>');

						// refresh the table
						manageMemberTable.ajax.reload(null, false);

						// close the modal
						$("#removeMemberModal").modal('hide');

					} else {
						$(".removeMessages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
							  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
							  '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
							'</div>');
					}
				}
			});
		}); // click remove btn
	} else {
		alert('Error: Refresh the page again');
	}
}

        
        
        function remplir(data)
        {
        var body = "<tr>";
        data.forEach((e) => {
            body    += "<td>" + e.cin + "</td>";
            body    += "<td>"+e.nom+"</td>";
            body    += "<td>" + e.prenom + "</td>";
            body    += "<td>" + e.email  + "</td>";
            body    += "<td>" + e.telephone   + "</td>";
            body    += "<td>" + e.adresse   + "</td>";
            body    += "<td>" + e.role   + "</td>";
            body    += '<td><img src="img/'+ e.photo + '" class="rounded img-responsive"/ width="60" height="50"></td>';
            body    += "<td>" + e.membre  + "</td>";   
            body    +=     '<td><div class="dropdown mb-4">'+
                   '<button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'+
                      'Option'+
                    '</button>'+
                    '<div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">'+
                      '<a type="button" id="removeBtn" class="dropdown-item" onclick="update('+e.cin+')"><i class="fa fa-edit"></i> Edit</a>'+
                      '<a type="button" class="dropdown-item" onclick="removeEtab('+e.cin+');"><i class="fa fa-trash"></i> Delete</a>'+
                    '</div>'+
                  '</div></td>';
            body    += "</tr>";
        });
            $( "#manageMemberTable tbody" ).append(body);
        /*DataTables instantiation.*/
        $("#manageMemberTable").DataTable();

        }
        
    });
