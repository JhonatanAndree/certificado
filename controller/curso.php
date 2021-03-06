<?php
    /*Llamando a cadena de Conexion */
    require_once("../config/conexion.php");
    /*Llamando a la clase */
    require_once("../models/Curso.php");
    /*Inicializando Clase */
    $curso = new Curso();

    /*Opcion de solicitud de controller */
    switch($_GET["op"]){
        /*Guardar y editar cuando se tenga el ID */
        case "guardaryeditar":
            if(empty($_POST["cur_id"])){
                $curso->insert_curso($_POST["cat_id"],$_POST["cur_nom"],$_POST["cur_descrip"],$_POST["cur_fechini"],$_POST["cur_fechfin"],$_POST["inst_id"]);
            }else{
                $curso->update_curso($_POST["cur_id"],$_POST["cat_id"],$_POST["cur_nom"],$_POST["cur_descrip"],$_POST["cur_fechini"],$_POST["cur_fechfin"],$_POST["inst_id"]);
            }
            break;
        /*Creando Json segun el ID */
        case "mostrar":
            $datos = $curso->get_curso_id($_POST["cur_id"]);
            if(is_array($datos)==true and count($datos)<>0){
                foreach($datos as $row){
                    $output["cur_id"] = $row["cur_id"];
                    $output["cat_id"] = $row["cat_id"];
                    $output["cur_nom"] = $row["cur_nom"];
                    $output["cur_descrip"] = $row["cur_descrip"];
                    $output["cur_fechini"] = $row["cur_fechini"];
                    $output["cur_fechfin"] = $row["cur_fechfin"];
                    $output["inst_id"] = $row["inst_id"];
                }
                echo json_encode($output);
            }
            break;
        /*Eliminar segun ID */
        case "eliminar":
            $curso->delete_curso($_POST["cur_id"]);
            break;
        /*Listar toda la informacion según formato de datatable */
        case "listar":
            $datos=$curso->get_curso();
            $data= Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["cat_nom"];
                /* Agregada la etiqueta a para ver el modelo de certificado asignado al curso */
                $sub_array[] = '<a href="'.$row["cur_img"].'" target="_blank">'.strtoupper($row["cur_nom"]).'</a>';
                $sub_array[] = $row["cur_fechini"];
                $sub_array[] = $row["cur_fechfin"];
                $sub_array[] = $row["inst_nom"] ." ". $row["inst_apep"] ." ". $row["inst_apem"];
                $sub_array[] = '<button type="button" onClick="editar('.$row["cur_id"].');"  id="'.$row["cur_id"].'" class="btn btn-outline-warning btn-icon"><div><i class="fa fa-edit"></i></div></button>';
                $sub_array[] = '<button type="button" onClick="eliminar('.$row["cur_id"].');"  id="'.$row["cur_id"].'" class="btn btn-outline-danger btn-icon"><div><i class="fa fa-close"></i></div></button>';
                $sub_array[] = '<button type="button" onClick="imagen('.$row["cur_id"].');"  id="'.$row["cur_id"].'" class="btn btn-outline-primary btn-icon"><div><i class="fa fa-image"></i></div></button>'; /* Imagen para personalización de certificado */
                $data[] = $sub_array;
            }

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);
            break;
        /*Listar toda la informacion de los cursos*/
        case "combo":
            $datos=$curso->get_curso();
            if(is_array($datos)==true and count($datos)>0){
                $html= " <option label='Seleccione'></option>";
                foreach($datos as $row){
                    $html.= "<option value='".$row['cur_id']."'>".$row['cur_nom']."</option>";
                }
                echo $html;
            }
            break;

        case "eliminar_curso_usuario":
            $curso->delete_curso_usuario($_POST["curd_id"]);
            break;

        /*Insetar estudiante al curso seleccionado en Detalle Certificado para lista de estudiantes para un determinado curso seleccionado */
        case "insert_curso_usuario":
            /*Array de usuario separado por comas */
            $datos = explode(',', $_POST['usu_id']);
            /*Registrar tantos usuarios vengan de la vista */
            $data = Array();
            foreach($datos as $row){
                $sub_array = array();
                $idx=$curso->insert_curso_usuario($_POST["cur_id"],$row);
                $sub_array[] = $idx;
                $data[] = $sub_array;
            }
            echo json_encode($data);
            break;

        /* Al visualizar un certificado para un usuario en particular, el único dato que se modifica es el "curd_id".
        Ese es el dato que se asigna cuando asignamos a un estudiante y curso aprobado.
        Por tal motivo ese es el dato que usaremos para identificar el QR único de cada usuario */
        case "generar_qr":
            require 'phpqrcode/qrlib.php';
            //Primer Parametro - Texto del QR
            //Segundo Parametro - Ruta donde se guardara el archivo
            QRcode::png(conectar::ruta()."view/Certificado/index.php?curd_id=".$_POST["curd_id"],"../public/qr/".$_POST["curd_id"].".png",'L',32,5);
            break;

        case "update_imagen_curso":
            $curso->update_imagen_curso($_POST["curx_idx"],$_POST["cur_img"]);/* Recibe los datos del formulario del modal desde el input */
            break;
    }
?>