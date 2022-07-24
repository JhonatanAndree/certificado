<?php
    /*Inicializando la sesion del usuario */
    session_start();

    /*Iniciamos Clase Conectar */
    class Conectar{
        protected $dbh;

        /*Funcion Protegida de la cadena de Conexion */
        protected function Conexion(){
            try {
                /*Cadena de Conexion QA*/
				/* $conectar = $this->dbh = new PDO("mysql:local=localhost;dbname=jhonatan_certificado","root",""); */
                /*Cadena de Conexion Produccion*/
				$conectar = $this->dbh = new PDO("mysql:host=sdb-x.hosting.stackcp.net;dbname=tforma-3231346046","tforma-3231346046","f@eDCV:y8hF%");
				return $conectar;
			} catch (Exception $e) {
                /*En Caso hubiera un error en la cadena de conexion */
				print "¡Error BD!: " . $e->getMessage() . "<br/>";
				die();
			}
        }

        /*Para impedir que tengamos problemas con las ñ o tildes */
        public function set_names(){
            return $this->dbh->query("SET NAMES 'utf8'");
        }

        /*Ruta principal del proyecto */
        public static function ruta(){
            //QA
            /* return "http://certificado.test/"; */
            //Produccion
            return "https://mecertifica.online/tforma/";
        }
    }