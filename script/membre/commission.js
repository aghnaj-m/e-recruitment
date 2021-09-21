
$(document).ready(function () {
    var membre = $('#manageMemberTable').attr("name");
	$('.Mycard').hide();
    $.ajax({
        url: 'controller/CommissionController.php',
        mimeType: 'json',
        data: {op: 'getByMember',etab: '',membre: membre},
        type: "POST",
    success: function(data) {
        remplir(data);
    },
    error: function(error) {
        alert('Failed');
    }
});

	 var commission;
	$('#manageMemberTable').on('click', 'tbody tr', function() {
		$('#manageMemberTable tbody tr').css('background', '').css('color','black');
		$(this).css('background', 'rgb(173,199,223)').css('color','white');
		$('.Mycard').show();
		var table = $('#manageMemberTable').DataTable();
		var data = table.row(this).data().map(function(item, index) {
		   var r = {}; r['col'+index]=item; return r;
        });
		$('#listTitle').html('Membres de la '+data[0].col0);
		commission = data[3].col3;
		alert(commission);

		//now use AJAX with data, which is on the form [ { col1 : value, col2: value ..}]
		$.ajax({
			url: 'controller/CMController.php',
			mimeType: 'json',
			data: {op: 'show',commission: commission },
			type: "POST",
			//scrollX: true,
		  success: function(data) {
				ListMembres(data);
			},
		  error: function(error) {
			alert('Failed to bring list');
		  }
		  });



	});


        function remplir(data)
        {
        if(data.length>0){
            var body = "<tr>";
            data.forEach((e) => {
            body    += "<td>" + e.nom + "</td>";
			body    += "<td>" + e.description + "</td>";
			body    += "<td>" + e.dateCreation + "</td>";
			body    += "<td style=\"display: none;\">" + e.id + "</td>";
            body    += "</tr>";
		});
		$( "#manageMemberTable tbody" ).html("");
			$( "#manageMemberTable tbody" ).html(body);
			$( "#manageMemberTable" ).DataTable();
        }else{
            $( "#manageMemberTable tbody" ).html('<td colspan=6><div class="alert alert-success">Vous n\'etes affecté(e) à aucune commission</div></td>');
          }

		}


		function ListMembres(data)
        {

			var inList = [];
        	if(data.length>0){
			var body = '';
			data.forEach((e) => {
            inList.push((e.cin).toString());
            if(e.cin == membre){
			    body+= '<a style="cursor: pointer"'+
			    'class="list-group-item clearfix active text-light" >';
			    body+='<div class="pull-left">'+
			    '<h4 class="list-group-item-heading">'+e.nom.toUpperCase()+' '+e.prenom.toUpperCase()+'</h4>'+
			    '<p class="list-group-item-text">'+e.grade+' à '+e.libelleFrancais+'</p>'+
			    '</div>';
			    body += '<span class="pull-right">'+
			    '<img src="img/membre/'+e.photo+'" alt="" class="img-responsive" style="max-height: 50px;">'+
			    '</span>'+
                '</a>';
            }else{
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
            }
			});
			$( "#membersList").html(body);
        	}
		}



    });
