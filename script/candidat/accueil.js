$(document).ready(function() {
  var cin=$('#cin').text();
  //alert(cin);
  $.ajax({
      url: 'controller/CountController.php',
      mimeType: 'json',
      data: {op: 'these',cin:cin},
      type: "POST",
  success: function(data) {
      for (var i = 0; i < data.length; i++) {
        $('#nombrethese').text(data[i].nombre_diplome);
      }
  },
  error: function(error) {
      alert('Failed!');
  }
});
$.ajax({
    url: 'controller/CountController.php',
    mimeType: 'json',
    data: {op: 'diplome',cin:cin},
    type: "POST",
success: function(data) {
    for (var i = 0; i < data.length; i++) {
      $('#nombrediplome').text(data[i].nombre_diplome);
    }
},
error: function(error) {
    alert('Failed!');
}
});
$.ajax({
    url: 'controller/CountController.php',
    mimeType: 'json',
    data: {op: 'publication',cin:cin},
    type: "POST",
success: function(data) {
    for (var i = 0; i < data.length; i++) {
      $('#nombrepublication').text(data[i].nombre_diplome);
    }
},
error: function(error) {
    alert('Failed!');
}
});
});
