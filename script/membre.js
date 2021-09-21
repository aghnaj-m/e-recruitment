$(document).ready(function () {
    var manageMemberTable = $("#manageMemberTable") ; //id de la table
    var etab = manageMemberTable.attr("name");
      $.ajax({
        url: 'controller/MembreController.php',
        mimeType: 'json',
        data: {op: '',etab: etab},
        type: "POST",
        scrollX: true,
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


//AJOUT D'UN NV ETABLISSEMENT
    $("#addMemberModalBtn").on('click', function() {
		// reset the form
		// remove the error
		$(".form-group").removeClass('has-error').removeClass('has-success');
		$(".text-danger").remove();
    $('#passwordfield').css('display','initial');
    $('#cinfield').css('display','initial');
		// empty the message div
		$(".messages").html("");
    $("#cin").val('');
    $("#nomfrancais").val('');
    $("#prenomfrancais").val('');
    $("#telephone").val('');
    $("#adresse").val('');
    $("#fonction").val('');
    //$("#photo").val(abbreviation);
    $("#grade").val('');
    $("#etablissement").val('');
    $("#password").val('');



        $(document).on('click', '#submitbtn', function () {

			$(".text-danger").remove();

                    var cin = $("#cin").val();
                    var nomfrancais = $("#nomfrancais").val();
                    var prenomfrancais = $("#prenomfrancais").val();
                    var email = $("#email").val();
                    var telephone = $("#telephone").val();
                    var adresse = $("#adresse").val();
                    var fonction = $("#fonction").val();
                    var photo = $("#photo").val();
                    var grade = $("#grade").val();
                    var etablissement = $("#etablissement").val();
                    var password = $("#password").val();



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

		$("#nomfrancais").blur(function(){
			if(nomfrancais === "") {
				$("#nomfrancais").closest('.form-group').addClass('has-error');
				$("#nomfrancaisError").html("<p class=\"text-danger\">ce champs est obligatoire</p>");
			} else {
				$("#nomfrancais").closest('.form-group').removeClass('has-error');
				$("#nomfrancais").closest('.form-group').addClass('has-success');
				$("#nomfrancaisError").html('');
			}
		});

		$("#prenomfrancais").blur(function(){
			if(prenomfrancais === "") {
				$("#prenomfrancais").closest('.form-group').addClass('has-error');
				$("#prenomfrancaisError").html('<p class="text-danger">ce champs est obligatoire</p>');
			} else {
				$("#prenomfrancais").closest('.form-group').removeClass('has-error');
				$("#prenomfrancais").closest('.form-group').addClass('has-success');
				$("#prenomfrancaisError").html('');
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
        $("#fonction").blur(function(){
			if(fonction === "") {
				$("#fonction").closest('.form-group').addClass('has-error');
				$("#fonctionError").html("<p class=\"text-danger\">ce champs est obligatoire</p>");
			} else {
				$("#fonction").closest('.form-group').removeClass('has-error');
				$("#fonction").closest('.form-group').addClass('has-success');
				$("#fonctionError").html('');
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


                $("#grade").blur(function(){
			if(grade == "") {
				$("#grade").closest('.form-group').addClass('has-error');
				$("#gradeError").html('<p class="text-danger">ce champs est obligatoire</p>');
			} else {
				$("#grade").closest('.form-group').removeClass('has-error');
				$("#grade").closest('.form-group').addClass('has-success');
				$("#gradeError").html('');
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

    if(cin && nomfrancais && prenomfrancais && telephone && adresse && fonction && photo && grade && email && password) {
    //alert(cin+"\n"+nomfrancais+"\n"+prenomfrancais+"\n"+telephone+"\n"+adresse+"\n"+fonction+"\n"+photo+"\n"+grade+"\n"+etablissement+"\n"+email+"\n"+password);
    //submi the form to server
		$.ajax({
		url : "controller/MembreController.php",
    type : "POST",
    data : {op: 'add',etab: etab,cin: cin,nomfr: nomfrancais,prenomfr: prenomfrancais,email:email,telephone:telephone,adresse: adresse,fonction:fonction,photo:photo,grade:grade,etablissement:etablissement,password:password},
		dataType : 'json',
		success:function(response) {
        // remove the error
		    $(".form-group").removeClass('has-error').removeClass('has-success');

        $(".removeMessages").html('<div class="alert alert-info alert-dismissible" role="alert">'+
        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
        '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+'Ajout bien effectuer!!!'+
      '</div>');
      // refresh the table
      remplir(response)
      // close the modal
     $("#addMemberModal").modal('hide');
},
    error: function(response){
          $(".removeMessages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
          '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
          '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
			    '</div>');
					}
				}); // ajax subit
			} /// if

	});
         });



         $(document).on('click', '.modifier', function () {
           $(".modal-title").text('Modifier un member');
           $(".form-group").removeClass('has-error').removeClass('has-success');
           $(".text-danger").remove();
           $(".messages").html("");
          $("#passwordfield").css('display','none');
            $("#cinfield").css('display','none');
              let cin=$(this).closest('tr').find('th').eq(0).text();
              let nomfr=$(this).closest('tr').find('td').eq(1).text();
              let prenomfr=$(this).closest('tr').find('td').eq(2).text();
              let email=$(this).closest('tr').find('td').eq(3).text();
              let telephone=$(this).closest('tr').find('td').eq(4).text();
              let adresse=$(this).closest('tr').find('td').eq(5).text();
              let fonction =$(this).closest('tr').find('td').eq(6).text();
              //let photo=$(this).closest('tr').find('td').eq(8).text();
              let grade=$(this).closest('tr').find('td').eq(7).text();
              let etablissement =$(this).closest('tr').find('td').eq(8).text();


              $("#cin").val(cin);
              $("#nomfrancais").val(nomfr);
              $("#prenomfrancais").val(prenomfr);
              $("#email").val(email);
              $("#telephone").val(telephone);
              $("#adresse").val(adresse);
              $("#fonction").val(fonction);
              //$("#photo").val(abbreviation);
              $("#grade").val(grade);
              $("#etablissement").val(etablissement);


              $("#createMemberForm").unbind('submit').bind('submit', function() {
               $(".text-danger").remove();
                var cin=$("#cin").val();
                var nomfr=$("#nomfrancais").val();
                var prenomfr=$("#prenomfrancais").val();
                var email = $("#email").val();
                var telephone=$("#telephone").val();
                var adresse=$("#adresse").val();
                var fonction=$("#fonction").val();
                //$("#photo").val(abbreviation);
                var grade=$("#grade").val();
                var etablissement=$("#etablissement").val();
                var password=$("#password").val();

                              $.ajax({
                             url: 'controller/MembreController.php',
                             data: {op: 'update',etab: etab,cin:cin,nomfr:nomfr,prenomfr:prenomfr,email:email,telephone:telephone,adresse:adresse,fonction:fonction,photo:'photo',grade:grade,etablissement:etablissement,password:password},
                             type: 'POST',
                             success: function (data, textStatus, jqXHR) {
                               remplir(data);
                             },
                             error: function (jqXHR, textStatus, errorThrown) {
                               alert('bad');
                                 console.log(textStatus);
                             }
                         });
           });

         });


         $(document).on('click', '.supprimer', function () {
        var cin = $(this).closest('tr').find('th').text();
         $.ajax({
             url: 'controller/MembreController.php',
             type: 'post',
             data: {op: 'delete' ,cin : cin,etab: etab},
             dataType: 'json',
             success:function(response) {
                 $(".removeMessages").html('<div class="alert alert-info alert-dismissible" role="alert">'+
                     '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                     '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+'Suppression bien effectuer!!!'+
                   '</div>');

                 // refresh the table
                remplir(response)
                 // close the modal
                 $("#removeMemberModal").modal('hide');
                },
                error: function(response){

                 $(".removeMessages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
                     '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                     '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+'Something went wrong!'+
                   '</div>');

              }
           });
       });





        function remplir(data)
        {
        var body = "<tr>";
        data.forEach((e) => {
            body    += '<td><img src="img/membre/'+ e.photo + '" class="rounded img-responsive"/ width="60" height="50"></td>';
            body    += "<th>" + e.cin + "</th>";
            body    += "<td>"+e.nom+"</td>";
            body    += "<td>" + e.prenom + "</td>";
            body    += "<td>" + e.email + "</td>";
            body    += "<td>" + e.telephone   + "</td>";
            body    += "<td>" + e.adresse   + "</td>";
            body    += "<td>" + e.fonction   + "</td>";
            body    += "<td>" + e.grade  + "</td>";
            body    += "<td>" + e.libelleFrancais  + "</td>";


            body    +=     '<td><div class="dropdown mb-4">'+
                   '<button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'+
                      'Option'+
                    '</button>'+
                    '<div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">'+
                      '<a type="button" class="dropdown-item modifier" data-toggle="modal" data-target="#addMember"><i class="fa fa-edit"></i> Edit</a>'+
                      '<a type="button" class="dropdown-item supprimer" ><i class="fa fa-trash"></i> Delete</a>'+
                    '</div>'+
                  '</div></td>';
            body    += "</tr>";
        });
                    /*DataTables instantiation.*/
        $( "#body" ).html("");
        $( "#body" ).html(body);
        manageMemberTable.DataTable({
          scrollX: true,
          language: {
              "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/French.json"
          }});
  
        }

    });
