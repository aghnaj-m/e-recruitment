
$(document).ready(function () {
    var cin=$('#cin').text();
    //alert(cin);
    $.ajax({
        url: 'controller/BacController.php',
        mimeType: 'json',
        data: {op: '',cin:cin},
        type: "POST",
    success: function(data) {
        remplir(data);
    },
    error: function(error) {
        alert('Failed!');
    }
});





    $('#form').submit(function(event) {
      var serie=$('#serie').val();
      var type=$('#type').val();
      var date=$('#date').val();
      var ville=$('#ville').val();
      var fichier=cin+'.'+$('#fichierbac').val().split('.')[1];
      $.ajax({
				url: 'controller/BacController.php',
				type: 'post',
				data: {op: 'update' ,cin:cin,fichier:fichier,serie:serie,type:type,date:date,ville:ville,id:1},
				dataType: 'json',
				success:function(response) {
						alert('good');
				},
				error: function(response){
					alert("Error");
				}
			});
    });








        function remplir(data)
        {
          //alert(data[0]['serie']!='indéfini');
          if(data.length>0){
             if(data[0]['serie']!='indéfini'){
        data.forEach((e) => {
          $('#serie').val(e.serie);
          if(e.type=='etranger'){
          $('#etranger').attr('selected', 'selected');
        }
          $('#date').val(e.date);
          $('#ville').val(e.ville);
          $('#id').val(e.id);
		});
  }
}else{
  $.ajax({
    url: 'controller/BacController.php',
    type: 'post',
    data: {op: 'add' ,cin:cin,fichier:'fichier.pdf',serie:'indéfini',type:'indéfini',date:'2019-05-26',ville:'ville',id:1},
    dataType: 'json',
    success:function(response) {
        alert('good');
    },
    error: function(response){
      alert("Error");
    }
  });
}

}  //function

    });
