<?php 
    /* Inicio Clase conectar */
    class onectar{
        protected $dbh;

        /* Función protegida de la cadena de Conexión */
        protected function conexion(){
            try{
                /* Cadena de conexión */
                $conectar = $this->dbh = new PDO('mysql:host=localhost;dbname=jhonatan_certificado', 'root', '');
                return $conectar;
            }catch (Exception $e){
                /* EN caso de errores en la cadena de conexión. */
                print "¡Error DB!: " . $e->getMessage() . "<br/>";
                die();
            }
        }

        /* Impedir problemas con las ñ o ´ caracteres del español */
        public function set_names(){
            return $this->dbh->query("SET NAMES 'utf8'");
        }

        /* Ruta principal del proyecto */
        public function ruta(){
            return "http://certificado.test/";
        }
    }
?>