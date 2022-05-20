const canvas = document.getElementById('canvas');
const ctx = canvas.getContext('2d');

/* Iniciamos la imagen */
const image = new Image();
/* Ruta de la imagen */
image.src = "../../public/Certificado2.png";

$(document).ready(function () {
    var curd_id = getUrlParameter('curd_id');

    $.post('../../controller/usuario.php?op=mostrar_curso_detalle', { curd_id: curd_id }, function (data) {
        data = JSON.parse(data);
        $('#cur_descrip').html(data.cur_descrip);
        /* Dimensión y selección de imagen */
        ctx.drawImage(image, 0, 0, canvas.width, canvas.height); /* Dibujo de imagen. */
        /* Tamaño de la fuente */
        ctx.font = 'bold 40px Arial';
        /* Centrar texto superior e inferior */
        ctx.textAlign = 'center';
        ctx.textBaseline = 'middle';
        /* Definir ancho de imagen y lo dividimos entre 2 para colocarlo a la mitad*/
        var x = canvas.width / 2;
        /* Marcamos la posición del texto en x y en y */
        ctx.fillText(data.usu_nom + ' '+ data.usu_apep +' ' +data.usu_apem, x, 246);

        ctx.font = 'bold 26px Arial';
        ctx.fillText(data.cur_nom, x, 345);

        ctx.font = 'bold 18px Arial';
        ctx.fillText(data.inst_nom + ' '+ data.inst_apep +' ' +data.inst_apem, x, 416);

        ctx.font = 'bold 15px Arial';
        ctx.fillText('Fecha Inicio: '+ data.cur_fechIni +' / '+' Fecha Fin: '+data.cur_fechFin+'', x, 560);

        var y = canvas.width / 3.3;

        ctx.font = 'bold 15px Arial';
        ctx.fillText("Firma 1", y, 480);

        var z = canvas.height / 0.97;
        ctx.font = 'bold 15px Arial';
        ctx.fillText("Firma 2", z, 480);

    });

});

/* Código para obtener datos dinámicos para mostrar en el certificado. */
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
/* Código para obtener datos dinámicos para mostrar en el certificado. */