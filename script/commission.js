
$(document).ready(function () {
	var etab = $('#manageMemberTable').attr("name");
	$('.Mycard').hide();
    $.ajax({
        url: 'controller/CommissionController.php',
        mimeType: 'json',
        data: {op: '',etab: etab},
        type: "POST",
    success: function(data) {
        remplir(data);
    },
    error: function(error) {
        alert('Failed!');
    }
});

$.ajax({
	url: 'controller/EtablissementController.php',
	mimeType: 'json',
	data: {op: ''},
	type: "POST",
	scrollX: true,
  success: function(data) {
	var html = '';
	data.forEach(element => {
	  html+='<option value='+element.id+'>'+element.libelleFrancais+'</option>';
	});
  $("#etablissement").html(html);
  },
  error: function(error) {
	alert('Failed!');
  }
  });



$(document).on('click', '.modifier', function (event) {
  $(".modal-title").text('Modifier une commission');
  $(".form-group").removeClass('has-error').removeClass('has-success');
  $(".text-danger").remove();
  $(".messages").html("");
	 const id = $(this).attr('name');
     let nom=$(this).closest('tr').find('td').eq(0).text();
	 let description=$(this).closest('tr').find('td').eq(1).text();
	 let etablissement=$(this).closest('tr').find('td').eq(2).text();

     $("#nom").val(nom);
	 $("#description").val(description);
	 $("#etablissement").val(etablissement);
     $("#createMemberForm").unbind('submit').bind('submit', function() {
 			$(".text-danger").remove();

                     var nom = $("#nom").val();
                     var description = $("#description").val();
					 var etablissement = $("#etablissement").val();

                     $.ajax({
                    url: 'controller/CommissionController.php',
                    data: {op: 'update',id:Number(id),nom: nom,description: description,etab: etab == "" ? etablissement : etab},
                    type: 'POST',
                    success: function (data, textStatus, jqXHR) {
                        remplir(data);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log("error on update");
                    }
                });
  });

});



//AJOUT D'UN NV ETABLISSEMENT
    $("#addMemberModalBtn").on('click', function() {
      $("#nom").val('');
	  $("#description").val('');
	  $("#etablissement").val('');

		// reset the form
		//$("#createMemberForm")[0].reset();
		// remove the error
		$(".form-group").removeClass('has-error').removeClass('has-success');
		$(".text-danger").remove();
		// empty the message div
		$(".messages").html("");



		$(document).on('click', '.ajouter', function () {

			$(".text-danger").remove();

                    var nom = $("#nom").val();
                    var description = $("#description").val();
					var etablissement=$("#etablissement").val();
			// validation
			$("#nom").blur(function(){
				var nom = $("#nom").val();
				if(nom === "") {
					$("#nom").closest('.form-group').addClass('has-error');
					$("#nomError").html('<p class="text-danger"> le nom est obligatoire</p>');
				} else {
					$("#nom").closest('.form-group').removeClass('has-error');
					$("#nom").closest('.form-group').addClass('has-success');
					$("#nomError").html('');
			}
		});

		$("#etablissement").blur(function(){
			if(etablissement == "") {
				$("#etablissement").closest('.form-group').addClass('has-error');
				$("#etablissementError").html('<p class="text-danger">ce champs est obligatoire</p>');
			} else {
				$("#etablissement").closest('.form-group').removeClass('has-error');
				$("#etablissement").closest('.form-group').addClass('has-success');
				$("#etablissementError").html('');
			}
		});

			/*$("#description").blur(function(){
				if(description === "") {
					$("#description").closest('.form-group').addClass('has-error');
					$("#descriptionError").html("<p class=\"text-danger\">The 'description' field is required</p>");
				} else {
					$("#description").closest('.form-group').removeClass('has-error');
					$("#description").closest('.form-group').addClass('has-success');
					$("#descriptionError").html('');
				}
		});*/


        if(nom) {
		//submi the form to server
		$.ajax({
			url : "controller/CommissionController.php",
            type : "POST",
            data : {op: 'add',nom: nom,description: description,etab: etab == "" ? etablissement : etab},
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
				url: 'controller/CommissionController.php',
				type: 'post',
				data: {op: 'delete' ,id : id,etab: etab},
				dataType: 'json',
				success:function(response) {
						$(".removeMessages").html('<div class="alert alert-info alert-dismissible" role="alert">'+
							  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
							  '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+'Commission bien supprimé !!!'+
							'</div>');
						// refresh the table
						window.location.reload();

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

	 AddRemoveVerification = 0;
	 var commission;
	$('#manageMemberTable').on('click', 'tbody tr', function() {
		AddRemoveVerification  = 0;
		$('#manageMemberTable tbody tr').css('background', '').css('color','black');
		$(this).css('background', 'rgb(173,199,223)').css('color','white');
		$('.Mycard').show();
		var table = $('#manageMemberTable').DataTable();
		var data = table.row(this).data().map(function(item, index) {
		   var r = {}; r['col'+index]=item; return r;
		});
		$('#listTitle').html('Membres de la '+data[0].col0);
		commission = data[5].col5;
		selectedEtab = data[2].col2;
		// refresh select options :
		//alert(selectedEtab);
		$.ajax({
			url: 'controller/MembreController.php',
			mimeType: 'json',
			data: {op: '',etab: selectedEtab},
			type: "POST",
		  success: function(data) {
			  $(".selectpicker").val('default');
			  $('.selectpicker').html('');
			var html = '';
			data.forEach(element => {
			  html+='<option value='+element.cin+'>'+element.nom.toUpperCase()+' '+element.prenom.toUpperCase()+'</option>';
			});
		  $(".selectpicker").append(html);
		  $('.selectpicker').selectpicker('refresh');
		  },
		  error: function(error) {
			alert('Failed!');
		  }
		  });
		//now use AJAX with data, which is on the form [ { col1 : value, col2: value ..}]
		$.ajax({
			url: 'controller/CMController.php',
			mimeType: 'json',
			data: {op: 'show',commission: commission },
			type: "POST",
			scrollX: true,
		  success: function(data) {
				ListMembres(data);
			},
		  error: function(error) {
			alert('Failed to bring list');
		  }
		  });



	});

	var previous_value;
	$(".selectpicker").on('shown.bs.select', function(e) {
        previous_value = $(this).val();
	}).change(function(event) {
	let op = '';
	let valeurs = $(this).val();
	let item = '';
	if(valeurs.length > AddRemoveVerification){
		AddRemoveVerification = valeurs.length;
		let newValue;
		valeurs.forEach(element => {
			if(jQuery.inArray(element,previous_value) == -1)
				newValue = element;
		});

		op = 'add';
		item = newValue;
	}
	else{
		AddRemoveVerification = valeurs.length;
		let oldValue;
		previous_value.forEach(element => {
			if(jQuery.inArray(element,valeurs) == -1)
				oldValue = element;
		});
		op = 'remove';
		item = oldValue;
	}
	$.ajax({
		url: 'controller/CMController.php',
		mimeType: 'json',
		data: {op: op,cin: item,commission: commission},
		type: "POST",
	  success: function(data) {
			ListMembres(data);
		},
	  error: function(error) {
		alert('Failed to bring members');
	  }
	  });
	  previous_value = $(this).val();

	});


        function remplir(data)
        {
        if(data.length>0){
            var body = "<tr>";
            data.forEach((e) => {
            body    += "<td>" + e.nom + "</td>";
			body    += "<td>" + e.description + "</td>";
			body    += "<td>" + e.libelleFrancais + "</td>";
			body    += "<td>" + e.dateCreation + "</td>";

            body    += '<td><div class="dropdown mb-4">'+
                   '<button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'+
                      'Option'+
                    '</button>'+
                    '<div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">'+
                     '<a type="button"  id="editBtn" class="dropdown-item modifier" data-toggle="modal" data-target="#addMember" name="'+e.id+'"><i class="fa fa-edit"></i> Edit</a>'+
                      '<a type="button" id="removeBtn" class="dropdown-item supprimer" name="'+e.id+'"><i class="fa fa-trash"></i> Delete</a>'+
                    '</div>'+
				  '</div></td>';
			body    += "<td style='display: none;'>" + e.id + "</td>";
            body    += "</tr>";
		});
		$( "#manageMemberTable tbody" ).html("");
			$( "#manageMemberTable tbody" ).html(body);
			$("#manageMemberTable").DataTable({
				scrollX: true,
				language: {
					"url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/French.json"
			}});
        }else{
            $( "#manageMemberTable tbody" ).html('<td colspan=6><div class="alert alert-success">Liste vide</div></td>');
          }

		}


		function ListMembres(data)
        {
			$("#members > option").each(function() {
				if(this.selected){
					this.selected = false;
				}
			});

			var inList = [];
        	if(data.length>0){
			AddRemoveVerification = data.length;
			var body = '';
			data.forEach((e) => {
			inList.push((e.cin).toString());
			body+= '<a style="cursor: pointer"'+
			'class="list-group-item clearfix">';
			body+='<div class="pull-left">'+
			'<h4 class="list-group-item-heading">'+e.nom.toUpperCase()+' '+e.prenom.toUpperCase()+'</h4>'+
			'<p class="list-group-item-text">'+e.grade+' à '+e.libelleFrancais+'</p>'+
			'</div>';
			body += '<span class="pull-right">'+
			'<img src="img/membre/'+e.photo+'" alt="" class="img-responsive" style="max-height: 50px;">'+
			'</span>'+
			'</a>';
			});
			$( "#membersList").html(body);
        	}else{
            $( "#membersList" ).html('<div class="alert alert-warning alert-dismissible " role="alert">'+
			'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>'+
			'</button>'+
			'Commission Sans Membes !</div>');
		  }
		  $("#members > option").each(function() {
			if(jQuery.inArray(this.value,inList) != -1){
				this.selected = true;
			}else{
			//alert(this.value+" not found");
				}
			});
		}



    });
