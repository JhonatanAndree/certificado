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
                $sub_array[] = '<button type="button" onclick="certificado('.$row['curd_id'].');" id="'.$row["curd_id"].'" class="btn btn-outline-primary btn-icon"><div><i class="fa fa-id-card-o"></i></div></button>';
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

        /* Microservicio para mostrar información del certificado con el curd_id */
        case "mostrar_curso_detalle":
            $datos = $usuario->get_curso_x_id_detalle($_POST['curd_id']);
            if(is_array($datos)==true and count($datos)<>0){
                foreach($datos as $row){
                    $output["curd_id"] = $row["curd_id"];
                    $output["cur_id"] = $row["cur_id"];
                    $output["cur_nom"] = $row["cur_nom"];
                    $output["cur_descrip"] = $row["cur_descrip"];
                    $output["cur_fechIni"] = $row["cur_fechIni"];
                    $output["cur_fechFin"] = $row["cur_fechFin"];
                    $output["usu_id"] = $row["usu_id"];
                    $output["usu_nom"] = $row["usu_nom"];
                    $output["usu_apep"] = $row["usu_apep"];
                    $output["usu_apem"] = $row["usu_apem"];
                    $output["inst_id"] = $row["inst_id"];
                    $output["inst_nom"] = $row["inst_nom"];
                    $output["inst_apep"] = $row["inst_apep"];
                    $output["inst_apem"] = $row["inst_apem"];
                }
                echo json_encode($output);
            }
            break;
    }
?>