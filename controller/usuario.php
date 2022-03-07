<?php
    /* Llamando a la cadena de conexión. */
    require_once('../config/conexion.php');
    /* Llamando a la clase usuario */
    require_once('../models/Usuario.php');
    /* Inicializamos clase */
    $usuario = new Usuario();

    /* Opción de solicitud de controller */
    switch($_GET['op']){
        /* Microservicios para poder mostrar el listado de cursos de usuario con certificado. mandamos el servicio "listar_cursos" a "usucurso.js" */
        case 'listar_cursos':
            $datos = $usuario->get_cursos_x_usuario($_POST['usu_id']);
            $data = array();
            /* Creación de tabla */
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row['cur_nom'];
                $sub_array[] = $row['cur_fechIni'];
                $sub_array[] = $row['cur_fechFin'];
                $sub_array[] = $row['inst_nom']." ".$row['inst_apep'];
                $sub_array[] = '<button type="button" onclick="Certificado('.$row['cur_id'].');" id="'.$row["cur_id"].'" class="btn btn-outline-warning btn-icon"><div><i class="fa fa-edit"></i></div></button>';
                $data[] = $sub_array;
            }
            /* Json */
            $results = array(
                "sEcho" => 1,
                "iTotalRecords" => count($data),
                "iTotalDisplayRecords" => count($data),
                "aaData" => $data);
            echo json_encode($results);

            break;
    }
?>