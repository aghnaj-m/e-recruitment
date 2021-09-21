$(document).ready(function () {
	var etab = $('#manageMemberTable').attr("name");
	//alert(etab);
	//alert(etablissement);
	$.ajax({
        url: 'controller/ConcourController.php',
        mimeType: 'json',
        data: {op: '',etab: etab},
        type: "POST",
    success: function(data) {
        remplir(data);
    },
    error: function(error) {
        alert('Failed');
    }
	});


    $.ajax({
        url: 'controller/EtablissementController.php',
        mimeType:'json',
        data: {op:'',etab:etab},
        type: 'POST',
        scrollX: true,
        success: function(data, textStatus, jqXHR) {
            let html = '';
            data.forEach(element => {
                html += '<option value=' + element.id + '>' + element.libelleFrancais + '</option>';
            });
            $("#etablissement").html(html);
        },
        error: function(data, jqXHR, textStatus, errorThrown) {
            console.log(data);
        }

	});

	$("#etablissement").on('change',function(){
		// Commission
		$.ajax({
     	   url: 'controller/CommissionController.php',
     	   mimeType: 'json',
     	   data: {op: '',etab: $("#etablissement").val()},
     	   type: "POST",
    		success: function(data) {
				let html = '';
				data.forEach(element => {
				html += '<option value=' + element.id + '>' + element.nom + '</option>';
				});
				$("#commission").html(html);
			},
    		error: function(error) {
        		alert('Failed!');
    		}
		});

	});


$(document).on('click', '.modifier', function (event) {
  $(".modal-title").text('Modifier un concour');
  $(".form-group").removeClass('has-error').removeClass('has-success');
  $(".text-danger").remove();
  $(".messages").html("");
     let id=event.target.name;
     let session=$(this).closest('tr').find('td').eq(0).text();
     let dateDebutDepot=$(this).closest('tr').find('td').eq(1).text();
     let dateFinDepot=$(this).closest('tr').find('td').eq(2).text();
     let etat=$(this).closest('tr').find('td').eq(3).text();
     let nbrPoste=$(this).closest('tr').find('td').eq(4).text();
     let type=$(this).closest('tr').find('td').eq(5).text();
	 let etablissement=$(this).closest('tr').find('td').eq(6).text();
	 let commission=$(this).closest('tr').find('td').eq(7).text();

	 let etablissement_id;
	 $.ajax({
        url: 'controller/EtablissementController.php',
        mimeType: 'json',
        data: {op: 'getByName',nom: etablissement},
		type: "POST",
		async: false,
    	success: function(data) {
			etablissement_id = data.id;
		},
    	error: function(error) {
        	alert('Failed to load etablissement Id!');
    	}
	});


     $("#session").val(session);
     $("#dateDebutDepot").val(dateDebutDepot);
     $("#dateFinDepot").val(dateFinDepot);
     $("#etat").val(etat);
     $("#nbrPoste").val(nbrPoste);
     $("#type").val(type);
	 $("#etablissement").val(etablissement_id);
	 //$("#commission").val(commission);
	 //commission
	 $.ajax({
		url: 'controller/CommissionController.php',
		mimeType: 'json',
		data: {op: '',etab: etab.length > 0 ? etab : etablissement_id},
		type: "POST",
		success: function(data) {
			let html = '';
			data.forEach(element => {
			html += '<option value=' + element.id + '>' + element.nom + '</option>';
			});
			$("#commission").html(html);
		},
		error: function(error) {
			alert('Failed!');
		}
	});


	 $("#createMemberForm").unbind('submit').bind('submit', function() {
 			$(".text-danger").remove();

                     var session = $("#session").val();
                     var dateDebutDepot = $("#dateDebutDepot").val();
                     var dateFinDepot = $("#dateFinDepot").val();
                     var etat = $("#etat").val();
                     var nbrPoste = $("#nbrPoste").val();
                     var type = $("#type").val();
                     var etablissement = $("#etablissement").val();
					 var commission = $("#commission").val();

                     $.ajax({
                    url: 'controller/ConcourController.php',
                    data: {op: 'update',etab:etab,id:id,session:session,dateDebutDepot: dateDebutDepot,dateFinDepot: dateFinDepot,etat:etat,nbrPoste:nbrPoste,type:type,etablissement:etablissement,commission:commission},
                    type: 'POST',
                    success: function (data, textStatus, jqXHR) {
                        remplir(data);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(textStatus);
                    }
                });
  });

});

//AJOUT D'UN NV CONCOUR
    $("#addMemberModalBtn").on('click', function() {

	$.ajax({
		url: 'controller/CommissionController.php',
		mimeType: 'json',
		data: {op: '',etab: etab},
		type: "POST",
		async: false,
		success: function(data) {
			let html = '';
			data.forEach(element => {
			html += '<option value=' + element.id + '>' + element.nom + '</option>';
			});
			$("#commission").html(html);
		},
		error: function(error) {
			alert('Failed!');
		}
	});

      $("#session").val('');
      $("#dateDebutDepot").val('');
      $("#dateFinDepot").val('');
      $("#etat").val('');
      $("#nbrPoste").val('');
      $("#type").val('');
	  $("#etablissement").val('');
	  $("#commission").val('');

		// reset the form
		//$("#createMemberForm")[0].reset();
		// remove the error
		$(".form-group").removeClass('has-error').removeClass('has-success');
		$(".text-danger").remove();
		// empty the message div
		$(".messages").html("");



		$(document).on('click', '.ajouter', function () {

			$(".text-danger").remove();

            var session = $("#session").val();
            var dateDebutDepot = $("#dateDebutDepot").val();
        	var dateFinDepot = $("#dateFinDepot").val();
	        var etat = $("#etat").val();
            var nbrPoste = $("#nbrPoste").val();
            var type = $("#type").val();
			var etablissement = $("#etablissement").val();
			var commission = $("#commission").val();


			// validation
			$("#session").blur(function(){
				var session = $("#session").val();
				if(session === "") {
					$("#session").closest('.form-group').addClass('has-error');
					$("#sessionError").html('<p class="text-danger">ce champs est obligatoire</p>');
				} else {
					$("#session").closest('.form-group').removeClass('has-error');
					$("#session").closest('.form-group').addClass('has-success');
					$("#sessionError").html('');
			}
		});

			$("#dateDebutDepot").blur(function(){
				if(dateDebutDepot === "") {
					$("#dateDebutDepot").closest('.form-group').addClass('has-error');
					$("#dateDebutDepotError").html("<p class=\"text-danger\">ce champs est obligatoire</p>");
				} else {
					$("#dateDebutDepot").closest('.form-group').removeClass('has-error');
					$("#dateDebutDepot").closest('.form-group').addClass('has-success');
					$("#dateDebutDepotError").html('');
				}
		});

			$("#dateFinDepot").blur(function(){
				if(dateFinDepot === "") {
					$("#dateFinDepot").closest('.form-group').addClass('has-error');
					$("#dateFinDepotError").html('<p class="text-danger">ce champs est obligatoire</p>');
				} else {
					$("#dateFinDepot").closest('.form-group').removeClass('has-error');
					$("#dateFinDepot").closest('.form-group').addClass('has-success');
					$("#dateFinDepotError").html('');
				}
		});

			$("#etat").blur(function(){
				if(etat === "") {
					$("#etat").closest('.form-group').addClass('has-error');
					$("#etatError").html("<p class=\"text-danger\">ce champs est obligatoire</p>");
				} else {
					$("#etat").closest('.form-group').removeClass('has-error');
					$("#etat").closest('.form-group').addClass('has-success');
					$("#etatError").html('');
				}
		});


			$("#nbrPoste").blur(function(){
				if(nbrPoste === "") {
					$("#nbrPoste").closest('.form-group').addClass('has-error');
					$("#nbrPosteError").html('<p class="text-danger">ce champs est obligatoire</p>');
				} else {
					$("#nbrPoste").closest('.form-group').removeClass('has-error');
					$("#nbrPoste").closest('.form-group').addClass('has-success');
					$("#nbrPosteError").html('');
				}
		});

                        $("#type").blur(function(){
				if(type === "") {
					$("#type").closest('.form-group').addClass('has-error');
					$("#typeError").html('<p class="text-danger">ce champs est obligatoire</p>');
				} else {
					$("#type").closest('.form-group').removeClass('has-error');
					$("#type").closest('.form-group').addClass('has-success');
					$("#typeError").html('');
				}
		});
                    $("#etablissement").blur(function(){
				if(etablissement === "") {
					$("#etablissement").closest('.form-group').addClass('has-error');
					$("#etablissementError").html('<p class="text-danger">ce champs est obligatoire</p>');
				} else {
					$("#etablissement").closest('.form-group').removeClass('has-error');
					$("#etablissement").closest('.form-group').addClass('has-success');
					$("#etablissementError").html('');
				}
		});

		        $("#commission").blur(function(){
				if(commission === "") {
					$("#commission").closest('.form-group').addClass('has-error');
					$("#commissionError").html('<p class="text-danger">ce champs est obligatoire</p>');
				} else {
					$("#commission").closest('.form-group').removeClass('has-error');
					$("#commission").closest('.form-group').addClass('has-success');
					$("#commissionError").html('');
				}
		});

             if(session && dateDebutDepot && dateFinDepot && etat && nbrPoste && type) {
		//submi the form to server
		$.ajax({
			url : "controller/ConcourController.php",
            type : "POST",
            data : {op: 'add',etab:etab,session: session,dateDebutDepot: dateDebutDepot,dateFinDepot: dateFinDepot,etat:etat,nbrPoste:nbrPoste,type:type,etablissement:etablissement,commission:commission },
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

		let id=event.target.name;

        if(id) {
			$.ajax({
				url: 'controller/ConcourController.php',
				type: 'post',
				data: {op: 'delete' ,id : id,etab:etab},
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

$(document).on('click', '.postule', function() {

        let id=$(this).closest('tr').find('td').attr('value');
        $.ajax({
            url: 'controller/ConcourController.php',
            data: {op: 'afficher', id: id},
            type: 'POST',
            success: function(data, textStatus, jqXHR) {
                window.location.reload();
                alert(id);
                href="home.php?p=postulation&postulation="+e.id;
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus);
            }
        });
    });

        function remplir(data)
        {
        var body = "<tr>";
        data.forEach((e) => {
			//console.log(e.id);
            body    += '<td value='+e.id+'>'+ e.session +'</td>';
            body    += "<td>" + e.dateDebutDepot + "</td>";
            body    += "<td>" + e.dateFinDepot + "</td>";
            body    += "<td>" + e.etat + "</td>";
            body    += "<td>" + e.nbrPoste + "</td>";
            body    += "<td>" + e.type + "</td>";
			body    += "<td>" + e.libelleFrancais + "</td>";
			body    += "<td>" + e.commission + "</td>";
            body    +=     '<td><div class="dropdown mb-4">'+
                   '<button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'+
                      'Option'+
                    '</button>'+
                    '<div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">'+
                     '<a type="button"  id="editBtn" class="dropdown-item modifier" data-toggle="modal" data-target="#addMember" name="'+e.id+'"><i class="fa fa-edit"></i> Edit</a>'+
					  '<a type="button" id="removeBtn" class="dropdown-item supprimer" name="'+e.id+'"><i class="fa fa-trash"></i> Delete</a>'+
                    '</div>'+
                  '</div></td>';
            //body    += '<td><button type="button" class="btn btn-info text-white" href="home.php?p=postulation&postulation='+e.id+'" ><i class="fas fa-id-badge"></i>Postulation</button></td>';
            body    += '<td><a type="button" class="btn btn-info text-white" href="home.php?p=postulation&concour='+e.id+'" ><i class="fas fa-id-badge"></i> Postulation </a></td>';
            body    += "</tr>";
		});
		$( "#manageMemberTable tbody" ).html("");
		$( "#manageMemberTable tbody" ).html(body);
		$("#manageMemberTable").DataTable({
			scrollX: true,
			language: {
				"url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/French.json"
		}});


        }

    });
