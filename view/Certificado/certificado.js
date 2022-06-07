const canvas = document.getElementById('canvas');
const ctx = canvas.getContext('2d');

/* Inicializamos la imagen */
const image = new Image();
const imageqr = new Image(); /* Necesario para el QR en el certificado */

$(document).ready(function(){
    var curd_id = getUrlParameter('curd_id');

    $.post("../../controller/usuario.php?op=mostrar_curso_detalle", { curd_id : curd_id }, function (data) {
        data = JSON.parse(data);

        /* Ruta de la Imagen del certificado*/
        image.src = data.cur_img;
        /* Dimensionamos y seleccionamos imagen */
        ctx.drawImage(image, 0, 0, canvas.width, canvas.height);

        /* Definimos tamaño de la fuente */
        ctx.font = '40px Arial';
        ctx.textAlign = "center";
        ctx.textBaseline = 'middle';
        var x = canvas.width / 2;
        ctx.fillText(data.usu_nom+' '+data.usu_apep+' '+data.usu_apem, x, 270);

        ctx.font = '35px Arial';
        ctx.fillText(data.cur_nom, x, 380);

        ctx.font = '16px Arial';
        ctx.fillText(data.inst_nom+' '+ data.inst_apep+' '+data.inst_apem, x, 440);
        ctx.font = '15px Arial';
        ctx.fillText('Profesor', x, 460);

        ctx.font = '15px Arial';
        ctx.fillText('Fecha de Inicio : '+data.cur_fechini+' / '+'Fecha de Finalización : '+data.cur_fechfin+'', x, 615);

        /* Ruta de la Imagen QR */
        imageqr.src = "../../public/qr/"+curd_id+".png";
        /* Dimensionamos y seleccionamos imagen */
        ctx.drawImage(imageqr, 389, 480, 120, 120);
        /* Inserción de la descripción del curso en consulta. */
        $('#cur_descrip').html(data.cur_descrip);
    });

});

/* Recarga por defecto solo 1 vez para mostrar la imagen base del certificado */
window.onload = function() {
    if(!window.location.hash) {
        window.location = window.location + '#loaded';
        window.location.reload();
    }
}

/* Botón png de certificado. */
$(document).on("click","#btnpng", function(){
    let lblpng = document.createElement('a');
    lblpng.download = "Certificado.png";
    lblpng.href = canvas.toDataURL();
    lblpng.click();
});
/* Botón pdf de certificado. */
$(document).on("click","#btnpdf", function(){
    var imgData = canvas.toDataURL('image/png');
    var doc = new jsPDF('l', 'mm'); /* (L = Formato horizontal del documento.) */
    doc.addImage(imgData, 'PNG', 30, 15);
    doc.save('Certificado.pdf');
});

/* Función para adquirir id de parametro enviado desde "UsuCurso" y poder tratar los datos. */
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
