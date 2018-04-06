    </div>
    <!-- /container -->
 
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
 
<!-- Latest compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
<!-- bootbox library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>

<!-- font awesome icons -->
<script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>

<script src="libs/js/jquery.mask.min.js"></script>

<script>
    $(document).ready(function() {
        $('.data').mask('00/00/0000');
        $('.ano').mask('0000');
        $('.cep').mask('00000-000');
        $('.telefone_com_ddd').mask('(00) 0000-0000');
        $('.celular_com_ddd').mask('(00) 00000-0000');
    });
</script>

<script>
// JavaScript for deleting product
$(document).on('click', '.delete-object', function() {
 
    var id = $(this).attr('delete-id');
 
    bootbox.confirm({
        message: "<h4>Apagar ficha?</h4>",
        buttons: {
            confirm: {
                label: '<span class="fas fa-check"></span> Sim',
                className: 'btn-danger'
            },
            cancel: {
                label: '<span class="fas fa-times"></span> Não',
                className: 'btn-primary'
            }
        },
        callback: function (result) {
 
            if(result==true){
                $.post('apaga_ficha.php', {
                    object_id: id
                }, function(data){
                    location.reload();
                }).fail(function() {
                    alert('Erro ao apagar ficha.');
                });
            }
        }
    });
 
    return false;
});
</script>
 
</body>
</html>