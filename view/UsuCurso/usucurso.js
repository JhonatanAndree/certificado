/* Llamar a la lista del data table cuando el documento esté listo se ejecute aquí. */
$(document).ready(function(){
    $('#cursos_data').DataTable({
        "aProcessing": true,
        "aServerSide": true,
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
        ],
        "ajax":{
            /* Llamamos al servicio "listar_cursos" desde el controlador pero este necesita un parámetro url que es "usu_id" y este es el id del usuario que está logueado. */
            url: "../../controller/usuario.php?op=listar_cursos",
            type: "post",
            data: {usu_id:1},/* Mantenemos el número 1 para ejemplo. */
        },
        "bDestroy": true,
        "responsive": true,
        "bInfo": true,
        "iDisplayLength": 15,
        "order": [[0, "desc"]],
        "language": {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        },
    });
});

/* Recibimos la acción del botón que hace referencia al id del certificado en "mis certificados" (onClic) de usuario. */
function certificado(curd_id){
    window.open('../Certificado/index.php?curd_id='+curd_id+'','_blank');
}