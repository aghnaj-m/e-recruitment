$(document).ready(function () {
  var manageMemberTable; //id de la table
  $.ajax({
      url: 'controller/CandidatController.php',
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

/*
//AJOUT D'UN NV ETABLISSEMENT
  $("#addMemberModalBtn").on('click', function() {
  // reset the form
  //$("#createMemberForm")[0].reset();
  // remove the error
  $(".form-group").removeClass('has-error').removeClass('has-success');
  $(".text-danger").remove();
  $("#fonctionnairefield").css('display','initial');
    $("#datefield").css('display','initial');
    $("#photofield").css('display','initial');
      $("#cinrectofield").css('display','initial');
      $("#cinversofield").css('display','initial');
      $("#emailfield").css('display','initial');
      $("#passwordfield").css('display','initial');
  // empty the message div
  $(".messages").html("");
  $("#cin").val('');
  $("#nomfrancais").val('');
  $("#prenomfrancais").val('');
  $("#nomarabe").val('');
  $("#prenomarabe").val('');
  $("#email").val('');
  $("#telephone").val('');
  $("#adresse").val('');
  $("#ville").val('');
  $("#lieu").val('');
  $("#date").val('');



  $("#createMemberForm").unbind('submit').bind('submit', function() {

    $(".text-danger").remove();

                  var cin = $("#cin").val();
                  var nomfrancais = $("#nomfrancais").val();
                  var prenomfrancais = $("#prenomfrancais").val();
                  var nomarabe = $("#nomarabe").val();
                  var prenomarabe = $("#prenomarabe").val();
                  var email = $("#email").val();
                  var password = $("#password").val();
                  var telephone = $("#telephone").val();
                  var adresse = $("#adresse").val();
                  var ville = $("#ville").val();
                  var fonction = $("#fonctionnaire").val();
                  var lieu = $("#lieu").val();
                  var date = $("#date").val();
                  var photo = $("#photo").val();
                  var cinrecto = $("#cinrecto").val();
                  var cinverso = $("#cinverso").val();

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
              $("#nomarabe").blur(function(){
    if(nomarabe === "") {
      $("#nomarabe").closest('.form-group').addClass('has-error');
      $("#nomarabeError").html('<p class="text-danger">ce champs est obligatoire</p>');
    } else {
      $("#nomarabe").closest('.form-group').removeClass('has-error');
      $("#nomarabe").closest('.form-group').addClass('has-success');
      $("#nomarabeError").html('');
    }
  });

  $("#prenomarabe").blur(function(){
    if(prenomarabe === "") {
      $("#prenomarabe").closest('.form-group').addClass('has-error');
      $("#prenomarabeError").html("<p class=\"text-danger\">ce champs est obligatoire</p>");
    } else {
      $("#prenomarabe").closest('.form-group').removeClass('has-error');
      $("#prenomarabe").closest('.form-group').addClass('has-success');
      $("#prenomarabeError").html('');
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




           if(cin && nomfrancais && prenomfrancais && nomarabe && prenomarabe && email && telephone && adresse && photo) {
  //submi the form to server
  $.ajax({
  url : "controller/CandidatController.php",
  type : "POST",
  data : {op: 'add',cin: cin,nomfr: nomfrancais,prenomfr: prenomfrancais,nomar:nomarabe,prenomar:prenomarabe,email:email,password:password,telephone:telephone,adresse:adresse,ville:ville,fonctionnaire:fonction,lieuNaissance:lieu,dateNaissance:date,cinrecto:cinrecto,cinverso:cinverso,photo:photo},
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
    alert('bad');
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

*/

       $(document).on('click', '.modifier', function () {
         $(".modal-title").text('Modifier un candidat');
         $(".form-group").removeClass('has-error').removeClass('has-success');
         $(".text-danger").remove();
         $(".messages").html("");

            let cin=$(this).closest('tr').find('th').eq(0).text();
            let nomfr=$(this).closest('tr').find('td').eq(1).text();
            let prenomfr=$(this).closest('tr').find('td').eq(2).text();
            let nomar=$(this).closest('tr').find('td').eq(3).text();
            let prenomar=$(this).closest('tr').find('td').eq(4).text();
            //let email=$(this).closest('tr').find('td').eq(5).text();
            let telephone=$(this).closest('tr').find('td').eq(5).text();
            let ville=$(this).closest('tr').find('td').eq(6).text();
            let lieu =$(this).closest('tr').find('td').eq(7).text();
            let adresse=$(this).closest('tr').find('td').eq(8).text();

            //$("#cin").val(cin);
            $("#nomfrancais").val(nomfr);
            $("#prenomfrancais").val(prenomfr);
            $("#nomarabe").val(nomar);
            $("#prenomarabe").val(prenomar);
            //$("#email").val(email);
            $("#telephone").val(telephone);
            $("#ville").val(ville);
            $("#lieu").val(lieu);
            //$("#photo").val(abbreviation);
            $("#adresse").val(adresse);


            $("#createMemberForm").unbind('submit').bind('submit', function() {
             $(".text-danger").remove();
              var nomfr=$("#nomfrancais").val();
              var prenomfr=$("#prenomfrancais").val();
              var nomar=$("#nomarabe").val();
              var prenomar=$("#prenomarabe").val();
              //var email=$("#email").val();
              var telephone=$("#telephone").val();
              var adresse=$("#adresse").val();
              var fonction=$("#fonctionnaire").val();
              var fonction1=Number(fonction);
              var ville=$("#ville").val();
              var lieu=$('#lieu').val();
              //$("#photo").val(abbreviation);
              //var grade=$("#grade").val();
              //var etablissement=$("#etablissement").val();
              alert(cin);
              //alert('cin'+cin+' nomfr'+nomfr+' prenomfr'+prenomfr+' nomar '+nomar+ ' prenomar '+prenomar+' telephone'+telephone+' adresse'+adresse+' fonction'+fonction1+' ville'+ ville +' lieu '+lieu);
                            $.ajax({
                           url: 'controller/CandidatController.php',
                           data: {op: 'update',cin:cin,nomfr:nomfr,prenomfr:prenomfr,nomar:nomar,prenomar:prenomar,email:'email@email.com',password:'pass',telephone:telephone,adresse:adresse,ville:ville,fonctionnaire:fonction,lieuNaissance:lieu,dateNaissance:1999-05-26,cinrecto:'cinrecto',cinverso:'cinverso',photo:'photo'},
                           type: 'POST',
                           success: function (data, textStatus, jqXHR) {
                             alert('good');
                             remplir(data);
                           },
                           error: function (jqXHR, textStatus, errorThrown) {
                             alert('bad');
                               console.log(textStatus);
                           }
                       });
         });
//16 9
       });


       $(document).on('click', '.supprimer', function () {
      var cin = $(this).closest('tr').find('th').text();
      console.log(cin);
       $.ajax({
           url: 'controller/CandidatController.php',
           type: 'post',
           data: {op: 'delete' ,cin : cin},
           dataType: 'json',
           success:function(response) {
                                       alert(JSON.stringify(response));
             if(response.success == true) {
               $(".removeMessages").html('<div class="alert alert-info alert-dismissible" role="alert">'+
                   '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                   '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+'Bien Ajouter!!!'+
                 '</div>');

               // refresh the table
               manageMemberTable.ajax.reload(null, false);

               // close the modal
               $("#removeMemberModal").modal('hide');

             } else {
               $(".removeMessages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
                   '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                   '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+'Something went wrong!'+
                 '</div>');

             }
                                           location.reload();
           }
         });
     });





      function remplir(data)
      {
      var body = "<tr>";
      data.forEach((e) => {
          body    += '<td><img src="img/candidats/'+ e.photo + '" class="rounded img-responsive"/ width="60" height="50"></td>';
          body    += "<th>" + e.cin + "</th>";
          body    += "<td>"+e.nomFrancais+"</td>";
          body    += "<td>" + e.prenomFrancais + "</td>";
          body    += "<td>" + e.nomArab  + "</td>";
          body    += "<td>" + e.prenomArab  + "</td>";
          body    += "<td>" + e.telephone   + "</td>";
          body    += "<td>" + e.ville   + "</td>";
          body    += "<td>" + e.lieuNaissance  + "</td>";
          body    += "<td>" + e.adresse + "</td>";
          body    +=     '<td><div class="dropdown mb-4">'+
                 '<button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'+
                    'Option'+
                  '</button>'+
                  '<div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">'+
                    '<a type="button" id="removeBtn" class="dropdown-item modifier" data-toggle="modal" data-target="#addMember"><i class="fa fa-edit"></i> Edit</a>'+
                    '<a type="button" class="dropdown-item supprimer" ><i class="fa fa-trash"></i> Delete</a>'+
                  '</div>'+
                '</div></td>';
          body    += "</tr>";
      });
        /*DataTables instantiation.*/
        $( "#body" ).html("");
        $( "#body" ).html(body);
        $("#manageMemberTable").DataTable({
          scrollX: true,
          language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/French.json"
        }});



      }

  });
