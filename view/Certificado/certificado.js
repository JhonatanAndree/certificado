const canvas = document.getElementById('canvas');
const ctx = canvas.getContext('2d');

$(document).ready(function () {
    var curd_id = getUrlParameter('curd_id');

    $.post("../../controller/usuario.php?op=mostrar_curso_detalle", { curd_id: curd_id }, function (data) {
        data = JSON.parse(data);
        $("#cur_descrip").html(data.cur_descrip);
        /* Iniciamos la imagen */
        const image = new Image();
        /* Ruta de la imagen */
        image.src = "../../public/CertificadoOficial.png";
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
        ctx.fillText(data.usu_nom + ' '+ data.usu_apep +' ' +data.usu_apem, x, 260);

        ctx.font = 'bold 26px Arial';
        ctx.fillText(data.cur_nom, x, 320);

        ctx.font = 'bold 18px Arial';
        ctx.fillText(data.inst_nom + ' '+ data.inst_apep +' ' +data.inst_apem, x, 380);

        ctx.font = 'bold 15px Arial';
        ctx.fillText("99-99-9999", x, 420);

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