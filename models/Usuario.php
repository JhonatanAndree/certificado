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
    }