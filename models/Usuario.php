<?php
    class Usuario extends Conectar{
        /* Función para login de acceso de usuario */
        public function login(){
            $conectar=parent::conexion();
            parent::set_names();
            if (isset($_POST["enviar"])){
                $correo = $_POST["usu_correo"];
                $pass = $_POST["usu_pass"];
                if(empty($correo) and empty($pass)){
                    /* Si ambos campos se encuentran vacios se vuelve al index mostrando el mensaje = 2 */
                    header("Location:".conectar::ruta()."index.php?m=2");
                    exit();
                }else{
                    $sql = "SELECT * FROM tm_usuario WHERE usu_correo=? and usu_pass=? and est=1";
                    $stmt=$conectar->prepare($sql);
                    $stmt->bindValue(1, $correo);
                    $stmt->bindValue(2, $pass);
                    $stmt->execute();
                    $resultado = $stmt->fetch();
                    if (is_array($resultado) and count($resultado)>0){
                        $_SESSION["usu_id"]=$resultado["usu_id"];
                        $_SESSION["usu_nom"]=$resultado["usu_nom"];
                        $_SESSION["usu_apep"]=$resultado["usu_apep"];
                        $_SESSION["usu_correo"]=$resultado["usu_correo"];
                        /* Si todo es correcto, indexar a home */
                        header("Location:".conectar::ruta()."view/UsuHome/");
                        exit();
                    }else{
                        /* En caso que no coincidan el usuario y contraseña */
                        header("Location:".conectar::ruta()."index.php?m=1");
                        exit();
                    }
                }
            }
        }

        /* Mostrar los cursos en los cuales está inscrito un usuario. */
        public function get_cursos_x_usuario($usu_id){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="SELECT
                td_curso_usuario.curd_id,
                tm_curso.cur_id,
                tm_curso.cur_nom,
                tm_curso.cur_descrip,
                tm_curso.cur_fechIni,
                tm_curso.cur_fechFin,
                tm_usuario.usu_id,
                tm_usuario.usu_nom,
                tm_usuario.usu_apep,
                tm_usuario.usu_apem,
                tm_instructor.inst_id,
                tm_instructor.inst_nom,
                tm_instructor.inst_apep,
                tm_instructor.inst_apem
                FROM `td_curso_usuario` INNER JOIN
                tm_curso on td_curso_usuario.cur_id = tm_curso.cur_id INNER JOIN
                tm_usuario ON td_curso_usuario.usu_id = tm_usuario.usu_id INNER JOIN
                tm_instructor ON tm_curso.inst_id = tm_instructor.inst_id
                WHERE
                td_curso_usuario.usu_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $usu_id);
            $sql->execute();
            return $resultado=$sql->fetchALL();
        }

        /* Mostrar los datos de un curso por su id de detalle. */
        public function get_curso_x_id_detalle($curd_id){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="SELECT
                td_curso_usuario.curd_id,
                tm_curso.cur_id,
                tm_curso.cur_nom,
                tm_curso.cur_descrip,
                tm_curso.cur_fechIni,
                tm_curso.cur_fechFin,
                tm_usuario.usu_id,
                tm_usuario.usu_nom,
                tm_usuario.usu_apep,
                tm_usuario.usu_apem,
                tm_instructor.inst_id,
                tm_instructor.inst_nom,
                tm_instructor.inst_apep,
                tm_instructor.inst_apem
                FROM `td_curso_usuario` INNER JOIN
                tm_curso on td_curso_usuario.cur_id = tm_curso.cur_id INNER JOIN
                tm_usuario ON td_curso_usuario.usu_id = tm_usuario.usu_id INNER JOIN
                tm_instructor ON tm_curso.inst_id = tm_instructor.inst_id
                WHERE
                td_curso_usuario.curd_id = ?"; /* <-- Actualizar este dato para obtener id del curso (curd_id) */
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $curd_id);
            $sql->execute();
            return $resultado=$sql->fetchALL();
        }

        /* Cantidad de cursos por usuario. */
        public function get_total_cursos_x_usuario($usu_id){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="SELECT COUNT(*) as total FROM `td_curso_usuario` WHERE usu_id=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $usu_id);
            $sql->execute();
            return $resultado=$sql->fetchALL();
        }
    }
