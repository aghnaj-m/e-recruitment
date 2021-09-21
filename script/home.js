$(document).ready(function() {
    var etab = $('#adminEtab').text();
        function getCountFrom(url, i) {
        $.ajax({
            url: url,
            data: {op: '',etab:etab},
            type: 'POST',
            success: function(data, textStatus, jqXHR) {
                $('h2[class="num"]').eq(i).text(data.length);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                $('h2[class="num"]').eq(i).text('...');
            }
        });
    }
    getCountFrom('controller/CandidatController.php', 0);
    getCountFrom('controller/MembreController.php', 1);
    getCountFrom('controller/EtablissementController.php', 2);
    getCountFrom('controller/ConcourController.php', 3);
    getCountFrom('controller/PostulationController.php', 4);
    });

