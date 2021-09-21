$(document).ready(function() {
  let cin=$('#candidatcin').text();
 $.ajax({
     url: 'controller/CandidatInfos.php',
     data: {op: '',cin: cin},
     type: "POST",
     success: function(data) {
     remplir(data);
     },
     error: function(error) {
     alert(error);
 }
});


         $(document).on('click', '.modifier', function () {

           //$(".modal-title").text('Modifier mes infos');
           $(".form-group").removeClass('has-error').removeClass('has-success');
           $(".text-danger").remove();
           $(".messages").html("");



              $("#createMemberForm").unbind('submit').bind('submit', function() {
               $(".text-danger").remove();
                var nomfr=$("#nomfrancais").val();
                var prenomfr=$("#prenomfrancais").val();
                var nomar=$("#nomarabe").val();
                var prenomar=$("#prenomarabe").val();
                var email=$("#email").val();
                var telephone=$("#telephone").val();
                var adresse=$("#adresse").val();
                var fonction=$("#fonctionnaire").val();
                //var fonction1=Number(fonction);
                var ville=$("#ville").val();
                var lieu=$('#lieu').val();
                var date=$('#date').val();
                //$("#photo").val(abbreviation);
                //var grade=$("#grade").val();
                //var etablissement=$("#etablissement").val();

                //alert('cin'+cin+' nomfr'+nomfr+' prenomfr'+prenomfr+' nomar '+nomar+ ' prenomar '+prenomar+' telephone'+telephone+' adresse'+adresse+' fonction'+fonction1+' ville'+ ville +' lieu '+lieu);
                              $.ajax({
                             url: 'controller/CandidatController.php',
                             data: {op: 'updateall',cin:cin,nomfr:nomfr,prenomfr:prenomfr,nomar:nomar,prenomar:prenomar,email:email,password:'pass',telephone:telephone,adresse:adresse,ville:ville,fonctionnaire:Number(fonction),lieuNaissance:lieu,dateNaissance:date,cinrecto:'cinrecto',cinverso:'cinverso',photo:'photo'},
                             type: 'POST',
                             success: function (data, textStatus, jqXHR) {
                               alert('good');

                             },
                             error: function (jqXHR, textStatus, errorThrown) {
                               alert('bad');
                                 console.log(textStatus);
                             }
                         });
           });
//16 9
         });


         $("#changepicform").submit(function(event) {
            let imageExt=$('#newpic').val().split('.')[1];
            //let name=myimage.split('/').pop();
            let image=cin+"."+imageExt;
             alert(image);
            $.ajax({
            url: 'controller/CandidatInfos.php',
            data: {op: 'changepic',cin:cin,photo:image},
            type: 'POST',
            success: function (data, textStatus, jqXHR) {
              alert('good');
            },
            error: function (jqXHR, textStatus, errorThrown) {
              alert('bad');
                console.log(textStatus);
            }
        })
         });
         $("#changecv").submit(function(event) {
            let imageExt=$('#cv').val().split('.')[1];
            //let name=myimage.split('/').pop();
            let image=cin+"."+imageExt;
             alert(image);

         });

           //alert('cin'+cin+' nomfr'+nomfr+' prenomfr'+prenomfr+' nomar '+nomar+ ' prenomar '+prenomar+' telephone'+telephone+' adresse'+adresse+' fonction'+fonction1+' ville'+ ville +' lieu '+lieu);
                        /* $.ajax({
                        url: 'controller/CandidatController.php',
                        data: {op: 'updateall',cin:cin,nomfr:nomfr,prenomfr:prenomfr,nomar:nomar,prenomar:prenomar,email:email,password:'pass',telephone:telephone,adresse:adresse,ville:ville,fonctionnaire:1,lieuNaissance:lieu,dateNaissance:date,cinrecto:'cinrecto',cinverso:'cinverso',photo:'photo'},
                        type: 'POST',
                        success: function (data, textStatus, jqXHR) {
                          alert('good');

                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                          alert('bad');
                            console.log(textStatus);
                        }
                    });*/

         //16 9







function remplir(data)
{
  $('#candidatnom').text(data.nomFrancais);
  $('#candidatprenom').text(data.prenomFrancais);
  $('#candidatnomar').text(data.nomArab);
  $('#candidatprenomar').text(data.prenomArab);
  $('#candidattel').text(data.telephone);
  $('#candidatemail').text(data.email);
  $('#candidatville').text(data.ville);
  $('#candidatadresse').text(data.adresse);
  if (data.fonctionnaire==1) {
    $('#candidatfonction').text('oui');
  } else {
    $('#candidatfonction').text('non');
  }

  $('#candidatdate').text(data.dateNaissance);
  $('#candidatlieu').text(data.lieuNaissance);
  $('#nomfrancais').attr('value', data.nomFrancais);
  $('#prenomfrancais').attr('value', data.prenomFrancais);
  $('#nomarabe').attr('value', data.nomArab);
  $('#prenomarabe').attr('value', data.prenomArab);
  $('#email').attr('value', data.email);
  $('#telephone').attr('value', data.telephone);
  $('#nomfrancais').attr('value', data.nomFrancais);
  $('#lieu').attr('value', data.lieuNaissance);
  $('#date').attr('value',data.dateNaissance);
  $('#adresse').attr('value', data.adresse);
  $('#ville').attr('value',data.ville);
}
});
