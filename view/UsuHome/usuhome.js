var usu_id = $('#usu_idx').val();

$(document).ready(function(){
    $.post('../../controller/usuario.php?op=total', { usu_id: usu_id }, function (data) {
        data = JSON.parse(data);
        $('#lbltotal').html(data.total);
    });
});