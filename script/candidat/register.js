$(document).ready(function() {

$('#register').submit(function(event) {
  var val1=$('#Password').val();
  var val2=$('#Password1').val();
  if (val1 ==val2){
    confirm('vous comfirmez la validité de ces info ?');
    //les infos d'inscriptions
    var nom=$('#FirstName').val();
    var prenom=$('#LastName').val();
    var email=$('#Email').val();
    var password=$('#Password').val();
    var cin=$('#CIN').val();
    //l'ajout de candidat
    $.ajax({
        url: 'controller/CandidatController.php',
        data: {op: 'add',cin: cin,nomfr: nom,prenomfr: prenom,nomar:'indéfini',prenomar:'indéfini',email:email,password:password,telephone:'indéfini',adresse:'indéfini',ville:'indéfini',fonctionnaire:1,lieuNaissance:'indéfini',dateNaissance:'1999-05-26',cinrecto:cin+'recto.jpg',cinverso:cin+'verso.jpg',photo:'no-photo.jpg'},
        type: "POST",
        success: function(data) {
        alert('good');
        },
       error: function(error) {
        alert(error);
     }
   });

  }else{
    alert('mots de passe non identiques');
    event.preventDefault();
  }
});


});
