$(document).ready(function(){
    var curd_id = getUrlParameter('curd_id');

    $.post("../../controller/usuario.php?op=mostrar_curso_detalle", {curd_id : curd_id}, function(data){
        data = JSON.parse(data);
        console.log(data);
        $("#cur_descrip").html(data.cur_descrip);
    });
});

var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};