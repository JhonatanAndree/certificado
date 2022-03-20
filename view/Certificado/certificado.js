const canvas = document.getElementById('canvas');
const ctx = canvas.getContext('2d');

/* Iniciamos la imagen */
const image = new Image();
/* Ruta de la imagen */
image.src = "../../public/certificado.png";
/* Dimensión y selección de imagen */
ctx.drawImage(image, 0, 0, canvas.width, canvas.height); /* Dibujo de imagen. */
/* Tamaño de la fuente */
ctx.font = 'bold 45px Arial';
/* Centrar texto superior e inferior */
ctx.textAlign = 'center';
ctx.textBaseline = 'middle';
/* Definir ancho de imagen y lo dividimos entre 2 para colocarlo a la mitad*/
var x = canvas.width / 2;
/* Marcamos la posición en x y en y */
ctx.fillText("Jhonatan", x, 300);
ctx.fillText("Jhonatan2", x, 230);
$(document).ready(function () {
    var curd_id = getUrlParameter('curd_id');

    $.post("../../controller/usuario.php?op=mostrar_curso_detalle", { curd_id: curd_id }, function (data) {
        data = JSON.parse(data);
        /*         console.log(data); */
        $("#cur_descrip").html(data.cur_descrip);
    });

    /* Otorgamos los datos necesarios para que pueda imprimir la imagen. */


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