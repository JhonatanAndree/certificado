var usu_id = $('#usu_idx').val();

$(document).ready(function(){
    $.post('../../controller/usuario.php?op=mostrar', { usu_id : usu_id }, function (data) {
        data = JSON.parse(data);
        $('#usu_nom').val(data.usu_nom);
        $('#usu_apep').val(data.usu_apep);
        $('#usu_apem').val(data.usu_apem);
        $('#usu_correo').val(data.usu_correo);
        $('#usu_pass').val(data.usu_pass);
        $('#usu_telf').val(data.usu_telf);
        $('#usu_sex').val(data.usu_sex).trigger('change');
    });
    
});